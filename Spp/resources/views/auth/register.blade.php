<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}"> {{-- ¡Crucial para cargar tu CSS! --}}
</head>
<body id="login-body"> {{-- Reutilizamos el ID del body para el fondo 4K --}}
    <div id="login-container"> {{-- Reutilizamos el ID del contenedor principal para el estilo del cuadro --}}
        <h2 class="login-title">Registrarse</h2> {{-- Título del formulario con estilo neón --}}

        {{-- Mensaje de error general (si hay errores de validación, por ejemplo, campos vacíos) --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('register') }}" class="register-form"> {{-- Ruta y método para el envío del formulario --}}
            @csrf {{-- ¡Token CSRF, es obligatorio en Laravel para seguridad! --}}

            {{-- Campo Nombre --}}
            <div class="form-group">
                <label for="name">Nombre</label>
                <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus
                       class="form-control @error('name') is-invalid @enderror">
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            {{-- Campo Correo Electrónico --}}
            <div class="form-group">
                <label for="email">Correo Electrónico</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required
                       class="form-control @error('email') is-invalid @enderror">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            {{-- Campo Contraseña --}}
            <div class="form-group">
                <label for="password">Contraseña</label>
                <input id="password" type="password" name="password" required autocomplete="new-password"
                       class="form-control @error('password') is-invalid @enderror">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            {{-- Campo Confirmar Contraseña --}}
            <div class="form-group">
                <label for="password-confirm">Confirmar Contraseña</label>
                <input id="password-confirm" type="password" name="password_confirmation" required autocomplete="new-password"
                       class="form-control"> {{-- No necesita is-invalid aquí directamente, Laravel maneja la confirmación por la regla 'confirmed' --}}
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-primary">
                    Registrarse
                </button>
            </div>
        </form>

        <div class="register-link"> {{-- Este div es para el enlace de "Ya tienes cuenta?" --}}
            ¿Ya tienes cuenta?
            <a href="/login">Iniciar Sesión aquí</a>
        </div>
    </div>
</body>
</html>