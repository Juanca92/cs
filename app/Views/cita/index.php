<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1></h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/home">Inicio</a></li>
                    <li class="breadcrumb-item active">Citas</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="">
                            Cita
                            <button class="btn btn-success btn-sm" id="agregar_cita">
                                <i class="fa fa-plus"></i>
                                Agregar
                            </button>
                            <button class="btn btn-info btn-sm" id="agenda_cita">
                                <i class="fa fa-book"></i>
                                Agenda
                            </button>
                            <button class="btn btn-warning btn-sm" id="horario_cita">
                                <i class="fa fa-clock"></i>
                                Horas
                            </button>
                            <button class="btn btn-info btn-sm" id="imprimir_citas" style="float: right; margin-left: 2px;">
                                <i class="fa fa-print"></i>
                                Imprimir
                            </button>
                            <button type="button" class="btn btn-default btn-sm mr-auto" id="daterange-btn" style="float: right;">
                                <i class="far fa-calendar-alt"></i> <span>Seleccione Rango Fecha</span>
                                <i class="fas fa-caret-down"></i>
                            </button>

                        </h5>
                    </div>
                    <div class="card-body">
                        <!-- /.Contenido de la vista -->
                        <table id="tbl_citas" class="table table-striped table-bordered" cellspacing="0" width="100%">
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
                                    <th>Estado</th>
                                    <th>Registrado</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                        </table>

                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
<!-- /.content -->

<!--  Modal de registro cita-->

<div class="modal fade" id="agregar-cita">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header bg-green">
                <h4 class="modal-title" id="agregar-cita-title"></h4>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="frm_guardar_cita">
                    <!-- Campo numero de citas y tipo de tratamiento-->
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="numero_cita">Numero cita <span class="text-danger">(*)</span>:</label>
                                <input type="text" id="numero_cita" name="numero_cita" class="form-control"
                                    placeholder="seleccione Paciente ->" readonly="" />
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="id_paciente">Paciente<span class="text-danger">(*)</span>:</label>
                                <select class="form-control select2bs4" style="width: 100%;" id="id_paciente"
                                    name="id_paciente">
                                    <option value="">seleccione un Paciente</option>
                                    <?php
                                    foreach ($this->data["paciente"] as $key => $value) {
                                        echo '<option value="' . $value["id_persona"] . '">' . $value["nombre_completo"] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="tipo_tratamiento">tratamiento <span class="text-danger">(*)</span>:</label>
                                <select class="custom-select" id="tipo_tratamiento" name="tipo_tratamiento" required>
                                    <option value="">--seleccione--</option>
                                    <option value="Prevencion">Prevencion</option>
                                    <option value="Restauracion">Restauracion</option>
                                    <option value="Periodoncia">Periodoncia</option>
                                    <option value="Endodoncia">Endodoncia</option>
                                    <option value="Cirujia Bucal">Cirujia Bucal</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="fecha">Fecha Cita<span class="text-danger">(*)</span>:</label>
                                <input type="datepicker " id="fecha" name="fecha" class="form-control "
                                    placeholder="Seleccione la fecha" readonly="" />
                            </div>
                        </div>
                    </div>
                    <!-- fecha hora cita  paciente-->
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="hora_inicio">Hora Inicio<span class="text-danger">(*)</span>:</label>
                                <input type="clockpicker" id="hora_inicio" name="hora_inicio" class="form-control "
                                    data-autoclose="true" placeholder="Seleccione la hora inicio" readonly="" />
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group ">
                                <label for="hora_final">Hora Final<span class="text-danger">(*)</span>:</label>
                                <input type="clockpicker" id="hora_final" name="hora_final" class="form-control"
                                    data-autoclose="true" placeholder="Seleccione la hora final" readonly="" />

                            </div>
                        </div>
                        <input type="hidden" name="id" id="id">
                        <input type="hidden" name="accion" id="accion">
                    </div>
                    <!-- costo-->
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="tipo_atencion">Tipo Atenc&oacute;n <span
                                        class="text-danger">(*)</span>:</label>
                                <select class="custom-select" id="tipo_atencion" name="tipo_atencion">
                                    <option value="costo">--con costo--</option>
                                    <option value="Gratuito">Gratuito</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="costo">Costo <span class="text-danger">(*)</span>:</label>
                                <input type="number" id="costo" name="costo" step="0000.000" class="form-control" />
                            </div>
                        </div>
                    </div>
                    <!--  odontologo-->
                    <div class="row">

                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="id_odontologo">Odont&oacute;logo <span
                                        class="text-danger">(*)</span>:</label>
                                <select class="form-control select2bs4" style="width: 100%;" id="id_odontologo"
                                    name="id_odontologo">
                                    <!-- <option value="">-- Seleccione Ocupaci&oacute;n --</option> -->
                                    <option value="">seleccione un Odontologo</option>
                                    <?php
                                    foreach ($this->data["odontologo"] as $key => $value) {
                                        echo '<option value="' . $value["id_persona"] . '">' . $value["nombre_completo"] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- Observacion -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="observacion">Observacion<span class="text-danger">(*)</span>:</label>
                                <textarea class="form-control" id="observacion" name="observacion" style="overflow:auto;resize:none" rows="2"
                                    placeholder="Describa..."></textarea>
                            </div>
                        </div>
                    </div>
                    <!-- Estatus -->
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="estatus">Estatus<span class="text-danger">(*)</span>:</label>
                                <select class="custom-select" id="estatus" name="estatus">
                                    <option value="">--seleccione--</option>
                                    <option value="PENDIENTE">Pendiente</option>
                                    <option value="CANCELADA">Cancelada</option>
                                    <option value="ATENDIDA">Atendida</option>
                                </select>
                            </div>
                        </div>
                    </div>


                    <div class="panel-footer text-right">
                        <button class="btn btn-default" id="btn-cerrar" data-dismiss="modal"
                            type="button">Cerrar</button>
                        <button type="submit" id="btn-guardar-cita" class="btn btn-success">Guardar</button>
                    </div>

                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!--  Modal  calendar-->
<div class="modal fade" id="agenda">
    <div class="modal-dialog modal-xl ">
        <div class="modal-content">
            <div class="modal-header bg-blue bg-draggable">
                <h4 class="modal-title" id="agenda-title"></h4>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <!-- cuerpo-->
                <div class="col-12">
                    <div id="calendar_fecha" class="card" style="margin: 0px;">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modal-event" tabindex="-1" role="dialog" aria-labelledby="modal-eventLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header bg-yellow bg-draggable">
                <h4 class="modal-title" id="event-title"></h4>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- cuerpo-->
            <div class="modal-body">
                <label>Descripcion</label>
                <div id="event-description"></div>
                <label>hora de cita</label>
                <div id="event-start"></div>
                <label>Odontologo a atender</label>
                <div id="event-doctor"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
</div>

<!--  Modal de horario-->

<div class="modal fade" id="horario" tabindex="-1">
    <div class="modal-dialog modal-lg ">
        <div class="modal-content">
            <div class="modal-header bg-yellow bg-draggable">
                <h4 class="modal-title" id="horario-title"></h4>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- cuerpo-->
                <div class="col-sm-12">
                    <div id="calendar_hora" class="card" style="margin: 0px;">
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal_imprimir_citas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="">Imprimir Listado de Citas M&eacute;dicas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="modal-body-citas">

            </div>
        </div>
    </div>
</div>