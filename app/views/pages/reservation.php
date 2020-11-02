<?php include APPROOT."/views/fragments/navbar.php"; ?>

<div class="container d-flexjustify-content-center mt-5">
    <div class="text-center mt-5">
        <h1>Reserveren</h1>
        <form class="w-50 d-flex justify-content-center flex-column mx-auto" action="<?php echo URLROOT ?>/Dashboard/reserve" method="post">
            <div class="form-group text-left">
                <label for="first">Voornaam *</label>
                <input type="text" class="form-control" name="first" id="first" required>
            </div>
            <div class="form-group text-left">
                <label for="last">Achternaam *</label>
                <input type="text" class="form-control" name="last" id="last" required>
            </div>
            <div class="form-group text-left">
                <label for="mail">Mail *</label>
                <input type="text" class="form-control" name="mail" id="mail" required>
            </div>
            <div class="form-group text-left">
                <label for="packet">Kies uw pakket *</label>
                <select class="form-control" name="packet" id="packet">
                    <?php
                        foreach ($data["packages"] as $packet) {
                            echo '<option value="'. $packet->id .'">'. $packet->name . ': €'. $packet->price .'</option>';
                        }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <p>Datum reserveren: <?php echo $data["time"]->date  ?></p>
                <input type="text" name="date" value="<?php echo $data["time"]->date ?>" hidden>
                <input type="text" name="time_id" value="<?php echo $data["time"]->id ?>" hidden>
                <p>Tijds vak reserveren: <?php echo $data["time"]->time_area ?></p>
                <input type="text" name="time_area" value="<?php echo $data["time"]->time_area ?>" hidden>
            </div>
            <input class="btn btn-primary" type="submit" value="Reserveren">
        </form>
    </div>
</div>

<?php include APPROOT."/views/fragments/footer.php"; ?>