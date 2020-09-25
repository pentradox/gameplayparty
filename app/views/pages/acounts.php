<div id="wrap">
  <div class="row" >
    <div class="col-2 p-0">
      <?php include APPROOT . "/views/fragments/dashboardNav.php"; ?>
    </div>
    <div class="col p-0">
      <div class="section px-5 p-5">
        <a
          class="btn btn-primary mt-3"
          href="<?php echo URLROOT ?>/Register/registerBios"
          >Bioscoop Toevoegen</a
        >
        <table class="mt-3 table">
          <thead>
            <tr>
              <th scope="col">Bioscoop</th>
              <th scope="col">Gebruikersnaam</th>
              <th scope="col"></th>
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody>
            <tr scope="row">
              <td>Test Bios</td>
              <td>Test Gebruikersnaam</td>

              <td>
                <a href='" . URLROOT . "/Dashboard/updatehall/". $hall->id ."'
                  ><i class="fas fa-cog"></i
                ></a>
              </td>
              <td><i class="fas fa-trash"></i></td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="container-fluid p-0 hidden"></div>
       
      </div>
    </div>
  </div>
</div>
<?php include APPROOT . "/views/fragments/footer.php"; ?>
