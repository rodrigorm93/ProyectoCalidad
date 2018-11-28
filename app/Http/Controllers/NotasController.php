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

      
        if($this->auth->user()->rol=='utp'){

                return view('notas.grado1',['curso'=> $curso]); 
            }else {

                return view('notas.grado',['curso'=> $curso]);
            }    
        
  
    }


    //Guardamos el Promedio Final ya redondeado a la tabla alumno con el estado 
    
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
        //->where('a.promedioFinal', '=',0)
        ->where('c.idCurso', '=',$idCurso)
        ->select( 'n.idAlumno', DB::raw( 'round(AVG( n.promedio ),0) as promedioFinal' ))
        ->groupBy('n.idAlumno')      
        ->get();

        if($this->auth->user()->rol=='utp'){

                return view('notas.estadoPorCurso1',['alumnos'=> $alumnos]); 
            }else {

                return view('notas.estadoPorCurso',['alumnos'=> $alumnos]);
            } 


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
        if($numeroNotas2 == '12' && $semestre == '1'){
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
          $year =  date("Y");
         // Cargar todos los alumnos de un curso especifico
         $query=trim($request->get('idMateria'));

         $alumnos=DB::table('materia as m')
         ->join ('notas as n', 'n.idMateria', '=' , 'm.idMateria')
         ->join ('alumno as a', 'a.idAlumno', '=' , 'n.idAlumno') 
         ->where('m.idMateria','=',$query)
         ->orderBy('a.apellido','ASC')       
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
          ->join ('Curso as cu', 'cu.idCurso', '=' , 'c.idCurso') 
          ->where('c.idProfesor','=',$query)
          ->where('c.estado','=','activo')
          ->where('cu.year','=',$year)         
          ->select('c.nombre','c.idMateria as idMateria')
          ->paginate(50);
 
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
        $year =  date("Y"); //para saber el año actual y solo cargar los cursos de ese año

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
        ->orderBy('a.apellido','ASC')     
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
         ->join ('Curso as cu', 'cu.idCurso', '=' , 'c.idCurso') 
         ->where('c.idProfesor','=',$query)
         ->where('c.estado','=','activo')
         ->where('cu.year','=',$year)         
         ->select('c.nombre','c.idMateria as idMateria')
         ->paginate(50);


        return view('libreta_notas.create',['alumnos'=> $alumnos,'curso'=> $cursos,'materia'=> $materia]);
    }

    //cargamos los cursos a la vista admin para ver las libretas de notas de cada curso
   
    public function grado()
    {
             
        $curso=DB::table('Curso')
        ->get();

        if($this->auth->user()->rol=='utp'){

                return view('libreta_notas.grado1',['curso'=> $curso]); 
            }else {

                return view('libreta_notas.grado',['curso'=> $curso]);
            }    

      
        return view('libreta_notas.grado',['curso'=> $curso]);
  
    }


    //Cargamos todos los datos de la tabla notas, para la vista admin
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
            'a.promedioFinal','n.promedio_s1','n.promedio_s2','m.numeroNotas','m.nombre as materia')
            ->orderBy('a.apellido','ASC')
            ->paginate(500);

            $curso=DB::table('Curso')
            ->where('idCurso','=',$idCurso)
            ->get();  

            if($this->auth->user()->rol=='utp'){

                return view('libreta_notas.ver_libretaUtp', ["libreta" => $libreta,"curso" => $curso]); 
            }else {

                return view('libreta_notas.ver_libreta', ["libreta" => $libreta,"curso" => $curso]);
            }      

        return view('libreta_notas.ver_libreta', ["libreta" => $libreta,"curso" => $curso]);
    }



    
    //Cargamos todos los datos de la tabla notas de la materia solo para la vista profesor
    public function ver_libretaPorMateria(Request $request)
    {
        
        $idMateria = $request->get('idMateria');
           
            $libreta=DB::table('Notas as n')
            ->join ('Alumno as a', 'a.idAlumno', '=' ,'n.idAlumno') 
            ->join ('Materia as m', 'm.idMateria', '=' ,'n.idMateria') 
            ->join ('Curso as c', 'c.idCurso', '=' ,'m.idCurso')  
            ->where('m.idMateria','=',$idMateria)       
            ->select('a.nombre as nombre','a.apellido as apellido','m.nombre as materia',
            'm.idCurso','c.grado','n.idAlumno','n.idMateria','n.n1 as 1'
            ,'n.n2 as 2','n.n3 as 3','n.n4 as 4','n.n5 as 5','n.n6 as 6','n.n7 as 7','n.n8 as 8'
            ,'n.n9 as 9','n.n10 as 10','n.n11 as 11','n.n12 as 12','n.promedio',
            'a.promedioFinal','m.numeroNotas')
            ->orderBy('a.apellido','ASC')
            ->paginate(500);

            $materia=DB::table('Materia as m')
            ->join ('Curso as c', 'c.idCurso', '=' ,'m.idCurso')
            ->where('m.idMateria','=',$idMateria) 
            ->get();       


        //Para volver a cargar los cursos que aparecen a la izquierda,que son los cusos impartidos por el
        //profesor
        $year =  date("Y"); //para saber el año actual y solo cargar los cursos de ese año
         $query=$this->auth->user()->id;

         $cursos=DB::table('materia as c')
         ->join ('Curso as cu', 'cu.idCurso', '=' , 'c.idCurso') 
         ->where('c.idProfesor','=',$query)
         ->where('c.estado','=','activo')
         ->where('cu.year','=',$year)         
         ->select('c.nombre','c.idMateria as idMateria')
         ->paginate(50);


        return view('libreta_notas.ver_libretaProfesor', ["libreta" => $libreta,"materia" => $materia,"curso" => $cursos]);
    }




      //Cargamos todos los datos de la tabla notas de la materia solo para la vista profesor
      //En esta funcion veremos si el alumno aprobo la materia o esta pendiente
      //en el caso d eestar pendiente el promedio final podra ser modificado
      public function verEstadoPorMateria(Request $request)
      {
          
          $idMateria = $request->get('idMateria');
             
         
 
          $estado=DB::table('Notas as n')
          ->join ('Materia as m', 'm.idMateria', '=' ,'n.idMateria') 
          ->join ('Curso as c', 'c.idCurso', '=' ,'m.idCurso') 
          ->join ('Alumno as a', 'a.idAlumno', '=' ,'n.idAlumno')
           ->where('m.idMateria','=',$idMateria)           
          ->where('a.asignacion', '=','ASIGNADO') 
          ->select('a.nombre as nombreA','a.apellido','a.idAlumno','n.promedio as promedioFinal',
          'm.nombre as nombreM','m.idMateria') 
          ->orderBy('a.apellido','ASC')
          ->get();  
          
          $materia=DB::table('Materia as m')
          ->join ('Curso as c', 'c.idCurso', '=' ,'m.idCurso') 
          ->where('m.idMateria','=',$idMateria)  
          ->get();
  
  
          //Para volver a cargar los cursos que aparecen a la izquierda,que son los cusos impartidos por el
          //profesor
          $year =  date("Y"); //para saber el año actual y solo cargar los cursos de ese año
           $query=$this->auth->user()->id;
  
           $cursos=DB::table('materia as c')
           ->join ('Curso as cu', 'cu.idCurso', '=' , 'c.idCurso') 
           ->where('c.idProfesor','=',$query)
           ->where('c.estado','=','activo')
           ->where('cu.year','=',$year)         
           ->select('c.nombre','c.idMateria as idMateria')
           ->paginate(50);
  
  
           return view('notas.estadoPorMateria',['estado'=> $estado,'curso'=> $cursos,'materia'=> $materia]);
      }

//Guardamos los promedios finales de cada materia
      public function updatePromedioMateria(Request $request)
    {   
        //Agregamos el promedio Final a la tabla Alumno
        try {

            DB::beginTransaction();

        $idAlumno=$request->get('idAlumno');
        $promedioFinal=$request->get('promedioFinal');
        $idMateria=$request->get('idMateria');

        $cantidad=count($idAlumno);

        $cont=0;
        while($cont < count($idAlumno)){
     
        Notas::where('idAlumno', '=', $idAlumno[$cont])
        ->where('idMateria', '=', $idMateria)
        ->update(['promedio' => $promedioFinal[$cont]]);

        $cont = $cont+1;
        }

        DB::commit();

        //Para volver a cargar la vista DE estadoPorMateria
        $estado=DB::table('Notas as n')
        ->join ('Materia as m', 'm.idMateria', '=' ,'n.idMateria') 
        ->join ('Curso as c', 'c.idCurso', '=' ,'m.idCurso') 
        ->join ('Alumno as a', 'a.idAlumno', '=' ,'n.idAlumno')
         ->where('m.idMateria','=',$idMateria)           
        ->where('a.asignacion', '=','ASIGNADO') 
        ->select('a.nombre as nombreA','a.apellido','a.idAlumno','n.promedio as promedioFinal',
        'm.nombre as nombreM','m.idMateria')
        ->orderBy('a.apellido','ASC') 
        ->get();  
        
        $materia=DB::table('Materia as m')
        ->join ('Curso as c', 'c.idCurso', '=' ,'m.idCurso') 
        ->where('m.idMateria','=',$idMateria)  
        ->get();


        //Para volver a cargar los cursos que aparecen a la izquierda,que son los cusos impartidos por el
        //profesor
        $year =  date("Y"); //para saber el año actual y solo cargar los cursos de ese año
         $query=$this->auth->user()->id;

         $cursos=DB::table('materia as c')
         ->join ('Curso as cu', 'cu.idCurso', '=' , 'c.idCurso') 
         ->where('c.idProfesor','=',$query)
         ->where('c.estado','=','activo')
         ->where('cu.year','=',$year)         
         ->select('c.nombre','c.idMateria as idMateria')
         ->paginate(50);


         return view('notas.estadoPorMateria',['estado'=> $estado,'curso'=> $cursos,'materia'=> $materia]);

    } catch (Exception $e) {
        DB::rollback();
        
        
    }
   


    }


    public function verNotas(Request $request)
    {
        $idAlumno=$this->auth->user()->id;
        $idMateria = $request->get('idMateria');
           
            $libreta=DB::table('Notas as n')
            ->join ('Alumno as a', 'a.idAlumno', '=' ,'n.idAlumno') 
            ->join ('Materia as m', 'm.idMateria', '=' ,'n.idMateria') 
            ->join ('Curso as c', 'c.idCurso', '=' ,'m.idCurso')  
            ->where('a.idAlumno','=',$idAlumno)         
            ->select('a.nombre as nombre','a.apellido as apellido','m.nombre as materia',
            'm.idCurso','c.grado','n.idAlumno','n.idMateria','n.n1'
            ,'n.n2','n.n3','n.n4','n.n5','n.n6','n.n7','n.n8'
            ,'n.n9','n.n10','n.n11','n.n12','n.promedio',
            'a.promedioFinal','m.numeroNotas','n.promedio_s1','n.promedio_s2')
            ->get();
            

            $materia=DB::table('Materia as m')
            ->join ('Curso as c', 'c.idCurso', '=' ,'m.idCurso')
            ->where('m.idMateria','=',$idMateria) 
            ->get();       


        //Para volver a cargar los cursos que aparecen a la izquierda,que son los cusos impartidos por el
        //profesor
        $year =  date("Y"); //para saber el año actual y solo cargar los cursos de ese año
 

         $query=$this->auth->user()->id;
         $cursos=DB::table('Alumno as a')
         ->join ('Notas as n', 'n.idAlumno', '=' , 'a.idAlumno')
         ->join ('Materia as m', 'm.idMateria', '=' , 'n.idMateria')
         ->join ('Curso as c', 'c.idCurso', '=' , 'm.idCurso')
         ->where('a.idAlumno','=',$query)       
         ->where('c.year','=',$year)            
         ->select('m.nombre','m.idMateria as idMateria','c.idCurso')
         ->paginate(50);



        return view('libreta_notas.ver_libretaAlumno', ["libreta" => $libreta,"materia" => $materia,"curso" => $cursos]);
    }
  


}
