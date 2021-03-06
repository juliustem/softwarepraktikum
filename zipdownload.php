<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Mult_Fileupload</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"> <!-- Bootstramp für Container und co -->
    <link href="http://hayageek.github.io/jQuery-Upload-File/4.0.10/uploadfile.css" rel="stylesheet"> <!-- Für farbige Boxen z.B "success" -->
    <link href="style.css" rel="stylesheet" type="text/css"/>
</head>

<style>
.btnSubmit{background-color:#8d8f90;border:0;padding:4px 20px;color:#FFF;border:#F0F0F0 1px solid; border-radius:4px;}
.btnSubmit2{background-color:#6b6bc7;border:0;padding:4px 20px;color:#FFF;border:#F0F0F0 1px solid; border-radius:4px;}
.btnSubmit3{background-color:#000066;border:0;padding:4px 20px;color:#FFF;border:#F0F0F0 1px solid; border-radius:4px;}
body
{
  padding: 30px
}
form
{
  display: block;
  margin: 20px auto;
  background: #eee;
  border-radius: 10px;
  padding: 15px
}
</style>

<body>

  <!-- Überschrift -->
    <div class="container-fluid">
      <div class="jumbotron">
        <h2>Erstellen der statistischen Plots</h2>
        <p>ZIP Ordner anklicken und herunterladen.</p>
        <p> </p>
      </div>

<!-- Navigations Bar -->
  <div id="menuContainer">
    <?php include_once("menu_template.php");
    ?>
  </div>
  <div id="bodyContainer">
    <div id="bodyContentContainer">


<?php

// echo "Du bist jetzt in der Zipdownload-Datei!!";

// Variablen aus der execR.php
SESSION_START();
$oberordner = $_SESSION["oberordner"];
$out_f = $_SESSION["name"];

// zu zippender ordner
$folder = $oberordner;
$zip_name = $out_f . ".zip";

/* file und dir counter
$fc = 0;
$dc = 0;
*/

// die maximale Ausführzeit erhöhen
ini_set("max_execution_time", 300);

exec("zip -r $zip_name $oberordner");

/* Objekt erstellen und schauen, ob der Server zippen kann
$zip = new ZipArchive();
if ($zip->open($zip_name, ZIPARCHIVE::CREATE) !== TRUE) {
    die ("Das Archiv konnte nicht erstellt werden!");
}

echo "<pre>";
// Gehe durch die Ordner und füge alles dem Archiv hinzu
$iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($folder));
foreach ($iterator as $key=>$value) {

  if(!is_dir($key)) { // wenn es kein ordner sondern eine datei ist
    // echo $key . " _ _ _ _Datei wurde übernommen</br>";
    $zip->addFile(realpath($key), $key) or die ("FEHLER: Kann Datei nicht anfuegen: $key");
    $fc++;

  } elseif (count(scandir($key)) <= 2) { // der ordner ist bis auf . und .. leer
    // echo $key . " _ _ _ _Leerer Ordner wurde übernommen</br>";
    $zip->addEmptyDir(substr($key, -1*strlen($key),strlen($key)-1));
    $dc++;

  } elseif (substr($key, -2)=="/.") { // ordner .
    $dc++; // nur für den bericht am ende

  } elseif (substr($key, -3)=="/.."){ // ordner ..
    // tue nichts

  } else { // zeige andere ausgelassene Ordner (sollte eigentlich nicht vorkommen)
    echo $key . "WARNUNG: Der Ordner wurde nicht ins Archiv übernommen.</br>";
  }
}
echo "</pre>";

// speichert die Zip-Datei
$zip->close();

// Bericht
echo "<p>Ordner: " . $dc . "</br>";
echo "Dateien: " . $fc . "</p>";
*/

// Download
 if (file_exists($zip_name)) {
  echo '<p><a href="' . $zip_name . '">' . $zip_name . '</a></p>';
 }

?>

</div>
</div>

</body>