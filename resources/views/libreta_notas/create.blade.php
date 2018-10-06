@extends ('menu.profesor')
@section ('contenido')

	<!-- Estilos CSS	-->
	{!!Html::style('css/extra.css')!!}

	<div class="row">
		<div class = "col-lg-8 col-md-8 col-sm-8 col-xs-12">
        @foreach ($materia as $m)
			<legend><h3>Notas de {{$m->nombre}} </h3></legend>
            @endforeach
            
		</div>	
	</div>
    {!!Form::open(array('url'=>'notas/ingresarNotas', 'method'=>'POST', 'autocomplete'=>'off'))!!}
            {{Form::token()}}
	<div class="row">
		<div class = "col-xs-12">
			<div class="table-responsive">
				@if(isset($alumnos))
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						
						<th>Nombre</th>
						<th>Apellido</th>
                        <th>Nota 1 </th>
                        <th>Nota 2 </th>
                        <th>Nota 3 </th>
                        <th>Nota 4 </th>
                        <th>Nota 5 </th>
                        <th>Nota 6 </th>
                        <th>Nota 7 </th>
                        <th>Nota 8 </th>
                        <th>Nota 9 </th>
                        <th>Nota 10 </th>
                        <th>Nota 11 </th>
                        <th>Nota 12 </th>
                        <th>Promedio</th>

					</thead>
					@foreach ($alumnos as $a)
					<tr>
                    <input id="idAlumno" type="hidden" name="idAlumno[]" value="{{$a -> idAlumno}}">
                    <input id="idMateria" type="hidden" name="idMateria" value="{{$a -> idMateria}}">
						<td>{{$a -> nombre}}</td>
						<td>{{$a -> apellido}}</td>
                        @foreach ($materia as $m)
                        <input id="nombreMateria" type="hidden" name="nombreMateria" value="{{$m -> nombre}}">

                        @if($m->nombre === 'Lenguaje y Comunicación')
                    
                       <td> <input id="n1" type="text" name="n1[]" value="{{$a->n1}}"  style="width:40px"></td>	
                       <td> <input id="n2" type="text" name="n2[]" value="{{$a->n2}}" style="width:40px"></td>	
                       <td> <input id="n3" type="text" name="n3[]" value="{{$a->n3}}" style="width:40px"></td>	
                       <td> <input id="n4" type="text" name="n4[]" value="{{$a->n4}}" style="width:40px"></td>	
                       <td> <input id="n5" type="text" name="n5[]" value="{{$a->n5}}" style="width:40px"></td>	
                       <td> <input id="n6" type="text" name="n6[]" value="{{$a->n6}}" style="width:40px"></td>
                       <td> <input id="n7" type="text" name="n7[]" value="{{$a->n7}}" style="width:40px"></td>	
                       <td> <input id="n8" type="text" name="n8[]" value="{{$a->n8}}" style="width:40px"></td>	
                       <td> <input id="n9" type="text" name="n9[]" value="{{$a->n9}}" style="width:40px"></td>	
                       <td> <input id="n10" type="text" name="n10[]" value="{{$a->n10}}" style="width:40px"></td>	
                       <td> <input id="n11" type="text" name="n11[]" value="{{$a->n11}}" style="width:40px"></td>	
                       <td> <input id="n12" type="text" name="n12[]" value="{{$a->n12}}" style="width:40px"></td>
                     
                     @elseif($m->nombre === 'Matemáticas')
                     <td> <input id="n1" type="text" name="n1[]" value="{{$a->n1}}"  style="width:40px"></td>	
                       <td> <input id="n2" type="text" name="n2[]" value="{{$a->n2}}" style="width:40px"></td>	
                       <td> <input id="n3" type="text" name="n3[]" value="{{$a->n3}}" style="width:40px"></td>	
                       <td> <input id="n4" type="text" name="n4[]" value="{{$a->n4}}" style="width:40px"></td>	
                       <td> <input id="n5" type="text" name="n5[]" value="{{$a->n5}}" style="width:40px"></td>	
                       <td> <input id="n6" type="text" name="n6[]" value="{{$a->n6}}" style="width:40px"></td>
                       <td> <input id="n7" type="text" name="n7[]" value="{{$a->n7}}" style="width:40px"></td>	
                       <td> <input id="n8" type="text" name="n8[]" value="{{$a->n8}}" style="width:40px"></td>

                       <td> <input id="n9" type="hidden" name="n9[]" value="0" style="width:40px"></td>	
                       <td> <input id="n10" type="hidden" name="n10[]" value="0" style="width:40px"></td>	
                       <td> <input id="n11" type="hidden" name="n11[]" value="0" style="width:40px"></td>	
                       <td> <input id="n12" type="hidden" name="n12[]" value="0" style="width:40px"></td>
                       @endif
                       @endforeach
                      <td>{{$a->promedio}}</td>
                     
					</tr>
                    @endforeach
                
				</table>
				@endif
				<div id="next_button" align="right">
                <button class="btn btn-primary" type="submit">Guardar Notas</button>
				</div>
			</div>
            {!!Form::close()!!}
		</div>
	</div>



@stop
