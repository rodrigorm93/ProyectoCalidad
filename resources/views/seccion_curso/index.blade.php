@extends ('menu.admin')
@section ('contenido')

	<div class="row">
		<div class = "col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>Lista de Asignaciones</h3>
		</div>	
	</div>

	<div class="row">
		<div class = "col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<div class="table-responsive">
				@if(isset($seccion))
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th>Curso</th>
						<th>Materia</th>
						<th>Nombre Alumno</th>
						
					</thead>
					@foreach ($seccion as $sec)
					<tr>
						<td>{{$sec -> grado}}</td>
						<td>{{$sec -> materia}}</td>
						<td>{{$sec -> nombre}} {{$sec -> apellido}}</td>
		
					</tr>
				@include('seccion_curso.modal')
				@endforeach
				</table>
				@endif
			</div>
			{{$seccion->render()}}
		</div>
	</div>

@stop
