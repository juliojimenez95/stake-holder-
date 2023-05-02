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
</head>
<body>
<div class="container-fluid">
        <div class="row mb-3">
            <div class="col-md-12">
              <div class="text-center">
                <img src="{{ asset('images/logo_t2.png') }}" class="my-4 img-fluid">
                <h1 class="text-primary h1_tit">Documentos Anexos</h1>
                <hr class="underline under_S">
              </div>
            </div>
        </div>
        <form action="" method="post" enctype="multipart/form-data">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-5">
                    <p class="text_main">Por favor necesitamos que adjuntes los documentos necesiarios  en la sección correspondiente.</p>
                </div>
                <div class="col-md-12 mb-4">
                  <div class="div_main">
                    <div class="div_inside">
                        <p class="div_p">Cámara y Comercio<span>*</span></p>
                        <div class="div_img">
                          <img src="{{ asset('images/Subir-PDF.png') }}" alt="Imagen" class="img-fluid" onclick="document.getElementById('camara_comercio').click()">
                          <input type="file" id="camara_comercio" name="camara_comercio" style="display:none;">
                        </div>
                      </div>


                    <div class="div_inside">
                      <p class="div_p">R.U.T del Año Vigente<span>*</span></p>
                      <div class="div_img">
                        <img src="{{ asset('images/Subir-PDF.png') }}" alt="Imagen" class="img-fluid" onclick="document.getElementById('Rut').click()">
                        <input type="file" id="Rut" name="Rut" style="display:none;">
                      </div>
                    </div>
                    <div class="div_inside">
                      <p class="div_p">Copia de C.C Representante Legal<span>*</span></p>
                      <div class="div_img">
                        <img src="{{ asset('images/Subir-PDF.png') }}" alt="Imagen" class="img-fluid" onclick="document.getElementById('CC').click()" >
                        <input type="file" id="CC" name="CC" style="display:none;">
                      </div>
                    </div>
                    <div class="div_inside">
                      <p class="div_p">Estados Financieros del Año Anterior<span>*</span></p>
                      <div class="div_img">
                        <img src="{{ asset('images/Subir-PDF.png') }}" alt="Imagen" class="img-fluid" onclick="document.getElementById('FAA').click()">
                        <input type="file" id="FAA" name="FAA" style="display:none;">
                      </div>
                    </div>

                  </div>
                </div>

                <div class="col-md-12 mb-5">
                  <div class="div_main">
                    <div class="div_inside">
                      <p class="div_p">Referencia Comercial no superior a 1 mes<span>*</span></p>
                      <div class="div_img">
                        <img src="{{ asset('images/Subir-PDF.png') }}" alt="Imagen" class="img-fluid" onclick="document.getElementById('RC').click()">
                        <input type="file" id="RC" name="RC" style="display:none;">
                    </div>
                    </div>
                    <div class="div_inside">
                      <p class="div_p">Resolucion Rete ICA<span>*</span></p>
                      <div class="div_img">
                        <img src="{{ asset('images/Subir-PDF.png') }}" alt="Imagen" class="img-fluid" onclick="document.getElementById('RRI').click()">
                        <input type="file" id="RRI" name="RRI" style="display:none;">
                      </div>
                    </div>
                    <div class="div_inside">
                      <p class="div_p">Gran Contribuyente<span>*</span></p>
                      <div class="div_img">
                        <img src="{{ asset('images/Subir-PDF.png') }}" alt="Imagen" class="img-fluid" onclick="document.getElementById('GC').click()">
                        <input type="file" id="GC" name="GC" style="display:none;">
                    </div>
                    </div>
                    <div class="div_inside">
                      <p class="div_p">Autoretenedor en la Fuente<span>*</span></p>
                      <div class="div_img">
                        <img src="{{ asset('images/Subir-PDF.png') }}" alt="Imagen" class="img-fluid" onclick="document.getElementById('AF').click()">
                        <input type="file" id="AF" name="AF" style="display:none;">
                    </div>
                    </div>
                  </div>
                </div>

                <div class="col-md-12 mb-5">
                  <div class="div_main">
                    <div class="div_inside">
                      <p class="div_p">Autoretenedor ICA<span>*</span></p>
                      <div class="div_img">
                        <img src="{{ asset('images/Subir-PDF.png') }}" alt="Imagen" class="img-fluid" onclick="document.getElementById('ICA').click()">
                        <input type="file" id="ICA" name="ICA" style="display:none;">
                    </div>
                    </div>
                    <div class="div_inside">
                      <p class="div_p">Brochure<span>*</span></p>
                      <div class="div_img">
                        <img src="{{ asset('images/Subir-PDF.png') }}" alt="Imagen" class="img-fluid" onclick="document.getElementById('Brochure').click()">
                        <input type="file" id="Brochure" name="Brochure" style="display:none;">
                    </div>
                    </div>
                    <div class="div_inside">
                      <p class="div_p">Certificado Bancario<span>*</span></p>
                      <div class="div_img">
                        <img src="{{ asset('images/Subir-PDF.png') }}" alt="Imagen" class="img-fluid" onclick="document.getElementById('CB').click()">
                        <input type="file" id="CB" name="CB" style="display:none;">
                    </div>
                    </div>
                    <div class="div_inside">
                      <p class="div_p">Certificado de implementacion del SG-SST<span>*</span></p>
                      <div class="div_img">
                        <img src="{{ asset('images/Subir-PDF.png') }}" alt="Imagen" class="img-fluid" onclick="document.getElementById('SG-SST').click()">
                        <input type="file" id="SG-SST" name="SG-SST" style="display:none;">
                    </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="div_main">
                  <div class="div_inside">
                      <p class="div_p">Plantilla Aporte Seguridad Social<span>*</span></p>
                      <div class="div_img">
                        <img src="{{ asset('images/Subir-PDF.png') }}" alt="Imagen" class="img-fluid" onclick="document.getElementById('SS').click()">
                        <input type="file" id="SS" name="SS" style="display:none;">
                    </div>
                    </div>
                  </div>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-md-12">
                    <div class="div_continuar">
                        <button class="btn btn-primary btn_continuar">CONTINUAR</button> <span style="color:blue; font-size: 25px;"><i class="fa-solid fa-arrow-right"></i></span>
                    </div>
                </div>
            </div>
        </form>
        </div>
</div>
</body>
</html>
