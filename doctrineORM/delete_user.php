<?php
require_once "bootstrap.php";
include "src/User.php";

        $dql = "SELECT u FROM User u WHERE u.email= :email AND u.password= :password";
        $query = $entityManager->createQuery($dql);
        $query->setParameter("email", "");
        $query->setParameter("password", "");
        $user = $query->getResult();
        foreach($user as $usr) {
        		$entityManager->remove($usr);
        		echo "USER";
        	}
        	$entityManager->flush();
