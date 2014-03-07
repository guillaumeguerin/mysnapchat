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
$sql="SELECT * FROM MESSAGE WHERE MSG_USER_ID_TO = '".$userId."'";
$result = mysql_query($sql);

/*echo "<table id=\"box-table-a\">
<tr>
<th>TYPE</th>
<th>FROM</th>
<th>TIME</th>
</tr>"
;*/
								
$row_num = mysql_num_rows($result);	
if($row_num>1){
echo "<h3>".$row_num." <label id=\"unreadm\">Unread messages</label></h3>
<p><table id=\"box-table-a\">";
}
else
echo "<h3>".$row_num." <label id=\"unreadm\">Unread message</label></h3>
<p><table id=\"box-table-a\">";

while($row = mysql_fetch_array($result))
  {
  echo "<tr>";
  if($row['MSG_TYPE']=='text'){
  echo "<td> <a href=\"javascript:void(0)\" onclick=\"showMessage('php/messages/getmessage.php?q=".$row['MSG_ID']."')\" class=\"fa fa-comment-o\" class=\"button\"><span id=\"view\"> View</span></a></td>";
  }
  else if($row['MSG_TYPE']=='screenshotalert'){
  echo "<td> <a href=\"javascript:void(0)\" onclick=\"showMessage('php/messages/getmessage.php?q=".$row['MSG_ID']."')\" class=\"fa fa-warning\" class=\"button\"><span id=\"view\"> View</span></a></td>";
  }
 else if($row['MSG_TYPE']=='video'){
  echo "<td> <a href=\"javascript:void(0)\" onclick=\"showMessage('php/messages/getmessage.php?q=".$row['MSG_ID']."')\" class=\"fa fa-film\" class=\"button\"><span id=\"view\"> View</span></a></td>";
  }
  else if($row['MSG_TYPE']=='picture'){
  echo "<td> <a href=\"javascript:void(0)\" onclick=\"showMessagePicture('php/messages/getmessage.php?q=".$row['MSG_ID']."')\" class=\"fa fa-camera\" class=\"button\"><span id=\"view\"> View</span></a></td>";
  }
    else if($row['MSG_TYPE']=='music'){
  echo "<td> <a href=\"javascript:void(0)\" onclick=\"showMessage('php/messages/getmessage.php?q=".$row['MSG_ID']."')\" class=\"fa fa-music\" class=\"button\"><span id=\"view\"> View</span></a></td>";
  }
  else{
  echo "<td>" . $row['MSG_TYPE'] . "</td>";
  }  
    $sqlName = "SELECT name FROM user WHERE ID = '".$row['MSG_USER_ID_FROM']."'";
  $resultName = mysql_query($sqlName);
$name = mysql_result($resultName, 0);
  echo "<td>" . $name . "</td>";
    /*  $sqlName = "SELECT name FROM user WHERE ID = '".$row['MSG_USER_ID_TO']."'";
  $resultName = mysql_query($sqlName);
$name = mysql_result($resultName, 0);
  echo "<td>" . $name . "</td>";*/
  $datetime = strtotime($row['MSG_TIME']);
  $datetimenow = strtotime("now");
  $difference = $datetimenow - $datetime;
  
  timeago($difference);
		
		
  echo "</tr>";
  }
echo "</table></p>";
mysql_close($con);
}
?> 