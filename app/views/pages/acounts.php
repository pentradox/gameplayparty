<div id="content-wrap">
  <div class="row" >
    <div class="col-2 p-0">
      <?php include APPROOT . "/views/fragments/dashboardNav.php"; ?>
    </div>
    <div class="col p-0">
      <div class="section px-5 p-5">
        
        <table class="mt-3 table">
          <thead>
              <tr>

                  <th scope="col">Bioscoop</th>
                  <th scope="col">Gebruikersnaam</th>
                  <th scope="col">Mail</th>
                  <th scope="col"></th>
                  <th scope="col"></th>
              </tr>
          </thead>
          <tbody>
              <?php
              if (isset($data["users"])) {
                  foreach ($data["users"] as $user) {
                      echo "<tr scope='row'>

                    
                      <td>". $user->name ."</td>

                      <td>". $user->name . " ". $user->location ."</td>
                      <td>". $user->mail ."</td>
                      <td><a href='#'><i class='fas fa-cog'></i></a></td>
                      <td><a href='#'><i class='fas fa-trash'></i></a></td>
                      </tr>";
                  }
              } else {
                  echo '<tr>
                  <td align="center" colspan="6">Geen gebruikers gevonden!</td>
                  </tr>'; 
              }
              ?>
          </tbody>
      </table>
      </div>
      <div class="container-fluid p-0 hidden"></div>
       
      </div>
    </div>
  </div>
</div>
<?php include APPROOT . "/views/fragments/footer.php"; ?>
