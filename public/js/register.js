function removeMessage() {
    document.getElementById('formMessage').innerHTML = "";
}
setTimeout(removeMessage, 10000)
function formCheck() {
  email_error = "";
  reason_error = "";
  username_error = "";
  password_error = "";

  document.getElementById('email_error').innerHTML = email_error;
  document.getElementById('reason_error').innerHTML = reason_error;
  document.getElementById('username_error').innerHTML = username_error;
  document.getElementById('password_error').innerHTML = password_error;

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
  } else {
    if(email.length > 100) {
      email_error = 'email is te lang';
    } else {
      const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
      check = re.test(String(email).toLowerCase());
      if(check === false) {
        email_error = 'ongeldige email';
      }
    }
  }
  if(reason === "") {
    reason_error = 'veld van reden is leeg';
  } else {
    if(reason.length > 255) {
      reason_error = 'reden is te lang';
    }
  }
  if(username === "") {
    username_error = 'veld van gebruikersnaam is leeg';
  } else {
    if(username > 255) {
      username_error = 'gebruikersnaam is te lang';
    }
  }
  if(password === "") {
    password_error = 'veld van wachtwoord is leeg';
  } else {
    if(password > 255) {
      password_error = 'wachtwoord is te lang';
    }
  }
  if((email_error !== "") || (reason_error !== "") || (username_error !== "") || (password_error !== "")){
    document.getElementById('email_error').innerHTML = email_error;
    document.getElementById('reason_error').innerHTML = reason_error;
    document.getElementById('username_error').innerHTML = username_error;
    document.getElementById('password_error').innerHTML = password_error;
  } else {
    sendForm()
  }

}
function sendForm() {
  document.getElementById("myForm").submit();
}
