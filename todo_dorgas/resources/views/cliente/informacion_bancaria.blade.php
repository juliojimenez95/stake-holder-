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
  <link rel="stylesheet" href="{{ asset('css/bancaria.css') }}">
</head>
<body>
  <div class="container-fluid">
    <div class="row mb-4">
      <div class="col-md-12">
        <div class="text-center">
          <img src="{{ asset('images/logo_t2.png') }}" class="my-4 img-fluid">
          <h1 class="text-primary h1_tit">Información Bancaria</h1>
          <hr class="underline under_S">
        </div>
      </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="mb-4">
                    <button class="btn btn-primary btn_1">Banco 1</button>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div>
                            <p class="title-ent">Nombre de la Entidad Bancaria<span>*</span></p>
                            <div class="div-filled">
                                    <select class="form-select" aria-label="Default select example" name="banco">
                                        <option value="">Porfavor seleccione un banco</option>
                                        @foreach ($bancos as $banco)
                                            <option value="{{ $banco }}">{{ $banco }}</option>
                                        @endforeach

                                    </select>
                                    @if ($errors->has('banco'))
                                        <p class="text-danger">{{ $errors->first('banco') }}</p>
                                    @endif

                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <form action="">
                            <div class="mb-5">
                                <p class="title-ent">Tipo de Cuenta<span>*</span></p>
                                <div class="div-filled">
                                    <select class="form-select" aria-label="Default select example" name="cuenta">
                                        <option value="">Porfavor seleccione un tipo de cuenta</option>
                                        @foreach ($cuentas as $cuenta)
                                            <option value="{{ $cuenta }}">{{ $cuenta }}</option>
                                        @endforeach

                                    </select>
                                    @if ($errors->has('cuenta'))
                                        <p class="text-danger">{{ $errors->first('cuenta') }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <label for="" class="label_custom">Número de cuenta<span>*</span></label>
                                <input type="text" class="form-control input_custom">
                            </div>

                            <div class="form-group mb-4">
                                <label for="" class="label_custom">Ciudad<span>*</span></label>
                                <select class="form-control select_custom" id="exampleFormControlSelect1">
                                    <option value="">Seleccione una opcion*</option>
                                </select>
                            </div>

                            <div class="form-group mb-4">
                                <label for="" class="label_custom">Departamento<span>*</span></label>
                                <select class="form-control select_custom" id="exampleFormControlSelect1">
                                    <option value="">Seleccione una opcion*</option>
                                </select>
                            </div>

                            <div class="form-group mb-4">
                                <label for="" class="label_custom">País<span>*</span></label>
                                <select class="form-control select_custom" id="exampleFormControlSelect1">
                                    <option value="">Seleccione una opcion*</option>
                                </select>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-4">
                    <button class="btn btn-primary btn_1">(Opcional) Banco 2</button>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div>
                            <p class="title-ent">Nombre de la Entidad Bancaria</p>
                            <div class="div-filled">
                                <div>
                                    <select class="form-select" aria-label="Default select example" name="banco2">
                                        <option value="">Porfavor seleccione un banco</option>
                                        @foreach ($bancos as $banco)
                                            <option value="{{ $banco }}">{{ $banco }}</option>
                                        @endforeach

                                    </select>
                                    @if ($errors->has('banco2'))
                                        <p class="text-danger">{{ $errors->first('banco2') }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <form action="">
                            <div class="mb-5">
                                <p class="title-ent">Tipo de Cuenta<span>*</span></p>
                                <div class="div-filled">
                                    <select class="form-select" aria-label="Default select example" name="cuenta2">
                                        <option value="">Porfavor seleccione un tipo de cuenta</option>
                                        @foreach ($cuentas as $cuenta)
                                            <option value="{{ $cuenta }}">{{ $cuenta }}</option>
                                        @endforeach

                                    </select>
                                    @if ($errors->has('cuenta2'))
                                        <p class="text-danger">{{ $errors->first('cuenta2') }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <label for="" class="label_custom">Número de cuenta<span>*</span></label>
                                <input type="text" class="form-control input_custom">
                            </div>

                            <div class="form-group mb-4">
                                <label for="" class="label_custom">Ciudad<span>*</span></label>
                                <select class="form-control select_custom" id="exampleFormControlSelect1">
                                    <option value="">Seleccione una opcion*</option>
                                </select>
                            </div>

                            <div class="form-group mb-4">
                                <label for="" class="label_custom">Departamento<span>*</span></label>
                                <select class="form-control select_custom" id="exampleFormControlSelect1">
                                    <option value="">Seleccione una opcion*</option>
                                </select>
                            </div>

                            <div class="form-group mb-4">
                                <label for="" class="label_custom">País<span>*</span></label>
                                <select class="form-control select_custom" id="exampleFormControlSelect1">
                                    <option value="">Seleccione una opcion*</option>
                                </select>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="mb-4">
            <div class="div_continuar">
                <button class="btn btn-primary btn_continuar">CONTINUAR</button> <span style="color:blue; font-size: 25px;"><i class="fa-solid fa-arrow-right"></i></span>
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
