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
                    <li class="breadcrumb-item active">Odont&oacute;logos</li>
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
                            Odont&oacute;logos
                            <button class="btn btn-success btn-sm" id="agregar_odontologo">
                                <i class="fa fa-plus"></i>
                                Agregar
                            </button>
                            <button class="btn btn-info btn-sm" id="imprimir_odontologo">
                                <i class="fa fa-print"></i>
                                Imprimir
                            </button>
                        </h3>
                    </div>
                    <div class="card-body">
                        <!-- /.Contenido de la vista -->
                        <table id="tbl_odontologos" class="table table-striped table-bordered" cellspacing="0" width="100%">
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

<!--  Modal de registro odontologo -->
<div class="modal fade" id="agregar-odontologo">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-blue">
                <h4 class="modal-title" id="agregar-odontologo-title"></h4>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="frm_guardar_odontologo">
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
                                    <option value="CH">CH</option>
                                    <option value="LP">LP</option>
                                    <option value="CB">CB</option>
                                    <option value="OR">OR</option>
                                    <option value="PT">PT</option>
                                    <option value="SC">SC</option>
                                    <option value="PA">PA</option>
                                    <option value="TJ">TJ</option>
                                    <option value="BN">BN</option>
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
                                <label for="materno">Materno :</label>
                                <input type="text" id="materno" name="materno" class="form-control" placeholder="Apellido Materno">
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
                        <input type="hidden" name="id" id="id">
                        <input type="hidden" name="accion" id="accion">
                    </div>
                    <!-- Turno y gestion de ingreso -->
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="turno">Turno <span class="text-danger">(*)</span>:</label>
                                <select class="form-control select2bs4" style="width: 100%;" id="turno" name="turno">
                                    <option value="">-- Seleccione Turno --</option>
                                    <option value="MAÑANA">MAÑANA</option>
                                    <option value="TARDE">TARDE</option>
                                    <option value="MAÑANA-TARDE">MAÑANA-TARDE</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="gestion">Gesti&oacute;n Ingreso <span class="text-danger">(*)</span>:</label>
                                <input type="text" id="gestion" name="gestion" class="form-control">
                            </div>
                        </div>
                    </div>
                    <!-- Domicilio -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="domicilio">Domicilio <span class="text-danger">(*)</span>:</label>
                                <textarea class="form-control" id="domicilio" name="domicilio" style="overflow:auto;resize:none" rows="2" placeholder="Domicilio ..."></textarea>
                            </div>
                        </div>
                    </div>
                    <!-- Estatus -->
                    <div class="row">
                        <div class="col-lg-5">
                            <div class="form-group">
                                <label for="estatus">Estatus<span class="text-danger">(*)</span>:</label>
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
                        <button type="submit" id="btn-guardar-odontologo" class="btn btn-primary"></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal_imprimir_odontologo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="">Imprimir Listado de Odont&oacute;logos</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="modal-body-odontologo">

            </div>
        </div>
    </div>
</div>