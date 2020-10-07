<?php include APPROOT . "/views/fragments/dashboardNav.php"; ?>

<div class="col flex-column p-0" id="dash-container">
  <div class="section px-4">
    <div class="intro">
      <div class="text-container">
        <h1>
          Welcome
          <?php echo $_SESSION["username"] ?>
        </h1>
      </div>
    </div>

    <div class="row mt-5">
      <div class="col-md-8">
        <h3>Test</h3>
      </div>
      <div class="col-md-4">
        <div class="row">
          <div class="col-md-6">

            <h3>
              Test
            </h3>

            <button type="button" class="btn btn-lg btn-primary">
              Button
            </button>

          </div>
          <div class="col-md-6">

            <h3>
              Test
            </h3>

            <button type="button" class="btn btn-lg btn-primary">
              Button
            </button>

          </div>
        </div>
      </div>
      <?php
      if($_SESSION["roles"] == 1) {
        echo '<form action="' . URLROOT . '/Dashboard/updatecontent" method="POST">';
        //home pagina
        echo '<div class="form-group">';
        echo '<label class="text-info" for="hall_number">Home Pagina Titel*</label>
        <textarea type="text" name="home_title" rows="1" class="form-control" required>' . $data[0][0]->title . '</textarea>';
        echo'</div>';

        echo '<div class="form-group">';
        echo '<label class="text-info" for="hall_number">Home Pagina Motto*</label>
        <textarea type="text" rows="3" name="home_text" class="form-control" required>'  . $data[0][0]->text . '</textarea>';
        echo'</div>';

        echo '<div class="form-group">';
        echo '<label class="text-info" for="hall_number">Home Pagina Titel Sectie 1*</label>
        <textarea type="text" rows="1" name="home_section_1_title" class="form-control" required>'  . $data[0][1]->title . '</textarea>';
        echo'</div>';

        echo '<div class="form-group">';
        echo '<label class="text-info" for="hall_number">Home Pagina Sectie 1*</label>
        <textarea type="text" rows="3" name="home_section_1_text" class="form-control" required>'  . $data[0][1]->text . '</textarea>';
        echo'</div>';

        echo '<div class="form-group">';
        echo '<label class="text-info" for="hall_number">Home Pagina Titel Sectie 2*</label>
        <textarea type="text" rows="1" name="home_section_2_title" class="form-control" required>'  . $data[0][2]->title . '</textarea>';
        echo'</div>';

        echo '<div class="form-group">';
        echo '<label class="text-info" for="hall_number">Home Pagina Sectie 2*</label>
        <textarea type="text" rows="3" name="home_section_2_text" class="form-control" required>'  . $data[0][2]->text . '</textarea>';
        echo'</div>';

        //contact pagina
        echo '<label class="text-info" for="hall_number">Contact Pagina Titel*</label>
        <textarea type="text" name="contact_title" rows="1" class="form-control" required>' . $data[1][0]->title . '</textarea>';
        echo'</div>';

        echo '<div class="form-group">';
        echo '<label class="text-info" for="hall_number">Contact Pagina beschrijving*</label>
        <textarea type="text" rows="3" name="contact_text" class="form-control" required>'  . $data[1][0]->text . '</textarea>';
        echo'</div>';

        echo '<div class="form-group">';
        echo '<label class="text-info" for="hall_number">Contact Pagina Titel Sectie 1*</label>
        <textarea type="text" rows="1" name="contact_section_1_title" class="form-control" required>'  . $data[1][1]->title . '</textarea>';
        echo'</div>';

        echo '<div class="form-group">';
        echo '<label class="text-info" for="hall_number">contact Pagina Sectie 1*</label>
        <textarea type="text" rows="3" name="contact_section_1_text" class="form-control" required>'  . $data[1][1]->text . '</textarea>';
        echo'</div>';

        echo '<div class="form-group">';
        echo '<label class="text-info" for="hall_number">contact Pagina Titel Sectie 2*</label>
        <textarea type="text" rows="1" name="contact_section_2_title" class="form-control" required>'  . $data[1][2]->title . '</textarea>';
        echo'</div>';

        echo '<div class="form-group">';
        echo '<label class="text-info" for="hall_number">contact Pagina Sectie 2*</label>
        <textarea type="text" rows="3" name="contact_section_2_text" class="form-control" required>'  . $data[1][2]->text . '</textarea>';
        echo'</div>';

        echo '<button class="btn btn-info btn-block mt-5" type="submit">Update</button>';
        echo "</form>";
      }
      ?>
    </div>
    <div class="row">
      <div class="col-md-4">
        <h3>HIER1</h3>
      </div>

      <div class="col-md-4">
        <h3>HIER2</h3>
      </div>

      <div class="col-md-4">
        <h3>HIER3</h3>
      </div>

    </div>

  </div>
</div>
<?php include APPROOT . "/views/fragments/footer.php"; ?>
