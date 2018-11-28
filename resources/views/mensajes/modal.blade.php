<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" 
id="modal-delete-{{$m->idMensaje}}">

	  {!!Form::open(array('url'=>'mensajes/modal', 'method'=>'GET', 'autocomplete'=>'off'))!!}
                {{Form::token()}}
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">x</span>
				</button>
				<h4 class="modal-title">Eliminar el mensaje:<FONT COLOR="blue"> {{$m->idMensaje}} </FONT></h4>
			</div>
            <input id="idMensaje" type="hidden" name="idMensaje" value="{{$m->idMensaje}}">

			<div class="modal-body">
				<p>Confirme si desea Eliminarla</p>
			</div>

			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				<button type="submit" class="btn btn-primary">Confirmar</button>
			</div>
		</div>
	</div>

	{{Form::Close()}}
	
</div>