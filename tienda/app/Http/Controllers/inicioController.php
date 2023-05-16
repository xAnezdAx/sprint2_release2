<?php

namespace App\Http\Controllers;

use App\Models\Albumes as ModelsAlbumes;
use Illuminate\Http\Request;
use App\Models\Artistas;

class inicioController extends Controller
{
    public function index()
    {
        //pagina principal
        //$albu = Albumes::all();
        /* $albu = Albumes::select('albumes.*', 'artistas.nombre')
            ->join('artistas', 'albumes.id_artista', '=', 'artistas.id')
            ->orderBy('albumes.titulo', 'asc')
            ->inRandomOrder()
            ->limit(3)
            ->get();

        $artistas = Artistas::all();
        return view('vistaPrincipal', compact('albu', 'artistas')); */
        return view('vistaPrincipal');
        //$albu = ModelsAlbumes::select('albumes.*', 'artistas.nombre')
        //   ->join('artistas', 'albumes.id_artista', '=', 'artistas.id')->get();
        //return view('vistaPrincipal', ['albu' => json_encode($albu)]);
    }
}
