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
<div class="container-fluid">
<div class="jumbotron">
<h2>Willkommen</h2>
</div>
<?php
if (!isset ($_POST["sub"])){
?>
<form action="" method="POST" enctype="multipart/form-data">
<input type="file" name="datei" id="datei"><br>
<input type="submit" value="Hochladen" name="sub">
</form>
<?php
$ziel = "upload/";
echo "<h2>Bisher hochgeladene Dateien</h2>";
$verzeichnis=opendir($ziel);
while ($file = readdir($verzeichnis))
{
if(is_file($ziel."/".$file))
{
echo "<a href='$ziel/$file' target=_blank>$file</a><br>"; 
}
}
closedir($verzeichnis);


}

else {
	 $ziel = "upload/";
    $zieldatei = $ziel.basename($_FILES["datei"]["name"]);
    if (move_uploaded_file($_FILES["datei"]["tmp_name"], $zieldatei)) {
        echo "Datei erfolgreich hochgeladen";
    }
    else {
        echo "Fehler";
    }
    
    ?>

<?php 
        echo "Upload: " . $_FILES["datei"]["name"] . "<br />";
        echo "Type: " . $_FILES["datei"]["type"] . "<br />";
        echo "Size: " . ($_FILES["datei"]["size"] / 1024) . " KB<br />";
        echo "Temp file: " . $_FILES["datei"]["tmp_name"] . "<br />";
echo "<h2>Bisher hochgeladene Dateien</h2>";
$verzeichnis=opendir($ziel);
while ($file = readdir($verzeichnis))
{
if(is_file($ziel."/".$file))
{
echo "<a href='$ziel/$file' target=_blank>$file</a><br>"; 
}
}
closedir($verzeichnis);

echo "<h2>Weitere hochladen:</h2>"

?>
<form action="" method="POST" enctype="multipart/form-data">
<input type="file" name="datei" id="datei"><br>
<input type="submit" value="Hochladen" name="sub">
</form>
<?php
}
?>