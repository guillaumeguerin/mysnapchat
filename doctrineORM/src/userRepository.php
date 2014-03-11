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

    
}