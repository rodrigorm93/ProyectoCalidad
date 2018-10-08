<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//hacemos referencias a redirect para hacer algunas redirrecciones
use Illuminate\Support\Facades\Redirect;


use DB;
use Illuminate\Contracts\Auth\Guard;
use Closure;
use Session;

class UsuarioController extends Controller
{
     protected $auth;
   
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

        $year =  date("Y");

    	if($request)
    	{       
            
           //Restriccion para las vistas de cada usuario
            if($this->auth->user()->rol=='admin'){

                return view('menu.admin'); 
            }
            else{
                $query=$this->auth->user()->id;
                $cursos=DB::table('materia as m')
                ->join ('Curso as c', 'c.idCurso', '=' , 'm.idCurso')
                ->where('m.idProfesor','=',$query)
                ->where('m.estado','=','activo')
                ->where('c.year','=',$year)            
                ->select('m.nombre','m.idMateria as idMateria')
                ->paginate(50);

            
           

            
                return view('menu.profesor',["curso"=> $cursos]);
            }
            
        }

    }

}
