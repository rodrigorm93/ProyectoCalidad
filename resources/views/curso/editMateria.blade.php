@extends ('menu.admin')
@section ('contenido')

    {!!Html::style('admin/css/formulario.css')!!}
    @foreach($materia as $m)
    <div class="row">
        <div class = "col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <fieldset>
                <legend><h3>Editar Materia: {{ $m->idMateria}}-{{ $m->nombre }}</h3></legend>
            @if(count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
            @endif

          
          {!!Form::open(array('url'=>'curso/updateMateria', 'method'=>'GET', 'autocomplete'=>'off'))!!}
            {{Form::token()}}
            <div class="form-group">
                <label for="grado">Nombre: </label>
                <input type="text" name="Nombre" placeholder="" value="{{$m->nombre}}">
                <input type="hidden" name="idMateria" placeholder="" value="{{$m->idMateria}}">
            </div>
            <div class="form-group">
                <label>Asignar Nuevo profesor: </label>
                    <select name="idProfesor" id="idProfesor">
                    @foreach($profesor as $p)
                    <option>{{$p -> idProfesor}}</option>
                    @endforeach
                    </select>
                </div>
           
            <div class="form-group">
                <button class="btn btn-primary" type="submit">Guardar</button>
                <button class="btn btn-danger" type="reset">Cancelar</button>
            </div>
            {!!Form::close()!!}
         
          
            </fieldset>
            @endforeach
                    </div>
    </div>
@endsection