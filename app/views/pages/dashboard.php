<div class="row">
  <div class="col-2 p-0">
    <?php include APPROOT . "/views/fragments/dashboardNav.php"; ?>
  </div>
  <div class="col p-0">
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
    <div class="container-fluid p-0"></div>
  </div>
</div>
<?php include APPROOT . "/views/fragments/footer.php"; ?>
