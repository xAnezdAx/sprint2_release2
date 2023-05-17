<?php

namespace App\Http\Controllers;

use app\Models\User;

use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Authenticatable;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;


class UserController extends Controller
{
    public function index()
    {
        $id = auth()->id();
        $usuario = User::find($id);
        $rol = $usuario->roles->first();
        
        return view('perfil', compact('usuario', 'rol'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {           
            $usuario = User::find($id);
            return view('perfilEdit', compact('usuario'));
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        //$user = auth()->user();

        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'password' => ['sometimes', 'string', 'min:8', 'confirmed'],
        ]);

        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        if (isset($validatedData['password'])) {
            $user->password = Hash::make($validatedData['password']);
        }
        $user->save();
        return redirect()->route('perfil.index');
        //return redirect()->back()->with('success', 'Perfil actualizado correctamente.');
    }


    public function destroy($id)
    {
        //
    }
}
