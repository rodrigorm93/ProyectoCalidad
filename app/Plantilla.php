<?php

namespace asistencia;

use Illuminate\Database\Eloquent\Model;

class Plantilla extends Model
{
    //

	public $timestamps = false;

    protected $table='Plantilla'; // asignamos la tabla a la cual hara referencia.

    protected $primaryKey='idPlantilla'; //asignamos la PK de nuestra tabla.


    protected $fillable = [
        'idCurso', 'idProfesor', 'fecha',
    ];
}
