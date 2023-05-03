<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\actividad_economicaModel;
use App\Models\ProveedorModel;
use Illuminate\Support\Facades\Hash;



use App\Models\User;



class ProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function crearPn()
     {
         $tipos=['N/D','CC','RC','TI','NIT','PAS','DIE'];
         $actividades = actividad_economicaModel::get();
         return view("cliente.registro_pn",["tipos"=>$tipos,"actividades"=>$actividades]);
     }

     public function storepn(Request $request)
    {

           $request->validate(
            [
                'tipo_d'=> 'required',
                'n_docuemnto'=> 'required|numeric',
                'Nombre'=> 'required',
                'departamento'=> 'required',
                'municipio'=>'required',
                'email'=>'required|email|unique:users',
                'Telefono'=>'required|unique:DOMICILIOS',
                'direccion'=>'required',
                'servicio'=>'required',
                'actividad'=>'required'

            ],
            [
                'tipo_d.required' => 'Tipo de documento es requerido',
                'n_docuemnto.required' => 'El documento de identidad es requerido',
                'Nombre.required' => 'El Nombre completo  es requerido',
                'departamento.required' => 'El departamento es requerido',
                'municipio.required' => 'El municipio es requerido',
                'email.required' => 'El correo es requerido',
                'email.email' => 'El correo debe ser real ej. example@example.com',
                'email.unique' => 'El correo ya esta  registrado',
                'Telefono.required' => 'El telefono es requerido',
                'Telefono.unique' => 'El telefono ya esta registrado',
                'direccion.required' => 'La dirección es requerido',

            ]
            );
           try {


            $proveedor = new ProveedorModel();

            $proveedor->DV = 0;
            $proveedor->TipoID = 0;

            //nombres
            $proveedor->Nombre =$request->Nombre;

            $proveedor->Regimen="";
            $proveedor->GranContribuyente="";
            $proveedor->Movil="";
            $proveedor->TipoID=$request->tipo_d;
            $proveedor->ActividadEconomica=$request->actividad;
            $proveedor->Direccion=$request->actividad;
            $proveedor->Ciudad=$request->actividad;
            $proveedor->Departamento=$request->actividad;
            $proveedor->Pais=$request->actividad;

            $proveedor->Telefono1=$request->actividad;
            $proveedor->Telefono2=$request->actividad;
            $proveedor->Fax=$request->actividad;

            //email e ingreso
            $proveedor->Mail=$request->email;
            $proveedor->FechaIngreso=date('Y-m-d');
            //$proveedor->Contacto=$request->nombre1;
            $proveedor->Contacto=$request->referencia;

            $proveedor->Credito=0;
            $proveedor->Contacto=$request->referencia;

            //$proveedor->ReferenciaTelefono2=$request->nombre1;
            $proveedor->Cupo=0;
            $proveedor->Plazo=0;
            $proveedor->Saldo=0;
            $proveedor->Enabled=1;

            if ($proveedor->save()) {

                    $user = User::create([
                        'name' => $request->Nombre,
                        'email' => $request->email,
                        'password' => Hash::make($request->password),
                        'id_cliente'=> $proveedor->ID,
                        ]);


            }


            return redirect('/actividad/'.$user->id);

            //return redirect('/actividad/');
            } catch (\Throwable $th) {
                throw $th;
            }




    }
    public function index()
    {
        //
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
