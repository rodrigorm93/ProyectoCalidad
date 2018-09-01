@extends ('menu.admin')
@section ('contenido')

    {!!Html::style('admin/css/formulario.css')!!}
    
    <div class="row">
        <div class = "col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <fieldset>
                <legend><h3>Editar Curso: {{ $curso->idCurso }}-{{ $curso->grado }}</h3></legend>
            @if(count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            {!!Form::model($curso, ['method'=>'PATCH', 'route'=>['curso.update', $curso->idCurso]]) !!}
            {{Form::token()}}
           
            <div class="form-group">
                <label for="grado">Nombre: </label>
                <input type="text" name="grado" placeholder="" value="{{$curso->grado}}">
            </div>
           
            <div class="form-group">
                <button class="btn btn-primary" type="submit">Guardar</button>
                <button class="btn btn-danger" type="reset">Cancelar</button>
            </div>
            {!!Form::close()!!}
            </fieldset>
        </div>
    </div>
@endsection