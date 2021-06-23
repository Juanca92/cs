$(document).ready(function () {
	// Listado de enfermedades
	$('#tbl_medicacion').DataTable({
		responsive: true,
		processing: true,
		serverSide: true,
		ajax: '/medicacion/ajaxListarMedicacion',
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
	$('#frm_guardar_medicacion').on('submit', function (e) {
		e.preventDefault();
		$.ajax({
			type: 'POST',
			url: '/medicacion/guardar_medicacion',
			data: $('#frm_guardar_medicacion').serialize(),
			dataType: 'JSON',
		})
			.done(function (response) {
				if (typeof response.form !== 'undefined') {
					mensajeAlert('warning', response.form, 'Advertencia');
				}

				if (typeof response.exito !== 'undefined') {
					$('#tbl_medicacion').DataTable().draw();
					$('#agregar-medicacion').modal('hide');
					mensajeAlert('success', response.exito, 'Exito');
					limpiarCampos();
				}
			})
			.fail(function (e) {
				mensajeAlert('error', 'Error al registrar/editar el medicacion', 'Error');
			});
	});

	// Editar enfermedad
	$('#tbl_medicacion').on('click', '.btn_editar_medicacion', function (e) {
		let id = $(this).attr('data');
		$.ajax({
			type: 'POST',
			url: '/medicacion/editar_medicacion',
			data: {
				id: id,
			},
			dataType: 'JSON',
		})
			.done(function (response) {
				$('#id').val(response[0]['id_medicacion']);
				$('#entrega_medicamento').val(response[0]['entrega_medicamento']);
				$('#receta_medica').val(response[0]['receta_medica']);
				$('#recomendaciones').val(response[0]['recomendaciones']);
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