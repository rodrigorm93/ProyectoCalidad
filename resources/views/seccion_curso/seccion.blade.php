@extends ('menu.admin')
@section ('contenido')

	<div class="row">
		<div class = "col-lg-8 col-md-8 col-sm-8 col-xs-12">
		@foreach ($curso as $c)
			<h3>Lista de Asignacion: <FONT COLOR="green">{{$c->grado}}</FONT></h3>
			
			@endforeach
		</div>	
	</div>

	<div class="row">
		<div id="div1" class = "col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<div   class="table-responsive">
				@if(isset($seccion))
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th>Materia</th>
						<th>Alumno</th>
						<th>Opciones</th>

					</thead>
					@foreach ($seccion as $sec)
					<tr>
						<td>{{$sec -> materia}}</td>
						<td>{{$sec -> nombre}} {{$sec -> apellido}}</td>
				
				
				@if(Auth::user()->rol=='admin')
				<td>
				<a href="" data-target="#modal-delete-{{$sec->idAlumno,$sec->idMateria}}" data-toggle="modal"><btn class="btn btn-danger"><i class="fa fa-trash" style="font-size:20px;color:white"></i> </btn></a>
			     </td>
				 @endif


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
	@if(Auth::user()->rol=='admin')
	{!!Form::open(array('url'=>'seccion_curso/reiniciarCurso', 'method'=>'GET', 'autocomplete'=>'off'))!!}
                {{Form::token()}}
				@foreach ($seccion as $s)
				<input id="Alumnos" type="hidden" name="Alumnos[]" value="{{$s -> idAlumno}}">
				@endforeach
	<button class="btn btn-danger" type="submit">Reiniciar Curso</button>
	@endif
	
	{!!Form::close()!!}	
@stop
