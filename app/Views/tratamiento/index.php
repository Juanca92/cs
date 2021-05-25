<script src="<?php echo base_url('odontograma/scripts/angular.js') ?>"></script>
<link rel="stylesheet" href="<?php echo base_url('odontograma/css/estilosOdontograma.css') ?>" />
<link rel="stylesheet" href="<?php echo base_url('odontograma/css/estilo.css') ?>" />

<script type="text/javascript" src="<?php echo base_url('odontograma/scripts/dist/html2canvas.js') ?>"></script>
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
                                        <!-- Ocupacion -->


                                        <!-- Domicilio -->
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label for="domicilio">Domicilio <span class="text-danger">(*)</span>:</label>
                                                    <textarea class="form-control" id="domicilio" name="domicilio" rows="1" placeholder="Domicilio ..."></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <!--ocupacion -->
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
                                                    <label for="estatus">Estatus<span class="text-danger">(*)</span>:</label>
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
                                            <li class="nav-item"><a class="nav-link active" href="#time" data-toggle="tab">Enfermerdad actual</a></li>
                                            <li class="nav-item"><a class="nav-link" href="#timel" data-toggle="tab">Consulta de salud</a></li>
                                            <li class="nav-item"><a class="nav-link" href="#timeli" data-toggle="tab">Exploracion fisica</a>
                                            </li>
                                            <li class="nav-item"><a class="nav-link" href="#alergias" data-toggle="tab">Alergias</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- enfermedad Actual-->
                                    <div class="card-body">
                                        <div class="tab-content">
                                            <div class="active tab-pane" id="time">
                                                <form id="frm_guardar_enfermedad">
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="form-group">
                                                                <label for="tiempo_consulta">Tiempo de Enfermedad <span class="text-danger">(*)</span>:</label>
                                                                <input type="text" id="tiempo_consulta" name="tiempo_consulta" class="form-control" placeholder="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label for="motivo_consulta">Motivo de Consulta <span class="text-danger">(*)</span>:</label>
                                                                <textarea type="text" id="motivo_consulta" name="motivo_consulta" class="form-control" style="overflow:auto;resize:none" rows="3" placeholder="datalle aqui"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label for="sintomas_principales">Sintomas principales
                                                                    <span class="text-danger">(*)</span>:</label>
                                                                <textarea type="text" id="sintomas_principales" name="sintomas_principales" class="form-control" style="overflow:auto;resize:none" rows="3" placeholder="escriba aqui"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label for="tomando_medicamento">Esta tomando algun
                                                                    medicamento? <span class="text-danger">(*)</span>:</label>
                                                                <div>
                                                                    <label for="tomando_medicamento">Si</label>
                                                                    <input type="radio" id="tomando_medicamento" name="tomando_medicamento" value="si">
                                                                    <label for="tomando_medicamento">No</label>
                                                                    <input type="radio" id="tomando_medicamento" name="tomando_medicamento" value="no">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label for="nombre_medicamento">Medicamento<span class="text-danger">(*)</span>:</label>
                                                                <input type="text" id="nombre_medicamento" name="nombre_medicamento" class="form-control" rows="3" placeholder="escriba aqui">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label for="motivo_medicamento">Motivo <span class="text-danger">(*)</span>:</label>
                                                                <input type="text" id="motivo_medicamento" name="motivo_medicamento" class="form-control" placeholder="datalle aqui">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label for="dosis_medicamento">Cantidad dosis<span class="text-danger">(*)</span>:</label>
                                                                <input type="text" id="dosis_medicamento" name="dosis_medicamento" class="form-control" placeholder="escriba aqui">
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
                                            <!-- Consulta de salud-->
                                            <div class="tab-pane" id="timel">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label for="tratamiento">alguna vez hizo tratamiento de
                                                                Ortodoncia?
                                                                <span class="text-danger">(*)</span>:</label>
                                                            <div>
                                                                <label for="tratamiento">Si</label>
                                                                <input type="radio" id="tratamiento" name="tratamiento" value="si">
                                                                <label for="tratamiento">No</label>
                                                                <input type="radio" id="tratamiento" name="tratamiento" value="no">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label for="motivo_tratamiento">Por que?<span class="text-danger">(*)</span>:</label>
                                                            <textarea type="text" id="motivo_tratamiento" name="motivo_tratamiento" class="form-control" style="overflow:auto;resize:none" rows="3" placeholder="escriba aqui"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label for="tomando_medicamentos">Esta tomando algun
                                                                medicamento? <span class="text-danger">(*)</span>:</label>
                                                            <div>
                                                                <label for="tomando_medicamentos">Si</label>
                                                                <input type="radio" id="tomando_medicamentos" name="tomando_medicamentos" value="si">
                                                                <label for="tomando_medicamentos">No</label>
                                                                <input type="radio" id="tomando_medicamentos" name="tomando_medicamentos" value="no">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label for="porque_tiempo">Por que y cuanto tiempo?<span class="text-danger">(*)</span>:</label>
                                                            <textarea type="text" id="porque_tiempo" name="porque_tiempo" class="form-control" style="overflow:auto;resize:none" rows="3" placeholder="escriba aqui"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label for="alergico_medicamento">Es alergico a algun
                                                                medicamento o anastesico?
                                                                <span class="text-danger">(*)</span>:</label>
                                                            <div>
                                                                <label for="alergico_medicamento">Si</label>
                                                                <input type="radio" id="alergico_medicamento" name="alergico_medicamento" value="si">
                                                                <label for="alergico_medicamento">No</label>
                                                                <input type="radio" id="alergico_medicamento" name="alergico_medicamento" value="no">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label for="cual_medicamento">Cual?<span class="text-danger">(*)</span>:</label>
                                                            <textarea type="text" id="cual_medicamento" name="cual_medicamento" class="form-control" style="overflow:auto;resize:none" rows="3" placeholder="escriba aqui"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label for="alguna_cirugia">Ah tenido alguna cirugia? <span class="text-danger">(*)</span>:</label>
                                                            <div>
                                                                <label for="alguna_cirugia">Si</label>
                                                                <input type="radio" id="alguna_cirugia" name="alguna_cirugia" value="si">
                                                                <label for="alguna_cirugia">No</label>
                                                                <input type="radio" id="alguna_cirugia" name="alguna_cirugia" value="no">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label for="porque">Por que?<span class="text-danger">(*)</span>:</label>
                                                            <textarea type="text" id="porque" name="porque" class="form-control" style="overflow:auto;resize:none" rows="3" placeholder="escriba aqui"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="form-group">
                                                            <label for="alguna_enfermedad">Padece de alguna de las
                                                                siguientes
                                                                enfermedades?
                                                                <span class="text-danger">(*)</span>:</label>
                                                            <div>
                                                                <label for="alguna_enfermedad">Saranpion</label>
                                                                <input type="radio" id="alguna_enfermedad" name="alguna_enfermedad" value="saranpion">
                                                                <label for="alguna_enfermedad">Varicela</label>
                                                                <input type="radio" id="alguna_enfermedad" name="alguna_enfermedad" value="varicela">
                                                                <label for="alguna_enfermedad">tuberculosis</label>
                                                                <input type="radio" id="alguna_enfermedad" name="alguna_enfermedad" value="tuberculosis">
                                                                <label for="alguna_enfermedad">diabetes</label>
                                                                <input type="radio" id="alguna_enfermedad" name="alguna_enfermedad" value="diabetes">
                                                                <label for="alguna_enfermedad">Asma</label>
                                                                <input type="radio" id="alguna_enfermedad" name="alguna_enfermedad" value="asma">
                                                                <label for="alguna_enfermedad">Epatitis</label>
                                                                <input type="radio" id="alguna_enfermedad" name="alguna_enfermedad" value="epatitis">
                                                                <label for="alguna_enfermedad">Otras</label>
                                                                <input type="radio" id="alguna_enfermedad" name="alguna_enfermedad" value="otras">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label for="cepilla_diente">Cepilla los dientes? <span class="text-danger">(*)</span>:</label>
                                                            <div>
                                                                <label for="cepilla_diente">Si</label>
                                                                <input type="radio" id="cepilla_diente" name="cepilla_diente" value="si">
                                                                <label for="cepilla_diente">No</label>
                                                                <input type="radio" id="cepilla_diente" name="cepilla_diente" value="no">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label for="cuanto_dia">Cuantas al dia?<span class="text-danger">(*)</span>:</label>
                                                            <textarea type="text" id="cuanto_dia" name="cuanto_dia" class="form-control" style="overflow:auto;resize:none" rows="3" placeholder="escriba aqui"></textarea>
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
                                                                <label for="">Presion arterial <span class="text-danger">(*)</span>:</label>
                                                                <div class="input-group mb-3">
                                                                    <input type="text" id="" name="" class="form-control" placeholder="datalle aqui">
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
                                                                <label for="">Pulso<span class="text-danger">(*)</span>:</label>
                                                                <div class="input-group mb-3">
                                                                    <input type="text" id="" name="" class="form-control" placeholder="escriba aqui">
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
                                                                <label for="">Temperatura<span class="text-danger">(*)</span>:</label>
                                                                <div class="input-group mb-3">
                                                                    <input type="text" id="" name="" class="form-control" placeholder="escriba aqui">
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
                                                                <label for="">Frecuencia Cardiaca <span class="text-danger">(*)</span>:</label>
                                                                <div class="input-group mb-3">
                                                                    <input type="text" id="" name="" class="form-control" placeholder="datalle aqui">
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
                                                                <label for="">Frecuencia respiratoria<span class="text-danger">(*)</span>:</label>
                                                                <div class="input-group mb-3">
                                                                    <input type="text" id="" name="" class="form-control" placeholder="escriba aqui">
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
                                                                <label for="">Peso <span class="text-danger">(*)</span>:</label>
                                                                <div class="input-group mb-3">
                                                                    <input type="text" id="" name="" class="form-control" placeholder="datalle aqui">
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
                                                                <label for="">Talla<span class="text-danger">(*)</span>:</label>
                                                                <div class="input-group mb-3">
                                                                    <input type="text" id="" name="" class="form-control" placeholder="escriba aqui">
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
                                                                <label for="">Masa Corporal<span class="text-danger">(*)</span>:</label>
                                                                <div class="input-group mb-3">
                                                                    <input type="text" id="" name="" class="form-control" placeholder="escriba aqui">
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
                                                                            <button class="btn btn-success btn-sm" id="agregar_alergia">
                                                                                <i class="fa fa-plus"></i>
                                                                                Agregar
                                                                            </button>
                                                                        </h3>
                                                                    </div>
                                                                    <div class="card-body">
                                                                        <!-- /.Contenido de la vista -->
                                                                        <table id="tbl_tratamiento_alergias" class="table table-striped table-bordered" cellspacing="0" width="100%">
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
                                            <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form id="frm_guardar_alergia">
                                                <!-- Campo nombre y observacion-->
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label for="nombre_alergia">Nombre<span class="text-danger">(*)</span>:</label>
                                                            <input type="text" id="nombre_alergia" name="nombre_alergia" class="form-control" />
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label for="detalle">Observacion<span class="text-danger">(*)</span>:</label>
                                                            <textarea class="form-control" id="detalle" name="detalle" rows="3" placeholder="Describa..."></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="panel-footer text-right">
                                                    <button class="btn btn-default" id="btn-cerrar" data-dismiss="modal" type="button">Cerrar</button>
                                                    <button type="submit" id="btn-guardar-alergia" class="btn btn-success">Guardar</button>
                                                </div>

                                            </form>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div> <!-- /fin modal de alergias-->


                            <!-- /.tab-pane -->

                            <div class="tab-pane" id="settings">
                                <div ng-app='app'>
                                    <div ng-controller='dientes' class="container" id='container'>
                                        <center>
                                            <div class="fila">
                                                <img src="<?php echo base_url('odontograma/images/dentadura-sup-18.png') ?>" width="40" height="100">
                                                <img src="<?php echo base_url('odontograma/images/dentadura-sup-17.png') ?>" width="40" height="100">
                                                <img src="<?php echo base_url('odontograma/images/dentadura-sup-16.png') ?>" width="40" height="100">
                                                <img src="<?php echo base_url('odontograma/images/dentadura-sup-15.png') ?>" width="40" height="100">
                                                <img src="<?php echo base_url('odontograma/images/dentadura-sup-14.png') ?>" width="40" height="100">
                                                <img src="<?php echo base_url('odontograma/images/dentadura-sup-13.png') ?>" width="40" height="100">
                                                <img src="<?php echo base_url('odontograma/images/dentadura-sup-12.png') ?>" width="40" height="100">
                                                <img src="<?php echo base_url('odontograma/images/dentadura-sup-11.png') ?>" width="40" height="100">
                                                <img src="<?php echo base_url('odontograma/images/dentadura-sup-21.png') ?>" width="40" height="100">
                                                <img src="<?php echo base_url('odontograma/images/dentadura-sup-22.png') ?>" width="40" height="100">
                                                <img src="<?php echo base_url('odontograma/images/dentadura-sup-23.png') ?>" width="40" height="100">
                                                <img src="<?php echo base_url('odontograma/images/dentadura-sup-24.png') ?>" width="40" height="100">
                                                <img src="<?php echo base_url('odontograma/images/dentadura-sup-25.png') ?>" width="40" height="100">
                                                <img src="<?php echo base_url('odontograma/images/dentadura-sup-26.png') ?>" width="40" height="100">
                                                <img src="<?php echo base_url('odontograma/images/dentadura-sup-27.png') ?>" width="40" height="100">
                                                <img src="<?php echo base_url('odontograma/images/dentadura-sup-28.png') ?>" width="40" height="100">

                                            </div>
                                            <div>
                                                <svg height="50" class="{{i.tipoDiente}}" width="50" data-ng-repeat="i in adultoArriva" id="{{i.id}}">
                                                    <polygon points="10,15 15,10 50,45 45,50" estado="4" value="6" class="ausente" />
                                                    <polygon points="45,10 50,15 15,50 10,45" estado="4" value="7" class="ausente" />
                                                    <circle cx="30" cy="30" r="16" estado="8" value="8" class="corona" />
                                                    <circle cx="30" cy="30" r="20" estado="3" value="9" class="endodoncia" />
                                                    <polygon points="50,10 40,10 10,26 10,32 46,32 10,50 20,50 50,36 50,28 14,28" estado="6" value="10" class="implante" />
                                                    <polygon points="10,10 50,10 40,20 20,20" estado="0" value="1" class="diente" />
                                                    <polygon points="50,10 50,50 40,40 40,20" estado="0" value="2" class="diente" />
                                                    <polygon points="50,50 10,50 20,40 40,40" estado="0" value="3" class="diente" />
                                                    <polygon points="10,50 20,40 20,20 10,10" estado="0" value="4" class="diente" />
                                                    <polygon points="20,20 40,20 40,40 20,40" estado="0" value="5" class="diente" />
                                                </svg>
                                            </div>
                                            <div class="fila">
                                                <img src="<?php echo base_url('odontograma/images/dentadura-sup-55.png') ?>" width="40" height="100">
                                                <img src="<?php echo base_url('odontograma/images/dentadura-sup-54.png') ?>" width="40" height="100">
                                                <img src="<?php echo base_url('odontograma/images/dentadura-sup-53.png') ?>" width="40" height="100">
                                                <img src="<?php echo base_url('odontograma/images/dentadura-sup-52.png') ?>" width="40" height="100">
                                                <img src="<?php echo base_url('odontograma/images/dentadura-sup-51.png') ?>" width="40" height="100">
                                                <img src="<?php echo base_url('odontograma/images/dentadura-sup-61.png') ?>" width="40" height="100">
                                                <img src="<?php echo base_url('odontograma/images/dentadura-sup-62.png') ?>" width="40" height="100">
                                                <img src="<?php echo base_url('odontograma/images/dentadura-sup-63.png') ?>" width="40" height="100">
                                                <img src="<?php echo base_url('odontograma/images/dentadura-sup-64.png') ?>" width="40" height="100">
                                                <img src="<?php echo base_url('odontograma/images/dentadura-sup-65.png') ?>" width="40" height="100">

                                            </div>
                                            <div>
                                                <svg height="50" class="{{i.tipoDiente}}" width="50" data-ng-repeat="i in ninoArriva" id="{{i.id}}">
                                                    <polygon points="10,15 15,10 50,45 45,50" estado="4" value="6" class="ausente" />
                                                    <polygon points="45,10 50,15 15,50 10,45" estado="4" value="7" class="ausente" />
                                                    <circle cx="30" cy="30" r="16" estado="8" value="8" class="corona" />
                                                    <circle cx="30" cy="30" r="20" estado="3" value="9" class="endodoncia" />
                                                    <polygon points="50,10 40,10 10,26 10,32 46,32 10,50 20,50 50,36 50,28 14,28" estado="6" value="10" class="implante" />
                                                    <polygon points="10,10 50,10 40,20 20,20" estado="0" value="1" class="diente" />
                                                    <polygon points="50,10 50,50 40,40 40,20" estado="0" value="2" class="diente" />
                                                    <polygon points="50,50 10,50 20,40 40,40" estado="0" value="3" class="diente" />
                                                    <polygon points="10,50 20,40 20,20 10,10" estado="0" value="4" class="diente" />
                                                    <polygon points="20,20 40,20 40,40 20,40" estado="0" value="5" class="diente" />

                                                </svg>
                                            </div>
                                            <div>
                                                <svg height="50" class="{{i.tipoDiente}}" width="50" data-ng-repeat="i in ninoAbajo" id="{{i.id}}">
                                                    <polygon points="10,15 15,10 50,45 45,50" estado="4" value="6" class="ausente" />
                                                    <polygon points="45,10 50,15 15,50 10,45" estado="4" value="7" class="ausente" />
                                                    <circle cx="30" cy="30" r="16" estado="8" value="8" class="corona" />
                                                    <circle cx="30" cy="30" r="20" estado="3" value="9" class="endodoncia" />
                                                    <polygon points="50,10 40,10 10,26 10,32 46,32 10,50 20,50 50,36 50,28 14,28" estado="6" value="10" class="implante" />
                                                    <polygon points="10,10 50,10 40,20 20,20" estado="0" value="1" class="diente" />
                                                    <polygon points="50,10 50,50 40,40 40,20" estado="0" value="2" class="diente" />
                                                    <polygon points="50,50 10,50 20,40 40,40" estado="0" value="3" class="diente" />
                                                    <polygon points="10,50 20,40 20,20 10,10" estado="0" value="4" class="diente" />
                                                    <polygon points="20,20 40,20 40,40 20,40" estado="0" value="5" class="diente" />

                                                </svg>
                                            </div>
                                            <div class="fila">
                                                <img src="<?php echo base_url('odontograma/images/dentadura-inf-85.png') ?>" width="40" height="100">
                                                <img src="<?php echo base_url('odontograma/images/dentadura-inf-84.png') ?>" width="40" height="100">
                                                <img src="<?php echo base_url('odontograma/images/dentadura-inf-83.png') ?>" width="40" height="100">
                                                <img src="<?php echo base_url('odontograma/images/dentadura-inf-82.png') ?>" width="40" height="100">
                                                <img src="<?php echo base_url('odontograma/images/dentadura-inf-81.png') ?>" width="40" height="100">
                                                <img src="<?php echo base_url('odontograma/images/dentadura-inf-71.png') ?>" width="40" height="100">
                                                <img src="<?php echo base_url('odontograma/images/dentadura-inf-72.png') ?>" width="40" height="100">
                                                <img src="<?php echo base_url('odontograma/images/dentadura-inf-73.png') ?>" width="40" height="100">
                                                <img src="<?php echo base_url('odontograma/images/dentadura-inf-74.png') ?>" width="40" height="100">
                                                <img src="<?php echo base_url('odontograma/images/dentadura-inf-75.png') ?>" width="40" height="100">

                                            </div>
                                            <div>
                                                <svg height="50" class="{{i.tipoDiente}}" width="50" data-ng-repeat="i in adultoAbajo" id="{{i.id}}">
                                                    <polygon points="10,15 15,10 50,45 45,50" estado="4" value="6" class="ausente" />
                                                    <polygon points="45,10 50,15 15,50 10,45" estado="4" value="7" class="ausente" />
                                                    <circle cx="30" cy="30" r="16" estado="8" value="8" class="corona" />
                                                    <circle cx="30" cy="30" r="20" estado="3" value="9" class="endodoncia" />
                                                    <polygon points="50,10 40,10 10,26 10,32 46,32 10,50 20,50 50,36 50,28 14,28" estado="6" value="10" class="implante" />
                                                    <polygon points="10,10 50,10 40,20 20,20" estado="0" value="1" class="diente" />
                                                    <polygon points="50,10 50,50 40,40 40,20" estado="0" value="2" class="diente" />
                                                    <polygon points="50,50 10,50 20,40 40,40" estado="0" value="3" class="diente" />
                                                    <polygon points="10,50 20,40 20,20 10,10" estado="0" value="4" class="diente" />
                                                    <polygon points="20,20 40,20 40,40 20,40" estado="0" value="5" class="diente" />

                                                </svg>
                                            </div>
                                            <div class="fila">
                                                <img src="<?php echo base_url('odontograma/images/dentadura-inf-48.png') ?>" width="40" height="100">
                                                <img src="<?php echo base_url('odontograma/images/dentadura-inf-47.png') ?>" width="40" height="100">
                                                <img src="<?php echo base_url('odontograma/images/dentadura-inf-46.png') ?>" width="40" height="100">
                                                <img src="<?php echo base_url('odontograma/images/dentadura-inf-45.png') ?>" width="40" height="100">
                                                <img src="<?php echo base_url('odontograma/images/dentadura-inf-44.png') ?>" width="40" height="100">
                                                <img src="<?php echo base_url('odontograma/images/dentadura-inf-43.png') ?>" width="40" height="100">
                                                <img src="<?php echo base_url('odontograma/images/dentadura-inf-42.png') ?>" width="40" height="100">
                                                <img src="<?php echo base_url('odontograma/images/dentadura-inf-41.png') ?>" width="40" height="100">
                                                <img src="<?php echo base_url('odontograma/images/dentadura-inf-31.png') ?>" width="40" height="100">
                                                <img src="<?php echo base_url('odontograma/images/dentadura-inf-32.png') ?>" width="40" height="100">
                                                <img src="<?php echo base_url('odontograma/images/dentadura-inf-33.png') ?>" width="40" height="100">
                                                <img src="<?php echo base_url('odontograma/images/dentadura-inf-34.png') ?>" width="40" height="100">
                                                <img src="<?php echo base_url('odontograma/images/dentadura-inf-35.png') ?>" width="40" height="100">
                                                <img src="<?php echo base_url('odontograma/images/dentadura-inf-36.png') ?>" width="40" height="100">
                                                <img src="<?php echo base_url('odontograma/images/dentadura-inf-37.png') ?>" width="40" height="100">
                                                <img src="<?php echo base_url('odontograma/images/dentadura-inf-38.png') ?>" width="40" height="100">

                                            </div>
                                        </center>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="card card-primary">
                                                <div class="card-header">
                                                    <h3 class="card-title">Opcion</h3>
                                                </div>
                                                <input type="radio" id="Decidua" name="tipo" value="1" checked />Permanente
                                                <input type="radio" id="Niños" name="tipo" value="2" />Decidua
                                                <input type="radio" id="Mixta" name="tipo" value="3" />Mixta
                                            </div>
                                        </div>
                                        <div class="card card-primary">
                                            <div class="card-header">
                                                <h3 class="card-title">opciones</h3>
                                            </div>
                                            <!-- /.card-header -->
                                            <div class="card-body">
                                                <table border="1" align="center">
                                                    <tr>
                                                        <th>Amalgama</th>
                                                        <th>Caries</th>
                                                        <th>Endodoncia</th>
                                                        <th>Ausente</th>
                                                        <th>Resina</th>
                                                        <th>Implante</th>
                                                        <th>Sellante</th>
                                                        <th>Corona</th>
                                                        <th>Normal</th>
                                                    </tr>
                                                    <td>
                                                        <center>
                                                            <div class="color" value="1" style="background-color:red;width:20px;height:20px"></div>
                                                        </center>
                                                    </td>
                                                    <td>
                                                        <center>
                                                            <div class="color" value="2" style="background-color:yellow;width:20px;height:20px"></div>
                                                        </center>
                                                    </td>
                                                    <td>
                                                        <center>
                                                            <div class="color" value="3" style="background-color:orange;width:20px;height:20px"></div>
                                                        </center>
                                                    </td>
                                                    <td>
                                                        <center>
                                                            <div class="color" value="4" style="background-color:tomato;width:20px;height:20px"></div>
                                                        </center>
                                                    </td>
                                                    <td>
                                                        <center>
                                                            <div class="color" value="5" style="background-color:#CC6600;width:20px;height:20px"></div>
                                                        </center>
                                                    </td>
                                                    <td>
                                                        <center>
                                                            <div class="color" value="6" style="background-color:#CC66CC;width:20px;height:20px"></div>
                                                        </center>
                                                    </td>
                                                    <td>
                                                        <center>
                                                            <div class="color" value="7" style="background-color:green;width:20px;height:20px"></div>
                                                        </center>
                                                    </td>
                                                    <td>
                                                        <center>
                                                            <div class="color" value="8" style="background-color:blue;width:20px;height:20px"></div>
                                                        </center>
                                                    </td>
                                                    <td>
                                                        <center>
                                                            <div class="color" value="9" style="background-color:black;width:20px;height:20px"></div>
                                                        </center>
                                                    </td>
                                                    <tr>
                                                </table>

                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="form-group row text-right">
                                    <div class="offset-sm-2 col-sm-10">
                                        <button type="submit" class="btn btn-danger" id="guardar-odontograma">Guardar</button>
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
                                                        <table id="tbl_pacie" class="table table-striped table-bordered" cellspacing="0" width="100%">
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
                            <img class="profile-user-img img-fluid img-circle" id="foto" src="<?= base_url('img/users/default/default.png'); ?>" alt="User profile picture" />
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
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<script src="<?php echo base_url('odontograma/scripts/jquery-odontograma.js') ?>"></script>

<script src="<?php echo base_url('odontograma/scripts/app.js') ?>"></script>

<script src="<?php echo base_url('odontograma/scripts/controller.js') ?>"></script>