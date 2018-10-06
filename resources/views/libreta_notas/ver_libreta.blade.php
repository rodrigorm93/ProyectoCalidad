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
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th>Materia</th>
						<th>Alumno</th>
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
                        <th>Promedio</th>
                        <th>Promedio Final</th>
						

					</thead>
					@foreach ($libreta as $l)
					<tr>
						<td>{{$l -> materia}}</td>
						<td>{{$l -> nombre}} {{$l -> apellido}}</td>
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
                        <th>{{$l -> promedio}}</th>
                        <th>{{$l -> promedioFinal}}</th>			
						</td>
					</tr>
			
				@endforeach
				</table>
				@endif
			</div>
			
		</div>
	</div>

@stop
