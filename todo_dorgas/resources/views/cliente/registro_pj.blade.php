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
    <!-- Agregar el enlace a la hoja de estilo de public -->
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/juridica.css') }}">

    <link href="https://www.dafontfree.net/embed/ZnJhbmtsaW4tZ290aGljLWJvb2stcmVndWxhciZkYXRhLzMyL2YvMTU0MjI1L0ZyYW5rbGluIEdvdGhpYyBCb29rIFJlZ3VsYXIudHRm" rel="stylesheet" type="text/css"/>
    <link href="https://allfont.net/allfont.css?fonts=franklin-gothic-medium" rel="stylesheet" type="text/css" />
    <link href="https://www.dafontfree.net/embed/ZnJhbmtsaW4tZ290aGljLW1lZGl1bS1jb25kLXJlZ3VsYXImZGF0YS8zMi9mLzE1NDEzMC9GcmFua2xpbiBHb3RoaWMgTWVkaXVtIENvbmQgUmVndWxhci50dGY" rel="stylesheet" type="text/css"/>

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
                   <strong>  <h2 class="natural_c h2_tit">Juridica</h2> </strong> <br> <br>
                  <hr class="underline2">
                </div>
            </div>
            <div class="col-12 col-lg-6 d-flex justify-content-center align-items-center">
            <div class="card formulario w-100 " style="border-radius: 50px;">
                    <div class="card-body">
                        <form action=" {{ route('proveedor.pn') }}" method="POST">
                            @csrf
                            <div class="row mb-3">

                                <div class="col-md-4 col-sm-12">
                                    <label for="razon_s" class="form-label label_c"><strong>Razón Social<span>*</span></strong></label>
                                    <input type="text" class="form-control input_custom select_c" id="razon_s" name="razon_s" value="{{old('razon_s')}}"
                                        placeholder="">
                                    @if ($errors->has('razon_s'))
                                        <p class="text-danger">{{ $errors->first('razon_s') }}</p>
                                    @endif
                                </div>
                                <div class="col-md-4 col-sm-12">
                                    <label for="nit" class="form-label label_c"><strong>N.I.T<span>*</span></strong></label>
                                    <input type="nit" class="form-control input_custom select_c" id="nit" name="nit" value="{{old('nit')}}"
                                        placeholder="">
                                    @if ($errors->has('nit'))
                                        <p class="text-danger">{{ $errors->first('nit') }}</p>
                                    @endif
                                </div>
                                <div class="col-md-4 col-sm-12">
                                    <label for="tipo_s" class="form-label label_c"><strong>Tipo de Sociedad<span>*</span></strong></label>
                                    <select class="form-control select_c" aria-label="Default select example" name="tipo_s">
                                        <option value="">Seleccione un tipo de sociedad...</option>
                                        @foreach ($tipos as $tipo)
                                            <option value="{{ $tipo }}">{{ $tipo }}</option>
                                        @endforeach

                                    </select>
                                    @if ($errors->has('tipo_s'))
                                        <p class="text-danger">{{ $errors->first('tipo_s') }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="row mb-3">

                                <div class="col-md-4 col-sm-12">
                                    <label for="email" class="form-label label_c"><strong>Correo electrónico<span>*</span></strong></label>
                                    <input type="text" class="form-control input_custom select_c" id="email" name="email" value="{{old('email')}}"
                                        placeholder="">
                                    @if ($errors->has('email'))
                                        <p class="text-danger">{{ $errors->first('email') }}</p>
                                    @endif
                                </div>

                                <div class="col-md-4 col-sm-12">
                                    <label for="pagina" class="form-label label_c"><strong>Página web </strong></label>
                                    <input type="text" class="form-control input_custom select_c" id="pagina" name="pagina" value="{{old('pagina')}}"
                                        placeholder="">
                                    @if ($errors->has('pagina'))
                                        <p class="text-danger">{{ $errors->first('pagina') }}</p>
                                    @endif
                                </div>

                                <div class="col-md-4 col-sm-12">
                                    <label for="pais" class="form-label label_c"><strong>País<span>*</span></strong></label>
                                        <select  class="form-control select_c" aria-label="Seleccione pais" id="pais" name="pais">
                                        <option  value="{{old('pais')}}">COLOMBIA</option>

                                        </select>
                                        @if ($errors->has('pais'))
                                            <p class="text-danger">{{ $errors->first('pais') }}</p>
                                        @endif
                                </div>

                            </div>
                            <div class="row mb-3">

                                <div class="col-md-4 col-sm-12">
                                    <label for="departamento" class="form-label label_c"><strong>Departamento<span>*</span></strong></label>
                                        <select  class="form-control select_c" aria-label="Seleccione una departamento" id="departamento" name="departamento">
                                        <option  value="{{old('departamento')}}">Seleccione un departamento...</option>

                                        </select>
                                        @if ($errors->has('departamento'))
                                            <p class="text-danger">{{ $errors->first('departamento') }}</p>
                                        @endif
                                </div>

                                <div class="col-md-4 col-sm-12">
                                    <label for="municipio" class="form-label label_c"><strong>Municipio<span>*</span></strong></label>
                                    <select class="form-control select_c" aria-label="Seleccione una municipio" id="municipio" name="municipio">
                                        <option value="{{old('municipio')}}">Seleccione una municipio...</option>

                                    </select>
                                    @if ($errors->has('municipio'))
                                        <p class="text-danger">{{ $errors->first('municipio') }}</p>
                                    @endif
                                </div>

                                <div class="col-md-4 col-sm-12">
                                    <label for="direccion" class="form-label label_c"><strong>Dirección<span>*</span></strong></label>
                                    <input type="text" class="form-control input_custom select_c" id="direccion" name="direccion" value="{{old('direccion')}}"
                                        placeholder="">
                                    @if ($errors->has('direccion'))
                                        <p class="text-danger">{{ $errors->first('direccion') }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="row mb-3">

                                <div class="col-md-4 col-sm-12">
                                    <label for="ta_e" class="form-label label_c"><strong>Tamaño de empresa<span>*</span></strong></label>
                                    <select class="form-control select_c" aria-label="Seleccione un tipo de sociedad" name="ta_e">
                                        <option value="">Seleccione un tipo de sociedad...</option>
                                        @foreach ($empresas as $empresa)
                                            <option value="{{ $empresa }}">{{ $empresa }}</option>
                                        @endforeach

                                    </select>
                                    @if ($errors->has('ta_e'))
                                        <p class="text-danger">{{ $errors->first('ta_e') }}</p>
                                    @endif
                                </div>

                                <div class="col-md-4 col-sm-12">
                                    <label for="servicio" class="form-label label_c"><strong>Servicio</strong></label>
                                    <input type="servicio" class="form-control input_custom select_c" id="servicio" name="servicio" value="{{old('servicio')}}"
                                        placeholder="">
                                    @if ($errors->has('servicio'))
                                        <p class="text-danger">{{ $errors->first('servicio') }}</p>
                                    @endif
                                </div>

                                <div class="col-md-4 col-sm-12">
                                    <label for="password" class="form-label label_c"><strong>Contraseña<span>*</span></strong></label>
                                    <input type="password" class="form-control input_custom select_c" id="password" name="password"
                                        placeholder="">
                                    @if ($errors->has('password'))
                                        <p class="text-danger">{{ $errors->first('password') }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="row mb-6">

                                <div class="col-md-4 col-sm-12">
                                    <label for="password" class="form-label label_c"><strong>Confirmar contraseña<span>*</span></strong></label>
                                    <input type="password" class="form-control input_custom select_c" id="password" name="password_confirmation"
                                    required autocomplete="new-password"  placeholder="">
                                    @if ($errors->has('password'))
                                        <p class="text-danger">{{ $errors->first('password') }}</p>
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
