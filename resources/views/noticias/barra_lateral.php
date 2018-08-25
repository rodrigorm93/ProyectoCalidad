@extends('layouts.ver_noticias')
@section('contenido')

   <div class="single-blog-page">
              <!-- recent start -->
              <div class="left-blog">
                <h4>Noticias Recientes</h4>
                <div class="recent-post">
                  <!-- start single post -->
                  @foreach ($noticiaR as $noticiaR)
                  <div class="recent-single-post">
                    <div class="post-img">
                      <a href="{{URL::action('NoticiasController@show', $noticiaR->id_noticia)}}">
                      <img style="width:100%; height: 100%" src="{{$noticiaR -> foto}}" alt="" >
												</a>
                    </div>
                    <div class="pst-content">
                      <p><a href="#"> {!!str_limit($noticiaR->descripcion,55)!!}</a></p>
                    </div>
                   
                  </div>
                 
                  @endforeach 
