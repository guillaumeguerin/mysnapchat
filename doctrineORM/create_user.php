<?php
require_once "bootstrap.php";
include "src/User.php";

$newProductName = $argv[1];
$friendId = $argv[2];

$friend = $entityManager->find("User", $friendId);
if(!$friend)
	echo "friend not found";

$user = new User();
$user->setName($newProductName);
$user->setPassword("1234");
$user->addFriend($friend);

$entityManager->persist($user);
$entityManager->flush();

echo "Created User with ID " . $user->getId() . "\n";