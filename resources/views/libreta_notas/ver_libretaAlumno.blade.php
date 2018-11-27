@extends ('menu.alumno')
@section ('contenido')

	<div class="row">
		<div class = "col-lg-8 col-md-8 col-sm-8 col-xs-12">
		
			<h3>Libreta de Notas: <FONT COLOR="green"></FONT></h3>
			
	
		</div>	
	</div>

	<div class="row">
		<div id="div1" class = "col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<div   class="table-responsive">
				@if(isset($libreta))
				<table id="LibretaNotas" class="table table-striped table-bordered table-condensed table-hover">
					<thead>
                    </tr>
                 
                      
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
                        <th><FONT COLOR="green"><strong>Promedio Primer Semestre</strong></Font></th>
                        <th>Promedio Segundo Semestre</th>
                        <th>Promedio Final </th>
                       

					</thead>
					@foreach ($libreta as $l)
					<tr>
                    <td>{{$l -> nombre}} {{$l -> apellido}}</td>
						<td>{{$l -> materia}}</td>
						
                        @if($l->numeroNotas == 12)
                        <td><FONT COLOR="green"><strong>{{$l -> n1}}</strong></Font></td>
                        <td><FONT COLOR="green"><strong>{{$l -> n2}}</strong></Font></td>
                        <td><FONT COLOR="green"><strong>{{$l -> n3}}</strong></Font></td>
                        <td><FONT COLOR="green"><strong>{{$l -> n4}}</strong></Font></td>
                        <td><FONT COLOR="green"><strong>{{$l -> n5}}</strong></Font></td>
                        <td><FONT COLOR="green"><strong>{{$l -> n6}}</strong></Font></td>
                        <td><strong>{{$l -> n7}}</strong></td>
                        <td><strong>{{$l -> n8}}</strong></td>
                        <td><strong>{{$l -> n9}}</strong></td>
                        <td><strong>{{$l -> n10}}</strong></td>
                        <td><strong>{{$l -> n11}}</strong></td>
                        <td><strong>{{$l -> n12}}</strong></td>
                        <td><strong>{{$l -> promedio_s1}}</strong></td>
                        <td>{{$l -> promedio_s2}}</td>
                        <td>{{$l -> promedio}}</td>
                      
                        @elseif($l->numeroNotas == 8)
                        <td><FONT COLOR="green"><strong>{{$l -> n1}}</strong></Font></td>
                        <td><FONT COLOR="green"><strong>{{$l -> n2}}</strong></Font></td>
                        <td><FONT COLOR="green"><strong>{{$l -> n3}}</strong></Font></td>
                        <td><FONT COLOR="green"><strong>{{$l -> n4}}</strong></Font></td>
                        <td><strong>{{$l -> n5}}</strong></td>
                        <td><strong>{{$l -> n6}}</strong></td>
                        <td><strong>{{$l -> n7}}</strong></td>
                        <td><strong>{{$l -> n8}}</strong></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>{{$l -> promedio_s1}}</td>
                        <td>{{$l -> promedio_s2}}</td>
                        <td>{{$l -> promedio}}</td>
                      
                        @else
                        <td><FONT COLOR="green"><strong>{{$l -> n1}}</strong></Font></td>
                        <td><FONT COLOR="green"><strong>{{$l -> n2}}</strong></Font></td>
                        <td><FONT COLOR="green"><strong>{{$l -> n3}}</strong></Font></td>
                        <td><strong>{{$l -> n4}}</strong></td>
                        <td><strong>{{$l -> n5}}</strong></td>
                        <td><strong>{{$l -> n6}}</strong></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>{{$l -> promedio_s1}}</td>
                        <td>{{$l -> promedio_s2}}</td>
                        <td>{{$l -> promedio}}</td>
              
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
