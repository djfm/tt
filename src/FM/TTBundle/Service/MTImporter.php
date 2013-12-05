<?php

namespace FM\TTBundle\Service;

class MTImporter
{
	private $em;

	public function __construct($em, $logger)
	{
		$this->em = $em;
		$this->logger = $logger;
	}

	public function import($user, $pack, $domain, $messages_with_translations, $import_messages=false)
	{
		// We don't wanna log queries, 
		// cuz we're gonna make A LOT of them
		
		$sql_logger = $this->em->getConnection()
					  ->getConfiguration()->getSQLLogger();
		$this->em->getConnection()
		->getConfiguration()->setSQLLogger(null);

		//Get project
		$project = $pack->getProject();

		$this->em->getUnitOfWork()->markReadOnly($project);
		$this->em->getUnitOfWork()->markReadOnly($pack);


		// Get or create Domain
		$domainObj = $this->em->getRepository('FMTTBundle:Domain')
					->getOrCreateDomain($project, $domain);

		foreach($messages_with_translations as $mt)
		{
			// Get or create Context if necessary
			$contextObj = null;
			if('' !== $mt['message']['msgctxt'])
			{
				// Get or create Context
				$contextObj = 
					$this->em->getRepository('FMTTBundle:Context')
					->getOrCreateContext($project, $mt['message']['msgctxt']);
			}

			// Get or Create the message
			// A message is identified by:
			// - project
			// - domain
			// - context
			// - locale
			// - msgid
			// - msgidPlural
			$message = $this->em->getRepository('FMTTBundle:Message')
					   ->getOrCreateMessage(
					   		$project,
					   		$domainObj,
					   		$contextObj,
					   		$mt['source_locale'],
					   		$mt['message']['msgid'],
					   		$mt['message']['msgid_plural']
					   	);


			// Set the extra data,
			// overriding any previously set extra data

			// So clear the old data
			$hadData = count($message->getData()) > 0;
			foreach($message->getData() as $data)
			{
				$message->removeData($data);
				$this->em->remove($data);
			}

			// And add the new data
			foreach($mt['data'] as $key => $value)
			{
				$data = new \FM\TTBundle\Entity\MessageData();
				$data->setKey($key);
				$data->setValue($value);
				$message->addData($data);
				$data->setMessage($message);
				$this->em->persist($data);
			}

			$hasData = count($mt['data']) > 0;

			if($hadData or $hasData)
			{
				// Persist the message because we
				// changed its associated data
				$this->em->persist($message);
			}

			// Add the message to the pack if necessary
			// and if we want to

			if(true === $import_messages)
			{
				if($message->getId() === 0 ||
					!$this->em->getRepository('FMTTBundle:Pack')
					->hasMessage($pack, $message)
				)
				{
					$pm = new \FM\TTBundle\Entity\PackMessage();
					$pm->setPack($pack);
					$pm->setMessage($message);
					$this->em->persist($message);
					$this->em->persist($pm);
				}
			}

			// Put the message in the right categories,
			// deleting all previous associations of this
			// message to a category
			// TODO

			// Get or create the translations -
			// a translation is identified by:
			// - locale
			// - plurality
			// - msgstr
			// If we create translations, set user to $user

			$translations = array();
			foreach($mt['translations'] as $plurality => $msgstr)
			{
				$translations[] = $this->em->getRepository('FMTTBundle:Translation')
							      ->getOrCreateTranslation(
							   		$user,
							   		$mt['target_locale'],
							   		$plurality,
							   		$msgstr
							   	);
			}

			// Create missing Mappings -
			// a mapping is identified by:
			// - message
			// - plurality
			// - translation
			// If we create mappings, set user to $user
			foreach($translations as $plurality => $translation)
			{
				$mapping = $this->em->getRepository('FMTTBundle:Mapping')
						   ->getOrCreateMapping(
						   		$user,
						   		$message,
						   		$translation
						   	);
			}
			// Add the mapping (translation) comments
			// a comment is identified by:
			// - comment
			// - user
			
			// Add the message comments
			// a comment is identified by:
			// - comment
			// - user

			// Update CurrentMapping if there is none
			// or if we want to force it
			$this->em->flush();

			// I don't need you anymore, girls
			$this->em->clear('FM\TTBundle\Entity\Message');
			$this->em->clear('FM\TTBundle\Entity\MessageData');
			$this->em->clear('FM\TTBundle\Entity\PackMessage');
			$this->em->clear('FM\TTBundle\Entity\Translation');
			$this->em->clear('FM\TTBundle\Entity\Mapping');

			//$this->logger->info("UOW Size: ".$this->em->getUnitOfWork()->size());
			if($this->em->getUnitOfWork()->size() > 30)
			{
				echo "<PRE>";
				\Doctrine\Common\Util\Debug::dump($this->em->getUnitOfWork());
				echo "</PRE>";
				die();
			}
		}

		// Maybe someone needs to log SQL queries later
		$this->em->getConnection()
		->getConfiguration()->setSQLLogger($sql_logger);
	}
}