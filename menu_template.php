<?php
// Initialisieren
$uploadmulti = "myButtons";
$raw = "myButtons";
$rma = "myButtons";
$mas = "myButtons";
$view = "myButtons";
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
 ?>

<a class="<?php echo $uploadmulti; ?>" href="uploadmulti.php">Upload</a>
<a class="<?php echo $raw; ?>" href="raw.php">RAW</a>
<a class="<?php echo $rma; ?>" href="rma_norm_auswahl.php">RMA</a>
<a class="<?php echo $mas; ?>" href="mas_norm_auswahl.php">MAS</a>
<a class="<?php echo $view; ?>" href="view.php">View</a>
<a class="<?php echo $zipdownload; ?>" href="zipdownload.php">Download</a>