<?php
if(empty($_POST) )
{
echo "Access denied";
}
else
{
  
$q = strval($_POST['q']);


include '../connect.php';


$sqlUserId = "SELECT ID FROM user WHERE EMAIL = '".$q."'";
$userId = mysql_result(mysql_query($sqlUserId), 0);


$sql = "DELETE FROM FRIENDS WHERE MSG_USER_ID_FROM = '".$userId."'";
mysql_query($sql);

$sql = "DELETE FROM FRIENDS WHERE MSG_USER_ID_TO = '".$userId."'";
mysql_query($sql);

$sql = "DELETE FROM FRIENDS WHERE FDS_USER_ID_1 = '".$userId."'";
mysql_query($sql);

$sql = "DELETE FROM FRIENDS WHERE FDS_USER_ID_2 = '".$userId."'";
mysql_query($sql);
	

$sql = "DELETE FROM user WHERE EMAIL = '".$q."'";
mysql_query($sql);
 



mysql_close($con);
}
?> 