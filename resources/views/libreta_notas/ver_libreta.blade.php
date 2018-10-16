@extends ('menu.admin')
@section ('contenido')

	<div class="row">
		<div class = "col-lg-8 col-md-8 col-sm-8 col-xs-12">
		@foreach ($curso as $c)
			<h3>Libreta de Notas: <FONT COLOR="green">{{$c->grado}} Año {{$c->year}}</FONT></h3>
			
			@endforeach
		</div>	
	</div>

	<div class="row">
		<div id="div1" class = "col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<div   class="table-responsive">
				@if(isset($libreta))
				<table id="LibretaNotas" class="table table-striped table-bordered table-condensed table-hover">
					<thead>
                    </tr>
                    @foreach ($curso as $c)
                        <th colspan="16">Libreta de Notas {{$c->grado}} Año {{$c->year}} </th>
                        @endforeach
                      
                        <tr align="center" valign="middle"> 
                        <th rowspan="12">Alumno</th>
                            <th rowspan="12">Materia</th>  
                
                        <th>N1</th>
                        <th>N2</th>
                        <th>N3</th>
                        <th>N4</th>
                        <th>N5</th>
                        <th>N6</th>
                        <th>N7</th>
                        <th>N8</th>
                        <th>N9</th>
                        <th>N10</th>
                        <th>N11</th>
                        <th>N12</th>
                        <th>Promedio Semestre 1</th>
                        <th>Promedio Semestre 2</th>
                        <th>Promedio Final</th>
                        <th>Promedio Del Curso</th>

					</thead>
					@foreach ($libreta as $l)
					<tr>
                    <td>{{$l -> nombre}} {{$l -> apellido}}</td>
						<td>{{$l -> materia}}</td>
						
                        @if($l->numeroNotas == 12)
                        <td>{{$l -> n1}}</td>
                        <td>{{$l -> n2}}</td>
                        <td>{{$l -> n3}}</td>
                        <td>{{$l -> n4}}</td>
                        <td>{{$l -> n5}}</td>
                        <td>{{$l -> n6}}</td>
                        <td>{{$l -> n7}}</td>
                        <td>{{$l -> n8}}</td>
                        <td>{{$l -> n9}}</td>
                        <td>{{$l -> n10}}</td>
                        <td>{{$l -> n11}}</td>
                        <td>{{$l -> n12}}</td>
                        <td>{{$l -> promedio_s1}}</td>
                        <td>{{$l -> promedio_s2}}</td>
                        <td>{{$l -> promedio}}</td>
                        <td>{{$l -> promedioFinal}}</td>
                        @elseif($l->numeroNotas == 8)
                        <td>{{$l -> n1}}</td>
                        <td>{{$l -> n2}}</td>
                        <td>{{$l -> n3}}</td>
                        <td>{{$l -> n4}}</td>
                        <td>{{$l -> n5}}</td>
                        <td>{{$l -> n6}}</td>
                        <td>{{$l -> n7}}</td>
                        <td>{{$l -> n8}}</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>{{$l -> promedio_s1}}</td>
                        <td>{{$l -> promedio_s2}}</td>
                        <td>{{$l -> promedio}}</td>
                        <td>{{$l -> promedioFinal}}</td>
                        @else
                        <td>{{$l -> n1}}</td>
                        <td>{{$l -> n2}}</td>
                        <td>{{$l -> n3}}</td>
                        <td>{{$l -> n4}}</td>
                        <td>{{$l -> n5}}</td>
                        <td>{{$l -> n6}}</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>{{$l -> promedio_s1}}</td>
                        <td>{{$l -> promedio_s2}}</td>
                        <td>{{$l -> promedio}}</td>
                        <td>{{$l -> promedioFinal}}</td>
 
                        @endif
					</tr>
                
				@endforeach
				</table>   
				@endif  
			</div>
		</div>
	</div>
    <div id="next_button" align="center">
					<button id="exportar" class="btn btn-success" align="right">Exportar</button>
	</div>

    
	@push('scripts')
    <script type="text/javascript">
		$(document).ready(function () {
			$("#exportar").click(function(){
			  $("#LibretaNotas").table2excel({
				name: "Libreta",
			    filename: "Libreta",
				fileext: ".xlsx"
			  }); 
			});
		});
	</script>
	@endpush

@stop
