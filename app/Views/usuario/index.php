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
                    <li class="breadcrumb-item active">Usuarios</li>
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
                            Usuarios
                        </h3>
                    </div>
                    <div class="card-body">
                        <!-- /.Contenido de la vista -->
                        <table id="tbl_usuarios" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th width="5%">#</th>
                                    <th>Nombres</th>
                                    <th>Paterno</th>
                                    <th>Materno</th>
                                    <th>ci</th>
                                    <th>Exp.</th>
                                    <th>celular</th>
                                    <th>foto</th>
                                    <th>Grupo</th>
                                    <th>usuario</th>
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
<div class="modal fade" id="editar-usuario">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-blue">
                <h5 class="modal-title" id="editar-usuario-title"></h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="frm_guardar_usuario">

                    <!-- Campos de Ci y Expedido -->
                    <div class="row">
                        <div class="col-lg-7">
                            <div class="form-group">
                                <label for="ci">CI <span class="text-danger">(*)</span>:</label>
                                <input type="text" id="ci" name="ci" class="form-control">
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
                                <input type="text" class="form-control" id="nombres" name="nombres" required>
                            </div>
                        </div>
                    </div>

                    <!-- Campos Paterno y Materno -->
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="paterno">Paterno <span class="text-danger">(*)</span>:</label>
                                <input type="text" id="paterno" name="paterno" class="form-control" />
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="materno">Materno:</label>
                                <input type="text" id="materno" name="materno" class="form-control">
                            </div>
                        </div>
                    </div>
                    <!-- sexo y lugar de Nacimiento -->
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="sexo">Sexo<span class="text-danger">(*)</span>:</label>
                                <div>
                                    <input type="radio" name="sexo" value="masculino">
                                    <label for="sexo">Masculino</label>
                                    <br>
                                    <input type="radio" name="sexo" value="femenina">
                                    <label for="sexo">Femenino</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="lugar_nacimiento">Lugar de Nacimiento:</label>
                                <input type="text" id="lugar_nacimiento" name="lugar_nacimiento" class="form-control">
                            </div>
                        </div>
                        <input type="hidden" name="id" id="id">
                        <input type="hidden" name="accion" id="accion">

                    </div>

                    <!-- Celular y Fecha de Nacimiento -->
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="celular">Celular:</label>
                                <input type="number" id="celular" name="celular" class="form-control" />
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="fecha_nacimiento">Fecha Nacimiento:</label>
                                <input type="datepicker" id="fecha_nacimiento" name="fecha_nacimiento" class="form-control" />
                            </div>
                        </div>
                        <input type="hidden" name="id" id="id">
                        <input type="hidden" name="accion" id="accion">
                    </div>
                    <!-- Ocupacion -->


                    <!-- Domicilio -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="domicilio">Domicilio:</label>
                                <textarea class="form-control" id="domicilio" name="domicilio" rows="1"></textarea>
                            </div>
                        </div>
                    </div>
                    <!--ocupacion y  Estatus-->
                    <div class="row">
                        <div class="col-lg-7">
                            <div class="form-group">
                                <label for="ocupacion">Ocupaci&oacute;n:</label>
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
                                <select class="custom-select" id="estado" name="estado" required>
                                    <option value="">-- Seleccione --</option>
                                    <option value="ACTIVO">Activo</option>
                                    <option value="INACTIVO">Inactivo</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Campo usuario -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="usuario">usuario <span class="text-danger">(*)</span>:</label>
                                <input type="text" id="usuario" name="usuario" class="form-control">
                            </div>
                        </div>

                    </div>

                    <!-- Campos usuario y password -->
                    <div class="row">

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="clave">Clave <span class="text-danger">(*)</span>:</label>
                                <input type="password" id="clave" name="clave" class="form-control">
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="repita_clave">Repita repita_clave <span class="text-danger">(*)</span>:</label>
                                <input type="password" id="repita_clave" name="repita_clave" class="form-control">
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