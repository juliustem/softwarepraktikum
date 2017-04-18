<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
    <title>Mult_Fileupload</title>
    
<!-- Für den Style -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="http://hayageek.github.io/jQuery-Upload-File/4.0.10/uploadfile.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>    
    
</head>
<body>

<!-- Überschrift -->
  <div class="container-fluid">
    <div class="jumbotron">
      <h2>Herzlich Willkommen</h2>
      <p>Auf dieser Seite können Sie .CEL-Files hochladen und diese anschließend statistisch auswerten.</p>
    </div>
    
    
<!-- Körper Style -->    
<style>
.btnSubmit{background-color:#8d8f90;border:0;padding:4px 20px;color:#FFF;border:#F0F0F0 1px solid; border-radius:4px;}
.demoInputBox{padding:5px; border:#F0F0F0 1px solid; border-radius:2px; background-color:#FFF;}
.btnSubmit_blue{background-color:#428bca;border:0;padding:4px 20px;color:#FFF;border:#F0F0F0 1px solid; border-radius:4px;}

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




 <!-- Initialisierung der Buttons -->
 
  <form id="uploadForm" action="" method="post" enctype="multipart/form-data">
       <input name="uploads[]" id="userImage" type="file" multiple class="demoInputBox"/>
       <input type="submit" name="u_button" value="Hochladen" class="btnSubmit"/>
  </form>


  <?php  
 //Fürs Speichern der Variablen, während der Sitzung   
    session_start();
    $_SESSION["gesamt"]=0;
    $_SESSION["bool"]=0;
    $_SESSION["bool1"]=0;
    $_SESSION["bool2"]=0;
    $_SESSION["bool3"]=0;
    $_SESSION["bool4"]=0;
    $_SESSION["bool5"]=0;
    $_SESSION["bool6"]=0;
    $_SESSION["bool7"]=0;  
    $_SESSION["bool8"]=0;   
    $_SESSION["textraw"]=0; 
//RMA Normalisierung    
    $_SESSION["rmabool1"]=0;
//    $_SESSION["rmabool2"]=0;
    $_SESSION["rmabool3"]=0;
    $_SESSION["rmabool4"]=0;
    $_SESSION["rmabool5"]=0;
    $_SESSION["rmabool6"]=0;
    $_SESSION["rmabool7"]=0;  
    $_SESSION["rmabool8"]=0;   
    $_SESSION["textrma"]=0;
//MAS 5 Normalisierung    
    $_SESSION["masbool1"]=0;
//    $_SESSION["rmabool2"]=0;
    $_SESSION["masbool3"]=0;
    $_SESSION["masbool4"]=0;
    $_SESSION["masbool5"]=0;
    $_SESSION["masbool6"]=0;
    $_SESSION["masbool7"]=0;  
    $_SESSION["masbool8"]=0; 
    $_SESSION["textmas"]=0;    
  
if (isset($_POST["s_button"])) {
} else {
    echo "<br>";
    echo "<h3> Bereits hochgeladene Experimente </h3>";
    $old_exp     = "upload/";
    $c           = 0;
    $verzeichnis = opendir($old_exp);
    while ($Ordner = readdir($verzeichnis)) {
        if ($Ordner != "." && $Ordner != ".." && $Ordner != ".DS_Store") {
            ++$c;
            $tmp_button = "button" . $c;
            echo "<a href='$old_exp/$Ordner' target=_blank>$Ordner</a><br>";
            echo "<form action='raw.php' method='post' >";
            echo "<input type='submit' name=$tmp_button value='Mit diesem Experiment weiterarbeiten' class='btnSubmit'>";
            echo "</form>";
        }
    }
    $_SESSION["c_glob"] = $c;
    closedir($verzeichnis);
}

?>

<?php

//Abschalter der warnings für mkdir()
//error_reporting(E_ALL & ~E_WARNING & ~E_NOTICE);

// Funktion zur überprüfung der Dateiendung
function getExtension($name)
{
    return (false === ($p = strrpos($name, '.')) ? '' : substr($name, ++$p));
}

// Erlaubte Dateiendungen
$allowedExtensions = array(
    'CEL'
);
// Maximale Größe der Datei
$maxSize           = 9999999999999999;
// Hilfsvariable für Array Index
$i                 = 0;


foreach ($_FILES as $file):
   
//Verzeichnis erstellen
        $name     = date('d-m-y_h-i-s'); // $name = Ordnername
        $pre_path = "upload/" . $name . "/";
        mkdir($pre_path, 0777, true);
        chmod($pre_path, 0777);
        $upload_path = $pre_path . "input/";
        mkdir($upload_path, 0777, true);
        chmod($upload_path, 0777);
 
    
    foreach ($file['name'] as $filename):
        $extension = getExtension($filename);
        
?>	
<p class="bg-warning">    
<?php
        if (!in_array($extension, $allowedExtensions)) {
           				echo  "<br />Achtung: $filename wird nicht akzeptiert. Format stimmt nicht <br />";
				        echo "<br />";
            ++$i;
            // Datei überspringen falls Endung nicht erlaubt
            continue;
        }
        
        if ($file['size'][$i] > $maxSize) {
                        echo  "<br />Achtung: $filename wird nicht akzeptiert. Datei ist zu groß!<br />";
				        echo "<br />";
            ++$i;
            continue;
        }
 
 ?>	
</p>

<p class="bg-success">    
<?php
  
        // Datei auf Server speichern
        if(move_uploaded_file($file['tmp_name'][$i], $upload_path . $filename))
            echo "<br /> ✔ Erfolgreich: $filename<br />";
	          	echo "<br />";
?>	
</p>
<?php        
        
        ++$i;
    endforeach;
    // Anzeigen der hochgeladenen Dateien
    $alledateien = scandir($upload_path); //auslesen
    echo "<h3>Dateien im aktuellen Ordner: </h3>";
    foreach ($alledateien as $datei) { //Ausgabeschleife
        echo $datei . "<br />";
    };
  
  //Fürs Speichern der Variablen, während der Sitzung    
    $_SESSION["p_path"] = $pre_path;
    $_SESSION["curr_path"]= $upload_path;
    $_SESSION["count_files"]= $i;
    $_SESSION["f_name"]      = $name;
    
    echo "<form action='raw.php' method='post' >";
    echo "<input type='submit' value='Weiter zur Auswahl der benötigten Plots' class='btnSubmit_blue' >";
    echo "</form>";
        
endforeach;
?>



</body>
</html>