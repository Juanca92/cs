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

		if (id_paciente == null) {
			setInterval(function () {
				window.location = '/';
			}, 1000);

			mensajeAlert('info', 'Por favor seleccione un paciente !!!', 'Informacion');
		}

		$('#content').show();
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
				$('#ci').val(response[0]['ci']);
				$('#expedido').val(response[0]['expedido']);
				$('#nombres').val(response[0]['nombres']);
				$('#paterno').val(response[0]['paterno']);
				$('#materno').val(response[0]['materno']);
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
	$('#tbl_tratamiento_enfermedades').on('click', '.btn_editar_enfermedad', function (e) {
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
<<<<<<< HEAD
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

=======
>>>>>>> 736905ead1e81ea593a479dd4b00b8bec256ff94
	// Mostrar alergias al hacer click en ver tratamientos
}); //fin principio
