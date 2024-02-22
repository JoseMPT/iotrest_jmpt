<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

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
        $this->validate($request, [
            'username' => 'required|unique:users',
            'password' => 'required'
        ]);
        $user = new User();
        $user->fill($request->all());
        $user->password = Hash::make($request->password);
        $user->save();
        return $user;
    }

    // Actualizar usuario
    public function update(Request $req, $id)
    {
        if($req->username) $exist = User::Where('username', $req->username)->first();
        if ($exist) return response()->json([], 409);
        /*$this->validate($req, [
            'username' => 'fill|unique:users,username'.$id
        ]);*/
        $user = User::find($id);
        if (!$user) return response('', 404);
        $user->fill($req->all());
        if($req->password) $user->password = Hash::make($req->password);
        $user->save();

        return $user;
    }

    // Eliminar usuario
    public function destroy($id)
    {
        $user = User::find($id);
        if (!$user) return response('User not found', 404);
        $user->delete();
        return $user;
    }
}
