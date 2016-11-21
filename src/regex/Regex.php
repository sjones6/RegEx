<?php

namespace RegEx;

// Regex
use RegEx\Contracts\RegexContract;

class RegEx implements RegexContract
{

	/**
	* @var string | regular expression
	**/
	protected $re;


	public function __construct($re)
	{

		$this->re = $re;

	}


	public function test()
	{
		return true;
	}

	/**
	* Return RegEx when cast to string
	*
	* @return string | re
	**/
	public function __toString()
	{

		return $this->re;

	}

}