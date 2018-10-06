<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    public $timestamps = false;

    protected $table='curso'; // asignamos la tabla a la cual hara referencia.

    protected $primaryKey='idCurso'; //asignamos la PK de nuestra tabla.


    protected $fillable = [
       'grado','year','semestre'
    ];
}
