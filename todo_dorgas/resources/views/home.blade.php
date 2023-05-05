<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bienvenido</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
  <link rel="stylesheet" href="{{ asset('css/infor_banca.css') }}">
</head>
<body>
  <div class="container-fluid">
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
                    <img src="{{ asset('images/Pagaré.png') }}" class="image-clas2" alt="">
                    </div>
                    <br><br>
                    <h2 class="txt_cus">PAGARÉ<span>*</span></h2>
                    <p class="small_tt">¿Aplica para<br> ventas a crédito? </p>

                    <a href="{{ route('cliente.pagare',Auth::user()->id) }}">
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
                       <img src="{{ asset('images/Información-Bancaria.png') }}" class="image-clas2" alt="">
                    </div>
                    <br><br>
                    <h2 class="txt_cus">INFORMACIÓN<span>*</span></h2>
                    <h2 class="txt_cus mb-3">BANCARIA</h2>

                    <a href="{{ route('cliente.informacionb',Auth::user()->id) }}">
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
                        <div class="icon_user">
                            <i class="fa-solid fa-user"></i>
                        </div>
                    </div>
                    <br><br>
                    <h2 class="txt_cus">INFORMACIÓN<span>*</span></h2>
                    <h2 class="txt_cus mb-3">PERSONAL</h2>

                    <a href="{{ route('cliente.informacionb',Auth::user()->id) }}">
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
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper-base.min.js"
    integrity="sha384-EQhgPShYZDmf+OWKvoYf70b91G/J0xgfgvbXhNfP60ZQLPv6du/0h0sU6Ygr19d0"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
