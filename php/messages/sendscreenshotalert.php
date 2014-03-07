<?php
if(empty($_POST) )
{
echo "Access denied";
}
else
{

$q = strval($_POST['q']);
$e = strval($_POST['e']);

include '../connect.php';



$sql = "SELECT ID FROM user WHERE EMAIL = '".$e."'";
$result = mysql_query($sql);
$userId = mysql_result($result, 0);

$sql="SELECT * FROM MESSAGE WHERE MSG_ID = '".$q."'";

$result = mysql_query($sql);
$row = mysql_fetch_array($result);

$content = $row['MSG_TIME'];

$sql = "INSERT INTO MESSAGE (MSG_USER_ID_FROM, MSG_USER_ID_TO, MSG_TYPE, MSG_CONTENT) VALUES ('". $row['MSG_USER_ID_TO'] ."', '". $row['MSG_USER_ID_FROM'] ."', 'screenshotalert', '". $content ."');";



mysql_query($sql);


mysql_close($con);
}
?> 