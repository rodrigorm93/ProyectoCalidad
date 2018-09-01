<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

//agregamos nuestro modelo
use App\User;
use App\Profesor;
use App\Historial;
//hacemos referencias a redirect para hacer algunas redirrecciones
use Illuminate\Support\Facades\Redirect;
//Hacemos referencia a nuestro request
use App\Http\Requests\UsuarioFormRequest;
//para tebajar con la clase DB de laravel.
use DB;

class ProfesorController extends Controller
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
        if($request){
            $query=trim($request->get('searchText'));

            $usuarios = DB::table('users as u')
            ->join ('Profesor as p', 'p.idProfesor', '=' , 'u.id')
            ->where('id', 'LIKE', '%'.$query.'%')
            ->where('estado', '<>', 'inactivo')
            ->select('u.id as id',
                        'u.nombre as nombre',
                        'u.apellido as apellido',
                        'u.email as email',
                        'p.departamento as departamento'
                        )
            ->paginate(5);

            //segunda cobsulta para obtener todos los cursos


            return view('profesor.index', ["usuarios" => $usuarios, "searchText" => $query]);
        }
    }


    public function create()
    {

         $cursos=DB::table('Curso as c')
          ->get();
        return view('profesor.create',['cursos'=> $cursos]);
  
    }


    public function store(UsuarioFormRequest $request)
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
      $usuario->rol= 'profesor';
      $usuario->estado= 'activo';
      $usuario->save(); 

      $profesor = new Profesor;
      $profesor->idProfesor = $request->get('id');
      $profesor->departamento=$request->get('departamento');
      $profesor->save(); 

      $historial = new Historial;
      $historial->fecha = date("Y-m-d");
      $historial->registro = "Se ha agregado el profesor: ".$request->get('id');
      $historial->save();

      return Redirect::to('profesor');
      
    }


    public function show($id)
    {
        return view("profesor.show", ["usuario"=>User::findOrFail($id)]);
    }

    public function edit($id)
    {
      return view("profesor.edit", ["usuario"=>User::findOrFail($id), "profesor"=>Profesor::findOrFail($id)]);  
    }

    public function update(UsuarioFormRequest $request, $id)
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
      $usuario->rol= 'profesor';
      $usuario->update(); 

      $profesor = Profesor::findOrFail($id);
      $profesor->idProfesor=$request->get('id');
      $profesor->departamento=$request->get('departamento');
      $profesor->update();  

      $historial = new Historial;
      $historial->fecha = date("Y-m-d");
      $historial->registro = "Se ha editado el profesor: ".$request->get('id');
      $historial->save();

      return Redirect::to('profesor');
    }


    public function destroy($id)
    {
      $usuario = User::findOrFail($id);
      $usuario->estado= 'inactivo';
      $usuario->update();  

      $historial = new Historial;
      $historial->fecha = date("Y-m-d");
      $historial->registro = "Se ha eliminado el profesor: ".$id;
      $historial->save();

      return Redirect::to('profesor');
    }


    public function importar(){

        return view('profesor.importar');
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
                    $usuario->rol= 'profesor';
                    $usuario->estado= 'activo';
                    $usuario->save();   

                    $profesor = new Profesor;
                    $profesor->idProfesor = $id[$cont];
                    $profesor->nombre= $nombre[$cont];
                    $profesor->apellido= $apellido[$cont];
                    //$profesor->asignacion= '';
                    $profesor->save(); 

             
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
