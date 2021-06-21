$(document).ready(function () {
	$('#calendar').fullCalendar({
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
		eventClick: function (calEvent, time, jsEvent, view) {
			$('#event-title').text(calEvent.title);
			$('#event-description').html(calEvent.description);
			$('#event-start').text(calEvent.start);
			$('#event-doctor').text(calEvent.doctor);
			$('#modal-event').modal();
		},
		
	});
});
