<?php
if(empty($_POST) )
{
echo "Access denied";
}
else
{

$q = strval($_POST['q']);
$email = strval($_POST['email']); 
$password = strval($_POST['password']);

include '../connect.php';
include '../timeago.php';

$sql = "SELECT ID FROM user WHERE EMAIL = '".$email."' AND PASSWORD = '".$password."'";
$result = mysql_query($sql);
$userId = mysql_result($result, 0);

$sql="SELECT * FROM MESSAGE WHERE MSG_ID = '".$q."' AND MSG_USER_ID_TO = '".$userId."'";
$result = mysql_query($sql);
$row = mysql_fetch_array($result);


$sqlName = "SELECT name FROM user WHERE ID = '".$row['MSG_USER_ID_FROM']."'";
$resultName = mysql_query($sqlName);
$name = mysql_result($resultName, 0);



if($row['MSG_TYPE']=="text")
{
echo "<h3>Message from ".$name."</h3>";
echo "<content>"."<p></br><table id=\"box-table-a\"><tr><td>".$row['MSG_CONTENT']."</td></tr></table></p>";
}

if($row['MSG_TYPE']=="screenshotalert")
{
$datetime = strtotime($row['MSG_CONTENT']);
$datetimenow = strtotime("now");
$difference = $datetimenow - $datetime;
	
echo "<h3>Message from ".$name."</h3>";
echo "<p></br><table id=\"box-table-a\"><tr><td>I took a screenshot from the message you sent me ";
timeago2($difference);
echo "</td></tr></table></p><content>";
}

if($row['MSG_TYPE']=='alert')
{
$datetime = strtotime($row['MSG_CONTENT']);
$datetimenow = strtotime("now");
$difference = $datetimenow - $datetime;
	
echo "<h3>Message from ".$name."</h3>";
echo "<p></br><table id=\"box-table-a\"><tr><td>".$row['MSG_CONTENT'];
echo "</td></tr></table></p><content>";
}

if($row['MSG_TYPE']=="video")
{
echo "<h3>Message from ".$name."</h3>";
echo "<content>"."<p></br><video controls autoplay>
<source src=\"".$row['MSG_CONTENT']."\">
Your browser does not support this video format.
</video></p>";
}


if($row['MSG_TYPE']=="music")
{
echo "<h3>Message from ".$name."</h3>";
echo "<content>"."<p></br><audio controls autoplay>
<source src=\"".$row['MSG_CONTENT']."\">
Your browser does not support this audio format.
</audio>";
}


if($row['MSG_TYPE']=="picture")
{
echo "<h3>Message from ".$name."</h3></br>";
echo "<file>".$row['MSG_CONTENT'];
}



mysql_close($con);
}
?> 