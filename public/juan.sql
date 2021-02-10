-- prefijo agregado
CREATE TABLE `sp_agenda` (
  `id_agenda` int(11) NOT NULL,
  `motivo` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `fecha_horaInicio` datetime DEFAULT NULL,
  `fecha_horaFin` datetime DEFAULT NULL,
  `id_paciente` int(11) DEFAULT NULL,
  `id_odontologo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

CREATE TABLE `sp_historial` (
  `id_historial` int(11) NOT NULL,
  `id_paciente` int(11) DEFAULT NULL,
  `h_pregunta` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `h_categotria` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `h_respuesta` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `h_estado` text COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

CREATE TABLE `sp_odontograma` (
  `id_odontograma` int(11) NOT NULL,
  `o_posicion` int(11) DEFAULT NULL,
  `o_nombre` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `o_categoria` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `o_estado` varchar(80) COLLATE utf8_spanish_ci DEFAULT NULL,
  `id_tratamiento` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

CREATE TABLE `sp_odontologo` (
  `id_odontologo` int(11) NOT NULL,
  `dr_ci` varchar(30) COLLATE utf8_spanish_ci DEFAULT NULL,
  `dr_nombre` varchar(80) COLLATE utf8_spanish_ci DEFAULT NULL,
  `dr_celular` varchar(30) COLLATE utf8_spanish_ci DEFAULT NULL,
  `dr_domicilio` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `dr_fechaNac` date DEFAULT NULL,
  `dr_turno` varchar(70) COLLATE utf8_spanish_ci DEFAULT NULL,
  `dr_usuario` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `dr_password` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `activo` tinyint(3) NOT NULL DEFAULT 1,
  `feha_alta` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `fecha_edit` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

CREATE TABLE `sp_paciente` (
  `id_paciente` int(11) NOT NULL,
  `p_ci` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `p_nombre` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `p_domicilio` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `p_cel` varchar(30) COLLATE utf8_spanish_ci DEFAULT NULL,
  `p_fechaNac` date DEFAULT NULL,
  `p_ocupacion` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `activo` tinyint(3) NOT NULL DEFAULT 1,
  `feha_alta` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `fecha_edit` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

CREATE TABLE `sp_pago_tratamiento` (
  `id_pagoTratamiento` int(11) NOT NULL,
  `pt_fecha` date DEFAULT NULL,
  `pt_monto` int(11) DEFAULT NULL,
  `id_paciente` int(11) DEFAULT NULL,
  `id_tratamiento` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

CREATE TABLE `sp_realiza` (
  `id_paciente` int(11) DEFAULT NULL,
  `id_tratamiento` int(11) DEFAULT NULL,
  `r_fecha` date DEFAULT NULL,
  `r_procedimiento` text COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

CREATE TABLE `sp_receta_medica` (
  `id_recetaMedica` int(11) NOT NULL,
  `medicamentos` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `dosis` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `tiempo` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `id_tratamiento` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

CREATE TABLE `sp_tratamiento` (
  `id_tratamiento` int(11) NOT NULL,
  `t_diagnostico` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `t_procedimiento` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `t_tipoTratam` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `t_monto` int(11) DEFAULT NULL,
  `id_odontologo` int(11) DEFAULT NULL,
  `saldo` int(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Indices de la base de datos

ALTER TABLE `sp_agenda`
  ADD PRIMARY KEY (`id_agenda`),
  ADD KEY `id_paciente` (`id_paciente`),
  ADD KEY `id_odontologo` (`id_odontologo`);
 
 ALTER TABLE `sp_historial`
  ADD PRIMARY KEY (`id_historial`),
  ADD KEY `id_paciente` (`id_paciente`);
 
 ALTER TABLE `sp_odontograma`
  ADD PRIMARY KEY (`id_odontograma`),
  ADD KEY `id_tratamiento` (`id_tratamiento`);
 
 ALTER TABLE `sp_odontologo`
  ADD PRIMARY KEY (`id_odontologo`);
 
 ALTER TABLE `sp_paciente`
  ADD PRIMARY KEY (`id_paciente`); -- verificar indice
 
 ALTER TABLE `sp_pago_tratamiento`
  ADD PRIMARY KEY (`id_pagoTratamiento`),
  ADD KEY `id_paciente` (`id_paciente`),
  ADD KEY `id_tratamiento` (`id_tratamiento`);
 
 ALTER TABLE `sp_realiza`
  ADD KEY `id_paciente` (`id_paciente`),
  ADD KEY `id_tratamiento` (`id_tratamiento`);
 
 ALTER TABLE `sp_receta_medica`
  ADD PRIMARY KEY (`id_recetaMedica`),
  ADD KEY `id_tratamiento` (`id_tratamiento`);
 
 ALTER TABLE `sp_tratamiento`
  ADD PRIMARY KEY (`id_tratamiento`),
  ADD KEY `id_odontologo` (`id_odontologo`);

-- AUTO_INCREMENT de la base de datos
ALTER TABLE `sp_agenda`
  MODIFY `id_agenda` int(11) NOT NULL AUTO_INCREMENT;
 
 ALTER TABLE `sp_historial`
  MODIFY `id_historial` int(11) NOT NULL AUTO_INCREMENT;
 
 ALTER TABLE `sp_odontograma`
  MODIFY `id_odontograma` int(11) NOT NULL AUTO_INCREMENT;
 
 ALTER TABLE `sp_odontologo`
  MODIFY `id_odontologo` int(11) NOT NULL AUTO_INCREMENT;
 
 ALTER TABLE `sp_paciente`
  MODIFY `id_paciente` int(11) NOT NULL AUTO_INCREMENT;
 
 ALTER TABLE `sp_pago_tratamiento`
  MODIFY `id_pagoTratamiento` int(11) NOT NULL AUTO_INCREMENT;

 ALTER TABLE `sp_receta_medica`
  MODIFY `id_recetaMedica` int(11) NOT NULL AUTO_INCREMENT;
 
 ALTER TABLE `sp_tratamiento`
  MODIFY `id_tratamiento` int(11) NOT NULL AUTO_INCREMENT;


 -- Restricciones o las relaciones de la bbdd
 ALTER TABLE `sp_agenda`
  ADD CONSTRAINT `agenda_ibfk_1` FOREIGN KEY (`id_paciente`) REFERENCES `sp_paciente` (`id_paciente`),
  ADD CONSTRAINT `agenda_ibfk_2` FOREIGN KEY (`id_odontologo`) REFERENCES `sp_odontologo` (`id_odontologo`);
 
 ALTER TABLE `sp_historial`
  ADD CONSTRAINT `historial_ibfk_1` FOREIGN KEY (`id_paciente`) REFERENCES `sp_paciente` (`id_paciente`);
 
 ALTER TABLE `sp_odontograma`
  ADD CONSTRAINT `odontograma_ibfk_1` FOREIGN KEY (`id_tratamiento`) REFERENCES `sp_tratamiento` (`id_tratamiento`);
 
ALTER TABLE `sp_pago_tratamiento`
  ADD CONSTRAINT `pago_tratamiento_ibfk_1` FOREIGN KEY (`id_paciente`) REFERENCES `sp_paciente` (`id_paciente`),
  ADD CONSTRAINT `pago_tratamiento_ibfk_2` FOREIGN KEY (`id_tratamiento`) REFERENCES `sp_tratamiento` (`id_tratamiento`);
 
 ALTER TABLE `sp_realiza`
  ADD CONSTRAINT `realiza_ibfk_1` FOREIGN KEY (`id_paciente`) REFERENCES `sp_paciente` (`id_paciente`),
  ADD CONSTRAINT `realiza_ibfk_2` FOREIGN KEY (`id_tratamiento`) REFERENCES `sp_tratamiento` (`id_tratamiento`);
 
 ALTER TABLE `sp_receta_medica`
  ADD CONSTRAINT `receta_medica_ibfk_1` FOREIGN KEY (`id_tratamiento`) REFERENCES `sp_tratamiento` (`id_tratamiento`);
 
 
 ALTER TABLE `sp_tratamiento`
  ADD CONSTRAINT `tratamiento_ibfk_1` FOREIGN KEY (`id_odontologo`) REFERENCES `sp_odontologo` (`id_odontologo`);
 
 -- fin -- prefijo agregado
 
 
 
 
 
 
 
 
 
 
