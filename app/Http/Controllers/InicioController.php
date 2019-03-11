<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InicioController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $hilos = DB::table('hilos')
            ->select(array('hilos.*', DB::raw("categorias.titulo AS tituloCat, users.name")))
            ->join('users', 'users.id', 'hilos.id_user')
            ->rightJoin('categorias', 'categorias.id', 'hilos.id_categoria')
            ->whereNull('hilos.id')
            ->orWhere('hilos.id', DB::raw("(SELECT hilos.id WHERE hilos.created_at IN (
            SELECT MAX(hilos.created_at) FROM HILOS GROUP BY hilos.id_categoria))"))
            ->groupBy('categorias.titulo')// Error con group by, cambiar config -> database.php, en array mysql -> strict = false
            ->orderBy('categorias.id', 'asc')
            ->get();
        return view('inicio', compact('hilos'));
    }
}

//SELECT * FROM `hilos`
//RIGHT JOIN categorias ON categorias.id = hilos.id_categoria
//WHERE hilos.id IS NULL
//OR hilos.id = (
//SELECT hilos.id WHERE hilos.created_at IN (
//    SELECT MAX(hilos.created_at) FROM HILOS GROUP BY hilos.id_categoria
//)
//)
//GROUP BY categorias.titulo ORDER BY categorias.id ASC
