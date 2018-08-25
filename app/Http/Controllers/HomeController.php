<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    
        //Cargamos las noticias en nuestra pagina principal
        $noticia = DB::table('noticias as n')
        ->join ('fotos as f', 'n.id_noticia', '=' , 'f.id_noticia')
        ->select('n.id_noticia as id_noticia',
                'n.titulo as titulo',
                'n.descripcion as descripcion',
                'n.fecha as fechacreacion',
                'f.foto as foto'
                )
        ->take(3)
        ->orderBy('n.id_noticia', 'desc')
        ->get();

        return view('/home', ['noticia'=> $noticia]);

     //  return view('menu.admin');
    
}
}
