@extends ('menu.admin')
@section ('contenido')

	@if(session('success'))
		<div class="alert alert-success">
			{{session('success')}}
		</div>
	@endif

	<legend class="text-center header">Editar Plan Anual </legend>


	{!!Form::model($proyecto, ['method'=>'PATCH', 'route'=>['proyecto.update', $proyecto->id_proyecto],'files' => true,'autocomplete'=>'off']) !!}
            {{Form::token()}}

		<div class="form-group">
			<label for="">Año</label>
			<input type="text" name="descripcion1" class="form-control" values="{{$proyecto->descripcion}}" placeholder="{{$proyecto->descripcion}}" >
		</div>

		<div class="form-group">
			<label for="">Plan Anual</label>
			<input type="file" name="archivo1" values="{{$proyecto->proyecto}}">
		</div>
		
		<div class="form-group">
                <button class="btn btn-primary" type="submit">Guardar</button>
                <button class="btn btn-danger" type="submit">Cancelar</button>
        </div>
		{!! Form::close() !!}
		

@endsection