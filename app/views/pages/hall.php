


    <?php include APPROOT . "/views/fragments/dashboardNav.php"; ?>

  <div class="col py-5 " id="dash-container">
    
    <div class="row justify-content-center">


    <!-- Default form subscription -->
    <form class="col-md-9 col-lg-8 col-xl-6 border border-light p-5" action="<?php echo URLROOT ?>/Dashboard/createhall" method="POST">
    <div class="text-info text-center mb-5">
    <h3 class="text-info  mb-4">Bioscoopzaal toevoegen</p>



</div>
    <div class="form-group">
      <?php
      if ($data["hall_number_error"] == null) {
        echo '<label class="text-info" for="hall_number">Zaal Nummer*</label>
        <input type="number" name="hall_number" class="form-control" id="hall_number" required>';
      } else {
        echo '<label class="text-danger" for="hall_number">Zaal Nummer*</label>
        <input type="number" name="hall_number" class="is-invalid form-control" id="hall_number" required>
        <small class="text-danger">'.$data["hall_number_error"].'</small>';
      }
      ?>
    </div>
    <div class="form-group">
    <?php
      if ($data["hall_seats_error"] == null) {
        echo '<label class="text-info" for="hall_seats">Zit Plaatsen*</label>
        <input type="number" name="hall_seats" class="form-control" id="hall_seats" required>';
      } else {
        echo '<label class="text-danger" for="hall_seats">Zit Plaatsen*</label>
        <input type="number" name="hall_seats" class="is-invalid form-control" id="hall_seats" required>
        <small class="text-danger">'.$data["hall_seats_error"].'</small>';
      }
      ?>
    </div>
    <div class="form-group">
    <?php
      if ($data["hall_sound_error"] == null) {
        echo '<label class="text-info" for="hall_sound">Geluids Systeem*</label>
        <input type="text" name="hall_sound" class="form-control" id="hall_sound" required>';
      } else {
        echo '<label class="text-danger" for="hall_sound">Geluids Systeem*</label>
        <input type="text" name="hall_sound" class="is-invalid form-control" id="hall_sound" required>
        <small class="text-danger">'.$data["hall_sound_error"].'</small>';
      }
      ?>
    </div>
    <button type="submit" class="btn-block btn btn-primary">Toevoegen</button>
    <?php echo ($data["success_message"] != null ? '<small class="text-center text-success">'.$data["success_message"].'</small>' : null); ?>
  </form>

    </div>
    </div>

    
  </div>
</div>
<?php include APPROOT . "/views/fragments/footer.php"; ?>
