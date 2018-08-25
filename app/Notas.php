<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notas extends Model
{

	public $incrementing = false;

	public $timestamps = false;

    protected $table='notas'; // asignamos la tabla a la cual hara referencia.

    protected $primaryKey='idAlumno'; //asignamos la PK de nuestra tabla.


    protected $fillable = [
        'idMateria','nota','promedio',
    ];
}
