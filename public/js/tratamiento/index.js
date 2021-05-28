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
				targets: 1,
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
				targets: 5,
			},
			{
				searchable: true,
				orderable: true,
				visible: false,
				targets: 7,
			},
			{
				searchable: false,
				orderable: false,
				visible: true,
				targets: 10,
				data: null,
				render: function (data, type, row, meta) {
					if (data[10] == 'ACTIVO') {
						return '<a type="button" data="' + data[0] + '" class="btn btn-success btn-xs text-white">' + data[10] + ' </span>';
					} else {
						return '<a type="button" data="' + data[0] + '" class="btn btn-danger btn-xs text-white">' + data[10] + ' </span>';
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
					return '<div class="btn-group" role="group">' + '<a data="' + data[0] + '" class="btn btn-success btn-xs mdi mdi-tooltip-edit text-white btn_ver_tratamientos" data-toggle="tooltip" title="Ver Tramatientos del Paciente">' + '<i class="fa fa-eye"></i> ver tratamientos</a>' + '</div>';
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
		$("#id").val(id_paciente);

		if (id_paciente == null) {
			setInterval(function () {
				window.location = '/';
			}, 1000);

			mensajeAlert('info', 'Por favor seleccione un paciente !!!', 'Informacion');
		}

		$('#content').show();
		recuperarOdontograma();
	});
	// datos del Paciente
	$('#tbl_pacientes_ver').on('click', '.btn_ver_tratamientos', function (e) {
		let id = $(this).attr('data');
		$.ajax({
			type: 'POST',
			url: '/paciente/editar_paciente',
			data: {
				id: id,
			},
			dataType: 'JSON',
		})
			.done(function (response) {
				$('#id').val(response[0]['id_persona']);
				$('#foto').val(response[0]['foto']);
				$('#ci').val(response[0]['ci']);
				$('#expedido').val(response[0]['expedido']);
				$('#nombres').val(response[0]['nombres']);
				$('#paterno').val(response[0]['paterno']);
				$('#materno').val(response[0]['materno']);
				$('#sexo').val(response[0]['sexo']);
				$('#lugar_nacimiento').val(response[0]['lugar_nacimiento']);
				$('#celular').val(response[0]['telefono_celular']);
				$('#fecha_nacimiento').val(response[0]['fecha_nacimiento']);
				$('#id_ocupacion').val(response[0]['id_ocupacion']).trigger('change');
				$('#domicilio').val(response[0]['domicilio']);
				$('#estatus').val(response[0]['estatus']);
				$('#accion').val('up');

				$('#btn-guardar-paciente').html('Editar');
				parametrosModal('#agregar-paciente', 'Editar Paciente', 'modal-lg', false, true);
			})
			.fail(function (e) {
				$('#agregar-paciente').modal('hide');
			});
	});
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

	//datos del usuario o paciente
	$('#tbl_pacientes_ver').on('click', '.btn_ver_tratamientos', function (e) {
		let id = $(this).attr('data');
		$.ajax({
			type: 'POST',
			url: '/paciente/editar_paciente',
			data: {
				id: id,
			},
			dataType: 'JSON',
		}).done(function (response) {
			if (response[0]['foto'] != null) {
				$('#foto').attr('src', response[0]['foto']);
			}
			$('#nombre_completo').html(response[0]['nombre_completo']);
			$('#telefono_celular').html(response[0]['telefono_celular']);
			$('#domicilio').html(response[0]['domicilio']);
			$('#fecha_nacimiento').html(response[0]['fecha_nacimiento']);
		});
	});

	// traendo la tabla de enfermedad actual


	
	// Editar enfermedad
	$(document).ready(function () {
		//Id de enfermedad para el tratamiento
		let id_enfermedad = null;
		$('#content').hide();
		// Listado de enfermedades
		$('#tbl_tratamiento_enfermedade_ver').DataTable({
			responsive: true,
			processing: true,
			serverSide: true,
			ajax: '/enfermedad/ajaxListarEnfermedad',
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
					searchable: false,
					orderable: false,
					targets: -1,
					data: null,
					render: function (data, type, row, meta) {
						return '<div class="btn-group" role="group">' + '<a data="' + data[0] + '" class="btn btn-warning btn-sm mdi mdi-tooltip-edit text-black btn_editar_enfermedad" data-toggle="tooltip" title="Editar">' + '<i class="fa fa-pen">Editar</i></a>' + '</div>';
					},
				},
			],
		});


		// Habilitar el fomulario de ver los detalles de tratamiento, exploracion fisica
	$('#tbl_tratamiento_enfermedad_ver').on('click', '.btn_ver_tratamientos', function (e) {
		//ocultar el modal
		$('#listado-enfermedad').modal('hide');
		let id = $(this).attr('data');
		id_enfermedad = id;

		if (id_enfermedad == null) {
			setInterval(function () {
				window.location = '/';
			}, 1000);

			mensajeAlert('info', 'Por favor seleccione un paciente !!!', 'Informacion');
		}

		$('#content').show();
		recuperarOdontograma();
	});


	// capturando el id al Editar enfermedad
	$('#tbl_tratamiento_enfermedades_ver').on('click', '.btn_ver_tratamientos', function (e) {
		let id = $(this).attr('data');
		$.ajax({
			type: 'POST',
			url: '/enfermedad/editar_enfermedad',
			data: {
				id: id,
			},
			dataType: 'JSON',
		})
			.done(function (response) {
				$('#id').val(response[0]['id_enfermedad']);
				$('#tiempo_consulta').val(response[0]['tiempo_consulta']);
				$('#motivo_consulta').val(response[0]['motivo_consulta']);
				$('#sintomas_principales').val(response[0]['sintomas_principales']);
				$('#tomando_medicamento').val(response[0]['tomando_medicamento']);
				$('#nombre_medicamento').val(response[0]['nombre_medicamento']);
				$('#motivo_medicamento').val(response[0]['motivo_medicamento']);
				$('#dosis_medicamento').val(response[0]['dosis_medicamento']);
				$('#accion').val('up');

				$('#btn-guardar-enfermedad').html('Editar');
				parametrosModal('#agregar-enfermedad', 'Editar enfermedad', 'modal-lg', false, true);
			})
			.fail(function (e) {
				$('#agregar-enfermedad').modal('hide');
			});
	});
	// Guardar enfermedad
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
					$('#tbl_tratamiento_enfermedades').DataTable().draw();
					$('#agregar-enfermedad').modal('hide');
					mensajeAlert('success', response.exito, 'Exito');
					limpiarCampos();
				}
			})
			.fail(function (e) {
				mensajeAlert('error', 'Error al registrar/editar la enfermedad', 'Error');
			});
	});
});
	

	// Mostrar alergias al hacer click en ver tratamientos
	// traendo tabla de alergias
$(document).ready(function () {
	let id_alergia = null;
	$('#content').hide();
	// Listado de alergias
	$('#tbl_tratamiento_alergias_ver').DataTable({
		responsive: true,
		processing: true,
		serverSide: true,
		ajax: '/alergia/ajaxListarAlergias',
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
					return '<div class="btn-group" role="group">' + 
					'<a data="' + data[0] + 
					'" class="btn btn-warning btn-sm mdi mdi-tooltip-edit text-white btn_editar_alergia" data-toggle="tooltip" title="Editar">' + 
					'<i class="fa fa-pen"></i></a>' + 
					'<a data="' + data[0] + 
					'" class="btn btn-danger btn-sm mdi mdi-delete-forever text-white btn_eliminar_alergia" data-toggle="tooltip" title="Eliminar">' + 
					'<i class="fa fa-trash"></i></a>' + '</div>';
				},
			},
		],
	});
	// Habilitar el fomulario de ver los detalles de tratamiento, exploracion fisica
	$('#tbl_tratamiento_alergias_ver').on('click', '.btn_ver_tratamientos', function (e) {
		//ocultar el modal
		$('#listado-enfermedad').modal('hide');
		let id = $(this).attr('data');
		id_alergia = id;

		if (id_alergia == null) {
			setInterval(function () {
				window.location = '/';
			}, 1000);

			mensajeAlert('info', 'Por favor seleccione un paciente !!!', 'Informacion');
		}

		$('#content').show();
	});

	// Modal para agregar alergias
	$('button#agregar_alergia').on('click', function (e) {
		$('#btn-guardar-alergia').html('Guardar');
		$('#accion').val('in');

		parametrosModal('#agregar-alergia', 'Agregar Alergias', 'modal-lg', false, true);
	});
	// Guardar alergias
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
					limpiarCampos();
				}
			})
			.fail(function (e) {
				mensajeAlert('error', 'Error al registrar/editar las alergias', 'Error');
			});
	});
	// Limpiar Campos
	function limpiarCampos() {
		$('#id').val('');
		$('#nombre_alergia').val('');
		$('#detalle').val('');
		$('#accion').val('');
	}

	// Editar alergias
	$('#tbl_tratamiento_alergias').on('click', '.btn_ver_tratamientos', function (e) {
		let id = $(this).attr('data');
		$.ajax({
			type: 'POST',
			url: '/alergia/editar_alergia',
			data: {
				id: id,
			},
			dataType: 'JSON',
		})
			.done(function (response) {
				$('#id').val(response[0]['id_alergia']);
				$('#nombre_alergia').val(response[0]['nombre_alergia']);
				$('#detalle').val(response[0]['detalle']);
				$('#accion').val('up');

				$('#btn-guardar-alergia').html('Editar');
				parametrosModal('#agregar-alergia', 'Editar alergia', 'modal-lg', false, true);
			})
			.fail(function (e) {
				$('#agregar-alergia').modal('hide');
			});
	});

	// Eliminar alergias
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
}); 

	//odontograma
	$('#guardar-odontograma').on('click', function () {
		$.ajax({
			type: 'post',
			data: allStorage(),
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
	function allStorage() {
		let s = new FormData();
		s.append('id_paciente', id_paciente);
		var archive = {},
			keys = Object.keys(localStorage),
			i = keys.length;

		while (i--) {
			archive[keys[i]] = JSON.parse(localStorage.getItem(keys[i]));
			s.append(keys[i], JSON.stringify(localStorage.getItem(keys[i])));
		}

		return s;
	}

}); //fin principio
