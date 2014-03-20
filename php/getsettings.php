<?php

if(empty($_POST) )
{
echo "Access denied";
}
else
{

$email = strval($_POST['email']);
$password = strval($_POST['password']);

include '../connect.php';

$sql = "SELECT * FROM user WHERE EMAIL = '".$email."' AND PASSWORD = '".$password."'";

$result = mysql_query($sql);

$row = mysql_fetch_array($result);

echo '<div id="settingsTxtHint" class="textInt" oncontextmenu="return false" style="text-align: center; margin: 0 auto;" ><b><br></b></div>';
echo "
<form onsubmit=\"modifySettings(this)\" method=\"post\" action=\"javascript:void(0);\">
								 <div>
								 
								
								<div class=\"row half\">
								
									<div class=\"6u\">
								Your name : <input type=\"text\" class=\"text\" name=\"name\" id=\"name\" placeholder=\"".$row['NAME']."\" maxlength=\"50\"/>
								</div>
																
								<div class=\"6u\">
								Your email : <input type=\"text\" class=\"text\" name=\"email\" id=\"email\" placeholder=\"".$row['EMAIL']."\" maxlength=\"100\"/>
								</div>							
								
								</div>
								
								<div class=\"row half\">
								<div class=\"6u\">
								Your password : <input type=\"password\" class=\"text\" name=\"password\" id=\"password\" placeholder=\"*************\" />
								</div>
								
								<div class=\"6u\">
								Password confirmation : <input type=\"password\" class=\"text\" name=\"passwordconfirmation\" id=\"passwordconfirmation\" placeholder=\"*************\" />
								</div>
								
								
								</div>
								
								
								<div class=\" half\">
								<div class=\"12u\">
								Your description : <input type=\"text\" class=\"text\" name=\"description\" id=\"description\" placeholder=\"".$row['DESCRIPTION']."\" maxlength=\"50\" />
								</div>
								</div>
								
																
								</br>	
								<div class=\"row\">
								<div class=\"12u\">
								<input id=\"change-settings\" type=\"submit\" class=\"button\" VALUE=\"Apply new settings\" />
								</div>
								</div>
								
								</div>
								</form>";








echo $row['PROFILE_PICTURE'];
		
 

mysql_close($con);
}
?> 