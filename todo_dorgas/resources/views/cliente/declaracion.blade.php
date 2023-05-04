<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bienvenido</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
  <link rel="stylesheet" href="{{ asset('css/declaracion.css') }}">
</head>
<body>
  <div class="container-fluid">
    <div class="row mb-4">
      <div class="col-md-12">
        <div class="text-center">
          <img src="{{ asset('images/logo_t2.png') }}" class="my-4 img-fluid">
          <h1 class="text-primary p_tit">Declaraciones y Autorizaciones</h1>
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
                    <div class="image3 mb-3">
                      <img src="{{ asset('images/Declaraciones-y-Autorizaciones.png') }}" class="image-clas2" alt="">
                    </div>
                    <br>
                    <a class="btn btn-outline-primary mt-3 color_cus" data-toggle="modal" data-target="#declaracionModal"><strong>Conoce más</strong></a>
                    <br><br>
                    <p class="text-primary cus_cus" >Autorización para el tratamiento de Datos Personales<span>*</span></p>
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

                    <a class="btn btn-outline-primary mt-3 color_cus" data-toggle="modal" data-target="#declaracionModal"><strong>Conoce más</strong></a>
                    <br><br>
                    <p class="text-primary cus_cus" >Autorización consulta y reporte en Centrales de Riesgo<span>*</span></p>
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

                    <a class="btn btn-outline-primary mt-3 color_cus" data-toggle="modal" data-target="#declaracionModal"><strong>Conoce más</strong></a>
                    <br><br>
                    <p class="text-primary cus_cus" >Declaración de Origen de Fondos<span>*</span></p>
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

                    <a class="btn btn-outline-primary mt-3 color_cus" data-toggle="modal" data-target="#declaracionModal"><strong>Conoce más</strong></a>
                    <br>
                    <p class="text-primary cus_cus" >Cumplimiento, Ética en los negocios, Libre competencia,Conflicto de intereses,Medio ambiente e Integridad<span>*</span></p>
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

                    <a class="btn btn-outline-primary mt-3 color_cus" data-toggle="modal" data-target="#declaracionModal"><strong>Conoce más</strong></a>
                    <br><br>
                    <p class="text-primary cus_cus" >Cumplimiento Normas Anticorrupción<span>*</span></p>
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
  <!-- Modal -->
    <div class="modal fade" id="declaracionModal" tabindex="-1" aria-labelledby="declaracionModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="cont_modal">
                    <div class="sec_cus">
                        <h3>Declaración de Origen de Fondos</h3>
                    </div>
                    <p class="p_cus_c">Como representante legal de LA EMPRESA, declaro bajo la gravedad de juramento, que el origen de los recursos de LA EMPRESA,
                    provienen de actividad licitas, que no se encuentra con riesgo negativo en listados de prevención de lavado de activos nacionales
                    o internacionales, ni dentro de una de las dos categorías de lavado de activos (conversión o movimiento), y que en consecuencia
                    LA EMPRESA y el suscrito representante legal, nos obligamos a responder frente a INVERSIONES TODO DROGAS S.A.S y sus compañías, por todos los perjuicios que se llegaran a causar como consecuencia de esta afirmación. Declaro igualmente, que las
                    conductas de LA EMPRESA se ajustan a la ley y a la ética y, en consecuencia, nos obligamos a implementar las medidas tendientes a evitar que nuestras operaciones puedan ser utilizadas con o sin nuestro consentimiento y conocimiento como instrumento
                    para el ocultamiento, manejo, inversión o aprovechamiento de cualquier forma de dinero y otros bienes provenientes de actividades delictivas, o para dar apariencia de legalidad, estas actividades. En el mismo sentido, como Representante Legal me comprometo a que la compañía actuará dentro del marco legal vigente en Colombia, dando cumplimiento a todos los procedimientos,
                    trámites y obligaciones contempladas en la ley y demás normas pertinentes.</p>
                </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
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
