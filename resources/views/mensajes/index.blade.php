@extends ('menu.admin')
@section ('contenido')

	@if(session('success'))
		<div class="alert alert-success">
			{{session('success')}}
		</div>
	@endif

	<div class="row">
		<div class = "col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>Mensajes </h3>
			<!--Busqueda de alumnos-->
		</div>	
	</div>

	<div class="row">
		<div class = "col-xs-12">
			<div class="table-responsive">
				@if(isset($msj))
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
					
						<th>Nombre</th>
						<th>Email</th>
                        <th>Asunto</th>
						<th>Descripcion</th>
                        <th>Fecha</th>
					
					</thead>
					@foreach ($msj as $m)
					<tr>
						<td>{{$m ->nombre}}</td>
						<td>{{$m ->email}}</td>
                        <td>{{$m ->asunto}}</td>
						<td>{{$m->descripcion}}</td>
                        <td>{{$m ->fecha}}</td>

						<td>
						<a href="" data-target="#modal-delete-{{$m->idMensaje}}" data-toggle="modal"><btn class="btn btn-danger"><i class="fa fa-trash" style="font-size:20px;color:white"></i></btn></a>
							
						</td>
					</tr>
                    @include('mensajes.modal')
					@endforeach
				</table>
				@endif
			</div>
			{{$msj->render()}}
		</div>
	</div>

@stop
