


      <?php include APPROOT . "/views/fragments/dashboardNav.php"; ?>
   
      
      <div class="row justify-content-center">
  
  
   
      <form class=" col-md-9 col-lg-8 col-xl-6  " action="#!">
        <div class="text-info text-center mb-5">
        <h3 class="text-info  mb-4">Pakketen toevoegen
        </p>
        
        
        
        </div>
        

        <label  class="text-info" for="packetName">Pakket naam</label>
        <input type="text"  class="form-control mb-4" placeholder="">
        
        <label class="text-info" for="packetPrice">Pakket prijs</label>
        <input type="number"  class="form-control mb-4" placeholder="">
        
        <label class="text-info" for="packetDesription">Beschrijving</label>
        <textarea  type="text"  class=" form-control mb-4" placeholder="" rows="4" ></textarea>
        
        <button class="btn btn-info btn-block" type="submit">Toevoegen</button>
        
        
        </form>
  
      </div>
      </div>
  
      
    </div>
  </div>
  <?php include APPROOT . "/views/fragments/footer.php"; ?>
  