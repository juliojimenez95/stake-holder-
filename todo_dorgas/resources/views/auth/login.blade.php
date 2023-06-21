<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Bienvenido</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
  <link rel="stylesheet" href="{{ asset('css/wel.css') }}">
  <link rel="stylesheet" href="{{ asset('css/login.css') }}">

  <style>
    /* Estilo para ocultar los bordes del select y hacerlo transparente */
    #mySelect {
        appearance: none;
        -webkit-appearance: none;
        -moz-appearance: none;
        outline: none;
        border: none;
        background: none;
        color: white;
        background-color: #004492!important;

    }
    </style>


  <!--fuentes-->
  <link href="https://www.dafontfree.net/embed/ZnJhbmtsaW4tZ290aGljLWJvb2stcmVndWxhciZkYXRhLzMyL2YvMTU0MjI1L0ZyYW5rbGluIEdvdGhpYyBCb29rIFJlZ3VsYXIudHRm" rel="stylesheet" type="text/css"/>
  <link href="https://allfont.net/allfont.css?fonts=franklin-gothic-medium" rel="stylesheet" type="text/css" />
  <link href="https://www.dafontfree.net/embed/ZnJhbmtsaW4tZ290aGljLW1lZGl1bS1jb25kLXJlZ3VsYXImZGF0YS8zMi9mLzE1NDEzMC9GcmFua2xpbiBHb3RoaWMgTWVkaXVtIENvbmQgUmVndWxhci50dGY" rel="stylesheet" type="text/css"/>
</head>
<body>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="abs_cont">
          <div class="div_fa">
            <div class="img_fa">
                <i class="fa-solid fa-users"></i>
            </div>
            <p class="p_img_c">Admin</p>
          </div>

          <div class="div_father">
            <div class="text_fa">
              <div class="cultura_img">
                <img src="{{ asset('images/Cultura-de-Legalidad.png') }}"  style="height: 40px " class="img-fluid">
              </div>
              <div class="div_select">
                <select id="mySelect" class="form-control">
                    <option value="#">Conoce aquí nuestra Cultura de Legalidad</option>
                    <option value="option1" data-file="AF_2023-05-02-6451c5c84871a.pdf">Políticas de Tratamiento de Datos</option>
                    <option value="option2" data-file="AF_2023-05-02-6451c5c84871a.pdf">Políticas de Tratamiento de Información</option>
                    <option value="option3" data-file="PO_SAG_01_Políticas SAGRILAFT Inversiones Todo Drogas S.A.S.V01.pdf">Políticas SAGRILAFT</option>
                    <option value="option4" data-file="AF_2023-05-02-6451c5c84871a.pdf">Código de Ética y Buen Gobierno</option>
                </select>
              </div>
            </div>
          </div>



        </div>
        <div class="text-center">
          <img src="{{ asset('images/logo_t2.png') }}"   class=" my-4 img-fluid">
          <h1 class="text-primary h1_cus">Bienvenido</h1>
          <hr class="underline_cus"><p class="text-primary p_cus">Ingresar</p>
        </div>
      </div>
    </div>
    <div class="row mb-5">
      <div class="col-md-5 mx-auto">
        <div class="cont_login">
            <div class="mb-4">
                <div class="img_fa">
                    <i class="fa-solid fa-user"></i>
                </div>
                <p class="p_img">Usuario</p>
            </div>
          <div class="con_input">
            <form method="POST" action="{{ route('login') }}" >
                @csrf
              <input type="text" placeholder="Usuario/Email" name="email"  class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required autocomplete="email" autofocus>
              @error('email')
                 <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                 </span>
                @enderror
              <input type="password" placeholder="Contraseña"  class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
              @error('password')
                 <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                 </span>
                @enderror
                <div class=" mb-3">
                    <div class="">
                        <div class="">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Recordar contraseña') }}
                            </label>
                        </div>
                    </div>
                </div>
              <button class="btn btn-primary bt_cus mb-5">Ingresar</button>
            </form>

            <a href="{{ route('password.request') }}">
            <span>¿Olvidó su contraseña?</span> </a><br>
            <span>¿No tiene cuenta? <a href="{{route('cliente.registrarse')}}" class="reg_a"><strong>Registrarse</strong></a></span>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Incluir jQuery, Popper.js y Bootstrap JavaScript -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="{{ asset('js/descarga.js') }}"></script>

</body>
</html>
