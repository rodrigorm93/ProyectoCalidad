@extends ('menu.alumno')
@section ('contenido')

	<div class="row">
		<div class = "col-lg-8 col-md-8 col-sm-8 col-xs-12">
	
			<h3><FONT COLOR="green">Citaciones.</FONT></h3>
			
	
		</div>	
	</div>

	<div class="row">
		<div id="div1" class = "col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<div   class="table-responsive">
            @foreach ($citacion as $c)
            <div class="post-information">
                  <h2>{{$c->titulo}}</h2>
                  <div class="entry-meta">
                    <span class="author-meta"><i class="fa fa-user"></i><a href="#">admin</a></span>
                    <span><i class="fa fa-clock-o"></i><FONT COLOR="green">{{$c->fecha}}</FONT></span>
                   
                    <!--PARTE EDITADA -->
                   
                  </div>
                  <div class="entry-content">
                  {!!($c->mensaje)!!}
                  </div>
                </div>
			
                @endforeach



			</div>
		</div>
	</div>


@stop
