create or replace view `sanpedro`.`sp_view_paciente_cita` as
select   `p`.`id_persona` as `id_persona`,
    concat(`p`.`ci`, ' ', `p`.`expedido`) as `ci_exp`,
    concat('Cita Nro',' ', numero_cita) numero_cita,
    concat(`p`.`nombres`, ' ', `p`.`paterno`, ' ', `p`.`materno`) as `nombre_completo`,
    `p`.`sexo` as `sexo`,
    `p`.`lugar_nacimiento` as `lugar_nacimiento`,
    `p`.`telefono_celular` as `telefono_celular`,
    `p`.`fecha_nacimiento` as `fecha_nacimiento`,
    `p`.`domicilio` as `domicilio`,
    `o`.`id_ocupacion` as `id_ocupacion`,
    `o`.`nombre` as `ocupacion`,
    `p`.`estatus` as `estatus`,
    `p`.`estado` as `estado`,
    `p`.`creado_en` as `creado_en`,
    c.id_cita 
from sp_persona p
join sp_paciente pa on p.id_persona = pa.id_paciente
join sp_ocupacion o on pa.id_ocupacion = o.id_ocupacion
join sp_cita c on c.id_paciente = pa.id_paciente 
where c.estatus = 'PENDIENTE'
order by id_persona,  numero_cita desc;

alter table sp_tratamiento_fisico drop constraint fk_tratamiento_fisico_paciente;
alter table sp_acciones_decesivas drop constraint fk_acciones_decesivas_paciente;

ALTER TABLE sp_tratamiento_fisico CHANGE id_paciente id_cita int;
ALTER TABLE sp_acciones_decesivas CHANGE id_paciente id_cita int;


alter table sp_tratamiento_fisico add constraint fk_tratamiento_fisico_paciente foreign key(id_cita) references sp_cita(id_cita);
alter table sp_acciones_decesivas add constraint fk_acciones_decesivas_paciente foreign key(id_cita) references sp_cita(id_cita);

drop view sp_view_tratamiento_fisico;