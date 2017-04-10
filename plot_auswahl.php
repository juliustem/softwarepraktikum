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
.btnSubmitgreen{background-color:#90EE90;border:0;padding:4px 20px;color:#FFF;border:#F0F0F0 1px solid; border-radius:4px;}
.btnSubmit5{background-color:#FFB6C1;border:0;padding:4px 20px;color:#FFF;border:#F0F0F0 1px solid; border-radius:4px;}
.btnSubmityellow{background-color:#FFA500;border:0;padding:4px 20px;color:#FFF;border:#F0F0F0 1px solid; border-radius:4px;}

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
      <p><FONT COLOR="#90EE90">grün</FONT> = Bereits erstellt</p>
      <p><FONT COLOR="#CCCC00">gelb</FONT> = Wird erstellt</p>
    </div>


<?php

ini_set("max_execution_time", 300);


// Hilfsfkt zum Zählen der Dateien eines Ordners
function c_files($folder){
  $anz = 0;
  $tmp_folder = "upload/".$folder."/input"."/";
  $handle = opendir($tmp_folder);
  while($file = readdir($handle)){
      ++$anz;
    }
closedir($handle);
return $anz-2; //wegen "." und ".."
}
session_start();
$c = $_SESSION["c_glob"];
$old_exp     = "upload/";
$verzeichnis = opendir($old_exp);
//Variablen aus der uploadmulti.php, falls altes Experiment gewählt wurde
for($i=1; $i<$c+1; ++$i){
    if (isset($_POST["button".$i])){
      // echo "BUTTON $i WURDE GEDRÜCKT! <br />";
      $j=1;
      while ($Ordner = readdir($verzeichnis)){
        if ($j<($i+1)){
          if ($Ordner != "." && $Ordner != ".." && $Ordner != ".DS_Store") {
          ++$j;
          $_SESSION["p_path"]      = "upload/".$Ordner."/";
          $_SESSION["curr_path"]   = "upload/".$Ordner."/input"."/";
          $_SESSION["f_name"]      = $Ordner;
          $anz_dateien = c_files($Ordner);
          $_SESSION["count_files"] = $anz_dateien;
        }
      }
      }
    }
}
closedir($verzeichnis);

$var1 = $_SESSION["bool1"];
$var2 = $_SESSION["bool2"];
$var3 = $_SESSION["bool3"];
$var4 = $_SESSION["bool4"];
$var5 = $_SESSION["bool5"];
$var6 = $_SESSION["bool6"];
$var7 = $_SESSION["bool7"];

$N = $_SESSION["count_files"];
$C = $_SESSION["curr_path"];
$P = $_SESSION["p_path"]; //gibt Pfad des Ordners mit input + output an
$F = $_SESSION["f_name"];
echo "Aktuelles ausgewähltes Experiment: $F <br />";
$out = $P . "output/";
@mkdir($out, 0777); //output Ordner erstellen

// Zwischenspeiichern der Variablen für zipdownload.php
$_SESSION["oberordner"] = $P;
$_SESSION["name"] = $F;

?>

<!-- Zurück zur Startseite -->
    <form action='plot_auswahl.php' method='post' >
    <input type='submit' value='Aktualisieren' class='btnSubmit5' >
    </form>

<!-- Buttons 1 -->
<?php

if( glob($out."hist.png")){
?>
    <form action='histogramm.php' method='post'>
      <input type="submit" value="Histogramm (Density Plot)" class="btnSubmitgreen">
  </form>

<?php
 
}

elseif($var1==1){
?>
<form action='histogramm.php' method='post'>
      <input type="submit" value="Histogramm (Density Plot)" class="btnSubmityellow">
  </form>
    
<?php    
}

 else{
?>
    <form action='histogramm.php' method='post'>
      <input type="submit" value="Histogramm (Density Plot)" class="btnSubmit">
  </form>
<?php
 }
?>

<!-- Buttons 2 -->
<?php

if( glob($out."qualitycontrol.png")){
?>
    <form action='qualitycontrol.php' method='post'>
      <input type="submit" value="Quality Control Plot" class="btnSubmitgreen">
  </form>
<?php
}

elseif($var2==1){
?>
<form action='qualitycontrol.php' method='post'>
      <input type="submit" value="Quality Control Plot" class="btnSubmityellow">
  </form>
    
<?php    
}

 else{
?>
    <form action='qualitycontrol.php' method='post'>
      <input type="submit" value="Quality Control Plot" class="btnSubmit">
  </form>
<?php
 }
?>

<!-- Buttons 3 -->

<?php

if( glob($out."heatspearman.png")){
?>
    <form action='heatmapspearman.php' method='post'>
      <input type="submit" value="Heatmap (Spearman)" class="btnSubmitgreen">
  </form>
<?php
}

elseif($var3==1){
?>
<form action='heatmapspearman.php' method='post'>
      <input type="submit" value="Heatmap (Spearman)" class="btnSubmityellow">
  </form>
    
<?php    
}

 else{
?>
    <form action='heatmapspearman.php' method='post'>
      <input type="submit" value="Heatmap (Spearman)" class="btnSubmit">
  </form>
<?php
 }
?>

<!-- Button 7 -->

<?php
if( glob($out."heatpearson.png")){
?>
    <form action='heatpearson.php' method='post'>
      <input type="submit" value="Heatmap (Pearson)" class="btnSubmitgreen">
  </form>
<?php
}

elseif($var7==1){
?>
<form action='heatpearson.php' method='post'>
      <input type="submit" value="Heatmap (Pearson)" class="btnSubmityellow">
  </form>
    
<?php    
}

 else{
?>
    <form action='heatpearson.php' method='post'>
      <input type="submit" value="Heatmap (Pearson)" class="btnSubmit">
  </form>
<?php
 }
?>

<!-- Button 6 -->

<?php
if( glob($out."DataPCAnalysis.png")){
?>
    <form action='pca.php' method='post'>
      <input type="submit" value="PCA" class="btnSubmitgreen">
  </form>
<?php
}

elseif($var6==1){
?>
<form action='pca.php' method='post'>
      <input type="submit" value="PCA" class="btnSubmityellow">
  </form>
    
<?php    
}

 else{
?>
    <form action='pca.php' method='post'>
      <input type="submit" value="PCA" class="btnSubmit">
  </form>
<?php
 }
?>

    
<!-- Buttons 4 -->

<?php

if( glob($out."RNA_Degradation_Plot.png")){
?>
    <form action='rnadegplot.php' method='post'>
      <input type="submit" value="RNA Degradation Plot" class="btnSubmitgreen">
  </form>
<?php
}

elseif($var4==1){
?>
<form action='rnadegplot.php' method='post'>
      <input type="submit" value="RNA Degradation Plot" class="btnSubmityellow">
  </form>
    
<?php    
}

 else{
?>
    <form action='rnadegplot.php' method='post'>
      <input type="submit" value="RNA Degradation Plot" class="btnSubmit">
  </form>
<?php
 }
?>


<!-- Button 5 -->

<?php
if( glob($out."RNA_Degradation_Plot.png")&&glob($out."hist.png")&&glob($out."qualitycontrol.png")&&glob($out."heatspearman.png")&&glob($out."heatpearson.png")){
?>
    <form action='alleplots.php' method='post'>
      <input type="submit" value="Alle verfügbaren Plots erstellen" class="btnSubmitgreen">
  </form>
<?php
}

elseif($var5==1){
?>
<form action='alleplots.php' method='post'>
      <input type="submit" value="Alle verfügbaren Plots erstellen" class="btnSubmityellow">
  </form>
    
<?php    
}

 else{
?>
    <form action='alleplots.php' method='post'>
      <input type="submit" value="Alle verfügbaren Plots erstellen" class="btnSubmit">
  </form>
<?php
 }
?>



<!-- Zu den Bildern -->
    <form action='view.php' method='post' >
    <input type='submit' value='View Images' class='btnSubmit5' >
    </form>
<!-- Buttons zum Herunterladen der Erstellten Dateien -->
    <form action='zipdownload.php' method='post' >
        <input type='submit' value='Die erstellten Plots als ZIP-Archiv herunterladen' class='btnSubmit2' >
        </form>
<!-- Zurück zur Startseite -->
    <form action='uploadmulti.php' method='post' >
    <input type='submit' value='Zurück zu Upload' class='btnSubmit3' >
    </form>
    

    



</form>


</body>
</html>
