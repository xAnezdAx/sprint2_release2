<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!--<title>{{ config('app.name', 'Laravel') }}</title>-->
    <title>Tienda de música en formato físico</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/scriptVistaPrincipal.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/estilosVistaPrincipal.css') }}" rel="stylesheet">
</head>

<body>
    <!-- Barra de navegación -->
    <section id="header">
        <a href="{{route('inicio.index')}}"><img src="{{ asset('imagenes/logo001.jpg') }}" class="logo" alt=""></a>
        <div class="search-container">
            <input type="text" id="search-input" placeholder="Buscar...">
            <ul id="search-results"></ul>
        </div>
        <i class="fa-solid fa-magnifying-glass"></i>
        <div>
            <ul id="navbar">
                <li><a href="{{route('inicio.index')}}"> Inicio</a></li>
                <li><a href="{{route('albumesAdmin.index')}}"> Albumes</a></li>
                <li><a href="{{route('artistasAdmin.index')}}"> Artistas</a></li>
                <li><a href="ofertas"> Ofertas</a></li>
                <li><a href="help/pqr"> Help/PQR</a></li>
                <li id="favorito"><a href="favoritos"><i class="fa-solid fa-heart"></i> </a></li>
                <!-- estado de la autenticacion -->
                @auth
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{route('perfil.index')}}">Perfil</a>
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
                @else
                <li id="perfil"><a href="{{ route('login') }}"><i class="fa-regular fa-user"></i> Login</a></li>
                @endauth
                <li id="carrito"><a href="Carrito.html"><i class="fa-solid fa-cart-shopping"></i> </a></li>
                <a href="#" id="close"><i class="fa-solid fa-circle-xmark"></i></a>
            </ul>
        </div>
        <div id="mobile">
            <a href="carrito"><i class="fa-solid fa-cart-shopping"></i> </a>
            <i id="bar" class="fas fa-outdent"></i>
        </div>
    </section>
    <div id="app" class="animated-background">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm animated-background">
            <div class="container ">
                <a class="navbar-brand" href="{{ url('/') }}">
                    tienda de musica
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                        @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Iniciar seseion</a>
                        </li>
                        @endif

                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">Registrarse</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <div class=" my-5 animated-background">
            <main class="py-4">
                @yield('content')
            </main>
        </div>
    </div>

    <!-- Pie de página -->
    <footer class="section-p1 ">
        <div class="col">
            <img class="logo" src="../imagenes/logo001.jpg" alt="">
            <h4><strong>Contactanos</strong> </h4>
            <p><strong> Direccion</strong> Calle</p>
            <p><strong> Telefono</strong> 320</p>
            <div class="follow">
                <h4>Siguenos</h4>
                <div class="icon">
                    <i class="fa-brands fa-facebook"></i>
                    <i class="fa-brands fa-instagram"></i>
                    <i class="fa-brands fa-twitter"></i>
                    <i class="fa-solid fa-envelope"></i>
                </div>
            </div>
        </div>
        <div class="col info">
            <h4>Acerca de</h4>
            <a href="#">Sobre nosotros</a>
            <a href="#">Información de envío</a>
            <a href="#">Política de privacidad</a>
            <a href="#">Términos y condiciones</a>
        </div>
        <div class="col info">
            <h4>informacion</h4>
            <a href="#">Politicas de privacidad</a>
            <a href="#">terminos y condiciones</a>
        </div>
        <div class="col install">
            <p>Medios de pago seguros</p>
            <img src="../imagenes/tarjetass.png" alt="">
        </div>
        <div class="copy">
            <p>Copyrigth</p>
        </div>
    </footer>


</body>

</html>