@extends ('menu.admin')
@section ('contenido')

    {!!Html::style('admin/css/formulario.css')!!}

    <div class="row">
        <div class = "col-lg-8 col-md-8 col-sm-8 col-xs-12">
            
        <table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						
						<th>Curso</th>
						<th>Materia</th>
						
					</thead>
					@foreach ($curso as $c)
					<tr>
						<td>{{$c -> nombreC}}</td>
						<td>{{$c -> nombreM}}</td>
					<!--	
                        <td>
				<a href="" data-target="#modal-delete-{{$c->idMateria}}" data-toggle="modal"><btn class="btn btn-danger"><i class="fa fa-trash" style="font-size:20px;color:white"></i> </btn></a>
			     </td>
			-->
                     
					</tr>
                  <!--  @include('curso.modal')-->
					@endforeach
				</table>
        </div>
        {{$curso->render()}}
    </div>


@endsection