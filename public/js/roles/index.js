$(document).ready(function () {
	$('#tbl_roles').DataTable({
		responsive: true,
		processing: true,
		serverSide: true,
		ajax: '/roles/ajaxListarRoles',
		language: {
			url: '/plugins/datatables/lang/Spanish.json',
		},
		columnDefs: [
			{
				searchable: false,
				orderable: false,
				visible: true,
				targets: 2,
				data: null,
				render: function (data, type, row, meta) {
					if (data[2] == '1') {
						return '<a type="button" class="btn btn-success btn-xs text-white">ACTIVO</span>';
					} else {
						return '<a type="button" class="btn btn-danger btn-xs text-white">DESACTIVO</span>';
					}
				},
			},

		],
	});

});
