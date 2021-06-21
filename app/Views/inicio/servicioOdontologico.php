<!DOCTYPE html>
<html lang="es">

<head>

  <!-- Basic Page Needs
    ================================================== -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Centro de salud | Odontologia</title>

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
  <link href="<?php echo base_url('css/font-awesome.min.css') ?>" rel="stylesheet">
  <!-- Default Theme css file -->
  <link id="switcher" href="<?php echo base_url('css/themes/blue-theme.css') ?>" rel="stylesheet">
  <!-- Slick slider css file -->
  <link href="<?php echo base_url('css/slick.css') ?>" rel="stylesheet">

  <!-- Main structure css file -->
  <link href="<?php echo base_url('css/style.css') ?>" rel="stylesheet">


</head>

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
              <li><a href="<?= base_url('inicio/acercaDelcentro') ?>">Acerca-del-centro-de-salud</a></li>
              <li><a href="<?= base_url('inicio/nuestrosDoctores') ?>">Doctores</a></li>
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
  <section id="header_acercadelcentro" class="header_acercadelcentro">
    <div class="row">
      <div class="col-lg-12 col-md-12">
        <div class="blog-breadcrumbs-area">
          <div class="container">
            <div class="blog-breadcrumbs-left">
              <h2>Se brinda los siguientes Tratamientos</h2>
            </div>
            <div class="blog-breadcrumbs-right">
              <ol class="breadcrumb">
                <li><a href="#">Inicio</a></li>
                <li class="active">Tratamientos</li>
              </ol>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--=========== BEGIN Service SECTION ================-->
  <section id="service">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12">
          <div class="service-area">
            <!-- Start Service Title -->
            <div class="section-heading">
              <h2>Tratamientos Odontológicas</h2>
              <div class="line"></div>
            </div>
            <!-- Start Service Content -->
            <div class="service-content">
              <div class="row">
                <!-- Start Single Service -->
                <div class="col-lg-4 col-md-4">
                  <div class="single-service">
                    <div class="service-icon">
                    <img src="<?php echo base_url('images/dientes/prevencion.png') ?>" alt="diente" class="brand-image img-circle elevation-3 service-icon-effect" style="opacity: 0.8"  />
                    </div>
                    <h3><a href="#">Prevencion</a></h3>
                    <p>Se realiza limpiezas dentales con flúor y profilaxis para prevenir
                      cualquier enfermedad en los dientes tanto en los niños como en adultos
                    </p>
                  </div>
                </div>
                <!-- Start Single Service -->
                <div class="col-lg-4 col-md-4">
                  <div class="single-service">
                    <div class="service-icon">
                    <img src="<?php echo base_url('images/dientes/restauracion.png') ?>" alt="diente" class="brand-image img-circle elevation-3 service-icon-effect" style="opacity: 0.8"  />
                    </div>
                    <h3><a href="#">Restauracion</a></h3>
                    <p>Se extrae piezas dentales que sufrieron destrucción, fractura, desgaste o afección irreversible
                      provocada por una caries o por traumatismo.
                    </p>
                  </div>
                </div>
                <!-- Start Single Service -->
                <div class="col-lg-4 col-md-4">
                  <div class="single-service">
                    <div class="service-icon">
                    <img src="<?php echo base_url('images/dientes/periodoncia.png') ?>" alt="diente" class="brand-image img-circle elevation-3 service-icon-effect" style="opacity: 0.8"  />
                    </div>
                    <h3><a href="#">Periodoncia</a></h3>
                    <p>Se diagnostica los tratamientos de las enfermedades y
                      condiciones que afectan a los tejidos que dan soporte a los órganos dentarios,</p>
                  </div>
                </div>
                <!-- Start Single Service -->
                <div class="col-lg-4 col-md-4">
                  <div class="single-service">
                    <div class="service-icon">
                    <img src="<?php echo base_url('images/dientes/endodoncia.png') ?>" alt="diente" class="brand-image img-circle elevation-3 service-icon-effect" style="opacity: 0.8"  />
                    </div>
                    <h3><a href="#">Endodoncia</a></h3>
                    <p>Se realiza tratamiento dental conocido comúnmente para “matar el nervio”. Consiste en eliminar
                      la parte profunda del diente cuando se encuentra lesionado o infectado. El objetivo
                      de este tratamiento es limpiar el diente por dentro y rellenarlo de un material inerte</p>
                  </div>
                </div>
                <!-- Start Single Service -->
                <div class="col-lg-4 col-md-4">
                  <div class="single-service">
                    <div class="service-icon">
                    <img src="<?php echo base_url('images/dientes/cirugia.png') ?>" alt="diente" class="brand-image img-circle elevation-3 service-icon-effect" style="opacity: 0.8"  />
                    </div>
                    <h3><a href="#">Cirugia Bucal</a></h3>
                    <p>También se encarga de diagnosticar y tratar quirúrgicamente las enfermedades, defectos y traumatismos
                      de los dientes, huesos maxilares y sus tejidos adyacentes </p>
                  </div>
                </div>
                <!-- Start Single Service -->
                <div class="col-lg-4 col-md-4">
                  <div class="single-service">
                    <div class="service-icon">
                    <img src="<?php echo base_url('images/dientes/billete.jpg') ?>" alt="diente" class="brand-image img-circle elevation-3 service-icon-effect" style="opacity: 0.8"  />
                    </div>
                    <h3><a href="#">Costo de los tratamientos</a></h3>
                    <p>El Centro de Salud San Pedro de curahura no cobra por los tratamientos realizados hacia los
                      pacientes
                      cualquier consulta o atencion es gratuito</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- seccion de por que elegir -->
  <section id="whychooseSection">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12">
          <div class="service-area">
            <!-- Start Service Title -->
            <div class="section-heading">
              <h2>Por que Elegirnos</h2>
              <div class="line"></div>
            </div>
          </div>
        </div>
        <div class="col-lg-12 col-md-12">
          <div class="row">
            <div class="col-lg-5 col-md-6 col-sm-6 col-xs-12">
              <div class="whyChoose-left">
                <div class="whychoose-slider">
                  <div class="whychoose-singleslide">
                    <img src="<?php echo base_url('images/odonto2.jpg') ?>" alt="img">
                  </div>
                  <div class="whychoose-singleslide">
                    <img src="<?php echo base_url('images/odonto3.jpg') ?>" alt="img">
                  </div>
                  <div class="whychoose-singleslide">
                    <img src="<?php echo base_url('images/odonto4.jpg') ?>" alt="img">
                  </div>
                  <div class="whychoose-singleslide">
                    <img src="<?php echo base_url('images/odonto5.jpg') ?>" alt="img">
                  </div>
                  <div class="whychoose-singleslide">
                    <img src="<?php echo base_url('images/odonto1.jpg') ?>" alt="img">
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-7 col-md-6 col-sm-6 col-xs-12">
              <div class="whyChoose-right">
                <div class="media">
                  <div class="media-left">
                    <a href="#" class="media-icon">
                      <span class="fa fa-hospital-o"></span>
                    </a>
                  </div>
                  <div class="media-body">
                    <h4 class="media-heading">Nuestra Infraestructura</h4>
                    <p>Se tiene un propio ambiente donde se realiza cualquier tratamiento a los pacientes.
                    </p>
                  </div>
                </div>
                <div class="media">
                  <div class="media-left">
                    <a href="#" class="media-icon">
                      <span class="fa fa-user-md"></span>
                    </a>
                  </div>
                  <div class="media-body">
                    <h4 class="media-heading">Calidad de Doctores</h4>
                    <p>La atencion es con un especialista en odontologia que hay en el Centro de Salud.</p>
                  </div>
                </div>
                <div class="media">
                  <div class="media-left">
                    <a href="#" class="media-icon">
                      <span class="fa fa-ambulance"></span>
                    </a>
                  </div>
                  <div class="media-body">
                    <h4 class="media-heading">Atencion a emergencias</h4>
                    <p>Atencion a los pacientes de emergencia </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Start Footer Middle -->
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

  <!-- Custom JS -->
  <script src="<?php echo base_url('js/custom.js') ?>"></script>

</body>

</html>