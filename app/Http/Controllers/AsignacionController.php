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
               
               
                $seccion=DB::table('Notas as n')
                ->join ('Alumno as a', 'a.idAlumno', '=' ,'n.idAlumno') 
                ->join ('Materia as m', 'm.idMateria', '=' ,'n.idMateria') 
                ->join ('Curso as c', 'c.idCurso', '=' ,'m.idCurso')  
                ->where('c.idCurso','=',$idCurso)   
                ->where('a.asignacion','=','ASIGNADO')      
                ->select('a.nombre as nombre','a.apellido as apellido','m.nombre as materia',
                'm.idCurso','c.grado','n.idAlumno','n.idMateria')
                ->orderBy('a.idAlumno','dec')
                ->paginate(100);

                $curso=DB::table('Curso')
                ->where('idCurso','=',$idCurso)
                ->get();       

            return view('seccion_curso.seccion', ["seccion" => $seccion,"curso" => $curso]);
                
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
        $idMateria=substr($idMateria1,0,3);

        $idProfesor1=$request->get('idp');
        
        //EL id tiene que tener 8 digitos
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

            $cantidad = 0;

            $cont = 0;
            $cont2 = 0;

            $contM =0 ;
            $contR =0;

            //REVISAMOS QUE EL ALUMNO NO HAYA ESTADO INSCRITO ANTES EN EL RAMO

            while($contM < count($materias)){
            while($contR < count($idAlumno)){
                  
                if($Asignar[$contR]=='Asignar'){

                $registro = Notas::where("idAlumno","=",$idAlumno[$contR])
                ->where("idMateria","=",$materias[$contM])->count();
                if($registro >0){
                    return Redirect::to('seccion_curso/grado')->with('error', "El Alumno ".$idAlumno[$contR].
                    " Ya fue registrado en ese curso");

                }
            }
                $contR = $contR+1;
            }
            $contM = $contM+1;
        }
                
        //************************************************************************************** */


            //Se recorren y asignan los array
            while($cont < count($idAlumno)){

                 
                if($Asignar[$cont]=='Asignar'){
             //ACTUALIZAMOS LOS REGISTROS DE ALUMMNO PAra que digan que ya esta en un curso 

             
            Alumno::where('idAlumno', '=', $idAlumno[$cont])
                   ->update(['asignacion' => 'ASIGNADO']);

             $cantidad = $cantidad+1;

            

            //Asignar todas las materias del grado correspondienta para cada alumno
            while($cont2 < count($materias)){
             $notas = new Notas;
            $notas->idAlumno=$idAlumno[$cont];
            $notas->idMateria=$materias[$cont2];
            $notas->n1='0';
            $notas->n2='0';
            $notas->n3='0';
            $notas->n4='0';
            $notas->n5='0';
            $notas->n6='0';
            $notas->n7='0';
            $notas->n8='0';
            $notas->n9='0';
            $notas->n10='0';
            $notas->n11='0';
            $notas->n12='0';

            $notas->promedio_s1='0';
            $notas->promedio_s2='0';
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
       

        return Redirect::to('menu')->with('success2', "Se han ingresado ".$cantidad." datos correctamente");

    }


    public function show($id)
    {
        return view("seccion_curso.show", ["seccion"=>Seccion::findOrFail($idCurso,$idProfesor,$idAlumno)]);
    }

    //Para eliminar una materia a un alumno
     public function destroyMateria(Request $request)
    {
       
    //Eliminamos al alumno de un curso 
     // $nota = Notas::find($idAlumno);
      //$nota->delete();

    //Actualizamos al alumnos como no asignado a ningun curso
    //  $alumno = Alumno::find($idAlumno);
    //  $alumno->asignacion= 'No asignado';
     // $alumno->update();

        //codigo para actualzir el registro de notas PRUEBA

        $idAlumno=$request->get('idAlumno');
        $idMateria=$request->get('idMateria');

       
  try {

            DB::beginTransaction();

            //Eliminamos una materia a un alumno seleccionado
             Notas::where('idAlumno',$idAlumno )
             ->where('idMateria', $idMateria)
             ->delete();

         

            DB::commit();
            
        } catch (Exception $e) {
            DB::rollback();
            
            
        }
        return Redirect::to('/seccion_curso');
      
    }



    //Para eliminar una materia a un alumno
    public function destroy($idAlumno)
    {
       

    //Eliminamos al alumno de un curso 
      $nota = Notas::find($idAlumno);
      $nota->delete();

     $alumno = Alumno::find($idAlumno);
     $alumno->asignacion= 'No asignado';
     $alumno->update();
 

    //Actualizamos al alumnos como no asignado a ningun curso
   

            return Redirect::to('/seccion_curso');
      
      
    }


     //Reiniciar Curso 
     public function reiniciarCurso(Request $request)
     {
        
        $idAlumno = $request->get('Alumnos');
        $cont = 0;
               
  try {
        while($cont < count($idAlumno)){
 
            //Lo dejamos libre 
            Alumno::where('idAlumno', '=', $idAlumno[$cont])
                   ->update(['asignacion' => 'No asignado']);

     //Eliminamos al alumno de un curso 

     //Notas::where('idAlumno',$idAlumno[$cont])
            // ->delete();

      // $nota = Notas::find($idAlumno[$cont]);
      // $nota->delete();
      
      DB::commit();
      $cont= $cont+1;
        }

            
        } catch (Exception $e) {
            DB::rollback();
            
            
        }
 
     //Actualizamos al alumnos como no asignado a ningun curso
    
 
             return Redirect::to('/seccion_curso');
       
       
     }


}
