<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" 
id="modal-delete-{{$av->id_aviso}}">

	  {!!Form::open(array('url'=>'avisos/modal', 'method'=>'GET', 'autocomplete'=>'off'))!!}
                {{Form::token()}}
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">x</span>
				</button>
				<h4 class="modal-title">Eliminar el mensaje:<FONT COLOR="blue"> {{$av->id_aviso}} </FONT></h4>
			</div>
            <input id="idNoticia" type="hidden" name="idAviso" value="{{$av->id_aviso}}">

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