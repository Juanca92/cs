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
