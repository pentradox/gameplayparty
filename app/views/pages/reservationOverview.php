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
if (isset($data["reservation"])) {
  foreach ($data["reservation"] as $reservation) {

    echo '<div class="modal fade" id="delete' . $reservation->id . '" tabindex="-1" role="dialog" aria-labelledby="delete' . $reservation->id . '" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="delete">Weet U het zeker?</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            Weet u het dat u de reservering wilt verwijderen?
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Nee</button>
            <a href="' . URLROOT . "/Dashboard/deleteReservation/" . $reservation->id . '"><button type="button" class="btn btn-danger">Verwijder</button></a>
          </div>
        </div>
      </div>
    </div>';
  }
}

?>

<?php include APPROOT . "/views/fragments/footer.php"; ?>