function uploadBeforeSumbit() {
  event.preventDefault();
  alert('Hola!');
  var fileInput = document.getElementById('motor-imagen');
  var imageURL = document.getElementById('imageUrl');
  var file = fileInput.files[0];
  var imageType = /image.*/;

  if (file.type.match(imageType)) {
    var reader = new FileReader();

    reader.onload = function(e) {
      var base64img = reader.result.replace('data:image/jpeg;base64,', '');
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
