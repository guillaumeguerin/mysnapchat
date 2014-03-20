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


require_once "../doctrineORM/bootstrap.php";
include "../doctrineORM/src/User.php";


$repository = $entityManager->getRepository('User');
$user = $repository->getUserByEmail($email);
$friends = $user->getFriends();

if(count($friends) == 0)
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

foreach($friends as $friend)
{
	echo "<option value=".$friend->getId().">".$friend->getName()."</option>";
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
}

?>
</body>
</html> 
