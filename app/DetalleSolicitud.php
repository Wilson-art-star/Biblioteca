<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetalleSolicitud extends Model
{
    //
    protected $table = 'detalle_solicituds';
    protected $fillable=['id','id_solicitud','id_libro','cant'];
     
}
