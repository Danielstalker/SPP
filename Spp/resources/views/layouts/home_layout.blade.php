<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Mi App Ferxxo')</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    @yield('styles')
</head>
<body id="login-body">
    {{-- CONTENIDO DE LA NAVBAR VA AQUÍ --}}
   <nav class="navbar">
        <a href="/">
            <img src="{{ asset('images/san-pedro.png') }}" alt="Logo" class="navbar-logo"> {{-- Reemplaza con tu logo --}}
        </a>
        <ul class="navbar-nav">
            <li class="nav-item"><a href="/" class="nav-link">Inicio</a></li>
            <li class="nav-item"><a href="#" class="nav-link">Quiénes Somos</a></li>
            <li class="nav-item"><a href="#" class="nav-link">Eventos</a></li>
            <li class="nav-item"><a href="#" class="nav-link">Directorio</a></li>
            <li class="nav-item"><a href="#" class="nav-link">Contacto</a></li>
            <li class="nav-item"><a href="#" class="nav-link">Términos y Condiciones</a></li>
        </ul>
        <div class="navbar-auth">
            @guest
                <a href="{{ route('login') }}" class="btn btn-primary">Inicia sesion</a>
                <a href="{{ route('register') }}" class="btn btn-primary">Registrate</a>
            @else
                <span class="nav-link" style="margin-right: 10px;">{{ Auth::user()->name }}</span>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                <a href="#" class="btn btn-primary" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
            @endguest
            <a href="https://wa.me/3105649174" target="_blank"> {{-- Reemplaza XXXXXXXXXXX con tu número de WhatsApp --}}
                <img src="{{ asset('images/wasap.webp') }}" alt="WhatsApp" class="whatsapp-icon"> {{-- Asegúrate de tener este ícono --}}
            </a>
        </div>
    </nav>
    <main class="main-content">
        @yield('content')
    </main>
    @yield('scripts')
</body>
</html>