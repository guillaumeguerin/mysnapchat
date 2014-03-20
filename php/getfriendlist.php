<?php

if(empty($_POST) )
{
echo "Access denied";
}
else
{

$email = strval($_POST['email']);
$password = strval($_POST['password']);

include '../timeago.php';
require_once "../doctrineORM/bootstrap.php";
include "../doctrineORM/src/User.php";


$repository = $entityManager->getRepository('User');
$user = $repository->getUserByEmail($email);
$friendRequests = $user->getFriendRequests();						
$row_num = count($friendRequests);

if($row_num>1){
echo "<h3>You have ".$row_num." friend requests</h3>
<p><table id=\"box-table-a\">";
}
else
if($row_num==0){
echo "<h3>You have no friend request</h3>
<p><table id=\"box-table-a\">";
}
else
echo "<h3>You have ".$row_num." friend request</h3>
<p><table id=\"box-table-a\">";

foreach($friendRequests as $fr)
  {
 echo "<tr>";
    
  echo "<td>" . $fr->getName() . "</td>";
  
  
  


  echo "<td> <a onclick=\"callphp('php/accept.php?e=".$user->getEmail()."&fe=".$fr->getEmail()."')\" class=\"fa fa-check\" style=\"color:rgb(143, 224, 143);\"><span id=\"accept\"> Accept</span></a></td>";
  
   echo "<td> <a onclick=\"callphp('php/refuse.php?e=".$user->getEmail()."&fe=".$fr->getEmail()."')\" class=\"fa fa-times\" style=\"color:#F76969;\"><span id=\"refuse\"> Refuse</span></a></td>";
  
  
  //$datetime = strtotime($row['FDS_DATE']);
  //$datetimenow = strtotime("now");
  //$difference = $datetimenow - $datetime;
  

  //timeago($difference);
		
		
  echo "</tr>";
  }
echo "</table></p>";


$friends = $user->getFriends();
								
$row_num = count($friends);
if($row_num>1){
echo "<h3>You have ".$row_num." friends</h3>
<p><table id=\"box-table-a\">";
}
else
if($row_num==0){
echo "<h3>You have no friend</h3>
<p><table id=\"box-table-a\">";
}
else
echo "<h3>You have ".$row_num." friend</h3>
<p><table id=\"box-table-a\">";

foreach($friends as $friend)
  {
 echo "<tr>";
  
  echo "<td>" . $friend->getName() . "</td>";
   echo "<td> <a onclick=\"callphp('php/delete.php?e=".$user->getEmail()."&fe=".$friend->getEmail()."')\" class=\"fa fa-times\" style=\"color:#F76969;\"><span id=\"delete\"> Delete</span></a></td>";
  
  
  //$datetime = strtotime($row['FDS_DATE']);
  //$datetimenow = strtotime("now");
  //$difference = $datetimenow - $datetime;
  

  //timeago($difference);
		
		
  echo "</tr>";
  }
echo "</table></p>";
}
?> 