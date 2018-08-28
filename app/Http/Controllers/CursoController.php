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

       
           
        $curso=DB::table('Curso')
        ->get();

             
        return view('curso.grado',['curso'=> $curso]);

        
    }

    public function ver_materias(Request $request)
    {
        $idCurso = $request->get('idCurso');
        
        /*
        $materia=DB::table('Materia as m')
        ->join ('Curso as c', 'c.idCurso', '=' ,'m.idCurso')
        ->join ('Notas as n', 'n.idMateria', '=' ,'m.idMateria')
        ->select('m.idMateria','n.idAlumno','c.grado','m.nombre')              
        ->where('m.asignacion', '=','ASIGNADO')
        ->where('m.idCurso', '=',$idCurso)
        ->distinct()->get();
*/
        $materia=DB::table('Materia as m')
        ->join ('Curso as c', 'c.idCurso', '=' ,'m.idCurso')      
        ->where('m.asignacion', '=','ASIGNADO')
        ->where('m.idCurso', '=',$idCurso)
        ->paginate(10);
     

              
        return view('curso.ver_materias',['materia'=> $materia]);
  
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
            return Redirect::to('/curso/createMateria');
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
            return Redirect::to('/seccion_curso/asignarP');
    }



     public function destroy(Request $request,$idMateria)
    {
       
        try {
            $cont=0;
            //capturamos los id de los alumnos que estan en la materia eliminada
            $idAlumno=$request->get('idAlumno');

            DB::beginTransaction();

        //Eliminamos la materia 
      $materia= Materia::find($idMateria);
      $materia->delete();

      //Eliminamos todos los alumnos asigandos a esa materia
     

      while($cont < count($idAlumno)){
          
        Alumno::where('idAlumno', '=', $idAlumno[$cont])
        ->update(['asignacion' => 'No asignado']);

        $notas= Notas::find($idAlumno[$cont]);
        $notas->delete();
        $cont = $cont+1;
      }

      DB::commit();
            
    } catch (Exception $e) {
        DB::rollback();
        
        
    }

      return Redirect::to('/menu');
    }






}
