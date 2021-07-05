$(document).ready(function () {
    $("#btn_reporte_odontologo").on('click', function () {
        $("#reporte-title").html("Reporte de Odontólogos");

        $.post(
			"/odontologo/imprimir",
			{},
			function (resp) {
				if (typeof resp.error != "undefined") {
					Swal.fire("Error!", resp.error, "error");
				} else {
					$("#reporte-body").children().remove();
					$("#reporte-body").html(
						'<embed src="data:application/pdf;base64,' +
						resp +
						'#toolbar=1&navpanes=1&scrollbar=1&zoom=67,100,100" type="application/pdf" width="100%" height="600px" style="border: none;"/>'
					);
					$("#reporte").modal({
                        backdrop: "static",
                        keyboard: true,
                    });
				}
			}
		);
       
    });

    $("#btn_reporte_paciente").on('click', function () {
        $("#reporte-title").html("Reporte de Pacientes");

        $.post('/paciente/imprimir', {}, function (resp) {
			if (typeof resp.error != 'undefined') {
				Swal.fire('Error!', resp.error, 'error');
			} else {
				$('#reporte-body').children().remove();
				$('#reporte-body').html('<embed src="data:application/pdf;base64,' + resp + '#toolbar=1&navpanes=1&scrollbar=1&zoom=67,100,100" type="application/pdf" width="100%" height="600px" style="border: none;"/>');
				$("#reporte").modal({
                    backdrop: "static",
                    keyboard: true,
                });
			}
		});
       
    });

    let fecha_inicial = "";
	let fecha_final = "";
    $('#daterange-btn').daterangepicker(
        {
            ranges: {
                'Hoy': [moment(), moment()],
                'Ayer': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Los últimos 7 días': [moment().subtract(6, 'days'), moment()],
                'Los últimos 30 días': [moment().subtract(29, 'days'), moment()],
                'Este mes': [moment().startOf('month'), moment().endOf('month')],
                'El mes pasado': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            },
            startDate: moment().subtract(29, 'days'),
            endDate: moment()
        },
        function (start, end) {
            fecha_inicial = start.format('YYYY-MM-DD');
            fecha_final = end.format('YYYY-MM-DD');
            $('#daterange-btn span').html(start.format('YYYY-MM-DD') + ' hasta ' + end.format('YYYY-MM-DD'))
        }
    );

    $("#btn_cita_medica").on('click', function () {
        $("#reporte-title").html("Reporte de Citas Médicas");
        $.post(
			"/cita/imprimir",
			{fecha_inicial, fecha_final},
			function (resp) {
				if (typeof resp.error != "undefined") {
					Swal.fire("Error!", resp.error, "error");
				} else {
					$("#reporte-body").children().remove();
					$("#reporte-body").html(
						'<embed src="data:application/pdf;base64,' +
						resp +
						'#toolbar=1&navpanes=1&scrollbar=1&zoom=67,100,100" type="application/pdf" width="100%" height="600px" style="border: none;"/>'
					);
					$("#reporte").modal({
						backdrop: "static",
						keyboard: true,
					});
				}
			}
		);
       
    });
    
    $("#btn_historial_odontologico").on('click', function () {
        $("#reporte-title").html("Reporte de Historial Odontólogico");
        $.post(
			"/odontologo/imprimir_historial",
			{fecha_inicial, fecha_final},
			function (resp) {
				if (typeof resp.error != "undefined") {
					Swal.fire("Error!", resp.error, "error");
				} else {
					$("#reporte-body").children().remove();
					$("#reporte-body").html(
						'<embed src="data:application/pdf;base64,' +
						resp +
						'#toolbar=1&navpanes=1&scrollbar=1&zoom=67,100,100" type="application/pdf" width="100%" height="600px" style="border: none;"/>'
					);
					$("#reporte").modal({
						backdrop: "static",
						keyboard: true,
					});
				}
			}
		);
       
    });

});