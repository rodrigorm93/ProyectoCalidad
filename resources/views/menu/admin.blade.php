<!DOCTYPE html>
<html>
@if(session('success2'))
		<div class="alert alert-success">
			{{session('success2')}}
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
                <a class="navbar-brand" href="/menu">Admin</a>
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
                                
                                    <a href=""><i class='fa fa-plus fa-fw'></i>Subir Noticia</a>
                                </li>
                            </ul>
                        </li>


                          <li>
                            <a href="#"><i class="fa fa-film fa-fw"></i>Proyectos Educativos<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                            <!--
                                <li>
                                    <a href="#"><i class='fa fa-plus fa-fw'></i> Agregar</a>
                                </li>
                                -->
                                <li>
                                
                                    <a href=""><i class='fa fa-plus fa-fw'></i>Proyecto</a>
                                </li>
                            </ul>
                        </li>
                        
                        <li>
                            <a href="#"><i class="fa fa-users fa-fw"></i> Estudiantes<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{ route('alumno.create') }}"> <i class='fa fa-plus fa-fw'></i> Agregar </a>
                                </li>
                                <li>
                                    <a href="/alumno/importar"> <i class='fa fa-plus fa-fw'></i> Importar lista </a>
                                </li>
                                <li>
                                    <a href="/alumno"><i class='fa fa-list-ol fa-fw'></i> Estudiantes</a>
                                </li>
                            </ul>
                        </li>

                        <li>
                            <a href="#"><i class="fa fa-film fa-fw"></i> Cursos<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
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
                                <li>
                                    <a href="{{ route('curso.index') }}"><i class='fa fa-list-ol fa-fw'></i> Cursos</a>
                                </li>
                            </ul>
                        </li>


                        <li>
                            <a href="#"><i class="fa fa-child fa-fw"></i> Profesores<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{route('profesores.create') }}"><i class='fa fa-plus fa-fw'></i> Agregar</a>
                                </li>
                                <li>
                                    <a href="/profesor/importar"> <i class='fa fa-plus fa-fw'></i> Importar lista </a>
                                </li>
                                <li>
                                    <a href="/profesores"><i class='fa fa-list-ol fa-fw'></i> Profesores</a>
                                </li>

                           
                            </ul>
                            
                        </li>

                              <li>
                            <a href="#"><i class="fa fa-film fa-fw"></i> Asignar Cursos<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="/seccion_curso/grado"><i class='fa fa-plus fa-fw'></i>Alumnos</a>
                                </li>
                                
                                <li>
                                    <a href="/seccion_curso/asignarP"><i class='fa fa-plus fa-fw'></i>Profesor</a>
                                </li>
                              
                                 <li>
                                    <a href="{{ route('seccion_curso.index') }}"><i class='fa fa-list-ol fa-fw'></i>Mostrar</a>
                                </li>

                            </ul>
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

</body>

</html>
