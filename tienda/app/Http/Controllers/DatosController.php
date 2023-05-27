<?php

namespace App\Http\Controllers;

use App\Models\Artistas;
use Illuminate\Http\Request;

class DatosController extends Controller
{
    public function index()
    {
        return Artistas::all();
    }

    public function store(Request $request)
    {
        $Artistas = new Artistas();
        $Artistas->nombre = $request->nombre;
        $Artistas->descripcion = $request->descripcion;
        $Artistas->save();
        return Artistas::all();
    }

    public function update(Request $request, $id)
    {
        $Artistas = Artistas::find($id);
        if (!$Artistas) {
            return response()->json(['error' => 'No se encontró el dato'], 404);
        }
        $Artistas->nombre = $request->nombre;
        $Artistas->descripcion = $request->descripcion;
        $Artistas->save();
        return Artistas::all();

    }

    public function destroy($id)
    {
        $Artistas = Artistas::find($id);
        $Artistas->delete();
        return Artistas::all();
    }
}
