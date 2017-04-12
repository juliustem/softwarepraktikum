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
      <p>Geschafft!</p>
    </div>
    
<?php


session_start();
$_SESSION["rmabool1"]=1;
$output_path = $_SESSION["p_path"] . "output/";
$in = $_SESSION["count_files"];
$p = $_SESSION["curr_path"];
$u = $_SESSION["p_path"];

exec("/usr/local/bin/Rscript myr2rma.R $in $p $output_path > /dev/null 2>/dev/null &");

?>

 <form action='rma_norm_auswahl.php' method='post' >
    <input type='submit' value='Zurück zur Auswahl' class='btnSubmit' >
    </form>
