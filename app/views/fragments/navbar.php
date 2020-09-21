<?php include APPROOT."/views/fragments/header.php"; ?>
<nav class="navbar navbar-expand-lg navbar-light bg-secondary p-0">
  <a class="navbar-brand py-0" href="<?php echo URLROOT; ?>/Home"><img style="height: 100px;" src="<?php echo URLROOT; ?>/public/images/gpp.svg"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse " id="navbarNav">
    <ul class="navbar-nav ml-auto pr-5">
      <li class="nav-item align-right active">
        <a class="nav-link" href="<?php echo URLROOT; ?>/Home">Home <span class="sr-only">(current)</span></a>
      </li>
      <?php
        if ($_SESSION != null) {
          echo '<li class="nav-item">
            <a class="nav-link" href="'. URLROOT .'/Dashboard">Dashboard</a>
          </li>';
        }
      ?>
      <?php
        if ($_SESSION != null) {
          echo '<li class="nav-item">
            <a class="nav-link" href="'. URLROOT .'/Admin/logout">Logout</a>
          </li>';
        } else {
          echo '<li class="nav-item">
            <a class="nav-link" href="'. URLROOT .'/Admin">Login</a>
          </li>';
        }
      ?>
    </ul>
  </div>
</nav>
