<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bienvenido</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
  <link rel="stylesheet" href="{{ asset('css/pagare.css') }}">

  <!--fuentes-->
  <link href="https://www.dafontfree.net/embed/ZnJhbmtsaW4tZ290aGljLWJvb2stcmVndWxhciZkYXRhLzMyL2YvMTU0MjI1L0ZyYW5rbGluIEdvdGhpYyBCb29rIFJlZ3VsYXIudHRm" rel="stylesheet" type="text/css"/>
  <link href="https://allfont.net/allfont.css?fonts=franklin-gothic-medium" rel="stylesheet" type="text/css" />
  <link href="https://www.dafontfree.net/embed/ZnJhbmtsaW4tZ290aGljLW1lZGl1bS1jb25kLXJlZ3VsYXImZGF0YS8zMi9mLzE1NDEzMC9GcmFua2xpbiBHb3RoaWMgTWVkaXVtIENvbmQgUmVndWxhci50dGY" rel="stylesheet" type="text/css"/>
</head>
<body>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="text-center">
          <img src="{{ asset('images/logo_t2.png') }}" class="my-4 img-fluid">
          <h1 class="text-primary h1_tit">Pagaré</h1>
          <hr class="underline color_under">
        </div>
      </div>
    </div>
    <form action="{{ route('storepagare',$id)}}" method="post" enctype="multipart/form-data">
        @csrf

      <div class="col-md-12">
        <div class="card bg-light mt-4">
          <div class="card-body">
                <center>
                <div class="row">
                  <div class="col-12 text-center">
                  <p class="p_tx">Estimado cliente, sí por políticas de su compañía no está permitido la firma del documento Pagaré,</p>
                  <p class="p_tx">por favor cargar un documento que lo certifique y este firmado por el Representante Legal.</p>
                  <p class="p_tx cus_cus" >¿Aplica para ventas a crédito?<span>*</span></p>
                    <strong class="p_tx text-center">
                    <label class="op_cus">Si <input type="radio" name="credito" id="credito1" value="1"></label>
                    <label class="op_cus">No <input type="radio" name="credito" id="credito0" value="0"></label>
                    </strong>
                  </div>
                  </div>
                </center>
            <div class="row">
            <div class="col-md-3">
                <div class="card text-center border-0 transparente" >
                  <div class="card-body">
                  </div>
                </div>
              </div>
              <div class="col-md-3">
                <div class="card text-center border-0 transparente" >
                  <div class="card-body body_cus">
                    <div class="img_cusx">
                      <img src="{{ asset('images/Descargar-PDF.png') }}" class="image-clas2" alt="">
                    </div>
                    <br><br>
                    <a class="btn btn-primary mt-3 a_cus" id="descarga" data-file="Formato pagaré Inversiones Tododrogas.pdf">DESCARGAR</a><span>*</span>
                    <br>
                    <p class="text-primary p_cv">Descargue el formato de Pagaré y por favor proceda a diligenciar y firmar el mismo.</p>
                    <br>
                  </div>
                </div>
              </div>

              <div class="col-md-3">
                <div class="card border-0 text-center transparente">
                  <div class="card-body body_cus">
                    <div class="img_cusx">
                      <img src="{{ asset('images/Subir-PDF.png') }}" class="image-clas2" alt="">
                    </div>
                    <br><br>

                    <a class="btn btn-primary mt-3 a_cus" onclick="document.getElementById('document').click()">CARGAR</a><span>*</span>
                    <input type="file" id="document" name="document" style="display:none;">

                    <p class="text-primary p_cv">Cargue el formato de Pagaré diligenciado y firmado o el documento de certificación.</p>
                    <br>
                  </div>
                </div>
              </div>
            </div>
            <center>
                <div class="row">
                  <div class="col-12 text-center">

                  <a href="{{ route('home') }}">
                  <button class="btn btn-primary  ml-10 btn_cx">Guardar y Continuar</button>
                </a>
                  </div>
                  </div>
            </center>

          </div>
        </div>
      </div>
    </form>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper-base.min.js"
    integrity="sha384-EQhgPShYZDmf+OWKvoYf70b91G/J0xgfgvbXhNfP60ZQLPv6du/0h0sU6Ygr19d0"
    crossorigin="anonymous"></script>
    <script>
    const button = document.querySelector('#descarga');
        button.addEventListener('click', function() {
            // Obtener el archivo PDF correspondiente
            const filename = this.getAttribute('data-file');

            // Descargar el archivo
            window.location.href = '/descargar-pdf/' + filename;
        });
    </script>

  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <script>
    $(document).ready(function(){


       $.ajax({
      url: "/informaciontributaria/2",
      dataType: "json",
      type: "GET",
      success: function(response) {
          console.log(response);

          informacion_local = response.pagare;

          if (response.informacion.pagare == 'Si') {

              $("#credito1").prop('checked',true);
          } else {
              $("#credito0").prop('checked',true);

          }

      },
      error: function(response) {
          console.log("Ocurrió un error al traer los municipios");
      },
      });
      }

      );

  </script>
</body>
</html>
