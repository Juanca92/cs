$(document).ready(function () {
	// Listado de pacientes
	$('#tbl_pacientes').DataTable({
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
				visible: true,
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
				targets: 11,
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
					return(
					'<div class="btn-group" role="group">' + 
					'<a data="' + data[0] + 
					'" class="btn btn-warning btn-sm mdi mdi-tooltip-edit text-black btn_editar_paciente" data-toggle="tooltip" title="Editar">' + 
					'<i class="fa fa-pen">Editar</i></a>' + 
					'<a data="' +
                    data[0] +
                    '" class="btn btn-danger btn-sm mdi mdi-delete-forever text-white btn_eliminar_paciente" data-toggle="tooltip" title="Eliminar">' +
                    '<i class="fa fa-trash"></i></a>' +
                    '</div>'
					);
				},
			},
		],
	});

	// Ocupacion con select 2
	$('.select2bs4').select2({
		theme: 'bootstrap4',
		placeholder: '-- Seleccione Ocupacion --',
		allowClear: true,
	});

	// Modal para agregar paciente
	$('button#agregar_paciente').on('click', function (e) {
		$('#btn-guardar-paciente').html('Guardar');
		$('#accion').val('in');

		// $("#ci").prop( "disabled", false );
		// $("#expedido").prop( "disabled", false );

		parametrosModal('#agregar-paciente', 'Agregar Paciente', 'modal-lg', false, true);
	});

	// Guardar Paciente
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


	//checked de genero o sexo
	

	// Limpiar Campos
	function limpiarCampos() {
		$('#id').val('');
		$('#foto').val('');
		$('#ci').val('');
		$('#expedido').val('');
		$('#nombres').val('');
		$('#paterno').val('');
		$('#materno').val('');
		$('#sexo').val('');
		$('#lugar_nacimiento').val('');
		$('#celular').val('');
		$('#fecha_nacimiento').val('');
		$('#id_ocupacion').val('');
		$('#domicilio').val('');
		$('#estatus').val('');
		$('#accion').val('');
	}

	// Editar Paciente
	$('#tbl_pacientes').on('click', '.btn_editar_paciente', function (e) {
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
	$(document).ready(function(){
		$("#sexo").attr("checked","checked");
	  })

	// Eliminar Paciente
	$('#tbl_pacientes').on('click', '.btn_eliminar_paciente', function (e) {
		let id = $(this).attr('data');
		bootbox.confirm('¿Estas seguro de eliminar al paciente?', function (result) {
			if (result) {
				$.ajax({
					type: 'POST',
					url: '/paciente/eliminar_paciente',
					data: {
						id: id,
					},
					dataType: 'JSON',
				})
					.done(function (response) {
						if (typeof response.exito !== 'undefined') {
							$('#tbl_pacientes').DataTable().draw();
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





	// Cargando la foto subida
	$('#foto').change(function () {
		var imagen = this.files[0];
		// se valida el formato de la imagen png y jpeg
		if (imagen['type'] != 'image/jpeg' && imagen['type'] != 'image/png') {
			$('#foto').val('');
			mensajeAlert('error', '¡La imagen debe estar en formato JPG o PNG!', 'Error al subir la imagen');
		} else if (imagen['size'] > 2000000) {
			$('#foto').val('');
			mensajeAlert('error', '¡La imagen no debe pesar más de 2MB!', 'Error al subir la imagen');
		} else {
			var datosImagen = new FileReader();
			datosImagen.readAsDataURL(imagen);

			$(datosImagen).on('load', function (event) {
				var rutaImagen = event.target.result;
				$('.previsualizar').attr('src', rutaImagen);
			});
		}
	});

	// Guardar foto
	$('#foto').on('submit', function (e) {
		e.preventDefault();
		let formData = new FormData($('#foto')[0]);

		$.ajax({
			type: 'POST',
			url: '/paciente/subir_foto',
			data: formData,
			cache: false,
			contentType: false,
			processData: false,
			dataType: 'JSON',
		}).done(function (response) {
			if (typeof response.warn !== 'undefined') {
				mensajeAlert('warning', response.warn, 'Advertencia');
				$('#foto').val('');
			}

			if (typeof response.success !== 'undefined') {
				mensajeAlert('success', response.success, 'Exito');
				cargar_datos();
			}

			if (typeof response.error !== 'undefined') {
				mensajeAlert('error', response.error, 'Error');
			}
		});
	});
});
