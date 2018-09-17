<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mensajes extends Model
{


	public $timestamps = false;

    protected $table='mensajes'; // asignamos la tabla a la cual hara referencia.

    protected $primaryKey='idMensaje'; //asignamos la PK de nuestra tabla.


    protected $fillable = [
        'email','asusto','descripcion','fecha'
    ];
}
