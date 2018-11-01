@extends ('menu.admin')
@section ('contenido')

	@if(session('success'))
		<div class="alert alert-success">
			{{session('success')}}
		</div>
	@endif


	{!!Form::open(array('url'=>'proyecto', 'method'=>'POST', 'class'=>'stdform', 'files' => true, 'name'=>'proyectoin', 'enctype' => 'multipart/form-data', 'autocomplete'=>'off'))!!}

		<div class="form-group">
			<label for="">Descripcion</label>
			<input type="text" name="descripcion" class="form-control">
		</div>

		<div class="form-group">
			<label for="">Proyecto</label>
			<input type="file" name="archivo">
		</div>

		<button type="submit" class="btn btn-primary">Guardar</button>

@stop