<input type="file" id="inputImage">

<script src="assets/vendor/libs/jquery/jquery.js"></script>
<script>
  document.getElementById('inputImage').addEventListener('change', function (event) {
    var file = event.target.files[0];

    var formData = new FormData();
    formData.append('file', file);

    var startTime = new Date().getTime();

    $.ajax({
      url: 'your_php_script.php',
      type: 'post',
      data: formData,
      processData: false,
      contentType: false,
      success: function (response) {
        var endTime = new Date().getTime();
        var timeTaken = (endTime - startTime) / 1000;
        var fileSize = file.size / 1024 / 1024;
        var uploadSpeed = fileSize / timeTaken;

        console.log('File uploaded successfully');
        console.log('Time taken:', timeTaken, 'seconds');
        console.log('File size:', fileSize, 'MB');
        console.log('Upload speed:', uploadSpeed, 'MB/s');
      },
      error: function (error) {
        console.error('Error uploading file:', error);
      },
    });
  });
</script>
