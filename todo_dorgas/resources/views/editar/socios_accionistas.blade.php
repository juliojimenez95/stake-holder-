<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bienvenido</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
  <link rel="stylesheet" href="{{ asset('css/socios.css') }}">


  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />


  <!--fuentes-->
  <link href="https://www.dafontfree.net/embed/ZnJhbmtsaW4tZ290aGljLWJvb2stcmVndWxhciZkYXRhLzMyL2YvMTU0MjI1L0ZyYW5rbGluIEdvdGhpYyBCb29rIFJlZ3VsYXIudHRm" rel="stylesheet" type="text/css"/>
  <link href="https://allfont.net/allfont.css?fonts=franklin-gothic-medium" rel="stylesheet" type="text/css" />
  <link href="https://www.dafontfree.net/embed/ZnJhbmtsaW4tZ290aGljLW1lZGl1bS1jb25kLXJlZ3VsYXImZGF0YS8zMi9mLzE1NDEzMC9GcmFua2xpbiBHb3RoaWMgTWVkaXVtIENvbmQgUmVndWxhci50dGY" rel="stylesheet" type="text/css"/>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="div_main">

                <div class="div_volver mt-3">
                    <a href="/home" class="btn btn-success btn_cb_c">
                        <i class="fa-solid fa-arrow-left"></i> Regresar</a>
                </div>
                <div class="">
                    <a class="btn btn-success btn_cb" href="/conocimiento/{{ $id }}"
                                     style="margin-top: 25px;">
                        {{ __('Continuar') }}
                        <i class="fa-solid fa-arrow-right"></i>
                    </a>
                </div>
                </div>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-md-12">
              <div class="text-center">
                <img src="{{ asset('images/logo_t2.png') }}" class="img-fluid">
                <h1 class="text-primary h1_tit">Socios o Accionistas</h1>
                <hr class="underline under_S" style="left: -35px; position: relative;">
              </div>
            </div>
        </div>
        <div class="card bg-light mt-4">
            <div class="card-body">
        <div class="container-fluid">
            <div class="row mb-4">
                <div class="col-md-12">
                    <div class="content_1">
                        <p>Tiene socios o accionistas con participación directa o indirecta superior al 5%?</p>
                        <div><span>Sí</span>  <input type="radio" id="red" name="color" value="red"> <span>No</span>  <input type="radio" id="" name="color" value=""></div>
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <form action="{{ route('clientes.storeaccionistas',$id) }}" method="post">
                    @csrf
                    <div class="content_main">
                        <div class="div_cus">
                            <label for="">Nombres y Apellidos<span>*</span> </label>
                            <input type="text" class="form-control custom_input" name="Nombre">
                            @if ($errors->has('Nombre'))
                                <p class="text-danger">{{ $errors->first('Nombre') }}</p>
                            @endif

                        </div>
                        <div class="div_cus">
                            <label for="tipo_d" class="form-label label_cus">Tipo de documento<span>*</span></label>
                            <select class="form-control custom_input_s" aria-label="Seleccione un tipo de documento" name="tipo_d">
                                <option value="">Documento</option>
                                @foreach ($tipos as $tipo)
                                    <option value="{{ $tipo }}">{{ $tipo }}</option>
                                @endforeach

                            </select>
                            @if ($errors->has('tipo_d'))
                                <p class="text-danger">{{ $errors->first('tipo_d') }}</p>
                            @endif
                        </div>

                        <div class="div_cus">
                            <label for="">Documento<span>*</span> </label>
                            <input type="text" class="form-control custom_input" name="documento">
                            @if ($errors->has('documento'))
                                <p class="text-danger">{{ $errors->first('documento') }}</p>
                            @endif
                        </div>

                        <div class="div_cus">
                            <label for="">Participación %<span>*</span> </label>
                            <input type="text" class="form-control custom_input" name="participacion">
                            @if ($errors->has('participacion'))
                                <p class="text-danger">{{ $errors->first('participacion') }}</p>
                            @endif
                        </div>
                        <div class="div_cus">
                            <label for="">Nacionalidad<span>*</span> </label>
                            <input type="text" class="form-control custom_input" name="Nacionalidad">
                        </div>
                        <div class="cont_cus_cus">
                            <div class="div_inside">
                                <p>¿Es considerado PEP?<br><span>(Decreto 830 del 2021)</span></p>
                            </div>
                            <div class="div_sn">
                                <label class="mr-2" >Si <input type="radio" name="PEP" value="1"></label>
                                <label class="mr-2" >No <input type="radio" name="PEP" value="0"></label>
                            </div>
                          </div>
                            </div>
                        </div>
                        <div class="mb-3 cr_cus" >
                            <button class="btn btn-primary btn_crear">Adicionar socio o accionista</button>
                        </div>
                    </div>
                </form>
                </div>

            <div class="container">
                <div class="row">
                  <div class="col-md-12">

                      <table id="miTabla" class="table tb_cus">
                        <thead>
                          <tr>
                              <th>Nombres y Apellidos</th>
                              <th>Tipo de documento</th>
                              <th>Documento</th>
                              <th>Participación %</th>
                              <th>Nacionalidad</th>
                              <th>PEP</th>

                          </tr>
                        </thead>
                        <tbody>
                                  @foreach ($accionistas as $accionista)
                                  <tr>
                                      <td>{{ $accionista->Nombres }}</td>
                                      <td>{{ $accionista->TipoNit }}</td>
                                      <td>{{ $accionista->Nit }}</td>
                                      <td>{{ $accionista->Participacion }}</td>
                                      <td>{{ $accionista->Nacionalidad }}</td>

                                      <td> {{ $accionista->PEP }}</td>
                                  </tr>
                              @endforeach

                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
            </div>
            <div class="container">
                <div class="row" style="margin-bottom: 60px;"></div>
            </div>
            <div class="container">
            <div class="row mb-5">
                <div class="col-md-12">
                    <form action="{{ route('editfondo',$id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')

                        <div class="cont_cus">
                            <div class="div_con">
                                <p>Documento Declaración de Origen de Fondos<br><span>Por favor descargar el D.O.F diligenciar y cargarlo nuevamente</span></p>
                            </div>
                            <div class="des_cus">
                                <div class="cont_all">
                                    <div class="img_cus">
                                        <img src="{{ asset('images/Descargar-PDF.png') }}" class="img-fluid">
                                    </div>
                                    <div class="btn_c">
                                        <a class="btn btn-primary" id="descarga" data-file="FO_SAG_04_Declaracion_Origen_Fondos_Proveedores_V01.pdf">DESCARGAR</a><span>*</span>
                                    </div>
                                </div>
                                <div class="cont_all">
                                    <div class="img_cus">
                                        <img src="{{ asset('images/Subir-PDF.png') }}" class="img-fluid">
                                    </div>
                                    <div class="btn_c">
                                        <a class="btn btn-primary" id="img1" onclick="document.getElementById('fondo').click()">CARGAR</a><span>*</span>
                                        <input type="file" id="fondo" name="fondo" style="display:none;"  onchange="changeImageColor()">

                                    </div>
                                </div>

                                <div class="cont_all">
                                    <div class="img_cus">
                                        <img src="{{ asset('images/Descargar-PDF.png') }}" class="img-fluid">
                                    </div>
                                    <div class="btn_c">
                                        <a class="btn btn-primary" id="descarga1" data-file="{{ $origen->archivo }}">EXISTENTE</a><span>*</span>
                                    </div>
                                </div>
                            </div>

                        </div>


                </div>
            </div>
            <div class="row mb-4">
                <div class="col-md-12">
                    <div class="div_continuar">
                        <button  class="btn btn-primary btn_continuar">Guardar y Continuar</button>

                    </div>
                </div>
            </div>
         </form>
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
  <script src="{{ asset('js/fondo.js') }}"></script>

  <script>const button = document.querySelector('#descarga');
    button.addEventListener('click', function() {
        // Obtener el archivo PDF correspondiente
        const filename = this.getAttribute('data-file');
        // Descargar el archivo
        window.location.href = '/descargar-pdf/' + filename;
    });</script>

<script>
    button2 = document.querySelector('#descarga1');
    button2.addEventListener('click', function() {
        // Obtener el archivo PDF correspondiente
        const filename = this.getAttribute('data-file');
        // Descargar el archivo
        window.location.href = '/descargar-pdf/' + filename;
    });</script>
</body>
</html>
