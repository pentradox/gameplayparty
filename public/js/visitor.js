document.addEventListener('DOMContentLoaded', function () {
    let hall_id = document.getElementById("hall_id").value;
    console.log(hall_id);
    fetch('http://localhost/gameplayparty/Dashboard/agendas/'+hall_id)
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
            console.log(event);
            calenda(event)
        })
        .catch((err) => {
            console.log('ERROR: ', err.message);
        });
  });
  
  function calenda(event) {
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
        locale: 'nl',
        headerToolbar: {
            left: 'title',
            right: 'today prev,next'
        },
        events: event
    }); 
    calendar.render();
  }