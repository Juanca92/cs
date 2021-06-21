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

                    <input type="hidden" name="id" id="id">

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
                        <button type="submit" id="btn-guardar-password" class="btn btn-primary"></button>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>