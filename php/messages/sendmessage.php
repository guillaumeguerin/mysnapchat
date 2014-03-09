<?php

	if(empty($_POST) )
	{
	echo "Access denied";
	}
	else
	{
	
    include("../connect.php");
	
	$type = $_POST["type"];
	$email = $_POST["email"];
	$password = $_POST["password"];
	
	
	$sql = "SELECT ID FROM user WHERE EMAIL = '".$email."' AND PASSWORD = '".$password."'";
	$result = mysql_query($sql);
	$userId = mysql_result($result, 0);
	
	$content="Please don\'t spam the admin account !";
	if($_POST['receiver']=='1')
	{
	$sql = "INSERT INTO MESSAGE (MSG_USER_ID_FROM, MSG_USER_ID_TO, MSG_TYPE, MSG_CONTENT) VALUES ('". $_POST['receiver'] ."', '".$userId."', 'alert', '". $content ."');";
	mysql_query($sql);
	}
    else
	{
    if($type == "text" || $type == "music" || $type == "video" ||$type == "picture"){

        
        


        if($type == "text"){
            $content = $_POST['content'];
			if($content != NULL){
		
		
		
            $sql = "INSERT INTO MESSAGE (MSG_USER_ID_FROM, MSG_USER_ID_TO, MSG_TYPE, MSG_CONTENT) VALUES ('". $userId ."', '". $_POST['receiver'] ."', '".$type."', '". $content ."');";
			mysql_query($sql);
			echo "Your message has been sent.";
        }
        }
        else
		{

		$date = date("d-m-Y_h-i-s", time());

		
		$temp = explode(".", $_FILES["file"]["name"]);
        $extension = end($temp);
		if($type == "music"){
            $allowedExts = array("mp3");      
			$path = "messages/musics/";			
			$typem = "audio";
        }
		else
        if($type == "video"){
            $allowedExts = array("mp4");
			$path = "messages/videos/";
			$typem = "video";
        }
		else
        if($type == "picture"){
            $allowedExts = array("gif", "jpeg", "jpg", "png");
			$path = "messages/pictures/";
			$typem = "image";
            }

            /*if ((( == "image/gif")
            || ($_FILES["file"]["type"] == "image/jpeg")
            || ($_FILES["file"]["type"] == "image/jpg")
            || ($_FILES["file"]["type"] == "image/pjpeg")
            || ($_FILES["file"]["type"] == "image/x-png")
            || ($_FILES["file"]["type"] == "image/png"))
            && ($_FILES["file"]["size"] < 20000)
            && in_array($extension, $allowedExts))
              {*/
			  
			  
			  if($_FILES["file"]["size"] <= 10485760)
			  {
			  if(strpos($_FILES["file"]["type"], $typem)!== false)
			  {
              if ($_FILES["file"]["error"] > 0)
                {
                //echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
                }
              else
                {
                //echo "Upload: " . $_FILES["file"]["name"] . "<br>";
                //echo "Type: " . $_FILES["file"]["type"] . "<br>";
                //echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
                //echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";

                
                  move_uploaded_file($_FILES["file"]["tmp_name"],"../../".$path . $date . "_" .$_FILES["file"]["name"]);
                 // echo "Stored in: " . $path . $date . "_" . $_FILES["file"]["name"];
                  
                  $content = $path . $date . "_" . $_FILES["file"]["name"];
                  
				  
                }
              
        
		




        if($content != NULL){
		
				
            $sql = "INSERT INTO MESSAGE (MSG_USER_ID_FROM, MSG_USER_ID_TO, MSG_TYPE, MSG_CONTENT) VALUES ('". $userId ."', '". $_POST['receiver'] ."', '".$type."', '". $content ."');";			  
           $result= mysql_query($sql);
		   echo "Your message has been sent.";
        }
	}
	else
	echo "Wrong file type";
	}
	else
	echo "Wrong file size";
        
		  
    
	}
	
	}
	}
	mysql_close($con);
	}
?>
