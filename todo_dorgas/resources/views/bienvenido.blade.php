<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Bienvenido</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
  <link rel="stylesheet" href="{{ asset('css/wel.css') }}">
</head>
<body>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="abs_cont">
          <div class="div_fa">
            <div class="img_fa">
              <i class="fa-solid fa-user"></i>
            </div>
          </div>
          
          <div class="div_father">
            <div class="text_fa">
              <div class="cultura_img">
                <img src="{{ asset('images/Cultura-de-Legalidad.png') }}"   class="img-fluid">
              </div>
              <p>Conoce nuestra Cultura de Legalidad</p>
            </div>
          </div>

          <div class="div_select">
            <select id="mySelect" multiple size="4">
              <option value="option1">Políticas de Tratamiento de Datos</option>
              <option value="option2">Políticas de Tratamiento de información</option>
              <option value="option3">Politicas SAGRILAFT</option>
              <option value="option3">Código de Ética y Buen Gobierno</option>
            </select>
          </div>

        </div>
        <div class="text-center">
          <img src="{{ asset('images/logo_t2.png') }}"   class=" my-4 img-fluid">
          <h1 class="text-primary h1_cus">Bienvenido</h1>
          <hr class="underline"><p class="text-primary p_cus">Seleccione el perfil al que deseas ingresar</p>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6" style="padding: 0!important;">
        <a href="{{ route('cliente.identificacion') }}" class="w-100">
        <img src="{{ asset('images/cliente.png') }}" alt="Imagen de perfil 1" class="img-responsive my-4 img-fluid w-100 ">
        </a>
      </div>
      <div class="col-md-6" style="padding: 0!important;">
        <a href="{{ route('cliente.identificacion') }}"  class="w-100">
        <img src="{{ asset('images/proveedor.png') }}" alt="Imagen de perfil 2" class="img-responsive my-4 img-fluid w-100">
        </a>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <div class="text_link">
          <a href="">Stakeholders.tododrogas.com.co</a>
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
