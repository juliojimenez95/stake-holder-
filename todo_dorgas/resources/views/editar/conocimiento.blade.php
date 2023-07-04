<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo Drogas</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link rel="icon" href="{{ asset('images/fevicon.jpeg') }}" type="image/png" />
    <!-- Agregar el enlace de jquery -->
    <script
            src="https://code.jquery.com/jquery-3.6.3.js"
            integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM="
            crossorigin="anonymous"></script>
    <!-- Agregar el enlace a la hoja de estilo del public -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/conocimiento.css') }}">
    <!-- Agregar el enlace a la hoja de estilo de Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="div_main">
                    <div class="">
                        @if (Auth::user()->rol == 1)
                            <a class="btn btn-success btn_cb_c" href=" /actividad/{{ $id }}"

                                            style="margin-top: 25px;">
                                            <i class="fa-solid fa-arrow-left"></i>
                                {{ __('Regresar') }}
                            </a>
                        @else

                            <a class="btn btn-success btn_cb_c" href=" /actividad/{{ $id }}"

                                            style="margin-top: 25px;">
                                            <i class="fa-solid fa-arrow-left"></i>
                                {{ __('Regresar') }}
                            </a>

                        @endif


                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                    <div class="">
                        <a class="btn btn-success btn_cb" href="/cliente/contacto/{{ $id }}"
                                         style="margin-top: 25px;">
                            {{ __('Continuar') }}
                            <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
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
                        <span>Si</span><input type="radio" name="grupo1"  id="si_radio" class="span_one">
                        <span>No</span><input type="radio" name="grupo1" id="no_radio">
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-6 d-flex justify-content-center align-items-center">
            <div class="card formulario w-100 " style="border-radius: 50px;">
                    <div class="card-body">
                        <form action="{{ route('editpersonaE',$id) }}" method="POST">
                            @csrf
                            @method('put')

                            <div class="row mb-4">
                                <div class="col-md-12">
                                    <h4 class="h1_n">Si la respuesta es afirmativa, por favor
                                        diligencie la siguiente sección.</h4>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6 col-sm-12">
                                    <label for="tipo_d" class="form-label lb_cus"><strong>Tipo de documento<span>*</span></strong></label>
                                    <select class="form-control select_custom" aria-label="Tipo de documento" name="tipo_d">
                                        <option value="{{ $personaE->TipoNit }}">{{ $personaE->TipoNit }}</option>
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
                                    <input type="n_docuemnto" class="form-control input_custom sl_cus" id="n_docuemnto" name="n_docuemnto" value="{{ $personaE->Nit }}"
                                        placeholder="">
                                    @if ($errors->has('n_docuemnto'))
                                        <p class="text-danger">{{ $errors->first('n_docuemnto') }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="row mb-3">

                                <div class="col-md-12 col-sm-12">
                                    <label for="Nombre" class="form-label lb_cus"><strong>Nombres y Apellidos<span>*</span></strong></label>
                                    <input type="text" class="form-control input_custom sl_cus" id="Nombre" name="Nombre" value="{{ $personaE->Nombres }}"
                                        placeholder="">
                                    @if ($errors->has('Nombre'))
                                        <p class="text-danger">{{ $errors->first('Nombre') }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="row mb-3">

                                <div class="col-md-6 col-sm-12">
                                    <label for="Vinculo" class="form-label lb_cus"><strong>Vinculo/Relación<span>*</span></strong></label>
                                    <input type="text" class="form-control sl_cus" id="Vinculo" name="Vinculo" value="{{old('Vinculo')}}"
                                        placeholder="">
                                    @if ($errors->has('Vinculo'))
                                        <p class="text-danger">{{ $errors->first('Vinculo') }}</p>
                                    @endif
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <label for="Cargo" class="form-label lb_cus"><strong>Cargo<span>*</span></strong></label>
                                    <input type="Cargo" class="form-control sl_cus" id="Cargo" name="Cargo" value="{{ $personaE->Cargo }}"
                                        placeholder="">
                                    @if ($errors->has('Cargo'))
                                        <p class="text-danger">{{ $errors->first('Cargo') }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="row mb-5">

                                <div class="col-md-6 col-sm-12">
                                    <label for="Nacionalidad" class="form-label lb_cus"><strong>Nacionalidad<span>*</span></strong></label>
                                    <input type="text" class="form-control input_custom sl_cus" id="Nacionalidad" name="Nacionalidad" value="{{ $personaE->Nacionalidad }}"
                                        placeholder="">
                                    @if ($errors->has('Nacionalidad'))
                                        <p class="text-danger">{{ $errors->first('Nacionalidad') }}</p>
                                    @endif
                                </div>
                            </div>
                            <center style="margin-top:10px">
                            <div  id="div_contenido" class="col-md-12">
                                <button type="submit" id="boton_guardar" class="btn btn-primary estilo_boton">Guardar y Continuar</button>
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
    <script>
        // Obtener referencias a los elementos
        var siRadio = document.getElementById('si_radio');
        var noRadio = document.getElementById('no_radio');
        var divContenido = document.getElementById('div_contenido');
        var botonGuardar = document.getElementById('boton_guardar');

        // Agregar un evento de cambio a los radio buttons
        siRadio.addEventListener('change', function() {
            if (this.checked) {
                // Si se selecciona "Si", mostrar el contenido correspondiente
                divContenido.innerHTML = `
                    <button type="submit" class="btn btn-primary estilo_boton">Guardar y Continuar</button>
                `;
            }
        });

        noRadio.addEventListener('change', function() {
            if (this.checked) {
                // Si se selecciona "No", mostrar el contenido correspondiente
                divContenido.innerHTML = `
                    <a href="{{ route('cliente.contacto',$id) }}" type="submit" class="btn btn-primary estilo_boton">Guardar y Continuar</a>
                `;
            }
        });
    </script>
</body>
</html>
