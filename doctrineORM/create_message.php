<?php
require_once "bootstrap.php";
require_once "src/Message.php";
require_once "src/User.php";

$newMessageContent = $argv[1];
$senderId = $argv[2];
$receiverId = $argv[3];

$sender = $entityManager->find("User", $senderId);
$receiver = $entityManager->find("User", $receiverId);
if (!$sender || !$receiver) {
    echo "No sender and/or receiver found for the input.\n";
    exit(1);
}

$message = new Message();
$message->setContent($newMessageContent);
$message->setSender($sender);
$message->setReceiver($receiver);

$entityManager->persist($message);
$entityManager->flush();

echo "Created Message with ID " . $message->getId() . "\n";