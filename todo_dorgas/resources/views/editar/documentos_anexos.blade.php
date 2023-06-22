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
        <div class="row mb-3">
            <div class="col-md-12">
              <div class="text-center">
                <img src="{{ asset('images/logo_t2.png') }}" class="my-4 img-fluid">
                <h1 class="text-primary h1_tit" >Documentos Anexos</h1>
                <hr class="underline under_S">
              </div>
            </div>
        </div>
        <form action="{{ route('storeanexos',$id) }}" method="post" enctype="multipart/form-data">
        @csrf
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
                            <a class="div_img" href="https://www.google.com" target="_blank">
                                <img src="{{ asset('images/Descargar-PDF.png') }}" alt="Imagen" id="img1" class="img-fluid">
                            </a>
                              <div class="div_img">
                                <img src="{{ asset('images/Subir-PDF.png') }}" alt="Imagen" id="img1" class="img-fluid" onclick="document.getElementById('camara_comercio').click()">
                                <input type="file" id="camara_comercio" name="camara_comercio" style="display:none; " onchange="changeImageColor()">
                              </div>
                        </div>

                    </div>


                    <div class="div_inside">
                      <p class="div_p">R.U.T del Año Vigente<span>*</span></p>
                      <div style="display: flex;">
                        <a class="div_img" href="https://www.google.com" target="_blank">
                            <img src="{{ asset('images/Descargar-PDF.png') }}" alt="Imagen" id="img1" class="img-fluid">
                        </a>
                        <div class="div_img">
                            <img src="{{ asset('images/Subir-PDF.png') }}" alt="Imagen" id="img2"  class="img-fluid" onclick="document.getElementById('Rut').click()">
                            <input type="file" id="Rut" name="Rut" style="display:none;" onchange="changeImageColor1()">
                          </div>
                      </div>

                    </div>
                    <div class="div_inside">
                      <p class="div_p">Copia de C.C Representante Legal<span>*</span></p>
                      <div style="display: flex;">
                        <a class="div_img" href="https://www.google.com" target="_blank">
                            <img src="{{ asset('images/Descargar-PDF.png') }}" alt="Imagen" id="img1" class="img-fluid">
                        </a>
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
                      <p class="div_p">Estados Financieros del Año Anterior<span>*</span></p>
                      <div style="display: flex;">
                        <a class="div_img" href="https://www.google.com" target="_blank">
                            <img src="{{ asset('images/Descargar-PDF.png') }}" alt="Imagen" id="img1" class="img-fluid">
                        </a>
                        <div class="div_img">
                            <img src="{{ asset('images/Subir-PDF.png') }}" id="img4" alt="Imagen" class="img-fluid" onclick="document.getElementById('FAA').click()">
                            <input type="file" id="FAA" name="FAA" style="display:none;" onchange="changeImageColor3()">
                          </div>
                      </div>

                    </div>

                    <div class="div_inside">
                      <p class="div_p">Referencia Comercial no superior a 1 mes<span>*</span></p>
                      <div style="display: flex;">
                        <a class="div_img" href="https://www.google.com" target="_blank">
                            <img src="{{ asset('images/Descargar-PDF.png') }}" alt="Imagen" id="img1" class="img-fluid">
                        </a>
                        <div class="div_img">
                            <img src="{{ asset('images/Subir-PDF.png') }}" alt="Imagen" id="img5" class="img-fluid" onclick="document.getElementById('RC').click()">
                            <input type="file" id="RC" name="RC" style="display:none;" onchange="changeImageColor4()">
                            </div>
                      </div>

                    </div>
                    <div class="div_inside">
                      <p class="div_p">Resolucion Rete ICA<span>*</span></p>
                      <div style="display: flex;">
                        <a class="div_img" href="https://www.google.com" target="_blank">
                            <img src="{{ asset('images/Descargar-PDF.png') }}" alt="Imagen" id="img1" class="img-fluid">
                        </a>
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
                      <p class="div_p">Gran Contribuyente<span>*</span></p>
                      <div style="display: flex;">
                        <a class="div_img" href="https://www.google.com" target="_blank">
                            <img src="{{ asset('images/Descargar-PDF.png') }}" alt="Imagen" id="img1" class="img-fluid">
                        </a>
                        <div class="div_img">
                            <img src="{{ asset('images/Subir-PDF.png') }}" alt="Imagen" id="img7" class="img-fluid" onclick="document.getElementById('GC').click()">
                            <input type="file" id="GC" name="GC" style="display:none;"  onchange="changeImageColor6()">
                        </div>
                      </div>

                    </div>
                    <div class="div_inside">
                      <p class="div_p">Autoretenedor en la Fuente<span>*</span></p>
                      <div style="display: flex;">
                        <a class="div_img" href="https://www.google.com" target="_blank">
                            <img src="{{ asset('images/Descargar-PDF.png') }}" alt="Imagen" id="img1" class="img-fluid">
                        </a>
                        <div class="div_img">
                            <img src="{{ asset('images/Subir-PDF.png') }}" alt="Imagen" id="img8" class="img-fluid" onclick="document.getElementById('AF').click()">
                            <input type="file" id="AF" name="AF" style="display:none;"  onchange="changeImageColor7()">
                        </div>
                      </div>

                    </div>
                    <div class="div_inside">
                      <p class="div_p">Autoretenedor ICA<span>*</span></p>
                      <div style="display: flex;">
                        <a class="div_img" href="https://www.google.com" target="_blank">
                            <img src="{{ asset('images/Descargar-PDF.png') }}" alt="Imagen" id="img1" class="img-fluid">
                        </a>
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
                        <a class="div_img" href="https://www.google.com" target="_blank">
                            <img src="{{ asset('images/Descargar-PDF.png') }}" alt="Imagen" id="img1" class="img-fluid">
                        </a>
                        <div class="div_img">
                            <img src="{{ asset('images/Subir-PDF.png') }}" alt="Imagen" id="img10" class="img-fluid" onclick="document.getElementById('Brochure').click()">
                            <input type="file" id="Brochure" name="Brochure" style="display:none;"  onchange="changeImageColor9()">
                        </div>
                      </div>

                    </div>
                    <div class="div_inside">
                      <p class="div_p">Certificado Bancario<span>*</span></p>
                      <div style="display: flex;">
                        <a class="div_img" href="https://www.google.com" target="_blank">
                            <img src="{{ asset('images/Descargar-PDF.png') }}" alt="Imagen" id="img1" class="img-fluid">
                        </a>
                        <div class="div_img">
                            <img src="{{ asset('images/Subir-PDF.png') }}" alt="Imagen" id="img11" class="img-fluid" onclick="document.getElementById('CB').click()">
                            <input type="file" id="CB" name="CB" style="display:none;"  onchange="changeImageColor10()">
                        </div>
                      </div>

                    </div>
                    <div class="div_inside">
                      <p class="div_p">Certificado de implementacion del SG-SST<span>*</span></p>
                      <div style="display: flex;">
                        <a class="div_img" href="https://www.google.com" target="_blank">
                            <img src="{{ asset('images/Descargar-PDF.png') }}" alt="Imagen" id="img1" class="img-fluid">
                        </a>
                        <div class="div_img">
                            <img src="{{ asset('images/Subir-PDF.png') }}" alt="Imagen" id="img12" class="img-fluid" onclick="document.getElementById('SG-SST').click()">
                            <input type="file" id="SG-SST" name="SG-SST" style="display:none;"  onchange="changeImageColor11()">
                        </div>
                      </div>

                    </div>
                    </div>
                </div>
                <div class="col-md-12">
                  <div class="div_main">
                  <div class="div_inside">
                      <p class="div_p">Plantilla Aporte Seguridad Social<span>*</span></p>
                      <div style="display: flex;">
                        <a class="div_img" href="https://www.google.com" target="_blank">
                            <img src="{{ asset('images/Descargar-PDF.png') }}" alt="Imagen" id="img1" class="img-fluid">
                        </a>
                        <div class="div_img">
                            <img src="{{ asset('images/Subir-PDF.png') }}" alt="Imagen" id="img13" class="img-fluid" onclick="document.getElementById('SS').click()">
                            <input type="file" id="SS" name="SS" style="display:none;"  onchange="changeImageColor12()">
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

</body>
</html>
