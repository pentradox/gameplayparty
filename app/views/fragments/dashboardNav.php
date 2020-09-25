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
    <a href="<?php echo URLROOT; ?>/Dashboard/halls">
      <li>Bioscoop zalen</li>
    </a>
    <a href="<?php echo URLROOT; ?>/Dashboard/acounts">
      <li>Bioscopen</li>
    </a>
    <a href="<?php echo URLROOT; ?>/Dashboard/createPacket">
      <li>Pakket aanmaken</li>
    </a>
    <a href="<?php echo URLROOT; ?>/Userlogin/logout">
      <li>Uit loggen</li>
    </a>
  </ul>
</nav>
