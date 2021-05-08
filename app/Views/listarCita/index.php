<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1></h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/">Inicio</a></li>
                    <li class="breadcrumb-item active">listado de pacientes</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="content" id="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            <h2 align="center"> Pacientes atendidos por el odontologo </h2>
                        </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="tab-content">
                            <!-- Post -->
                            <table id="tbl_citas_ver" class="table table-striped table-bordered" cellspacing="0"
                                width="100%">
                                <thead>
                                    <tr>
                                        <th width="5%">#</th>
                                        <th># cita</th>
                                        <th>Paciente</th>
                                        <th>Tratamiento</th>
                                        <th>Observaci&oacute;n</th>
                                        <th>Fecha</th>
                                        <th>Hora</th>
                                        <th>Hora Final</th>
                                        <th>Costo</th>
                                        <th>Odont&oacute;logo</th>
                                        <th>Estatus</th>
                                        <th>Registrado</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!--  Modal de registro paciente -->
<div class="modal fade" id="listado-odontologos">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-blue">
                <h4 class="modal-title" id="listado-odontologo-title"></h4>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table id="tbl_odontologos_ver" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th width="5%">#</th>
                            <th>CI</th>
                            <th>Nombres</th>
                            <th>Celular</th>
                            <th>Nacimiento</th>
                            <th>Domicilio</th>
                            <th>Turno</th>
                            <th>Ingreso</th>
                            <th>Estatus</th>
                            <th>Registrado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>