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
                    <li class="breadcrumb-item active">Gestion de Citas</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<!-- Main content -->
<section class="content" id="content">
    <div class="container-fluid">
        <div class="row">            
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header p-2">
                        <ul class="nav nav-pills">
                            <li class="nav-item"><a class="nav-link active" href="#Pendientes" data-toggle="tab">Pendientes</a></li>
                            <li class="nav-item"><a class="nav-link" href="#Atendidas" data-toggle="tab">Atendidas</a></li>
                            <li class="nav-item"><a class="nav-link" href="#Canceladas" data-toggle="tab">Canceladas</a></li>
                        </ul>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="active tab-pane" id="Pendientes">
                                <!-- Post -->
                               
                                <table id="tbl_citas_pendientes" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th width="5%">#</th>
                                            <th># cita</th>
                                            <th>Paciente</th>
                                            <th>Tratamiento</th>
                                            <th>Observaci&oacute;n</th>
                                            <th>Fecha</th>
                                            <th>Hora</th>
                                            <th>Hora final</th>
                                            <th>Costo</th>                                    
                                            <th>Odont&oacute;logo</th>
                                            <th>Estado</th>
                                            <th>Registrado</th>
                                        </tr>
                                    </thead>
                                </table>
                                
                            </div>
                            <!-- /.tab-pane -->
                            <div class="tab-pane" id="Atendidas">
                                <!-- The timeline -->
                                <table id="tbl_citas_atendidas" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                                <th width="5%">#</th>
                                                <th># cita</th>
                                                <th>Paciente</th>
                                                <th>Tratamiento</th>
                                                <th>Observaci&oacute;n</th>
                                                <th>Fecha</th>
                                                <th>Hora</th>
                                                <th>Hora final</th>
                                                <th>Costo</th>                                    
                                                <th>Odont&oacute;logo</th>
                                                <th>Estado</th>
                                                <th>Registrado</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                            <!-- /.tab-pane -->

                            <div class=" tab-pane" id="Canceladas">
                            <table id="tbl_citas_canceladas" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                         <tr>
                                            <th width="5%">#</th>
                                            <th># cita</th>
                                            <th>Paciente</th>
                                            <th>Tratamiento</th>
                                            <th>Observaci&oacute;n</th>
                                            <th>Fecha</th>
                                            <th>Hora</th>
                                            <th>Hora final</th>
                                            <th>Costo</th>                                    
                                            <th>Odont&oacute;logo</th>
                                            <th>Estado</th>
                                            <th>Registrado</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                            <!-- /.tab-pane -->
                        </div>
                        <!-- /.tab-content -->
                    </div><!-- /.card-body -->
                </div>
                <!-- /.nav-tabs-custom -->
            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->

