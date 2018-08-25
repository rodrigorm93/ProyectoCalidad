@extends ('menu.admin')
@section ('contenido')

    {!!Html::style('admin/css/formulario.css')!!}
    
    <div class="row">
        <div class = "col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <fieldset>
                <legend><h3>Nueva Materia: </h3></legend>
            @if(count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            {!!Form::open(array('url'=>'curso/materiaStore', 'method'=>'POST', 'autocomplete'=>'off'))!!}
            {{Form::token()}}


             <div class="form-group">
                <label>Curso: </label>
                    <select name="curso" id="listaCursos">
                    @foreach($curso as $c)
                    <option>{{$c -> idCurso}}</option>
                    @endforeach
                    </select>
                </div>

            <div class="form-group">
                <label for="nombre">Materia: </label>
                <input type="text" name="nombre" placeholder="Ej: ciencias">
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
