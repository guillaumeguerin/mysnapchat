<?php
use Doctrine\ORM\EntityRepository;

class messageRepository extends EntityRepository 
{
	public function sendMessage($from, $to, $type, $content) 
	{
		$em = $this->getEntityManager();
		$userRepository = $em->getRepository('User');
		$sender = $userRepository->getUserByEmail($from);
		$receiver = $em->find('User', $to);

		$message = new Message();
		$message->setSender($sender);
		$message->setReceiver($receiver);
		$message->setType($type);
		$message->setContent($content);


		$em->persist($message);
		$em->flush();
		//$sender->addSentMessage($message);
		$receiver->addReceivedMessage($message);
		$em->flush();
		return $message;
	}
}