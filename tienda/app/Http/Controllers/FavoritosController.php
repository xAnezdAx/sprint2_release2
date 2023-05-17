<?php

namespace App\Http\Controllers;

use App\Models\favoritos;
use App\Models\lista_favoritos;
use App\Models\albumes;
use App\Models\artistas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class FavoritosController extends Controller
{
    public $variableGlobal;
    public function index()
    {
        $favoritos = favoritos::where('id_usuario', Auth::user()->id)->get();
        $lista_favoritos = lista_favoritos::whereIn('id_favoritos', $favoritos->pluck('id'))->get();
        $albumes = Albumes::select('albumes.*', 'artistas.nombre')
            ->join('artistas', 'albumes.id_artista', '=', 'artistas.id')
            ->whereIn('albumes.id', $lista_favoritos->pluck('id_album'))
            ->orderBy('albumes.titulo', 'asc')
            ->get();
        $artistas = Artistas::all();
        return view('favoritos', compact('favoritos', 'albumes', 'lista_favoritos', 'artistas'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $lista = new lista_favoritos();
        $lista->id_album = 4;
        $lista->id_favoritos = $request->lista_desplegable;
        $lista->save();
        return redirect()->route('inicio.index');
    }


    public function show(favoritos $favoritos)
    {
        //
    }

    public function edit($id)
    {
        $this->variableGlobal = $id;
        $albume = Albumes::select('albumes.*', 'artistas.nombre')
            ->join('artistas', 'albumes.id_artista', '=', 'artistas.id')
            ->where('albumes.id', $id)
            ->orderBy('albumes.titulo', 'asc')
            ->first();
        $artistas = Artistas::all();
        $favoritos = favoritos::where('id_usuario', Auth::user()->id)->get();

        return view('favoritosAdicionar', compact('albume', 'artistas', 'favoritos'));
    }

    public function update(Request $request)
    {
        //
    }


    public function destroy($id)
    {


        $lista_favorito = lista_favoritos::find($id);
        $lista_favorito->delete();

        return redirect()->route('favoritos.index');
    }
}
