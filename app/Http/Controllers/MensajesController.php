<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Contracts\Auth\Guard;
use Alert;

//Modelos

use App\Mensajes;
use DB;

use Illuminate\Support\Facades\Input;


class MensajesController extends Controller
{
 

    public function index(){
  
        
    }

    public function create(Guard $auth){

     
    }

    public function store(Request $request){
        $time = time(); 
        $fecha_actual=date("Y-m-d H:i:s");

      try {


            DB::beginTransaction();
         

            //Guardamos el mensaje enviado a la BD
            $mensaje = new Mensajes;
            $mensaje->nombre=$request->get('name');
            $mensaje->email=$request->get('email');
            $mensaje->asunto=$request->get('subject');
            $mensaje->descripcion=$request->get('message');
            $mensaje->fecha=$fecha_actual;

            $mensaje->save();


            DB::commit();
            
        } catch (Exception $e) {
            DB::rollback();
        }

        return Redirect::to('/');

    }

    public function show($id_noticia)
    {
     

    }


 


    public function destroy($id_anuncio)
    {

        try {

        DB::beginTransaction();

        $orden=DB::table('orden')->where('id_anuncio', '=', $id_anuncio)->select('id_secretaria as id_secretaria')->first();

        $secretaria=DB::table('secretaria')->where('id_secretaria', '=', $orden->id_secretaria)->select('anuncios_pend as anuncios_pend')->first();

            Secretaria::where('id_secretaria', $orden->id_secretaria)
                  ->update(['anuncios_pend' => $secretaria->anuncios_pend-1]);
      
        DB::table('anuncio')->where('id_anuncio', '=', $id_anuncio)->delete();

        DB::commit();
          
      } catch (Exception $e) {
          DB::rollback();
      }

      alert()->success('El anuncio ha sido eliminado.', '¡Listo!')->persistent('Cerrar');
      return Redirect::to('/servicios');


    }



  }