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
    	//la usaremos para validar, si existe el requesta vamos a optener todos los datos de 
    	//nuestra tabla usuario en la BD

    	if($request)
    	{       
            
           //Restriccion para las vistas de cada usuario
            if($this->auth->user()->rol=='admin'){

                return view('menu.admin'); 
            }
            else{
                $query=$this->auth->user()->id;
                $cursos=DB::table('materia as c')
                ->where('c.idProfesor','=',$query)
                ->where('c.estado','=','activo')      
                ->select('c.nombre','c.idMateria as idMateria')
                ->paginate(10);

            
           

            
                return view('menu.profesor',["curso"=> $cursos]);
            }
            
        }

    }

}
