@extends ('menu.admin')
@section ('contenido')

    {!!Html::style('admin/css/formulario.css')!!}

    <div class="row">
        <div class = "col-lg-8 col-md-8 col-sm-8 col-xs-12">
            
            <fieldset>
                <legend><h3>Asignacion de Cursos: </h3></legend>
                @if(count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <label>Materias Impartidas: </label>
          
                
                    @foreach($materia as $c)
                    {!!Form::open(array('url'=>'seccion_curso/asignar2', 'method'=>'GET', 'autocomplete'=>'off'))!!}
                {{Form::token()}}
                   
                    <p>{{$c->nombre}} de {{$c->grado}}
                    <input id="idMateria" type="hidden" name="idMateria" value="{{$c -> idMateria}}">
                    <input id="idProfesor" type="hidden" name="idProfesor" value="{{$c -> idProfesor}}">
                    @foreach($alumno as $a)
                    <input id="idAlumno" type="hidden" name="idAlumno[]" value="{{$a -> idAlumno}}">
                    @endforeach
                    <button class="btn btn-primary" type="submit">ingresar</button>
                  
                    {!!Form::close()!!}
                    @endforeach
                    </p>

            </fieldset>
        </div>
    </div>

    @push('scripts')
    <script>
        function loadFile(event) {
            alasql('SELECT * FROM FILE(?,{headers:true})',[event],function(data){
                var count = Object.keys(data).length;   //Cantidad de datos del JSON
                for (var i = 0; i < count; i++) {
                    var id = data[i].RUT.split("-");
                    console.log(id[0]);
                }
                // You can data to div also.
            });
         }
    </script>
    @endpush

@endsection