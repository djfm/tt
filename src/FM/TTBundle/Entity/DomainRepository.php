<?php

namespace FM\TTBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\EntityRepository;

class DomainRepository extends EntityRepository
{
	public function getOrCreateDomain($project, $name)
	{
		$em = $this->getEntityManager();
		$pd = $em
		->createQuery(
			'SELECT p, d FROM FMTTBundle:Project p 
			 JOIN p.domains d
			 WHERE p.id=:project_id AND d.name=:name'
		)
		->setParameter('project_id', $project->getId())
		->setParameter('name', $name)
		->setMaxResults(1)
		->getResult();

		if(count($pd) === 1)
		{
			if(count($pd[0]->getDomains()) !== 1)
			{
				die("Too many domains, something wrong with query.");
			}
			
			return $pd[0]->getDomains()[0];
		}
		else
		{
			$domain = new Domain();
			$domain->setProject($project);
			$domain->setName($name);

			$em->persist($domain);
			return $domain;
		}
	}
}