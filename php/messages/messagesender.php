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

if(mysql_num_rows($result)==0)
{
echo "<h3>You need to have at least a friend to send messages.</h3>";
}
else
{

if($type == "text" || $type == "music" || $type == "video" ||$type == "picture"){

 echo '<p><div id="messageSendertxtHint" class="textInt" oncontextmenu="return false" style="text-align: center; margin: 0 auto;" ><b></b></div></p>';
                                    

echo "<form onsubmit=\"sendMessage(this,'".$type."')\" method=\"post\" action=\"javascript:void(0);\">";

echo '<h3>Receiver :</h3><p>';
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



if($type == "text"){
	echo '<h3>Your message :</h3><p>';
	echo '<div class="row">';
	echo '<div class="12u" style="margin-bottom:1em;">';
	echo '<input type=\"text\" id="content" class="text" name="content" placeholder="Your message" 
    maxlength="200" />';
}
if($type == "music"){
	echo '<h3>Your music :</h3><p>';
	echo '<div class="row">';
	echo '<div class="12u" style="margin-bottom:1em;">';
	echo '<input type="file" id="content" class="text" name="file" accept="audio/mp3"/>';
}
if($type == "video"){
	echo '<h3>Your video :</h3><p>';
	echo '<div class="row">';
	echo '<div class="12u" style="margin-bottom:1em;">';
	echo '<input type="file" id="content" class="text" name="file" accept="video/mp4"/>';
}
if($type == "picture"){
	echo '<h3>Your picture :</h3><p>';
	echo '<div class="row">';
	echo '<div class="12u" style="margin-bottom:1em;">';
	echo '<input type="file" id="content" class="text" name="file" accept="image/*"/>';
}
echo '</div>';
echo '</div>';

if($type != "text"){
echo '<h3>Upload progression :</h3><p>';
echo "<div class='progressbar_container'>
            <div id='progressbar' class='progressbar'></div>
        </div><div id='progressbarpercent' class='progressbarpercent'>0%</div>";
echo '</p>';
}

echo '<div class="row">										
<div class="12u">
<input id="send" class="button" type="submit" value="Send"/>
</div>
</div></form>';
}
}
mysql_close($con);
}

?>
</body>
</html> 
