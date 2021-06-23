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
                <div class="card " id="tabla_paciente">
                    <div class="card-header">
                        <h3 class="card-title">
                            Paciente
                            <button class="btn btn-success btn-sm" id="agregar_paciente">
                                <i class="fa fa-plus"></i>
                                Agregar
                            </button>
                            <button class="btn btn-info btn-sm" id="imprimir_pacientes">
                                <i class="fa fa-print"></i>
                                Imprimir
                            </button>
                        </h3>
                    </div>
                    <div class="card-body">
                        <!-- /.Contenido de la vista -->
                        <table id="tbl_pacientes" class="table table-striped table-bordered" cellspacing="0"
                            width="100%">
                            <thead>
                                <tr>
                                    <th width="5%">#</th>
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
<div class="modal fade" id="agregar-paciente" id="modal_paciente">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-blue">
                <h4 class="modal-title" id="agregar-paciente-title"></h4>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="frm_guardar_paciente">
                    <!-- Campos de Ci y Expedido -->
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="ci">CI <span class="text-danger">(*)</span>:</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <i class="fas fa-id-card"></i>
                                        </div>
                                    </div>
                                    <input type="text" id="ci" name="ci" class="form-control" placeholder="CI ..">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="expedido">Expedido <span class="text-danger">(*)</span>:</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <i class="fas fa-list-alt"></i>
                                        </div>
                                    </div>
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
                    </div>
                    <!-- Campo Nombres -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="nombres">Nombres <span class="text-danger">(*)</span>:</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <i class="fas fa-user"></i>
                                        </div>
                                    </div>
                                    <input type="text" class="form-control" id="nombres" name="nombres"
                                        placeholder="Nombres" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Campos Paterno y Materno -->
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="paterno">Paterno <span class="text-danger">(*)</span>:</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <i class="fas fa-user"></i>
                                        </div>
                                    </div>
                                    <input type="text" id="paterno" name="paterno" class="form-control"
                                        placeholder="Apellido Paterno">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="materno">Materno <span class="text-danger">(*)</span>:</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <i class="fas fa-user"></i>
                                        </div>
                                    </div>
                                    <input type="text" id="materno" name="materno" class="form-control"
                                        placeholder="Apellido Materno">
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="id" id="id">
                        <input type="hidden" name="accion" id="accion">
                    </div>
                    <!-- sexo y lugar de Nacimiento -->
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="sexo">Genero<span class="text-danger">(*)</span>:</label>
                                <div>
                                    <label for="sexo">Masculino</label>
                                    <input type="radio" name="sexo" value="masculino"><br>
                                    <label for="sexo">Femenino</label>
                                    <input type="radio" name="sexo" value="femenino">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="lugar_nacimiento">Lugar de Nacimiento <span
                                        class="text-danger">(*)</span>:</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <i class="fas fa-place-of-worship"></i>
                                        </div>
                                    </div>
                                    <input type="text" id="lugar_nacimiento" name="lugar_nacimiento"
                                        class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Celular y Fecha de Nacimiento -->
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="celular">Celular <span class="text-danger">(*)</span>:</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <i class="fas fa-tty"></i>
                                        </div>
                                    </div>
                                    <input type="number" id="celular" name="celular" class="form-control"
                                        placeholder="Celular">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="fecha_nacimiento">Fecha Nacimiento <span
                                        class="text-danger">(*)</span>:</label>
                                    <input type="datepicker" id="fecha_nacimiento" name="fecha_nacimiento"
                                        class="form-control" readonly="">
                            </div>
                        </div>
                    </div>
                    <!-- Domicilio -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="domicilio">Domicilio <span class="text-danger">(*)</span>:</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <i class="fas fa-map-marked"></i>
                                        </div>
                                    </div>
                                    <textarea class="form-control" id="domicilio" name="domicilio"
                                        style="overflow:auto;resize:none" rows="2"
                                        placeholder="Domicilio ..."></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--ocupacion y  Estatus-->
                    <div class="row">
                        <div class="col-lg-7">
                            <div class="form-group">
                                <label for="ocupacion">Ocupaci&oacute;n <span class="text-danger">(*)</span>:</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <i class="fas fa-diagnoses"></i>
                                        </div>
                                    </div>
                                
                                    <select class="form-control " id="id_ocupacion"
                                        name="id_ocupacion">
                                        <option value="">-- Seleccione Ocupaci&oacute;n --</option> 
                                        <?php
                                    foreach ($this->data["ocupaciones"] as $key => $value) {
                                        echo '<option value="' . $value["id_ocupacion"] . '">' . $value["nombre"] . '</option>';
                                    }
                                    ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="form-group">
                                <label for="estatus">Estado<span class="text-danger">(*)</span>:</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <i class="fas fa-toggle-on"></i>
                                        </div>
                                    </div>
                                    <select class="custom-select" id="estatus" name="estatus" required>
                                        <option value="">-- Seleccione --</option>
                                        <option value="ACTIVO">Activo</option>
                                        <option value="INACTIVO">Inactivo</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="panel-footer text-right">
                        <button class="btn btn-default" id="btn-cerrar" data-dismiss="modal"
                            type="button">Cerrar</button>
                        <button type="submit" id="btn-guardar-paciente" class="btn btn-primary"></button>
                    </div>

                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<div class="modal fade" id="modal_imprimir_paciente" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="">Imprimir Listado de Pacientes</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="modal-body-paciente">

            </div>
        </div>
    </div>
</div>