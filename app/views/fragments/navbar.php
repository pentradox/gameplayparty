<?php include APPROOT."/views/fragments/header.php"; ?>

<nav class="navbar navbar-expand-lg w-100 position-absolute p-0 pr-5">
  <a class="navbar-brand w-50 py-0 mt-n2 mr-0 " href="<?php echo URLROOT; ?>/Home"><img style="height: 100px;" src="<?php echo URLROOT; ?>/public/images/gpp.svg"></a>
  <button class="navbar-toggler  text-white" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon text-white"></span>
  </button>
  <div class="collapse navbar-collapse mr-n5  " id="navbarNav">
    <ul class="navbar-nav ml-auto  pr-5">
      <li class="nav-item ml-3 align-right ">
        <a id="home"  class="navLinks   " href="<?php echo URLROOT; ?>/home">Home</a>
      </li>
      <?php
        if ($_SESSION != null) {
          echo '<li class="nav-item ml-3">
            <a  class="navLinks   " href="'. URLROOT .'/Dashboard">Home</a>
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

