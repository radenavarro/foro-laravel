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
        $todosLosHilos = DB::table('hilos')
            ->select(array('*', DB::raw('hilos.id AS hiloid')))
            ->where('id_categoria', $iId)
            ->join('users', 'users.id','hilos.id_user')
            ->get();

        return view('categoria', compact('todosLosHilos'));
    }
}
