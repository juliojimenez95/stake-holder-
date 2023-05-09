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
                              <th>Telefono</th>
                              <th>rol</th>
                              <th>Acciones</th>


                          </tr>
                        </thead>
                        <tbody>
                                  @foreach ($usuarios as $usuario)
                                  <tr>
                                      <td>{{ $usuario->name }}</td>
                                      <td>{{ $usuario->email }}</td>
                                      <td>{{ 45353453 }}</td>
                                      <th>rol</th>
                                      <th>Acciones</th>

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



    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper-base.min.js"
    integrity="sha384-EQhgPShYZDmf+OWKvoYf70b91G/J0xgfgvbXhNfP60ZQLPv6du/0h0sU6Ygr19d0"
    crossorigin="anonymous"></script>
    <script src="{{ asset('js/table.js') }}"></script>

  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
