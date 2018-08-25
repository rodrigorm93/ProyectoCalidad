<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Contracts\Auth\Guard;
use Alert;

//Modelos
use App\Imagenes;
use App\Noticias;

use Image; 
use DB;
use PDF;
use Illuminate\Support\Facades\Input;


class NoticiasController extends Controller
{
    protected $auth;
   
    //vamos a declarar un constructor:
    public function __construct(Guard $auth)
    {
        //le diremos que gestione el acceso por usuario 
    }

    public function index(){
  
          //Cargamos las noticias en nuestra pagina principal
          $noticia = DB::table('noticias as n')
          ->join ('fotos as f', 'n.id_noticia', '=' , 'f.id_noticia')
          ->select('n.id_noticia as id_noticia',
                  'n.titulo as titulo',
                  'n.descripcion as descripcion',
                  'n.fecha as fechacreacion',
                  'f.foto as foto'
                  
                  )
          ->orderBy('n.id_noticia', 'desc')
          ->paginate(10);

          $noticia2 = DB::table('noticias as n')
          ->join ('fotos as f', 'n.id_noticia', '=' , 'f.id_noticia')
          ->select('n.id_noticia as id_noticia',
                  'n.titulo as titulo',
                  'n.descripcion as descripcion',
                  'n.fecha as fechacreacion',
                  'f.foto as foto'
                  )
          ->take(4)
          ->orderBy('n.id_noticia', 'desc')
          ->get();
  
          return view('noticias.index', ['noticia'=> $noticia,'noticia2'=> $noticia2]);

        
    }

    public function create(Guard $auth){

        $this->middleware('auth');
        $this->auth =$auth;


        return view('noticias.create');
    }

    public function store(Request $request){ 
        $fecha_actual=date('Y-m-d');

      try {

            DB::beginTransaction();

            //Guarda los datos del anuncio
            $noticia = new Noticias;
            $lastValue = DB::table('noticias')->orderBy('id_noticia', 'desc')->first();
            if(count($lastValue) < 1){
              $noticia->id_noticia = 1;   
            }else{
              $noticia->id_noticia = $lastValue->id_noticia + 1 ;
            }
            $noticia->titulo = $request->get('titulo');
            $noticia->descripcion = $request->get('descripcion');
            $noticia->fecha=$fecha_actual;
            
            $noticia->save();


            //AQUI SE GUARDAN LAS FOTOS
            //Se crean los array de los siguientes datos:
            $file = Input::file('imagen');

            $cont = 0;

            //Se recorren y asignan los array
            while($cont < count($file)){

                /*
                $temp = file_get_contents($file[$cont] );
                $image = base64_encode($temp);

                $imagen = new Imagenes;
                $imagen->id_foto = $cont;
                $imagen->id_anuncio = $anuncio->id_anuncio;
                $imagen->foto = $image;
                $imagen->save();   

                $cont = $cont+1;
                */
                if ($file[$cont]->guessExtension() != 'jpeg') {
                    alert()->error('Las imágenes deben estar en formato jpeg')->persistent('Cerrar');
                    return Redirect::to('/');
                }

                $aleatorio = str_random(50);
                $nombre = $aleatorio.'-'.$file[$cont]->getClientOriginalName();
                $path = public_path('uploads/'.$nombre);
                $url = '/uploads/'.$nombre;
                $imagen = Image::make($file[$cont]->getRealPath())->resize(1280, 820);
                $imagen->save($path);

                $imagen = new Imagenes;
                $imagen->id_foto = $cont;
                $imagen->id_noticia = $noticia->id_noticia;
                $imagen->foto = $url;
                $imagen->save();   

                $cont = $cont+1;

            }


            DB::commit();
            
        } catch (Exception $e) {
            DB::rollback();
        }

        return Redirect::to('/menu');

    }

    public function show($id_noticia)
    {
        $noticia = DB::table('noticias')->where('id_noticia', $id_noticia)->first();//sacamos la noticia
        $imagen = DB::table('fotos')->where('id_noticia', $id_noticia)->get();//sacamos la imagenes
        
        $noticiaR = DB::table('noticias as n')
        ->join ('fotos as f', 'n.id_noticia', '=' , 'f.id_noticia')
        ->select('n.id_noticia as id_noticia',
                'n.titulo as titulo',
                'n.descripcion as descripcion',
                'n.fecha as fechacreacion',
                'f.foto as foto'
                )
        ->take(4)
        ->orderBy('n.id_noticia', 'desc')
        ->get();

        return view("noticias.ver_noticias", ['noticia' => $noticia,'imagen' => $imagen,'noticiaR' => $noticiaR]);
       

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