CREATE DATABASE IF NOT EXISTS `sanpedro`;

USE `sanpedro`;

SET foreign_key_checks = 0;

DROP TABLE IF EXISTS `sp_acciones_decesivas`;

CREATE TABLE `sp_acciones_decesivas` (
  `id_acciones_decesivas` int(11) NOT NULL AUTO_INCREMENT,
  `subjetivo` varchar(250) DEFAULT NULL,
  `objetivo` varchar(250) DEFAULT NULL,
  `analisis` varchar(250) DEFAULT NULL,
  `plan_accion` varchar(250) DEFAULT NULL,
  `id_cita` int(11) NOT NULL,
  `creado_en` timestamp NOT NULL DEFAULT current_timestamp(),
  `actualizado_en` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_acciones_decesivas`),
  KEY `fk_acciones_decesivas_paciente` (`id_cita`),
  CONSTRAINT `fk_acciones_decesivas_paciente` FOREIGN KEY (`id_cita`) REFERENCES `sp_cita` (`id_cita`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

INSERT INTO `sp_acciones_decesivas` VALUES (4,"null null","null null","null null","null null",24,"2021-07-05 03:08:45",NULL),
(5,"si si ","si si ","si si ","si si ",25,"2021-07-05 03:12:15",NULL);


DROP TABLE IF EXISTS `sp_cita`;

CREATE TABLE `sp_cita` (
  `id_cita` int(11) NOT NULL AUTO_INCREMENT,
  `numero_cita` tinyint(4) DEFAULT NULL,
  `tipo_tratamiento` varchar(30) COLLATE utf8_spanish_ci DEFAULT NULL,
  `observacion` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fecha` date NOT NULL,
  `hora_inicio` time NOT NULL,
  `hora_final` time NOT NULL,
  `id_paciente` int(11) NOT NULL,
  `id_odontologo` int(11) NOT NULL,
  `costo` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  `estatus` enum('PENDIENTE','CANCELADA','ATENDIDA') COLLATE utf8_spanish_ci NOT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT 1,
  `creado_en` timestamp NOT NULL DEFAULT current_timestamp(),
  `actualizado_en` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_cita`),
  KEY `fk_cita_paciente` (`id_paciente`),
  KEY `fk_cita_odontologo` (`id_odontologo`),
  CONSTRAINT `fk_cita_odontologo` FOREIGN KEY (`id_odontologo`) REFERENCES `sp_odontologo` (`id_odontologo`),
  CONSTRAINT `fk_cita_paciente` FOREIGN KEY (`id_paciente`) REFERENCES `sp_paciente` (`id_paciente`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO `sp_cita` VALUES (8,NULL,"Prevencion","ninguna","2021-02-16","00:00:00","00:00:00",4,5,"Gratuito","PENDIENTE",0,"2021-02-19 22:08:42",NULL),
(10,3,"Restauracion","dfgfvsv","2021-03-30","12:30:00","00:00:00",4,5,"Gratuito","PENDIENTE",0,"2021-03-06 14:10:02",NULL),
(12,5,"Periodoncia","fwefadfsdds","2021-03-28","13:30:00","00:00:00",4,2,"Gratuito","PENDIENTE",0,"2021-03-06 23:09:46","2021-03-06 23:10:17"),
(14,1,"Cirujia Bucal","wfdsfsdcdssdcdsc","2021-04-05","10:30:00","00:00:00",6,5,"Gratuito","PENDIENTE",0,"2021-03-12 23:45:56",NULL),
(15,2,"Cirujia Bucal","jkjbkhkjbbkmn","2021-04-12","12:30:00","00:00:00",6,5,"Gratuito","PENDIENTE",0,"2021-03-12 23:49:45",NULL),
(17,3,"Restauracion","sdcsdcsdcsd","2021-04-07","15:00:00","00:00:00",6,5,"Gratuito","PENDIENTE",0,"2021-03-14 02:56:37",NULL),
(18,4,"Restauracion","csdcsdcsd","2021-08-02","12:02:00","00:00:00",6,5,"Gratuito","CANCELADA",0,"2021-03-14 14:42:20",NULL),
(19,5,"Restauracion","wefsdfsadfad","2021-04-02","18:00:00","00:00:00",6,5,"Gratuito","PENDIENTE",0,"2021-03-14 14:43:41",NULL),
(20,18,"Prevencion","El paciente tiene algunas complicaciones en las piezas dentales","2021-04-13","14:00:00","00:00:00",3,5,"costo","ATENDIDA",1,"2021-03-14 15:17:48","2021-07-04 07:53:00"),
(21,14,"Restauracion","dfsdcdscd","2021-01-14","09:30:00","00:00:00",6,5,"costo","CANCELADA",1,"2021-03-14 15:21:31","2021-07-04 22:52:28"),
(22,10,"Restauracion","dfsdfsdsdfc","2021-04-22","08:00:00","00:00:00",6,5,"Gratuito","ATENDIDA",1,"2021-03-14 19:09:47","2021-03-18 01:26:24"),
(23,11,"Restauracion","sdsdcsdcds","2021-04-26","10:00:00","00:00:00",3,2,"costo","CANCELADA",1,"2021-03-15 18:20:20","2021-04-01 23:40:09"),
(24,12,"Periodoncia","el paciente lleva una dentadura rota","2021-05-03","15:00:00","00:00:00",3,5,"costo","PENDIENTE",1,"2021-03-15 23:19:57","2021-04-02 21:11:26"),
(25,7,"Restauracion","dasxasxasxasxasx","2021-04-30","08:00:00","00:00:00",3,5,"Gratuito","PENDIENTE",1,"2021-03-16 16:03:53",NULL),
(26,11,"Restauracion","vsdfsdcdc","2021-04-15","14:30:00","15:30:00",6,2,"Gratuito","PENDIENTE",1,"2021-03-23 21:12:37",NULL),
(28,16,"Endodoncia","huhhihi","2021-05-12","15:00:00","15:30:00",3,2,"Gratuito","PENDIENTE",1,"2021-05-08 20:47:18","2021-05-08 20:48:19"),
(29,12,"Restauracion","dcacasdas","2021-05-27","15:00:00","15:30:00",6,5,"Gratuito","PENDIENTE",1,"2021-05-08 20:50:10",NULL),
(30,13,"Endodoncia","mnbkh KJJ","2021-07-08","12:00:00","02:12:00",6,5,"Gratuito","PENDIENTE",1,"2021-07-04 07:48:14",NULL),
(31,1,"Periodoncia","dslkfsdl sdkljf sdlkjsd f","2021-07-22","01:05:00","10:00:00",8,5,"Gratuito","PENDIENTE",1,"2021-07-04 23:05:18",NULL);


DROP TABLE IF EXISTS `sp_diagnostico`;

CREATE TABLE `sp_diagnostico` (
  `id_diagnostico` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_diagnostico` varchar(100) DEFAULT NULL,
  `pieza_dentaria` varchar(100) DEFAULT NULL,
  `medida_preventiva` varchar(150) DEFAULT NULL,
  `acciones_curativas` varchar(250) DEFAULT NULL,
  `id_paciente` int(11) NOT NULL,
  `creado_en` timestamp NOT NULL DEFAULT current_timestamp(),
  `actualizado_en` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_diagnostico`),
  KEY `fk_diagnostico_paciente` (`id_paciente`),
  CONSTRAINT `fk_diagnostico_paciente` FOREIGN KEY (`id_paciente`) REFERENCES `sp_paciente` (`id_paciente`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

INSERT INTO `sp_diagnostico` VALUES (2,"Absceso Periapical Sin Fistula","askjdlkasjl","profilaxis","Restauracion",3,"2021-07-05 03:00:06",NULL);


DROP TABLE IF EXISTS `sp_grupo`;

CREATE TABLE `sp_grupo` (
  `id_grupo` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_grupo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `estado_grupo` tinyint(1) NOT NULL DEFAULT 1,
  `creado_en` timestamp NOT NULL DEFAULT current_timestamp(),
  `actualizado_en` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_grupo`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO `sp_grupo` VALUES (1,"ADMINISTRADOR",1,"2021-02-15 11:55:05",NULL),
(2,"ODONTOLOGO",1,"2021-02-15 11:55:05",NULL),
(3,"PACIENTE",1,"2021-02-15 11:55:06",NULL);


DROP TABLE IF EXISTS `sp_grupo_usuario`;

CREATE TABLE `sp_grupo_usuario` (
  `id_grupo_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `id_grupo` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `ip_usuario` varchar(30) COLLATE utf8_spanish_ci DEFAULT NULL,
  `navegador` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `creado_en` timestamp NOT NULL DEFAULT current_timestamp(),
  `actualizado_en` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_grupo_usuario`),
  KEY `fk_grupousuario_grupo` (`id_grupo`),
  KEY `fk_grupousuario_usuario` (`id_usuario`),
  CONSTRAINT `fk_grupousuario_grupo` FOREIGN KEY (`id_grupo`) REFERENCES `sp_grupo` (`id_grupo`),
  CONSTRAINT `fk_grupousuario_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `sp_usuario` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO `sp_grupo_usuario` VALUES (1,3,1,"127.0.0.1","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.77","2021-02-15 12:04:34","2021-06-14 21:27:54"),
(2,2,2,"::1","Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:86.0) Gecko/20100101 Firefox/86.0","2021-02-15 17:47:00",NULL),
(3,3,3,"127.0.0.1","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.12","2021-02-19 18:01:47","2021-07-04 07:03:56"),
(4,3,4,"127.0.0.1","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.19","2021-02-19 18:03:22","2021-03-04 22:49:02"),
(5,2,5,"127.0.0.1","Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0","2021-02-19 18:07:43","2021-03-17 23:01:27"),
(6,3,6,"127.0.0.1","Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0","2021-03-12 19:41:06","2021-03-17 22:41:54"),
(7,2,7,"127.0.0.1","Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:89.0) Gecko/20100101 Firefox/89.0","2021-05-09 00:19:25","2021-05-09 22:08:11"),
(8,2,1,"127.0.0.1","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.77","2021-02-15 12:04:34","2021-06-14 21:27:54"),
(9,1,1,"127.0.0.1","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.77","2021-02-15 12:04:34","2021-06-14 21:27:54"),
(10,3,8,"127.0.0.1","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.12","2021-07-04 23:03:55",NULL);


DROP TABLE IF EXISTS `sp_lesiones_cariosas`;

CREATE TABLE `sp_lesiones_cariosas` (
  `id_lesiones_cariosas` int(11) NOT NULL AUTO_INCREMENT,
  `id_odontograma` int(11) DEFAULT NULL,
  `id_tratamiento_diagnostico` int(11) DEFAULT NULL,
  `posicion` int(11) DEFAULT NULL,
  `creado_en` timestamp NOT NULL DEFAULT current_timestamp(),
  `actualizado_en` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_lesiones_cariosas`),
  KEY `sp_lesiones_cariosas_fk` (`id_odontograma`),
  KEY `sp_lesiones_cariosas_fk1` (`id_tratamiento_diagnostico`),
  CONSTRAINT `sp_lesiones_cariosas_fk` FOREIGN KEY (`id_odontograma`) REFERENCES `sp_odontograma` (`id_odontograma`),
  CONSTRAINT `sp_lesiones_cariosas_fk1` FOREIGN KEY (`id_tratamiento_diagnostico`) REFERENCES `sp_tratamiento_diagnostico` (`id_tratamiento_diagnostico`)
) ENGINE=InnoDB AUTO_INCREMENT=502 DEFAULT CHARSET=latin1;

INSERT INTO `sp_lesiones_cariosas` VALUES (486,514,5,5,"2021-07-04 08:00:02",NULL),
(487,514,5,4,"2021-07-04 08:00:02",NULL),
(488,514,5,1,"2021-07-04 08:00:02",NULL),
(489,515,5,5,"2021-07-04 08:00:02",NULL),
(490,516,4,1,"2021-07-04 08:00:02",NULL),
(491,517,2,4,"2021-07-04 08:00:03",NULL),
(492,518,1,5,"2021-07-04 08:00:03",NULL),
(493,519,2,2,"2021-07-04 08:00:03",NULL),
(494,519,2,5,"2021-07-04 08:00:03",NULL),
(495,520,4,3,"2021-07-04 08:00:03",NULL),
(496,521,2,5,"2021-07-04 08:00:03",NULL),
(497,522,5,5,"2021-07-04 08:00:03",NULL),
(498,523,8,3,"2021-07-04 08:00:03",NULL),
(499,524,6,5,"2021-07-04 08:00:03",NULL),
(500,525,7,4,"2021-07-04 08:00:03",NULL),
(501,525,7,5,"2021-07-04 08:00:03",NULL);


DROP TABLE IF EXISTS `sp_medicacion`;

CREATE TABLE `sp_medicacion` (
  `id_medicacion` int(11) NOT NULL AUTO_INCREMENT,
  `entrega_medicamento` varchar(250) DEFAULT NULL,
  `receta_medica` varchar(250) DEFAULT NULL,
  `recomendaciones` varchar(250) DEFAULT NULL,
  `id_paciente` int(11) NOT NULL,
  `creado_en` timestamp NOT NULL DEFAULT current_timestamp(),
  `actualizado_en` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_medicacion`),
  KEY `fk_medicacion_paciente` (`id_paciente`),
  CONSTRAINT `fk_medicacion_paciente` FOREIGN KEY (`id_paciente`) REFERENCES `sp_paciente` (`id_paciente`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

INSERT INTO `sp_medicacion` VALUES (2,"hol a ","jldj ldsk","ldfjlskd  skflsdkf",3,"2021-07-04 07:02:46",NULL);


DROP TABLE IF EXISTS `sp_ocupacion`;

CREATE TABLE `sp_ocupacion` (
  `id_ocupacion` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `creado_en` timestamp NOT NULL DEFAULT current_timestamp(),
  `actualizado_en` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_ocupacion`)
) ENGINE=InnoDB AUTO_INCREMENT=136 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO `sp_ocupacion` VALUES (1,"Adiestrador","2021-02-15 15:55:26",NULL),
(2,"Adivino","2021-02-15 15:55:26",NULL),
(3,"Administrador de fincas","2021-02-15 15:55:26",NULL),
(4,"Adornista","2021-02-15 15:55:26",NULL),
(5,"Afiliado","2021-02-15 15:55:26",NULL),
(6,"Agente de bolsa","2021-02-15 15:55:26",NULL),
(7,"Agente de desarrollo local","2021-02-15 15:55:26",NULL),
(8,"Agente de viajes","2021-02-15 15:55:26",NULL),
(9,"Agente doble","2021-02-15 15:55:26",NULL),
(10,"Agente encubierto","2021-02-15 15:55:26",NULL),
(11,"Alcahuete","2021-02-15 15:55:26",NULL),
(12,"Alguacil","2021-02-15 15:55:27",NULL),
(13,"Algueros","2021-02-15 15:55:27",NULL),
(14,"Ama de casa","2021-02-15 15:55:27",NULL),
(15,"Ama de crianza","2021-02-15 15:55:27",NULL),
(16,"Aprendiz","2021-02-15 15:55:27",NULL),
(17,"Archivero","2021-02-15 15:55:27",NULL),
(18,"Armero (profesi?n)","2021-02-15 15:55:27",NULL),
(19,"Arquitecto del paisaje","2021-02-15 15:55:27",NULL),
(20,"Ascensorista","2021-02-15 15:55:27",NULL),
(21,"Asesor (oficio)","2021-02-15 15:55:27",NULL),
(22,"Asesor financiero","2021-02-15 15:55:28",NULL),
(23,"Asesor fiscal","2021-02-15 15:55:28",NULL),
(24,"Asesor mercantil","2021-02-15 15:55:28",NULL),
(25,"Auditor","2021-02-15 15:55:28",NULL),
(26,"Barrendero","2021-02-15 15:55:28",NULL),
(27,"Basurero","2021-02-15 15:55:28",NULL),
(28,"Bedel","2021-02-15 15:55:28",NULL),
(29,"Bibliotecario","2021-02-15 15:55:28",NULL),
(30,"Br?ker","2021-02-15 15:55:28",NULL),
(31,"B?squeda de empleo","2021-02-15 15:55:28",NULL),
(32,"Calderero","2021-02-15 15:55:28",NULL),
(33,"Cambista","2021-02-15 15:55:28",NULL),
(34,"Cantante","2021-02-15 15:55:29",NULL),
(35,"Carretillero","2021-02-15 15:55:29",NULL),
(36,"Cartero","2021-02-15 15:55:29",NULL),
(37,"Cartoneo","2021-02-15 15:55:29",NULL),
(38,"Catador de alimentos","2021-02-15 15:55:29",NULL),
(39,"Cazador de sanguijuelas","2021-02-15 15:55:29",NULL),
(40,"Cazafantasmas (parapsicolog?a)","2021-02-15 15:55:29",NULL),
(41,"Cazatalentos","2021-02-15 15:55:29",NULL),
(42,"Cham?n","2021-02-15 15:55:29",NULL),
(43,"Chambel?n","2021-02-15 15:55:29",NULL),
(44,"Cicerone","2021-02-15 15:55:29",NULL),
(45,"Cocalero","2021-02-15 15:55:29",NULL),
(46,"Condestable","2021-02-15 15:55:30",NULL),
(47,"Conserje","2021-02-15 15:55:30",NULL),
(48,"Consultor","2021-02-15 15:55:30",NULL),
(49,"Contador p?blico","2021-02-15 15:55:30",NULL),
(50,"Contenidista","2021-02-15 15:55:30",NULL),
(51,"Coolhunting","2021-02-15 15:55:30",NULL),
(52,"Corrector de textos","2021-02-15 15:55:30",NULL),
(53,"Corredor de apuestas","2021-02-15 15:55:30",NULL),
(54,"Corredor de seguros","2021-02-15 15:55:30",NULL),
(55,"Counseling","2021-02-15 15:55:30",NULL),
(56,"Crimin?logo","2021-02-15 15:55:30",NULL),
(57,"Crupier","2021-02-15 15:55:31",NULL),
(58,"Cuerpo de Registradores de la iedad, Mercantiles y de Bienes Muebles","2021-02-15 15:55:31",NULL),
(59,"Curandero","2021-02-15 15:55:31",NULL),
(60,"Decorador","2021-02-15 15:55:31",NULL),
(61,"Delineante","2021-02-15 15:55:31",NULL),
(62,"Diplom?tico","2021-02-15 15:55:31",NULL),
(63,"Director de colecci?n","2021-02-15 15:55:31",NULL),
(64,"Director de comunicaci?n","2021-02-15 15:55:31",NULL),
(65,"Dise?ador","2021-02-15 15:55:31",NULL),
(66,"Dise?ador floral","2021-02-15 15:55:31",NULL),
(67,"Economista","2021-02-15 15:55:31",NULL),
(68,"Editor de sonido","2021-02-15 15:55:32",NULL),
(69,"Facilitador","2021-02-15 15:55:32",NULL),
(70,"Fisioterapeuta","2021-02-15 15:55:32",NULL),
(71,"Forts des halles","2021-02-15 15:55:32",NULL),
(72,"Gaberlunzie","2021-02-15 15:55:32",NULL),
(73,"Garimpeiro","2021-02-15 15:55:32",NULL),
(74,"Geisha","2021-02-15 15:55:32",NULL),
(75,"Guardi?n del Registro","2021-02-15 15:55:32",NULL),
(76,"Gu?a acompa?ante","2021-02-15 15:55:32",NULL),
(77,"Gu?a de turismo","2021-02-15 15:55:32",NULL),
(78,"Gu?a de monta?a","2021-02-15 15:55:33",NULL),
(79,"Hechicero","2021-02-15 15:55:33",NULL),
(80,"Historietista","2021-02-15 15:55:33",NULL),
(81,"Hombre anuncio","2021-02-15 15:55:33",NULL),
(82,"Hospitalero","2021-02-15 15:55:33",NULL),
(83,"Inform?tico","2021-02-15 15:55:33",NULL),
(84,"Ingeniero(a) geol?gica","2021-02-15 15:55:33",NULL),
(85,"Ingeniero de software","2021-02-15 15:55:33",NULL),
(86,"Ingeniero mecanico","2021-02-15 15:55:33",NULL),
(87,"Ingeniero de Sistemas","2021-02-15 15:55:33",NULL),
(88,"Ingeniero de civil","2021-02-15 15:55:34",NULL),
(89,"Ingeniero de sonido","2021-02-15 15:55:34",NULL),
(90,"Ingeniero electr?nico","2021-02-15 15:55:34",NULL),
(91,"Integrador social","2021-02-15 15:55:34",NULL),
(92,"Int?rprete (profesi?n)","2021-02-15 15:55:34",NULL),
(93,"Investigador","2021-02-15 15:55:34",NULL),
(94,"Jardinero","2021-02-15 15:55:34",NULL),
(95,"Jugador de videojuegos","2021-02-15 15:55:34",NULL),
(96,"Lapidario (profesi?n)","2021-02-15 15:55:34",NULL),
(97,"Le?ador","2021-02-15 15:55:35",NULL),
(98,"Limpiabotas","2021-02-15 15:55:35",NULL),
(99,"Lord gran chambel?n","2021-02-15 15:55:35",NULL),
(100,"Maestro de esp?as","2021-02-15 15:55:35",NULL),
(101,"Mandatario Registral de Automotores","2021-02-15 15:55:35",NULL),
(102,"Manicura (ocupaci?n)","2021-02-15 15:55:35",NULL),
(103,"Martillero p?blico","2021-02-15 15:55:35",NULL),
(104,"Masajista","2021-02-15 15:55:35",NULL),
(105,"Mec?nico","2021-02-15 15:55:35",NULL),
(106,"Mecan?grafo","2021-02-15 15:55:35",NULL),
(107,"Mensajero","2021-02-15 15:55:35",NULL),
(108,"Minero","2021-02-15 15:55:36",NULL),
(109,"Oficio (profesi?n)","2021-02-15 15:55:36",NULL),
(110,"Oiran","2021-02-15 15:55:36",NULL),
(111,"Ojeador","2021-02-15 15:55:36",NULL),
(112,"Nai Palm","2021-02-15 15:55:36",NULL),
(113,"Peluquero","2021-02-15 15:55:36",NULL),
(114,"Peluquero canino","2021-02-15 15:55:36",NULL),
(115,"Persevante","2021-02-15 15:55:36",NULL),
(116,"Planificador financiero","2021-02-15 15:55:37",NULL),
(117,"Plastoqu?mico","2021-02-15 15:55:37",NULL),
(118,"Portero de edificio","2021-02-15 15:55:37",NULL),
(119,"Profesional","2021-02-15 15:55:37",NULL),
(120,"Otro","2021-02-15 15:55:38",NULL),
(121,"Recaudador de impuestos","2021-02-15 15:55:38",NULL),
(122,"Reciclador de base","2021-02-15 15:55:38",NULL),
(123,"Reservista","2021-02-15 15:55:38",NULL),
(124,"Riacheros","2021-02-15 15:55:38",NULL),
(125,"Socialite","2021-02-15 15:55:38",NULL),
(126,"Socorrista acu?tico","2021-02-15 15:55:38",NULL),
(127,"Taquillero","2021-02-15 15:55:38",NULL),
(128,"T?cnico de Laboratorio de Universidad","2021-02-15 15:55:38",NULL),
(129,"T?cnico de sistemas","2021-02-15 15:55:38",NULL),
(130,"Telefonista","2021-02-15 15:55:39",NULL),
(131,"Tesorero","2021-02-15 15:55:39",NULL),
(132,"Trabajador aut?nomo","2021-02-15 15:55:39",NULL),
(133,"Valet parking","2021-02-15 15:55:39",NULL),
(134,"Veedor (viticultura)","2021-02-15 15:55:39",NULL),
(135,"Verdugo","2021-02-15 15:55:41",NULL);


DROP TABLE IF EXISTS `sp_odontograma`;

CREATE TABLE `sp_odontograma` (
  `id_odontograma` int(11) NOT NULL AUTO_INCREMENT,
  `id_paciente` int(11) DEFAULT NULL,
  `id_pieza_dental` int(11) DEFAULT NULL,
  `creado_en` timestamp NOT NULL DEFAULT current_timestamp(),
  `actualizado_en` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_odontograma`),
  KEY `sp_odontograma_fk` (`id_paciente`),
  KEY `sp_odontograma_fk1` (`id_pieza_dental`),
  CONSTRAINT `sp_odontograma_fk` FOREIGN KEY (`id_paciente`) REFERENCES `sp_paciente` (`id_paciente`),
  CONSTRAINT `sp_odontograma_fk1` FOREIGN KEY (`id_pieza_dental`) REFERENCES `sp_pieza_dental` (`id_pieza_dental`)
) ENGINE=InnoDB AUTO_INCREMENT=526 DEFAULT CHARSET=latin1;

INSERT INTO `sp_odontograma` VALUES (200,4,11,"2021-06-20 16:16:25",NULL),
(201,4,24,"2021-06-20 16:16:25",NULL),
(202,4,30,"2021-06-20 16:16:25",NULL),
(203,4,20,"2021-06-20 16:16:25",NULL),
(204,4,32,"2021-06-20 16:16:25",NULL),
(205,4,17,"2021-06-20 16:16:25",NULL),
(206,4,27,"2021-06-20 16:16:25",NULL),
(207,4,10,"2021-06-20 16:16:25",NULL),
(208,4,31,"2021-06-20 16:16:25",NULL),
(209,4,7,"2021-06-20 16:16:25",NULL),
(210,4,6,"2021-06-20 16:16:25",NULL),
(211,4,26,"2021-06-20 16:16:25",NULL),
(212,4,22,"2021-06-20 16:16:25",NULL),
(213,4,4,"2021-06-20 16:16:25",NULL),
(214,4,18,"2021-06-20 16:16:26",NULL),
(215,4,29,"2021-06-20 16:16:26",NULL),
(395,6,11,"2021-06-20 16:40:36",NULL),
(396,6,9,"2021-06-20 16:40:36",NULL),
(397,6,8,"2021-06-20 16:40:36",NULL),
(398,6,12,"2021-06-20 16:40:36",NULL),
(399,6,1,"2021-06-20 16:40:36",NULL),
(400,6,15,"2021-06-20 16:40:36",NULL),
(401,6,23,"2021-06-20 16:40:36",NULL),
(402,6,10,"2021-06-20 16:40:36",NULL),
(403,6,3,"2021-06-20 16:40:36",NULL),
(404,6,7,"2021-06-20 16:40:36",NULL),
(405,6,6,"2021-06-20 16:40:36",NULL),
(406,6,2,"2021-06-20 16:40:36",NULL),
(407,6,5,"2021-06-20 16:40:37",NULL),
(408,6,14,"2021-06-20 16:40:37",NULL),
(409,6,4,"2021-06-20 16:40:37",NULL),
(410,6,13,"2021-06-20 16:40:37",NULL),
(411,6,26,"2021-06-20 16:40:37",NULL),
(514,3,3,"2021-07-04 08:00:02",NULL),
(515,3,18,"2021-07-04 08:00:02",NULL),
(516,3,19,"2021-07-04 08:00:02",NULL),
(517,3,22,"2021-07-04 08:00:02",NULL),
(518,3,2,"2021-07-04 08:00:03",NULL),
(519,3,21,"2021-07-04 08:00:03",NULL),
(520,3,1,"2021-07-04 08:00:03",NULL),
(521,3,24,"2021-07-04 08:00:03",NULL),
(522,3,4,"2021-07-04 08:00:03",NULL),
(523,3,30,"2021-07-04 08:00:03",NULL),
(524,3,27,"2021-07-04 08:00:03",NULL),
(525,3,29,"2021-07-04 08:00:03",NULL);


DROP TABLE IF EXISTS `sp_odontologo`;

CREATE TABLE `sp_odontologo` (
  `id_odontologo` int(11) NOT NULL,
  `turno` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `gestion_ingreso` year(4) NOT NULL,
  `creado_en` timestamp NOT NULL DEFAULT current_timestamp(),
  `actualizado_en` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_odontologo`),
  CONSTRAINT `fk_persona_odontologo` FOREIGN KEY (`id_odontologo`) REFERENCES `sp_persona` (`id_persona`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO `sp_odontologo` VALUES (2,"TARDE",2020,"2021-02-15 21:47:00",NULL),
(5,"MAÑANA",2019,"2021-02-19 22:07:43","2021-03-18 03:01:27"),
(7,"TARDE",2018,"2021-05-09 04:19:25","2021-05-10 02:08:11");


DROP TABLE IF EXISTS `sp_paciente`;

CREATE TABLE `sp_paciente` (
  `id_paciente` int(11) NOT NULL,
  `id_ocupacion` int(11) NOT NULL,
  `creado_en` timestamp NOT NULL DEFAULT current_timestamp(),
  `actualizado_en` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_paciente`),
  KEY `fk_paciente_ocupacion` (`id_ocupacion`),
  CONSTRAINT `fk_paciente_ocupacion` FOREIGN KEY (`id_ocupacion`) REFERENCES `sp_ocupacion` (`id_ocupacion`),
  CONSTRAINT `fk_persona_paciente` FOREIGN KEY (`id_paciente`) REFERENCES `sp_persona` (`id_persona`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO `sp_paciente` VALUES (3,2,"2021-02-19 22:01:47","2021-07-04 07:03:56"),
(4,17,"2021-02-19 22:03:22","2021-03-05 02:49:02"),
(6,2,"2021-03-12 23:41:06","2021-03-18 02:41:54"),
(8,89,"2021-07-04 23:03:55",NULL);


DROP TABLE IF EXISTS `sp_persona`;

CREATE TABLE `sp_persona` (
  `id_persona` int(11) NOT NULL AUTO_INCREMENT,
  `ci` int(11) NOT NULL,
  `expedido` varchar(4) COLLATE utf8_spanish_ci NOT NULL,
  `nombres` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `paterno` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `materno` varchar(25) COLLATE utf8_spanish_ci DEFAULT NULL,
  `sexo` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `lugar_nacimiento` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `telefono_celular` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `domicilio` varchar(150) COLLATE utf8_spanish_ci DEFAULT NULL,
  `estatus` enum('ACTIVO','INACTIVO') COLLATE utf8_spanish_ci NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  `creado_en` timestamp NOT NULL DEFAULT current_timestamp(),
  `actualizado_en` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_persona`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO `sp_persona` VALUES (1,12345678,"LP","Fernando","Chambi","Bautista","masculino","dfgdfgdf",67335869,"2021-03-22","hola","ACTIVO",1,"2021-02-15 16:04:34","2021-06-14 21:27:54"),
(2,10907085,"LP","Luis","Chambi","Bautista","","",67333533,"1995-03-22","San Felipe","ACTIVO",1,"2021-02-15 21:47:00",NULL),
(3,1568945,"LP","Jorge","Flores","Campos","masculino","No puede ser",7658956,"1999-02-16","kiswaras","ACTIVO",1,"2021-02-19 22:01:47","2021-07-04 07:03:56"),
(4,25896312,"CH","Hernan","Cortez","Charca","","",25896321,"1995-03-22","Pinos ","ACTIVO",1,"2021-02-19 22:03:22","2021-03-05 02:49:02"),
(5,14785896,"LP","Pablo","Montes","Carbajal","","",78596321,"1708-02-15","Senkata","INACTIVO",1,"2021-02-19 22:07:43","2021-03-18 03:01:27"),
(6,20252365,"CH","Franklim","Terrazas","Curvo","","",75896325,"2021-03-01","palos blancos","INACTIVO",1,"2021-03-12 23:41:06","2021-03-18 02:41:54"),
(7,45896,"LP","Rodolfo","Quispe","Quispe","","",54869562,"2021-05-18","nknjkkk ","ACTIVO",1,"2021-05-09 04:19:25","2021-05-10 02:08:11"),
(8,8347,"OR","Dflgkjdslj","Dlkfgjdls","Lkjdfg","masculino","IOFOSDJFLS SLKDJF ",233423,"2021-07-03","SDLKFJDSLsdfsd sdf","ACTIVO",1,"2021-07-04 23:03:55",NULL);


DROP TABLE IF EXISTS `sp_pieza_dental`;

CREATE TABLE `sp_pieza_dental` (
  `id_pieza_dental` int(11) NOT NULL AUTO_INCREMENT,
  `numero_pieza_dental` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_pieza_dental`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=latin1;

INSERT INTO `sp_pieza_dental` VALUES (1,1),
(2,2),
(3,3),
(4,4),
(5,5),
(6,6),
(7,7),
(8,8),
(9,9),
(10,10),
(11,11),
(12,12),
(13,13),
(14,14),
(15,15),
(16,16),
(17,17),
(18,18),
(19,19),
(20,20),
(21,21),
(22,22),
(23,23),
(24,24),
(25,25),
(26,26),
(27,27),
(28,28),
(29,29),
(30,30),
(31,31),
(32,32),
(33,33),
(34,34),
(35,35),
(36,36),
(37,37),
(38,38),
(39,39),
(40,40),
(41,41),
(42,42),
(43,43),
(44,44),
(45,45),
(46,46),
(47,47),
(48,48),
(49,49),
(50,50),
(51,51),
(52,52);


DROP TABLE IF EXISTS `sp_tratamiento_alergias`;

CREATE TABLE `sp_tratamiento_alergias` (
  `id_alergia` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_alergia` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `detalle` varchar(250) COLLATE utf8_spanish_ci DEFAULT NULL,
  `id_paciente` int(11) NOT NULL,
  `creado_en` timestamp NOT NULL DEFAULT current_timestamp(),
  `actualizado_en` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_alergia`),
  KEY `fk_tratamiento_alergias_paciente` (`id_paciente`),
  CONSTRAINT `fk_tratamiento_alergias_paciente` FOREIGN KEY (`id_paciente`) REFERENCES `sp_paciente` (`id_paciente`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO `sp_tratamiento_alergias` VALUES (7,"sfdsf","fsdsdfsd",3,"2021-06-23 11:18:19",NULL),
(8,"adalid","Juan",3,"2021-06-23 11:18:24",NULL),
(11,"Hola comoe stas","Hotas c",3,"2021-07-04 07:02:07",NULL),
(12,"sdkljfld kjsdfl ","jsdkf sasd f",3,"2021-07-04 07:39:24",NULL);


DROP TABLE IF EXISTS `sp_tratamiento_consulta`;

CREATE TABLE `sp_tratamiento_consulta` (
  `id_consulta` int(11) NOT NULL AUTO_INCREMENT,
  `tratamiento` varchar(25) COLLATE utf8_spanish_ci DEFAULT NULL,
  `motivo_tratamiento` varchar(250) COLLATE utf8_spanish_ci DEFAULT NULL,
  `tomando_medicamentos` varchar(25) COLLATE utf8_spanish_ci DEFAULT NULL,
  `porque_tiempo` varchar(250) COLLATE utf8_spanish_ci DEFAULT NULL,
  `alergico_medicamento` varchar(25) COLLATE utf8_spanish_ci DEFAULT NULL,
  `cual_medicamento` varchar(250) COLLATE utf8_spanish_ci DEFAULT NULL,
  `alguna_cirugia` varchar(25) COLLATE utf8_spanish_ci DEFAULT NULL,
  `porque` varchar(250) COLLATE utf8_spanish_ci DEFAULT NULL,
  `alguna_enfermedad` varchar(250) COLLATE utf8_spanish_ci DEFAULT NULL,
  `cepilla_diente` varchar(25) COLLATE utf8_spanish_ci DEFAULT NULL,
  `cuanto_dia` varchar(150) COLLATE utf8_spanish_ci DEFAULT NULL,
  `id_paciente` int(11) NOT NULL,
  `creado_en` timestamp NOT NULL DEFAULT current_timestamp(),
  `actualizado_en` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_consulta`),
  KEY `fk_tratamiento_consulta_paciente` (`id_paciente`),
  CONSTRAINT `fk_tratamiento_consulta_paciente` FOREIGN KEY (`id_paciente`) REFERENCES `sp_paciente` (`id_paciente`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO `sp_tratamiento_consulta` VALUES (1,"si","No se dabe",NULL,NULL,"si","oihdofih","si","uodsifosu","saranpion,varicela,tuberculosis,epatitis","si","dlwjflwej",3,"2021-07-04 07:01:00",NULL),
(2,"si","lij jl",NULL,NULL,"si","j l ljl ","si","lkj ","saranpion","si","dslkj",3,"2021-07-04 07:09:36",NULL);


DROP TABLE IF EXISTS `sp_tratamiento_diagnostico`;

CREATE TABLE `sp_tratamiento_diagnostico` (
  `id_tratamiento_diagnostico` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_tratamiento_diagnostico` varchar(100) DEFAULT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id_tratamiento_diagnostico`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

INSERT INTO `sp_tratamiento_diagnostico` VALUES (1,"Amalgama",1),
(2,"Caries",1),
(3,"Endodoncia",1),
(4,"Ausente",1),
(5,"Resina",1),
(6,"Implante",1),
(7,"Sellante",1),
(8,"Corona",1);


DROP TABLE IF EXISTS `sp_tratamiento_enfermedad`;

CREATE TABLE `sp_tratamiento_enfermedad` (
  `id_enfermedad` int(11) NOT NULL AUTO_INCREMENT,
  `tiempo_consulta` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `motivo_consulta` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `sintomas_principales` varchar(150) COLLATE utf8_spanish_ci DEFAULT NULL,
  `tomando_medicamentos` varchar(25) COLLATE utf8_spanish_ci DEFAULT NULL,
  `nombre_medicamento` varchar(250) COLLATE utf8_spanish_ci DEFAULT NULL,
  `motivo_medicamento` varchar(250) COLLATE utf8_spanish_ci DEFAULT NULL,
  `dosis_medicamento` varchar(250) COLLATE utf8_spanish_ci DEFAULT NULL,
  `id_paciente` int(11) NOT NULL,
  PRIMARY KEY (`id_enfermedad`),
  KEY `fk_tratamiento_enfermedad_paciente` (`id_paciente`),
  CONSTRAINT `fk_tratamiento_enfermedad_paciente` FOREIGN KEY (`id_paciente`) REFERENCES `sp_paciente` (`id_paciente`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO `sp_tratamiento_enfermedad` VALUES (3,"fsdfd","dfds","hola como estas","si"," sdfs","asf","sdf",3);


DROP TABLE IF EXISTS `sp_tratamiento_fisico`;

CREATE TABLE `sp_tratamiento_fisico` (
  `id_fisico` int(11) NOT NULL AUTO_INCREMENT,
  `presion_arterial` decimal(10,0) DEFAULT NULL,
  `pulso` decimal(10,0) DEFAULT NULL,
  `temperatura` decimal(10,0) DEFAULT NULL,
  `frecuencia_cardiaca` decimal(10,0) DEFAULT NULL,
  `frecuencia_respiratoria` decimal(10,0) DEFAULT NULL,
  `peso` decimal(10,0) DEFAULT NULL,
  `talla` decimal(10,0) DEFAULT NULL,
  `masa_corporal` decimal(10,0) DEFAULT NULL,
  `id_cita` int(11) NOT NULL,
  `creado_en` timestamp NOT NULL DEFAULT current_timestamp(),
  `actualizado_en` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_fisico`),
  KEY `fk_tratamiento_fisico_paciente` (`id_cita`),
  CONSTRAINT `fk_tratamiento_fisico_paciente` FOREIGN KEY (`id_cita`) REFERENCES `sp_cita` (`id_cita`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO `sp_tratamiento_fisico` VALUES (2,55,55,55,55,55,55,55,55,24,"2021-07-05 02:58:33","2021-07-05 03:10:34"),
(3,77,77,77,77,77,77,77,77,25,"2021-07-05 03:11:46",NULL);


DROP TABLE IF EXISTS `sp_usuario`;

CREATE TABLE `sp_usuario` (
  `id_usuario` int(11) NOT NULL,
  `usuario` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `clave` varchar(256) COLLATE utf8_spanish_ci NOT NULL,
  `foto` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `creado_en` timestamp NOT NULL DEFAULT current_timestamp(),
  `actualizado_en` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_usuario`),
  CONSTRAINT `fk_persona_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `sp_persona` (`id_persona`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO `sp_usuario` VALUES (1,"FERNANDO_12345678","e2b5ac84247ab82f4ccfe4e5d377687af1a6c75e8e058c293d44eb97221abcbb1fed72a8901bd706aae5490b681ad8225dffd61e43616d0fc681a404a7488ca8","img/users/1621904319_54487276c92175acc406.jfif","2021-02-15 16:04:34","2021-06-14 21:27:54"),
(2,"LUIS_10907085","e2b5ac84247ab82f4ccfe4e5d377687af1a6c75e8e058c293d44eb97221abcbb1fed72a8901bd706aae5490b681ad8225dffd61e43616d0fc681a404a7488ca8","","2021-02-15 21:47:00",NULL),
(3,"JORGE_1568945","6ee7c7c5db1e16ae05d0fa94a743f7a6a573dcbcd2d7d1c698bf891584c77030be3fd5e7fa1180ad80509e5291e9fd9bd3c370b93b2f54f82eed2c899e8c8cbe","","2021-02-19 22:01:47","2021-07-04 07:03:56"),
(4,"HERNAN_25896312","e2b5ac84247ab82f4ccfe4e5d377687af1a6c75e8e058c293d44eb97221abcbb1fed72a8901bd706aae5490b681ad8225dffd61e43616d0fc681a404a7488ca8","","2021-02-19 22:03:22","2021-03-05 02:49:02"),
(5,"PABLO_14785896","e2b5ac84247ab82f4ccfe4e5d377687af1a6c75e8e058c293d44eb97221abcbb1fed72a8901bd706aae5490b681ad8225dffd61e43616d0fc681a404a7488ca8","","2021-02-19 22:07:43","2021-03-18 03:01:27"),
(6,"FRANKLIM_20252365","e2b5ac84247ab82f4ccfe4e5d377687af1a6c75e8e058c293d44eb97221abcbb1fed72a8901bd706aae5490b681ad8225dffd61e43616d0fc681a404a7488ca8","","2021-03-12 23:41:06","2021-03-18 02:41:54"),
(7,"RODOLFO_45896","e2b5ac84247ab82f4ccfe4e5d377687af1a6c75e8e058c293d44eb97221abcbb1fed72a8901bd706aae5490b681ad8225dffd61e43616d0fc681a404a7488ca8","","2021-05-09 04:19:25","2021-05-10 02:08:11"),
(8,"DFLGKJDSLJ_8347Y5","7ab56872fb2d731e59f1a3e8c695b044660e28eeefc3eb807dfdaba95069cf629749e8fb3bb73edff028ff15ef567d001f8f76f09fa0a5180940093aa14454d7","","2021-07-04 23:03:55",NULL);


DROP TABLE IF EXISTS `sp_view_cita`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`%` SQL SECURITY DEFINER VIEW `sp_view_cita` AS select `cita`.`id_cita` AS `id_cita`,`cita`.`numero_cita` AS `numero_cita`,`cita`.`tipo_tratamiento` AS `tipo_tratamiento`,`cita`.`observacion` AS `observacion`,`cita`.`fecha` AS `fecha`,`cita`.`hora_inicio` AS `hora_inicio`,`cita`.`hora_final` AS `hora_final`,`cita`.`costo` AS `costo`,`cita`.`estatus` AS `estatus`,`cita`.`estado` AS `estado`,`paciente`.`id_paciente` AS `id_paciente`,concat(`persona_paciente`.`nombres`,' ',`persona_paciente`.`paterno`,' ',`persona_paciente`.`materno`) AS `nombre_paciente`,concat(`persona_paciente`.`ci`,' ',`persona_paciente`.`expedido`) AS `ci_paciente`,`odontologo`.`id_odontologo` AS `id_odontologo`,concat(`persona_odontologo`.`nombres`,' ',`persona_odontologo`.`paterno`,' ',`persona_odontologo`.`materno`) AS `nombre_odontologo`,concat(`persona_odontologo`.`ci`,' ',`persona_odontologo`.`expedido`) AS `ci_odontologo`,`cita`.`creado_en` AS `creado_en` from ((((`sp_cita` `cita` join `sp_paciente` `paciente` on(`cita`.`id_paciente` = `paciente`.`id_paciente`)) join `sp_persona` `persona_paciente` on(`persona_paciente`.`id_persona` = `paciente`.`id_paciente`)) join `sp_odontologo` `odontologo` on(`cita`.`id_odontologo` = `odontologo`.`id_odontologo`)) join `sp_persona` `persona_odontologo` on(`odontologo`.`id_odontologo` = `persona_odontologo`.`id_persona`));

INSERT INTO `sp_view_cita` VALUES (20,18,"Prevencion","El paciente tiene algunas complicaciones en las piezas dentales","2021-04-13","14:00:00","00:00:00","costo","ATENDIDA",1,3,"Jorge Flores Campos","1568945 LP",5,"Pablo Montes Carbajal","14785896 LP","2021-03-14 15:17:48"),
(23,11,"Restauracion","sdsdcsdcds","2021-04-26","10:00:00","00:00:00","costo","CANCELADA",1,3,"Jorge Flores Campos","1568945 LP",2,"Luis Chambi Bautista","10907085 LP","2021-03-15 18:20:20"),
(24,12,"Periodoncia","el paciente lleva una dentadura rota","2021-05-03","15:00:00","00:00:00","costo","PENDIENTE",1,3,"Jorge Flores Campos","1568945 LP",5,"Pablo Montes Carbajal","14785896 LP","2021-03-15 23:19:57"),
(25,7,"Restauracion","dasxasxasxasxasx","2021-04-30","08:00:00","00:00:00","Gratuito","PENDIENTE",1,3,"Jorge Flores Campos","1568945 LP",5,"Pablo Montes Carbajal","14785896 LP","2021-03-16 16:03:53"),
(28,16,"Endodoncia","huhhihi","2021-05-12","15:00:00","15:30:00","Gratuito","PENDIENTE",1,3,"Jorge Flores Campos","1568945 LP",2,"Luis Chambi Bautista","10907085 LP","2021-05-08 20:47:18"),
(14,1,"Cirujia Bucal","wfdsfsdcdssdcdsc","2021-04-05","10:30:00","00:00:00","Gratuito","PENDIENTE",0,6,"Franklim Terrazas Curvo","20252365 CH",5,"Pablo Montes Carbajal","14785896 LP","2021-03-12 23:45:56"),
(15,2,"Cirujia Bucal","jkjbkhkjbbkmn","2021-04-12","12:30:00","00:00:00","Gratuito","PENDIENTE",0,6,"Franklim Terrazas Curvo","20252365 CH",5,"Pablo Montes Carbajal","14785896 LP","2021-03-12 23:49:45"),
(17,3,"Restauracion","sdcsdcsdcsd","2021-04-07","15:00:00","00:00:00","Gratuito","PENDIENTE",0,6,"Franklim Terrazas Curvo","20252365 CH",5,"Pablo Montes Carbajal","14785896 LP","2021-03-14 02:56:37"),
(18,4,"Restauracion","csdcsdcsd","2021-08-02","12:02:00","00:00:00","Gratuito","CANCELADA",0,6,"Franklim Terrazas Curvo","20252365 CH",5,"Pablo Montes Carbajal","14785896 LP","2021-03-14 14:42:20"),
(19,5,"Restauracion","wefsdfsadfad","2021-04-02","18:00:00","00:00:00","Gratuito","PENDIENTE",0,6,"Franklim Terrazas Curvo","20252365 CH",5,"Pablo Montes Carbajal","14785896 LP","2021-03-14 14:43:41"),
(21,14,"Restauracion","dfsdcdscd","2021-01-14","09:30:00","00:00:00","costo","CANCELADA",1,6,"Franklim Terrazas Curvo","20252365 CH",5,"Pablo Montes Carbajal","14785896 LP","2021-03-14 15:21:31"),
(22,10,"Restauracion","dfsdfsdsdfc","2021-04-22","08:00:00","00:00:00","Gratuito","ATENDIDA",1,6,"Franklim Terrazas Curvo","20252365 CH",5,"Pablo Montes Carbajal","14785896 LP","2021-03-14 19:09:47"),
(26,11,"Restauracion","vsdfsdcdc","2021-04-15","14:30:00","15:30:00","Gratuito","PENDIENTE",1,6,"Franklim Terrazas Curvo","20252365 CH",2,"Luis Chambi Bautista","10907085 LP","2021-03-23 21:12:37"),
(29,12,"Restauracion","dcacasdas","2021-05-27","15:00:00","15:30:00","Gratuito","PENDIENTE",1,6,"Franklim Terrazas Curvo","20252365 CH",5,"Pablo Montes Carbajal","14785896 LP","2021-05-08 20:50:10"),
(30,13,"Endodoncia","mnbkh KJJ","2021-07-08","12:00:00","02:12:00","Gratuito","PENDIENTE",1,6,"Franklim Terrazas Curvo","20252365 CH",5,"Pablo Montes Carbajal","14785896 LP","2021-07-04 07:48:14"),
(8,NULL,"Prevencion","ninguna","2021-02-16","00:00:00","00:00:00","Gratuito","PENDIENTE",0,4,"Hernan Cortez Charca","25896312 CH",5,"Pablo Montes Carbajal","14785896 LP","2021-02-19 22:08:42"),
(10,3,"Restauracion","dfgfvsv","2021-03-30","12:30:00","00:00:00","Gratuito","PENDIENTE",0,4,"Hernan Cortez Charca","25896312 CH",5,"Pablo Montes Carbajal","14785896 LP","2021-03-06 14:10:02"),
(12,5,"Periodoncia","fwefadfsdds","2021-03-28","13:30:00","00:00:00","Gratuito","PENDIENTE",0,4,"Hernan Cortez Charca","25896312 CH",2,"Luis Chambi Bautista","10907085 LP","2021-03-06 23:09:46"),
(31,1,"Periodoncia","dslkfsdl sdkljf sdlkjsd f","2021-07-22","01:05:00","10:00:00","Gratuito","PENDIENTE",1,8,"Dflgkjdslj Dlkfgjdls Lkjdfg","8347 OR",5,"Pablo Montes Carbajal","14785896 LP","2021-07-04 23:05:18");


DROP TABLE IF EXISTS `sp_view_odontologo`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `sp_view_odontologo` AS select `p`.`id_persona` AS `id_persona`,concat(`p`.`ci`,' ',`p`.`expedido`) AS `ci_exp`,concat(`p`.`nombres`,' ',`p`.`paterno`,' ',`p`.`materno`) AS `nombre_completo`,`p`.`telefono_celular` AS `telefono_celular`,`p`.`fecha_nacimiento` AS `fecha_nacimiento`,`p`.`domicilio` AS `domicilio`,`o`.`turno` AS `turno`,`o`.`gestion_ingreso` AS `gestion_ingreso`,`p`.`estatus` AS `estatus`,`p`.`estado` AS `estado`,`p`.`creado_en` AS `creado_en` from (`sp_persona` `p` join `sp_odontologo` `o` on(`p`.`id_persona` = `o`.`id_odontologo`));

INSERT INTO `sp_view_odontologo` VALUES (2,"10907085 LP","Luis Chambi Bautista",67333533,"1995-03-22","San Felipe","TARDE",2020,"ACTIVO",1,"2021-02-15 21:47:00"),
(5,"14785896 LP","Pablo Montes Carbajal",78596321,"1708-02-15","Senkata","MAÑANA",2019,"INACTIVO",1,"2021-02-19 22:07:43"),
(7,"45896 LP","Rodolfo Quispe Quispe",54869562,"2021-05-18","nknjkkk ","TARDE",2018,"ACTIVO",1,"2021-05-09 04:19:25");


DROP TABLE IF EXISTS `sp_view_paciente`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `sp_view_paciente` AS select `p`.`id_persona` AS `id_persona`,concat(`p`.`ci`,' ',`p`.`expedido`) AS `ci_exp`,concat(`p`.`nombres`,' ',`p`.`paterno`,' ',`p`.`materno`) AS `nombre_completo`,`p`.`sexo` AS `sexo`,`p`.`lugar_nacimiento` AS `lugar_nacimiento`,`p`.`telefono_celular` AS `telefono_celular`,`p`.`fecha_nacimiento` AS `fecha_nacimiento`,`p`.`domicilio` AS `domicilio`,`o`.`id_ocupacion` AS `id_ocupacion`,`o`.`nombre` AS `ocupacion`,`p`.`estatus` AS `estatus`,`p`.`estado` AS `estado`,`p`.`creado_en` AS `creado_en` from ((`sp_persona` `p` join `sp_paciente` `pa` on(`p`.`id_persona` = `pa`.`id_paciente`)) join `sp_ocupacion` `o` on(`pa`.`id_ocupacion` = `o`.`id_ocupacion`));

INSERT INTO `sp_view_paciente` VALUES (3,"1568945 LP","Jorge Flores Campos","masculino","No puede ser",7658956,"1999-02-16","kiswaras",2,"Adivino","ACTIVO",1,"2021-02-19 22:01:47"),
(6,"20252365 CH","Franklim Terrazas Curvo","","",75896325,"2021-03-01","palos blancos",2,"Adivino","INACTIVO",1,"2021-03-12 23:41:06"),
(4,"25896312 CH","Hernan Cortez Charca","","",25896321,"1995-03-22","Pinos ",17,"Archivero","ACTIVO",1,"2021-02-19 22:03:22"),
(8,"8347 OR","Dflgkjdslj Dlkfgjdls Lkjdfg","masculino","IOFOSDJFLS SLKDJF ",233423,"2021-07-03","SDLKFJDSLsdfsd sdf",89,"Ingeniero de sonido","ACTIVO",1,"2021-07-04 23:03:55");


DROP TABLE IF EXISTS `sp_view_paciente_cita`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `sp_view_paciente_cita` AS select `p`.`id_persona` AS `id_persona`,concat(`p`.`ci`,' ',`p`.`expedido`) AS `ci_exp`,concat('Cita Nro',' ',`c`.`numero_cita`) AS `numero_cita`,concat(`p`.`nombres`,' ',`p`.`paterno`,' ',`p`.`materno`) AS `nombre_completo`,`p`.`sexo` AS `sexo`,`p`.`lugar_nacimiento` AS `lugar_nacimiento`,`p`.`telefono_celular` AS `telefono_celular`,`p`.`fecha_nacimiento` AS `fecha_nacimiento`,`p`.`domicilio` AS `domicilio`,`o`.`id_ocupacion` AS `id_ocupacion`,`o`.`nombre` AS `ocupacion`,`p`.`estatus` AS `estatus`,`p`.`estado` AS `estado`,`p`.`creado_en` AS `creado_en`,`c`.`id_cita` AS `id_cita` from (((`sp_persona` `p` join `sp_paciente` `pa` on(`p`.`id_persona` = `pa`.`id_paciente`)) join `sp_ocupacion` `o` on(`pa`.`id_ocupacion` = `o`.`id_ocupacion`)) join `sp_cita` `c` on(`c`.`id_paciente` = `pa`.`id_paciente`)) where `c`.`estatus` = 'PENDIENTE' order by `p`.`id_persona`,concat('Cita Nro',' ',`c`.`numero_cita`) desc;

INSERT INTO `sp_view_paciente_cita` VALUES (3,"1568945 LP","Cita Nro 7","Jorge Flores Campos","masculino","No puede ser",7658956,"1999-02-16","kiswaras",2,"Adivino","ACTIVO",1,"2021-02-19 22:01:47",25),
(3,"1568945 LP","Cita Nro 16","Jorge Flores Campos","masculino","No puede ser",7658956,"1999-02-16","kiswaras",2,"Adivino","ACTIVO",1,"2021-02-19 22:01:47",28),
(3,"1568945 LP","Cita Nro 12","Jorge Flores Campos","masculino","No puede ser",7658956,"1999-02-16","kiswaras",2,"Adivino","ACTIVO",1,"2021-02-19 22:01:47",24),
(4,"25896312 CH","Cita Nro 5","Hernan Cortez Charca","","",25896321,"1995-03-22","Pinos ",17,"Archivero","ACTIVO",1,"2021-02-19 22:03:22",12),
(4,"25896312 CH","Cita Nro 3","Hernan Cortez Charca","","",25896321,"1995-03-22","Pinos ",17,"Archivero","ACTIVO",1,"2021-02-19 22:03:22",10),
(4,"25896312 CH",NULL,"Hernan Cortez Charca","","",25896321,"1995-03-22","Pinos ",17,"Archivero","ACTIVO",1,"2021-02-19 22:03:22",8),
(6,"20252365 CH","Cita Nro 5","Franklim Terrazas Curvo","","",75896325,"2021-03-01","palos blancos",2,"Adivino","INACTIVO",1,"2021-03-12 23:41:06",19),
(6,"20252365 CH","Cita Nro 3","Franklim Terrazas Curvo","","",75896325,"2021-03-01","palos blancos",2,"Adivino","INACTIVO",1,"2021-03-12 23:41:06",17),
(6,"20252365 CH","Cita Nro 2","Franklim Terrazas Curvo","","",75896325,"2021-03-01","palos blancos",2,"Adivino","INACTIVO",1,"2021-03-12 23:41:06",15),
(6,"20252365 CH","Cita Nro 13","Franklim Terrazas Curvo","","",75896325,"2021-03-01","palos blancos",2,"Adivino","INACTIVO",1,"2021-03-12 23:41:06",30),
(6,"20252365 CH","Cita Nro 12","Franklim Terrazas Curvo","","",75896325,"2021-03-01","palos blancos",2,"Adivino","INACTIVO",1,"2021-03-12 23:41:06",29),
(6,"20252365 CH","Cita Nro 11","Franklim Terrazas Curvo","","",75896325,"2021-03-01","palos blancos",2,"Adivino","INACTIVO",1,"2021-03-12 23:41:06",26),
(6,"20252365 CH","Cita Nro 1","Franklim Terrazas Curvo","","",75896325,"2021-03-01","palos blancos",2,"Adivino","INACTIVO",1,"2021-03-12 23:41:06",14),
(8,"8347 OR","Cita Nro 1","Dflgkjdslj Dlkfgjdls Lkjdfg","masculino","IOFOSDJFLS SLKDJF ",233423,"2021-07-03","SDLKFJDSLsdfsd sdf",89,"Ingeniero de sonido","ACTIVO",1,"2021-07-04 23:03:55",31);


DROP TABLE IF EXISTS `sp_view_tratamiento_alergias`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`%` SQL SECURITY DEFINER VIEW `sp_view_tratamiento_alergias` AS select `tratamiento_alergias`.`id_alergia` AS `id_alergia`,`tratamiento_alergias`.`nombre_alergia` AS `nombre_alergia`,`tratamiento_alergias`.`detalle` AS `detalle`,`paciente`.`id_paciente` AS `id_paciente`,concat(`persona_paciente`.`nombres`,' ',`persona_paciente`.`paterno`,' ',`persona_paciente`.`materno`) AS `nombre_paciente`,concat(`persona_paciente`.`ci`,' ',`persona_paciente`.`expedido`) AS `ci_paciente`,`tratamiento_alergias`.`creado_en` AS `creado_en` from ((`sp_tratamiento_alergias` `tratamiento_alergias` join `sp_paciente` `paciente` on(`tratamiento_alergias`.`id_paciente` = `paciente`.`id_paciente`)) join `sp_persona` `persona_paciente` on(`persona_paciente`.`id_persona` = `paciente`.`id_paciente`));

INSERT INTO `sp_view_tratamiento_alergias` VALUES (7,"sfdsf","fsdsdfsd",3,"Jorge Flores Campos","1568945 LP","2021-06-23 11:18:19"),
(8,"adalid","Juan",3,"Jorge Flores Campos","1568945 LP","2021-06-23 11:18:24"),
(11,"Hola comoe stas","Hotas c",3,"Jorge Flores Campos","1568945 LP","2021-07-04 07:02:07"),
(12,"sdkljfld kjsdfl ","jsdkf sasd f",3,"Jorge Flores Campos","1568945 LP","2021-07-04 07:39:24");


DROP TABLE IF EXISTS `sp_view_tratamiento_consulta`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`%` SQL SECURITY DEFINER VIEW `sp_view_tratamiento_consulta` AS select `tratamiento_consulta`.`id_consulta` AS `id_consulta`,`tratamiento_consulta`.`tratamiento` AS `tratamiento`,`tratamiento_consulta`.`motivo_tratamiento` AS `motivo_tratamiento`,`tratamiento_consulta`.`tomando_medicamentos` AS `tomando_medicamentos`,`tratamiento_consulta`.`porque_tiempo` AS `porque_tiempo`,`tratamiento_consulta`.`alergico_medicamento` AS `alergico_medicamento`,`tratamiento_consulta`.`cual_medicamento` AS `cual_medicamento`,`tratamiento_consulta`.`alguna_cirugia` AS `alguna_cirugia`,`tratamiento_consulta`.`porque` AS `porque`,`tratamiento_consulta`.`alguna_enfermedad` AS `alguna_enfermedad`,`tratamiento_consulta`.`cepilla_diente` AS `cepilla_diente`,`tratamiento_consulta`.`cuanto_dia` AS `cuanto_dia`,`paciente`.`id_paciente` AS `id_paciente`,concat(`persona_paciente`.`nombres`,' ',`persona_paciente`.`paterno`,' ',`persona_paciente`.`materno`) AS `nombre_paciente`,`tratamiento_consulta`.`creado_en` AS `creado_en` from ((`sp_tratamiento_consulta` `tratamiento_consulta` join `sp_paciente` `paciente` on(`tratamiento_consulta`.`id_paciente` = `paciente`.`id_paciente`)) join `sp_persona` `persona_paciente` on(`persona_paciente`.`id_persona` = `paciente`.`id_paciente`));

INSERT INTO `sp_view_tratamiento_consulta` VALUES (1,"si","No se dabe",NULL,NULL,"si","oihdofih","si","uodsifosu","saranpion,varicela,tuberculosis,epatitis","si","dlwjflwej",3,"Jorge Flores Campos","2021-07-04 07:01:00"),
(2,"si","lij jl",NULL,NULL,"si","j l ljl ","si","lkj ","saranpion","si","dslkj",3,"Jorge Flores Campos","2021-07-04 07:09:36");


DROP TABLE IF EXISTS `sp_view_tratamiento_enfermedad`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`%` SQL SECURITY DEFINER VIEW `sp_view_tratamiento_enfermedad` AS select `tratamiento_enfermedad`.`id_enfermedad` AS `id_enfermedad`,`tratamiento_enfermedad`.`tiempo_consulta` AS `tiempo_consulta`,`tratamiento_enfermedad`.`motivo_consulta` AS `motivo_consulta`,`tratamiento_enfermedad`.`sintomas_principales` AS `sintomas_principales`,`tratamiento_enfermedad`.`tomando_medicamentos` AS `tomando_medicamento`,`tratamiento_enfermedad`.`nombre_medicamento` AS `nombre_medicamento`,`tratamiento_enfermedad`.`motivo_medicamento` AS `motivo_medicamento`,`tratamiento_enfermedad`.`dosis_medicamento` AS `dosis_medicamento`,`paciente`.`id_paciente` AS `id_paciente`,concat(`persona_paciente`.`nombres`,' ',`persona_paciente`.`paterno`,' ',`persona_paciente`.`materno`) AS `nombre_paciente` from ((`sp_tratamiento_enfermedad` `tratamiento_enfermedad` join `sp_paciente` `paciente` on(`tratamiento_enfermedad`.`id_paciente` = `paciente`.`id_paciente`)) join `sp_persona` `persona_paciente` on(`persona_paciente`.`id_persona` = `paciente`.`id_paciente`));

INSERT INTO `sp_view_tratamiento_enfermedad` VALUES (3,"fsdfd","dfds","hola como estas","si"," sdfs","asf","sdf",3,"Jorge Flores Campos");
