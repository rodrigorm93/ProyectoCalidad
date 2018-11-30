<!DOCTYPE html>
<html>
@if(session('success2'))
		<div class="alert alert-success">
			{{session('success2')}}
		</div>
	@endif

    @if(session('error'))
		<div class="alert alert-danger">
			{{session('error')}}
		</div>
	@endif
<head>

    <!-- IMPORTANDO ICONOS -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Panel Admin</title>
    {!!Html::style('admin/css/bootstrap.min.css')!!}
    {!!Html::style('admin/css/metisMenu.min.css')!!}
    {!!Html::style('admin/css/sb-admin-2.css')!!}
    {!!Html::style('admin/css/font-awesome.min.css')!!}
    {!!Html::style('admin/css/tabla_scroll.css')!!}
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <script type="text/javascript" src="{{ URL::asset('js/Chart.bundle.js') }}"></script>
      <script type="text/javascript" src="{{ URL::asset('js/Chart.bundle.min.js') }}"></script>
      <script type="text/javascript" src="{{ URL::asset('js/Chart.js') }}"></script>
      <script type="text/javascript" src="{{ URL::asset('js/Chart.min.js') }}"></script>

</head>

<body>

    <div id="wrapper">

        
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                @if(Auth::user()->rol=='admin')
                <a class="navbar-brand" href="/menu">Admin</a>
                @else
                <a class="navbar-brand" href="/menu">Director(a)</a>
                @endif
                <a class="navbar-brand" href="/">Home</a>
            </div>
           
    

            <ul class="nav navbar-top-links navbar-right">
                 <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i></i>{{ Auth::user()->nombre}} {{ Auth::user()->apellido}}</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="{{url('/logout')}}"><i class="fa fa-sign-out fa-fw"></i>Cerrar Sección</a>
                        </li>
                    </ul>
                </li>
            </ul>

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">

                    
                    <li>
                            <a href="#"><i class="fa fa-film fa-fw"></i> Noticias<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                            <!--
                                <li>
                                    <a href="#"><i class='fa fa-plus fa-fw'></i> Agregar</a>
                                </li>
                                -->
                                <li>
                                
                                    <a href="/noticias/create"><i class='fa fa-plus fa-fw'></i>Subir Noticia</a>
                                </li>

                                <li>
                                    <a href="/noticias/lista_noticias"><i class='fa fa-list-ol fa-fw'></i> Noticias</a>
                                </li>
                            </ul>
                        </li>


                          <li>
                            <a href="#"><i class="fa fa-film fa-fw"></i>PLANES<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                            <!--
                                <li>
                                    <a href="#"><i class='fa fa-plus fa-fw'></i> Agregar</a>
                                </li>

                                -->
                                <li>
                                    <a href="/proyecto/create"> <i class='fa fa-plus fa-fw'></i> Agregar </a>
                                </li>
                                <li>
                                
                                    <a href="/proyecto"><i class='fa fa-list-ol fa-fw'></i>PLANES</a>
                                </li>
                            </ul>
                        </li>
                        
                        <li>
                            <a href="#"><i class="fa fa-users fa-fw"></i> Estudiantes<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                            @if(Auth::user()->rol=='admin')
                                <li>
                                    <a href="{{ route('alumno.create') }}"> <i class='fa fa-plus fa-fw'></i> Agregar </a>
                                </li>
                                <li>
                                    <a href="/alumno/importar"> <i class='fa fa-plus fa-fw'></i> Importar lista </a>
                                </li>
                                <li>
                                @endif
                                    <a href="/alumno"><i class='fa fa-list-ol fa-fw'></i> Estudiantes</a>
                                </li>
                            </ul>
                        </li>

                        @if(Auth::user()->rol=='admin')
                            <li>
                            <a href="#"><i class="fa fa-users fa-fw"></i> Director<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="/director/create"> <i class='fa fa-plus fa-fw'></i> Agregar </a>
                                </li>
                              
                                <li>
                                    <a href="/director"><i class='fa fa-list-ol fa-fw'></i>Mostrar</a>
                                </li>
                            </ul>
                        </li>
                        @endif

                        @if(Auth::user()->rol=='admin')
                            <li>
                            <a href="#"><i class="fa fa-users fa-fw"></i> Utp<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="/utp/create"> <i class='fa fa-plus fa-fw'></i> Agregar </a>
                                </li>
                              
                                <li>
                                    <a href="/utp"><i class='fa fa-list-ol fa-fw'></i>Mostrar</a>
                                </li>
                            </ul>
                        </li>
                        @endif

                        <li>
                            <a href="#"><i class="fa fa-film fa-fw"></i> Cursos<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                            @if(Auth::user()->rol=='admin')
                                <li>
                                    <a href="/curso/create"><i class='fa fa-plus fa-fw'></i> Curso</a>
                                </li>
                                <li>
                                    <a href="/curso/createMateria"><i class='fa fa-plus fa-fw'></i> Materia</a>
                                </li>
                                <!--
                                <li>
                                    <a href="/curso/importar"> <i class='fa fa-plus fa-fw'></i> Importar lista </a>
                                </li>
                                -->
                                @endif
                                <li>
                                    <a href="{{ route('curso.index') }}"><i class='fa fa-list-ol fa-fw'></i> Cursos</a>
                                </li>
                            </ul>
                        </li>


                        <li>
                            <a href="#"><i class="fa fa-child fa-fw"></i> Profesores<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">

                            @if(Auth::user()->rol=='admin')
                                <li>
                                    <a href="{{route('profesores.create') }}"><i class='fa fa-plus fa-fw'></i> Agregar</a>
                                </li>
                                <li>
                                    <a href="/profesor/importar"> <i class='fa fa-plus fa-fw'></i> Importar lista </a>
                                </li>
                                @endif
                                <li>
                                    <a href="/profesores"><i class='fa fa-list-ol fa-fw'></i> Profesores</a>
                                </li>

                           
                            </ul>
                            
                        </li>

                              <li>
                            <a href="#"><i class="fa fa-film fa-fw"></i> Asignar Cursos<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                            @if(Auth::user()->rol=='admin')
                                <li>
                                    <a href="/seccion_curso/grado"><i class='fa fa-plus fa-fw'></i>Alumnos</a>
                                </li>
                                
                                <li>
                                    <a href="/seccion_curso/asignarP"><i class='fa fa-plus fa-fw'></i>Profesor</a>
                                </li>
                              @endif
                                 <li>
                                    <a href="{{ route('seccion_curso.index') }}"><i class='fa fa-list-ol fa-fw'></i>Mostrar</a>
                                </li>
                            </ul>
                        </li>

                        @if(Auth::user()->rol=='admin' || Auth::user()->rol=='utp' )

                           <li>
                            <a href="#"><i class="fa fa-film fa-fw"></i>Estado de Notas<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                            <!--
                                <li>
                                    <a href="#"><i class='fa fa-plus fa-fw'></i> Agregar</a>
                                </li>
                                
                                <li>
                                
                                    <a href="/notas"><i class='fa fa-list-ol fa-fw'></i>Estado</a>
                                </li>

                                 <li>
                                -->
                                <a href="/notas/grado"><i class='fa fa-list-ol fa-fw'></i>Calcular Promedios Finales</a>
                            </li>
                            </ul>
                        </li>
                        @endif

                        <li>
                            <a href="#"><i class="fa fa-film fa-fw"></i> Avisos<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="/avisos/create"><i class='fa fa-plus fa-fw'></i>Enviar</a>
                                </li>
                                
                                 <li>
                                    <a href="/avisos"><i class='fa fa-list-ol fa-fw'></i>Mostrar</a>
                                </li>
                            </ul>
                        </li>

                        <li>
                            <a href="#"><i class="fa fa-film fa-fw"></i>Citaciones<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="/citaciones/create"><i class='fa fa-plus fa-fw'></i>Enviar</a>
                                </li>
                                
                                 <li>
                                    <a href="/citaciones"><i class='fa fa-list-ol fa-fw'></i>Mostrar</a>
                                </li>
                            </ul>
                        </li>

                        <li>
                                
                                <a href="/libreta_notas/grado"><i class='fa fa-list-ol fa-fw'></i>Libreta de notas</a>
                            </li>

                             <li>
                                    <a href="/mensajes"><i class='fa fa-list-ol fa-fw'></i>Mensajes</a>
                                </li>

                            

                          
                    </ul>
                </div>
            </div>


     </nav>

        <!-- imagen de fondo -->
         <style type="text/css">
             #page-wrapper{
                background-image: url("/img/fondo.jpg");
                background-size: 100% 100%;
                background-repeat: no-repeat;
             }
         </style>

        <div id="page-wrapper">

            @yield('contenido')

        </div>

    </div>
    

    {!!Html::script('admin/js/jquery.min.js')!!}
    @stack('scripts')
    {!!Html::script('admin/js/bootstrap.min.js')!!}
    {!!Html::script('admin/js/metisMenu.min.js')!!}
    {!!Html::script('admin/js/sb-admin-2.js')!!}



    <!-- Permite exportar tablas html como excel -->
    <script src="{{asset('js/jquery.table2excel.js')}}"></script>
    <!-- Permite importar Excel como JSON -->
    <script src="{{asset('https://cdnjs.cloudflare.com/ajax/libs/alasql/0.4.0/alasql.min.js')}}"></script>
    <script src="{{asset('https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.10.6/xlsx.core.min.js')}}"></script>
    <script src="{{asset('profesor/js/jquery.table2excel.js')}}"></script>

</body>

</html>
