@extends ('menu.admin')
@section ('contenido')

    {!!Html::style('admin/css/formulario.css')!!}

    <div class="row">
        <div class = "col-lg-8 col-md-8 col-sm-8 col-xs-12">
            
            <fieldset>
                <legend><h3>Asignacion de Alumnos: </h3></legend>
                @if(count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <label>Cursos Impartidos: </label>
          
                
                    @foreach($curso as $c)
                    {!!Form::open(array('url'=>'seccion_curso/asignar', 'method'=>'GET', 'autocomplete'=>'off'))!!}
                {{Form::token()}}
                   
                    <p>{{$c->grado}}
                    <input id="idCurso" type="hidden" name="idCurso" value="{{$c -> idCurso}}">
                    
                      <button class="btn btn-primary" type="submit">ingresar</button>
                  
                    {!!Form::close()!!}
                    @endforeach
                    </p>

            </fieldset>
        </div>
    </div>


@endsection