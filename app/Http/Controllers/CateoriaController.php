<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categorias;

class CateoriaController extends Controller
{
   //mostrar datos de la tabla
    public function index(Request $request)
    {
        $buscar=$request->buscar;
        $criterio=$request->criterio;

        if ($buscar=='') {
            $categorias= Categorias::orderBy('nombre','asc')->paginate(4);
        }else{
            $categorias= Categorias::where($criterio,'like', '%'.$buscar.'%')->orderBy('nombre','asc')->paginate(4);
        }

        
        return [

            'pagination'=>[
                'total'=> $categorias->total(),
                'current_page'=>$categorias->currentPage(),
                'per_page'=>$categorias->perPage(),
                'last_page'=>$categorias->lastPage(),
                'from'=>$categorias->firstItem(),
                'to'=>$categorias->lastItem(),
            ],
                
            
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
    public function update(Request $request)
    {
        $categorias = Categorias::findOrFail($request->id);
        $categorias->nombre = $request->nombre;
        $categorias->save();
    }
    //eliminar datos
    public function destroy(Request $request)
    {
        $categorias = Categorias::findOrFail($request->id);
        $categorias->delete();
    }

    public function getCat(Request $request){
        $categorias= Categorias::orderBy('nombre','asc')->get();

        return[
            'cat'=>$categorias
        ];
    }
}
