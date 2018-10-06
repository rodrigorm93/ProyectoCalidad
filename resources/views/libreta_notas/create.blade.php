@extends ('menu.profesor')
@section ('contenido')

	<!-- Estilos CSS	-->
	{!!Html::style('css/extra.css')!!}

	<div class="row">
		<div class = "col-lg-8 col-md-8 col-sm-8 col-xs-12">
        @foreach ($materia as $m)
			<legend><h3>Notas de {{$m->nombre}} Semestre {{$m->semestre}} </h3></legend>
            @endforeach
            
		</div>	
	</div>
    {!!Form::open(array('url'=>'notas/ingresarNotas', 'method'=>'POST', 'autocomplete'=>'off'))!!}
            {{Form::token()}}
	<div class="row">
		<div id="div1" class = "col-xs-12">
			<div class="table-responsive">
				@if(isset($alumnos))
				<table  class="table table-striped table-bordered table-condensed table-hover">
					<thead>
                    @foreach ($materia as $m)
                 
						<th>Nombre</th>
						<th>Apellido</th>
                        @if($m->nombre === 'Lenguaje y Comunicación' && $m->semestre==='1')
                        <th>Nota 1 </th>
                        <th>Nota 2 </th>
                        <th>Nota 3 </th>
                        <th>Nota 4 </th>
                        <th>Nota 5 </th>
                        <th>Nota 6 </th>
                        <th>Promedio</th>
                        @elseif($m->nombre === 'Lenguaje y Comunicación' && $m->semestre==='2')
                        <th>Nota 7 </th>
                        <th>Nota 8 </th>
                        <th>Nota 9 </th>
                        <th>Nota 10 </th>
                        <th>Nota 11 </th>
                        <th>Nota 12 </th>
                        <th>Promedio</th>
                        @elseif($m->semestre==='1')
                        <th>Nota 1 </th>
                        <th>Nota 2 </th>
                        <th>Nota 3 </th>
                        <th>Nota 4 </th>
                        <th>Promedio</th>
                        @else
                        <th>Nota 5 </th>
                        <th>Nota 6 </th>
                        <th>Nota 7 </th>
                        <th>Nota 8 </th>
                        <th>Promedio</th>
                      
                        @endif
                        @endforeach  
                       
					</thead>
					@foreach ($alumnos as $a)
					<tr>
                    <input id="idAlumno" type="hidden" name="idAlumno[]" value="{{$a -> idAlumno}}">
                    <input id="idMateria" type="hidden" name="idMateria" value="{{$a -> idMateria}}">
                    <input id="promedio_s1" type="hidden" name="promedio_s1[]" value="{{$a->promedio_s1}}" >
                    <input id="promedio_s2" type="hidden" name="promedio_s2[]" value="{{$a->promedio_s2}}">

						<td>{{$a -> nombre}}</td>
						<td>{{$a -> apellido}}</td>
                        @foreach ($materia as $m)
                        <input id="nombreMateria" type="hidden" name="nombreMateria" value="{{$m -> nombre}}">
                        <input id="semestre" type="hidden" name="semestre" value="{{$m -> semestre}}">
                        

                       @if($m->nombre === 'Lenguaje y Comunicación' && $m->semestre==='1')
                    
                       <td> <input id="n1" type="number" min="0" max="70" name="n1[]" value="{{$a->n1}}"  style="width:40px"></td>	
                       <td> <input id="n2" type="number" min="0" max="70" name="n2[]" value="{{$a->n2}}" style="width:40px"></td>	
                       <td> <input id="n3" type="number" min="0" max="70" name="n3[]" value="{{$a->n3}}" style="width:40px"></td>	
                       <td> <input id="n4" type="number" min="0" max="70" name="n4[]" value="{{$a->n4}}" style="width:40px"></td>	
                       <td> <input id="n5" type="number" min="0" max="70" name="n5[]" value="{{$a->n5}}" style="width:40px"></td>	
                       <td> <input id="n6" type="number" min="0" max="70" name="n6[]" value="{{$a->n6}}" style="width:40px"></td>

             
                       <td>{{$a->promedio_s1}}</td>
                       
                       @elseif($m->nombre === 'Lenguaje y Comunicación' && $m->semestre==='2')
            
                       <td> <input id="n7" type="number" min="0" max="70" name="n7[]" value="{{$a->n7}}" style="width:40px"></td>	
                       <td> <input id="n8" type="number" min="0" max="70" name="n8[]" value="{{$a->n8}}" style="width:40px"></td>	
                       <td> <input id="n9" type="number" min="0" max="70" name="n9[]" value="{{$a->n9}}" style="width:40px"></td>	
                       <td> <input id="n10" type="number" min="0" max="70" name="n10[]" value="{{$a->n10}}" style="width:40px"></td>	
                       <td> <input id="n11" type="number" min="0" max="70" name="n11[]" value="{{$a->n11}}" style="width:40px"></td>	
                       <td> <input id="n12" type="number" min="0" max="70" name="n12[]" value="{{$a->n12}}" style="width:40px"></td>
                      
                       <td>{{$a->promedio_s2}}</td>

    

                     @elseif($m->semestre==='1')
                     <td> <input id="n1" type="number" min="0" max="70" name="n1[]" value="{{$a->n1}}"  style="width:40px"></td>	
                       <td> <input id="n2" type="number" min="0" max="70" name="n2[]" value="{{$a->n2}}" style="width:40px"></td>	
                       <td> <input id="n3" type="number" min="0" max="70" name="n3[]" value="{{$a->n3}}" style="width:40px"></td>	
                       <td> <input id="n4" type="number" min="0" max="70" name="n4[]" value="{{$a->n4}}" style="width:40px"></td>

        
                        <td>{{$a->promedio_s1}}</td>	
                       @else
                      
                       <td> <input id="n5" type="number" min="0" max="70" name="n5[]" value="{{$a->n5}}" style="width:40px"></td>	
                       <td> <input id="n6" type="number" min="0" max="70" name="n6[]" value="{{$a->n6}}" style="width:40px"></td>
                       <td> <input id="n7" type="number" min="0" max="70" name="n7[]" value="{{$a->n7}}" style="width:40px"></td>	
                       <td> <input id="n8" type="number" min="0" max="70" name="n8[]" value="{{$a->n8}}" style="width:40px"></td>

                        <td>{{$a->promedio_s2}}</td>
                       @endif
                       @endforeach
                      
                     
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
