@extends ('menu.alumno')
@section ('contenido')

	<div class="row">
		<div class = "col-lg-8 col-md-8 col-sm-8 col-xs-12">
	
			<h3><FONT COLOR="green">Mensajes.</FONT></h3>
			
	
		</div>	
	</div>

	<div class="row">
		<div  class = "col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<div   class="table-responsive">
            @foreach ($aviso as $av)
            <div class="post-information">
                  <h2>{{$av->titulo}}</h2>
                  <div class="entry-meta">
                    <span class="author-meta"><i class="fa fa-user"></i><a href="#">admin</a></span>
                    <span><i class="fa fa-clock-o"></i><FONT COLOR="green">{{$av->fecha}}</FONT></span>
                   
                    <!--PARTE EDITADA -->
                   
                  </div>
                  <div class="entry-content">
                  {!!($av->mensaje)!!}
                  </div>
                </div>
			
                @endforeach

	{{$aviso->render()}}

			</div>
		</div>
	</div>


@stop
