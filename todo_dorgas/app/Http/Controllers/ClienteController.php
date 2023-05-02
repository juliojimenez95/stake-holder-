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
use App\Models\AccionistaModel;
use App\Models\User;
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
        return view("cliente.socios_accionistas",["tipos"=>$tipos,"accionistas"=>$accionistas,
        "id"=>$id]);
    }

    public function storeaccionistas(Request $request,$id)
    {
           $request->validate(
            [
                'Nombre'=> 'required',
                'tipo_d'=> 'required',
                'participacion'=>'required',
                'Nacionalidad'=>'required',

            ],
            [
                'Nombre.required' => 'El nombre  es requerido',
                'tipo_d.required' => 'Tipo de documento es requerido',
                'participacion.required' => 'La participacion es requerida',
                'Nacionalidad.required' => 'La nacionalidad es requerida',
            ]
            );
           try {
                $accionista = new AccionistaModel();

                $accionista->Nombres = $request->Nombre;
                $accionista->TipoNit = $request->tipo_d;
                $accionista->Participacion = $request->participacion;
                $accionista->Nacionalidad = $request->Nacionalidad;
                $accionista->PEP = $request->PEP;
                $accionista->Nit = 0;
                $accionista->user_id = $id;

            if ($accionista->save()) {

            }


            return back();

            //return redirect('/actividad/');
            } catch (\Throwable $th) {
                throw $th;
            }
    }

    public function documentos_anexos($id)
    {
        return view("cliente.documentos_anexos",['id'=>$id]);
    }

     public function identificacion()
    {
        return view("cliente.identificacion");
    }

    public function conocimiento()
    {
        $tipos=['N/D','CC','RC','TI','NIT','PAS','DIE'];
        return view("cliente.conocimiento",["tipos"=>$tipos]);
    }

    public function declaracion()
    {
        return view("cliente.declaracion");
    }

    public function informacion($id)
    {
        return view("cliente.informacion",['id'=>$id]);
    }
    public function informaciont()
    {
        return view("cliente.informacion_tributaria");
    }

    public function informacionf($id)
    {

        return view("cliente.informacion_financiera",['id'=>$id]);
    }

    public function informacionb()
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
        return view("cliente.informacion_bancaria",["bancos"=>$bancos,"cuentas"=>$cuentas]);
    }

    public function pagare()
    {
        return view("cliente.pagare");
    }

    public function actividad($id)
    {
        $actividades = actividad_economicaModel::get();
      return view("cliente.actividad_economica",["actividades"=>$actividades,'id'=>$id]);
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
            $cliente->BirthYear= " ";
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
            $cliente->Sexo=" ";
            $cliente->Contacto="";

            $cliente->Medio=" ";
            if ($cliente->save()) {
                $cliente2 = ClienteModel::where('Nit', $request->n_docuemnto)->first();

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

                    $cliente_domicilio = new Cliente_DomicilioModel();

                    $cliente_domicilio->Telefono = $request->Telefono;
                    $cliente_domicilio->ID_Cliente = $cliente2->ID;

                    $user = User::create([
                        'name' => $request->Nombre,
                        'email' => $request->email,
                        'password' => Hash::make($request->password),
                        'id_cliente'=> $cliente2->ID,
                        ]);

                    $cliente_domicilio->save();




            }


            return redirect('/actividad/'.$user->id);

            //return redirect('/actividad/');
            } catch (\Throwable $th) {
                throw $th;
            }




    }

    public function contacto($id)
    {
        $tipos=['N/D','CC','RC','TI','NIT','PAS','DIE'];
        return view("cliente.contacto",["tipos"=>$tipos,'id'=>$id]);
    }

    public function storecontactopn(Request $request,$id)
    {
           $request->validate(
            [
                'Nombre'=> 'required',
                'apellido'=> 'required',
                'apellido2'=> 'required',
                'tipo_d'=> 'required',
                'n_docuemnto'=>'required',
                'email'=>'required|email',
                'telefono'=>'required',
                'cargo'=>'required',

            ],
            [
                'Nombre.required' => 'El nombre  es requerido',
                'apellido.required' => 'El apellido  es requerido',
                'apellido2.required' => 'El apellido  es requerido',
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
                $contacto->Nombre2 = $request->Nombre2;
                $contacto->Apellido1 = $request->apellido;
                $contacto->Apellido2 = $request->apellido2;
                $contacto->TipoNit = $request->tipo_d;
                $contacto->Nit = $request->n_docuemnto;
                $contacto->Telefono = $request->telefono;
                $contacto->Cargo = $request->cargo;
                $contacto->Email = $request->email;
                $contacto->Cliente_id = $id;

            if ($contacto->save()) {

            }


            return redirect('/cliente/informacionf/'.$id);

            //return redirect('/actividad/');
            } catch (\Throwable $th) {
                throw $th;
            }
    }

    public function storeRepresentante(Request $request,$id)
    {
      /*     $request->validate(
            [
                'p_nombre'=> 'required',
                'p_apellido'=> 'required',
                's_apellido'=> 'required',
                'tipo_d'=> 'required',
                'documento'=>'required|numeric',
                'email'=>'required|email',
                'telefono'=>'required',
                'cargo'=>'required'

            ],
            [
                'p_nombre.required' => 'El nombre  es requerido',
                'p_apellido.required' => 'El apellido  es requerido',
                's_apellido.required' => 'El apellido  es requerido',
                'tipo_d.required' => 'Tipo de documento es requerido',
                'documento.required' => 'El documento de identidad es requerido',
                'email.required' => 'El correo es requerido',
                'email.email' => 'El correo debe ser real ej. example@example.com',
                'telefono.required' => 'El telefono es requerido',
                'cargo.required' => 'El cargo es requerido',

            ]
            );*/
           try {
                $Representante = new RepresentanteLegalModel();


                $Representante->Nombre1 = $request->p_nombre;
                $Representante->Nombre2 = $request->s_nombre;
                $Representante->Apellido1 = $request->p_nombre;
                $Representante->Apellido2 = $request->s_apellido;
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

                return redirect('/cliente/contacto/'.$id);


            //return redirect('/actividad/');
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


            return redirect('');

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
                'IngresosTotales'=>'required',
                'CantidadPersonas'=>'required' ,
            ],
            [

                'Activo.required' => 'El activo es requerido',
                'Pasivo.required' => 'El pasivo es requerido',
                'Patrimonio.required' => 'El patrimonio es requerido',
                'IngresosTotales.required' => 'Los ingresos totales son requeridos',
                'CantidadPersonas.required' => 'Cantidad de personas es requerido',

            ]
            );
           try {
                $Informacionf = new InformacionFinancieraModel();

                $Informacionf->Activo = $request->Activo;
                $Informacionf->Pasivo = $request->Pasivo;
                $Informacionf->Patrimonio = $request->Patrimonio;
                $Informacionf->IngresosTotales = $request->IngresosTotales;
                $Informacionf->CantidadPersonas = $request->CantidadPersonas;
                $Informacionf->Cliente_id = $id;

            if ($Informacionf->save()) {

            }


            return redirect('');

            //return redirect('/actividad/');
            } catch (\Throwable $th) {
                throw $th;
            }
    }

    public function storeInformacionb(Request $request,$id)
    {

           $request->validate(
            [
                'email'=>'required|email',
                'Activo'=>'required',
                'Pasivo'=>'required',
                'Patrimonio'=>'required',
                'IngresosTotales'=>'required',
                'CantidadPersonas'=>'required' ,
            ],
            [
                'email.required' => 'El correo es requerido',
                'email.email' => 'El correo debe ser real ej. example@example.com',
                'Activo.required' => 'El activo es requerido',
                'Pasivo.required' => 'El pasivo es requerido',
                'Patrimonio.required' => 'El patrimonio es requerido',
                'IngresosTotales.required' => 'Los ingresos totales son requeridos',
                'CantidadPersonas.required' => 'Cantidad de personas es requerido',

            ]
            );
           try {
                $Informacionb = new InformacionBancariaModel();

                $Informacionb->Banco = $request->Banco;
                $Informacionb->TipoCuenta = $request->TipoCuenta;
                $Informacionb->Cuenta = $request->Cuenta;
                $Informacionb->Ciudad = $request->Ciudad;
                $Informacionb->Departamento = $request->grupo5;
                $Informacionb->Pais = $request->estampillas;
                $Informacionb->Cliente_id = $id;

            if ($Informacionb->save()) {

            }


            return redirect('');

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
        $empresas=['Microempresas','Pequeña empresa','Mediana empresa','Grande empresa'];
        return view("cliente.registro_pj",["empresas"=>$empresas,"tipos"=>$tipos]);
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
