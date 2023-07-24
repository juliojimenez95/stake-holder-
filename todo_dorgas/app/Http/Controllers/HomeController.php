<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\DB;




class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::user()->rol == 1 || Auth::user()->rol == 2 ) {
         return view('home');
        }

        if (Auth::user()->rol == 3 || Auth::user()->rol == 4 || Auth::user()->rol == 5 || Auth::user()->rol == 6) {
            $resultados1 = DB::table('TBL_USUARIOS_STAKE')
            ->join('CLIENTES', 'TBL_USUARIOS_STAKE.email', '=', 'CLIENTES.Mail')
            ->select('TBL_USUARIOS_STAKE.name', 'TBL_USUARIOS_STAKE.comentario','TBL_USUARIOS_STAKE.id','TBL_USUARIOS_STAKE.rol','TBL_USUARIOS_STAKE.PEP','CLIENTES.Nit','TBL_USUARIOS_STAKE.aprovado','TBL_USUARIOS_STAKE.aprovado2','TBL_USUARIOS_STAKE.aprovado3')
            ->where('TBL_USUARIOS_STAKE.rol',1)
            ->get();

            $resultados2 = DB::table('TBL_USUARIOS_STAKE')
            ->join('PROVEEDORES', 'TBL_USUARIOS_STAKE.email', '=', 'PROVEEDORES.Mail')
            ->select('TBL_USUARIOS_STAKE.name', 'TBL_USUARIOS_STAKE.comentario','TBL_USUARIOS_STAKE.id','TBL_USUARIOS_STAKE.rol','TBL_USUARIOS_STAKE.PEP','PROVEEDORES.ID as Nit','TBL_USUARIOS_STAKE.aprovado','TBL_USUARIOS_STAKE.aprovado2','TBL_USUARIOS_STAKE.aprovado3')
            ->where('TBL_USUARIOS_STAKE.rol',2)
            ->get();

            $usuarios= $resultados1->concat($resultados2);
            return view("admin.index_user",['usuarios'=>$usuarios]);
        }

    }
}
