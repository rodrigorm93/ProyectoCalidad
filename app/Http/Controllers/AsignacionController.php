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

        $curso=DB::table('Curso')
        ->get();

            return view('seccion_curso.index', ["curso" => $curso]);
        
    }

    public function EliminarSeccion(Request $request)
    {
        $idCurso = $request->get('idCurso');
       
       
            /*
            $seccion=DB::table('Notas as n')
            ->join ('Alumno as a', 'a.idAlumno', '=' ,'n.idAlumno') 
            ->join ('Materia as m', 'm.idMateria', '=' ,'n.idMateria') 
            ->join ('Curso as c', 'c.idCurso', '=' ,'m.idCurso')  
            ->where('c.idCurso','=',$idCurso)       
            ->select('a.nombre as nombre','a.apellido as apellido','m.nombre as materia',
            'm.idCurso','c.grado','n.idAlumno','n.idMateria')
            ->orderBy('n.idMateria','dec')
            ->paginate(40);
                */
                if($request){
               
                $seccion=DB::table('Notas as n')
                ->join ('Alumno as a', 'a.idAlumno', '=' ,'n.idAlumno') 
                ->join ('Materia as m', 'm.idMateria', '=' ,'n.idMateria') 
                ->join ('Curso as c', 'c.idCurso', '=' ,'m.idCurso')  
                ->where('c.idCurso','=',$idCurso)       
                ->select('a.nombre as nombre','a.apellido as apellido','m.nombre as materia',
                'm.idCurso','c.grado','n.idAlumno','n.idMateria')
                ->orderBy('a.idAlumno','dec')
                ->paginate(100);

            return view('seccion_curso.seccion', ["seccion" => $seccion]);
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
        ->where('asignacion', '=','No asignado')
        ->get();
              
        return view('seccion_curso.create',['materia'=> $materia,'alumno'=> $alumno]);
  
    }



    //Asiganacion de profesores a los cursos

    public function asignarP(Request $request)
    {
      //Cargamos los cursos y profesores que aun no esten asigandos

        $materia=DB::table('materia as m')  
        ->where('m.estado', '<>', 'inactivo')
        ->where('m.asignacion', '!=','ASIGNADO')
        ->get();


        $profesor = DB::table('profesor')
       // ->where('asignacion', '!=','ASIGNADO')
        ->get();

        $curso = DB::table('curso')
       // ->where('asignacion', '!=','ASIGNADO')
        ->get();

        return view('seccion_curso.asignarP',['materia'=> $materia,'profesor'=> $profesor,'curso'=> $curso]);
            
  
    }

    //Guardamos las asiganciones
    public function asignarPStore(Request $request)
    {
    
        //$idProfesor=$request->get('idp');
        //$idMateria=$request->get('materia');
        //$idCurso=$request->get('curso');

        $idMateria1=$request->get('materia');
        //para extrar solo el id y no la cadena completa(funciona si el id es de dos digitos) 
        $idMateria=substr($idMateria1,0,2);

        $idProfesor1=$request->get('idp');
        //para extrar solo el id y no la cadena completa(funciona si el id es de dos digitos) 
        $idProfesor=substr($idProfesor1,0,8);


        try {

            DB::beginTransaction();

             
             
             Materia::where('idMateria', '=', $idMateria)
            // ->where('idCurso', '=', $idCurso)
                   ->update(['asignacion' => 'ASIGNADO','idProfesor' => $idProfesor]);
                    
             //Profesor::where('idProfesor', '=', $idProfesor)
             //->update(['asignacion' => 'ASIGNADO']);

            DB::commit();
            
        } catch (Exception $e) {
            DB::rollback();
            
        }

        $materia=DB::table('materia as m')  
        ->where('m.estado', '<>', 'inactivo')
        ->where('m.asignacion', '!=','ASIGNADO')
        ->get();


        $profesor = DB::table('profesor')
       // ->where('asignacion', '!=','ASIGNADO')
        ->get();

         return view('seccion_curso.asignarP',['materia'=> $materia,'profesor'=> $profesor]);
            
  
    }


    public function store(Request $request)
    {   
    	

            try {

            DB::beginTransaction();

           
            //Se crean los array de los siguientes datos:
            $idAlumno=$request->get('idAlumno');
            $Asignar=$request->get('select');
            $idCurso=$request->get('idCurso');
            $materias=$request->get('idMateria');

            $cont = 0;
            $cont2 = 0;


            //Se recorren y asignan los array
            while($cont < count($idAlumno)){

                 
                if($Asignar[$cont]=='Asignar'){
             //ACTUALIZAMOS LOS REGISTROS DE ALUMMNO PAra que digan que ya esta en un curso 

             
            Alumno::where('idAlumno', '=', $idAlumno[$cont])
                   ->update(['asignacion' => 'ASIGNADO']);

            

            //Asignar todas las materias del grado correspondienta para cada alumno
            while($cont2 < count($materias)){
             $notas = new Notas;
            $notas->idAlumno=$idAlumno[$cont];
            $notas->idMateria=$materias[$cont2];
            $notas->nota='0';
            $notas->promedio='0';
            $notas->save();

            $cont2 = $cont2+1;
            }

                }
               

                $cont = $cont+1;
                $cont2 = 0;
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

     public function destroy($idAlumno)
    {
       
    //Eliminamos al alumno de un curso 
      $nota = Notas::find($idAlumno);
      $nota->delete();

    //Actualizamos al alumnos como no asignado a ningun curso
      $alumno = Alumno::find($idAlumno);
      $alumno->asignacion= 'No asignado';
      $alumno->update();

      return Redirect::to('/seccion_curso');
    }






}
