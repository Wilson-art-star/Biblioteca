<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Autores;

class AutorController extends Controller
{
    
    public function index(Request $request)
    {
        $buscar=$request->buscar;
        $criterio=$request->criterio;

        if ($buscar=='') {
            $autores = Autores::join('paises','autores.id_pais','=','paises.id')
            ->select('autores.id','autores.nombre','paises.nombre as nomPas')
            ->orderBy('nombre','asc')->paginate(4);
        }else{
            $autores = Autores::join('paises','autores.id_pais','=','paises.id')
            ->select('autores.id','autores.nombre','paises.nombre as nomPas')
            ->where($criterio,'like', '%'.$buscar .'%')
            ->orderBy('nombre','asc')->paginate(4);
        }

        
        return [

            'pagination'=>[
                'total'=> $autores->total(),
                'current_page'=>$autores->currentPage(),
                'per_page'=>$autores->perPage(),
                'last_page'=>$autores->lastPage(),
                'from'=>$autores->firstItem(),
                'to'=>$autores->lastItem(),
            ],
            'autores'=>$autores
        ];
    }

    public function store(Request $request)
    {
        $autores = new Autores();
        $autores->nombre =$request->nombre;
        $autores->id_pais = $request->idPas;
        $autores->save();
    }


    public function update(Request $request)
    {
        $autores = Autores::findOrFail($request->id);
        $autores->nombre =$request->nombre;
        $autores->id_pais = $request->idPas;
        $autores->save();
    }

    public function destroy(Request $request)
    {
        $autores = Autores::findOrFail($request->id);
        $autores->delete();
    }

    public function getAut(Request $request){
        $autores = Autores::orderBy('nombre','asc')->get();

        return[
            'aut'=>$autores
        ];
    }
}
