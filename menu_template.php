<?php
// Initialisieren
$uploadmulti = "myButtons";
$all = "myButtons";
$raw = "myButtons";
$rma = "myButtons";
$mas = "myButtons";
$view = "myButtons";
$ana = "myButtons";
$zipdownload = "myButtons";
$menuLinkid = basename($_SERVER['PHP_SELF'], ".php");
if($menuLinkid == "raw"){
  $raw = 'myActiveButton';}
else if($menuLinkid == "rma"){
  $rma = 'myActiveButton';}
else if($menuLinkid == "mas"){
  $mas = 'myActiveButton';}
else if($menuLinkid == "view"){
  $view = 'myActiveButton';}
else if($menuLinkid == "zipdownload"){
  $zipdownload = 'myActiveButton';}
else if($menuLinkid == "uploadmulti"){
  $uploadmulti = 'myActiveButton';}
else if($menuLinkid == "all"){
  $all = 'myActiveButton';}
else if($menuLinkid == "ana"){
  $ana = 'myActiveButton';}

 ?>

<a class="<?php echo $uploadmulti; ?>" href="uploadmulti.php">Upload</a>
<a class="<?php echo $all; ?>" href="all.php">ALL</a>
<a class="<?php echo $raw; ?>" href="raw.php">RAW</a>
<a class="<?php echo $rma; ?>" href="rma.php">RMA</a>
<a class="<?php echo $mas; ?>" href="mas.php">MAS</a>
<a class="<?php echo $view; ?>" href="view.php">View</a>
<a class="<?php echo $ana; ?>" href="ana.php">Analyse</a>
<a class="<?php echo $zipdownload; ?>" href="zipdownload.php">Download</a>