<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SEPH</title>
    <!-- Favico -->
    <link rel="icon" type="image/png" sizes="16x16" href="https://cdn.seph.gob.mx/img/favicon-16x16.png">
    <!-- Bootstrap 5.3 -->
    <link rel="stylesheet" href="https://cdn.seph.gob.mx/css/custom.css">
    <!-- plantilla css -->
    <link rel="stylesheet" href="vistas/css/plantilla.css">
    <!-- Fuente Institucional -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- ======================================
    ARCHIVOS JS
    ======================================= -->
    <script src="https://code.jquery.com/jquery-3.6.4.slim.min.js" integrity="sha256-a2yjHM4jnF9f54xUQakjZGaqYs/V1CYvWpoqZzC2/Bw=" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <!-- FontAwesome -->
    <script src="https://kit.fontawesome.com/9d2d963b9c.js" crossorigin="anonymous"></script>
    <!-- Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-PTWKQKEW9M"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-PTWKQKEW9M');
    </script>
</head>

<body class="veda-electoral" style="font-family: 'Futura-Book-font', sans-serif;">

    <!-- Contenido -->

    <header class="sticky-top">

    <!-- ======================================
    NOMBRE DE LA SECRETARÍA
    ======================================= -->
    <section class="py-4 px-4 header-gobierno">
        <div class="container-fluid navbar-expand-sm">
            <div class="row">

                <!-- ======================================
                IMAGEN DEL GOBIERNO DEL ESTADO DE HIDALGO
                ======================================= -->
                <div class="col-sm-12 col-md-4 ">
                    <img class="d-none d-sm-block" src="https://cdn.seph.gob.mx/img/HidalgoGobMx250x30.svg" alt="logo hidalgo.gob.mx">
                    <!-- Menu solo celular -->
                    <img class="d-block d-sm-none mx-auto" data-bs-toggle="collapse" data-bs-target="#menuGobierno" aria-controls="menuGobierno" aria-expanded="false" aria-label="Toggle navigation" src="https://cdn.seph.gob.mx/img/HidalgoGobMx250x30.svg" alt="logo hidalgo.gob.mx">
                </div>

                <!-- ======================================
                MENU GOBIERNO DEL ESTADO DE HIDALGO
                ======================================= -->
                <div class="col-sm-12 col-md-8 collapse navbar-collapse justify-content-end" id="menuGobierno">
                    <ul class="nav justify-content-end">
                        <li class="nav-item">
                            <a class="nav-link active" href="#" data-bs-toggle="dropdown">GOBIERNO</a>
                            <!-- Drop Menu Gobierno-->
                            <ul class="dropdown-menu dropdown-menu-lg-end menu-gobierno">
                                <div class="container">
                                    <div class="row">
                                        <div class="col px-2"><a href="https://gobierno.hidalgo.gob.mx/gobernador" target="_blank">Gobernador</a></div>
                                        <div class="col px-2"><a href="https://gobierno.hidalgo.gob.mx/dependencias" target="_blank">Dependencias estatales</a></div>
                                        <div class="col px-2"><a href="https://gobierno.hidalgo.gob.mx/dependenciasfederales" target="_blank">Dependencias federales</a></div>
                                    </div>
                                    <div class="row pt-4">
                                        <div class="col px-2"> <a href="https://gobierno.hidalgo.gob.mx/gabinete" target="_blank">Gabinete</a></div>
                                        <div class="col px-2"> <a href="https://periodico.hidalgo.gob.mx/" target="_blank">Periódico oficial</a></div>
                                        <div class="col"></div>
                                    </div>
                                </div>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" data-bs-toggle="dropdown">TRÁMITES</a>
                            <!-- Drop Menu Tramites -->
                            <ul class="dropdown-menu dropdown-menu-lg-end menu-gobierno">
                                <div class="container">
                                    <div class="row">
                                        <div class="col px-2"><a href="https://ruts.hidalgo.gob.mx/" target="_blank">Trámites y servicios</a></div>
                                        <div class="col px-2"><a href="https://ruts.hidalgo.gob.mx/servicios" target="_blank">Más servicios</a></div>
                                        <div class="col px-2"><a href="https://ruts-admin.hidalgo.gob.mx/" target="_blank">Administración</a></div>
                                    </div>
                                </div>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" data-bs-toggle="dropdown">TRANSPARENCIA</a>
                            <!-- Drop Menu Transparencia -->
                            <ul class="dropdown-menu dropdown-menu-lg-end menu-gobierno">
                                <div class="container">
                                    <div class="row">
                                        <div class="col px-2"><a href="http://transparencia.hidalgo.gob.mx/" target="_blank">Art. 69 Ley de Transparencia</a></div>
                                        <div class="col px-2"><a href="https://consultapublicamx.plataformadetransparencia.org.mx/vut-web/faces/view/consultaPublica.xhtml#inicio" target="_blank">Plataforma Nacional de Transparencia</a></div>
                                        <div class="col px-2"><a href="http://transparencia.hidalgo.gob.mx/pag/transparenciaFinanciera.html" target="_blank">Transparencia Financiera</a></div>
                                    </div>
                                    <div class="row pt-4">
                                        <div class="col px-2"><a href="http://transparencia.hidalgo.gob.mx/pag/acc_imfo.html" target="_blank">Acceso a la información</a></div>
                                        <div class="col px-2"><a href="http://transparencia.hidalgo.gob.mx/pag/historica21.html" target="_blank">Histórica (Art. 22)</a></div>
                                        <div class="col px-2"><a href="http://transparencia.hidalgo.gob.mx/pag/part_ciudadana.html" target="_blank">Participación Ciudadana</a></div>
                                    </div>
                                </div>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="https://finanzas.hidalgo.gob.mx/TRANSPARENCIAFINANZAS/VentanillaCiudadana#" target="_blank">PAGOS</a>
                        </li>
                    </ul>
                </div>
                <!-- Fin Menu Gobierno del estado -->
            </div>
        </div>
    </section><!-- ======================================
    NOMBRE DE LA SECRETARÍA
    ======================================= -->
    <section class="py-3 bg-primary" style="padding-left: 2%;">
        <div class="container-fluid navbar-expand-sm">
            <div class="row">
                <div class="col-sm-12 col-md-4">
                    <a href="inicio">
                        <h5 class="d-none d-sm-block" style="color: #ffffff; padding-top: 1%;">
                            Secretaría de Educación Pública                        </h5>
                    </a>
                    <!-- Menu Movil secretaría-->
                    <h5 class="d-block d-sm-none text-center" style="color: #ffffff; padding-top: 1%;" data-bs-toggle="collapse" data-bs-target="#menuSEPH" aria-controls="menuSEPH" aria-expanded="false" aria-label="Toggle navigation">Secretaría de Educación Pública</h5>
                </div>
                <!-- ======================================
                MENU DE LA SECRETARÍA
                ======================================= -->
                <div class="col-sm-12 col-md-8 collapse navbar-collapse justify-content-end" id="menuSEPH">
                    <ul class="nav justify-content-end ">
                        <li class="nav-item">
                            <a class="nav-link active menu-secretaria" href="inicio">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active menu-secretaria" href="https://ihe.hidalgo.gob.mx" target="_blank">IHE</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active menu-secretaria" href="transparencia">Transparencia</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active menu-secretaria" href="vistas/archivos/directorio/Directorio_SEPH.pdf" target="_blank">Directorio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active menu-secretaria" href="https://mitrabajotransforma.hidalgo.gob.mx" target="_blank">Mi Trabajo Transforma</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Programa Sectorial                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item" href="vistas/archivos/programa-sectorial-de-desarrollo-educacion-2023-2028.pdf">
                                        Programa Sectorial de Desarrollo de Educación 2023-2028                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active menu-secretaria" href="tramites-y-servicios">Trámites y servicios</a>
                        </li>
                        <li class="nav-item">
                        <form action="/index.php" method="get">
                            <select name="lang" class="form-select" onchange="this.form.submit()">
                                <option value="es" selected>Español</option>
                                <option value="na" >Nahuatl</option>
                                <option value="nu" >Hñähñu</option>
                                <option value="te" >Tepehua</option>
                            </select>
                        </form>
                        </li>
                        <!-- fin Ejemplo dropdown -->
                    </ul>
                </div>
                <!-- Fin Menu SEPH-->
            </div>
        </div>
    </section>
</header><div id="comunicadosPrincipal" class="carousel slide carousel-fade" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#comunicadosPrincipal" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#comunicadosPrincipal" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#comunicadosPrincipal" data-bs-slide-to="2" aria-label="Slide 3"></button>
    <button type="button" data-bs-target="#comunicadosPrincipal" data-bs-slide-to="3" aria-label="Slide 4"></button>
    <button type="button" data-bs-target="#comunicadosPrincipal" data-bs-slide-to="4" aria-label="Slide 5"></button>
  </div>
  <div class="carousel-inner">
    
        <div class="carousel-item active" data-bs-interval="8000">
          <img src="vistas/images/slider-principal/El Viejo y la Mar_Banner_prin.jpg" class="d-block w-100" alt="Slider Principal">
          <div class="carousel-caption">
            <a href="vistas/archivos/convocatorias/CONVOCATORIA CONCURSO NACIONAL LITERARIO_MEMORIAS DE EL VIEJO Y LA MAR.2024.pdf" class="btn btn-primary btn-sm"><i class="fa-solid fa-link fa-fw"></i> CONSULTAR </a>
          </div>
        </div>
        
        <div class="carousel-item " data-bs-interval="8000">
          <img src="vistas/images/slider-principal/Estímulos por antigüedad_prin.jpg" class="d-block w-100" alt="Slider Principal">
          <div class="carousel-caption">
            <a href="http://redpersonalihe.seph.gob.mx/estimulos/" class="btn btn-primary btn-sm"><i class="fa-solid fa-link fa-fw"></i> CONSULTAR </a>
          </div>
        </div>
        
        <div class="carousel-item " data-bs-interval="8000">
          <img src="vistas/images/slider-principal/Promocion Por niveles_prin.jpg" class="d-block w-100" alt="Slider Principal">
          <div class="carousel-caption">
            <a href="index.php?ruta=convocatorias/promocionNiveles" class="btn btn-primary btn-sm"><i class="fa-solid fa-link fa-fw"></i> CONSULTAR </a>
          </div>
        </div>
        
        <div class="carousel-item " data-bs-interval="8000">
          <img src="vistas/images/slider-principal/Banner igualdad_prin.jpg" class="d-block w-100" alt="Slider Principal">
          <div class="carousel-caption">
            <a href="https://uiimh.seph.gob.mx/" class="btn btn-primary btn-sm"><i class="fa-solid fa-link fa-fw"></i> CONSULTAR </a>
          </div>
        </div>
        
        <div class="carousel-item " data-bs-interval="8000">
          <img src="vistas/images/slider-principal/Cambios y permutas_prin.jpg" class="d-block w-100" alt="Slider Principal">
          <div class="carousel-caption">
            <a href="index.php?ruta=convocatorias/procesoCambios-permutas" class="btn btn-primary btn-sm"><i class="fa-solid fa-link fa-fw"></i> CONSULTAR </a>
          </div>
        </div>
            

  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#comunicadosPrincipal" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#comunicadosPrincipal" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
<!-- =====================================
    SECCIONES
====================================== -->
<section class="padding-8">
    <div class="container">
        <div class="row">
            <div class="col-md-4 p-2">
                <div class="card" style="min-height: 176px;">
                    <div class="card-body">
                        <h5 class="card-title text-primary" style="font-weight: 700;">Padres y Alumnos <br></h5>
                        <span class="small text-primary h6">(Instituto Hidalguense de Educación)</span>
                        <p class="card-text small">Aquí podrán encontrar información de utilidad para el seguimiento en el desarrollo académico de sus hijos.</p>
                        <a href="padres-alumnos" class="btn btn-primary btn-sm">CONSULTAR</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 p-2">
            <div class="card" style="min-height: 176px;">
                    <div class="card-body">
                        <h5 class="card-title text-primary" style="font-weight: 700;">Docentes</h5>
                        <span class="small text-primary h6">(Instituto Hidalguense de Educación)</span>
                        <p class="card-text small">Aquí podrán encontrar información de utilidad para su formación y aprendizaje.</p>
                        <a href="docentes" class="btn btn-primary btn-sm">CONSULTAR</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 p-2">
                <div class="card" style="min-height: 176px;">
                    <div class="card-body">
                        <h5 class="card-title text-primary" style="font-weight: 700;">INTRASEPH</h5>
                        <p class="card-text small">Aquí podrán encontrar enlace a los diferentes sistemas del SEPH.</p>
                        <a href="intraseph" class="btn btn-primary btn-sm">CONSULTAR</a>
                        <a href="correo-institucional" target="_blank" class="btn btn-outline-primary btn-sm">CORREO <i class="fa-solid fa-envelopes-bulk fa-fw"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row pt-5">
            <div class="col-md-4 p-2">
                <div class="card mb-3" style="min-height: 165px;">
                    <div class="row g-0">
                        <div class="col-md-3 d-none d-sm-block text-center">
                            <img src="vistas/images/icons/icono-educacion-basica.svg" height= "95px" class="pt-3" alt="icono Educación Basica">
                        </div>
                        <div class="col-md-9">
                            <div class="card-body">
                                <p class="card-title text-primary" style="font-weight: 700;">EDUCACIÓN BÁSICA</p>
                                <p>
                                    <ul class="">
                                        <li><a class="text-decoration-none" href="https://calendarioescolar.sep.gob.mx" target="_blank">Calendario escolar</a></li>
                                    </ul>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 p-2">
            <div class="card mb-3" style="min-height: 165px;">
                    <div class="row g-0">
                        <div class="col-md-3 d-none d-sm-block text-center">
                            <img src="vistas/images/icons/icono-educacion-media-superior.svg" height= "95px" class="pt-3" alt="icono Educación Media Superior">
                        </div>
                        <div class="col-md-9">
                            <div class="card-body">
                                <p class="card-title text-primary" style="font-weight: 700;">EDUCACIÓN MEDIA SUPERIOR</p>
                                <p>
                                    <ul class="">
                                        <li>
                                            <a class="text-decoration-none"  target="_blank">Instituciones</a>
                                        </li>
                                        <li>
                                            <a class="text-decoration-none" href="https://sirvoems.sep.gob.mx/sirvoems/RedirectCustomCNT;jsessionid=e7336752acfb5c14f0e060d7a7d6?method=index" target="_blank">
                                                Validez oficial de una institución                                            </a>
                                        </li>
                                        <li>
                                            <a class="text-decoration-none" href="http://profesiones.seph.gob.mx/" target="_blank">
                                                Profesiones
                                            </a>
                                        </li>
                                    </ul>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 p-2">
            <div class="card mb-3">
                    <div class="row g-0">
                        <div class="col-md-3 d-none d-sm-block text-center">
                            <img src="vistas/images/icons/icono-educacion-superior.svg" height= "95px" class="pt-3" alt="icono Educación Superior">
                        </div>
                        <div class="col-md-9">
                            <div class="card-body">
                                <p class="card-title text-primary" style="font-weight: 700;">EDUCACIÓN SUPERIOR</p>
                                <p>
                                    <ul class="">
                                        <li><a class="text-decoration-none" target="_blank">Instituciones</a></li>
                                        <li>
                                            <a class="text-decoration-none" href="https://www.gob.mx/sep/acciones-y-programas/reconocimiento-de-validez-oficial-de-estudios-rvoe" target="_blank">
                                                Validez oficial de una institución                                            </a>
                                        </li>
                                    </ul>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- =====================================
    CONVOCATORIAS
====================================== -->
<section class="padding-4 bg-light">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 text-center">
                <p class="fs-1 text-primary" style="font-weight: 700;">
                    Convocatorias y Comunicados                </p>
                <p>
                    <a href="convocatorias" class="btn btn-primary">Todas las Convocatorias</a>
                </p>
            </div>

        </div>
        <div class="row">
            <div class="offset-md-2 col-md-8">
                <div class="shadow mb-2 bg-body-tertiary rounded">
                    <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            
                                    <div class="carousel-item active" data-bs-interval="8000">
                                        <img src="vistas/images/convocatorias-programas/Estímulos por antigüedad.jpg" class="d-block w-100" alt="...">
                                        <div class="carousel-caption d-md-block">
                                            <a href="http://redpersonalihe.seph.gob.mx/estimulos/" class="btn btn-primary"><i class="fa-solid fa-link"></i> CONSULTAR</a>
                                        </div>
                                    </div>
                                    
                                    <div class="carousel-item " data-bs-interval="8000">
                                        <img src="vistas/images/convocatorias-programas/Banner lectura y escritura.jpg" class="d-block w-100" alt="...">
                                        <div class="carousel-caption d-md-block">
                                            <a href="vistas/archivos/convocatorias/Banner 2° Kilometro del libro.jpg" class="btn btn-primary"><i class="fa-solid fa-link"></i> CONSULTAR</a>
                                        </div>
                                    </div>
                                    
                                    <div class="carousel-item " data-bs-interval="8000">
                                        <img src="vistas/images/convocatorias-programas/banner_seminariosMujer.png" class="d-block w-100" alt="...">
                                        <div class="carousel-caption d-md-block">
                                            <a href="index.php?ruta=convocatorias/seminariosMujer" class="btn btn-primary"><i class="fa-solid fa-link"></i> CONSULTAR</a>
                                        </div>
                                    </div>
                                    
                                    <div class="carousel-item " data-bs-interval="8000">
                                        <img src="vistas/images/convocatorias-programas/banner_ket.jpeg" class="d-block w-100" alt="...">
                                        <div class="carousel-caption d-md-block">
                                            <a href="vistas/archivos/convocatorias/convocatoria_ket.jpeg" class="btn btn-primary"><i class="fa-solid fa-link"></i> CONSULTAR</a>
                                        </div>
                                    </div>
                                    
                                    <div class="carousel-item " data-bs-interval="8000">
                                        <img src="vistas/images/convocatorias-programas/Cambios y permutas.jpg" class="d-block w-100" alt="...">
                                        <div class="carousel-caption d-md-block">
                                            <a href="index.php?ruta=convocatorias/procesoCambios-permutas" class="btn btn-primary"><i class="fa-solid fa-link"></i> CONSULTAR</a>
                                        </div>
                                    </div>
                                    
                                    <div class="carousel-item " data-bs-interval="8000">
                                        <img src="vistas/images/convocatorias-programas/BannerProcesoReconoci.jpg" class="d-block w-100" alt="...">
                                        <div class="carousel-caption d-md-block">
                                            <a href="index.php?ruta=convocatorias/procesos-reconocimiento" class="btn btn-primary"><i class="fa-solid fa-link"></i> CONSULTAR</a>
                                        </div>
                                    </div>
                                    
                                    <div class="carousel-item " data-bs-interval="8000">
                                        <img src="vistas/images/convocatorias-programas/banner_trazos.jpg" class="d-block w-100" alt="...">
                                        <div class="carousel-caption d-md-block">
                                            <a href="vistas/archivos/convocatorias/BASES TRAZOS FINANCIEROS.pdf" class="btn btn-primary"><i class="fa-solid fa-link"></i> CONSULTAR</a>
                                        </div>
                                    </div>
                                    
                                    <div class="carousel-item " data-bs-interval="8000">
                                        <img src="vistas/images/convocatorias-programas/bannerSalud.png" class="d-block w-100" alt="...">
                                        <div class="carousel-caption d-md-block">
                                            <a href="https://www.facebook.com/aprende.mx.dg" class="btn btn-primary"><i class="fa-solid fa-link"></i> CONSULTAR</a>
                                        </div>
                                    </div>
                                    
                                    <div class="carousel-item " data-bs-interval="8000">
                                        <img src="vistas/images/convocatorias-programas/banner revista.png" class="d-block w-100" alt="...">
                                        <div class="carousel-caption d-md-block">
                                            <a href="vistas/archivos/convocatorias/Convocatoria_Rerne3.pdf" class="btn btn-primary"><i class="fa-solid fa-link"></i> CONSULTAR</a>
                                        </div>
                                    </div>
                                    
                                    <div class="carousel-item " data-bs-interval="8000">
                                        <img src="vistas/images/convocatorias-programas/Promocion Por niveles.jpg" class="d-block w-100" alt="...">
                                        <div class="carousel-caption d-md-block">
                                            <a href="index.php?ruta=convocatorias/promocionNiveles" class="btn btn-primary"><i class="fa-solid fa-link"></i> CONSULTAR</a>
                                        </div>
                                    </div>
                                    
                                    <div class="carousel-item " data-bs-interval="8000">
                                        <img src="vistas/images/convocatorias-programas/El Viejo y la Mar_Banner.jpg" class="d-block w-100" alt="...">
                                        <div class="carousel-caption d-md-block">
                                            <a href="vistas/archivos/convocatorias/CONVOCATORIA CONCURSO NACIONAL LITERARIO_MEMORIAS DE EL VIEJO Y LA MAR.2024.pdf" class="btn btn-primary"><i class="fa-solid fa-link"></i> CONSULTAR</a>
                                        </div>
                                    </div>
                                    
                                    <div class="carousel-item " data-bs-interval="8000">
                                        <img src="vistas/images/convocatorias-programas/bqannerOLIMPIADA_2024.png" class="d-block w-100" alt="...">
                                        <div class="carousel-caption d-md-block">
                                            <a href="index.php?ruta=convocatorias/omi2024-registro" class="btn btn-primary"><i class="fa-solid fa-link"></i> CONSULTAR</a>
                                        </div>
                                    </div>
                                    
                                    <div class="carousel-item " data-bs-interval="8000">
                                        <img src="vistas/images/convocatorias-programas/reconocimiento.jpeg" class="d-block w-100" alt="...">
                                        <div class="carousel-caption d-md-block">
                                            <a href="http://usicamm.sep.gob.mx/#/convocatorias" class="btn btn-primary"><i class="fa-solid fa-link"></i> CONSULTAR</a>
                                        </div>
                                    </div>
                                    
                                    <div class="carousel-item " data-bs-interval="8000">
                                        <img src="vistas/images/convocatorias-programas/banner_TecnologiaPlan.png" class="d-block w-100" alt="...">
                                        <div class="carousel-caption d-md-block">
                                            <a href="https://aprende.gob.mx/renovacion-teleplanteles/" class="btn btn-primary"><i class="fa-solid fa-link"></i> CONSULTAR</a>
                                        </div>
                                    </div>
                                    
                                    <div class="carousel-item " data-bs-interval="8000">
                                        <img src="vistas/images/convocatorias-programas/Banner_Programa_Sectorial.png" class="d-block w-100" alt="...">
                                        <div class="carousel-caption d-md-block">
                                            <a href="vistas/archivos/programa-sectorial-de-desarrollo-educacion-2023-2028.pdf" class="btn btn-primary"><i class="fa-solid fa-link"></i> CONSULTAR</a>
                                        </div>
                                    </div>
                                    
                                    <div class="carousel-item " data-bs-interval="8000">
                                        <img src="vistas/images/convocatorias-programas/Banner_BECA_COMISION.png" class="d-block w-100" alt="...">
                                        <div class="carousel-caption d-md-block">
                                            <a href="vistas/archivos/convocatorias/CONVOCATORIA_BECA_COMISION.pdf" class="btn btn-primary"><i class="fa-solid fa-link"></i> CONSULTAR</a>
                                        </div>
                                    </div>
                                    
                                    <div class="carousel-item " data-bs-interval="8000">
                                        <img src="vistas/images/convocatorias-programas/Banner igualdad.jpg" class="d-block w-100" alt="...">
                                        <div class="carousel-caption d-md-block">
                                            <a href="https://uiimh.seph.gob.mx/" class="btn btn-primary"><i class="fa-solid fa-link"></i> CONSULTAR</a>
                                        </div>
                                    </div>
                                    
                                    <div class="carousel-item " data-bs-interval="8000">
                                        <img src="vistas/images/convocatorias-programas/banner_resulMexe.png" class="d-block w-100" alt="...">
                                        <div class="carousel-caption d-md-block">
                                            <a href="vistas/archivos/convocatorias/Oficio Mexe plantilla 2024 Resultados.pdf" class="btn btn-primary"><i class="fa-solid fa-link"></i> CONSULTAR</a>
                                        </div>
                                    </div>
                                                            </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- =====================================
    PROGRAMAS
====================================== -->
<section class="padding-4">
    <div class="container">
        <div class="row py-4 text-center">
            <div class="col-md-12">
                <h3 class="text-primary" style="font-weight: 700;">PROGRAMAS</h3>
            </div>
        </div>
        <div class="row pt-5 small text-center">
            <div class="col-md-2 col-12">
                <a href="http://becasparalatransformacion.seph.gob.mx" target="_blank">
                    <img src="vistas/images/programas/programa-becas.svg" alt="Becas para la transformación">
                </a>
                <p class="small pt-3 text-secondary">BECAS PARA LA TRANSFORMACIÓN</p>
                <p class="small text-primary">SEPH</p>
            </div>
            <div class="col-md-2 col-12">
                <a href="http://siee.seph.gob.mx/becas_23_24_2doperiodo/" target="_blank">
                    <img src="vistas/images/programas/becas-edu-basic.svg" height= "60px" alt="Becas de Educación Básica">
                </a>
                <p class="small pt-2 text-secondary">BECAS DE EDUCACIÓN BÁSICA</p>
                <p class="small pt-3 text-primary">(Instituto Hidalguense de Educación)</p>
            </div>
            <div class="col-md-2 col-6">
                <a href="https://repaeve.seph.gob.mx" target="_blank">
                    <img src="vistas/images/programas/programas-call-center.svg" height= "60px" alt="Call Center">
                </a>
                <p class="small pt-2 text-secondary">Centro de Atención Telefónica - ¡Actúa Ya!</p>
                <p class="small text-primary">SEPH - (Instituto Hidalguense de Educación)</p>
            </div>
            <div class="col-md-2 col-6">
                <!-- <a href="https://servicioprofesionaldocente.seph.gob.mx" target="_blank"> -->
                <a target="_blank">
                    <img src="vistas/images/programas/programas-spd.svg" height= "60px" alt="Servicio Profesional Docente">
                </a>
                <p class="small pt-2 text-secondary">SERVICIO PROFESIONAL DOCENTE</p>
                <p class="small text-primary">(Instituto Hidalguense de Educación)</p>
            </div>
            <div class="col-md-2 col-12">
                <a target="_blank">
                    <img src="vistas/images/programas/programas-biblioteca.svg" height= "60px" alt="Biblioteca Digital">
                </a>
                <p class="small pt-2 text-secondary">BIBLIOTECA DIGITAL DE CIENCIA Y TECNOLOGÍA</p>
                <p class="small text-primary">SEPH - (Instituto Hidalguense de Educación)</p>
            </div>
            <div class="col-md-2 col-12">
                <a href="https://dgfortalecimientoeducativo.seph.gob.mx" target="_blank">
                    <img src="vistas/images/programas/programas-dgfe.svg" height= "60px" alt="Dirección General de Fortalecimiento Educativo">
                </a>
                <p class="small pt-2 text-secondary">DIRECCIÓN GENERAL DE FORTALECIMIENTO EDUCATIVO</p>
                <p class="small text-primary">(Instituto Hidalguense de Educación)</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <a href="programas" class="btn btn-primary">
                    Todos los Programas <i class="fa-solid fa-angles-right fa-fw"></i>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- =====================================
    ORGANISMOS PÚBLICOS DESCENTRALIZADOS
====================================== -->
<section class="padding-4">
    <div class="container">
        <div class="row pb-4 text-center">
            <div class="col-md-12">
                <h3 class="text-primary" style="font-weight: 700;">ORGANISMOS PÚBLICOS DESCENTRALIZADOS</h3>
            </div>
        </div>
        <div class="row pt-5 small text-center">
            <div class="col-md-2 col-6">
                <a href="https://unideh.edu.mx" target="_blank">
                    <img src="vistas/images/organismos/organismos-unideh.svg" height= "75px" alt="Universidad Digital">
                </a>
                <p class="small pt-2 text-secondary">UNIVERSIDAD DIGITAL DEL ESTADO DE HIDALGO</p>
            </div>
            <div class="col-md-2 col-6">
                <a href="http://www.upmetropolitana.edu.mx" target="_blank">
                    <img src="vistas/images/organismos/organismos-upmh.svg" height= "75px" alt="El Colegio del Estado de Hidalgo">
                </a>
                <p class="small pt-2 text-secondary">UNIVERSIDAD POLITÉCNICA METROPOLITANA DE HIDALGO</p>
            </div>
            <div class="col-md-2 col-6">
                <a href="https://www.uttt.edu.mx" target="_blank">
                    <img src="vistas/images/organismos/organismos-uttt.svg" height= "75px" alt="El Colegio del Estado de Hidalgo">
                </a>
                <p class="small pt-2 text-secondary">UNIVERSIDAD TECNOLÓGICA DE TULA-TEPEJI</p>
            </div>
            <div class="col-md-3 col-6">
                <a href="https://www.bachillerato-hgo.edu.mx" target="_blank">
                    <img src="vistas/images/organismos/organismos-beh.svg" alt="El Colegio del Estado de Hidalgo">
                </a>
                <p class="small pt-4 text-secondary pt-2">BACHILLERATO DEL ESTADO DE HIDALGO</p>
            </div>
            <div class="col-md-2 col-6">
                <a href="http://ihea.hidalgo.gob.mx" target="_blank">
                    <img src="vistas/images/organismos/organismos-ihea.svg" height= "75px" alt="Radio y Televisión de Hidalgo">
                </a>
                <p class="small pt-2 text-secondary">INSTITUTO HIDALGUENSE DE EDUCACIÓN PARA ADULTOS</p>
            </div>
            <!-- 
            <div class="col-md-1 col-6">
                <a href="http://www.museoelrehilete.org.mx" target="_blank">
                    <img src="vistas/images/organismos/organismos-rehilete.svg" height="75px" alt="El Colegio del Estado de Hidalgo">
                </a>
                <p class="small pt-2 text-secondary">EL REHILETE</p>
            </div>
            -->
        </div>
        <div class="row">
            <div class="col-md-12">
                <p>
                    <a href="organismos-publicos-descentralizados" class="btn btn-primary">
                         Organismos Públicos <i class="fa-solid fa-angles-right fa-fw"></i>
                    </a>
                </p>
            </div>
        </div>
    </div>
</section>


<!-- =====================================
    EVALUACIÓN Y MONITOREO A PROGRAMAS
====================================== -->
<section class="padding-6 bg-primary text-white">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <p class="fs-1" class="text-primary" style="font-weight: 700;">Evaluación y Monitoreo a Programas</p>
                <p>
                    <a href="evaluacion-monitoreo" class="btn btn-light">CONSULTAR <i class="fa-solid fa-angles-right fa-fw"></i></a>
                </p>
            </div>
        </div>
    </div>
</section>


<!-- =====================================
    COMUNICACIÓN SOCIAL
====================================== -->
<section class="padding-4">
    <div class="container">
        <div class="row pb-5 text-center">
            <div class="col-md-12">
                <h3 class="text-primary" style="font-weight: 700;">COMUNICACIÓN SOCIAL</h3>
            </div>
        </div>
        <div class="row">
        <div class="col-md-4">
            <iframe style="border-radius:12px" src="https://open.spotify.com/embed/show/2Eao9GD1Vbaxbbww47ZhlZ?utm_source=generator" width="100%" height="352" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"></iframe>
            </div>
            <div class="col-md-4">
            <div id="fb-root"></div>
                <script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v17.0" nonce="e427irLn"></script>
                <div class="fb-page" data-href="https://www.facebook.com/SecretariaDeEducacionPublicaHidalgo/" data-tabs="timeline" data-height="550" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true" style="width: 100%;"><blockquote cite="https://www.facebook.com/SecretariaDeEducacionPublicaHidalgo/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/SecretariaDeEducacionPublicaHidalgo/">Secretaría de Educación Pública de Hidalgo</a></blockquote>
                </div>

            </div>
            <div class="col-md-4" style="max-height: 550px; overflow-y: auto;">
                <a class="twitter-timeline" href="https://twitter.com/SEPHidalgo?ref_src=twsrc%5Etfw">Tweets by SEPHidalgo</a>
                <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
            </div>
        </div>
    </div>
</section>

<!-- =====================================
    EVENTOS RECIENTES
====================================== -->
<section class="padding-4">
    <div class="container">
        <div class="row pb-5 text-center">
            <div class="col-md-12">
                <h3 class="text-primary" style="font-weight: 700;">EVENTOS RECIENTES</h3>
            </div>
        </div>
        <div class="row">
            
                    <div class="col-md-4">
                        <div class="card card-noticia mb-3" style="">
                            <img src="vistas/images/eventos-recientes/ZonaEscolar47.png" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title text-primary">Zona escolar 47 de Tepeji del Río presentó exposición de proyectos</h5>
                            <h6 class="card-subtitle mb-2 text-body-secondary">06/03/2024</h6>
                            <p class="card-text small text-justify">Con la finalidad de promover el trabajo que realizan las y los alumnos en el aula, la comunidad educativa de la zona escolar 47 del municipio de Tepeji del Río, del nivel de Educación Primaria General, realizó un encuentro denominado Exposición de Proyectos Escolares.</p>
                            <a href="https://www.facebook.com/SecretariaDeEducacionPublicaHidalgo" class="btn btn-outline-primary btn-sm">Continuar Leyendo</a>
                        </div>
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="card card-noticia mb-3" style="">
                            <img src="vistas/images/eventos-recientes/AutoridadesLuisiana.png" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title text-primary">Autoridades educativas de Luisiana, EE.UU., realizarán entrevistas a docentes hidalguenses</h5>
                            <h6 class="card-subtitle mb-2 text-body-secondary">06/03/2024</h6>
                            <p class="card-text small text-justify">La Secretaría de Educación Pública de Hidalgo (SEPH) recibió a las autoridades educativas del estado de Luisiana, EE. UU., quienes realizarán las entrevistas a 16 maestras y 7 maestros que laboran en escuelas de educación básica, a fin de seleccionar a los participantes del programa de maestros de español como segunda lengua, así como en el de inmersión al idioma español para el Ciclo Escolar 2024-2025, derivado del Convenio de Colaboración Educativa y Cultural SEPH-Luisiana.</p>
                            <a href="https://www.facebook.com/SecretariaDeEducacionPublicaHidalgo" class="btn btn-outline-primary btn-sm">Continuar Leyendo</a>
                        </div>
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="card card-noticia mb-3" style="">
                            <img src="vistas/images/eventos-recientes/ITSOE.png" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title text-primary">ITESHU participó en el 2° Simposio Nacional de Cuerpos Académicos de Arquitectura, Sustentabilidad y Ciudad</h5>
                            <h6 class="card-subtitle mb-2 text-body-secondary">05/03/2024</h6>
                            <p class="card-text small text-justify">Con el objetivo de fortalecer las competencias académicas y de investigación del Instituto Tecnológico Superior de Huichapan (ITESHU), docentes de esa casa de estudios, participaron en el 2° Simposio Nacional de Cuerpos Académicos en Temas de Arquitectura, Sustentabilidad y Ciudad del Tecnológico Nacional de México.</p>
                            <a href="https://www.facebook.com/SecretariaDeEducacionPublicaHidalgo" class="btn btn-outline-primary btn-sm">Continuar Leyendo</a>
                        </div>
                        </div>
                    </div>
                            </div>
    </div>
</section>
<!-- =====================================
    TITULAR DE LA SECRETARÍA
====================================== -->
<section class="py-5">
    <div class="container">
        <div class="row pb-5">
            <div class="col-md-12">
                <h3 class="text-primary" style="font-weight: 700;">TITULAR DE LA SECRETARÍA</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 text-center">
                <img src="https://cdn.seph.gob.mx/funcionario/foto-natividad-castrejon.jpg" class="img-circle" alt="Secretario">
            </div>
            <div class="col-md-8 pt-2">
                <h3 class="text-primary"><b>Dr. Natividad Castrejón Valdez</b></h3>
                <h4 style="color: #b2b1b1">Secretario</h4>
                <p class="d-none" style="text-align: justify;">
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dolore veniam quisquam voluptates cum consectetur vero ipsum quibusdam autem expedita, sequi quam quo facilis modi recusandae repellat aspernatur vitae.
                </p>
                <p>
                    <a href="agenda" class="btn btn-outline-primary btn-small">Conoce la agenda del secretario</a>
                    <a href="https://www.facebook.com/natycastrejonvaldez" target="_blank" class="btn btn-outline-primary btn-small"><i class="fa-brands fa-facebook-f fa-fw"></i></a>
                    <a href="https://twitter.com/natycastrejonv" target="_blank" class="btn btn-outline-primary btn-small"><i class="fa-brands fa-x-twitter fa-fw"></i></a>
                    <a href="https://www.instagram.com/natycastrejonv/" target="_blank" class="btn btn-outline-primary btn-small"><i class="fa-brands fa-instagram fa-fw"></i></a>
                </p>
            </div>
        </div>
    </div>
</section>

<!-- =====================================
    UBICACIÓN
====================================== -->
<section class="">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="text-primary" style="font-weight: 700;">
                    UBICACIÓN                </h3>
                <hr>
            </div>
        </div>
    </div>
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3747.2978390553126!2d-98.77782508452157!3d20.079832786520026!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85d1a0e316456cd7%3A0xcd73ef67edfad9b5!2sSecretar%C3%ADa+de+Educaci%C3%B3n+P%C3%BAblica+de+Hidalgo!5e0!3m2!1ses-419!2smx!4v1566327715294!5m2!1ses-419!2smx " width="100% " height="450" frameborder="0 " style="border:0 " allowfullscreen=""></iframe>
</section>

<!-- Modal -->
<div class="modal fade" id="modalaviso" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5 w-100 text-center" id="exampleModalLabel" style="font-size: 28px; padding-top: 4%;"><b>AVISO A LA CIUDADANÍA GENERAL</b></h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <section class="py-1">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <p style="text-align: justify;">Con fundamento en el Artículo 41, base III, apartado C, párrafo segundo y 134 párrafo octavo de la Constitución Política de los Estados Unidos Mexicanos; Artículo 209 número 1 de la Ley General de Instituciones y Procedimientos Electorales; Artículo 24, base II, párrafo noveno de la Constitución Política del Estado de Hidalgo y Artículo 126, párrafo tercero del Código Electoral del Estado de Hidalgo, se informa  a la ciudadanía que algunas secciones de este portal de internet quedarán suspendidas durante el tiempo que comprenden el <b>PROCESO ELECTORAL LOCAL DE DIPUTACIONES Y AYUNTAMIENTOS CONCURRENTE CON EL FEDERAL 2023-2024</b>, hasta la conclusión de la respectiva jornada comicial (del 1 de marzo, hasta el 2 de junio de 2024).</p>
                    </div>
                </div>
            </div>
      </section>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
    // Esta función se ejecutará después de 2 segundos de cargar la página
    setTimeout(function() {
        $('#modalaviso').modal('show');
    }, 1000);
</script><script>gtag('event', 'page_view', { 'page_path': '/' });</script><footer class="bg-primary py-5 px-5">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 text-center text-sm-start col-md-6 pb-4">
                <img src="https://cdn.seph.gob.mx/img/hidalgo-primero-el-pueblo.svg" width="150" alt="Hidalgo Primero el Pueblo">
            </div>
            <div class="col-6 col-md-1 text-center">
                <p>911</p>
                <p>Emergencias</p>
            </div>
            <div class="col-6 col-md-2 text-center pb-4">
                <p>089</p>
                <p>Denuncia Anónima</p>
            </div>
            <div class="col-sm-12 col-md-3">
                <p> <a href="">Aviso de privacidad</a> </p>
                <p>Contacto:</p>
                <p>Blvd. Felipe Ángeles s/n C.P. 42083, Pachuca de Soto, Hidalgo, México.</p>
            </div>
        </div>
    </div>
    <hr>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-md-9">
                
            </div>
            <div class="col-4 col-md-1 text-sm-center text-md-end">
                <a href="https://www.facebook.com/SecretariaDeEducacionPublicaHidalgo" target="_blank">
                    <i class="fa-brands fa-facebook-f fa-2x"></i>
                </a>
            </div>
            <div class="col-4 col-md-1 text-sm-center text-md-center">
                <a href="https://twitter.com/SEPHidalgo" target="_blank">
                    <i class="fa-brands fa-x-twitter fa-2x"></i>
                </a>
            </div>
            <div class="col-4 col-md-1 text-sm-center text-md-start">
                <a href="https://www.instagram.com/sephidalgo/?igshid=YmMyMTA2M2Y%3D" target="_blank">
                    <i class="fa-brands fa-instagram fa-2x"></i> 
                </a>
            </div>
        </div>
    </div>
</footer>    
    <!-- Fin Contenido -->
    
    <!-- ======================================
        JS
    ======================================= -->
    <script src="vistas/js/plantilla.js"></script>
    
    

</body>
</html>
