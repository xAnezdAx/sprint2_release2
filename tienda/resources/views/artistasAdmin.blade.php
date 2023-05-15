<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/EstilosArtistaAdmin.css">
    <title>Carrito de compras</title>
</head>

<body>
    <!-- Barra de navegación -->
    <section id="header">
        <a href="{{route('inicio.index')}}"><img src="{{ asset( 'imagenes/logo001.jpg' ) }}" class="logo" alt=""></a>
        <input type="text" placeholder="search">
        <i class="fa-solid fa-magnifying-glass"></i>
        <div>
            <ul id="navbar">
                <li><a href="{{route('inicio.index')}}"> Inicio</a></li>
                <li><a href="{{route('albumesAdmin.index')}}"> Albumes</a></li>
                <li><a href="{{route('artistasAdmin.index')}}"> Artistas</a></li>
                <li><a href="ofertas"> Ofertas</a></li>
                <li><a href="help/pqr"> Help/PQR</a></li>
                <li id="favorito"> <a href="favoritos"> <i class="fa-solid fa-heart"> </i> </a></li>
                <li id="perfil"> <a href="perfil"> <i class="fa-regular fa-user"> </i> </a></li>
                <li id="carrito"> <a href="Carrito.html"> <i class="fa-solid fa-cart-shopping"> </i> </a></li>
                <a href="#" id="close"><i class="fa-solid fa-circle-xmark"></i></a>
            </ul>
        </div>
        <div id="mobile">
            <a href="carrito"><i class="fa-solid fa-cart-shopping"></i> </a>
            <i id="bar" class="fas fa-outdent"></i>
        </div>
    </section>

    <div class=" my-5 animated-background">

        <!-- formulario -->
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <form action="{{ route('artistasAdmin.store') }}" method="POST" onsubmit="return validateForm();" class="p-4 bg-light rounded shadow">
                        @csrf
                        <div class="form-group">
                            <label for="name">Nombre</label>
                            <input type="text" name="name" id="name" class="form-control" maxlength="255">
                        </div>
                        <div class="form-group">
                            <label for="description">Descripción</label>
                            <textarea name="description" id="description" cols="30" rows="5" class="form-control" maxlength="255"></textarea>
                            <div id="description-counter" class="text-muted mt-2"></div>
                        </div>

                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary mt-4">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <!-- tarjetas -->
        <div class="container my-5">
            <div class="row">
                @foreach ($art as $artista)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{$artista->nombre}}</h5>
                            <p class="card-text">{{$artista->descripcion}}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <a href="{{route('artistasAdmin.edit', $artista->id)}}" class="btn btn-primary">Editar</a>
                                <form action="{{route('artistasAdmin.destroy', $artista->id)}}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
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

<script src="{{ asset('javaScript/scriptArtistas.js') }}"></script>
<script src="js/bootstrap.min.js"></script>
<script src="https://kit.fontawesome.com/7b319a5c76.js" crossorigin="anonymous"></script>

</html>