<?php include APPROOT."/views/fragments/header.php"; ?>
<nav class="nav-dashboard p-0 ">
    <div class="brand">
        <img src="<?php echo URLROOT; ?>/public/graph/gpp.svg" alt="">
    </div>
    <ul>
        <a href="">
            <li>Dashboard</li>
        </a>
        <a href="<?php echo URLROOT; ?>/Dashboard/halls">
            <li>Bioscoop zalen</li>
        </a>
        <a href="<?php echo URLROOT; ?>/Dashboard/acounts">
            <li>Bioscopen</li>
        </a>
        <a href="<?php echo URLROOT; ?>/Userlogin/logout">
            <li>Uit loggen</li>
        </a>
    </ul>
</nav>