<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" 
id="modal-delete-{{$c->idCurso}}">

	  {!!Form::open(array('url'=>'curso/modal', 'method'=>'GET', 'autocomplete'=>'off'))!!}
                {{Form::token()}}

	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">x</span>
				</button>
				<h4 class="modal-title">Eliminar el Curso: <FONT COLOR="green">{{$c->grado}}</FONT></h4>
			</div>

			<div class="modal-body">
				<p>Confirme si desea eliminar el curso:</p>
				<FONT COLOR="red">
                <p>Si elimina este curso automaticamente se eliminaran todos los alumnos y materias asignados a él</p>
				</FONT>
			</div>

            <input id="idCurso" type="hidden" name="idCurso" value="{{$c -> idCurso}}">

			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				<button type="submit" class="btn btn-primary">Confirmar</button>
			</div>
			{!!Form::close()!!}
		</div>
	</div>