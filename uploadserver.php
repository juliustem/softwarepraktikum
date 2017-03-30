<!DOCTYPE html>

<head>

  <title>Upload Files</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="http://hayageek.github.io/jQuery-Upload-File/4.0.10/uploadfile.css" rel="stylesheet">
  
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="http://hayageek.github.io/jQuery-Upload-File/4.0.10/jquery.uploadfile.min.js"></script>
  <script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
  
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
<div class="container-fluid">
<div class="jumbotron">
<h2>Willkommen</h2>
</div>

<form action="" method="post" enctype="multipart/form-data">
    <input type="file" id="file" name="files[]" multiple="multiple" accept="*:CEL" class="demoInputBox"/>
    <input type="submit" value="Upload!" class="btnSubmit"/>
</form>


<p class="bg-danger">  
 <?php
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST") {
	//Variablen, die de neuen Ordner erstellen
	date_default_timezone_set("Europe/Berlin");
	$timestamp = mktime();	
	$uhrzeit = date("H:i:s", $timestamp);

	
	$akz_formats = array("CEL"); //nur CEL files werden akzieptiert
	$ziel = "upload/"; //fuer opendir
	$count = 0;
	
	
    mkdir("/Applications/XAMPP/xamppfiles/htdocs/Softwarepraktikum/jquery/upload/hochladen$uhrzeit", 0777, true);
    chmod("/Applications/XAMPP/xamppfiles/htdocs/Softwarepraktikum/jquery/upload/hochladen$uhrzeit", 0777); //0777 gibt alle Rechte
    $ziel2= "upload/Hochladen$uhrzeit/";// Upload directory 
        
        
	// Schleife, damit alle Files hochgeladen werden
	foreach ($_FILES['files']['name'] as $f => $name) {   
	  
	    	if ($_FILES['files']['error'][$f] == 4) {
	        echo "<br />$name Konnte nicht hochgeladen werden<br />";
	        echo "<br />";
	        continue; // ueberspring generell alle error files
	    	}	       
	    	
	    	if ($_FILES['files']['error'][$f] == 0) {	    
?>
</p>
<p class="bg-warning">
<?php	     
				if( ! in_array(pathinfo($name, PATHINFO_EXTENSION), $akz_formats) ){
				echo  "<br />Achtung: $name wird nicht akzeptiert<br />";
				echo "<br />";
				continue; // ueberspringt die nicht akzeptierten formate
				}
				
				else{ 
?>	
</p>

<p class="bg-success">    
<?php		
	            if(move_uploaded_file($_FILES["files"]["tmp_name"][$f], $ziel2.$name))
	            $count++; // Zaehlt, wieviele erfolgreich hochgeladen wurden, vllt brauchen wir das irgendwann
	            	              	            
	          	echo "<br /> ✔ Erfolgreich: $name<br />";
	          	echo "<br />";
	        	}
	    	}
		}
		
		
//Rscript exec:??
exec("/usr/local/bin/Rscript myr2.R $ziel2");

echo "<h3>Bisher hochgeladene Dateien</h3>";
$verzeichnis=opendir($ziel);
while ($file = readdir($verzeichnis))
{
                echo "<a href='$ziel/$file' target=_blank>$file</a><br>"; 
}
closedir($verzeichnis);

?>

<?php
}

else{

$ziel = "upload/";

echo "<h3>Bisher hochgeladene Dateien</h3>";

$verzeichnis=opendir($ziel);
    while ($file = readdir($verzeichnis))
    	{ 
            echo "<a href='$ziel/$file' target=_blank>$file</a><br>"; 
    	}
closedir($verzeichnis);

}

?>

</body>
</html>
