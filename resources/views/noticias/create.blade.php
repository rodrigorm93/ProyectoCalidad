@extends('menu.admin')
@section('contenido')
<div id="cambia_img">
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="well well-sm">
            {!!Form::open(array('url'=>'noticias', 'method'=>'POST', 'class'=>'stdform', 'files' => true, 'name'=>'formu', 'enctype' => 'multipart/form-data', 'autocomplete'=>'off'))!!}
                    <fieldset>
                        <legend class="text-center header">Subir Noticia</legend>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-pencil-square-o bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="titulo" name="titulo" type="text" placeholder="Titulo" class="form-control" required>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-pencil-square-o bigicon"></i></span>
                            <div class="col-md-8">
                                <textarea class="form-control" id="descripCK" name="descripcion" placeholder="descripcion" rows="7" required></textarea>
                            </div>  
                        </div>
                        
                      
                        <div class="form-group">
                        
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-pencil-square-o bigicon"></i></span>
                            <div class="col-md-8">
                            <FONT SIZE=3 COLOR="green">Imagen de Portada:</FONT>
                            <span class="field"><input type="file" name="imagen[]" id="imagen" class="input-xxlarge" accept="image/*" multiple="" onchange="loadFile(event)" required/></span>
                            </div>
                        </div>

                      
                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                            <div class="col-md-8">
                                <FONT SIZE=4 COLOR="green">Admin</FONT>
                            </div>
                        </div>
                   
                        
                        <div id="imagenes"></div>

                        <div class="form-group">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-primary btn-lg">Enviar</button>
                            </div>
                        </div>
                    </fieldset>
            </div>
        </div>
    </div>
</div>
</div>
<script type="text/javascript">

//VISTA PREVIA DE IMAGENES
var loadFile = function(event) {

    var imagenes = document.getElementById("imagenes");   
    imagenes.parentNode.removeChild(imagenes);
    document.getElementById('cambia_img').insertAdjacentHTML( 'beforeend', '<div id="imagenes"></div>' ); 

    //Obtiene cantidad de imagenes
    var limite = document.getElementById("imagen").files;
    //alert(limite.length);

    //document.getElementById('imagenes').innerHTML = '<div id="row-fluid" class="row-fluid">';

    var str = '<br> <h4 class="widgettitle">VISTA PREVIA:</h4> <div id="row-fluid" class="row-fluid">';
    var cont = 0;
    for (var i = 0; i < 1; i++) {
        str = str+'<div class="span4"><img class="imagen" id="output'+i+'" /> </div>';

        cont = cont+1;

        if(cont == 3){
            cont = 0;
            str = str+'</div><br><hr><br> <div id="row-fluid" class="row-fluid">';
        }

    }
    str = str+'</div><br><br>';

    document.getElementById('imagenes').innerHTML = str;

    for (var i = 0; i < limite.length; i++) {
        var output = document.getElementById('output'+i);
        output.src = URL.createObjectURL(event.target.files[i]);
    }
    
};

</script>

<script src="{{asset('ckeditor/ckeditor.js')}}"></script>

<!-- Insertar CKeditor para la caja de descripcion-->
<script>

CKEDITOR.config.height = 400;
CKEDITOR.config.width = 'auto';

CKEDITOR.replace('descripCK');
</script>
@stop