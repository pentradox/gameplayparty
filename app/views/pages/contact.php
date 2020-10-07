<?php include APPROOT."/views/fragments/navbar.php";?>

<div class="jumbotron rounded-0 border-0">
  <div id="hero-text " class=" ">
    <?php if(!empty($data[0])) {
      echo '<h1 class="text-xl text-center  text-light text-uppercase mb-0 font-weight-bold">';
      echo $data[0]->title . '</h1>';
      echo '<h2 class="  text-blue text-center ">' . $data[0]->text . '</h2>';
    } else {
      echo '<h1 class="text-xl text-center  text-light text-uppercase mb-0 font-weight-bold">';
      echo 'Neem <span class="text-blue">Contact</span>  op</h1>';
    }?>
  </div>
</div>

<main class="container col-10 col-md-8 mt-5 text-center">
  <div class="card mb-5 bg-transparent border-0">
    <div>
      <div class="card-block px-6 pl-2 ">
        <?php if(!empty($data[2])) {
          echo '<h4 class="card-title mt-3">' . $data[2]->title . '</h4>';
          echo '<p class="card-text">' . $data[2]->text . '</p>';
        } else {
          echo '<h4 class="card-title mt-3">Neem Contact op</h4>';
          echo '<p class="card-text">vul het onderste formulier in om contact op te nemen met het bedrijf.</p>';
        }?>
        <br>
      </div>
    </div>
  </div>
  <?php echo '<form class="p-5" action="' . URLROOT . '/home/sendmail" method="POST">'; ?>
    <label  class="text-info" for="">Voornaam</label>
    <input type="text" name="firstname" class="form-control mb-4" placeholder="" required>

    <label  class="text-info" for="">Achternaam</label>
    <input type="text" name="lastname" class="form-control mb-4" placeholder="" required>

    <label class="text-info" for="">Email</label>
    <input type="email" name="email" class="form-control mb-4" placeholder="" required>

    <label class="text-info" for="">Bericht</label>
    <textarea name="message" class="form-control mb-4" placeholder="" required></textarea>

    <button class="btn btn-info btn-block" type="submit">Verstuur</button>

  </form>
</div>
  <!-- End of card -->

</main>

<?php include APPROOT."/views/fragments/footer.php"; ?>
