
  <?php include APPROOT . "/views/fragments/dashboardNav.php"; ?>

  <div class="container-fluid" id="dash-container">
    <div class="section px-4">
      <div class="intro">
        <div class="text-container">
          <h1>
            Welcome
            <?php echo $_SESSION["username"] ?>
          </h1>
        </div>
      </div>
      <?php
      echo var_dump($data);
      if($_SESSION["roles"] == 1) {
        echo '<form action="' . URLROOT . '/Dashboard/updatecontent" method="POST">';
        echo '<div class="form-group">';
        echo '<label class="text-info" for="hall_number">Home Pagina Titel*</label>
        <textarea type="text" name="home_title" rows="1" class="form-control" required>' . $data[0]->title . '</textarea>';
        echo'</div>';

        echo '<div class="form-group">';
        echo '<label class="text-info" for="hall_number">Home Pagina Motto*</label>
        <textarea type="text" rows="3" name="home_text" class="form-control" required>'  . $data[0]->text . '</textarea>';
        echo'</div>';

        echo '<div class="form-group">';
        echo '<label class="text-info" for="hall_number">Home Pagina Titel Sectie 1*</label>
        <textarea type="text" rows="1" name="section_1_title" class="form-control" required>'  . $data[1]->title . '</textarea>';
        echo'</div>';

        echo '<div class="form-group">';
        echo '<label class="text-info" for="hall_number">Home Pagina Sectie 1*</label>
        <textarea type="text" rows="3" name="section_1_text" class="form-control" required>'  . $data[1]->text . '</textarea>';
        echo'</div>';

        echo '<div class="form-group">';
        echo '<label class="text-info" for="hall_number">Home Pagina Titel Sectie 2*</label>
        <textarea type="text" rows="1" name="section_2_title" class="form-control" required>'  . $data[2]->title . '</textarea>';
        echo'</div>';

        echo '<div class="form-group">';
        echo '<label class="text-info" for="hall_number">Home Pagina Sectie 2*</label>
        <textarea type="text" rows="3" name="section_2_text" class="form-control" required>'  . $data[2]->text . '</textarea>';
        echo'</div>';
        echo '<button class="btn btn-info btn-block mt-5" type="submit">Update</button>';
        echo "</form>";
      }
      ?>
    </div>
  </div>
</div>
<?php include APPROOT . "/views/fragments/footer.php"; ?>
