var sPath = window.location.pathname; //var sPage =
sPath.substring(sPath.lastIndexOf("\\") + 1);
var sPage = sPath.substring(sPath.lastIndexOf("/") + 1);

if (sPage == "Userlogin") {
  $("nav").addClass("bg-light");
  $(".navLinks").addClass("moon");
  $("#login").addClass("nav nav-tabs");
} else {
  $(".navLinks").addClass("cloud");
  $("#home").addClass("nav nav-tabs");
}

if ($(document).offest().top) {
  $("nav").addClass("bg-danger");
} else {
  $("nav").addClass("bg-info");
}
