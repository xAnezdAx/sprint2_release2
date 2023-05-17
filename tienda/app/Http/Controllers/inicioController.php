<?php

namespace App\Http\Controllers;

use App\Models\Albumes as ModelsAlbumes;
use Illuminate\Http\Request;
use App\Models\Artistas;
use App\Models\Albumes;
use App\Models\favoritos;
use Illuminate\Support\Facades\Auth;
use App\Models\lista_favoritos;


class inicioController extends Controller
{
    public function index()
    {
        $favoritos = favoritos::where('id_usuario', Auth::user()->id)->get();
        $lista_favoritos = lista_favoritos::whereIn('id_favoritos', $favoritos->pluck('id'))->get();
        $albumes = Albumes::select('albumes.*', 'artistas.nombre')
            ->join('artistas', 'albumes.id_artista', '=', 'artistas.id')
            ->whereIn('albumes.id', $lista_favoritos->pluck('id_album'))
            ->orderBy('albumes.titulo', 'asc')
            ->get();
        return view('vistaPrincipal', compact('favoritos', 'albumes', 'lista_favoritos'));
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
        
        //$albu = ModelsAlbumes::select('albumes.*', 'artistas.nombre')
        //   ->join('artistas', 'albumes.id_artista', '=', 'artistas.id')->get();
        //return view('vistaPrincipal', ['albu' => json_encode($albu)]);
    }
}
