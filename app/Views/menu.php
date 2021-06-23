<!-- Sidebar Menu -->
<nav class="mt-3">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
        with font-awesome or any other icon font library -->
        <li class="nav-header p-0 pb-0">
            <div class="d-flex justify-content-around">
                <a href="#" class="icon-circle" data-toggle="tooltip" title="Configuracion">
                    <i class="fa fa-cog"></i>
                </a>
                <a href="<?= base_url('/perfil'); ?>" class="icon-circle menu--link" data-toggle="tooltip" title="Editar Perfil">
                    <i class="fa fa-user-edit"></i>
                </a>
                <a href="<?= base_url('auth/logout'); ?>" class="icon-circle" data-toggle="tooltip" title="Salir">
                    <i class="fa fa-lock"></i>
                </a>

                <a href="<?= base_url('auth/logout'); ?>" class="icon-circle" data-toggle="tooltip" title="Salir">
                    <ion-icon class="lock-close"></ion-icon>
                </a>
            </div>

        </li>

        <li class="nav-header pt-3">
            <center>MEN&Uacute; DE NAVEGACI&Oacute;N</center>
        </li>

        <!-- Menu Inicio -->
        <li class="nav-item has-treeview">
            <a href="<?= base_url('/home'); ?>" class="nav-link menu--link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>Inicio</p>
            </a>
        </li>

        <!-- Menu Paciente -->
        <?php if (is(['ADMINISTRADOR', 'ODONTOLOGO'])) : ?>
            <li class="nav-item">
                <a href="<?= base_url('/paciente'); ?>" class="nav-link menu--link">
                    <i class="nav-icon fas fa-users"></i>
                    <p>Pacientes</p>
                </a>
            </li>
        <?php endif ?>

        <?php if (is(['ADMINISTRADOR', 'ODONTOLOGO'])) : ?>
            <!-- Menu Odontologos -->
            <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-user"></i>
                    <p>
                        Odont&oacute;logos
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="<?= base_url('/odontologo'); ?>" class="nav-link menu--link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Odont&oacute;logo</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="<?= base_url('/historialOdontologo'); ?>" class="nav-link menu--link">
                            <i class="far fa-circle nav-icon"></i>
                            <p> Historial Odont&oacute;logo</p>
                        </a>
                    </li>
                </ul>
            </li>
        <?php endif ?>

        <!-- Menu Cita Medica -->
        <?php if (is(['ADMINISTRADOR', 'ODONTOLOGO'])) : ?>
            <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-calendar-plus"></i>
                    <p>
                        Citas M&eacute;dicas
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="<?= base_url('/cita'); ?>" class="nav-link menu--link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Cita M&eacute;dica</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url('/gestionarCita'); ?>" class="nav-link menu--link">
                            <i class="far fa-circle nav-icon"></i>
                            <p> Gesti&oacute;n de Citas</p>
                        </a>
                    </li>
                </ul>
            </li>
        <?php endif ?>

        <?php if (is(['ADMINISTRADOR', 'ODONTOLOGO', 'PACIENTE'])) : ?>
            <!-- Menu Tratamiento -->
            <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-tooth"></i>
                    <p>
                        Tratamiento
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="<?= base_url('/tratamiento'); ?>" class="nav-link menu--link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Ver Pacientes</p>
                        </a>
                    </li>
                </ul>
            </li>
        <?php endif ?>

        <?php if (is(['ADMINISTRADOR', 'ODONTOLOGO', 'PACIENTE'])) : ?>
            <!-- Menu Agenda  -->
            <li class="nav-item has-treeview">
                <a href="<?= base_url('/agenda'); ?>" class="nav-link menu--link">
                    <i class="nav-icon fas fa-edit"></i>
                    <p>
                        Agenda
                    </p>
                </a>
            </li>
        <?php endif ?>
        <?php if (is(['ADMINISTRADOR'])) : ?>
            <!-- Menu Configuracion -->
            <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-user-cog"></i>
                    <p>
                        Administraci&oacute;n
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="<?= base_url('/roles'); ?>" class="nav-link menu--link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Roles</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url('/usuario'); ?>" class="nav-link menu--link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Usuarios</p>
                        </a>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="<?= base_url('/respaldo'); ?>" class="nav-link menu--link">
                            <i class="fas fa-database"></i>
                            <p>
                                respaldo
                            </p>
                        </a>
                    </li>
                </ul>
            </li>
        <?php endif ?>

    </ul>
</nav>
<!-- /.sidebar-menu -->