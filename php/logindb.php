<?php
if(empty($_POST) )
{
echo "Access denied";
}
else
{
$e = strval($_POST['e']);

$p = strval($_POST['p']);

require_once "../doctrineORM/bootstrap.php";
include "../doctrineORM/src/User.php";


$repository = $entityManager->getRepository('User');
$result = $repository->checkUser($e, $p);
if($result)
	echo "Welcome to our website " . $result->getName() .".";
else
	echo "You have written a wrong email or a wrong password.";
}
?> 