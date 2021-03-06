<!doctype html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html"; charset="UTF-8">
    <title>MAS</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"> <!-- Bootstramp für Container und co -->
    <link href="http://hayageek.github.io/jQuery-Upload-File/4.0.10/uploadfile.css" rel="stylesheet"> <!-- Für farbige Boxen z.B "success" -->
    <link href="style.css" rel="stylesheet" type="text/css"/>
</head>

<style>
.btnSubmit{background-color:#8d8f90;border:0;padding:4px 20px;color:#FFF;border:#F0F0F0 1px solid; border-radius:4px;}
.btnSubmit2{background-color:#6b6bc7;border:0;padding:4px 20px;color:#FFF;border:#F0F0F0 1px solid; border-radius:4px;}
.btnSubmit3{background-color:#000066;border:0;padding:4px 20px;color:#FFF;border:#F0F0F0 1px solid; border-radius:4px;}
.btnSubmitgreen{background-color:#90EE90;border:0;padding:4px 20px;color:#FFF;border:#F0F0F0 1px solid; border-radius:4px;}
.btnSubmit5{background-color:#FFB6C1;border:0;padding:4px 20px;color:#FFF;border:#F0F0F0 1px solid; border-radius:4px;}
.btnSubmityellow{background-color:#CCCC00;border:0;padding:4px 20px;color:#FFF;border:#F0F0F0 1px solid; border-radius:4px;}
.btnSubmitblue{background-color:#0000FF;border:0;padding:4px 20px;color:#FFF;border:#F0F0F0 1px solid; border-radius:4px;}
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
        <p><FONT COLOR="#90EE90">grün</FONT> = Bereits erstellt</p>
        <p><FONT COLOR="#CCCC00">gelb</FONT> = Wird erstellt</p>
      </div>

     <?php

ini_set("max_execution_time", 300);


// Hilfsfkt zum Zählen der Dateien eines Ordners
function c_files($folder)
{
    $anz        = 0;
    $tmp_folder = "upload/" . $folder . "/input" . "/";
    $handle     = opendir($tmp_folder);
    while ($file = readdir($handle)) {
        ++$anz;
    }
    closedir($handle);
    return $anz - 2; //wegen "." und ".."
}
session_start();
$c           = $_SESSION["c_glob"];
$old_exp     = "upload/";
$verzeichnis = opendir($old_exp);
//Variablen aus der uploadmulti.php, falls altes Experiment gewählt wurde
for ($i = 1; $i < $c + 1; ++$i) {
    if (isset($_POST["button" . $i])) {
        // echo "BUTTON $i WURDE GEDRÜCKT! <br />";
        $j = 1;
        while ($Ordner = readdir($verzeichnis)) {
            if ($j < ($i + 1)) {
                if ($Ordner != "." && $Ordner != ".." && $Ordner != ".DS_Store") {
                    ++$j;
                    $_SESSION["p_path"]      = "upload/" . $Ordner . "/";
                    $_SESSION["curr_path"]   = "upload/" . $Ordner . "/input" . "/";
                    $_SESSION["f_name"]      = $Ordner;
                    $anz_dateien             = c_files($Ordner);
                    $_SESSION["count_files"] = $anz_dateien;
                }
            }
        }
    }
}
closedir($verzeichnis);

$var1 = $_SESSION["masbool1"];
//$var2 = $_SESSION["rmabool2"];
$var3 = $_SESSION["masbool3"];
$var4 = $_SESSION["masbool4"];
$var5 = $_SESSION["masbool5"];
$var6 = $_SESSION["masbool6"];
$var7 = $_SESSION["masbool7"];
$var8 = $_SESSION["masbool8"];

$N = $_SESSION["count_files"];
$C = $_SESSION["curr_path"];
$P = $_SESSION["p_path"]; //gibt Pfad des Ordners mit input + output an
$F = $_SESSION["f_name"];
echo "Aktuelles ausgewähltes Experiment: $F <br />";
echo "<br />";
$out = $P . "output/";
@mkdir($out, 0777); //output Ordner erstellen

// Zwischenspeiichern der Variablen für zipdownload.php
$_SESSION["oberordner"] = $P;
$_SESSION["name"]       = $F;

?>

  <!-- Navigations Bar -->
  <div id="menuContainer">
    <?php
include_once("menu_template.php");
?>
  </div>
  <div id="bodyContainer">
    <div id="bodyContentContainer">


<!-- Zurück zur Startseite -->
    <form action='mas.php' method='post' >
    <input style="width: 300px;" type='submit' value='Aktualisieren' class='btnSubmit5' >
    </form>
    
    
<!-- Button 5 -->

<?php
if (glob($out . "mashist.png") && glob($out . "mascluster.png") && glob($out . "masheatspearman.png") && glob($out . "masheatpearson.png")) {
?>
    <form action='masalleplots.php' method='post'>
      <input style="width: 300px;" type="submit" value="Alle verfügbaren Plots erstellen in MAS5" class="btnSubmitgreen">
  </form>
<?php
}

elseif ($var5 == 1) {
?>
<form action='masalleplots.php' method='post'>
      <input style="width: 300px;" type="submit" value="Alle verfügbaren Plots erstellen in MAS5" class="btnSubmityellow">
  </form>
    
<?php
}

else {
?>
    <form action='masalleplots.php' method='post'>
      <input style="width: 300px;" type="submit" value="Alle verfügbaren Plots erstellen in MAS5" class="btnSubmit">
  </form>
<?php
}
?>

<!-- Buttons 1 -->
<?php

if (glob($out . "mashist.png")) {
?>
    <form action='mashistogramm.php' method='post'>
      <input style="width: 300px;" type="submit" value="Histogramm (Density Plot, MAS)" class="btnSubmitgreen">
  </form>

<?php
    
}

elseif ($var1 == 1) {
?>
<form action='mashistogramm.php' method='post'>
      <input style="width: 300px;" type="submit" value="Histogramm (Density Plot, MAS)" class="btnSubmityellow">
  </form>
    
<?php
}

else {
?>
    <form action='mashistogramm.php' method='post'>
      <input style="width: 300px;" type="submit" value="Histogramm (Density Plot, MAS)" class="btnSubmit">
  </form>
<?php
}
?>


<!-- Buttons 3 -->

<?php

if (glob($out . "masheatspearman.png")) {
?>
    <form action='rmaheatspearman.php' method='post'>
      <input style="width: 300px;" type="submit" value="Heatmap (Spearman, MAS5)" class="btnSubmitgreen">
  </form>
<?php
}

elseif ($var3 == 1) {
?>
<form action='masheatspearman.php' method='post'>
      <input style="width: 300px;" type="submit" value="Heatmap (Spearman, MAS5)" class="btnSubmityellow">
  </form>
    
<?php
}

else {
?>
    <form action='masheatspearman.php' method='post'>
      <input style="width: 300px;" type="submit" value="Heatmap (Spearman, MAS5)" class="btnSubmit">
  </form>
<?php
}
?>

<!-- Button 7 -->

<?php
if (glob($out . "masheatpearson.png")) {
?>
    <form action='masheatpearson.php' method='post'>
      <input style="width: 300px;" type="submit" value="Heatmap (Pearson, MAS5)" class="btnSubmitgreen">
  </form>
<?php
}

elseif ($var7 == 1) {
?>
<form action='masheatpearson.php' method='post'>
      <input style="width: 300px;" type="submit" value="Heatmap (Pearson, MAS5)" class="btnSubmityellow">
  </form>
    
<?php
}

else {
?>
    <form action='masheatpearson.php' method='post'>
      <input style="width: 300px;" type="submit" value="Heatmap (Pearson, MAS5)" class="btnSubmit">
  </form>
<?php
}
?>

<!-- Buttons 8 -->
<?php

if (glob($out . "mascluster.png")) {
?>
    <form action='mascluster.php' method='post'>
      <input style="width: 300px;" type="submit" value="Clusterdiagramm" class="btnSubmitgreen">
  </form>

<?php
    
}

elseif ($var8 == 1) {
?>
<form action='mascluster.php' method='post'>
      <input style="width: 300px;" type="submit" value="Clusterdiagramm" class="btnSubmityellow">
  </form>
    
<?php
}

else {
?>
    <form action='mascluster.php' method='post'>
      <input style="width: 300px;" type="submit" value="Clusterdiagramm" class="btnSubmit">
  </form>
<?php
}
?>


  </div>
</div>

  </body>
  </html>
