<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Contracts\Auth\Guard;
use Alert;

//Modelos
use App\alumno;



use Image; 
use DB;
use Illuminate\Support\Facades\Input;



class GraficoController extends Controller
{
    protected $auth;
   
    //vamos a declarar un constructor:
    public function __construct(Guard $auth)
    {
        //le diremos que gestione el acceso por usuario 
    }

    public function index(){

     $alumno=DB::table('alumno')
     ->get();

     $aprob = '0';
     $naprob = '0';
     $aprobm = '0';
     $pa = '0';

     foreach($alumno as $a){
            if($a->estado_curso == 'NA'){
                $naprob = $naprob + '1';
            }
            if(($a->estado_curso == 'A') || ($a->estado_curso == 'AM')){
                $aprob = $aprob + '1';
                
            }
            if($a->estado_curso == 'PA'){
                $pa = $pa + '1';
            }
        }

        return view('grafico.index', ['alumno' => $alumno, 'aprob' => $aprob, 'naprob' => $naprob,'aprobm' => $aprobm,'pa' => $pa]);
      
      
    }

  }