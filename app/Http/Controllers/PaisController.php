<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Paises;

class PaisController extends Controller
{
   
    public function index()
    {
        $paises = Paises::orderBy('nombre','asc')->get();
        return [
            'paises'=>$paises
        ];
    }

    public function store(Request $request)
    {
        $paises = new Paises();
        $paises->nombre = $request->nombre;
        $paises->save();
    }

    public function update(Request $request, $id)
    {
        $paises = Paises::findOrFail($request->id);
        $paises->nombre = $request->nombre;
        $paises->save();
    }

    public function destroy($id)
    {
        $paises = Paises::findOrFail($request->id);
        $paises->delete();
    }
}
