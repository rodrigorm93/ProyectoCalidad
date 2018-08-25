<?php

namespace asistencia;

use Illuminate\Database\Eloquent\Model;

class Historial extends Model
{
    //
    public $timestamps = false;

    protected $table='Historial'; // asignamos la tabla a la cual hara referencia.

    protected $primaryKey='id'; //asignamos la PK de nuestra tabla.

    protected $fillable = [
        'fecha', 'registro',
    ];
}
