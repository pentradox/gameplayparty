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
            foreach ($data as $hall) {
                echo "<tr scope='row'>
                <th>". $hall->id ."</th>
                <td>". $hall->hall_number ."</td>
                <td>". $hall->seats ."</td>
                <td>". $hall->sound_system ."</td>
                <td><i class='fas fa-trash'></i></td>
                </tr>";
            }
            ?>
        </tbody>
    </table>
</main>
<?php include APPROOT . "/views/fragments/footer.php"; ?>