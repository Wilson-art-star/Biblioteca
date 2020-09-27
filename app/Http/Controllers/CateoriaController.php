<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categorias;

class CateoriaController extends Controller
{
   //mostrar datos de la tabla
    public function index()
    {
        $categorias= Categorias::orderBy('nombre','asc')->get();
        return [
            'categorias'=>$categorias
        ];
    }
   

    //guardar datos
    public function store(Request $request)
    {
        $categorias= new Categorias();
        $categorias->nombre = $request->nombre;
        $categorias->save();

    }

    //actualizar datos
    public function update(Request $request, $id)
    {
        $categorias = Categorias::findOrFail($request->id);
        $categorias->nombre = $request->nombre;
        $categorias->save();
    }
    //eliminar datos
    public function destroy($id)
    {
        $categorias = Categorias::findOrFail($request->id);
        $categorias->delete();
    }
}
