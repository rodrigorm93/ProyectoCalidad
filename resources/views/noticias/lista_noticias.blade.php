@extends ('menu.admin')
@section ('contenido')

	@if(session('success'))
		<div class="alert alert-success">
			{{session('success')}}
		</div>
	@endif

	<div class="row">
		<div class = "col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>Lista de Noticias </h3>
			<!--Busqueda de alumnos-->
		</div>	
	</div>

	<div class="row">
		<div class = "col-xs-12">
			<div class="table-responsive">
				@if(isset($noticia))
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th>ID</th>
						<th>Titulo</th>
						<th>Descripción</th>
						<th>Opciones</th>
					</thead>
					@foreach ($noticia as $n)
					<tr>
						<td>{{$n -> id_noticia}}</td>
						<td>{{$n -> titulo}}</td>
						<td>{!!str_limit($n->descripcion,40)!!}</td>
						<td>
                        <a href="{{URL::action('NoticiasController@edit', $n -> id_noticia)}}"><btn class="btn btn-info"><i class="material-icons" style="font-size:18px">border_color</i></btn></a>
						<a href="" data-target="#modal-delete-{{$n->id_noticia}}" data-toggle="modal"><btn class="btn btn-danger"><i class="fa fa-trash" style="font-size:20px;color:white"></i></btn></a>
							
						</td>
					</tr>
                    @include('noticias.modal')
					@endforeach
				</table>
				@endif
			</div>
			{{$noticia->render()}}
		</div>
	</div>

@stop
