$(document).ready(function () {
	// Listado de enfermedades
	$('#tbl_tratamiento_enfermedades').DataTable({
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

	// Borrar campos con el boton cerrar
	$('#btn-cerrar').on('click', function () {
		limpiarCampos();
	});

	// Modal para agregar cita
	$('button#agregar_enfermedad').on('click', function (e) {
		$('#btn-guardar-enfermedad').html('Guardar');
		$('#accion').val('in');
		$('#id').val('');

		parametrosModal('#agregar-enfermedad', 'Agregar enfermedad', 'modal-lg', false, true);
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

	// Limpiar Campos
	function limpiarCampos() {
		$('#id').val('');
		$('#tiempo_consulta').val('');
		$('#motivo_consulta').val('');
		$('#sintomas_principales').val('');
		$('#tomando_medicamento').val('');
		$('#nombre_medicamento').val('');
		$('#motivo_medicamento').val('');
		$('#dosis_medicamento').val('');
		$('#accion').val('');
	}

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
});
