document.addEventListener("DOMContentLoaded", function () {
  let hall_id = document.getElementById("hall_id").value;
  fetch("/gameplayparty/Dashboard/agendas/" + hall_id)
    .then(function (response) {
      if (response.status == 200) {
        return response.json();
      } else {
        throw new Error("Invalid user ID");
      }
    })
    .then((data) => {
      let event = [];
      data.forEach((element) => {
        let time = "";
        switch (element["time_area"]) {
          case "1":
            time = "08:00 - 10:00";
            break;
          case "2":
            time = "12:00 - 14:00";
            break;
          case "3":
            time = "14:00 - 16:00";
            break;
          default:
            break;
        }
        console.log(time);
        event.push({
          title: time,
          start: element["date"],
          id: element["id"],
        });
      });
      calenda(event);
    })
    .catch((err) => {
      console.log("ERROR: ", err.message);
    });
});

function calenda(event) {
  console.log(event);
  var calendarEl = document.getElementById("calendar");

  var calendar = new FullCalendar.Calendar(calendarEl, {
    locale: "nl",
    events: event,
  });

  calendar.on("dateClick", function (info) {
    fetch("/gameplayparty/Dashboard/addAgenda")
      .then(function (response) {
        if (response.status === 200) {
          return response;
        } else {
          throw new Error("Invalid user ID");
        }
      })
      .then(async (data) => {
        const where_is_my_coffee_at_bitch = await data.text();
        $("#geef-je-zus-zn-nummer").modal("toggle");
        let hall_id = document.getElementById("hall_id").value;
        document.getElementById("agenda_id").value = hall_id;
        document.getElementById("date").innerHTML = info.dateStr;
        document.getElementById("date2").value = info.dateStr;
      })
      .catch((err) => {
        console.log("ERROR: ", err.message);
      });
  });

  calendar.on("eventClick", function (info) {
    // alert('Event: ' + info.event.title + " " + formatDate(info.event.start));
    fetch("/gameplayparty/Dashboard/deleteAgenda/"+ info.event.id)
      .then(function (response) {
        if (response.status === 200) {
          calendar.fullCalendar( 'rerenderEvents'); 
        } else {
          throw new Error("Invalid user ID");
        }
      })
      .catch((err) => {
        console.log("ERROR: ", err.message);
      });
  })

  calendar.render();
}