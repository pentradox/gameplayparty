
<?php include APPROOT . "/views/fragments/dashboardNav.php"; ?>
<div class="row overflow-hidden">
  
  <div class="col py-5 " id="dash-container">
      
  <div class="row justify-content-center">

		<form class=" col-10 border border-light p-5" action="#">
			<div class="text-info text-center mb-5">
				<h3 class="text-info  mb-4">Account instellingen
				</p>
			</div>

			<label  class="text-info" for="">Naam</label>
			<input type="text"  class="form-control mb-4" placeholder="">
					
			<label class="text-info" for="">Email</label>
			<input type="email"  class="form-control mb-4" placeholder="">
					
			<label class="text-info" for="">Oud wachtwoord</label>
			<input type="password"  class="form-control mb-4" placeholder="">

			<label class="text-info" for="">Nieuw wachtwoord</label>
			<input type="password"  class="form-control mb-4" placeholder="">

			<label class="text-info" for="">Herhaal nieuw wachtwoord</label>
			<input type="password"  class="form-control mb-4" placeholder="">

			<hr>

			<div class="custom-file mb-4">
				<input type="file" class="custom-file-input" id="croppie-input" accept="image/*">
				<label class="custom-file-label" for="Logo">Choose file</label>
			</div>

      <div>
        <div id="croppie-demo"></div>
      </div>
      <div class="mb-4">
        <div id="croppie-view"></div>
      </div>

			<hr>

			<button class="btn btn-info btn-block" type="submit">Opslaan</button>

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
      size: 'viewport'
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
  