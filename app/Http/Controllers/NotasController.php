<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

//agregamos nuestro modelo
use App\User;
use App\Alumno;
use App\Notas;

//use asistencias\Alumno;
//hacemos referencias a redirect para hacer algunas redirrecciones
use Illuminate\Support\Facades\Redirect;
//Hacemos referencia a nuestro request
use App\Http\Requests\UsuarioFormRequest;
//para trabajar con la clase DB de laravel.
use DB;
use Illuminate\Contracts\Auth\Guard;
use Closure;
use Session;

class NotasController extends Controller
{
    //vamos a declarar un constructor:

    public function __construct(Guard $auth)
    {
        //le diremos que gestione el acceso por usuario 
        $this->middleware('auth');
        $this->auth =$auth;


    }
    //Agregamos todo los metodos, al momento de meternos a menu/plantillas el rutas se llamara este controlador el cual nos permitira utilizar estos metodos.
    
    //METODOS :

    public function index(Request $request)
    {
        //Redondeamos el promedio final 
        $aprobados=DB::table('Notas as n')
       ->join ('Alumno as a', 'a.idAlumno', '=' , 'n.idAlumno')
       ->select( 'n.idAlumno', DB::raw( 'round(AVG( n.promedio ),0) as promedioFinal' ))
       ->groupBy('n.idAlumno')      
       ->get();





            return view('notas.index',["aprobados" => $aprobados]);
        
    
}



    public function verPorCurso()
    {
             
        $curso=DB::table('Curso')
        ->get();

      
             
        return view('notas.grado',['curso'=> $curso]);
  
    }


    //Guardamos el Promedio Final ya redondeado a la tabla alumno con el estado 
    // A = aprobado, R = reprobado
    public function updatePromedio(Request $request)
    {   
        //Agregamos el promedio Final a la tabla Alumno
        try {

            DB::beginTransaction();

        $idAlumno=$request->get('idAlumno');
        $promedioFinal=$request->get('promedioFinal');
        $estado=$request->get('estado');

        $cantidad=count($idAlumno);

        $cont=0;
        while($cont < count($idAlumno)){
     
        Alumno::where('idAlumno', '=', $idAlumno[$cont])
        ->update(['promedioFinal' => $promedioFinal[$cont],'estado_curso' => $estado[$cont]]);

        $cont = $cont+1;
        }

        DB::commit();
        return Redirect::to('/menu')->with('success2', "Se han ingresado ".$cantidad."/".$cont." Promedios correctamente");
    } catch (Exception $e) {
        DB::rollback();
        
        
    }
   


    }

    //Vemos el Promedio final de cada alumno redondeado 
    public function verEstadoAlumnos(Request $request)
    {
        $idCurso = $request->get('idCurso2');
 
        $alumnos=DB::table('Notas as n')
        ->join ('Materia as m', 'm.idMateria', '=' ,'n.idMateria') 
        ->join ('Curso as c', 'c.idCurso', '=' ,'m.idCurso') 
        ->join ('Alumno as a', 'a.idAlumno', '=' ,'n.idAlumno')        
        ->where('a.asignacion', '=','ASIGNADO')
        ->where('a.promedioFinal', '=',0)
        ->where('c.idCurso', '=',$idCurso)
        ->select( 'n.idAlumno', DB::raw( 'round(AVG( n.promedio ),0) as promedioFinal' ))
        ->groupBy('n.idAlumno')      
        ->get();


        return view('notas.estadoPorCurso',['alumnos'=> $alumnos]);
    }



    public function edit($id)
    {
    }

    public function update(Request $request, $id)
    {
    
    }

    
    //Eliminamos de la tabla usuario, alumno y su registros de notas
    public function destroy($id)
    {
    
    
    }


}
