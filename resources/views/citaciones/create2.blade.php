@extends ('menu.profesor')
@section ('contenido')


	<div class="row">
		<div class = "col-xs-12">
			<div class="table-responsive">
            {!!Form::open(array('url'=>'citaciones', 'method'=>'POST', 'class'=>'stdform', 'files' => true, 'name'=>'formu', 'enctype' => 'multipart/form-data', 'autocomplete'=>'off'))!!}

            <fieldset>
                        <legend class="text-center header">Enviar Citacion</legend>

                           
                                <div class="form-group">
                                <span class="col-md-1 col-md-offset-2 text-center"></span>
                                        <select name="idA">
                                        @foreach($alumno as $a)
                                        <option>{{$a -> idAlumno}}   {{$a -> nombre}} {{$a -> apellido}}</option>
                                        @endforeach
                                        </select>
                                       
                                     </div>
                                     <BR>

                            <div class="">
                            <span class="col-md-1 col-md-offset-2 text-center"></span>
                            <div class="col-md-8">
                                <input id="titulo" name="titulo" type="text" placeholder="Titulo" class="form-control" required>
                            </div>
                        </div>

                          <div class="">
                            <span class="col-md-1 col-md-offset-2 text-center"></span>
                            <div class="col-md-8">
                                <textarea class="form-control" id="descripCK" name="descripcion" placeholder="Mensaje" rows="7" required></textarea>
                            </div>  
                        </div>

                        
                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                            <div class="col-md-8">
                                <FONT SIZE=4 COLOR="green">Profesor</FONT>
                            </div>
                        </div>

                          <div class="form-group">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-primary btn-lg">Enviar</button>
                            </div>
                        </div>

</fieldset>
			
				
			</div>
			
		</div>
	</div>

@stop
