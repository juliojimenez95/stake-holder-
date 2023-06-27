<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\MunicipioModel;
use App\Models\DepartamentoModel;
use Exception;
use App\Models\actividad_economicaModel;
use App\Models\ClienteModel;
use App\Models\Cliente_DomicilioModel;
use App\Models\DomicilioModel;
use App\Models\ContactoModel;
use App\Models\RepresentanteLegalModel;
use App\Models\InformacionTributariaModel;
use App\Models\InformacionFinancieraModel;
use App\Models\InformacionBancariaModel;
use App\Models\personaExpuestaModel;
use App\Models\PaisModel;
use App\Models\AccionistaModel;
use App\Models\AutorizacionModel;
use App\Models\origenDeFondoModel;
use App\Models\PagareModel;
use App\Models\User;
use App\Models\AnexoModel;
use App\Models\ProveedorModel;


use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Hash;


class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function socios_accionistas($id)
    {
        $tipos=['N/D','CC','RC','TI','NIT','PAS','DIE'];
        $accionistas = AccionistaModel::where('user_id',$id)->get();

        $origen = origenDeFondoModel::where('user_id',$id)->first();

        //return $origen;

        if ($origen) {
            return view("editar.socios_accionistas",["tipos"=>$tipos,"accionistas"=>$accionistas,
            "id"=>$id,"origen"=>$origen]);
        }else{
            return view("cliente.socios_accionistas",["tipos"=>$tipos,"accionistas"=>$accionistas,
            "id"=>$id]);
        }


    }

    public function perfil($id)
    {
        $user = DB::table('TBL_USUARIOS_STAKE')
        ->join('CLIENTES', 'TBL_USUARIOS_STAKE.email', '=', 'CLIENTES.Mail')
        ->join('CLIENTES_DOMICILIOS', 'CLIENTES.ID', '=', 'CLIENTES_DOMICILIOS.ID_Cliente')
        ->join('DOMICILIOS', 'CLIENTES_DOMICILIOS.Telefono', '=', 'DOMICILIOS.Telefono')
        ->select('TBL_USUARIOS_STAKE.name', 'TBL_USUARIOS_STAKE.email','TBL_USUARIOS_STAKE.id','TBL_USUARIOS_STAKE.ManejoRP',
        'TBL_USUARIOS_STAKE.Observacion1','TBL_USUARIOS_STAKE.EjercidoPPOP','TBL_USUARIOS_STAKE.Observacion2',
        'TBL_USUARIOS_STAKE.Reconocimiento','TBL_USUARIOS_STAKE.Observacion3','TBL_USUARIOS_STAKE.VincuPExpuesta',
        'TBL_USUARIOS_STAKE.Observacion4','TBL_USUARIOS_STAKE.ObligacionTE','TBL_USUARIOS_STAKE.Observacion5',
        'TBL_USUARIOS_STAKE.OrganizacionI','TBL_USUARIOS_STAKE.Observacion6','TBL_USUARIOS_STAKE.ObligacionP',
        'TBL_USUARIOS_STAKE.Observacion7','CLIENTES.Nit','CLIENTES.TipoNit',
        'DOMICILIOS.Direccion','DOMICILIOS.Ciudad','DOMICILIOS.Departamento',
        'DOMICILIOS.Pais','CLIENTES.Natural as Natural','CLIENTES.ActividadEconomica','CLIENTES_DOMICILIOS.Telefono',
        'CLIENTES.pagina_web','CLIENTES.tamano')
        ->where('TBL_USUARIOS_STAKE.id',$id)
        ->first();

        //return $user;



        if ($user->Natural == 1) {
            $tipos=['N/D','CC','RC','TI','NIT','PAS','DIE'];
            $actividades = actividad_economicaModel::get();


            return view("editar.registroC_pn",["user"=>$user,
            "id"=>$id,"tipos"=>$tipos,"actividades"=>$actividades]);

        }else {
            $tipos=['N/D','CC','RC','TI','NIT','PAS','DIE'];
            $actividades = actividad_economicaModel::get();
            $empresas=['Microempresas','Pequeña empresa','Mediana empresa','Grande empresa'];


            return view("editar.registroC_pj",["user"=>$user,
            "id"=>$id,"tipos"=>$tipos,"actividades"=>$actividades,"empresas"=>$empresas]);
        }


    }

    public function perfiladicional($id)
    {
        $user = DB::table('TBL_USUARIOS_STAKE')
        ->select('TBL_USUARIOS_STAKE.ManejoRP',
        'TBL_USUARIOS_STAKE.Observacion1','TBL_USUARIOS_STAKE.EjercidoPPOP','TBL_USUARIOS_STAKE.Observacion2',
        'TBL_USUARIOS_STAKE.Reconocimiento','TBL_USUARIOS_STAKE.Observacion3','TBL_USUARIOS_STAKE.VincuPExpuesta',
        'TBL_USUARIOS_STAKE.Observacion4','TBL_USUARIOS_STAKE.ObligacionTE','TBL_USUARIOS_STAKE.Observacion5',
        'TBL_USUARIOS_STAKE.OrganizacionI','TBL_USUARIOS_STAKE.Observacion6','TBL_USUARIOS_STAKE.ObligacionP',
        'TBL_USUARIOS_STAKE.Observacion7')
        ->where('TBL_USUARIOS_STAKE.id',$id)
        ->get();

        return  response()->json([
            "user"=>$user
        ]);


    }

    public function perfilrepresentante($id)
    {
        $user = RepresentanteLegalModel::where('user_id',$id)->first();

        return  response()->json([
            "user"=>$user
        ]);


    }


    public function storeaccionistas(Request $request,$id)
    {
           $request->validate(
            [
                'Nombre'=> 'required',
                'tipo_d'=> 'required',
                'documento'=> 'required',
                'participacion'=>'required|numeric',
                'Nacionalidad'=>'required',
                'PEP'=>'required',


            ],
            [
                'Nombre.required' => 'El nombre  es requerido',
                'tipo_d.required' => 'Tipo de documento es requerido',
                'documento.required' => 'Documento es requerido',
                'participacion.required' => 'La participacion es requerida',
                'participacion.required' => 'La participacion debe ser un número',
                'Nacionalidad.required' => 'La nacionalidad es requerida',
            ]
            );
           try {
                $accionista = new AccionistaModel();

                $accionista->Nombres = $request->Nombre;
                $accionista->TipoNit = $request->tipo_d;
                $accionista->Nit = $request->documento;
                $accionista->Participacion = floatval($request->participacion);
                $accionista->Nacionalidad = $request->Nacionalidad;
                $accionista->PEP = $request->PEP;
                $accionista->user_id = $id;

            if ($accionista->save()) {

            }


            return back();

            //return redirect('/actividad/');
            } catch (\Throwable $th) {
                throw $th;
            }
    }

    public function storepersonaE(Request $request,$id)
    {
           $request->validate(
            [
                'Nombre'=> 'required',
                'tipo_d'=> 'required',
                'Nacionalidad'=>'required',

            ],
            [
                'Nombre.required' => 'El nombre  es requerido',
                'tipo_d.required' => 'Tipo de documento es requerido',
                'Nacionalidad.required' => 'La nacionalidad es requerida',
            ]
            );
           try {
                $personaE = new personaExpuestaModel();

                $personaE->Nombres = $request->Nombre;
                $personaE->TipoNit = $request->tipo_d;
                $personaE->Nacionalidad = $request->Nacionalidad;
                $personaE->Cargo = $request->Cargo;
                $personaE->PEP = 1;
                $personaE->Nit = 0;
                $personaE->user_id = $id;

            if ($personaE->save()) {

            }


            return redirect('/cliente/contacto/'.$id);

            } catch (\Throwable $th) {
                throw $th;
            }
    }

    public function editpersonaE(Request $request,$id)
    {
           $request->validate(
            [
                'Nombre'=> 'required',
                'tipo_d'=> 'required',
                'Nacionalidad'=>'required',

            ],
            [
                'Nombre.required' => 'El nombre  es requerido',
                'tipo_d.required' => 'Tipo de documento es requerido',
                'Nacionalidad.required' => 'La nacionalidad es requerida',
            ]
            );
           try {
                $personaE =  personaExpuestaModel::where('user_id',$id)->first();

                $personaE->Nombres = $request->Nombre;
                $personaE->TipoNit = $request->tipo_d;
                $personaE->Nacionalidad = $request->Nacionalidad;
                $personaE->Cargo = $request->Cargo;
                $personaE->PEP = 1;
                $personaE->Nit = 0;
                $personaE->user_id = $id;

            if ($personaE->save()) {

            }


            return redirect('/cliente/contacto/'.$id);

            } catch (\Throwable $th) {
                throw $th;
            }
    }

    public function documentos_anexos($id)
    {
        $user = user::where('id',$id)->first();
        if ($user->rol ==1 ) {
                $cliente = ClienteModel::where('Mail',$user->email)->first();
                if ($cliente->Natural == 1) {
                    $anexos = AnexoModel::where('user_id',$id)->first();

                    if($anexos){
                        return view("editar.documentos_anexosn",['id'=>$id,'anexos'=>$anexos]);

                    }else{
                        return view("cliente.documentos_anexosn",['id'=>$id]);

                    }
                } else {
                    $anexos = AnexoModel::where('user_id',$id)->first();

                    if($anexos){
                        return view("editar.documentos_anexos",['id'=>$id,'anexos'=>$anexos]);

                    }else{
                        return view("cliente.documentos_anexos",['id'=>$id]);

                    }
                }

        } else {
            $proveedor = ProveedorModel::where('Mail',$user->email)->first();
                if ($proveedor->juridico != 1) {
                    $anexos = AnexoModel::where('user_id',$id)->first();

                    if($anexos){
                        return view("editar.documentos_anexosn",['id'=>$id,'anexos'=>$anexos]);

                    }else{
                        return view("cliente.documentos_anexosn",['id'=>$id]);

                    }
                } else {
                    $anexos = AnexoModel::where('user_id',$id)->first();

                    if($anexos){
                        return view("editar.documentos_anexos",['id'=>$id,'anexos'=>$anexos]);

                    }else{
                        return view("cliente.documentos_anexos",['id'=>$id]);

                    }
                }

               // return back();
        }


    }

     public function identificacion()
    {
        return view("cliente.identificacion");
    }

    public function conocimiento($id)
    {
        $tipos=['N/D','CC','RC','TI','NIT','PAS','DIE'];
        $personaE =  personaExpuestaModel::where('user_id',$id)->first();
        if ($personaE) {
            return view("editar.conocimiento",["tipos"=>$tipos,'id'=>$id,'personaE'=>$personaE]);

        }else{
            return view("cliente.conocimiento",["tipos"=>$tipos,'id'=>$id]);

        }
    }

    public function declaracion($id)
    {
        $autorizacion =  AutorizacionModel::where('user_id',$id)->first();

        if ($autorizacion) {
            return view("editar.declaracion",['id'=>$id,'autorizacion'=>$autorizacion]);

        } else {
            return view("cliente.declaracion",['id'=>$id]);

        }


    }


    public function declaracioninf($id)
    {
        $autorizacion =  AutorizacionModel::where('user_id',$id)->first();

        return  response()->json([
            'autorizacion'=>$autorizacion
        ]);


    }



    public function storedeclaracion(Request $request,$id)
    {
         /*  $request->validate(
            [
                'grupo1'=> 'required',
                'grupo2'=> 'required',
                'grupo3'=>'required',
                'grupo4'=>'required',
                'grupo5'=>'required',

            ],
            [
                'grupo1.required' => 'La autorizacion  es requerida',
                'grupo2.required' => 'La autorizacion es requerida',
                'grupo3.required' => 'La declaracion es requerida',
                'grupo4.required' => 'La autorizacion es requerida',
                'grupo5.required' => 'La autorizacion es requerida'
            ]
            );*/
           try {
                $autorizacion = new AutorizacionModel();

                $autorizacion->Autorizacion_datos = $request->grupo1;
                $autorizacion->Autorizacion_riesgos = $request->grupo2;
                $autorizacion->Declaracion_fondos = $request->grupo3;
                $autorizacion->Cumplimiento_etico = $request->grupo4;
                $autorizacion->Cumplimiento_anticorrupcion = $request->grupo5;
                $autorizacion->user_id = $id;

            if ($autorizacion->save()) {

            }


            return redirect('/home');

            //return redirect('/actividad/');
            } catch (\Throwable $th) {
                throw $th;
            }
    }

    public function editdeclaracion(Request $request,$id)
    {
         /*  $request->validate(
            [
                'grupo1'=> 'required',
                'grupo2'=> 'required',
                'grupo3'=>'required',
                'grupo4'=>'required',
                'grupo5'=>'required',

            ],
            [
                'grupo1.required' => 'La autorizacion  es requerida',
                'grupo2.required' => 'La autorizacion es requerida',
                'grupo3.required' => 'La declaracion es requerida',
                'grupo4.required' => 'La autorizacion es requerida',
                'grupo5.required' => 'La autorizacion es requerida'
            ]
            );*/
           try {
                $autorizacion = AutorizacionModel::where('user_id',$id)->first();

                $autorizacion->Autorizacion_datos = $request->grupo1;
                $autorizacion->Autorizacion_riesgos = $request->grupo2;
                $autorizacion->Declaracion_fondos = $request->grupo3;
                $autorizacion->Cumplimiento_etico = $request->grupo4;
                $autorizacion->Cumplimiento_anticorrupcion = $request->grupo5;
                $autorizacion->user_id = $id;

            if ($autorizacion->save()) {

            }


            return redirect('/home');

            //return redirect('/actividad/');
            } catch (\Throwable $th) {
                throw $th;
            }
    }

    public function informacion($id)
    {
        return view("cliente.informacion",['id'=>$id]);
    }
    public function informaciont($id)
    {
        $informacion = InformacionTributariaModel::where('Cliente_id',$id)->first();
        //return $informacion;
        if ($informacion) {
            return view("editar.informacion_tributaria",['id'=>$id,'informacion'=>$informacion]);

        }else {
            return view("cliente.informacion_tributaria",['id'=>$id]);

        }
    }

    public function informaciontributaria($id)
    {
        $informacion = InformacionTributariaModel::where('Cliente_id',$id)->first();
        return  response()->json([
            'informacion'=>$informacion
        ]);

    }

    public function informacionf($id)
    {

        $informacion = InformacionFinancieraModel::where('user_id',$id)->first();

        //return $informacion;

        if ($informacion) {
            return view("editar.informacion_financiera",['id'=>$id,'informacion'=>$informacion]);

        }else {
            return view("cliente.informacion_financiera",['id'=>$id]);

        }

    }

    public function informacionb($id)
    {
        $bancos=["BANCO DE BOGOTA","BANCO DE POPULAR","BANCO DE ITAU","BANCOLOMBIA","CITIBANK",
        "BANCO GNB SUDAMERIS","BANCO BBVA COLOMBIA S.A.","SCOTIABANK COLPATRIA","BANCO DE OCCIDENTE",
        "BANCO CAJA SOCIAL","BANCO AGRARIO","BANCO DAVIVIENDA","BANCO AV VILLAS","BANCAMIA S.A.",
        "BANCO PICHINCHA S.A.","BANCOOMEVA S.A.","BANCO DE BOGOTA","BANCO FALABELLA","BANCO FINANDINA S.A. BIC",
        "BANCO SANTANDER COLOMBIA","BANCO COOPERATIVO COOPCENTRAL","BANCO SERFINANZA","LULO BANK","DALE",
        "RAPPIPAY DAVIDPLATA","CFA COOPERATIVA FINANCIERA","COTRAFA","COOFINEP COOPERATIVA FINANCIERA",
        "CONFIAR COOPERATIVA FINANCIERA","BANCO UNION antes GIROS","COLTEFINANCIERA","NEQUI","DAVIPLATA",
        "BANCO CREDIFINANCIERA","IRIS","MOVII S.A."];
        $cuentas=["AHORROS","CORRIENTE"];
        $informacion = InformacionBancariaModel::where('user_id',$id)->first();
        if ($informacion) {
            return view("editar.informacion_bancaria",["bancos"=>$bancos,"cuentas"=>$cuentas,'id'=>$id,'informacion'=>$informacion]);

        }else {
            return view("cliente.informacion_bancaria",["bancos"=>$bancos,"cuentas"=>$cuentas,'id'=>$id]);

        }
    }

    public function pagare($id)
    {
        $pagare = PagareModel::where('user_id',$id)->first();
        if ($pagare) {
            return view("editar.pagare",['id'=>$id,'pagare'=> $pagare]);
        }else {
            return view("cliente.pagare",['id'=>$id,]);

        }
    }

    public function destroysocio( $id)
    {
        $accionista = AccionistaModel::findOrFail($id);
        $accionista->delete();

        return back();
    }

    public function pagareinf($id)
    {
        $pagare = PagareModel::where('user_id',$id)->first();

        return  response()->json([
            'pagare'=>$pagare
        ]);
    }
    public function storePagare($id)
    {
        return view("cliente.pagare",['id'=>$id]);
    }

    public function actividad($id)
    {
        $tipos=['N/D','CC','RC','TI','NIT','PAS','DIE'];
        $actividades = actividad_economicaModel::get();
        $Representante = RepresentanteLegalModel::where('user_id',$id)->first();
        //return $Representante;
        if ($Representante) {
            return view("editar.actividad_economica",["actividades"=>$actividades,'id'=>$id, 'tipos'=>$tipos,'Representante'=>$Representante]);

        }else{
        return view("cliente.actividad_economica",["actividades"=>$actividades,'id'=>$id, 'tipos'=>$tipos]);

        }
    }
    public function listarMunicipios()
    {
        try {
            $departamentos = DepartamentoModel::all();
            $municipios = MunicipioModel::all();

            return  response()->json([
                'departamentos'=>$departamentos,
                'municipios'=>$municipios
            ]);
        }catch(Exception $e) {
            return $e->getMessage();


        }
    }

    public function listarpaises()
    {
        try {
            $pais = PaisModel::all();
            $departamentos = DepartamentoModel::all();
            $municipios = MunicipioModel::all();

            return  response()->json([
                'pais'=>$pais,
                'departamentos'=>$departamentos,
                'municipios'=>$municipios
            ]);
        }catch(Exception $e) {
            return $e->getMessage();


        }
    }

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


            $cliente = new ClienteModel();

            $cliente->DV = 0;

            //nombres
            $cliente->Nombre =$request->Nombre;
            $cliente->Nombre1=" ";
            $cliente->Nombre2= " ";
            $cliente->Apellido1=" ";
            $cliente->Apellido2=" ";
            //documento tipo y verificacion
            $cliente->Nit=$request->n_docuemnto;
            $cliente->Regimen="";
            $cliente->Movil="";
            $cliente->TipoNit=$request->tipo_d;
            //
            //$cliente->Regimen=$request->regimen;
            $cliente->BirthDay=" ";
            $cliente->BirthMonth=" ";
            //email e ingreso
            $cliente->Mail=$request->email;
            $cliente->FechaIngreso=date('Y-m-d');
            //$cliente->Contacto=$request->nombre1;
            $cliente->Credito=0;
            $cliente->Referencia=$request->referencia;
            $cliente->ReferenciaTelefono1=$request->referencia_t;
            $cliente->ReferenciaTelefono2="";

            //$cliente->ReferenciaTelefono2=$request->nombre1;
            $cliente->Cupo=0;
            $cliente->Plazo=0;
            $cliente->Saldo=0;
            $cliente->Bloqueo='1900-01-01 00:00:00';
            $cliente->Medio=$request->medio;
            $cliente->Observaciones='Registrado';
            $cliente->Institucional=0;
            $cliente->Retenedor=0;
            //$cliente->RetenedorModo="N/A";
            $cliente->Notificacion=0;
            $cliente->Enabled=1;
            $cliente->Natural=1;

            $cliente->ActividadEconomica=$request->actividad;
            //$cliente->GranContribuyente=$request->nombre1;
           // $cliente->Sexo=" ";
            $cliente->Contacto="";

            $cliente->Medio=" ";
            if ($cliente->save()) {
                $cliente2 = ClienteModel::where('Nit', $request->n_docuemnto)->first();

                //return  $request->Telefono;






                DomicilioModel::create([
                    'Telefono' => $request->Telefono,
                    'Direccion' => $request->direccion,
                    'Ciudad' => $request->municipio,
                    //'ID_Ruta' => $request->ruta,
                    'Departamento' => $request->departamento,
                    'Pais' => "COLOMBIA",
                    'CodigoPostal' => 0,
                    'Enabled' => 1,

                    //'Domicilio' => $request->complemento3
                    //documento tipo y verificacion



                    ]);


                    if ($cliente2) {
                        Cliente_DomicilioModel::create([
                            'Telefono' => $request->Telefono,
                            'ID_Cliente' => $cliente2->ID,

                        ]);
                    }else{
                        return back();
                    }

                   /* $cliente_domicilio = new Cliente_DomicilioModel();

                    $cliente_domicilio->Telefono = $request->Telefono;
                    $cliente_domicilio->ID_Cliente = $cliente2->ID;
                    $cliente_domicilio->save();*/






                    $user = User::create([
                        'name' => $request->Nombre,
                        'email' => $request->email,
                        'password' => Hash::make($request->password),
                        'rol' => 1,
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


            $cliente = ClienteModel::where('Mail',$user->email)->first();

            $domicilio_cliente = Cliente_DomicilioModel::where('ID_Cliente',$cliente->ID)->first();
            $domicilio = DomicilioModel::where('Telefono',$domicilio_cliente->Telefono)->first();

            $cliente->DV = 0;

            //nombres
            $cliente->Nombre =$request->Nombre;
            $cliente->Nombre1=" ";
            $cliente->Nombre2= " ";
            $cliente->Apellido1=" ";
            $cliente->Apellido2=" ";
            //documento tipo y verificacion
            $cliente->Nit=$request->n_docuemnto;
            $cliente->Regimen="";
            $cliente->Movil="";
            $cliente->TipoNit=$request->tipo_d;
            //
            //$cliente->Regimen=$request->regimen;

            $cliente->BirthMonth=" ";
            //email e ingreso
            $cliente->Mail=$request->email;
            $cliente->FechaIngreso=date('Y-m-d');
            //$cliente->Contacto=$request->nombre1;

            $cliente->Referencia=$request->referencia;
            $cliente->ReferenciaTelefono1=$request->referencia_t;
            $cliente->ReferenciaTelefono2="";

            //$cliente->ReferenciaTelefono2=$request->nombre1;

            $cliente->Bloqueo='1900-01-01 00:00:00';
            $cliente->Medio=$request->medio;
            $cliente->Observaciones='Registrado';

            //$cliente->RetenedorModo="N/A";


            $cliente->ActividadEconomica=$request->actividad;
            //$cliente->GranContribuyente=$request->nombre1;

            $cliente->Contacto="";

            $cliente->Medio=" ";
            if ($cliente->save()) {
                $cliente2 = ClienteModel::where('Nit', $request->n_docuemnto)->first();

                //return  $cliente2;




                    $domicilio->Telefono = $request->Telefono;
                    $domicilio->Direccion = $request->direccion;
                    $domicilio->Ciudad = $request->municipio;
                    //domicilio->/'ID_Ruta' => $request->ruta;
                    $domicilio->Departamento = $request->departamento;
                    $domicilio->Pais = "COLOMBIA";
                    $domicilio->CodigoPostal = 0;
                    $domicilio->Enabled = 1;

                    $domicilio->save();

                    //'Domicilio' => $request->complemento3
                    //documento tipo y verificacion




                        $domicilio_cliente->Telefono = $request->Telefono;


                        $user->name = $request->Nombre;
                        $user->email = $request->email;
                        $user->password = Hash::make($request->password);
                        $user->rol = 1;
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


                    $domicilio_cliente->save();


            }


            return redirect('/conocimiento/'.$user->id);

            //return redirect('/actividad/');
            } catch (\Throwable $th) {
                throw $th;
            }




    }

    public function storepj(Request $request)
    {

        $request->validate(
            [
                'razon_s'=> 'required',
                'nit'=> 'required|numeric',
                'ta_e'=> 'required',
                'pais'=> 'required',
                'departamento'=> 'required',
                'municipio'=>'required',
                'email'=>'required|email|unique:TBL_USUARIOS_STAKE',
                'Telefono'=>'required|unique:DOMICILIOS',
                'direccion'=>'required',
                'actividad'=>'required',
                'tipo_s'=>'required',


            ],
            [
                'razon_s.required' => 'Tipo de rayon social es requerida',
                'nit.required' => 'El NIT es requerido',
                'ta_e.required' => 'El tamaño de la empresa es requerido',
                'departamento.required' => 'El departamento es requerido',
                'municipio.required' => 'El municipio es requerido',
                'email.required' => 'El correo es requerido',
                'email.email' => 'El correo debe ser real ej. example@example.com',
                'email.unique' => 'El correo ya esta  registrado',
                'Telefono.required' => 'El telefono es requerido',
                'Telefono.unique' => 'El telefono ya esta registrado',
                'direccion.required' => 'La dirección es requerido',
                'tipo_s.required' => 'Tipo de sociedad es requerido',


            ]
            );
           try {


            $cliente = new ClienteModel();

            $cliente->DV = 0;

            //nombres
            $cliente->Nombre =$request->razon_s;
            $cliente->Nombre1=" ";
            $cliente->Nombre2= " ";
            $cliente->Apellido1=" ";
            $cliente->Apellido2=" ";
            //documento tipo y verificacion pagina_web
            $cliente->Nit=$request->nit;
            $cliente->pagina_web=$request->pagina;
            $cliente->tamano=$request->ta_e;
            $cliente->tipo_s=$request->tipo_s;


            $cliente->Regimen="";
            $cliente->Movil="";
            $cliente->TipoNit="Nit";
            //
            //$cliente->Regimen=$request->regimen;

            $cliente->BirthMonth=" ";

            //email e ingreso
            $cliente->Mail=$request->email;
            $cliente->FechaIngreso=date('Y-m-d');
            //$cliente->Contacto=$request->nombre1;
            $cliente->Credito=0;
            $cliente->Referencia="";
            $cliente->ReferenciaTelefono1="";
            $cliente->ReferenciaTelefono2="";

            //$cliente->ReferenciaTelefono2=$request->nombre1;
            $cliente->Cupo=0;
            $cliente->Plazo=0;
            $cliente->Saldo=0;
            $cliente->Bloqueo='1900-01-01 00:00:00';
            $cliente->Medio=$request->medio;
            $cliente->Observaciones='Registrado';
            $cliente->Institucional=0;
            $cliente->Retenedor=0;
            //$cliente->RetenedorModo="N/A";
            $cliente->Notificacion=0;
            $cliente->Enabled=1;
            $cliente->Natural=0;

            $cliente->ActividadEconomica=$request->actividad;
            //$cliente->GranContribuyente=$request->nombre1;

            $cliente->Contacto="";

            $cliente->Medio=" ";
            if ($cliente->save()) {
                $cliente2 = ClienteModel::where('Nit', $request->nit)->first();

                //return  $cliente2;



                DomicilioModel::create([
                    'Telefono' => $request->Telefono,
                    'Direccion' => $request->direccion,
                    'Ciudad' => $request->municipio,
                    //'ID_Ruta' => $request->ruta,
                    'Departamento' => $request->departamento,
                    'Pais' => "COLOMBIA",
                    'CodigoPostal' => 0,
                    'Enabled' => 1,

                    //'Domicilio' => $request->complemento3
                    //documento tipo y verificacion

                    ]);

                    if ($cliente2) {
                        Cliente_DomicilioModel::create([
                            'Telefono' => $request->Telefono,
                            'ID_Cliente' => $cliente2->ID,

                        ]);
                    }else{
                        return back();
                    }

                    /*$cliente_domicilio = new Cliente_DomicilioModel();

                    $cliente_domicilio->Telefono = $request->Telefono;
                    $cliente_domicilio->ID_Cliente = $cliente2->ID;
                    $cliente_domicilio->save();*/


                    $user = User::create([
                        'name' => $request->razon_s,
                        'email' => $request->email,
                        'password' => Hash::make($request->password),
                        'rol' => 1,
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


    public function editpj(Request $request,$id)
    {

        $request->validate(
            [
                'razon_s'=> 'required',
                'nit'=> 'required|numeric',
                'ta_e'=> 'required',
                'pais'=> 'required',
                'departamento'=> 'required',
                'municipio'=>'required',
                'email'=>'required|email',
                'Telefono'=>'required',
                'direccion'=>'required',
                'actividad'=>'required',
                'tipo_s'=>'required',


            ],
            [
                'razon_s.required' => 'Tipo de rayon social es requerida',
                'nit.required' => 'El NIT es requerido',
                'ta_e.required' => 'El tamaño de la empresa es requerido',
                'departamento.required' => 'El departamento es requerido',
                'municipio.required' => 'El municipio es requerido',
                'email.required' => 'El correo es requerido',
                'email.email' => 'El correo debe ser real ej. example@example.com',
                'Telefono.required' => 'El telefono es requerido',
                'Telefono.unique' => 'El telefono ya esta registrado',
                'direccion.required' => 'La dirección es requerido',
                'tipo_s.required' => 'Tipo de sociedad es requerido',


            ]
            );
           try {


            $user = User::where('id',$id)->first();


            $cliente = ClienteModel::where('Mail',$user->email)->first();



            $domicilio_cliente = Cliente_DomicilioModel::where('ID_Cliente',$cliente->ID)->first();
            $domicilio = DomicilioModel::where('Telefono',$domicilio_cliente->Telefono)->first();



            $cliente->DV = 0;

            //nombres
            $cliente->Nombre =$request->razon_s;
            $cliente->Nombre1=" ";
            $cliente->Nombre2= " ";
            $cliente->Apellido1=" ";
            $cliente->Apellido2=" ";
            //documento tipo y verificacion pagina_web
            $cliente->Nit=$request->nit;
            $cliente->pagina_web=$request->pagina;
            $cliente->tamano=$request->ta_e;
            $cliente->tipo_s=$request->tipo_s;


            $cliente->Regimen="";
            $cliente->Movil="";
            $cliente->TipoNit="Nit";
            //
            //$cliente->Regimen=$request->regimen;
            $cliente->BirthDay=" ";
            $cliente->BirthMonth=" ";
            //email e ingreso
            $cliente->Mail=$request->email;
            $cliente->FechaIngreso=date('Y-m-d');
            //$cliente->Contacto=$request->nombre1;
            $cliente->Credito=0;
            $cliente->Referencia="";
            $cliente->ReferenciaTelefono1="";
            $cliente->ReferenciaTelefono2="";

            //$cliente->ReferenciaTelefono2=$request->nombre1;
            $cliente->Cupo=0;
            $cliente->Plazo=0;
            $cliente->Saldo=0;
            $cliente->Bloqueo='1900-01-01 00:00:00';
            $cliente->Medio=$request->medio;
            $cliente->Observaciones='Registrado';
            $cliente->Institucional=0;
            $cliente->Retenedor=0;
            //$cliente->RetenedorModo="N/A";
            $cliente->Notificacion=0;
            $cliente->Enabled=1;
            $cliente->Natural=0;

            $cliente->ActividadEconomica=$request->actividad;
            //$cliente->GranContribuyente=$request->nombre1;
            $cliente->Contacto="";

            $cliente->Medio=" ";
            if ($cliente->save()) {

                //return  $cliente2;




                    $domicilio->Telefono = $request->Telefono;
                    $domicilio->Direccion = $request->direccion;
                    $domicilio->Ciudad = $request->municipio;
                    //$domicilio->'ID_Ruta' => $request->ruta;
                    $domicilio->Departamento = $request->departamento;
                    $domicilio->Pais = "COLOMBIA";
                    $domicilio->CodigoPostal = 0;
                    $domicilio->Enabled = 1;

                    $domicilio->save();

                    //'Domicilio' => $request->complemento3
                    //documento tipo y verificacion


                    $domicilio_cliente->Telefono = $request->Telefono;
                    $domicilio_cliente->ID_Cliente = $cliente->ID;
                    $domicilio_cliente->save();



                        $user->name = $request->razon_s;
                        $user->email = $request->email;
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

    public function contacto($id)
    {

        $contacto = ContactoModel::where('Cliente_id',$id)->first();
        if ($contacto) {
            $tipos=['N/D','CC','RC','TI','NIT','PAS','DIE'];
            //return  $contacto;
            return view("editar.contacto",["tipos"=>$tipos,'id'=>$id,'contacto'=>$contacto]);
        }
        $tipos=['N/D','CC','RC','TI','NIT','PAS','DIE'];
        return view("cliente.contacto",["tipos"=>$tipos,'id'=>$id]);
    }

    public function storecontactopn(Request $request,$id)
    {
           $request->validate(
            [
                'Nombre'=> 'required',
                'tipo_d'=> 'required',
                'n_docuemnto'=>'required',
                'email'=>'required|email',
                'telefono'=>'required',
                'cargo'=>'required',

            ],
            [
                'Nombre.required' => 'El nombre  es requerido',
                'tipo_d.required' => 'Tipo de documento es requerido',
                'n_docuemnto.required' => 'El documento de identidad es requerido',
                'email.required' => 'El correo es requerido',
                'email.email' => 'El correo debe ser real ej. example@example.com',
                'telefono.required' => 'El telefono es requerido',
                'cargo.required' => 'El cargo es requerido',
            ]
            );
           try {
                $contacto = new ContactoModel();

                $contacto->Nombre1 = $request->Nombre;
                $contacto->Nombre2 = "";
                $contacto->Apellido1 = "";
                $contacto->Apellido2 = "";
                $contacto->TipoNit = $request->tipo_d;
                $contacto->Nit = $request->n_docuemnto;
                $contacto->Telefono = $request->telefono;
                $contacto->Cargo = $request->cargo;
                $contacto->Email = $request->email;
                $contacto->Cliente_id = $id;

            if ($contacto->save()) {

            }


            return redirect('/home');

            //return redirect('/actividad/');
            } catch (\Throwable $th) {
                throw $th;
            }
    }

    public function editcontactopn(Request $request,$id)
    {
           $request->validate(
            [
                'Nombre'=> 'required',
                'tipo_d'=> 'required',
                'n_docuemnto'=>'required',
                'email'=>'required|email',
                'telefono'=>'required',
                'cargo'=>'required',

            ],
            [
                'Nombre.required' => 'El nombre  es requerido',
                'tipo_d.required' => 'Tipo de documento es requerido',
                'n_docuemnto.required' => 'El documento de identidad es requerido',
                'email.required' => 'El correo es requerido',
                'email.email' => 'El correo debe ser real ej. example@example.com',
                'telefono.required' => 'El telefono es requerido',
                'cargo.required' => 'El cargo es requerido',
            ]
            );
           try {
                $contacto =  ContactoModel::where('Cliente_id',$id)->first();

                $contacto->Nombre1 = $request->Nombre;
                $contacto->Nombre2 = "";
                $contacto->Apellido1 = "";
                $contacto->Apellido2 = "";
                $contacto->TipoNit = $request->tipo_d;
                $contacto->Nit = $request->n_docuemnto;
                $contacto->Telefono = $request->telefono;
                $contacto->Cargo = $request->cargo;
                $contacto->Email = $request->email;
                $contacto->Cliente_id = $id;

            if ($contacto->save()) {

            }


            return redirect('/home');

            //return redirect('/actividad/');
            } catch (\Throwable $th) {
                throw $th;
            }
    }

    public function storeRepresentante(Request $request,$id)
    {
          $request->validate(
            [
                'p_nombre'=> 'required',
                'tipo_d'=> 'required',
                'documento'=>'required|numeric',
                'email'=>'required|email',
                'telefono'=>'required',
                'cargo'=>'required'

            ],
            [
                'p_nombre.required' => 'El nombre  es requerido',
                'tipo_d.required' => 'Tipo de documento es requerido',
                'documento.required' => 'El documento de identidad es requerido',
                'email.required' => 'El correo es requerido',
                'email.email' => 'El correo debe ser real ej. example@example.com',
                'telefono.required' => 'El telefono es requerido',
                'cargo.required' => 'El cargo es requerido',

            ]
            );
           try {
                $Representante = new RepresentanteLegalModel();


                $Representante->Nombre1 = $request->p_nombre;
                $Representante->TipoNit = $request->tipo_d;
                $Representante->Nit = $request->documento;
                $Representante->Telefono = $request->telefono;
                $Representante->Cargo = $request->cargo;
                $Representante->Email = $request->email;
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

                $Representante->user_id = $id;

                $Representante->save();

                return redirect('/conocimiento/'.$id);

            } catch (\Throwable $th) {
                throw $th;
            }
    }

    public function editRepresentante(Request $request,$id)
    {
          $request->validate(
            [
                'p_nombre'=> 'required',
                'tipo_d'=> 'required',
                'documento'=>'required|numeric',
                'email'=>'required|email',
                'telefono'=>'required',
                'cargo'=>'required'

            ],
            [
                'p_nombre.required' => 'El nombre  es requerido',
                'tipo_d.required' => 'Tipo de documento es requerido',
                'documento.required' => 'El documento de identidad es requerido',
                'email.required' => 'El correo es requerido',
                'email.email' => 'El correo debe ser real ej. example@example.com',
                'telefono.required' => 'El telefono es requerido',
                'cargo.required' => 'El cargo es requerido',

            ]
            );
           try {
                $Representante = RepresentanteLegalModel::where('user_id',$id)->first();


                $Representante->Nombre1 = $request->p_nombre;
                $Representante->TipoNit = $request->tipo_d;
                $Representante->Nit = $request->documento;
                $Representante->Telefono = $request->telefono;
                $Representante->Cargo = $request->cargo;
                $Representante->Email = $request->email;
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

                $Representante->save();

                return redirect('/conocimiento/'.$id);

            } catch (\Throwable $th) {
                throw $th;
            }
    }

    public function storeInformaciont(Request $request,$id)
    {
           $request->validate(
            [
                'email'=>'required|email',
            ],
            [
                'email.required' => 'El correo es requerido',
                'email.email' => 'El correo debe ser real ej. example@example.com',

            ]
            );
           try {
                $Informaciont = new InformacionTributariaModel();

                $Informaciont->ResponsableImpuesto = $request->grupo1;
                $Informaciont->SujetoRetencion = $request->grupo2;
                $Informaciont->Declarar = $request->grupo3;
                $Informaciont->RST = $request->grupo4;
                $Informaciont->Estampillas = $request->grupo5;
                $Informaciont->Observacion1 = $request->estampillas;
                $Informaciont->GContribuyente = $request->grupo6;
                $Informaciont->AutorretenedorF = $request->grupo7;
                $Informaciont->AutorretenedorICA = $request->grupo8;
                $Informaciont->Email = $request->email;
                $Informaciont->Cliente_id = $id;

            if ($Informaciont->save()) {

            }


            return redirect('/home');

            //return redirect('/actividad/');
            } catch (\Throwable $th) {
                throw $th;
            }
    }

    public function editInformaciont(Request $request,$id)
    {
           $request->validate(
            [
                'email'=>'required|email',
            ],
            [
                'email.required' => 'El correo es requerido',
                'email.email' => 'El correo debe ser real ej. example@example.com',

            ]
            );
           try {
                $Informaciont =  InformacionTributariaModel::where('Cliente_id',$id)->first();

                $Informaciont->ResponsableImpuesto = $request->grupo1;
                $Informaciont->SujetoRetencion = $request->grupo2;
                $Informaciont->Declarar = $request->grupo3;
                $Informaciont->RST = $request->grupo4;
                $Informaciont->Estampillas = $request->grupo5;
                $Informaciont->Observacion1 = $request->estampillas;
                $Informaciont->GContribuyente = $request->grupo6;
                $Informaciont->AutorretenedorF = $request->grupo7;
                $Informaciont->AutorretenedorICA = $request->grupo8;
                $Informaciont->Email = $request->email;

            if ($Informaciont->save()) {

            }


            return redirect('/home');

            //return redirect('/actividad/');
            } catch (\Throwable $th) {
                throw $th;
            }
    }

    public function storeInformacionf(Request $request,$id)
    {

           $request->validate(
            [
                'Activo'=>'required',
                'Pasivo'=>'required',
                'Patrimonio'=>'required',
                'Ingresos'=>'required',
                'Egresos'=>'required',
                'Vinculado'=>'required' ,
            ],
            [

                'Activo.required' => 'El activo es requerido',
                'Pasivo.required' => 'El pasivo es requerido',
                'Patrimonio.required' => 'El patrimonio es requerido',
                'Ingresos.required' => 'Los ingresos totales son requeridos',
                'Egresos.required' => 'Los ingresos totales son requeridos',
                'Vinculado.required' => 'Cantidad de personas es requerido',

            ]
            );
           try {
                $Informacionf = new InformacionFinancieraModel();

                $Informacionf->Activo = $request->Activo;
                $Informacionf->Pasivo = $request->Pasivo;
                $Informacionf->Patrimonio = $request->Patrimonio;
                $Informacionf->IngresosTotales = $request->Ingresos;
                $Informacionf->EgresosTotales = $request->Egresos;
                $Informacionf->CantidadPersonas = $request->Vinculado;
                $Informacionf->user_id = $id;

            if ($Informacionf->save()) {

            }
            return redirect('/home');

            //return redirect('/actividad/');
            } catch (\Throwable $th) {
                throw $th;
            }
    }

    public function editInformacionf(Request $request,$id)
    {

           $request->validate(
            [
                'Activo'=>'required',
                'Pasivo'=>'required',
                'Patrimonio'=>'required',
                'Ingresos'=>'required',
                'Egresos'=>'required',
                'Vinculado'=>'required' ,
            ],
            [

                'Activo.required' => 'El activo es requerido',
                'Pasivo.required' => 'El pasivo es requerido',
                'Patrimonio.required' => 'El patrimonio es requerido',
                'Ingresos.required' => 'Los ingresos totales son requeridos',
                'Egresos.required' => 'Los ingresos totales son requeridos',
                'Vinculado.required' => 'Cantidad de personas es requerido',

            ]
            );
           try {
                $Informacionf =  InformacionFinancieraModel::where('user_id',$id)->first();

                $Informacionf->Activo = $request->Activo;
                $Informacionf->Pasivo = $request->Pasivo;
                $Informacionf->Patrimonio = $request->Patrimonio;
                $Informacionf->IngresosTotales = $request->Ingresos;
                $Informacionf->EgresosTotales = $request->Egresos;
                $Informacionf->CantidadPersonas = $request->Vinculado;
                $Informacionf->user_id = $id;

            if ($Informacionf->save()) {

            }
            return redirect('/home');

            //return redirect('/actividad/');
            } catch (\Throwable $th) {
                throw $th;
            }
    }

    public function storeInformacionb(Request $request,$id)
    {

           $request->validate(
            [
                'banco'=>'required',
                'cuenta'=>'required',
                'n_cuenta'=>'required',
                'municipio'=>'required',
                'departamento'=>'required',
            ],
            [
                'banco.required' => 'El banco es requerido',
                'cuenta.required' => 'La cuenta es requerida',
                'n_cuenta.required' => 'Numero de cuenta es requerido',
                'municipio.required' => 'El municipio es requerido',
                'departamento.required' => 'El departamento requerido',

            ]
            );
           try {
                $Informacionb = new InformacionBancariaModel();

                $Informacionb->Banco = $request->banco;
                $Informacionb->TipoCuenta = $request->cuenta;
                $Informacionb->Cuenta = $request->n_cuenta;
                $Informacionb->Ciudad = $request->municipio;
                $Informacionb->Departamento = $request->departamento;
                $Informacionb->Pais = $request->pais;
                $Informacionb->Banco2 = $request->banco2." ";
                $Informacionb->TipoCuenta2 = $request->cuenta2." ";
                $Informacionb->Cuenta2 = $request->n_cuenta2." ";
                $Informacionb->Ciudad2 = $request->municipio2." ";
                $Informacionb->Departamento2 = $request->departamento2." ";
                $Informacionb->Pais2 = $request->pais2." ";
                $Informacionb->user_id = $id;

            if ($Informacionb->save()) {

            }


            return redirect('/home');

            //return redirect('/actividad/');
            } catch (\Throwable $th) {
                throw $th;
            }
    }

    public function editInformacionb(Request $request,$id)
    {

           $request->validate(
            [
                'banco'=>'required',
                'cuenta'=>'required',
                'n_cuenta'=>'required',
                'municipio'=>'required',
                'departamento'=>'required',
            ],
            [
                'banco.required' => 'El banco es requerido',
                'cuenta.required' => 'La cuenta es requerida',
                'n_cuenta.required' => 'Numero de cuenta es requerido',
                'municipio.required' => 'El municipio es requerido',
                'departamento.required' => 'El departamento requerido',

            ]
            );
           try {
                $Informacionb =  InformacionBancariaModel::where('user_id',$id)->first();

                $Informacionb->Banco = $request->banco;
                $Informacionb->TipoCuenta = $request->cuenta;
                $Informacionb->Cuenta = $request->n_cuenta;
                $Informacionb->Ciudad = $request->municipio;
                $Informacionb->Departamento = $request->departamento;
                $Informacionb->Pais = $request->pais;
                $Informacionb->Banco2 = $request->banco2." ";
                $Informacionb->TipoCuenta2 = $request->cuenta2." ";
                $Informacionb->Cuenta2 = $request->n_cuenta2." ";
                $Informacionb->Ciudad2 = $request->municipio2." ";
                $Informacionb->Departamento2 = $request->departamento2." ";
                $Informacionb->Pais2 = $request->pais2." ";

            if ($Informacionb->save()) {

            }


            return redirect('/home');

            //return redirect('/actividad/');
            } catch (\Throwable $th) {
                throw $th;
            }
    }

    public function crearPj()
    {
        $tipos=['Sociedades Limitadas – LTDA.','Sociedades Anónimas – S.A.','Sociedad en Comandita – & Cía.',
        'Sociedad en Comandita Simple – S. en C.','Sociedad en Comandita por Acciones – S.C.A.',
        'Sociedad por Acciones Simplificada – S.A.S.','Sociedad Colectiva.'];
        $actividades = actividad_economicaModel::get();
        $empresas=['Microempresas','Pequeña empresa','Mediana empresa','Grande empresa'];
        return view("cliente.registro_pj",["empresas"=>$empresas,"tipos"=>$tipos,"actividades"=>$actividades]);
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
