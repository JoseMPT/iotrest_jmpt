<?php

namespace App\Http\Controllers;

use App\Models\Sensor;
use Illuminate\Http\Request;

class SensorsController extends Controller
{
    public function index(): string
    {
        return Sensor::all();
    }

    public function show($id)
    {
        return Sensor::find($id);
    }

    // Crear un sensor
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:sensors',
            'type' => 'required',
            'value' => 'required',
            'date' => 'required',
            'user_id' => 'required',
        ]);
        $sensor = new Sensor();
        $sensor->fill($request->all());
        $sensor->save();
        return $sensor;
    }

    // Actualizar sensor
    public function update(Request $req, $id)
    {
        $sensor = Sensor::find($id);
        if (!$sensor) return response('', 404);
        $sensor->fill($req->all());
        $sensor->save();

        return $sensor;
    }

    // Eliminar un sensor
    public function destroy($id)
    {
        $sensor = Sensor::find($id);
        if (!$sensor) return response('Sensor not found', 404);
        $sensor->delete();
        return $sensor;
    }
}
