
<?php include APPROOT."/views/fragments/header.php"; ?>
<nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom px-5 mb-5">
        <?php echo $_SESSION["username"] ?> | Beheerders Paneel
        <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item active">
              <a class="nav-link" href="<?php echo URLROOT; ?>/home">Home</a>
            </li>
           
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Acties
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
              <?php
    if ($_SESSION["roles"] == 1) {
      echo '<a class="dropdown-item" href="'. URLROOT .'/Dashboard/acounts">
        Bioscopen
      </a>
      <a class="dropdown-item" href="'. URLROOT .'/Dashboard/createPacket">
        Pakket Aanmaken
      </a>';
    } else {
      echo '<a class="dropdown-item" href="'. URLROOT .'/Dashboard/halls">
      Bioscoop zalen
      </a>';
    }
    ?>
                
                
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo URLROOT; ?>/Userlogin/logout">Uitloggen</a>
            </li>
          </ul>
        </div>
      </nav>
