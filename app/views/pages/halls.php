<?php include APPROOT . "/views/fragments/dashboardNav.php"; ?>
<main class="container" style="height: 100vh">
    <a class="btn btn-primary mt-3" href="<?php echo URLROOT ?>/Dashboard/createhall">Zaal Toevoegen</a>
    <table class="mt-3 table">
        <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Zaal nummer</th>
                <th scope="col">Zit plaatsen</th>
                <th scope="col">Geluids systeem</th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (isset($data["halls"])) {
                foreach ($data["halls"] as $hall) {
                    echo "<tr scope='row'>
                    <th>". $hall->id ."</th>
                    <td>". $hall->hall_number ."</td>
                    <td>". $hall->seats ."</td>
                    <td>". $hall->sound_system ."</td>
                    <td><a href='" . URLROOT . "/Dashboard/updatehall/". $hall->id ."'><i class='fas fa-cog'></i></a></td>
                    <td><i class='fas fa-trash'></i></td>
                    </tr>";
                }
            } else {
                echo '<tr>
                <td align="center" colspan="6">Geen Zaalen gevonden!</td>
                </tr>'; 
            }
            ?>
        </tbody>
    </table>
    <?php echo (isset($data["hall_error"]) ? '<small class="alert alert-danger position-absolute" style="right: 10px !important;bottom: 30px !important;">'.$data["hall_error"].'</small>' : null);?>
</main>
<?php include APPROOT . "/views/fragments/footer.php"; ?>