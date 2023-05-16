<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\actividad_economicaModel;
use App\Models\ProveedorModel;
use App\Models\RepresentanteLegalModel;
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
         return view("proveedor.registro_pn",["tipos"=>$tipos,"actividades"=>$actividades]);
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
            $proveedor->TipoID = $request->tipo_d;

            //nombres
            $proveedor->Mail=$request->email;

            $proveedor->Nombre =$request->Nombre;
            $proveedor->Departamento=$request->departamento;
            $proveedor->Ciudad=$request->municipio;
            $proveedor->Pais="Colombia";
            $proveedor->Telefono1=$request->Telefono;
            $proveedor->Telefono2=" ";
            $proveedor->Direccion=$request->direccion;




            $proveedor->Regimen="";
            $proveedor->GranContribuyente="";
            $proveedor->Movil="";
            $proveedor->ActividadEconomica=$request->actividad;

            $proveedor->Fax="";

            //email e ingreso
            $proveedor->FechaIngreso=date('Y-m-d');
            //$proveedor->Contacto=$request->nombre1;
            $proveedor->Contacto="";

            $proveedor->Credito=0;
            $proveedor->Contacto="N/A";

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
                        'rol' => 2
                        ]);


            }
            $Representante = new RepresentanteLegalModel();


            $Representante->Nombre1 = "N/A";
            $Representante->Nombre2 = "N/A";
            $Representante->Apellido1 = "N/A";
            $Representante->Apellido2 = "N/A";
            $Representante->TipoNit = "N/A";
            $Representante->Nit = 0;
            $Representante->Telefono = "N/A";
            $Representante->Cargo = "N/A";
            $Representante->Email = "N/A";
            $Representante->ManejoRP = $request->grupo1;
            $Representante->Observacion1 = $request->Observacion."";
            $Representante->EjercidoPPOP = $request->grupo2;
            $Representante->Observacion2 = $request->Observacion2."";
            $Representante->Reconocimiento = $request->grupo3;
            $Representante->Observacion3 = $request->Observacion3."";
            $Representante->VincuPExpuesta = $request->grupo4;
            $Representante->Observacion4 = $request->Observacion4."";
            $Representante->ObligacionTE = $request->grupo5;
            $Representante->Observacion5 = $request->Observacion5."";
            $Representante->OrganizacionI = $request->grupo6;
            $Representante->Observacion6 = $request->Observacion6."";
            $Representante->ObligacionP = $request->grupo7;
            $Representante->Observacion7 = $request->Observacion7."";

            $Representante->user_id = $user->id;

            $Representante->save();

            return redirect('/conocimiento/'.$user->id);

            //return redirect('/actividad/');
            } catch (\Throwable $th) {
                throw $th;
            }

    }

    public function identificacion()
    {
        return view("proveedor.identificacion");
    }

    public function crearPj()
    {
        $tipos=['Sociedades Limitadas – LTDA.','Sociedades Anónimas – S.A.','Sociedad en Comandita – & Cía.',
        'Sociedad en Comandita Simple – S. en C.','Sociedad en Comandita por Acciones – S.C.A.',
        'Sociedad por Acciones Simplificada – S.A.S.','Sociedad Colectiva.'];
        $empresas=['Microempresas','Pequeña empresa','Mediana empresa','Grande empresa'];
        return view("proveedor.registro_pj",["empresas"=>$empresas,"tipos"=>$tipos]);
    }

    public function storepj(Request $request)
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
            $proveedor->TipoID = $request->tipo_d;

            //nombres
            $proveedor->Mail=$request->email;

            $proveedor->Nombre =$request->Nombre;
            $proveedor->Departamento=$request->departamento;
            $proveedor->Ciudad=$request->municipio;
            $proveedor->Pais="Colombia";
            $proveedor->Telefono1=$request->Telefono;
            $proveedor->Telefono2=" ";
            $proveedor->Direccion=$request->direccion;




            $proveedor->Regimen="";
            $proveedor->GranContribuyente="";
            $proveedor->Movil="";
            $proveedor->ActividadEconomica=$request->actividad;

            $proveedor->Fax="";

            //email e ingreso
            $proveedor->FechaIngreso=date('Y-m-d');
            //$proveedor->Contacto=$request->nombre1;
            $proveedor->Contacto="";

            $proveedor->Credito=0;
            $proveedor->Contacto="N/A";

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
                        'rol' => 2
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
