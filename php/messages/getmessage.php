<?php
if(empty($_POST) )
{
echo "Access denied";
}
else
{
set_time_limit(0);
$q = strval($_POST['q']);

include '../connect.php';
include '../timeago.php';

$sql="SELECT MSG_CONTENT FROM MESSAGE WHERE MSG_ID = '".$q."'";
$result = mysql_query($sql);
$messagecontent = mysql_result($result, 0);

$sqlfrom="SELECT MSG_USER_ID_FROM FROM MESSAGE WHERE MSG_ID = '".$q."'";
$resultfrom = mysql_query($sqlfrom);
$from = mysql_result($resultfrom, 0);

$sqlName = "SELECT name FROM user WHERE ID = '".$from."'";
$resultName = mysql_query($sqlName);
$name = mysql_result($resultName, 0);

$sql="SELECT MSG_TYPE FROM MESSAGE WHERE MSG_ID = '".$q."'";
$result = mysql_query($sql);
$type = mysql_result($result, 0);

if($type=="text")
{
echo "<h3>Message from ".$name."</h3>";
echo "<content>"."<p></br><table id=\"box-table-a\"><tr><td>".$messagecontent."</td></tr></table></p>";
}

if($type=="screenshotalert")
{
$datetime = strtotime($messagecontent);
$datetimenow = strtotime("now");
$difference = $datetimenow - $datetime;
	
echo "<h3>Message from ".$name."</h3>";
echo "<p></br><table id=\"box-table-a\"><tr><td>I took a screenshot from the message you sent me ";
timeago2($difference);
echo "</td></tr></table></p><content>";
}

if($type=="video")
{
echo "<h3>Message from ".$name."</h3>";
echo "<content>"."<p></br><video controls autoplay>
<source src=\"".$messagecontent."\">
Your browser does not support this video format.
</video></p>";
}


if($type=="music")
{
echo "<h3>Message from ".$name."</h3>";
echo "<content>"."<p></br><audio controls autoplay>
<source src=\"".$messagecontent."\">
Your browser does not support this audio format.
</audio>";
}


if($type=="picture")
{
echo "<h3>Message from ".$name."</h3></br>";
echo "<file>".$messagecontent;
}



mysql_close($con);
}
?> 