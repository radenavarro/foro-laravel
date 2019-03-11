<?php
/**
 * Created by PhpStorm.
 * User: Beniscio
 * Date: 17/02/2019
 * Time: 20:31
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

    public function createThread(Request $request){
        // Hilos
        $sThreadName = $request->input('titulo');
        $iBelongsToCategory = $request->input('idCategoria');
        $iAuthorId = Auth::user()->id;

        // Mensajes
        $sThreadMessage = $request->input('mensaje');

        // Crear hilo
        $iIdCreatedThread = DB::table('hilos')
            ->insertGetId([
                'titulo' => $sThreadName,
                'id_categoria' => $iBelongsToCategory,
                'id_user' => $iAuthorId,
                'created_at' => now(),
                'updated_at' => now()
            ]);

        DB::table('mensajes')
            ->insert([
                'texto' => $sThreadMessage,
                'id_hilo' => $iIdCreatedThread,
                'id_user' => $iAuthorId,
                'created_at' => now(),
                'updated_at' => now()
            ]);

        return redirect()->action('InicioController@index');
    }
}
