<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//hacemos referencias a redirect para hacer algunas redirrecciones
use Illuminate\Support\Facades\Redirect;
use Illuminate\Contracts\Auth\Guard;

use DB;
use App\Proyecto;
use App\Curso;
use App\Aviso;
use App\Alumno;
use App\Citacion;

class CitacionesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Guard $auth)
    {
        //le diremos que gestione el acceso por usuario 
        $this->middleware('auth');
        $this->auth =$auth;


    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    
        //Cargamos las noticias en nuestra pagina principal
        $citaciones = DB::table('citaciones as c')
        ->join ('Alumno as a', 'a.idAlumno', '=' ,'c.id_alumno')   
        ->select('c.id_citacion',
                  'c.mensaje',
                  'c.fecha',
                  'c.id_alumno',
                  'c.titulo',
                  'a.nombre',
                  'a.apellido'
                  
                  )
          ->orderBy('c.id_citacion', 'desc')
          ->paginate(10);

        return view('citaciones.index', ['citaciones'=> $citaciones]);

     //  return view('menu.admin');
    
}

public function create(){

    $alumno = DB::table('alumno')
    ->get();

    return view('citaciones.create',['alumno'=> $alumno]);
}

public function create2(){

    $year =  date("Y");

    $query=$this->auth->user()->id;
    $query=$this->auth->user()->id;
    $cursos=DB::table('materia as m')
    ->join ('Curso as c', 'c.idCurso', '=' , 'm.idCurso')
    ->where('m.idProfesor','=',$query)
    ->where('m.estado','=','activo')
    ->where('c.year','=',$year)            
    ->select('m.nombre','m.idMateria as idMateria')
    ->paginate(50);

    $alumno = DB::table('alumno')
    ->get();

    return view('citaciones.create2',['alumno'=> $alumno],["curso"=> $cursos]);
}


public function store(Request $request)
{   
    $time = time(); 
    $fecha_actual=date("Y-m-d H:i:s");

    $idAlumno1=$request->get('idA');

    $titulo=$request->get('titulo');

 //EL id tiene que tener 8 digitos
    $idAlumno=substr($idAlumno1,0,8);

    $citacion = new Citacion;
    $citacion->mensaje=$request->get('descripcion');
    $citacion->fecha=$fecha_actual;
    $citacion->id_alumno=$idAlumno;
    $citacion->titulo=$titulo;


    $citacion->save();	



  return Redirect::to('/menu')->with('success2', "Se han ingresado los datos correctamente");
}

public function edit($id_citacion)
{
    $citacion = DB::table('citaciones')->where('id_citacion', $id_citacion)->first();
    
    return view("citaciones.edit", ['citacion' => $citacion]);
   

}

public function updateCitacion(Request $request)
{
$id_citacion= $request->get('idCitacion');
$titulo = $request->get('titulo');
$mensaje = $request->get('descripcion');
$time = time(); 
$fecha_actual=date("Y-m-d H:i:s");



Citacion::where('id_citacion', '=', $id_citacion)
->update(['titulo' => $titulo],['mensaje' => $mensaje],['fecha' => $fecha_actual]);

  return Redirect::to('/citaciones');
}




public function destroyCitacion(Request $request)
{
    $id_citacion=$request->get('idCitacion');

    try {

    DB::beginTransaction();
    //consulta para eliminar la noticia creada
    $noticia = DB::table('citaciones')->where('id_citacion', $id_citacion)->delete();//sacamos la noticia


    DB::commit();
      
  } catch (Exception $e) {
      DB::rollback();
  }

  //alert()->success('La noticia ha sido Eliminada.', '¡Listo!')->persistent('Cerrar');
  return Redirect::to('/citaciones')->with('success2', "Registro Eliminado");;


}


public function ver_citacion_alum(Request $request)
{
  
    $year =  date("Y"); 
    $id_curso=$request->get('idCurso');
    $query=$this->auth->user()->id;

    $citacion = DB::table('citaciones as c')
    ->select('c.id_citacion',
              'c.mensaje',
              'c.fecha',
              'c.id_alumno',
              'c.titulo'
              
              )
      ->where('c.id_alumno',$query)
      ->paginate(50);


     
      $cursos=DB::table('Alumno as a')
      ->join ('Notas as n', 'n.idAlumno', '=' , 'a.idAlumno')
      ->join ('Materia as m', 'm.idMateria', '=' , 'n.idMateria')
      ->join ('Curso as c', 'c.idCurso', '=' , 'm.idCurso')
      ->where('a.idAlumno','=',$query)       
      ->where('c.year','=',$year)            
      ->select('m.nombre','m.idMateria as idMateria','c.idCurso')
      ->paginate(50);

    return view("citaciones.ver_citacion_alum",['citacion'=> $citacion],["curso"=> $cursos]);
   

}



}