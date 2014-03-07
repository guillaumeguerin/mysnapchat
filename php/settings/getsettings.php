<?php

if(empty($_POST) )
{
echo "Access denied";
}
else
{

$q = strval($_POST['q']);

include '../connect.php';
include '../timeago.php';

$sql = "SELECT * FROM user WHERE EMAIL = '".$q."'";

$result = mysql_query($sql);

$row = mysql_fetch_array($result);


echo "
<form onsubmit=\"modifySettings(this)\" method=\"post\" action=\"javascript:void(0);\">
								 <div>
								 
								
								<div class=\"row half\">
								<div class=\"6u\">
								Your email : <input type=\"text\" class=\"text\" name=\"email\" id=\"email\" placeholder=\"".$row['EMAIL']."\" />
								</div>
								
								<div class=\"6u\">
								Your password : <input type=\"text\" class=\"text\" name=\"password\" id=\"password\" placeholder=\"*************\" />
								</div>
								</div>
								
								<div class=\"row half\">
								<div class=\"6u\">
								Your name : <input type=\"text\" class=\"text\" name=\"name\" id=\"name\" placeholder=\"".$row['NAME']."\" />
								</div>
								
								<div class=\"6u\">
								Your description : <input type=\"text\" class=\"text\" name=\"description\" id=\"description\" placeholder=\"".$row['DESCRIPTION']."\" />
								</div>
								</div>
								
																
								</br>	
								<div class=\"row\">
								<div class=\"12u\">
								<input id=\"change-settings\" type=\"submit\" class=\"button\" VALUE=\"Apply new settings\" />
								</div>
								</div>
								
								</div>
								</form>
								<br>";








echo $row['PROFILE_PICTURE'];
		
 

mysql_close($con);
}
?> 