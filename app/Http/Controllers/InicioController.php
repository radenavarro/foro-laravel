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
}
