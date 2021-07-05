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
            <div class="col-lg-4 col-6">
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
                        <a type="button" id="btn_reporte_odontologo" class="small-box-footer"> Imprimir <i class="fas fa-print"></i></a>
                    <?php endif ?>
                </div>
            </div>

            <?php if (is(['ODONTOLOGO', 'ADMINISTRADOR'])) : ?>
                <div class="col-lg-4 col-6">
                    <!-- small box -->
                    <div class="small-box bg-primary">
                        <div class="inner">
                            <h3>Reporte de:<sup style="font-size: 20px"></sup></h3>

                            <p>Pacientes</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-file"></i>
                        </div>
                        <a type="button" id="btn_reporte_paciente" class="small-box-footer"> Imprimir <i class="fas fa-print"></i></a>
                    </div>
                </div>
            <?php endif ?>
        </div>
    </div>

    <div class="row justify-content-center mb-2">
        <button type="button" class="btn btn-default btn-sm" id="daterange-btn">
            <i class="far fa-calendar-alt"></i> <span>Seleccione Rango
                Fecha</span>
            <i class="fas fa-caret-down"></i>
        </button>
    </div>

    <div class="row justify-content-center">

        <?php if (is(['ODONTOLOGO', 'ADMINISTRADOR'])) : ?>

            <div class="col-lg-4 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>Reporte de:</h3>

                        <p>citas m&eacute;dicas</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-file"></i>
                    </div>
                    <a type="button" id="btn_cita_medica" class="small-box-footer"> Imprimir
                        <i class="fas fa-print"></i></a>
                </div>
            </div>

            <div class="col-lg-4 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>Reporte de:</h3>

                        <p>historial odont&oacute;logo</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-file"></i>
                    </div>
                    <a type="button" id="btn_historial_odontologico" class="small-box-footer"> Imprimir
                        <i class="fas fa-print"></i></a>
                </div>
            </div>

        <?php endif ?>
    </div>
    </div>
</section>

<div class="modal fade" id="reporte" tabindex="-1" role="dialog" aria-labelledby="modal-eventLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-green bg-draggable">
                <h4 class="modal-title" id="reporte-title"></h4>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- cuerpo-->
            <div class="modal-body" id="reporte-body">

            </div>
        </div>
    </div>
</div>