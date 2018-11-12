@extends ('menu.admin')
@section ('contenido')

	@if(session('success'))
		<div class="alert alert-success">
			{{session('success')}}
		</div>
	@endif

	<legend class="text-center header">Editar proyecto {{ $proyecto->id_proyecto}} </legend>


	{!!Form::open(array('url'=>'proyecto/edit', 'method'=>'POST', 'class'=>'stdform', 'files' => true, 'name'=>'formu', 'enctype' => 'multipart/form-data', 'autocomplete'=>'off'))!!}

		<div class="form-group">
			<label for="">Descripcion</label>
			<input type="text" name="descripcion1" class="form-control">
		</div>

		<div class="form-group">
			<label for="">Proyecto</label>
			<input type="file" name="archivo1">
		</div>
		{!! Form::close() !!}



		<button type="submit" class="btn btn-primary">actualizar</button>

		

@stop