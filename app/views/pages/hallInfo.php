<?php include APPROOT . "/views/fragments/navbar.php"; ?>

<div class="jumbotron rounded-0 border-0">
  <div id="hero-text " class=" ">
    <h1 class="text-xl text-center  text-light text-uppercase mb-0 font-weight-bold">
      Game <span class="text-blue">Play</span> Party
    </h1>
    <h2 class="  text-blue text-center ">Power to the players</h2>
  </div>
</div>


<main class="container col-10 col-md-8 mt-5">
  <div class="card mb-5 bg-transparent border-0">
    <div class="row ">

      <div class="col col-md-12  col-xl-5 px-3 ">
        <div class="card-body d-flex flex-column">
          <div class="card-block px-6 pl-2 ">
            <h4 class="card-title mt-3"><?php echo $data["hall"]->name . " " . $data["hall"]->location; ?> <br> zaal <?php echo $data["hall"]->hall_number; ?></h4>
            <div class='table-responsive'>

              <input type="text" hidden name="hall_id" id="hall_id" value="<?php echo $data["hall"]->hall_id; ?>">
              <!--Table-->

            </div>
            <div class="mt-auto align-self-bottom">
              <p class="my-0"><span class="font-weight-bold ">Geluids systeem: </span> <?php echo $data["hall"]->sound_system; ?>
              </p>
              <p class="mb-4"><span class="font-weight-bold">Zitplaatsen: </span> <?php echo $data["hall"]->seats ?> </p>
            </div>
          </div>
        </div>
      </div>

      <div class="col-sm-12 col-xl-7 py-5">
        <img src="<?php echo URLROOT; ?>../public/images/001.jpg" class=" w-100">
      </div>



    </div>



  </div>
  <!-- End of card -->

  </div>
  </div>
  <div class='table-responsive'>
    <div id='calendar'></div>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.3.2/main.min.js"></script>
    <script src="<?php echo URLROOT; ?>/js/visitor.js"></script>
    <!--Table-->
  </div>
  <!-- Hals -->

  <!-- Hals -->

</main>

<?php include APPROOT . "/views/fragments/footer.php"; ?>