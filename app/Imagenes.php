<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imagenes extends Model
{
    protected $table = 'fotos';

    protected $primarykey = 'id_foto';

    public $timestamps = false;

    protected $fillable = [
    	'foto','id_noticia'
    	
    ];
}
