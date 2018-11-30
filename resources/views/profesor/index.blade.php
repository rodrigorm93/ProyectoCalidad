@extends ('menu.admin')
@section ('contenido')

	@if(session('profesores'))
		<div class="alert alert-success">
			{{session('profesores')}}
		</div>
	@endif

	<div class="row">
		<div class = "col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>Lista de profesores</h3>
			
		</div>	
	</div>

	<div class="row">
		<div class = "col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<div class="table-responsive">
				@if(isset($usuarios))
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th>Id</th>
						<th>Nombre</th>
						<th>Apellido</th>
						<th>correo</th>
						<th>Opciones</th>
					</thead>
					@foreach ($usuarios as $usu)
					<tr>
						<td>{{$usu -> id}}</td>
						<td>{{$usu -> nombre}}</td>
						<td>{{$usu -> apellido}}</td>
						<td>{{$usu -> email}}</td>
						@if(Auth::user()->rol=='admin')
						<td>
							<a href="{{URL::action('ProfesorController@edit', $usu -> id)}}"><btn class="btn btn-info"><i class="material-icons" style="font-size:18px">border_color</i></btn></a>
							<a href="" data-target="#modal-delete-{{$usu->id}}" data-toggle="modal"><btn class="btn btn-danger"><i class="fa fa-trash" style="font-size:20px;color:white"></i></btn></a>
						</td>
						@endif
					</tr>
					@include('profesor.modal')
					@endforeach
				</table>
				@endif
			</div>
			{{$usuarios->render()}}
		</div>
	</div>

@stop
