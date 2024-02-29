<?php

namespace App\Http\Controllers;

use App\Models\Actuator;
use Illuminate\Http\Request;

class ActuatorsController extends Controller
{
    public function index(): string
    {
        return Actuator::all();
    }

    public function show($id)
    {
        return Actuator::find($id);
    }

    // Crear un sensor
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:actuators',
            'type' => 'required',
            'value' => 'required',
            'date' => 'required',
            'user_id' => 'required',
        ]);
        $actuator = new Actuator();
        $actuator->fill($request->all());
        $actuator->date = date('Y-m-d H:i:s');
        $actuator->user_id = $request->user()->id;
        $actuator->save();
        return $actuator;
    }

    // Actualizar sensor
    public function update(Request $req, $id)
    {
        $actuator = Actuator::find($id);
        if (!$actuator) return response('', 404);
        $actuator->fill($req->all());
        $actuator->save();

        return $actuator;
    }

    // Eliminar un sensor
    public function destroy($id)
    {
        $actuator = Actuator::find($id);
        if (!$actuator) return response('Actuator not found', 404);
        $actuator->delete();
        return $actuator;
    }
}
