<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Libros extends Model
{
    //
    protected $table = 'libros';
    protected $fillable=['id','id_editorial','id_categoria','id_autor','id_idioma','nombre','cantidad','ano_publicado','num_paginas','ubicación','edicion'];
}
