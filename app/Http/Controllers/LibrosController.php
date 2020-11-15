<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Libros;

class LibrosController extends Controller
{
    //
    public function index(Request $request)
    {
        $buscar=$request->buscar;
        

        if ($buscar=='') {
            $libro= Libros::join('editorials','libros.id_editorial','=','editorials.id')
            ->join('categorias','libros.id_categoria','=','categorias.id')
            ->join('autores','libros.id_autor','=','autores.id')
            ->join('idiomas','libros.id_idioma','=','idiomas.id')
            ->select('libros.id','libros.nombre','autores.nombre as nomaut','editorials.nombre as nomedit','libros.cantidad')
            ->orderBy('libros.nombre','asc')->paginate(12);
        }else{
            $libro= Libros::join('editorials','libros.id_editorial','=','editorials.id')
            ->join('categorias','libros.id_categoria','=','categorias.id')
            ->join('autores','libros.id_autor','=','autores.id')
            ->join('idiomas','libros.id_idioma','=','idiomas.id')
            ->select('libros.id','libros.nombre','autores.nombre as nomaut','editorials.nombre as nomedit','libros.cantidad')
            ->where('libros.nombre','like','%'.$buscar .'%')
            ->orwhere('libros.id','like','%'.$buscar .'%')
            ->orderBy('libros.nombre','asc')->paginate(12);
        }

        
        return [

            'pagination'=>[
                'total'=> $libro->total(),
                'current_page'=>$libro->currentPage(),
                'per_page'=>$libro->perPage(),
                'last_page'=>$libro->lastPage(),
                'from'=>$libro->firstItem(),
                'to'=>$libro->lastItem(),
            ],
                
            
            'libro'=>$libro
        ];
    }

    public function getLibros(Request $request)
    {
        $buscar=$request->buscar;
        
            $libro= Libros::join('editorials','libros.id_editorial','=','editorials.id')
            ->join('autores','libros.id_autor','=','autores.id')
            ->select('libros.id','libros.nombre','autores.nombre as nomaut','editorials.nombre as nomedit')
            ->where('libros.id', $buscar)
            ->orwhere('libros.nombre','like','%'.$buscar .'%')
            ->orderBy('libros.nombre','asc')->take(1)->get();
        

        
        return [  
            'libro'=>$libro
        ];
    }
}
