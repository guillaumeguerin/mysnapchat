<?php

if(empty($_POST) )
{
echo "Access denied";
}
else
{

$email = strval($_POST['email']);
$password = strval($_POST['password']);

include '../connect.php';
include '../timeago.php';

$sql = "SELECT ID FROM user WHERE EMAIL = '".$email."' AND PASSWORD = '".$password."'";
$result = mysql_query($sql);
$userId = mysql_result($result, 0);


$sql="SELECT * FROM FRIENDS WHERE FDS_USER_ID_1 = '".$userId."' AND FDS_RELATIONSHIP = '0' ORDER BY FDS_ID DESC";
$result = mysql_query($sql);

								
$row_num = mysql_num_rows($result);	
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

while($row = mysql_fetch_array($result))
  {
 echo "<tr>";
    $sqlName = "SELECT name FROM user WHERE ID = '".$row['FDS_USER_ID_2']."'";
  $resultName = mysql_query($sqlName);
$name = mysql_result($resultName, 0);
  echo "<td>" . $name . "</td>";
  
  
  

    

  echo "<td> <a onclick=\"callphp('php/friends/accept.php?q=".$row['FDS_ID']."')\" class=\"fa fa-check\" style=\"color:rgb(143, 224, 143);\"><span id=\"accept\"> Accept</span></a></td>";
  
   echo "<td> <a onclick=\"callphp('php/friends/refuse.php?q=".$row['FDS_ID']."')\" class=\"fa fa-times\" style=\"color:#F76969;\"><span id=\"refuse\"> Refuse</span></a></td>";
  
  
  $datetime = strtotime($row['FDS_DATE']);
  $datetimenow = strtotime("now");
  $difference = $datetimenow - $datetime;
  

  timeago($difference);
		
		
  echo "</tr>";
  }
echo "</table></p>";


$sql="SELECT * FROM FRIENDS WHERE FDS_USER_ID_1 = '".$userId."' AND FDS_RELATIONSHIP = '1' ORDER BY FDS_ID DESC";
$result = mysql_query($sql);

								
$row_num = mysql_num_rows($result);	
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

while($row = mysql_fetch_array($result))
  {
 echo "<tr>";
    $sqlName = "SELECT name FROM user WHERE ID = '".$row['FDS_USER_ID_2']."'";
  $resultName = mysql_query($sqlName);
$name = mysql_result($resultName, 0);
  echo "<td>" . $name . "</td>";
  
  
  

    echo "<td> <a onclick=\"callphp('php/friends/delete.php?q=".$row['FDS_ID']."')\" class=\"fa fa-times\" style=\"color:#F76969;\"><span id=\"delete\"> Delete</span></a></td>";
  
  
  $datetime = strtotime($row['FDS_DATE']);
  $datetimenow = strtotime("now");
  $difference = $datetimenow - $datetime;
  

  timeago($difference);
		
		
  echo "</tr>";
  }
echo "</table></p>";

mysql_close($con);
}
?> 