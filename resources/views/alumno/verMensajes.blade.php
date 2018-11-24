@extends ('menu.alumno')
@section ('contenido')

	<div class="row">
		<div class = "col-lg-8 col-md-8 col-sm-8 col-xs-12">
    
			<h3><FONT COLOR="green">Mensajes</FONT></h3>
    
			
	</div>
    
	</div>

	<div class="row">
		<div id="div1" class = "col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<div   class="table-responsive">
			
				<table id="libreta" class="table table-striped table-bordered table-condensed table-hover">
                <div class="entry-content">
                  {!!($msj->mensaje)!!}
                  </div>
				</table>
		</div>
	</div>


@stop
