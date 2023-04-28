<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bienvenido</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
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
        <div class="card bg-light mt-4">
          <div class="card-body">
          <form action="{{ route('clientes.storeInformaciont') }}" method="POST">
            @csrf
          <div class="row">
            <div class="col-md-5">
              <div class="form-group">
                <div class="row">
                  <div class="col">
                    <span class="mr-2">Responsable impuesto a la venta-IVA  </span>
                  </div>

                  <label class="mr-2" >Si <input type="radio" name="grupo1" value="Si"></label>
                  <label class="mr-2" >No <input type="radio" name="grupo1" value="No"></label>
                  <label class="mr-2" >N/A <input type="radio" name="grupo1" value="N/A"></label>

                </div>

              </div>
              <div class="form-group">
                <div class="row">
                    <div class="col">
                      <span class="mr-2">Sujeto a Retención </span>
                    </div>

                    <label class="mr-2" >Si <input type="radio" name="grupo2" value="Si"></label>
                    <label class="mr-2" >No <input type="radio" name="grupo2" value="No"></label>
                    <label class="mr-2" >N/A <input type="radio" name="grupo2" value="N/A"></label>

                  </div>
              </div>
              <div class="form-group">
                <div class="row">
                      <div class="col">
                        <span class="mr-2">Obligado a Declarar Renta </span>
                      </div>

                      <label class="mr-2" >Si <input type="radio" name="grupo3" value="Si"></label>
                      <label class="mr-2" >No <input type="radio" name="grupo3" value="No"></label>
                      <label class="mr-2" >N/A <input type="radio" name="grupo3" value="N/A"></label>

                </div>
              </div>
              <div class="form-group">
                <div class="row">
                        <div class="col">
                          <span class="mr-2">RST Régimen Simple de tributación </span>
                        </div>

                        <label class="mr-2" >Si <input type="radio" name="grupo4" value="Si"></label>
                        <label class="mr-2" >No <input type="radio" name="grupo4" value="No"></label>
                        <label class="mr-2" >N/A <input type="radio" name="grupo4" value="N/A"></label>

                </div>
              </div>
              <div class="form-group">
                <div class="row">
                        <div class="col">
                          <span class="mr-2">¿Aplica estampillas? </span>
                        </div>

                        <label class="mr-2" >Si <input type="radio" name="grupo5" value="Si"></label>
                        <label class="mr-2" >No <input type="radio" name="grupo5" value="No"></label>
                        <label class="mr-2" >N/A <input type="radio" name="grupo5" value="N/A"></label>

                </div>
              </div>
              <div class="form-group">
                <label for="campo5">¿Cuáles son las estampillas?</label>
                <input type="text" class="form-control" id="estampillas" name="estampillas">
              </div>
            </div>
            <div class="col-md-5">
            <div class="form-group">
                <div class="row">
                        <div class="col">
                          <span class="mr-2">Gran Contribuyente </span>
                          <p class="small-text">En caso afirmativo N° Resolución de Gran Contribuyente</p>
                        </div>

                        <label class="mr-2" >Si <input type="radio" name="grupo6" value="Si"></label>
                        <label class="mr-2" >No <input type="radio" name="grupo6" value="No"></label>
                        <label class="mr-2" >N/A <input type="radio" name="grupo6" value="N/A"></label>

                </div>
              </div>
              <div class="form-group">
                <div class="row">
                        <div class="col">
                          <span class="mr-2">Autorretenedor en la Fuente</span>
                          <p class="small-text">En caso afirmativo N° Resolución de Autorretenedor en la fuente</p>
                        </div>

                        <label class="mr-2" >Si <input type="radio" name="grupo7" value="Si"></label>
                        <label class="mr-2" >No <input type="radio" name="grupo7" value="No"></label>
                        <label class="mr-2" >N/A <input type="radio" name="grupo7" value="N/A"></label>

                </div>
              </div>
              <div class="form-group">
                <div class="row">
                        <div class="col">
                          <span class="mr-2">Autorretenedor ICA</span>
                          <p class="small-text">En caso afirmativo N° Resolución de Autorretenedor en la fuente</p>
                        </div>

                        <label class="mr-2" >Si <input type="radio" name="grupo8" value="Si"></label>
                        <label class="mr-2" >No <input type="radio" name="grupo8" value="No"></label>
                        <label class="mr-2" >N/A <input type="radio" name="grupo8" value="N/A"></label>

                </div>
              </div>
              <div class="form-group">
                <label for="email">Correo de recepción de Factura Electrónica</label>
                <input type="text" class="form-control" id="email" name="email">
                @if ($errors->has('email'))
                    <p class="text-danger">{{ $errors->first('email') }}</p>
                 @endif
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
