<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

//agregamos nuestro modelo
use App\User;
use App\Alumno;
use App\Historial;
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

class AlumnoController extends Controller
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
        if($request){
           if($this->auth->user()->rol=='admin'){
            $query=trim($request->get('searchText'));
            
            $usuarios = DB::table('users as u')
            ->join ('Alumno as a', 'a.idAlumno', '=' , 'u.id')
            ->where('id', 'LIKE', '%'.$query.'%')
            ->where('estado', '<>', 'inactivo')
            ->select('u.id as id',
                    'u.digito as digito',
                    'u.nombre as nombre',
                    'u.apellido as apellido',
                    'u.email as email',
                    'u.genero as genero',
                    'u.edad as edad',
                    'a.carrera as carrera',
                    'a.ingresoYear as ingreso'
                    )
            ->paginate(15);

            return view('alumno.index', ["usuarios" => $usuarios, "searchText" => $query]);
        }else{
           
            // Cargar todos los alumnos de un curso especifico
            $query2=$request->get('searchText');
            //$query2=$this->auth->user()->id;
            $query=$this->auth->user()->id;
           
            $cursos=DB::table('materia as c')
            ->where('c.idProfesor','=',$query)
            ->where('c.estado','=','activo')      
            ->select('c.nombre','c.idCurso as idCurso','c.idMateria as idMateria')
            ->paginate(5);
            
              //Obtiene nombre del profesor
              $lista=DB::table('materia as m')
              ->join ('notas as n', 'n.idMateria', '=' , 'm.idMateria')
              ->join ('alumno as a', 'a.idAlumno', '=' , 'n.idAlumno')
              ->where('m.idProfesor','=',$query) 
              ->where('m.idMateria','=',$query2)     
              ->select('a.nombre','a.apellido')
              ->paginate(40);


        return view('listaAlumno.index', ["lista" => $lista,"curso" => $cursos ]);
     } 
   }
    }


    public function create()
    {
        return view('alumno.create');
  
    }


    public function store(Request $request)
    {   
      $usuario = new User;
      $usuario->id=$request->get('id');
      $usuario->digito=$request->get('digito');
      $usuario->password=bcrypt($request->get('password'));
      $usuario->nombre=$request->get('nombre');
      $usuario->apellido=$request->get('apellido');
      $usuario->email=$request->get('email');
      $usuario->genero=$request->get('genero');
      $usuario->edad=$request->get('edad');
      $usuario->rol= 'alumno';
      $usuario->estado= 'activo';
      $usuario->save();	

      $alumno = new Alumno;
      $alumno->idAlumno = $request->get('id');
      $alumno->carrera=$request->get('carrera');
      $alumno->ingresoYear=$request->get('ingresoYear');
      $alumno->nombre=$request->get('nombre');
      $alumno->apellido=$request->get('apellido');
      $alumno->save();  

      return Redirect::to('menu');
    }

    public function show($id)
    {
    	return view("alumno.show", ["usuario"=>User::findOrFail($id)]);
    }

    public function edit($id)
    {
      return view("alumno.edit", ["usuario"=>User::findOrFail($id), "alumno"=>Alumno::findOrFail($id)]);  
    }

    public function update(Request $request, $id)
    {
      $usuario = User::findOrFail($id);
      $usuario->id=$request->get('id');
      $usuario->digito=$request->get('digito');
      $usuario->password=bcrypt($request->get('password'));
      $usuario->nombre=$request->get('nombre');
      $usuario->apellido=$request->get('apellido');
      $usuario->email=$request->get('email');
      $usuario->genero=$request->get('genero');
      $usuario->edad=$request->get('edad');
      $usuario->rol= 'alumno';
      $usuario->update(); 

      $alumno = Alumno::findOrFail($id);
      $alumno->idAlumno=$request->get('id');
      $alumno->carrera=$request->get('carrera');
      $alumno->ingresoYear=$request->get('ingresoYear');
      $alumno->update();  
    
      return Redirect::to('alumno');
    }


    public function destroy($id)
    {
      $usuario = User::findOrFail($id);
      $usuario->estado= 'inactivo';
      $usuario->update();  

      return Redirect::to('alumno');
    }


    public function importar(){

        return view('alumno.importar');
    }


    public function importar_store(Request $request)
    {   
      
        try {

            DB::beginTransaction();

            //Se crean los array de los siguientes datos:
            $id=$request->get('id');
            $digito=$request->get('digito');
            $pass=$request->get('pass');
            $nombre=$request->get('nombre');
            $apellido=$request->get('apellido');
            $genero=$request->get('genero');
            $edad=$request->get('edad');
            $correo=$request->get('correo');
          
            $ingreso=$request->get('ingreso');

            $cont = 0;
            $cantidad = 0;

            //Se recorren y asignan los array
            while($cont < count($id)){

                
                $revisa = DB::table('users')
                ->where('id',$id[$cont])
                ->count();
                
                if($revisa == 0){
                    $usuario = new User;
                    $usuario->id = $id[$cont];
                    $usuario->digito = $digito[$cont];
                    $usuario->password = bcrypt($pass[$cont]);
                    $usuario->nombre = $nombre[$cont];
                    $usuario->apellido = $apellido[$cont];
                    $usuario->genero = $genero[$cont];
                    $usuario->edad = $edad[$cont];
                    $usuario->email = $correo[$cont];
                    $usuario->rol= 'alumno';
                    $usuario->estado= 'activo';
                    $usuario->save();   

                    $alumno = new Alumno;
                    $alumno->idAlumno = $id[$cont];
                    $alumno->nombre = $nombre[$cont];
                    $alumno->apellido = $apellido[$cont];
                    $alumno->ingreso= $ingreso[$cont];
                   
                    $alumno->save(); 

                  
                }
                else{
                    $cantidad = $cantidad+1;
                }

                $cont = $cont+1;
            }

            DB::commit();
            
        } catch (Exception $e) {
            DB::rollback();
        }

        $cantidad = $cont-$cantidad;

        return Redirect::to('menu')->with('success', "Se han ingresado ".$cantidad."/".$cont." datos correctamente");

    }

}
