<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seccion extends Model
{
      protected $table='Seccion'; // asignamos la tabla a la cual hara referencia.

    protected $primaryKey='idCurso'; //asignamos la PK de nuestra tabla.

    //Laravel automaticamente puede adicional a la tabla 2 columnas, estas columnas nos va a permitir ver cuando ha sido creado o modificado el registro.
    //si queremos que se agreguen automaticamente, vamos a crear  una propiedad y le asignamos
    //false si queremos que no se vean estas columnas.
    public $timestamps=false;

    //ahora vamos a especificar los campos que recibiran una valor para poder almacenarlos en la BD

    protected $fillable = [
       'idProfesor','idAlumno','numero_sec','nombre',
    ];

    //tenemos los campos guarder que son los que no queremos que se asignen al modelo

    protected $guarded = [

    ];
}