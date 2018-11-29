<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

//agregamos nuestro modelo
use App\User;
use App\Profesor;
use App\Materia;

//hacemos referencias a redirect para hacer algunas redirrecciones
use Illuminate\Support\Facades\Redirect;
//Hacemos referencia a nuestro request
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
    
    //METODOS :

    public function index(Request $request)
    {
        
            $query=trim($request->get('searchText'));

            $usuarios = DB::table('users as u')
            ->join ('Profesor as p', 'p.idProfesor', '=' , 'u.id')
            ->where('id', 'LIKE', '%'.$query.'%')
            ->where('estado', '<>', 'inactivo')
            ->select('u.id as id',
                        'u.nombre as nombre',
                        'u.apellido as apellido',
                        'u.email as email' 
                        )
            ->paginate(5);

    
            return view('profesor.index', ["usuarios" => $usuarios, "searchText" => $query]);
        
    }


    public function create()
    {

       
        return view('profesor.create');
  
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
      $usuario->rol= 'profesor';
      $usuario->estado= 'activo';
      $usuario->save(); 

      $profesor = new Profesor;
      $profesor->idProfesor = $request->get('id');
      $profesor->nombre=$request->get('nombre');
      $profesor->apellido=$request->get('apellido');
      $profesor->save(); 

      return Redirect::to('/profesores')->with('profesores', "Se han ingresado los datos correctamente");;
      
    }


    public function show($id)
    {
        return view("profesor.show", ["usuario"=>User::findOrFail($id)]);
    }

    public function edit($id)
    {
      return view("profesor.edit", ["usuario"=>User::findOrFail($id), "profesor"=>Profesor::findOrFail($id)]);  
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
      $usuario->rol= 'profesor';
      $usuario->update(); 

      $profesor = Profesor::findOrFail($id);
      $profesor->idProfesor=$request->get('id');
      $profesor->nombre=$request->get('nombre');
      $profesor->apellido=$request->get('apellido');
      $profesor->update();  


      return Redirect::to('/profesores');
    }


    public function destroy($id)
    {
         try {
             
            DB::beginTransaction();
            
            $usuario = User::findOrFail($id);
            $usuario->delete();  

            $profesor = Profesor::findOrFail($id);
            $profesor->delete(); 
      
            //Dejamos la materia que impartia el profesor como no asignada.
            Materia::where('idProfesor', $id)
            ->update(['asignacion' => 'No asignado','idProfesor' => 0]);

            DB::commit();

        } catch (Exception $e) {
            DB::rollback();
        }
      
        return Redirect::to('/profesores')->with('profesores', "Registro Eliminado Correctamente");
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
            $contR = 0;

            while($contR < count($id)){
                $user = Profesor::where("idProfesor","=",$id[$contR])->count();
                if($user >0){
                    return Redirect::to('menu')->with('error', "El Profesor ".$id[$contR]." ".$nombre[$contR]." ".$apellido[$contR].
                    " Ya esta Registrado");
                    
    
                }
                $contR = $contR+1;
            }

                    
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

        return Redirect::to('menu')->with('success2', "Se han ingresado ".$cantidad."/".$cont." datos correctamente");

    }


}
