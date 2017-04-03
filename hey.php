
<?php

echo "Heruntergeladen" ;

session_start();

$output_path = $_SESSION["p_path"] . "output/";
mkdir($output_path, 0777, true);
chmod($output_path, 0777);

// $_SESSION["o_path"]= $output_path;

$in = $_SESSION["count_files"];
$p = $_SESSION["curr_path"];




exec("/usr/local/bin/Rscript myr2.R $in $p $output_path");

echo '<br /><a href="uploadmulti.php">Zurück</a>';

?>