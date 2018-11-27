<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aviso extends Model
{
    protected $table = 'avisos';

    protected $primarykey = 'id_aviso';

    public $timestamps = false;

    protected $fillable = [
    	'fecha','mensaje','id_curso'
    	
    ];
}
