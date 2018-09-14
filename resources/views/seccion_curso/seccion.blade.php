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
						<th>Alumno</th>

					</thead>
					@foreach ($seccion as $sec)
					<tr>
						<td>{{$sec -> grado}}</td>
						<td>{{$sec -> materia}}</td>
						<td>{{$sec -> nombre}} {{$sec -> apellido}}</td>
						<td>
				<td>
				<a href="" data-target="#modal-delete-{{$sec->idAlumno,$sec->idMateria}}" data-toggle="modal"><btn class="btn btn-danger"><i class="fa fa-trash" style="font-size:20px;color:white"></i> </btn></a>
			     </td>

				 <td>
				 <a href="" data-target="#modal_materias-delete-{{$sec->idAlumno}}" data-toggle="modal"><btn class="btn btn-danger"><i class="fa fa-trash" style="font-size:20px;color:white"></i> </btn></a>
				<td>
			
						</td>
					</tr>
				@include('seccion_curso.modal')
				@include('seccion_curso.modal_materias')
				@endforeach
				</table>
				@endif
			</div>
			{{$seccion->render()}}
		</div>
	</div>

@stop
