<?php
/**
 * Created by PhpStorm.
 * User: Beniscio
 * Date: 17/02/2019
 * Time: 20:31
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HiloController extends Controller
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
    public function index($iId){
        $postsEnHilo = DB::table('mensajes')
            ->where('id_hilo', $iId)
            ->get();

        return view('hilo', compact('postsEnHilo'));
    }
}
