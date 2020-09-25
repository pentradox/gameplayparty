<div class="row">
    <div class="col-2 p-0">
<?php include APPROOT . "/views/fragments/dashboardNav.php"; ?>
</div>
<div class="col p-0 ">
    <div class="section px-5 py-5">
    <a class="btn btn-primary mt-3" href="<?php echo URLROOT ?>/Dashboard/createhall">Zaal Toevoegen</a>
    <table class="mt-3 table">
        <thead>
            <tr>

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

                   
                    <td>". $hall->hall_number ."</td>

                    <td>". $hall->seats ."</td>
                    <td>". $hall->sound_system ."</td>
                    <td><a href='" . URLROOT . "/Dashboard/updatehall/". $hall->id ."'><i class='fas fa-cog'></i></a></td>
                    <td><a href='" . URLROOT . "/Dashboard/deletehall/". $hall->id ."'><i class='fas fa-trash'></i></a></td>
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

    <?php echo (isset($data["hall_message"]) ? '<small class="alert '.$data["hall_message_class"].' position-absolute" style="right: 30px !important;bottom: 30px !important;">'.$data["hall_message"].'</small>' : null);?>

    </div>    
    <div class="container-fluid p-0">

</div>
</div>
</div>

<?php include APPROOT . "/views/fragments/footer.php"; ?>