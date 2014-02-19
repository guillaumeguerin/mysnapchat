<!Doctype html>
<html>
    <head>
        <title> Page Web</title>
	</head>
	<body>
	<?php
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
?>
	<!--<script src="jquery.js"> </script>-->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js" ></script>
	
	<?php
		$image="../uploading/image/testfile.png";
		$timer = 5000; //msec
		
		//un formulaire caché pour transporter le nom du fichier à supprimer
		// à la page rm_image.php
		echo "
			<form id = 'rm_image' action='rm_image.php' method='post'>
				<input type='hidden' name='image' value='{$image}'/>
			</form>
			";

		echo "<div id=\"galerie\">
		<img src=$image  alt=\"testfile\" class=\"active\"/>
		</div>";
		
		//auto validation du formulaire après le timer
		echo	
			"<script>
					setTimeout(\"$('#galerie img').fadeOut('slow')\",{$timer});
					setTimeout('document.getElementById(\"rm_image\").submit()',{$timer});
		
			</script>";
		
		
	//removeFile($image);

	
?>
	</body>
</html>
