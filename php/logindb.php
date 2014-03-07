<?php
if(empty($_POST) )
{
echo "Access denied";
}
else
{
$e = strval($_POST['e']);

$p = strval($_POST['p']);

include 'connect.php';

$sqluserId1 = "SELECT ID FROM user WHERE EMAIL = '".$e."' AND PASSWORD = '".$p."'";
$userId1 = mysql_result(mysql_query($sqluserId1), 0);

if($userId1>=1)
echo "true";
else
echo "You have written a wrong email or a wrong password.";

mysql_close($con);
}
?> 