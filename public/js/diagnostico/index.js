$(document).ready(function () {
	// Listado de enfermedades
	$('#tbl_diagnostico').DataTable({
		responsive: true,
		processing: true,
		serverSide: true,
		ajax: '/enfermedad/ajaxListarDiagnostico',
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
	$('#frm_guardar_diagnostico').on('submit', function (e) {
		e.preventDefault();
		$.ajax({
			type: 'POST',
			url: '/diagnostico/guardar_diagnostico',
			data: $('#frm_guardar_diagnostico').serialize(),
			dataType: 'JSON',
		})
			.done(function (response) {
				if (typeof response.form !== 'undefined') {
					mensajeAlert('warning', response.form, 'Advertencia');
				}

				if (typeof response.exito !== 'undefined') {
					$('#tbl_diagnostico').DataTable().draw();
					$('#agregar-diagnostico').modal('hide');
					mensajeAlert('success', response.exito, 'Exito');
					limpiarCampos();
				}
			})
			.fail(function (e) {
				mensajeAlert('error', 'Error al registrar/editar el diagnostico', 'Error');
			});
	});

	// Editar enfermedad
	$('#tbl_diagnostico').on('click', '.btn_editar_dignostico', function (e) {
		let id = $(this).attr('data');
		$.ajax({
			type: 'POST',
			url: '/diagnostico/editar_diagnostico',
			data: {
				id: id,
			},
			dataType: 'JSON',
		})
			.done(function (response) {
				$('#id').val(response[0]['id_diagnostico']);
				$('#tipo_diagnostico').val(response[0]['tipo_diagnostico']);
				$('#pieza_dentaria').val(response[0]['pieza_dentaria']);
				$('#medida_preventiva').val(response[0]['medida_preventiva']);
				$('#acciones_curativas').val(response[0]['acciones_curativas']);
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