<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewThreadController extends Controller
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
    public function index($iIdCategoria){
        $datosCategoria = DB::table('categorias')
            ->where('id', $iIdCategoria)
            ->first();

        return view('newthread', compact('datosCategoria'));
    }
}
