
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
      if($_SESSION["roles"] == 1) {
        echo '<div class="form-group">';
        echo '<label class="text-info" for="hall_number">Home Pagina Titel*</label>
        <textarea type="text" rows="1" class="form-control" required></textarea>';
        echo'</div>';

        echo '<div class="form-group">';
        echo '<label class="text-info" for="hall_number">Home Pagina Motto*</label>
        <textarea type="text" rows="1" class="form-control" required></textarea>';
        echo'</div>';

        echo '<div class="form-group">';
        echo '<label class="text-info" for="hall_number">Home Pagina Titel Sectie 1*</label>
        <textarea type="text" rows="1" class="form-control" required></textarea>';
        echo'</div>';

        echo '<div class="form-group">';
        echo '<label class="text-info" for="hall_number">Home Pagina Sectie 1*</label>
        <textarea type="text" rows="1" class="form-control" required></textarea>';
        echo'</div>';

        echo '<div class="form-group">';
        echo '<label class="text-info" for="hall_number">Home Pagina Titel Sectie 2*</label>
        <textarea type="text" rows="1" class="form-control" required></textarea>';
        echo'</div>';

        echo '<div class="form-group">';
        echo '<label class="text-info" for="hall_number">Home Pagina Sectie 2*</label>
        <textarea type="text" rows="1" class="form-control" required></textarea>';
        echo'</div>';
      }
      ?>
    </div>
  </div>
</div>
<?php include APPROOT . "/views/fragments/footer.php"; ?>
