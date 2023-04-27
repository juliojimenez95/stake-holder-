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
                   <strong> <p >Conocimiento</p></strong>
                   <strong>  <p >intensificado personas</p> </strong>
                   <strong>  <p >expuestas públicamente</p> </strong>
                   <strong>  <p >o políticamente.</p> </strong>


                    <br> <br>
                  <hr class="underline2"> 
                </div>
            </div>
            <div class="col-12 col-lg-6 d-flex justify-content-center align-items-center">
            <div class="card formulario w-100 " style="border-radius: 50px;">
                    <div class="card-body">
                        <form action="" method="POST">
                            <div class="row mb-6">

                                <div class="col-md-6 col-sm-12">
                                    <label for="tipo_d" class="form-label"><strong>Seleccione tipo documento</strong></label>
                                    <select class="form-select" aria-label="Default select example" name="tipo_d">
                                        <option value="">Porfavor seleccione un tipo de documento...</option>
                                        @foreach ($tipos as $tipo)
                                            <option value="{{ $tipo }}">{{ $tipo }}</option>
                                        @endforeach

                                    </select>
                                    @if ($errors->has('tipo_d'))
                                        <p class="text-danger">{{ $errors->first('tipo_d') }}</p>
                                    @endif
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <label for="n_docuemnto" class="form-label"><strong>Numero documento</strong></label>
                                    <input type="n_docuemnto" class="form-control input_custom" id="n_docuemnto" name="n_docuemnto" value="{{old('n_docuemnto')}}"
                                        placeholder="Numero documento">
                                    @if ($errors->has('n_docuemnto'))
                                        <p class="text-danger">{{ $errors->first('n_docuemnto') }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="row mb-12">

                                <div class="col-md-12 col-sm-12">
                                    <label for="Nombre" class="form-label"><strong>Nombres y apellidos</strong></label>
                                    <input type="text" class="form-control input_custom" id="Nombre" name="Nombre" value="{{old('Nombre')}}"
                                        placeholder=" Nombres y apellidos ">
                                    @if ($errors->has('Nombre'))
                                        <p class="text-danger">{{ $errors->first('Nombre') }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="row mb-6">

                                <div class="col-md-6 col-sm-12">
                                    <label for="Vinculo" class="form-label"><strong>Vinculo/Relación</strong></label>
                                    <input type="text" class="form-control " id="Vinculo" name="Vinculo" value="{{old('Vinculo')}}"
                                        placeholder=" Vinculo ">
                                    @if ($errors->has('Vinculo'))
                                        <p class="text-danger">{{ $errors->first('Vinculo') }}</p>
                                    @endif
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <label for="Cargo" class="form-label"><strong>Cargo</strong></label>
                                    <input type="Cargo" class="form-control " id="Cargo" name="Cargo" value="{{old('Cargo')}}"
                                        placeholder="Cargo">
                                    @if ($errors->has('Cargo'))
                                        <p class="text-danger">{{ $errors->first('Cargo') }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="row mb-6">

                                <div class="col-md-6 col-sm-12">
                                    <label for="Nacionalidad" class="form-label"><strong>Nacionalidad </strong></label>
                                    <input type="text" class="form-control input_custom" id="Nacionalidad" name="Nacionalidad" value="{{old('Nacionalidad')}}"
                                        placeholder=" Nacionalidad ">
                                    @if ($errors->has('Nacionalidad'))
                                        <p class="text-danger">{{ $errors->first('Nacionalidad') }}</p>
                                    @endif
                                </div>
                            </div>
                            <center style="margin-top:10px">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary estilo_boton">continuar</button>
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
