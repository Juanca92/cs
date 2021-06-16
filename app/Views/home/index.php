<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h4 class="m-0 text-dark">Centro de Salud San Pedro</h4>
            </div>
            <div class="col-sm-6 pt-0">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/">Inicio</a></li>
                </ol>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">

            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>3</h3>

                        <p>Doctores</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-user-md"></i>
                    </div>
                    <a href="<?= base_url('/odontologo/index') ?>" class="small-box-footer">mas informacion<i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-primary">
                    <div class="inner">
                        <h3>30<sup style="font-size: 20px">%</sup></h3>

                        <p>Pacientes</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <a href="<?= base_url('/paciente/index') ?>" class="small-box-footer">mas informacion<i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>20</h3>

                        <p>Pacientes Pendientes</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-user-injured"></i>
                    </div>
                    <a href="<?= base_url('/gestionarCita/index/tbl_citas_pendientes') ?>" class="small-box-footer">mas
                        informacion <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>10</h3>

                        <p>Pacientes atendidos </p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-user-injured"></i>
                    </div>
                    <a href="<?= base_url('/gestionarCita/index/tbl_citas_atendidas') ?>" class="small-box-footer">mas
                        informacion<i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

        </div>
    </div>
</section>
<!--seccion de calendario-->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card" id="calendario_tabla">
                    <div class="card-body">
                        <!-- /.Contenido de la vista -->
                        <div class="container" id="calendario_citas">
                            <h1 align="center">Calendario de Citas Medicas</h1>
                            <div id="calendar" class="card" style="padding: 0px;">
                            </div>

                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
<!-- graficos-->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <!-- BAR CHART -->
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Grafica de barras</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="chart">
                            <canvas id="barChart" style="min-height: 300px; height: 250px; max-height: 250px; max-width: 100%  ;"></canvas>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- /.col (LEFT) -->
        <div class="row">
            <div class="col-md-12">
                <!-- DONUT CHART -->
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Grafico de anillo</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                        </div>
                    </div>
                    <div class="card-body">
                        <canvas id="donutChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100% align:center;"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>