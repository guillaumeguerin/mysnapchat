<!Doctype html>
<html>
<body>
	
	<?php
	
		function removeFile($index)
		{				
			//sleep(25);
			if(file_exists($index)&& (is_file($index)))
			{
				unlink($index);
			}
			return;
		}
	
		if(isset($_POST['image']))
		{
			removeFile($_POST['image']);
			//faire des trucs ...
		}

	?>

	
</body>
</html>
