@extends ('menu.admin')
@section ('contenido')

    {!!Html::style('admin/css/formulario.css')!!}
    
    <div class="row">
        <div class = "col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <fieldset>
                <legend><h3>Nuevo Utp: </h3></legend>
            @if(count($errors) > 0)
            <div class="alert alert-danger">
            
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            {!!Form::open(array('url'=>'utp', 'method'=>'POST', 'autocomplete'=>'off'))!!}
            {{Form::token()}}
            <div class="form-group">
                <label for="id">RUT: </label>
                <input type="number" name="id" placeholder="Ej: 18384726" required>
                <label for="digito"> - </label>
                <input type="text" name="digito" style="width: 50px;"  placeholder="Ej: k" required>

            </div>
            <div class="form-group">
                <label for="password">Contraseña: </label>
                <input type="password" name="password" placeholder="*************" required>
            </div>
            <div class="form-group">
                <label for="password2">Confirme la Contraseña: </label>
                <input type="password" name="password2" placeholder="*************" required> 
            </div>
            <div class="form-group">
                <label for="nombre">Nombre: </label>
                <input type="text" name="nombre" placeholder="Ej: Nico" required>
            </div>
            <div class="form-group">
                <label for="apellido">Apellido:</label>
                <input type="text" name="apellido" placeholder="EJ: Laloca" required>
            </div>
            <div class="form-group">
                <label for="genero">Género: </label>
                <input type="radio" name="genero" value="1"> hombre
                <input type="radio" name="genero" value="0"> mujer
            </div>
            <div class="form-group">
                <label for="edad">Edad: </label>
                <input type="number" name="edad" style="width: 300px;" placeholder="Ej: 18" required>
            </div>
            <div class="form-group">
                <label for="email">Email: </label>
                <input type="email" name="email" style="width: 300px;" placeholder="Ej: mesoltelcabello@hotmail.com" required>
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