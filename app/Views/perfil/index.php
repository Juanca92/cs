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
                    <li class="breadcrumb-item active">Mi perfil</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<!-- Main content -->
<section class="content" id="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <!-- Profile Image -->
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle" id="perfil_foto" src="<?= base_url('img/users/default/default.png'); ?>" alt="User profile picture" />
                        </div>

                        <h3 id="perfil_nombre_completo" class="profile-username text-center"></h3>

                        <p id="perfil_grupo" class="text-muted text-center"></p>

                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>Nacimiento</b> <a id="perfil_nacimiento" class="float-right"></a>
                            </li>
                            <li class="list-group-item">
                                <b>Edad</b> <a id="perfil_edad" class="float-right">40 años</a>
                            </li>
                        </ul>

                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

                <!-- About Me Box -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Acerca de mi</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <strong><i class="fa fa-phone" aria-hidden="true"></i> Celular</strong>

                        <p id="perfil_celular" class="text-muted"></p>

                        <hr>

                        <strong><i class="fas fa-map-marker-alt mr-1"></i> Domicilio</strong>

                        <p id="perfil_domicilio" class="text-muted"></p>

                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header p-2">
                        <ul class="nav nav-pills">
                            <li class="nav-item"><a class="nav-link active" href="#actualizar_datos" data-toggle="tab">Actualizar Datos</a></li>
                            <li class="nav-item"><a class="nav-link" href="#subir_foto" data-toggle="tab">Subir Foto</a></li>
                            <li class="nav-item"><a class="nav-link" href="#cambiar_password" data-toggle="tab">Cambiar Contraseña</a></li>
                        </ul>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane active" id="actualizar_datos">
                                <div class="container">
                                    <form class="form-horizontal" id="frm_actualizar_datos">

                                        <div class="form-group row">
                                            <label for="telefono" class="col-sm-2 col-form-label">Celular</label>
                                            <div class="col-sm-10">
                                                <input type="number" class="form-control" id="telefono" name="telefono" />
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="domicilio" class="col-sm-2 col-form-label">Domicilio</label>
                                            <div class="col-sm-10">
                                                <textarea class="form-control" id="domicilio" name="domicilio" placeholder="Ingrese su direccion"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="offset-sm-2 col-sm-10">
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" id="confirmar_datos" name="confirmar_datos" />
                                                    <label class="form-check-label" for="confirmar_datos"> Confirmo mis datos</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="offset-sm-2 col-sm-10">
                                                <button type="submit" class="btn btn-danger">Actualizar Datos</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- /.tab-pane -->
                            <div class="tab-pane" id="subir_foto">
                                <div class="container">
                                    <form class="form-horizontal" id="frm_actualizar_foto" enctype="multipart/form-data">
                                        <div class="form-group row">
                                            <label for="foto" class="col-sm-2 col-form-label">Foto</label>
                                            <div class="custom-file col-sm-10">
                                                <input type="file" class="custom-file-input" id="foto" name="foto" required />
                                                <label class="custom-file-label" for="foto">Seleccione foto</label>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="" class="col-sm-2 col-form-label"></label>
                                            <img src="<?= base_url('img/users/default/default.png'); ?>" class="previsualizar img" alt="imagen user" width="200px" height="200px" />
                                            <p class="text-muted"> Peso máximo de la foto 2MB</p>
                                        </div>
                                        <div class="form-group row">
                                            <div class="offset-sm-2 col-sm-10">
                                                <button type="submit" class="btn btn-danger">Subir Foto</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- /.tab-pane -->

                            <div class="tab-pane" id="cambiar_password">
                                <form class="form-horizontal" id="frm_cambiar_password" method="post">
                                    <div class="form-group row">
                                        <label for="password_actual" class="col-sm-3 col-form-label">Contraseña Actual</label>
                                        <div class="col-sm-9">
                                            <input type="password" class="form-control" id="password_actual" name="password_actual" placeholder="Ingrese contraseña actual">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="password_nuevo" class="col-sm-3 col-form-label">Contraseña</label>
                                        <div class="col-sm-9">
                                            <input type="password" class="form-control" id="password_nuevo" name="password_nuevo" placeholder="Ingrese nueva contraseña">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="confirmar_password" class="col-sm-3 col-form-label">Repita Contraseña</label>
                                        <div class="col-sm-9">
                                            <input type="password" class="form-control" id="confirmar_password" name="confirmar_password" placeholder="Repita contraseña">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="offset-sm-3 col-sm-9">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="confirmar_cambiar_password">
                                                <label class="form-check-label" for="confirmar_cambiar_password"> Confirmo mis datos</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="offset-sm-3 col-sm-9">
                                            <button type="submit" class="btn btn-danger">Cambiar Contraseña</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- /.tab-pane -->
                        </div>
                        <!-- /.tab-content -->
                    </div><!-- /.card-body -->
                </div>
                <!-- /.nav-tabs-custom -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->