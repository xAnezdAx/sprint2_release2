<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;

class AllUserController extends Controller
{
    public function index()
    {
        $users = User::all();
        $roles = Role::all();
        return view('AllUser', compact('users', 'roles'));
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
        //
    }

    public function update(Request $request, $user)
    {
        $user = User::find($user);
        $user->roles()->sync($request->roles);
        return redirect()->route('AllUser.index');
    }

    public function destroy($id)
    {
        //
    }
}
