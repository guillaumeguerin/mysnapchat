<?php
require_once "bootstrap.php";
include "src/User.php";

$repository = $entityManager->getRepository('User');
$friends = $repository->getFriends(1);
foreach($friends as $friend)
	echo("this user is friend with ".$friend->getName()."\n");

$newUser = $repository->createUser("jean@GCI.poc", "azertyui", "jean BIBU", "pro du common lisp");

echo $repository->checkUser("jean@GCI.poc", "azertyui");
echo $repository->checkUser("notauser@bipbop.boup", "azertyui");


echo $repository->checkUser("jean@GCI.poc", "azertyui");