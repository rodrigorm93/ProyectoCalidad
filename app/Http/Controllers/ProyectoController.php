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

     $proyecto = Proyecto::orderBy('id_proyecto', 'ASC')->paginate(10);
      return view('proyecto.index', compact('proyecto'));
    }


    public function create(Guard $auth){

      return view('proyecto.create');

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

    public function show($id_proyecto)
    {
    
    }


    public function edit($id_proyecto)
    {
       return view('proyecto.edit');
    }

     public function destroy($id_proyecto)
  {
    $proyecto = Proyecto::find($id_proyecto);
    $proyecto->delete();

     try {
            DB::beginTransaction();
            
            $proyecto = Proyecto::find($id_proyecto);
            $proyecto->delete();
            
            DB::commit();
        
        } catch (Exception $e) {
            DB::rollback();
        }
        
        return Redirect::to('/proyecto')->with('success', "Registro Eliminado Correctamente");
  }


  }