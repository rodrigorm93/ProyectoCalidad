<?php

namespace asistencia;

use Illuminate\Database\Eloquent\Model;

class Asistencia extends Model
{
    //
    public $timestamps = false;

    protected $table='Asistencia'; // asignamos la tabla a la cual hara referencia.

    protected $primaryKey='idPlantilla'; //asignamos la PK de nuestra tabla.


    protected $fillable = [
        'idAlumno', 'presente', 
    ];
}
