<?php include APPROOT."/views/fragments/navbar.php"; ?>

<div class="jumbotron">
  <div id="hero-text">
    <h4 class="text-lg text-center text-uppercase font-weight-bold">
      Game Play Party
    </h1>
    <p class="lead text-center">Power to the players</p>
  </div>
</div>


<main class="container mt-5">

  <div class="card mb-5 bg-transparent border-0">
    <div class="row ">

      <div class="col-md-5 px-3 ">
        <div class="card-block px-6 pl-2 ">
          <h4 class="card-title mt-3">Welkom bij Game Play Party</h4>

          <p class="card-text">
            Breng jouw spel naar het volgende niveau op het grote scherm! Met een privé-theater dat speciaal voor jou en je crew is gereserveerd, heb je nog nooit eerder zo gespeeld. Maak er een toernooi van!
          </p>
         
          <br>
          <a href="#" class="mt-auto btn btn-primary  ">Read More</a>
        </div>
      </div>
      <!-- Carousel start -->
      <div class="col-sm-7 col-md-6 col-lg-4 py-5">
        <img src="<?php echo URLROOT; ?>../public/images/mario_cart.png" class=" position-absolute h-75">
    </div>

      <!-- End of carousel -->

    </div>
  </div>
  <!-- End of card -->

</div>
</div>
<p id="location" class="">Locaties<p/>
  <div class="row justify-content-between">
    
    <div class="col-auto mb-3">

      <div class="card" style="width: 20rem; height: 25rem">
        <img class="card-img-top" src="<?php echo URLROOT; ?>../public/images/kino.jpg"
        /alt="Card> image cap" />

        <div class="card-body d-flex flex-column">
          <h5 class="card-title">Utrecht</h5>
          <h6 class="card-subtitle mb-2 text-muted">Pakketen</h6>
          <p class="card-text">
            <i class="fas fa-check text-success"></i> Taart met slingers
          </p>
          <div class="link-container mt-auto d-inline">
            <a href="#" class="card-link">Meer informatie</a>
            <a href="#" class="card-link">Reserveer</a>
          </div>
        </div>
      </div>
    </div>
    <div class="col-auto mb-3">

      <div class="card" style="width: 20rem; height: 25rem">
        <img class="card-img-top" src="<?php echo URLROOT; ?>../public/images/almere.jpg" />

        <div class="card-body d-flex flex-column">
          <h5 class="card-title">Almere</h5>
          <h6 class="card-subtitle mb-2 text-muted">Pakketen</h6>
          <p class="card-text">
            <i class="fas fa-check text-success"></i> Pakket 1
          </p>
          <div class="link-container mt-auto d-inline">
            <a href="#" class="card-link">Meer informatie</a>
            <a href="#" class="card-link">Reserveer</a>
          </div>
        </div>
      </div>
    </div>
    <div class="col-auto mb-3">

      <div class="card" style="width: 20rem; height: 25rem">
        <img class="card-img-top" src="<?php echo URLROOT; ?>../public/images/breda.jpg"
        /alt="Card> image cap" />

        <div class="card-body d-flex flex-column">
          <h5 class="card-title">Breda</h5>
          <h6 class="card-subtitle mb-2 text-muted">Pakketen</h6>
          <p class="card-text">
            <i class="fas fa-check text-success"></i> Pakket 1
          </p>
          <div class="link-container mt-auto d-inline">
            <a href="#" class="card-link">Meer informatie</a>
            <a href="#" class="card-link">Reserveer</a>
          </div>
        </div>
      </div>
    </div>
    <div class="col-auto mb-3">

      <div class="card" style="width: 20rem; height: 25rem">
        <img class="card-img-top" src="<?php echo URLROOT; ?>../public/images/groningen.jpg"
        /alt="Card> image cap" />

        <div class="card-body d-flex flex-column">
          <h5 class="card-title">Groningen</h5>
          <h6 class="card-subtitle mb-2 text-muted">Pakketen</h6>
          <p class="card-text">
            <i class="fas fa-check text-success"></i> Pakket 1
          </p>
          <div class="link-container mt-auto d-inline">
            <a href="#" class="card-link">Meer informatie</a>
            <a href="#" class="card-link">Reserveer</a>
          </div>
        </div>
      </div>
    </div>
    
  </div>
</main>

<?php include APPROOT."/views/fragments/footer.php"; ?>
