<?php include APPROOT."/views/fragments/header.php"; ?>
<nav class="nav-dashboard p-0">
  <div class="brand pl-2">
    <a href="<?php echo URLROOT; ?>/"
      ><img src="<?php echo URLROOT; ?>/public/graph/gpp.svg" alt=""
    /></a>
  </div>
  <ul>
    <a href="<?php echo URLROOT; ?>/Dashboard">
      <li class="px-1">Dashboard</li>
    </a>
    <?php
    if ($_SESSION["roles"] == 1) {
      echo '<a href="'. URLROOT .'/Dashboard/acounts">
        <li>Bioscopen</li>
      </a>
      <a href="'. URLROOT .'/Dashboard/createPacket">
        <li>Pakket aanmaken</li>
      </a>';
    } else {
      echo '<a href="'. URLROOT .'/Dashboard/halls">
      <li>Bioscoop zalen</li>
      </a>';
    }
    ?>
    <a href="<?php echo URLROOT; ?>/Userlogin/logout">
      <li>Uitloggen</li>
    </a>
  </ul>
</nav>
