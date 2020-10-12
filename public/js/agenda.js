document.addEventListener('DOMContentLoaded', function () {
    fetch('http://localhost/gameplayparty/Dashboard/agendas')
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
        locale: 'nl',
        headerToolbar: {
            left: 'title',
            right: 'today prev,next'
        },
        events: event
    });
    calendar.on('dateClick', function (info) {
        fetch('http://localhost/gameplayparty/Dashboard/addAgenda')
        .then(function (response) {
            if (response.status === 200) {
                return response;
            } else {
                throw new Error('Invalid user ID');
            }
        })
        .then(async (data) => {
            const where_is_my_coffee_at_bitch = await data.text()
            const shitcodelol = document.getElementById('im-not-gonna-fix-this-shit-code')
            shitcodelol.style.display = 'initial !important';
        })
        .catch((err) => {
            console.log('ERROR: ', err.message);
        });
    });
  
    calendar.render();
  }