<?php include APPROOT."/views/fragments/dashboardNav.php"; ?>
<main>
  <form class="mx-sm-5" action="">
    <div class="form-row">

      <div class="col-md-12 mb-3 mt-3">
        <label for="bedrijfsnaam">Bedrijfsnaam</label>
        <input type="text" class="form-control" id="companyName" placeholder="Bedrijfsnaam" required>
      </div>

      <div class="col-md-12 mb-3 mt-3">
        <label for="locatie">Locatie</label>
        <input type="text" class="form-control" id="location" placeholder="Locatie" required>
      </div>

    </div>

    <hr>

    <div class="custom-file mt-3">
      <input type="file" class="custom-file-input" accept="image/*" onchange="loadFile(event)" id="companyImage">
      <label class="custom-file-label" for="image">Bestand kiezen</label>

      <script>
        var loadFile = function(event) {
          var output = document.getElementById('output');
          output.src = URL.createObjectURL(event.target.files[0]);
          output.onload = function() {
            URL.revokeObjectURL(output.src)
          }
        };
      </script>
    </div>

    <div class="text-center">
      <img class="img-fluid img-thumbnail w-25" style="max-height: 250px !important;" id="output"/>
    </div>

    <button type="submit" class="btn btn-primary mt-3">Bioscoop aanmaken</button>
  </form>
</main>
<?php include APPROOT."/views/fragments/footer.php"; ?>