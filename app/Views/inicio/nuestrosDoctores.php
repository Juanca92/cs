<!DOCTYPE html>
<html lang="es">

<head>
  <!-- Basic Page Needs
    ================================================== -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Centro de salud | Doctores</title>

  <!-- Mobile Specific Metas
    ================================================== -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Favicon -->
  <link rel="shortcut icon" type="image/icon" href="<?php echo base_url('images/centroSalud.jpg') ?>" />

  <!-- CSS
    ================================================== -->
  <!-- Bootstrap css file-->
  <link href="<?php echo base_url('css/bootstrap.min.css') ?>" rel="stylesheet">
  <!-- Font awesome css file-->
  <link href="<?php echo base_url('css/fontawesome.min.css') ?>" rel="stylesheet">
  <!-- Default Theme css file -->
  <link id="switcher" href="<?php echo base_url('css/themes/blue-theme.css') ?>" rel="stylesheet">
  <!-- Slick slider css file -->
  <link href="<?php echo base_url('css/slick.css') ?>" rel="stylesheet">

  <!-- Main structure css file -->
  <link href="<?php echo base_url('style.css') ?>" rel="stylesheet">

  <!-- Google fonts -->
  <link href='http://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Habibi' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Cinzel+Decorative:900' rel='stylesheet' type='text/css'>
  
</head>

<body>
  <!-- BEGAIN PRELOADER -->
  <div id="preloader">
    <div id="status">&nbsp;</div>
  </div>
  <!-- END PRELOADER -->

  <!--=========== BEGIN HEADER SECTION ================-->
  <header id="header">
    <!-- BEGIN MENU -->
    <div class="menu_area">
      <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
          <div class="navbar-header">
            <!-- FOR MOBILE VIEW COLLAPSED BUTTON -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
              aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <!-- LOGO -->
            <!-- TEXT BASED LOGO -->
            <aside class="main-sidebar sidebar-light-navy elevation-4">
              <a href="/" class="brand-link navbar-navy elevation-4">
                <img src="<?php echo base_url('images/sanpedro.jpg') ?>" alt="Logo San Pedro" class="brand-image img-circle elevation-3"
                  style="opacity: 0.8" />
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
              <h2>Conozca nuestros especialistas</h2>
            </div>
            <div class="blog-breadcrumbs-right">
              <ol class="breadcrumb">
                <li><a href="#">Inicio</a></li>
                <li class="active">Nuestros-doctores</li>
              </ol>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--=========== BEGAIN Doctors SECTION ================-->
  <section id="meetDoctors">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12">
          <div class="meetDoctors-area">
            <!-- Start Service Title -->
            <div class="section-heading">
              <h2>Doctores</h2>
              <div class="line"></div>
            </div>
            <div class="doctors-area">
              <ul class="doctors-nav">
                <li>
                  <div class="single-doctor">
                    <a class="tdoctor" href="#" data-path-hover="m 180,34.57627 -180,0 L 0,0 180,0 z">
                      <figure>
                        <img src="<?php echo base_url('images/doctor1.jpg') ?>" />
                        <svg viewBox="0 0 180 320" preserveAspectRatio="none">
                          <path d="M 180,160 0,218 0,0 180,0 z" />
                        </svg>
                        <figcaption>
                          <h2>Dr. Wilmer Gamboa</h2>
                          <p>Odontólogo</p>
                        </figcaption>
                      </figure>
                    </a>
                    <div class="single-doctor-social">
                    </div>
                  </div>
                </li>
                <li>
                  <div class="single-doctor">
                    <div class="single-doctor">
                      <a class="tdoctor" href="#" data-path-hover="m 180,34.57627 -180,0 L 0,0 180,0 z">
                        <figure>
                          <img src="<?php echo base_url('images/doctor2.jpg') ?>" />
                          <svg viewBox="0 0 180 320" preserveAspectRatio="none">
                            <path d="M 180,160 0,218 0,0 180,0 z" />
                          </svg>
                          <figcaption>
                            <h2>DR. German Choque</h2>
                            <p>Medicina General</p>
                          </figcaption>
                        </figure>
                      </a>
                      <div class="single-doctor-social">
                      </div>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="single-doctor">
                    <div class="single-doctor">
                      <a class="tdoctor" href="#" data-path-hover="m 180,34.57627 -180,0 L 0,0 180,0 z">
                        <figure>
                          <img src="<?php echo base_url('images/doctor-3.jpg') ?>" />
                          <svg viewBox="0 0 180 320" preserveAspectRatio="none">
                            <path d="M 180,160 0,218 0,0 180,0 z" />
                          </svg>
                          <figcaption>
                            <h2>Lic. Micaela Soliz </h2>
                            <h2>Enf. Saturnina Huanca </h2>
                            <p>Enfermeras</p>
                          </figcaption>
                        </figure>
                      </a>
                      <div class="single-doctor-social">
                      </div>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="single-doctor">
                    <div class="single-doctor">
                      <a class="tdoctor" href="#" data-path-hover="m 180,34.57627 -180,0 L 0,0 180,0 z">
                        <figure>
                          <img src="<?php echo base_url('images/doctora1.jpg') ?>" />
                          <svg viewBox="0 0 180 320" preserveAspectRatio="none">
                            <path d="M 180,160 0,218 0,0 180,0 z" />
                          </svg>
                          <figcaption>
                            <h2>Dra. Marisol Poma</h2>
                            <p>Programa mi salud</p>
                          </figcaption>
                        </figure>
                      </a>
                      <div class="single-doctor-social">
                      </div>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="single-doctor">
                    <a class="tdoctor" href="#" data-path-hover="m 180,34.57627 -180,0 L 0,0 180,0 z">
                      <figure>
                        <img src="<?php echo base_url('images/doctor-1.jpg') ?>" />
                        <svg viewBox="0 0 180 320" preserveAspectRatio="none">
                          <path d="M 180,160 0,218 0,0 180,0 z" />
                        </svg>
                        <figcaption>
                          <h2>Dra. Marcela Tarqui</h2>
                          <p>Encargada Bono Juana Azurduy</p>
                        </figcaption>
                      </figure>
                    </a>
                    <div class="single-doctor-social">
                    </div>
                  </div>
                </li>
                <li>
                  <div class="single-doctor">
                    <div class="single-doctor">
                      <a class="tdoctor" href="#" data-path-hover="m 180,34.57627 -180,0 L 0,0 180,0 z">
                        <figure>
                          <img src="<?php echo base_url('images/doctora2.jpg') ?>" />
                          <svg viewBox="0 0 180 320" preserveAspectRatio="none">
                            <path d="M 180,160 0,218 0,0 180,0 z" />
                          </svg>
                          <figcaption>
                            <h2>Dra. Lola Canqui </h2>
                            <p>Programa Telesalud</p>
                          </figcaption>
                        </figure>
                      </a>
                      <div class="single-doctor-social">
                      </div>
                    </div>
                  </div>
                </li>
              </ul>
            </div>
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
              background-color: lightblue; color:navy; font-size:.9rem;"
                  data-toggle="tooltip" data-placement="top" title="<?php echo date('d-m-Y'); ?>">
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

</body>

</html>