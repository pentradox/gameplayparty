<?php include APPROOT."/views/fragments/navbar.php"; ?>
    <div id="login">
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" method="post">
                            <h3 class="text-center text-info">Meld uw bioscoop aan</h3>
                            <div class="form-group">
                                <label for="email" class="text-info">Email :</label><br>
                                <input type="text" name="email" id="email" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="reason" class="text-info">Reden :</label><br>
                                <input type="text" name="reason" id="reason" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="username" class="text-info">Gebruikersnaam :</label><br>
                                <input type="text" name="username" id="username" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Wachtwoord :</label><br>
                                <input type="text" name="password" id="password" class="form-control">
                            </div>
                            <?php
                                if (isset($data["error"])) {
                                    echo '<div class="form-group">
                                    <p class="error-login">'.$data["error"].'</p>
                                    </div>';
                                }
                            ?>
                            <div class="form-group">
                                <input type="button" name="submit" class="btn btn-info btn-md" value="Submit" onclick="formCheck()">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php include APPROOT."/views/fragments/footer.php"; ?>
