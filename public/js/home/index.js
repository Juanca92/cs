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
});

// tablas estadisticos 



$(function () {


  
  
  var areaChartCanvas = $('#barChart').get(0).getContext('2d')

  var areaChartData = {
    labels  : ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio','Agosto',
              'Septiembre', 'Octubre','Nobiembre','Diciembre'],
    datasets: [
      {
        label               : 'Pendientes',
        backgroundColor     : 'rgba(237, 248, 61)',
        borderColor         : 'rgba(237, 248, 61)',
        pointRadius          : false,
        pointColor          : '#3b8bba',
        pointStrokeColor    : 'rgba(60,141,188,1)',
        pointHighlightFill  : '#fff',
        pointHighlightStroke: 'rgba(60,141,188,1)',
        data                : [28, 48, 40, 19, 86, 27, 90, 20, 30, 5, 25, 0]
      },
      {
        label               : 'atendidos',
        backgroundColor     : 'rgba(61, 248, 75)',
        borderColor         : 'rgba(61, 248, 75)',
        pointRadius         : false,
        pointColor          : 'rgba(210, 214, 222, 1)',
        pointStrokeColor    : '#c1c7d1',
        pointHighlightFill  : '#fff',
        pointHighlightStroke: 'rgba(220,220,220,1)',
        data                : [65, 59, 80, 81, 56, 55, 40, 26, 23, 20, 15, 10,]
      },
      {
        label               : 'Cancelados',
        backgroundColor     : 'rgba(248, 69, 61 )',
        borderColor         : 'rgba(248, 69, 61 )',
        pointRadius         : false,
        pointColor          : 'rgba(210, 214, 222, 1)',
        pointStrokeColor    : '#c1c7d1',
        pointHighlightFill  : '#fff',
        pointHighlightStroke: 'rgba(220,220,220,1)',
        data                : [65, 59, 80, 81, 56, 55, 40, 0, 10, 5, 2, 1]
      },
    ]
  }

  var areaChartOptions = {
    maintainAspectRatio : false,
    responsive : true,
    legend: {
      display: false
    },
    scales: {
      xAxes: [{
        gridLines : {
          display : false,
        }
      }],
      yAxes: [{
        gridLines : {
          display : false,
        }
      }]
    }
  }

  // This will get the first returned node in the jQuery collection.
  var areaChart       = new Chart(areaChartCanvas, { 
    type: 'line',
    data: areaChartData, 
    options: areaChartOptions
  })

  

  //-------------
  //- DONUT CHART -
  var parametroFunciones=[700,500,400];
  var parametroValores=['Atendidos', 'Pendientes','Canceladas'];
  var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
  var donutData        = {
    labels: parametroValores,
    datasets: [
      {
        data: parametroFunciones,
        backgroundColor : ['#3DF84B', '#EDF936', '#F8453D'],
      }
    ]
  }
  var donutOptions     = {
    maintainAspectRatio : false,
    responsive : true,
  }
  //Create pie or douhnut chart
  // You can switch between pie and douhnut using the method below.
  var donutChart = new Chart(donutChartCanvas, {
    type: 'doughnut',
    data: donutData,
    options: donutOptions      
  })
  
  //-------------
  //- PIE CHART -
 

  //-------------
  //- BAR CHART -
  var barChartCanvas = $('#barChart').get(0).getContext('2d')
  var barChartData = jQuery.extend(true, {}, areaChartData)
  var temp0 = areaChartData.datasets[0]
  var temp1 = areaChartData.datasets[1]
  barChartData.datasets[0] = temp1
  barChartData.datasets[1] = temp0

  var barChartOptions = {
    responsive              : true,
    maintainAspectRatio     : false,
    datasetFill             : false
  }

  var barChart = new Chart(barChartCanvas, {
    type: 'bar', 
    data: barChartData,
    options: barChartOptions
  })

  //---------------------
  //- STACKED BAR CHART -
  //---------------------
  

  var stackedBarChart = new Chart(stackedBarChartCanvas, {
    type: 'bar', 
    data: stackedBarChartData,
    options: stackedBarChartOptions
  })

})