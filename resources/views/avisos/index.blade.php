@extends ('menu.admin')
@section ('contenido')

	@if(session('success'))
		<div class="alert alert-success">
			{{session('success')}}
		</div>
	@endif

	<div class="row">
		<div class = "col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>Lista de Mensajes </h3>
			<!--Busqueda de alumnos-->
		</div>	
	</div>

	<div class="row">
		<div class = "col-xs-12">
			<div class="table-responsive">
				@if(isset($avisos))
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th>ID</th>
						<th>Titulo</th>
						<th>Mensaje</th>
						<th>Fecha</th>
						<th>Opciones</th>
					</thead>
					@foreach ($avisos as $av)
					<tr>
						<td>{{$av -> id_aviso}}</td>
						<td>{{$av -> titulo}}</td>
						<td>{!!str_limit($av->mensaje,40)!!}</td>
                        <td>{{$av -> fecha}}</td>
						<td>
                  
						<a href="" data-target="#modal-delete-{{$av->id_aviso}}" data-toggle="modal"><btn class="btn btn-danger"><i class="fa fa-trash" style="font-size:20px;color:white"></i></btn></a>
							
						</td>
					</tr>
                    @include('avisos.modal')
					@endforeach
				</table>
				@endif
			</div>
			{{$avisos->render()}}
		</div>
	</div>

@stop
