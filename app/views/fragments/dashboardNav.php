
<?php include APPROOT."/views/fragments/header.php"; ?>
<nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom px-5 mb-5">
        <?php echo $_SESSION["username"] ?> | Beheerders Paneel
        <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item">
              <a class="nav-link" href="<?php echo URLROOT; ?>/Dashboard">Home</a>
            </li>
           <?php if ($_SESSION["roles"] == 1) {
              echo '<li class="nav-item dropdown"><a class="nav-link" href="'. URLROOT .'/Dashboard/acounts">
                Bioscopen
              </a></li>';
              echo '<li class="nav-item dropdown"><a class="nav-link" href="'. URLROOT .'/Dashboard/packageOverview">
                Pakketten
              </a></li>';
           }else{
            echo '<li class="nav-item dropdown"><a class="nav-link" href="'. URLROOT .'/Dashboard/updateaccount/' . $_SESSION["userid"] . '">
            Account
            </a></li>';
            echo '<li class="nav-item dropdown"><a class="nav-link" href="'. URLROOT .'/Dashboard/halls">
              Bioscoop Zalen
            </a></li>';
           }
           ?>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo URLROOT; ?>/Userlogin/logout">Uitloggen</a>
            </li>
          </ul>
        </div>
      </nav>
