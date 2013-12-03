<?php

namespace FM\TTBundle\Service;

class SourceFileConverter
{
	private $em;

	public function __construct(\Doctrine\ORM\EntityManager $em)
	{
		$this->em = $em;
	}

	/**
	 * Returns something like this: [(message, [translation])]
	 */
	public function convert($filePath, $sourceLocale, $targetLocale)
	{
		$po = new \FM\TTBundle\Po\PoFile();

		$po->read($filePath);

		$data = array();

		foreach($po->getEntries() as $entry)
		{
			if(trim($entry['msgid']) !== '')
			{
				$pair = array(
					'source_locale' => $sourceLocale,
					'target_locale' => $targetLocale,
					'message' => array(
						'msgctxt' => isset($entry['msgctxt']) ? trim($entry['msgctxt']) : '',
						'msgid' => $entry['msgid'],
						'msgid_plural' => isset($entry['msgid_plural']) ? $entry['msgid_plural'] : '' 
					),
					'categories' => array(),
					'translations' => array(),
					'data' => array(),
					'flags' => array(),
					'message_comments' => '',
					'translation_comments' => ''
				);

				if(isset($entry['msgid_plural']))
				{
					foreach($entry as $k => $v)
					{
						$m = array();
						if(preg_match('/msgstr\[(\d+)\]/', $k, $m))
						{
							$pair['translations'][(int)$m[1]] = $v;
						}
					}
				}
				else
				{
					if(isset($entry['msgstr']))
					{
						$pair['translations'][0] = $entry['msgstr'];
					}
				}

				if(isset($entry['comments']))
				{
					if(isset($entry['comments']['#:']))
					{
						$pair['data']['reference'] = implode("\n", $entry['comments']['#:']);
					}
				}

				if(isset($entry['comments']['#,']))
				{
					$pair['flags'] = array_map('trim', explode(',', implode(',',$entry['comments']['#,'])));
				}

				if(isset($entry['comments']['#']))
				{
					$pair['translation_comments'] = implode("\n", $entry['comments']['#']);
				}

				if(isset($entry['comments']['#.']))
				{
					$pair['message_comments'] = implode("\n", $entry['comments']['#.']);
				}

				$data[] = $pair;
			}
		}

		return $data;
	}
}