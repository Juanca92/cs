$(document).ready(function () {
	// Listado de odontologos
	$('#tbl_odontologos').DataTable({
		responsive: true,
		processing: true,
		serverSide: true,
		ajax: '/odontologo/ajaxListarOdontologos',
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
				searchable: true,
				orderable: true,
				visible: false,
				targets: 9,
			},
			{
				searchable: false,
				orderable: false,
				visible: true,
				targets: 8,
				data: null,
				render: function (data, type, row, meta) {
					if (data[8] == 'ACTIVO') {
						return '<a type="button" data="' + data[0] + '" class="btn btn-success btn-xs text-white">' + data[8] + ' </span>';
					} else {
						return '<a type="button" data="' + data[0] + '" class="btn btn-danger btn-xs text-white">' + data[8] + ' </span>';
					}
				},
			},
			{
				searchable: false,
				orderable: false,
				targets: -1,
				data: null,
				render: function (data, type, row, meta) {
					return (
					'<div class="btn-group" role="group">' + 
					'<a data="' + data[0] + 
					'" class="btn btn-warning btn-sm mdi mdi-tooltip-edit text-white btn_editar_odontologo" data-toggle="tooltip" title="Editar">' + 
					'<i class="fa fa-pen"></i></a>' + 
					'<a data="' +
                    data[0] +
                    '" class="btn btn-danger btn-sm mdi mdi-delete-forever text-white btn_eliminar_odontologo" data-toggle="tooltip" title="Eliminar">' +
                    '<i class="fa fa-trash"></i></a>' +
                    '</div>'
					);
				},
			},
		],
	});

	// Modal para agregar odontologo
	$('button#agregar_odontologo').on('click', function (e) {
		$('#btn-guardar-odontologo').html('Guardar');
		$('#accion').val('in');

		parametrosModal('#agregar-odontologo', 'Agregar Odont\u00F3logo', 'modal-lg', false, true);
	});

	// Turno
	$('.select2bs4').select2({
		theme: 'bootstrap4',
	});

	// Guardar odontologo
	$('#frm_guardar_odontologo').on('submit', function (e) {
		e.preventDefault();
		$.ajax({
			type: 'POST',
			url: '/odontologo/guardar_odontologo',
			data: $('#frm_guardar_odontologo').serialize(),
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
					$('#tbl_odontologos').DataTable().draw();
					$('#agregar-odontologo').modal('hide');
					mensajeAlert('success', response.exito, 'Exito');
					limpiarCampos();
				}
			})
			.fail(function (e) {
				mensajeAlert('error', 'Error al registrar/editar el Odontologo', 'Error');
			});
	});

	// Limpiar Campos
	function limpiarCampos() {
		$('#id').val('');
		$('#ci').val('');
		$('#expedido').val('');
		$('#nombres').val('');
		$('#paterno').val('');
		$('#materno').val('');
		$('#celular').val('');
		$('#fecha_nacimiento').val('');
		$('#turno').val('');
		$('#gestion').val('');
		$('#domicilio').val('');
		$('#estatus').val('');
		$('#accion').val('');
	}

	// Editar Odontologo
	$('#tbl_odontologos').on('click', '.btn_editar_odontologo', function (e) {
		let id = $(this).attr('data');
		$.ajax({
			type: 'POST',
			url: '/odontologo/editar_odontologo',
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
				$('#turno').val(response[0]['turno']).trigger('change');
				$('#gestion').val(response[0]['gestion_ingreso']);
				$('#domicilio').val(response[0]['domicilio']);
				$('#estatus').val(response[0]['estatus']);
				$('#accion').val('up');
				$('#btn-guardar-odontologo').html('Editar');
				parametrosModal('#agregar-odontologo', 'Editar Odont\u00F3logo', 'modal-lg', false, true);
			})
			.fail(function (e) {
				$('#agregar-odontologo').modal('hide');
			});
	});
	// Eliminar Odontologo
	$('#tbl_odontologos').on('click', '.btn_eliminar_odontologo', function (e) {
		let id = $(this).attr('data');
		bootbox.confirm('¿Estas seguro de eliminar al Odont\u00F3logo?', function (result) {
			if (result) {
				$.ajax({
					type: 'POST',
					url: '/odontologo/eliminar_odontologo',
					data: {
						id: id,
					},
					dataType: 'JSON',
				})
					.done(function (response) {
						if (typeof response.exito !== 'undefined') {
							$('#tbl_odontologos').DataTable().draw();
							mensajeAlert('success', response.exito, 'Exito');
						}
					})
					.fail(function (e) {
						mensajeAlert('error', 'Error al procesar la peticion', 'Error');
					});
			}
		});
	});

	// Borrar campos con el boton cerrar
	$('#btn-cerrar').on('click', function () {
		limpiarCampos();
	});

	//datepicker
	$.datepicker.regional['es'] = {
		monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
		monthNamesShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
		dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
		dayNamesShort: ['Dom', 'Lun', 'Mar', 'Mié', 'Juv', 'Vie', 'Sáb'],
		dayNamesMin: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sá'],
		weekHeader: 'Sm',
		dateFormat: 'yy-mm-dd',
		firstDay: 1,
		isRTL: false,
		showMonthAfterYear: false,
		yearSuffix: '',
	};
	$.datepicker.setDefaults($.datepicker.regional['es']);

	$('#fecha_nacimiento').datepicker({
		changeMonth: true,
		changeYear: true,
		yearRange: '-100:+0',
		dateFormat: 'yy-mm-dd',
	});

	// Imprimir Odontologos
	$("#imprimir_odontologo").on("click", function(e){
		$.post(
			"/odontologo/imprimir",
			{},
			function (resp) {
				if (typeof resp.error != "undefined") {
					Swal.fire("Error!", resp.error, "error");
				} else {
					$("#modal-body-odontologo").children().remove();
					$("#modal-body-odontologo").html(
						'<embed src="data:application/pdf;base64,' +
						resp +
						'#toolbar=1&navpanes=1&scrollbar=1&zoom=67,100,100" type="application/pdf" width="100%" height="600px" style="border: none;"/>'
					);
					$("#modal_imprimir_odontologo").modal({
						backdrop: "static",
						keyboard: true,
					});
				}
			}
		);
	});
});
