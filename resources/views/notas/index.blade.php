@extends ('menu.admin')
@section ('contenido')

	@if(session('success'))
		<div class="alert alert-success">
			{{session('success')}}
		</div>
	@endif

	<div class="row">
		<div class = "col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>Estado de Notas </h3>
			<!--Busqueda de alumnos-->
		</div>	
	</div>
    
    {!!Form::open(array('url'=>'notas/updatePromedio', 'method'=>'GET', 'autocomplete'=>'off'))!!}
            {{Form::token()}}
	<div class="row">
		<div class = "col-xs-12">
			<div class="table-responsive">
				@if(isset($aprobados))
               
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th>ID Alumno</th>
						<th>Promedio Final</th>
						<th>Estado</th>
					</thead>
					@foreach ($aprobados as $usu)
                
                    <!-- Solo cargaremos los alumnos con promedio 4-->
                   
					<tr>
						<td>{{$usu -> idAlumno}}</td>
                        <td>{{$usu -> promedioFinal}}</td>
                         <input type="hidden" name="promedioFinal[]" value="{{$usu -> promedioFinal}}">
                         <input type="hidden" name="idAlumno[]" value="{{$usu -> idAlumno}}">
						@if($usu -> promedioFinal >= '39.5') 
						<td><FONT COLOR="green"><strong> Aprobado</strong></FONT></td>
						<input type="hidden" name="estado[]" value="A">
						@else
						<td><FONT COLOR="red"><strong>Reprobado</strong></FONT></td>
						<input type="hidden" name="estado[]" value="R">
						@endif
					</tr>
					@endforeach
				</table>
				@endif
			</div>
            <button class="btn btn-primary" type="submit">Guardar Promedios</button>
            {!!Form::close()!!}
		</div>
	</div>

@stop
