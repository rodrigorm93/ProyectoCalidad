<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//agregamos nuestro modelo
use App\User;
use App\Profesor;
use App\Notas;
use App\Alumno;
use App\Materia;

//hacemos referencias a redirect para hacer algunas redirrecciones
use Illuminate\Support\Facades\Redirect;

//para tebajar con la clase DB de laravel.
use DB;

class AsignacionController extends Controller
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

  
    }

    //Asigancion de los aleumnos a los cursos

    public function grado()
    {

        $curso=DB::table('Curso')
        ->get();

              
        return view('seccion_curso.grado',['curso'=> $curso]);
  
    }

    public function asignar(Request $request)
    {
        $idCurso = $request->get('idCurso');

        $materia=DB::table('Materia as m')
        ->join ('Curso as c', 'c.idCurso', '=' ,'m.idCurso')             
        ->where('m.asignacion', '=','ASIGNADO')
        ->where('m.idCurso', '=',$idCurso)
        ->get();

        $profesor = DB::table('users as u')
        ->join ('Profesor as p', 'p.idProfesor', '=' , 'u.id')
        ->get();

        
       // $alumno = DB::table('users as u')
        //->join ('Alumno as a', 'a.idAlumno', '=' , 'u.id')
        //->get();

        $alumno = DB::table('alumno')
        //->join ('Alumno as a', 'a.idAlumno', '=' , 'u.id')
        ->get();
              
        return view('seccion_curso.asignar',['materia'=> $materia,'alumno'=> $alumno]);
  
    }



    public function asignar2(Request $request)
    {
        $idProfesor = $request->get('idProfesor');
        $idMateria= $request->get('idMateria');
        $idAlumno= $request->get('idAlumno');


        $materia=DB::table('materia')    
        ->where('estado', '<>', 'inactivo')
        ->where('idMateria', '=',$idMateria)
        ->get();

         $profesor = DB::table('profesor')
          ->where('idProfesor', '=',$idProfesor)
            ->get();

        
     
            $alumno = DB::table('alumno')
            ->get();

     

       
        return view('seccion_curso.create',['materia'=> $materia,'profesor'=> $profesor,
            'alumno'=> $alumno]);
            
  

    }

    //Asiganacion de profesores a los cursos

    public function asignarP(Request $request)
    {
      //Cargamos los cursos y profesores que aun no esten asigandos

        $materia=DB::table('materia')    
        ->where('estado', '<>', 'inactivo')
        ->where('asignacion', '!=','ASIGNADO')
        ->get();


        $profesor = DB::table('profesor')
       // ->where('asignacion', '!=','ASIGNADO')
        ->get();

        return view('seccion_curso.asignarP',['materia'=> $materia,'profesor'=> $profesor]);
            
  
    }

    //Guardamos las asiganciones
    public function asignarPStore(Request $request)
    {
    
        $idProfesor=$request->get('idp');
        $idMateria=$request->get('materia');
        $idCurso=$request->get('curso');
        try {

            DB::beginTransaction();

             
             
             Materia::where('idMateria', '=', $idMateria)
             ->where('idCurso', '=', $idCurso)
                   ->update(['asignacion' => 'ASIGNADO','idProfesor' => $idProfesor]);
                    
             Profesor::where('idProfesor', '=', $idProfesor)
             ->update(['asignacion' => 'ASIGNADO']);

            DB::commit();
            
        } catch (Exception $e) {
            DB::rollback();
            
        }
            return Redirect::to('/menu');
            
  
    }


    public function store(Request $request)
    {   
    	

            try {

            DB::beginTransaction();

           
            //Se crean los array de los siguientes datos:
            $idAlumno=$request->get('idAlumno');
            $Asignar=$request->get('select');
            $idMateria=$request->get('Materia');

            $cont = 0;

            //Se recorren y asignan los array
            while($cont < count($idAlumno)){

                 
                if($Asignar[$cont]=='Asignar'){
             //ACTUALIZAMOS LOS REGISTROS DE ALUMMNO PAra que digan que ya esta en un curso 

             
            /* Alumno::where('idAlumno', '=', $idAlumno[$cont])
                   ->update(['asignacion' => 'ASIGNADO']);*/

            $notas = new Notas;
            $notas->idAlumno=$idAlumno[$cont];
            $notas->idMateria=$request->get('Materia');
            $notas->nota='0';
            $notas->promedio='0';
            $notas->save();
  
                }
               

                $cont = $cont+1;
            }

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
