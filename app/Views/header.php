<!-- Site wrapper -->
<div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-navy navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link text-white" data-widget="pushmenu" href="#" role="button">
                    <i class="fas fa-bars"></i>
                </a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="<?= base_url('/'); ?>" class="nav-link text-white">Inicio</a>
            </li>
        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <!-- Notifications Dropdown Menu -->
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="far fa-bell text-white"></i>
                    <span class="badge badge-warning navbar-badge">15</span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <span class="dropdown-item dropdown-header">15 Notificaciones</span>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-envelope mr-2"></i> 4 nuevos mensajes
                        <span class="float-right text-muted text-sm">3 min</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item dropdown-footer">Ver todas las Notificaciones</a>
                </div>
            </li>

            <li class="nav-item dropdown" style="margin-left: 10px;">
                <a class="nav-link" data-toggle="dropdown" href="" style="padding: 0px;">
                    <img class="img img-responsive" src="<?= base_url('img/logo.png'); ?>" alt="" width="35" height="35">
                </a>
                
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <span class="dropdown-item dropdown-header">Juan Carlos Condori Zapana</span>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-user-cog mr-2"></i> Perfil
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="<?= base_url('auth/logout'); ?>" class="dropdown-item dropdown-footer bg-blue">Cerrar Sesion</a>
                </div>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-light-navy elevation-4">
        <!-- Brand Logo -->
        <a href="index3.html" class="brand-link navbar-navy elevation-4">
            <img src="<?php echo base_url('img/logo.png') ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
          style="opacity: 0.8" />
            <span class="brand-text font-weight-light text-white">SAN PEDRO</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="<?php echo base_url('img/user2-160x160.jpg') ?>" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block">User</a>
                </div>

            </div>

            <div class="d-flex justify-content-around">
                <a href="#"><i class="fas fa-cog text-navy" data-toggle="tooltip" title="Configurar"></i></a>
                <a href="#"><i class="fa fa-user-edit text-navy" data-toggle="tooltip" title="Editar Perfil"></i></a>
                <a href="<?= base_url('auth/logout'); ?>"><i class="fas fa-lock text-navy" data-toggle="tooltip" title="Cerrar Sesi&oacute;n"></i></a>
            </div>

            <?= $menu ?>
        
        </div>
        <!-- /.sidebar -->
    </aside>



    