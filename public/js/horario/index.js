$('#calendar').fullCalendar({
  defaultView: 'agendaWeek',
  lang: 'es',
  weekends: false,
  columnFormat: 'dddd',
  dayNames: ['Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado', 'Domingo'],
  header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay'
        },
  defaultDate: '2018-11-11',
  editable: true,
  eventLimit: true,
  weekend: true,
  allDaySlot: false,
  minTime: '09:00:00',
  maxTime: '15:00:00',
  slotDuration: '00:20:00',
  slotLabelInterval : '00:20:00',
  events:'cita/getEvents',
});