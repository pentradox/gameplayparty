
<?php include APPROOT . "/views/fragments/dashboardNav.php"; ?>
<div class="row overflow-hidden">
  
  <div class="col py-5 " id="dash-container">
      
  <div class="row justify-content-center">

		<form class=" col-10 border border-light p-5" action="<?php echo URLROOT ?>/Dashboard/updateaccount" method="POST" enctype="multipart/form-data">
			<div class="text-info text-center mb-5">
				<h3 class="text-info  mb-4">Account instellingen
				</p>
      </div>
      <input type="text" hidden name="id" value="<?php echo $data["user"]->id; ?>">
      <?php
      if (isset($data["name_error"])) {
        echo '<label  class="text-danger" for="name">Naam</label>
        <input type="text" name="name" id="name" class="form-control is-invalid mb-4" value="'. $data["user"]->name .'">
        <small class="text-danger">'.$data["name_error"].'</small><br>';
      } else {
        echo '<label  class="text-info" for="name">Naam</label>
        <input type="text" name="name" id="name" class="form-control mb-4" value="'. $data["user"]->name .'">';
      }
      if (isset($data["mail_error"])) {
        echo '<label class="text-danger" for="mail">Email</label>
        <input type="email" name="mail" id="mail" class="form-control is-invalid mb-4" value="'. $data["user"]->mail .'">
        <small class="text-danger">'.$data["mail_error"].'</small><br>';
      } else {
        echo '<label class="text-info" for="mail">Email</label>
        <input type="email" name="mail" id="mail" class="form-control mb-4" value="'. $data["user"]->mail .'">';
      }
      if (isset($data["locatie_error"])) {
        echo '<label class="text-danger" for="loc">locatie</label>
        <input type="text" name="location" id="loc" class="form-control is-invalid mb-4" value="'. $data["user"]->location .'">
        <small class="text-danger">'.$data["locatie_error"].'</small><br>';
      } else {
        echo '<label class="text-info" for="loc">locatie</label>
        <input type="text" name="location" id="loc" class="form-control mb-4" value="'. $data["user"]->location .'">';
      }
      if (isset($data["phone_error"])) {
        echo '<label class="text-danger" for="phone">Telefoon</label>
        <input type="text" name="phone" id="phone" class="form-control is-invalid mb-4" value="'.$data["user"]->phone.'">
        <small class="text-danger">'.$data["phone_error"].'</small><br>';
      } else {
        echo '<label class="text-info" for="phone">Telefoon</label>
			  <input type="text" name="phone" id="phone" class="form-control mb-4" value="'.$data["user"]->phone.'">';
      }
      if (isset($data["description_error"])) {
        echo '<label class="text-danger" for="disc">Beschrijving</label>
        <textarea class="form-control is-invalid mb-4" id="disc" name="description" id="" cols="30" rows="10">'. $data["user"]->description . '</textarea>
        <small class="text-danger">'.$data["description_error"].'</small><br>';
      } else {
        echo '<label class="text-info" for="disc">Beschrijving</label>
        <textarea class="form-control mb-4" id="disc" name="description" id="" cols="30" rows="10">'. $data["user"]->description . '</textarea>';
      }
      ?>
			<hr>

			<div class="custom-file mb-4">
				<input name="logo" type="file" class="custom-file-input" id="croppie-input" accept="image/*">
				<label class="custom-file-label" for="Logo">Kies afbeelding</label>
      </div>
      
      <div>
        <div id="croppie-demo"></div>
      </div>

			<hr>

			<button class="btn btn-info btn-block" type="submit">Opslaan</button>

		</form>
			
   		</div>
  	</div> 
  </div>
</div>

<?php
      if (isset($data["message"])) {
        echo "<small class='alert alert-primary' style='position:fixed; bottom:0; right:0;'>".$data["message"]."</small><br>";
      }
      ?>

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
  