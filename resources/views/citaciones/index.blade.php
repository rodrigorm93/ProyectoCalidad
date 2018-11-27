@extends ('menu.admin')
@section ('contenido')

	@if(session('success'))
		<div class="alert alert-success">
			{{session('success')}}
		</div>
	@endif

	<div class="row">
		<div class = "col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>Lista de Citaciones </h3>
			<!--Busqueda de alumnos-->
		</div>	
	</div>

	<div class="row">
		<div class = "col-xs-12">
			<div class="table-responsive">
				@if(isset($citaciones))
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th>ID</th>
						<th>Titulo</th>
						<th>Mensaje</th>
                        <th>Alumno</th>
						<th>Fecha</th>
						<th>Opciones</th>
					</thead>
					@foreach ($citaciones as $c)
					<tr>
						<td>{{$c -> id_citacion}}</td>
						<td>{{$c -> titulo}}</td>
						<td>{!!str_limit($c->mensaje,20)!!}</td>
                        <td>{{$c -> nombre}} {{$c -> apellido}}</td>
                        <td>{{$c -> fecha}}</td>

						<td>
                        <a href="{{URL::action('CitacionesController@edit', $c -> id_citacion)}}"><btn class="btn btn-info"><i class="material-icons" style="font-size:18px">border_color</i></btn></a>
						<a href="" data-target="#modal-delete-{{$c->id_citacion}}" data-toggle="modal"><btn class="btn btn-danger"><i class="fa fa-trash" style="font-size:20px;color:white"></i></btn></a>
							
						</td>
					</tr>
                    @include('citaciones.modal')
					@endforeach
				</table>
				@endif
			</div>
			{{$citaciones->render()}}
		</div>
	</div>

@stop
