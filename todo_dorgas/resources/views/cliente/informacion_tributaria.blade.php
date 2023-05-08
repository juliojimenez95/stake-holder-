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

  <!--fuentes-->
  <link href="https://www.dafontfree.net/embed/ZnJhbmtsaW4tZ290aGljLWJvb2stcmVndWxhciZkYXRhLzMyL2YvMTU0MjI1L0ZyYW5rbGluIEdvdGhpYyBCb29rIFJlZ3VsYXIudHRm" rel="stylesheet" type="text/css"/>
  <link href="https://allfont.net/allfont.css?fonts=franklin-gothic-medium" rel="stylesheet" type="text/css" />
  <link href="https://www.dafontfree.net/embed/ZnJhbmtsaW4tZ290aGljLW1lZGl1bS1jb25kLXJlZ3VsYXImZGF0YS8zMi9mLzE1NDEzMC9GcmFua2xpbiBHb3RoaWMgTWVkaXVtIENvbmQgUmVndWxhci50dGY" rel="stylesheet" type="text/css"/>
</head>
<body>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="text-center">
          <img src="{{ asset('images/logo_t2.png') }}" class="my-4 img-fluid">
          <h1 class="text-primary h1_tit">Información Tributaria</h1>
          <hr class="underline">
        </div>
      </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
              <div class="card formulario2 bg-light mt-4">
                <div class="card-body">
                <form action="{{ route('clientes.storeInformaciont',$id) }}" method="POST">
                  @csrf
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <div class="row">
                        <div class="col">
                          <span class="mr-2 span_c">Responsable impuesto a la venta-IVA<span>*</span></span>
                        </div>

                        <label class="mr-2 lb_c" >Si <input type="radio" name="grupo1" value="Si"></label>
                        <label class="mr-2 lb_c" >No <input type="radio" name="grupo1" value="No"></label>
                        <label class="mr-2 lb_c" >N/A <input type="radio" name="grupo1" value="N/A"></label>

                      </div>

                    </div>
                    <div class="form-group">
                      <div class="row">
                          <div class="col">
                            <span class="mr-2 span_c">Sujeto a Retención<span>*</span></span>
                          </div>

                          <label class="mr-2 lb_c" >Si <input type="radio" name="grupo2" value="Si"></label>
                          <label class="mr-2 lb_c" >No <input type="radio" name="grupo2" value="No"></label>
                          <label class="mr-2 lb_c" >N/A <input type="radio" name="grupo2" value="N/A"></label>

                        </div>
                    </div>
                    <div class="form-group">
                      <div class="row">
                            <div class="col">
                              <span class="mr-2 span_c">Obligado a Declarar Renta<span>*</span></span>
                            </div>

                            <label class="mr-2 lb_c" >Si <input type="radio" name="grupo3" value="Si"></label>
                            <label class="mr-2 lb_c" >No <input type="radio" name="grupo3" value="No"></label>
                            <label class="mr-2 lb_c" >N/A <input type="radio" name="grupo3" value="N/A"></label>

                      </div>
                    </div>
                    <div class="form-group">
                      <div class="row">
                              <div class="col">
                                <span class="mr-2 span_c">RST Régimen Simple de tributación<span>*</span></span>
                              </div>

                              <label class="mr-2 lb_c" >Si <input type="radio" name="grupo4" value="Si"></label>
                              <label class="mr-2 lb_c" >No <input type="radio" name="grupo4" value="No"></label>
                              <label class="mr-2 lb_c" >N/A <input type="radio" name="grupo4" value="N/A"></label>

                      </div>
                    </div>
                    <div class="form-group">
                      <div class="row">
                              <div class="col">
                                <span class="mr-2 span_c">¿Aplica estampillas?<span>*</span></span>
                              </div>

                              <label class="mr-2 lb_c" >Si <input type="radio" name="grupo5" value="Si"></label>
                              <label class="mr-2 lb_c" >No <input type="radio" name="grupo5" value="No"></label>
                              <label class="mr-2 lb_c" >N/A <input type="radio" name="grupo5" value="N/A"></label>

                      </div>
                    </div>

                  </div>
                  <div class="col-md-6">
                   <div class="form-group">
                      <div class="row">
                              <div class="col">
                                <span class="mr-2 span_c">Gran Contribuyente<span>*</span></span>
                                <p class="small-text p_litt">En caso afirmativo N° Resolución de Gran Contribuyente</p>
                              </div>

                              <label class="mr-2 lb_c" >Si <input type="radio" name="grupo6" value="Si"></label>
                              <label class="mr-2 lb_c" >No <input type="radio" name="grupo6" value="No"></label>
                              <label class="mr-2 lb_c" >N/A <input type="radio" name="grupo6" value="N/A"></label>

                      </div>
                    </div>
                    <div class="form-group">
                      <div class="row">
                              <div class="col">
                                <span class="mr-2 span_c">Autorretenedor en la Fuente<span>*</span></span>
                                <p class="small-text p_litt">En caso afirmativo N° Resolución de Autorretenedor en la fuente</p>
                              </div>

                              <label class="mr-2 lb_c" >Si <input type="radio" name="grupo7" value="Si"></label>
                              <label class="mr-2 lb_c" >No <input type="radio" name="grupo7" value="No"></label>
                              <label class="mr-2 lb_c" >N/A <input type="radio" name="grupo7" value="N/A"></label>

                      </div>
                    </div>
                    <div class="form-group">
                      <div class="row">
                              <div class="col">
                                <span class="mr-2 span_c">Autorretenedor ICA<span>*</span></span>
                                <p class="small-text p_litt">En caso afirmativo N° Resolución de Autorretenedor en la fuente</p>
                              </div>

                              <label class="mr-2 lb_c" >Si <input type="radio" name="grupo8" value="Si"></label>
                              <label class="mr-2 lb_c" >No <input type="radio" name="grupo8" value="No"></label>
                              <label class="mr-2 lb_c" >N/A <input type="radio" name="grupo8" value="N/A"></label>

                      </div>
                    </div>


                  </div>

                  <div class="col-md-6">
                      <div class="form-group">
                          <label for="campo5" class="span_c">¿Cuáles son las estampillas?<span>*</span></label>
                          <input type="text" class="form-control input_cus" id="estampillas" name="estampillas">
                        </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                          <label for="email" class="span_c">Correo de recepción de Factura Electrónica<span>*</span></label>
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
                      <button type="submit" class="btn btn-primary estilo_boton_cus">CONTINUAR</button>
                    </div>
                </center>
              </form>

              </div>
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
