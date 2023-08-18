@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Verifique su dirección de correo electrónico') }}</div>

                    <div class="card-body">
                        @if (session('resent'))
                            <div class="alert alert-success" role="alert">
                                {{ __('Se ha enviado un nuevo enlace de verificación a su dirección de correo electrónico.') }}
                            </div>
                        @endif

                        {{ __('Antes de continuar, verifique su correo electrónico para obtener un enlace de verificación.') }}
                        {{ __('Si no recibiste el correo electrónico') }},
                        <form class="d-inline" method="POST" action="{{ route('verification.send') }}">
                            @csrf
                            <button type="submit"
                                class="btn btn-link p-0 m-0 align-baseline">{{ __('haga clic aquí para solicitar otro') }}</button>.
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Función para enviar la solicitud AJAX
            function sendVerificationRequest() {
                $.ajax({
                    type: 'POST',
                    url: '{{ route('verification.send') }}',
                    data: {
                        "_token": "{{ csrf_token() }}"
                    },
                    success: function(response) {
                        // Manejar la respuesta exitosa aquí si es necesario
                        console.log('Solicitud de verificación enviada con éxito.');
                        localStorage.setItem('send', true);
                    },
                    error: function(error) {
                        // Manejar errores aquí si es necesario
                        console.error('Error al enviar la solicitud de verificación.');
                    }
                });
            }

            // Llamar a la función de envío cuando el documento esté cargado
            let send = localStorage.getItem('send');
            if (!send) {
                sendVerificationRequest();
            }
        });
    </script>
@endsection
