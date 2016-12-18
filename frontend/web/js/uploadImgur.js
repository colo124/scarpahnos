function uploadBeforeSumbit() {
  event.preventDefault();
  var fileInput = document.getElementById('motor-imagen');
  var imageURL = document.getElementById('imageUrl');
  var file = fileInput.files[0];
  var imageType = /image.*/;

  if (file.type.match(imageType)) {
    var reader = new FileReader();

    reader.onload = function(e) {
      var img = document.createElement("img");
      img.src=reader.result;
      var canvas = document.getElementById('canvas');
      var MAX_WIDTH = 800;
      var MAX_HEIGHT = 600;
      var width = img.width;
      var height = img.height;

      if (width > height) {
        if (width > MAX_WIDTH) {
          height *= MAX_WIDTH / width;
          width = MAX_WIDTH;
        }
      } else {
        if (height > MAX_HEIGHT) {
          width *= MAX_HEIGHT / height;
          height = MAX_HEIGHT;
        }
      }
      canvas.width = width;
      canvas.height = height;
      var ctx = canvas.getContext("2d");
      ctx.drawImage(img, 0, 0, width, height);
      var base64img = canvas.toDataURL("image/jpeg").replace('data:image/jpeg;base64,', '');
      $.ajax({
          url: 'https://api.imgur.com/3/image',
          headers: {
              'Authorization': 'Client-ID 9f6653c3d5f2ea4'
          },
          type: 'POST',
          data: {
              'image': base64img
          },
          success: function(data) {
              console.log(data.data.link);
              imageURL.value=data.data.link;
              var fileInput = document.getElementById('motor-imagen');
              fileInput.value="";
              document.getElementById("frmUpload").submit();

          },
          error: function(data) { console.log(data); }
      });
    }
    reader.readAsDataURL(file);
  } else {
    fileDisplayArea.innerHTML = "File not supported!";
  }
}
