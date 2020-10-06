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