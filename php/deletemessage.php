<?php
if(empty($_POST) )
{
echo "Access denied";
}
else
{

$q = strval($_POST['q']);
$e = strval($_POST['e']);

require_once "../doctrineORM/bootstrap.php";
include "../doctrineORM/src/User.php";

$message = $entityManager->find('Message', $q);

if($message->getType()!="text" || $message->getType()!="screenshotalert")
{
unlink("../../".$filepath);
}

$entityManager->remove($message);
$entityManager->flush();
}
?> 
