<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Director extends Model
{
    public $timestamps = false;

    protected $table='director'; // asignamos la tabla a la cual hara referencia.

    protected $primaryKey='id_director'; //asignamos la PK de nuestra tabla.


    protected $fillable = [
       'nombre','apellido'
    ];
}
