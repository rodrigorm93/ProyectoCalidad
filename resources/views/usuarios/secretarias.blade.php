@extends('layouts.secundaria_admin')
@section('contenido')


            
                <a href="/usuarios/gestion"><legend><h3>Gestión de la página: </h3></legend></a>
            @if(count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
            @endif


<div class="table-responsive">
            @if(isset($anuncios))
            <table class="table table-striped table-bordered table-condensed table-hover">
                <thead>
                    <th>ID</th>
                    <th>Titulo</th>
                    <th>Tipo de Servicio</th>
                
                </thead>
                @foreach ($anuncios as $a)
                <tr>
                    <td>{{$a -> id_anuncio}}</td>
                    <td>{{$a -> titulo}}</td>
                    <td>{{$a -> tipo_servicio}}</td>    
                </tr>
            
                @endforeach
            </table>
            @endif
        {{$anuncios->render()}}
        </div>
            
            
  
@endsection