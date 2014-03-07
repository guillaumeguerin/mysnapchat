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


$sqlUserId = "SELECT ID FROM user WHERE EMAIL = '".$email."'";
$userId = mysql_result(mysql_query($sqlUserId), 0);

if($userId>=1){
$sql = "DELETE FROM MESSAGE WHERE MSG_USER_ID_FROM = '".$userId."'";
mysql_query($sql);

$sql = "DELETE FROM MESSAGE WHERE MSG_USER_ID_TO = '".$userId."'";
mysql_query($sql);

$sql = "DELETE FROM FRIENDS WHERE FDS_USER_ID_1 = '".$userId."'";
mysql_query($sql);

$sql = "DELETE FROM FRIENDS WHERE FDS_USER_ID_2 = '".$userId."'";
mysql_query($sql);
	

$sql = "DELETE FROM user WHERE EMAIL = '".$email."'";
mysql_query($sql);
}



mysql_close($con);
}
?> 