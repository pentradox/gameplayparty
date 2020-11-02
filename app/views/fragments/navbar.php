<?php include APPROOT."/views/fragments/header.php"; ?>

<nav class="navbar navbar-expand-lg w-100 position-absolute p-0 pr-5">
  <a class="navbar-brand w-75 py-0 mt-n2 mr-0 " href="<?php echo URLROOT; ?>/Home"><img  src="<?php echo URLROOT; ?>/public/images/gpp.svg"></a>
  <button class="navbar-toggler mt-n5 bg-dark  text-white" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
  <i class="fas fa-bars"></i>
  </button>
  <div class="collapse navbar-collapse mr-n5 mt-n5  " id="navbarNav">
    <ul class="navbar-nav ml-auto  pr-5">
      <li class="nav-item ml-3 align-right ">
        <a   class="navLinks text-xl    " href="<?php echo URLROOT; ?>/home">Home</a>
      </li>
      <li class="nav-item ml-3 align-right ">
        <a   class="navLinks text-xl    " href="<?php echo URLROOT; ?>/Home/contact">Contact</a>
      </li>
      <li class="nav-item ml-3 align-right ">
        <a   class="navLinks text-xl    " href="<?php echo URLROOT; ?>/Home/packets">Pakketen</a>
      </li>
      <?php
        if ($_SESSION != null) {
          echo '<li class="nav-item ml-3">
            <a  class="navLinks text-xl  " href="'. URLROOT .'/Dashboard">Gebruikers portaal</a>
          </li>';
        }
      ?>
      <?php
        if ($_SESSION != null) {
          echo '<li class="nav-item ml-3">
            <a class="navLinks    " href="'. URLROOT .'/Userlogin/logout">Logout</a>
          </li>';
        } else {
          echo '<li class="nav-item ml-3">
            <a id="login" class="navLinks   " href="'. URLROOT .'/Userlogin">Login</a>
          </li>';
        }
      ?>
    </ul>
  </div>
</nav>

