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
use App\Models\PagareModel;
use App\Models\AnexoModel;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;


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

    public function storepagare(Request $request,$id)
    {

        try {

            $pagare = new PagareModel();
            $name_pdf1 = '';
            if ($request->file('document')) {
                $pdf = $request->file('document');
                $ext = $pdf->getClientOriginalExtension();
                $name_pdf1 = 'pagare'.'_'.date('Y').'-'.date('m').'-'.date('d').'-'.uniqid().'.'.$ext;
                $url = Storage::disk('documentos')->put($name_pdf1, file_get_contents($pdf));
            }
            $pagare->archivo = $name_pdf1;
            $pagare->pagare = $request->credito;
            $pagare->user_id = $id;

            if ($pagare->save()) {
                return redirect('/home');

            } else {

                return back();
            }

            //return redirect('/actividad/');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
