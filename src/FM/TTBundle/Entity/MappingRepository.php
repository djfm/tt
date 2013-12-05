<?php

namespace FM\TTBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\EntityRepository;

class MappingRepository extends EntityRepository
{
	public function getOrCreateMapping(
		User $user,
		Message $message,
		Translation $translation
	)
	{
		$mappings = $this->getEntityManager()->createQuery(
			'SELECT m FROM FMTTBundle:Mapping m 
			 WHERE m.translation_id=:translation_id 
			 AND m.plurality=:plurality 
			 AND m.message_id=:message_id'
		)
		->setParameter('translation_id', $translation->getId())
		->setParameter('plurality', $translation->getPlurality())
		->setParameter('message_id', $message->getId())
		->setMaxResults(1)
		->getResult();

		if(count($mappings) === 1)
		{
			return $mappings[0];
		}
		else
		{
			$mapping = new Mapping();
			$mapping->setUser($user);
			$mapping->setMessage($message);
			$mapping->setPlurality($translation->getPlurality());
			$mapping->setTranslation($translation);
			$this->getEntityManager()->persist($mapping);
			return $mapping;
		}
	}
}