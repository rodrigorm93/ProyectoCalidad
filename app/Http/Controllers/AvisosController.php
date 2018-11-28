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

class AvisosController extends Controller
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
        $avisos = DB::table('avisos as av')
        ->select('av.id_aviso',
                  'av.mensaje',
                  'av.fecha',
                  'av.titulo'
                  
                  )
          ->orderBy('av.id_aviso', 'desc')
          ->paginate(4);

        return view('avisos.index', ['avisos'=> $avisos]);

     //  return view('menu.admin');
    
}

public function create(){

 

    return view('avisos.create');
}

public function store(Request $request)
{   
    $time = time(); 
    $fecha_actual=date("Y-m-d H:i:s");

    $titulo=$request->get('titulo');


    $aviso = new Aviso;
    $aviso->mensaje=$request->get('descripcion');
    $aviso->fecha=$fecha_actual;
    $aviso->titulo=$titulo;


    $aviso->save();	



  return Redirect::to('/menu')->with('success2', "Se han ingresado los datos correctamente");
}


public function destroyAviso(Request $request)
{
    $id_aviso=$request->get('idAviso');

    try {

    DB::beginTransaction();
    //consulta para eliminar la noticia creada
    $noticia = DB::table('avisos')->where('id_aviso', $id_aviso)->delete();//sacamos la noticia


    DB::commit();
      
  } catch (Exception $e) {
      DB::rollback();
  }

  //alert()->success('La noticia ha sido Eliminada.', '¡Listo!')->persistent('Cerrar');
  return Redirect::to('/avisos');


}


public function ver_aviso_alum(Request $request)
{
  
    $year =  date("Y"); 
   

    $avisos = DB::table('avisos as av')
    ->select('av.id_aviso',
              'av.mensaje',
              'av.fecha',
              'av.titulo'
              
              )
      ->orderBy('av.id_aviso', 'desc')
      ->paginate(50);


      $query=$this->auth->user()->id;
      $cursos=DB::table('Alumno as a')
      ->join ('Notas as n', 'n.idAlumno', '=' , 'a.idAlumno')
      ->join ('Materia as m', 'm.idMateria', '=' , 'n.idMateria')
      ->join ('Curso as c', 'c.idCurso', '=' , 'm.idCurso')
      ->where('a.idAlumno','=',$query)       
      ->where('c.year','=',$year)            
      ->select('m.nombre','m.idMateria as idMateria','c.idCurso')
      ->paginate(50);

    return view("avisos.ver_aviso_alum",['aviso'=> $avisos],["curso"=> $cursos]);
   

}


}