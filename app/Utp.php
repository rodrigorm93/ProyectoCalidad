<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Utp extends Model
{
    public $timestamps = false;

    protected $table='utp'; // asignamos la tabla a la cual hara referencia.

    protected $primaryKey='id_utp'; //asignamos la PK de nuestra tabla.


    protected $fillable = [
       'nombre','apellido'
    ];
}
