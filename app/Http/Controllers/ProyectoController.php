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
        $file->move(public_path().'/storage/', $name);
      }

      $proyecto = new Proyecto();
      $proyecto->descripcion = $request->input('descripcion');
      $proyecto->proyecto = $name;
      $proyecto->save();

      return Redirect::to('/menu');

       
    }


    public function edit($id_proyecto)
    {
      $descripcion = DB::table('proyecto')->where('id_proyecto', $id_proyecto)->first();
      $proyecto = DB::table('proyecto')->where('id_proyecto', $id_proyecto)->get();
  
      return view("proyecto.edit", ['descripcion' => $descripcion,'proyecto' => $proyecto]); 
    }


    public function update($id_proyecto)
    {
      $descripcio= $request->get('descripcion');
      $proyecto= $request->get('proyecto');

      try {

        DB::beginTransaction();
        
        $proyecto = DB::table('proyecto')->where('id_proyecto', $id_proyecto)->delete();



        DB::commit();
          
      } catch (Exception $e) {
          DB::rollback();
      }

       
    }

     public function destroy($id)
  {
    
        try {

        DB::beginTransaction();
        
        $proyecto = DB::table('proyecto')->where('id_proyecto', $id)->delete();

        

        DB::commit();
          
      } catch (Exception $e) {
          DB::rollback();
      }
        
       return Redirect::to('/proyecto')->with('proyecto', "Proyecto Eliminado Correctamente");;
  }


  }