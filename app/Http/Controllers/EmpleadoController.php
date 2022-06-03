<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empleado;

class EmpleadoController extends Controller
{
    public function index()
    {
        return Empleado::all();
    }

    public function show($id){
        return Empleado::findOrFail($id);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'empresa_id' => 'required',
            'email' => 'required|email|unique:empleados',
            'telefono' => 'nullable',
        ]);

        $empleado = Empleado::create($request->all());
        return $empleado;
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'nullable',
            'apellido' => 'nullable',
            'empresa_id' => 'nullable',
            'email' => 'required|email|unique:empleados',
            'telefono' => 'nullable',
        ]);

        $empleado = Empleado::findOrFail($id);
        $empleado->update($request->all());
        return $empleado;
    }

    public function destroy($id)
    {
        $empleado = Empleado::findOrFail($id);
        $empleado->delete();
        return $empleado;
    }
}
