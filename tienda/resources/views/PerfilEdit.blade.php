<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/EstilosPerfil.css') }}">
    <title>Perfil</title>
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

    <div class=" my-5 animated-background">
        <div class="container mt-5 ">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <form method="POST" action="{{ route('perfil.update', $usuario->id) }}" class="p-4 bg-light rounded shadow">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">{{ __('Nombre') }}</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', auth()->user()->name) }}" required autocomplete="name" autofocus>
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="email">{{ __('Correo Electronico') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', auth()->user()->email) }}" required autocomplete="email">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password">{{ __('Contraseña') }}</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password-confirm">{{ __('Confirmar Contraseña') }}</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
                        </div>

                        <button type="submit" class="btn btn-primary">{{ __('Actualizado') }}</button>
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
            <img src="{{asset('imagenes/tarjetass.png')}}" alt="">
        </div>
        <div class="copy">
            <p>Copyrigth</p>
        </div>
    </footer>

</body>
<script src="{{ asset('javaScript/scriptPerfil.js') }}"></script>
<script src="js/bootstrap.min.js"></script>
<script src="https://kit.fontawesome.com/7b319a5c76.js" crossorigin="anonymous"></script>

</html>