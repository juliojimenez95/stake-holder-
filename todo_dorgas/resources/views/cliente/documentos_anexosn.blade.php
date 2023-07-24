<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Todo Drogas</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
  <link rel="stylesheet" href="{{ asset('css/anexos.css') }}">
  <link rel="icon" href="{{ asset('images/fevicon.jpeg') }}" type="image/png" />

  <style>

    </style>
</head>
<body>
<div class="container-fluid">
        <div class="row mb-3">
            <div class="col-md-12">
              <div class="text-center">
                <img src="{{ asset('images/logo_t2.png') }}" class="my-4 img-fluid">
                <h1 class="text-primary h1_tit" >Documentos Anexos</h1>
                <hr class="underline under_S">
              </div>
            </div>
        </div>
        <form action="{{ route('storeanexosn',$id) }}" method="post" enctype="multipart/form-data" id="myForm">
        @csrf
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-5">
                    <p class="text_main">Por favor adjunte la siguiente Información.</p>
                </div>
                <div class="col-md-12 mb-4">
                  <div class="div_main">
                    <div class="div_inside">
                        <p class="div_p">Planilla Aporte Seguridad Social<span>*</span></p>
                        @if ($errors->has('SS'))
                            <p class="text-danger">{{ $errors->first('SS') }}</p>
                        @endif
                        <div class="div_img">
                          <img src="{{ asset('images/Subir-PDF.png') }}" alt="Imagen" id="img1" class="img-fluid" onclick="document.getElementById('SS').click()">
                          <input type="file" id="SS" name="SS" style="display:none; " value="{{old('SS')}}" onchange="changeImageColor14()">
                        </div>
                    </div>


                    <div class="div_inside">
                      <p class="div_p">R.U.T del Año Vigente<span>*</span></p>
                      @if ($errors->has('Rut'))
                        <p class="text-danger">{{ $errors->first('Rut') }}</p>
                      @endif
                      <div class="div_img">
                        <img src="{{ asset('images/Subir-PDF.png') }}" alt="Imagen" id="img2"  class="img-fluid" onclick="document.getElementById('Rut').click()">
                        <input type="file" id="Rut" name="Rut" style="display:none;" value="{{old('Rut')}}" onchange="changeImageColor1()">
                      </div>
                    </div>
                    <div class="div_inside">
                      <p class="div_p">Copia de C.C <span>*</span></p>
                      @if ($errors->has('CC'))
                        <p class="text-danger">{{ $errors->first('CC') }}</p>
                      @endif
                      <div class="div_img">
                        <img src="{{ asset('images/Subir-PDF.png') }}" alt="Imagen" id="img3" class="img-fluid" onclick="document.getElementById('CC').click()" >
                        <input type="file" id="CC" name="CC" style="display:none;" value="{{old('CC')}}" onchange="changeImageColor2()">
                      </div>
                    </div>

                  </div>
                </div>

                <div class="col-md-12 mb-5">
                  <div class="div_main">
                    <div class="div_inside">
                        <p class="div_p">Referencia Comercial no superior a 1 mes<span></span></p>
                        <div class="div_img">
                          <img src="{{ asset('images/Subir-PDF.png') }}" alt="Imagen" id="img5" class="img-fluid" onclick="document.getElementById('RC').click()">
                          <input type="file" id="RC" name="RC" style="display:none;" value="{{old('RC')}}" onchange="changeImageColor4()">
                          </div>
                    </div>
                    <div class="div_inside">
                        <p class="div_p">Referencia Comercial 2 no superior a 1 mes<span></span></p>
                        <div class="div_img">
                          <img src="{{ asset('images/Subir-PDF.png') }}" alt="Imagen" id="img14" class="img-fluid" onclick="document.getElementById('Referencia_comercial2').click()">
                          <input type="file" id="Referencia_comercial2" name="Referencia_comercial2" style="display:none;"  onchange="changeImageColor13()">
                      </div>
                    </div>


                    <div class="div_inside">
                      <p class="div_p">Resolucion Rete ICA<span></span></p>
                      <div class="div_img">
                        <img src="{{ asset('images/Subir-PDF.png') }}" alt="Imagen" id="img6" class="img-fluid" onclick="document.getElementById('RRI').click()">
                        <input type="file" id="RRI" name="RRI" style="display:none;" value="{{old('RRI')}}" onchange="changeImageColor5()">
                      </div>
                    </div>
                  </div>
                </div>


                <div class="col-md-12 mb-5">
                    <div class="div_main2">
                        <div class="div_inside2">
                      <p class="div_p">Brochure<span></span></p>
                      <div class="div_img">
                        <img src="{{ asset('images/Subir-PDF.png') }}" alt="Imagen" id="img10" class="img-fluid" onclick="document.getElementById('Brochure').click()">
                        <input type="file" id="Brochure" name="Brochure"  value="{{old('Brochure')}}" style="display:none;"  onchange="changeImageColor9()">
                    </div>
                    </div>
                    <div class="div_inside">
                      <p class="div_p">Certificado Bancario<span>*</span></p>
                      @if ($errors->has('CB'))
                                        <p class="text-danger">{{ $errors->first('CB') }}</p>
                      @endif
                      <div class="div_img">
                        <img src="{{ asset('images/Subir-PDF.png') }}" alt="Imagen" id="img11" class="img-fluid" onclick="document.getElementById('CB').click()">
                        <input type="file" id="CB" name="CB" style="display:none;" value="{{old('CB')}}" onchange="changeImageColor10()">
                    </div>
                    </div>
                    </div>
                </div>

            </div>
            <div class="row mb-4">
                <div class="col-md-12">
                    <div class="div_continuar">
                        <button class="btn btn-primary btn_continuar">Guardar y Continuar</button>
                    </div>
                </div>
            </div>
        </form>
        </div>
</div>
<script src="{{ asset('js/documento.js') }}"></script>
<script>
    document.getElementById("myForm").addEventListener("submit", function(event) {
        event.preventDefault(); // Evita el envío predeterminado del formulario
        let val1 = document.getElementById("SS").value;
        let val2 =document.getElementById("Rut").value;
        let val3 =document.getElementById("CC").value;
        let val4 =document.getElementById("CB").value;
        if(val1 != '' && val2 != '' && val3 != '' && val4 != ''){
            document.getElementById("myForm").submit();
        }else {
            alert("Faltan archivos requeridos");
        }

    });


</script>

</body>
</html>
