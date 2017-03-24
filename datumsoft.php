<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
 
<style>
body {
        background-image: url("Free-Backgrounds-585.png");
} 
 
</style>
 
</head>
 
<body>
 
</body>
</html>


<!DOCTYPE html>
<html lang= "de">
<head>
 <meta charset="utf-8">
<title>Begruessung</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>

/*body {
    background-color: lightblue;
}	*/

  p {
    color: grey;
    margin: 5px;
    
  }
 
  </style>  


</head>

<body>
<div class="container">
<div class="jumbotron">

<?php

	echo "Akutelle Uhrzeit und Datum: ",date("r");


	date_default_timezone_set("Europe/Berlin");
	$timestamp = mktime();	
	$uhrzeit = date("H:i", $timestamp);
	
	$abends1 = "18:00";
	$abends2 = "00:00";
	
	$tag1= "12:00";
	$tag2 = "18:00";
	
	$morgen1="06:00";
	$morgen2="12:00";
	
	$nacht1="00:00";
	$nacht2="06:00";
	
	
	if ($uhrzeit<$tag2)
		{
			if ($uhrzeit>=$tag1)
			{
	echo "<p> <font size='20pt'> Guten Tag,</font> </p>";
	}}
	
	if ( $uhrzeit>=$abends1)
	{
	echo "<p> <font size='20pt'> Guten Abend, </font> </p>";
	}
	
	if ($uhrzeit<$morgen2 && $uhrzeit>=$morgen1)
	{
	echo  "<p> <font size='20pt'> Guten Morgen, </font> </p>";
	}
	
	if ($uhrzeit<$nacht2 && $uhrzeit>=$nacht1)
	{
	echo "<p> <font size='20pt'> Guten Morgen,</font> </p>";
	}


if (empty ($_GET['vorname']) == TRUE)
{
	echo ' 
	<form action="datumsoft.php" method="get" >
 
	<p>Ihr Vorname:
	<input type="text" name="vorname">
	</p>
 
	<p>
	<input type="submit" value="absenden">
	</p>
 
	</form>
';
}

else 
{
	echo "<p><font size='20pt'>" .$_GET['vorname'];
	}


?>

</body>
</html>



	
	