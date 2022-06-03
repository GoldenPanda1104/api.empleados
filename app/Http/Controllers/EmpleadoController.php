<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empleado;

class EmpleadoController extends Controller
{
    public function index()
    {
        return view('empleados.index');
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
        return view('empleados.edit');
    }

    public function destroy($id)
    {
        return view('empleados.show');
    }
}
