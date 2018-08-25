@extends ('menu.profesor')
@section ('contenido')

	<!-- Estilos CSS	-->
	{!!Html::style('css/extra.css')!!}

	<div class="row">
		<div class = "col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<legend><h3>Lista de Alumnos </h3></legend>
		</div>	
	</div>

	<div class="row">
		<div class = "col-xs-12">
			<div class="table-responsive">
				@if(isset($lista))
				<table id="tablaAlumnos" class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						
						<th>Nombre</th>
						<th>Apellido</th>
						
					</thead>
					@foreach ($lista as $usu)
					<tr>
						<td>{{$usu -> nombre}}</td>
						<td>{{$usu -> apellido}}</td>	
					</tr>
					@endforeach
				</table>
				@endif
				<div id="next_button" align="right">
					<button id="exportar" class="btn btn-success" align="right">Exportar</button>
				</div>
			</div>
			{{$lista->render()}}
		</div>
	</div>

	@push('scripts')
    <script type="text/javascript">
		$(document).ready(function () {
			$("#exportar").click(function(){
			  $("#tablaAlumnos").table2excel({
			    filename: "lista alumnos.xlsx"
			  }); 
			});
		});
	</script>
	@endpush

@stop
