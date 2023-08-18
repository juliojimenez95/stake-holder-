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
    /* Tus estilos personalizados aquí */
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
                <br>
                <div class="col-md-12 mb-5">
                    <p class="text_main">Por restriccion de alguno de los documentos no es posible su union,por favor descargarlos individualmente. </p>
                </div>
              </div>
            </div>
        </div>

        <!-- Aquí inserta el contenido específico de la vista -->
        @if(count($files) > 0)
            <div class="row">
                @foreach($files as $file)
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <p class="div_p">{{ basename($file) }}</p>
                            <div class="div_img" style="display: flex; justify-content: center; align-items: center; height: 100px;">
                                <a class="div_img" id="descarga{{ $loop->index }}" data-file="{{ basename($file) }}" style="cursor: pointer;" download>
                                    <img src="{{ asset('images/Descargar-PDF.png') }}" alt="Imagen" id="img{{ $loop->index }}" class="img-fluid">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            </div>
        @else
            <p>No hay archivos disponibles para descargar.</p>
        @endif

</div>
<script>
     @foreach($files as $index => $file)
        const button{{ $index }} = document.querySelector('#descarga{{ $index }}');
        if (button{{ $index }}){
            button{{ $index }}.addEventListener('click', function() {
                // Obtener el archivo PDF correspondiente
                const filename = this.getAttribute('data-file');
                // Descargar el archivo
                window.location.href = '/descargar-pdf/' + filename;
            });
        }
    @endforeach
</script>
</body>
</html>
