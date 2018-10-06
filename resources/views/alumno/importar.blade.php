@extends ('menu.admin')
@section ('contenido')

	<!-- Estilos CSS	-->
	{!!Html::style('css/extra.css')!!}


	{!!Form::open(array('url'=>'alumno/importar_store', 'method'=>'POST', 'autocomplete'=>'off'))!!}
    {{Form::token()}}
	<style type="text/css">
		input{
			position: relative;
		    //display: block;
		    margin: 10px auto;
		    padding: 0;
		    width: 100%;
		    height: auto;
		    border-collapse: collapse;
		    text-align: center;
		}
	</style>

	<div class="row">
		<div class = "col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>Lista de Alumnos </h3>
		</div>	
	</div>
	<br>

	<div class="form-group">
        <p style="text-align: left;">Importar lista de alumnos desde un archivo Excel:</p>
        <input id="readfile" type="file" onchange="loadFile(event)"/><br>
    </div>

	<div class="row">
		<div class = "col-xs-12">
			<div class="table-responsive">
				<table id="tabla" class="table table-bordered table-condensed table-hover">
					<thead id="encabezado" style="color: white; background-color: black;" >
						
					</thead>

					<div id="registro"></div>
				</table>
			</div>
		</div>
	</div>

	@push('scripts')
    <script>
    	//Al cargar un excel se ejecuta la siguiente funcion
        function loadFile(event) {

            alasql('SELECT * FROM FILE(?,{headers:true})',[event],function(data){
                var count = Object.keys(data).length;   //Cantidad de datos del JSON
                
                for (var i = 0; i < count; i++) {
                	var table = document.getElementById("tabla");
				    var row = table.insertRow(0);

				    //Se declaran las celdas a insertar
				    var id = row.insertCell(0);
				    var digito = row.insertCell(1);
				    var pass = row.insertCell(2);
				    var nombre = row.insertCell(3);
				    var apellido = row.insertCell(4);
				    var genero = row.insertCell(5);
				    var edad = row.insertCell(6);
				    var correo = row.insertCell(7);
				  

				    //Se insertan las celdas como input cuyos nombres son arreglos
				    var rut = data[i].RUT.split("-");
				    id.innerHTML = "<input type=\"text\" name=\"id[]\" value=\""+rut[0]+"\">";
				    digito.innerHTML = "<input type=\"text\" name=\"digito[]\" value=\""+rut[1]+"\">";
				    pass.innerHTML = "<input type=\"text\" name=\"pass[]\" value=\""+data[i].Pass+"\">";
				    nombre.innerHTML = "<input type=\"text\" name=\"nombre[]\" value=\""+data[i].Nombre+"\">";
				    apellido.innerHTML = "<input type=\"text\" name=\"apellido[]\" value=\""+data[i].Apellido+"\">";
				    genero.innerHTML = "<input type=\"text\" name=\"genero[]\" value=\""+data[i].Genero+"\">";
				    edad.innerHTML = "<input type=\"text\" name=\"edad[]\" value=\""+data[i].Edad+"\">";
				    correo.innerHTML = "<input type=\"text\" name=\"correo[]\" value=\""+data[i].Correo+"\">";
			
			
                }

                //Se insertan los titulos de las columnas
                var table = document.getElementById("encabezado");
			    var row = table.insertRow(0);

			    var id = row.insertCell(0);
			    var digito = row.insertCell(1);
			    var pass = row.insertCell(2);
			    var nombre = row.insertCell(3);
			    var apellido = row.insertCell(4);
			    var genero = row.insertCell(5);
			    var edad = row.insertCell(6);
			    var correo = row.insertCell(7);
			   
			   

			    id.innerHTML = "ID";
			    digito.innerHTML = "Digito";
			    pass.innerHTML = "Contraseña";
			    nombre.innerHTML = "Nombre";
			    apellido.innerHTML = "Apellido";
			    genero.innerHTML = "Genero";
			    edad.innerHTML = "Edad";
			    correo.innerHTML = "Correo"
			  
			  
            });
         }
    </script>
    @endpush

    <div style="text-align: right;">
		<input type="hidden" name="_token" value="{{ csrf_token() }}"></input>
        <button class="btn btn-primary" type="submit">
        <span class="glyphicon glyphicon-floppy-saved"></span> Guardar</button>
    </div>
    {!!Form::close()!!}

@stop