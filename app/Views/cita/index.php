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
                            <button class="btn btn-success btn-sm">
                            <div id="calendar" class="col-md-12">
                                <i class="fa fa-plus"></i>
                                Agenda
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
            <div class="modal-header bg-blue">
                <h4 class="modal-title" id="agregar-cita-title"></h4>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                <form id="frm_guardar_cita">

                    <!-- Campo numero de citas y tipo de tratamiento-->    
                    <div class="row">
                        <div class="col-lg-5">                        
                            <div class="form-group">
                                <label for="numero_cita"># de Cita <span class="text-danger">(*)</span>:</label>
                                <input type="text" class="form-control" id="numero_cita" name="numero_cita"  placeholder="numero cita" required>
                            </div>                        
                        </div>

                     <div class="col-lg-7">                        
                            <div class="form-group">
                             <label for="tipo_tratamiento">tratamiento <span class="text-danger">(*)</span>:</label>
                                <select class="custom-select" id="tipo_tratamiento" name="tipo_tratamiento" required>
                                    <option value="">--seleccione--</option>
                                    <option value="Prevencion">Prevencion</option>
                                    <option value="Restauracion">Restauracion</option>
                                    <option value="Periodo&oacute;ncia">Periodoncia</option>
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
                                <input type="date" id="fecha" name="fecha" class="form-control " />
                            </div>                        
                        </div>
                        <input type="hidden" name="id" id="id">
                        <input type="hidden" name="accion" id="accion">

                        <div class="col-lg-6"> 
                         <label for="fecha">Hora Cita<span class="text-danger">(*)</span>:</label>
                                <input type="time" id="hora" name="hora" class="form-control clockpicker" />                      
                        </div>
                    </div>
                    <!-- costo-->
                    <div class="row">
                     <div class="col-lg-12">                        
                         <div class="form-group">
                             <label for="costo">Costo <span class="text-danger">(*)</span>:</label>
                                <select class="custom-select" id="costo" name="costo" required>
                                    <option value="">--seleccione--</option>
                                    <option value="Gratuito">Gratuito</option>
                                </select>
                            </div>                        
                        </div>
                    </div>
                    <!-- paciente y odontologo-->
                    <div class="row">
                        <div class="col-lg-6">                        
                            <div class="form-group">
                             <label for="id_paciente">Paciente<span class="text-danger">(*)</span>:</label>
                                 <select class="form-control select2bs4" style="width: 100%;" id="id_paciente" name="id_paciente">
                                  <?php
                                    foreach ($this->data["paciente"] as $key => $value) {
                                        echo '<option value="' . $value["id_persona"] . '">' . $value["nombre_completo"] . '</option>';
                                    }
                                 ?>
                            </select>
                            </div>                       
                        </div>
                        <div class="col-lg-6">                        
                            <div class="form-group">
                             <label for="id_odontologo">Odont&oacute;logo <span class="text-danger">(*)</span>:</label>
                                <select class="form-control select2bs4" style="width: 100%;" id="id_odontologo" name="id_odontologo" >
                                    <!-- <option value="">-- Seleccione Ocupaci&oacute;n --</option> -->
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
                                <textarea class="form-control" id="observacion" name="observacion" rows="1" placeholder="Describa..."></textarea>
                            </div>                        
                        </div>
                    </div>


                    <div class="panel-footer text-right">
                        <button class="btn btn-default" id="btn-cerrar" data-dismiss="modal" type="button">Cerrar</button>
                        <button type="submit" id="btn-guardar-paciente" class="btn btn-primary">Guardar</button>
                    </div>

                </form>        
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
 
