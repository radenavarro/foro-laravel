<?php
/**
 * Created by PhpStorm.
 * User: Beniscio
 * Date: 15/02/2019
 * Time: 11:58
 */

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoriaController extends Controller
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
    public function index($iId)
    {
        $datosCategoria = DB::table('categorias')
            ->where('id', $iId)
            ->first();

        $todosLosHilos = DB::table('hilos')
            ->select(array('*', DB::raw('hilos.id AS hiloid')))
            ->join('users', 'users.id','hilos.id_user')
            ->where('id_categoria', $iId)
            ->get();
        $mensajesEnHilos = DB::table('mensajes')
            ->whereIn('id_hilo', [DB::raw("(SELECT id FROM hilos WHERE id_categoria = $iId)")])
            ->get();
        $hilosUltimoPost = DB::table('mensajes')
            ->select(array('hilos.id', 'hilos.titulo', 'users.name', 'mensajes.created_at'))
            ->join('hilos', 'hilos.id', 'mensajes.id_hilo')
            ->join('users', 'users.id', 'mensajes.id_user')
            ->whereIn('mensajes.id', array(DB::raw("(SELECT MAX(mensajes.id) FROM mensajes GROUP BY mensajes.id_hilo)")))
            ->where('id_categoria', $iId)
            ->get();
        return view('categoria', compact('todosLosHilos', 'mensajesEnHilos', 'hilosUltimoPost', 'datosCategoria'));
    }
}

