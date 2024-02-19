<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use App\Models\User;

class Controller extends BaseController
{
    public function index(): string
    {
        return User::all();
    }

    public function show($id)
    {
        return User::find($id);
    }
}
