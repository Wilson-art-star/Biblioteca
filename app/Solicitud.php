<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Solicitud extends Model
{
    //
    protected $table = 'solicituds';
    protected $fillable=['id','fecha_solicitud','fecha_entrega','id_persona'];  
}
