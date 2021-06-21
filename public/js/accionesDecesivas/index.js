$(document).ready(function () {
	// Listado de enfermedades
	$('#tbl_accionesDecesivas').DataTable({
		responsive: true,
		processing: true,
		serverSide: true,
		ajax: '/accionesDecesivas/ajaxListarAcciones_decesivas',
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
	$('#frm_guardar_accionesDecesivas').on('submit', function (e) {
		e.preventDefault();
		$.ajax({
			type: 'POST',
			url: '/accionesDecesivas/guardar_accionesDecesivas',
			data: $('#frm_guardar_accionesDecesivas').serialize(),
			dataType: 'JSON',
		})
			.done(function (response) {
				if (typeof response.form !== 'undefined') {
					mensajeAlert('warning', response.form, 'Advertencia');
				}

				if (typeof response.exito !== 'undefined') {
					$('#tbl_accionesDecesivas').DataTable().draw();
					$('#agregar-accionesDecesivas').modal('hide');
					mensajeAlert('success', response.exito, 'Exito');
					limpiarCampos();
				}
			})
			.fail(function (e) {
				mensajeAlert('error', 'Error al registrar/editar el diagnostico', 'Error');
			});
	});

	// Editar enfermedad
	$('#tbl_accionesDecesivas').on('click', '.btn_editar_accionesDecesivas', function (e) {
		let id = $(this).attr('data');
		$.ajax({
			type: 'POST',
			url: '/accionesDecesivas/editar_accionesDecesivas',
			data: {
				id: id,
			},
			dataType: 'JSON',
		})
			.done(function (response) {
				$('#id').val(response[0]['id_diagnostico']);
				$('#subjetivo').val(response[0]['subjetivo']);
				$('#objetivo').val(response[0]['objetivo']);
				$('#analisis').val(response[0]['objetivo']);
				$('#plan_accion').val(response[0]['plan_accion']);
				$('#id_paciente').val(response[0]['id_paciente']).trigger('change');
				$('#accion').val('up');

				$('#btn-guardar-diagnostico').html('Editar');
				parametrosModal('#agregar-diagnostico', 'Editar diganostico', 'modal-lg', false, true);
			})
			.fail(function (e) {
				$('#agregar-diagnostico').modal('hide');
			});
	});
});