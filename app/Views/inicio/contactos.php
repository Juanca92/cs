<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
<<<<<<< HEAD
  <title>Centro de salud | Contactos</title>
=======
  <title>Centro de salud: Contactos</title>
>>>>>>> 736905ead1e81ea593a479dd4b00b8bec256ff94

  <!-- Mobile Specific Metas
    ================================================== -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Favicon -->
<<<<<<< HEAD
  <link rel="shortcut icon" type="image/icon" href="<?php echo base_url('images/centroSalud.jpg') ?>" />
=======
  <link rel="shortcut icon" type="image/icon" href="images/favicon.ico" />
>>>>>>> 736905ead1e81ea593a479dd4b00b8bec256ff94

  <!-- CSS
    ================================================== -->
  <!-- Bootstrap css file-->
<<<<<<< HEAD
  <link href="<?php echo base_url('css/bootstrap.min.css') ?>" rel="stylesheet">
  <!-- Font awesome css file-->
  <link href="<?php echo base_url('css/font-awesome.min.css') ?>" rel="stylesheet">
  <!-- Default Theme css file -->
  <link id="switcher" href="<?php echo base_url('css/themes/lite-blue-theme.css') ?>" rel="stylesheet">
  <!-- Slick slider css file -->
  <link href="<?php echo base_url('css/slick.css') ?>" rel="stylesheet">
  <!-- Photo Swipe Image Gallery -->
  <link rel='stylesheet prefetch' href='<?php echo base_url('css/photoswipe.css') ?>'>
  <link rel='stylesheet prefetch' href='<?php echo base_url('css/default-skin.css') ?>'>

  <!-- Main structure css file -->
  <link href="<?php echo base_url('style.css') ?>" rel="stylesheet">
=======
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- Font awesome css file-->
  <link href="css/font-awesome.min.css" rel="stylesheet">
  <!-- Default Theme css file -->
  <link id="switcher" href="css/themes/lite-blue-theme.css" rel="stylesheet">
  <!-- Slick slider css file -->
  <link href="css/slick.css" rel="stylesheet">
  <!-- Photo Swipe Image Gallery -->
  <link rel='stylesheet prefetch' href='css/photoswipe.css'>
  <link rel='stylesheet prefetch' href='css/default-skin.css'>

  <!-- Main structure css file -->
  <link href="style.css" rel="stylesheet">
>>>>>>> 736905ead1e81ea593a479dd4b00b8bec256ff94
</head>

<body>
  <!-- BEGAIN PRELOADER -->
  <div id="preloader">
    <div id="status">&nbsp;</div>
  </div>
  <!-- END PRELOADER -->

  <!-- BUTTON -->
  <a class="scrollToTop" href="#"><i class="fa fa-heartbeat"></i></a>
  <!-- BUTTON -->

  <!--=========== SECTION ================-->
  <header id="header">
    <!-- MENU -->
    <div class="menu_area">
      <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
          <div class="navbar-header">
            <!-- FOR MOBILE VIEW COLLAPSED BUTTON -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <!-- LOGO -->
            <!-- TEXT BASED LOGO -->
            <aside class="main-sidebar sidebar-light-navy elevation-4">
              <a href="/" class="brand-link navbar-navy elevation-4">
                <img src="<?php echo base_url('images/sanpedro.jpg') ?>" alt="Logo San Pedro" class="brand-image img-circle elevation-3" style="opacity: 0.8" />
                <span class="brand-text font-weight-light text-black">C.S. | SAN PEDRO</span>
              </a>
            </aside>
            <!-- IMG BASED LOGO  -->
            <!--  <a class="navbar-brand" href="index.html"><img src="images/logo.png" alt="logo"></a>   -->
          </div>
          <div id="navbar" class="navbar-collapse collapse">
            <ul id="top-menu" class="nav navbar-nav navbar-right main-nav">
              <li class="active"><a href="<?= base_url('inicio') ?>">Inicio</a></li>
              <li><a href="<?= base_url('inicio/acercaDelcentro') ?>">Acerca del centro</a></li>
              <li><a href="<?= base_url('inicio/nuestrosDoctores') ?>">Nuestros-doctores</a></li>
              <li><a href="<?= base_url('inicio/servicioOdontologico') ?>">Servicio-odontologico</a></li>
              <li><a href="<?= base_url('inicio/contactos') ?>">Contacto</a></li>
              <li><a href="<?= base_url('auth/login') ?>">Ingresar</a></li>
            </ul>
          </div>
          <!--/.nav-collapse -->
        </div>
      </nav>
    </div>
    <!-- END MENU -->
  </header>
  <!--=========== END HEADER SECTION ================-->
  <section id="blogArchive">
    <div class="row">
      <div class="col-lg-12 col-md-12">
        <div class="blog-breadcrumbs-area">
          <div class="container">
            <div class="blog-breadcrumbs-left">
              <h2>Contactos</h2>
            </div>
            <div class="blog-breadcrumbs-right">
              <ol class="breadcrumb">
                <li><a href="#">Inicio</a></li>
                <li class="active">Contactos</li>
              </ol>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section id="contact">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 col-md-4">
          <div class="contact-address">
            <div class="section-heading">
              <h2>Informacion de contacto Odontologico</h2>
              <div class="line"></div>
            </div>
            <p>Para mayor informacion consulte a su medico odontologico</p>
            <address class="contact-info">
              <p><span class="fa fa-home"></span>Dr. Wilmer Gamboa</p>
              <p><span class="fa fa-phone"></span>77281461</p>
              <p><span class="fa fa-envelope"></span>wilmer@gmail.com</p>
            </address>
          </div>
        </div>
        <div class="col-lg-6 col-md-4">
          <div class="contact-address">
            <div class="section-heading">
              <h2>Informacion de contacto medicina General</h2>
              <div class="line"></div>
            </div>
            <p>Para mayor informacion consulte a su medico en medicina General</p>
            <address class="contact-info">
              <p><span class="fa fa-home"></span>Dr. German Choque</p>
              <p><span class="fa fa-phone"></span>74852392</p>
              <p><span class="fa fa-envelope"></span>germanchoque@gmail.com</p>
            </address>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!--=========== Start Footer SECTION ================-->
  <footer id="footer">
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
              background-color: lightblue; color:navy; font-size:.9rem;" data-toggle="tooltip" data-placement="top" title="<?php echo date('d-m-Y'); ?>">
                  <i style="color: royalblue;" class="fa fa-clock"></i>
                  <small style="color: royalblue;">10:52:12</small>
                </label>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!--=========== End Footer SECTION ================-->

  <!-- jQuery Library  -->
<<<<<<< HEAD
  <script src="<?php echo base_url('js/jquery.js') ?>"></script>
  <!-- Bootstrap default js -->
  <script src="<?php echo base_url('js/bootstrap.min.js') ?>"></script>
  <!-- slick slider -->
  <script src="<?php echo base_url('js/slick.min.js') ?>"></script>
  <script type="text/javascript" src="<?php echo base_url('js/modernizr.custom.79639.js') ?>"></script>
  <!-- counter -->
  <script src="<?php echo base_url('js/waypoints.min.js') ?>"></script>
  <script src="<?php echo base_url('js/jquery.counterup.min.js') ?>"></script>
  <!-- Doctors hover effect -->
  <script src="<?php echo base_url('js/snap.svg-min.js') ?>"></script>
  <script src="<?php echo base_url('js/hovers.js') ?>"></script>
  <!-- Photo Swipe Gallery Slider -->
  <script src='<?php echo base_url('js/photoswipe.min.js') ?>'></script>
  <script src='<?php echo base_url('js/photoswipe-ui-default.min.js') ?>'></script>
  <script src="<?php echo base_url('js/photoswipe-gallery.js') ?>"></script>

  <!-- Custom JS -->
  <script src="<?php echo base_url('js/custom.js') ?>"></script>
=======
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
>>>>>>> 736905ead1e81ea593a479dd4b00b8bec256ff94

</body>

</html>