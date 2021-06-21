$(document).ready(function () {
	//Id del paciente para el tratamiento
	let id_paciente = null;
	$('#content').hide();

	// Listado de pacientes para ver en el modal
	$('#tbl_pacientes_ver').DataTable({
		responsive: true,
		processing: true,
		serverSide: true,
		ajax: '/paciente/ajaxListarPacientes',
		language: {
			url: '/plugins/datatables/lang/Spanish.json',
		},
		columnDefs: [
			{
				searchable: true,
				orderable: true,
				visible: false,
				targets: 0,
			},
			{
				searchable: true,
				orderable: true,
				visible: false,
				targets: 3,
			},
			{
				searchable: true,
				orderable: true,
				visible: false,
				targets: 4,
			},
			{
				searchable: true,
				orderable: true,
				visible: false,
				targets: 6,
			},
			{
				searchable: false,
				orderable: false,
				visible: true,
				targets: 9,
				data: null,
				render: function (data, type, row, meta) {
					if (data[9] == 'ACTIVO') {
						return '<a type="button" data="' + data[0] + '" class="btn btn-success btn-xs text-white">' + data[9] + ' </span>';
					} else {
						return '<a type="button" data="' + data[0] + '" class="btn btn-danger btn-xs text-white">' + data[9] + ' </span>';
					}
				},
			},
			{
				searchable: false,
				orderable: false,
				targets: -1,
				data: null,
				render: function (data, type, row, meta) {
					console.log(data);
					return '<div class="btn-group" role="group">' + '<a data="' + data[0] + '" class="btn btn-success btn-xs mdi mdi-tooltip-edit text-white btn_ver_tratamientos" data-toggle="tooltip" title="Ver Tratamientos del Paciente">' + '<i class="fa fa-eye"></i> ver tratamientos</a>' + '</div>';
				},
			},
		],
	});

	// Mostrar el modal con los pacientes
	$('#listado-paciente-title').html('Listado de Pacientes');

	parametrosModal('#listado-pacientes', 'Listado de Pacientes', 'modal-lg', false, true);

	// Habilitar el fomulario de ver los detalles de tratamiento, odontograma del paciente
	$('#tbl_pacientes_ver').on('click', '.btn_ver_tratamientos', function (e) {
		//ocultar el modal
		$('#listado-pacientes').modal('hide');
		let id = $(this).attr('data');
		id_paciente = id;
		if (id_paciente == null) {
			setInterval(function () {
				window.location = '/';
			}, 1000);

			mensajeAlert('info', 'Por favor seleccione un paciente !!!', 'Informacion');
		}

		// recuperar todos los datos
		$.ajax({
			type: 'POST',
			url: '/paciente/editar_paciente',
			data: {
				id: id,
			},
			dataType: 'JSON',
		})
			.done(function (response) {
				console.log(response.respuesta1);
				// set data data paciente
				$('#id').val(response.respuesta1[0]['id_persona']);
				$('#ci').val(response.respuesta1[0]['ci']);
				$('#expedido').val(response.respuesta1[0]['expedido']);
				$('#nombres').val(response.respuesta1[0]['nombres']);
				$('#paterno').val(response.respuesta1[0]['paterno']);
				$('#materno').val(response.respuesta1[0]['materno']);
				$('input:radio[name="sexo"]').filter(`[value="${response.respuesta1[0]['sexo']}"]`).attr('checked', true);
				$('#lugar_nacimiento').val(response.respuesta1[0]['lugar_nacimiento']);
				$('#celular').val(response.respuesta1[0]['telefono_celular']);
				$('#fecha_nacimiento').val(response.respuesta1[0]['fecha_nacimiento']);
				$('#id_ocupacion').val(response.respuesta1[0]['id_ocupacion']).trigger('change');
				$('#domicilio').val(response.respuesta1[0]['domicilio']);
				$('#estatus').val(response.respuesta1[0]['estatus']);
				$('#accion').val('up');

				// set data enfermedad
				console.log(response.respuesta2);
				$('#id_persona').val(response.respuesta1[0]['id_persona']);
				if (response.respuesta2.length > 0) {
					$('#id_enfermedad').val(response.respuesta2[0]['id_enfermedad']);
					$('#tiempo_consulta').val(response.respuesta2[0]['tiempo_consulta']);
					$('#motivo_consulta').val(response.respuesta2[0]['motivo_consulta']);
					$('#sintomas_principales').val(response.respuesta2[0]['sintomas_principales']);
					$('input:radio[name="tomando_medicamento"]').filter(`[value="${response.respuesta2[0]['tomando_medicamento']}"]`).attr('checked', true);
					$('#nombre_medicamento').val(response.respuesta2[0]['nombre_medicamento']);
					$('#motivo_medicamento').val(response.respuesta2[0]['motivo_medicamento']);
					$('#dosis_medicamento').val(response.respuesta2[0]['dosis_medicamento']);
					$('#accion').val('up');
				}

				// set data consulta de salud
				console.log(response.respuesta3);
				$('#id_persona1').val(response.respuesta1[0]['id_persona']);
				if (response.respuesta3.length > 0) {
					$('#id_consulta').val(response.respuesta3[0]['id_consulta']);
					$('input:radio[name="tratamiento"]').filter(`[value="${response.respuesta3[0]['tratamiento']}"]`).attr('checked', true);
					$('#motivo_tratamiento').val(response.respuesta3[0]['motivo_tratamiento']);
					$('input:radio[name="tomando_medicamentos"]').filter(`[value="${response.respuesta3[0]['tomando_medicamentos']}"]`).attr('checked', true);
					$('#porque_tiempo').val(response.respuesta3[0]['porque_tiempo']);
					$('input:radio[name="alergico_medicamento"]').filter(`[value="${response.respuesta3[0]['alergico_medicamento']}"]`).attr('checked', true);
					$('#cual_medicamento').val(response.respuesta3[0]['cual_medicamento']);
					$('input:radio[name="alguna_cirugia"]').filter(`[value="${response.respuesta3[0]['alguna_cirugia']}"]`).attr('checked', true);
					$('#porque').val(response.respuesta3[0]['porque']);
					$('input:checkbox[name="alguna_enfermedad[]"]').filter(`[value="${response.respuesta3[0]['alguna_enfermedad[]']}"]`).attr('checked', true);
					$('input:radio[name="cepilla_diente"]').filter(`[value="${response.respuesta3[0]['cepilla_diente']}"]`).attr('checked', true);
					$('#cuanto_dia').val(response.respuesta3[0]['cuanto_dia']);
					$('#accion').val('up');
					alguna_enfermedad = response.respuesta3[0]['alguna_enfermedad'].split(',');
					$("[name='alguna_enfermedad[]']").each(function (index, value) {
						if ($.inArray($(value).val(), alguna_enfermedad) !== -1) $(value).attr('checked', true);
					});
				}

				// set data exploracion fisica
				console.log(response.respuesta4);
				$('#id_persona2').val(response.respuesta1[0]['id_persona']);
				if (response.respuesta4.length > 0) {
					$('#id_fisico').val(response.respuesta4[0]['id_fisico']);
					$('#presion_arterial').val(response.respuesta4[0]['presion_arterial']);
					$('#pulso').val(response.respuesta4[0]['pulso']);
					$('#temperatura').val(response.respuesta4[0]['temperatura']);
					$('#frecuencia_cardiaca').val(response.respuesta4[0]['frecuencia_cardiaca']);
					$('#frecuencia_respiratoria').val(response.respuesta4[0]['frecuencia_respiratoria']);
					$('#peso').val(response.respuesta4[0]['peso']);
					$('#talla').val(response.respuesta4[0]['talla']);
					$('#masa_corporal').val(response.respuesta4[0]['masa_corporal']);
					$('#accion').val('up');
				}

				$(document).ready(function () {
					// Listado de alergias
					$('#tbl_tratamiento_alergias').DataTable({
						bPaginate: false,
						bFilter: false,
						bInfo: false,
						responsive: true,
						processing: true,
						serverSide: true,
						ajax: '/alergia/ajaxListarAlergias/?id_persona=' + response.respuesta1[0]['id_persona'],
						language: {
							url: '/plugins/datatables/lang/Spanish.json',
						},
						columnDefs: [
							{
								searchable: true,
								orderable: true,
								visible: true,
								targets: 0,
							},
							{
								searchable: false,
								orderable: false,
								targets: -1,
								data: null,
								render: function (data, type, row, meta) {
									return '<div class="btn-group" role="group">' + '<a data="' + data[0] + '" class="btn btn-warning btn-sm mdi mdi-tooltip-edit text-white btn_editar_alergia" data-toggle="tooltip" title="Editar">' + '<i class="fa fa-pen"></i></a>' + '<a data="' + data[0] + '" class="btn btn-danger btn-sm mdi mdi-delete-forever text-white btn_eliminar_alergia" data-toggle="tooltip" title="Eliminar">' + '<i class="fa fa-trash"></i></a>' + '</div>';
								},
							},
						],
					});

					console.log(response.respuesta5);
					$('#id_persona3').val(response.respuesta1[0]['id_persona']);
					if (response.respuesta5.length > 0) {
						$('#id_alergia').val(response.respuesta5[0]['id_alergia']);
						$('#nombre_alergia').val(response.respuesta5[0]['nombre_alergia']);
						$('#detalle').val(response.respuesta5[0]['detalle']);
						$('#accion').val('up');
					}
					$('#frm_guardar_alergia').on('submit', function (e) {
						e.preventDefault();
						$.ajax({
							type: 'POST',
							url: '/alergia/guardar_alergia',
							data: $('#frm_guardar_alergia').serialize(),
							dataType: 'JSON',
						})
							.done(function (response) {
								if (typeof response.warning !== 'undefined') {
									mensajeAlert('warning', response.warning, 'Advertencia');
								}

								if (typeof response.form !== 'undefined') {
									mensajeAlert('warning', response.form, 'Advertencia');
								}

								if (typeof response.exito !== 'undefined') {
									$('#tbl_tratameiento_alergias').DataTable().draw();
									$('#agregar-alergia').modal('hide');
									mensajeAlert('success', response.exito, 'Exito');
									$('#id_alergia').val(response.id_alergia);
									limpiarCampos();
								}
							})
							.fail(function (e) {
								mensajeAlert('error', 'Error al registrar/editar las alergias', 'Error');
							});
					});
					$('#tbl_tratamiento_alergias').on('click', '.btn_eliminar_alergia', function (e) {
						let id = $(this).attr('data');
						bootbox.confirm('¿Estas seguro de eliminar las alergias?', function (result) {
							if (result) {
								$.ajax({
									type: 'POST',
									url: '/alergia/eliminar_alergia',
									data: {
										id: id,
									},
									dataType: 'JSON',
								})
									.done(function (response) {
										if (typeof response.exito !== 'undefined') {
											$('#tbl_tratamiento_alergias').DataTable().draw();
											mensajeAlert('success', response.exito, 'Exito');
										}
									})
									.fail(function (e) {
										mensajeAlert('error', 'Error al procesar la peticion', 'Error');
									});
							}
						});
					});
					// Modal para agregar alergias
					$('button#agregar_alergia').on('click', function (e) {
						$('#btn-guardar-alergia').html('Guardar');
						$('#accion').val('in');

						parametrosModal('#agregar-alergia', 'Agregar Alergias', 'modal-lg', false, true);
					});
					// Limpiar Campos
					function limpiarCampos() {
						$('#id_alergia').val('');
						$('#nombre_alergia').val('');
						$('#detalle').val('');
						$('#accion').val('');
					}
				});
				// set data tratamientos realizados
				$(document).ready(function () {
					// Listado de alergias
					$('#tbl_citas').DataTable({
						bPaginate: false,
						bFilter: false,
						bInfo: false,
						responsive: true,
						processing: true,
						serverSide: true,
						ajax: '/paciente/ajaxListarCitas/?id_persona=' + response.respuesta1[0]['id_persona'],
						language: {
							url: '/plugins/datatables/lang/Spanish.json',
						},
						columnDefs: [
							{
								searchable: true,
								orderable: true,
								visible: false,
								targets: 0,
							},
							{
								searchable: true,
								orderable: true,
								visible: false,
								targets: 1,
							},
							{
								searchable: true,
								orderable: true,
								visible: false,
								targets: 2,
							},
							{
								searchable: true,
								orderable: true,
								visible: false,
								targets: 4,
							},
							{
								searchable: true,
								orderable: true,
								visible: false,
								targets: 7,
							},
							{
								searchable: true,
								orderable: true,
								visible: false,
								targets: 8,
							},
							{
								searchable: true,
								orderable: true,
								visible: false,
								targets: 9,
							},
							{
								searchable: false,
								orderable: false,
								visible: true,
								targets: 10,
								data: null,
								render: function (data, type, row, meta) {
									if (data[10] == 'PENDIENTE') {
										return '<a type="button" data="' + data[0] + '" class="btn btn-info btn-xs text-white">' + data[10] + ' </span>';
									} else if (data[10] == 'CANCELADA') {
										return '<a type="button" data="' + data[0] + '" class="btn btn-danger btn-xs text-white">' + data[10] + ' </span>';
									} else {
										return '<a type="button" data="' + data[0] + '" class="btn btn-success btn-xs text-white">' + data[10] + ' </span>';
									}
								},
							},
							{
								searchable: true,
								orderable: true,
								visible: false,
								targets: 11,
							},
						],
					});
					console.log(response.respuesta6);
					$('#id_persona4').val(response.respuesta1[0]['id_persona']);
					if (response.respuesta6.length > 0) {
						$('#nombre_tratamiento').val(response.respuesta6[0]['nombre_tratamiento']);
						$('#fecha').val(response.respuesta6[0]['fecha']);
						$('#hora').val(response.respuesta6[0]['hora']);
						$('#estado').val(response.respuesta6[0]['estado']);
					}
				});

				//perfil de los pacientes
				console.log(response.respuesta6);
				$('#id_persona5').val(response.respuesta1[0]['id_persona']);
				if (response.respuesta6.length > 0) {
					if (response.respuesta6[0]['foto'] != null) {
						$('#perfil_foto').attr('src', response.respuesta6[0]['foto']);
					}
					$('#perfil_nombre_completo').html(response.respuesta6[0]['nombre_completo']);
					$('#perfil_celular').html(response.respuesta6[0]['telefono_celular']);
					$('#perfil_domicilio').html(response.respuesta6[0]['domicilio']);
					$('#perfil_nacimiento').html(response.respuesta6[0]['fecha_nacimiento']);
				}
			})
			.fail(function (e) {
				$('#agregar-paciente').modal('hide');
			});

		$('#content').show();
		recuperarOdontograma();
	});

	// formulario guradar paciente
	$('#frm_guardar_paciente').on('submit', function (e) {
		e.preventDefault();
		$.ajax({
			type: 'POST',
			url: '/paciente/guardar_paciente',
			data: $('#frm_guardar_paciente').serialize(),
			dataType: 'JSON',
		})
			.done(function (response) {
				if (typeof response.warning !== 'undefined') {
					mensajeAlert('warning', response.warning, 'Advertencia');
					$('#ci').focus();
				}

				if (typeof response.form !== 'undefined') {
					mensajeAlert('warning', response.form, 'Advertencia');
				}

				if (typeof response.exito !== 'undefined') {
					$('#tbl_pacientes').DataTable().draw();
					$('#agregar-paciente').modal('hide');
					mensajeAlert('success', response.exito, 'Exito');
					limpiarCampos();
				}
			})
			.fail(function (e) {
				mensajeAlert('error', 'Error al registrar/editar el Paciente', 'Error');
			});
	});
	//datepicker
	$('#fecha_nacimiento').datepicker({
		changeMonth: true,
		changeYear: true,
		yearRange: '-100:+0',
		dateFormat: 'yy-mm-dd',
	});
	//odontograma
	$('#guardar-odontograma').on('click', function () {
		var imagenOdontograma = null;
		html2canvas($('#container')[0], {
			width: 1200,
			height: 1200,
			x: -20,
		}).then((canvas) => {
			canvas.toBlob(function (blob) {
				// saveAs(blob, 'Dashboard.png');
			});
			$.ajax({
				type: 'post',
				data: allStorage(canvas.toDataURL(canvas.toDataURL('image/png'))),
				url: '/paciente/guardar_odontograma',
				dataType: 'json',
				processData: false,
				contentType: false,
				cache: false,
				async: false,
			})
				.done(function (response) {
					if (typeof response.exito !== 'undefined') mensajeAlert('success', response.exito, 'Exito');
					else mensajeAlert('error', response.error, 'Error');
				})
				.fail(function (e) {
					mensajeAlert('error', 'Ocurrio un Error al Guardar el Odontograma', 'Error');
				});
		});
	});

	function recuperarOdontograma() {
		$.post('/paciente/editar_odontograma', { id_paciente: id_paciente }, function (r) {
			localStorage.clear();
			$.each(r, function (index, value) {
				datos = [];
				$.each(value.lesiones_cariosas, function (i, v) {
					datos.push(`${v.posicion},${v.id_tratamiento_diagnostico}`);

					// console.log(value.id_pieza_dental, v.posicion, v.id_tratamiento_diagnostico);
					color = v.id_tratamiento_diagnostico;
					let objeto;
					$.each($(`#${value.id_pieza_dental} polygon`), function (j, val) {
						if ($(val).attr('value') == v.posicion) {
							// console.log(value.id_pieza_dental, v.posicion, val);
							objeto = val;
						}
					});

					if (color == 1) {
						$(objeto).attr({ class: 'marcadoRojo marcado', estado: color });
					} else if (color == 2) {
						$(objeto).attr({ class: 'marcadoAmarillo marcado', estado: color });
					} else if (color == 3) {
						$(objeto)
							.parent()
							.find('.endodoncia')
							.each(function () {
								$(this).attr({ class: 'marcadoNaranja marcado', estado: color });
							});
					} else if (color == 4) {
						$(objeto)
							.parent()
							.find('.ausente')
							.each(function () {
								$(this).attr({ class: 'marcadoTomate marcado', estado: color });
							});
					} else if (color == 5) {
						$(objeto).attr({ class: 'marcadoMarron marcado', estado: color });
					} else if (color == 6) {
						$(objeto)
							.parent()
							.find('.implante')
							.each(function () {
								$(this).attr({ class: 'marcadoMorado marcado', estado: color });
							});
					} else if (color == 7) {
						$(objeto).attr({ class: 'marcadoVerde marcado', estado: color });
					} else if (color == 8) {
						$(objeto)
							.parent()
							.find('.corona')
							.each(function () {
								$(this).attr({ class: 'marcadoAzul marcado', estado: color });
							});
					}
				});
				localStorage.setItem(value.id_pieza_dental, JSON.stringify(datos));
			});
		});
	}
	function allStorage(imagenOdontograma) {
		let s = new FormData();
		s.append('id_paciente', id_paciente);
		s.append('imagen_odontograma', imagenOdontograma);
		var archive = {},
			keys = Object.keys(localStorage),
			i = keys.length;

		while (i--) {
			archive[keys[i]] = JSON.parse(localStorage.getItem(keys[i]));
			s.append(keys[i], JSON.stringify(localStorage.getItem(keys[i])));
		}

		return s;
	}
	//formulario guradar enfermedad
	$('#frm_guardar_enfermedad').on('submit', function (e) {
		e.preventDefault();
		$.ajax({
			type: 'POST',
			url: '/enfermedad/guardar_enfermedad',
			data: $('#frm_guardar_enfermedad').serialize(),
			dataType: 'JSON',
		})
			.done(function (response) {
				if (typeof response.form !== 'undefined') {
					mensajeAlert('warning', response.form, 'Advertencia');
				}

				if (typeof response.exito !== 'undefined') {
					//$('#tbl_tratamiento_enfermedades').DataTable().draw();
					//$('#agregar-enfermedad').modal('hide');
					mensajeAlert('success', response.exito, 'Exito');
					$('#id_enfermedad').val(response.id_enfermedad);
					//limpiarCampos();
				}
			})
			.fail(function (e) {
				mensajeAlert('error', 'Error al registrar/editar la enfermedad', 'Error');
			});
	});
	//formulario de guardar Consulta
	$('#frm_guardar_consulta').on('submit', function (e) {
		e.preventDefault();
		$.ajax({
			type: 'POST',
			url: '/consulta/guardar_consulta',
			data: $('#frm_guardar_consulta').serialize(),
			dataType: 'JSON',
		})
			.done(function (response) {
				if (typeof response.form !== 'undefined') {
					mensajeAlert('warning', response.form, 'Advertencia');
				}

				if (typeof response.exito !== 'undefined') {
					//$('#tbl_tratamiento_consultas').DataTable().draw();
					//$('#agregar-consulta').modal('hide');
					mensajeAlert('success', response.exito, 'Exito');
					$('#id_consulta').val(response.id_consulta);
					//limpiarCampos();
				}
			})
			.fail(function (e) {
				mensajeAlert('error', 'Error al registrar/editar la consulta', 'Error');
			});
	});
	// formulario de guardarexploracion fisica
	$('#frm_guardar_fisico').on('submit', function (e) {
		e.preventDefault();
		$.ajax({
			type: 'POST',
			url: '/fisico/guardar_fisico',
			data: $('#frm_guardar_fisico').serialize(),
			dataType: 'JSON',
		})
			.done(function (response) {
				if (typeof response.form !== 'undefined') {
					mensajeAlert('warning', response.form, 'Advertencia');
				}

				if (typeof response.exito !== 'undefined') {
					//$('#tbl_tratamiento_fisicos').DataTable().draw();
					//$('#agregar-fisico').modal('hide');
					mensajeAlert('success', response.exito, 'Exito');
					$('#id_fisico').val(response.id_fisico);
					//limpiarCampos();
				}
			})
			.fail(function (e) {
				mensajeAlert('error', 'Error al registrar/editar el tratamiento fisico', 'Error');
			});
	});
	//formulario de guardar alergias del paciente
}); //fin principio
