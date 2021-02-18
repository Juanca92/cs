<!DOCTYPE html>
<html>

<head>

  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <title>Centro de Salud | San Pedro</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('plugins/fontawesome-free/css/all.min.css') ?>" />
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" />
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="<?php echo base_url('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') ?>" />
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url('plugins/icheck-bootstrap/icheck-bootstrap.min.css') ?>" />
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?php echo base_url('plugins/jqvmap/jqvmap.min.css') ?>" />
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('css/adminlte.css') ?>" />
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?php echo base_url('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') ?>" />
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url('plugins/daterangepicker/daterangepicker.css') ?>" />
  <!-- summernote -->
  <link rel="stylesheet" href="<?php echo base_url('plugins/summernote/summernote-bs4.css') ?>" />

  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') ?> ">
  <link rel="stylesheet" href="<?php echo base_url('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') ?> ">

  <!-- Toastr -->
  <link rel="stylesheet" href="<?php echo base_url('plugins/toastr/toastr.min.css') ?>">

  <!-- Select2 -->
  <link rel="stylesheet" href="<?php echo base_url('plugins/select2/css/select2.min.css') ?>">
  <link rel="stylesheet" href="<?php echo base_url('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') ?>">

  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet" />

  <link href="<?php echo base_url('img/logo.png') ?>" rel="shortcut icon" />
  <link href="<?php echo base_url('img/logo.png') ?>" rel="icon" />
  <link href="<?php echo base_url('img/logo.png') ?>" rel="apple-touch-icon" />

  <!-- Theme style perfil -->
  <link rel="stylesheet" href="<?php echo base_url('css/extra.css') ?>" />

</head>

<body class="hold-transition sidebar-mini layout-fixed">
  
  <?= $header ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <?= $content ?>
  </div>
  <!-- /.content-wrapper -->

  <?= $footer ?>  

  <div id="preloader"></div>

</body>

</html>