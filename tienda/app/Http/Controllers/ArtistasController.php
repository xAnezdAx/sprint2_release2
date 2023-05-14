<?php

namespace App\Http\Controllers;

use App\Models\Artistas;
use Illuminate\Http\Request;

class ArtistasController extends Controller
{
    
    public function index()
    {
        //pagina principal
        $art = Artistas::all();
        return view('artistas', compact('art'));        
    }

    public function create()
    {
        //formulario donde se agregan los datos, es la vista a la que nos vamos a dirigir
    }

    public function store(Request $request)
    {
        //sirve para guardar datos en la bd
        
    }

    public function show(Artistas $artistas)
    {
        //servira para obtener un registro de nuestra tabla     
    }

    public function edit(Artistas $artistas)
    {
        //nos rive para traer los datos de un registro y poder editarlos
        //los coloca en un formulario o vista
    }

    public function update(Request $request, Artistas $artistas)
    {
        //este metodo actualiza los datos en la bd
    }

    public function destroy(Artistas $artistas)
    {
        //elimina un registro de la bd, muestra el dato a eliminar
    }
}
