<?php
if(empty($_POST) )
{
echo "Access denied";
}
else
{
$email = strval($_POST['email']);
$password = strval($_POST['password']);

include 'timeago.php';
require_once "../doctrineORM/bootstrap.php";
include "../doctrineORM/src/User.php";


$repository = $entityManager->getRepository('User');
$user = $repository->getUserByEmail($email);
$messages = $user->getReceivedMessages();
$row_num = count($messages);

								
if($row_num>1){
echo "<h3>You have ".$row_num." <label id=\"unreadm\">Unread messages</label></h3>
<p><table id=\"box-table-a\">";
}
else 
if($row_num==0)
{
echo "<h3><label id=\"unreadm\">You have no unread message</label></h3>
<p><table id=\"box-table-a\">";
}
else
echo "<h3>You have ".$row_num." <label id=\"unreadm\">Unread message</label></h3>
<p><table id=\"box-table-a\">";

foreach($messages as $msg)
  {
  echo "<tr>";
  if($msg->getType()=='text'){
  echo "<td> <a href=\"javascript:void(0)\" onclick=\"showMessage('php/getmessage.php?q=".$msg->getId()."')\" class=\"fa fa-comment-o\" class=\"button\"><span id=\"view\"> View</span></a></td>";
  }
  else if(($msg->getType()=='screenshotalert')||($msg->getType()=='alert')){
  echo "<td> <a href=\"javascript:void(0)\" onclick=\"showMessage('php/getmessage.php?q=".$msg->getId()."')\" class=\"fa fa-warning\" class=\"button\"><span id=\"view\"> View</span></a></td>";
  }
  
 else if($msg->getType()=='video'){
  echo "<td> <a href=\"javascript:void(0)\" onclick=\"showMessage('php/getmessage.php?q=".$msg->getId()."')\" class=\"fa fa-film\" class=\"button\"><span id=\"view\"> View</span></a></td>";
  }
  else if($msg->getType()=='picture'){
  echo "<td> <a href=\"javascript:void(0)\" onclick=\"showMessagePicture('php/getmessage.php?q=".$msg->getId()."')\" class=\"fa fa-camera\" class=\"button\"><span id=\"view\"> View</span></a></td>";
  }
    else if($msg->getType()=='music'){
  echo "<td> <a href=\"javascript:void(0)\" onclick=\"showMessage('php/getmessage.php?q=".$msg->getId()."')\" class=\"fa fa-music\" class=\"button\"><span id=\"view\"> View</span></a></td>";
  }
  else{
  echo "<td>" . $msg->getType() . "</td>";
  }  
  echo "<td>" . $user->getName() . "</td>";
  
  $datetime = strtotime($msg->getDate()->format('Y-m-d H:i:s'));
  $datetimenow = strtotime("now");
  $difference = $datetimenow - $datetime;
  
  timeago($difference);
		
		
  echo "</tr>";
  }
echo "</table></p>";
}
?> 