@extends ('menu.admin')
@section ('contenido')

    {!!Html::style('admin/css/formulario.css')!!}

    <div class="row">
        <div class = "col-lg-8 col-md-8 col-sm-8 col-xs-12">
            
          
                <legend><h3>Cursos Disponibles: </h3></legend>
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
						<th>Ver Materias</th>
                        <th>Opciones</th>
					</thead>
				
					<tr>
					@foreach ($curso as $c)
                    
                    {!!Form::open(array('url'=>'curso/ver_materias', 'method'=>'GET', 'autocomplete'=>'off'))!!}
                {{Form::token()}}

                            @if($c -> ciclo == '0')
                            <td>{{$c -> grado}} Año {{$c -> year}} (Primer Ciclo Basico)</td>
                            @else
                            <td>{{$c -> grado}} Año {{$c -> year}} (Segundo Ciclo Basico)</td>
                            @endif

                        <input id="idCurso2" type="hidden" name="idCurso2" value="{{$c -> idCurso}}">
                        
                        
                        <td><button class="btn btn-primary" type="submit">ingresar</button></td>
                        {!!Form::close()!!}

                      
                        <td>
                        @if(Auth::user()->rol=='admin')

                    	<a href="{{URL::action('CursoController@edit', $c -> idCurso)}}"><btn class="btn btn-info">
                    <i class="material-icons" style="font-size:18px">border_color</i></btn></a>

                    
						<a href="" data-target="#modal-delete-{{$c->idCurso}}" data-toggle="modal"><btn class="btn btn-danger">
                    <i class="fa fa-trash" style="font-size:20px;color:white"></i> </btn></a></td>
                    @endif
                
				 </tr>

                 
		
                 @include('curso.modal') 
             
					@endforeach
                 
				</table>
        </div>
    </div>


@endsection