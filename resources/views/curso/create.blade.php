@extends ('menu.admin')
@section ('contenido')

    {!!Html::style('admin/css/formulario.css')!!}
    
    <div class="row">
        <div class = "col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <fieldset>
                <legend><h3>Nuevo Curso: </h3></legend>
            @if(count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            {!!Form::open(array('url'=>'curso', 'method'=>'POST', 'autocomplete'=>'off'))!!}
            {{Form::token()}}


            <div class="form-group">
                <label for="grado">Curso: </label>
                <input type="text" name="grado" placeholder="Ej: primero basico">
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
