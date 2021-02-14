<!-- Sidebar Menu -->
<nav class="mt-3">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
        with font-awesome or any other icon font library -->
        <li class="nav-header">
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
        <li class="nav-item">
            <a href="<?= base_url('/paciente'); ?>" class="nav-link menu--link">
                <i class="nav-icon fas fa-users"></i>
                <p>Pacientes</p>
            </a>
        </li>

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
            </ul>
        </li>

        <!-- Menu Cita Medica -->
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
                    <a href="#" class="nav-link menu--link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Cita M&eacute;dica</p>
                    </a>
                </li>            
            </ul>
        </li>

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
                        <p>Tratamiento</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link menu--link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Odontograma</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link menu--link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Procedimiento</p>
                    </a>
                </li>
            </ul>
        </li>

        <!-- Menu Agenda  -->
        <li class="nav-item has-treeview">
            <a href="#" class="nav-link menu--link">
                <i class="nav-icon fas fa-edit"></i>
                <p>
                    Agenda
                </p>
            </a>
        </li>

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
                    <a href="../tables/simple.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Configuraci&oacute;n</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="../tables/data.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Usuarios</p>
                    </a>
                </li>
            </ul>
        </li>   

    </ul>
</nav>
<!-- /.sidebar-menu -->