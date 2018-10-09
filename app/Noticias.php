<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Noticias extends Model
{
    public $timestamps = false;
    protected $table='noticias';

    protected $primarykey='id_noticia';

   

    protected $fillable = [
    	'descripcion','fecha','titulo',
    	
    ];
}
