<!doctype html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <title>Escuela Especial Evangelica Presbiteriana</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,400i,600,700|Raleway:300,400,400i,500,500i,700,800,900" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="lib/nivo-slider/css/nivo-slider.css" rel="stylesheet">
  <link href="lib/owlcarousel/owl.carousel.css" rel="stylesheet">
  <link href="lib/owlcarousel/owl.transitions.css" rel="stylesheet">
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <link href="lib/venobox/venobox.css" rel="stylesheet">

  
  <!-- Nivo Slider Theme -->
  <link href="css/nivo-slider-theme.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="css/menu.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">

  <!-- Responsive Stylesheet File -->
  <link href="css/responsive.css" rel="stylesheet">

  <!-- =======================================================
    Theme Name: eBusiness
    Theme URL: https://bootstrapmade.com/ebusiness-bootstrap-corporate-template/
    Author: BootstrapMade.com
    License: https://bootstrapmade.com/license/
  ======================================================= -->


</head>

<body data-spy="scroll" data-target="#navbar-example">

  <div id="preloader"></div>

  <header>
    <!-- header-area start -->
    <div id="sticker" class="header-area">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-sm-12">

            <!-- Navigation -->
            <nav class="navbar navbar-default">
              <!-- Brand and toggle get grouped for better mobile display -->
              <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".bs-example-navbar-collapse-1" aria-expanded="false">
										<span class="sr-only">Toggle navigation</span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
									</button>
                <!-- Brand -->
                <a class="navbar-brand page-scroll sticky-logo" href="/">
                
                  <!-- Uncomment below if you prefer to use an image logo -->
                   <img src="img/logoC2.png" alt="" title=""> 
								</a>
              </div>
              <!-- Collect the nav links, forms, and other content for toggling -->
              <div class="collapse navbar-collapse main-menu bs-example-navbar-collapse-1" id="navbar-example">
                <ul class="nav navbar-nav navbar-right">
                  <li class="active">
                    <a class="page-scroll" href="#home">Home</a>
                  </li>
                  <li>
                    <a class="page-scroll" href="#services">¿Quienes Somos?</a>
                  </li>
                  <li>
                    <a class="page-scroll" href="#about">Plan Anual</a>
                  </li>
                  <li>
                    <a class="page-scroll" href="#team">Cuerpo Docente</a>
                  </li>
                  <li>
                    <a class="page-scroll" href="#portfolio">Postulaciones</a>
                  </li>
                  <li>
                    <a class="page-scroll" href="#blog">Noticias</a>
                  </li>
                  <li>
                    <a class="page-scroll" href="#contact">Contacto</a>
                  </li>

				 @if(Auth::check())
         @if(Auth::user()->rol=='profesor')
                    <li class="page-scroll">
                          <a href="#" class="page-scroll" data-toggle="dropdown">
                                <i ></i>
                                <p style="color:#f1f1f1;">{{ Auth::user()->nombre}}</p>
                            </a>
                      
                        
						<ul class="dropdown-menu">
                            <li ><a style="color:#000;"  href="menu">Mis Cursos</a></li>
                            <li><a style="color:#000;" href="{{url('/logout')}}">Salir</a></li>
                         
						  </li>
              @endif

              @if(Auth::user()->rol=='alumno')
                    <li class="page-scroll">
                          <a href="#" class="page-scroll" data-toggle="dropdown">
                                <i ></i>
                                <p style="color:#f1f1f1;">{{ Auth::user()->nombre}}</p>
                            </a>
                      
                        
						<ul class="dropdown-menu">
                            <li ><a style="color:#000;"  href="menu">Mis Cursos</a></li>
                            <li><a style="color:#000;" href="{{url('/logout')}}">Salir</a></li>
                         
						  </li>
              @endif
              @if(Auth::user()->rol=='admin')
              <li class="page-scroll">
                          <a href="#" class="page-scroll" data-toggle="dropdown">
                                <i ></i>
                                <p style="color:#f1f1f1;">{{ Auth::user()->nombre}}</p>
                            </a>
                      
                        
						<ul class="dropdown-menu">
                            <li ><a style="color:#000;"  href="menu">Gestionar</a></li>
							<li class="divider"></li>
                            <li><a style="color:#000;" href="{{url('/logout')}}">Salir</a></li>
                         
						  </li>
              @endif
              @if(Auth::user()->rol=='utp')
              <li class="page-scroll">
                          <a href="#" class="page-scroll" data-toggle="dropdown">
                                <i ></i>
                                <p style="color:#f1f1f1;">{{ Auth::user()->nombre}}</p>
                            </a>
                      
                        
            <ul class="dropdown-menu">
                            <li ><a style="color:#000;"  href="grafico">Gestionar</a></li>
              <li class="divider"></li>
                            <li><a style="color:#000;" href="{{url('/logout')}}">Salir</a></li>
                         
              </li>
              @endif

@if(Auth::user()->rol=='director')
<li class="page-scroll">
                          <a href="#" class="page-scroll" data-toggle="dropdown">
                                <i ></i>
                                <p style="color:#f1f1f1;">{{ Auth::user()->nombre}}</p>
                            </a>
                      
                        
						<ul class="dropdown-menu">
                            <li ><a style="color:#000;"  href="menu">Gestionar</a></li>
							<li class="divider"></li>
                            <li><a style="color:#000;" href="{{url('/logout')}}">Salir</a></li>
                         
						  </li>
              @endif


						  @else
                    <li><a href="/login2" class="button special">Login</a></li>
                    @endif
                </ul>
              </div>
              <!-- navbar-collapse -->
            </nav>
            <!-- END: Navigation -->

          </div>
        </div>
      </div>
    </div>
    <!-- header-area end -->
  </header>
  <!-- header end -->

 

  <!-- Start Slider Area -->
  <div id="home" class="slider-area">
    <div class="bend niceties preview-2">
      <div id="ensign-nivoslider" class="slides">
        <img src="img/slider/img1.jpg" alt="" title="#slider-direction-1" />
        <img src="img/slider/img2.jpg" alt="" title="#slider-direction-2" />
        <!--<img src="img/slider/slider3.jpg" alt="" title="#slider-direction-3" -->
      </div>

      <!-- direction 1 -->
      <div id="slider-direction-1" class="slider-direction slider-one">
        <div class="container">
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="slider-content">
                <!-- layer 1 -->
                <div class="layer-1-1 hidden-xs wow slideInDown" data-wow-duration="2s" data-wow-delay=".2s">
                  <h2 class="title1">Escuela especial evangelica presbiteriana </h2>
                </div>
                <!-- layer 2 -->
                <div class="layer-1-2 wow slideInUp" data-wow-duration="2s" data-wow-delay=".1s">
                  <h1 class="title2">Nosotros nos comprometemos con la educación de su hijo</h1>
                </div>
                <!-- layer 3 -->
                <div class="layer-1-3 hidden-xs wow slideInUp" data-wow-duration="2s" data-wow-delay=".2s">
                  <a class="ready-btn right-btn page-scroll" href="#about">Plan Anual</a>
                  <a class="ready-btn page-scroll" href="#services">Leer Más</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- direction 2 -->
      <div id="slider-direction-2" class="slider-direction slider-two">
        <div class="container">
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="slider-content text-center">
                <!-- layer 1 -->
                <div class="layer-1-1 hidden-xs wow slideInUp" data-wow-duration="2s" data-wow-delay=".2s">
                  <h2 class="title1">Escuela especial evangelica presbiteriana </h2>
                </div>
                <!-- layer 2 -->
                <div class="layer-1-2 wow slideInUp" data-wow-duration="2s" data-wow-delay=".1s">
                  <h1 class="title2">Nosotros nos comprometemos con la educación de su hijo</h1>
                </div>
                <!-- layer 3 -->
                <div class="layer-1-3 hidden-xs wow slideInUp" data-wow-duration="2s" data-wow-delay=".2s">
                  <a class="ready-btn right-btn page-scroll" href="#about">Plan Anual</a>
                  <a class="ready-btn page-scroll" href="#services">Leer Más</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- direction 3 -->
      <div id="slider-direction-3" class="slider-direction slider-two">
        <div class="container">
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="slider-content">
                <!-- layer 1 -->
                <div class="layer-1-1 hidden-xs wow slideInUp" data-wow-duration="2s" data-wow-delay=".2s">
                  <h2 class="title1">The Best business Information </h2>
                </div>
                <!-- layer 2 -->
                <div class="layer-1-2 wow slideInUp" data-wow-duration="2s" data-wow-delay=".1s">
                  <h1 class="title2">Helping Business Security  & Peace of Mind for Your Family</h1>
                </div>
                <!-- layer 3 -->
                <div class="layer-1-3 hidden-xs wow slideInUp" data-wow-duration="2s" data-wow-delay=".2s">
                  <a class="ready-btn right-btn page-scroll" href="#services">See Services</a>
                  <a class="ready-btn page-scroll" href="#about">Learn More</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End Slider Area -->

  <!-- Start Service area -->
  <div id="about" class="services-area area-padding">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="section-headline services-head text-center">
            <h2>PLAN ANUAL</h2>
          </div>
        </div>
      </div>
      <div class="row text-center">
        <div class="services-contents">
        @foreach ($proyecto as $pro)
          <!-- Start Left services -->
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="about-move">
              <div class="services-details">
                <div class="single-services">
         
                  <a class="services-icon" href="{{ Storage::url($pro->proyecto) }}" target="_blank" >
                  <h4>{{$pro -> descripcion}}</h4>
										</a>
  
                </div>
              </div>
              <!-- end about-details -->
              @endforeach
              <!-- end about-details -->
        <!-- End col-->
      </div>
    </div>
  </div>
  <!-- End About area -->

  
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End Service area -->

  <!-- Start Suscrive Area -->
  <div class="suscribe-area">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs=12">
          <div class="suscribe-text text-center">
            <h3>PROYECTO EDUCATIVO</h3>
              
          </div>
        </div>
      </div>
    </div>
  </div>
              <!-- End Panel Default -->
              
              <!-- End Panel Default -->
            </div>
          </div>
        </div>
        <div id ="services" class="col-md-12 col-sm-12 col-xs-12">
          <div class="tab-menu">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
              <li class="active">
                <a href="#p-view-1" role="tab" data-toggle="tab">Visión</a>
              </li>
              <li>
                <a href="#p-view-2" role="tab" data-toggle="tab">Misión</a>
              </li>
      
            </ul>
          </div>
          <div class="tab-content">
            <div class="tab-pane active" id="p-view-1">
              <div class="tab-inner">
                <div class="event-content head-team">
                  <h4>Visión</h4>
                  <p>
                  Respetar, valorar y promover la diversidad de pensamiento contribuyendo a 
                  la sociedad con personas integrales, libres con capacidad para tomar sus propias decisiones y 
                  que puedan desenvolverse con valores sólidos, comprometidos con su quehacer y felices en el camino que escojan para sus vidasRespetar, valorar y promover la diversidad de pensamiento contribuyendo a la sociedad con personas integrales, libres con capacidad para tomar sus propias decisiones y que puedan desenvolverse con valores sólidos, comprometidos con su quehacer y 
                  felices en el camino que escojan para sus vidas
                  </p>
                  <p>
                    voluptas, praesentium maxime cum fugiat,magnam ducimus adipisci voluptas, praesentium architecto ducimus, doloribus fuga itaque omnis placeat.
                  </p>
                </div>
              </div>
            </div>
            <div class="tab-pane" id="p-view-2">
              <div class="tab-inner">
                <div class="event-content head-team">
                  <h4>Misión</h4>
                  <p>
                  Educar integralmente, a través del desarrollo de habilidades y capacidades intelectuales, físicas, socio-afectivas y culturales; utilizando estrategias acorde a las necesidades de los estudiantes.
                  </p>
                
                </div>
              </div>
            </div>
            <div class="tab-pane" id="p-view-3">
              <div class="tab-inner">
                <div class="event-content head-team">
                  <h4>Success</h4>
                  <p>
                    voluptas, praesentium maxime cum fugiat,magnam ducimus adipisci voluptas, praesentium architecto ducimus, doloribus fuga itaque omnis placeat.
                  </p>
                  <p>
                    voluptas, praesentium maxime cum fugiat,magnam ducimus adipisci voluptas, praesentium architecto ducimus, doloribus fuga itaque omnis.
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- end Row -->
    </div>
  </div>
  <!-- End Faq Area -->

  
  <!-- End Wellcome Area -->

  <!-- Start team Area -->
  <div id="team" class="our-team-area area-padding">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="section-headline text-center">
            <h2>Cuerpo Docente</h2>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="team-top">
          <div class="col-md-3 col-sm-3 col-xs-12">
            <div class="single-team-member">
              <div class="team-img">
                <a href="#">
										<img src="img/team/1.jpg" alt="">
									</a>
                <div class="team-social-icon text-center">
                  <ul>
                    <li>
                      <a href="#">
													<i class="fa fa-facebook"></i>
												</a>
                    </li>
                    <li>
                      <a href="#">
													<i class="fa fa-twitter"></i>
												</a>
                    </li>
                    <li>
                      <a href="#">
													<i class="fa fa-instagram"></i>
												</a>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="team-content text-center">
                <h4>Jhon Mickel</h4>
                <p>Seo</p>
              </div>
            </div>
          </div>
          <!-- End column -->
          <div class="col-md-3 col-sm-3 col-xs-12">
            <div class="single-team-member">
              <div class="team-img">
                <a href="#">
										<img src="img/team/2.jpg" alt="">
									</a>
                <div class="team-social-icon text-center">
                  <ul>
                    <li>
                      <a href="#">
													<i class="fa fa-facebook"></i>
												</a>
                    </li>
                    <li>
                      <a href="#">
													<i class="fa fa-twitter"></i>
												</a>
                    </li>
                    <li>
                      <a href="#">
													<i class="fa fa-instagram"></i>
												</a>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="team-content text-center">
                <h4>Andrew Arnold</h4>
                <p>Web Developer</p>
              </div>
            </div>
          </div>
          <!-- End column -->
          <div class="col-md-3 col-sm-3 col-xs-12">
            <div class="single-team-member">
              <div class="team-img">
                <a href="#">
										<img src="img/team/3.jpg" alt="">
									</a>
                <div class="team-social-icon text-center">
                  <ul>
                    <li>
                      <a href="#">
													<i class="fa fa-facebook"></i>
												</a>
                    </li>
                    <li>
                      <a href="#">
													<i class="fa fa-twitter"></i>
												</a>
                    </li>
                    <li>
                      <a href="#">
													<i class="fa fa-instagram"></i>
												</a>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="team-content text-center">
                <h4>Lellien Linda</h4>
                <p>Web Design</p>
              </div>
            </div>
          </div>
          <!-- End column -->
          <div class="col-md-3 col-sm-3 col-xs-12">
            <div class="single-team-member">
              <div class="team-img">
                <a href="#">
										<img src="img/team/4.jpg" alt="">
									</a>
                <div class="team-social-icon text-center">
                  <ul>
                    <li>
                      <a href="#">
													<i class="fa fa-facebook"></i>
												</a>
                    </li>
                    <li>
                      <a href="#">
													<i class="fa fa-twitter"></i>
												</a>
                    </li>
                    <li>
                      <a href="#">
													<i class="fa fa-instagram"></i>
												</a>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="team-content text-center">
                <h4>Jhon Powel</h4>
                <p>Seo Expert</p>
              </div>
            </div>
          </div>
          <!-- End column -->
        </div>
      </div>
    </div>
  </div>
  <!-- End Team Area -->

  <
  <!-- End reviews Area -->


  <!-- Start portfolio Area -->
  <div id="portfolio" class="portfolio-area area-padding fix">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="section-headline text-center">
            <h2>PROCESO DE ADMISIÓN</h2>
            <p><strong>ESCUELA ESPECIAL EVANGÉLICA PRESBITERIANA</strong></p>
          </div>
        </div>
      </div>
  

      <div class="row">
        
          </div>
          <p>
          estimada comunidad educativa, a modo de ajustarnos a la normativa educacional vigente, 
          conforme a lo prescrito en el D.F.L Nº 2 de 2009, de la Ley Nº 20.370, con las normas no derogadas del 
          D.F.L. Nº 1, de 2005, D.F.L. Nº 2 de 1998, D.F.L. Nº 2,de 1996, la Ley 20.609, la Ley 20.529, en el decreto Nº 315 del 2010, la Resolución Nº 1600 de 2008 y según lo dispuesto en la Ley Nº 20.845, es que debemos informar a ustedes lo siguiente respecto del proceso de admisión a primeros básicos a nuestro establecimiento para el año 2018: INFORMACIÓN DEL ESTABLECIMIENTO: Modalidad de Enseñanza : Enseñanza Básica y Enseñanza Media Científico – Humanista. Dependencia : Particular Subvencionado con Financiamiento Compartido en Enseñanza Básica y Enseñanza Media. Cobro Mensual en Enseñanza Básica : 12.500 pesos Proyectos en Funcionamiento : Proyecto de Integración Escolar de 1º a 8º Básico (PIE) Subvención Escolar Preferencial (SEP) Capacidad Normativa De Primero Básico : 135 estudiantes Vacantes Disponibles 1º Básico : 135 Jornada de Funcionamiento Primeros Básicos : Tarde (14:00 a 19:00 horas y 2 días de 14:00 a 
          19:45 horas) Postulación 1º Básicos : Exclusivamente vía web en www.iabtalca.cl
 </p>

        <p>a).- PROCESO DE POSTULACIÓN INTERNA:  13 Y 14 DE SEPTIEMBRE 2017</p>
        <p><strong>POSTULAN EN ESTE PROCESO: </strong> Hijos de Funcionarios, hermanos de estudiantes matriculados en nuestro establecimiento e hijos o hermanos de ex-alumnos.
        <p><strong>CRITERIOS DE ADMISIÓN:</strong> Los criterios admisión a nuestro Instituto son:
        
        <ul style="list-style-type:circle">
            <li>Tener 6 años cumplidos al 31 de marzo del 2018 (esto será verificado en página web de registro civil, de ser inscrita una postulación que no cumpla este criterio, se asumirá como nula por no ceñirse a 
            lo estipulado en los criterios de admisión).</li>
        <li>Adherir al Proyecto Educativo Institucional y Reglamento Interno de Convivencia Escolar (disponible en www.iabtalca.cl)
            </li>
        </ul>

        <p><strong>TENDRÁN PRIORIDAD DE INGRESO:</strong> En caso que el número de postulaciones de este proceso interno superen la capacidad normativa disponible, la prioridad de ingreso será la siguiente:</p>

          <ol>

            <li value="1">Los postulantes hijos de un/a funcionario/a. </li>

            <li> Postulante que tenga un hermano matriculado en nuestro establecimiento. </li>

            <li> Postulante hijo o hermano de un exalumno de nuestro establecimiento (Egresado de 4to Medio). </li>

            </ol>




        </div>
      </div>
    </div>
  </div>
  <!-- awesome-portfolio end -->
  
  <!-- Start Testimonials -->
  <div class="testimonials-area">
    <div class="testi-inner area-padding">
      <div class="testi-overly"></div>
      <div class="container ">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <!-- Start testimonials Start -->
            <div class="testimonial-content text-center">
              <a class="quate" href="#"><i class="fa fa-quote-right"></i></a>
              <!-- start testimonial carousel -->
              <div class="testimonial-carousel">
                <div class="single-testi">
                  <div class="testi-text">
                    <p>
                      Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed pulvinar luctus est eget congue.<br>consectetur adipiscing elit. Sed pulvinar luctus est eget congue.
                    </p>
                    <h6>Boby</h6>
                  </div>
                </div>
                <!-- End single item -->
                <div class="single-testi">
                  <div class="testi-text">
                    <p>
                      Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed pulvinar luctus est eget congue.<br>consectetur adipiscing elit. Sed pulvinar luctus est eget congue.
                    </p>
                    <h6>Jhon</h6>
                  </div>
                </div>
                <!-- End single item -->
                <div class="single-testi">
                  <div class="testi-text">
                    <p>
                      Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed pulvinar luctus est eget congue.<br>consectetur adipiscing elit. Sed pulvinar luctus est eget congue.
                    </p>
                    <h6>Fleming</h6>
                  </div>
                </div>
                <!-- End single item -->
              </div>
            </div>
            <!-- End testimonials end -->
          </div>
          <!-- End Right Feature -->
        </div>
      </div>
    </div>
  </div>
  <!-- End Testimonials -->
  <!-- Start Blog Area -->
  <div id="blog" class="blog-area">
    <div class="blog-inner area-padding">
      <div class="blog-overly"></div>
      <div class="container ">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="section-headline text-center">
              <h2>Noticias</h2>
              <h4>Enterate de nuestras Actividades y Noticias aquí</h4>
              <BR><BR><BR>
            </div>
          </div>
        </div>
        			<!-- AQUI INICIA EL CONTENIDO -->
					@yield('contenido')
					<!-- AQUI TERMINA EL CONTENIDO -->
          <!-- End Right Blog-->
         
       
        
        </div>

        <div class="single-blog">
        <BR><BR>
        <center>
        <span>
        <a href="noticias" class="ready-btn page-scroll" >Ver Todas</a>
        </span>
        </center>
       </div>
       <BR><BR><BR>

      </div>
    </div>
  </div>
  <!-- End Blog -->
  <!-- Start Suscrive Area -->
  <div class="suscribe-area">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs=12">
          <div class="suscribe-text text-center">
            <h3>Bienvenido</h3>
              
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End Suscrive Area -->
  <!-- Start contact Area -->
  <div id="contact" class="contact-area">
    <div class="contact-inner area-padding">
      <div class="contact-overly"></div>
      <div class="container ">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="section-headline text-center">
              <h2>Contacto</h2>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- Start contact icon column -->
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="contact-icon text-center">
              <div class="single-icon">
                <i class="fa fa-mobile"></i>
                <p>
                Fonos: 712231442<br>
                  <span>Lunes-Viernes (7am-8pm)</span>
                </p>
              </div>
            </div>
          </div>
          <!-- Start contact icon column -->
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="contact-icon text-center">
              <div class="single-icon">
                <i class="fa fa-envelope-o"></i>
                <p>
                  Email: escuelaeept@gmail.com<br>
    
                </p>
              </div>
            </div>
          </div>
          <!-- Start contact icon column -->
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="contact-icon text-center">
              <div class="single-icon">
                <i class="fa fa-map-marker"></i>
                <p>
                Locación: 4 Poniente, 14 Sur <br>
                  <span>N° 390, TALCA</span>
                </p>
              </div>
            </div>
          </div>
        </div>
        <div class="row">

          <!-- Start Google Map -->
          <div class="col-md-6 col-sm-6 col-xs-12">
            <!-- Start Map -->
            <!-- Uncomment below if you wan to use dynamic maps -->
            <!--<div id="google-map" data-latitude="40.713732" data-longitude="-74.0092704"></div>-->
            <img src="/img/mapaColegio.jpg" alt="">
            <!-- End Map -->
          </div>
          <!-- End Google Map -->
          {!!Form::open(array('url'=>'mensajes', 'method'=>'POST', 'autocomplete'=>'off'))!!}
                {{Form::token()}}
          <!-- Start  contact -->
          <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="form contact-form">
    
              <div id="sendmessage">Your message has been sent. Thank you!</div>
              <div id="errormessage"></div>
             
                <div class="form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Nombre" data-rule="minlen:4" data-msg="Please enter at least 4 chars" required />
                  <div class="validation"></div>
                </div>
                <div class="form-group">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Email" data-rule="email" data-msg="Please enter a valid email" required />
                  <div class="validation"></div>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" name="subject" id="subject" placeholder="Asunto" maxlength="20" data-msg="Please enter at least 8 chars of subject" required />
                  <div class="validation"></div>
                </div>
                <div class="form-group">
                  <textarea class="form-control" name="message" rows="5" data-rule="required" maxlength="298" placeholder="descripcion" required></textarea>
                  <div class="validation"></div>
                </div>
                <div class="text-center"><button type="submit"><Em>Enviar Mensaje</Em></button></div>
                
            </div>
          </div>
          {!!Form::close()!!}
          <!-- End Left contact -->
        </div>
      </div>
    </div>
  </div>
  <!-- End Contact Area -->

  <!-- Start Footer bottom Area -->
  <footer>
    <div class="footer-area">
      <div class="container">
        <div class="row">
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="footer-content">
              <div class="footer-head">
                <div class="footer-logo">
                  <h2><span>E</span>scuela especial evangélica presbiteriana 
</h2>
                </div>

                <p>Director: José Horacio Molina Fonseca<br/>
                  Representante Legal: Hugo Núñez Orellana <br/>
                  RBD: 2994-7
.</p>
                <div class="footer-icons">
                  <ul>
                    <li>
                      <a href="#"><i class="fa fa-facebook"></i></a>
                    </li>
                    <li>
                      <a href="#"><i class="fa fa-twitter"></i></a>
                    </li>
                    <li>
                      <a href="#"><i class="fa fa-google"></i></a>
                    </li>
                    <li>
                      <a href="#"><i class="fa fa-pinterest"></i></a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <!-- end single footer -->
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="footer-content">
              <div class="footer-head">
                <h4>información</h4>
                <p>
                 Para obtener más informacion contactanos en:
                </p>
                <div class="footer-contacts">
                  <p><span>Tel:</span> 712231442</p>
                  <p><span>Email:</span> escuelaeept@gmail.com</p>
                  <p><span>Hora de Trabajo:</span> 7am-8pm</p>
                </div>
              </div>
            </div>
          </div>
          <!-- end single footer -->
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="footer-content">
              <div class="footer-head">
                <h4>Instagram</h4>
                <div class="flicker-img">
                  <a href="#"><img src="img/portfolio/1.jpg" alt=""></a>
                  <a href="#"><img src="img/portfolio/2.jpg" alt=""></a>
                  <a href="#"><img src="img/portfolio/3.jpg" alt=""></a>
                  <a href="#"><img src="img/portfolio/4.jpg" alt=""></a>
                  <a href="#"><img src="img/portfolio/5.jpg" alt=""></a>
                  <a href="#"><img src="img/portfolio/6.jpg" alt=""></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="footer-area-bottom">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="copyright text-center">
              <p>
                &copy; Copyright <strong>Sistema Colegio</strong>. All Rights Reserved
              </p>
            </div>
            <div class="credits">
              <!--
                All the links in the footer should remain intact.
                You can delete the links only if you purchased the pro version.
                Licensing information: https://bootstrapmade.com/license/
                Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=eBusiness
              -->
              Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
            </div>
          </div>
        </div>
      </div>
    </div>

  </footer>

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

  <!-- JavaScript Libraries -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <script src="lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="lib/venobox/venobox.min.js"></script>
  <script src="lib/knob/jquery.knob.js"></script>
  <script src="lib/wow/wow.min.js"></script>
  <script src="lib/parallax/parallax.js"></script>
  <script src="lib/easing/easing.min.js"></script>
  <script src="lib/nivo-slider/js/jquery.nivo.slider.js" type="text/javascript"></script>
  <script src="lib/appear/jquery.appear.js"></script>
  <script src="lib/isotope/isotope.pkgd.min.js"></script>
  <!-- Uncomment below if you want to use dynamic Google Maps -->
  <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD8HeI8o-c1NppZA-92oYlXakhDPYR7XMY"></script> -->

  <!-- Contact Form JavaScript File -->
  <script src="contactform/contactform.js"></script>

  <script src="js/main.js"></script>
  <script src="{{asset('ckeditor/ckeditor.js')}}"></script>

  
</body>

</html>
