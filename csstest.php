
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Upload Files</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="http://hayageek.github.io/jQuery-Upload-File/4.0.10/uploadfile.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="http://hayageek.github.io/jQuery-Upload-File/4.0.10/jquery.uploadfile.min.js"></script>
</head>

<body>

<div class="container">
  <div class="jumbotron">
    <h1>Willkommen</h1>      
    <p>Hier kannst du deine *.CEL Files herunterladen und kriegst was dafür ;-) </p>
  </div>
  <p class="bg-success">Genieße es!</p>    
  
  <form action="upload.php" method="POST" enctype="multipart/form-data">
            <p>
                <input type="file" name="import" id="import" /></p>
            <p><input type="submit" name="submit" value="Submit" /></p>
        </form>
</div>    

<?php

include ("ht.php")
?>
      
</body>     
  </html>

        