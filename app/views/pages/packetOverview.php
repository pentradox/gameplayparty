<?php include APPROOT . "/views/fragments/dashboardNav.php"; ?>


  <div class="section px-5 p-5">

    <table class="mt-3 w-75 m-auto table">
      <thead>
        <tr>

          <th scope="col">Naam</th>
          <th scope="col">Prijs</th>
          
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody>
        <?php
        if (isset($data["packages"])) {
          foreach ($data["packages"] as $package) {
            echo "<tr scope='row'>
            <td>" . $package->name . "</td>
            <td>" . $package->price . "</td>
            <td><a href='" . URLROOT . "/Dashboard/updatePackage/" . $package->id . "'><button type='button' class='btn btn-primary'><i class='fas fa-cog'></i></button></a></td>
            <td><button type='button' class='btn btn-primary' data-toggle='modal' data-target='#delete" . $package->id . "'><i class='fas fa-trash '></i></button></td>
            </tr>";
          }
        } else {
          echo '<tr>
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
          Als u deze pakket deactiveert dan kan de klant niet meer deze pakket bekijken of gebruiken!
          Dus weet het zeker dat dit het juiste pakket is? 
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
          Als u deze pakket activeert dan kan de klant de pakketten bekijken op de website!
          Dus weet het zeker dat dit het juiste pakket is? 
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
        Als u dit pakket verwijderd kunt u deze niet meer terug krijgen.
        Weet u ook zeker dat dit niet de verkeerde pakket?
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

<?php
  // echo"<pre>";
  // print_r($data);
  // echo"</pre>";
?>