<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bienvenido</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="text-center">
          <img src="{{ asset('images/logo_t2.png') }}" class="my-4 img-fluid">
          <h1 class="text-primary">Pagare</h1>
          <hr class="underline">
        </div>
      </div>
    </div>
    <div class="row ">
      <div class="col-md-12">
        <div class="card text-center bg-light mt-4">
          <div class="card-body">
            <div class="row">
            <div class="col-md-3">
                <div class="card text-center border-0 transparente" >
                  <div class="card-body">

                  </div>
                </div>
              </div>
              <div class="col-md-3">
                <div class="card text-center border-0 transparente" >
                  <div class="card-body">
                    <div class="image3">
                      <img src="{{ asset('images/Descargar-PDF.png') }}" class="image-clas2" alt="">
                    </div>
                    <br><br>

                    <button class="btn btn-primary mt-3">Descargar</button>
                    <br>
                    <p class="text-primary" >Descarga formato de pagaré, por favor diligenciar y firmar.</p>
                    <br>
                  </div>
                </div>
              </div>
              
              <div class="col-md-3">
                <div class="card text-center border-0 transparente" >
                  <div class="card-body">
                    <div class="image3">
                      <img src="{{ asset('images/Subir-PDF.png') }}" class="image-clas2" alt="">
                    </div>
                    <br><br> 

                    <button class="btn btn-primary mt-3">Cargar</button>

                    <p class="text-primary">Cargar formato de pagaré,diligenciado y firmado, o documento de certificación.</p>
                    <br>
                  </div>
                </div>
              </div>
            </div>
            
            <center>
            <div class="row">
              <div class="col-12 text-center">
              <p >Estimado cliente, sí por políticas de su compañía no está permitido la firma del documento pagaré,</p>
              <p >por favor cargar un documento que lo certifique y este firmado por el representante legal.</p>
              <button class="btn btn-primary  ml-10" style="margin-left: 80%;">continuar</button> 
              </div>
              </div>
            </center>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper-base.min.js"
    integrity="sha384-EQhgPShYZDmf+OWKvoYf70b91G/J0xgfgvbXhNfP60ZQLPv6du/0h0sU6Ygr19d0"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
