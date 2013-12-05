<?php

namespace FM\TTBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\EntityRepository;

class TranslationRepository extends EntityRepository
{
	public function getOrCreateTranslation(
		User $user, 
		$locale, 
		$plurality, 
		$msgstr
	)
	{
		if($translation=$this->findOneBy(array(
			'locale' => $locale,
			'plurality' => $plurality,
			'msgstr' => $msgstr
		)))
		{
			return $translation;
		}
		else
		{
			$translation = new Translation();
			$translation->setUser($user);
			$translation->setLocale($locale);
			$translation->setPlurality($plurality);
			$translation->setMsgstr($msgstr);
			$this->getEntityManager()->persist($translation);
			return $translation;
		}
	}
}