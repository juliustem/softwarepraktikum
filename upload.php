
 <!DOCTYPE html>
<html lang="en">
<head>
  <title>Upload Files</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<?php
include("hauptseiteupload.php")
?>

  <p class="bg-success">
<?php 
 
    if ($_FILES["import"]["error"] > 0)
    {
        echo "Return Code: " . $_FILES["import"]["error"] . "<br />";
    }
    
    else
    {
        echo "Upload: " . $_FILES["import"]["name"] . "<br />";
        echo "Type: " . $_FILES["import"]["type"] . "<br />";
        echo "Size: " . ($_FILES["import"]["size"] / 1024) . " KB<br />";
        echo "Temp file: " . $_FILES["import"]["tmp_name"] . "<br />";
}
?>

<form method="get" action="file.doc">
<button type="submit">Download!</button>
</form>

<a href="file.ext">download this file</a>

 </body> 
</html>
