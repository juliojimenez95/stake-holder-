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
use Illuminate\Support\Facades\DB;



class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$usuarios = User::all();

        $resultados1 = DB::table('TBL_USUARIOS_STAKE')
        ->join('CLIENTES', 'TBL_USUARIOS_STAKE.email', '=', 'CLIENTES.Mail')
        ->select('TBL_USUARIOS_STAKE.name', 'TBL_USUARIOS_STAKE.comentario','TBL_USUARIOS_STAKE.id','TBL_USUARIOS_STAKE.rol','TBL_USUARIOS_STAKE.PEP','CLIENTES.Nit','TBL_USUARIOS_STAKE.aprovado','TBL_USUARIOS_STAKE.aprovado2','TBL_USUARIOS_STAKE.aprovado3')
        ->get();

        $resultados2 = DB::table('TBL_USUARIOS_STAKE')
        ->join('PROVEEDORES', 'TBL_USUARIOS_STAKE.email', '=', 'PROVEEDORES.Mail')
        ->select('TBL_USUARIOS_STAKE.name', 'TBL_USUARIOS_STAKE.comentario','TBL_USUARIOS_STAKE.id','TBL_USUARIOS_STAKE.rol','TBL_USUARIOS_STAKE.PEP','PROVEEDORES.ID as Nit','TBL_USUARIOS_STAKE.aprovado','TBL_USUARIOS_STAKE.aprovado2','TBL_USUARIOS_STAKE.aprovado3')
        ->get();

        $usuarios= $resultados1->concat($resultados2);

        //return $usuarios;

        return view("admin.index_user",['usuarios'=>$usuarios]);
    }

    public function comentario(Request $request,$id)
    {
        if (auth()->user()->rol != 3) {
            session()->flash('error', 'No tienes permiso para realizar esta acción.');
            return back();
        }
        $user = User::find($id);
        if ($user) {
            $user->comentario = $request->comentario ;
            $user->save();
        }


        return back();
    }

    public function aprobarUser($id)
    {
        if (auth()->user()->rol != 3) {
            session()->flash('error', 'No tienes permiso para realizar esta acción.');
            return back();
        }
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
        if (auth()->user()->rol != 3) {
            session()->flash('error', 'No tienes permiso para realizar esta acción.');
            return back();
        }
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
        if (auth()->user()->rol != 4) {
            session()->flash('error', 'No tienes permiso para realizar esta acción.');
            return back();
        }
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
        if (auth()->user()->rol != 4) {
            session()->flash('error', 'No tienes permiso para realizar esta acción.');
            return back();
        }
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
        // Verificar el rol del usuario
        if (auth()->user()->rol != 5) {
            session()->flash('error', 'No tienes permiso para realizar esta acción.');
            return back();
        }

        $user = User::find($id);

        if ($user->aprovado3 == 0 || $user->aprovado3 == 2 || $user->aprovado3 == null) {
            $user->aprovado3 = 1;
        } else {
            $user->aprovado3 = 0;
        }
        $user->save();

        return back();
    }


    public function rechazarUser2($id)
    {
        if (auth()->user()->rol != 5) {
            session()->flash('error', 'No tienes permiso para realizar esta acción.');
            return back();
        }

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


    public function InformacionP(Request $request)
    {
        $user = User::find($request->id);

        if ($user->rol == 1) {

            $cliente = ClienteModel::where('Mail',$user->email)->first();
            $cliente_domicilio = Cliente_DomicilioModel::where('ID_Cliente',$cliente->ID)->first();
            $telefono = strval($cliente_domicilio->Telefono);
            $domicilio = DomicilioModel::where('Telefono',$telefono)->first();

            $contacto = ContactoModel::where('Cliente_id',$request->id)->first();
            //return $contacto;
            $representante = RepresentanteLegalModel::where('user_id',$request->id)->first();
            $personae = personaExpuestaModel::where('user_id',$request->id)->first();

            if ($personae) {
                return  response()->json([
                    'cliente'=>$cliente,
                    'domicilio'=>$domicilio,
                    'personae'=>$personae,
                    'contacto'=>$contacto,
                    'representante'=>$representante,
                    'user'=> $user


                ]);
            }else {
                return  response()->json([
                    'cliente'=>$cliente,
                    'domicilio'=>$domicilio,
                    'contacto'=>$contacto,
                    'representante'=>$representante,
                    'user'=> $user

                ]);

            }


        }elseif ($user->rol == 2) {

                $Proveedor = ProveedorModel::where('Mail',$user->email)->first();
                $contacto = ContactoModel::where('Cliente_id',$request->id)->first();
                $representante = RepresentanteLegalModel::where('user_id',$request->id)->first();
                $personae = personaExpuestaModel::where('user_id',$request->id)->first();

                if ($personae) {
                    return  response()->json([
                        'Proveedor'=>$Proveedor,
                        'personae'=>$personae,
                        'contacto'=>$contacto,
                        'representante'=>$representante,
                        'user'=> $user

                    ]);
                }else {
                    return  response()->json([
                        'Proveedor'=>$Proveedor,
                        'contacto'=>$contacto,
                        'representante'=>$representante,
                        'user'=> $user

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
