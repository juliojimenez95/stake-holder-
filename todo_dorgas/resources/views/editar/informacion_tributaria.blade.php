<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bienvenido</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
  <link rel="stylesheet" href="{{ asset('css/tributaria.css') }}">

  <!-- Agregar el enlace de jquery -->
  <script
  src="https://code.jquery.com/jquery-3.6.3.js"
  integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM="
  crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!--fuentes-->
  <link href="https://www.dafontfree.net/embed/ZnJhbmtsaW4tZ290aGljLWJvb2stcmVndWxhciZkYXRhLzMyL2YvMTU0MjI1L0ZyYW5rbGluIEdvdGhpYyBCb29rIFJlZ3VsYXIudHRm" rel="stylesheet" type="text/css"/>
  <link href="https://allfont.net/allfont.css?fonts=franklin-gothic-medium" rel="stylesheet" type="text/css" />
  <link href="https://www.dafontfree.net/embed/ZnJhbmtsaW4tZ290aGljLW1lZGl1bS1jb25kLXJlZ3VsYXImZGF0YS8zMi9mLzE1NDEzMC9GcmFua2xpbiBHb3RoaWMgTWVkaXVtIENvbmQgUmVndWxhci50dGY" rel="stylesheet" type="text/css"/>
</head>
<body>
  <div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="div_volver mt-3">
                <a href="/home" class="btn btn-success btn_cb_c">
                    <i class="fa-solid fa-arrow-left"></i> Regresar</a>
            </div>
        </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="text-center">
          <img src="{{ asset('images/logo_t2.png') }}" class="my-4 img-fluid">
          <h1 class="text-primary h1_tit">Información Tributaria</h1>
          <hr class="underline under_s">
        </div>
      </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
              <div class="card formulario2 bg-light mt-4">
                <div class="card-body">
                <form action="{{ route('editInformaciont',$id) }}" method="POST">
                  @csrf
                  @method('put')
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <div class="row">
                        <div class="col">
                          <span class="mr-2 span_c">¿Es usted responsable del impuesto a la venta I.V.A.?<span>*</span></span>
                          <!--<input type="text" class="form-control input_cus" id="" name="">-->
                        </div>

                        <label class="mr-2 lb_c" >Si <input type="radio" name="grupo1" id="grupo1s"  value="Si"></label>
                        <label class="mr-2 lb_c" >No <input type="radio" name="grupo1" id="grupo1n" value="No"></label>
                        <label class="mr-2 lb_c" >N/A <input type="radio" name="grupo1" id="grupo1na" value="N/A"></label>

                      </div>

                    </div>
                    <div class="form-group">
                      <div class="row">
                          <div class="col">
                            <span class="mr-2 span_c">¿Está usted sujeto a retención?<span>*</span></span>
                            <!--<input type="text" class="form-control input_cus" id="" name="">-->
                          </div>

                          <label class="mr-2 lb_c" >Si <input type="radio" name="grupo2" id="grupo2s" value="Si"></label>
                          <label class="mr-2 lb_c" >No <input type="radio" name="grupo2"  id="grupo2n" value="No"></label>
                          <label class="mr-2 lb_c" >N/A <input type="radio" name="grupo2" id="grupo2na" value="N/A"></label>

                        </div>
                    </div>
                    <div class="form-group">
                      <div class="row">
                            <div class="col">
                              <span class="mr-2 span_c">¿Está usted obligado a Declarar Renta?<span>*</span></span>
                              <!--<input type="text" class="form-control input_cus" id="" name="">-->
                            </div>

                            <label class="mr-2 lb_c" >Si <input type="radio" name="grupo3" id="grupo3s" value="Si"></label>
                            <label class="mr-2 lb_c" >No <input type="radio" name="grupo3" id="grupo3n" value="No"></label>
                            <label class="mr-2 lb_c" >N/A <input type="radio" name="grupo3" id="grupo3na" value="N/A"></label>

                      </div>
                    </div>
                    <div class="form-group">
                      <div class="row">
                              <div class="col">
                                <span class="mr-2 span_c">¿Es usted R.S.T. Régimen Simple de Tributación?<span>*</span></span>
                                <!--<input type="text" class="form-control input_cus" id="" name="">-->
                              </div>

                              <label class="mr-2 lb_c" >Si <input type="radio" name="grupo4" id="grupo4s" value="Si"></label>
                              <label class="mr-2 lb_c" >No <input type="radio" name="grupo4" id="grupo4n" value="No"></label>
                              <label class="mr-2 lb_c" >N/A <input type="radio" name="grupo4" id="grupo4na" value="N/A"></label>

                      </div>
                    </div>
                    <div class="form-group">
                      <div class="row">
                              <div class="col">
                                <span class="mr-2 span_c">¿Usted aplica estampillas?<span>*</span></span>
                                <!--<input type="text" class="form-control input_cus" id="" name="">-->
                              </div>

                              <label class="mr-2 lb_c" >Si <input type="radio" name="grupo5" id="grupo5s" value="Si"></label>
                              <label class="mr-2 lb_c" >No <input type="radio" name="grupo5" id="grupo5n" value="No"></label>
                              <label class="mr-2 lb_c" >N/A <input type="radio" name="grupo5" id="grupo5na" value="N/A"></label>

                      </div>
                    </div>

                  </div>
                  <div class="col-md-6">
                   <div class="form-group">
                      <div class="row">
                              <div class="col">
                                <span class="mr-2 span_c">¿Es usted Gran Contribuyente?<span>*</span></span>
                                <p class="small-text p_litt">En caso de ser afirmativo indique el N° de Resolución de Gran Contribuyente</p>
                                <input type="text" class="form-control input_cus" id="estampilla" name="estampilla">
                              </div>

                              <label class="mr-2 lb_c" >Si <input type="radio" name="grupo6" id="grupo6s" value="Si"></label>
                              <label class="mr-2 lb_c" >No <input type="radio" name="grupo6" id="grupo6n" value="No"></label>
                              <label class="mr-2 lb_c" >N/A <input type="radio" name="grupo6" id="grupo6na" value="N/A"></label>

                      </div>
                    </div>
                    <div class="form-group">
                      <div class="row">
                              <div class="col">
                                <span class="mr-2 span_c">¿Es usted Autorretenedor en la Fuente?<span>*</span></span>
                                <p class="small-text p_litt">En caso afirmativo indique el N° de Resolución de Autorretenedor en la Fuente.</p>
                                <input type="text" class="form-control input_cus" id="" name="">
                              </div>

                              <label class="mr-2 lb_c" >Si <input type="radio" name="grupo7" id="grupo7s" value="Si"></label>
                              <label class="mr-2 lb_c" >No <input type="radio" name="grupo7" id="grupo7n" value="No"></label>
                              <label class="mr-2 lb_c" >N/A <input type="radio" name="grupo7" id="grupo7na" value="N/A"></label>

                      </div>
                    </div>
                    <div class="form-group">
                      <div class="row">
                              <div class="col">
                                <span class="mr-2 span_c">¿Es usted Autorretenedor de ICA?<span>*</span></span>
                                <p class="small-text p_litt">En caso afirmativo indique el N° Resolución de Autorretenedor de ICA.</p>
                                <input type="text" class="form-control input_cus" id="" name="">
                              </div>

                              <label class="mr-2 lb_c" >Si <input type="radio" name="grupo8" id="grupo8s" value="Si"></label>
                              <label class="mr-2 lb_c" >No <input type="radio" name="grupo8" id="grupo8n" value="No"></label>
                              <label class="mr-2 lb_c" >N/A <input type="radio" name="grupo8" id="grupo8na" value="N/A"></label>

                      </div>
                    </div>


                  </div>

                  <div class="col-md-6">
                      <div class="form-group">
                          <label for="campo5" class="span_c">¿Cuáles estampillas aplica?<span>*</span></label>
                          <input type="text" class="form-control input_cus" id="estampillas" name="estampillas">
                        </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                          <label for="email" class="span_c">¿Cuál es el correo de recepción para Factura Electrónica?<span>*</span></label>
                          <input type="text" class="form-control input_cus" id="email" name="email">
                          @if ($errors->has('email'))
                              <p class="text-danger">{{ $errors->first('email') }}</p>
                           @endif
                        </div>
                  </div>

                </div>


                </div>

                <center style="margin-top:10px">
                   <div class="col-md-12">
                      <button type="submit" class="btn btn-primary estilo_boton_cus">Guardar y Continuar</button>
                    </div>
                </center>
              </form>

              </div>
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
    url: "/informaciontributaria/2",
    dataType: "json",
    type: "GET",
    success: function(response) {
        console.log(response);

        informacion_local = response.informacion;

        if (response.informacion.ResponsableImpuesto == 'Si') {

            $("#grupo1s").prop('checked',true);
        }else if (response.informacion.ResponsableImpuesto =='No') {
            $("#grupo1n").prop('checked',true);

        } else {
            $("#grupo1na").prop('checked',true);

        }

        if (response.informacion.SujetoRetencion == 'Si') {

             $("#grupo2s").prop('checked',true);
        }else if (response.informacion.SujetoRetencion =='No') {
             $("#grupo2n").prop('checked',true);

        } else {
             $("#grupo2na").prop('checked',true);

        }

        if (response.informacion.Declarar == 'Si') {

         $("#grupo3s").prop('checked',true);
        }else if (response.informacion.Declarar =='No') {
            $("#grupo3n").prop('checked',true);

        } else {
         $("#grupo3na").prop('checked',true);

        }

        if (response.informacion.RST == 'Si') {

        $("#grupo4s").prop('checked',true);
        }else if (response.informacion.RST =='No') {
        $("#grupo4n").prop('checked',true);

        } else {
        $("#grupo4na").prop('checked',true);

        }

        if (response.informacion.Estampillas == 'Si') {

        $("#grupo5s").prop('checked',true);
        }else if (response.informacion.Estampillas =='No') {
        $("#grupo5n").prop('checked',true);

        } else {
        $("#grupo5na").prop('checked',true);

        }

        if (response.informacion.GContribuyente == 'Si') {

            $("#grupo6s").prop('checked',true);
            }else if (response.informacion.GContribuyente =='No') {
            $("#grupo6n").prop('checked',true);

            } else {
            $("#grupo6na").prop('checked',true);

            }

            if (response.informacion.AutorretenedorF == 'Si') {

            $("#grupo7s").prop('checked',true);
            }else if (response.informacion.AutorretenedorF =='No') {
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


        if (response.informacion.Observacion1 != null) {

            $("#estampilla").append("si entra ");

        } else {

        }

        if (response.informacion.Observacion2 == null) {

        $("#estampilla").append("si entra ");

        } else {

        }



        $("#email").val(response.informacion.Email);

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
