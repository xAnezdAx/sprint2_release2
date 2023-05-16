<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AllUserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('AllUser', compact('users'));
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

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
