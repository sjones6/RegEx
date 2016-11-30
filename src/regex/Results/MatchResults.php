<?php

namespace Sjones6\Regex\Results;

// Regex
use Sjones6\Regex\Results\SingleMatchResult;
use Sjones6\Regex\Results\MatchResultBag;


// Contact
use Sjones6\Regex\Results\Contracts\MatchResultsContract;

class MatchResults implements MatchResultsContract
{

	/**
	* @var object | Sjones6\Regex\Results\MatchResultBag
	**/
	protected $matches;

	public function __construct($matches = [])
	{

		$this->matches = new MatchResultBag($matches);

	}

	/**
	* Get the number of matches
	*
	* @param void
	*
	* @return integer | number of matches
	**/
	public function count()
	{

		return $this->matches->count();

	}

	/**
	* Get match at nth position
	*
	* @param integer | position
	*
	* @return object | Sjones6\Regex\Results\SingleMatchResult or null
	**/
	public function nth($nth)
	{

		return $this->matches->get($nth);

	}


	/**
	* Iterate through matches
	*
	* @param object | Closure
	*
	* @return object | Sjones6\Regex\Results\MatchResultBag
	**/
	public function each(\Closure $callable)
	{

		return $this->matches->each($callable);
		
	}

	/**
	* Handle array type coercion
	*
	* @param void
	*
	* @return array | matches array
	**/
	public function __toArray()
	{

		return $this->matches->toArray();

	}
		

}