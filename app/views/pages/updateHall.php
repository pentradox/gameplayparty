<?php include APPROOT . "/views/fragments/dashboardNav.php"; ?>
</div>
<div class="col py-5 " id="dash-container">

  <div class="row justify-content-center">



    <form class="col-md-9 col-lg-8 col-xl-6 border border-light p-5" style=" !important;" action="<?php echo URLROOT ?>/Dashboard/updatehall" method="POST">
      <h3 class="text-center">Bioscoopzaal Aanpassen</h3>
      <div class="form-group">
        <?php
        if (!isset($data["hall_number_error"])) {
          echo '<label for="hall_number">Zaal Nummer*</label>
        <input type="number" name="hall_number" class="form-control" id="hall_number" required value="' . $data["hall"]->hall_number . '">';
        } else {
          echo '<label class="text-danger" for="hall_number">Zaal Nummer*</label>
        <input type="number" name="hall_number" class="is-invalid form-control" id="hall_number" required value="' . $data["hall"]->hall_number . '">
        <small class="text-danger">' . $data["hall_number_error"] . '</small>';
        }
        ?>
      </div>
      <div class="form-group">
        <?php
        if (!isset($data["hall_seats_error"])) {
          echo '<label for="hall_seats">Zit Plaatsen*</label>
        <input type="number" name="hall_seats" class="form-control" id="hall_seats" required value="' . $data["hall"]->seats . '">';
        } else {
          echo '<label class="text-danger" for="hall_seats">Zit Plaatsen*</label>
        <input type="number" name="hall_seats" class="is-invalid form-control" id="hall_seats" required value="' . $data["hall"]->seats . '">
        <small class="text-danger">' . $data["hall_seats_error"] . '</small>';
        }
        ?>
      </div>
      <div class="form-group">
        <?php
        if (!isset($data["hall_sound_error"])) {
          echo '<label for="hall_sound">Geluids Systeem*</label>
        <input type="text" name="hall_sound" class="form-control" id="hall_sound" required value="' . $data["hall"]->sound_system . '">';
        } else {
          echo '<label class="text-danger" for="hall_sound">Geluids Systeem*</label>
        <input type="text" name="hall_sound" class="is-invalid form-control" id="hall_sound" required value="' . $data["hall"]->sound_system . '">
        <small class="text-danger">' . $data["hall_sound_error"] . '</small>';
        }
        ?>
      </div>
      <input type="number" id="hall_id" hidden name="id" value="<?php echo $data["hall"]->id; ?>">
      <button type="submit" class="btn-block btn btn-primary">Toevoegen</button>
      <?php echo (isset($data["success_message"]) ? '<small class="text-center text-success">' . $data["success_message"] . '</small>' : null); ?>
    </form>
    <div class="container">
      <div id='calendar'></div>
      <div id="geef-je-zus-zn-nummer" class="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLiveLabel" style="padding-right: 17px;">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLiveLabel">Tijd Invoegen</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <form action="<?php echo URLROOT; ?>/Dashboard/addAgenda" method="post">
              <div class="modal-body">

                <input type="text" id="agenda_id" hidden name="hall_id" value="<?php $data["hall"]->id ?>">
                <p id="date"></p>
                <input type="text" hidden id="date2" name="date">
               <select name="time_area">
                 <option value="1">08:00 - 10:00</option>
                 <option value="2">12:00 - 14:00</option>
                 <option value="3">14:00 - 16:00</option>
               </select>


              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <input class="btn btn-primary" type="submit" value="Add Time">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.3.2/main.min.js"></script>
    <script src="<?php echo URLROOT; ?>/js/agenda.js"></script>

  </div>
</div>


</div>
</div>
<?php include APPROOT . "/views/fragments/footer.php"; ?>