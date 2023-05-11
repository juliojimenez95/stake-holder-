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
                              <th>¿PEP?</th>
                              <th>rol</th>
                              <th>Acciones</th>


                          </tr>
                        </thead>
                        <tbody>
                                  @foreach ($usuarios as $usuario)
                                  <tr>
                                      <td>{{ $usuario->name }}</td>
                                      <td>{{ $usuario->email }}</td>
                                      @if ( $usuario->PEP == 1)
                                      <td>Si</td>
                                      @else
                                      <td>No</td>
                                      @endif
                                      @if ( $usuario->rol == 2)
                                      <td>Proveedor</td>
                                      @else
                                      <td> Cliente </td>
                                      @endif

                                      <td style="color: black">
                                        <a href="#" onclick="dataTributaria({{ 98 }})" {{--   data-toggle="modal" data-target="#modalInformacionTributaria" --}} style="margin-right: 20px; text-decoration: none;">
                                                <img src="{{ asset('images/Información-Tributaria.png') }}" class="navbar-brand-img" alt="main_logo" width="60" height="40">
                                        </a>
                                        <a href="#" onclick="dataFinanciera({{ $usuario->id }})" {{-- data-toggle="modal"   data-target="#modalInformacionFinanciera"  --}} style="margin-right: 20px; text-decoration: none;">
                                            <img src="{{ asset('images/Información-financiera.png') }}" class="navbar-brand-img" alt="main_logo" width="60" height="40">
                                        </a>
                                        <a href="#"  onclick="dataPagare({{ $usuario->id }})" {{-- data-toggle="modal" data-target="#modalInformacionPagare"  --}} style="margin-right: 20px; text-decoration: none;">
                                            <img src="{{ asset('images/Pagaré.png') }}" class="navbar-brand-img" alt="main_logo" width="60" height="40">
                                        </a>

                                        <a href="#"  onclick="dataBancaria({{ 98 }})"  {{--  data-toggle="modal" data-target="#modalInformacionBancariaLabel"--}}  style="margin-right: 20px; text-decoration: none;">
                                            <img src="{{ asset('images/Información-Bancaria.png') }}" class="navbar-brand-img" alt="main_logo" width="60" height="40">
                                        </a>

                                        <a href=""  onclick="datauser({{ 98 }})"  {{--data-toggle="modal" data-target="#modalInformacionTributaria" --}}>
                                            <i class="fa-solid fa-user"></i>
                                        </a>
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
                        <p id='retencion'><strong></strong></p>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <p id="renta"> <strong></strong></p>
                      </div>
                      <div class="col-md-6">
                        <p id="rst"><strong></strong></p>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <p id="Aestanpillada"> <strong></strong></p>
                        @if ('Si' === 'Si')
                        <p id ="estanpilla"> <strong></strong></p>
                        @endif
                      </div>
                      <div class="col-md-6">
                        <p id=" contribuyente"> <strong></strong></p>

                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <p id='auCorrector'> <strong></strong></p>

                      </div>

                      <div class="col-md-6">
                        <p id="ica"> <strong></strong></p>

                      </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                          <p id="emailt"><strong></strong></p>

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
                        <p id='Activo'> <strong></strong></p>
                      </div>
                      <div class="col-md-6">
                        <p id="Pasivo"><strong></strong></p>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <p id="Patrimonio"> <strong></strong></p>
                      </div>
                      <div class="col-md-6">
                        <p id="Ingresos"><strong></strong></p>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <p id='Egresos'> <strong></strong></p>
                      </div>
                      <div class="col-md-6">
                        <p id="p_vinculada"> <strong></strong></p>

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
                        <p id="pagare"> <strong></strong></p>
                      </div>
                      <div class="col-md-6">
                        <p id= "documento"><strong></strong></p>
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
                        <p id="banco1"> <strong></strong></p>
                      </div>
                      <div class="col-md-6">
                        <p id="Tipo1"><strong></strong></p>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <p id="n_cuenta1"> <strong></strong></p>
                      </div>
                      <div class="col-md-6">
                        <p id="Cuidad1"><strong></strong></p>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <p id="Departamento1"><strong></strong></p>
                      </div>
                      <div class="col-md-6">
                        <p id="pais1"> <strong></strong></p>

                      </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                          <p id="banco2"> <strong></strong></p>
                        </div>
                        <div class="col-md-6">
                          <p id="Tipo2"><strong></strong></p>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <p id="n_cuenta2"> <strong></strong></p>
                        </div>
                        <div class="col-md-6">
                          <p id="Cuidad2"><strong></strong></p>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <p id="Departamento2"><strong></strong></p>
                        </div>
                        <div class="col-md-6">
                          <p id="pais2"> <strong></strong></p>

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


                $('#iva').append("valor de iva "+response.informaciont.ResponsableImpuesto);
                $('#retencion').append("¿Está sujeto a retención? "+response.informaciont.SujetoRetencion);
                $('#renta').append("¿Está obligado a declarar renta? "+response.informaciont.Declarar);
                $('#rst').append("¿Está en el RST (Régimen Simple de Tributación)? "+response.informaciont.RST);
                $('#Aestanpillada').append("¿Aplica estampillas? "+response.informaciont.Estampillas);
                $('#estanpilla').append("Estampillas: "+response.informaciont.Observacion1);
                $('#contribuyente').append("¿Es gran contribuyente? "+response.informaciont.GContribuyente);
                $('#auCorrector').append("¿Es autorretenedor en la fuente? "+response.informaciont.AutorretenedorF);
                $('#ica').append("Autorretenedor ICA: "+response.informaciont.AutorretenedorICA);
                $('#emailt').append("Email"+response.informaciont.Email);

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

             $('#Activo').append("Activo: "+response.informacionf.Activo);
             $('#Pasivo').append("Pasivo: "+response.informacionf.Pasivo);
             $('#Patrimonio').append("Patrimonio: "+response.informacionf.Patrimonio);
             $('#Ingresos').append("Ingresos: "+response.informacionf.IngresosTotales);
             $('#Egresos').append("Egresos: "+response.informacionf.EgresosTotales);
             $('#p_vinculada').append("Personas vinculadas: "+response.informacionf.CantidadPersonas);




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
                $('#pagare').append("¿ aplica para ventas a credito?: no");
                } else if (response.pagare.pagare == 1) {
                $('#pagare').append("¿ aplica para ventas a credito?: si");
                }

             $('#documento').append('<a class="btn btn-primary mt-3 a_cus" id="descarga" data-file="' + response.pagare.archivo + '">Descargar</a><span></span>');
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
             $('#n_cuenta1').append("Numero cuenta: "+response.informacionb.Cuenta);
             $('#Cuidad1').append("Cuidad: "+response.informacionb.Ciudad);
             $('#Departamento1').append("Departamento: "+response.informacionb.Departamento);
             $('#pais1').append("Pais: "+response.informacionb.Pais);

             $('#banco2').append("Banco 2: "+response.informacionb.Banco2);
             $('#Tipo2').append("Tipo cuenta 2: "+response.informacionb.TipoCuenta2);
             $('#n_cuenta2').append("Numero cuenta 2: "+response.informacionb.Cuenta2);
             $('#Cuidad2').append("Cuidad 2: "+response.informacionb.Ciudad2);
             $('#Departamento2').append("Departamento 2: "+response.informacionb.Departamento2);
             $('#pais2').append("Pais 2: "+response.informacionb.Pais2);



             $("#modalInformacionBancaria").modal("show");

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