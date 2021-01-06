document.addEventListener("DOMContentLoaded", function () {
  let hall_id = document.getElementById("hall_id").value;
  console.log(hall_id);
  fetch("http://localhost/gameplayparty/Dashboard/agendas/" + hall_id)
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
        }
        if (element["reserved"] === "0") {
          event.push({
            title: time,
            start: element["date"],
            url: "/gameplayparty/Dashboard/reserve/" + hall_id + "/" + element["id"],
            id: element["id"],
          });
        }
      });
      calenda(event);
    })
    .catch((err) => {
      console.log("ERROR: ", err.message);
    });
});

function calenda(event) {
  var calendarEl = document.getElementById("calendar");
  var calendar = new FullCalendar.Calendar(calendarEl, {
    locale: "nl",
    headerToolbar: {
      left: "title",
      right: "today prev,next",
    },
    events: event,
  });

  calendar.render();
}
