<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bienvenido</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
  <link rel="stylesheet" href="{{ asset('css/info_financiera.css') }}">

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
          <h1 class="text-primary h1_t">Información Financiera</h1>
          <hr class="underline color_under">
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="card formulario2 bg-light mt-4">
          <div class="card-body">
          <form action="{{ route('clientes.storeInformacionf',$id) }}" method="POST">
            @csrf
          <div class="row">
            <div class="col-md-12">
                <div class="div_p">
                    <p>Proporcione la siguiente información con corte a 31 de diciembre del año inmediatamente anterior.</p>
                </div>
            </div>
            <div class="container">
                <div class="row row-center">
                    <div class="col-md-6">
                        <div class="div_in">
                            <p style="padding-left: 30px;"><span></span></p>
                            <div class="div_in_on mb-3">
                                  <div class="col-4">
                                    <p class="">Activos Totales</p>
                                  </div>
                                  <div class="col-8">
                                    <input type="number" class="form-control col-12 input_cus" id="Activo" name="Activo" value="{{ $informacion->Activo }}">
                                    @if ($errors->has('Activo'))
                                        <p class="text-danger">{{ $errors->first('Activo') }}</p>
                                    @endif
                                  </div>

                            </div>

                            <div class="div_in_on mb-3">
                                <div class="col-4">
                                  <p class="">Pasivos Totales</p>
                                </div>
                                <div class="col-8">
                                    <input type="number" class="form-control col-12 input_cus" id="Pasivo" name="Pasivo" value="{{ $informacion->Pasivo }}">
                                    @if ($errors->has('Pasivo'))
                                       <p class="text-danger">{{ $errors->first('Pasivo') }}</p>
                                    @endif
                                </div>

                          </div>

                          <div class="div_in_on mb-3">
                            <div class="col-4">
                              <p class="">Patrimonio</p>
                            </div>
                            <div class="col-8">
                                <input type="number" class="form-control col-12 input_cus" id="Patrimonio" name="Patrimonio" value="{{ $informacion->Patrimonio }}">
                                @if ($errors->has('Patrimonio'))
                                   <p class="text-danger">{{ $errors->first('Patrimonio') }}</p>
                                @endif
                            </div>
                        </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="div_in">
                            <p><span></span></p>
                            <div class="div_in_on mb-3">
                                <div class="col-4">
                                  <p class="">Ingresos Totales</p>
                                </div>
                                <div class="col-8">
                                    <input type="number" class="form-control col-12 input_cus" id="ingresos" name="Ingresos" value="{{ $informacion->IngresosTotales }}">
                                    @if ($errors->has('Ingresos'))
                                       <p class="text-danger">{{ $errors->first('Ingresos') }}</p>
                                    @endif
                                </div>
                            </div>

                            <div class="div_in_on mb-3">
                                <div class="col-4">
                                  <p class="">Egresos Totales</p>
                                </div>
                                <div class="col-8">
                                    <input type="number" class="form-control col-12 input_cus" id="egresos" name="Egresos" value="{{ $informacion->EgresosTotales }}">
                                    @if ($errors->has('Egresos'))
                                       <p class="text-danger">{{ $errors->first('Egresos') }}</p>
                                    @endif
                                </div>
                            </div>

                            <div class="div_in_on mb-3">
                                <div class="col-4">
                                  <p class="">Número de personal con vinculación directa</p>
                                </div>
                                <div class="col-8">
                                    <input type="number" class="form-control col-12 input_cus" id="vinculado" name="Vinculado" value="{{ $informacion->CantidadPersonas }}">
                                    @if ($errors->has('Vinculado'))
                                       <p class="text-danger">{{ $errors->first('Vinculado') }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper-base.min.js"
    integrity="sha384-EQhgPShYZDmf+OWKvoYf70b91G/J0xgfgvbXhNfP60ZQLPv6du/0h0sU6Ygr19d0"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
