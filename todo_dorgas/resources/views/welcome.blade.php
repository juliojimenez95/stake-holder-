<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Bienvenido</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="text-center">
          <img src="{{ asset('images/logo_t2.png') }}"   class=" my-4 img-fluid">
          <h1 class="text-primary">Bienvenido</h1>
          <hr class="underline">
        <strong><p class="text-primary">Seleccione el perfil al que desea ingresar</p></strong>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6" >
        <a href="{{ route('cliente.identificacion') }}" class="w-100">
        <img src="{{ asset('images/cliente.png') }}" alt="Imagen de perfil 1" class="img-responsive my-4 img-fluid w-100 ">
        </a>
      </div>
      <div class="col-md-6">
        <a href="{{ route('cliente.identificacion') }}"  class="w-100">
        <img src="{{ asset('images/proveedor.png') }}" alt="Imagen de perfil 2" class="img-responsive my-4 img-fluid w-100">
        </a>
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
