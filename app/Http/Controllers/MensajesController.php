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
        $msj = DB::table('mensajes as m')
        ->select('m.idMensaje',
                  'm.nombre',
                  'm.fecha',
                  'm.descripcion',
                  'm.asunto',
                  'm.email'
        )
        ->paginate(5);

        return view('mensajes.index', ['msj'=> $msj]);
        
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
        return Redirect::to('/#contact');

    }

    public function show($id_noticia)
    {
     

    }


 


    public function destroyMsj(Request $request)
    {


    }



  }