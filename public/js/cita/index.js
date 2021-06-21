$(document).ready(function () {
	// Listado de citas
	$('#tbl_citas').DataTable({
		responsive: true,
		processing: true,
		serverSide: true,
		ajax: '/cita/ajaxListarCitas',
		language: {
			url: '/plugins/datatables/lang/Spanish.json',
		},
		columnDefs: [
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
				targets: 10,
			},
			{
				searchable: true,
				orderable: true,
				visible: false,
				targets: 11,
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
					'" class="btn btn-warning btn-sm mdi mdi-tooltip-edit text-white btn_editar_cita" data-toggle="tooltip" title="Editar">' + 
					'<i class="fa fa-pen"></i></a>' + 
					'<a data="' +
                    data[0] +
                    '" class="btn btn-danger btn-sm mdi mdi-delete-forever text-white btn_eliminar_cita" data-toggle="tooltip" title="Eliminar">' +
                    '<i class="fa fa-trash"></i></a>' +
                    '</div>'
					);
				},
			},
		],
	});

	// Borrar campos con el boton cerrar
	$('#btn-cerrar').on('click', function () {
		limpiarCampos();
	});

	// paciente con select 2
	$('.id_paciente').select2({
		theme: 'bootstrap4',
		placeholder: '-- Seleccione Paciente --',
		allowClear: true,
	});
	// Odontologo con select 2
	$('.id_odontologo').select2({
		theme: 'bootstrap4',
		placeholder: '-- Seleccione Odontologo --',
		allowClear: true,
	});

	// Modal para agregar cita
	$('button#agregar_cita').on('click', function (e) {
		$('#btn-guardar-cita').html('Guardar');
		$('#accion').val('in');
		$('#id').val('');

		parametrosModal('#agregar-cita', 'Agregar Cita', 'modal-lg', false, true);
	});

	// Activar o desactivar el atributo del campo costo disabled
	$('#tipo_atencion').change(function () {
		if ($('#tipo_atencion').val() == 'Gratuito') {
			$('#costo').attr('disabled', 'disabled');
		} else {
			$('#costo').removeAttr('disabled');
		}
	});

	// Modal para agenda
	$('button#agenda_cita').on('click', function (e) {
		parametrosModal('#agenda', 'Agenda de Citas', 'modal-xl', false, true);
	});
	//Modal para Horario
	$('button#horario_cita').on('click', function (e) {
		parametrosModal('#horario', 'Horario de Citas', 'modal-xl', false, true);
	});

	// Guardar cita
	$('#frm_guardar_cita').on('submit', function (e) {
		e.preventDefault();
		$.ajax({
			type: 'POST',
			url: '/cita/guardar_cita',
			data: $('#frm_guardar_cita').serialize(),
			dataType: 'JSON',
		})
			.done(function (response) {
				if (typeof response.form !== 'undefined') {
					mensajeAlert('warning', response.form, 'Advertencia');
				}

				if (typeof response.exito !== 'undefined') {
					$('#tbl_citas').DataTable().draw();
					$('#agregar-cita').modal('hide');
					mensajeAlert('success', response.exito, 'Exito');
					limpiarCampos();
				}
			})
			.fail(function (e) {
				mensajeAlert('error', 'Error al registrar/editar el Cita', 'Error');
			});
	});

	// Limpiar Campos
	function limpiarCampos() {
		$('#id').val('');
		$('#numero_cita').val('');
		$('#tipo_tratamiento').val('');
		$('#fecha').val('');
		$('#hora_inicio').val('');
		$('#hora_final').val('');
		$('#costo').val('');
		$('#id_paciente').val('').trigger('change');
		$('#id_odontologo').val('').trigger('change');
		$('#observacion').val('');
		$('#accion').val('');
	}

	// Editar Cita
	$('#tbl_citas').on('click', '.btn_editar_cita', function (e) {
		let id = $(this).attr('data');
		$.ajax({
			type: 'POST',
			url: '/cita/editar_cita',
			data: {
				id: id,
			},
			dataType: 'JSON',
		})
			.done(function (response) {
				$('#id').val(response[0]['id_cita']);
				$('#numero_cita').val(response[0]['numero_cita']);
				$('#tipo_tratamiento').val(response[0]['tipo_tratamiento']);
				$('#fecha').val(response[0]['fecha']);
				$('#hora_inicio').val(response[0]['hora_inicio']);
				$('#hora_final').val(response[0]['hora_final']);
				if (response[0]['costo'] == '') {
					$('#tipo_atencion').val('Gratuito');
					$('#costo').attr('disabled', 'disabled');
				} else {
					$('#costo').val(response[0]['costo']);
				}

				$('#id_paciente').val(response[0]['id_paciente']).trigger('change');
				$('#id_odontologo').val(response[0]['id_odontologo']).trigger('change');
				$('#observacion').val(response[0]['observacion']);
				$('#accion').val('up');

				$('#btn-guardar-cita').html('Editar');
				parametrosModal('#agregar-cita', 'Editar Cita', 'modal-lg', false, true);
			})
			.fail(function (e) {
				$('#agregar-cita').modal('hide');
			});
	});

	// Eliminar cita
	$('#tbl_citas').on('click', '.btn_eliminar_cita', function (e) {
		let id = $(this).attr('data');
		bootbox.confirm('¿Estas seguro de eliminar al cita?', function (result) {
			if (result) {
				$.ajax({
					type: 'POST',
					url: '/cita/eliminar_cita',
					data: {
						id: id,
					},
					dataType: 'JSON',
				})
					.done(function (response) {
						if (typeof response.exito !== 'undefined') {
							$('#tbl_citas').DataTable().draw();
							mensajeAlert('success', response.exito, 'Exito');
						}
					})
					.fail(function (e) {
						mensajeAlert('error', 'Error al procesar la peticion', 'Error');
					});
			}
		});
	});

	//clockpiker inicio
	$('#hora_inicio').clockpicker({});
	//clockpicker final
	$('#hora_final').clockpicker({});

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
	$(function () {
		$('#fecha').datepicker({
			dateFormat: 'yy-mm-dd',
		});
	});

	//agenda
	$(document).ready(function () {
		$('#calendar_fecha').fullCalendar({
			locale: 'es',
			header: {
				left: 'prev,next',
				center: 'title',
				right: 'month,agendaWeek,agendaDay',
			},
			defaultDate: new Date(),
			buttonIcons: true,
			description: true,
			eventLimit: true,
			events: 'cita/getEvents',
			eventColor: 'lime',
			timeFormat: 'H:mm',

			dayClick: function (date, jsEvent, view) {
				alert('Has hecho click en: ' + date.format());
			},
			eventClick: function (calEvent, time, jsEvent, view) {
				$('#event-title').text(calEvent.title);
				$('#event-description').html(calEvent.description);
				$('#event-start').text(calEvent.start);
				$('#event-doctor').text(calEvent.doctor);
				$('#modal-event').modal();
			},
			
		});
	});

	$('button#modal-event').on('click', function (e) {
		parametrosModal('#agenda', 'Agenda de Citas', 'modal-lg', false, true);
	});
	//hora

	//incremento de numero en cita
	$('#id_paciente').on('change', function () {
		let id = $('#id_paciente').val();

		$.ajax({
			type: 'POST',
			url: '/cita/verificar_numero_cita',
			data: { id: id },
			dataType: 'JSON',
		})
			.done(function (respuesta) {
				//console.log(respuesta);
				$('#numero_cita').val(respuesta.numero_cita);
				// alert("falkdfjaslkfdjsalk")
			})
			.fail(function (e) {});
	});
	//tabla horario

	$('#calendar_hora').fullCalendar({
		defaultView: 'agendaWeek',
		lang: 'es',
		weekends: true,
		columnFormat: 'dddd',
		//dayNames: ['Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado', 'Domingo'],
		header: {
			left: 'prev,next today',
			center: 'title',
			right: '',
		},
		defaultDate: new Date(),
		editable: false,
		eventLimit: false,
		weekend: true,
		allDaySlot: false,
		nametime: 'Hora',
		minTime: '08:00',
		maxTime: '18:30',
		timeFormat: 'H:mm',
		eventOverlap: true,
		slotLabelFormat: 'H:mm',
		slotEventOverlap: true,
		events: 'cita/getEvents',
	});
}); //fin del principio
