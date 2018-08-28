@extends ('menu.admin')
@section ('contenido')

    {!!Html::style('admin/css/formulario.css')!!}

    <div class="row">
        <div class = "col-lg-8 col-md-8 col-sm-8 col-xs-12">
            
            <fieldset>
                <legend><h3>Asignacion de Alumnos:  </h3></legend>
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
                <label>Materias Impartidas: </label>
                    <select name="idMateria" id="idMateria">
                    @foreach($materia as $c)
                    <option selected>{{$c -> nombre}}</option>
                    @endforeach
                    </select>
                </div>

                   @foreach($materia as $c)
                <input id="idCurso" type="hidden" name="idCurso" value="{{$c -> idCurso}}">
                @endforeach

                @foreach($materia as $c)
                <input id="idMateria" type="hidden" name="idMateria[]" value="{{$c -> idMateria}}">
                @endforeach
                  
                  <div class="table-responsive">
                <table class="table table-striped table-bordered table-condensed table-hover">
                    <thead>
                     <th>ID Alumno</th>
                     <th>Nombre</th>
                   
                     </thead>

                    @foreach($alumno as $a)
                    <tr>
                    
                       <td>{{$a->idAlumno}}</td>
                       <input id="idAlumno" type="hidden" name="idAlumno[]" value="{{$a -> idAlumno}}">
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

    <Script> 
    if(idMateria.length==0){
        alert("No hay materias para este curso! Primero asigne las materias al curso y luego los alumnos");
        window.location.replace("http://127.0.0.1:8000/seccion_curso/grado");
    }
</Script> 


@endsection