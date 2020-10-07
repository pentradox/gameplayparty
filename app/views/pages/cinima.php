<?php include APPROOT."/views/fragments/navbar.php"; ?>

<div class="jumbotron rounded-0 border-0" >
  <div id="hero-text " class=" ">
    <h1 class="text-xl text-center  text-light text-uppercase mb-0 font-weight-bold">
      Game <span class="text-blue">Play</span>  Party
    </h1>
    <h2 class="  text-blue text-center ">Power to the players</h2>
  </div>
</div>


<main class="container col-10 col-md-8 mt-5">
  <div class="card mb-5 bg-transparent border-0">
    <div class="row ">

      <div class="col col-md-12 col-xl-5 px-3 ">
        <div class="card-body d-flex flex-column">
        <div class="card-block px-6 pl-2 ">
          <h4 class="card-title mt-3">Kinopolis Breda</h4>
          <p class="card-text">
            Breng jouw spel naar het volgende niveau op het grote scherm! Met een privé-theater dat speciaal voor jou en je crew is gereserveerd, heb je nog nooit eerder zo gespeeld. Maak er een toernooi van!
          </p>
          <div class="mt-auto align-self-bottom">
            <p class="my-0"><span class="font-weight-bold ">Telefoon nummer: </span> 0612345678
            </p>
            <p class="mb-4"><span class="font-weight-bold">Adress: </span> Bredastraat 3424PG Breda </p>
            <a href="<?php echo URLROOT; ?>/Home/info" class="mt-auto card-link btn btn-blue">Dingen die je moet weten</a>
        </div>
    </div>
</div>
</div>
      
      <div class="col-sm-12 col-xl-7 py-5">
        <img src="<?php echo URLROOT; ?>../public/images/breda.jpg" class=" w-100">
    </div>

 

    </div>

    
   
  </div>
  <!-- End of card -->

</div>
</div>
<!-- Hals -->

  <!-- Hals -->
<section class="location-container mb-5">
<p id="location" class="">Zalen</p>
  <div class="row ">
  
    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4 mb-3">
          <div class="card cinima-card" >
            <img class="card-img-top cinima-img h-50" src=" <?php echo URLROOT; ?>../public/images/001.jpg"
            /alt="Card> image cap" />

            <div class="card-body d-flex flex-column">
              <h5 class="card-title">Zaal 1</h5>
              
              <p class="card-text">
                <i class="fas fa-users"></i> 66 plekken <br>
                <i class="fas fa-volume-up"></i> Bas die het schreeuwt
              </p>
              <div class="link-container mt-auto d-inline">
                <a href="'. URLROOT .'/Home/cinima" class="card-link">Meer informatie</a>
                
              </div>
              
              </div>
            
          </div>
        </div>

        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4 mb-3">
            <div class="card cinima-card" >
              <img class="card-img-top cinima-img h-50" src=" <?php echo URLROOT; ?>../public/images/002.jpg"
              /alt="Card> image cap" />
  
              <div class="card-body d-flex flex-column">
                <h5 class="card-title">Zaal 2</h5>
                
                <p class="card-text">
                  <i class="fas fa-users"></i> 66 plekken <br>
                  <i class="fas fa-volume-up"></i> Bas die het schreeuwt
                </p>
                <div class="link-container mt-auto d-inline">
                  <a href="'. URLROOT .'/Home/cinima" class="card-link">Meer informatie</a>
                  
                </div>
                
                </div>
              
            </div>
          </div>

          <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4 mb-3">
            <div class="card cinima-card" >
              <img class="card-img-top cinima-img h-50" src=" <?php echo URLROOT; ?>../public/images/003.jpg"
              /alt="Card> image cap" />
  
              <div class="card-body d-flex flex-column">
                <h5 class="card-title">Zaal 3</h5>
                
                <p class="card-text">
                  <i class="fas fa-users"></i> 66 plekken <br>
                  <i class="fas fa-volume-up"></i> Bas die het schreeuwt
                </p>
                <div class="link-container mt-auto d-inline">
                  <a href="'. URLROOT .'/Home/cinima" class="card-link">Meer informatie</a>
                  
                </div>
                
                </div>
              
            </div>
          </div>
    
  </div>
  
  </section>
</main>

<?php include APPROOT."/views/fragments/footer.php"; ?>
