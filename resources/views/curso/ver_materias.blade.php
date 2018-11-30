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
						<th>Editar</th>
					</thead>
				
					<tr>
					@foreach ($materia as $m)
					<td>{{$m -> id}}</td>
					<td>{{$m -> nombreM}}</td>
					<td>{{$m -> nombreP}} {{$m -> apellido}}</td>

					     {!!Form::open(array('url'=>'curso/editMateria', 'method'=>'GET', 'autocomplete'=>'off'))!!}
            {{Form::token()}}
					<td>
					@if(Auth::user()->rol=='admin')
					<input type="hidden" name="idMateria"  value="{{$m->id}}">
					<button class="btn btn-info" type="submit">
                    <i class="material-icons" style="font-size:18px">border_color</i>
					@endif
					</td>	
					{!!Form::close()!!}
				 </tr>
			
					@endforeach
				</table>
				@endif
			</div>
			
		</div>
	</div>

@stop
