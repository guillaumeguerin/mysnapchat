<?php
if(isset($_POST['submitted'])){
	if(isset($_FILES['upload'])){
		$allowed=array('image/pjpeg', 'image/jpeg', 'image/JPG', 'image/X-PNG', 'image/JPG','image/png', 'image/x-png');
		if(in_array($_FILES['upload']['type'] , $allowed)){
			if(move_uploaded_file($_FILES['upload']['tmp_name'] , "image/{$_FILES['upload']['name']}")){
				echo '<p><em> The file has been uploaded!</em></p>\n';
				//echo "tmp_vname value is:".$_FILES['upload']['tmp_name']."\n";
			}
		}
		else{
			echo '<p class="error">Please upload a good format image</p>';
		}	
	}	
	
	if($_FILES['upload']['error']){
		echo '<p class="error">not upload </p>';
	}
}


?>
