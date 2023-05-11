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
            <link href="https://www.dafontfree.net/embed/ZnJhbmtsaW4tZ290aGljLWJvb2stcmVndWxhciZkYXRhLzMyL2YvMTU0MjI1L0ZyYW5rbGluIEdvdGhpYyBCb29rIFJlZ3VsYXIudHRm" rel="stylesheet" type="text/css"/>
            <link href="https://allfont.net/allfont.css?fonts=franklin-gothic-medium" rel="stylesheet" type="text/css" />
            <link href="https://www.dafontfree.net/embed/ZnJhbmtsaW4tZ290aGljLW1lZGl1bS1jb25kLXJlZ3VsYXImZGF0YS8zMi9mLzE1NDEzMC9GcmFua2xpbiBHb3RoaWMgTWVkaXVtIENvbmQgUmVndWxhci50dGY" rel="stylesheet" type="text/css"/>

    <!-- Agregar el enlace a la hoja de estilo del public -->
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/natural.css') }}">
    <link rel="stylesheet" href="{{ asset('css/economica.css') }}">
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
        <div class="row d-flex mb-5">
            <div class="col-12 col-lg-6 " style="background-color: #004492; height: 640px; color: white;">
                <div class="d-flex justify-content-center  h-100 flex-column alinear">
                    <h3 class="datos h3_tit">Datos Generales</h3>
                   <strong> <h2 class=" my-3 persona_c h2_tit">Persona</h2></strong>
                   <strong>  <h2 class=" natural_c h2_tit">Natural</h2> </strong> <br> <br>
                  <hr class="underline2">
                </div>
            </div>
            <div class="col-12 col-lg-6 d-flex justify-content-center align-items-center">
            <div class="card formulario w-100 " style="border-radius: 50px;">
                    <div class="card-body">
                        <form action=" {{ route('clientes.storepn') }}" method="POST">
                            @csrf
                            <div class="row mb-9">

                                <div class="col-md-4 col-sm-12 mb-3">
                                    <label for="tipo_d" class="form-label label_c"><strong>Tipo documento</strong></label>
                                    <select class="form-select select_c" aria-label="Default select example" name="tipo_d">
                                        <option value="">Seleccione un tipo de documento...</option>
                                        @foreach ($tipos as $tipo)
                                            <option value="{{ $tipo }}">{{ $tipo }}</option>
                                        @endforeach

                                    </select>
                                    @if ($errors->has('tipo_d'))
                                        <p class="text-danger">{{ $errors->first('tipo_d') }}</p>
                                    @endif
                                </div>
                                <div class="col-md-4 col-sm-12">
                                    <label for="n_docuemnto" class="form-label label_c"><strong>Número de documento</strong></label>
                                    <input type="number" class="form-control input_custom select_c" id="n_docuemnto" name="n_docuemnto" value="{{old('n_docuemnto')}}"
                                        placeholder="Número de documento">
                                    @if ($errors->has('n_docuemnto'))
                                        <p class="text-danger">{{ $errors->first('n_docuemnto') }}</p>
                                    @endif
                                </div>
                                <div class="col-md-4 col-sm-12">
                                    <label for="email" class="form-label label_c"><strong>Correo electrónico </strong></label>
                                    <input type="text" class="form-control select_c" id="email" name="email" value="{{old('email')}}"
                                        placeholder=" email ">
                                    @if ($errors->has('email'))
                                        <p class="text-danger">{{ $errors->first('email') }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="row mb-12 mb-3">

                                <div class="col-md-12 col-sm-12">
                                    <label for="Nombre" class="form-label label_c"><strong>Nombres y Apellidos </strong></label>
                                    <input type="text" class="form-control input_custom select_c" id="Nombre" name="Nombre" value="{{old('Nombre')}}"
                                        placeholder=" Nombre ">
                                    @if ($errors->has('Nombre'))
                                        <p class="text-danger">{{ $errors->first('Nombre') }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="row mb-6 mb-3">

                                <div class="col-md-4 col-sm-12">
                                    <label for="departamento" class="form-label label_c"><strong>Departamento</strong></label>
                                        <select  class="form-select select_c" aria-label="Default select example" id="departamento" name="departamento">
                                        <option  value="{{old('departamento')}}">Seleccione un departamento...</option>

                                        </select>
                                        @if ($errors->has('departamento'))
                                            <p class="text-danger">{{ $errors->first('departamento') }}</p>
                                        @endif
                                </div>
                                <div class="col-md-4 col-sm-12">
                                    <label for="municipio" class="form-label label_c"><strong>Municipio</strong></label>
                                    <select class="form-select select_c" aria-label="Default select example" id="municipio" name="municipio">
                                        <option value="{{old('municipio')}}">Seleccione un municipio...</option>

                                    </select>
                                    @if ($errors->has('municipio'))
                                        <p class="text-danger">{{ $errors->first('municipio') }}</p>
                                    @endif
                                </div>
                                <div class="col-md-4 col-sm-12">
                                    <label for="Telefono" class="form-label label_c"><strong>Teléfono</strong></label>
                                    <input type="text" class="form-control select_c" id="Telefono" name="Telefono" value="{{old('Telefono')}}"
                                        placeholder="Teléfono">
                                    @if ($errors->has('Telefono'))
                                        <p class="text-danger">{{ $errors->first('Telefono') }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="row mb-3">

                                <div class="col-md-4 col-sm-12">
                                    <label for="direccion" class="form-label label_c"><strong>Dirección </strong></label>
                                    <input type="text" class="form-control input_custom select_c" id="direccion" name="direccion" value="{{old('direccion')}}"
                                        placeholder="Dirección">
                                    @if ($errors->has('direccion'))
                                        <p class="text-danger">{{ $errors->first('direccion') }}</p>
                                    @endif
                                </div>
                                <div class="col-md-4 col-sm-12">
                                    <label for="servicio" class="form-label label_c"><strong>Servicio que ofrece</strong></label>
                                    <input type="text" class="form-control input_custom select_c" id="servicio" name="servicio" value="{{old('servicio')}}"
                                        placeholder="Servicio que ofrece">
                                    @if ($errors->has('servicio'))
                                        <p class="text-danger">{{ $errors->first('servicio') }}</p>
                                    @endif
                                </div>
                                <div class="col-md-4 col-sm-12">
                                    <label for="actividad" class="form-label label_c"><strong>Actividad económica</strong></label>
                                    <select class="form-select select_c" aria-label="Default select example" name="actividad">
                                        <option value="{{old('actividad')}}">Seleccione su código CIIU</option>
                                       @foreach ($actividades as $actividad)
                                           <option value="{{ $actividad->Actividad }}">{{ $actividad->Actividad }}</option>
                                       @endforeach
                                   </select>
                                    @if ($errors->has('actividad'))
                                        <p class="text-danger">{{ $errors->first('actividad') }}</p>
                                    @endif
                                </div>

                            </div>
                            <div class="row mb-4">
                                <div class="col-md-4 col-sm-12">
                                    <label for="password" class="form-label label_c"><strong>Contraseña</strong></label>
                                    <input type="password" class="form-control input_custom select_c" id="password" name="password"
                                        placeholder="Contraseña">
                                    @if ($errors->has('password'))
                                        <p class="text-danger">{{ $errors->first('password') }}</p>
                                    @endif
                                </div>

                                <div class="col-md-4 col-sm-12">
                                    <label for="password" class="form-label label_c"><strong>Confirmar contraseña</strong></label>
                                    <input type="password" class="form-control input_custom select_c" id="password" name="password_confirmation"
                                    required autocomplete="new-password"  placeholder="Confirmar contraseña">
                                    @if ($errors->has('password'))
                                        <p class="text-danger">{{ $errors->first('password') }}</p>
                                    @endif
                                </div>


                            </div>
                            <!--<center style="margin-top:10px">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary estilo_boton">Guardar y Continuar</button>
                            </div>
                            </center>-->

                        </form>
                    </div>
                </div>

            </div>
        </div>
        <div class="container">
            <div class="row">
              <div class="col-md-12 mb-3">
                <div class="form-group ">
                  <div style="display: flex; justify-content: space-between;">
                        <div class="">
                          <span class="mr-2 color-cs">¿Por su cargo o actividad maneja o a manejado recursos públicos? </span>
                        </div>
                        <div>
                          <label class="mr-2 color-cb" >Si <input type="radio" name="grupo1" value="Si"></label>
                          <label class="mr-2 color-cb" >No <input type="radio" name="grupo1" value="No"></label>
                          <label class="mr-2 color-cb" >N/A <input type="radio" name="grupo1" value="N/A"></label>
                          <span class="mr-2 color-cb">Observaciones</span>
                          <input type="text" name="Observacion" id="Observacion" class="">
                        </div>


                  </div>
                </div>
                </div>
            <div class="col-md-12 mb-3">
              <div class="form-group ">
                  <div style="display: flex; justify-content: space-between;">
                        <div class="">
                          <span class="mr-2 color-cs">¿Por su cargo o actividad ejerce o ha ejercido algún grado de poder <br> político o público? </span>
                        </div>
                        <div>
                          <label class="mr-2 color-cb" >Si <input type="radio" name="grupo2" value="Si"></label>
                          <label class="mr-2 color-cb" >No <input type="radio" name="grupo2" value="No"></label>
                          <label class="mr-2 color-cb" >N/A <input type="radio" name="grupo2" value="N/A"></label>
                          <span class="mr-2 color-cb">Observaciones</span>
                          <input type="text" name="Observacion2" id="Observacion2">
                        </div>


                  </div>
              </div>
             </div>
              <div class="col-md-12 mb-3">
               <div class="form-group ">
                  <div style="display: flex; justify-content: space-between;">
                        <div class="">
                          <span class="mr-2 color-cs">¿Por su actividad u oficio goza usted de reconocimiento político o público?</span>
                        </div>
                        <div>
                          <label class="mr-2 color-cb" >Si <input type="radio" name="grupo3" value="Si"></label>
                          <label class="mr-2 color-cb" >No <input type="radio" name="grupo3" value="No"></label>
                          <label class="mr-2 color-cb" >N/A <input type="radio" name="grupo3" value="N/A"></label>
                          <span class="mr-2 color-cb">Observaciones</span>
                          <input type="text color-cb" name="Observacion3" id="Observacion3">
                        </div>


                  </div>
              </div>

             </div>

             <div class="col-md-12 mb-3">
             <div class="form-group ">
                  <div style="display: flex; justify-content: space-between;">
                        <div class="">
                          <span class="mr-2 color-cs">¿Existe algún vinculo entre usted y una persona considerada públicamente expuesta?</span>
                        </div>
                        <div>
                          <label class="mr-2 color-cb" >Si <input type="radio" name="grupo4" value="Si"></label>
                          <label class="mr-2 color-cb" >No <input type="radio" name="grupo4" value="No"></label>
                          <label class="mr-2 color-cb" >N/A <input type="radio" name="grupo4" value="N/A"></label>
                          <span class="mr-2 color-cb">Observaciones</span>
                          <input type="text color-cb" name="Observacion4" id="Observacion4">
                        </div>


                  </div>
              </div>
             </div>

             <div class="col-md-12 mb-3">
             <div class="form-group ">
                  <div style="display: flex; justify-content: space-between;">
                        <div class="">
                          <span class="mr-2 color-cs">¿Es usted sujeto de obligaciones tributarias en otro país o grupo de países?</span>
                        </div>
                        <div>
                          <label class="mr-2 color-cb" >Si <input type="radio" name="grupo5" value="Si"></label>
                          <label class="mr-2 color-cb" >No <input type="radio" name="grupo5" value="No"></label>
                          <label class="mr-2 color-cb" >N/A <input type="radio" name="grupo5" value="N/A"></label>
                          <span class="mr-2 color-cb">Observaciones</span>
                          <input type="text color-cb" name="Observacion5" id=" Observacion5">
                        </div>


                  </div>
              </div>

             </div>

             <div class="col-md-12 mb-3">
             <div class="form-group ">
                  <div style="display: flex; justify-content: space-between;">
                        <div class="">
                          <span class="mr-2 color-cs">¿Ejerce o ha ejercido funciones directivas en una organización internacional <br> tales como ONG, ONU, UNICEF, etc.? </span>
                        </div>
                        <div>
                          <label class="mr-2 color-cb" >Si <input type="radio" name="grupo6" value="Si"></label>
                          <label class="mr-2 color-cb" >No <input type="radio" name="grupo6" value="No"></label>
                          <label class="mr-2 color-cb" >N/A <input type="radio" name="grupo6" value="N/A"></label>
                          <span class="mr-2 color-cb">Observaciones</span>
                          <input type="text color-cb" name="Observacion6" id="Observacion6">
                        </div>


                  </div>
              </div>

             </div>

             <div class="col-md-12 mb-3">
             <div class="form-group ">
                  <div style="display: flex; justify-content: space-between;">
                        <div class="">
                          <span class="mr-2 color-cs">¿La compañía que representa esta obligada a tener un programa de SAGRILAFT, <br> SIPLAFT, SARLAFT o equivalentes? </span>
                        </div>
                        <div>
                          <label class="mr-2 color-cb" >Si <input type="radio" name="grupo7" value="Si"></label>
                          <label class="mr-2 color-cb" >No <input type="radio" name="grupo7" value="No"></label>
                          <label class="mr-2 color-cb" >N/A <input type="radio" name="grupo7" value="N/A"></label>
                          <span class="mr-2 color-cb">Observaciones</span>
                          <input type="text " name="Observacion7" id="Observacion7">
                        </div>


                  </div>
              </div>

              </div>

             </div>
            </div><!--Final row-->


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
        <!-- Agregar el script de JavaScript de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Agregar el script de JavaScript de la carpeta public -->
    <script src="{{ asset('js/principal.js') }}"></script>
</body>
</html>
