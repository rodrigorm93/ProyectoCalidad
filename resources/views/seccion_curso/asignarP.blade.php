@extends ('menu.admin')
@section ('contenido')

    {!!Html::style('admin/css/formulario.css')!!}

    <div class="row">
        <div class = "col-lg-8 col-md-8 col-sm-8 col-xs-12">
            
            <fieldset>
                <legend><h3>Asignacion Profesor: </h3></legend>
                @if(count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                {!!Form::open(array('url'=>'seccion_curso/asignarPStore', 'method'=>'GET', 'autocomplete'=>'off'))!!}
                {{Form::token()}}
               
               <!--
                <div class="form-group">
                    <p style="text-align: left;">Importar lista de alumnos en Excel:</p>
                    <input id="readfile" type="file" onchange="loadFile(event)"/><br>
                </div>
                -->

                <div class="form-group">
                <label>Materia: </label>
                    <select name="materia" id="materia">
                    @foreach($materia as $c)
                    <option>{{$c -> idMateria}}   {{$c -> nombre}}</option>
                    @endforeach
                    </select>
                    </div>
                    <!--
                    <div class="form-group">
                     <label>Ayuda: </label>
                    <select name="m" id="m">
                    @foreach($materia as $c)
                    <option>{{$c -> idMateria}} {{$c -> nombre}}</option>
                    @endforeach
                    </select>
                </div>

                <div class="form-group">
                <label>Curso: </label>
                    <select name="curso" id="listaCursos">
                    @foreach($materia as $c)
                    <option>{{$c -> idCurso}} </option>
                    @endforeach
                    </select>
                </div>
-->
              
                   <div class="form-group">
                <label>ID Profesor: </label>
                    <select name="idp">
                    @foreach($profesor as $pro)
                    <option>{{$pro -> idProfesor}}   {{$pro -> nombre}} {{$pro -> apellido}}</option>
                    @endforeach
                    </select>
                    </div>
            <!--
                     <label>Ayuda: </label>
                    <select name="i">
                    @foreach($profesor as $pro)
                    <option>{{$pro -> idProfesor}}-{{$pro -> nombre}}</option>
                    @endforeach
                    </select>
                </div>
-->
               <div style="text-align: right;">
                <input type="hidden" name="_token" value="{{ csrf_token() }}"></input>
                <button class="btn btn-primary" type="submit">Asignar</button>
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
    if(materia.length==0){
        alert("La Materia ha sido Asignada");
        window.location.replace("http://127.0.0.1:8000/curso/createMateria");
    }
</Script> 
@endsection