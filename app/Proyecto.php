<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
    public $timestamps = false;
    
    protected $table='proyecto';

    protected $primarykey='id_proyecto';

   

    protected $fillable = [
    	'descripcion','proyecto',
    	
    ];
}