
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
        "image": image
      },
      success: function (data) {
        html = '<img src="' + image + '" />';
        $("#croppie-view").html(html);
      }
    });
  });
});
