<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Contracts\Auth\Guard;
use Alert;

//Modelos
use App\Proyecto;



use Image; 
use DB;
use PDF;
use Illuminate\Support\Facades\Input;



class ProyectoController extends Controller
{
    protected $auth;
   
    //vamos a declarar un constructor:
    public function __construct(Guard $auth)
    {
        //le diremos que gestione el acceso por usuario 
    }

    public function index(){
  
         return view('proyecto.index');
    }


    public function create(Guard $auth){

      return view('proyecto.index');

    }

    public function store(Request $request){

      if($request->file('archivo')){
        $file = $request->file('archivo');
        $name = time().$file->getClientOriginalName();
        $file->move(public_path().'/archivos/', $name);
      }

      $proyecto = new Proyecto();
      $proyecto->descripcion = $request->input('descripcion');
      $proyecto->proyecto = $name;
      $proyecto->save();

      return Redirect::to('/menu');

       
    }

    public function show($id_noticia)
    {
    
    }


    public function edit($id_noticia)
    {
       
    }


  }