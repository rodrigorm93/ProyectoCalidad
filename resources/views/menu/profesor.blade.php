<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Materias | Colegio </title>

    <!-- Estilos CSS  -->
    {!!Html::style('profesor/css/extra.css')!!}

   <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    
    <!-- CSS PARA EL BOTON -->
    <link rel="stylesheet" href="{{asset('profesor/css/boton.css')}}">

    <!-- importa los iconos --> 
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="{{asset('profesor/css/bootstrap.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('profesor/css/font-awesome.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('profesor/css/AdminLTE.min.css')}}">
    <link rel="stylesheet" href="{{asset('profesor/css/tabla_scroll.css')}}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{asset('profesor/css/_all-skins.min.css')}}">
    <link rel="apple-touch-icon" href="{{asset('profesor/img/apple-touch-icon.png')}}">
    <link rel="shortcut icon" href="profesor/img/favicon.ico"> 

  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

      <header class="main-header">

        <!-- Logo -->
        <a href="/menu" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>GM</b></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Materias</b></span>
        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Navegación</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
              
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <small class="bg-red">Online</small>
                  <span class="hidden-xs">{{ Auth::user()->nombre }} {{ Auth::user()->apellido }}</span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <p>
                     Tipo de Usuario: {{ Auth::user()->rol }}
                    </p>
                    <p>
                      Email: {{ Auth::user()->email }}
                    </p>
                  
                  </li>

                  <!-- Menu Footer-->
                  <li class="user-footer">
                    
                    <div class="pull-right">
                      <a href="{{url('/logout')}}" class="btn btn-default btn-flat">Cerrar Sección</a>
                    </div>
                    <div class="pull-left">
                    <a href="/" class="btn btn-default btn-flat">Home</a>
                    </div>
                  </li>
                </ul>
              </li>
              
            </ul>
          </div>

        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
      @foreach($curso as $cur)
        <!-- sidebar: style can be found in sidebar.less -->
  
        <section class="sidebar">
          <!-- Sidebar user panel -->
                   
          <!-- sidebar menu: : style can be found in sidebar.less -->
       
          <ul class="sidebar-menu">
            <li class="header"></li>
            

            <li class="treeview">
              <a href="#">
                <i class="fa fa-laptop"></i>
                <span>{{$cur->nombre}}</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>


        <ul class="treeview-menu">

             {!!Form::open(array('url'=>'listaAlumno', 'method'=>'GET', 'autocomplete'=>'off'))!!}
                {{Form::token()}}
               
             <input type="hidden" name="searchText" value="{{$cur->idMateria}}">
             
             <li><a href="listaAlumno"><i class="fa fa-circle-o">
                 <button id="seleccion" type="submit" onmouseover="this.backgroundColor='green'" onmouseout="this.backgroundColor=''">Listado del Curso</button>
              </i></a></li> 
              {!!Form::close()!!}


              {!! Form::open(array('url'=>'notas/create', 'method'=>'GET','autocomplete'=>'off', 'role'=>'search')) !!}
             <input type="hidden" name="searchText" value="{{$cur->idMateria}}">
             
              <li><a href=""><i class="fa fa-circle-o">
                  <button id="seleccion" type="submit" onmouseover="this.backgroundColor='green'" onmouseout="this.backgroundColor=''">Libreta de Notas</button>  
              </i></a></li>
              {{Form::close()}}


              {!! Form::open(array('url'=>'libreta_notas/ver_libretaPorMateria', 'method'=>'GET','autocomplete'=>'off', 'role'=>'search')) !!}
             <input type="hidden" name="idMateria" value="{{$cur->idMateria}}">
             
              <li><a href=""><i class="fa fa-circle-o">
                  <button id="seleccion" type="submit" onmouseover="this.backgroundColor='green'" onmouseout="this.backgroundColor=''">Exportar Libreta</button>  
              </i></a></li>
              {{Form::close()}}

              {!! Form::open(array('url'=>'notas/verEstadoPorMateria', 'method'=>'GET','autocomplete'=>'off', 'role'=>'search')) !!}
             <input type="hidden" name="idMateria" value="{{$cur->idMateria}}">
             
              <li><a href=""><i class="fa fa-circle-o">
                  <button id="seleccion" type="submit" onmouseover="this.backgroundColor='green'" onmouseout="this.backgroundColor=''">Estado</button>  
              </i></a></li>
              {{Form::close()}}

          

        </ul> 

       
        </section>

      @endforeach
    

    <section class="sidebar">
          <!-- Sidebar user panel -->
                   
          <!-- sidebar menu: : style can be found in sidebar.less -->
       
          <ul class="sidebar-menu">
            <li class="header"></li>
            

            <li class="treeview">
              <a href="#">
                <i class="fa fa-laptop"></i>
                <span>Citaciones</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>


        <ul class="treeview-menu">

               
               <li>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="/citaciones/create2"><i class='fa fa-plus fa-fw'></i>Enviar</a>
                                </li>
                              
                            </ul>
                        </li>

                        <li>
                        </ul>
              </section>




        <!-- /.sidebar -->
      </aside>



       <!--Contenido-->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        
        <!-- Main content -->
        <section class="content">
          
          <div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Gestion de Materias</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                      <div class="col-md-12">
                              <!--Contenido-->
                              @yield('contenido')
                              <!--Fin Contenido-->
                           </div>
                        </div>
                        
                      </div>
                    </div><!-- /.row -->
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <!--Fin-Contenido-->
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 2.0.1
        </div>
        <strong>Copyright &copy; 2018-2020 Software Colegio</strong> All rights reserved.
      </footer>

      
<!-- jQuery 2.1.4 -->
    <script src="{{asset('profesor/js/jQuery-2.1.4.min.js')}}"></script>
    @stack('scripts')
    <!-- Bootstrap 3.3.5 -->
    <script src="{{asset('profesor/js/bootstrap.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('profesor/js/app.min.js')}}"></script>
    <!-- Permite exportar tablas html como excel -->
    <script src="{{asset('profesor/js/jquery.table2excel.js')}}"></script>
    <!-- Permite importar Excel como JSON -->
    <script src="{{asset('https://cdnjs.cloudflare.com/ajax/libs/alasql/0.4.0/alasql.min.js')}}"></script>
    <script src="{{asset('https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.10.6/xlsx.core.min.js')}}"></script>
    
  </body>
</html>
