<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bienvenido</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
  <link rel="stylesheet" href="{{ asset('css/infor_banca.css') }}">
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
                                        <i class="fa-solid fa-user"></i>
                            {{ __('Actualizar Perfil') }}
                        </a>
                    @else

                        <a class="btn btn-success btn_cb_c" href="{{ route('proveedor.perfil',Auth::user()->id) }}"

                                        style="margin-top: 25px;">
                                        <i class="fa-solid fa-user"></i>
                            {{ __('Actualizar Perfil') }}
                        </a>

                    @endif


                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
                <div class="">
                    <a class="btn btn-success btn_cb" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();"
                                     style="margin-top: 25px;">
                        {{ __('Cerrar sesión') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>

        </div>
    </div>
    <div class="row mb-5">
      <div class="col-md-12">
        <div class="text-center">
          <img src="{{ asset('images/logo_t2.png') }}" class="my-4 img-fluid">
          <h1 class="text-primary h1_cus">Información Contable y Financiera</h1>
          <hr class="underline">
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="card bg-light mt-4">
          <div class="card-body">
            <div class="row">
              <div class="col">
                <div class="card text-center border-0 transparente">
                  <div class="card-body">
                    <div class="image3">
                    <img src="{{ asset('images/Información-Tributaria.png') }}" class="image-clas2" alt="">
                    </div>
                    <br><br>
                    <h2 class="txt_cus">INFORMACIÓN<span>*</span></h2>
                    <h2 class="txt_cus mb-3">TRIBUTARIA</h2>
                    <a href="{{ route('cliente.informaciont',Auth::user()->id) }}">
                    <br>
                    <button class="btn btn-primary mt-3 btn_card">VISITAR</button>
                    </a>
                    <br><br>

                  </div>
                </div>
              </div>
              <div class="col">
                <div class="card text-center border-0 transparente">
                  <div class="card-body">
                  <div class="image3">
                    <img src="{{ asset('images/Información-financiera.png') }}" class="image-clas2" alt="">
                    </div>
                    <br><br>
                    <h2 class="txt_cus">INFORMACIÓN<span>*</span></h2>
                    <h2 class="txt_cus mb-3">FINANCIERA</h2>
                    <a href="{{ route('cliente.informacionf',Auth::user()->id) }}">
                        <br>
                        <button class="btn btn-primary mt-3 btn_card">VISITAR</button>
                    </a>
                    <br><br>
                  </div>
                </div>
              </div>

              @if (Auth::user()->rol == 1)

              <div class="col">
                <div class="card text-center border-0 transparente">
                  <div class="card-body">
                  <div class="image3">
                    <img src="{{ asset('images/Pagaré.png') }}" class="image-clas2" alt="">
                    </div>
                    <br><br>
                    <h2 class="txt_cus">PAGARÉ<span>*</span></h2>
                    <p class="small_tt">¿Aplica para<br> ventas a crédito? </p>

                    <a href="{{ route('cliente.pagare',Auth::user()->id) }}">
                        <br>
                        <button class="btn btn-primary mt-3 btn_card">VISITAR</button>
                    </a>
                    <br><br>

                  </div>
                </div>
              </div>

              @endif

              <div class="col">
                <div class="card text-center border-0 transparente">
                  <div class="card-body">
                    <div class="image3">
                       <img src="{{ asset('images/Información-Bancaria.png') }}" class="image-clas2" alt="">
                    </div>
                    <br><br>
                    <h2 class="txt_cus">INFORMACIÓN<span>*</span></h2>
                    <h2 class="txt_cus mb-3">BANCARIA</h2>
                    <br>
                    <a href="{{ route('cliente.informacionb',Auth::user()->id) }}">
                        <button class="btn btn-primary mt-3 btn_card">VISITAR</button>
                    </a>
                    <br>
                  </div>
                </div>
              </div>
              <div class="col">
                <div class="card text-center border-0 transparente">
                  <div class="card-body">
                    <div class="image3">
                        <div class="icon_user">
                            <i class="fa-solid fa-user"></i>
                        </div>
                    </div>
                    <br><br>
                    <h2 class="txt_cus">INFORMACIÓN<span>*</span></h2>
                    <h2 class="txt_cus mb-3">SOCIOS Y ACCIONISTAS</h2>

                    <a href="{{ route('clientes.socios_accionistas',Auth::user()->id) }}">
                        <button class="btn btn-primary mt-3 btn_card">VISITAR</button>
                    </a>
                    <br><br>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</body>
</html>
