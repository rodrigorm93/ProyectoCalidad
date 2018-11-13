@extends ('menu.admin')
@section ('contenido')

	@if(session('success'))
		<div class="alert alert-success">
			{{session('success')}}
		</div>
	@endif

	<legend class="text-center header">Plan Anual </legend>


	{!!Form::open(array('url'=>'proyecto', 'method'=>'POST', 'class'=>'stdform', 'files' => true, 'name'=>'proyectoin', 'enctype' => 'multipart/form-data', 'autocomplete'=>'off'))!!}

		<div class="form-group">
			<label for="">Año</label>
			<input type="text" name="descripcion" class="form-control" placeholder="YYYY">
		</div>

		<div class="form-group">
			<label for="">Plan Anual</label>
			<input type="file" name="archivo">
		</div>

		<button type="submit" class="btn btn-primary">Guardar</button>

@stop