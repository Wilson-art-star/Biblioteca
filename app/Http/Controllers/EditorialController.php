<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Editoriales;

class EditorialController extends Controller
{
   
    public function index()
    {
        $editoriales = Editoriales::orderBy('nombre','asc')->get();
        return [
            'editoriales'=>$editoriales
        ];
    }


    public function store(Request $request)
    {
        $editoriales = new Editoriales();
        $editoriales->nombre =$request->nombre;
        $ediroriales->save();
    }


    public function update(Request $request, $id)
    {
        $editoriales = Editoriales::findOrFail($request->id);
        $editoriales->nombre =$request->nombre;
        $ediroriales->save();
    }

  
    public function destroy($id)
    {
        $editoriales = Editoriales::findOrFail($request->id);
        $editoriales->delete();
    }
}
