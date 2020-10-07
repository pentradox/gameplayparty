<?php include APPROOT."/views/fragments/navbar.php";?>

<div class="jumbotron rounded-0 border-0" style="height:300px">
  <div id="hero-text " class=" ">
    <?php if(!empty($data[1][0])) {
      echo '<h1 class="text-xl text-center  text-light text-uppercase mb-0 font-weight-bold">';
      echo $data[1][0]->title . '</h1>';
      echo '<h2 class="  text-blue text-center ">' . $data[1][0]->text . '</h2>';
    } else {
      echo '<h1 class="text-xl text-center  text-light text-uppercase mb-0 font-weight-bold">';
      echo 'Neem <span class="text-blue">Contact</span>  op</h1>';
    }?>
  </div>
</div>

<main class="container col-10 col-md-8 mt-5">
  <div class="card mb-5 bg-transparent border-0">

    <div>
      <div>
        <div class="card-block px-6 pl-2 ">
          <?php if(!empty($data[1][2])) {
            echo '<h4 class="card-title mt-3">' . $data[1][2]->title . '</h4>';
            echo '<p class="card-text">' . $data[1][2]->text . '</p>';
          } else {
            echo '<h4 class="card-title mt-3">Dingen die je moet weten</h4>';
            echo '<p class="card-text"> ' . "Er is geen minimum voor groepen, maar het wordt aanbevolen dat de groepsgrootte tussen de 8 en 12 personen is. Dit zal de speeltijd voor elke speler maximaliseren.
            Voel je vrij om je eigen Xbox-spel mee te nemen om te spelen (persoonlijke spelconsoles of spellen voor andere spelconsoles zijn niet toegestaan).
            Er is geen leeftijdsgrens voor videospelletjes op Xbox, maar de ouders moeten wel zelf kunnen beslissen over de spelbeoordeling van oudere gamers (d.w.z., titels met een 'M'-rating).
            Feesten kunnen maximaal 6 weken voor de datum van uw voorkeur worden aangevraagd en zijn niet gegarandeerd tot de datum is bevestigd en geboekt door het theater.
            Voor elke partij kan een aanbetaling van $50 worden gevraagd en kan op elk moment voor de partij aan de kassa worden betaald. De boeking kan pas worden gereserveerd na ontvangst van de aanbetaling.
            Annuleringen met een opzegtermijn van minder dan 24 uur kunnen leiden tot een niet-terugvorderbare aanbetaling.
            Buiten eten en drinken is niet toegestaan in de theatercomplexen, maar als u een verjaardag viert, kunt u uw eigen verjaardagstaart meenemen! Wij zorgen voor de borden, servetten en bestek.
            Feesten kunnen op elk moment buiten de openingsuren geboekt worden. Een voorbeeldboeking is zaterdag 10.00 - 12.00 uur of eender welke nacht na 22.30 uur, in afwachting van beschikbaarheid in bepaalde theaters en kan rechtstreeks bij het theater worden bevestigd.
            Cadeaubonnen, alle belangrijke creditcards en debetkaarten worden geaccepteerd als betaalmiddel.
            Het is mogelijk dat er op sommige locaties doordeweeks geen partyboekingen beschikbaar zijn." . '</p>';
          }?>
          <br>
        </div>
      </div>



    </div>

    <div class="row">
      <div style="width: 100%;">
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img class="d-block w-100" src="<?php echo URLROOT; ?>../public/images/rush.jpg" alt="First slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="<?php echo URLROOT; ?>../public/images/fn.jpg" alt="Second slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="<?php echo URLROOT; ?>../public/images/xbox-games.jpg" alt="Third slide">
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
  </div>
</div>
  <!-- End of card -->

</main>

<?php include APPROOT."/views/fragments/footer.php"; ?>
