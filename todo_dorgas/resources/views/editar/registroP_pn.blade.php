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
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Agregar el enlace a la hoja de estilo del public -->
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/pro_natural.css') }}">
    <link rel="stylesheet" href="{{ asset('css/economica.css') }}">
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
                            <a class="btn btn-success btn_cb_c" href="{{ route('clientes.perfil',Auth::user()->id) }}"

                                            style="margin-top: 25px;">
                                            <i class="fa-solid fa-arrow-left"></i>
                                {{ __('Regresar') }}
                            </a>
                        @else

                            <a class="btn btn-success btn_cb_c" href="{{ route('proveedor.perfil',Auth::user()->id) }}"

                                            style="margin-top: 25px;">
                                            <i class="fa-solid fa-user"></i>
                                {{ __('Actualizar Perfil') }}
                            </a>

                        @endif


                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                    <div class="">
                        <a class="btn btn-success btn_cb" href="{{ route('logout') }}"
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
        <div class="row d-flex mb-4">
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
                        <form action=" {{ route('proveedor.storepn') }}" method="POST">
                            @csrf
                            @method('put')

                            <div class="row mb-3">

                                <div class="col-md-4 col-sm-12">
                                    <label for="tipo_d" class="form-label label_c"><strong>Tipo de documento</strong><span>*</span></label>
                                    <select class="form-control select_custom" aria-label="Default select example" name="tipo_d">
                                        <option value="{{ $user->TipoNit }}">{{ $user->TipoNit }}</option>
                                        @foreach ($tipos as $tipo)
                                            <option value="{{ $tipo }}">{{ $tipo }}</option>
                                        @endforeach

                                    </select>
                                    @if ($errors->has('tipo_d'))
                                        <p class="text-danger">{{ $errors->first('tipo_d') }}</p>
                                    @endif
                                </div>
                                <div class="col-md-4 col-sm-12">
                                    <label for="n_docuemnto" class="form-label label_c"><strong>Número documento</strong><span>*</span></label>
                                    <input type="number" class="form-control input_custom select_c" id="n_docuemnto" name="n_docuemnto" value="{{$user->Nit}}"
                                        placeholder="">
                                    @if ($errors->has('n_docuemnto'))
                                        <p class="text-danger">{{ $errors->first('n_docuemnto') }}</p>
                                    @endif
                                </div>
                                <div class="col-md-4 col-sm-12">
                                    <label for="email" class="form-label label_c"><strong>Correo electrónico</strong><span>*</span></label>
                                    <input type="text" class="form-control select_c" id="email" name="email" value="{{$user->email}}"
                                        placeholder="">
                                    @if ($errors->has('email'))
                                        <p class="text-danger">{{ $errors->first('email') }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="row mb-3">

                                <div class="col-md-12 col-sm-12">
                                    <label for="Nombre" class="form-label label_c"><strong>Nombres y Apellidos</strong><span>*</span></label>
                                    <input type="text" class="form-control input_custom select_c" id="Nombre" name="Nombre" value="{{$user->name}}"
                                        placeholder="">
                                    @if ($errors->has('Nombre'))
                                        <p class="text-danger">{{ $errors->first('Nombre') }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="row mb-3">

                                <div class="col-md-6 col-sm-12">
                                    <label for="departamento" class="form-label label_c"><strong>Departamento</strong><span>*</span></label>
                                        <select  class="form-control select_custom" aria-label="Default select example" id="departamento" name="departamento">
                                        <option  value="{{$user->Departamento}}">{{$user->Departamento}}</option>

                                        </select>
                                        @if ($errors->has('departamento'))
                                            <p class="text-danger">{{ $errors->first('departamento') }}</p>
                                        @endif
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <label for="municipio" class="form-label label_c"><strong>Municipio</strong><span>*</span></label>
                                    <select class="form-control select_custom" aria-label="Default select example" id="municipio" name="municipio">
                                        <option value="{{$user->Ciudad}}">{{$user->Ciudad}}</option>

                                    </select>
                                    @if ($errors->has('municipio'))
                                        <p class="text-danger">{{ $errors->first('municipio') }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="row mb-3">

                                <div class="col-md-4 col-sm-12">
                                    <label for="Telefono" class="form-label label_c"><strong>Teléfono</strong><span>*</span></label>
                                    <input type="text" class="form-control select_c" id="Telefono" name="Telefono" value="{{$user->Telefono1}}"
                                        placeholder="">
                                    @if ($errors->has('Telefono'))
                                        <p class="text-danger">{{ $errors->first('Telefono') }}</p>
                                    @endif
                                </div>

                                <div class="col-md-4 col-sm-12">
                                    <label for="direccion" class="form-label label_c"><strong>Dirección</strong><span>*</span></label>
                                    <input type="text" class="form-control input_custom select_c" id="direccion" name="direccion" value="{{$user->Direccion}}"
                                        placeholder="">
                                    @if ($errors->has('direccion'))
                                        <p class="text-danger">{{ $errors->first('direccion') }}</p>
                                    @endif
                                </div>
                                <div class="col-md-4 col-sm-12">
                                    <label for="servicio" class="form-label label_c"><strong>Servicio que ofrece</strong></label>
                                    <input type="text" class="form-control input_custom select_c" id="servicio" name="servicio" value="{{old('servicio')}}"
                                        placeholder="">
                                    @if ($errors->has('servicio'))
                                        <p class="text-danger">{{ $errors->first('servicio') }}</p>
                                    @endif
                                </div>

                            </div>
                            <div class="row mb-3">

                                <div class="col-md-4 col-sm-12">
                                    <label for="actividad" class="form-label label_c"><strong>Actividad que ofrece</strong><span>*</span></label>
                                    <select class="form-control select_custom" aria-label="Default select example" name="actividad">
                                        <option value="{{$user->ActividadEconomica}}">{{$user->ActividadEconomica}}</option>
                                       @foreach ($actividades as $actividad)
                                           <option value="{{ $actividad->Actividad }}">{{ $actividad->Actividad }}</option>
                                       @endforeach
                                   </select>
                                    @if ($errors->has('actividad'))
                                        <p class="text-danger">{{ $errors->first('actividad') }}</p>
                                    @endif
                                </div>

                                <div class="col-md-4 col-sm-12">
                                    <label for="password" class="form-label label_c"><strong>Contraseña</strong><span>*</span></label>
                                    <input type="password" class="form-control input_custom select_c" id="password" name="password"
                                        placeholder="">
                                    @if ($errors->has('password'))
                                        <p class="text-danger">{{ $errors->first('password') }}</p>
                                    @endif
                                </div>

                                <div class="col-md-4 col-sm-12">
                                    <label for="password" class="form-label label_c"><strong>Confirmar contraseña</strong><span>*</span></label>
                                    <input type="password" class="form-control input_custom select_c" id="password" name="password_confirmation"
                                    required autocomplete="new-password"  placeholder="">
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


                    </div>
                </div>

            </div>
        </div>

        <div class="card text-center bg-light" style="padding-top: 45px; padding-bottom: 45px;">
            <div class="container">
                <div class="row">
                  <div class="col-md-12 mb-4">
                    <div class="form-group">
                      <div style="display: flex; justify-content: space-between;">
                            <div class="">
                              <span class="color-cs">¿Por su cargo o actividad maneja o a manejado recursos públicos? </span>
                            </div>
                            <div class="">
                              <label class="mr-2 color-cb" >Si <input type="radio" name="grupo1" id="grupo1s" value="Si"></label>
                              <label class="mr-2 color-cb" >No <input type="radio" name="grupo1" id="grupo1n" value="No"></label>
                              <label class="mr-2 color-cb" >N/A <input type="radio" name="grupo1" id="grupo1na" value="N/A"></label>
                              <span class="mr_5 color-cb">Observaciones</span>
                              <input type="text" class="input_col" name="Observacion" id="Observacion">
                            </div>


                      </div>
                    </div>
                    </div>
                <div class="col-md-12 mb-4">
                  <div class="form-group">
                      <div style="display: flex; justify-content: space-between;">
                            <div class="">
                              <span class="color-cs">¿Por su cargo o actividad ejerce o ha ejercido algún grado de poder político o público? </span>
                            </div>
                            <div class="">
                              <label class="mr-2 color-cb" >Si <input type="radio" name="grupo2" id="grupo2s" value="Si"></label>
                              <label class="mr-2 color-cb" >No <input type="radio" name="grupo2" id="grupo2n" value="No"></label>
                              <label class="mr-2 color-cb" >N/A <input type="radio" name="grupo2" id="grupo2na" value="N/A"></label>
                              <span class="color-cb mr_5">Observaciones</span>
                              <input type="text" name="Observacion3" id="Observacion3" class="input_col">
                            </div>
                      </div>
                  </div>
                 </div>
                  <div class="col-md-12 mb-4">
                   <div class="form-group">
                      <div style="display: flex; justify-content: space-between;">
                            <div class="">
                              <span class="color-cs">¿Por su actividad u oficio goza usted de reconocimiento político o público?</span>
                            </div>
                            <div class="">
                              <label class="mr-2 color-cb" >Si <input type="radio" name="grupo3" id="grupo3s" value="Si"></label>
                              <label class="mr-2 color-cb" >No <input type="radio" name="grupo3" id="grupo3n" value="No"></label>
                              <label class="mr-2 color-cb" >N/A <input type="radio" name="grupo3" id="grupo3na" value="N/A"></label>
                              <span class="mr_5 color-cb">Observaciones</span>
                              <input type="text" name="Observacion2" id="Observacion2" class="input_col">
                            </div>


                      </div>
                  </div>

                 </div>

                 <div class="col-md-12 mb-4">
                 <div class="form-group ">
                      <div style="display: flex; justify-content: space-between;">
                            <div class="">
                              <span class="color-cs">¿Existe algún vinculo entre usted y una persona considerada públicamente expuesta?</span>
                            </div>
                            <div class="">
                              <label class="mr-2 color-cb" >Si <input type="radio" name="grupo4" id="grupo4s" value="Si"></label>
                              <label class="mr-2 color-cb" >No <input type="radio" name="grupo4" id="grupo4n" value="No"></label>
                              <label class="mr-2 color-cb" >N/A <input type="radio" name="grupo4" id="grupo4na" value="N/A"></label>
                              <span class="mr_5 color-cb">Observaciones</span>
                              <input type="text" name="Observacion4" id="Observacion4" class="input_col">
                            </div>
                      </div>
                  </div>
                 </div>

                 <div class="col-md-12 mb-4">
                 <div class="form-group ">
                      <div style="display: flex; justify-content: space-between;">
                            <div class="">
                              <span class="color-cs">¿Es usted sujeto de obligaciones tributarias en otro país o grupo de países?</span>
                            </div>
                            <div class="">
                              <label class="mr-2 color-cb" >Si <input type="radio" name="grupo5" id="grupo5s" value="Si"></label>
                              <label class="mr-2 color-cb" >No <input type="radio" name="grupo5" id="grupo5n" value="No"></label>
                              <label class="mr-2 color-cb" >N/A <input type="radio" name="grupo5" id="grupo5na" value="N/A"></label>
                              <span class="mr_5 color-cb">Observaciones</span>
                              <input type="text color-cb" name="Observacion5" id=" Observacion5" class="input_col">
                            </div>


                      </div>
                  </div>

                 </div>

                 <div class="col-md-12 mb-4">
                 <div class="form-group ">
                      <div style="display: flex; justify-content: space-between;">
                            <div class="">
                              <p class="color-cs">¿Ejerce o ha ejercido funciones directivas en una organización internacional tales  como ONG, ONU, UNICEF, etc.? </p>
                            </div>
                            <div class="">
                              <label class="mr-2 color-cb" >Si <input type="radio" name="grupo6" id="grupo6s" value="Si"></label>
                              <label class="mr-2 color-cb" >No <input type="radio" name="grupo6" id="grupo6n" value="No"></label>
                              <label class="mr-2 color-cb" >N/A <input type="radio" name="grupo6" id="grupo6na" value="N/A"></label>
                              <span class="mr_5 color-cb">Observaciones</span>
                              <input type="text color-cb" name="Observacion6" id="Observacion6" class="input_col">
                            </div>
                      </div>
                  </div>

                 </div>

                 <div class="col-md-12 mb-4">
                 <div class="form-group">
                      <div style="display: flex; justify-content: space-between;">
                            <div class="">
                              <p class="color-cs">¿La compañía que representa esta obligada a tener un programa de SAGRILAFT, SIPLAFT,  SARLAFT o equivalentes?</p>
                            </div>
                            <div class="">
                              <label class="mr-2 color-cb" >Si <input type="radio" name="grupo7" id="grupo7s" value="Si"></label>
                              <label class="mr-2 color-cb" >No <input type="radio" name="grupo7" id="grupo7n" value="No"></label>
                              <label class="mr-2 color-cb" >N/A <input type="radio" name="grupo7" id="grupo7na" value="N/A"></label>
                              <span class="mr_5 color-cb">Observaciones</span>
                              <input type="text color-cb" name="Observacion7" id="Observacion7" class="input_col">
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
    <script>
        $(document).ready(function(){


           $.ajax({
          url: "/perfiladicional/"+{{ Auth::user()->id }},
          dataType: "json",
          type: "GET",
          success: function(response) {
              console.log(response);

              informacion_local = response.user;

              if (response.user.ManejoRP == 'Si') {

                  $("#grupo1s").prop('checked',true);
              }else if (response.user.ManejoRP =='No') {
                  $("#grupo1n").prop('checked',true);

              } else {
                  $("#grupo1na").prop('checked',true);

              }

              if (response.user.EjercidoPPOP == 'Si') {

                   $("#grupo2s").prop('checked',true);
              }else if (response.user.EjercidoPPOP =='No') {
                   $("#grupo2n").prop('checked',true);

              } else {
                   $("#grupo2na").prop('checked',true);

              }

              if (response.user.Reconocimiento == 'Si') {

               $("#grupo3s").prop('checked',true);
              }else if (response.user.Reconocimiento =='No') {
                  $("#grupo3n").prop('checked',true);

              } else {
               $("#grupo3na").prop('checked',true);

              }

              if (response.user.VincuPExpuesta == 'Si') {

              $("#grupo4s").prop('checked',true);
              }else if (response.user.VincuPExpuesta =='No') {
              $("#grupo4n").prop('checked',true);

              } else {
              $("#grupo4na").prop('checked',true);

              }

              if (response.user.ObligacionTE == 'Si') {

              $("#grupo5s").prop('checked',true);
              }else if (response.user.ObligacionTE =='No') {
              $("#grupo5n").prop('checked',true);

              } else {
              $("#grupo5na").prop('checked',true);

              }

              if (response.user.OrganizacionI == 'Si') {

                  $("#grupo6s").prop('checked',true);
                  }else if (response.user.OrganizacionI =='No') {
                  $("#grupo6n").prop('checked',true);

                  } else {
                  $("#grupo6na").prop('checked',true);

                  }

                  if (response.user.ObligacionP == 'Si') {

                  $("#grupo7s").prop('checked',true);
                  }else if (response.user.ObligacionP =='No') {
                  $("#grupo7n").prop('checked',true);

                  } else {
                  $("#grupo7na").prop('checked',true);

                  }


                  if (response.informacion.AutorretenedorICA == 'Si') {

                  $("#grupo8s").prop('checked',true);
                  }else if (response.informacion.AutorretenedorICA =='No') {
                  $("#grupo8n").prop('checked',true);

                  } else {
                  $("#grupo8na").prop('checked',true);

                  }






            //  $("#email").val(response.informacion.Email);

          },
          error: function(response) {
              console.log("Ocurrió un error al traer los municipios");
          },
          });
          }

          );

      </script>
</body>
</html>
