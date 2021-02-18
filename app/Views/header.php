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
                <div class="topbar-item" data-toggle="dropdown">
                    <div class="btn btn-icon btn-icon-mobile w-auto btn-clean d-flex align-items-center btn-lg px-2">
                    <span class="text-muted font-weight-bold font-size-base d-none d-md-inline mr-1">Bienvenido,</span>
                        <span class="text-dark-50 font-weight-bolder font-size-base d-none d-md-inline mr-3">Juan Carlos</span>
                        <span class="symbol symbol-lg-35 symbol-25 symbol-light-success">
                            <span class="symbol-label font-size-h5 font-weight-bold">JC</span>
                        </span>
                    </div>
                </div>

                <div class="dropdown-menu dropdown-menu-xl dropdown-menu-right">
                    <div class="perfil-usuario">
                        <div class="cerrar d-flex justify-content-between">
                            <p>Perfil de Usuario</p>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="d-flex align-items-center mt-1">
                            <!-- Foto de Perfil -->
                            <div class="symbol symbol-100 mt-3 mr-4">
                                <img class="symbol-label" src="<?= base_url('img/user2-160x160.jpg'); ?>" alt="Foto de Perfil de Usuario" />
                                <i class="symbol-badge bg-success"></i>
                            </div>

                            <!-- Informacion del usuario -->
                            <div class="d-flex flex-column">
                                <a href="#" class="font-weight-bold font-size-h5 text-dark-75 text-hover-primary">Juan Carlos Condori</a>
                                <div class="text-muted mt-0">PACIENTE</div>
                                <div class="navi mt-0">
                                    <a href="#" class="navi-item">
                                        <span class="navi-link p-1 pb-1">
                                            <span class="navi-icon mr-1">
                                            <i class="fas fa-mail-bulk"></i>
                                            </span>
                                            <span class="navi-text font-size-base text-muted text-hover-primary">cs.sanpedro@gmail.com</span>
                                        </span>
                                    </a>
                                    <a href="<?= base_url('auth/logout'); ?>" class="btn btn-sm btn-light-primary font-weight-bolder mt-1 py-2 px-4">
                                        <i class="fa fa-lock"></i>
                                        cerrar sesion
                                    </a>
                                </div>
                            </div>
                        </div> 

                        <div class="separator separator-dashed mb-2"></div>
                        
                        <div class="navi navi-spacer-x-0 p-0">
                            <a href="#" class="navi-item">
                                <div class="navi-link">
                                        <span class="navi-icon mr-1 ">
                                        <i class="fas fa-user-edit"></i>
                                        </span>
                                    <div class="navi-text">
                                        <div class="text-muted">Configurar mi cuenta y
                                        <span class="label label-light-danger label-inline font-weight-bold">Actualizar</span></div>
                                    </div>
                                </div>
                            </a>                        
                        </div>

                    </div>
                    
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
                    <a href="#" class="d-block"><?= (isset($user["nombres"])) ? $user["nombres"] . " " . $user["paterno"] : "Invitado"; ?></a>
                </div>

            </div>

            <div class="d-flex justify-content-center">
                <a href="<?= base_url('auth/logout'); ?>"><i class="fas fa-lock text-navy" data-toggle="tooltip" title="Cerrar Sesi&oacute;n"></i></a>
            </div>

            <?= $menu ?>
        
        </div>
        <!-- /.sidebar -->
    </aside>