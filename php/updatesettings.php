<?php
if(empty($_POST) )
{
echo "Access denied";
}
else
{
$email = strval($_POST['email']); 
$password = strval($_POST['password']);

$ne = strval($_POST['ne']);
$np = strval($_POST['np']);
$nn = strval($_POST['nn']);
$nd = strval($_POST['nd']);

require_once "../doctrineORM/bootstrap.php";
include "../doctrineORM/src/User.php";

$repository = $entityManager->getRepository('User');
$user = $repository->getUserByEmail($email);

if($_POST['nn']!="")
{
	$user->setName($nn);
}

if($_POST['nd']!="")
{
	$user->setDescription($nd);
}

if($_POST['np']!="")
{
$user->setPassword($np);
}

if($_POST['ne']!="")
{
$user->setEmail($ne);
}
$entityManager->flush();
}
?> 
