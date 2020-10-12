<?php include APPROOT . "/views/fragments/dashboardNav.php"; ?>


<div class="d-flex justify-content-center container">

  <div class="text-info text-center w-100 d-flex justify-content-center">
    
    <form class=" col-11 col-md-9 col-lg-8 col-xl-6 mb-5" action="<?php echo URLROOT; ?>/Dashboard/updatePackage/<?php echo $data["package"]->id ?>" method="POST" enctype="multipart/form-data">
      <h3 class='text-info  mb-4'>Pakket aanpassen</h3>

      <?php echo (isset($data["message"]) ? "<p class=' alert alert-success'>" . $data["message"] . "</p>" : null); ?>

      <label class="text-info" for="packetName">Pakket naam</label>
      <input type="text" name="name" class="form-control mb-4" value="<?php echo $data["package"]->name; ?>">

      <label class="text-info" for="packetPrice">Pakket prijs</label>
      <input type="number" name="price" class="form-control mb-4" placeholder="" min="0" value="<?php echo $data["package"]->price; ?>">

      <label class="text-info" for="packetDesription">Beschrijving</label>
      <textarea type="text" name="desc" id="tinymce" class="mb-4">
        <?php echo $data["package"]->description; ?>
      </textarea>
      <hr>

      <div class="custom-file mb-4">
        <input name="logo" type="file" class="custom-file-input" id="croppie-input" accept="image/*">
        <label class="custom-file-label" for="Logo">Kies afbeelding</label>
      </div>

      <div>
        <div id="croppie-demo"></div>
      </div>

      <hr>
      <button class="btn btn-info btn-block mt-5" type="submit">Toevoegen</button>
    </form>

  </div>
</div>

</div>
</div>
<script>
	var croppieDemo = $('#croppie-demo').croppie({
  enableOrientation: true,
  viewport: {
      width: 300,
      height: 300,
      type: 'square' // 'square' | 'circle'
  },
  boundary: {
      width: 400,
      height: 400
  }
});

$('#croppie-input').on('change', function () { 
  var reader = new FileReader();
  reader.onload = function (e) {
      croppieDemo.croppie('bind', {
          url: e.target.result
      });
  }
  reader.readAsDataURL(this.files[0]);
});

$('.croppie-upload').on('click', function (ev) {
  croppieDemo.croppie('result', {
      type: 'canvas',
      size: 'viewport',
      viewport: {
        width: 300,
        height: 300,
        type: 'square', // 'square' | 'circle'
    },
  }).then(function (image) {
      $.ajax({
          url: "/upload.php",
          type: "POST",
          data: {
              "image" : image
          },
          success: function (data) {
              html = '<img src="' + image + '" />';
              $("#croppie-view").html(html);
          }
      });
  });
});
</script>
<?php include APPROOT . "/views/fragments/footer.php"; ?>