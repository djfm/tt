<?php

namespace FM\TTBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\EntityRepository;

class MappingCommentRepository extends EntityRepository
{
	public function getOrCreateMappingComment(User $user, Mapping $mapping, $comment)
	{
		if($mc=$this->findOneBy([
			'mapping' => $mapping,
			'comment' => $comment
		]))
		{
			return $mc;
		}
		else
		{
			$mc = new MappingComment();
			$mc->setUser($user);
			$mc->setMapping($mapping);
			$mc->setComment($comment);
			$this->getEntityManager()->persist($mc);
			return $mc;
		}
	}
}