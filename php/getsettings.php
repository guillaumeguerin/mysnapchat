<?php

if(empty($_POST) )
{
echo "Access denied";
}
else
{

$email = strval($_POST['email']);
$password = strval($_POST['password']);

require_once "../doctrineORM/bootstrap.php";
include "../doctrineORM/src/User.php";

$repository = $entityManager->getRepository('User');
$user = $repository->getUserByEmail($email);

echo '<div id="settingsTxtHint" class="textInt" oncontextmenu="return false" style="text-align: center; margin: 0 auto;" ><b><br></b></div>';
echo "
<form onsubmit=\"modifySettings(this)\" method=\"post\" action=\"javascript:void(0);\">
								 <div>
								 
								
								<div class=\"row half\">
								
									<div class=\"6u\">
								Your name : <input type=\"text\" class=\"text\" name=\"name\" id=\"name\" placeholder=\"".$user->getName()."\" maxlength=\"50\"/>
								</div>
																
								<div class=\"6u\">
								Your email : <input type=\"text\" class=\"text\" name=\"email\" id=\"email\" placeholder=\"".$user->getEmail()."\" maxlength=\"100\"/>
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
								Your description : <input type=\"text\" class=\"text\" name=\"description\" id=\"description\" placeholder=\"".$user->getDescription()."\" maxlength=\"50\" />
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








echo $user->getProfile_picture();
}
?> 