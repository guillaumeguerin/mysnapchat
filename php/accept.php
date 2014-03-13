<?php
if(empty($_POST) )
{
echo "Access denied";
}
else
{
  
$email = strval($_POST['e']);
$friendEmail = strval($_POST['fe']);

require_once "../doctrineORM/bootstrap.php";
include "../doctrineORM/src/User.php";


$repository = $entityManager->getRepository('User');
$repository->acceptFriendRequest($email, $friendEmail);

echo $email;
}
?> 