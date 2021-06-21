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
                    <li class="breadcrumb-item"><a href="/home">Inicio</a></li>
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
                <div class="card " id="card_tratamiento">
                    <div class="card-header p-2">
                        <ul class="nav nav-tabs" id="tabs_tratamiento">
                            <?php if (is(['ADMINISTRADOR', 'ODONTOLOGO', 'PACIENTE'])) : ?>
                            <li class="nav-item"><a class="nav-link active" href="#datos_paciente"
                                    data-toggle="tab">Datos
                                    Personales</a></li>
                            <?php endif; ?>
                            <?php if (is(['ADMINISTRADOR', 'ODONTOLOGO'])) : ?>
                            <li class="nav-item"><a class="nav-link" href="#exploracion_fisica"
                                    data-toggle="tab">Exploracion</a></li>
                            <?php endif; ?>
                            <?php if (is(['ADMINISTRADOR', 'ODONTOLOGO', 'PACIENTE'])) : ?>
                            <li class="nav-item"><a class="nav-link" href="#odontograma"
                                    data-toggle="tab">Odontograma</a>
                            </li>
                            <?php endif; ?>

                            <?php if (is(['ADMINISTRADOR', 'ODONTOLOGO'])) : ?>
                            <li class="nav-item"><a class="nav-link" href="#acciones" data-toggle="tab">Acciones</a>
                            </li>
                            <?php endif; ?>
                            <?php if (is(['ADMINISTRADOR', 'ODONTOLOGO', 'PACIENTE'])) : ?>
                            <li class="nav-item"><a class="nav-link" href="#tratamientos" data-toggle="tab">Tratamientos
                                    Realizados</a></li>
                            <?php endif; ?>
                            <?php if (is(['ADMINISTRADOR', 'ODONTOLOGO'])) : ?>
                            <li class="nav-item"><a class="nav-link" href="#historia_clinica"
                                    data-toggle="tab">Historial</a></li>
                            <?php endif; ?>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="active tab-pane" id="datos_paciente">
                                <!-- Campos de Ci y Expedido -->
                                <div class="card card-info">
                                    <div class="card-header">
                                        <h3 class="card-title">Datos del paciente</h3>
                                    </div>
                                    <form id="frm_guardar_paciente">
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
                                                        <input type="text" id="ci" name="ci" class="form-control"
                                                            placeholder="CI ..">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="expedido">Expedido <span
                                                            class="text-danger">(*)</span>:</label>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-append">
                                                            <div class="input-group-text">
                                                                <i class="fas fa-list-alt"></i>
                                                            </div>
                                                        </div>
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
                                        </div>
                                        <!-- Campo Nombres -->
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label for="nombres">Nombres <span
                                                            class="text-danger">(*)</span>:</label>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-append">
                                                            <div class="input-group-text">
                                                                <i class="fas fa-user-circle"></i>
                                                            </div>
                                                        </div>
                                                        <input type="text" class="form-control" id="nombres"
                                                            name="nombres" placeholder="Nombres" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Campos Paterno y Materno -->
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="paterno">Paterno <span
                                                            class="text-danger">(*)</span>:</label>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-append">
                                                            <div class="input-group-text">
                                                                <i class="fas fa-user-circle"></i>
                                                            </div>
                                                        </div>
                                                        <input type="text" id="paterno" name="paterno"
                                                            class="form-control" placeholder="Apellido Paterno">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="materno">Materno :</label>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-append">
                                                            <div class="input-group-text">
                                                                <i class="fas fa-user-circle"></i>
                                                            </div>
                                                        </div>
                                                        <input type="text" id="materno" name="materno"
                                                            class="form-control" placeholder="Apellido Materno">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- sexo y lugar de Nacimiento -->
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="sexo">Genero<span
                                                            class="text-danger">(*)</span>:</label>
                                                    <div>
                                                        <label for="sexo">Masculino</label>
                                                        <input type="radio" name="sexo" value="masculino"> <br>
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
                                                    <label for="celular">Celular <span
                                                            class="text-danger">(*)</span>:</label>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-append">
                                                            <div class="input-group-text">
                                                                <i class="fas fa-tty"></i>
                                                            </div>
                                                        </div>
                                                        <input type="number" id="celular" name="celular"
                                                            class="form-control" placeholder="Celular">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="fecha_nacimiento">Fecha Nacimiento <span
                                                            class="text-danger">(*)</span>:</label>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-append">
                                                            <div class="input-group-text">
                                                                <i class="fas fa-calendar-alt"></i>
                                                            </div>
                                                        </div>
                                                        <input type="datepicker" id="fecha_nacimiento"
                                                            name="fecha_nacimiento" class="form-control" readonly="">
                                                    </div>
                                                </div>
                                            </div>
                                            <input type="hidden" name="id" id="id">
                                            <input type="hidden" name="accion" id="accion">
                                        </div>
                                        <!-- Domicilio -->
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label for="domicilio">Domicilio <span
                                                            class="text-danger">(*)</span>:</label>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-append">
                                                            <div class="input-group-text">
                                                                <i class="fas fa-map-marked"></i>
                                                            </div>
                                                        </div>
                                                        <textarea class="form-control" id="domicilio" name="domicilio"
                                                            style="overflow:auto;resize:none" rows="1"
                                                            placeholder="Domicilio ..."></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--ocupacion -->
                                        <div class="row">
                                            <div class="col-lg-7">
                                                <div class="form-group">
                                                    <label for="ocupacion">Ocupaci&oacute;n <span
                                                            class="text-danger">(*)</span>:</label>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-append">
                                                            <div class="input-group-text">
                                                                <i class="fas fa-list-alt"></i>
                                                            </div>
                                                        </div>
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
                                            </div>
                                            <div class="col-lg-5">
                                                <div class="form-group">
                                                    <label for="estatus">Estado<span
                                                            class="text-danger">(*)</span>:</label>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-append">
                                                            <div class="input-group-text">
                                                                <i class="fas fa-toggle-on"></i>
                                                            </div>
                                                        </div>
                                                        <select class="custom-select" id="estatus" name="estatus"
                                                            required>
                                                            <option value="">-- Seleccione --</option>
                                                            <option value="ACTIVO">Activo</option>
                                                            <option value="INACTIVO">Inactivo</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group row text-right">
                                            <div class="offset-sm-2 col-sm-10">
                                                <button type="submit" class="btn btn-info">Guardar</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- /.tab-pane -->

                            <div class="tab-pane" id="exploracion_fisica">
                                <div class="card ">
                                    <div class="card-header p-2">
                                        <ul class="nav nav-tabs">
                                            <li class="nav-item"><a class="nav-link active" href="#enfermedad_actual"
                                                    data-toggle="tab">Enfermerdad actual</a></li>
                                            <li class="nav-item"><a class="nav-link" href="#consulta_salud"
                                                    data-toggle="tab">Consulta de salud</a></li>
                                            <li class="nav-item"><a class="nav-link" href="#exploracion"
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
                                            <div class="active tab-pane" id="enfermedad_actual">
                                                <form id="frm_guardar_enfermedad">
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="form-group">
                                                                <label for="tiempo_consulta">Tiempo de Enfermedad <span
                                                                        class="text-danger">(*)</span>:</label>
                                                                <input type="text" id="tiempo_consulta"
                                                                    name="tiempo_consulta" class="form-control">
                                                            </div>
                                                        </div>
                                                        <input type="hidden" name="id_persona" id="id_persona">
                                                        <input type="hidden" name="id_enfermedad" id="id_enfermedad">
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label for="motivo_consulta">Motivo de Consulta <span
                                                                        class="text-danger">(*)</span>:</label>
                                                                <textarea type="text" id="motivo_consulta"
                                                                    name="motivo_consulta" class="form-control"
                                                                    style="overflow:auto;resize:none" rows="2"
                                                                    placeholder="datalle aqui"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label for="sintomas_principales">Sintomas principales
                                                                    <span class="text-danger">(*)</span>:</label>
                                                                <textarea type="text" id="sintomas_principales"
                                                                    name="sintomas_principales" class="form-control"
                                                                    style="overflow:auto;resize:none" rows="2"
                                                                    placeholder="escriba aqui"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label for="tomando_medicamento">Esta tomando algun
                                                                    medicamento? <span
                                                                        class="text-danger">(*)</span>:</label>
                                                                <div>
                                                                    <label for="tomando_medicamento">Si</label>
                                                                    <input type="radio" name="tomando_medicamento"
                                                                        value="si"><br>
                                                                    <label for="tomando_medicamento">No</label>
                                                                    <input type="radio" name="tomando_medicamento"
                                                                        value="no">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label for="nombre_medicamento">Medicamento<span
                                                                        class="text-danger">(*)</span>:</label>
                                                                <input type="text" id="nombre_medicamento"
                                                                    name="nombre_medicamento" class="form-control"
                                                                    rows="3" placeholder="escriba aqui">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label for="motivo_medicamento">Motivo <span
                                                                        class="text-danger">(*)</span>:</label>
                                                                <input type="text" id="motivo_medicamento"
                                                                    name="motivo_medicamento" class="form-control"
                                                                    placeholder="datalle aqui">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label for="dosis_medicamento">Cantidad dosis<span
                                                                        class="text-danger">(*)</span>:</label>
                                                                <input type="text" id="dosis_medicamento"
                                                                    name="dosis_medicamento" class="form-control"
                                                                    placeholder="escriba aqui">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row text-right">
                                                        <div class="offset-sm-2 col-sm-10">
                                                            <button type="submit" class="btn btn-info">Guardar</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <!-- Consulta de salud-->
                                            <div class="tab-pane" id="consulta_salud">
                                                <form id="frm_guardar_consulta">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label for="tratamiento">¿Alguna vez hizo tratamiento de
                                                                    Odontologia?
                                                                    <span class="text-danger">(*)</span>:</label>
                                                                <div>
                                                                    <label for="tratamiento">Si</label>
                                                                    <input type="radio" name="tratamiento"
                                                                        value="si"><br>
                                                                    <label for="tratamiento">No</label>
                                                                    <input type="radio" name="tratamiento" value="no">
                                                                </div>
                                                            </div>
                                                            <input type="hidden" name="id_persona1" id="id_persona1">
                                                            <input type="hidden" name="id_consulta" id="id_consulta">
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label for="motivo_tratamiento">¿Por que?<span
                                                                        class="text-danger">(*)</span>:</label>
                                                                <textarea type="text" id="motivo_tratamiento"
                                                                    name="motivo_tratamiento" class="form-control"
                                                                    style="overflow:auto;resize:none" rows="2"
                                                                    placeholder="escriba aqui"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label for="tomando_medicamentos">¿Esta tomando algun
                                                                    medicamento? <span
                                                                        class="text-danger">(*)</span>:</label>
                                                                <div>
                                                                    <label for="tomando_medicamentos">Si</label>
                                                                    <input type="radio" name="tomando_medicamentos"
                                                                        value="si">
                                                                    <label for="tomando_medicamentos">No</label>
                                                                    <input type="radio" name="tomando_medicamentos"
                                                                        value="no">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label for="porque_tiempo">¿Por que y cuanto
                                                                    tiempo?<span class="text-danger">(*)</span>:</label>
                                                                <textarea type="text" id="porque_tiempo"
                                                                    name="porque_tiempo" class="form-control"
                                                                    style="overflow:auto;resize:none" rows="2"
                                                                    placeholder="escriba aqui"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label for="alergico_medicamento">¿Es alergico a algun
                                                                    medicamento o anastesico?
                                                                    <span class="text-danger">(*)</span>:</label>
                                                                <div>
                                                                    <label for="alergico_medicamento">Si</label>
                                                                    <input type="radio" name="alergico_medicamento"
                                                                        value="si"><br>
                                                                    <label for="alergico_medicamento">No</label>
                                                                    <input type="radio" name="alergico_medicamento"
                                                                        value="no">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label for="cual_medicamento">¿Cual?<span
                                                                        class="text-danger">(*)</span>:</label>
                                                                <textarea type="text" id="cual_medicamento"
                                                                    name="cual_medicamento" class="form-control"
                                                                    style="overflow:auto;resize:none" rows="2"
                                                                    placeholder="escriba aqui"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label for="alguna_cirugia">¿Ah tenido alguna cirugia?
                                                                    <span class="text-danger">(*)</span>:</label>
                                                                <div>
                                                                    <label for="alguna_cirugia">Si</label>
                                                                    <input type="radio" name="alguna_cirugia"
                                                                        value="si"><br>
                                                                    <label for="alguna_cirugia">No</label>
                                                                    <input type="radio" name="alguna_cirugia"
                                                                        value="no">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label for="porque">¿Por que?<span
                                                                        class="text-danger">(*)</span>:</label>
                                                                <textarea type="text" id="porque" name="porque"
                                                                    class="form-control"
                                                                    style="overflow:auto;resize:none" rows="2"
                                                                    placeholder="escriba aqui"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="form-group">
                                                                <label for="alguna_enfermedad[]">¿Padece de alguna de
                                                                    las siguientes enfermedades?
                                                                    <span class="text-danger">(*)</span>:</label>
                                                                <div>
                                                                    <input type="checkbox" name="alguna_enfermedad[]"
                                                                        value="saranpion">Saranpion <br>
                                                                    <input type="checkbox" name="alguna_enfermedad[]"
                                                                        value="varicela">Varicela <br>
                                                                    <input type="checkbox" name="alguna_enfermedad[]"
                                                                        value="tuberculosis">Tuverculosis <br>
                                                                    <input type="checkbox" name="alguna_enfermedad[]"
                                                                        value="diabetes">Diabetes <br>
                                                                    <input type="checkbox" name="alguna_enfermedad[]"
                                                                        value="asma">Asma <br>
                                                                    <input type="checkbox" name="alguna_enfermedad[]"
                                                                        value="epatitis">Epatitis <br>
                                                                    <input type="checkbox" name="alguna_enfermedad[]"
                                                                        value="otras">Otras <br>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label for="cepilla_diente">¿Cepilla los dientes? <span
                                                                        class="text-danger">(*)</span>:</label>
                                                                <div>
                                                                    <label for="cepilla_diente">Si</label>
                                                                    <input type="radio" name="cepilla_diente"
                                                                        value="si"><br>
                                                                    <label for="cepilla_diente">No</label>
                                                                    <input type="radio" name="cepilla_diente"
                                                                        value="no">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label for="cuanto_dia">¿Cuantas al dia?<span
                                                                        class="text-danger">(*)</span>:</label>
                                                                <textarea type="text" id="cuanto_dia" name="cuanto_dia"
                                                                    class="form-control"
                                                                    style="overflow:auto;resize:none" rows="2"
                                                                    placeholder="escriba aqui"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row text-right">
                                                        <div class="offset-sm-2 col-sm-10">
                                                            <button type="submit" class="btn btn-info">Guardar</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <!-- exploracion fisica-->
                                            <div class="tab-pane" id="exploracion">
                                                <form id="frm_guardar_fisico">
                                                    <div class="card card-info">
                                                        <div class="card-header">
                                                            <h3 class="card-title">Funciones Vitales</h3>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-4">
                                                                <div class="form-group">
                                                                    <label for="presion_arterial">Presion arterial <span
                                                                            class="text-danger">(*)</span>:</label>
                                                                    <div class="input-group mb-3">
                                                                        <input type="text" id="presion_arterial"
                                                                            name="presion_arterial" class="form-control"
                                                                            placeholder="datalle aqui">
                                                                        <div class="input-group-append">
                                                                            <div class="input-group-text">
                                                                                <span class="fas ">mmHg</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4">
                                                                <div class="form-group">
                                                                    <label for="pulso">Pulso<span
                                                                            class="text-danger">(*)</span>:</label>
                                                                    <div class="input-group mb-3">
                                                                        <input type="text" id="pulso" name="pulso"
                                                                            class="form-control"
                                                                            placeholder="escriba aqui">
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
                                                                    <label for="temperatura">Temperatura<span
                                                                            class="text-danger">(*)</span>:</label>
                                                                    <div class="input-group mb-3">
                                                                        <input type="text" id="temperatura"
                                                                            name="temperatura" class="form-control"
                                                                            placeholder="escriba aqui">
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
                                                                    <label for="frecuencia_cardiaca">Frecuencia Cardiaca
                                                                        <span class="text-danger">(*)</span>:</label>
                                                                    <div class="input-group mb-3">
                                                                        <input type="text" id="frecuencia_cardiaca"
                                                                            name="frecuencia_cardiaca"
                                                                            class="form-control"
                                                                            placeholder="datalle aqui">
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
                                                                    <label for="frecuencia_respiratoria">Frecuencia
                                                                        respiratoria<span
                                                                            class="text-danger">(*)</span>:</label>
                                                                    <div class="input-group mb-3">
                                                                        <input type="text" id="frecuencia_respiratoria"
                                                                            name="frecuencia_respiratoria"
                                                                            class="form-control"
                                                                            placeholder="escriba aqui">
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
                                                                    <label for="peso">Peso <span
                                                                            class="text-danger">(*)</span>:</label>
                                                                    <div class="input-group mb-3">
                                                                        <input type="text" id="peso" name="peso"
                                                                            class="form-control"
                                                                            placeholder="datalle aqui">
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
                                                                    <label for="talla">Talla<span
                                                                            class="text-danger">(*)</span>:</label>
                                                                    <div class="input-group mb-3">
                                                                        <input type="text" id="talla" name="talla"
                                                                            class="form-control"
                                                                            placeholder="escriba aqui">
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
                                                                    <label for="masa_corporal">Masa Corporal<span
                                                                            class="text-danger">(*)</span>:</label>
                                                                    <div class="input-group mb-3">
                                                                        <input type="text" id="masa_corporal"
                                                                            name="masa_corporal" class="form-control"
                                                                            placeholder="escriba aqui">
                                                                        <div class="input-group-append">
                                                                            <div class="input-group-text">
                                                                                <span class="fas ">kg/m</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <input type="hidden" name="id_persona2" id="id_persona2">
                                                        <input type="hidden" name="id_fisico" id="id_fisico">
                                                    </div>
                                                    <div class="form-group row text-right">
                                                        <div class="offset-sm-2 col-sm-10">
                                                            <button type="submit" class="btn btn-info">Guardar</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <!--alergias-->
                                            <div class="tab-pane" id="alergias">
                                                <!-- Main content -->
                                                <section class="content">
                                                    <div class="container-fluid">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="card ">
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
                                                    <div class="col-lg-12">
                                                        <div class="form-group">
                                                            <label for="nombre_alergia">Nombre<span
                                                                    class="text-danger">(*)</span>:</label>
                                                            <input type="text" id="nombre_alergia" name="nombre_alergia"
                                                                class="form-control" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="form-group">
                                                            <label for="detalle">Observacion<span
                                                                    class="text-danger">(*)</span>:</label>
                                                            <textarea class="form-control" id="detalle" name="detalle"
                                                                style="overflow:auto;resize:none" rows="2"
                                                                placeholder="Describa..."></textarea>
                                                        </div>
                                                    </div>
                                                    <input type="hidden" name="id_persona3" id="id_persona3">
                                                    <input type="hidden" name="id_alergia" id="id_alergia">
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
                            </div>
                            <div class="tab-pane" id="odontograma">
                                <div class="card ">
                                    <div class="card-header">
                                        <h3 class="card-title">Esquema grafico dental</h3>
                                    </div>

                                    <div ng-app='app' id="odontograma_dental">
                                        <section id="piezas">
                                            <div ng-controller='dientes' class="container" id='container'>
                                                <center>
                                                    <div class="row">
                                                        <div class="col {{i.tipoDiente}} p-0"
                                                            data-ng-repeat="i in adultoArriva">
                                                            <img src="{{i.imagenDiente}}" width="32" height="80">
                                                            <br>
                                                            <svg height="40" width="40" id="{{i.id}}">
                                                                <polygon points="8,12 12,8 40,36 36,40" estado="4"
                                                                    value="6" class="ausente" />
                                                                <polygon points="36,8 40,12 12,40 8,36" estado="4"
                                                                    value="7" class="ausente" />
                                                                <circle cx="24" cy="24" r="13" estado="8" value="8"
                                                                    class="corona" />
                                                                <circle cx="24" cy="24" r="16" estado="3" value="9"
                                                                    class="endodoncia" />
                                                                <polygon
                                                                    points="40,8 32,8 8,21 8,26 37,26 8,40 16,40 40,29 40,22 11,22"
                                                                    estado="6" value="10" class="implante" />
                                                                <polygon points="8,8 40,8 32,16 16,16" estado="0"
                                                                    value="1" class="diente" />
                                                                <polygon points="40,8 40,40 32,32 32,16" estado="0"
                                                                    value="2" class="diente" />
                                                                <polygon points="40,40 8,40 16,32 32,32" estado="0"
                                                                    value="3" class="diente" />
                                                                <polygon points="8,40 16,32 16,16 8,8" estado="0"
                                                                    value="4" class="diente" />
                                                                <polygon points="16,16 32,16 32,32 16,32" estado="0"
                                                                    value="5" class="diente" />
                                                            </svg>
                                                        </div>
                                                    </div>
                                                    <br>

                                                    <div class="row">
                                                        <div class="col {{i.tipoDiente}} p-0"
                                                            data-ng-repeat="i in ninoArriva">
                                                            <img src="{{i.imagenDiente}}" width="32" height="80">
                                                            <br>
                                                            <svg height="40" width="40" id="{{i.id}}">
                                                                <polygon points="8,12 12,8 40,36 36,40" estado="4"
                                                                    value="6" class="ausente" />
                                                                <polygon points="36,8 40,12 12,40 8,36" estado="4"
                                                                    value="7" class="ausente" />
                                                                <circle cx="24" cy="24" r="13" estado="8" value="8"
                                                                    class="corona" />
                                                                <circle cx="24" cy="24" r="16" estado="3" value="9"
                                                                    class="endodoncia" />
                                                                <polygon
                                                                    points="40,8 32,8 8,21 8,26 37,26 8,40 16,40 40,29 40,22 11,22"
                                                                    estado="6" value="10" class="implante" />
                                                                <polygon points="8,8 40,8 32,16 16,16" estado="0"
                                                                    value="1" class="diente" />
                                                                <polygon points="40,8 40,40 32,32 32,16" estado="0"
                                                                    value="2" class="diente" />
                                                                <polygon points="40,40 8,40 16,32 32,32" estado="0"
                                                                    value="3" class="diente" />
                                                                <polygon points="8,40 16,32 16,16 8,8" estado="0"
                                                                    value="4" class="diente" />
                                                                <polygon points="16,16 32,16 32,32 16,32" estado="0"
                                                                    value="5" class="diente" />
                                                            </svg>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <br>
                                                    <div class="row">
                                                        <div class="col {{i.tipoDiente}} p-0"
                                                            data-ng-repeat="i in ninoAbajo">
                                                            <svg height="40" width="40" id="{{i.id}}">
                                                                <polygon points="8,12 12,8 40,36 36,40" estado="4"
                                                                    value="6" class="ausente" />
                                                                <polygon points="36,8 40,12 12,40 8,36" estado="4"
                                                                    value="7" class="ausente" />
                                                                <circle cx="24" cy="24" r="13" estado="8" value="8"
                                                                    class="corona" />
                                                                <circle cx="24" cy="24" r="16" estado="3" value="9"
                                                                    class="endodoncia" />
                                                                <polygon
                                                                    points="40,8 32,8 8,21 8,26 37,26 8,40 16,40 40,29 40,22 11,22"
                                                                    estado="6" value="10" class="implante" />
                                                                <polygon points="8,8 40,8 32,16 16,16" estado="0"
                                                                    value="1" class="diente" />
                                                                <polygon points="40,8 40,40 32,32 32,16" estado="0"
                                                                    value="2" class="diente" />
                                                                <polygon points="40,40 8,40 16,32 32,32" estado="0"
                                                                    value="3" class="diente" />
                                                                <polygon points="8,40 16,32 16,16 8,8" estado="0"
                                                                    value="4" class="diente" />
                                                                <polygon points="16,16 32,16 32,32 16,32" estado="0"
                                                                    value="5" class="diente" />
                                                            </svg>
                                                            <br>
                                                            <img src="{{i.imagenDiente}}" width="32" height="80">
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="row">
                                                        <div class="col {{i.tipoDiente}} p-0"
                                                            data-ng-repeat="i in adultoAbajo">
                                                            <svg height="40" width="40" id="{{i.id}}">
                                                                <polygon points="8,12 12,8 40,36 36,40" estado="4"
                                                                    value="6" class="ausente" />
                                                                <polygon points="36,8 40,12 12,40 8,36" estado="4"
                                                                    value="7" class="ausente" />
                                                                <circle cx="24" cy="24" r="13" estado="8" value="8"
                                                                    class="corona" />
                                                                <circle cx="24" cy="24" r="16" estado="3" value="9"
                                                                    class="endodoncia" />
                                                                <polygon
                                                                    points="40,8 32,8 8,21 8,26 37,26 8,40 16,40 40,29 40,22 11,22"
                                                                    estado="6" value="10" class="implante" />
                                                                <polygon points="8,8 40,8 32,16 16,16" estado="0"
                                                                    value="1" class="diente" />
                                                                <polygon points="40,8 40,40 32,32 32,16" estado="0"
                                                                    value="2" class="diente" />
                                                                <polygon points="40,40 8,40 16,32 32,32" estado="0"
                                                                    value="3" class="diente" />
                                                                <polygon points="8,40 16,32 16,16 8,8" estado="0"
                                                                    value="4" class="diente" />
                                                                <polygon points="16,16 32,16 32,32 16,32" estado="0"
                                                                    value="5" class="diente" />
                                                            </svg>
                                                            <br>
                                                            <img src="{{i.imagenDiente}}" width="32" height="80">
                                                        </div>
                                                    </div>

                                                </center>
                                            </div>
                                        </section>
                                        <section id="opciones">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <div class="card card-primary">
                                                            <div class="card-header">
                                                                <h3 class="card-title">Opcion</h3>
                                                            </div>
                                                            <div class="card-body small">
                                                                <input type="radio" id="Decidua" name="tipo" value="1"
                                                                    checked />
                                                                <label for="Decidua">Permanentes</label>
                                                                <br>
                                                                <input type="radio" id="Niños" name="tipo" value="2" />
                                                                <label for="Niños">Decidua</label>
                                                                <br>
                                                                <input type="radio" id="Mixta" name="tipo" value="3" />
                                                                <label for="Mixta">Mixta</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-9">
                                                    <div class="form-group">
                                                        <div class="card card-primary">
                                                            <div class="card-header">
                                                                <h3 class="card-title">Opciones</h3>
                                                            </div>
                                                            <div class="card-body small">
                                                                <table border="1">
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
                                                                            <div class="color" value="1"
                                                                                style="background-color:red;width:20px;height:20px">
                                                                            </div>
                                                                        </center>
                                                                    </td>
                                                                    <td>
                                                                        <center>
                                                                            <div class="color" value="2"
                                                                                style="background-color:yellow;width:20px;height:20px">
                                                                            </div>
                                                                        </center>
                                                                    </td>
                                                                    <td>
                                                                        <center>
                                                                            <div class="color" value="3"
                                                                                style="background-color:orange;width:20px;height:20px">
                                                                            </div>
                                                                        </center>
                                                                    </td>
                                                                    <td>
                                                                        <center>
                                                                            <div class="color" value="4"
                                                                                style="background-color:tomato;width:20px;height:20px">
                                                                            </div>
                                                                        </center>
                                                                    </td>
                                                                    <td>
                                                                        <center>
                                                                            <div class="color" value="5"
                                                                                style="background-color:#CC6600;width:20px;height:20px">
                                                                            </div>
                                                                        </center>
                                                                    </td>
                                                                    <td>
                                                                        <center>
                                                                            <div class="color" value="6"
                                                                                style="background-color:#CC66CC;width:20px;height:20px">
                                                                            </div>
                                                                        </center>
                                                                    </td>
                                                                    <td>
                                                                        <center>
                                                                            <div class="color" value="7"
                                                                                style="background-color:green;width:20px;height:20px">
                                                                            </div>
                                                                        </center>
                                                                    </td>
                                                                    <td>
                                                                        <center>
                                                                            <div class="color" value="8"
                                                                                style="background-color:blue;width:20px;height:20px">
                                                                            </div>
                                                                        </center>
                                                                    </td>
                                                                    <td>
                                                                        <center>
                                                                            <div class="color" value="9"
                                                                                style="background-color:black;width:20px;height:20px">
                                                                            </div>
                                                                        </center>
                                                                    </td>
                                                                    <tr>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                    </div>
                                    <div class="form-group row text-right">
                                        <div class="offset-sm-2 col-sm-10">
                                            <button type="submit" class="btn btn-info"
                                                id="guardar-odontograma">Guardar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--Tratamientos realizados-->
                            <div class="tab-pane" id="acciones">
                                <div class="card ">
                                    <div class="card-header p-2">
                                        <ul class="nav nav-tabs">
                                            <li class="nav-item"><a class="nav-link active" href="#diagnostico"
                                                    data-toggle="tab">Diagnostico</a></li>
                                            <li class="nav-item"><a class="nav-link" href="#recomendaciones"
                                                    data-toggle="tab">Medicacion y Recomendaciones</a></li>
                                            <li class="nav-item"><a class="nav-link" href="#acciones_decisivas"
                                                    data-toggle="tab">Acciones decesivas</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- enfermedad Actual-->
                                    <div class="card-body">
                                        <div class="tab-content">
                                            <div class="active tab-pane" id="diagnostico">
                                                <form id="frm_guardar_diagnostico">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label for="motivo_consulta">Tipo de diagnostico<span
                                                                        class="text-danger">(*)</span>:</label>
                                                                <select class="custom-select" id="tipo_diagnostico"
                                                                    name="tipo_diagnostico" required>
                                                                    <option value="">-- Seleccione --</option>
                                                                    <option value="periodontitis apical cronica">periodontitis apical cronica</option>
                                                                    <option value="Absceso Periapical Sin Fistula">Absceso Periapical Sin Fistula</option>
                                                                    <option value="Caries de dentina">Caries de dentina</option>
                                                                    <option value="pulpititis">pulpititis</option>
                                                                    <option value="Acreciones En Los Dientes">Acreciones En Los Dientes</option>
                                                                    <option value="dientes sanos">Dientes sanos</option>
                                                                </select>
                                                            </div>
                                                            <input type="hidden" name="id_persona8" id="id_persona8">
                                                            <input type="hidden" name="id_diagnostico" id="id_diagnostico">
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label for="pieza_dentaria">Pieza dentaria
                                                                    <span class="text-danger">(*)</span>:</label>
                                                                <textarea type="text" id="pieza_dentaria"
                                                                    name="pieza_dentaria" class="form-control"
                                                                    style="overflow:auto;resize:none" rows="2"
                                                                    placeholder="escriba aqui"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label for="medida_preventiva">Medidas preventivas<span
                                                                        class="text-danger">(*)</span>:</label>
                                                                    <select class="custom-select" id="medida_preventiva"
                                                                    name="medida_preventiva" required>
                                                                    <option value="">-- Seleccione --</option>
                                                                    <option value="profilaxis">profilaxis</option>
                                                                    <option value="fluor topico">Fluor topico</option>
                                                                    <option value="fluor">Fluor</option>
                                                                    <option value="ninguno">Ninguno</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label for="acciones_curativas">Acciones curativas
                                                                    <span class="text-danger">(*)</span>:</label>
                                                                <div>
                                                                    <input type="radio" name="acciones_curativas"
                                                                        value="Restauracion">Restauracion <br>
                                                                    <input type="radio" name="acciones_curativas"
                                                                        value="Extracion">Extracion <br>
                                                                    <input type="radio" name="acciones_curativas"
                                                                        value="Prevencion">Prevencion <br>
                                                                    <input type="radio" name="acciones_curativas"
                                                                        value="periodoncia">periodoncia <br>
                                                                    <input type="radio" name="acciones_curativas"
                                                                        value="Cirugia bucal">Cirugia bucal <br>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row text-right">
                                                        <div class="offset-sm-2 col-sm-10">
                                                            <button type="submit" class="btn btn-info">Guardar</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <!-- receta medica-->
                                            <div class="tab-pane" id="recomendaciones">
                                                <form id="frm_guardar_medicacion">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label for="entrega_medicamento">Entrega de
                                                                    Medicamento<span
                                                                        class="text-danger">(*)</span>:</label>
                                                                <textarea type="text" id="entrega_medicamento"
                                                                    name="entrega_medicamento" class="form-control"
                                                                    style="overflow:auto;resize:none" rows="2"
                                                                    placeholder="escriba aqui"></textarea>
                                                            </div>
                                                            <input type="hidden" name="id_persona9" id="id_persona9">
                                                            <input type="hidden" name="id_medicacion" id="id_medicacion">
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label for="receta_medica">Receta Medica<span
                                                                        class="text-danger">(*)</span>:</label>
                                                                <textarea type="text" id="receta_medica"
                                                                    name="receta_medica" class="form-control"
                                                                    style="overflow:auto;resize:none" rows="2"
                                                                    placeholder="escriba aqui"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="form-group">
                                                                <label for="recomendaciones">Recomendaciones<span
                                                                        class="text-danger">(*)</span>:</label>
                                                                <textarea type="text" id="recomendaciones"
                                                                    name="recomendaciones" class="form-control"
                                                                    style="overflow:auto;resize:none" rows="2"
                                                                    placeholder="escriba aqui"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row text-right">
                                                        <div class="offset-sm-2 col-sm-10">
                                                            <button type="submit" class="btn btn-info">Guardar</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <!-- accion-decesivas-->
                                            <div class="tab-pane" id="acciones_decisivas">
                                                <form id="frm_guardar_accionesDecesivas">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label for="subjetivo">Subjetivo<span
                                                                        class="text-danger">(*)</span>:</label>
                                                                <textarea type="text" id="subjetivo"
                                                                    name="subjetivo" class="form-control"
                                                                    style="overflow:auto;resize:none" rows="2"
                                                                    placeholder="escriba aqui"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label for="objetivo">Objetivo<span
                                                                        class="text-danger">(*)</span>:</label>
                                                                <textarea type="text" id="objetivo"
                                                                    name="objetivo" class="form-control"
                                                                    style="overflow:auto;resize:none" rows="2"
                                                                    placeholder="escriba aqui"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label for="analisis">Analisis<span
                                                                        class="text-danger">(*)</span>:</label>
                                                                <textarea type="text" id="analisis"
                                                                    name="analisis" class="form-control"
                                                                    style="overflow:auto;resize:none" rows="2"
                                                                    placeholder="escriba aqui"></textarea>
                                                            </div>
                                                            <input type="hidden" name="id_persona10" id="id_persona10">
                                                            <input type="hidden" name="id_acciones_decesivas" id="id_acciones_decesivas">
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label for="plan_accion">Plan de accion<span
                                                                        class="text-danger">(*)</span>:</label>
                                                                <textarea type="text" id="plan_accion"
                                                                    name="plan_accion" class="form-control"
                                                                    style="overflow:auto;resize:none" rows="2"
                                                                    placeholder="escriba aqui"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row text-right">
                                                        <div class="offset-sm-2 col-sm-10">
                                                            <button type="submit" class="btn btn-info">Guardar</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <!--alergias-->
                                            <div class="tab-pane" id="alergias">
                                                <!-- Main content -->
                                                <section class="content">
                                                    <div class="container-fluid">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="card ">
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
                            <!--Tratamientos realizados-->
                            <div class="tab-pane" id="tratamientos">
                                <!-- Main content -->
                                <section class="content">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="card card-info">
                                                    <div class="card-header">
                                                        <h3 class="card-title">
                                                            Tratamientos Realizados
                                                        </h3>
                                                    </div>
                                                    <div class="card-body">
                                                        <!-- /.Contenido de la vista -->
                                                        <table id="tbl_citas" class="table table-striped table-bordered"
                                                            cellspacing="0" width="100%">
                                                            <thead>
                                                                <tr>
                                                                    <th width="5%">#</th>
                                                                    <th># cita</th>
                                                                    <th>Paciente</th>
                                                                    <th>Tratamiento</th>
                                                                    <th>Observaci&oacute;n</th>
                                                                    <th>Fecha</th>
                                                                    <th>Hora</th>
                                                                    <th>Hora Final</th>
                                                                    <th>Costo</th>
                                                                    <th>Odont&oacute;logo</th>
                                                                    <th>Estado</th>
                                                                    <th>Registrado</th>
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
                <form id="frm_perfil">
                    <div class="card card-primary ">
                        <div class="card-header">
                            <h3 class="card-title">Perfil del paciente</h3>
                        </div>
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle" id="perfil_foto"
                                    src="<?= base_url('img/users/default/persona1.png'); ?>"
                                    alt="User profile picture" />
                            </div>
                            <h3 id="perfil_nombre_completo" class="profile-username text-center"></h3>
                            <p id="perfil_grupo" class="text-muted text-center"></p>
                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>Nacimiento</b> <a id="perfil_nacimiento" class="float-right"></a>
                                </li>
                            </ul>
                        </div>
                        <input type="hidden" name="id_persona5" id="id_persona5">
                        <input type="hidden" name="id_perfil" id="id_perfil">
                    </div>
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Acerca del paciente</h3>
                        </div>
                        <div class="card-body">
                            <strong><i class="fa fa-phone" aria-hidden="true"></i> Celular</strong>
                            <p id="perfil_celular" class="text-muted"></p>
                            <hr>
                            <strong><i class="fas fa-map-marker-alt mr-1"></i> Domicilio</strong>
                            <p id="perfil_domicilio" class="text-muted"></p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
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

<script src="<?php echo base_url('odontograma/scripts/html2canvas.min.js') ?>"></script>
<script src="<?php echo base_url('odontograma/scripts/FileSaver.min.js') ?>"></script>