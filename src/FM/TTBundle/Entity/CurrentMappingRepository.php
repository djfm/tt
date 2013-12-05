<?php

namespace FM\TTBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\EntityRepository;

class CurrentMappingRepository extends EntityRepository
{
	// Create a CurrentMapping or get one.
	// If there is no CurrentMapping for this 
	// (message, locale, plurality) triplet
	// then it is created and returned,
	// otherwise either:
	// - the existing current mapping is returned
	// - the existing current mapping is returned, 
	//   but updated with the passed $mapping iff it is
	//   indeed a new one and $update is true
	public function getOrCreateCurrentMapping(
		Message $message,
		Mapping $mapping,
		$update=false
	)
	{
		$locale = $mapping->getTranslation()->getLocale();
		$plurality = $mapping->getTranslation()->getPlurality();
		if($cm=$this->findOneBy([
			'message' => $message,
			'locale' => $locale,
			'plurality' => $plurality 
		]))
		{
			$new = false;
		}
		else
		{
			$cm = new CurrentMapping();
			$cm->setMessage($message);
			$cm->setLocale($locale);
			$cm->setPlurality($plurality);
			$cm->setMapping($mapping);
			$this->getEntityManager()->persist($cm);
			$new = true;
		}

		if(false === $new && $update)
		{
			// TODO: Update current mapping
			// and add old one to history
			// (only if $mapping is different from current
			// associated mapping)
		}

		return $cm;
	}
}