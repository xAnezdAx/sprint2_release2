<?php

namespace App\Http\Controllers;

use App\Models\Artistas;
use Illuminate\Http\Request;

class ArtistasAdminController extends Controller
{

    public function index()
    {
        //pagina principal
        //$art = Artistas::all();
        $art = Artistas::orderBy('nombre')->get();
        return view('artistasAdmin', compact('art'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
        $Artistas = new Artistas();
        $Artistas->nombre = $request->name;
        $Artistas->descripcion = $request->description;
        $Artistas->save();
        return redirect()->route('artistasAdmin.index');
    }

    public function show(Artistas $artistas)
    {
        //
    }

    public function edit($id)
    {
        $art = Artistas::find($id);
        return view('artistasAdminEdit', compact('art'));
    }

    public function update(Request $request, $id)
    {
        $Artistas = Artistas::find($id);
        $Artistas->nombre = $request->name;
        $Artistas->descripcion = $request->description;
        $Artistas->save();
        return redirect()->route('artistasAdmin.index');
    }

    public function destroy($id)
    {
        $Art =Artistas::find($id);
        $Art->delete();
        return redirect()->route('artistasAdmin.index');
    }
}
