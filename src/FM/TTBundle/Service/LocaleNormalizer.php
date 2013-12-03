<?php

namespace FM\TTBundle\Service;

class LocaleNormalizer
{
	public function normalize($locale)
	{
		$m = array();
		if(preg_match('/^([a-zA-Z]+)(?:-|_)([a-zA-Z]+)$/', $locale, $m))
		{
			return strtolower($m[1]).'_'.strtoupper($m[2]);
		}
		else
		{
			return false;
		}
	}
}