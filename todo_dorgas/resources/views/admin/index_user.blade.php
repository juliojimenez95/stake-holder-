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
  <link rel="stylesheet" href="{{ asset('css/admin.css') }}">

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
        <div class="row">
            <div class="col-md-12">
                <div class="dv_c">
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
        <div class="row mb-4">
            <div class="col-md-12">
              <div class="text-center">
                <img src="{{ asset('images/logo_t2.png') }}" class="img-fluid">
                <h1 class="text-primary h1_tit">Usuarios registrados</h1>
                <!--<hr class="underline under_S">-->
              </div>
            </div>
        </div>
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
            <div class="card bg-light" style="padding-top: 45px; padding-bottom: 45px">
            <div class="container-fluid">
                <div class="row">
                  <div class="col-md-12">
                    <div class="table-responsive">
                    <table id="miTabla" class="table tb_cus">
                        <thead>
                          <tr>
                              <th>Nombre</th>
                              <th>NIT</th>
                              <th>PEP</th>
                              <th>Rol</th>
                              <th>Acciones</th>
                              <th>comentario</th>
                              <th>O.C</th>
                              <th>A.F</th>
                              <th>CEO</th>
                          </tr>
                        </thead>
                        <tbody>
                                  @foreach ($usuarios as $usuario)
                                  <tr>
                                      <td>{{ $usuario->name }}</td>
                                      <td>{{ $usuario->Nit }}</td>
                                      @if ( $usuario->PEP == 1)
                                      <td>Si</td>
                                      @else
                                      <td>No</td>
                                      @endif

                                      @if ( $usuario->rol == 1)
                                      <td>cliente</td>
                                      @elseif ($usuario->rol == 2)
                                      <td>proveedor</td>
                                      @else
                                      <td>administrador</td>
                                      @endif

                                      <td style="color: black" class="td_cus">
                                        <a href="#" onclick="dataPersonal({{ $usuario->id }})" {{--   data-toggle="modal" data-target="#modalInformacionTributaria" --}} style="margin-right: 15px; text-decoration: none;">
                                            <i class="fa-solid fa-user"></i>
                                        </a>
                                        <a href="#" onclick="dataTributaria({{ $usuario->id }})" {{--   data-toggle="modal" data-target="#modalInformacionTributaria" --}} style="margin-right: 15px; text-decoration: none;">
                                                <img src="{{ asset('images/Información-Tributaria.png') }}" class="navbar-brand-img" alt="main_logo" width="30" height="30">
                                        </a>
                                        <a href="#" onclick="dataFinanciera({{ $usuario->id }})" {{-- data-toggle="modal"   data-target="#modalInformacionFinanciera"  --}} style="margin-right: 15px; text-decoration: none;">
                                            <img src="{{ asset('images/Información-financiera.png') }}" class="navbar-brand-img" alt="main_logo" width="30" height="30">
                                        </a>
                                        <a href="#"  onclick="dataPagare({{ $usuario->id }})" {{-- data-toggle="modal" data-target="#modalInformacionPagare"  --}} style="margin-right: 15px; text-decoration: none;">
                                            <img src="{{ asset('images/Pagaré.png') }}" class="navbar-brand-img" alt="main_logo" width="30" height="30">
                                        </a>
                                        <br>
                                        <a href="#"  onclick="dataBancaria({{ $usuario->id }})"  {{--  data-toggle="modal" data-target="#modalInformacionBancariaLabel"--}}  style="margin-right: 15px; text-decoration: none;">
                                            <img src="{{ asset('images/Información-Bancaria.png') }}" class="navbar-brand-img" alt="main_logo" width="30" height="30">
                                        </a>

                                        <a href="#"  onclick="cargarSocios({{ $usuario->id }})"  {{--data-toggle="modal" data-target="#modalInformacionTributaria" --}}>
                                            <i class="fa-solid fa-user-group"></i>
                                        </a>

                                        <a href="{{ route('admin.pdf',$usuario->id) }}"  target="_blank"  {{--data-toggle="modal" data-target="#modalInformacionTributaria" --}}>
                                            <img src="{{ asset('images/Descargar-PDF.png') }}" class="navbar-brand-img" alt="main_logo" width="30" height="30">
                                        </a>

                                        <a href="{{ route('admin.unirpdf',$usuario->id) }}"  target="_blank"  {{--data-toggle="modal" data-target="#modalInformacionTributaria" --}}>
                                            <img src="{{ asset('images/Descargar-PDF.png') }}" class="navbar-brand-img" alt="main_logo" width="30" height="30">
                                        </a>
                                        <a href="#"  data-toggle="modal" data-target="#updateModal" data-id="{{ $usuario->id }}" {{--data-toggle="modal" data-target="#modalInformacionTributaria" --}}>
                                            <i class="fa-solid fa-comment"></i>
                                        </a>

                                    </td>

                                    <td>{{ $usuario->comentario }}</td>

                                    <td style="color: black">

                                        <form onclick="return confirm('Esta seguro ? ')"  class="d-inline" action="{{ route('users.aprobarUser', $usuario->id) }}" method="GET">
                                            @csrf
                                            @method('PUT')
                                            @if ($usuario->aprovado == 1)
                                                <button class="btn btn-success" style="border-top-left-radius: 0;border-bottom-left-radius: 0;">
                                                    <i class="fas fa-check"></i>
                                                </button>
                                            @else
                                                <button class="btn btn-check" style="border-top-left-radius: 0;border-bottom-left-radius: 0;">
                                                    <i class="fas fa-check"></i>
                                                </button>
                                            @endif

                                        </form>

                                        <form onclick="return confirm('Esta seguro ? ')"  class="d-inline" action="{{ route('users.rechazarUser', $usuario->id) }}" method="GET">
                                            @csrf
                                            @method('PUT')
                                            @if ($usuario->aprovado == 2)
                                                <button class="btn btn-danger" style="border-top-left-radius: 0;border-bottom-left-radius: 0;">
                                                    <i class="fa-solid fa-xmark"></i>

                                                </button>
                                            @else
                                                <button class="btn btn-check" style="border-top-left-radius: 0;border-bottom-left-radius: 0;">
                                                    <i class="fa-solid fa-xmark"></i>

                                                </button>
                                            @endif

                                        </form>
                                    </td>
                                    <td style="color: black">

                                        <form onclick="return confirm('Esta seguro ? ')"  class="d-inline" action="{{ route('users.aprobarUser1', $usuario->id) }}" method="GET">
                                            @csrf
                                            @method('PUT')
                                            @if ($usuario->aprovado2 == 1)
                                                <button class="btn btn-success" style="border-top-left-radius: 0;border-bottom-left-radius: 0;">
                                                    <i class="fas fa-check"></i>
                                                </button>
                                            @else
                                                <button class="btn btn-check" style="border-top-left-radius: 0;border-bottom-left-radius: 0;">
                                                    <i class="fas fa-check"></i>
                                                </button>
                                            @endif

                                        </form>

                                        <form onclick="return confirm('Esta seguro ? ')"  class="d-inline" action="{{ route('users.rechazarUser1', $usuario->id) }}" method="GET">
                                            @csrf
                                            @method('PUT')
                                            @if ($usuario->aprovado2 == 2)
                                                <button class="btn btn-danger" style="border-top-left-radius: 0;border-bottom-left-radius: 0;">
                                                    <i class="fa-solid fa-xmark"></i>

                                                </button>
                                            @else
                                                <button class="btn btn-check" style="border-top-left-radius: 0;border-bottom-left-radius: 0;">
                                                    <i class="fa-solid fa-xmark"></i>

                                                </button>
                                            @endif

                                        </form>
                                    </td>
                                    <td style="color: black">

                                        <form onclick="return confirm('Esta seguro ? ')"  class="d-inline" action="{{ route('users.aprobarUser2', $usuario->id) }}" method="GET">
                                            @csrf
                                            @method('PUT')
                                            @if ($usuario->aprovado3 == 1)
                                                <button class="btn btn-success" style="border-top-left-radius: 0;border-bottom-left-radius: 0;">
                                                    <i class="fas fa-check"></i>
                                                </button>
                                            @else
                                                <button class="btn btn-check" style="border-top-left-radius: 0;border-bottom-left-radius: 0;">
                                                    <i class="fas fa-check"></i>
                                                </button>
                                            @endif

                                        </form>

                                        <form onclick="return confirm('Esta seguro ? ')"  class="d-inline" action="{{ route('users.rechazarUser2', $usuario->id) }}" method="GET">
                                            @csrf
                                            @method('PUT')
                                            @if ($usuario->aprovado3 == 2)
                                                <button class="btn btn-danger" style="border-top-left-radius: 0;border-bottom-left-radius: 0;">
                                                    <i class="fa-solid fa-xmark"></i>

                                                </button>
                                            @else
                                                <button class="btn btn-check" style="border-top-left-radius: 0;border-bottom-left-radius: 0;">
                                                    <i class="fa-solid fa-xmark"></i>

                                                </button>
                                            @endif

                                        </form>
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
            </div>
        </div>


          <!-- Contenido de la vista modal informacion tributaria-->
          <div class="modal fade" id="modalInformacionTributaria" tabindex="-1" role="dialog" aria-labelledby="modalInformacionTributariaLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title tit_mod" id="modalInformacionTributariaLabel">Información Tributaria</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-6">
                        <p id='iva' class="p_ch"> <strong></strong></p>
                      </div>
                      <div class="col-md-6">
                        <p id='retencion' class="p_ch"><strong></strong></p>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <p id="renta" class="p_ch"> <strong></strong></p>
                      </div>
                      <div class="col-md-6">
                        <p id="rst" class="p_ch"><strong></strong></p>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <p id="Aestanpillada" class="p_ch"> <strong></strong></p>

                      </div>
                      <div class="col-md-6">
                        <p id ="estanpilla" class="p_ch"> <strong></strong></p>

                      </div>

                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <p id='auCorrector' class="p_ch"> <strong></strong></p>

                      </div>

                      <div class="col-md-6">
                        <p id="ica" class="p_ch"> <strong></strong></p>

                      </div>
                    </div>

                    <div class="row">

                        <div class="col-md-6">
                            <p id="contribuyente" class="p_ch"> <strong></strong></p>
                        </div>
                        <div class="col-md-6">
                          <p id="emailt" class="p_ch"><strong></strong></p>

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
                  <h5 class="modal-title tit_mod" id="modalInformacionFinancieraLabel">Información Financiera</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-6">
                        <p id='Activo' class="p_ch"> <strong></strong></p>
                      </div>
                      <div class="col-md-6">
                        <p id="Pasivo" class="p_ch"><strong></strong></p>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <p id="Patrimonio" class="p_ch"> <strong></strong></p>
                      </div>
                      <div class="col-md-6">
                        <p id="Ingresos" class="p_ch"><strong></strong></p>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <p id='Egresos' class="p_ch"> <strong></strong></p>
                      </div>
                      <div class="col-md-6">
                        <p id="p_vinculada" class="p_ch"> <strong></strong></p>

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
                  <h5 class="modal-title tit_mod" id="modalInformacionPagareLabel">Pagaré</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-12">
                        <p id="pagare" class="p_ch"> <strong></strong></p>
                      </div>
                      <div class="col-md-12">
                        <p id= "documento" class="p_ch"><strong></strong></p>
                      </div>
                    </div>

                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Contenido de la vista modal  Pagare-->
          <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="updateModalLabel">Actualizar Comentario</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form  action="{{ route('admin.comentario', ':id') }}">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="comentario">Comentario:</label>
                                <textarea class="form-control" id="comentario" name="comentario" rows="3"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Actualizar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>


          <!-- Contenido de la vista modal  no informacion-->
          <div class="modal fade" id="modalInformacionNo" tabindex="-1" role="dialog" aria-labelledby="modalInformacionNoLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title tit_mod" id="modalInformacionNoLabel">Alerta</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-12">
                        <p> <strong>No hay información registrada aún</strong></p>
                      </div>

                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Contenido de la vista modal informacion Bancaria-->
          <div class="modal fade" id="modalInformacionBancaria" tabindex="-1" role="dialog" aria-labelledby="modalInformacionBancariaLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title tit_mod" id="modalInformacionBancariaLabel">Información Bancaria</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-6">
                        <p id="banco1" class="p_ch"> <strong></strong></p>
                      </div>
                      <div class="col-md-6">
                        <p id="Tipo1" class="p_ch"><strong></strong></p>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <p id="n_cuenta1" class="p_ch"> <strong></strong></p>
                      </div>
                      <div class="col-md-6">
                        <p id="Cuidad1" class="p_ch"><strong></strong></p>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <p id="Departamento1" class="p_ch"><strong></strong></p>
                      </div>
                      <div class="col-md-6">
                        <p id="pais1" class="p_ch"> <strong></strong></p>

                      </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                          <p id="banco2" class="p_ch"> <strong></strong></p>
                        </div>
                        <div class="col-md-6">
                          <p id="Tipo2" class="p_ch"><strong></strong></p>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <p id="n_cuenta2" class="p_ch"> <strong></strong></p>
                        </div>
                        <div class="col-md-6">
                          <p id="Cuidad2" class="p_ch"><strong></strong></p>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <p id="Departamento2" class="p_ch"><strong></strong></p>
                        </div>
                        <div class="col-md-6">
                          <p id="pais2" class="p_ch"> <strong></strong></p>

                        </div>
                      </div>

                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Contenido de la vista modal informacion Socios-->
          <div class="modal fade" id="modalInformacionSocios" tabindex="-1" role="dialog" aria-labelledby="modalInformacionSociosLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title tit_mod" id="modalInformacionSociosLabel">Información Socios o Accionistas</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <table id="tablaSocios" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th class="th_cus">Nombre</th>
                                        <th class="th_cus">Participación</th>
                                        <th class="th_cus">Nacionalidad</th>
                                        <th class="th_cus">PEP</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>

                  </div>
                </div>
              </div>
            </div>
          </div>

<!-- Contenido de la vista modal informacion Personal-->
<div class="modal fade" id="modalInformacionPersonal" tabindex="-1" role="dialog" aria-labelledby="modalInformacionPersonalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title tit_mod" id="modalInformacionPersonalLabel">Información Personal</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <p id="Tipodocumento" class="p_ch"> <strong></strong></p>
              </div>
              <div class="col-md-6">
                <p id="n_documento" class="p_ch"><strong></strong></p>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <p id="nombres_a" class="p_ch"> <strong></strong></p>
              </div>
              <div class="col-md-6">
                <p id="Departamento_p" class="p_ch"><strong></strong></p>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <p id="cuidad_p" class="p_ch"><strong></strong></p>
              </div>
              <div class="col-md-6">
                <p id="telefono_p" class="p_ch"> <strong></strong></p>

              </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                  <p id="direccion_p" class="p_ch"> <strong></strong></p>
                </div>
                <div class="col-md-6">
                  <p id="Actividad_e" class="p_ch"><strong></strong></p>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <h5 class="tit_mod" >Información Representante Legal</h5>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6">
                  <p id="TR" class="p_ch"><strong></strong></p>
                </div>
                <div class="col-md-6">
                  <p id="DR" class="p_ch"> <strong></strong></p>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6">
                  <p id="NR" class="p_ch"><strong></strong></p>
                </div>
                <div class="col-md-6">
                    <p id="TeR" class="p_ch"><strong></strong></p>
                  </div>
              </div>

              <div class="row">
                <div class="col-md-6">
                  <p id="CR" class="p_ch"><strong></strong></p>
                </div>
                <div class="col-md-6">
                  <p id="ER" class="p_ch"> <strong></strong></p>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6">
                  <p id="Rp" class="p_ch"><strong></strong></p>
                </div>
                <div class="col-md-6">
                  <p id="Rpp" class="p_ch"> <strong></strong></p>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6">
                  <p id="RRp" class="p_ch"><strong></strong></p>
                </div>
                <div class="col-md-6">
                  <p id="Pe" class="p_ch"> <strong></strong></p>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6">
                  <p id="Ot" class="p_ch"><strong></strong></p>
                </div>
                <div class="col-md-6">
                  <p id="oi" class="p_ch"> <strong></strong></p>
                </div>
              </div>

              <div class="row">
                <div class="col-md-12">
                  <p id="Os" class="p_ch"><strong></strong></p>
                </div>
              </div>

              <div class="row">
                <div class="col-md-12">
                  <h5 class="tit_mod"> Información de  Contacto</h5>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <p id="TDC" class="p_ch"><strong></strong></p>
                </div>
                <div class="col-md-6">
                  <p id="NDC" class="p_ch"> <strong></strong></p>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <p id="NC" class="p_ch"><strong></strong></p>
                </div>
                <div class="col-md-6">
                    <p id="TC" class="p_ch"><strong></strong></p>
                  </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <p id="CC" class="p_ch"><strong></strong></p>
                </div>
                <div class="col-md-6">
                  <p id="EC" class="p_ch"> <strong></strong></p>
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
        function dataPersonal(id){
    $.ajaxSetup({
    headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    $.ajax({

        url: "/admin/InformacionP",
        dataType: "json",
        type: "POST",
        data: {
            id:id,
        },
        success: function(response) {
            console.log(response);
        if (response.user.rol == 1) {

        if (response.cliente.Natural == 1) {

            $('#Tipodocumento').empty();
            $('#n_documento').empty();
            $('#nombres_a').empty();
            $('#Departamento_p').empty();
            $('#cuidad_p').empty();
            $('#telefono_p').empty();
            $('#direccion_p').empty();
            $('#Actividad_e').empty();
            $('#TR').empty();
            $('#DR').empty();
            $('#NR').empty();
            $('#TeR').empty();
            $('#CR').empty();
            $('#ER').empty();
            $('#Rp').empty();
            $('#Rpp').empty();
            $('#RRp').empty();
            $('#Pe').empty();
            $('#Ot').empty();
            $('#oi').empty();
            $('#Os').empty();

            $('#NDC').empty();
            $('#NC').empty();
            $('#CC').empty();
            $('#EC').empty();
            $('#TC').empty();

            $('#Tipodocumento').append("Tipo documento: "+"<span>"+response.cliente.TipoNit+"</span>");
            $('#n_documento').append("Número documento: "+"<span>"+response.cliente.Nit+"</span>");
            $('#nombres_a').append("Nombre: "+"<span>"+response.cliente.Nombre+"</span>");
            $('#Departamento_p').append("Departamento: "+"<span>"+response.domicilio.Departamento+"</span>");
            $('#cuidad_p').append("Cuidad: "+"<span>"+response.domicilio.Ciudad+"</span>");
            $('#telefono_p').append("Teléfono: "+"<span>"+response.domicilio.Telefono+"</span>");
            $('#direccion_p').append("Dirección: "+"<span>"+response.domicilio.Direccion+"</span>");
            $('#Actividad_e').append("Código CIIU: "+"<span>"+response.cliente.ActividadEconomica+"</span>");

            $('#TR').append("Tipo documento: "+"<span>"+response.representante.TipoNit+"</span>");
            $('#DR').append("Número documento: "+"<span>"+response.representante.Nit+"</span>");
            $('#NR').append("Nombre: "+"<span>"+response.representante.Nombre1+"</span>");
            $('#TeR').append("Teléfono: "+"<span>"+response.representante.Telefono+"</span>");
            $('#CR').append("Cargo: "+"<span>"+response.representante.Cargo+"</span>");
            $('#ER').append("Email: "+"<span>"+response.representante.Email+"</span>");
            $('#Rp').append("Manejo recursos públicos: "+"<span>"+response.representante.ManejoRP+"</span>");
            $('#Rpp').append("Poder político o público: "+"<span>"+response.representante.EjercidoPPOP+"</span>");

            $('#RRp').append("Reconocimiento político o público: "+"<span>"+response.representante.Reconocimiento+"</span>");
            $('#Pe').append("Vínculo con la persona expuesta: "+"<span>"+response.representante.VincuPExpuesta+"</span>");
            $('#Ot').append("Tributa en otro país: "+"<span>"+response.representante.ObligacionTE+"</span>");
            $('#oi').append("Tiene funciones en una O.I: "+"<span>"+response.representante.OrganizacionI+"</span>");
            $('#Os').append("Obligada a tener un programa SAGRILAFT: "+"<span>"+response.representante.ObligacionP+"</span>");

            $('#TDC').append("Tipo documento: "+"<span>"+response.contacto.TipoNit+"</span>");
            $('#NDC').append("Número de documento: "+"<span>"+response.contacto.Nit+"</span>");
            $('#NC').append("Nombre: "+"<span>"+response.contacto.Cargo+"</span>");
            $('#CC').append("Cargo: "+"<span>"+response.contacto.Cargo+"</span>");
            $('#EC').append("Email: "+"<span>"+response.contacto.Email+"</span>");
            $('#TC').append("Teléfono: "+"<span>"+response.contacto.Telefono+"</span>");


            $("#modalInformacionPersonal").modal("show");

        }else{

            $('#Tipodocumento').empty();
            $('#n_documento').empty();
            $('#nombres_a').empty();
            $('#Departamento_p').empty();
            $('#cuidad_p').empty();
            $('#telefono_p').empty();
            $('#direccion_p').empty();
            $('#Actividad_e').empty();
            $('#TR').empty();
            $('#DR').empty();
            $('#NR').empty();
            $('#TeR').empty();
            $('#CR').empty();
            $('#ER').empty();
            $('#Rp').empty();
            $('#Rpp').empty();
            $('#RRp').empty();
            $('#Pe').empty();
            $('#Ot').empty();
            $('#oi').empty();
            $('#Os').empty();

            $('#NDC').empty();
            $('#NC').empty();
            $('#CC').empty();
            $('#EC').empty();
            $('#TC').empty();

            $('#Tipodocumento').append("Tipo documento: "+"<span>"+response.cliente.TipoNit+"</span>");
            $('#n_documento').append("Número documento: "+"<span>"+response.cliente.Nit+"</span>");
            $('#nombres_a').append("Nombre: "+"<span>"+response.cliente.Nombre+"</span>");
            $('#Departamento_p').append("Departamento: "+"<span>"+response.domicilio.Departamento+"</span>");
            $('#cuidad_p').append("Cuidad: "+"<span>"+response.domicilio.Ciudad+"</span>");
            $('#telefono_p').append("Teléfono: "+"<span>"+response.domicilio.Telefono+"</span>");
            $('#direccion_p').append("Dirección: "+"<span>"+response.domicilio.Direccion+"</span>");
            $('#Actividad_e').append("Código CIIU: "+"<span>"+response.cliente.ActividadEconomica+"</span>");

            $('#TR').append("Tipo documento: "+"<span>"+response.representante.TipoNit+"</span>");
            $('#DR').append("Número documento: "+"<span>"+response.representante.Nit+"</span>");
            $('#NR').append("Nombre: "+"<span>"+response.representante.Nombre1+"</span>");
            $('#TeR').append("Teléfono: "+"<span>"+response.representante.Telefono+"</span>");
            $('#CR').append("Cargo: "+"<span>"+response.representante.Cargo+"</span>");
            $('#ER').append("Email: "+"<span>"+response.representante.Email+"</span>");
            $('#Rp').append("Manejo recursos públicos: "+"<span>"+response.representante.ManejoRP+"</span>");
            $('#Rpp').append("Poder político o público: "+"<span>"+response.representante.EjercidoPPOP+"</span>");

            $('#RRp').append("Reconocimiento político o público: "+"<span>"+response.representante.Reconocimiento+"</span>");
            $('#Pe').append("Vínculo con la persona expuesta: "+"<span>"+response.representante.VincuPExpuesta+"</span>");
            $('#Ot').append("Tributa en otro país: "+"<span>"+response.representante.ObligacionTE+"</span>");
            $('#oi').append("Tiene funciones en una O.I: "+"<span>"+response.representante.OrganizacionI+"</span>");
            $('#Os').append("Obligada a tener un programa SAGRILAFT: "+"<span>"+response.representante.ObligacionP+"</span>");

            $('#TDC').append("Tipo documento: "+"<span>"+response.contacto.TipoNit+"</span>");
            $('#NDC').append("Número de documento: "+"<span>"+response.contacto.Nit+"</span>");
            $('#NC').append("Nombre: "+"<span>"+response.contacto.Cargo+"</span>");
            $('#CC').append("Cargo: "+"<span>"+response.contacto.Cargo+"</span>");
            $('#EC').append("Email: "+"<span>"+response.contacto.Email+"</span>");
            $('#TC').append("Teléfono: "+"<span>"+response.contacto.Telefono+"</span>");


            $("#modalInformacionPersonal").modal("show");
            }


        }

        if (response.user.rol == 2) {

            if (response.Proveedor.Juridico == 1) {

                $('#Tipodocumento').empty();
                $('#n_documento').empty();
                $('#nombres_a').empty();
                $('#Departamento_p').empty();
                $('#cuidad_p').empty();
                $('#telefono_p').empty();
                $('#direccion_p').empty();
                $('#Actividad_e').empty();
                $('#TR').empty();
                $('#DR').empty();
                $('#NR').empty();
                $('#TeR').empty();
                $('#CR').empty();
                $('#ER').empty();
                $('#Rp').empty();
                $('#Rpp').empty();
                $('#RRp').empty();
                $('#Pe').empty();
                $('#Ot').empty();
                $('#oi').empty();
                $('#Os').empty();

                $('#NDC').empty();
                $('#NC').empty();
                $('#CC').empty();
                $('#EC').empty();
                $('#TC').empty();

                $('#Tipodocumento').append("Tipo documento: "+"<span>"+response.Proveedor.TipoNit+"</span>");
                $('#n_documento').append("Número documento: "+"<span>"+response.Proveedor.Nit+"</span>");
                $('#nombres_a').append("Nombre: "+"<span>"+response.Proveedor.Nombre+"</span>");
                $('#Departamento_p').append("Departamento: "+"<span>"+response.Proveedor.Departamento+"</span>");
                $('#cuidad_p').append("Cuidad: "+"<span>"+response.Proveedor.Ciudad+"</span>");
                $('#telefono_p').append("Teléfono: "+"<span>"+response.Proveedor.Telefono+"</span>");
                $('#direccion_p').append("Dirección: "+"<span>"+response.Proveedor.Direccion+"</span>");
                $('#Actividad_e').append("Código CIIU: "+"<span>"+response.Proveedor.ActividadEconomica+"</span>");

                $('#TR').append("Tipo documento: "+"<span>"+response.representante.TipoNit+"</span>");
                $('#DR').append("Número documento: "+"<span>"+response.representante.Nit+"</span>");
                $('#NR').append("Nombre: "+"<span>"+response.representante.Nombre1+"</span>");
                $('#TeR').append("Teléfono: "+"<span>"+response.representante.Telefono+"</span>");
                $('#CR').append("Cargo: "+"<span>"+response.representante.Cargo+"</span>");
                $('#ER').append("Email: "+"<span>"+response.representante.Email+"</span>");
                $('#Rp').append("Manejo recursos públicos: "+"<span>"+response.representante.ManejoRP+"</span>");
                $('#Rpp').append("Poder político o público: "+"<span>"+response.representante.EjercidoPPOP+"</span>");

                $('#RRp').append("Reconocimiento político o público: "+"<span>"+response.representante.Reconocimiento+"</span>");
                $('#Pe').append("Vínculo con la persona expuesta: "+"<span>"+response.representante.VincuPExpuesta+"</span>");
                $('#Ot').append("Tributa en otro país: "+"<span>"+response.representante.ObligacionTE+"</span>");
                $('#oi').append("Tiene funciones en una O.I: "+"<span>"+response.representante.OrganizacionI+"</span>");
                $('#Os').append("Obligada a tener un programa SAGRILAFT: "+"<span>"+response.representante.ObligacionP+"</span>");

                $('#TDC').append("Tipo documento: "+"<span>"+response.contacto.TipoNit+"</span>");
                $('#NDC').append("Número de documento: "+"<span>"+response.contacto.Nit+"</span>");
                $('#NC').append("Nombre: "+"<span>"+response.contacto.Cargo+"</span>");
                $('#CC').append("Cargo: "+"<span>"+response.contacto.Cargo+"</span>");
                $('#EC').append("Email: "+"<span>"+response.contacto.Email+"</span>");
                $('#TC').append("Teléfono: "+"<span>"+response.contacto.Telefono+"</span>");


                $("#modalInformacionPersonal").modal("show");

            }else{

                $('#Tipodocumento').empty();
                $('#n_documento').empty();
                $('#nombres_a').empty();
                $('#Departamento_p').empty();
                $('#cuidad_p').empty();
                $('#telefono_p').empty();
                $('#direccion_p').empty();
                $('#Actividad_e').empty();
                $('#TR').empty();
                $('#DR').empty();
                $('#NR').empty();
                $('#TeR').empty();
                $('#CR').empty();
                $('#ER').empty();
                $('#Rp').empty();
                $('#Rpp').empty();
                $('#RRp').empty();
                $('#Pe').empty();
                $('#Ot').empty();
                $('#oi').empty();
                $('#Os').empty();

                $('#NDC').empty();
                $('#NC').empty();
                $('#CC').empty();
                $('#EC').empty();
                $('#TC').empty();

                $('#Tipodocumento').append("Tipo documento: "+"<span>"+response.Proveedor.TipoNit+"</span>");
                $('#n_documento').append("Número documento: "+"<span>"+response.Proveedor.Nit+"</span>");
                $('#nombres_a').append("Nombre: "+"<span>"+response.Proveedor.Nombre+"</span>");
                $('#Departamento_p').append("Departamento: "+"<span>"+response.Proveedor.Departamento+"</span>");
                $('#cuidad_p').append("Cuidad: "+"<span>"+response.Proveedor.Ciudad+"</span>");
                $('#telefono_p').append("Teléfono: "+"<span>"+response.Proveedor.Telefono+"</span>");
                $('#direccion_p').append("Dirección: "+"<span>"+response.Proveedor.Direccion+"</span>");
                $('#Actividad_e').append("Código CIIU: "+"<span>"+response.Proveedor.ActividadEconomica+"</span>");

                $('#TR').append("Tipo documento: "+"<span>"+response.representante.TipoNit+"</span>");
                $('#DR').append("Número documento: "+"<span>"+response.representante.Nit+"</span>");
                $('#NR').append("Nombre: "+"<span>"+response.representante.Nombre1+"</span>");
                $('#TeR').append("Teléfono: "+"<span>"+response.representante.Telefono+"</span>");
                $('#CR').append("Cargo: "+"<span>"+response.representante.Cargo+"</span>");
                $('#ER').append("Email: "+"<span>"+response.representante.Email+"</span>");
                $('#Rp').append("Manejo recursos públicos: "+"<span>"+response.representante.ManejoRP+"</span>");
                $('#Rpp').append("Poder político o público: "+"<span>"+response.representante.EjercidoPPOP+"</span>");

                $('#RRp').append("Reconocimiento político o público: "+"<span>"+response.representante.Reconocimiento+"</span>");
                $('#Pe').append("Vínculo con la persona expuesta: "+"<span>"+response.representante.VincuPExpuesta+"</span>");
                $('#Ot').append("Tributa en otro país: "+"<span>"+response.representante.ObligacionTE+"</span>");
                $('#oi').append("Tiene funciones en una O.I: "+"<span>"+response.representante.OrganizacionI+"</span>");
                $('#Os').append("Obligada a tener un programa SAGRILAFT: "+"<span>"+response.representante.ObligacionP+"</span>");

                $('#TDC').append("Tipo documento: "+"<span>"+response.contacto.TipoNit+"</span>");
                $('#NDC').append("Número de documento: "+"<span>"+response.contacto.Nit+"</span>");
                $('#NC').append("Nombre: "+"<span>"+response.contacto.Cargo+"</span>");
                $('#CC').append("Cargo: "+"<span>"+response.contacto.Cargo+"</span>");
                $('#EC').append("Email: "+"<span>"+response.contacto.Email+"</span>");
                $('#TC').append("Teléfono: "+"<span>"+response.contacto.Telefono+"</span>");


                $("#modalInformacionPersonal").modal("show");
                }


            }

        },
        error: function(response) {
            console.log(response);
        },
    });
    }

     </script>

    <script>

    function cargarSocios(id) {
            $.ajaxSetup({
            headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
            });
            $.ajax({
                url: '{{ route("admin.Informacionsocios") }}',
                type: 'POST',
                dataType: 'json',
                data: {
                    id:id,
                    },
                success: function(response) {
                    var socios = response.socios;

                    // Limpia la tabla
                    $('#tablaSocios tbody').empty();

                    // Llena la tabla con los datos de los socios
                    socios.forEach(function(socio) {
                        var row = '<tr>' +
                            '<td>' + socio.Nombres + '</td>' +
                            '<td>' + socio.Participacion + '</td>' +
                            '<td>' + socio.Nacionalidad + '</td>' +
                            '<td>' + socio.PEP + '</td>' +
                            '</tr>';
                        $('#tablaSocios tbody').append(row);

                    });

                    $("#modalInformacionSocios").modal("show");
                },
                error: function(xhr, status, error) {
                    console.log(error);
                }
            });
        }
    </script>

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

                $('#iva').empty();
                $('#retencion').empty();
                $('#renta').empty();
                $('#rst').empty();
                $('#Aestanpillada').empty();
                $('#estanpilla').empty();
                $('#contribuyente').empty();
                $('#auCorrector').empty();
                $('#ica').empty();
                $('#emailt').empty();


                $('#iva').append("¿Es usted responsable del impuesto a la venta I.V.A.? "+"<span>"+response.informaciont.ResponsableImpuesto+"</span>");
                $('#retencion').append("¿Está usted sujeto a retención? "+"<span>"+response.informaciont.SujetoRetencion+"</span>");
                $('#renta').append("¿Está usted obligado a Declarar Renta? "+"<span>"+response.informaciont.Declarar+"</span>");
                $('#rst').append("¿Es usted R.S.T. Régimen Simple de Tributación? "+"<span>"+response.informaciont.RST+"</span>");
                $('#Aestanpillada').append("¿Usted aplica estampillas? "+"<span>"+response.informaciont.Estampillas+"</span>");
                $('#estanpilla').append("¿Cuáles estampillas aplica? "+"<span>"+response.informaciont.Observacion1+"</span>");
                $('#contribuyente').append("¿Es usted Gran Contribuyente? "+"<span>"+response.informaciont.GContribuyente+"</span>");
                $('#auCorrector').append("¿Es usted Autorretenedor en la Fuente? "+"<span>"+response.informaciont.AutorretenedorF+"</span>");
                $('#ica').append("¿Es usted Autorretenedor de ICA? "+"<span>"+response.informaciont.AutorretenedorICA+"</span>");
                $('#emailt').append("¿Cuál es el correo de recepción para Factura Electrónica? "+"<span>"+response.informaciont.Email+"</span>");

                $("#modalInformacionTributaria").modal("show");

            },
            error: function(response) {
                console.log(response);
            },
        });
        }
    </script>

<script>
    function dataFinanciera(id){
     $.ajaxSetup({
     headers: {
             "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
         },
     });
     $.ajax({

         url: "/admin/Informacionf",
         dataType: "json",
         type: "POST",
         data: {
             id:id,
         },
         success: function(response) {
             console.log(id);
             console.log(response.informacionf);
             $('#Activo').empty();
             $('#Pasivo').empty();
             $('#Patrimonio').empty();
             $('#Ingresos').empty();
             $('#Egresos').empty();
             $('#p_vinculada').empty();

             $('#Activo').append("Activo Totales: $"+response.informacionf.Activo);
             $('#Pasivo').append("Pasivo Totales: $"+response.informacionf.Pasivo);
             $('#Patrimonio').append("Patrimonio : $"+response.informacionf.Patrimonio);
             $('#Ingresos').append("Ingresos Totales: $"+response.informacionf.IngresosTotales);
             $('#Egresos').append("Egresos Totales: $"+response.informacionf.EgresosTotales);
             $('#p_vinculada').append("Personal con vinculación directa: "+response.informacionf.CantidadPersonas);



             $("#modalInformacionFinanciera").modal("show");

         },
         error: function(response) {
             console.log(response);
         },
     });
     }
 </script>

<script>
    function dataPagare(id){
     $.ajaxSetup({
     headers: {
             "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
         },
     });
     $.ajax({

         url: "/admin/pagare",
         dataType: "json",
         type: "POST",
         data: {
             id:id,
         },
         success: function(response) {

             console.log(response.pagare.pagare);
             $('#pagare').empty();
             $('#documento').empty();


             if (response.pagare.pagare == 0) {
                $('#pagare').append("¿Aplica para ventas a crédito?: no");
                } else if (response.pagare.pagare == 1) {
                $('#pagare').append("¿Aplica para ventas a crédito? : si");
                }

             $('#documento').append('<a class="btn btn-primary mt-3 a_cus btn_cus" id="descarga" data-file="' + response.pagare.archivo + '">Descargar Pagaré</a><span></span>');
             $("#modalInformacionPagare").modal("show");

             const button = document.querySelector('#descarga');
                    button.addEventListener('click', function() {
                        // Obtener el archivo PDF correspondiente
                        const filename = this.getAttribute('data-file');

                        // Descargar el archivo
                        window.location.href = '/descargar-pdf/' + filename;
                    });

         },
         error: function(response) {
             console.log(response);
         },
     });
     }
 </script>

<script>
    function dataBancaria(id){
     $.ajaxSetup({
     headers: {
             "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
         },
     });
     $.ajax({

         url: "/admin/Informacionb",
         dataType: "json",
         type: "POST",
         data: {
             id:id,
         },
         success: function(response) {

             console.log(response.informacionb.Banco);
             $('#banco1').empty();
             $('#Tipo1').empty();
             $('#n_cuenta1').empty();
             $('#Cuidad1').empty();
             $('#Departamento1').empty();
             $('#pais1').empty();

             $('#banco2').empty();
             $('#Tipo2').empty();
             $('#n_cuenta2').empty();
             $('#Cuidad2').empty();
             $('#Departamento2').empty();
             $('#pais2').empty();

             $('#banco1').append("Banco : "+response.informacionb.Banco);
             $('#Tipo1').append("Tipo cuenta : "+response.informacionb.TipoCuenta);
             $('#n_cuenta1').append("Número cuenta: "+response.informacionb.Cuenta);
             $('#Cuidad1').append("Cuidad: "+response.informacionb.Ciudad);
             $('#Departamento1').append("Departamento: "+response.informacionb.Departamento);
             $('#pais1').append("País: "+response.informacionb.Pais);

             $('#banco2').append("Banco 2: "+response.informacionb.Banco2);
             $('#Tipo2').append("Tipo cuenta 2: "+response.informacionb.TipoCuenta2);
             $('#n_cuenta2').append("Número cuenta 2: "+response.informacionb.Cuenta2);
             $('#Cuidad2').append("Cuidad 2: "+response.informacionb.Ciudad2);
             $('#Departamento2').append("Departamento 2: "+response.informacionb.Departamento2);
             $('#pais2').append("País 2: "+response.informacionb.Pais2);



             $("#modalInformacionBancaria").modal("show");

         },
         error: function(response) {
             console.log(response);
         },
     });
     }
 </script>
 <script>
    $('#updateModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget); // Botón que abre la modal
        var id = button.data('id'); // Obtiene el ID del atributo data-id

        // Asigna el valor del ID al atributo "action" del formulario
        var form = $(this).find('form');
        var action = form.attr('action');
        action = action.replace(':id', id);
        form.attr('action', action);
    });
</script>



  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
