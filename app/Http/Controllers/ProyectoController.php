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

    public function show(){

     $proyecto = Proyecto::orderBy('id_proyecto', 'ASC')->paginate(10);
      return view('proyecto.show', compact('proyecto'));
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


    public function edit($id)
    {
     $proyecto = DB::table('proyecto')->where('id_proyecto', $id)->first();

      return view("proyecto.edit", ["proyecto"=>$proyecto]);
    }


    public function update(Request $request,$id)
    {

      $pro = DB::table('proyecto')->where('id_proyecto', $id)->first();
      $des = $pro->descripcion;
      $arch = $pro->proyecto;

      try {

        DB::beginTransaction();

        $proyecto = new Proyecto;


      $proyectoE = DB::table('proyecto')->where('id_proyecto', $id)->delete();

      $proyecto->id_proyecto = $id;

       if($request->file('archivo1')){
        $file = $request->file('archivo1');
        $name = time().$file->getClientOriginalName();
        $file->move(public_path().'/storage/', $name);
        $proyecto->proyecto = $name;
      }
      else{
        $proyecto->proyecto = $arch;
      }

      if ($request->input('descripcion1')) {
        $proyecto->descripcion = $request->input('descripcion1');
        # code...
      }
      else{
        $proyecto->descripcion = $des;

      }
       $proyecto->save();

      DB::commit();
          
      } catch (Exception $e) {
          DB::rollback();
      }

      return Redirect::to('proyecto')->with('success2', "Plan Anual Editado Correctamente");
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