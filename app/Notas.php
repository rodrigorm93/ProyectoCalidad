<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notas extends Model
{
    protected $table='notas'; // asignamos la tabla a la cual hara referencia.
   // protected $primaryKey='idAlumno'; //asignamos la PK de nuestra tabla.
   //declaramos una llave compuesta 
   protected $primaryKey = 'idAlumno'; 

	public $timestamps = false;


    protected $fillable = [
        'idMateria','nota','promedio',
    ];

    //tenemos los campos guarder que son los que no queremos que se asignen al modelo

    protected $guarded = [

    ];
}
