document.addEventListener('DOMContentLoaded', function () {
    const uri = 'http://localhost/gameplayparty/Dashboard/agendas';

    console.log('FETCH: ', uri);

    fetch(uri)
        .then(function (response) {
            if (response.status == 200) {
                return response.json();
            } else {
                throw new Error('Invalid user ID');
            }
        })
        .then((data) => {
            let event = [];
            data.forEach(element => {
                event.push({
                  start: element['date'],
                  end: element['date'],
                  display: 'background',
                  color: '#17a2b8'
                })
            });
            calenda(event)
        })
        .catch((err) => {
            console.log('ERROR: ', err.message);
        });
});

function calenda(event) {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
        headerToolbar: {
            left: 'title',
            right: 'today prev,next'
        },
        events: event
    });
    calendar.on('dateClick', function (info) {
        alert('clicked on ' + info.dateStr);
    });

    calendar.render();
}