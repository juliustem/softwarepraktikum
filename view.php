<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Mult_Fileupload</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"> <!-- Bootstramp für Container und co -->
    <link href="http://hayageek.github.io/jQuery-Upload-File/4.0.10/uploadfile.css" rel="stylesheet"> <!-- Für farbige Boxen z.B "success" -->
    <link href="style.css" rel="stylesheet" type="text/css"/>
</head>

<style>
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

<!-- Für das Bild -->
<style>

.btnSubmit3{background-color:#000066;border:0;padding:4px 20px;color:#FFF;border:#F0F0F0 1px solid; border-radius:4px;}

#myImg1 {
    border-radius: 5px;
    cursor: pointer;
    transition: 0.3s;
}

#myImg {
    border-radius: 5px;
    cursor: pointer;
    transition: 0.3s;
}

#myImg2 {
    border-radius: 5px;
    cursor: pointer;
    transition: 0.3s;
}

#myImg3 {
    border-radius: 5px;
    cursor: pointer;
    transition: 0.3s;
}

#myImg4 {
    border-radius: 5px;
    cursor: pointer;
    transition: 0.3s;
}

#myImg5 {
    border-radius: 5px;
    cursor: pointer;
    transition: 0.3s;
}

#myImg6 {
    border-radius: 5px;
    cursor: pointer;
    transition: 0.3s;
}

#myImg8 {
    border-radius: 5px;
    cursor: pointer;
    transition: 0.3s;
}

#myImg9 {
    border-radius: 5px;
    cursor: pointer;
    transition: 0.3s;
}
#myImg10 {
    border-radius: 5px;
    cursor: pointer;
    transition: 0.3s;
}
#myImg11 {
    border-radius: 5px;
    cursor: pointer;
    transition: 0.3s;
}
#myImg12 {
    border-radius: 5px;
    cursor: pointer;
    transition: 0.3s;
}
#myImg13 {
    border-radius: 5px;
    cursor: pointer;
    transition: 0.3s;
}
#myImg14 {
    border-radius: 5px;
    cursor: pointer;
    transition: 0.3s;
}
#myImg15 {
    border-radius: 5px;
    cursor: pointer;
    transition: 0.3s;
}
#myImg16 {
    border-radius: 5px;
    cursor: pointer;
    transition: 0.3s;
}
#myImg17 {
    border-radius: 5px;
    cursor: pointer;
    transition: 0.3s;
}
#myImg18 {
    border-radius: 5px;
    cursor: pointer;
    transition: 0.3s;
}



#myImgrma {
    border-radius: 5px;
    cursor: pointer;
    transition: 0.3s;
}

#myImgrma4 {
    border-radius: 5px;
    cursor: pointer;
    transition: 0.3s;
}

#myImgrma7 {
    border-radius: 5px;
    cursor: pointer;
    transition: 0.3s;
}

#myImgrma6 {
    border-radius: 5px;
    cursor: pointer;
    transition: 0.3s;
}

#myImgmas {
    border-radius: 5px;
    cursor: pointer;
    transition: 0.3s;
}

#myImgmas4 {
    border-radius: 5px;
    cursor: pointer;
    transition: 0.3s;
}

#myImgmas7 {
    border-radius: 5px;
    cursor: pointer;
    transition: 0.3s;
}

#myImgmas6 {
    border-radius: 5px;
    cursor: pointer;
    transition: 0.3s;
}


#myImg:hover {opacity: 0.7;}
#myImg1:hover {opacity: 0.7;}
#myImg2:hover {opacity: 0.7;}
#myImg3:hover {opacity: 0.7;}
#myImg4:hover {opacity: 0.7;}
#myImg5:hover {opacity: 0.7;}
#myImg6:hover {opacity: 0.7;}
#myImg8:hover {opacity: 0.7;}
#myImg9:hover {opacity: 0.7;}
#myImg10:hover {opacity: 0.7;}
#myImg11:hover {opacity: 0.7;}
#myImg12:hover {opacity: 0.7;}
#myImg13:hover {opacity: 0.7;}
#myImg14:hover {opacity: 0.7;}
#myImg15:hover {opacity: 0.7;}
#myImg16:hover {opacity: 0.7;}
#myImg17:hover {opacity: 0.7;}
#myImg18:hover {opacity: 0.7;}


#myImgrma:hover {opacity: 0.7;}
#myImgrma4:hover {opacity: 0.7;}
#myImgrma7:hover {opacity: 0.7;}
#myImgrma6:hover {opacity: 0.7;}

#myImgmas:hover {opacity: 0.7;}
#myImgmas4:hover {opacity: 0.7;}
#myImgmas7:hover {opacity: 0.7;}
#myImgmas6:hover {opacity: 0.7;}

/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
}

/* Modal Content (image) */
.modal-content {
    margin: auto;
    display: block;
    width: 80%;
    max-width: 700px;
}

/* Caption of Modal Image */
#caption {
    margin: auto;
    display: block;
    width: 80%;
    max-width: 700px;
    text-align: center;
    color: #ccc;
    padding: 10px 0;
    height: 150px;
}

/* Add Animation */
.modal-content, #caption {    
    -webkit-animation-name: zoom;
    -webkit-animation-duration: 0.6s;
    animation-name: zoom;
    animation-duration: 0.6s;
}

@-webkit-keyframes zoom {
    from {-webkit-transform:scale(0)} 
    to {-webkit-transform:scale(1)}
}

@keyframes zoom {
    from {transform:scale(0)} 
    to {transform:scale(1)}
}

/* The Close Button */
.close {
    position: absolute;
    top: 15px;
    right: 35px;
    color: #f1f1f1;
    font-size: 40px;
    font-weight: bold;
    transition: 0.3s;
}

.close:hover,
.close:focus {
    color: #bbb;
    text-decoration: none;
    cursor: pointer;
}

/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
    .modal-content {
        width: 100%;
    }
}
</style>

<body>

  <!-- Überschrift -->
    <div class="container-fluid">
      <div class="jumbotron">
        <h2>Erstellen der statistischen Plots</h2>
        <p>Die Plots können durch Anklicken vergrößert werden.</p>
        <p> </p>
      </div>

<!-- Navigations Bar -->
  <div id="menuContainer">
    <?php include_once("menu_template.php");
    ?>
  </div>
  <div id="bodyContainer">
    <div id="bodyContentContainer">
<?php
ini_set("max_execution_time", 300); 

@session_start();
//kriegt wieder die Session Variablen
$N = $_SESSION["count_files"];
$c = $_SESSION["curr_path"];
$p = $_SESSION["p_path"]; //gibt Pfad des Ordners mit input + output an
$f = $_SESSION["f_name"];
$o = $p . "output/";
?>

      <h3>Rohdaten:</h3>
<?php
if( glob($o."hist.png")){
  echo("<img id='myImg' src='$o/hist.png' alt='Histogram' width='300' height='300'>"); 
  }
  if( glob($o."qualitycontrol.png")){
  echo("<img id='myImg2' src='$o/qualitycontrol.png' alt='Quality Control' width='300' height='300'>"); 
  }
   if( glob($o."RNA_Degradation_Plot.png")){
  echo("<img id='myImg3' src='$o/RNA_Degradation_Plot.png' alt='RNA Degradation' width='300' height='300'>"); 
  }
   if( glob($o."heatspearman.png")){
  echo("<img id='myImg4' src='$o/heatspearman.png' alt='Heatmap Spearman' width='300' height='300'>"); 
  }
   if( glob($o."heatpearson.png")){
  echo("<img id='myImg5' src='$o/heatpearson.png' alt='Heatmap Pearson' width='300' height='300'>"); 
  }
   if( glob($o."Rohcluster.png")){
  echo("<img id='myImg6' src='$o/Rohcluster.png' alt='Clusterdiagramm (Rohdaten)' width='300' height='300'>"); 
  }
   if( glob($o."RawDataPCAanalysis.png")){
  echo("<img id='myImg8' src='$o/RawDataPCAanalysis.png' alt='PCA' width='300' height='300'>"); 
  }   
  
  for($i=1; $i<=$N+1; ++$i){
    $chiptemp = "chipimage ".$i." .png";
   if( glob($o.$chiptemp)){
    $c=8+$i;
    $tempimage = "myImg".$c;
  echo("<img id='$tempimage' src='$o/$chiptemp' alt='Chipimage $i' width='300' height='300'>"); 
  }
  
  }   

?>
      <h3>RMA Normalisierung:</h3>
<?php

   if( glob($o."rmahist.png")){
  echo("<img id='myImgrma' src='$o/rmahist.png' alt='Histogramm in RMA Normalisierung' width='300' height='300'>"); 
  } 
   if( glob($o."rmacluster.png")){
  echo("<img id='myImgrma6' src='$o/rmacluster.png' alt='Clusterdiagramm in RMA Normalisierung' width='300' height='300'>"); 
  } 
   if( glob($o."rmaheatspearman.png")){
  echo("<img id='myImgrma4' src='$o/rmaheatspearman.png' alt='Correlationplot Spearman in RMA Normalisierung' width='300' height='300'>"); 
  } 
   if( glob($o."rmaheatpearson.png")){
  echo("<img id='myImgrma7' src='$o/rmaheatpearson.png' alt='Correlationplot Pearson in RMA Normalisierung' width='300' height='300'>"); 
  } 


 
?>  

      <h3>MAS 5 Normalisierung:</h3>
<?php

   if( glob($o."mashist.png")){
  echo("<img id='myImgmas' src='$o/mashist.png' alt='Histogramm in MAS 5 Normalisierung' width='300' height='300'>"); 
  } 
   if( glob($o."mascluster.png")){
  echo("<img id='myImgmas6' src='$o/mascluster.png' alt='Clusterdiagramm in MAS 5 Normalisierung' width='300' height='300'>"); 
  } 
   if( glob($o."masheatspearman.png")){
  echo("<img id='myImgmas4' src='$o/masheatspearman.png' alt='Correlationplot Spearman in MAS 5 Normalisierung' width='300' height='300'>"); 
  } 
   if( glob($o."masheatpearson.png")){
  echo("<img id='myImgmas7' src='$o/masheatpearson.png' alt='Correlationplot Pearson in MAS 5 Normalisierung' width='300' height='300'>"); 
  } 
?>
     <h3>Textdateien:</h3>
<?php
   if( glob($o."affymetrix_raw.txt")){
  echo("<a href ='$o/affymetrix_raw.txt' >Textdatei RAW</a>"); 
  echo("<br>");
  } 
   if( glob($o."affymetrix_mas5.txt")){
  echo("<a href ='$o/affymetrix_mas5.txt' >Textdatei MAS 5</a>"); 
  echo("<br>");  
  } 
   if( glob($o."affymetrix_mas5.txt")){
  echo("<a href ='$o/affymetrix_rma.txt' >Textdatei RMA</a>"); 
  echo("<br>");
  }  
   if( glob($o."fc_slr_rma.txt")){
  echo("<a href ='$o/fc_slr_rma.txt' >Textdatei Analyse SLR und Fc RMA</a>"); 
  echo("<br>");
  }  
   if( glob($o."fc_slr_mas.txt")){
  echo("<a href ='$o/fc_slr_mas.txt' >Textdatei Analyse SLR und Fc MAS5</a>"); 
  echo("<br>");
  }  

?>  


  <div id="myModal" class="modal">
  <span class="close">&times;</span>
  <img class="modal-content" id="img01">
  <div id="caption"></div>
</div>


<!-- Für Histogramm -->
 <script>
// Get the modal
var modal = document.getElementById('myModal');

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById('myImg');
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");

img.onclick = function(){
    modal.style.display = "block";
    modalImg.src = this.src;
    captionText.innerHTML = this.alt;
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
    modal.style.display = "none";
}
</script>


<!-- Für Quality Control -->
 <script>
// Get the modal
var modal = document.getElementById('myModal');

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById('myImg2');
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");

img.onclick = function(){
    modal.style.display = "block";
    modalImg.src = this.src;
    captionText.innerHTML = this.alt;
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
    modal.style.display = "none";
}
</script>


<!-- Für RNA Degradation -->
 <script>
// Get the modal
var modal = document.getElementById('myModal');

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById('myImg3');
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");

img.onclick = function(){
    modal.style.display = "block";
    modalImg.src = this.src;
    captionText.innerHTML = this.alt;
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
    modal.style.display = "none";
}
</script>


<!-- Für Heatmap Spearman -->
 <script>
// Get the modal
var modal = document.getElementById('myModal');

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById('myImg4');
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");

img.onclick = function(){
    modal.style.display = "block";
    modalImg.src = this.src;
    captionText.innerHTML = this.alt;
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
    modal.style.display = "none";
}
</script>


<!-- Für Heatmap Pearson -->
 <script>
// Get the modal
var modal = document.getElementById('myModal');

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById('myImg5');
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");

img.onclick = function(){
    modal.style.display = "block";
    modalImg.src = this.src;
    captionText.innerHTML = this.alt;
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
    modal.style.display = "none";
}
</script>

<!-- Für Clusterdiagramm -->
 <script>
// Get the modal
var modal = document.getElementById('myModal');

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById('myImg6');
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");

img.onclick = function(){
    modal.style.display = "block";
    modalImg.src = this.src;
    captionText.innerHTML = this.alt;
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
    modal.style.display = "none";
}
</script>

<!-- Für PCA -->
 <script>
// Get the modal
var modal = document.getElementById('myModal');

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById('myImg8');
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");

img.onclick = function(){
    modal.style.display = "block";
    modalImg.src = this.src;
    captionText.innerHTML = this.alt;
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
    modal.style.display = "none";
}
</script>

<!-- Für Chipimage -->
 <script>
// Get the modal
var modal = document.getElementById('myModal');

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById('myImg9');
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");

img.onclick = function(){
    modal.style.display = "block";
    modalImg.src = this.src;
    captionText.innerHTML = this.alt;
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
    modal.style.display = "none";
}
</script>

<!-- Für Chipimage -->
 <script>
// Get the modal
var modal = document.getElementById('myModal');

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById('myImg10');
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");

img.onclick = function(){
    modal.style.display = "block";
    modalImg.src = this.src;
    captionText.innerHTML = this.alt;
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
    modal.style.display = "none";
}
</script>

<!-- Für Chipimage -->
 <script>
// Get the modal
var modal = document.getElementById('myModal');

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById('myImg11');
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");

img.onclick = function(){
    modal.style.display = "block";
    modalImg.src = this.src;
    captionText.innerHTML = this.alt;
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
    modal.style.display = "none";
}
</script>

<!-- Für Chipimage -->
 <script>
// Get the modal
var modal = document.getElementById('myModal');

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById('myImg12');
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");

img.onclick = function(){
    modal.style.display = "block";
    modalImg.src = this.src;
    captionText.innerHTML = this.alt;
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
    modal.style.display = "none";
}
</script>

<!-- Für Chipimage -->
 <script>
// Get the modal
var modal = document.getElementById('myModal');

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById('myImg13');
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");

img.onclick = function(){
    modal.style.display = "block";
    modalImg.src = this.src;
    captionText.innerHTML = this.alt;
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
    modal.style.display = "none";
}
</script>

<!-- Für Chipimage -->
 <script>
// Get the modal
var modal = document.getElementById('myModal');

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById('myImg14');
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");

img.onclick = function(){
    modal.style.display = "block";
    modalImg.src = this.src;
    captionText.innerHTML = this.alt;
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
    modal.style.display = "none";
}
</script>


<!-- Für Chipimage -->
 <script>
// Get the modal
var modal = document.getElementById('myModal');

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById('myImg15');
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");

img.onclick = function(){
    modal.style.display = "block";
    modalImg.src = this.src;
    captionText.innerHTML = this.alt;
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
    modal.style.display = "none";
}
</script>

<!-- Für Chipimage -->
 <script>
// Get the modal
var modal = document.getElementById('myModal');

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById('myImg16');
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");

img.onclick = function(){
    modal.style.display = "block";
    modalImg.src = this.src;
    captionText.innerHTML = this.alt;
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
    modal.style.display = "none";
}
</script>

<!-- Für Chipimage -->
 <script>
// Get the modal
var modal = document.getElementById('myModal');

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById('myImg17');
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");

img.onclick = function(){
    modal.style.display = "block";
    modalImg.src = this.src;
    captionText.innerHTML = this.alt;
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
    modal.style.display = "none";
}
</script>

<!-- Für Chipimage -->
 <script>
// Get the modal
var modal = document.getElementById('myModal');

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById('myImg18');
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");

img.onclick = function(){
    modal.style.display = "block";
    modalImg.src = this.src;
    captionText.innerHTML = this.alt;
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
    modal.style.display = "none";
}
</script>


<!-- Für RMA Histogramm -->
 <script>
// Get the modal
var modal = document.getElementById('myModal');

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById('myImgrma');
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");

img.onclick = function(){
    modal.style.display = "block";
    modalImg.src = this.src;
    captionText.innerHTML = this.alt;
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
    modal.style.display = "none";
}
</script>

<!-- Für RMA Heatmap Spearman -->
 <script>
// Get the modal
var modal = document.getElementById('myModal');

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById('myImgrma4');
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");

img.onclick = function(){
    modal.style.display = "block";
    modalImg.src = this.src;
    captionText.innerHTML = this.alt;
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
    modal.style.display = "none";
}
</script>

<!-- Für RMA Heatmap Pearson -->
 <script>
// Get the modal
var modal = document.getElementById('myModal');

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById('myImgrma7');
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");

img.onclick = function(){
    modal.style.display = "block";
    modalImg.src = this.src;
    captionText.innerHTML = this.alt;
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
    modal.style.display = "none";
}
</script>


<!-- Für RMA Clusterdiagramm -->
 <script>
// Get the modal
var modal = document.getElementById('myModal');

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById('myImgrma6');
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");

img.onclick = function(){
    modal.style.display = "block";
    modalImg.src = this.src;
    captionText.innerHTML = this.alt;
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
    modal.style.display = "none";
}
</script>

<!-- Für MAS 5 Histogramm -->
 <script>
// Get the modal
var modal = document.getElementById('myModal');

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById('myImgmas');
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");

img.onclick = function(){
    modal.style.display = "block";
    modalImg.src = this.src;
    captionText.innerHTML = this.alt;
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
    modal.style.display = "none";
}
</script>

<!-- Für MAS 5 Heatmap Spearman -->
 <script>
// Get the modal
var modal = document.getElementById('myModal');

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById('myImgmas4');
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");

img.onclick = function(){
    modal.style.display = "block";
    modalImg.src = this.src;
    captionText.innerHTML = this.alt;
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
    modal.style.display = "none";
}
</script>

<!-- Für MAS 5 Heatmap Pearson -->
 <script>
// Get the modal
var modal = document.getElementById('myModal');

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById('myImgmas7');
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");

img.onclick = function(){
    modal.style.display = "block";
    modalImg.src = this.src;
    captionText.innerHTML = this.alt;
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
    modal.style.display = "none";
}
</script>


<!-- Für MAS 5 Clusterdiagramm -->
 <script>
// Get the modal
var modal = document.getElementById('myModal');

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById('myImgmas6');
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");

img.onclick = function(){
    modal.style.display = "block";
    modalImg.src = this.src;
    captionText.innerHTML = this.alt;
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
    modal.style.display = "none";
}
</script>



</div>
</div>


</body>
</html>