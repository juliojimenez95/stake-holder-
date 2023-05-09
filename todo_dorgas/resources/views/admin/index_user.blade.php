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

   <!-- date table -->
   <link rel="stylesheet" href="https://cdn.datatables.net/1.13.3/css/dataTables.bootstrap5.min.css"/>
   <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.5/css/buttons.bootstrap5.min.css"/>

   <script  src="https://code.jquery.com/jquery-3.6.3.js"
            integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM="
            crossorigin="anonymous"></script>

  <!--fuentes-->
  <link href="https://www.dafontfree.net/embed/ZnJhbmtsaW4tZ290aGljLWJvb2stcmVndWxhciZkYXRhLzMyL2YvMTU0MjI1L0ZyYW5rbGluIEdvdGhpYyBCb29rIFJlZ3VsYXIudHRm" rel="stylesheet" type="text/css"/>
  <link href="https://allfont.net/allfont.css?fonts=franklin-gothic-medium" rel="stylesheet" type="text/css" />
  <link href="https://www.dafontfree.net/embed/ZnJhbmtsaW4tZ290aGljLW1lZGl1bS1jb25kLXJlZ3VsYXImZGF0YS8zMi9mLzE1NDEzMC9GcmFua2xpbiBHb3RoaWMgTWVkaXVtIENvbmQgUmVndWxhci50dGY" rel="stylesheet" type="text/css"/>
</head>
<body>
    <div class="container-fluid">
        <div class="row mb-4">
            <div class="col-md-12">
              <div class="text-center">
                <img src="{{ asset('images/logo_t2.png') }}" class="img-fluid">
                <h1 class="text-primary h1_tit">Usuarios registrados</h1>
                <hr class="underline under_S">
              </div>
            </div>
        </div>
            <div class="container">
                <div class="row">
                  <div class="col-md-12">

                      <table id="miTabla" class="table tb_cus">
                        <thead>
                          <tr>
                              <th>Nombre</th>
                              <th>Email</th>
                              <th>rol</th>
                              <th>Acciones</th>


                          </tr>
                        </thead>
                        <tbody>
                                  @foreach ($usuarios as $usuario)
                                  <tr>
                                      <td>{{ $usuario->name }}</td>
                                      <td>{{ $usuario->email }}</td>
                                      @if ( $usuario->rol == 2)
                                      <td>Proveedor</td>
                                      @else
                                      <td> Cliente </td>
                                      @endif

                                      <td style="color: black">
                                        <a href="#" onclick="dataTributaria({{ 98 }})" {{--   data-toggle="modal" data-target="#modalInformacionTributaria" --}} style="margin-right: 20px; text-decoration: none;">
                                                <img src="{{ asset('images/Información-Tributaria.png') }}" class="navbar-brand-img" alt="main_logo" width="60" height="40">
                                        </a>
                                        <a href="#" data-toggle="modal" data-target="#modalInformacionFinanciera"  style="margin-right: 20px; text-decoration: none;">
                                            <img src="{{ asset('images/Información-financiera.png') }}" class="navbar-brand-img" alt="main_logo" width="60" height="40">
                                        </a>
                                        <a href="#" data-toggle="modal" data-target="#modalInformacionPagare"  style="margin-right: 20px; text-decoration: none;">
                                            <img src="{{ asset('images/Pagaré.png') }}" class="navbar-brand-img" alt="main_logo" width="60" height="40">
                                        </a>

                                        <a href="" data-toggle="modal" data-target="#modalInformacionBancariaLabel"  style="margin-right: 20px; text-decoration: none;">
                                            <img src="{{ asset('images/Información-Bancaria.png') }}" class="navbar-brand-img" alt="main_logo" width="60" height="40">
                                        </a>

                                        <a href="" data-toggle="modal" data-target="#modalInformacionTributaria">
                                            <i class="fa-solid fa-user"></i>
                                        </a>
                                    </td>

                                  </tr>
                              @endforeach

                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
            </div>
            </div>
        </div>


          <!-- Contenido de la vista modal informacion tributaria-->
          <div class="modal fade" id="modalInformacionTributaria" tabindex="-1" role="dialog" aria-labelledby="modalInformacionTributariaLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="modalInformacionTributariaLabel">Información Tributaria</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-6">
                        <p id='iva'> <strong></strong></p>
                      </div>
                      <div class="col-md-6">
                        <p>¿Está sujeto a retención? <strong>No</strong></p>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <p>¿Está obligado a declarar renta? <strong>N/A</strong></p>
                      </div>
                      <div class="col-md-6">
                        <p>¿Está en el RST (Régimen Simple de Tributación)? <strong>si</strong></p>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <p>¿Aplica estampillas? <strong>No</strong></p>
                        @if ('Si' === 'Si')
                        <p>Estampillas: <strong>9</strong></p>
                        @endif
                      </div>
                      <div class="col-md-6">
                        <p>¿Es gran contribuyente? <strong>No</strong></p>

                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <p>¿Es autorretenedor en la fuente? <strong>Si</strong></p>

                      </div>

                      <div class="col-md-6">
                        <p>Autorretenedor ICA <strong>Si</strong></p>

                      </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                          <p>Email <strong>Si</strong></p>

                        </div>

                    </div>

                  </div>
                </div>
              </div>
            </div>
          </div>


    <!-- Contenido de la vista modal informacion Financiera-->
          <div class="modal fade" id="modalInformacionFinanciera" tabindex="-1" role="dialog" aria-labelledby="modalInformacionFinancieraLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="modalInformacionFinancieraLabel">Información Financiera</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-6">
                        <p>Activo <strong>24234</strong></p>
                      </div>
                      <div class="col-md-6">
                        <p>Pasivo <strong>353534</strong></p>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <p>Patrimonio <strong>342424</strong></p>
                      </div>
                      <div class="col-md-6">
                        <p>Ingresos <strong>3434234</strong></p>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <p>Egresos <strong>345345</strong></p>
                      </div>
                      <div class="col-md-6">
                        <p>Personas vinculadas <strong>No</strong></p>

                      </div>
                    </div>

                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Contenido de la vista modal  Pagare-->
          <div class="modal fade" id="modalInformacionPagare" tabindex="-1" role="dialog" aria-labelledby="modalInformacionPagareLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="modalInformacionPagareLabel">Pagaré</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-6">
                        <p>Venta de Credito <strong>Si</strong></p>
                      </div>
                      <div class="col-md-6">
                        <p>Document <strong>dasdas</strong></p>
                      </div>
                    </div>

                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Contenido de la vista modal informacion Bancaria-->
          <div class="modal fade" id="modalInformacionBancaria" tabindex="-1" role="dialog" aria-labelledby="modalInformacionBancariaLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="modalInformacionBancariaLabel">Información Bancaria</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-6">
                        <p>Banco <strong>Caja social</strong></p>
                      </div>
                      <div class="col-md-6">
                        <p>Tipo cuenta <strong>Ahorros</strong></p>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <p>Numero cuenta <strong>22423423</strong></p>
                      </div>
                      <div class="col-md-6">
                        <p>Cuidad <strong>Medellin</strong></p>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <p>Departamento <strong>Antioquia</strong></p>
                      </div>
                      <div class="col-md-6">
                        <p>Pais <strong>Colombia</strong></p>

                      </div>
                    </div>

                  </div>
                </div>
              </div>
            </div>
          </div>




    <script src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper-base.min.js"
    integrity="sha384-EQhgPShYZDmf+OWKvoYf70b91G/J0xgfgvbXhNfP60ZQLPv6du/0h0sU6Ygr19d0"
    crossorigin="anonymous"></script>
    <script src="{{ asset('js/table.js') }}"></script>

    <script>
       function dataTributaria(id){
        $.ajaxSetup({
        headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        $.ajax({

            url: "/admin/Informaciont",
            dataType: "json",
            type: "POST",
            data: {
                id:id,
            },
            success: function(response) {

                console.log(response.informaciont.AutorretenedorICA);
                $('#iva').append("valor de iva "+response.informaciont.AutorretenedorICA);

                $("#modalInformacionTributaria").modal("show");

            },
            error: function(response) {
                console.log(response);
            },
        });
        }
    </script>

  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
