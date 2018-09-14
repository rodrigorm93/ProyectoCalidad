<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" 
id="modal_materias-delete-{{$sec->idAlumno}}">

  {!!Form::open(array('url'=>'seccion_curso/modal_materias', 'method'=>'GET', 'autocomplete'=>'off'))!!}
                {{Form::token()}}


	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">x</span>
				</button>
				<h4 class="modal-title">Eliminar Materia al Alumno: <FONT COLOR="green">{{$sec->nombre}} {{$sec->apellido}}</FONT></h4>
			</div>

			<div class="modal-body">
				<p>Confirme si desea eliminar la materia:<FONT COLOR="blue"> {{$sec->materia}}</FONT> al alumno<FONT COLOR="blue"> {{$sec->nombre}} {{$sec->apellido}}</FONT> </p>
			</div>

            <input id="idMateria" type="hidden" name="idMateria" value="{{$sec -> idMateria}}">
			<input id="idAlumno" type="hidden" name="idAlumno" value="{{$sec -> idAlumno}}">

			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				<button type="submit" class="btn btn-primary">Confirmar</button>
			</div>
			{!!Form::close()!!}
		</div>
	</div>


	{{Form::Close()}}
	
</div>