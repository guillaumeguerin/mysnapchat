<?php
if(empty($_POST) )
{
echo "Access denied";
}
else
{
$password = $_POST['password'];
$email = $_POST['email'];
$name = $_POST['name'];
$description = $_POST['description'];
   
if(strlen($password) < 8){
"Your password must be at least 8 characters and less than 20 characters with one uppercase, one lowercase and one digit.";
 }
else if(strlen($password) > 20){
"Your password must be at least 8 characters and less than 20 characters with one uppercase, one lowercase and one digit.";
}
else if(!preg_match('#[0-9]{1,}#', $password)) {
"Your password must be at least 8 characters and less than 20 characters with one uppercase, one lowercase and one digit.";
}
else if(!preg_match('#[A-Z]{1,}#', $password)) {
"Your password must be at least 8 characters and less than 20 characters with one uppercase, one lowercase and one digit.";
}
else if(!preg_match('#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#is', $email)) {
echo 'Your email is not valid.';
}
else if((strlen($name) < 2)||(strlen($name) > 50)) {
echo 'Your name must be at least 2 characters and less than 50 characters.';
}
else if(strlen($description) > 50) {
echo 'Your description must be less than 50 characters.';
}
else
{

require_once "../doctrineORM/bootstrap.php";
include "../doctrineORM/src/User.php";

$repository = $entityManager->getRepository('User');
$result = $repository->createUser($email, md5($password), $name, $description);
if($result)
	echo "True";
else
	echo "Email is already used.";
         
}
}
?>