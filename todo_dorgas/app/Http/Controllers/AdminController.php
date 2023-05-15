<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\InformacionTributariaModel;
use App\Models\InformacionFinancieraModel;
use App\Models\InformacionBancariaModel;
use App\Models\PagareModel;
use App\Models\AccionistaModel;
use App\Models\RepresentanteLegalModel;
use App\Models\ContactoModel;
use App\Models\Cliente_DomicilioModel;
use App\Models\ClienteModel;
use App\Models\DomicilioModel;
use App\Models\personaExpuestaModel;
use App\Models\ProveedorModel;



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

    public function aprobarUser1($id)
    {
        $user = User::find($id);

        if ($user->aprovado2 == 0 || $user->aprovado2 == 2 || $user->aprovado2 == null) {
            $user->aprovado2 = 1;
        }else {
            $user->aprovado2 = 0;

        }
        $user->save();

        return back();
    }

    public function rechazarUser1($id)
    {
        $user = User::find($id);

        if ($user->aprovado2 == 0 || $user->aprovado2 == 1 || $user->aprovado2 == null) {
            $user->aprovado2 = 2;
        }else {
            $user->aprovado2 = 0;

        }
        $user->save();

        return back();
    }

    public function aprobarUser2($id)
    {
        $user = User::find($id);

        if ($user->aprovado3 == 0 || $user->aprovado3 == 2 || $user->aprovado3 == null) {
            $user->aprovado3 = 1;
        }else {
            $user->aprovado3 = 0;

        }
        $user->save();

        return back();
    }

    public function rechazarUser2($id)
    {
        $user = User::find($id);

        if ($user->aprovado3 == 0 || $user->aprovado3 == 1 || $user->aprovado3 == null) {
            $user->aprovado3 = 2;
        }else {
            $user->aprovado3 = 0;

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


    public function InformacionP($id)
    {
        $user = User::find($id);

        if ($user->rol == 1) {

            $cliente = ClienteModel::where('Mail',$user->email)->first();
            $cliente_domicilio = Cliente_DomicilioModel::where('ID_Cliente',$cliente->ID)->first();
            $telefono = strval($cliente_domicilio->Telefono);
            $domicilio = DomicilioModel::where('Telefono',$telefono)->first();

            $contacto = ContactoModel::where('Cliente_id',$id)->first();
            $representante = RepresentanteLegalModel::where('user_id',$id)->first();
            $personae = personaExpuestaModel::where('user_id',$id)->first();

            if ($personae) {
                return  response()->json([
                    'cliente'=>$cliente,
                    'domicilio'=>$domicilio,
                    'personae'=>$personae,
                    'contacto'=>$contacto,
                    'representante'=>$representante,

                ]);
            }else {
                return  response()->json([
                    'cliente'=>$cliente,
                    'domicilio'=>$domicilio,
                    'contacto'=>$contacto,
                    'representante'=>$representante,

                ]);

            }


        }elseif ($user->rol == 2) {

                $Proveedor = ProveedorModel::where('Mail',$user->email)->first();
                $contacto = ContactoModel::where('user_id',$user->ID)->first();
                $representante = RepresentanteLegalModel::where('user_id',$user->ID)->first();
                $personae = personaExpuestaModel::where('user_id',$user->ID)->first();

                if ($personae) {
                    return  response()->json([
                        'Proveedor'=>$Proveedor,
                        'personae'=>$personae,
                        'contacto'=>$contacto,
                        'representante'=>$representante,

                    ]);
                }else {
                    return  response()->json([
                        'Proveedor'=>$Proveedor,
                        'contacto'=>$contacto,
                        'representante'=>$representante,

                    ]);
                }
        }

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
