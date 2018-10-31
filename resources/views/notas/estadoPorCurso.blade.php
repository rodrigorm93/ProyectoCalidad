@extends ('menu.admin')
@section ('contenido')

	@if(session('success'))
		<div class="alert alert-success">
			{{session('success')}}
		</div>
	@endif

	<div class="row">
		<div class = "col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>Estado de Notas</h3>
			<!--Busqueda de alumnos-->
		</div>	
	</div>
    
    {!!Form::open(array('url'=>'notas/updatePromedio', 'method'=>'GET', 'autocomplete'=>'off'))!!}
            {{Form::token()}}
	<div id="div1" class="row">
		<div class = "col-xs-12">
			<div class="table-responsive">
				@if(isset($alumnos))
               
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th>ID Alumno</th>
						<th>Promedio Final</th>
					
					</thead>
					@foreach ($alumnos as $usu)
                
                    <!-- Solo cargaremos los alumnos con promedio 4-->
                   
					<tr>
						<td>{{$usu -> idAlumno}}</td>
                       
                         
                         <input type="hidden" name="idAlumno[]" value="{{$usu -> idAlumno}}">

						 @if($usu -> promedioFinal >='61' && $usu -> promedioFinal <= '70')
						 <td>{{$usu -> promedioFinal}}</td> 
						 <td><FONT COLOR="green"><strong> Aprobado</strong></FONT></td>
						 <input type="hidden" name="promedioFinal[]" value="{{$usu -> promedioFinal}}">
						<input type="hidden" name="estado[]" value="AM">

						@elseif($usu -> promedioFinal >= '40' && $usu -> promedioFinal <= '60') 
						<td>{{$usu -> promedioFinal}}</td>
						<td><FONT COLOR="green"><strong> Aprobado</strong></FONT></td>
						<input type="hidden" name="promedioFinal[]" value="{{$usu -> promedioFinal}}">
						<input type="hidden" name="estado[]" value="A">

						@elseif($usu -> promedioFinal >= '21' && $usu -> promedioFinal < '40') 
						<td><input type="text" name="promedioFinal[]" value="{{$usu -> promedioFinal}}"></td>
				
						<td><FONT COLOR="red"><input type="text" name="estado[]" value="PA"></FONT></td>

						@else
						<td>{{$usu -> promedioFinal}}</td>
						<td><FONT COLOR="red"><strong>Reprobado </strong></FONT></td>
						<input type="hidden" name="promedioFinal[]" value="{{$usu -> promedioFinal}}">
						<input type="hidden" name="estado[]" value="NA">


						@endif

					</tr>
					@endforeach
				</table>
				@endif
			</div>
           
            
		</div>
	</div>
	<button class="btn btn-primary" type="submit">Guardar Promedios</button>
	{!!Form::close()!!}
@stop
