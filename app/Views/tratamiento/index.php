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
                    <li class="breadcrumb-item active">Tratamientos</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<!-- Main content -->
<section class="content" id="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-9">
                <div class="card card-light">
                    <div class="card-header p-2">
                        <ul class="nav nav-pills">
                            <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Datos
                                    Personales</a></li>
                            <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Exploracion
                                    fisica</a></li>
                            <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Odontograma</a>
                            </li>
                            <li class="nav-item"><a class="nav-link" href="#tratamientos" data-toggle="tab">Tratamientos
                                    Realizados</a></li>
                            <li class="nav-item"><a class="nav-link" href="#" data-toggle="tab">Historia
                                    Clinica</a></li>
                        </ul>
                    </div>

                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="active tab-pane" id="activity">
                                <!-- Campos de Ci y Expedido -->
                                <div class="card card-info">
                                    <div class="card-header">
                                        <h3 class="card-title">Datos del paciente</h3>
                                    </div>
                                    <form id="frm_guardar_paciente">
                                        <div class="row">
                                            <div class="col-lg-7">
                                                <div class="form-group">
                                                    <label for="ci">CI <span class="text-danger">(*)</span>:</label>
                                                    <input type="text" id="ci" name="ci" class="form-control"
                                                        placeholder="CI ..">
                                                </div>
                                            </div>

                                            <div class="col-lg-5">
                                                <div class="form-group">
                                                    <label for="expedido">Expedido <span
                                                            class="text-danger">(*)</span>:</label>
                                                    <select class="custom-select" id="expedido" name="expedido"
                                                        required>
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
                                                    <label for="nombres">Nombres <span
                                                            class="text-danger">(*)</span>:</label>
                                                    <input type="text" class="form-control" id="nombres" name="nombres"
                                                        placeholder="Nombres" required>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Campos Paterno y Materno -->
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="paterno">Paterno <span
                                                            class="text-danger">(*)</span>:</label>
                                                    <input type="text" id="paterno" name="paterno" class="form-control"
                                                        placeholder="Apellido Paterno">
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="materno">Materno :</label>
                                                    <input type="text" id="materno" name="materno" class="form-control"
                                                        placeholder="Apellido Materno">
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Celular y Fecha de Nacimiento -->
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="celular">Celular <span
                                                            class="text-danger">(*)</span>:</label>
                                                    <input type="number" id="celular" name="celular"
                                                        class="form-control" placeholder="Celular">
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="fecha_nacimiento">Fecha Nacimiento <span
                                                            class="text-danger">(*)</span>:</label>
                                                    <input type="datepicker" id="fecha_nacimiento"
                                                        name="fecha_nacimiento" class="form-control" readonly="">
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
                                                    <label for="domicilio">Domicilio <span
                                                            class="text-danger">(*)</span>:</label>
                                                    <textarea class="form-control" id="domicilio" name="domicilio"
                                                        rows="1" placeholder="Domicilio ..."></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <!--ocupacion y  Estatus-->
                                        <div class="row">
                                            <div class="col-lg-7">
                                                <div class="form-group">
                                                    <label for="ocupacion">Ocupaci&oacute;n <span
                                                            class="text-danger">(*)</span>:</label>
                                                    <select class="form-control select2bs4" style="width: 100%;"
                                                        id="id_ocupacion" name="id_ocupacion">
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
                                                    <label for="estatus">Estatus<span
                                                            class="text-danger">(*)</span>:</label>
                                                    <select class="custom-select" id="estatus" name="estatus" required>
                                                        <option value="">-- Seleccione --</option>
                                                        <option value="ACTIVO">Activo</option>
                                                        <option value="INACTIVO">Inactivo</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group row text-right">
                                            <div class="offset-sm-2 col-sm-10">
                                                <button type="submit" class="btn btn-danger">Guardar</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- /.tab-pane -->

                            <div class="tab-pane" id="timeline">
                                <div class="card card-secondary">
                                    <div class="card-header p-2">
                                        <ul class="nav nav-pills">
                                            <li class="nav-item"><a class="nav-link active" href="#time"
                                                    data-toggle="tab">Enfermerdad actual</a></li>
                                            <li class="nav-item"><a class="nav-link" href="#timel"
                                                    data-toggle="tab">Consulta de salud</a></li>
                                            <li class="nav-item"><a class="nav-link" href="#timeli"
                                                    data-toggle="tab">Exploracion fisica</a>
                                            </li>
                                            <li class="nav-item"><a class="nav-link" href="#alergias"
                                                    data-toggle="tab">Alergias</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- enfermedad Actual-->
                                    <div class="card-body">
                                        <div class="tab-content">
                                            <div class="active tab-pane" id="time">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="form-group">
                                                            <label for="">Tiempo de Enfermedad <span
                                                                    class="text-danger">(*)</span>:</label>
                                                            <input type="text" id="" name="" class="form-control"
                                                                placeholder="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label for="">Motivo de Consulta <span
                                                                    class="text-danger">(*)</span>:</label>
                                                            <textarea type="text" id="" name="" class="form-control"
                                                                style="overflow:auto;resize:none" rows="3"
                                                                placeholder="datalle aqui"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label for="">Sintomas principales <span
                                                                    class="text-danger">(*)</span>:</label>
                                                            <textarea type="text" id="" name="" class="form-control"
                                                                style="overflow:auto;resize:none" rows="3"
                                                                placeholder="escriba aqui"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label for="">Esta tomando algun medicamento? <span
                                                                    class="text-danger">(*)</span>:</label>
                                                            <div>
                                                                <label for="">Si</label>
                                                                <input type="radio" id="" name="" value="">
                                                                <label for="">No</label>
                                                                <input type="radio" id="" name="" value="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label for="">Medicamento<span
                                                                    class="text-danger">(*)</span>:</label>
                                                            <input type="text" id="" name="" class="form-control"
                                                                rows="3" placeholder="escriba aqui">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label for="">Motivo <span
                                                                    class="text-danger">(*)</span>:</label>
                                                            <input type="text" id="" name="" class="form-control"
                                                                placeholder="datalle aqui">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label for="">Cantidad dosis<span
                                                                    class="text-danger">(*)</span>:</label>
                                                            <input type="text" id="" name="" class="form-control"
                                                                placeholder="escriba aqui">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row text-right">
                                                    <div class="offset-sm-2 col-sm-10">
                                                        <button type="submit" class="btn btn-danger">Guardar</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Consulta de salud-->
                                            <div class="tab-pane" id="timel">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label for="">alguna vez hizo tratamiento de Ortodoncia?
                                                                <span class="text-danger">(*)</span>:</label>
                                                            <div>
                                                                <label for="">Si</label>
                                                                <input type="radio" id="" name="" value="">
                                                                <label for="">No</label>
                                                                <input type="radio" id="" name="" value="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label for="">Por que?<span
                                                                    class="text-danger">(*)</span>:</label>
                                                            <textarea type="text" id="" name="" class="form-control"
                                                                style="overflow:auto;resize:none" rows="3"
                                                                placeholder="escriba aqui"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label for="">Esta tomando algun medicamento? <span
                                                                    class="text-danger">(*)</span>:</label>
                                                            <div>
                                                                <label for="">Si</label>
                                                                <input type="radio" id="" name="" value="">
                                                                <label for="">No</label>
                                                                <input type="radio" id="" name="" value="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label for="">Por que y cuanto tiempo?<span
                                                                    class="text-danger">(*)</span>:</label>
                                                            <textarea type="text" id="" name="" class="form-control"
                                                                style="overflow:auto;resize:none" rows="3"
                                                                placeholder="escriba aqui"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label for="">Es alergico a algun medicamento o anastesico?
                                                                <span class="text-danger">(*)</span>:</label>
                                                            <div>
                                                                <label for="">Si</label>
                                                                <input type="radio" id="" name="" value="">
                                                                <label for="">No</label>
                                                                <input type="radio" id="" name="" value="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label for="">Cual?<span
                                                                    class="text-danger">(*)</span>:</label>
                                                            <textarea type="text" id="" name="" class="form-control"
                                                                style="overflow:auto;resize:none" rows="3"
                                                                placeholder="escriba aqui"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label for="">Ah tenido alguna cirugia? <span
                                                                    class="text-danger">(*)</span>:</label>
                                                            <div>
                                                                <label for="">Si</label>
                                                                <input type="radio" id="" name="" value="">
                                                                <label for="">No</label>
                                                                <input type="radio" id="" name="" value="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label for="">Por que?<span
                                                                    class="text-danger">(*)</span>:</label>
                                                            <textarea type="text" id="" name="" class="form-control"
                                                                style="overflow:auto;resize:none" rows="3"
                                                                placeholder="escriba aqui"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="form-group">
                                                            <label for="">Padece de alguna de las siguientes
                                                                enfermedades?
                                                                <span class="text-danger">(*)</span>:</label>
                                                            <div>
                                                                <label for="">Saranpion</label>
                                                                <input type="radio" id="" name="" value="">
                                                                <label for="">Varicela</label>
                                                                <input type="radio" id="" name="" value="">
                                                                <label for="">tuberculosis</label>
                                                                <input type="radio" id="" name="" value="">
                                                                <label for="">diabetes</label>
                                                                <input type="radio" id="" name="" value="">
                                                                <label for="">Asma</label>
                                                                <input type="radio" id="" name="" value="">
                                                                <label for="">Epatitis</label>
                                                                <input type="radio" id="" name="" value="">
                                                                <label for="">Otras</label>
                                                                <input type="radio" id="" name="" value="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label for="">Cepilla los dientes? <span
                                                                    class="text-danger">(*)</span>:</label>
                                                            <div>
                                                                <label for="">Si</label>
                                                                <input type="radio" id="" name="" value="">
                                                                <label for="">No</label>
                                                                <input type="radio" id="" name="" value="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label for="">Cuantas al dia?<span
                                                                    class="text-danger">(*)</span>:</label>
                                                            <textarea type="text" id="" name="" class="form-control"
                                                                style="overflow:auto;resize:none" rows="3"
                                                                placeholder="escriba aqui"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row text-right">
                                                    <div class="offset-sm-2 col-sm-10">
                                                        <button type="submit" class="btn btn-danger">Guardar</button>
                                                    </div>
                                                </div>

                                            </div>
                                            <!-- exploracion fisica-->
                                            <div class="tab-pane" id="timeli">
                                                <div class="card card-info">
                                                    <div class="card-header">
                                                        <h3 class="card-title">Funciones Vitales</h3>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-4">
                                                            <div class="form-group">
                                                                <label for="">Presion arterial <span
                                                                        class="text-danger">(*)</span>:</label>
                                                                <div class="input-group mb-3">
                                                                    <input type="text" id="" name=""
                                                                        class="form-control" placeholder="datalle aqui">
                                                                    <div class="input-group-append">
                                                                        <div class="input-group-text">
                                                                            <span class="fas ">mn Hg</span>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="form-group">
                                                                <label for="">Pulso<span
                                                                        class="text-danger">(*)</span>:</label>
                                                                <div class="input-group mb-3">
                                                                    <input type="text" id="" name=""
                                                                        class="form-control" placeholder="escriba aqui">
                                                                    <div class="input-group-append">
                                                                        <div class="input-group-text">
                                                                            <span class="fas ">/ min</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="form-group">
                                                                <label for="">Temperatura<span
                                                                        class="text-danger">(*)</span>:</label>
                                                                <div class="input-group mb-3">
                                                                    <input type="text" id="" name=""
                                                                        class="form-control" placeholder="escriba aqui">
                                                                    <div class="input-group-append">
                                                                        <div class="input-group-text">
                                                                            <span class="fas ">°C</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-4">
                                                            <div class="form-group">
                                                                <label for="">Frecuencia Cardiaca <span
                                                                        class="text-danger">(*)</span>:</label>
                                                                <div class="input-group mb-3">
                                                                    <input type="text" id="" name=""
                                                                        class="form-control" placeholder="datalle aqui">
                                                                    <div class="input-group-append">
                                                                        <div class="input-group-text">
                                                                            <span class="fas ">x min</span>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="form-group">
                                                                <label for="">Frecuencia respiratoria<span
                                                                        class="text-danger">(*)</span>:</label>
                                                                <div class="input-group mb-3">
                                                                    <input type="text" id="" name=""
                                                                        class="form-control" placeholder="escriba aqui">
                                                                    <div class="input-group-append">
                                                                        <div class="input-group-text">
                                                                            <span class="fas ">/ min</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card card-info">
                                                    <div class="card-header">
                                                        <h3 class="card-title">Peso-Talla</h3>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-4">
                                                            <div class="form-group">
                                                                <label for="">Peso <span
                                                                        class="text-danger">(*)</span>:</label>
                                                                <div class="input-group mb-3">
                                                                    <input type="text" id="" name=""
                                                                        class="form-control" placeholder="datalle aqui">
                                                                    <div class="input-group-append">
                                                                        <div class="input-group-text">
                                                                            <span class="fas ">kg</span>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="form-group">
                                                                <label for="">Talla<span
                                                                        class="text-danger">(*)</span>:</label>
                                                                <div class="input-group mb-3">
                                                                    <input type="text" id="" name=""
                                                                        class="form-control" placeholder="escriba aqui">
                                                                    <div class="input-group-append">
                                                                        <div class="input-group-text">
                                                                            <span class="fas ">m</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="form-group">
                                                                <label for="">Masa Corporal<span
                                                                        class="text-danger">(*)</span>:</label>
                                                                <div class="input-group mb-3">
                                                                    <input type="text" id="" name=""
                                                                        class="form-control" placeholder="escriba aqui">
                                                                    <div class="input-group-append">
                                                                        <div class="input-group-text">
                                                                            <span class="fas ">kg/m</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row text-right">
                                                    <div class="offset-sm-2 col-sm-10">
                                                        <button type="submit" class="btn btn-danger">Guardar</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--alergias-->
                                            <div class="tab-pane" id="alergias">
                                                <!-- Main content -->
                                                <section class="content">
                                                    <div class="container-fluid">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="card">
                                                                    <div class="card-header">
                                                                        <h3 class="card-title">
                                                                            Alergias del paciente
                                                                            <button class="btn btn-success btn-sm"
                                                                                id="agregar_alergia">
                                                                                <i class="fa fa-plus"></i>
                                                                                Agregar
                                                                            </button>
                                                                        </h3>
                                                                    </div>
                                                                    <div class="card-body">
                                                                        <!-- /.Contenido de la vista -->
                                                                        <table id="tbl_tratamiento_alergias"
                                                                            class="table table-striped table-bordered"
                                                                            cellspacing="0" width="100%">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th width="5%">#</th>
                                                                                    <th>Nombre</th>
                                                                                    <th>observacion</th>
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
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--modal de alergias-->
                            <div class="modal fade" id="agregar-alergia">
                                <div class="modal-dialog ">
                                    <div class="modal-content">
                                        <div class="modal-header bg-green">
                                            <h4 class="modal-title" id="agregar-alergia-title"></h4>
                                            <button type="button" class="close text-white" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form id="frm_guardar_alergia">
                                                <!-- Campo nombre y observacion-->
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label for="nombre_alergia">Nombre<span
                                                                    class="text-danger">(*)</span>:</label>
                                                            <input type="text" id="nombre_alergia" name="nombre_alergia"
                                                                class="form-control"/>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label for="detalle">Observacion<span
                                                                    class="text-danger">(*)</span>:</label>
                                                            <textarea class="form-control" id="detalle"
                                                                name="detalle" rows="3"
                                                                placeholder="Describa..."></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="panel-footer text-right">
                                                    <button class="btn btn-default" id="btn-cerrar" data-dismiss="modal"
                                                        type="button">Cerrar</button>
                                                    <button type="submit" id="btn-guardar-alergia"
                                                        class="btn btn-success">Guardar</button>
                                                </div>

                                            </form>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>  <!-- /fin modal de alergias-->


                            <!-- /.tab-pane -->

                            <div class="tab-pane" id="settings">
                                <div> <canvas id="canvas" width="648" height="420"></canvas></div>

                                <div class="form-group row text-right">
                                    <div class="offset-sm-2 col-sm-10">
                                        <button type="submit" class="btn btn-danger">Guardar</button>
                                    </div>
                                </div>
                            </div>
                            <!--Tratamientos realizados-->
                            <div class="tab-pane" id="tratamientos">
                                <!-- Main content -->
                                <section class="content">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h3 class="card-title">
                                                            Tratamientos Realizados
                                                        </h3>
                                                    </div>
                                                    <div class="card-body">
                                                        <!-- /.Contenido de la vista -->
                                                        <table id="tbl_pacie" class="table table-striped table-bordered"
                                                            cellspacing="0" width="100%">
                                                            <thead>
                                                                <tr>
                                                                    <th width="5%">#</th>
                                                                    <th>Nombre-Tratamiento</th>
                                                                    <th>Fecha</th>
                                                                    <th>Hora</th>
                                                                    <th>Estatus</th>
                                                                </tr>
                                                            </thead>
                                                        </table>

                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>
                            <!-- /.tab-pane -->
                        </div>
                        <!-- /.tab-content -->
                    </div><!-- /.card-body -->
                </div>
                <!-- /.nav-tabs-custom -->
            </div>
            <!-- /.col -->
            <div class="col-md-3">
                <!-- Profile Image -->
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle" id="foto"
                                src="<?= base_url('img/users/default/default.png'); ?>" alt="User profile picture" />
                        </div>

                        <h3 id="nombre_completo" class="profile-username text-center"></h3>

                        <p id="perfil_grupo" class="text-muted text-center"></p>

                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>Nacimiento</b> <a id="fecha_nacimiento" class="float-right"></a>
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

                        <p id="telefono_celular" class="text-muted"></p>

                        <hr>

                        <strong><i class="fas fa-map-marker-alt mr-1"></i> Domicilio</strong>

                        <p id="domicilio" class="text-muted"></p>

                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->

<!--  Modal de registro paciente -->
<div class="modal fade" id="listado-pacientes">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-blue">
                <h4 class="modal-title" id="listado-paciente-title"></h4>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table id="tbl_pacientes_ver" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th width="5%">#</th>
                            <th>CI</th>
                            <th width="30%">Nombres</th>
                            <th>Celular</th>
                            <th>Nacimiento</th>
                            <th>Domicilio</th>
                            <th>Ocupacion</th>
                            <th>Estatus</th>
                            <th>Registrado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>