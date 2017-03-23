
<!DOCTYPE html>
<html lang= "de">
<head>
 <meta charset="utf-8">
<title>Begruessung</title>

<style>
  p {
    color: red;
    margin: 5px;
    cursor: pointer;
  }
  p:hover {
    background: yellow;
  }
  </style>
<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


</head>

<body>

<?php 
	
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
	echo "Guten Tag";
	}}
	
	if ( $uhrzeit>=$abends1)
	{
	echo "Guten Abend";
	}
	
	if ($uhrzeit<$morgen2 && $uhrzeit>=$morgen1)
	{
	echo "Guten Morgen";
	}
	
	if ($uhrzeit<$nacht2 && $uhrzeit>=$nacht1)
	{
	echo "Guten Morgen";
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
	echo ",  " .$_GET['vorname'];
	}
	?>

<br>

</body>
</html>

<!DOCTYPE html>
<html lang= "de">
<head>
 <meta charset="utf-8">
<title>Begruessung</title>

<link href="http://hayageek.github.io/jQuery-Upload-File/4.0.10/uploadfile.css" rel="stylesheet">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="http://hayageek.github.io/jQuery-Upload-File/4.0.10/jquery.uploadfile.min.js"></script>

</head>

<body>

<div id="restrictupload2">Upload</div>

</body>

<script>
$(document).ready(function()
{
	$("#restrictupload2").uploadFile({
url:"uploadliste.php",
fileName:"myfile",
maxFileCount:3,
maxFileSize:100*1024
}); 
  	
});
</script>

</html>


	
	