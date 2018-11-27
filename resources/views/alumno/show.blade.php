@extends ('menu.utp')
@section ('contenido')

	@if(session('success'))
		<div class="alert alert-success">
			{{session('success')}}
		</div>
	@endif

	<div class="row">
		<div class = "col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>Lista de Alumnos </h3>
			<!--Busqueda de alumnos-->
		</div>	
	</div>

	<div class="row">
		<div class = "col-xs-12">
			<div class="table-responsive">
				@if(isset($usuarios))
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th>Id</th>
						<th>Nombre</th>
						<th>Apellido</th>
						<th>Correo</th>
						<th>Genero</th>
						<th>Edad</th>
						<th>Año de ingreso</th>
						
					</thead>
					@foreach ($usuarios as $usu)
					<tr>
						<td>{{$usu -> id}}</td>
						<td>{{$usu -> nombre}}</td>
						<td>{{$usu -> apellido}}</td>
						<td>{{$usu -> email}}</td>
						<td>{{$usu -> genero}}</td>
						<td>{{$usu -> edad}}</td>
						<td>{{$usu -> ingreso}}</td>
						
					</tr>
					@include('alumno.modal')
					@endforeach
				</table>
				@endif
			</div>
			{{$usuarios->render()}}
		</div>
	</div>

@stop
