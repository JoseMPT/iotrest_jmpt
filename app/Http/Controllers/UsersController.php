<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class UsersController extends Controller
{
    // Consultar
    public function index(): string
    {
        return User::all();
    }

    public function show($id)
    {
        return User::find($id);
    }

    // Crear usuario
    public function store(Request $request)
    {
        return User::create($request->all());
    }

    // Actualizar usuario
    public function update(Request $req, $id)
    {
        $user = User::find($id);
        $user->fill($req->all());
        $user->save();

        return $user;
    }

    // Eliminar usuario
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return $user;
    }
}
