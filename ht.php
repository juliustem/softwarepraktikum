<!DOCTYPE html>
<head>
<title>Begruessung</title>

<link href="http://hayageek.github.io/jQuery-Upload-File/4.0.10/uploadfile.css" rel="stylesheet">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="http://hayageek.github.io/jQuery-Upload-File/4.0.10/jquery.uploadfile.min.js"></script>

</head>

<body>

<div id="showoldupload">Upload</div>

</body>

<script>
$(document).ready(function()
{
	$("#showoldupload").uploadFile({
		url: "uploadliste.php",
dragDrop: true,
fileName: "myfile",

showDelete: true,
showDownload:true,


onLoad:function(obj)
   {
   	$.ajax({
	    	cache: false,
		    url: "load.php",
	    	dataType: "json",
		    success: function(data) 
		    {
			    for(var i=0;i<data.length;i++)
   	    	{ 
       			obj.createProgress(data[i]["name"],data[i]["path"],data[i]["size"]);
       		}
	        }
		});
  },
deleteCallback: function (data, pd) {
    for (var i = 0; i < data.length; i++) {
        $.post("delete.php", {op: "delete",name: data[i]},
            function (resp,textStatus, jqXHR) {
                //Show Message	
                alert("File Deleted");
            });
    }
    pd.statusbar.hide(); //You choice.

},
downloadCallback:function(filename,pd)
	{
		location.href="download.php?filename="+filename;
	}
});

});
</script>

</html>



