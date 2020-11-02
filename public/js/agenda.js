document.addEventListener("DOMContentLoaded", function () {
  let hall_id = document.getElementById("hall_id").value;
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
        console.log(data);
        event.push({
          title: element["time_area"],
          start: element["date"],
          display: "background",
          color: "#17a2b8",
        },);
      });
      calenda(event);
    })
    .catch((err) => {
      console.log("ERROR: ", err.message);
    });
});

// function calenda(event) {
//   var calendarEl = document.getElementById("calendar");
//   var calendar = new FullCalendar.Calendar(calendarEl, {
//     locale: "nl",
//     headerToolbar: {
//       left: "title",
//       right: "today prev,next",
//     },
//     events: event,
//   });
//   calendar.on("dateClick", function (info) {
//     fetch("http://localhost/gameplayparty/Dashboard/addAgenda")
//       .then(function (response) {
//         if (response.status === 200) {
//           return response;
//         } else {
//           throw new Error("Invalid user ID");
//         }
//       })
//       .then(async (data) => {
//         const where_is_my_coffee_at_bitch = await data.text();
//         $("#geef-je-zus-zn-nummer").modal("toggle");
//         let hall_id = document.getElementById("hall_id").value;
//         document.getElementById("agenda_id").value = hall_id;
//         document.getElementById("date").innerHTML = info.dateStr;
//         document.getElementById("date2").value = info.dateStr;
//       })
//       .catch((err) => {
//         console.log("ERROR: ", err.message);
//       });
//   });

//   calendar.render();
// }

function calenda(event) {
  var calendarEl = document.getElementById("calendar");

  var calendar = new FullCalendar.Calendar(calendarEl, {
    locale: "nl",
    initialView: "dayGridMonth",
    initialDate: "2020-10-12",

    events: [
      event
    ],
  });

  calendar.render();
};
