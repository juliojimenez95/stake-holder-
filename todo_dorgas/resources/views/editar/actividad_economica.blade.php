<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Todo Drogas</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
  <link rel="stylesheet" href="{{ asset('css/economica.css') }}">
  <link rel="icon" href="{{ asset('images/fevicon.jpeg') }}" type="image/png" />
  <!-- Agregar el enlace de jquery -->
  <script
  src="https://code.jquery.com/jquery-3.6.3.js"
  integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM="
  crossorigin="anonymous"></script>

  <!--fuentes-->
  <link href="https://www.dafontfree.net/embed/ZnJhbmtsaW4tZ290aGljLWJvb2stcmVndWxhciZkYXRhLzMyL2YvMTU0MjI1L0ZyYW5rbGluIEdvdGhpYyBCb29rIFJlZ3VsYXIudHRm" rel="stylesheet" type="text/css"/>
  <link href="https://allfont.net/allfont.css?fonts=franklin-gothic-medium" rel="stylesheet" type="text/css" />
  <link href="https://www.dafontfree.net/embed/ZnJhbmtsaW4tZ290aGljLW1lZGl1bS1jb25kLXJlZ3VsYXImZGF0YS8zMi9mLzE1NDEzMC9GcmFua2xpbiBHb3RoaWMgTWVkaXVtIENvbmQgUmVndWxhci50dGY" rel="stylesheet" type="text/css"/>
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
                                        <i class="fa-solid fa-arrow-left"></i>
                            {{ __('Regresar') }}
                        </a>

                    @endif


                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
                <div class="">
                    <a class="btn btn-success btn_cb" href="/conocimiento/{{ $id }}"
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
              <div class="" style="text-align: center;">
                <img src="{{ asset('images/logo_t2.png') }}"   class=" my-4 img-fluid">
              </div>
            </div>
        </div>
    <div class="row">
      <div class="col-md-12">
        <div class="card formulario2 bg-light mt-4">
          <div class="card-body">
          <form action="{{ route('editRepresentante',$id) }}" method="POST">
            @csrf
            @method('put')
            <div class="row">
                <div class="col-md-12">
                    <div class="mb-5 ">
                        <h1 style="text-align: center;">Representante Legal</h1>
                        <hr class="underline2">
                    </div>

                </div>
            </div>
          <div class="row">
            <div class="col-md-12">
             <div class="row mb-3">
                <div class="col-md-4 col-sm-12">
                    <label for="p_nombre" class="form-label label_c"><strong>Nombres y Apellidos<span>*</span></strong></label>
                        <input type="text" class="form-control input_custom select_c" id="p_nombre" name="p_nombre" value="{{$Representante->Nombre1}}"
                            placeholder="">
                        @if ($errors->has('p_nombre'))
                            <p class="text-danger">{{ $errors->first('p_nombre') }}</p>
                        @endif
                </div>

                <div class="col-md-4 col-sm-12">
                    <label for="tipo_d" class="form-label label_c"><strong>Tipo de documento<span>*</span></strong></label>
                    <select class="form-control select_custom" aria-label="Tipo de documento" name="tipo_d">
                        <option value="{{$Representante->TipoNit}}">{{$Representante->TipoNit}}</option>
                        @foreach ($tipos as $tipo)
                            <option value="{{ $tipo }}">{{ $tipo }}</option>
                        @endforeach

                    </select>
                    @if ($errors->has('tipo_d'))
                        <p class="text-danger">{{ $errors->first('tipo_d') }}</p>
                    @endif
                </div>

                <div class="col-md-4 col-sm-12">
                    <label for="documento" class="form-label label_c"><strong>Número de documento<span>*</span></strong></label>
                        <input type="number" class="form-control input_custom select_c" id="documento" name="documento" value="{{$Representante->Nit}}"
                            placeholder="">
                        @if ($errors->has('documento'))
                            <p class="text-danger">{{ $errors->first('documento') }}</p>
                        @endif
                </div>



             </div>

            </div>


            <div class="col-md-12 mb-3">
             <div class="row">



                <div class="col-md-4 col-sm-12">
                    <label for="cargo" class="form-label label_c"><strong>Cargo<span>*</span></strong></label>
                        <input type="text" class="form-control input_custom select_c" id="cargo" name="cargo" value="{{$Representante->Cargo}}"
                            placeholder="">
                        @if ($errors->has('cargo'))
                            <p class="text-danger">{{ $errors->first('cargo') }}</p>
                        @endif
                </div>

                <div class="col-md-4 col-sm-12">
                    <label for="documento" class="form-label label_c"><strong>Correo electrónico<span>*</span></strong></label>
                        <input type="email" class="form-control input_custom select_c" id="email" name="email" value="{{$Representante->Email}}"
                            placeholder="">
                        @if ($errors->has('email'))
                            <p class="text-danger">{{ $errors->first('email') }}</p>
                        @endif
                </div>
                <div class="col-md-4 col-sm-12">
                    <label for="cargo" class="form-label label_c"><strong>Teléfono<span>*</span></strong></label>
                        <input type="number" class="form-control input_custom select_c" id="telefono" name="telefono" value="{{$Representante->Telefono}}"
                            placeholder="">
                        @if ($errors->has('telefono'))
                            <p class="text-danger">{{ $errors->first('telefono') }}</p>
                        @endif
                </div>

             </div>
            </div>

        <div class="container mt-4">
            <div class="row">
              <div class="col-md-12">
                <div class="form-group ">
                  <div style="display: flex; justify-content: space-between;">
                        <div class="">
                          <span class="mr-2 color-cs">¿Por su cargo o actividad maneja o a manejado recursos públicos? </span>
                        </div>
                        <div>
                          <label class="mr-2 color-cb" >Si <input type="radio" name="grupo1" id="grupo1s" value="Si"></label>
                          <label class="mr-2 color-cb" >No <input type="radio" name="grupo1" id="grupo1n" value="No"></label>
                          <label class="mr-2 color-cb" >N/A <input type="radio" name="grupo1" id="grupo1na" value="N/A"></label>
                          <span class="mr-2 color-cb">Observaciones</span>
                          <input type="text" name="Observacion" id="Observacion" class="input_custom select_c">
                        </div>


                  </div>
                </div>
             </div>
            <div class="col-md-12">
              <div class="form-group ">
                  <div style="display: flex; justify-content: space-between;">
                        <div class="">
                          <span class="mr-2 color-cs">¿Por su cargo o actividad ejerce o ha ejercido algún grado de poder <br> político o público? </span>
                        </div>
                        <div>
                          <label class="mr-2 color-cb" >Si <input type="radio" name="grupo2" id="grupo2s" value="Si"></label>
                          <label class="mr-2 color-cb" >No <input type="radio" name="grupo2" id="grupo2n" value="No"></label>
                          <label class="mr-2 color-cb" >N/A <input type="radio" name="grupo2" id="grupo2na" value="N/A"></label>
                          <span class="mr-2 color-cb">Observaciones</span>
                          <input type="text" name="Observacion2" id="Observacion2" class="input_custom select_c">
                        </div>


                  </div>
              </div>
             </div>
              <div class="col-md-12">
               <div class="form-group ">
                  <div style="display: flex; justify-content: space-between;">
                        <div class="">
                          <span class="mr-2 color-cs">¿Por su actividad u oficio goza usted de reconocimiento político o público?</span>
                        </div>
                        <div>
                          <label class="mr-2 color-cb" >Si <input type="radio" name="grupo3" id="grupo3s" value="Si"></label>
                          <label class="mr-2 color-cb" >No <input type="radio" name="grupo3" id="grupo3n" value="No"></label>
                          <label class="mr-2 color-cb" >N/A <input type="radio" name="grupo3" id="grupo3na" value="N/A"></label>
                          <span class="mr-2 color-cb">Observaciones</span>
                          <input type="text color-cb" name="Observacion3" id="Observacion3" class="input_custom select_c">
                        </div>


                  </div>
              </div>

             </div>

             <div class="col-md-12">
             <div class="form-group ">
                  <div style="display: flex; justify-content: space-between;">
                        <div class="">
                          <span class="mr-2 color-cs">¿Existe algún vinculo entre usted y una persona considerada públicamente expuesta?</span>
                        </div>
                        <div>
                          <label class="mr-2 color-cb" >Si <input type="radio" name="grupo4" id="grupo4s" value="Si"></label>
                          <label class="mr-2 color-cb" >No <input type="radio" name="grupo4" id="grupo4n" value="No"></label>
                          <label class="mr-2 color-cb" >N/A <input type="radio" name="grupo4" id="grupo4na" value="N/A"></label>
                          <span class="mr-2 color-cb">Observaciones</span>
                          <input type="text color-cb" name="Observacion4" id="Observacion4" class="input_custom select_c">
                        </div>


                  </div>
              </div>
             </div>

             <div class="col-md-12">
             <div class="form-group ">
                  <div style="display: flex; justify-content: space-between;">
                        <div class="">
                          <span class="mr-2 color-cs">¿Es usted sujeto de obligaciones tributarias en otro país o grupo de países?</span>
                        </div>
                        <div>
                          <label class="mr-2 color-cb" >Si <input type="radio" name="grupo5" id="grupo5s" value="Si"></label>
                          <label class="mr-2 color-cb" >No <input type="radio" name="grupo5" id="grupo5n" value="No"></label>
                          <label class="mr-2 color-cb" >N/A <input type="radio" name="grupo5" id="grupo5na" value="N/A"></label>
                          <span class="mr-2 color-cb">Observaciones</span>
                          <input type="text color-cb" name="Observacion5" id=" Observacion5" class="input_custom select_c">
                        </div>


                  </div>
              </div>

             </div>

             <div class="col-md-12">
             <div class="form-group ">
                  <div style="display: flex; justify-content: space-between;">
                        <div class="">
                          <span class="mr-2 color-cs">¿Ejerce o ha ejercido funciones directivas en una organización internacional <br> tales como ONG, ONU, UNICEF, etc.? </span>
                        </div>
                        <div>
                          <label class="mr-2 color-cb" >Si <input type="radio" name="grupo6" id="grupo6s" value="Si"></label>
                          <label class="mr-2 color-cb" >No <input type="radio" name="grupo6" id="grupo6n" value="No"></label>
                          <label class="mr-2 color-cb" >N/A <input type="radio" name="grupo6" id="grupo6na" value="N/A"></label>
                          <span class="mr-2 color-cb">Observaciones</span>
                          <input type="text color-cb" name="Observacion6" id="Observacion6" class="input_custom select_c">
                        </div>


                  </div>
              </div>

             </div>

             <div class="col-md-12">
             <div class="form-group ">
                  <div style="display: flex; justify-content: space-between;">
                        <div class="">
                          <span class="mr-2 color-cs">¿La compañía que representa esta obligada a tener un programa de SAGRILAFT, <br> SIPLAFT, SARLAFT o equivalentes? </span>
                        </div>
                        <div>
                          <label class="mr-2 color-cb" >Si <input type="radio" name="grupo7" id="grupo7s" value="Si"></label>
                          <label class="mr-2 color-cb" >No <input type="radio" name="grupo7" id="grupo7n" value="No"></label>
                          <label class="mr-2 color-cb" >N/A <input type="radio" name="grupo7" id="grupo7na" value="N/A"></label>
                          <span class="mr-2 color-cb">Observaciones</span>
                          <input type="text " name="Observacion7" id="Observacion7" class="input_custom select_c">
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
                <button type="submit" class="btn btn-primary estilo_boton">COTINUAR</button>
              </div>
          </center>
            </form>

        </div>
      </div>
    </div>

  </div>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper-base.min.js"
    integrity="sha384-EQhgPShYZDmf+OWKvoYf70b91G/J0xgfgvbXhNfP60ZQLPv6du/0h0sU6Ygr19d0"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script>
    $(document).ready(function(){


       $.ajax({
      url: "/perfilrepresentante/"+{{ Auth::user()->id }},
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









          $("#Observacion").val(response.user.Observacion1);
          $("#Observacion2").val(response.user.Observacion2);
          $("#Observacion3").val(response.user.Observacion3);
          $("#Observacion4").val(response.user.Observacion4);
          $("#Observacion5").val(response.user.Observacion5);
          $("#Observacion6").val(response.user.Observacion6);
          $("#Observacion7").val(response.user.Observacion7);


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
