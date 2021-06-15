//Traendo tabla de la agenda
$(document).ready(function () {
	$('#calendar').fullCalendar({
		header: {
			left: 'prev,next',
			center: 'title',
			right: 'month,agendaWeek,agendaDay',
		},
		defaultDate: new Date(),
		buttonIcons: true,
		weekNumbers: false,
		eventLimit: true,
		editable: true,
		events: 'cita/getEvents',
		eventColor: 'fuchsia',

		dayClick: function (date, jsEvent, view) {
			alert('Has hecho click en: ' + date.format());
		},
		eventClick: function (calEvent, jsEvent, view) {
			$('#event-title').text(calEvent.title);
			$('#event-description').html(calEvent.description);
			$('#modal-event').modal();
		},
	});

	// tablas estadisticos

	$.get('/home/reporteCitas', function (r) {
		labelsTitle = [];
		dataPendiente = [];
		dataAtendida = [];
		dataCancelada = [];
		$.each(r, function (index, value) {
			labelsTitle.push(index);
			dataPendiente.push(value.PENDIENTE);
			dataAtendida.push(value.ATENDIDA);
			dataCancelada.push(value.CANCELADA);
		});
		var areaChartCanvas = $('#barChart').get(0).getContext('2d');
		var areaChartData = {
			labels: labelsTitle,
			datasets: [
				{
					label: 'PENDIENTE',
					backgroundColor: 'rgba(237, 248, 61)',
					borderColor: 'rgba(237, 248, 61)',
					pointRadius: false,
					pointColor: '#3b8bba',
					pointStrokeColor: 'rgba(60,141,188,1)',
					pointHighlightFill: '#fff',
					pointHighlightStroke: 'rgba(60,141,188,1)',
					data: dataPendiente,
				},
				{
					label: 'ATENDIDA',
					backgroundColor: 'rgba(61, 248, 75)',
					borderColor: 'rgba(61, 248, 75)',
					pointRadius: false,
					pointColor: 'rgba(210, 214, 222, 1)',
					pointStrokeColor: '#c1c7d1',
					pointHighlightFill: '#fff',
					pointHighlightStroke: 'rgba(220,220,220,1)',
					data: dataAtendida,
				},
				{
					label: 'CANCELADA',
					backgroundColor: 'rgba(248, 69, 61 )',
					borderColor: 'rgba(248, 69, 61 )',
					pointRadius: false,
					pointColor: 'rgba(210, 214, 222, 1)',
					pointStrokeColor: '#c1c7d1',
					pointHighlightFill: '#fff',
					pointHighlightStroke: 'rgba(220,220,220,1)',
					data: dataCancelada,
				},
			],
		};

		var areaChartOptions = {
			maintainAspectRatio: false,
			responsive: true,
			legend: {
				display: false,
			},
			scales: {
				xAxes: [
					{
						gridLines: {
							display: false,
						},
					},
				],
				yAxes: [
					{
						gridLines: {
							display: false,
						},
					},
				],
			},
		};

		// This will get the first returned node in the jQuery collection.
		var areaChart = new Chart(areaChartCanvas, {
			type: 'line',
			data: areaChartData,
			options: areaChartOptions,
		});

		//-------------
		//- DONUT CHART -
		var parametroFunciones = [dataAtendida.reduce((a, b) => a + b, 0), dataPendiente.reduce((a, b) => a + b, 0), dataCancelada.reduce((a, b) => a + b, 0)];
		var parametroValores = ['ATENDIDA', 'PENDIENTE', 'CANCELADA'];
		var donutChartCanvas = $('#donutChart').get(0).getContext('2d');
		var donutData = {
			labels: parametroValores,
			datasets: [
				{
					data: parametroFunciones,
					backgroundColor: ['#3DF84B', '#EDF936', '#F8453D'],
				},
			],
		};
		var donutOptions = {
			maintainAspectRatio: false,
			responsive: true,
		};
		//Create pie or douhnut chart
		// You can switch between pie and douhnut using the method below.
		var donutChart = new Chart(donutChartCanvas, {
			type: 'doughnut',
			data: donutData,
			options: donutOptions,
		});

		//-------------
		//- PIE CHART -

		//-------------
		//- BAR CHART -
		var barChartCanvas = $('#barChart').get(0).getContext('2d');
		var barChartData = jQuery.extend(true, {}, areaChartData);
		var temp0 = areaChartData.datasets[0];
		var temp1 = areaChartData.datasets[1];
		barChartData.datasets[0] = temp1;
		barChartData.datasets[1] = temp0;

		var barChartOptions = {
			responsive: true,
			maintainAspectRatio: false,
			datasetFill: false,
		};

		var barChart = new Chart(barChartCanvas, {
			type: 'bar',
			data: barChartData,
			options: barChartOptions,
		});
	});
});
