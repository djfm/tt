<?php

namespace FM\TTBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\EntityRepository;

class PackRepository extends EntityRepository
{
	public function hasMessage($pack, $message)
	{
		return
		$this->getEntityManager()->createQuery(
			"SELECT count(m.id) FROM FMTTBundle:Pack p 
			 INNER JOIN p.messages ms INNER JOIN ms.message m
			 WHERE m.id=:message_id AND p.id=:pack_id"
		)
		->setParameter('message_id', $message->getId())
		->setParameter('pack_id', $pack->getId())
		->getSingleScalarResult() > 0;

	}
}