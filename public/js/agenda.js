document.addEventListener('DOMContentLoaded', function () {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
        headerToolbar: {
            left: 'title',
            right: 'today prev,next'
        },
        events: [
            {
                start: '2020-10-13',
                end: '2020-10-13',
                display: 'background',
                color: '#17a2b8'
            }
        ]
    });
    calendar.on('dateClick', function (info) {
        alert('clicked on ' + info.dateStr);
    });

    calendar.render();
});