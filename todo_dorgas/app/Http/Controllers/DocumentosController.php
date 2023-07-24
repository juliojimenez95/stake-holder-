<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\MunicipioModel;
use App\Models\DepartamentoModel;
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
use App\Models\AutorizacionModel;
use App\Models\personaExpuestaModel;
use App\Models\AccionistaModel;
use App\Models\ProveedorModel;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use PDF;
use PDFMerger;
use PDFSeta;
use Illuminate\Support\Facades\Http;
use setasign\Fpdi\Fpdi;



date_default_timezone_set("America/Bogota");
class DocumentosController extends Controller
{
    public function storeanexos(Request $request,$id)
    {

        $request->validate(
            [
                'camara_comercio'=> 'required',
                'Rut'=> 'required',
                'CC'=>'required',
                'CB'=>'required',




            ],[
                'camara_comercio.required' => 'Documento requerido',
                'Rut.required' => 'Documento  requerido',
                'CC.required' => 'Documento requerido',
                'CB.required' => 'Documento requerido'


            ]);

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
                if ($request->file('Certificado_c')){
                    $pdf = $request->file('Certificado_c');
                    $ext = $pdf->getClientOriginalExtension();
                    $name_pdf13 = 'Certificado_c'.'_'.date('Y').'-'.date('m').'-'.date('d').'-'.uniqid().'.'.$ext;
                    $url = Storage::disk('documentos')->put($name_pdf13, file_get_contents($pdf));
                }
                $Anexo->Certificado_c = $name_pdf13;
                $name_pdf14 = '';
                if ($request->file('Referencia_comercial2')){
                    $pdf = $request->file('Referencia_comercial2');
                    $ext = $pdf->getClientOriginalExtension();
                    $name_pdf14 = 'Referencia_comercial2'.'_'.date('Y').'-'.date('m').'-'.date('d').'-'.uniqid().'.'.$ext;
                    $url = Storage::disk('documentos')->put($name_pdf13, file_get_contents($pdf));
                }
                $Anexo->Referencia_comercial2 = $name_pdf14;
                $name_pdf15 = '';
                $Anexo->SS = $name_pdf15;

                $name_pdf16 = '';
                if ($request->file('Listas_precios')){
                    $pdf = $request->file('Listas_precios');
                    $ext = $pdf->getClientOriginalExtension();
                    $name_pdf14 = 'Listas_precios'.'_'.date('Y').'-'.date('m').'-'.date('d').'-'.uniqid().'.'.$ext;
                    $url = Storage::disk('documentos')->put($name_pdf13, file_get_contents($pdf));
                }
                $Anexo->Listas_precios = $name_pdf16;

                $name_pdf17 = '';
                if ($request->file('Condiciones_Comerciales')){
                    $pdf = $request->file('Condiciones_Comerciales');
                    $ext = $pdf->getClientOriginalExtension();
                    $name_pdf14 = 'Condiciones_Comerciales'.'_'.date('Y').'-'.date('m').'-'.date('d').'-'.uniqid().'.'.$ext;
                    $url = Storage::disk('documentos')->put($name_pdf13, file_get_contents($pdf));
                }
                $Anexo->Condiciones_Comerciales = $name_pdf17;


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

    public function storeanexosn(Request $request,$id)
    {

        $request->validate(
            [
                'SS'=> 'required',
                'Rut'=> 'required',
                'CC'=>'required',
                'CB'=>'required',


            ],
            [
                'SS.required' => 'Documento requerido',
                'Rut.required' => 'Documento  requerido',
                'CC.required' => 'Documento requerido',
                'CB.required' => 'Documento requerido'


            ]);

           try {

                $Anexo = new AnexoModel();
                $name_pdf1 = '';
                if ($request->file('SS')){
                    $pdf = $request->file('SS');
                    $ext = $pdf->getClientOriginalExtension();
                    $name_pdf1 = 'SS'.'_'.date('Y').'-'.date('m').'-'.date('d').'-'.uniqid().'.'.$ext;
                    $url = Storage::disk('documentos')->put($name_pdf1, file_get_contents($pdf));
                }
                $Anexo->SS = $name_pdf1;
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
                if ($request->file('Certificado_c')){
                    $pdf = $request->file('Certificado_c');
                    $ext = $pdf->getClientOriginalExtension();
                    $name_pdf13 = 'Certificado_c'.'_'.date('Y').'-'.date('m').'-'.date('d').'-'.uniqid().'.'.$ext;
                    $url = Storage::disk('documentos')->put($name_pdf13, file_get_contents($pdf));
                }
                $Anexo->Certificado_c = $name_pdf13;
                $name_pdf14 = '';
                if ($request->file('Referencia_comercial2')){
                    $pdf = $request->file('Referencia_comercial2');
                    $ext = $pdf->getClientOriginalExtension();
                    $name_pdf14 = 'Referencia_comercial2'.'_'.date('Y').'-'.date('m').'-'.date('d').'-'.uniqid().'.'.$ext;
                    $url = Storage::disk('documentos')->put($name_pdf13, file_get_contents($pdf));
                }
                $Anexo->Referencia_comercial2 = $name_pdf14;
                $name_pdf15 = '';
                $Anexo->Camara_comercio = $name_pdf15;
                $name_pdf16 = '';
                $Anexo->Listas_precios = $name_pdf16;
                $name_pdf17 = '';
                $Anexo->Condiciones_Comerciales = $name_pdf17;
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
                if ($request->file('Certificado_c')){
                    if ($Anexo->Certificado_c !='') {
                        Storage::disk('documentos')->delete($Anexo->Certificado_c);
                        $name_pdf13 = '';
                        $pdf = $request->file('Certificado_c');
                        $ext = $pdf->getClientOriginalExtension();
                        $name_pdf13 = 'Certificado_c'.'_'.date('Y').'-'.date('m').'-'.date('d').'-'.uniqid().'.'.$ext;
                        $url = Storage::disk('documentos')->put($name_pdf13, file_get_contents($pdf));
                        $Anexo->Certificado_c = $name_pdf13;

                    } else {
                        $name_pdf13 = '';

                        $pdf = $request->file('Certificado_c');
                        $ext = $pdf->getClientOriginalExtension();
                        $name_pdf13 = 'Certificado_c'.'_'.date('Y').'-'.date('m').'-'.date('d').'-'.uniqid().'.'.$ext;
                        $url = Storage::disk('documentos')->put($name_pdf13, file_get_contents($pdf));
                        $Anexo->Certificado_c = $name_pdf13;
                    }


                }

                if ($request->file('Referencia_comercial2')){
                    if ($Anexo->Referencia_comercial2 !='') {
                        Storage::disk('documentos')->delete($Anexo->Referencia_comercial2);
                        $name_pdf14 = '';
                        $pdf = $request->file('Referencia_comercial2');
                        $ext = $pdf->getClientOriginalExtension();
                        $name_pdf14 = 'Referencia_comercial2'.'_'.date('Y').'-'.date('m').'-'.date('d').'-'.uniqid().'.'.$ext;
                        $url = Storage::disk('documentos')->put($name_pdf14, file_get_contents($pdf));
                        $Anexo->Referencia_comercial2 = $name_pdf14;

                    } else {
                        $name_pdf14 = '';

                        $pdf = $request->file('Referencia_comercial2');
                        $ext = $pdf->getClientOriginalExtension();
                        $name_pdf14 = 'Referencia_comercial2'.'_'.date('Y').'-'.date('m').'-'.date('d').'-'.uniqid().'.'.$ext;
                        $url = Storage::disk('documentos')->put($name_pdf14, file_get_contents($pdf));
                        $Anexo->Referencia_comercial2 = $name_pdf14;
                    }


                }

                if ($request->file('Listas_precios')){
                    if ($Anexo->Listas_precios !='') {
                        Storage::disk('documentos')->delete($Anexo->Listas_precios);
                        $name_pdf15 = '';
                        $pdf = $request->file('Listas_precios');
                        $ext = $pdf->getClientOriginalExtension();
                        $name_pdf15 = 'Listas_precios'.'_'.date('Y').'-'.date('m').'-'.date('d').'-'.uniqid().'.'.$ext;
                        $url = Storage::disk('documentos')->put($name_pdf15, file_get_contents($pdf));
                        $Anexo->Listas_precios = $name_pdf15;

                    } else {
                        $name_pdf15 = '';

                        $pdf = $request->file('Listas_precios');
                        $ext = $pdf->getClientOriginalExtension();
                        $name_pdf15 = 'Listas_precios'.'_'.date('Y').'-'.date('m').'-'.date('d').'-'.uniqid().'.'.$ext;
                        $url = Storage::disk('documentos')->put($name_pdf15, file_get_contents($pdf));
                        $Anexo->Listas_precios = $name_pdf15;
                    }


                }


                if ($request->file('Condiciones_Comerciales')){
                    if ($Anexo->Condiciones_Comerciales !='') {
                        Storage::disk('documentos')->delete($Anexo->Condiciones_Comerciales);
                        $name_pdf16 = '';
                        $pdf = $request->file('Condiciones_Comerciales');
                        $ext = $pdf->getClientOriginalExtension();
                        $name_pdf16 = 'Condiciones_Comerciales'.'_'.date('Y').'-'.date('m').'-'.date('d').'-'.uniqid().'.'.$ext;
                        $url = Storage::disk('documentos')->put($name_pdf16, file_get_contents($pdf));
                        $Anexo->Condiciones_Comerciales = $name_pdf16;
                    } else {
                        $name_pdf16 = '';

                        $pdf = $request->file('Condiciones_Comerciales');
                        $ext = $pdf->getClientOriginalExtension();
                        $name_pdf16 = 'Condiciones_Comerciales'.'_'.date('Y').'-'.date('m').'-'.date('d').'-'.uniqid().'.'.$ext;
                        $url = Storage::disk('documentos')->put($name_pdf16, file_get_contents($pdf));
                        $Anexo->Condiciones_Comerciales = $name_pdf16;
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

    public function editanexosn(Request $request,$id)
    {

           try {

                $Anexo = AnexoModel::where('user_id',$id)->first();

                if ($request->file('SS')){
                    if ($Anexo->SS !='') {
                        Storage::disk('documentos')->delete($Anexo->SS);
                        $name_pdf1 = '';
                        $pdf = $request->file('SS');
                        $ext = $pdf->getClientOriginalExtension();
                        $name_pdf1 = 'SS'.'_'.date('Y').'-'.date('m').'-'.date('d').'-'.uniqid().'.'.$ext;
                        $url = Storage::disk('documentos')->put($name_pdf1, file_get_contents($pdf));
                        $Anexo->SS = $name_pdf1;
                    }else{
                        $name_pdf1 = '';
                        $pdf = $request->file('SS');
                        $ext = $pdf->getClientOriginalExtension();
                        $name_pdf1 = 'SS'.'_'.date('Y').'-'.date('m').'-'.date('d').'-'.uniqid().'.'.$ext;
                        $url = Storage::disk('documentos')->put($name_pdf1, file_get_contents($pdf));
                        $Anexo->SS = $name_pdf1;
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
                if ($request->file('Certificado_c')){
                    if ($Anexo->Certificado_c !='') {
                        Storage::disk('documentos')->delete($Anexo->Certificado_c);
                        $name_pdf13 = '';
                        $pdf = $request->file('Certificado_c');
                        $ext = $pdf->getClientOriginalExtension();
                        $name_pdf13 = 'Certificado_c'.'_'.date('Y').'-'.date('m').'-'.date('d').'-'.uniqid().'.'.$ext;
                        $url = Storage::disk('documentos')->put($name_pdf13, file_get_contents($pdf));
                        $Anexo->Certificado_c = $name_pdf13;

                    } else {
                        $name_pdf13 = '';

                        $pdf = $request->file('Certificado_c');
                        $ext = $pdf->getClientOriginalExtension();
                        $name_pdf13 = 'Certificado_c'.'_'.date('Y').'-'.date('m').'-'.date('d').'-'.uniqid().'.'.$ext;
                        $url = Storage::disk('documentos')->put($name_pdf13, file_get_contents($pdf));
                        $Anexo->Certificado_c = $name_pdf13;
                    }


                }

                if ($request->file('Referencia_comercial2')){
                    if ($Anexo->Referencia_comercial2 !='') {
                        Storage::disk('documentos')->delete($Anexo->Referencia_comercial2);
                        $name_pdf13 = '';
                        $pdf = $request->file('Referencia_comercial2');
                        $ext = $pdf->getClientOriginalExtension();
                        $name_pdf13 = 'Referencia_comercial2'.'_'.date('Y').'-'.date('m').'-'.date('d').'-'.uniqid().'.'.$ext;
                        $url = Storage::disk('documentos')->put($name_pdf13, file_get_contents($pdf));
                        $Anexo->Referencia_comercial2 = $name_pdf13;

                    } else {
                        $name_pdf13 = '';

                        $pdf = $request->file('Referencia_comercial2');
                        $ext = $pdf->getClientOriginalExtension();
                        $name_pdf13 = 'Referencia_comercial2'.'_'.date('Y').'-'.date('m').'-'.date('d').'-'.uniqid().'.'.$ext;
                        $url = Storage::disk('documentos')->put($name_pdf13, file_get_contents($pdf));
                        $Anexo->Referencia_comercial2 = $name_pdf13;
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
                if ($request->file('document')) {
                if ($pagare->pagare !='') {
                        $name_pdf1 = '';
                        Storage::disk('documentos')->delete($pagare->pagare);
                        $pdf = $request->file('document');
                        $ext = $pdf->getClientOriginalExtension();
                        $name_pdf1 = 'pagare'.'_'.date('Y').'-'.date('m').'-'.date('d').'-'.uniqid().'.'.$ext;
                        $url = Storage::disk('documentos')->put($name_pdf1, file_get_contents($pdf));
                        $pagare->archivo = $name_pdf1;
                    }else{

                        $pdf = $request->file('document');
                        $ext = $pdf->getClientOriginalExtension();
                        $name_pdf1 = 'pagare'.'_'.date('Y').'-'.date('m').'-'.date('d').'-'.uniqid().'.'.$ext;
                        $url = Storage::disk('documentos')->put($name_pdf1, file_get_contents($pdf));
                        $pagare->archivo = $name_pdf1;
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

            $fondos =  origenDeFondoModel::where('user_id',$id)->first();

           // return $request->file('fondo');
            if ($request->file('fondo')){
                    $name_pdf1 = ' ';
                    $pdf = $request->file('fondo');
                    $ext = $pdf->getClientOriginalExtension();
                    $name_pdf1 = 'fondo'.'_'.date('Y').'-'.date('m').'-'.date('d').'-'.uniqid().'.'.$ext;
                    $url = Storage::disk('documentos')->put($name_pdf1, file_get_contents($pdf));
                    $fondos->archivo = $name_pdf1;

                    if ($fondos->save()) {
                        return redirect('/cliente/documentos_anexos/'.$id);

                    } else {

                        return back();
                    }

            }else{

                return back();


            }

          //  return $name_pdf1;



            //return redirect('/actividad/');
        } catch (\Throwable $th) {
            throw $th;
        }
    }


    public function unirpdf($id)
    {

        try
        {
            $anexo = AnexoModel::where('user_id',$id)->first();

            $fondos =  origenDeFondoModel::where('user_id',$id)->first();

            $pagare =  PagareModel::where('id',$id)->first();


            $i=0;
            $files=[];

            if ($anexo->Camara_comercio != '' ) {
                $files[$i] = public_path('documentos/' . $anexo->Camara_comercio);
                $i++;

            }

            if ($anexo->Rut != '') {
                $files[$i] = public_path('documentos/' . $anexo->Rut);
                $i++;


            }

            if ($anexo->Cc_representante != '') {
                $files[$i] = public_path('documentos/' . $anexo->Cc_representante);
                $i++;


            }
            if ($anexo->Estados_financieros != '') {
                $files[$i] = public_path('documentos/' . $anexo->Cc_representante);
                $i++;


            }
            if ($anexo->Referencia_comercial != '') {
                $files[$i] = public_path('documentos/' . $anexo->Referencia_comercial);
                $i++;

            }
            if ($anexo->ICA != '') {
                $files[$i] = public_path('documentos/' . $anexo->ICA);
                $i++;

            }

            if ($anexo->Contribuyente != '') {
                $files[$i] = public_path('documentos/' . $anexo->Contribuyente);
                $i++;

            }

            if ($anexo->Autoretenedor_f != '') {
                $files[$i] = public_path('documentos/' . $anexo->Autoretenedor_f);
                $i++;
            }

            if ($anexo->Autoretenedor_ICA != '') {
                $files[$i] = public_path('documentos/' . $anexo->Autoretenedor_ICA);
                $i++;

            }

            if ($anexo->Brochure != '') {
                $files[$i] = public_path('documentos/' . $anexo->Brochure);
                $i++;


            }

            if ($anexo->Certificado_bancario != '') {
                $files[$i] = public_path('documentos/' . $anexo->Certificado_bancario);
                $i++;


            }

            if ($anexo->SG_SST != '') {
                $files[$i] = public_path('documentos/' . $anexo->SG_SST);
                $i++;


            }

            if ($anexo->SS != '') {
                $files[$i] = public_path('documentos/' . $anexo->SS);
                $i++;


            }

            if ($anexo->Certificado_c != '' && $anexo->Certificado_c != null) {
                $files[$i] = public_path('documentos/' . $anexo->Certificado_c);
                $i++;

            }

            if ($anexo->Referencia_comercial2 != '' && $anexo->Referencia_comercial2 != null) {
                $files[$i] = public_path('documentos/' . $anexo->Referencia_comercial2);
                $i++;

            }

            if ($anexo->Listas_precios != '' && $anexo->Listas_precios != null) {
                $files[$i] = public_path('documentos/' . $anexo->Listas_precios);
                $i++;

            }

            if ($anexo->Condiciones_Comerciales != '' && $anexo->Condiciones_Comerciales != null) {
                $files[$i] = public_path('documentos/' . $anexo->Condiciones_Comerciales);
                $i++;

            }

            if ($fondos) {

                if ($fondos->archivo != '' && $fondos->archivo != null) {
                    $files[$i] = public_path('documentos/' . $fondos->archivo);
                    $i++;

                }

            }


            if ($pagare) {

                if ($pagare->archivo != '' && $pagare->archivo != null) {
                    $files[$i] = public_path('documentos/' . $pagare->archivo);
                    $i++;

                }

            }


           return redirect()->route('archivounido',['files' => $files]);






/*            $pdf = PDFMerger::init();


            if ($anexo->Camara_comercio != '' ) {
                $file1 = public_path('documentos/' . $anexo->Camara_comercio);
                $pdf->addPDF($file1, 'all');
            }

            if ($anexo->Rut != '') {
                $file2 = public_path('documentos/' . $anexo->Rut);
                $pdf->addPDF($file2, 'all');


            }

            if ($anexo->Cc_representante != '') {
                $file3 = public_path('documentos/' . $anexo->Cc_representante);
                $pdf->addPDF($file3, 'all');


            }
            if ($anexo->Estados_financieros != '') {
                $file4 = public_path('documentos/' . $anexo->Estados_financieros);
                $pdf->addPDF($file4, 'all');


            }
            if ($anexo->Referencia_comercial != '') {
                $file5 = public_path('documentos/' . $anexo->Referencia_comercial);
                $pdf->addPDF($file5, 'all');

            }
            if ($anexo->ICA != '') {
                $file6 = public_path('documentos/' . $anexo->ICA);
                $pdf->addPDF($file6, 'all');

            }

            if ($anexo->Contribuyente != '') {
                $file7 = public_path('documentos/' . $anexo->Contribuyente);
                $pdf->addPDF($file7, 'all');

            }

            if ($anexo->Autoretenedor_f != '') {
                $file8 = public_path('documentos/' . $anexo->Autoretenedor_f);
                $pdf->addPDF($file8, 'all');
            }

            if ($anexo->Autoretenedor_ICA != '') {
                $file9 = public_path('documentos/' . $anexo->Autoretenedor_ICA);
                $pdf->addPDF($file9, 'all');

            }

            if ($anexo->Brochure != '') {
                $file10 = public_path('documentos/' . $anexo->Brochure);
                $pdf->addPDF($file10, 'all');


            }

            if ($anexo->Certificado_bancario != '') {
                $file11 = public_path('documentos/' . $anexo->Certificado_bancario);
                $pdf->addPDF($file11, 'all');


            }

            if ($anexo->SG_SST != '') {
                $file12 = public_path('documentos/' . $anexo->SG_SST);
                $pdf->addPDF($file12, 'all');


            }

            if ($anexo->SS != '') {
                $file13 = public_path('documentos/' . $anexo->SS);
                $pdf->addPDF($file13, 'all');


            }

            if ($anexo->Certificado_c != '' && $anexo->Certificado_c != null) {
                $file14 = public_path('documentos/' . $anexo->Certificado_c);
                $pdf->addPDF($file14, 'all');

            }

            if ($anexo->Referencia_comercial2 != '' && $anexo->Referencia_comercial2 != null) {
                $file15 = public_path('documentos/' . $anexo->Referencia_comercial2);
                $pdf->addPDF($file15, 'all');

            }



            $pdf->merge();

            $mergedFilePath = public_path('documentos/resultante.pdf');



            $pdf->Output(public_path('documentos/resultante.pdf'), 'F');

            return response()->download($mergedFilePath); */



        } catch (Exception $ex) {
            return $ex;
        }
    }


    public function pdf($id)
    {

        try {
            $user = User::find($id);

            if ($user->rol == 1) {
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
                $autorizacion = AutorizacionModel::where('user_id',$id)->first();

            // return $informacionb;
                $data = [
                    'title' => 'Welcome to CodeSolutionStuff.com',
                    'date' => date('m/d/Y')
                ];

                $pdf = PDF::loadView('myPDF', ['data'=>$data, 'cliente'=>$cliente,
                'domicilio'=>$domicilio,'contacto'=>$contacto, 'representante'=>$representante,
                'informaciont'=> $informaciont,'informacionb'=> $informacionb,'informacionf'=> $informacionf,
                'pagare'=> $pagare,'socios'=> $socios,'autorizacion'=> $autorizacion]);

                return $pdf->download('informePersona.pdf');
            } else {
                $Proveedor = ProveedorModel::where('Mail',$user->email)->first();
                $contacto = ContactoModel::where('Cliente_id',$id)->first();
                $representante = RepresentanteLegalModel::where('user_id',$id)->first();
                $personae = personaExpuestaModel::where('user_id',$id)->first();

                $informaciont = InformacionTributariaModel::where('Cliente_id',$id)->first();
                $informacionb = InformacionBancariaModel::where('user_id',$id)->first();
                $informacionf = InformacionFinancieraModel::where('user_id',$id)->first();
                $pagare = PagareModel::where('user_id',$id)->first();
                $autorizacion = AutorizacionModel::where('user_id',$id)->first();
                $socios = AccionistaModel::where('user_id',$id)->get();

                $data = [
                    'title' => 'Welcome to CodeSolutionStuff.com',
                    'date' => date('m/d/Y')
                ];

                $pdf = PDF::loadView('myPDF2', ['data'=>$data, 'Proveedor'=>$Proveedor,
                'contacto'=>$contacto, 'representante'=>$representante,
                'informaciont'=> $informaciont,'informacionb'=> $informacionb,
                'informacionf'=> $informacionf,
                'pagare'=> $pagare,'socios'=> $socios,'autorizacion'=> $autorizacion]);

                return $pdf->download('informePersona.pdf');

            }




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
