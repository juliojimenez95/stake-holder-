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
use App\Models\origenDeFondoModel;
use App\Models\InformacionFinancieraModel;
use App\Models\InformacionBancariaModel;
use App\Models\PagareModel;
use App\Models\AnexoModel;
use App\Models\personaExpuestaModel;
use App\Models\AccionistaModel;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use PDF;
use PDFMerger;
use setasign\Fpdi\Fpdi;



date_default_timezone_set("America/Bogota");
class DocumentosController extends Controller
{
    public function storeanexos(Request $request,$id)
    {

           try {

                $Anexo = new AnexoModel();
                $name_pdf1 = '';
                if ($request->file('camara_comercio')){
                    $pdf = $request->file('camara_comercio');
                    $ext = $pdf->getClientOriginalExtension();
                    $name_pdf1 = 'camara_c'.'_'.date('Y').'-'.date('m').'-'.date('d').'-'.uniqid().'.'.$ext;
                    $url = Storage::disk('documentos')->put($name_pdf1, file_get_contents($pdf));
                }
                $Anexo->Camara_comercio = $name_pdf1;
                $name_pdf2 = '';
                if ($request->file('Rut')){
                    $pdf = $request->file('Rut');
                    $ext = $pdf->getClientOriginalExtension();
                    $name_pdf2 = 'Rut'.'_'.date('Y').'-'.date('m').'-'.date('d').'-'.uniqid().'.'.$ext;
                    $url = Storage::disk('documentos')->put($name_pdf2, file_get_contents($pdf));
                }
                $Anexo->Rut = $name_pdf2;
                $name_pdf3 = '';
                if ($request->file('CC')){
                    $pdf = $request->file('CC');
                    $ext = $pdf->getClientOriginalExtension();
                    $name_pdf3 = 'cc_r'.'_'.date('Y').'-'.date('m').'-'.date('d').'-'.uniqid().'.'.$ext;
                    $url = Storage::disk('documentos')->put($name_pdf3, file_get_contents($pdf));
                }
                $Anexo->Cc_representante = $name_pdf3;
                $name_pdf4 = '';
                if ($request->file('FAA')){
                    $pdf = $request->file('FAA');
                    $ext = $pdf->getClientOriginalExtension();
                    $name_pdf4 = 'Estado_f'.'_'.date('Y').'-'.date('m').'-'.date('d').'-'.uniqid().'.'.$ext;
                    $url = Storage::disk('documentos')->put($name_pdf4, file_get_contents($pdf));
                }
                $Anexo->Estados_financieros = $name_pdf4;
                $name_pdf5 = '';
                if ($request->file('RC')){
                    $pdf = $request->file('RC');
                    $ext = $pdf->getClientOriginalExtension();
                    $name_pdf5 = 'RC'.'_'.date('Y').'-'.date('m').'-'.date('d').'-'.uniqid().'.'.$ext;
                    $url = Storage::disk('documentos')->put($name_pdf5, file_get_contents($pdf));
                }
                $Anexo->Referencia_comercial = $name_pdf5;
                $name_pdf6 = '';
                if ($request->file('RRI')){
                    $pdf = $request->file('RRI');
                    $ext = $pdf->getClientOriginalExtension();
                    $name_pdf6 = 'RRI'.'_'.date('Y').'-'.date('m').'-'.date('d').'-'.uniqid().'.'.$ext;
                    $url = Storage::disk('documentos')->put($name_pdf6, file_get_contents($pdf));
                }
                $Anexo->ICA = $name_pdf6;
                $name_pdf7 = '';
                if ($request->file('GC')){
                    $pdf = $request->file('GC');
                    $ext = $pdf->getClientOriginalExtension();
                    $name_pdf7 = 'GC'.'_'.date('Y').'-'.date('m').'-'.date('d').'-'.uniqid().'.'.$ext;
                    $url = Storage::disk('documentos')->put($name_pdf7, file_get_contents($pdf));
                }
                $Anexo->Contribuyente = $name_pdf7;
                $name_pdf8 = '';
                if ($request->file('AF')){
                    $pdf = $request->file('AF');
                    $ext = $pdf->getClientOriginalExtension();
                    $name_pdf8 = 'AF'.'_'.date('Y').'-'.date('m').'-'.date('d').'-'.uniqid().'.'.$ext;
                    $url = Storage::disk('documentos')->put($name_pdf8, file_get_contents($pdf));
                }
                $Anexo->Autoretenedor_f = $name_pdf8;
                $name_pdf9 = '';
                if ($request->file('ICA')){
                    $pdf = $request->file('ICA');
                    $ext = $pdf->getClientOriginalExtension();
                    $name_pdf9 = 'ICA'.'_'.date('Y').'-'.date('m').'-'.date('d').'-'.uniqid().'.'.$ext;
                    $url = Storage::disk('documentos')->put($name_pdf9, file_get_contents($pdf));
                }
                $Anexo->Autoretenedor_ICA = $name_pdf9;
                $name_pdf10 = '';
                if ($request->file('Brochure')){
                    $pdf = $request->file('Brochure');
                    $ext = $pdf->getClientOriginalExtension();
                    $name_pdf10 = 'Brochure'.'_'.date('Y').'-'.date('m').'-'.date('d').'-'.uniqid().'.'.$ext;
                    $url = Storage::disk('documentos')->put($name_pdf10, file_get_contents($pdf));
                }
                $Anexo->Brochure = $name_pdf10;
                $name_pdf11 = '';
                if ($request->file('CB')){
                    $pdf = $request->file('CB');
                    $ext = $pdf->getClientOriginalExtension();
                    $name_pdf11 = 'CB'.'_'.date('Y').'-'.date('m').'-'.date('d').'-'.uniqid().'.'.$ext;
                    $url = Storage::disk('documentos')->put($name_pdf11, file_get_contents($pdf));
                }
                $Anexo->Certificado_bancario = $name_pdf11;
                $name_pdf12 = '';
                if ($request->file('SG-SST')){
                    $pdf = $request->file('SG-SST');
                    $ext = $pdf->getClientOriginalExtension();
                    $name_pdf12 = 'SG-SST'.'_'.date('Y').'-'.date('m').'-'.date('d').'-'.uniqid().'.'.$ext;
                    $url = Storage::disk('documentos')->put($name_pdf12, file_get_contents($pdf));
                }
                $Anexo->SG_SST = $name_pdf12;
                $name_pdf13 = '';
                if ($request->file('SS')){
                    $pdf = $request->file('SS');
                    $ext = $pdf->getClientOriginalExtension();
                    $name_pdf13 = 'SS'.'_'.date('Y').'-'.date('m').'-'.date('d').'-'.uniqid().'.'.$ext;
                    $url = Storage::disk('documentos')->put($name_pdf13, file_get_contents($pdf));
                }
                $Anexo->SS = $name_pdf13;
                $Anexo->user_id = $id;

            if ($Anexo->save()) {
                return redirect('/declaracion/'.$id);

            }else{

                return back();
            }




            //return redirect('/actividad/');
            } catch (\Throwable $th) {
                throw $th;
            }
    }

    public function editanexos(Request $request,$id)
    {

           try {

                $Anexo = AnexoModel::where('user_id',$id)->first();

                if ($request->file('camara_comercio')){
                    if ($Anexo->Camara_comercio !='') {
                        Storage::disk('documentos')->delete($Anexo->Camara_comercio);
                        $name_pdf1 = '';
                        $pdf = $request->file('camara_comercio');
                        $ext = $pdf->getClientOriginalExtension();
                        $name_pdf1 = 'camara_c'.'_'.date('Y').'-'.date('m').'-'.date('d').'-'.uniqid().'.'.$ext;
                        $url = Storage::disk('documentos')->put($name_pdf1, file_get_contents($pdf));
                        $Anexo->Camara_comercio = $name_pdf1;
                    }else{
                        $name_pdf1 = '';
                        $pdf = $request->file('camara_comercio');
                        $ext = $pdf->getClientOriginalExtension();
                        $name_pdf1 = 'camara_c'.'_'.date('Y').'-'.date('m').'-'.date('d').'-'.uniqid().'.'.$ext;
                        $url = Storage::disk('documentos')->put($name_pdf1, file_get_contents($pdf));
                        $Anexo->Camara_comercio = $name_pdf1;
                    }

                }

                if ($request->file('Rut')){
                    if ($Anexo->Rut !='') {
                        Storage::disk('documentos')->delete($Anexo->Rut);
                        $name_pdf2 = '';

                        $pdf = $request->file('Rut');
                        $ext = $pdf->getClientOriginalExtension();
                        $name_pdf2 = 'Rut'.'_'.date('Y').'-'.date('m').'-'.date('d').'-'.uniqid().'.'.$ext;
                        $url = Storage::disk('documentos')->put($name_pdf2, file_get_contents($pdf));
                        $Anexo->Rut = $name_pdf2;

                    } else {
                        $name_pdf2 = '';

                        $pdf = $request->file('Rut');
                        $ext = $pdf->getClientOriginalExtension();
                        $name_pdf2 = 'Rut'.'_'.date('Y').'-'.date('m').'-'.date('d').'-'.uniqid().'.'.$ext;
                        $url = Storage::disk('documentos')->put($name_pdf2, file_get_contents($pdf));
                        $Anexo->Rut = $name_pdf2;
                    }


                }


                if ($request->file('CC')){
                    if ($Anexo->Cc_representante !='') {
                        Storage::disk('documentos')->delete($Anexo->Cc_representante);
                        $name_pdf3 = '';
                        $pdf = $request->file('CC');
                        $ext = $pdf->getClientOriginalExtension();
                        $name_pdf3 = 'cc_r'.'_'.date('Y').'-'.date('m').'-'.date('d').'-'.uniqid().'.'.$ext;
                        $url = Storage::disk('documentos')->put($name_pdf3, file_get_contents($pdf));

                        $Anexo->Cc_representante = $name_pdf3;

                    } else {
                        $name_pdf3 = '';
                        $pdf = $request->file('CC');
                        $ext = $pdf->getClientOriginalExtension();
                        $name_pdf3 = 'cc_r'.'_'.date('Y').'-'.date('m').'-'.date('d').'-'.uniqid().'.'.$ext;
                        $url = Storage::disk('documentos')->put($name_pdf3, file_get_contents($pdf));

                        $Anexo->Cc_representante = $name_pdf3;
                    }


                }


                if ($request->file('FAA')){
                    if ($Anexo->Estados_financieros !='') {
                        Storage::disk('documentos')->delete($Anexo->Estados_financieros);
                        $name_pdf4 = '';
                        $pdf = $request->file('FAA');
                        $ext = $pdf->getClientOriginalExtension();
                        $name_pdf4 = 'Estado_f'.'_'.date('Y').'-'.date('m').'-'.date('d').'-'.uniqid().'.'.$ext;
                        $url = Storage::disk('documentos')->put($name_pdf4, file_get_contents($pdf));

                        $Anexo->Estados_financieros = $name_pdf4;

                    } else {
                        #$name_pdf4 = '';
                        $pdf = $request->file('FAA');
                        $ext = $pdf->getClientOriginalExtension();
                        $name_pdf4 = 'Estado_f'.'_'.date('Y').'-'.date('m').'-'.date('d').'-'.uniqid().'.'.$ext;
                        $url = Storage::disk('documentos')->put($name_pdf4, file_get_contents($pdf));

                        $Anexo->Estados_financieros = $name_pdf4;

                    }

                }


                if ($request->file('RC')){
                    if ($Anexo->Referencia_comercial !='') {
                        Storage::disk('documentos')->delete($Anexo->Referencia_comercial);
                        $name_pdf5 = '';
                        $pdf = $request->file('RC');
                        $ext = $pdf->getClientOriginalExtension();
                        $name_pdf5 = 'RC'.'_'.date('Y').'-'.date('m').'-'.date('d').'-'.uniqid().'.'.$ext;
                        $url = Storage::disk('documentos')->put($name_pdf5, file_get_contents($pdf));
                        $Anexo->Referencia_comercial = $name_pdf5;

                    } else {
                        $name_pdf5 = '';
                        $pdf = $request->file('RC');
                        $ext = $pdf->getClientOriginalExtension();
                        $name_pdf5 = 'RC'.'_'.date('Y').'-'.date('m').'-'.date('d').'-'.uniqid().'.'.$ext;
                        $url = Storage::disk('documentos')->put($name_pdf5, file_get_contents($pdf));
                        $Anexo->Referencia_comercial = $name_pdf5;
                    }

                }

                if ($request->file('RRI')){
                    if ($Anexo->ICA !='') {
                        Storage::disk('documentos')->delete($Anexo->ICA);
                        $name_pdf6 = '';

                        $pdf = $request->file('RRI');
                        $ext = $pdf->getClientOriginalExtension();
                        $name_pdf6 = 'RRI'.'_'.date('Y').'-'.date('m').'-'.date('d').'-'.uniqid().'.'.$ext;
                        $url = Storage::disk('documentos')->put($name_pdf6, file_get_contents($pdf));
                        $Anexo->ICA = $name_pdf6;


                    } else {
                        $pdf = $request->file('RRI');
                        $ext = $pdf->getClientOriginalExtension();
                        $name_pdf6 = 'RRI'.'_'.date('Y').'-'.date('m').'-'.date('d').'-'.uniqid().'.'.$ext;
                        $url = Storage::disk('documentos')->put($name_pdf6, file_get_contents($pdf));
                        $Anexo->ICA = $name_pdf6;
                    }

                }
                if ($request->file('GC')){
                    if ($Anexo->Contribuyente !='') {
                        Storage::disk('documentos')->delete($Anexo->Contribuyente);
                        $name_pdf7 = '';

                        $pdf = $request->file('GC');
                        $ext = $pdf->getClientOriginalExtension();
                        $name_pdf7 = 'GC'.'_'.date('Y').'-'.date('m').'-'.date('d').'-'.uniqid().'.'.$ext;
                        $url = Storage::disk('documentos')->put($name_pdf7, file_get_contents($pdf));
                        $Anexo->Contribuyente = $name_pdf7;

                    } else {
                        $pdf = $request->file('GC');
                        $ext = $pdf->getClientOriginalExtension();
                        $name_pdf7 = 'GC'.'_'.date('Y').'-'.date('m').'-'.date('d').'-'.uniqid().'.'.$ext;
                        $url = Storage::disk('documentos')->put($name_pdf7, file_get_contents($pdf));
                        $Anexo->Contribuyente = $name_pdf7;
                    }


                }
                if ($request->file('AF')){
                    if ($Anexo->Autoretenedor_f !='') {
                        Storage::disk('documentos')->delete($Anexo->Autoretenedor_f);
                        $name_pdf8 = '';

                        $pdf = $request->file('AF');
                        $ext = $pdf->getClientOriginalExtension();
                        $name_pdf8 = 'AF'.'_'.date('Y').'-'.date('m').'-'.date('d').'-'.uniqid().'.'.$ext;
                        $url = Storage::disk('documentos')->put($name_pdf8, file_get_contents($pdf));
                        $Anexo->Autoretenedor_f = $name_pdf8;

                    } else {
                        $pdf = $request->file('AF');
                        $ext = $pdf->getClientOriginalExtension();
                        $name_pdf8 = 'AF'.'_'.date('Y').'-'.date('m').'-'.date('d').'-'.uniqid().'.'.$ext;
                        $url = Storage::disk('documentos')->put($name_pdf8, file_get_contents($pdf));
                        $Anexo->Autoretenedor_f = $name_pdf8;
                    }


                }
                if ($request->file('ICA')){
                    if ($Anexo->Autoretenedor_ICA !='') {
                        Storage::disk('documentos')->delete($Anexo->Autoretenedor_ICA);
                        $name_pdf9 = '';

                        $pdf = $request->file('ICA');
                        $ext = $pdf->getClientOriginalExtension();
                        $name_pdf9 = 'ICA'.'_'.date('Y').'-'.date('m').'-'.date('d').'-'.uniqid().'.'.$ext;
                        $url = Storage::disk('documentos')->put($name_pdf9, file_get_contents($pdf));
                        $Anexo->Autoretenedor_ICA = $name_pdf9;

                    } else {
                        $name_pdf9 = '';

                        $pdf = $request->file('ICA');
                        $ext = $pdf->getClientOriginalExtension();
                        $name_pdf9 = 'ICA'.'_'.date('Y').'-'.date('m').'-'.date('d').'-'.uniqid().'.'.$ext;
                        $url = Storage::disk('documentos')->put($name_pdf9, file_get_contents($pdf));
                        $Anexo->Autoretenedor_ICA = $name_pdf9;
                    }


                }
                if ($request->file('Brochure')){
                    if ($Anexo->Brochure !='') {
                        Storage::disk('documentos')->delete($Anexo->Brochure);
                        $name_pdf10 = '';

                        $pdf = $request->file('Brochure');
                        $ext = $pdf->getClientOriginalExtension();
                        $name_pdf10 = 'Brochure'.'_'.date('Y').'-'.date('m').'-'.date('d').'-'.uniqid().'.'.$ext;
                        $url = Storage::disk('documentos')->put($name_pdf10, file_get_contents($pdf));
                        $Anexo->Brochure = $name_pdf10;

                    } else {
                        $pdf = $request->file('Brochure');
                        $ext = $pdf->getClientOriginalExtension();
                        $name_pdf10 = 'Brochure'.'_'.date('Y').'-'.date('m').'-'.date('d').'-'.uniqid().'.'.$ext;
                        $url = Storage::disk('documentos')->put($name_pdf10, file_get_contents($pdf));
                        $Anexo->Brochure = $name_pdf10;
                    }


                }
                if ($request->file('CB')){
                    if ($Anexo->Certificado_bancario !='') {
                        Storage::disk('documentos')->delete($Anexo->Certificado_bancario);

                        $pdf = $request->file('CB');
                        $ext = $pdf->getClientOriginalExtension();
                        $name_pdf11 = 'CB'.'_'.date('Y').'-'.date('m').'-'.date('d').'-'.uniqid().'.'.$ext;
                        $url = Storage::disk('documentos')->put($name_pdf11, file_get_contents($pdf));
                        $Anexo->Certificado_bancario = $name_pdf11;

                    } else {
                        $name_pdf11 = '';

                        $pdf = $request->file('CB');
                        $ext = $pdf->getClientOriginalExtension();
                        $name_pdf11 = 'CB'.'_'.date('Y').'-'.date('m').'-'.date('d').'-'.uniqid().'.'.$ext;
                        $url = Storage::disk('documentos')->put($name_pdf11, file_get_contents($pdf));
                        $Anexo->Certificado_bancario = $name_pdf11;
                    }


                }
                if ($request->file('SG-SST')){
                    if ($Anexo->SG_SST !='') {
                        Storage::disk('documentos')->delete($Anexo->SG_SST);
                        $name_pdf12 = '';

                        $pdf = $request->file('SG-SST');
                        $ext = $pdf->getClientOriginalExtension();
                        $name_pdf12 = 'SG-SST'.'_'.date('Y').'-'.date('m').'-'.date('d').'-'.uniqid().'.'.$ext;
                        $url = Storage::disk('documentos')->put($name_pdf12, file_get_contents($pdf));
                        $Anexo->SG_SST = $name_pdf12;

                    } else {
                        $name_pdf12 = '';

                        $pdf = $request->file('SG-SST');
                        $ext = $pdf->getClientOriginalExtension();
                        $name_pdf12 = 'SG-SST'.'_'.date('Y').'-'.date('m').'-'.date('d').'-'.uniqid().'.'.$ext;
                        $url = Storage::disk('documentos')->put($name_pdf12, file_get_contents($pdf));
                        $Anexo->SG_SST = $name_pdf12;
                    }


                }
                if ($request->file('SS')){
                    if ($Anexo->SS !='') {
                        Storage::disk('documentos')->delete($Anexo->SS);
                        $name_pdf13 = '';
                        $pdf = $request->file('SS');
                        $ext = $pdf->getClientOriginalExtension();
                        $name_pdf13 = 'SS'.'_'.date('Y').'-'.date('m').'-'.date('d').'-'.uniqid().'.'.$ext;
                        $url = Storage::disk('documentos')->put($name_pdf13, file_get_contents($pdf));
                        $Anexo->SS = $name_pdf13;

                    } else {
                        $name_pdf13 = '';

                        $pdf = $request->file('SS');
                        $ext = $pdf->getClientOriginalExtension();
                        $name_pdf13 = 'SS'.'_'.date('Y').'-'.date('m').'-'.date('d').'-'.uniqid().'.'.$ext;
                        $url = Storage::disk('documentos')->put($name_pdf13, file_get_contents($pdf));
                        $Anexo->SS = $name_pdf13;
                    }


                }


            if ($Anexo->save()) {
                return redirect('/declaracion/'.$id);

            }else{

                return "aqui llega";
            }




            //return redirect('/actividad/');
            } catch (\Throwable $th) {
                throw $th;
            }
    }

    public function storepagare(Request $request,$id)
    {
        $request->validate(
            [
                'credito'=> 'required',

            ],
            [
                'credito.required' => 'Documento es requerido'

            ]
            );

        try {

            $pagare = new PagareModel();
            if ($request->credito == 1) {
                $name_pdf1 = '';
                if ($request->file('document')) {
                    $pdf = $request->file('document');
                    $ext = $pdf->getClientOriginalExtension();
                    $name_pdf1 = 'pagare'.'_'.date('Y').'-'.date('m').'-'.date('d').'-'.uniqid().'.'.$ext;
                    $url = Storage::disk('documentos')->put($name_pdf1, file_get_contents($pdf));
                }else{
                    return back();

                }
                $pagare->archivo = $name_pdf1;
                $pagare->pagare = $request->credito;
                $pagare->user_id = $id;

                if ($pagare->save()) {
                    return redirect('/home');

                } else {

                    return back();
                }
            } else {
                $name_pdf1 = '';
                $pagare->archivo = $name_pdf1;
                $pagare->pagare = $request->credito;
                $pagare->user_id = $id;

                if ($pagare->save()) {
                    return redirect('/home');

                } else {

                    return back();
                }
            }


            //return redirect('/actividad/');
        } catch (\Throwable $th) {
            throw $th;
        }
    }


    public function editpagare(Request $request,$id)
    {
        $request->validate(
            [
                'credito'=> 'required',

            ],
            [
                'credito.required' => 'Documento es requerido'

            ]
            );

        try {

            $pagare =  PagareModel::where('id',$id)->first();
            if ($request->credito == 1) {
                $name_pdf1 = '';
                if ($request->file('document')) {
                    if ($pagare->pagare ='') {
                        Storage::disk('documentos')->delete($pagare->pagare);
                        $pdf = $request->file('document');
                        $ext = $pdf->getClientOriginalExtension();
                        $name_pdf1 = 'pagare'.'_'.date('Y').'-'.date('m').'-'.date('d').'-'.uniqid().'.'.$ext;
                        $url = Storage::disk('documentos')->put($name_pdf1, file_get_contents($pdf));

                    }else{

                        $pdf = $request->file('document');
                        $ext = $pdf->getClientOriginalExtension();
                        $name_pdf1 = 'pagare'.'_'.date('Y').'-'.date('m').'-'.date('d').'-'.uniqid().'.'.$ext;
                        $url = Storage::disk('documentos')->put($name_pdf1, file_get_contents($pdf));

                    }

                }else{
                    return back();

                }
                $pagare->pagare = $request->credito;

                if ($pagare->save()) {
                    return redirect('/home');

                } else {

                    return back();
                }
            } else {
                $pagare->pagare = $request->credito;

                if ($pagare->save()) {
                    return redirect('/home');

                } else {

                    return back();
                }
            }


            //return redirect('/actividad/');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function storefondo(Request $request,$id)
    {

        try {

            $fondos = new origenDeFondoModel();

           // return $request->file('fondo');
            $name_pdf1 = '';
            if ($request->file('fondo')){
                $pdf = $request->file('fondo');
                $ext = $pdf->getClientOriginalExtension();
                $name_pdf1 = 'fondo'.'_'.date('Y').'-'.date('m').'-'.date('d').'-'.uniqid().'.'.$ext;
                $url = Storage::disk('documentos')->put($name_pdf1, file_get_contents($pdf));
            }

          //  return $name_pdf1;
            $fondos->archivo = $name_pdf1;
            $fondos->user_id = $id;

            if ($fondos->save()) {
                return redirect('/cliente/documentos_anexos/'.$id);

            } else {

                return back();
            }

            //return redirect('/actividad/');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function editfondo(Request $request,$id)
    {

        try {

            $fondos =  origenDeFondoModel::where('id',$id);

           // return $request->file('fondo');
            $name_pdf1 = ' ';
            if ($request->file('fondo')){
                if ($fondos->archivo != '') {

                } else {
                    # code...
                }

                $pdf = $request->file('fondo');
                $ext = $pdf->getClientOriginalExtension();
                $name_pdf1 = 'fondo'.'_'.date('Y').'-'.date('m').'-'.date('d').'-'.uniqid().'.'.$ext;
                $url = Storage::disk('documentos')->put($name_pdf1, file_get_contents($pdf));
            }

          //  return $name_pdf1;
            $fondos->archivo = $name_pdf1;
            $fondos->user_id = $id;

            if ($fondos->save()) {
                return redirect('/cliente/documentos_anexos/'.$id);

            } else {

                return back();
            }

            //return redirect('/actividad/');
        } catch (\Throwable $th) {
            throw $th;
        }
    }


    public function unirpdf($id)
    {

        try {
            $anexo = AnexoModel::where('user_id',$id)->first();

            $file1 = public_path('documentos/' . $anexo->Camara_comercio);
            $file2 = public_path('documentos/' . $anexo->Rut);
            $file3 = public_path('documentos/' . $anexo->Cc_representante);
            $file4 = public_path('documentos/' . $anexo->Estados_financieros);
            $file5 = public_path('documentos/' . $anexo->Referencia_comercial);
            $file6 = public_path('documentos/' . $anexo->ICA);
            $file7 = public_path('documentos/' . $anexo->Contribuyente);
            $file8 = public_path('documentos/' . $anexo->Autoretenedor_f);
            $file9 = public_path('documentos/' . $anexo->Autoretenedor_ICA);
            $file10 = public_path('documentos/' . $anexo->Brochure);
            $file11 = public_path('documentos/' . $anexo->Certificado_bancario);
            $file12 = public_path('documentos/' . $anexo->SG_SST);
            $file13 = public_path('documentos/' . $anexo->SS);



            $pdf = PDFMerger::init();
            $pdf->addPDF($file1, 'all');
            $pdf->addPDF($file2, 'all');
            $pdf->addPDF($file3, 'all');
            $pdf->addPDF($file4, 'all');
            $pdf->addPDF($file5, 'all');
            $pdf->addPDF($file6, 'all');
            $pdf->addPDF($file7, 'all');
            $pdf->addPDF($file8, 'all');
            $pdf->addPDF($file9, 'all');
            $pdf->addPDF($file10, 'all');
            $pdf->addPDF($file11, 'all');
            $pdf->addPDF($file12, 'all');
            $pdf->addPDF($file13, 'all');

            $pdf->merge();

            $mergedFilePath = public_path('documentos/resultante.pdf');
            $pdf->save($mergedFilePath);


            $pdf->Output(public_path('documentos/resultante.pdf'), 'F');

            return response()->download($mergedFilePath);





        } catch (\Throwable $th) {
            throw $th;
        }
    }


    public function pdf($id)
    {

        try {
            $user = User::find($id);

            $cliente = ClienteModel::where('Mail',$user->email)->first();
            $cliente_domicilio = Cliente_DomicilioModel::where('ID_Cliente',$cliente->ID)->first();
            $telefono = strval($cliente_domicilio->Telefono);
            $domicilio = DomicilioModel::where('Telefono',$telefono)->first();

             $contacto = ContactoModel::where('Cliente_id',$id)->first();
            $representante = RepresentanteLegalModel::where('user_id',$id)->first();
            $personae = personaExpuestaModel::where('user_id',$id)->first();

            $informaciont = InformacionTributariaModel::where('Cliente_id',$id)->first();
            $informacionb = InformacionBancariaModel::where('user_id',$id)->first();
            $informacionf = InformacionFinancieraModel::where('user_id',$id)->first();
            $pagare = PagareModel::where('user_id',$id)->first();
            $socios = AccionistaModel::where('user_id',$id)->get();


           // return $informacionb;
            $data = [
                'title' => 'Welcome to CodeSolutionStuff.com',
                'date' => date('m/d/Y')
            ];

            $pdf = PDF::loadView('myPDF', ['data'=>$data, 'cliente'=>$cliente,
            'domicilio'=>$domicilio,'contacto'=>$contacto, 'representante'=>$representante,
            'informaciont'=> $informaciont,'informacionb'=> $informacionb,'informacionf'=> $informacionf,
            'pagare'=> $pagare,'socios'=> $socios]);

            return $pdf->download('codesolutionstuff.pdf');

            /*$pdf = Pdf::loadView('pdf.pdf', compact('data')  /*['cliente'=>$cliente,
            'cliente_domicilio'=>$cliente_domicilio,'domicilio'=>$domicilio
            'contacto'=>$contacto,'representante'=>$representante,
            'personae'=>$personae,'user'=>$user,'informaciont'=>$informaciont,
            'informacionb'=>$informacionb,'informacionf'=>$informacionf ,
            'pagare'=>$pagare, 'socios'=>$socios
             ] );
            $pdf->setPaper('a3', 'landscape');
            return $pdf->download('pdf.pdf');*/

        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
