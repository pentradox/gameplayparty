


      <?php include APPROOT . "/views/fragments/dashboardNav.php"; ?>


      <div class="row justify-content-center">



      <?php echo '<form class=" col-11 col-md-9 col-lg-8 col-xl-6 mb-5 " action="' . URLROOT . '/Dashboard/addPacket" method="POST">'; ?>
        <div class="text-info text-center mb-5">
        <?php
        if(!empty($data)) {
          echo "<h3>" . $data . "</p>";
        } else {
          echo "<h3 class='text-info  mb-4'>Pakketen toevoegen";
        }
        ?>
        </p>

        </div>

        <label  class="text-info" for="packetName">Pakket naam</label>
        <input type="text" name="packet_name" class="form-control mb-4" placeholder="">

        <label class="text-info" for="packetPrice">Pakket prijs</label>
        <input type="number"  name="packet_price" class="form-control mb-4" placeholder="" min="0">

        <label class="text-info" for="packetDesription">Beschrijving</label>
        <textarea type="text" name="packet_description" id="tinymce" class="mb-4"></textarea>

        <button class="btn btn-info btn-block mt-5" type="submit">Toevoegen</button>

        </form>

      </div>
      </div>

    </div>
  </div>
  <?php include APPROOT . "/views/fragments/footer.php"; ?>
