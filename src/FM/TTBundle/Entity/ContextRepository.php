<?php

namespace FM\TTBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\EntityRepository;

class ContextRepository extends EntityRepository
{
	public function getOrCreateContext($project, $name)
	{
		$em = $this->getEntityManager();
		$pc = $em
		->createQuery(
			'SELECT p, c FROM FMTTBundle:Project p 
			 JOIN p.contexts c
			 WHERE p.id=:project_id AND c.name=:name'
		)
		->setParameter('project_id', $project->getId())
		->setParameter('name', $name)
		->setMaxResults(1)
		->getResult();

		if(count($pc) === 1)
		{
			if(count($pc[0]->getContexts()) !== 1)
			{
				die("Too many contexts, something wrong with query.");
			}
			
			return $pc[0]->getContexts()[0];
		}
		else
		{
			$context = new Context();
			$context->setProject($project);
			$context->setName($name);

			$em->persist($context);
			return $context;
		}
	}
}