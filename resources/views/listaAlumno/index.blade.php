@extends ('menu.profesor')
@section ('contenido')

	<!-- Estilos CSS	-->
	{!!Html::style('css/extra.css')!!}

	<div class="row">
		<div class = "col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<legend><h3>Listado de Alumnos </h3></legend>
		</div>	
	</div>

	<div class="row">
		<div id="div1" class = "col-xs-6">
			<div class="table-responsive">
				@if(isset($lista))
				<table id="tablaAlumnos" class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						
						<th>Nombre</th>
						<th>Apellido</th>
						<th>Email</th>
						
					</thead>
					@foreach ($lista as $usu)
					<tr>
						<td>{{$usu -> nombre}}</td>
						<td>{{$usu -> apellido}}</td>
						<td>{{$usu -> email}}</td>	
					</tr>
					@endforeach
			
				</table>
				@endif
				
			</div>
			
		</div>
	</div>
	<div id="next_button" align="center">
					<button id="exportar" class="btn btn-success" align="right">Exportar</button>
				</div>

	@push('scripts')
    <script type="text/javascript">
		$(document).ready(function () {
			$("#exportar").click(function(){
			  $("#tablaAlumnos").table2excel({
				name: "listaAlumnos",
			    filename: "listaAlumnos",
				fileext: ".xlsx"
			  }); 
			});
		});
	</script>
	@endpush

@stop
