<?php include APPROOT . "/views/fragments/dashboardNav.php"; ?>

<div class="container-fluid">
  <div class="row">
    <div class="col-md-4">

      <div class="card">

        <div class="card-body">
          <i class="fa fa-home" aria-hidden="true"></i>
          <p class="card-text">Voorpagina</p>
          <a href="<?php echo URLROOT ;?>/Dashboard/frontpageEditor" class="btn btn-primary">Aanpassen</a>
        </div>

      </div>

    </div>

    <div class="col-md-4">

    <div class="card">
      <div class="card-body">
        <i class="fa fa-address-book" aria-hidden="true"></i>
        <p class="card-text">Contactpagina</p>
          <a href="<?php echo URLROOT ;?>/Dashboard/contactPageEditor" class="btn btn-primary">Aanpassen</a>
      </div>
    </div>

    </div>

    <div class="col-md-4">

    </div>

  </div>

  <div class="row">
    <div class="col-md-4">

    </div>

    <div class="col-md-4">

    </div>

    <div class="col-md-4">

    </div>
  </div>

</div>




<?php include APPROOT . "/views/fragments/footer.php"; ?>
