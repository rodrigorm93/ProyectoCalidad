<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    public $timestamps = false;

    protected $table='alumno'; // asignamos la tabla a la cual hara referencia.

    protected $primaryKey='idAlumno'; //asignamos la PK de nuestra tabla.


    protected $fillable = [
       'nombre','apellido','ingreso','asignacion'
    ];
}
