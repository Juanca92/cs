



CREATE OR REPLACE VIEW `sp_view_cita` AS
select
    `cita`.`id_cita` AS `id_cita`,
    `cita`.`numero_cita` AS 'numero_cita', 
    `cita`.`tipo_tratamiento` AS `tipo_tratamiento`,
    `cita`.`observacion` AS `observacion`,
    `cita`.`fecha` AS `fecha`,
    `cita`.`hora` AS `hora`,
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


