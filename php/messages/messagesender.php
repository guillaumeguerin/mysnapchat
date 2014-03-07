<html>
<body>
<?php
if(empty($_POST) )
{
echo "Access denied";
}
else
{

$type = strval($_POST['type']);
$email = strval($_POST['email']);
$password = strval($_POST['password']);


include '../connect.php';

$sql = "SELECT ID FROM user WHERE EMAIL = '".$email."' AND PASSWORD = '".$password."'";
$result = mysql_query($sql);
$userId = mysql_result($result, 0);

$sql="SELECT * FROM FRIENDS WHERE FDS_USER_ID_1 = '".$userId."' AND FDS_RELATIONSHIP = '1'";
$result = mysql_query($sql);


if($type == "text" || $type == "music" || $type == "video" ||$type == "picture"){

echo '<form action="php/messages/sendmessage.php?type='.$type.'&email='.$email.'" method="post" enctype="multipart/form-data">';
echo '<div class="row">';
echo '<div class="12u" style="margin-bottom:1em;">
	<select name="receiver">';

while($row = mysql_fetch_array($result))
{
	$sqlFriend = "SELECT * FROM user WHERE ID = '".$row['FDS_USER_ID_2']."'";
	$resultFriend = mysql_query($sqlFriend);
	$rowFriend = mysql_fetch_array($resultFriend);
	echo "<option value=".$rowFriend['ID'].">".$rowFriend['NAME']."</option>";
}


echo'</select>
</div></div>';

echo '<div class="row">';
echo '<div class="12u" style="margin-bottom:1em;">';

if($type == "text"){
	echo '<input type=\"text\" id="content" class="text" name="content" placeholder="Your message" />';
}
if($type == "music"){
	echo '<input type="file" id="file" class="text" name="file" accept="audio/mp3"/>';
}
if($type == "video"){
	echo '<input type="file" id="file" class="text" name="file" accept="video/mp4"/>';
}
if($type == "picture"){
	echo '<input type="file" id="file" class="text" name="file" accept="image/*"/>';
}
echo '</div>';
echo '</div>';


echo '<div class="row">										
<div class="12u">
<input id="send" class="button" type="submit" value="Send"/>
</div>
</div></form>';
}
mysql_close($con);
}

?>
</body>
</html> 
