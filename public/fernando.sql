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

CREATE TABLE `sp_horario` (
  `id_horario` int(11) NOT NULL AUTO_INCREMENT,
  `entrada` time not null,
  `salida` time not null,
  `id_cita` int(11) NOT NULL,
  `creado_en` timestamp NOT NULL DEFAULT current_timestamp(),
  `actualizado_en` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_horario`),
);

INSERT INTO `sp_horario` (`id_horario`, `entrada`, `salida`, `creado_en`, `actualizado_en`) VALUES (NULL, '08:30:00', '09:00:00', current_timestamp(), NULL);
INSERT INTO `sp_horario` (`id_horario`, `entrada`, `salida`, `creado_en`, `actualizado_en`) VALUES (NULL, '09:00:00', '09:30:00', current_timestamp(), NULL);
INSERT INTO `sp_horario` (`id_horario`, `entrada`, `salida`, `creado_en`, `actualizado_en`) VALUES (NULL, '09:30:00', '10:00:00', current_timestamp(), NULL);
INSERT INTO `sp_horario` (`id_horario`, `entrada`, `salida`, `creado_en`, `actualizado_en`) VALUES (NULL, '10:00:00', '10:30:00', current_timestamp(), NULL);
INSERT INTO `sp_horario` (`id_horario`, `entrada`, `salida`, `creado_en`, `actualizado_en`) VALUES (NULL, '10:30:00', '11:00:00', current_timestamp(), NULL);
INSERT INTO `sp_horario` (`id_horario`, `entrada`, `salida`, `creado_en`, `actualizado_en`) VALUES (NULL, '11:00:00', '11:30:00', current_timestamp(), NULL);
INSERT INTO `sp_horario` (`id_horario`, `entrada`, `salida`, `creado_en`, `actualizado_en`) VALUES (NULL, '11:30:00', '12:00:00', current_timestamp(), NULL);
INSERT INTO `sp_horario` (`id_horario`, `entrada`, `salida`, `creado_en`, `actualizado_en`) VALUES (NULL, '12:00:00', '12:30:00', current_timestamp(), NULL);
INSERT INTO `sp_horario` (`id_horario`, `entrada`, `salida`, `creado_en`, `actualizado_en`) VALUES (NULL, '14:30:00', '15:00:00', current_timestamp(), NULL);
INSERT INTO `sp_horario` (`id_horario`, `entrada`, `salida`, `creado_en`, `actualizado_en`) VALUES (NULL, '15:00:00', '15:30:00', current_timestamp(), NULL);
INSERT INTO `sp_horario` (`id_horario`, `entrada`, `salida`, `creado_en`, `actualizado_en`) VALUES (NULL, '15:30:00', '16:00:00', current_timestamp(), NULL);
INSERT INTO `sp_horario` (`id_horario`, `entrada`, `salida`, `creado_en`, `actualizado_en`) VALUES (NULL, '16:00:00', '16:30:00', current_timestamp(), NULL);
INSERT INTO `sp_horario` (`id_horario`, `entrada`, `salida`, `creado_en`, `actualizado_en`) VALUES (NULL, '16:30:00', '17:00:00', current_timestamp(), NULL);
INSERT INTO `sp_horario` (`id_horario`, `entrada`, `salida`, `creado_en`, `actualizado_en`) VALUES (NULL, '17:00:00', '17:30:00', current_timestamp(), NULL);
INSERT INTO `sp_horario` (`id_horario`, `entrada`, `salida`, `creado_en`, `actualizado_en`) VALUES (NULL, '17:30:00', '18:00:00', current_timestamp(), NULL);
INSERT INTO `sp_horario` (`id_horario`, `entrada`, `salida`, `creado_en`, `actualizado_en`) VALUES (NULL, '18:00:00', '18:30:00', current_timestamp(), NULL);

