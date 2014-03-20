<?php
if(empty($_POST) )
{
echo "Access denied";
}
else
{
$e = strval($_POST['e']);

$fe = strval($_POST['fe']);

require_once "../doctrineORM/bootstrap.php";
include "../doctrineORM/src/User.php";


$repository = $entityManager->getRepository('User');
$repository->sendFriendRequest($e, $fe);

echo $e;
}
?> 