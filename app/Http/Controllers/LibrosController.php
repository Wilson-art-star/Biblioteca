<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Libros;

class LibrosController extends Controller
{
    //
    public function index2(Request $request)
    {
        $buscar=$request->buscar;
        $criterio=$request->criterio;

        if ($buscar=='') {
            $libro= Libros::join('editorials','libros.id_editorial','=','editorials.id')
            ->join('categorias','libros.id_categoria','=','categorias.id')
            ->join('autores','libros.id_autor','=','autores.id')
            ->join('idiomas','libros.id_idioma','=','idiomas.id')
            ->select('libros.id','libros.nombre','libros.cantidad','libros.ano_publicado','libros.num_paginas','libros.ubicacion','libros.edicion',
            'editorials.nombre as nomEdit','categorias.nombre as nomCat','autores.nombre as nomAut','idiomas.nombre as nomIdi')
            ->orderBy('nombre','asc')->paginate(4);
        }else{
            $libro= Libros::join('editorials','libros.id_editorial','=','editorials.id')
            ->join('categorias','libros.id_categoria','=','categorias.id')
            ->join('autores','libros.id_autor','=','autores.id')
            ->join('idiomas','libros.id_idioma','=','idiomas.id')
            ->select('libros.id','libros.nombre','libros.cantidad','libros.ano_publicado','libros.num_paginas','libros.ubicacion','libros.edicion',
            'editorials.nombre as nomEdit','categorias.nombre as nomCat','autores.nombre as nomAut','idiomas.nombre as nomIdi')
            ->where($criterio,'like', '%'.$buscar.'%')
            ->orderBy('nombre','asc')->paginate(4);
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

    //guardar datos
    public function store(Request $request)
    {
        $libro = new Libros();
        $libro->nombre=$request->nombre;
        $libro->cantidad=$request->cantidad;
        $libro->ano_publicado=$request->ano_publicado;
        $libro->num_paginas=$request->num_paginas;
        $libro->ubicacion=$request->ubicacion;
        $libro->edicion=$request->edicion;
    
        $libro->id_editorial = $request->idEdi;
        $libro->id_categoria = $request->idCat;
        $libro->id_autor= $request->idAut;
        $libro->id_idioma= $request->idIdm;
        $libro->save();

    }

    //actualizar datos
    public function update(Request $request)
    {
        $libro = Libros::findOrFail($request->id);
        $libro->nombre=$request->nombre;
        $libro->cantidad=$request->cantidad;
        $libro->ano_publicado=$request->ano_publicado;
        $libro->num_paginas=$request->num_paginas;
        $libro->ubicacion=$request->ubicacion;
        $libro->edicion=$request->edicion;
    
        $libro->id_editorial = $request->idEdi;
        $libro->id_categoria = $request->idCat;
        $libro->id_autor= $request->idAut;
        $libro->id_idioma= $request->idIdm;
        $libro->save();
    }
    //eliminar datos
    public function destroy(Request $request)
    {
        $libro = Libros::findOrFail($request->id);
        $libro->delete();
    }


}
