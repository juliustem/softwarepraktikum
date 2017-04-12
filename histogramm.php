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
.demoInputBox{padding:5px; border:#F0F0F0 1px solid; border-radius:2px; background-color:#FFF;}
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
      <h2>Das Histogramm wird erstellt.</h2>
      <p>Kehren Sie zurück zur Auswahl der Plots</p>
    </div>

<?php


session_start();

$_SESSION["bool1"]=1;
$output_path = $_SESSION["p_path"] . "output/";
$in = $_SESSION["count_files"];
$p = $_SESSION["curr_path"];
$f = $_SESSION["p_path"];

exec("Rscript myr2.R $in $p > /dev/null 2>/dev/null &");  ///opt/lampp/htdocs/Projekte/Softwareprojekt/

?>

 <form action='raw.php' method='post' >
    <input type='submit' value='Zurück' class='btnSubmit' >
    </form>
