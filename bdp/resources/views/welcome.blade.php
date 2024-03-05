<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
        <meta charset="utf-8">        

        <title>Banco de Proyectos</title>
        <!-- Brian -->
        <meta name="description" content="Agregar description">
		<meta name="keywords" content="HTML5, Bootsrtrap, One Page, Responsive" />
		<meta name="author" content="Brian Miguel Cabañas | SIGEH">

		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1">

        
        
        <!-- Google Fonts  -->
		<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700,500' rel='stylesheet' type='text/css'> <!-- Body font -->
		<link href='http://fonts.googleapis.com/css?family=Lato:300,400' rel='stylesheet' type='text/css'> <!-- Navbar font -->

		<!-- Libs and Plugins CSS -->
		<link rel="stylesheet" href="inc/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="inc/animations/css/animate.min.css">
		<link rel="stylesheet" href="inc/font-awesome/css/font-awesome.min.css"> <!-- Font Icons -->
		<link rel="stylesheet" href="inc/owl-carousel/css/owl.carousel.css">
		<link rel="stylesheet" href="inc/owl-carousel/css/owl.theme.css">

		<!-- Theme CSS -->
        <link rel="stylesheet" href="css/reset.css">
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="css/mobile.css">

		<!-- Skin CSS -->
		<link rel="stylesheet" href="css/skin/cool-gray.css">

        <!-- Fonts -->
        <!--<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">-->

        <!-- Styles -->
        <style>
         html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--bg-opacity:1;background-color:#fff;background-color:rgba(255,255,255,var(--bg-opacity))}.bg-gray-100{--bg-opacity:1;background-color:#f7fafc;background-color:rgba(247,250,252,var(--bg-opacity))}.border-gray-200{--border-opacity:1;border-color:#edf2f7;border-color:rgba(237,242,247,var(--border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{box-shadow:0 1px 3px 0 rgba(0,0,0,.1),0 1px 2px 0 rgba(0,0,0,.06)}.text-center{text-align:center}.text-gray-200{--text-opacity:1;color:#edf2f7;color:rgba(237,242,247,var(--text-opacity))}.text-gray-300{--text-opacity:1;color:#e2e8f0;color:rgba(226,232,240,var(--text-opacity))}.text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.text-gray-500{--text-opacity:1;color:#a0aec0;color:rgba(160,174,192,var(--text-opacity))}.text-gray-600{--text-opacity:1;color:#718096;color:rgba(113,128,150,var(--text-opacity))}.text-gray-700{--text-opacity:1;color:#4a5568;color:rgba(74,85,104,var(--text-opacity))}.text-gray-900{--text-opacity:1;color:#1a202c;color:rgba(26,32,44,var(--text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--bg-opacity:1;background-color:#2d3748;background-color:rgba(45,55,72,var(--bg-opacity))}.dark\:bg-gray-900{--bg-opacity:1;background-color:#1a202c;background-color:rgba(26,32,44,var(--bg-opacity))}.dark\:border-gray-700{--border-opacity:1;border-color:#4a5568;border-color:rgba(74,85,104,var(--border-opacity))}.dark\:text-white{--text-opacity:1;color:#fff;color:rgba(255,255,255,var(--text-opacity))}.dark\:text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.dark\:text-gray-500{--tw-text-opacity:1;color:#6b7280;color:rgba(107,114,128,var(--tw-text-opacity))}}
        </style>

        <style>
            body {
                font-family: Montserrat;
            }
            .colapse-container{
  
            background-color: #fff;
           
            margin: 1.5em auto;
            padding: 3em;
            
            .colapse-title{
                cursor: pointer;
            }
            
            .colapse-body{
                display: none;
            }
            
            .check-colapse{
                position: absolute;
                left: -999em;
            }
            
            .check-colapse:checked ~ .colapse-body{
                display: block;
            }
            
            }
        </style>
    </head>
    <body class="antialiased" data-spy="scroll" data-target="#main-navbar">
        <div class="page-loader"></div>  <!-- Display loading image while page loads -->
    	<div class="body">
        
            <!--========== BEGIN HEADER ==========-->
            <header id="header" class="header-main">

                <!-- Begin Navbar -->
                <nav id="main-navbar" class="navbar navbar-default navbar-fixed-top" role="navigation"> <!-- Classes: navbar-default, navbar-inverse, navbar-fixed-top, navbar-fixed-bottom, navbar-transparent. Note: If you use non-transparent navbar, set "height: 98px;" to #header -->
                  <div>
                      <img src="img/head.png" width="100%">
                  </div>  
                  <div class="container">

                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav ">
                            
                            <li><a class="page-scroll" href="header">¿QUE ES EL BANCO DE PROYECTOS?</a></li>
                            <li><a class="page-scroll" href="#">   </a></li>
                            <li><a class="page-scroll" href="#sec_tablero">TABLERO DE PROYECTOS</a></li>
                            <li><a class="page-scroll" href="#">   </a></li>
                            <li><a class="page-scroll" href="#consulta">CONSULTA  </a></li>
                            <li><a class="page-scroll" href="#">   </a></li>
                            <li><a class="page-scroll" href="login">INGRESAR AL SISTEMA</a></li> 
                            <li><a class="page-scroll" href="#">   </a></li>                          
                            
                        </ul>
                    </div><!-- /.navbar-collapse -->
                  </div><!-- /.container -->
                </nav>
                <!-- End Navbar -->

            </header>
            <!-- ========= END HEADER =========-->
            
            
            
            
        	<!-- Begin intro section -->
            
			<section id="text-carousel-intro-section" class="parallax" data-stellar-background-ratio="0.5" style="background-image: url(img/slider-bg.png);">
                <div class="cover"></div>
                    <!-- Begin page header-->
                    <div class="page-header-wrapper">
				
				<div class="container">
                    <div class="page-header text-center wow fadeInDown" data-wow-delay="0.4s">
                    <div style="padding-top: 200px;">
                        <img src="img/Bancoletras.png" width="80%">
                    </div>
                    <div class="caption text-center text-white">
                        <p style="padding: 30px"></p>
                        <p>Es el Sistema Gubernamental que permitirá a los gobiernos municipales, dependencias, organismos y a la ciudadanía organizar de forma sistemática los proyectos propuestos, que servirán de soporte para los procesos de planeación, presupuestación y ejecución de la inversión pública.</p> <br>
                        <p style="padding: 10px">Brindará asistencia y acompañamiento técnico en el proceso para la integración de los expedientes, el Banco de Proyectos permitirá fortalecer las políticas públicas que contribuyan al logro de los objetivos del Plan Estatal de Desarrollo, los Objetivos de Desarrollo Sostenible y las metas por regiones y municipios, para asegurar la asignación eficiente de recursos y la mejora continua de la gestión pública en las diferentes regiones del Estado de Hidalgo.</p>
                        <p style="padding: 50px"></p>
                    </div>
                
                <div id="counter-up-trigger" class="text-white parallax">
                
                    <div class="row">

                            <div class="fact text-center col-md-4 col-sm-6">
                                <div class="fact-inner">
                                    <div class="extra-space-l"></div>
                                    <span class="counter" style="font-size: 250%;">6789</span>
                                    <p style="padding: 20px" class="lead">ANTEPROYECTOS<br>REGISTRADOS</p>
                                </div>
                            </div>

                            <div class="fact text-center col-md-4 col-sm-6">
                                <div class="fact-inner">
                                    <div class="extra-space-l"></div>
                                    <span class="counter" style="font-size: 250%;">850</span>
                                    <p style="padding: 20px" class="lead">PROYECTOS EN PROCESO <br> DE DICTAMEN TÉCNICO</p>
                                </div>
                            </div>

                            <div class="fact text-center col-md-4 col-sm-6">
                                <div class="fact-inner">
                                    <div class="extra-space-l"></div>
                                    <span class="counter" style="font-size: 250%;">85</span>
                                    <p style="padding: 20px" class="lead">PROYECTOS CON<br>DICTAMEN TÉCNICO</p>
                                </div>
                            </div>

                            

                        </div> <!-- /.row -->
					</div>
                   </div> 
				</div> <!-- /.container -->
            </div>


			</section>
			<!-- End intro section -->  
                
                     
            
              
            <!-- Begin Tablero -->
            <section id="sec_tablero" class="page text-center">
                <!-- Begin page header-->
                <div class="page-header-wrapper">
                    <div class="container">
                        <div class="page-header text-center wow fadeInDown" data-wow-delay="0.4s">
                            <div class="col-xs-12">
                                <img src="img/tablero_letras.png" width="100%">
                            </div>
                            
                        </div>
                    </div>
                </div>
                
                <!-- End page header-->
            
                <!-- Begin roatet box-2 -->
                <div class="rotate-box-2-wrapper">
                    <div class="container">
                        <div class="row">
                            <div class="colapse-container">
                                
                                    
                                <div>
                                
                                    <input type="checkbox" class="check-colapse" style="display: block; " id="checkColapse-0001" />
                                    <label for="checkColapse-0001" class="colapse-title"><img src="img/dependencias.png" width="260px"></label>
                                    <div class="colapse-body" name="checkColapse-0001" id="checkColapse-0001">
                                        <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th style="color: #fff; vertical-align: middle; background-color: #691B32">N.</th>
                                                <th style="width: 480px; color: #fff; vertical-align: middle; background-color: #691B32">DEPENDENCIA</th>
                                                <th style="width: 480px; color: #fff; vertical-align: middle; background-color: #691B32">NOMBRE DEL PROYECTO</th>
                                                <!--<th style="visibility: collapse; display: none; color: #fff; vertical-align: middle; background-color: #691B32">NOMBRE DEL PROYECTO</th>		
                                                <th style="width: 220px; color: #fff; vertical-align: middle; background-color: #691B32">SEMÁFORO DE AVANCE</th>
                                                <th style="text-align:center;width:100px; color: #fff; vertical-align: middle; background-color: #691B32">MOSTRAR</th>-->
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                        
                                            
                                            
                                        </tbody>
                                        </table>
                                      
                                    
                                    </div>

                                    <input type="checkbox" class="check-colapse" id="checkColapse-0002" />
                                    <label for="checkColapse-0002" class="colapse-title"><img src="img/organismos.png" width="260px"></label>
                                    
                                    <input type="checkbox" class="check-colapse" id="checkColapse-0003" />
                                    <label for="checkColapse-0003" class="colapse-title"><img src="img/municipios.png" width="260px"></label>
                                    
                                    

                                    <input type="checkbox" class="check-colapse" id="checkColapse-0004" />
                                    <label for="checkColapse-0004" class="colapse-title"><img src="img/ciudadania.png" width="260px"></label>

                                    <div class="colapse-body" style="display: none" id="checkColapse-0002" name="checkColapse-0002"><p>222222</p>
                                    <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th style="color: #fff; vertical-align: middle; background-color: #691B32">N.</th>
                                                <th style="width: 480px; color: #fff; vertical-align: middle; background-color: #691B32">DEPENDENCIA</th>
                                                <th style="width: 480px; color: #fff; vertical-align: middle; background-color: #691B32">NOMBRE DEL PROYECTO</th>
                                                <!--<th style="visibility: collapse; display: none; color: #fff; vertical-align: middle; background-color: #691B32">NOMBRE DEL PROYECTO</th>		
                                                <th style="width: 220px; color: #fff; vertical-align: middle; background-color: #691B32">SEMÁFORO DE AVANCE</th>
                                                <th style="text-align:center;width:100px; color: #fff; vertical-align: middle; background-color: #691B32">MOSTRAR</th> -->
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                        
                                            
                                            
                                        </tbody>
                                        </table>
                                    </div>
                                    <div class="colapse-body" id="checkColapse-0003" name="checkColapse-0003"><p>tres</p>
                                    <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th style="color: #fff; vertical-align: middle; background-color: #691B32">N.</th>
                                                <th style="width: 480px; color: #fff; vertical-align: middle; background-color: #691B32">DEPENDENCIA</th>
                                                <th style="width: 480px; color: #fff; vertical-align: middle; background-color: #691B32">NOMBRE DEL PROYECTO</th>
                                                <!--<th style="visibility: collapse; display: none; color: #fff; vertical-align: middle; background-color: #691B32">NOMBRE DEL PROYECTO</th>		
                                                <th style="width: 220px; color: #fff; vertical-align: middle; background-color: #691B32">SEMÁFORO DE AVANCE</th>
                                                <th style="text-align:center;width:100px; color: #fff; vertical-align: middle; background-color: #691B32">MOSTRAR</th>-->
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                        
                                            
                                            
                                        </tbody>
                                        </table>
                                    </div>
                                    <div class="colapse-body" id="checkColapse-0004" id="checkColapse-0004" name="checkColapse-0004" ><p>444444</p></div>
                                    
                        

                            </div>
                            
                            
                            
                            </div>
                        </div> <!-- /.row -->
                       
                        
                    </div> <!-- /.container -->
                    
                                          
                </div>
                
                <!-- End rotate-box-2 -->
            </section>
            <!-- End secc -->
            
            <!-- empieza brian -->
            <section id="sec_tablero1" class="parallax" data-stellar-background-ratio="0.6" style="background-image: url(img/bg_tableroproyectos1.png);">
                <div class="cover" style="background-color: rgb(255, 255, 255, 0.65);">
                </div>
                    <!-- Begin page header-->
                <div class="page-header-wrapper">
                
                    <div class="container">
                        <div class="page-header text-center wow fadeInDown" data-wow-delay="0.6s">
                            <div style="padding-top: 200px;">
                                <img src="img/tablero_letras.png" width="80%">
                            </div>
                            <div style="padding-top: 100px;">
                            <br>
                            </div>
                    
                
                            <div id="counter-up-trigger" class="text-white parallax">
                
                                    <div class="row">

                                        <div class="fact text-center col-md-4 col-sm-6">
                                            <div class="fact-inner" style="position: relative;">
                                                <img src="img/conocemas.png" width="100%">
                                                <img src="img/conocemas_boton.png" width="60%" style="position: absolute; top: 70%; left: 20%;">
                                            </div>
                                        </div>

                                        <div class="fact text-center col-md-4 col-sm-6">
                                            <div class="fact-inner">
                                                
                                            </div>
                                        </div>

                                        <div class="fact text-center col-md-4 col-sm-6">
                                            <div class="fact-inner" style="position: relative;">
                                                <img src="img/cargaproyecto.png" width="100%">
                                                <a href="register">
                                                <img src="img/cargaproyecto_boton.png" width="60%" style="position: absolute; top: 70%; left: 20%;">
                                                </a>
                                            </div>
                                        </div>

                            

                                </div> <!-- /.row -->
                            </div>
                        </div> 
                    </div> <!-- /.container -->
                </div>


            </section>
            <section id="sec_tablero2"  style="padding-top: 4px;">
                <!-- Begin page header-->
                
                        
                           
                            <img src="img/animation.gif" width="100%" loop="infinite">
                            
                            
                        
                    
                
                <!-- End page header-->
            
                
            </section>
            <section id="consulta" class="page text-center" style="padding-top: 95px;">
                
                <!-- Begin page header
                <div class="page-header-wrapper">
                    <div class="container">
                        <div class="page-header text-center wow fadeInDown" data-wow-delay="0.5s">
                            <div class="col-xs-12">
                                <img src="img/consulta.png" width="80%">
                            </div>
                            
                        </div>
                    </div>
                </div>-->
                <!-- End page header-->
            
                <!-- Begin roatet box-2 -->
                
                    <div class="container-map">
                    <iframe class="responsive-iframe" src="mapa"></iframe>

                    </div> <!-- /.container -->
                    
                                          
                
                <!-- End rotate-box-2 -->
            </section>

            <!-- login -->
            
          <!-- End cta -->
            <!--termina brian --> 
                      
               
             
                
            <!-- Begin footer -->
           
            <!-- End footer -->

            <a href="" class="scrolltotop"><i class="fa fa-arrow-up"></i></a> <!-- Scroll to top button -->
                                              
        </div><!-- body ends -->
        
        
        
        
        <!-- Plugins JS -->
		<script src="inc/jquery/jquery-1.11.1.min.js"></script>
		<script src="inc/bootstrap/js/bootstrap.min.js"></script>
		<script src="inc/owl-carousel/js/owl.carousel.min.js"></script>
		<script src="inc/stellar/js/jquery.stellar.min.js"></script>
		<script src="inc/animations/js/wow.min.js"></script>
        <script src="inc/waypoints.min.js"></script>
		<script src="inc/isotope.pkgd.min.js"></script>
		<script src="inc/classie.js"></script>
		<script src="inc/jquery.easing.min.js"></script>
		<script src="inc/jquery.counterup.min.js"></script>
		<script src="inc/smoothscroll.js"></script>

		<!-- Theme JS -->
		<script src="js/theme.js"></script>
        

    </body>
</html>
