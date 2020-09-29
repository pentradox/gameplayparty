
<?php include APPROOT . "/views/fragments/dashboardNav.php"; ?>

<div class="col p-0 ">
    <div class="section px-5 ">
    <a class="btn btn-primary mt-3" href="<?php echo URLROOT ?>/Dashboard/createhall">Zaal Toevoegen</a>
    <table class="mt-3 table">
        <thead>
            <tr>

                <th scope="col">Zaal nummer</th>
                <th scope="col">Zit plaatsen</th>
                <th scope="col">Geluids systeem</th>
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
                    <td><a href='" . URLROOT . "/Dashboard/updatehall/". $hall->id ."'><button type='button' class='btn btn-primary'><i class='fas fa-cog'></i></button></a>
                    <button type='button' class='btn btn-primary' data-toggle='modal' data-target='#exampleModal'><i class='fas fa-trash'></i></button></td>
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

    <?php echo (isset($data["hall_message"]) ? '<div><small class="alert '.$data["hall_message_class"].'" style="right: 30px !important;bottom: 30px !important;"></div>'.$data["hall_message"].' </small>' : null);?>

    </div>    
    <div class="container-fluid p-0">

</div>
</div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Weet U het zeker?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Als u deze bioscoop zaal verwijderd kunt u deze niet meer terug krijgen en hij verdwijnt ook uit onze shop!
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Nee</button>
        <a href="<?php echo URLROOT . "/Dashboard/deletehall/". $hall->id; ?>"><button type="button" class="btn btn-danger">Verwijder</button></a>
      </div>
    </div>
  </div>
</div>

<?php include APPROOT . "/views/fragments/footer.php"; ?>