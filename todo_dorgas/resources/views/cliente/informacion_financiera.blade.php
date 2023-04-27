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
          <form action="">
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
                    
                      <input type="text" class="form-control col-5" id="campo8" name="campo8">
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                <div class="col text-center">
                        <p class="mr-2">Pasivo </p>
                      </div>
                    
                      <input type="text" class="form-control col-5" id="campo8" name="campo8">
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                <div class="col text-center">
                        <p class="mr-2">Patrimonio </p>
                      </div>
                    
                      <input type="text" class="form-control col-5" id="campo8" name="campo8">
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
                      
                <div class="col text-center" style="position: a;">
                      <input type="text" class="form-control col-5 text-center" id="campo8" name="campo8">
                      </div>
                </div>
              </div>
              
            </div>
            
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
                    
                      <input type="text" class="form-control col-5" id="campo8" name="campo8">
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                <div class="col text-center">
                        <p class="mr-2">Pasivo </p>
                      </div>
                    
                      <input type="text" class="form-control col-5" id="campo8" name="campo8">
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                <div class="col text-center">
                        <p class="mr-2">Patrimonio </p>
                      </div>
                    
                      <input type="text" class="form-control col-5" id="campo8" name="campo8">
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
