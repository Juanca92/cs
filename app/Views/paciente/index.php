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
                    <li class="breadcrumb-item active">Pacientes</li>
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
                            Paciente
                            <button class="btn btn-success btn-sm" id="agregar_paciente">
                                <i class="fa fa-plus"></i>
                                Agregar
                            </button>
                        </h3>
                    </div>
                    <div class="card-body">
                        <!-- /.Contenido de la vista -->
                        <table id="tbl_pacientes" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th width="5%">#</th>
                                    <th>Foto</th>
                                    <th>CI</th>
                                    <th>Nombres</th>
                                    <th>sexo</th>
                                    <th>Lugar nacimiento</th>
                                    <th>Celular</th>
                                    <th>Nacimiento</th>
                                    <th>Domicilio</th>
                                    <th>Ocupacion</th>
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

<!--  Modal de registro paciente -->
<div class="modal fade" id="agregar-paciente">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-blue">
                <h4 class="modal-title" id="agregar-paciente-title"></h4>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="frm_guardar_paciente">

                    <!-- Campos para la foto -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                            <label for="foto">Foto <span class="text-danger">(*)</span>:</label>
                            <input type="file" id="foto" name="foto" class="form-control" >
                            </div>
                        </div>
                        <input type="hidden" name="id" id="id">
                        <input type="hidden" name="accion" id="accion">
                    </div>
                    <!-- Campos de Ci y Expedido -->
                    <div class="row">
                        <div class="col-lg-7">
                            <div class="form-group">
                                <label for="ci">CI <span class="text-danger">(*)</span>:</label>
                                <input type="text" id="ci" name="ci" class="form-control" placeholder="CI ..">
                            </div>
                        </div>

                        <div class="col-lg-5">
                            <div class="form-group">
                                <label for="expedido">Expedido <span class="text-danger">(*)</span>:</label>
                                <select class="custom-select" id="expedido" name="expedido" required>
                                    <option value="">-- Expedido en --</option>
                                    <option value="CH">LP</option>
                                    <option value="LP">OR</option>
                                    <option value="CB">CB</option>
                                    <option value="OR">PT</option>
                                    <option value="PT">CH</option>
                                    <option value="SC">TJ</option>
                                    <option value="PA">SC</option>
                                    <option value="TJ">BE</option>
                                    <option value="BN">PD</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Campo Nombres -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="nombres">Nombres <span class="text-danger">(*)</span>:</label>
                                <input type="text" class="form-control" id="nombres" name="nombres" placeholder="Nombres" required>
                            </div>
                        </div>
                    </div>

                    <!-- Campos Paterno y Materno -->
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="paterno">Paterno <span class="text-danger">(*)</span>:</label>
                                <input type="text" id="paterno" name="paterno" class="form-control" placeholder="Apellido Paterno">
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="materno">Materno <span class="text-danger">(*)</span>:</label>
                                <input type="text" id="materno" name="materno" class="form-control" placeholder="Apellido Materno">
                            </div>
                        </div>
                    </div>
                    <!-- sexo y lugar de Nacimiento -->
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="sexo">Genero<span class="text-danger">(*)</span>:</label>
                                <div>
                                    <label for="sexo">Masculino</label>
                                    <input type="radio" name="sexo" value="masculino">
                                    <label for="sexo">Femenino</label>
                                    <input type="radio" name="sexo" value="femenino">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="lugar_nacimiento">Lugar de Nacimiento <span class="text-danger">(*)</span>:</label>
                                <input type="text" id="lugar_nacimiento" name="lugar_nacimiento" class="form-control">
                            </div>
                        </div>
                    </div>

                    <!-- Celular y Fecha de Nacimiento -->
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="celular">Celular <span class="text-danger">(*)</span>:</label>
                                <input type="number" id="celular" name="celular" class="form-control" placeholder="Celular">
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="fecha_nacimiento">Fecha Nacimiento <span class="text-danger">(*)</span>:</label>
                                <input type="datepicker" id="fecha_nacimiento" name="fecha_nacimiento" class="form-control" readonly="">
                            </div>
                        </div>
                    </div>
                    <!-- Ocupacion -->


                    <!-- Domicilio -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="domicilio">Domicilio <span class="text-danger">(*)</span>:</label>
                                <textarea class="form-control" id="domicilio" name="domicilio" style="overflow:auto;resize:none" rows="2" placeholder="Domicilio ..."></textarea>
                                
                            </div>
                        </div>
                    </div>
                    <!--ocupacion y  Estatus-->
                    <div class="row">
                        <div class="col-lg-7">
                            <div class="form-group">
                                <label for="ocupacion">Ocupaci&oacute;n <span class="text-danger">(*)</span>:</label>
                                <select class="form-control select2bs4" style="width: 100%;" id="id_ocupacion" name="id_ocupacion">
                                    <!-- <option value="">-- Seleccione Ocupaci&oacute;n --</option> -->
                                    <?php
                                    foreach ($this->data["ocupaciones"] as $key => $value) {
                                        echo '<option value="' . $value["id_ocupacion"] . '">' . $value["nombre"] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-5">
                            <div class="form-group">
                                <label for="estatus">Estado<span class="text-danger">(*)</span>:</label>
                                <select class="custom-select" id="estatus" name="estatus" required>
                                    <option value="">-- Seleccione --</option>
                                    <option value="ACTIVO">Activo</option>
                                    <option value="INACTIVO">Inactivo</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="panel-footer text-right">
                        <button class="btn btn-default" id="btn-cerrar" data-dismiss="modal" type="button">Cerrar</button>
                        <button type="submit" id="btn-guardar-paciente" class="btn btn-primary"></button>
                    </div>

                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>