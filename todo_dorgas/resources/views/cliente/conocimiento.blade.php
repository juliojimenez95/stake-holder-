<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo Drogas</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Agregar el enlace de jquery -->
    <script
            src="https://code.jquery.com/jquery-3.6.3.js"
            integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM="
            crossorigin="anonymous"></script>
    <!-- Agregar el enlace a la hoja de estilo del public -->
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/conocimiento.css') }}">
    <!-- Agregar el enlace a la hoja de estilo de Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container-fluid">
     <div class="row">
      <div class="col-md-12">
        <div class="text-center">
          <img src="{{ asset('images/logo_t2.png') }}"   class=" my-4 img-fluid">
        </div>
      </div>
     </div>
        <div class="row d-flex ">
            <div class="col-12 col-lg-6 " style="background-color: #004492; height: 640px; color: white;">
                <div class="d-flex justify-content-center  h-100 flex-column alinear">
                   <p class="p_cvv">Conocimiento <br>
                    intensificado personas <br>
                    expuestas públicamente <br>
                    o políticamente.</p>
                  <hr class="underline2">
                  <p class="p_sm">¿Alguno de los administradores, socios, <br>
                    accionistas, representantes legales, bróker <br>
                    comercial o miembros de la junta directiva, <br>
                    son personas expuestas políticamente o <br>
                    públicamente?</p>
                    <div class="div_rad">
                        <span>Si</span><input type="radio"  class="span_one">
                        <span>No</span><input type="radio">
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-6 d-flex justify-content-center align-items-center">
            <div class="card formulario w-100 " style="border-radius: 50px;">
                    <div class="card-body">
                        <form action="{{ route('clientes.storepersonaE',$id) }}" method="POST">
                            @csrf
                            <div class="row mb-4">
                                <div class="col-md-12">
                                    <h4 class="h1_n">Si la respuesta es afirmativa, por favor
                                        diligencie la siguiente sección.</h4>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6 col-sm-12">
                                    <label for="tipo_d" class="form-label lb_cus"><strong>Tipo de documento<span>*</span></strong></label>
                                    <select class="form-control sl_cus" aria-label="Tipo de documento" name="tipo_d">
                                        <option value="">Seleccione un tipo de documento...</option>
                                        @foreach ($tipos as $tipo)
                                            <option value="{{ $tipo }}">{{ $tipo }}</option>
                                        @endforeach

                                    </select>
                                    @if ($errors->has('tipo_d'))
                                        <p class="text-danger">{{ $errors->first('tipo_d') }}</p>
                                    @endif
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <label for="n_docuemnto" class="form-label lb_cus"><strong>Número de documento<span>*</span></strong></label>
                                    <input type="n_docuemnto" class="form-control input_custom sl_cus" id="n_docuemnto" name="n_docuemnto" value="{{old('n_docuemnto')}}"
                                        placeholder="Numero documento">
                                    @if ($errors->has('n_docuemnto'))
                                        <p class="text-danger">{{ $errors->first('n_docuemnto') }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="row mb-3">

                                <div class="col-md-12 col-sm-12">
                                    <label for="Nombre" class="form-label lb_cus"><strong>Nombres y Apellidos<span>*</span></strong></label>
                                    <input type="text" class="form-control input_custom sl_cus" id="Nombre" name="Nombre" value="{{old('Nombre')}}"
                                        placeholder=" Nombres y apellidos ">
                                    @if ($errors->has('Nombre'))
                                        <p class="text-danger">{{ $errors->first('Nombre') }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="row mb-3">

                                <div class="col-md-6 col-sm-12">
                                    <label for="Vinculo" class="form-label lb_cus"><strong>Vinculo/Relación<span>*</span></strong></label>
                                    <input type="text" class="form-control sl_cus" id="Vinculo" name="Vinculo" value="{{old('Vinculo')}}"
                                        placeholder=" Vinculo ">
                                    @if ($errors->has('Vinculo'))
                                        <p class="text-danger">{{ $errors->first('Vinculo') }}</p>
                                    @endif
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <label for="Cargo" class="form-label lb_cus"><strong>Cargo<span>*</span></strong></label>
                                    <input type="Cargo" class="form-control sl_cus" id="Cargo" name="Cargo" value="{{old('Cargo')}}"
                                        placeholder="Cargo">
                                    @if ($errors->has('Cargo'))
                                        <p class="text-danger">{{ $errors->first('Cargo') }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="row mb-5">

                                <div class="col-md-6 col-sm-12">
                                    <label for="Nacionalidad" class="form-label lb_cus"><strong>Nacionalidad<span>*</span></strong></label>
                                    <input type="text" class="form-control input_custom sl_cus" id="Nacionalidad" name="Nacionalidad" value="{{old('Nacionalidad')}}"
                                        placeholder=" Nacionalidad ">
                                    @if ($errors->has('Nacionalidad'))
                                        <p class="text-danger">{{ $errors->first('Nacionalidad') }}</p>
                                    @endif
                                </div>
                            </div>
                            <center style="margin-top:10px">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary estilo_boton">Guardar y Continuar</button>
                            </div>
                            </center>

                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
        <!-- Agregar el script de JavaScript de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Agregar el script de JavaScript de la carpeta public -->
    <script src="{{ asset('js/principal.js') }}"></script>
</body>
</html>
