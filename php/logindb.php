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

$sql = "SELECT * FROM user WHERE EMAIL = '".$e."' AND PASSWORD = '".$p."'";
$result = mysql_query($sql);
$row = mysql_fetch_array($result);

if($row['ID']>=1)
echo "Welcome to our website " . $row['NAME'] .".";
else
echo "You have written a wrong email or a wrong password.";

mysql_close($con);
}
?> 