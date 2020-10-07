<?php include APPROOT."/views/fragments/navbar.php";?>

<div class="jumbotron rounded-0 border-0">
  <div id="hero-text " class=" ">
    <?php if(!empty($data[1][0])) {
      echo '<h1 class="text-xl text-center  text-light text-uppercase mb-0 font-weight-bold">';
      echo $data[1][0]->title . '</h1>';
      echo '<h2 class="  text-blue text-center ">' . $data[1][0]->text . '</h2>';
    } else {
      echo '<h1 class="text-xl text-center  text-light text-uppercase mb-0 font-weight-bold">';
      echo 'Game <span class="text-blue">Play</span>  Party</h1>';
      echo '<h2 class="  text-blue text-center ">Power to the players</h2>';
    }?>
  </div>
</div>

<main class="container col-10 col-md-8 mt-5">
  <div class="card mb-5 bg-transparent border-0">
    <div class="row ">

      <div class="col col-md-12 col-xl-5  px-3 ">
        <div class="card-block px-6 pl-2 ">
          <?php if(!empty($data[1][1])) {
            echo '<h4 class="card-title mt-3">' . $data[1][1]->title . '</h4>';
            echo '<p class="card-text">' . $data[1][1]->text . '</p>';
          } else {
            echo '<h4 class="card-title mt-3">Welkom bij Game Play Party</h4>';
            echo '<p class="card-text">Breng jouw spel naar het volgende niveau op het grote scherm! Met een privé-theater dat speciaal voor jou en je crew is gereserveerd, heb je nog nooit eerder zo gespeeld. Maak er een toernooi van!</p>';
          }?>
          <br>
          <a href="<?php echo URLROOT; ?>/Home/info" class="mt-auto btn btn-blue">Dingen die je moet weten</a>
        </div>
      </div>

      <div class="col-sm-12 col-xl-7 py-5">
        <img src="<?php echo URLROOT; ?>/images/mario_cart.png" class=" w-100">
    </div>



    </div>


    <div class="row ">
      <div class="col-sm-12 col-xl-7 py-5">
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img class="d-block w-100" src="<?php echo URLROOT; ?>/images/rush.jpg" alt="First slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="<?php echo URLROOT; ?>/images/fn.jpg" alt="Second slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="<?php echo URLROOT; ?>/images/xbox-games.jpg" alt="Third slide">
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
    </div>
    <div class="col col-md-12 col-xl-5  px-3 ">
      <div class="card-block px-6 pl-2 ">
        <?php if(!empty($data[1][2])) {
          echo '<h4 class="card-title mt-3">' . $data[1][2]->title . '</h4>';
          echo '<p class="card-text">' . $data[1][2]->text . '</p>';
        } else {
          echo '<h4 class="card-title mt-3">Hoe het werkt</h4>';
          echo '<p class="card-text">Neem je eigen favoriete Xbox One-spellen mee of kies uit het aanbod van je theater.</p>';
        }?>
        <br>
        <a href="<?php echo URLROOT; ?>/Home/info" class="mt-auto btn btn-yellow ">Dingen die je moet weten</a>
      </div>
    </div>



    </div>
  </div>
  <!-- End of card -->

</div>
</div>
<section class="location-container mb-5">
<p id="location" class="">Locaties</p>
  <div class="row ">
  <?php
    foreach ($data[0] as $cinema) {
      if ($cinema->logo != null) {
        echo '<div class="col-sm-12 col-md-6 col-lg-4 mb-3">
          <div class="card cinima-card" >
            <img class="card-img-top cinima-img" src="' . URLROOT . '/images/logos/'.$cinema->logo.'"
            /alt="Card> image cap" />

            <div class="card-body d-flex flex-column">
              <h5 class="card-title">'.$cinema->location.'</h5>
              <h6 class="card-subtitle mb-2 text-muted">Pakketen</h6>
              <p class="card-text">
                <i class="fas fa-check text-success"></i> Taart met slingers
              </p>
              <div class="link-container mt-auto d-inline">
                <a href="'. URLROOT .'/Home/cinima/'.$cinema->id.'" class="card-link">Meer informatie</a>
                <a href="#" class="card-link">Reserveer</a>
              </div>
            </div>
          </div>
        </div>';
      }
    }
    ?>
  </div>
  </section>
</main>

<?php include APPROOT."/views/fragments/footer.php"; ?>
