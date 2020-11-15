<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Persona;

class PersonasController extends Controller
{
    //
    public function getPersona(Request $request){
        $perso= Persona::orderBy('nombres','asc')->get();

        return[
            'perso'=>$perso
        ];
    
    }
}
