<?php

namespace Sjones6\Regex\Exceptions;


class InvalidMatchFormatException extends \Exception
{

	/**
	* @var varies | invalid match
	**/
	protected $invalidMatch;
	

	public function __construct($invalidMatch)
	{

		$this->invalidMatch = $invalidMatch;

		parent::__construct();

	}

	// public function getMessage()
	// {

	// 	return 'Matches must be strings; ' . gettype($this->invalidMatch) . ' given.';

	// }

}