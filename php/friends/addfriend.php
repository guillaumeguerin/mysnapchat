<?php
if(empty($_POST) )
{
echo "Access denied";
}
else
{
$e = strval($_POST['e']);

$fe = strval($_POST['fe']);

include '../connect.php';

$sqluserId1 = "SELECT ID FROM user WHERE EMAIL = '".$e."'";
$userId1 = mysql_result(mysql_query($sqluserId1), 0);

$sqluserId2 = "SELECT ID FROM user WHERE EMAIL = '".$fe."'";
$userId2 = mysql_result(mysql_query($sqluserId2), 0);

$sql = "INSERT INTO FRIENDS(FDS_USER_ID_1, FDS_USER_ID_2, FDS_RELATIONSHIP) VALUES ('".$userId2."','".$userId1."','0');";
mysql_query($sql);

echo $e;

mysql_close($con);
}
?> 