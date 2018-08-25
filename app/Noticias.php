<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Noticias extends Model
{
    protected $table = 'noticias';

    protected $primarykey = 'id_noticia';

    public $timestamps = false;

    protected $fillable = [
    	'descripcion','fecha','titulo',
    	
    ];
}
