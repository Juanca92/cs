<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h4 class="m-0 text-dark">Centro de Salud San Pedro - seccion de reportes</h4>
            </div>
            <div class="col-sm-6 pt-0">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="">Inicio</a></li>
                </ol>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row justify-content-center">

            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>Reporte de :</h3>
                        <p>Odont&oacute;logos</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-file"></i>
                    </div>
                    <?php if (is(['ODONTOLOGO', 'ADMINISTRADOR'])) : ?>
                    <a href="<?= base_url('/odontologo/index') ?>" class="small-box-footer">imprimir<i class="fas fa-arrow-circle-right"></i></a>
                    <?php endif ?>
                </div>
            </div>
            <?php if (is(['ODONTOLOGO', 'ADMINISTRADOR'])) : ?>

                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-primary">
                        <div class="inner">
                            <h3>Reporte de:<sup style="font-size: 20px"></sup></h3>

                            <p>Pacientes</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-file"></i>
                        </div>
                        <a href="<?= base_url('/paciente/index') ?>" class="small-box-footer">imprimir<i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>Reporte de:</h3>

                            <p>citas m&eacute;dicas</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-file"></i>
                        </div>
                        <a href="<?= base_url('/gestionarCita/index/tbl_citas_pendientes') ?>" class="small-box-footer">imprimir
                            <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>Reporte de:</h3>

                            <p>historial odont&oacute;logo</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-file"></i>
                        </div>
                        <a href="<?= base_url('/gestionarCita/index/tbl_citas_atendidas') ?>" class="small-box-footer">mas
                            <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

            <?php endif ?>
        </div>
    </div>
</section>