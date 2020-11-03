<?php include APPROOT . "/views/fragments/dashboardNav.php"; ?>

<div class="col p-0">
  <div class="section px-5">

    <table class="mt-3 table" id="reservation_table">
      <thead>
        <tr>
          <th scope="col">Naam</th>
          <th scope="col">E-Mail</th>
          <th scope="col">Datum</th>
          <th scope="col">Tijd</th>
          <th scope="col">Packet</th>
          <th scope="col">Prijs</th>
        </tr>
      </thead>
      <tbody>
        <?php
        if (isset($data["reservations"])) {
          foreach ($data["reservations"] as $reservation) {
            echo 
              "<tr scope='row'>
                <td>" . $reservation->first_name . " " . $reservation->last_name . "</td>
                <td>" . $reservation->mail . "</td>
                <td>" . $reservation->date . "</td>
                <td>" . $reservation->time_area . "</td>
                <td>" . $reservation->package_name. "</td>
                <td>" . "€" . $reservation->package_price . "</td>
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