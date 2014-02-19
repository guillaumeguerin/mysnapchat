<?php
require_once "bootstrap.php";
require_once "src/User.php";

$newProductName = $argv[1];

$user = new User();
$user->setName($newProductName);

$entityManager->persist($user);
$entityManager->flush();

echo "Created User with ID " . $user->getId() . "\n";