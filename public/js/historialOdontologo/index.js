$(document).ready(function () {
	//Id del odontlo}go para el listado
	let id_odontologo = null;
	$('#content').hide();

	// Listado de pacientes para ver en el modal
	$('#tbl_odontologos_ver').DataTable({
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
				targets: 5,
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
					return '<div class="btn-group" role="group">' + '<a data="' + data[0] + '" class="btn btn-success btn-xs mdi mdi-tooltip-edit text-white btn_ver_pacientes" data-toggle="tooltip" title="Ver odontologos del C.S.">' + '<i class="fa fa-eye"></i> ver pacientes</a>' + '</div>';
				},
			},
		],
	});

	// Mostrar el modal con los odontologos
	$('#listado-odontologo-title').html('Listado de Odontologos');
	parametrosModal('#listado-odontologos', 'Listado de Odontologos', 'modal-lg', false, true);

	// Habilitar el fomulario de ver los detalles del listado
	$('#tbl_odontologos_ver').on('click', '.btn_ver_pacientes', function (e) {
		//ocultar el modal
		$('#listado-odontologos').modal('hide');
		let id = $(this).attr('data');
		id_odontologo = id;

		if (id_odontologo == null) {
			setInterval(function () {
				window.location = '/';
			}, 1000);

			mensajeAlert('info', 'Por favor seleccione un odontologo !!!', 'Informacion');
		} else {
			//Id del odontlo}go para el listado
			let id_cita = null;
			$('#content').hide();
			$('#tbl_citas_ver').DataTable({
				responsive: true,
				processing: true,
				serverSide: true,
				ajax: '/historialOdontologo/ajaxListarCitas/?id_odontologo=' + id_odontologo,
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
							$('#nombre-odontologo').html(`Pacientes atendidos por el odontologo <b>${data[9]}</b>`);
							if (data[10] == 'PENDIENTE') {
								return '<a type="button" data="' + data[0] + '" class="btn btn-info btn-xs text-white">' + data[10] + ' </span>';
							} else if (data[10] == 'CANCELADA') {
								return '<a type="button" data="' + data[0] + '" class="btn btn-danger btn-xs text-white">' + data[10] + ' </span>';
							} else {
								return '<a type="button" data="' + data[0] + '" class="btn btn-success btn-xs text-white">' + data[10] + ' </span>';
							}
						},
					},
				],
			});
		}

		$('#content').show();
	});
});
