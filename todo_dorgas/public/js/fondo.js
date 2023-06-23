function changeImageColor() {
    var fileInput = document.getElementById('fondo');
    var image = document.getElementById('img1');
    console.log("leiotn");

    if (fileInput.files && fileInput.files[0]) {
      image.classList.add('image-green');
    } else {
      image.classList.remove('image-green');
    }
  }
