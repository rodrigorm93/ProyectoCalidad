@extends ('menu.admin')
@section ('contenido')

    {!!Html::style('admin/css/formulario.css')!!}

    <div class="row">
        <div class = "col-lg-8 col-md-8 col-sm-8 col-xs-12">
            
            <fieldset>
                <legend><h3>Editar Director: {{ $usuario->id }}-{{ $usuario->digito }}</h3></legend>
                @if(count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                {!!Form::model($usuario, ['method'=>'PATCH', 'route'=>['director.update', $usuario->id]]) !!}
                {{Form::token()}}
                <div class="form-group">
                    <label for="id">RUT: </label>
                    <input type="text" name="id" placeholder="Ej: 18384726" value="{{$usuario->id}}">
                    <label for="digito"> - </label>
                    <input type="text" name="digito" style="width: 50px;" placeholder="Ej: k" value="{{$usuario->digito}}">

                </div>
                <div class="form-group">
                    <label for="password">Contraseña: </label>
                    <input type="password" name="password" placeholder="*************" >
                </div>
                <div class="form-group">
                    <label for="password2">Confirme la Contraseña: </label>
                    <input type="password" name="password2" placeholder="*************" >
                </div>
                <div class="form-group">
                    <label for="nombre">Nombre: </label>
                    <input type="text" name="nombre" placeholder="Ej: Nico" value="{{$usuario->nombre}}">
                </div>
                <div class="form-group">
                    <label for="apellido">Apellido:</label>
                    <input type="text" name="apellido" placeholder="EJ: Laloca" value="{{$usuario->apellido}}">
                </div>

               <div class="form-group">
                    <label for="genero">Genero: </label>
                    @if($usuario->genero == 0)
                    <input type="text" name="genero" value="mujer" > 
                    @else
                    <input type="text" name="genero" value="hombre" >
                    @endif
                </div>
                
                <div class="form-group">
                    <label for="edad">Edad: </label>
                    <input type="text" name="edad" placeholder="Ej: 18" value="{{$usuario->edad}}">
                </div>
                <div class="form-group">
                    <label for="email">Email: </label>
                    <input type="text" name="email" placeholder="Ej: mesoltelcabello@hotmail.com" value="{{$usuario->email}}">
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