<?php

namespace FM\TTBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\EntityRepository;

class MessageCommentRepository extends EntityRepository
{
	public function getOrCreateMessageComment(
		User $user,
		Message $message,
		$comment
	)
	{
		if($mc=$this->findOneBy([
			'message' => $message,
			'comment' => $comment
		]))
		{
			return $mc;
		}
		else
		{
			$mc = new MessageComment();
			$mc->setUser($user);
			$mc->setMessage($message);
			$mc->setComment($comment);
			$this->getEntityManager()->persist($mc);
			return $mc;
		}
	}
}