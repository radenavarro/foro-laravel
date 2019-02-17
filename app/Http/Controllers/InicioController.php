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
        $hilos = DB::table('categorias')
            ->select(array('hilos.*', DB::raw("categorias.titulo AS tituloCat, users.name")))
            ->join('hilos', 'hilos.id', DB::raw("(SELECT hilos.id FROM hilos WHERE hilos.id_categoria = categorias.id ORDER BY hilos.updated_at DESC LIMIT 1)"))
            ->join('users', 'users.id', 'hilos.id_user')
            ->get();
        return view('inicio', compact('hilos'));
    }
//SELECT * FROM `categorias` LEFT JOIN hilos ON hilos.id_categoria = categorias.id WHERE hilos.id = (SELECT MAX(id) FROM hilos) GROUP BY categorias.titulo
//SELECT * FROM `categorias`, `hilos` WHERE categorias.id = hilos.id_categoria ORDER BY hilos.created_at DESC LIMIT 1
//SELECT * FROM `hilos` RIGHT JOIN categorias ON hilos.id_categoria = categorias.id

//SELECT p.* FROM categorias AS a JOIN hilos AS p ON p.id = ( SELECT pi.id FROM hilos AS pi WHERE pi.id_categoria = a.id ORDER BY pi.created_at DESC LIMIT 1);
//SELECT hilos.* FROM categorias JOIN hilos ON hilos.id = ( SELECT hilos.id FROM hilos WHERE hilos.id_categoria = categorias.id ORDER BY hilos.created_at DESC LIMIT 1)
}
