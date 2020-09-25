<?php include APPROOT . "/views/fragments/dashboardNav.php"; ?>
<main class="container d-flex justify-content-center align-items-center" style="height: 100vh">
  <form class="col-sm-4 p-3 border border-dark" style=" !important;" action="<?php echo URLROOT ?>/Dashboard/updatehall" method="POST">
    <h3 class="text-center">Bioscoopzaal Aanpassen</h3>
    <div class="form-group">
      <?php
      if (!isset($data["hall_number_error"])) {
        echo '<label for="hall_number">Zaal Nummer*</label>
        <input type="number" name="hall_number" class="form-control" id="hall_number" required value="'.$data["hall"]->hall_number.'">';
      } else {
        echo '<label class="text-danger" for="hall_number">Zaal Nummer*</label>
        <input type="number" name="hall_number" class="is-invalid form-control" id="hall_number" required value="'.$data["hall"]->hall_number.'">
        <small class="text-danger">'.$data["hall_number_error"].'</small>';
      }
      ?>
    </div>
    <div class="form-group">
    <?php
      if (!isset($data["hall_seats_error"])) {
        echo '<label for="hall_seats">Zit Plaatsen*</label>
        <input type="number" name="hall_seats" class="form-control" id="hall_seats" required value="'.$data["hall"]->seats.'">';
      } else {
        echo '<label class="text-danger" for="hall_seats">Zit Plaatsen*</label>
        <input type="number" name="hall_seats" class="is-invalid form-control" id="hall_seats" required value="'.$data["hall"]->seats.'">
        <small class="text-danger">'.$data["hall_seats_error"].'</small>';
      }
      ?>
    </div>
    <div class="form-group">
    <?php
      if (!isset($data["hall_sound_error"])) {
        echo '<label for="hall_sound">Geluids Systeem*</label>
        <input type="text" name="hall_sound" class="form-control" id="hall_sound" required value="'.$data["hall"]->sound_system.'">';
      } else {
        echo '<label class="text-danger" for="hall_sound">Geluids Systeem*</label>
        <input type="text" name="hall_sound" class="is-invalid form-control" id="hall_sound" required value="'.$data["hall"]->sound_system.'">
        <small class="text-danger">'.$data["hall_sound_error"].'</small>';
      }
      ?>
    </div>
    <input type="number" hidden name="id" value="<?php echo $data["hall"]->id; ?>">
    <button type="submit" class="btn-block btn btn-primary">Toevoegen</button>
    <?php echo (isset($data["success_message"]) ? '<small class="text-center text-success">'.$data["success_message"].'</small>' : null); ?>
  </form>
</main>
<?php include APPROOT . "/views/fragments/footer.php"; ?>