function formCheck() {
  email = document.getElementById('email');
  email = email.value;

  reason = document.getElementById('reason');
  reason = reason.value;

  username = document.getElementById('username');
  username = username.value;

  password = document.getElementById('password');
  password = password.value;

  if(email === "") {
    email_error = 'veld van email is leeg';
  }

}
