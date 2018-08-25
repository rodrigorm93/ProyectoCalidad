<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{

	public $incrementing = false;

	public $timestamps = false;

    protected $table='materia'; // asignamos la tabla a la cual hara referencia.

    protected $primaryKey='idMateria'; //asignamos la PK de nuestra tabla.


    protected $fillable = [
        'nombre','estado','asignacion','idProfesor','estado',
    ];
}
