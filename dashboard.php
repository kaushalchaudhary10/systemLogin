<?php include __DIR__.'/header.php'; ?>
<?php include __DIR__.'../controllers/uploadDocuments.php'; ?>
<!doctype html>
<html lang="en">

<head>
    <?php include __DIR__ .'/commonHeader.php'; ?>
    <title>Dashboard</title>
</head>

<body>
  <div class="container mt-5">
    <form action="" method="post" enctype="multipart/form-data" class="mb-3" id="uploadFileForm">
      <h3 class="text-center mb-5">Upload Multiple file/Images</h3>
      <div class="user-image mb-3 text-center">
        <div class="imgGallery"> 
          <!-- Image preview -->
        </div>
      </div>
      <div class="custom-file">
        <input type="file" name="fileUpload[]" class="custom-file-input" id="chooseFile" multiple>
        <label class="custom-file-label" for="chooseFile">Select file</label>
      </div>
      <button type="submit" name="submit" class="btn btn-primary btn-block mt-4">
        Upload Files
      </button>
    </form>
    <!-- Display response messages -->
    <?php if(!empty($response)) {?>
        <div class="alert <?php echo $response["status"]; ?>">
           <?php echo $response["message"]; ?>
        </div>
    <?php }?>
  </div>

  <script>
    $(function() {
      // Form Validation
      $("#uploadFileForm").validate({
        // Define validation rules
        rules: {
          'fileUpload[]': {
            required: true
          }
        },
        // Specify validation error messages
        messages: {
          'fileUpload[]': "Please select a file to upload"
        },
        submitHandler: function (form) {
            form.submit();
        }
      });

      // Multiple images preview with JavaScript
      var multiImgPreview = function(input, imgPreviewPlaceholder) {
        if (input.files) {
          var filesAmount = input.files.length;
          for (i = 0; i < filesAmount; i++) {
            var reader = new FileReader();
            reader.onload = function(event) {
              $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(imgPreviewPlaceholder);
            }
            reader.readAsDataURL(input.files[i]);
          }
        }
      };
      $('#chooseFile').on('change', function() {
          multiImgPreview(this, 'div.imgGallery');
      });
    });    
  </script>

  <?php 
    if(!empty($fetchFiles)) {
      foreach($fetchFiles as $fileData) {
        $allowFileExt = array('jpg', 'png', 'jpeg');
        $fileExt = pathinfo($fileData['file_name'], PATHINFO_EXTENSION); 
        $fileURL='uploads/'.$fileData['file_name'];
        
        if(in_array($fileExt, $allowFileExt)){
          $imgURL='uploads/'.$fileData['file_name'];
  ?>
    <div class="images">
    <img src="<?php echo $fileURL ?>">
    </div>
  <?php
        }
      }
    }
  ?>
</body>
</html>