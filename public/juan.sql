-- Creacion de las tablas persona, odontologo, paciente, usuario, grupo y grupo usuario --
CREATE TABLE sp_persona
(
	id_persona INT NOT NULL AUTO_INCREMENT,
	ci INT NOT NULL,
	expedido VARCHAR(4) NOT NULL,
	nombres VARCHAR(50) NOT NULL,
	paterno VARCHAR(25) NOT NULL,
	materno VARCHAR(25),
	telefono_celular VARCHAR(20),
	fecha_nacimiento DATE,
	domicilio VARCHAR(150),
	estado TINYINT(1) NOT NULL DEFAULT '1',
	creado_en TIMESTAMP NOT NULL default now(),
	actualizado_en TIMESTAMP NULL DEFAULT null,
	PRIMARY KEY(id_persona)
);

CREATE TABLE sp_paciente
(
	id_paciente INT NOT NULL,
	ocupacion VARCHAR(70),
	creado_en TIMESTAMP NOT NULL default now(),
	actualizado_en TIMESTAMP NULL DEFAULT null,
	PRIMARY KEY(id_paciente),
	CONSTRAINT fk_persona_paciente FOREIGN KEY(id_paciente) REFERENCES sp_persona(id_persona)
);

CREATE TABLE sp_odontologo
(
	id_odontologo INT NOT NULL,
	turno VARCHAR(20) NOT NULL,
	gestion_ingreso YEAR NOT NULL,
	creado_en TIMESTAMP NOT NULL default now(),
	actualizado_en TIMESTAMP NULL DEFAULT null,
	PRIMARY KEY(id_odontologo),
	CONSTRAINT fk_persona_odontologo FOREIGN KEY(id_odontologo) REFERENCES sp_persona(id_persona)
);

CREATE TABLE sp_usuario
(
	id_usuario INT NOT NULL,
	usuario VARCHAR(30) NOT NULL,
	clave VARCHAR(256) NOT NULL,
	creado_en TIMESTAMP NOT NULL default now(),
	actualizado_en TIMESTAMP NULL DEFAULT null,
	PRIMARY KEY(id_usuario),
	CONSTRAINT fk_persona_usuario FOREIGN KEY (id_usuario) REFERENCES sp_persona (id_persona)	
);

CREATE TABLE sp_grupo
(
	id_grupo INT NOT NULL AUTO_INCREMENT,
	nombre_grupo VARCHAR(50) NOT NULL,
	estado TINYINT(1) NOT NULL DEFAULT '1',
	creado_en TIMESTAMP NOT NULL default now(),
	actualizado_en TIMESTAMP NULL DEFAULT null,
	PRIMARY KEY(id_grupo)
);

CREATE TABLE sp_grupo_usuario
(
	id_grupo_usuario INT NOT NULL AUTO_INCREMENT,
	id_grupo INT NOT NULL,
	id_usuario INT NOT NULL,
	ip_usuario VARCHAR(30),
	creado_en TIMESTAMP NOT NULL default now(),
	actualizado_en TIMESTAMP NULL DEFAULT null,
	PRIMARY KEY(id_grupo_usuario),
	CONSTRAINT fk_grupousuario_grupo FOREIGN KEY (`id_grupo`) REFERENCES `sp_grupo` (`id_grupo`),
  	CONSTRAINT fk_grupousuario_usuario FOREIGN KEY (`id_usuario`) REFERENCES `sp_usuario` (`id_usuario`)
);

-- Fin creacion de las tablas persona, odontologo, paciente, usuario, grupo y grupo usuario --

--Creacion de la tabla Ocupaciones y Profesiones --
CREATE TABLE sp_ocupacion
(
	id_ocupacion INT NOT NULL AUTO_INCREMENT,
	nombre VARCHAR(100) NOT NULL,
	creado_en TIMESTAMP NOT NULL default now(),
	actualizado_en TIMESTAMP NULL DEFAULT null,
	PRIMARY KEY(id_ocupacion)
);

ALTER TABLE sp_ocupacion  MODIFY `id_ocupacion` int(11) NOT NULL AUTO_INCREMENT;

-- Renombre la columna de ocupacion en la tabla paciente --
ALTER TABLE sp_paciente CHANGE ocupacion id_ocupacion int not null;
ALTER TABLE `sp_paciente`
ADD CONSTRAINT `fk_paciente_ocupacion` FOREIGN KEY (`id_ocupacion`) REFERENCES `sp_ocupacion` (`id_ocupacion`);


-- Vista de Paciente y Persona --
CREATE OR REPLACE VIEW `sp_view_paciente`  AS  
select p.id_persona, CONCAT(p.ci, ' ' ,p.expedido) AS ci_exp, 
CONCAT(p.nombres, ' ', p.paterno,' ', p.materno) AS nombre_completo, p.telefono_celular, p.fecha_nacimiento,
p.domicilio,o.id_ocupacion, o.nombre as ocupacion, p.estado, p.creado_en
from sp_persona p join sp_paciente pa 
on p.id_persona = pa.id_paciente
join sp_ocupacion o on pa.id_ocupacion = o.id_ocupacion;

-- Insertar roles del sistema --
INSERT INTO sp_grupo
(nombre_grupo, estado, creado_en, actualizado_en)
VALUES('ADMINISTRADOR', 1, current_timestamp(), NULL);
INSERT INTO sp_grupo
(nombre_grupo, estado, creado_en, actualizado_en)
VALUES('ODONTOLOGO', 1, current_timestamp(), NULL);

INSERT INTO sp_grupo
(nombre_grupo, estado, creado_en, actualizado_en)
VALUES('PACIENTE', 1, current_timestamp(), NULL);


-- Insertar Ocupaciones 
INSERT INTO sp_ocupacion(nombre, creado_en, actualizado_en)VALUES('Adiestrador', current_timestamp(), NULL);
INSERT INTO sp_ocupacion(nombre, creado_en, actualizado_en)VALUES('Adivino', current_timestamp(), NULL);
INSERT INTO sp_ocupacion(nombre, creado_en, actualizado_en)VALUES('Administrador de fincas', current_timestamp(), NULL);
INSERT INTO sp_ocupacion(nombre, creado_en, actualizado_en)VALUES('Adornista', current_timestamp(), NULL);
INSERT INTO sp_ocupacion(nombre, creado_en, actualizado_en)VALUES('Afiliado', current_timestamp(), NULL);
INSERT INTO sp_ocupacion(nombre, creado_en, actualizado_en)VALUES('Agente de bolsa', current_timestamp(), NULL);
INSERT INTO sp_ocupacion(nombre, creado_en, actualizado_en)VALUES('Agente de desarrollo local', current_timestamp(), NULL);
INSERT INTO sp_ocupacion(nombre, creado_en, actualizado_en)VALUES('Agente de viajes', current_timestamp(), NULL);
INSERT INTO sp_ocupacion(nombre, creado_en, actualizado_en)VALUES('Agente doble', current_timestamp(), NULL);
INSERT INTO sp_ocupacion(nombre, creado_en, actualizado_en)VALUES('Agente encubierto', current_timestamp(), NULL);
INSERT INTO sp_ocupacion(nombre, creado_en, actualizado_en)VALUES('Alcahuete', current_timestamp(), NULL);
INSERT INTO sp_ocupacion(nombre, creado_en, actualizado_en)VALUES('Alguacil', current_timestamp(), NULL);
INSERT INTO sp_ocupacion(nombre, creado_en, actualizado_en)VALUES('Algueros', current_timestamp(), NULL);
INSERT INTO sp_ocupacion(nombre, creado_en, actualizado_en)VALUES('Ama de casa', current_timestamp(), NULL);
INSERT INTO sp_ocupacion(nombre, creado_en, actualizado_en)VALUES('Ama de crianza', current_timestamp(), NULL);
INSERT INTO sp_ocupacion(nombre, creado_en, actualizado_en)VALUES('Aprendiz', current_timestamp(), NULL);
INSERT INTO sp_ocupacion(nombre, creado_en, actualizado_en)VALUES('Archivero', current_timestamp(), NULL);
INSERT INTO sp_ocupacion(nombre, creado_en, actualizado_en)VALUES('Armero (profesión)', current_timestamp(), NULL);
INSERT INTO sp_ocupacion(nombre, creado_en, actualizado_en)VALUES('Arquitecto del paisaje', current_timestamp(), NULL);
INSERT INTO sp_ocupacion(nombre, creado_en, actualizado_en)VALUES('Ascensorista', current_timestamp(), NULL);
INSERT INTO sp_ocupacion(nombre, creado_en, actualizado_en)VALUES('Asesor (oficio)', current_timestamp(), NULL);
INSERT INTO sp_ocupacion(nombre, creado_en, actualizado_en)VALUES('Asesor financiero', current_timestamp(), NULL);
INSERT INTO sp_ocupacion(nombre, creado_en, actualizado_en)VALUES('Asesor fiscal', current_timestamp(), NULL);
INSERT INTO sp_ocupacion(nombre, creado_en, actualizado_en)VALUES('Asesor mercantil', current_timestamp(), NULL);
INSERT INTO sp_ocupacion(nombre, creado_en, actualizado_en)VALUES('Auditor', current_timestamp(), NULL);
INSERT INTO sp_ocupacion(nombre, creado_en, actualizado_en)VALUES('Barrendero', current_timestamp(), NULL);
INSERT INTO sp_ocupacion(nombre, creado_en, actualizado_en)VALUES('Basurero', current_timestamp(), NULL);
INSERT INTO sp_ocupacion(nombre, creado_en, actualizado_en)VALUES('Bedel', current_timestamp(), NULL);
INSERT INTO sp_ocupacion(nombre, creado_en, actualizado_en)VALUES('Bibliotecario', current_timestamp(), NULL);
INSERT INTO sp_ocupacion(nombre, creado_en, actualizado_en)VALUES('Bróker', current_timestamp(), NULL);
INSERT INTO sp_ocupacion(nombre, creado_en, actualizado_en)VALUES('Búsqueda de empleo', current_timestamp(), NULL);
INSERT INTO sp_ocupacion(nombre, creado_en, actualizado_en)VALUES('Calderero', current_timestamp(), NULL);
INSERT INTO sp_ocupacion(nombre, creado_en, actualizado_en)VALUES('Cambista', current_timestamp(), NULL);
INSERT INTO sp_ocupacion(nombre, creado_en, actualizado_en)VALUES('Cantante', current_timestamp(), NULL);
INSERT INTO sp_ocupacion(nombre, creado_en, actualizado_en)VALUES('Carretillero', current_timestamp(), NULL);
INSERT INTO sp_ocupacion(nombre, creado_en, actualizado_en)VALUES('Cartero', current_timestamp(), NULL);
INSERT INTO sp_ocupacion(nombre, creado_en, actualizado_en)VALUES('Cartoneo', current_timestamp(), NULL);
INSERT INTO sp_ocupacion(nombre, creado_en, actualizado_en)VALUES('Catador de alimentos', current_timestamp(), NULL);
INSERT INTO sp_ocupacion(nombre, creado_en, actualizado_en)VALUES('Cazador de sanguijuelas', current_timestamp(), NULL);
INSERT INTO sp_ocupacion(nombre, creado_en, actualizado_en)VALUES('Cazafantasmas (parapsicología)', current_timestamp(), NULL);
INSERT INTO sp_ocupacion(nombre, creado_en, actualizado_en)VALUES('Cazatalentos', current_timestamp(), NULL);
INSERT INTO sp_ocupacion(nombre, creado_en, actualizado_en)VALUES('Chamán', current_timestamp(), NULL);
INSERT INTO sp_ocupacion(nombre, creado_en, actualizado_en)VALUES('Chambelán', current_timestamp(), NULL);
INSERT INTO sp_ocupacion(nombre, creado_en, actualizado_en)VALUES('Cicerone', current_timestamp(), NULL);
INSERT INTO sp_ocupacion(nombre, creado_en, actualizado_en)VALUES('Cocalero', current_timestamp(), NULL);
INSERT INTO sp_ocupacion(nombre, creado_en, actualizado_en)VALUES('Condestable', current_timestamp(), NULL);
INSERT INTO sp_ocupacion(nombre, creado_en, actualizado_en)VALUES('Conserje', current_timestamp(), NULL);
INSERT INTO sp_ocupacion(nombre, creado_en, actualizado_en)VALUES('Consultor', current_timestamp(), NULL);
INSERT INTO sp_ocupacion(nombre, creado_en, actualizado_en)VALUES('Contador público', current_timestamp(), NULL);
INSERT INTO sp_ocupacion(nombre, creado_en, actualizado_en)VALUES('Contenidista', current_timestamp(), NULL);
INSERT INTO sp_ocupacion(nombre, creado_en, actualizado_en)VALUES('Coolhunting', current_timestamp(), NULL);
INSERT INTO sp_ocupacion(nombre, creado_en, actualizado_en)VALUES('Corrector de textos', current_timestamp(), NULL);
INSERT INTO sp_ocupacion(nombre, creado_en, actualizado_en)VALUES('Corredor de apuestas', current_timestamp(), NULL);
INSERT INTO sp_ocupacion(nombre, creado_en, actualizado_en)VALUES('Corredor de seguros', current_timestamp(), NULL);
INSERT INTO sp_ocupacion(nombre, creado_en, actualizado_en)VALUES('Counseling', current_timestamp(), NULL);
INSERT INTO sp_ocupacion(nombre, creado_en, actualizado_en)VALUES('Criminólogo', current_timestamp(), NULL);
INSERT INTO sp_ocupacion(nombre, creado_en, actualizado_en)VALUES('Crupier', current_timestamp(), NULL);
INSERT INTO sp_ocupacion(nombre, creado_en, actualizado_en)VALUES('Cuerpo de Registradores de la iedad, Mercantiles y de Bienes Muebles', current_timestamp(), NULL);
INSERT INTO sp_ocupacion(nombre, creado_en, actualizado_en)VALUES('Curandero', current_timestamp(), NULL);
INSERT INTO sp_ocupacion(nombre, creado_en, actualizado_en)VALUES('Decorador', current_timestamp(), NULL);
INSERT INTO sp_ocupacion(nombre, creado_en, actualizado_en)VALUES('Delineante', current_timestamp(), NULL);
INSERT INTO sp_ocupacion(nombre, creado_en, actualizado_en)VALUES('Diplomático', current_timestamp(), NULL);
INSERT INTO sp_ocupacion(nombre, creado_en, actualizado_en)VALUES('Director de colección', current_timestamp(), NULL);
INSERT INTO sp_ocupacion(nombre, creado_en, actualizado_en)VALUES('Director de comunicación', current_timestamp(), NULL);
INSERT INTO sp_ocupacion(nombre, creado_en, actualizado_en)VALUES('Diseñador', current_timestamp(), NULL);
INSERT INTO sp_ocupacion(nombre, creado_en, actualizado_en)VALUES('Diseñador floral', current_timestamp(), NULL);
INSERT INTO sp_ocupacion(nombre, creado_en, actualizado_en)VALUES('Economista', current_timestamp(), NULL);
INSERT INTO sp_ocupacion(nombre, creado_en, actualizado_en)VALUES('Editor de sonido', current_timestamp(), NULL);
INSERT INTO sp_ocupacion(nombre, creado_en, actualizado_en)VALUES('Facilitador', current_timestamp(), NULL);
INSERT INTO sp_ocupacion(nombre, creado_en, actualizado_en)VALUES('Fisioterapeuta', current_timestamp(), NULL);
INSERT INTO sp_ocupacion(nombre, creado_en, actualizado_en)VALUES('Forts des halles', current_timestamp(), NULL);
INSERT INTO sp_ocupacion(nombre, creado_en, actualizado_en)VALUES('Gaberlunzie', current_timestamp(), NULL);
INSERT INTO sp_ocupacion(nombre, creado_en, actualizado_en)VALUES('Garimpeiro', current_timestamp(), NULL);
INSERT INTO sp_ocupacion(nombre, creado_en, actualizado_en)VALUES('Geisha', current_timestamp(), NULL);
INSERT INTO sp_ocupacion(nombre, creado_en, actualizado_en)VALUES('Guardián del Registro', current_timestamp(), NULL);
INSERT INTO sp_ocupacion(nombre, creado_en, actualizado_en)VALUES('Guía acompañante', current_timestamp(), NULL);
INSERT INTO sp_ocupacion(nombre, creado_en, actualizado_en)VALUES('Guía de turismo', current_timestamp(), NULL);
INSERT INTO sp_ocupacion(nombre, creado_en, actualizado_en)VALUES('Guía de montaña', current_timestamp(), NULL);
INSERT INTO sp_ocupacion(nombre, creado_en, actualizado_en)VALUES('Hechicero', current_timestamp(), NULL);
INSERT INTO sp_ocupacion(nombre, creado_en, actualizado_en)VALUES('Historietista', current_timestamp(), NULL);
INSERT INTO sp_ocupacion(nombre, creado_en, actualizado_en)VALUES('Hombre anuncio', current_timestamp(), NULL);
INSERT INTO sp_ocupacion(nombre, creado_en, actualizado_en)VALUES('Hospitalero', current_timestamp(), NULL);
INSERT INTO sp_ocupacion(nombre, creado_en, actualizado_en)VALUES('Informático', current_timestamp(), NULL);
INSERT INTO sp_ocupacion(nombre, creado_en, actualizado_en)VALUES('Ingeniero(a) geológica', current_timestamp(), NULL);
INSERT INTO sp_ocupacion(nombre, creado_en, actualizado_en)VALUES('Ingeniero de software', current_timestamp(), NULL);
INSERT INTO sp_ocupacion(nombre, creado_en, actualizado_en)VALUES('Ingeniero mecanico', current_timestamp(), NULL);
INSERT INTO sp_ocupacion(nombre, creado_en, actualizado_en)VALUES('Ingeniero de Sistemas', current_timestamp(), NULL);
INSERT INTO sp_ocupacion(nombre, creado_en, actualizado_en)VALUES('Ingeniero de civil', current_timestamp(), NULL);
INSERT INTO sp_ocupacion(nombre, creado_en, actualizado_en)VALUES('Ingeniero de sonido', current_timestamp(), NULL);
INSERT INTO sp_ocupacion(nombre, creado_en, actualizado_en)VALUES('Ingeniero electrónico', current_timestamp(), NULL);
INSERT INTO sp_ocupacion(nombre, creado_en, actualizado_en)VALUES('Integrador social', current_timestamp(), NULL);
INSERT INTO sp_ocupacion(nombre, creado_en, actualizado_en)VALUES('Intérprete (profesión)', current_timestamp(), NULL);
INSERT INTO sp_ocupacion(nombre, creado_en, actualizado_en)VALUES('Investigador', current_timestamp(), NULL);
INSERT INTO sp_ocupacion(nombre, creado_en, actualizado_en)VALUES('Jardinero', current_timestamp(), NULL);
INSERT INTO sp_ocupacion(nombre, creado_en, actualizado_en)VALUES('Jugador de videojuegos', current_timestamp(), NULL);
INSERT INTO sp_ocupacion(nombre, creado_en, actualizado_en)VALUES('Lapidario (profesión)', current_timestamp(), NULL);
INSERT INTO sp_ocupacion(nombre, creado_en, actualizado_en)VALUES('Leñador', current_timestamp(), NULL);
INSERT INTO sp_ocupacion(nombre, creado_en, actualizado_en)VALUES('Limpiabotas', current_timestamp(), NULL);
INSERT INTO sp_ocupacion(nombre, creado_en, actualizado_en)VALUES('Lord gran chambelán', current_timestamp(), NULL);
INSERT INTO sp_ocupacion(nombre, creado_en, actualizado_en)VALUES('Maestro de espías', current_timestamp(), NULL);
INSERT INTO sp_ocupacion(nombre, creado_en, actualizado_en)VALUES('Mandatario Registral de Automotores', current_timestamp(), NULL);
INSERT INTO sp_ocupacion(nombre, creado_en, actualizado_en)VALUES('Manicura (ocupación)', current_timestamp(), NULL);
INSERT INTO sp_ocupacion(nombre, creado_en, actualizado_en)VALUES('Martillero público', current_timestamp(), NULL);
INSERT INTO sp_ocupacion(nombre, creado_en, actualizado_en)VALUES('Masajista', current_timestamp(), NULL);
INSERT INTO sp_ocupacion(nombre, creado_en, actualizado_en)VALUES('Mecánico', current_timestamp(), NULL);
INSERT INTO sp_ocupacion(nombre, creado_en, actualizado_en)VALUES('Mecanógrafo', current_timestamp(), NULL);
INSERT INTO sp_ocupacion(nombre, creado_en, actualizado_en)VALUES('Mensajero', current_timestamp(), NULL);
INSERT INTO sp_ocupacion(nombre, creado_en, actualizado_en)VALUES('Minero', current_timestamp(), NULL);
INSERT INTO sp_ocupacion(nombre, creado_en, actualizado_en)VALUES('Oficio (profesión)', current_timestamp(), NULL);
INSERT INTO sp_ocupacion(nombre, creado_en, actualizado_en)VALUES('Oiran', current_timestamp(), NULL);
INSERT INTO sp_ocupacion(nombre, creado_en, actualizado_en)VALUES('Ojeador', current_timestamp(), NULL);
INSERT INTO sp_ocupacion(nombre, creado_en, actualizado_en)VALUES('Nai Palm', current_timestamp(), NULL);
INSERT INTO sp_ocupacion(nombre, creado_en, actualizado_en)VALUES('Peluquero', current_timestamp(), NULL);
INSERT INTO sp_ocupacion(nombre, creado_en, actualizado_en)VALUES('Peluquero canino', current_timestamp(), NULL);
INSERT INTO sp_ocupacion(nombre, creado_en, actualizado_en)VALUES('Persevante', current_timestamp(), NULL);
INSERT INTO sp_ocupacion(nombre, creado_en, actualizado_en)VALUES('Planificador financiero', current_timestamp(), NULL);
INSERT INTO sp_ocupacion(nombre, creado_en, actualizado_en)VALUES('Plastoquímico', current_timestamp(), NULL);
INSERT INTO sp_ocupacion(nombre, creado_en, actualizado_en)VALUES('Portero de edificio', current_timestamp(), NULL);
INSERT INTO sp_ocupacion(nombre, creado_en, actualizado_en)VALUES('Profesional', current_timestamp(), NULL);
INSERT INTO sp_ocupacion(nombre, creado_en, actualizado_en)VALUES('Otro', current_timestamp(), NULL);
INSERT INTO sp_ocupacion(nombre, creado_en, actualizado_en)VALUES('Recaudador de impuestos', current_timestamp(), NULL);
INSERT INTO sp_ocupacion(nombre, creado_en, actualizado_en)VALUES('Reciclador de base', current_timestamp(), NULL);
INSERT INTO sp_ocupacion(nombre, creado_en, actualizado_en)VALUES('Reservista', current_timestamp(), NULL);
INSERT INTO sp_ocupacion(nombre, creado_en, actualizado_en)VALUES('Riacheros', current_timestamp(), NULL);
INSERT INTO sp_ocupacion(nombre, creado_en, actualizado_en)VALUES('Socialite', current_timestamp(), NULL);
INSERT INTO sp_ocupacion(nombre, creado_en, actualizado_en)VALUES('Socorrista acuático', current_timestamp(), NULL);
INSERT INTO sp_ocupacion(nombre, creado_en, actualizado_en)VALUES('Taquillero', current_timestamp(), NULL);
INSERT INTO sp_ocupacion(nombre, creado_en, actualizado_en)VALUES('Técnico de Laboratorio de Universidad', current_timestamp(), NULL);
INSERT INTO sp_ocupacion(nombre, creado_en, actualizado_en)VALUES('Técnico de sistemas', current_timestamp(), NULL);
INSERT INTO sp_ocupacion(nombre, creado_en, actualizado_en)VALUES('Telefonista', current_timestamp(), NULL);
INSERT INTO sp_ocupacion(nombre, creado_en, actualizado_en)VALUES('Tesorero', current_timestamp(), NULL);
INSERT INTO sp_ocupacion(nombre, creado_en, actualizado_en)VALUES('Trabajador autónomo', current_timestamp(), NULL);
INSERT INTO sp_ocupacion(nombre, creado_en, actualizado_en)VALUES('Valet parking', current_timestamp(), NULL);
INSERT INTO sp_ocupacion(nombre, creado_en, actualizado_en)VALUES('Veedor (viticultura)', current_timestamp(), NULL);
INSERT INTO sp_ocupacion(nombre, creado_en, actualizado_en)VALUES('Verdugo', current_timestamp(), NULL);

-- Agregar el navegador al grupo usuario
ALTER TABLE sp_grupo_usuario ADD COLUMN navegador VARCHAR(100) AFTER ip_usuario;

-- Vista de Odontologo y Persona --
CREATE OR REPLACE VIEW `sp_view_odontologo`  AS  
select p.id_persona, CONCAT(p.ci, ' ' ,p.expedido) AS ci_exp, 
CONCAT(p.nombres, ' ', p.paterno,' ', p.materno) AS nombre_completo, p.telefono_celular, p.fecha_nacimiento,
p.domicilio,o.turno, o.gestion_ingreso, p.estado, p.creado_en
from sp_persona p join sp_odontologo o
on p.id_persona = o.id_odontologo;

-- Vista de usuarios para EL login
CREATE OR REPLACE VIEW `sp_view_odontologo`  AS  
select p.id_persona, CONCAT(p.ci, ' ' ,p.expedido) AS ci_exp, 
CONCAT(p.nombres, ' ', p.paterno,' ', p.materno) AS nombre_completo, p.telefono_celular, p.fecha_nacimiento,
p.domicilio,o.turno, o.gestion_ingreso, p.estado, p.creado_en
from sp_persona p join sp_odontologo o
on p.id_persona = o.id_odontologo;

-- Cambiar el nombre de la tabla grupo el estado
ALTER TABLE `sp_grupo` CHANGE `estado` `estado_grupo` TINYINT(1) NOT NULL DEFAULT '1';

-- Agregar la columna imagen al usuario
ALTER TABLE sp_usuario ADD COLUMN foto VARCHAR(100) default NULL AFTER clave;

CREATE OR REPLACE VIEW `sp_view_users`  AS  select 
p.id_persona, p.ci, p.expedido, p.paterno, p.materno, p.nombres, p.fecha_nacimiento, p.telefono_celular, p.domicilio,
p.creado_en, p.actualizado_en, p.estado, 
u.usuario,u.clave,u.foto,
gu.id_grupo_usuario ,gu.id_grupo, gu.id_usuario, gu.ip_usuario,
g.nombre_grupo,g.estado_grupo  
from (((sp_usuario u join sp_persona p on(p.id_persona = u.id_usuario)) 
left join sp_grupo_usuario gu on(gu.id_usuario = u.id_usuario)) 
left join sp_grupo g on(g.id_grupo = gu.id_grupo)) ;
