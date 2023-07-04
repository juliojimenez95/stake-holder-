<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\actividad_economicaModel;
use App\Models\ProveedorModel;
use App\Models\RepresentanteLegalModel;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\DB;




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
                'email'=>'required|email|unique:TBL_USUARIOS_STAKE',
                'Telefono'=>'required',
                'direccion'=>'required',
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

             $proveedor =  ProveedorModel::where('id',$request->n_docuemnto)->first();

                if ($proveedor) {


                $proveedor->DV = 0;

                $proveedor->TipoID = $request->tipo_d;

                //nombres
                $proveedor->Mail=$request->email;

                $proveedor->Nombre =$request->Nombre;
                $proveedor->Departamento=$request->departamento;
                $proveedor->Ciudad=$request->municipio;
                $proveedor->Pais="Colombia";
                $proveedor->Telefono1=$request->Telefono;
                $proveedor->Direccion=$request->direccion;

                $proveedor->ActividadEconomica=$request->actividad;


                //email e ingreso
                $proveedor->FechaIngreso=date('Y-m-d');

                $proveedor->Credito=0;
                $proveedor->Contacto="N/A";

                //$proveedor->ReferenciaTelefono2=$request->nombre1;
                $proveedor->Cupo=0;
                $proveedor->Plazo=0;
                $proveedor->Saldo=0;
               // $proveedor->juridico=0;

                $proveedor->Enabled=1;

                if ($proveedor->save()) {

                        $user = User::create([
                            'name' => $request->Nombre,
                            'email' => $request->email,
                            'password' => Hash::make($request->password),
                            'rol' => 2,
                            'ManejoRP'=> $request->grupo1 ,
                            'Observacion1'=> $request->Observacion."" ,
                            'EjercidoPPOP'=> $request->grupo2 ,
                            'Observacion2'=> $request->Observacion2."" ,
                            'Reconocimiento'=> $request->grupo3,
                            'Observacion3'=> $request->Observacion3."",
                            'VincuPExpuesta'=> $request->grupo4 ,
                            'Observacion4'=> $request->Observacion4."" ,
                            'ObligacionTE'=> $request->grupo5 ,
                            'Observacion5'=> $request->Observacion5."",
                            'OrganizacionI'=> $request->grupo6,
                            'Observacion6'=> $request->Observacion6."" ,
                            'ObligacionP'=> $request->grupo7,
                            'Observacion7'=> $request->Observacion7.""
                            ]);


                }

                return redirect('/conocimiento/'.$user->id);
            } else {
                $proveedor = new ProveedorModel();

                $proveedor->DV = 0;
                $proveedor->id = $request->n_docuemnto;

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
                $proveedor->juridico=0;

                $proveedor->Enabled=1;

                if ($proveedor->save()) {

                        $user = User::create([
                            'name' => $request->Nombre,
                            'email' => $request->email,
                            'password' => Hash::make($request->password),
                            'rol' => 2,
                            'ManejoRP'=> $request->grupo1 ,
                            'Observacion1'=> $request->Observacion."" ,
                            'EjercidoPPOP'=> $request->grupo2 ,
                            'Observacion2'=> $request->Observacion2."" ,
                            'Reconocimiento'=> $request->grupo3,
                            'Observacion3'=> $request->Observacion3."",
                            'VincuPExpuesta'=> $request->grupo4 ,
                            'Observacion4'=> $request->Observacion4."" ,
                            'ObligacionTE'=> $request->grupo5 ,
                            'Observacion5'=> $request->Observacion5."",
                            'OrganizacionI'=> $request->grupo6,
                            'Observacion6'=> $request->Observacion6."" ,
                            'ObligacionP'=> $request->grupo7,
                            'Observacion7'=> $request->Observacion7.""
                            ]);


                }

                return redirect('/conocimiento/'.$user->id);
            }





            //return redirect('/actividad/');
            } catch (\Throwable $th) {
                throw $th;
            }

    }

    public function editarpn2(Request $request)
    {

        $request->validate(
            [
                'tipo_d'=> 'required',
                'n_docuemnto'=> 'required|numeric',
                'Nombre'=> 'required',
                'departamento'=> 'required',
                'municipio'=>'required',
                'email'=>'required|email|unique:TBL_USUARIOS_STAKE',
                'Telefono'=>'required',
                'direccion'=>'required',
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

             $proveedor =  ProveedorModel::where('id',$request->n_docuemnto)->first();

                if ($proveedor) {


                $proveedor->DV = 0;

                $proveedor->TipoID = $request->tipo_d;

                //nombres
                $proveedor->Mail=$request->email;

                $proveedor->Nombre =$request->Nombre;
                $proveedor->Departamento=$request->departamento;
                $proveedor->Ciudad=$request->municipio;
                $proveedor->Pais="Colombia";
                $proveedor->Telefono1=$request->Telefono;
                $proveedor->Direccion=$request->direccion;

                $proveedor->ActividadEconomica=$request->actividad;


                //email e ingreso
                $proveedor->FechaIngreso=date('Y-m-d');

                $proveedor->Credito=0;
                $proveedor->Contacto="N/A";

                //$proveedor->ReferenciaTelefono2=$request->nombre1;
                $proveedor->Cupo=0;
                $proveedor->Plazo=0;
                $proveedor->Saldo=0;
                $proveedor->juridico=0;

                $proveedor->Enabled=1;

                if ($proveedor->save()) {

                        $user = User::create([
                            'name' => $request->Nombre,
                            'email' => $request->email,
                            'password' => Hash::make($request->password),
                            'rol' => 2,
                            'Natural' => 1,
                            'ManejoRP'=> $request->grupo1 ,
                            'Observacion1'=> $request->Observacion."" ,
                            'EjercidoPPOP'=> $request->grupo2 ,
                            'Observacion2'=> $request->Observacion2."" ,
                            'Reconocimiento'=> $request->grupo3,
                            'Observacion3'=> $request->Observacion3."",
                            'VincuPExpuesta'=> $request->grupo4 ,
                            'Observacion4'=> $request->Observacion4."" ,
                            'ObligacionTE'=> $request->grupo5 ,
                            'Observacion5'=> $request->Observacion5."",
                            'OrganizacionI'=> $request->grupo6,
                            'Observacion6'=> $request->Observacion6."" ,
                            'ObligacionP'=> $request->grupo7,
                            'Observacion7'=> $request->Observacion7.""
                            ]);


                }

                return redirect('/conocimiento/'.$user->id);
            } else {
                $proveedor = new ProveedorModel();

                $proveedor->DV = 0;
                $proveedor->id = $request->n_docuemnto;

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
                $proveedor->juridico=0;

                $proveedor->Enabled=1;

                if ($proveedor->save()) {

                        $user = User::create([
                            'name' => $request->Nombre,
                            'email' => $request->email,
                            'password' => Hash::make($request->password),
                            'rol' => 2,
                            'Natural' => 1,
                            'ManejoRP'=> $request->grupo1 ,
                            'Observacion1'=> $request->Observacion."" ,
                            'EjercidoPPOP'=> $request->grupo2 ,
                            'Observacion2'=> $request->Observacion2."" ,
                            'Reconocimiento'=> $request->grupo3,
                            'Observacion3'=> $request->Observacion3."",
                            'VincuPExpuesta'=> $request->grupo4 ,
                            'Observacion4'=> $request->Observacion4."" ,
                            'ObligacionTE'=> $request->grupo5 ,
                            'Observacion5'=> $request->Observacion5."",
                            'OrganizacionI'=> $request->grupo6,
                            'Observacion6'=> $request->Observacion6."" ,
                            'ObligacionP'=> $request->grupo7,
                            'Observacion7'=> $request->Observacion7.""
                            ]);


                }

                return redirect('/conocimiento/'.$user->id);
            }





            //return redirect('/actividad/');
            } catch (\Throwable $th) {
                throw $th;
            }

    }


    public function editpn(Request $request,$id)
    {

        $request->validate(
            [
                'tipo_d'=> 'required',
                'n_docuemnto'=> 'required|numeric',
                'Nombre'=> 'required',
                'departamento'=> 'required',
                'municipio'=>'required',
                'email'=>'required|email',
                'Telefono'=>'required',
                'direccion'=>'required',
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

            $user = User::where('id',$id)->first();



            $proveedor =  ProveedorModel::where('Mail',$user->email)->first();

            $proveedor->DV = 0;
            $proveedor->id = $request->n_docuemnto;

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
            $proveedor->juridico=0;

            $proveedor->Enabled=1;

            if ($proveedor->save()) {

                $user->name = $request->razon_s;
                $user->email = $request->email;
                $user->rol = 2;
                $user->ManejoRP= $request->grupo1 ;
                $user->Observacion1= $request->Observacion."" ;
                $user->EjercidoPPOP= $request->grupo2 ;
                $user->Observacion2= $request->Observacion2."" ;
                $user->Reconocimiento= $request->grupo3;
                $user->Observacion3= $request->Observacion3."";
                $user->VincuPExpuesta= $request->grupo4 ;
                $user->Observacion4= $request->Observacion4."" ;
                $user->ObligacionTE= $request->grupo5 ;
                $user->Observacion5= $request->Observacion5."";
                $user->OrganizacionI= $request->grupo6;
                $user->Observacion6= $request->Observacion6."" ;
                $user->ObligacionP= $request->grupo7;
                $user->Observacion7= $request->Observacion7."";

                $user->save();


            }

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

    public function perfil($id)
    {
        $user = DB::table('TBL_USUARIOS_STAKE')
            ->join('PROVEEDORES', 'TBL_USUARIOS_STAKE.email', '=', 'PROVEEDORES.Mail')
            ->select('TBL_USUARIOS_STAKE.name','TBL_USUARIOS_STAKE.rol','TBL_USUARIOS_STAKE.email', 'TBL_USUARIOS_STAKE.id','TBL_USUARIOS_STAKE.PEP','PROVEEDORES.ID as Nit','PROVEEDORES.TipoID',
            'PROVEEDORES.ActividadEconomica','PROVEEDORES.Ciudad','PROVEEDORES.Departamento',
            'PROVEEDORES.Pais','PROVEEDORES.Telefono1',
            'PROVEEDORES.Direccion','PROVEEDORES.juridico','PROVEEDORES.tamano','PROVEEDORES.pagina_web',
            'PROVEEDORES.tipo_s','PROVEEDORES.DV')->where('TBL_USUARIOS_STAKE.id',$id)
            ->first();

            //return $user;

            if ($user->juridico == 0) {
                $tipos=['N/D','CC','RC','TI','NIT','PAS','DIE'];
                $actividades = actividad_economicaModel::get();
                return view("editar.registroP_pn",['user'=>$user,'id'=>$id,"tipos"=>$tipos,"actividades"=>$actividades]);

            }else {
                $tipos=['Sociedades Limitadas – LTDA.','Sociedades Anónimas – S.A.','Sociedad en Comandita – & Cía.',
                'Sociedad en Comandita Simple – S. en C.','Sociedad en Comandita por Acciones – S.C.A.',
                'Sociedad por Acciones Simplificada – S.A.S.','Sociedad Colectiva.'];
                $empresas=['Microempresas','Pequeña empresa','Mediana empresa','Grande empresa'];
                $actividades = actividad_economicaModel::get();
                return view("editar.registroP_pj",['id'=>$id,'user'=>$user,"empresas"=>$empresas,"tipos"=>$tipos,"actividades"=>$actividades]);

            }

    }


    public function crearPj()
    {
        $tipos=['Sociedades Limitadas – LTDA.','Sociedades Anónimas – S.A.','Sociedad en Comandita – & Cía.',
        'Sociedad en Comandita Simple – S. en C.','Sociedad en Comandita por Acciones – S.C.A.',
        'Sociedad por Acciones Simplificada – S.A.S.','Sociedad Colectiva.'];
        $empresas=['Microempresas','Pequeña empresa','Mediana empresa','Grande empresa'];
        $actividades = actividad_economicaModel::get();
        return view("proveedor.registro_pj",["empresas"=>$empresas,"tipos"=>$tipos,"actividades"=>$actividades]);
    }

    public function storepj(Request $request)
    {

        $request->validate(
            [
                'razon_s'=> 'required',
                'id'=> 'required|unique:PROVEEDORES',
                'ta_e'=> 'required',
                'tipo_s'=>'required',
                'pais'=> 'required',
                'departamento'=> 'required',
                'municipio'=>'required',
                'email'=>'required|email|unique:TBL_USUARIOS_STAKE',
                'direccion'=>'required',
                'actividad'=>'required'

            ],
            [
                'razon_s.required' => 'Tipo de rayon social es requerida',
                'id.required' => 'El nit es requerido',
                'id.unique' => 'El nit ya esta  registrado',
                'ta_e.required' => 'El tamaño de la empresa es requerido',
                'pais.required' => 'El departamento es requerido',
                'departamento.required' => 'El departamento es requerido',
                'municipio.required' => 'El municipio es requerido',
                'email.required' => 'El correo es requerido',
                'email.email' => 'El correo debe ser real ej. example@example.com',
                'email.unique' => 'El correo ya esta  registrado',
                'direccion.required' => 'La dirección es requerido',
                'actividad.required' => 'El codigo CIUU es requerido',
                'tipo_s.required' => 'Tipo de sociedad es requerido',


            ]
            );
           try {


            $proveedor = new ProveedorModel();
            if (isset($request->dv) && !empty($request->dv)) {
                $proveedor->DV = $request->dv;

            }else {
                 $proveedor->DV = 0;
            }
            $proveedor->id = $request->id;

            $proveedor->TipoID ="Nit";

            //nombres
            $proveedor->Mail=$request->email;
            $proveedor->tipo_s=$request->tipo_s;


            $proveedor->Nombre =$request->razon_s;
            $proveedor->juridico=1;
            $proveedor->Departamento=$request->departamento;
            $proveedor->Ciudad=$request->municipio;
            $proveedor->Pais=$request->pais;
            $proveedor->Telefono1=$request->Telefono;
            $proveedor->Telefono2=" ";
            $proveedor->Direccion=$request->direccion;
            $proveedor->pagina_web=$request->pagina;
            $proveedor->tamano=$request->ta_e;
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
            $proveedor->juridico=1;


            //$proveedor->ReferenciaTelefono2=$request->nombre1;
            $proveedor->Cupo=0;
            $proveedor->Plazo=0;
            $proveedor->Saldo=0;
            $proveedor->Enabled=1;

            //return $proveedor;

            if ($proveedor->save()) {

                    $user = User::create([
                        'name' => $request->razon_s,
                        'email' => $request->email,
                        'password' => Hash::make($request->password),
                        'rol' => 2,
                        'Natural' => 0,

                        'ManejoRP'=> $request->grupo1 ,
                        'Observacion1'=> $request->Observacion."" ,
                        'EjercidoPPOP'=> $request->grupo2 ,
                        'Observacion2'=> $request->Observacion2."" ,
                        'Reconocimiento'=> $request->grupo3,
                        'Observacion3'=> $request->Observacion3."",
                        'VincuPExpuesta'=> $request->grupo4 ,
                        'Observacion4'=> $request->Observacion4."" ,
                        'ObligacionTE'=> $request->grupo5 ,
                        'Observacion5'=> $request->Observacion5."",
                        'OrganizacionI'=> $request->grupo6,
                        'Observacion6'=> $request->Observacion6."" ,
                        'ObligacionP'=> $request->grupo7,
                        'Observacion7'=> $request->Observacion7.""
                        ]);


            }


            return redirect('/actividad/'.$user->id);

            //return redirect('/actividad/');
            } catch (\Throwable $th) {
                throw $th;
            }

    }

    public function editarpj2(Request $request)
    {

        $request->validate(
            [
                'razon_s'=> 'required',
                'id'=> 'required',
                'ta_e'=> 'required',
                'tipo_s'=>'required',
                'pais'=> 'required',
                'departamento'=> 'required',
                'municipio'=>'required',
                'email'=>'required|email|unique:TBL_USUARIOS_STAKE',
                'direccion'=>'required',
                'actividad'=>'required'

            ],
            [
                'razon_s.required' => 'Tipo de rayon social es requerida',
                'id.required' => 'El nit es requerido',
                'ta_e.required' => 'El tamaño de la empresa es requerido',
                'pais.required' => 'El departamento es requerido',
                'departamento.required' => 'El departamento es requerido',
                'municipio.required' => 'El municipio es requerido',
                'email.required' => 'El correo es requerido',
                'email.email' => 'El correo debe ser real ej. example@example.com',
                'email.unique' => 'El correo ya esta  registrado',
                'direccion.required' => 'La dirección es requerido',
                'actividad.required' => 'El codigo CIUU es requerido',
                'tipo_s.required' => 'Tipo de sociedad es requerido',


            ]
            );
           try {

            $proveedor =  ProveedorModel::where('id',$request->id)->first();
            if ($proveedor) {
                if (isset($request->dv) && !empty($request->dv)) {
                    $proveedor->DV = $request->dv;

                }else {
                     $proveedor->DV = 0;
                }

                $proveedor->TipoID ="Nit";

                //nombres
                $proveedor->Mail=$request->email;
                $proveedor->tipo_s=$request->tipo_s;


                $proveedor->Nombre =$request->razon_s;
                $proveedor->juridico=1;
                $proveedor->Departamento=$request->departamento;
                $proveedor->Ciudad=$request->municipio;
                $proveedor->Pais=$request->pais;
                $proveedor->Telefono1=$request->Telefono;
                $proveedor->Telefono2=" ";
                $proveedor->Direccion=$request->direccion;
                $proveedor->pagina_web=$request->pagina;
                $proveedor->tamano=$request->ta_e;
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
                $proveedor->juridico=1;


                //$proveedor->ReferenciaTelefono2=$request->nombre1;
                $proveedor->Cupo=0;
                $proveedor->Plazo=0;
                $proveedor->Saldo=0;
                $proveedor->Enabled=1;

                //return $proveedor;

                if ($proveedor->save()) {

                        $user = User::create([
                            'name' => $request->razon_s,
                            'email' => $request->email,
                            'password' => Hash::make($request->password),
                            'rol' => 2,
                            'Natural' => 0,

                            'ManejoRP'=> $request->grupo1 ,
                            'Observacion1'=> $request->Observacion."" ,
                            'EjercidoPPOP'=> $request->grupo2 ,
                            'Observacion2'=> $request->Observacion2."" ,
                            'Reconocimiento'=> $request->grupo3,
                            'Observacion3'=> $request->Observacion3."",
                            'VincuPExpuesta'=> $request->grupo4 ,
                            'Observacion4'=> $request->Observacion4."" ,
                            'ObligacionTE'=> $request->grupo5 ,
                            'Observacion5'=> $request->Observacion5."",
                            'OrganizacionI'=> $request->grupo6,
                            'Observacion6'=> $request->Observacion6."" ,
                            'ObligacionP'=> $request->grupo7,
                            'Observacion7'=> $request->Observacion7.""
                            ]);


                }


                return redirect('/actividad/'.$user->id);
            }else{


                $proveedor = new ProveedorModel();
                if (isset($request->dv) && !empty($request->dv)) {
                    $proveedor->DV = $request->dv;

                } else {
                    $proveedor->DV = 0;
                }
                $proveedor->id = $request->id;

                $proveedor->TipoID ="Nit";

                //nombres
                $proveedor->Mail=$request->email;
                $proveedor->tipo_s=$request->tipo_s;


                $proveedor->Nombre =$request->razon_s;
                $proveedor->juridico=1;
                $proveedor->Departamento=$request->departamento;
                $proveedor->Ciudad=$request->municipio;
                $proveedor->Pais=$request->pais;
                $proveedor->Telefono1=$request->Telefono;
                $proveedor->Telefono2=" ";
                $proveedor->Direccion=$request->direccion;
                $proveedor->pagina_web=$request->pagina;
                $proveedor->tamano=$request->ta_e;
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
                $proveedor->juridico=1;


                //$proveedor->ReferenciaTelefono2=$request->nombre1;
                $proveedor->Cupo=0;
                $proveedor->Plazo=0;
                $proveedor->Saldo=0;
                $proveedor->Enabled=1;

                //return $proveedor;

                if ($proveedor->save()) {

                    $user = User::create([
                        'name' => $request->razon_s,
                        'email' => $request->email,
                        'password' => Hash::make($request->password),
                        'rol' => 2,
                        'Natural' => 0,
                        'ManejoRP'=> $request->grupo1 ,
                        'Observacion1'=> $request->Observacion."" ,
                        'EjercidoPPOP'=> $request->grupo2 ,
                        'Observacion2'=> $request->Observacion2."" ,
                        'Reconocimiento'=> $request->grupo3,
                        'Observacion3'=> $request->Observacion3."",
                        'VincuPExpuesta'=> $request->grupo4 ,
                        'Observacion4'=> $request->Observacion4."" ,
                        'ObligacionTE'=> $request->grupo5 ,
                        'Observacion5'=> $request->Observacion5."",
                        'OrganizacionI'=> $request->grupo6,
                        'Observacion6'=> $request->Observacion6."" ,
                        'ObligacionP'=> $request->grupo7,
                        'Observacion7'=> $request->Observacion7.""
                        ]);


                }


                return redirect('/actividad/'.$user->id);
            }

            //return redirect('/actividad/');
            } catch (\Throwable $th) {
                throw $th;
            }

    }

    public function editpj(Request $request,$id)
    {

       // return $id;

        $request->validate(
            [
                'razon_s'=> 'required',
                'id'=> 'required',
                'ta_e'=> 'required',
                'tipo_s'=>'required',
                'pais'=> 'required',
                'departamento'=> 'required',
                'municipio'=>'required',
                'email'=>'required|email',
                'direccion'=>'required',
                'actividad'=>'required'

            ],
            [
                'razon_s.required' => 'Tipo de rayon social es requerida',
                'id.required' => 'El nit es requerido',
                'ta_e.required' => 'El tamaño de la empresa es requerido',
                'pais.required' => 'El departamento es requerido',
                'departamento.required' => 'El departamento es requerido',
                'municipio.required' => 'El municipio es requerido',
                'email.required' => 'El correo es requerido',
                'email.email' => 'El correo debe ser real ej. example@example.com',
                'direccion.required' => 'La dirección es requerido',
                'actividad.required' => 'El codigo CIUU es requerido',
                'tipo_s.required' => 'Tipo de sociedad es requerido',


            ]
            );
           try {

            $user = User::where('id',$id)->first();

            $proveedor = ProveedorModel::where('Mail',$user->email)->first();
            if (isset($request->dv) && !empty($request->dv)) {
                $proveedor->DV = $request->dv;

            }else {
                 $proveedor->DV = 0;
            }
            $proveedor->id = $request->id;

            $proveedor->TipoID ="Nit";

            //nombres
            $proveedor->Mail=$request->email;
            $proveedor->tipo_s=$request->tipo_s;


            $proveedor->Nombre =$request->razon_s;
            $proveedor->juridico=1;
            $proveedor->Departamento=$request->departamento;
            $proveedor->Ciudad=$request->municipio;
            $proveedor->Pais=$request->pais;
            $proveedor->Telefono1=$request->Telefono;
            $proveedor->Telefono2=" ";
            $proveedor->Direccion=$request->direccion;
            $proveedor->pagina_web=$request->pagina;
            $proveedor->tamano=$request->ta_e;
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
            $proveedor->juridico=1;


            //$proveedor->ReferenciaTelefono2=$request->nombre1;
            $proveedor->Cupo=0;
            $proveedor->Plazo=0;
            $proveedor->Saldo=0;
            $proveedor->Enabled=1;

            //return $proveedor;

            if ($proveedor->save()) {


                        $user->name = $request->razon_s;
                        $user->email = $request->email;
                        $user->password = Hash::make($request->password);
                        $user->rol = 2;
                        $user->ManejoRP= $request->grupo1 ;
                        $user->Observacion1= $request->Observacion."" ;
                        $user->EjercidoPPOP= $request->grupo2 ;
                        $user->Observacion2= $request->Observacion2."" ;
                        $user->Reconocimiento= $request->grupo3;
                        $user->Observacion3= $request->Observacion3."";
                        $user->VincuPExpuesta= $request->grupo4 ;
                        $user->Observacion4= $request->Observacion4."" ;
                        $user->ObligacionTE= $request->grupo5 ;
                        $user->Observacion5= $request->Observacion5."";
                        $user->OrganizacionI= $request->grupo6;
                        $user->Observacion6= $request->Observacion6."" ;
                        $user->ObligacionP= $request->grupo7;
                        $user->Observacion7= $request->Observacion7."";

                        $user->save();


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
