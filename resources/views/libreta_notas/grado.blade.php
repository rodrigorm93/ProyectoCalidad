@extends ('menu.admin')
@section ('contenido')

    {!!Html::style('admin/css/formulario.css')!!}

    <div class="row">
        <div class = "col-lg-8 col-md-8 col-sm-8 col-xs-12">
            
          
                <legend><h3>Cursos </h3></legend>
                @if(count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

               
                    <table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th>Curso</th>
						<th>Ver Libreta de Notas</th>

					</thead>
				
					<tr>
					@foreach ($curso as $c)
                    
                    {!!Form::open(array('url'=>'libreta_notas/ver_libreta', 'method'=>'GET', 'autocomplete'=>'off'))!!}
                {{Form::token()}}
                             @if($c -> ciclo == '0')
                            <td>{{$c -> grado}} Año {{$c -> year}} (Primer Ciclo Basico)</td>
                            @else
                            <td>{{$c -> grado}} Año {{$c -> year}} (Segundo Ciclo Basico)</td>
                            @endif

                        <input id="idCurso" type="hidden" name="idCurso" value="{{$c -> idCurso}}">
                        
                        
                        <td><button class="btn btn-primary" type="submit">Ingresar</button></td>
                        {!!Form::close()!!}
                
				 </tr>
		
             
					@endforeach
                 
				</table>
        </div>
    </div>


@endsection