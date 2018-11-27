@extends ('menu.admin')
@section ('contenido')

	@if(session('success'))
		<div class="alert alert-success">
			{{session('success')}}
		</div>
	@endif

	<div class="row">
		<div class = "col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>Lista de planes anuales </h3>
			<!--Busqueda de alumnos-->
		</div>	
	</div>

	<div class="row">
		<div class = "col-xs-12">
			<div class="table-responsive">
				@if(isset($proyecto))
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						
						<th>Año</th>
						<th>Plan Anual</th>
						<th>Opciones</th>
					</thead>
					@foreach ($proyecto as $pro)
					<tr>
						
						<td>{{$pro -> descripcion}}</td>
						<td><a href="{{ Storage::url($pro->proyecto) }}" target="_blank" >Plan Anual</a></td>
						
						<td>
							<a href="{{URL::action('ProyectoController@edit', $pro -> id_proyecto)}}"><btn class="btn btn-info"><i class="material-icons" style="font-size:18px">border_color</i></btn></a>

							<a href="" data-target="#modal-delete-{{$pro->id_proyecto}}" data-toggle="modal"><btn class="btn btn-danger"><i class="fa fa-trash" style="font-size:20px;color:white"></i></btn></a>
						</td>
				
					</tr>
					@include('proyecto.modal')
					@endforeach




				</table>

				@endif
			</div>
			{{$proyecto->render()}}
		</div>
	</div>

@stop

