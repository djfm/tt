<?php

namespace FM\TTBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\EntityRepository;

class MessageRepository extends EntityRepository
{
	public function getOrCreateMessage(
		$project,
		$domain,
		$context,
		$locale,
		$msgid,
		$msgidPlural
	)
	{
		if($message = $this->findOneBy([
			'project' => $project,
			'domain' => $domain,
			'context' => $context,
			'locale' => $locale,
			'msgid' => $msgid,
			'msgidPlural' => $msgidPlural
		]))
		{
			return $message;
		}
		else
		{
			$message = new Message();
			$message->setProject($project);
			$message->setDomain($domain);
			$message->setContext($context);
			$message->setLocale($locale);
			$message->setMsgid($msgid);
			$message->setMsgidPlural($msgidPlural);
			$this->getEntityManager()->persist($message);
			return $message;
		}
	}
}