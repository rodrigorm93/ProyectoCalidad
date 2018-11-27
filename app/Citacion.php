<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Citacion extends Model
{
    protected $table = 'citaciones';

    protected $primarykey = 'id_citacion';

    public $timestamps = false;

    protected $fillable = [
    	'fecha','mensaje','id_alumno'
    	
    ];
}
