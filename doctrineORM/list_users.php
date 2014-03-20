<?php
// list_products.php
require_once "bootstrap.php";
require_once "src/User.php";

$userRepository = $entityManager->getRepository('User');
$users = $userRepository->findAll();

foreach ($users as $user) {
    echo sprintf("-%s\n", $user->getName());
}