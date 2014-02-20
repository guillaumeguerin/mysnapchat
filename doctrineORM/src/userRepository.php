<?php
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

    public function createUser($email, $password, $name, $description)
    {
    	$newUser = new User();
    	$newUser->setName($name);
    	$newUser->setPassword($password);
    	$newUser->setEmail($email);
    	$newUser->setDescription($description);

    	$em = $this->getEntityManager();
    	$em->persist($newUser);
    	$em->flush();

    	return $newUser;
    }
}