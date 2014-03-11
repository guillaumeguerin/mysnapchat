<?php
if(empty($_POST) )
{
echo "Access denied";
}
else
{
include("connect.php");
$password = $_POST['password'];
$email = $_POST['email'];
$name = $_POST['name'];
$description = $_POST['description'];
   
if(strlen($password) < 8){
"Your password must be at least 8 characters and less than 20 characters with one uppercase, one lowercase and one digit.";
 }
else if(strlen($password) > 20){
"Your password must be at least 8 characters and less than 20 characters with one uppercase, one lowercase and one digit.";
}
else if(!preg_match('#[0-9]{1,}#', $password)) {
"Your password must be at least 8 characters and less than 20 characters with one uppercase, one lowercase and one digit.";
}
else if(!preg_match('#[A-Z]{1,}#', $password)) {
"Your password must be at least 8 characters and less than 20 characters with one uppercase, one lowercase and one digit.";
}
else if(!preg_match('#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#is', $email)) {
echo 'Your email is not valid.';
}
else if((strlen($name) < 2)||(strlen($name) > 50)) {
echo 'Your name must be at least 2 characters and less than 50 characters.';
}
else if(strlen($description) > 50) {
echo 'Your description must be less than 50 characters.';
}
else
{
$sql = "SELECT * FROM user WHERE EMAIL = '".$email."'";
$result = mysql_query($sql);

if(mysql_num_rows($result)<=0)
{
    $sql = "INSERT INTO user (EMAIL, PASSWORD, NAME, DESCRIPTION) VALUES ('". $email ."', '". md5($_POST['password']) ."', '". $name ."', '" . $description . "');";
	mysql_query($sql);
	
	
	$sqluserId = "SELECT ID FROM user WHERE EMAIL = '".$email."'";
	$userId = mysql_result(mysql_query($sqluserId), 0);
	
	if($userId>0)
	{
	$sql = "INSERT INTO FRIENDS (FDS_USER_ID_1, FDS_USER_ID_2, FDS_RELATIONSHIP) VALUES ('".$userId."', '1', '1');";	
	mysql_query($sql);
	$sql = "INSERT INTO FRIENDS (FDS_USER_ID_1, FDS_USER_ID_2, FDS_RELATIONSHIP) VALUES ('1', '".$userId."', '1');";	
	mysql_query($sql);
	$content="Welcome to Snap chat Bordeaux !";
	$sql = "INSERT INTO MESSAGE (MSG_USER_ID_FROM, MSG_USER_ID_TO, MSG_TYPE, MSG_CONTENT) VALUES ('1', '".$userId."', 'alert', '". $content ."');";
	mysql_query($sql);
	echo "True";
	}
}
else
echo "Email is already used.";
}	
	mysql_close($con);                
}
?>