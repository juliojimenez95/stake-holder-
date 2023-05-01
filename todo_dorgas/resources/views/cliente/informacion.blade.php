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
          <h1 class="text-primary">Informacion contable y financiero</h1>
          <hr class="underline">
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="card bg-light mt-4">
          <div class="card-body">
            <div class="row">
              <div class="col-md-3">
                <div class="card text-center border-0 transparente">
                  <div class="card-body">
                  <div class="image3">
                    <img src="{{ asset('images/Información-Tributaria.png') }}" class="image-clas2" alt="">
                    </div>
                    <br><br>
                    <h3>Informacion</h3>
                    <h3>Tributaria</h3>
                    <a href="{{ route('cliente.informaciont',$id) }}">
                    <button class="btn btn-primary mt-3">vista</button>
                    </a>
                    <br><br>

                  </div>
                </div>
              </div>
              <div class="col-md-3">
                <div class="card text-center border-0 transparente">
                  <div class="card-body">
                  <div class="image3">
                    <img src="{{ asset('images/Información-financiera.png') }}" class="image-clas2" alt="">
                    </div>
                    <br><br>
                    <h3>Informacion</h3>
                    <h3>Financiera</h3>
                    <a href="{{ route('cliente.informacionf',$id) }}">
                        <button class="btn btn-primary mt-3">vista</button>
                    </a>
                    <br><br>
                  </div>
                </div>
              </div>
              <div class="col-md-3">
                <div class="card text-center border-0 transparente">
                  <div class="card-body">
                  <div class="image3">
                    <img src="{{ asset('images/Pagaré.png') }}" class="image-clas2" alt="">
                    </div>
                    <br><br>
                    <h3>Pagare</h3>
                    <p>¿aplicacion  para venta de credito? </p>

                    <a href="{{ route('cliente.pagare',$id) }}">
                        <button class="btn btn-primary mt-3">vista</button>
                    </a>
                    <br><br>

                  </div>
                </div>
              </div>
              <div class="col-md-3">
                <div class="card text-center border-0 transparente">
                  <div class="card-body">
                    <div class="image3">
                       <img src="{{ asset('images/Información-Bancaria.png') }}" class="image-clas2" alt="">
                    </div>
                    <br><br>
                    <h3>Informacion</h3>
                    <h3>Bancaria</h3>

                    <a href="{{ route('cliente.informacionb',$id) }}">
                        <button class="btn btn-primary mt-3">vista</button>
                    </a>
                    <br><br>
                  </div>
                </div>
              </div>
            </div>
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
