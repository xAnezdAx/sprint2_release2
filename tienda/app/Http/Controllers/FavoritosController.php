<?php

namespace App\Http\Controllers;
use Barryvdh\DomPDF\Facade as PDF; //ve tu a saber porque no funciona :'c
//use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;

use App\Models\favoritos;
use App\Models\lista_favoritos;
use App\Models\albumes;
use App\Models\artistas;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class FavoritosController extends Controller
{
    public function pdf(){
        $favoritos = favoritos::where('id_usuario', Auth::user()->id)->get();
        $lista_favoritos = lista_favoritos::whereIn('id_favoritos', $favoritos->pluck('id'))->get();
        $albumes = Albumes::select('albumes.*', 'artistas.nombre')
            ->join('artistas', 'albumes.id_artista', '=', 'artistas.id')
            ->whereIn('albumes.id', $lista_favoritos->pluck('id_album'))
            ->orderBy('albumes.titulo', 'asc')
            ->get();
        $artistas = Artistas::all();
        $pdf = \PDF::loadView('favoritos-pdf', compact('favoritos', 'albumes', 'lista_favoritos', 'artistas'));
        //$pdf = FacadePdf::loadView('favoritos-pdf', compact('favoritos', 'albumes', 'lista_favoritos', 'artistas'));
        return $pdf->download('favoritos.pdf');
    }

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

    public function createList()
    {
        //
    }

    public function storeList(Request $request)
    {
        $favoritos = new favoritos();
        $favoritos->nombre_lista = $request->nombre_lista;
        $favoritos->id_usuario = Auth::user()->id;
        $favoritos->save();
        return redirect()->route('favoritos.index');
    }

    public function store(Request $request)
    {
        $lista = new lista_favoritos();
        $lista->id_album = $request->id_album;
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
    public function destroyList($id)
    {
        $favoritos = favoritos::find($id);
        $favoritos->delete();
        return redirect()->route('favoritos.index');
    }

}
