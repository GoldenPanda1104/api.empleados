<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empresa;

class EmpresaController extends Controller
{

    public function index()
    {
        return Empresa::all();
    }

    public function show($id){
        return Empresa::findOrFail($id);
    }

    public function store(Request $request){

        $data = $request->validate([
            'nombre' => 'required',
            'email' => 'nullable|email|unique:empresa',
            'sitio_web' => 'nullable',
        ]);

        $empresa = Empresa::create($data);
        return $empresa;

    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'nombre' => 'nullable',
            'email' => 'nullable|email|unique:empresas',
            'sitio_web' => 'nullable',
        ]);

        $empresa = Empresa::findOrFail($id);
        $empresa->update($request->all());
        return $empresa;
    }

    public function destroy($id)
    {
        $empresa = Empresa::findOrFail($id);
        $empresa->delete();
        return $empresa;
    }

    
}
