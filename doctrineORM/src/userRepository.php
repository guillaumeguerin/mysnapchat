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

    public function getFriendRequests($userId)
    {
        $em = $this->getEntityManager();
        $user = $em->find("User", $userId);
        if(!$user)
            echo("User not found");
        return $user->getFriendRequests();
    }

    public function userExists($email) {
        $entityManager = $this->getEntityManager();
        $dql = "SELECT u FROM User u WHERE u.email= :email";
        $query = $entityManager->createQuery($dql);
        $query->setParameter("email", $email);
        $user = $query->getResult();
        return $user? True : False;
    }


    public function createUser($email, $password, $name, $description)
    {
        $em = $this->getEntityManager();
        if($this->userExists($email))
        {
             echo "This user already exists\n";
             return null;
        }
           

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

    public function checkUser($email, $password)
    {
        $entityManager = $this->getEntityManager();
        $dql = "SELECT u FROM User u WHERE u.email= :email AND u.password= :password";
        $query = $entityManager->createQuery($dql);
        $query->setParameter("email", $email);
        $query->setParameter("password", $password);
        $user = $query->getResult();
        if(!$user)
            return False;
        else
            return True;
    }

    public function getUserByEmail($email) 
    {
        $entityManager = $this->getEntityManager();
        $user = $this->findOneBy(array('email' => $email));
        return $user;
    }

    public function addFriend($email, $friendMail)
    {
        $user = $this->getUserByEmail($email);
        if(!$user)
            echo "user not found";
        $friend = $this->getUserByEmail($friendMail);
        if(!$friend) {
            echo "Friend user not found";
            return null;
        }
        else {
            $user->addFriend($friend);
        }
        $this->getEntityManager()->flush();
        return $user;
    }

    public function addFriendRequest($email, $friendMail)
    {
        $user = $this->getUserByEmail($email);
        if(!$user)
            echo "user not found";
        $friend = $this->getUserByEmail($friendMail);
        if(!$friend) {
            echo "Friend user not found";
            return null;
        }
        else {
            $user->addFriendRequest($friend);
        }
        $this->getEntityManager()->flush();
        return $user;
    }
}