@extends('layouts.principal')
@section('contenido')

@foreach ($noticia as $noticia)
<div class="row">

          <!-- Start Left Blog -->
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="single-blog">
              <div class="single-blog-img">
                <a href="{{URL::action('NoticiasController@show', $noticia->id_noticia)}}">
				<img style="width:100%; height: 100%" src="{{$noticia -> foto}}" alt="" ></a>
              </div>
              <div class="blog-meta">
                <span class="date-type">
										<i class="fa fa-calendar"></i>{{$noticia->fechacreacion}}
									</span>
              </div>
              <div class="blog-text">
                <h4>
                                        <a href="blog.html">{{$noticia->titulo}}</a>
									</h4>
                <section class="special box">
                {{str_limit($noticia->descripcion,340)}}
                </section>
              </div>
              <span>
              <a href="{{URL::action('NoticiasController@show', $noticia->id_noticia)}}" 
              class="ready-btn page-scroll">Ver Más</a>
              
				</span>
            </div>
           
</div>
@endforeach   
@stop
