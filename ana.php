<!doctype html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html"; charset="UTF-8">
    <title>ANA</title>
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
        <h1>Erstellen der statistischen Plots</h1>
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
            if($file!= "." && $file!= ".." && $file!= ".DS_Store" && $file!= "G1" && $file!= "G2"){
            ++$anz;
          }
        }
      closedir($handle);
      return $anz; //wegen "." und ".."
      }

      // Hilfsfkt Zuordnen in Gruppen
      function group_copy($folder1){
        $out1 = "upload/".$folder1."/input"."/"."G1";
        $out2 = "upload/".$folder1."/input"."/"."G2";
        @mkdir($out1, 0777);
        @chmod($out1, 0777);
        @mkdir($out2, 0777);
        @chmod($out2, 0777);
        $tmp_folder1 = "upload/".$folder1."/input"."/";
        $handle1 = opendir($tmp_folder1);
        while($file = readdir($handle1)){
          if($file!= "." && $file!= ".." && $file!= ".DS_Store" && $file!= "G1" && $file!= "G2"){
          //  echo $file;
          //  echo "<br />";
            if(strlen($file)>=32){
              $tmp_file = "upload/".$folder1."/input"."/".$file;
              $tmp_G1 = "upload/".$folder1."/input"."/"."G1/".$file;
              copy($tmp_file, $tmp_G1);
            }
            if(strlen($file)<=31){
              $tmp_file = "upload/".$folder1."/input"."/".$file;
              $tmp_G2 = "upload/".$folder1."/input"."/"."G2/".$file;
              copy($tmp_file, $tmp_G2);
            }
          }
        }
      closedir($handle1);
      return 0;
      }


      SESSION_START();
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

      // Variablen aus der uploadmulti.php, falls neues Experiment
      $N = $_SESSION["count_files"];
      $C = $_SESSION["curr_path"];
      $P = $_SESSION["p_path"]; //gibt Pfad des Ordners mit input + output an
      $F = $_SESSION["f_name"];
      echo "Aktuelles ausgewähltes Experiment: $F <br />";
      echo "<br />";

      // Zwischenspeiichern der Variablen für zipdownload.php
      $_SESSION["oberordner"] = $P;
      $_SESSION["name"] = $F;

      // Abfrage, ob ana button gedrückt wurde
      if (isset($_POST["ana_button_rma"])){
        $v = group_copy($F);
        $output_path = $_SESSION["p_path"] . "output/";
        $in = $_SESSION["count_files"];
        $p = $_SESSION["curr_path"];
        $p1 = "upload/".$F."/input"."/"."G1/";
        $p2 = "upload/".$F."/input"."/"."G2/";
        $_SESSION["anabool1"] = 1;
        exec("/usr/bin/Rscript fc_slr_rma.R $in $p $output_path $p1 $p2 > /dev/null 2>/dev/null &");
      }

      // Abfrage, ob ana button gedrückt wurde
      if (isset($_POST["ana_button_mas"])){
        $v = group_copy($F);
        $output_path = $_SESSION["p_path"] . "output/";
        $in = $_SESSION["count_files"];
        $p = $_SESSION["curr_path"];
        $p1 = "upload/".$F."/input"."/"."G1/";
        $p2 = "upload/".$F."/input"."/"."G2/";
        $_SESSION["anabool2"] = 1;
        exec("/usr/bin/Rscript fc_slr_mas.R $in $p $output_path $p1 $p2 > /dev/null 2>/dev/null &");
      }


      $out = "upload/".$F."/output"."/";
      $ana_var1 = $_SESSION["anabool1"];
      $ana_var2 = $_SESSION["anabool2"];


      ?>

      <!-- Navigations Bar -->
        <div id="menuContainer">
          <?php include_once("menu_template.php");
          ?>
        </div>
        <div id="bodyContainer">
          <div id="bodyContentContainer">


        <!-- Button für Refresh der Seite -->
            <form action='ana.php' method='post' >
            <input style="width: 300px;" type='submit' value='Status der Plots updaten' class='btnSubmit5' >
            </form>


            <!-- Buttons Ana RMA -->
            <?php

            if( glob($out."FC_SLR_rma.txt")){
            ?>
            <form action='ana.php' method='post' >
            <input style="width: 300px;" type='submit' name='ana_button_rma' value='Foldchange und SLR (RMA)' class='btnSubmitgreen' >
            </form>
            <?php

            }

            elseif($ana_var1==1){
            ?>
            <form action='ana.php' method='post' >
            <input style="width: 300px;" type='submit' name='ana_button_rma' value='Foldchange und SLR (RMA)' class='btnSubmityellow' >
            </form>

            <?php
            }

             else{
            ?>
            <form action='ana.php' method='post' >
            <input style="width: 300px;" type='submit' name='ana_button_rma' value='Foldchange und SLR (RMA)' class='btnSubmit' >
            </form>
            <?php
             }
            ?>


            <!-- Buttons Ana MAS -->
            <?php

            if( glob($out."FC_SLR_mas.txt")){
            ?>
            <form action='ana.php' method='post' >
            <input style="width: 300px;" type='submit' name='ana_button_mas' value='Foldchange und SLR (MAS5)' class='btnSubmitgreen' >
            </form>
            <?php

            }

            elseif($ana_var2==1){
            ?>
            <form action='ana.php' method='post' >
            <input style="width: 300px;" type='submit' name='ana_button_mas' value='Foldchange und SLR (MAS5)' class='btnSubmityellow' >
            </form>

            <?php
            }

             else{
            ?>
            <form action='ana.php' method='post' >
            <input style="width: 300px;" type='submit' name='ana_button_mas' value='Foldchange und SLR (MAS5)' class='btnSubmit' >
            </form>
            <?php
             }
            ?>


  </div>
</div>

  </body>
  </html>
