--tabla de citas implemetado--
ALTER TABLE `sp_cita` ADD `hora_final` TIME NOT NULL AFTER `hora_inicio`;

--tabla de citas alterada--
ALTER TABLE `sp_cita` ADD `estatus` ENUM('Pendiente','Cancelada','Atendida') NOT NULL AFTER `costo`;
ALTER TABLE `sp_cita` CHANGE `hora` `hora_inicio` TIME NOT NULL;

--vista de citas alterada--
CREATE OR REPLACE VIEW `sp_view_cita` AS
select
    `cita`.`id_cita` AS `id_cita`,
    `cita`.`numero_cita` AS 'numero_cita', 
    `cita`.`tipo_tratamiento` AS `tipo_tratamiento`,
    `cita`.`observacion` AS `observacion`,
    `cita`.`fecha` AS `fecha`,
    `cita`.`hora_inicio` AS `hora_inicio`,
    `cita`.`hora_final` AS `hora_final`,
    `cita`.`costo` AS `costo`,
    `cita`.`estatus` AS `estatus`,
    `cita`.`estado` AS `estado`,
    `paciente`.`id_paciente` AS `id_paciente`,
	    
    concat(`persona_paciente`.`nombres`, ' ', `persona_paciente`.`paterno`, ' ', `persona_paciente`.`materno`) AS `nombre_paciente`,
    concat(`persona_paciente`.`ci`, ' ', `persona_paciente`.`expedido`) AS `ci_paciente`,
    `odontologo`.`id_odontologo` AS `id_odontologo`,
    concat(`persona_odontologo`.`nombres`, ' ', `persona_odontologo`.`paterno`, ' ', `persona_odontologo`.`materno`) AS `nombre_odontologo`,
    concat(`persona_odontologo`.`ci`, ' ', `persona_odontologo`.`expedido`) AS `ci_odontologo`,
    `cita`.`creado_en` AS `creado_en`
from
    ((((`sp_cita` `cita`
join `sp_paciente` `paciente` on
    (`cita`.`id_paciente` = `paciente`.`id_paciente`))
join `sp_persona` `persona_paciente` on
    (`persona_paciente`.`id_persona` = `paciente`.`id_paciente`))
join `sp_odontologo` `odontologo` on
    (`cita`.`id_odontologo` = `odontologo`.`id_odontologo`))
join `sp_persona` `persona_odontologo` on
    (`odontologo`.`id_odontologo` = `persona_odontologo`.`id_persona`));

--tabla de PERSONA alterada
ALTER TABLE `sp_persona` ADD `estatus` ENUM('ACTIVO','INACTIVO') NOT NULL AFTER `domicilio`;

-- Vista de Paciente y Persona alterada--
CREATE OR REPLACE VIEW `sp_view_paciente`  AS  
select p.id_persona, CONCAT(p.ci, ' ' ,p.expedido) AS ci_exp, 
CONCAT(p.nombres, ' ', p.paterno,' ', p.materno) AS nombre_completo, p.telefono_celular, p.fecha_nacimiento,
p.domicilio,o.id_ocupacion, o.nombre as ocupacion, p.estatus, p.estado, p.creado_en
from sp_persona p join sp_paciente pa 
on p.id_persona = pa.id_paciente
join sp_ocupacion o on pa.id_ocupacion = o.id_ocupacion;

-- Vista de Odontologo y Persona alterada--
CREATE OR REPLACE VIEW `sp_view_odontologo`  AS  
select p.id_persona, CONCAT(p.ci, ' ' ,p.expedido) AS ci_exp, 
CONCAT(p.nombres, ' ', p.paterno,' ', p.materno) AS nombre_completo, p.telefono_celular, p.fecha_nacimiento,
p.domicilio,o.turno, o.gestion_ingreso, p.estatus, p.estado, p.creado_en
from sp_persona p join sp_odontologo o
on p.id_persona = o.id_odontologo;



ALTER TABLE `sp_usuario` ADD `foto` VARCHAR(100) NOT NULL AFTER `clave`;

--creacion de la tabla alergias--
CREATE TABLE `sp_tratamiento_alergias` (
  `id_alergia` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_alergia` VARCHAR(50),
  `detalle` VARCHAR(250),
  `id_paciente` int(11) NOT NULL,
  `creado_en` timestamp NOT NULL DEFAULT current_timestamp(),
  `actualizado_en` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_alergia`),
  KEY `fk_tratamiento_alergias_paciente` (`id_paciente`),
  CONSTRAINT `fk_tratamiento_alergias_paciente` FOREIGN KEY (`id_paciente`) REFERENCES `sp_paciente` (`id_paciente`)
);
--creacion de la vista de tratamiento-alergias--
CREATE OR REPLACE VIEW `sp_view_tratamiento_alergias` AS
select
    `tratamiento_alergias`.`id_alergia` AS `id_alergia`,
    `tratamiento_alergias`.`nombre_alergia` AS 'nombre_alergia', 
    `tratamiento_alergias`.`detalle` AS `detalle`,
    `paciente`.`id_paciente` AS `id_paciente`,
	    
    concat(`persona_paciente`.`nombres`, ' ', `persona_paciente`.`paterno`, ' ', `persona_paciente`.`materno`) AS `nombre_paciente`,
    concat(`persona_paciente`.`ci`, ' ', `persona_paciente`.`expedido`) AS `ci_paciente`,
    `tratamiento_alergias`.`creado_en` AS `creado_en`
from
    ((`sp_tratamiento_alergias` `tratamiento_alergias`
join `sp_paciente` `paciente` on
    (`tratamiento_alergias`.`id_paciente` = `paciente`.`id_paciente`))
join `sp_persona` `persona_paciente` on
    (`persona_paciente`.`id_persona` = `paciente`.`id_paciente`));


--creacion de la tabla enfermedad--
CREATE TABLE `sp_tratamiento_enfermedad` (
  `id_enfermedad` int(11) NOT NULL AUTO_INCREMENT,
  `tiempo_consulta` VARCHAR(50),
  `motivo_consulta` VARCHAR(100),
  `sintomas_principales` VARCHAR(150),
  `tomando_medicamentos` VARCHAR(25),
  `nombre_medicamento` VARCHAR(250),
  `motivo_medicamento` VARCHAR(250),
  `dosis_medicamento` VARCHAR(250),
  `id_paciente` int(11) NOT NULL,
  `creado_en` timestamp NOT NULL DEFAULT current_timestamp(),
  `actualizado_en` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_enfermedad`),
  KEY `fk_tratamiento_enfermedad_paciente` (`id_paciente`),
  CONSTRAINT `fk_tratamiento_enfermedad_paciente` FOREIGN KEY (`id_paciente`) REFERENCES `sp_paciente` (`id_paciente`)
);
--creacion de la vista de tratamiento-enfermedad--
CREATE OR REPLACE VIEW `sp_view_tratamiento_enfermedad` AS
select
    `tratamiento_enfermedad`.`id_enfermedad` AS `id_enfermedad`,
    `tratamiento_enfermedad`.`tiempo_consulta` AS 'tiempo_consulta', 
    `tratamiento_enfermedad`.`motivo_consulta` AS `motivo_consulta`,
    `tratamiento_enfermedad`.`sintomas_principales` AS `sintomas_principales`,
    `tratamiento_enfermedad`.`tomando_medicamentos` AS `tomando_medicamento`,
    `tratamiento_enfermedad`.`nombre_medicamento` AS `nombre_medicamento`,
    `tratamiento_enfermedad`.`motivo_medicamento` AS `motivo_medicamento`,
    `tratamiento_enfermedad`.`dosis_medicamento` AS `dosis_medicamento`,
    `paciente`.`id_paciente` AS `id_paciente`,
	    
    concat(`persona_paciente`.`nombres`, ' ', `persona_paciente`.`paterno`, ' ', `persona_paciente`.`materno`) AS `nombre_paciente`,
    `tratamiento_enfermedad`.`creado_en` AS `creado_en`
from
    ((`sp_tratamiento_enfermedad` `tratamiento_enfermedad`
join `sp_paciente` `paciente` on
    (`tratamiento_enfermdad`.`id_paciente` = `paciente`.`id_paciente`))
join `sp_persona` `persona_paciente` on
    (`persona_paciente`.`id_persona` = `paciente`.`id_paciente`));


--creacion de la tabla consulta--
CREATE TABLE `sp_tratamiento_consulta` (
  `id_consulta` int(11) NOT NULL AUTO_INCREMENT,
  `tratamiento` VARCHAR(25),
  `motivo_tratamiento` VARCHAR(250),
  `tomando_medicamentos` VARCHAR(25),
  `porque_tiempo` VARCHAR(250),
  `alergico_medicamento` VARCHAR(25),
  `cual_medicamento` VARCHAR(250),
  `alguna_cirugia` VARCHAR(25),
  `porque` VARCHAR(250),
  `alguna_enfermedad` VARCHAR(250),
  `cepilla_diente` VARCHAR(25),
  `cuanto_dia` VARCHAR(150),
  `id_paciente` int(11) NOT NULL,
  `creado_en` timestamp NOT NULL DEFAULT current_timestamp(),
  `actualizado_en` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_consulta`),
  KEY `fk_tratamiento_consulta_paciente` (`id_paciente`),
  CONSTRAINT `fk_tratamiento_consulta_paciente` FOREIGN KEY (`id_paciente`) REFERENCES `sp_paciente` (`id_paciente`)
);

--creacion de la vista de tratamiento-consulta--
CREATE OR REPLACE VIEW `sp_view_tratamiento_consulta` AS
select
    `tratamiento_consulta`.`id_consulta` AS `id_consulta`,
    `tratamiento_consulta`.`tratamiento` AS 'tratamiento', 
    `tratamiento_consulta`.`motivo_tratamiento` AS `motivo_tratamiento`,
    `tratamiento_consulta`.`tomando_medicamentos` AS `tomando_medicamentos`,
    `tratamiento_consulta`.`porque_tiempo` AS `porque_tiempo`,
    `tratamiento_consulta`.`alergico_medicamento` AS `alergico_medicamento`,
    `tratamiento_consulta`.`cual_medicamento` AS `cual_medicamento`,
    `tratamiento_consulta`.`alguna_cirugia` AS `alguna_cirugia`,
    `tratamiento_consulta`.`porque` AS `porque`,
    `tratamiento_consulta`.`alguna_enfermedad` AS `alguna_enfermedad`,
    `tratamiento_consulta`.`cepilla_diente` AS `cepilla_diente`,
    `tratamiento_consulta`.`cuanto_dia` AS `cuanto_dia`,
    `paciente`.`id_paciente` AS `id_paciente`,
	    
    concat(`persona_paciente`.`nombres`, ' ', `persona_paciente`.`paterno`, ' ', `persona_paciente`.`materno`) AS `nombre_paciente`,
    `tratamiento_consulta`.`creado_en` AS `creado_en`
from
    ((`sp_tratamiento_consulta` `tratamiento_consulta`
join `sp_paciente` `paciente` on
    (`tratamiento_consulta`.`id_paciente` = `paciente`.`id_paciente`))
join `sp_persona` `persona_paciente` on
    (`persona_paciente`.`id_persona` = `paciente`.`id_paciente`));

--creacion de la tabla fisico--
CREATE TABLE `sp_tratamiento_fisico` (
  `id_fisico` int(11) NOT NULL AUTO_INCREMENT,
  `presion_arterial` DECIMAL,
  `pulso` DECIMAL,
  `temperatura` DECIMAL,
  `frecuencia_cardiaca` DECIMAL,
  `frecuencia_respiratoria` DECIMAL,
  `peso` DECIMAL,
  `talla` DECIMAL,
  `masa_corporal` DECIMAL,
  `id_paciente` int(11) NOT NULL,
  `creado_en` timestamp NOT NULL DEFAULT current_timestamp(),
  `actualizado_en` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_fisico`),
  KEY `fk_tratamiento_fisico_paciente` (`id_paciente`),
  CONSTRAINT `fk_tratamiento_fisico_paciente` FOREIGN KEY (`id_paciente`) REFERENCES `sp_paciente` (`id_paciente`)
);
--creacion de la vista de tratamiento-fisico--
CREATE OR REPLACE VIEW `sp_view_tratamiento_fisico` AS
select
    `tratamiento_fisico`.`id_fisico` AS `id_fisico`,
    `tratamiento_fisico`.`presion_arterial` AS 'presion_alterial', 
    `tratamiento_fisico`.`pulso` AS `pulso`,
    `tratamiento_fisico`.`temperatura` AS `temperatura`,
    `tratamiento_fisico`.`frecuencia_cardiaca` AS `frecuencia_cardiaca`,
    `tratamiento_fisico`.`frecuencia_respiratoria` AS `frecuencia_respiratoria`,
    `tratamiento_fisico`.`peso` AS `peso`,
    `tratamiento_fisico`.`talla` AS `talla`,
    `tratamiento_fisico`.`masa_corporal` AS `masa_corporal`,
    `paciente`.`id_paciente` AS `id_paciente`,
	    
    concat(`persona_paciente`.`nombres`, ' ', `persona_paciente`.`paterno`, ' ', `persona_paciente`.`materno`) AS `nombre_paciente`,
    `tratamiento_fisico`.`creado_en` AS `creado_en`
from
    ((`sp_tratamiento_fisico` `tratamiento_fisico`
join `sp_paciente` `paciente` on
    (`tratamiento_fisico`.`id_paciente` = `paciente`.`id_paciente`))
join `sp_persona` `persona_paciente` on
    (`persona_paciente`.`id_persona` = `paciente`.`id_paciente`));

--tabla alterada de persona--
ALTER TABLE `sp_persona` ADD `sexo` VARCHAR(20) NOT NULL AFTER `materno`, ADD `lugar_nacimiento` VARCHAR(100) NOT NULL AFTER `sexo`;

-- Vista de Paciente y Persona alterada--
CREATE OR REPLACE VIEW `sp_view_paciente`  AS  
select p.id_persona, CONCAT(p.ci, ' ' ,p.expedido) AS ci_exp, 
CONCAT(p.nombres, ' ', p.paterno,' ', p.materno) AS nombre_completo, p.sexo, p.lugar_nacimiento, p.telefono_celular, p.fecha_nacimiento,
p.domicilio,o.id_ocupacion, o.nombre as ocupacion, p.estatus, p.estado, p.creado_en
from sp_persona p join sp_paciente pa 
on p.id_persona = pa.id_paciente
join sp_ocupacion o on pa.id_ocupacion = o.id_ocupacion;