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

class DocumentosController extends Controller
{
    public function storeanexos(Request $request,$id)
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
}
