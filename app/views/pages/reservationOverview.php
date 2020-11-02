<?php include APPROOT . "/views/fragments/dashboardNav.php"; ?>

<div class="col p-0">
  <div class="section px-5 p-5">

    <table class="mt-3 table">
      <thead>
        <tr>
          <th scope="col">Naam</th>
          <th scope="col">Telefoonnummer</th>
          <th scope="col">Personen</th>
          <th scope="col">Packet</th>
          <th scope="col"></th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody>
        <?php
        if (isset($data["reservations"])) {
          foreach ($data["reservations"] as $reservation) {
            echo 
              "<tr scope='row'>
                <td>" . $reservation->name ."</td>
                  <td>" . $reservation->phone . "</td>
                  <td>" . $reservation->amount . "</td>

                  <td>
                    <a href='" . URLROOT . "/Dashboard/reservationEdit/" . $reservation->id . "'>
                      <button type='button' class='btn btn-primary'>
                        <i class='fas fa-cog'></i>
                      </button>
                    /a>
                  </td>

                  <td>
                    <button type='button' class='btn btn-primary' data-toggle='modal' data-target='#delete" . $reservation->id . "'><i class='fas fa-trash '></i>
                    </button>
                  </td>
              </tr>";
          }
        } else {
          echo 
            '<tr>
              <td align="center" colspan="6">Geen gebruikers gevonden!</td>
            </tr>';
        }
        ?>
      </tbody>
    </table>
  </div>
  <div class="container-fluid p-0 hidden"></div>

</div>
</div>
</div>
</div>

<?php
if (isset($data["users"])) {
  foreach ($data["users"] as $user) {

    if ($user->active == 1) {

      echo '<div class="modal fade" id="de-active' . $user->id . '" tabindex="-1" role="dialog" aria-labelledby="de-active' . $user->id . '" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="de-active">Weet U het zeker?</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              Als u deze bioscoop deactiveert dan kan de gebruiker geen zalen en producten op de website aanmaken!
              Dus weet het zeker dat dit het juiste account is? 
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Nee</button>
              <a href="' . URLROOT . "/Dashboard/activate/" . $user->id . '"><button type="button" class="btn btn-danger">Deactiveren</button></a>
            </div>
          </div>
        </div>
      </div>';
    } else {
      echo '<div class="modal fade" id="active" tabindex="-1" role="dialog" aria-labelledby="active" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="active">Weet U het zeker?</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              Als u deze bioscoop activeert dan kan de gebruiker zaalen en producten op de website aanmaken!
              Dus weet het zeker dat dit het juiste account is? 
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Nee</button>
              <a href="' . URLROOT . "/Dashboard/activate/" . $user->id . '"><button type="button" class="btn btn-success">Activeren</button></a>
            </div>
          </div>
        </div>
      </div>';
    }
    echo '<div class="modal fade" id="delete' . $user->id . '" tabindex="-1" role="dialog" aria-labelledby="delete' . $user->id . '" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="delete">Weet U het zeker?</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            Als u deze bioscoop verwijderd kunt u deze niet meer terug krijgen.
            Weet u ook zeker dat dit niet de verkeerde biscoop is en dat de klant op te hoogte?
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Nee</button>
            <a href="' . URLROOT . "/Dashboard/deleteUser/" . $user->id . '"><button type="button" class="btn btn-danger">Verwijder</button></a>
          </div>
        </div>
      </div>
    </div>';
  }
}

?>

<?php include APPROOT . "/views/fragments/footer.php"; ?>