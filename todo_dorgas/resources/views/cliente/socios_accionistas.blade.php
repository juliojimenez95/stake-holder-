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
  <link rel="stylesheet" href="{{ asset('css/socios.css') }}">
</head>
<body>
    <div class="container-fluid">
        <div class="row mb-4">
            <div class="col-md-12">
              <div class="text-center">
                <img src="{{ asset('images/logo_t2.png') }}" class="img-fluid">
                <h1 class="text-primary h1_tit">Socios o Accionistas</h1>
                <hr class="underline under_S">
              </div>
            </div>
        </div>
        <div class="container">
            <div class="row mb-4">
                <div class="col-md-12">
                    <div class="content_1">
                        <p>Tiene socios o accionistas con participación directa o indirecta superior a 5%?</p>
                        <div><span>Sí</span>  <input type="radio" id="red" name="color" value="red"> <span>No</span>  <input type="radio" id="" name="color" value=""></div>
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <form action="{{ route('clientes.storeaccionistas',$id) }}" method="post">
                    @csrf
                    <div class="content_main">
                        <div class="div_cus">
                            <label for="">Nombre y Apellidos<span>*</span> </label>
                            <input type="text" class="form-control custom_input" name="Nombre">
                            @if ($errors->has('Nombre'))
                                <p class="text-danger">{{ $errors->first('Nombre') }}</p>
                            @endif

                        </div>
                        <div class="div_cus">
                            <label for="tipo_d" class="form-label label_cus">Tipo documento<span>*</span></label>
                            <select class="form-select form-control" aria-label="Seleccione un tipo de documento" name="tipo_d">
                                <option value="">Tipo de documento...</option>
                                @foreach ($tipos as $tipo)
                                    <option value="{{ $tipo }}">{{ $tipo }}</option>
                                @endforeach

                            </select>
                            @if ($errors->has('tipo_d'))
                                <p class="text-danger">{{ $errors->first('tipo_d') }}</p>
                            @endif
                        </div>
                        <div class="div_cus">
                            <label for="">Participación %<span>*</span> </label>
                            <input type="text" class="form-control custom_input" name="participacion">
                            @if ($errors->has('participacion'))
                                <p class="text-danger">{{ $errors->first('participacion') }}</p>
                            @endif
                        </div>
                        <div class="div_cus">
                            <label for="">Nacionalidad<span>*</span> </label>
                            <input type="text" class="form-control custom_input" name="Nacionalidad">
                        </div>
                        <div class="cont_cus_cus">
                            <div class="div_inside">
                                <p>¿Es considerado PEP?<br><span>(Decreto 830 del 2021)</span></p>
                            </div>
                            <label class="mr-2" >Si <input type="radio" name="PEP" value="1"></label>
                            <label class="mr-2" >No <input type="radio" name="PEP" value="0"></label>

                          </div>
                            </div>
                        </div>
                        <div class="mb-3 cr_cus" >
                            <button class="btn btn-primary btn_crear">Crear</button>
                        </div>
                    </div>
                </form>
                </div>
            </div>
            <div class="container">
                <div class="row">
                  <div class="col-md-12">

                      <table id="miTabla" class="table tb_cus">
                        <thead>
                          <tr>
                              <th>Nombre</th>
                              <th>Participacion</th>
                              <th>Nacionalidad</th>
                              <th>PEP</th>

                          </tr>
                        </thead>
                        <tbody>
                                  @foreach ($accionistas as $accionista)
                                  <tr>
                                      <td>{{ $accionista->Nombres }}</td>
                                      <td>{{ $accionista->Participacion }}</td>
                                      <td>{{ $accionista->Nacionalidad }}</td>

                                      <td> {{ $accionista->PEP }}</td>
                                  </tr>
                              @endforeach

                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
            </div>
            <div class="container">
                <div class="row" style="margin-bottom: 60px;"></div>
            </div>
            <div class="container">
            <div class="row mb-5">
                <div class="col-md-12">
                    <div class="cont_cus">
                        <div class="div_con">
                            <p>Documento Declaración de Origen de Fondos<br><span>Por favor descargar el D.O.F diligenciar y cargarlo nuevamente</span></p>
                        </div>
                        <div class="des_cus">
                            <div class="cont_all">
                                <div class="img_cus">
                                    <img src="{{ asset('images/Descargar-PDF.png') }}" class="img-fluid">
                                </div>
                                <div class="btn_c">
                                    <button class="btn btn-primary">DESCARGAR</button>
                                </div>
                            </div>
                            <div class="cont_all">
                                <div class="img_cus">
                                    <img src="{{ asset('images/Subir-PDF.png') }}" class="img-fluid">
                                </div>
                                <div class="btn_c">
                                    <button class="btn btn-primary">CARGAR</button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="div_continuar">
                        <button class="btn btn-primary btn_continuar">CONTINUAR</button> <span style="color:blue; font-size: 25px;"><i class="fa-solid fa-arrow-right"></i></span>
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