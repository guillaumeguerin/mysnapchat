<?php
$file_src = "new.mp4";
move_uploaded_file($_FILES["file"]["tmp_name"], $file_src);
?>