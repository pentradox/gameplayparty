<link rel="stylesheet" href="croppie.css" />
<div class="row overflow-hidden">
  <div class="col-sm-4 col-md-4 col-lg-2 p-0">
    <?php include APPROOT . "/views/fragments/dashboardNav.php"; ?>
  </div>
  <div class="col py-5 " id="dash-container">
      
  <div class="row justify-content-center">

		<form class=" col-md-9 col-lg-8 col-xl-6 border border-light p-5" action="#">
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

			<!-- <div class="custom-file mb-4">
				<input type="file" class="custom-file-input" id="upload-demo" accept="image/*">
				<label class="custom-file-label" for="Logo">Choose file</label>
			</div> -->

			<!-- <button class="btn btn-info btn-block" type="submit">Opslaan</button> -->

		</form>
			
	  	<div class="col-md-4">
				<strong>Select Image:</strong>
				<br/>
				<input type="file" id="upload">
				<br/>
				<button class="btn btn-success upload-result">Upload Image</button>
			</div>
			
			<div class="col-md-4 text-center">
				<div id="upload-demo-i" style="width:350px"></div>
			</div>
			
			<div class="col-md-4 text-center">
				<div id="yeet" style="width:350px"></div>
	  	</div>

		<script>
			var resize = $('#upload-demo-i').croppie({
					enableExif: true,
					enableOrientation: true,    
					viewport: { // Default { width: 100, height: 100, type: 'square' } 
							width: 200,
							height: 200,
							type: 'square' //square
					},
					boundary: {
							width: 300,
							height: 300
					}
			});


			$('#image').on('change', function () { 
				var reader = new FileReader();
					reader.onload = function (e) {
						resize.croppie('bind',{
							url: e.target.result
						}).then(function(){
							console.log('jQuery bind complete');
						});
					}
					reader.readAsDataURL(this.files[0]);
			});


			$('.btn-upload-image').on('click', function (ev) {
				resize.croppie('result', {
					type: 'canvas',
					size: 'viewport'
				}).then(function (img) {
					$.ajax({
					  type: "POST",
					  data: {"image":img},
					  success: function (data) {
					    html = '<img src="' + img + '" />';
					    $("#yeet").html(html);
					  }
					});
				});
			});

		</script>
			
   		</div>
  	</div> 
  </div>
</div>


<script
  src="https://code.jquery.com/jquery-3.5.1.js"
  integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
	crossorigin="anonymous">
</script>

<script src="croppie.js"></script>
  <?php include APPROOT . "/views/fragments/footer.php"; ?>
  