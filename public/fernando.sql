-- sql de fernando --
CREATE TABLE sp_agenda
(
	id_agenda INT NOT NULL,
	title VARCHAR(255),
    start DATETIME,
    end DATETIME,
	creado_en TIMESTAMP NOT NULL default now(),
	actualizado_en TIMESTAMP NULL DEFAULT null,
	PRIMARY KEY(id_agenda)
);

-- Vista de Paciente y Persona --
CREATE OR REPLACE VIEW `sp_view_agenda`  AS  
select id_agenda, AS agenda.title, agenda.start, agenda.end
p.domicilio,o.id_ocupacion, o.nombre as ocupacion, p.estado, p.creado_en
from sp_persona p join sp_paciente pa 
on p.id_persona = pa.id_paciente
join sp_ocupacion o on pa.id_ocupacion = o.id_ocupacion;