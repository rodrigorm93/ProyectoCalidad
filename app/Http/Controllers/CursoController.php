<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//agregamos nuestro modelo
use App\User;
use App\Profesor;
use App\Notas;
use App\Alumno;
use App\Materia;
use App\Curso;

//hacemos referencias a redirect para hacer algunas redirrecciones
use Illuminate\Support\Facades\Redirect;

//para tebajar con la clase DB de laravel.
use DB;

class CursoController extends Controller
{
    //vamos a declarar un constructor:

    public function __construct()
    {
        //le diremos que gestione el acceso por usuario 
        $this->middleware('auth');

    }
    //Agregamos todo los metodos, al momento de meternos a menu/plantillas el rutas se llamara este controlador el cual nos permitira utilizar estos metodos.
    
    //METODOS :

    public function index(Request $request)
    {

        if($request){
    
            $seccion=DB::table('Notas as n')
            ->join ('Alumno as a', 'a.idAlumno', '=' ,'n.idAlumno') 
            ->join ('Materia as m', 'm.idMateria', '=' ,'n.idMateria') 
            ->join ('Curso as c', 'c.idCurso', '=' ,'m.idCurso')         
            ->select('a.nombre as nombre','a.apellido as apellido','m.nombre as materia','m.idCurso','c.grado')
            ->orderBy('n.idMateria','dec')

            ->paginate(10);
            return view('seccion_curso.index', ["seccion" => $seccion]);
        }
    }


    public function create()
    {


        return view('curso.create');
  
    }

  
    public function createMateria()
    {
        $curso=DB::table('curso as c')
              ->get();

        return view('curso.createMateria',["curso" => $curso]);
  
    }


    public function store(Request $request)
    {   
    	

            try {

            DB::beginTransaction();

        
            $curso = new Curso;
            $curso->grado=$request->get('grado');
            $curso->save();
  
              
            DB::commit();
            
        } catch (Exception $e) {
            DB::rollback();
            
            
        }
            return Redirect::to('/menu');
    }


    public function materiaStore(Request $request)
    {   
    	

            try {

            DB::beginTransaction();

        
            $materia = new Materia;
            $materia->idCurso=$request->get('curso');
            $materia->nombre=$request->get('nombre');
            $materia->estado='activo';
            $materia->idProfesor='0';
            $materia->asignacion='';
            $materia->save();
  
              
            DB::commit();
            
        } catch (Exception $e) {
            DB::rollback();
            
            
        }
            return Redirect::to('/menu');
    }

    public function show($id)
    {
        return view("seccion_curso.show", ["seccion"=>Seccion::findOrFail($idCurso,$idProfesor,$idAlumno)]);
    }

     public function destroy($idCurso,$idProfesor,$idAlumno)
    {
      $seccion= Seccion::find($idCurso,$idProfesor,$idAlumno);
      $seccion->delete();

      return Redirect::to('/menu');
    }






}
