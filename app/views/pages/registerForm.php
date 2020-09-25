<?php include APPROOT."/views/fragments/navbar.php"; ?>
    <div id="login">
      <p id="formMessage" class="register-message"><?php if(!empty($data)) {echo $data;}?></p>
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="myForm" class="form" method="post" action="<?php echo URLROOT?>/register">
                            <h3 class="text-center text-info">Meld uw bioscoop aan</h3>
                            <div class="form-group">
                                <label for="username" class="text-info">Gebruikersnaam :</label><br>
                                <input type="text" name="username" id="username" class="form-control">
                                <p id="username_error" class="text-danger"></p>
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Wachtwoord :</label><br>
                                <input type="password" name="password" id="password" class="form-control">
                                <p id="password_error" class="text-danger"></p>
                                <input type="checkbox" onclick="hideAndShowPW()"> Show Password
                            </div>
                            <div class="form-group">
                                <label for="email" class="text-info">Email :</label><br>
                                <input type="text" name="email" id="email" class="form-control">
                                <p id="email_error" class="text-danger"></p>
                            </div>
                            <div class="form-group">
                                <label for="reason" class="text-info">Reden :</label><br>
                                <textarea type="text" name="reason" id="reason" class="form-control" cols="50" rows="4"></textarea>
                                <p id="reason_error" class="text-danger"></p>
                            </div>
                            <div class="form-group">
                                <input type="button" class="btn btn-success btn-md" value="Submit" onclick="formCheck()">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php include APPROOT."/views/fragments/footer.php"; ?>
