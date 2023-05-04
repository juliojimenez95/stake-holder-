<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bienvenido</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

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
          <h1 class="text-primary">Informacion contable y financiero</h1>
          <hr class="underline">
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
            <div class="col-md-4">
              <div class="form-group">
                <div class="row">
                  <div class="col text-center">
                    <span class="mr-2">Activo y pasivo total a 31 <br> de diciembre del año anterior. </span>
                  </div>
                </div>
              </div>
              <br>
              <div class="form-group">
                <div class="row">
                    <div class="col text-center">
                      <span class="mr-2">Respuesta </span>
                    </div>
                  </div>
              </div>
              <div class="form-group">
                <div class="row">
                      <div class="col text-center">
                        <p class="mr-2">Activo </p>
                      </div>

                      <input type="text" class="form-control col-5" id="Activo" name="Activo">
                      @if ($errors->has('Activo'))
                         <p class="text-danger">{{ $errors->first('Activo') }}</p>
                      @endif
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                <div class="col text-center">
                        <p class="mr-2">Pasivo </p>
                      </div>

                      <input type="text" class="form-control col-5" id="Pasivo" name="Pasivo">
                      @if ($errors->has('Pasivo'))
                         <p class="text-danger">{{ $errors->first('Pasivo') }}</p>
                      @endif
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                <div class="col text-center">
                        <p class="mr-2">Patrimonio </p>
                      </div>

                      <input type="text" class="form-control col-5" id="Patrimonio" name="Patrimonio">
                      @if ($errors->has('Patrimonio'))
                         <p class="text-danger">{{ $errors->first('Patrimonio') }}</p>
                      @endif
                </div>
              </div>

            </div>
            <div class="col-md-4">
              <div class="form-group">
                <div class="row">
                  <div class="col text-center">
                    <span class="mr-2">Ingresos totales al 31 de <br> diciembre del año anterior. </span>
                  </div>
                </div>
              </div>
              <br>
              <div class="form-group">
                <div class="row">
                    <div class="col text-center">
                      <span class="mr-2">Respuesta </span>
                    </div>
                  </div>
              </div>
              <div class="form-group ">
                <div class="row">

                <div class="col text-center" >
                      <input type="text" class="form-control col-5 text-center" id="IngresosTotales" name="IngresosTotales">
                      @if ($errors->has('IngresosTotales'))
                        <p class="text-danger">{{ $errors->first('IngresosTotales') }}</p>
                      @endif
                    </div>
                </div>
              </div>

            </div>

            <div class="col-md-4">
                <div class="form-group">
                  <div class="row">
                    <div class="col text-center">
                      <span class="mr-2">Cantidad personal vinculado<br> directo por la empresa a 31<br>de diciembre del año anterior.</span>
                    </div>
                  </div>
                </div>
                <br>
                <div class="form-group">
                  <div class="row">
                      <div class="col text-center">
                        <span class="mr-2">Respuesta </span>
                      </div>
                    </div>
                </div>
                <div class="form-group ">
                  <div class="row">

                  <div class="col text-center" style="position: a;">
                        <input type="text" class="form-control col-5 text-center" id="CantidadPersonas" name="CantidadPersonas">
                        @if ($errors->has('CantidadPersonas'))
                            <p class="text-danger">{{ $errors->first('CantidadPersonas') }}</p>
                        @endif
                    </div>
                  </div>
                </div>

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

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper-base.min.js"
    integrity="sha384-EQhgPShYZDmf+OWKvoYf70b91G/J0xgfgvbXhNfP60ZQLPv6du/0h0sU6Ygr19d0"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
