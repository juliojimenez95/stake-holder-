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
  <link rel="stylesheet" href="{{ asset('css/bancaria.css') }}">
  <script  src="https://code.jquery.com/jquery-3.6.3.js"
            integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM="
            crossorigin="anonymous"></script>

    <link href="https://www.dafontfree.net/embed/ZnJhbmtsaW4tZ290aGljLWJvb2stcmVndWxhciZkYXRhLzMyL2YvMTU0MjI1L0ZyYW5rbGluIEdvdGhpYyBCb29rIFJlZ3VsYXIudHRm" rel="stylesheet" type="text/css"/>
    <link href="https://allfont.net/allfont.css?fonts=franklin-gothic-medium" rel="stylesheet" type="text/css" />
    <link href="https://www.dafontfree.net/embed/ZnJhbmtsaW4tZ290aGljLW1lZGl1bS1jb25kLXJlZ3VsYXImZGF0YS8zMi9mLzE1NDEzMC9GcmFua2xpbiBHb3RoaWMgTWVkaXVtIENvbmQgUmVndWxhci50dGY" rel="stylesheet" type="text/css"/>
</head>
<body>
  <div class="container-fluid">
    <div class="row mb-4">
      <div class="col-md-12">
        <div class="text-center">
          <img src="{{ asset('images/logo_t2.png') }}" class="my-4 img-fluid">
          <h1 class="text-primary h1_tit">Información Bancaria</h1>
          <hr class="underline under_S">
        </div>
      </div>
    </div>
    <div class="card bg-light" style="padding-top: 45px;">
    <div class="container">
      <form action="{{ route('clientes.storeInformacionb',$id) }}" method="POST">
            @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="mb-4">
                    <button class="btn btn-primary btn_1">Banco 1</button>
                </div>
                <div class="row">

                    <div class="col-md-6">
                        <div>
                            <p class="title-ent">Nombre de la Entidad Bancaria<span>*</span></p>
                            <div class="">
                                    <select class="form-control select_cus_b" aria-label="Seleccione un banco" name="banco">
                                        <option value="">Seleccione un banco</option>
                                        @foreach ($bancos as $banco)
                                            <option value="{{ $banco }}">{{ $banco }}</option>
                                        @endforeach

                                    </select>
                                    @if ($errors->has('banco'))
                                        <p class="text-danger">{{ $errors->first('banco') }}</p>
                                    @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">

                            <div class="mb-5">
                                <p class="title-ent">Tipo de Cuenta<span>*</span></p>
                                <div class="">
                                    <select class="form-control select_cus_t" aria-label="Tipo de cuenta" name="cuenta">
                                        <option value="">Seleccione un tipo de cuenta</option>
                                        @foreach ($cuentas as $cuenta)
                                            <option value="{{ $cuenta }}">{{ $cuenta }}</option>
                                        @endforeach

                                    </select>
                                    @if ($errors->has('cuenta'))
                                        <p class="text-danger">{{ $errors->first('cuenta') }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <label for="" class="label_custom">Número de Cuenta<span>*</span></label>
                                <input type="text" class="form-control input_custom" name="n_cuenta">
                                @if ($errors->has('n_cuenta'))
                                        <p class="text-danger">{{ $errors->first('n_cuenta') }}</p>
                                    @endif
                            </div>

                            <div class="form-group mb-4">
                                <label for="" class="label_custom">Ciudad<span>*</span></label>
                                <select class="form-control select_custom" name="municipio" id="municipio">
                                    <option value="">Seleccione una ciudad</option>
                                </select>
                            </div>

                            <div class="form-group mb-4">
                                <label for="" class="label_custom">Departamento<span>*</span></label>
                                <select  class="form-control select_custom" aria-label="Default select example" id="departamento" name="departamento">
                                    <option  value="{{old('departamento')}}">Seleccione un departamento</option>

                                    </select>
                                    @if ($errors->has('departamento'))
                                        <p class="text-danger">{{ $errors->first('departamento') }}</p>
                                    @endif
                            </div>

                            <div class="form-group mb-4">
                                <label for="" class="label_custom">País<span>*</span></label>
                                <select class="form-control select_custom"  id="pais" name="pais">
                                    <option value="Colombia">Colombia</option>
                                </select>
                            </div>

                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-4">
                    <button class="btn btn-primary btn_1">(Opcional) Banco 2</button>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div>
                            <p class="title-ent">Nombre de la Entidad Bancaria</p>
                            <div class="">
                                <div>
                                    <select class="form-control select_cus_b" aria-label="Seleccione un banco" name="banco2">
                                        <option value="">Seleccione un banco</option>
                                        @foreach ($bancos as $banco)
                                            <option value="{{ $banco }}">{{ $banco }}</option>
                                        @endforeach

                                    </select>
                                    @if ($errors->has('banco2'))
                                        <p class="text-danger">{{ $errors->first('banco2') }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                            <div class="mb-5">
                                <p class="title-ent">Tipo de Cuenta</p>
                                <div class="">
                                    <select class="form-control select_cus_t" aria-label="Tipo de cuenta" name="cuenta2">
                                        <option value="">Seleccione un tipo de cuenta</option>
                                        @foreach ($cuentas as $cuenta)
                                            <option value="{{ $cuenta }}">{{ $cuenta }}</option>
                                        @endforeach

                                    </select>
                                    @if ($errors->has('cuenta2'))
                                        <p class="text-danger">{{ $errors->first('cuenta2') }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <label for="" class="label_custom">Número de Cuenta</label>
                                <input type="text" class="form-control input_custom"name="n_cuenta2">
                            </div>

                            <div class="form-group mb-4">
                                <label for="" class="label_custom">Ciudad</label>
                                <select class="form-control select_custom" name="municipio2" id="municipio2">
                                    <option value="">Seleccione una ciudad</option>
                                </select>
                            </div>

                            <div class="form-group mb-4">
                                <label for="" class="label_custom">Departamento</label>
                                <select class="form-control select_custom" id="departamento2" name="departamento2">
                                    <option value="">Seleccione un Departamento</option>
                                </select>
                            </div>

                            <div class="form-group mb-4">
                                <label for="" class="label_custom">País</label>
                                <select class="form-control select_custom" name="pais2" id="pais2">
                                    <option value="Colombia">Colombia</option>
                                </select>
                            </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="mb-4">
            <div class="div_continuar">
                <button class="btn btn-primary btn_continuar">Guardar y Continuar</button> <span style="color:blue; font-size: 25px;"></span>
            </div>
        </div>

        </div>
        </form>
  </div>
</div>


  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper-base.min.js"
    integrity="sha384-EQhgPShYZDmf+OWKvoYf70b91G/J0xgfgvbXhNfP60ZQLPv6du/0h0sU6Ygr19d0"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="{{ asset('js/principal.js') }}"></script>

  <script>
    $(document).ready(function(){
    $.ajax({
    url: "/listarMunicipios",
    dataType: "json",
    type: "GET",
    success: function(response) {

            departamentos_local = response.departamentos;
            municipios_local = response.municipios;
            localStorage.setItem('departamentos_local', JSON.stringify(departamentos_local));
            localStorage.setItem('municipios_local', JSON.stringify(municipios_local));
            console.log(localStorage.getItem("departamentos_local"));
            departamentos_local.forEach(element => {
                $("#departamento2").append('<option value="' + element.Departamento + '">' + element.Departamento + '</option>')
            });

    },
    error: function(response) {
        console.log("Ocurrió un error al traer los municipios");
    },
});
$("#departamento2").change(function(e){
    //alert(e.target.value);

    $("#municipio2").empty();
    let munfiltro = JSON.parse(localStorage.getItem('municipios_local'));
    let result = munfiltro.filter(m=>m.Departamento == e.target.value);

    result.forEach(element => {
                $("#municipio2").append('<option value="' + element.Municipio + '">' + element.Municipio + '</option>')
            })


});
});
  </script>
</body>
</html>
