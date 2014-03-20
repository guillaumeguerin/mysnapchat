<?php
if(empty($_POST) )
{
echo "Access denied";
}
else
{
  
$email = strval($_POST['email']);

require_once "../doctrineORM/bootstrap.php";
include "../doctrineORM/src/User.php";

$repository = $entityManager->getRepository('User');
$repository->removeUser($email);
}
}
?> 