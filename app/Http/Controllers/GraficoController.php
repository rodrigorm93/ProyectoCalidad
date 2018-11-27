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

     
      return view('grafico.index');
    }

  }