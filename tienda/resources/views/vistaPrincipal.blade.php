<!DOCTYPE html>
<html lang="es">

<head>
    <title>Tienda de música en formato físico</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/estilosVistaPrincipal.css') }}">
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

    <!-- Header de la página -->
    <section id="headerp">
        <h2>¡Bienvenido a la tienda de música!</h2>
    </section>

    <div class=" my-5 animated-background">
        <!-- Contenido de la página -->
        <div class="container my-4">
            <div class="row">
                <!-- Columna izquierda -->
                <div class="col-md-3">
                    <div class="row my-4">
                        <div class="list-group">
                            <a href="#" class="list-group-item list-group-item-action list-group-item-dark">Artistas
                                favoritos</a>
                            <a href="#" class="list-group-item list-group-item-action">Artistas favoritos</a>
                            <a href="#" class="list-group-item list-group-item-action">Artistas favoritos</a>
                            <a href="#" class="list-group-item list-group-item-action">Artistas favoritos</a>
                        </div>
                    </div>
                    <div class="row ">
                        <div class="list-group">
                            <a href="#" class="list-group-item list-group-item-action list-group-item-dark">Albumes
                                favoritos</a>
                            <a href="#" class="list-group-item list-group-item-action">Albumes favoritos</a>
                            <a href="#" class="list-group-item list-group-item-action">Albumes favoritos</a>
                            <a href="#" class="list-group-item list-group-item-action">Albumes favoritos</a>
                        </div>
                    </div>
                </div>

                <!-- Columna central -->
                <div class="col-md-6 my-4">
                    <div class="card" style="background-color: #343a40; color: white;">
                        <div class="text-center">
                            <h2>Álbum Destacado</h2>
                        </div>
                        @php
                        $albu = App\Models\Albumes::select('albumes.*', 'artistas.nombre')
                        ->join('artistas', 'albumes.id_artista', '=', 'artistas.id')
                        ->inRandomOrder()
                        ->limit(3)
                        ->get();
                        $randomAlbum = $albu->random();
                        @endphp
                        <div class="row">
                            <div class="col-md-6">
                                <img src="{{ asset('imagenes/' . $randomAlbum->foto) }}" width="200" height="300" class="card-img-top">
                            </div>
                            <div class="col-md-6">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $randomAlbum->titulo }}</h5>
                                    <p class="card-text">{{ $randomAlbum->descripcion }}</p>
                                    <p class="card-text">Artista: {{ $randomAlbum->nombre }}</p>
                                    <p class="card-text">Precio: {{ $randomAlbum->precio }}</p>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center my-3">
                                <a href="#" class="btn btn-primary mx-2">Agregar a favoritos</a>
                                <a href="#" class="btn btn-primary mx-2">Agregar al carrito</a>
                                <a href="#" class="btn btn-primary mx-2">Comprar</a>
                            </div>

                        </div>
                    </div>
                </div>

                <!-- Columna derecha -->
                <div class="col-md-3">
                    @php
                    $albu = App\Models\Albumes::select('albumes.*', 'artistas.nombre')
                    ->join('artistas', 'albumes.id_artista', '=', 'artistas.id')
                    ->inRandomOrder()
                    ->limit(3)
                    ->get();
                    @endphp
                    <div class="row my-4">
                        @foreach ($albu as $albume)
                        <div class="card mb-4 shadow-sm">
                            <img src="{{ asset('imagenes/' . $albume->foto) }}" class="card-img-top" alt="{{$albume->foto}}">
                            <div class="card-body">
                                <h5 class="card-title">{{$albume->titulo}}</h5>
                                <p class="card-text">{{$albume->descripcion}}</p>
                                <p class="card-text">Artista: {{$albume->nombre}}</p>
                                <p class="card-text">Precio: {{$albume->precio}}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <a href="#" class="btn btn-primary btn-sm mx-1">Agregar a favoritos</a>
                                    <a href="#" class="btn btn-primary btn-sm mx-1">Agregar al carrito</a>
                                    <a href="#" class="btn btn-primary btn-sm mx-1">Comprar</a>
                                </div>
                            </div>

                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Pie de página -->
    <footer class="section-p1">
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

    <script src="{{ asset('javaScript/scriptVistaPrincipal.js') }}"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/7b319a5c76.js" crossorigin="anonymous"></script>
    <script src="js/jquery-3.5.1.min.js"></script>
</body>

</html>