@extends ('menu.admin')
@section ('contenido')

	@if(session('success'))
		<div class="alert alert-success">
			{{session('success')}}
		</div>
	@endif

	<div class="row">
		<div class = "col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>Materias Impartidas </h3>
			<!--buaqueda de alumnos-->
		</div>	
	</div>

	<div class="row">
		<div class = "col-xs-12">
			<div class="table-responsive">
				@if(isset($materia))
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th>Id</th>
						<th>Materia</th>
						<th>Profesor que lo Imparte</th>
					</thead>
				
					<tr>
					@foreach ($materia as $m)
					<td>{{$m -> id}}</td>
					<td>{{$m -> nombreM}}</td>
					<td>{{$m -> nombreP}} {{$m -> apellido}}</td>
							
		
				 </tr>
			
					@endforeach
				</table>
				@endif
			</div>
			
		</div>
	</div>

@stop
