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

$sql="SELECT MSG_CONTENT FROM MESSAGE WHERE MSG_ID = '".$q."'";
$result = mysql_query($sql);
$filepath = mysql_result($result, 0);

$sql = "SELECT ID FROM user WHERE EMAIL = '".$e."'";
$result = mysql_query($sql);
$userId = mysql_result($result, 0);

$sql="SELECT MSG_TYPE FROM MESSAGE WHERE MSG_ID = '".$q."'";
$result = mysql_query($sql);
$type = mysql_result($result, 0);


$sql="DELETE FROM MESSAGE WHERE MSG_ID = '".$q."' AND MSG_USER_ID_TO = '".$userId."' ";
$result = mysql_query($sql);

if(type!="text"||type!="screenshotalert")
{
unlink("../../".$filepath);
}

mysql_close($con);
}
?> 