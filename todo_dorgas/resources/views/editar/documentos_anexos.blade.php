<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bienvenido</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
  <link rel="stylesheet" href="{{ asset('css/anexos.css') }}">
  <style>

    </style>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="div_main">

            <div class="div_volver mt-3">
                <a href="{{ route('clientes.socios_accionistas',Auth::user()->id) }}" class="btn btn-success btn_cb_c">
                    <i class="fa-solid fa-arrow-left"></i> Regresar</a>
            </div>
            <div class="">
                <a class="btn btn-success btn_cb" href="/declaracion/{{ $id }}"
                                 style="margin-top: 25px;">
                    {{ __('Continuar') }}
                    <i class="fa-solid fa-arrow-right"></i>
                </a>
            </div>
            </div>
        </div>
    </div>
        <div class="row mb-3">
            <div class="col-md-12">
              <div class="text-center">
                <img src="{{ asset('images/logo_t2.png') }}" class="my-4 img-fluid">
                <h1 class="text-primary h1_tit" >Documentos Anexos</h1>
                <hr class="underline under_S">
              </div>
            </div>
        </div>
        <form action="{{ route('editanexos',$id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')

        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-5">
                    <p class="text_main">Por favor adjunte los siguientes documentos.</p>
                </div>
                <div class="col-md-12 mb-4">
                  <div class="div_main">
                    <div class="div_inside">
                        <p class="div_p">Cámara y Comercio<span>*</span></p>
                        <div style="display: flex;">
                            @if ($anexos->Camara_comercio != '')
                            <a class="div_img" id="descarga" data-file="{{ $anexos->Camara_comercio }}" target="_blank">
                                <img src="{{ asset('images/Descargar-PDF.png') }}" alt="Imagen"  class="img-fluid">
                            </a>
                            @endif
                              <div class="div_img">
                                <img src="{{ asset('images/Subir-PDF.png') }}" alt="Imagen" id="img1" class="img-fluid" onclick="document.getElementById('camara_comercio').click()">
                                <input type="file" id="camara_comercio" name="camara_comercio" style="display:none; " onchange="changeImageColor()">
                              </div>
                        </div>

                    </div>


                    <div class="div_inside">
                      <p class="div_p">R.U.T del Año Vigente<span>*</span></p>
                      <div style="display: flex;">
                        @if ($anexos->Rut != '')
                            <a class="div_img" id="descarga2" data-file="{{ $anexos->Rut }}" target="_blank">
                                <img src="{{ asset('images/Descargar-PDF.png') }}" alt="Imagen" id="img1" class="img-fluid">
                            </a>
                        @endif
                        <div class="div_img">
                            <img src="{{ asset('images/Subir-PDF.png') }}" alt="Imagen" id="img2"  class="img-fluid" onclick="document.getElementById('Rut').click()">
                            <input type="file" id="Rut" name="Rut" style="display:none;" onchange="changeImageColor1()">
                          </div>
                      </div>

                    </div>
                    <div class="div_inside">
                      <p class="div_p">Copia de C.C Representante Legal<span></span></p>
                      <div style="display: flex;">
                        @if ($anexos->Cc_representante != '')
                            <a class="div_img" id="descarga3" data-file="{{ $anexos->Cc_representante }}" target="_blank">
                                <img src="{{ asset('images/Descargar-PDF.png') }}" alt="Imagen" id="img1" class="img-fluid">
                            </a>
                            @endif
                        <div class="div_img">
                            <img src="{{ asset('images/Subir-PDF.png') }}" alt="Imagen" id="img3" class="img-fluid" onclick="document.getElementById('CC').click()" >
                            <input type="file" id="CC" name="CC" style="display:none;" onchange="changeImageColor2()">
                          </div>
                      </div>
                    </div>

                  </div>
                </div>

                <div class="col-md-12 mb-5">
                  <div class="div_main">

                    <div class="div_inside">
                      <p class="div_p">Estados Financieros del Año Anterior<span></span></p>
                      <div style="display: flex;">
                        @if ($anexos->Estados_financieros != '')
                            <a class="div_img" id="descarga4" data-file="{{ $anexos->Estados_financieros }}" target="_blank">
                                <img src="{{ asset('images/Descargar-PDF.png') }}" alt="Imagen" id="img1" class="img-fluid">
                            </a>
                            @endif
                        <div class="div_img">
                            <img src="{{ asset('images/Subir-PDF.png') }}" id="img4" alt="Imagen" class="img-fluid" onclick="document.getElementById('FAA').click()">
                            <input type="file" id="FAA" name="FAA" style="display:none;" onchange="changeImageColor3()">
                          </div>
                      </div>

                    </div>

                    <div class="div_inside">
                      <p class="div_p">Referencia Comercial no superior a 1 mes<span>*</span></p>
                      <div style="display: flex;">
                        @if ($anexos->Referencia_comercial != '')
                            <a class="div_img" id="descarga5" data-file="{{ $anexos->Referencia_comercial }}" target="_blank">
                                <img src="{{ asset('images/Descargar-PDF.png') }}" alt="Imagen" id="img1" class="img-fluid">
                            </a>
                            @endif
                        <div class="div_img">
                            <img src="{{ asset('images/Subir-PDF.png') }}" alt="Imagen" id="img5" class="img-fluid" onclick="document.getElementById('RC').click()">
                            <input type="file" id="RC" name="RC" style="display:none;" onchange="changeImageColor4()">
                            </div>
                      </div>

                    </div>
                    <div class="div_inside">
                      <p class="div_p">Resolucion Rete ICA<span></span></p>
                      <div style="display: flex;">
                        @if ($anexos->ICA != '')
                            <a class="div_img" id="descarga6" data-file="{{ $anexos->ICA }}" target="_blank">
                                <img src="{{ asset('images/Descargar-PDF.png') }}" alt="Imagen" id="img1" class="img-fluid">
                            </a>
                            @endif
                        <div class="div_img">
                            <img src="{{ asset('images/Subir-PDF.png') }}" alt="Imagen" id="img6" class="img-fluid" onclick="document.getElementById('RRI').click()">
                            <input type="file" id="RRI" name="RRI" style="display:none;" onchange="changeImageColor5()">
                          </div>
                      </div>

                    </div>
                  </div>
                </div>

                <div class="col-md-12 mb-5">
                  <div class="div_main">
                    <div class="div_inside">
                      <p class="div_p">Gran Contribuyente<span></span></p>
                      <div style="display: flex;">
                        @if ($anexos->Contribuyente != '')
                            <a class="div_img" id="descarga7" data-file="{{ $anexos->Contribuyente }}" target="_blank">
                                <img src="{{ asset('images/Descargar-PDF.png') }}" alt="Imagen" id="img1" class="img-fluid">
                            </a>
                            @endif
                        <div class="div_img">
                            <img src="{{ asset('images/Subir-PDF.png') }}" alt="Imagen" id="img7" class="img-fluid" onclick="document.getElementById('GC').click()">
                            <input type="file" id="GC" name="GC" style="display:none;"  onchange="changeImageColor6()">
                        </div>
                      </div>

                    </div>
                    <div class="div_inside">
                      <p class="div_p">Autoretenedor en la Fuente<span></span></p>
                      <div style="display: flex;">
                        @if ($anexos->Autoretenedor_f != '')
                            <a class="div_img" id="descarga8" data-file="{{ $anexos->Autoretenedor_f }}" target="_blank">
                                <img src="{{ asset('images/Descargar-PDF.png') }}" alt="Imagen" id="img1" class="img-fluid">
                            </a>
                            @endif
                        <div class="div_img">
                            <img src="{{ asset('images/Subir-PDF.png') }}" alt="Imagen" id="img8" class="img-fluid" onclick="document.getElementById('AF').click()">
                            <input type="file" id="AF" name="AF" style="display:none;"  onchange="changeImageColor7()">
                        </div>
                      </div>

                    </div>
                    <div class="div_inside">
                      <p class="div_p">Autoretenedor ICA<span>*</span></p>
                      <div style="display: flex;">
                        @if ($anexos->Autoretenedor_ICA != '')
                            <a class="div_img" id="descarga9" data-file="{{ $anexos->Autoretenedor_ICA }}" target="_blank">
                                <img src="{{ asset('images/Descargar-PDF.png') }}" alt="Imagen" id="img1" class="img-fluid">
                            </a>
                            @endif
                        <div class="div_img">
                            <img src="{{ asset('images/Subir-PDF.png') }}" alt="Imagen" id="img9" class="img-fluid" onclick="document.getElementById('ICA').click()">
                            <input type="file" id="ICA" name="ICA" style="display:none;"  onchange="changeImageColor8()">
                        </div>
                      </div>

                    </div>
                  </div>
                </div>
                <div class="col-md-12 mb-5">
                    <div class="div_main">
                        <div class="div_inside">
                      <p class="div_p">Brochure<span>*</span></p>
                      <div style="display: flex">
                        @if ($anexos->Brochure != '')
                            <a class="div_img" id="descarga10" data-file="{{ $anexos->Brochure }}" target="_blank">
                                <img src="{{ asset('images/Descargar-PDF.png') }}" alt="Imagen" id="img1" class="img-fluid">
                            </a>
                            @endif
                        <div class="div_img">
                            <img src="{{ asset('images/Subir-PDF.png') }}" alt="Imagen" id="img10" class="img-fluid" onclick="document.getElementById('Brochure').click()">
                            <input type="file" id="Brochure" name="Brochure" style="display:none;"  onchange="changeImageColor9()">
                        </div>
                      </div>

                    </div>
                    <div class="div_inside">
                      <p class="div_p">Certificado Bancario<span>*</span></p>
                      <div style="display: flex;">
                        @if ($anexos->Certificado_bancario != '')
                            <a class="div_img" id="descarga11" data-file="{{ $anexos->Certificado_bancario }}" target="_blank">
                                <img src="{{ asset('images/Descargar-PDF.png') }}" alt="Imagen" id="img1" class="img-fluid">
                            </a>
                            @endif
                        <div class="div_img">
                            <img src="{{ asset('images/Subir-PDF.png') }}" alt="Imagen" id="img11" class="img-fluid" onclick="document.getElementById('CB').click()">
                            <input type="file" id="CB" name="CB" style="display:none;"  onchange="changeImageColor10()">
                        </div>
                      </div>

                    </div>
                    <div class="div_inside">
                      <p class="div_p">Certificado de implementacion del SG-SST<span>*</span></p>
                      <div style="display: flex;">
                        @if ($anexos->SG_SST != '')
                            <a class="div_img" id="descarga12" data-file="{{ $anexos->SG_SST  }}" target="_blank">
                                <img src="{{ asset('images/Descargar-PDF.png') }}" alt="Imagen" id="img1" class="img-fluid">
                            </a>
                            @endif
                        <div class="div_img">
                            <img src="{{ asset('images/Subir-PDF.png') }}" alt="Imagen" id="img12" class="img-fluid" onclick="document.getElementById('SG-SST').click()">
                            <input type="file" id="SG-SST" name="SG-SST" style="display:none;"  onchange="changeImageColor11()">
                        </div>
                      </div>

                    </div>
                    </div>
                </div>
                <div class="col-md-12">
                  <div class="div_main2">
                  <div class="div_inside2">
                      <p class="div_p">Certificado de calidad<span>*</span></p>
                      <div style="display: flex;">
                        @if ($anexos->Certificado_c != '')
                            <a class="div_img" id="descarga13" data-file="{{ $anexos->Certificado_c  }}" target="_blank">
                                <img src="{{ asset('images/Descargar-PDF.png') }}" alt="Imagen" id="img1" class="img-fluid">
                            </a>
                            @endif
                        <div class="div_img">
                            <img src="{{ asset('images/Subir-PDF.png') }}" alt="Imagen" id="img13" class="img-fluid" onclick="document.getElementById('Certificado_c').click()">
                            <input type="file" id="Certificado_c" name="Certificado_c" style="display:none;"  onchange="changeImageColor12()">
                        </div>
                      </div>

                    </div>
                    <div class="div_inside">
                        <p class="div_p">Referencia Comercial 2 no superior a 1 mes<span>*</span></p>
                        <div style="display: flex;">
                          @if ($anexos->Referencia_comercial2 != '')
                              <a class="div_img" id="descarga14" data-file="{{ $anexos->Referencia_comercial2  }}" target="_blank">
                                  <img src="{{ asset('images/Descargar-PDF.png') }}" alt="Imagen" id="img14" class="img-fluid">
                              </a>
                              @endif
                          <div class="div_img">
                              <img src="{{ asset('images/Subir-PDF.png') }}" alt="Imagen" id="img12" class="img-fluid" onclick="document.getElementById('Referencia_comercial2').click()">
                              <input type="file" id="Referencia_comercial2" name="Referencia_comercial2" style="display:none;"  onchange="changeImageColor13()">
                          </div>
                        </div>

                      </div>
                  </div>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-md-12">
                    <div class="div_continuar">
                        <button class="btn btn-primary btn_continuar">Guardar y Continuar</button>
                    </div>
                </div>
            </div>
        </form>
        </div>
</div>
<script src="{{ asset('js/documento.js') }}"></script>
<script>const button = document.querySelector('#descarga');
    button.addEventListener('click', function() {
        // Obtener el archivo PDF correspondiente
        const filename = this.getAttribute('data-file');
        // Descargar el archivo
        window.location.href = '/descargar-pdf/' + filename;
    });

   const button2 = document.querySelector('#descarga2');
   if (button2){
        button2.addEventListener('click', function() {
        // Obtener el archivo PDF correspondiente
        const filename = this.getAttribute('data-file');
        // Descargar el archivo
        window.location.href = '/descargar-pdf/' + filename;
    });
    }




    const button3 = document.querySelector('#descarga3');
    if (button3){
        button3.addEventListener('click', function() {
        // Obtener el archivo PDF correspondiente
        const filename = this.getAttribute('data-file');
        // Descargar el archivo
        window.location.href = '/descargar-pdf/' + filename;
    });
    }


    const button4 = document.querySelector('#descarga4');
    if (button4){
        button4.addEventListener('click', function() {
        // Obtener el archivo PDF correspondiente
        const filename = this.getAttribute('data-file');
        // Descargar el archivo
        window.location.href = '/descargar-pdf/' + filename;
    });
    }


    const button5 = document.querySelector('#descarga5');
    if (button5){
        button5.addEventListener('click', function() {
        // Obtener el archivo PDF correspondiente
        const filename = this.getAttribute('data-file');
        // Descargar el archivo
        window.location.href = '/descargar-pdf/' + filename;
    });
    }

    const button6 = document.querySelector('#descarga6');
    if (button6){
        button6.addEventListener('click', function() {
        // Obtener el archivo PDF correspondiente
        const filename = this.getAttribute('data-file');
        // Descargar el archivo
        window.location.href = '/descargar-pdf/' + filename;
    });
    }


    const button7 = document.querySelector('#descarga7');
    if (button7){
        button7.addEventListener('click', function() {
        // Obtener el archivo PDF correspondiente
        const filename = this.getAttribute('data-file');
        // Descargar el archivo
        window.location.href = '/descargar-pdf/' + filename;
    });
    }


    const button8 = document.querySelector('#descarga8');
    if (button8){
        button8.addEventListener('click', function() {
        // Obtener el archivo PDF correspondiente
        const filename = this.getAttribute('data-file');
        // Descargar el archivo
        window.location.href = '/descargar-pdf/' + filename;
    });
    }


    const button9 = document.querySelector('#descarga9');
    if (button9){
        button9.addEventListener('click', function() {
        // Obtener el archivo PDF correspondiente
        const filename = this.getAttribute('data-file');
        // Descargar el archivo
        window.location.href = '/descargar-pdf/' + filename;
    });
    }

    const button10 = document.querySelector('#descarga10');
    if (button10){
        button10.addEventListener('click', function() {
        // Obtener el archivo PDF correspondiente
        const filename = this.getAttribute('data-file');
        // Descargar el archivo
        window.location.href = '/descargar-pdf/' + filename;
    });
    }

    const button11 = document.querySelector('#descarga11');
    if (button11){
        button11.addEventListener('click', function() {
        // Obtener el archivo PDF correspondiente
        const filename = this.getAttribute('data-file');
        // Descargar el archivo
        window.location.href = '/descargar-pdf/' + filename;
    });
    }

    const button12 = document.querySelector('#descarga12');
    if (button12){
        button12.addEventListener('click', function() {
        // Obtener el archivo PDF correspondiente
        const filename = this.getAttribute('data-file');
        // Descargar el archivo
        window.location.href = '/descargar-pdf/' + filename;
    });
    }


    const button13 = document.querySelector('#descarga13');
    button13.addEventListener('click', function() {
        // Obtener el archivo PDF correspondiente
        const filename = this.getAttribute('data-file');
        // Descargar el archivo
        window.location.href = '/descargar-pdf/' + filename;
    });


    const button14 = document.querySelector('#descarga14');
    button14.addEventListener('click', function() {
        // Obtener el archivo PDF correspondiente
        const filename = this.getAttribute('data-file');
        // Descargar el archivo
        window.location.href = '/descargar-pdf/' + filename;
    });

    </script>
</body>

</body>
</html>
