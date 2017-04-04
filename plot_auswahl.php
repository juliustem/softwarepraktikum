<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Mult_Fileupload</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"> <!-- Bootstramp für Container und co -->
    <link href="http://hayageek.github.io/jQuery-Upload-File/4.0.10/uploadfile.css" rel="stylesheet"> <!-- Für farbige Boxen z.B "success" -->
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
      <p>Wählen Sie einzelne Plots oder das Gesamtpaket aus und laden Sie diese anschließend herunter.</p>
    </div>


<?php

ini_set("max_execution_time", 300);

//Abschalter der warnings für mkdir()
error_reporting(E_ALL & ~E_WARNING & ~E_NOTICE);

//Variablen aus der uploadmulti.php
SESSION_START();
$N = $_SESSION["count_files"];
$C = $_SESSION["curr_path"];
$P = $_SESSION["p_path"]; //gibt Pfad des Ordners mit input + output an
$F = $_SESSION["f_name"];
$out = $P . "output/";
mkdir($out, 0777); //output Ordner erstellen

// Zwischenspeiichern der Variablen für zipdownload.php
$_SESSION["oberordner"] = $P;
$_SESSION["name"] = $F;

?>

<!-- Buttons 1 -->

  <form action='histogramm.php' method='post'>
      <input type="submit" value="Histogramm (Density Plot)" class="btnSubmit">
  </form>

<!-- Buttons 2 -->
  <form action='qualitycontrol.php' method='post'>
      <input type="submit" value="Quality Control Plot" class="btnSubmit">
  </form>

<!-- Buttons 3 -->
    <form action='heatmapspearman.php' method='post'>
        <input type="submit" value="Heatmap (Spearman)" class="btnSubmit">
    </form>
    
<!-- Buttons 4 -->
    <form action='rnadegplot.php' method='post'>
        <input type="submit" value="RNA Degradation Plot" class="btnSubmit">
    </form>

<!-- Button 5 -->
    <form action='alleplots.php' method='post' >
        <input type='submit' value='Alle verfügbaren Plots erstellen' class='btnSubmit' >
    </form>


<!-- Buttons zum Herunterladen der Erstellten Dateien -->
    <form action='zipdownload.php' method='post' >
        <input type='submit' value='Die erstellten Plots als ZIP-Archiv herunterladen' class='btnSubmit2' >
    </form>

    <form action='uploadmulti.php' method='post' >
    <input type='submit' value='Zurück zu Upload' class='btnSubmit3' >
    </form>




</form>


</body>
</html>
