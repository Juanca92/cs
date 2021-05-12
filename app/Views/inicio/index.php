<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Centro de salud | Inicio</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/jpg" href="images/centroSalud.jpg" />
    <!-- Bootstrap css file-->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Font awesome css file-->
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <!-- Default Theme css file -->
    <link id="switcher" href="css/themes/blue-theme.css" rel="stylesheet">
    <!-- Slick slider css file -->
    <link href="css/slick.css" rel="stylesheet">
    <!-- Photo Swipe Image Gallery -->
    <link rel='stylesheet prefetch' href='css/photoswipe.css'>
    <link rel='stylesheet prefetch' href='css/default-skin.css'>

    <!-- Main structure css file -->
    <link href="style.css" rel="stylesheet">

<body>

    <!-- BEGAIN PRELOADER -->
    <div id="preloader">
        <div id="status">&nbsp;</div>
    </div>
    <!--=========== BEGIN HEADER SECTION ================-->
    <header id="header">
        <!-- BEGIN MENU -->
        <div class="menu_area">
            <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
                <div class="container">
                    <div class="navbar-header">
                        <!-- FOR MOBILE VIEW COLLAPSED BUTTON -->
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                            data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <!-- LOGO -->
                        <!-- TEXT BASED LOGO -->
                        <aside class="main-sidebar sidebar-light-navy elevation-4">
                            <a href="/" class="brand-link navbar-navy elevation-4">
                                <img src="images/sanpedro.jpg" alt="Logo San Pedro"
                                    class="brand-image img-circle elevation-3" style="opacity: 0.8" />
                                <span class="brand-text font-weight-light text-black">C.S. | SAN PEDRO</span>
                            </a>
                        </aside>
                        <!-- IMG BASED LOGO  -->
                        <!--  <a class="navbar-brand" href="index.php"><img src="images/logo.png" alt="logo"></a>   -->
                    </div>
                    <div id="navbar" class="navbar-collapse collapse">
                        <ul id="top-menu" class="nav navbar-nav navbar-right main-nav">
                            <li class="active"><a href="<?= base_url('/inicio') ?>">Inicio</a></li>
                            <li><a href="<?= base_url('/inicio/acercaDelcentro') ?>">Acerca del centro</a></li>
                            <li><a href="<?= base_url('/inicio/nuestrosDoctores') ?>">Nuestros-doctores</a></li>
                            <li><a href="<?= base_url('/inicio/servicioOdontologico') ?>">Servicio-odontologico</a></li>
                            <li><a href="<?= base_url('/inicio/contactos') ?>">Contacto</a></li>
                            <li><a href="<?= base_url('/auth/login') ?>">Ingresar</a></li>
                        </ul>
                    </div>
                    <!--/.nav-collapse -->
                </div>
            </nav>
        </div>
        <!-- END MENU -->
    </header>
    <!--=========== END HEADER SECTION ================-->

    <!--=========== BEGIN SLIDER SECTION ================-->
    <section id="sliderArea">
        <!-- Start slider wrapper -->
        <div class="top-slider">
            <!-- Start First slide -->
            <div class="top-slide-inner">
                <div class="slider-img">
                    <img src="images/port1.jpg" alt="">
                </div>
                <div class="slider-text">
                    <h2>BIENVENIDOS <strong>centro de salud</strong>San Pedro de Curahuara </h2>
                    <p><strong>Informacion:</strong>Aqui encontraras los servicios que brinda el centro de salud como
                        tambien el
                        consultorio dental</p>
                </div>
            </div>

            <!-- diapositiva-->
            <div class="top-slide-inner">
                <div class="slider-img">
                    <img src="images/port4.jpg" alt="">
                </div>
                <div class="slider-text">
                    <h2>BIENVENIDOS a <strong>Centro de Salud</strong> San Pedro de Curahuara </h2>
                    <p><strong>Informacion:</strong> Brindamos los servicios de la mejor calidad </p>
                </div>
            </div>
            <!-- fin -->

            <!-- diapositiva -->
            <div class="top-slide-inner">
                <div class="slider-img">
                    <img src="images/port3.jpg" alt="">
                </div>
                <div class="slider-text">
                    <h2>BIENVENIDOS a <strong>Centro de salud</strong> San Pedro de Curahuara</h2>
                    <p><strong>Informacion:</strong> siempre al servicio de tod@s los pacientes </p>
                </div>
            </div>
            <!--fin-->
        </div><!-- /top-slider -->
    </section>
    <!--=========== END SLIDER SECTION ================-->

    <!--=========== SECTION ================-->
    <section id="topFeature">
        <div class="row">
            <!-- informacion de emergencia -->
            <div class="col-lg-4 col-md-4">
                <div class="row">
                    <div class="single-top-feature">
                        <span class="fa fa-flask"></span>
                        <h3>Atencion de Emergencias</h3>
                        <p>La emergencia se atiende de manera inmdiata.
                        el centro de salud San Pedro busca el bienestar de toda la población 
                        con la atención inmediata a sus pacientes.</p>
                        <div class="readmore_area">
                            <a data-toggle="modal" data-target="#myModal" href="#"
                                data-hover="C.S. San Pedro"><span>Visite el centro
                                    de
                                    salud</span></a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- fi emergencia -->

            <!-- informacion de hoerarios de atencion-->
            <div class="col-lg-4 col-md-4">
                <div class="row">
                    <div class="single-top-feature opening-hours">
                        <span class="fa fa-clock-o"></span>
                        <h3>Horarios de Atencion</h3>
                        <p>los horarios de atencion en el centro de salud se describen en el siguiente cuadro.</p>
                        <ul class="opening-table">
                            <li>
                                <span>Lunes - Viernes</span>
                                <div class="value">8:00 - 18:30</div>
                            </li>
                            <li>
                                <span>Sabado</span>
                                <div class="value">8:30 - 18:30</div>
                            </li>
                            <li>
                                <span>Domingo</span>
                                <div class="value">8:30 - 18:30</div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- fin de horarios -->

            <!-- informacion de la cita medica -->
            <div class="col-lg-4 col-md-4">
                <div class="row">
                    <div class="single-top-feature">
                        <span class="fa fa-hospital-o"></span>
                        <h3>Citas médicas</h3>
                        <p>Para reservar citas médicas de odontología o medicina general
                           visite  el centro de salud San Pedro de Curahuara donde le atienden
                            al instante para poder hacer la revisión correspondiente y posterior cita, si fuera necesario.</p>
                        <div class="readmore_area">
                            <a data-toggle="modal" data-target="#myModal" href="#"
                                data-hover="C.S. San Pedro"><span>Visite el centro
                                    de
                                    salud</span></a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- cita medica-->
        </div>
    </section>


    <!-- pie de la pagina-->
    <div class="footer-middle">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="footer-copyright">
                        <strong>
                            Copyright &copy; 2021
                            <a href="/">C.S. San Pedro</a>.
                        </strong>

                        Todos los derechos reservados.
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="footer-social">
                        <div class="float-right d-sm-block color-palette-set">
                            <label id="ahora" style="padding: 2px 6px; border-radius: 6px; 
              background-color: lightblue; color:navy; font-size:.9rem;" data-toggle="tooltip" data-placement="top"
                                title="<?php echo date('d-m-Y'); ?>">
                                <i style="color: royalblue;" class="fa fa-clock"></i>
                                <small style="color: royalblue;">10:52:12</small>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--=========== End Footer SECTION ================-->

    <!-- jQuery Library  -->
    <script src="js/jquery.js"></script>
    <!-- Bootstrap default js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- slick slider -->
    <script src="js/slick.min.js"></script>
    <script type="text/javascript" src="js/modernizr.custom.79639.js"></script>
    <!-- counter -->
    <script src="js/waypoints.min.js"></script>
    <script src="js/jquery.counterup.min.js"></script>
    <!-- Doctors hover effect -->
    <script src="js/snap.svg-min.js"></script>
    <script src="js/hovers.js"></script>
    <!-- Photo Swipe Gallery Slider -->
    <script src='js/photoswipe.min.js'></script>
    <script src='js/photoswipe-ui-default.min.js'></script>
    <script src="js/photoswipe-gallery.js"></script>

    <!-- Custom JS -->
    <script src="js/custom.js"></script>

</body>

</html>