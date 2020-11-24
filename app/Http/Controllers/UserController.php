<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    //mostrar datos de la tabla
    public function index(Request $request)
    {
        $buscar=$request->buscar;
        $criterio=$request->criterio;

        if ($buscar=='') {
            $user= User::orderBy('name','asc')->paginate(4);
        }else{
            $user= User::where($criterio,'like', '%'.$buscar.'%')-orderBy('name','asc')->paginate(4);
        }

        
        return [

            'pagination'=>[
                'total'=> $user->total(),
                'current_page'=>$user->currentPage(),
                'per_page'=>$user->perPage(),
                'last_page'=>$user->lastPage(),
                'from'=>$user->firstItem(),
                'to'=>$user->lastItem(),
            ],
                
            
            'user'=>$user
        ];
    }
   

    //guardar datos
    public function store(Request $request)
    {
        $user= new User();
        $user->nombre = $request->nombre;
        //$user->password = bcript() $request->password;
        $user->save();

    }

    //actualizar datos
    public function update(Request $request)
    {
        $user = User::findOrFail($request->id);
        $user->nombre = $request->nombre;
        $user->save();
    }
    //eliminar datos
    public function destroy(Request $request)
    {
        $user = User::findOrFail($request->id);
        $user->delete();
    }

    public function getUse(Request $request){
        $user= User::orderBy('nombre','asc')->get();

        return[
            'user'=>$user
        ];
    }
    //
}
