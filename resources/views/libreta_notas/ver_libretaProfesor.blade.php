@extends ('menu.profesor')
@section ('contenido')

	<div class="row">
		<div class = "col-lg-8 col-md-8 col-sm-8 col-xs-12">
		
		@foreach ($materia as $m)
		@if($m -> ciclo == '0')
			<h3>Libreta de Notas: <FONT COLOR="green">{{$m->grado}} Año {{$m->year}}(Primer Ciclo Basico)</FONT></h3>
    
		@else
		<h3>Libreta de Notas: <FONT COLOR="green">{{$m->grado}} Año {{$m->year}}(Segundo Ciclo Basico)</FONT></h3>
		@endif
			@endforeach
		</div>	
	</div>

	<div class="row">
		<div id="div1" class = "col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<div   class="table-responsive">
				@if(isset($libreta))
				<table id="libreta" class="table table-striped table-bordered table-condensed table-hover">
			
				
					<thead>
	
                        <th>Materia</th>	
						<th>Alumno</th>
                        @foreach ($materia as $m)
                        <?php
                        $cont=1;
                        $num=$m->numeroNotas;
                        while($cont <= $num){
                            echo "<th>N $cont </th>";
                            
                            $cont=$cont+1;

                        }   
                        ?>
                        <th>Promedio</th>
                        @endforeach  

					</thead>
					@foreach ($libreta as $l)
					<tr>
                    <td>{{$l -> materia}}</td>
						<td>{{$l -> nombre}} {{$l -> apellido}}</td>
                    <?php
                        $cont=1;
                        $num=$l->numeroNotas;
                        while($cont <= $num){
                           // creamos tantas columnas como numero de notas tenga la materia
                            echo "<th>{$l -> $cont}</th>";
                            
                            $cont=$cont+1;

                        }   
                        ?>
                         @if($l->promedio <= 39 )
                        <td><FONT COLOR="red"><strong>{{$l->promedio}}</strong></FONT></td>
                        @else
                        <td><FONT COLOR="blue"><strong>{{$l->promedio}}</strong></FONT></td>
                       @endif		
						</td>
					</tr>
			
				@endforeach
				</table>
				@endif
			</div>
			
		</div>
	</div>

<div id="next_button" align="left">
					<button id="exportar" class="btn btn-success" align="left">Exportar</button>
				</div>
    	@push('scripts')
    <script type="text/javascript">
		$(document).ready(function () {
			$("#exportar").click(function(){
			  $("#libreta").table2excel({
				name: "libreta de Notas",
			    filename: "libreta de Notas",
				fileext: ".xlsx"
			  }); 
			});
		});
	</script>
	@endpush


@stop
