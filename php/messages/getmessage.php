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
$rownum = mysql_num_rows ($result);
$row = mysql_fetch_array($result);


$sqlName = "SELECT name FROM user WHERE ID = '".$row['MSG_USER_ID_FROM']."'";
$resultName = mysql_query($sqlName);
$name = mysql_result($resultName, 0);


if($rownum == 1)
{
echo "<h3>Message from ".$name."</h3>";
echo "<br>The following message will be destroyed in <font color='red' size='5'>  <label id='timeMessage'></label></font> seconds.<br>";

if($row['MSG_TYPE']=="text")
{

echo "<content><p></br><table id=\"box-table-a\"><tr><td><font size='5'><center>".$row['MSG_CONTENT']."</center></font></td></tr></table></p>";
}

if($row['MSG_TYPE']=="screenshotalert")
{
$datetime = strtotime($row['MSG_CONTENT']);
$datetimenow = strtotime("now");
$difference = $datetimenow - $datetime;

echo "<p></br><table id=\"box-table-a\"><tr><td><font size='5'><center>I took a screenshot from the message you sent me ";
timeago2($difference);
echo ".</center></font></td></tr></table></p><content>";
}

if($row['MSG_TYPE']=='alert')
{
$datetime = strtotime($row['MSG_CONTENT']);
$datetimenow = strtotime("now");
$difference = $datetimenow - $datetime;

echo "<p></br><table id=\"box-table-a\"><tr><td><font size='5'><center>".$row['MSG_CONTENT']."</center></font></td></tr></table></p><content>";
}

if($row['MSG_TYPE']=="video")
{
echo "<content>"."<p></br><video id=\"video\" controls autoplay>
<source src=\"".$row['MSG_CONTENT']."\">
Your browser does not support this video format.
</video></p>";
}


if($row['MSG_TYPE']=="music")
{
echo "<content>"."<p></br><audio id=\"music\" controls autoplay>
<source src=\"".$row['MSG_CONTENT']."\">
Your browser does not support this audio format.
</audio>";
}


if($row['MSG_TYPE']=="picture")
{
echo "</br><file>".$row['MSG_CONTENT'];
}
}
else 
echo "Message already watched !";



mysql_close($con);
}
?> 