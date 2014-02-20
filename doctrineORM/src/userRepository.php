<?php
// src/BugRepository.php

use Doctrine\ORM\EntityRepository;

class userRepository extends EntityRepository
{
	public function getFriends($userId)
    {
        $em = $this->getEntityManager();
        $user = $em->find("User", $userId);
        if(!$user)
        	echo("User not found");
        return $user->getFriends();
    }
}