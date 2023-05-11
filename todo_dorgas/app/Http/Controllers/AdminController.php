<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\InformacionTributariaModel;
use App\Models\InformacionFinancieraModel;
use App\Models\InformacionBancariaModel;
use App\Models\PagareModel;
use App\Models\AccionistaModel;




class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = User::all();
        return view("admin.index_user",['usuarios'=>$usuarios]);
    }

    public function aprobarUser($id)
    {
        $user = User::find($id);

        if ($user->aprovado == 0 || $user->aprovado == 2 || $user->aprovado == null) {
            $user->aprovado = 1;
        }else {
            $user->aprovado = 0;

        }
        $user->save();

        return back();
    }

    public function rechazarUser($id)
    {
        $user = User::find($id);

        if ($user->aprovado == 0 || $user->aprovado == 1 || $user->aprovado == null) {
            $user->aprovado = 2;
        }else {
            $user->aprovado = 0;

        }
        $user->save();

        return back();
    }

    public function pagare(Request $request)
    {
        $pagare = PagareModel::where('user_id',$request->id)->first();
        return  response()->json([
            'pagare'=>$pagare,
        ]);
    }

    public function Informacionf(Request $request)
    {
        $informacionf = InformacionFinancieraModel::where('user_id',$request->id)->first();


        return  response()->json([
            'informacionf'=>$informacionf,
        ]);
    }

    public function Informacionb(Request $request)
    {
        $informacionb = InformacionBancariaModel::where('user_id',$request->id)->first();
        return  response()->json([
            'informacionb'=>$informacionb,
        ]);
    }

    public function Informaciont(Request $request)
    {
        $informaciont = InformacionTributariaModel::where('Cliente_id',$request->id)->first();
        return  response()->json([
            'informaciont'=>$informaciont,
        ]);
    }


    public function Informacionsocios(Request $request)
    {
        $socios = AccionistaModel::where('user_id',$request->id)->get();

        return  response()->json([
            'socios'=>$socios,
        ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
