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

include 'timeago.php';
require_once "../doctrineORM/bootstrap.php";
include "../doctrineORM/src/User.php";

$msg = $entityManager->find('Message', $q);

if($msg->getType()=="text")
{
echo "<h3>Message from ".$msg->getSender()->getName()."</h3>";
echo "<content>"."<p></br><table id=\"box-table-a\"><tr><td>".$msg->getContent()."</td></tr></table></p>";
}


if($msg->getType()=="screenshotalert")
{
$datetime = strtotime($msg->getContent());
$datetimenow = strtotime("now");
$difference = $datetimenow - $datetime;
	
echo "<h3>Message from ".$msg->getSender()->getName()."</h3>";
echo "<p></br><table id=\"box-table-a\"><tr><td>I took a screenshot from the message you sent me ";
timeago2($difference);
echo "</td></tr></table></p><content>";
}

if($msg->getType()=='alert')
{
$datetime = strtotime($msg->getContent);
$datetimenow = strtotime("now");
$difference = $datetimenow - $datetime;
	
echo "<h3>Message from ".$msg->getSender()->getName()."</h3>";
echo "<p></br><table id=\"box-table-a\"><tr><td>".$msg->getContent;
echo "</td></tr></table></p><content>";
}

if($msg->getType()=="video")
{
echo "<h3>Message from ".$msg->getSender()->getName()."</h3>";
echo "<content>"."<p></br><video controls autoplay>
<source src=\"".$msg->getContent."\">
Your browser does not support this video format.
</video></p>";
}


if($msg->getType()=="music")
{
echo "<h3>Message from ".$msg->getSender()->getName()."</h3>";
echo "<content>"."<p></br><audio controls autoplay>
<source src=\"".$msg->getContent."\">
Your browser does not support this audio format.
</audio>";
}


if($msg->getType()=="picture")
{
echo "<h3>Message from ".$msg->getSender()->getName()."</h3></br>";
echo "<file>".$msg->getContent;
}
}
?> 
