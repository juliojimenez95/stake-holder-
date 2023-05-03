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
          <h1 class="text-primary">Declaraciones y Autorizaciones</h1>
          <hr class="underline">
        </div>
      </div>
    </div>
    <div class="row ">
      <div class="col-md-12">
        <form action="{{ route('storedeclaracion',$id) }}" method="post">
        @csrf
        <div class="card text-center bg-light mt-4">
          <div class="card-body">
            <div class="row">

              <div class="col-md-2">
                <div class="card text-center border-0 transparente" >
                  <div class="card-body">
                    <div class="image3">
                      <img src="{{ asset('images/Declaraciones-y-Autorizaciones.png') }}" class="image-clas2" alt="">
                    </div>
                    <br>
                    <button class="btn btn-outline-primary mt-3"><strong>Conoce mas</strong></button>
                    <br><br>
                    <p class="text-primary" >Autorización para el tratamiento de Datos Personales</p>
                    <strong class="text-primary">
                    <label >Si <input type="radio" name="grupo1" value="1"></label>
                    <label >No <input type="radio" name="grupo1" value="0"></label>
                    </strong>
                    <br><br><br>
                  </div>
                </div>
              </div>
              <div class="col-md-3">
                <div class="card text-center border-0 transparente" >
                  <div class="card-body">
                    <div class="image3">
                      <img src="{{ asset('images/Declaraciones-y-Autorizaciones.png') }}" class="image-clas2" alt="">
                    </div>
                    <br>

                    <button class="btn btn-outline-primary mt-3"><strong>Conoce mas</strong></button>
                    <br><br>
                    <p class="text-primary" >Autorización consulta y reporte en Centrales de Riesgo</p>
                    <br>
                    <strong class="text-primary">
                    <label >Si <input type="radio" name="grupo2" value="1"></label>
                    <label >No <input type="radio" name="grupo2" value="0"></label>
                    </strong>

                    <br><br><br>
                  </div>
                </div>
              </div>
              <div class="col-md-2">
                <div class="card text-center border-0 transparente" >
                  <div class="card-body">
                    <div class="image3">
                      <img src="{{ asset('images/Declaraciones-y-Autorizaciones.png') }}" class="image-clas2" alt="">
                    </div>
                    <br>

                    <button class="btn btn-outline-primary mt-3"><strong>Conoce mas</strong></button>
                    <br><br>
                    <p class="text-primary" >Declaración de Origen de Fondos</p>
                    <strong class="text-primary">
                    <br>
                    <label >Si <input type="radio" name="grupo3" value="1"></label>
                    <label >No <input type="radio" name="grupo3" value="0"></label>
                    </strong>
                    <br><br><br>

                  </div>
                </div>
              </div>
              <div class="col-md-3">
                <div class="card text-center border-0 transparente" >
                  <div class="card-body">
                    <div class="image3">
                      <img src="{{ asset('images/Declaraciones-y-Autorizaciones.png') }}" class="image-clas2" alt="">
                    </div>
                    <br>

                    <button class="btn btn-outline-primary mt-3"><strong>Conoce mas</strong></button>
                    <br>
                    <p class="text-primary" >Cumplimiento, Ética en los negocios, Libre competencia,Conflicto de intereses,Medio ambiente e Integridad</p>
                    <strong class="text-primary">
                    <label >Si <input type="radio" name="grupo4" value="1"></label>
                    <label >No <input type="radio" name="grupo4" value="0"></label>
                    </strong>
                    <br><br><br>
                  </div>
                </div>
              </div>
              <div class="col-md-2">
                <div class="card text-center border-0 transparente" >
                  <div class="card-body">
                    <div class="image3">
                      <img src="{{ asset('images/Declaraciones-y-Autorizaciones.png') }}" class="image-clas2" alt="">
                    </div>
                    <br>

                    <button class="btn btn-outline-primary mt-3"><strong>Conoce mas</strong></button>
                    <br><br>
                    <p class="text-primary" >Cumplimiento Normas Anticorrupción</p>
                    <strong class="text-primary">
                    <label >Si <input type="radio" name="grupo5" value="1"></label>
                    <label >No <input type="radio" name="grupo5" value="0"></label>
                    </strong>
                    <br><br><br>
                  </div>
                </div>
              </div>
            </div>

              <button class="btn btn-primary text-center  ml-10" >FINALIZAR Y ENVIAR</button>

          </div>
        </div>
    </form>
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
