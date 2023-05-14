<?php

namespace App\Http\Controllers;

use App\Models\Albumes;
use Illuminate\Http\Request;
use App\Models\Artistas;

class AlbumesAdminController extends Controller
{
    public function index()
    {
        //pagina principal
        // Seleccionar todos los álbumes con el nombre del artista correspondiente y ordenarlos alfabéticamente
        $albu = Albumes::select('albumes.*', 'artistas.nombre')
            ->join('artistas', 'albumes.id_artista', '=', 'artistas.id')
            ->orderBy('albumes.titulo', 'asc')
            ->get();
        $artistas = Artistas::all();

        return view('albumesAdmin', compact('albu', 'artistas'));
    }


    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
        $Albumes = new Albumes();
        $Albumes->id_artista = $request->id_artista;
        $Albumes->titulo = $request->titulo;
        $Albumes->precio = $request->precio;
        $Albumes->foto = $request->foto;
        $Albumes->descripcion = $request->descripcion;
        $Albumes->save();
        return redirect()->route('albumesAdmin.index');
    }

    public function show(Albumes $albumes)
    {
        //
    }

    public function edit($id)
    {
        $album = Albumes::find($id);
        $artistas = Artistas::all();
        return view('albumesAdminEdit', compact('album', 'artistas'));        
    }

    public function update(Request $request, $id)
    {
        $Albumes = Albumes::find($id);
        $Albumes->id_artista = $request->id_artista;
        $Albumes->titulo = $request->titulo;
        $Albumes->precio = $request->precio;
        $Albumes->foto = $request->foto;
        $Albumes->descripcion = $request->descripcion;
        $Albumes->save();
        return redirect()->route('albumesAdmin.index');
    }

    public function destroy($id)
    {
        $Album = Albumes::find($id);
        $Album->delete();
        return redirect()->route('albumesAdmin.index');
    }
}
