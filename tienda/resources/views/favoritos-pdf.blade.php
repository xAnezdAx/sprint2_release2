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

<body>
    <div>
        <div>
            <ul>
                @foreach ($favoritos as $favo)
                <li>
                    <h5>{{ $favo->nombre_lista }}</h5>
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
    </div>
</body>

<script src="{{ asset('javaScript/jquery.min.js') }}"></script>
<script src="{{ asset('javaScript/scriptFavoritos.js') }}"></script>
<script src="js/bootstrap.min.js"></script>
<script src="https://kit.fontawesome.com/7b319a5c76.js" crossorigin="anonymous"></script>

</body>

</html>