<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo Drogas</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/contacto.css') }}">
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
                    <h3 class="datos h3_tit">Datos personales</h3>
                   <strong> <h2 class="my-3 persona_c h2_tit">Persona</h2></strong>
                   <strong>  <h2 class="natural_c h2_tit">Contacto</h2> </strong> <br> <br>
                  <hr class="underline2">
                </div>
            </div>
            <div class="col-12 col-lg-6 d-flex justify-content-center align-items-center">
            <div class="card formulario w-100 " style="border-radius: 50px;">
                    <div class="card-body">
                        <form action="{{ route('editcontactopn',$id) }}" method="POST">
                            @csrf
                            @method('put')
                            <div class="row mb-3">

                                <div class="col-md-12 col-sm-12">
                                    <label for="Nombre" class="form-label label_c"><strong>Nombres y Apellidos<span>*</span></strong></label>
                                    <input type="text" class="form-control input_custom select_c" id="Nombre" name="Nombre" value="{{ $contacto->Nombre1 }}"
                                        placeholder="">
                                    @if ($errors->has('Nombre'))
                                        <p class="text-danger">{{ $errors->first('Nombre') }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="row mb-3">

                                <div class="col-md-6 col-sm-12">
                                    <label for="tipo_d" class="form-label label_c"><strong>Tipo de documento<span>*</span></strong></label>
                                    <select class="form-control select_custom" aria-label="Default select example" name="tipo_d">
                                        <option value="{{ $contacto->TipoNit }}">{{ $contacto->TipoNit }}</option>
                                        @foreach ($tipos as $tipo)
                                            <option value="{{ $tipo }}">{{ $tipo }}</option>
                                        @endforeach

                                    </select>
                                    @if ($errors->has('tipo_d'))
                                        <p class="text-danger">{{ $errors->first('tipo_d') }}</p>
                                    @endif
                                </div>

                                <div class="col-md-6 col-sm-12">
                                    <label for="n_docuemnto" class="form-label label_c"><strong>Número documento<span>*</span></strong></label>
                                    <input type="n_docuemnto" class="form-control input_custom select_c" id="n_docuemnto" name="n_docuemnto" value="{{ $contacto->Nit }}"
                                        placeholder="">
                                    @if ($errors->has('n_docuemnto'))
                                        <p class="text-danger">{{ $errors->first('n_docuemnto') }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="row mb-3">

                                <div class="col-md-6 col-sm-12">
                                    <label for="email" class="form-label label_c"><strong>Correo electrónico<span>*</span></strong></label>
                                    <input type="text" class="form-control input_custom select_c" id="email" name="email" value="{{ $contacto->Email }}"
                                        placeholder="">
                                    @if ($errors->has('email'))
                                        <p class="text-danger">{{ $errors->first('email') }}</p>
                                    @endif
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <label for="telefono" class="form-label label_c"><strong>Teléfono<span>*</span></strong></label>
                                    <input type="telefono" class="form-control input_custom select_c" id="telefono" name="telefono" value="{{ $contacto->Telefono }}"
                                        placeholder="">
                                    @if ($errors->has('telefono'))
                                        <p class="text-danger">{{ $errors->first('telefono') }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-6 col-sm-12">
                                    <label for="cargo" class="form-label label_c"><strong>Cargo<span>*</span></strong></label>
                                    <input type="cargo" class="form-control input_custom select_c" id="cargo" name="cargo" value="{{ $contacto->Cargo }}"
                                        placeholder="">
                                    @if ($errors->has('cargo'))
                                        <p class="text-danger">{{ $errors->first('cargo') }}</p>
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
</body>
</html>
