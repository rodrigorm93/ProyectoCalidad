<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profesor extends Model
{
    public $timestamps = false;

    protected $table='profesor'; // asignamos la tabla a la cual hara referencia.

    protected $primaryKey='idProfesor'; //asignamos la PK de nuestra tabla.


    protected $fillable = [
        'nombre','apellido'
    ];
}
