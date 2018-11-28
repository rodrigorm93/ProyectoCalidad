@extends ('menu.utp')
@section ('contenido')

    {!!Html::style('admin/css/formulario.css')!!}

    <div class="row">
        <div class = "col-lg-8 col-md-8 col-sm-8 col-xs-12">
            
          
                <legend><h3>Calcular Promedios: </h3></legend>
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
						<th>Grado</th>
						<th>Ver Alumnos</th>
                      
					</thead>
				
					<tr>
					@foreach ($curso as $c)
                    
                    {!!Form::open(array('url'=>'notas/verEstadoAlumnos', 'method'=>'GET', 'autocomplete'=>'off'))!!}
                {{Form::token()}}
						<td>{{$c -> grado}}</td>
                        <input id="idCurso2" type="hidden" name="idCurso2" value="{{$c -> idCurso}}">
                        
                        
                        <td><button class="btn btn-primary" type="submit">Calcular</button></td>
                        {!!Form::close()!!}
                
				 </tr>
		
             
					@endforeach
                 
				</table>
        </div>
    </div>


@endsection