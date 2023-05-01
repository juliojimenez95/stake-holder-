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
                    <div class="content_main">
                        <div class="div_cus">
                            <label for="">Nombre y Apellidos<span>*</span> </label>
                            <input type="text" class="form-control custom_input">
                        </div>
                        <div class="div_cus">
                            <label for="">Tipo de documento<span>*</span> </label>
                            <select class="select_cus form-control">
                                <option value="">Elija una opcion</option>
                            </select>
                        </div>
                        <div class="div_cus">
                            <label for="">Participación %<span>*</span> </label>
                            <input type="text" class="form-control custom_input">
                        </div>
                        <div class="div_cus">
                            <label for="">Nacionalidad<span>*</span> </label>
                            <input type="text" class="form-control custom_input">
                        </div>
                        <div class="">
                            <div class="div_inside">
                                <p>¿Es considerado PEP?<br><span>(Decreto 830 del 2021)</span></p>
                                <div><span>Sí</span>  <input type="radio" id="red" name="color" value="red"> <span>No</span>  <input type="radio" id="" name="color" value=""></div>
                            </div>
                        </div>
                        <div class="">
                            <button class="btn btn-primary btn_crear">Crear</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" style="margin-bottom: 60px;"></div>
            <div class="row">
                <div class="col-md-12">
                    <div class="cont_cus">
                        <div class="div_con">
                            <p>Documento Declaración de Origen de Fondosbr<br><span>Por favor descargar el D.O.F diligenciar y cargarlo nuevamente</span></p>
                        </div>
                        <div class="des_cus">
                            <div>
                                <div class="img_cus">
                                    <img src="{{ asset('images/Descargar-PDF.png') }}" class="img-fluid">
                                </div>
                                <div>
                                    <button class="btn btn-primary">DESCARGAR</button>
                                </div>
                            </div>
                            <div>
                                <div class="img_cus">
                                    <img src="{{ asset('images/Subir-PDF.png') }}" class="img-fluid">
                                </div>
                                <div>
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

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper-base.min.js"
    integrity="sha384-EQhgPShYZDmf+OWKvoYf70b91G/J0xgfgvbXhNfP60ZQLPv6du/0h0sU6Ygr19d0"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
