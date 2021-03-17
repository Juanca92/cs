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
                        <h3 class="card-title">
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
                        </h3>
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
                                    <th>Costo</th>                                    
                                    <th>Odont&oacute;logo</th>
                                    <th>Estatus</th>
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
    <div class="modal-dialog">
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
                                <input type="text" id="numero_cita" name="numero_cita" class="form-control" placeholder="seleccione Paciente ->"readonly=""/>
                            </div>                        
                        </div>
                        <div class="col-lg-6">                        
                            <div class="form-group">
                             <label for="id_paciente">Paciente<span class="text-danger">(*)</span>:</label>
                                 <select class="form-control select2bs4" style="width: 100%;" id="id_paciente" name="id_paciente" >
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
                     <div class="col-lg-12">                        
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
                    </div>
                    <!-- fecha hora cita  paciente-->
                    <div class="row">
                        <div class="col-lg-6">                        
                            <div class="form-group">
                                <label for="fecha">Fecha Cita<span class="text-danger">(*)</span>:</label>
                                <input type="datepicker " id="fecha" name="fecha" class="form-control " placeholder="Seleccione la fecha" readonly="" />
                            </div>                        
                        </div>

                        <div class="col-lg-6"> 
                            <div class="form-group ">
                                <label for="hora">Hora Cita<span class="text-danger">(*)</span>:</label>
                                <input type="clockpicker" id="hora" name="hora" class="form-control"
                                 data-autoclose="true" placeholder="Seleccione la hora" readonly=""/>

                            </div>  
                      </div>
                        <input type="hidden" name="id" id="id">
                        <input type="hidden" name="accion" id="accion">
                    </div>
                    <!-- costo-->
                    <div class="row">
                        <div class="col-lg-6">                        
                            <div class="form-group">
                                <label for="tipo_atencion">Tipo Atenc&oacute;n <span class="text-danger">(*)</span>:</label>
                                <select class="custom-select" id="tipo_atencion" name="tipo_atencion"> 
                                    <option value="costo">--con costo--</option>
                                    <option value="Gratuito">Gratuito</option>
                                </select>
                            </div>                        
                        </div>

                        <div class="col-lg-6">                        
                            <div class="form-group">
                                <label for="costo">Costo <span class="text-danger">(*)</span>:</label>
                                <input type="number" id="costo" name="costo" step="0000.000" class="form-control"/>
                            </div>                        
                        </div>

                    </div>
                    <!--  odontologo-->
                    <div class="row">
                        
                        <div class="col-lg-12">                        
                            <div class="form-group">
                             <label for="id_odontologo">Odont&oacute;logo <span class="text-danger">(*)</span>:</label>
                                <select class="form-control select2bs4" style="width: 100%;" id="id_odontologo" name="id_odontologo" >
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
                                <textarea class="form-control" id="observacion" name="observacion" rows="3" placeholder="Describa..."></textarea>
                            </div>                        
                        </div>
                    </div>


                    <div class="panel-footer text-right">
                        <button class="btn btn-default" id="btn-cerrar" data-dismiss="modal" type="button">Cerrar</button>
                        <button type="submit" id="btn-guardar-cita" class="btn btn-success">Guardar</button>
                    </div>

                </form>        
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!--  Modal de registro calendar-->
<div class="modal fade" id="agenda" tabindex="-1">
    <div class="modal-dialog modal-xl " >
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
                    <div id="calendar" class="card" style="padding: 0px;">
                    </div>                      
                    </div> 
                </div>
            </div>
     </div>
</div>
<div class="modal fade" id="event-description" >
    <div class="modal-dialog modal-lg " >
        <div class="modal-content">
            <div class="modal-header bg-blue bg-draggable">
                <h4 class="modal-title" id="event-description-title"></h4>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>
                 <!-- cuerpo--> 
                 <div class="modal-body">
                    <div id="event-description"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
                </div>
            </div>
     </div>
</div>

<!--  Modal de horario-->

<div class="modal fade" id="horario" tabindex="-1">
    <div class="modal-dialog modal-lg " >
        <div class="modal-content">
            <div class="modal-header bg-blue bg-draggable">
                <h4 class="modal-title" id="horario-title"></h4>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                 <!-- Campo cuerpo--> 
                 <h2 align="center">Horas disponibles</h2>
                 <table id="" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Horas</th>
                                    <th>Disponibilidad</th>
                                </tr>
                            </thead>
                        </table>  
                </div>
            </div>
     </div>
</div>