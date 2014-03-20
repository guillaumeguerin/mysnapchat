<?php
require_once "bootstrap.php";
include "src/User.php";
$password = "123456";
$repository = $entityManager->getRepository('User');
$result = $repository->createUser("jean@yahoo.com", md5($password), "jean", "just a dude");
if($result)
	echo "True";
else
	echo "Email is already used.";
echo "Created User with ID " . $user->getId() . "\n";