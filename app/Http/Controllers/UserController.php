<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

//agregamos nuestro modelo
use App\User;
use App\Tarjeta;
use App\Cliente;
use App\Secretaria;
use App\Contacto;
use App\Anuncio;
use App\Region;
use App\Categoria;
use App\SubCategoria;
use App\CategoriaVehiculo;
//hacemos referencias a redirect para hacer algunas redirrecciones
use Illuminate\Support\Facades\Redirect;

//para tebajar con la clase DB de laravel.
use DB;
use Illuminate\Contracts\Auth\Guard;
use Closure;
use Session;
class UserController extends Controller
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
    	if($request){
           if($this->auth->user()->tipo=='admin' || $this->auth->user()->tipo=='secretaria'){
            $query=trim($request->get('searchText'));
            
            $usuarios = DB::table('users as u')
            ->where('id', 'LIKE', '%'.$query.'%')
            //->where('estado', '<>', 'inactivo')
            ->select('u.id as id',
                    'u.rut as rut',
                    'u.nombre as nombre',
                    'u.apellido as apellido',
                    'u.email as email',
                    'u.tipo as tipo'
                    )
            ->paginate(10);

             return view('usuarios.index', ["usuarios" => $usuarios, "searchText" => $query]);

          }
      }

    }


 

    public function create()
    {
      return view('usuarios.create');  
    }

    public function store(Request $request)
    {   

      $tipo = $request->get('tipo'); //captura el tipo de servicio

      try {

        DB::beginTransaction();
      
        $usuario = new User;
        $usuario->rut=$request->get('rut');
        $usuario->nombre=$request->get('nombre');
        $usuario->apellido=$request->get('apellido');
        $usuario->email=$request->get('email');
        $usuario->password=bcrypt($request->get('password'));
        $usuario->tipo=$request->get('tipo');
        $usuario->save(); 

        if($tipo == 'cliente'){
          $cliente = new Cliente;
          $cliente->id_cliente = $usuario->id;
          $cliente->save(); 
        }
        else if($tipo == 'secretaria'){
          $secretaria = new Secretaria;
          $secretaria->id_secretaria = $usuario->id;
          $secretaria->anuncios_pend = 0;
          $secretaria->save(); 
        }

        //Se agrega la informacion de contacto del usuario
        if($request->get('telefono') != '' || $request->get('telefono') != null){
          $contacto = new Contacto;
          $contacto->id = $usuario->id;
          $contacto->medio = 'telefono';
          $contacto->contacto = $request->get('telefono'); 
          $contacto->save(); 
        }
        if($request->get('facebook') != '' || $request->get('facebook') != null){
          $contacto = new Contacto;
          $contacto->id = $usuario->id;
          $contacto->medio = 'facebook';
          $contacto->contacto = $request->get('facebook'); 
          $contacto->save(); 
        }

        DB::commit();
          
      } catch (Exception $e) {
          DB::rollback();
      }

      return Redirect::to('usuarios');  

    }

// Para mostrar
    public function show($id)
    {

    }

    public function edit($id)
    {
    
      return view("usuarios.edit", ["usuario"=>User::findOrFail($id)]);  

    }

    public function update(Request $request,$id)
    {
      $usuario = User::findOrFail($id);
      $usuario->rut=$request->get('rut');
      $usuario->password=bcrypt($request->get('password'));
      $usuario->nombre=$request->get('nombre');
      $usuario->apellido=$request->get('apellido');
      $usuario->email=$request->get('email');
      $usuario->tipo= $request->get('tipo');;
      $usuario->update();

       return Redirect::to('usuarios');
 

    }
    

    public function destroy($id)
    {
      User::destroy($id);
      return Redirect::to('usuarios');


    }


    public function tarjeta_create(){
      return view('usuarios.tarjeta.create');
    }


    public function gestion(Request $request){

      $query=trim($request->get('searchText'));
       $query2=trim($request->get('searchText2'));
       $fechaMin=trim($request->get('fechaMin'));
       $fechaMax=trim($request->get('fechaMax'));

       if ($fechaMin > $fechaMax) {
          alert()->error('La fecha inicial no puede ser mayor a la fecha final')->persistent('Cerrar');
          return Redirect::to('usuarios/gestion');
       }

       $secretarias = DB::table('secretaria')
            ->join ('users', 'users.id', '=' , 'id_secretaria')
            ->select('secretaria.id_secretaria as id_secretaria',
                    'users.nombre as nombre',
                    'users.apellido as apellido',
                    'users.rut as rut'
                    )
            ->get();

        if ($fechaMin != '' AND $fechaMax != '') {
            $region=DB::table('anuncio as a')
           ->join ('region as r', 'r.REGION_ID', '=' , 'a.region')
           ->join ('orden as o', 'o.id_anuncio', '=' , 'a.id_anuncio')
           ->where('o.fecha','<=', $fechaMin)
           ->where('o.fecha_venc','>=',$fechaMax) 
           ->where('o.id_secretaria','LIKE', '%'.$query.'%')
             ->where('a.condicion','LIKE', '%'.$query2.'%') 
           ->select('r.REGION_NOMBRE',DB::raw('count(a.region) as cantidad'),DB::raw('sum(total) as total'))
           ->groupBy('r.REGION_NOMBRE')
           ->get();
        }   
        else{
            $region=DB::table('anuncio as a')
             ->join ('region as r', 'r.REGION_ID', '=' , 'a.region')
             ->join ('orden as o', 'o.id_anuncio', '=' , 'a.id_anuncio')
             ->where('o.id_secretaria','LIKE', '%'.$query.'%')
             ->where('a.condicion','LIKE', '%'.$query2.'%')
             ->select('r.REGION_NOMBRE',DB::raw('count(a.region) as cantidad'),DB::raw('sum(total) as total'))
             ->groupBy('r.REGION_NOMBRE')
             ->get();
       }
        
        //DB::table('user_visits')->groupBy('user_id')->count();

      return view('usuarios.gestion', ["secretarias" => $secretarias,"region"=>$region]);


    }


    public function adm_categorias(Request $request){

        $categorias = DB::table('categorias')->paginate(10);

        $sub_categorias = DB::table('categorias')
            ->join ('sub_categorias', 'sub_categorias.id_categoria', '=' , 'categorias.id_categoria')
            ->select('categorias.id_categoria as id_categoria',
                    'categorias.nombre_completo as nombre_categoria',
                    'sub_categorias.sub_categoria as sub_categoria',
                    'sub_categorias.nombre_completo as nombre_completo')
            ->paginate(10);

        $categorias_vehiculo = DB::table('categoria_vehiculo')->paginate(10);
        
        //DB::table('user_visits')->groupBy('user_id')->count();

      return view('usuarios.adm_categorias', ["categorias" => $categorias, "sub_categorias" => $sub_categorias, "categorias_vehiculo" => $categorias_vehiculo]);


    }

    public function nueva_categoria(Request $request){

      try {

        DB::beginTransaction();
      
        $categoria = new Categoria;
        $categoria->nombre=$request->get('nombre');
        $categoria->nombre_completo=$request->get('nombre_completo');
        $categoria->save(); 

        DB::commit();
          
      } catch (Exception $e) {
          DB::rollback();
      }

      alert()->success('Categoría creada')->persistent('Cerrar');
      return Redirect::to('usuarios/adm_categorias');  

    }


    public function nueva_sub_categoria(Request $request){

      try {

        DB::beginTransaction();
      
        $sub_categoria = new SubCategoria;
        $sub_categoria->id_categoria=$request->get('id_categoria');
        $sub_categoria->sub_categoria=$request->get('sub_categoria');
        $sub_categoria->nombre_completo=$request->get('nombre_completo');
        $sub_categoria->save(); 

        DB::commit();
          
      } catch (Exception $e) {
          DB::rollback();
      }

      alert()->success('Sub-Categoría creada')->persistent('Cerrar');
      return Redirect::to('usuarios/adm_categorias');  

    }


    public function actualiza_categoria(Request $request){

      //COMPROBACIONES

      //Comprueba que los campos no esten vacios
      if ($request->get('nombre') == null OR $request->get('nombre_completo') == null) {
        alert()->error('Hay campos sin llenar', 'Tenemos un problema')->persistent('Cerrar');
        return Redirect::to('usuarios/adm_categorias');  
      }

      //Comprueba que el ID no este duplicado
      $categoria_cont = DB::table('categorias')->where('id_categoria', $request->get('id_categoria'))->count();
      if ($categoria_cont != 0) {
        alert()->error('ID duplicado', 'Tenemos un problema')->persistent('Cerrar');
        return Redirect::to('usuarios/adm_categorias');  
      }



      try {

        DB::beginTransaction();
      
        Categoria::where('id_categoria', '=', $request->get('id_categoria'))
              ->update(['nombre' => $request->get('nombre'), 'nombre_completo' => $request->get('nombre_completo')]);

        DB::commit();
          
      } catch (Exception $e) {
          DB::rollback();
      }

        alert()->success('Categoría actualizada')->persistent('Cerrar');

      return Redirect::to('usuarios/adm_categorias');  
    }


    public function actualiza_sub_categoria(Request $request){

      //COMPROBACIONES

      //Comprueba que los campos no esten vacios
      if ($request->get('sub_categoria_nueva') == null OR $request->get('nombre_completo') == null) {
        alert()->error('Hay campos sin llenar', 'Tenemos un problema')->persistent('Cerrar');
        return Redirect::to('usuarios/adm_categorias');  
      }

      //Comprueba que el ID no este duplicado
      $categoria_cont = DB::table('sub_categorias')->where('id_categoria', $request->get('id_categoria'))->where('sub_categoria', $request->get('sub_categoria_nueva'))
      ->count();
      if ($categoria_cont != 0) {
        alert()->error('ID duplicado', 'Tenemos un problema')->persistent('Cerrar');
        return Redirect::to('usuarios/adm_categorias');  
      }

      try {

        DB::beginTransaction();

        $id_categoria = $request->get('id_categoria');
        $sub_categoria = $request->get('sub_categoria');

        SubCategoria::where('id_categoria', '=', $id_categoria)->where('sub_categoria', '=', $sub_categoria)
              ->update(['sub_categoria' => $request->get('sub_categoria_nueva'), 'nombre_completo' => $request->get('nombre_completo')]);

        DB::commit();
          
      } catch (Exception $e) {
          DB::rollback();
      }

        alert()->success('Sub-categoría actualizada')->persistent('Cerrar');

      return Redirect::to('usuarios/adm_categorias');  
    }



    public function elimina_sub_categoria(Request $request){


      try {

        DB::beginTransaction();

        $id_categoria = $request->get('id_categoria');
        $sub_categoria = $request->get('sub_categoria');

        DB::table('sub_categorias')->where('id_categoria', '=', $id_categoria)->where('sub_categoria', '=', $sub_categoria)->delete();

      

        DB::commit();
          
      } catch (Exception $e) {
          DB::rollback();
      }

        alert()->warning('Sub-categoría eliminada')->persistent('Cerrar');

      return Redirect::to('usuarios/adm_categorias');  
    }





    public function elimina_categoria(Request $request){


      try {

        DB::beginTransaction();

        DB::table('categorias')->where('id_categoria', '=', $request->get('id_categoria'))->delete();

      

        DB::commit();
          
      } catch (Exception $e) {
          DB::rollback();
      }

        alert()->warning('Categoría eliminada')->persistent('Cerrar');

      return Redirect::to('usuarios/adm_categorias');  
    }



    public function actualiza_relacion(Request $request){


      try {

        DB::beginTransaction();

        $id_categoria = $request->get('id_categoria');
        $sub_categoria = $request->get('sub_categoria');

        //return $id_categoria.' - '.$sub_categoria;

        SubCategoria::where('id_categoria', '=', $id_categoria)->where('sub_categoria', '=', $sub_categoria)
              ->update(['id_categoria' => $request->get('id_categoria_nueva')]);

        DB::commit();
          
      } catch (Exception $e) {
          DB::rollback();
      }

        alert()->success('Relación actualizada')->persistent('Cerrar');

      return Redirect::to('usuarios/adm_categorias');  
    }




    public function nueva_categoria_vehiculo(Request $request){

      try {

        DB::beginTransaction();
      
        $categoria_vehiculo = new CategoriaVehiculo;
        $categoria_vehiculo->cod=$request->get('cod');
        $categoria_vehiculo->nombre=$request->get('nombre');
        $categoria_vehiculo->save(); 

        DB::commit();
          
      } catch (Exception $e) {
          DB::rollback();
      }

      alert()->success('Categoría de vehículo creada')->persistent('Cerrar');
      return Redirect::to('usuarios/adm_categorias');  

    }



    public function actualiza_categoria_vehiculo(Request $request){

      //COMPROBACIONES

      //Comprueba que los campos no esten vacios
      if ($request->get('cod_nuevo') == null OR $request->get('nombre') == null) {
        alert()->error('Hay campos sin llenar', 'Tenemos un problema')->persistent('Cerrar');
        return Redirect::to('usuarios/adm_categorias');  
      }

      //Comprueba que el ID no este duplicado
      $categoria_cont = DB::table('categoria_vehiculo')->where('cod', $request->get('cod_nuevo'))->count();
      if ($categoria_cont != 0) {
        alert()->error('ID duplicado', 'Tenemos un problema')->persistent('Cerrar');
        return Redirect::to('usuarios/adm_categorias');  
      }


      try {

        DB::beginTransaction();
      
        CategoriaVehiculo::where('cod', '=', $request->get('cod'))
              ->update(['cod' => $request->get('cod_nuevo'), 'nombre' => $request->get('nombre')]);

        DB::commit();
          
      } catch (Exception $e) {
          DB::rollback();
      }

        alert()->success('Categoría de vehículo actualizada')->persistent('Cerrar');

      return Redirect::to('usuarios/adm_categorias');  
    }


    public function elimina_categoria_vehiculo(Request $request){


      try {

        DB::beginTransaction();

        DB::table('categoria_vehiculo')->where('cod', '=', $request->get('cod'))->delete();

      

        DB::commit();
          
      } catch (Exception $e) {
          DB::rollback();
      }

        alert()->warning('Categoría de vehículo eliminada')->persistent('Cerrar');

      return Redirect::to('usuarios/adm_categorias');  
    }




/*
    public function filtro(Request $request){
   
       $query=trim($request->get('searchText'));
       $query2=trim($request->get('searchText2'));
       $fechaMin=trim($request->get('fechaMin'));
       $fechaMax=trim($request->get('fechaMax'));
               

      
      $anuncios = DB::table('orden as o')
             ->join ('anuncio as a', 'o.id_anuncio', '=' ,'a.id_anuncio')
             //->join ('cupones as c', 'c.id_anuncio', '=' ,'a.id_anuncio')
             ->where('o.id_secretaria','LIKE', '%'.$query.'%')
              ->where('a.condicion','LIKE', '%'.$query2.'%')
               ->where('o.fecha','<=',$fechaMin,'AND','o.fecha_venc','>=',$fechaMax)  
             ->select('a.titulo','a.descripcion','a.condicion','a.id_anuncio','a.forma_pago','a.tipo_servicio')
             ->paginate(5);


             $secretarias = DB::table('secretaria')
            ->join ('users', 'users.id', '=' , 'id_secretaria')
            ->select('secretaria.id_secretaria as id_secretaria',
                    'users.nombre as nombre',
                    'users.apellido as apellido',
                    'users.rut as rut'
                    )
            ->get();


        $region=DB::table('anuncio as a')
         ->join ('region as r', 'r.REGION_ID', '=' , 'a.region')
         ->select('r.REGION_NOMBRE',DB::raw('count(a.region) as cantidad'),DB::raw('sum(total) as total'))
         ->groupBy('r.REGION_NOMBRE')
         ->get();
        
        
        //DB::table('user_visits')->groupBy('user_id')->count();

      return view('usuarios.secretarias', ["anuncios" => $anuncios,"secretarias" => $secretarias,"region"=>$region]);


    }



    public function tarjeta_store(Request $request){
      $tarjeta = new Tarjeta;
      $tarjeta->id_cliente=$request->get('id_cliente');
      $tarjeta->num_tarjeta=$request->get('num_tarjeta');
      $tarjeta->c_seguridad=$request->get('c_seguridad');
      $tarjeta->mes=$request->get('mes');
      $tarjeta->year= $request->get('year');
      $tarjeta->nombre= $request->get('nombre');
      $tarjeta->apellidos= $request->get('apellidos');
      $tarjeta->save(); 

      return Redirect::to('/');
    }
*/

}
