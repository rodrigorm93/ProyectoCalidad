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

                {!!Form::open(array('url'=>'seccion_curso', 'method'=>'POST', 'autocomplete'=>'off'))!!}
                {{Form::token()}}
               
               <!--
                <div class="form-group">
                    <p style="text-align: left;">Importar lista de alumnos en Excel:</p>
                    <input id="readfile" type="file" onchange="loadFile(event)"/><br>
                </div>
                -->

                <div class="form-group">
                <label>Materia Impartida: </label>
                    <select name="Materia" id="listaCursos">
                    @foreach($materia as $c)
                    <option>{{$c -> idMateria}}</option>
                    @endforeach
                    </select>
                </div>


                   <div class="form-group">
                <label>ID Profesor: </label>
                    <select name="idp">
                    @foreach($profesor as $pro)
                    <option>{{$pro -> idProfesor}}</option>
                    @endforeach
                    </select>
                </div>

                  <div class="table-responsive">
                <table class="table table-striped table-bordered table-condensed table-hover">
                    <thead>
                     <th>ID Alumno</th>
                     <th>Nombre</th>
                     </thead>

                    @foreach($alumno as $a)
                    <tr>
                    
                       <td><input id="idAlumno" type="text" name="idAlumno[]" value="{{$a -> idAlumno}}"></td>
                       <td>{{$a->nombre}} {{$a->apellido}}</td>
                       
                       <td>
                        <select name="select[]">
                            <option>No Asignado</option>
                            <option>Asignar</option>
                        </select>
                        </td>
                    </tr>
                    @endforeach
                    </table>
            </div>
                             

               <div style="text-align: right;">
                <input type="hidden" name="_token" value="{{ csrf_token() }}"></input>
                <button class="btn btn-primary" type="submit">Guardar</button>
            </div>
                {!!Form::close()!!}
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