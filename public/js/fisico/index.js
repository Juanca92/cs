$(document).ready(function () {
	// Listado de enfermedades
	$('#tbl_tratamiento_fisicos').DataTable({
		responsive: true,
		processing: true,
		serverSide: true,
		ajax: '/fisico/ajaxListarFisico',
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
					return '<div class="btn-group" role="group">' + '<a data="' + data[0] + '" class="btn btn-warning btn-sm mdi mdi-tooltip-edit text-black btn_editar_fisico" data-toggle="tooltip" title="Editar">' + '<i class="fa fa-pen">Editar</i></a>' + '</div>';
				},
			},
		],
	});

	// Borrar campos con el boton cerrar
	$('#btn-cerrar').on('click', function () {
		limpiarCampos();
	});

	// Modal para agregar tratamiento fisico
	$('button#agregar_fisico').on('click', function (e) {
		$('#btn-guardar-fisico').html('Guardar');
		$('#accion').val('in');
		$('#id').val('');

		parametrosModal('#agregar-fisico', 'Agregar fisico', 'modal-lg', false, true);
	});

	// Guardar tratamiento fisico
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
					$('#tbl_tratamiento_fisicos').DataTable().draw();
					$('#agregar-fisico').modal('hide');
					mensajeAlert('success', response.exito, 'Exito');
					limpiarCampos();
				}
			})
			.fail(function (e) {
				mensajeAlert('error', 'Error al registrar/editar el tratamiento fisico', 'Error');
			});
	});

	// Limpiar Campos
	function limpiarCampos() {
		$('#id').val('');
		$('#presion_arterial').val('');
		$('#pulso').val('');
		$('#temperatura').val('');
		$('#frecuencia_cardiaca').val('');
		$('#frecuencia_respiratoria').val('');
		$('#peso').val('');
		$('#talla').val('');
		$('#masa_corporal').val('');
		$('#accion').val('');
	}

	// Editar tratamiento fisico
	$('#tbl_tratamiento_fisicos').on('click', '.btn_editar_fisico', function (e) {
		let id = $(this).attr('data');
		$.ajax({
			type: 'POST',
			url: '/fisico/editar_fisico',
			data: {
				id: id,
			},
			dataType: 'JSON',
		})
			.done(function (response) {
				$('#id').val(response[0]['id_fisico']);
				$('#presion_arterial').val(response[0]['presion_arterial']);
				$('#pulso').val(response[0]['pulso']);
				$('#temperatura').val(response[0]['temperatura']);
				$('#frecuencia_cardiaca').val(response[0]['frecuencia_cardiaca']);
				$('#frecuencia_respiratoria').val(response[0]['frecuencia_respiratoria']);
				$('#peso').val(response[0]['peso']);
				$('#talla').val(response[0]['talla']);
				$('#masa_corporal').val(response[0]['masa_corporal']);
				$('#accion').val('up');

				$('#btn-guardar-fisico').html('Editar');
				parametrosModal('#agregar-fisico', 'Editar fisico', 'modal-lg', false, true);
			})
			.fail(function (e) {
				$('#agregar-fisico').modal('hide');
			});
	});
});
