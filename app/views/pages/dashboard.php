
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
    </div>
  </div>
</div>
<?php include APPROOT . "/views/fragments/footer.php"; ?>
