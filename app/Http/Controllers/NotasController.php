<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

//agregamos nuestro modelo
use App\User;
use App\Alumno;
use App\Notas;
use App\Curso;
use App\Materia;


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

    //Funcion para guardar las notas de cada alumno
    //configurado par aingresar 8 y 12 notas
    public function ingresarNotas(Request $request)
    {   
        $idAlumno=$request->get('idAlumno');
        $idMateria=$request->get('idMateria');
        $nombreMateria=$request->get('nombreMateria');
        $semestre=$request->get('semestre');
        $numeroNotas2=$request->get('numNotas');

        $promedio_s1=$request->get('promedio_s1');
        $promedio_s2=$request->get('promedio_s2');

        //Todas las notas que son maximo 12 y minimo 4
        $n1=$request->get('n1');
        $n2=$request->get('n2');
        $n3=$request->get('n3');
        $n4=$request->get('n4');
        $n5=$request->get('n5');
        $n6=$request->get('n6');
        $n7=$request->get('n7');
        $n8=$request->get('n8');
        $n9=$request->get('n9');
        $n10=$request->get('n10');
        $n11=$request->get('n11');
        $n12=$request->get('n12');


        //Clcularemos el promedio cada vez que se ingresen notas
        $cont = 0;
        $cont2 = 0;
        $cont3 = 0;
        
        //Guardamos la suma de todas las notas
        $sumaN =0;
        //calculamos el promedio de los dos semestres
       
    
  
        //calculamos el promedio y guardamos cada nota
    while($cont2 < count($idAlumno)){

        //guardamos cada nota en un array para luego sacar su promedio 
        if( $numeroNotas2 == '12' && $semestre=='1' ){
        $notas1 = array($n1[$cont2],$n2[$cont2],$n3[$cont2],$n4[$cont2],$n5[$cont2],$n6[$cont2]);
        $numeroNotas = 6;

        while($cont < count($notas1)){
            $sumaN = $sumaN + $notas1[$cont];
            $cont = $cont+1;
        }
      $promedioSemestre1[$cont2] = $sumaN/$numeroNotas;
   

        }else if($numeroNotas2 == '12' && $semestre=='2' ){
            $notas2 = array($n7[$cont2],$n8[$cont2],$n9[$cont2],$n10[$cont2],$n11[$cont2],$n12[$cont2]);
            $numeroNotas = 6;

        while($cont < count($notas2)){
            $sumaN = $sumaN + $notas2[$cont];
            $cont = $cont+1;
        }
    
        $promedioSemestre2[$cont2] = $sumaN/$numeroNotas;
         //Calculamos el promedio final de la materia
        $promedioFinal[$cont2]=($promedio_s1[$cont2] + $promedioSemestre2[$cont2])/2;
      
        //Para el caso de las demas materias que solo necesitan 4 notas
        //solo veremos en que semestre estamos para ir calculando sus promedios

        }else if($numeroNotas2 == '8' && $semestre=='1' ){

        $notas1 = array($n1[$cont2],$n2[$cont2],$n3[$cont2],$n4[$cont2]);
        $numeroNotas = 4;

        while($cont < count($notas1)){
            $sumaN = $sumaN + $notas1[$cont];
            $cont = $cont+1;
        }
      $promedioSemestre1[$cont2] = $sumaN/$numeroNotas;
      //Semestre 2:
        }else if($numeroNotas2 == '8' && $semestre=='2' ){
            $notas2 = array($n5[$cont2],$n6[$cont2],$n7[$cont2],$n8[$cont2]);
            $numeroNotas = 4;

        while($cont < count($notas2)){
            $sumaN = $sumaN + $notas2[$cont];
            $cont = $cont+1;
        }
    
        $promedioSemestre2[$cont2] = $sumaN/$numeroNotas;
          //Calculamos el promedio final de la materia
         $promedioFinal[$cont2]=($promedio_s1[$cont2] + $promedioSemestre2[$cont2])/2;
        
        }else if($numeroNotas2 == '6' && $semestre=='1' ){

            $notas1 = array($n1[$cont2],$n2[$cont2],$n3[$cont2]);
            $numeroNotas = 3;
    
            while($cont < count($notas1)){
                $sumaN = $sumaN + $notas1[$cont];
                $cont = $cont+1;
            }
          $promedioSemestre1[$cont2] = $sumaN/$numeroNotas;
          //Semestre 2:
            }else if($numeroNotas2 == '6' && $semestre=='2' ){
                $notas2 = array($n4[$cont2],$n5[$cont2],$n6[$cont2]);
                $numeroNotas = 3;
    
            while($cont < count($notas2)){
                $sumaN = $sumaN + $notas2[$cont];
                $cont = $cont+1;
            }
        
            $promedioSemestre2[$cont2] = $sumaN/$numeroNotas;
              //Calculamos el promedio final de la materia
             $promedioFinal[$cont2]=($promedio_s1[$cont2] + $promedioSemestre2[$cont2])/2;
            
            }


     
        
     
        //Guardamos los datos dependiendo del semestre
        if($numeroNotas2 == '12' && $numeroNotas2 == '1'){
              //guardamos las notas de cada alumno que esta en esa materia
     Notas::where('idAlumno', '=', $idAlumno[$cont2])
     ->where('idMateria', $idMateria)
     ->update(['n1' => $n1[$cont2],
     'n2' => $n2[$cont2],
     'n3' => $n3[$cont2],
     'n4' => $n4[$cont2],
     'n5' => $n5[$cont2],
     'n6' => $n6[$cont2],
     'promedio_s1' => $promedioSemestre1[$cont2]
     ]);
    
     //Caso contrario que seria el segundo semestre y ademas guardamos el promedio final de la materia
    }else if ($numeroNotas2 == '12' && $semestre == '2' ){
           
   
     Notas::where('idAlumno', '=', $idAlumno[$cont2])
     ->where('idMateria', $idMateria)
     ->update([
     'n7' => $n7[$cont2],
     'n8' => $n8[$cont2],  
     'n9' => $n9[$cont2],
     'n10' => $n10[$cont2],
     'n11' => $n11[$cont2],
     'n12' => $n12[$cont2],
     'promedio_s2' => $promedioSemestre2[$cont2],
     'promedio' => $promedioFinal[$cont2]
     ]);

        }else if($numeroNotas2 == '8' && $semestre == '1' ){

                      
     Notas::where('idAlumno', '=', $idAlumno[$cont2])
     ->where('idMateria', $idMateria)
     ->update(['n1' => $n1[$cont2],
     'n2' => $n2[$cont2],
     'n3' => $n3[$cont2],
     'n4' => $n4[$cont2],
     'promedio_s1' => $promedioSemestre1[$cont2]
     ]);
        }else if($numeroNotas2 == '8' && $semestre == '2' ){

        
            Notas::where('idAlumno', '=', $idAlumno[$cont2])
            ->where('idMateria', $idMateria)
            ->update([
            'n5' => $n5[$cont2],
            'n6' => $n6[$cont2],  
            'n7' => $n7[$cont2],
            'n8' => $n8[$cont2],
            'promedio_s2' => $promedioSemestre2[$cont2],
            'promedio' => $promedioFinal[$cont2]
            ]);
        }else if($numeroNotas2 == '6' && $semestre == '1' ){

                      
            Notas::where('idAlumno', '=', $idAlumno[$cont2])
            ->where('idMateria', $idMateria)
            ->update(['n1' => $n1[$cont2],
            'n2' => $n2[$cont2],
            'n3' => $n3[$cont2],
            'promedio_s1' => $promedioSemestre1[$cont2]
            ]);
               }else if($numeroNotas2 == '6' && $semestre == '2' ){
       
               
                   Notas::where('idAlumno', '=', $idAlumno[$cont2])
                   ->where('idMateria', $idMateria)
                   ->update([
                   'n4' => $n4[$cont2],
                   'n5' => $n5[$cont2],  
                   'n6' => $n6[$cont2],
                   'promedio_s2' => $promedioSemestre2[$cont2],
                   'promedio' => $promedioFinal[$cont2]
                   ]);
               }

         $cont2 = $cont2+1;
       
         $sumaN =0; //reiniciamos la suma de las notas
         $cont = 0; //reiniciamos el contador que ira recoriendo el array de las notas
       

        }


        //PARA VOLVER A CARGAR LA VISTA CREATE 

         // Cargar todos los alumnos de un curso especifico
         $query=trim($request->get('idMateria'));

         $alumnos=DB::table('materia as m')
         ->join ('notas as n', 'n.idMateria', '=' , 'm.idMateria')
         ->join ('alumno as a', 'a.idAlumno', '=' , 'n.idAlumno') 
         ->where('m.idMateria','=',$query)
         ->orderBy('a.nombre','ASC')       
         ->get();
 
         $materia=DB::table('materia as m')
        ->join ('Curso as c', 'c.idCurso', '=' , 'm.idCurso') 
        ->where('m.idMateria','=',$query)
        ->select('m.nombre','m.semestre','m.numeroNotas','c.grado')
        ->get();

         //Para volver a cargar los cursos que aparecen a la izquierda,que son los cusos impartidos por el
         //profesor
          $query=$this->auth->user()->id;
 
          $cursos=DB::table('materia as c')
          ->where('c.idProfesor','=',$query)
          ->where('c.estado','=','activo')      
          ->select('c.nombre','c.idMateria as idMateria')
          ->paginate(10);
 
         return view('libreta_notas.create',['alumnos'=> $alumnos,'curso'=> $cursos,'materia'=> $materia]);
      

    
    }



    public function edit($id)
    {
    }

    public function update(Request $request, $id)
    {
    
    }

    //Para crear la libreta de Notas
    public function create(Request $request){

        // Cargar todos los alumnos de un curso especifico
        $query=trim($request->get('searchText'));

          //Veremos en que semestre estamos
          $fecha_actual = strtotime(date("d-m-Y H:i:00",time()));
          $fecha_entrada = strtotime("11-07-2018 21:00:00");
  
          if($fecha_actual < $fecha_entrada)
      { 
          $semestre='1';
      }else{
          $semestre='2';
      }

      //Revisamos en que semestre estamos
      Materia::where('idMateria', '=', $query)
      ->update(['semestre' => $semestre]);

    
        // Cargar todos los alumnos de un curso especifico
        $query=trim($request->get('searchText'));

        $alumnos=DB::table('materia as m')
        ->join ('notas as n', 'n.idMateria', '=' , 'm.idMateria')
        ->join ('alumno as a', 'a.idAlumno', '=' , 'n.idAlumno') 
        ->where('m.idMateria','=',$query)
        ->orderBy('a.nombre','ASC')     
        ->get();

        $materia=DB::table('materia as m')
        ->join ('Curso as c', 'c.idCurso', '=' , 'm.idCurso') 
        ->where('m.idMateria','=',$query)
        ->select('m.nombre','m.semestre','m.numeroNotas','c.grado')
        ->get();
        

        //Para volver a cargar los cursos que aparecen a la izquierda,que son los cusos impartidos por el
        //profesor
         $query=$this->auth->user()->id;

         $cursos=DB::table('materia as c')
         ->where('c.idProfesor','=',$query)
         ->where('c.estado','=','activo')      
         ->select('c.nombre','c.idMateria as idMateria')
         ->paginate(50);


        return view('libreta_notas.create',['alumnos'=> $alumnos,'curso'=> $cursos,'materia'=> $materia]);
    }

    //cargamos los cursos a la vista admin para ver las libretas de notas de cada curso
   
    public function grado()
    {
             
        $curso=DB::table('Curso')
        ->get();

      
        return view('libreta_notas.grado',['curso'=> $curso]);
  
    }


    //Cargamos todos los datos de la tabla notas
    public function ver_libreta(Request $request)
    {
        
        $idCurso = $request->get('idCurso');
           
            $libreta=DB::table('Notas as n')
            ->join ('Alumno as a', 'a.idAlumno', '=' ,'n.idAlumno') 
            ->join ('Materia as m', 'm.idMateria', '=' ,'n.idMateria') 
            ->join ('Curso as c', 'c.idCurso', '=' ,'m.idCurso')  
            ->where('c.idCurso','=',$idCurso)       
            ->select('a.nombre as nombre','a.apellido as apellido','m.nombre as materia',
            'm.idCurso','c.grado','n.idAlumno','n.idMateria','n.n1'
            ,'n.n2','n.n3','n.n4','n.n5','n.n6','n.n7','n.n8','n.n9','n.n10','n.n11','n.n12','n.promedio',
            'a.promedioFinal')
            ->orderBy('a.nombre','ASC')
            ->paginate(500);

            $curso=DB::table('Curso')
            ->where('idCurso','=',$idCurso)
            ->get();       

        return view('libreta_notas.ver_libreta', ["libreta" => $libreta,"curso" => $curso]);
    }


}
