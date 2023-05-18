<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/EstilosFavoritos.css">
    <title>favoritos</title>
</head>

<body class="animated-background">

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
                <li><a href="{{route('pdf')}}"> Imprimir</a></li>
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
                        @can('administrador')
                        <a href="{{route('AllUser.index')}}"> Administrar </a>
                        @elsecan('cliente')
                        <a href="{{route('favoritos.index')}}"> favoritos </a>
                        @endcan
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

    <!-- Contenido -->
    <div class=" my-5 animated-background">
        <div class="container m-5">
            <div class="row">
                <div class="col-md-8">
                    <ul class="list-group animated-background">
                        @foreach ($favoritos as $favo)
                        <li class="list-group-item animated-background">
                            <h5>{{ $favo->nombre_lista }}</h5>
                            
                            <form action="{{ route('destroyList', $favo->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-primary btn-sm">Eliminar lista</button>
                            </form>

                            <ul>
                                @foreach ($lista_favoritos as $lista)
                                @if ($lista->id_favoritos == $favo->id)
                                @foreach ($albumes as $album)
                                @if ($album->id == $lista->id_album)
                                <li>
                                    <strong>Titulo:</strong> {{ $album->titulo }}<br>
                                    <strong>Descripción:</strong> {{ $album->descripcion }}<br>
                                    <strong>Artista:</strong> {{ $album->nombre }}<br>
                                    <strong>Precio:</strong> {{ $album->precio }} <br>
                                    <form action="{{ route('favoritos.destroy', $lista->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                    </form>
                                </li>
                                @endif
                                @endforeach
                                @endif
                                @endforeach
                            </ul>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <div class="col-md-4">

                    <form action="{{ route('storeList') }}" method="POST" class="p-4 bg-light rounded shadow">
                        @csrf
                        <div class="form-group">
                            <label for="titulo">Nombre de la lista</label>
                            <input type="text" name="nombre_lista" id="nombre_lista" class="form-control">
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary mt-4">Crear</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <!-- pie de pagina -->
    <footer class="section-p1">
        <div class="col">
            <img class="logo" src=" {{ asset('imagenes/logo001.jpg') }} " alt="">
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
            <img src=" {{ asset('imagenes/tarjetass.png')}}" alt="">
        </div>
        <div class="copy">
            <p>Copyrigth</p>
        </div>
    </footer>
</body>

<script src="{{ asset('javaScript/jquery.min.js') }}"></script>
<script src="{{ asset('javaScript/scriptFavoritos.js') }}"></script>
<script src="js/bootstrap.min.js"></script>
<script src="https://kit.fontawesome.com/7b319a5c76.js" crossorigin="anonymous"></script>


</body>

</html>