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




class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

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

    public function informacion()
    {
        return view("cliente.informacion");
    }
    public function informaciont()
    {
        return view("cliente.informacion_tributaria");
    }

    public function informacionf()
    {
        return view("cliente.informacion_financiera");
    }

    public function informacionb()
    {
        return view("cliente.informacion_bancaria");
    }

    public function pagare()
    {
        return view("cliente.pagare");
    }

    public function actividad()
    {
        $actividades = actividad_economicaModel::get();
      return view("cliente.actividad_economica",["actividades"=>$actividades]);
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
        return view("cliente.registro_pn",["tipos"=>$tipos]);
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
                'email'=>'required|email',
                'telefono'=>'required',
                'direccion'=>'required',
                'servicio'=>'required'

            ],
            [
                'tipo_d.required' => 'Tipo de documento es requerido',
                'n_docuemnto.required' => 'El documento de identidad es requerido',
                'Nombre.required' => 'El Nombre completo  es requerido',
                'departamento.required' => 'El departamento es requerido',
                'municipio.required' => 'El municipio es requerido',
                'email.required' => 'El correo es requerido',
                'email.email' => 'El correo debe ser real ej. example@example.com',
                'telefono.required' => 'El telefono es requerido',
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

            $cliente->ActividadEconomica=" ";
            //$cliente->GranContribuyente=$request->nombre1;
            $cliente->Sexo=" ";
            $cliente->Contacto="";
            
            $cliente->Medio=" ";
            if ($cliente->save()) {
                $cliente2 = ClienteModel::where('Nit', $request->nit)->first();



                DomicilioModel::create([
                    'Telefono' => $request->telefono,
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
    
                    $cliente_domicilio->Telefono = $request->telefono;
                    $cliente_domicilio->ID_Cliente = $cliente2->ID;
    
                    $cliente_domicilio->save();
                


            }

            
            return redirect('');

            //return redirect('/actividad/');
            } catch (\Throwable $th) {
                throw $th;
            }

            

        
    }

    public function contacto()
    {
        $tipos=['N/D','CC','RC','TI','NIT','PAS','DIE'];
        return view("cliente.contacto",["tipos"=>$tipos]);
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
