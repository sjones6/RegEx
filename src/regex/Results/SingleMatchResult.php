<?php

namespace Sjones6\Regex\Results;

// Sjones6\Regex
use Sjones6\Regex\Results\MemoryMatchCollection;

// Exceptions
use Sjones6\Regex\Exceptions\InvalidMatchFormatException;

//Contract
use Sjones6\Regex\Results\Contracts\SingleMatchResultContract as Contract;


class SingleMatchResult implements Contract
{

	/**
	* @var string | full match
	**/
	protected $fullMatch;

	/**
	* @var integer | offset position
	**/
	protected $offset;

	/**
	* @var object | Illuminate\Support\Collection of memory matches
	**/
	protected $memoryMatches;


	public function __construct($fullMatch, $offset = '')
	{

		if (!is_string($fullMatch)) {
			throw new InvalidMatchFormatException($fullMatch);
		}

		$this->fullMatch = $fullMatch;

		$this->offset = $offset;

		$this->memoryMatches = new MemoryMatchCollection([]);

	}

	/**
	* Sets the offset 
	*
	* @param int | offset of match result
	*
	* @return void
	**/
	public function setOffset($offset)
	{

		if (!is_integer($offset)) {
			throw new \Exception('Match offsets must be integers');
		}

		$this->offset = $offset;

	}

	/**
	* Gets the offset 
	*
	* @param void
	*
	* @return int | offset of match result
	**/
	public function getOffset()
	{

		return $this->offset;

	}

	/**
	* Gets the full match text
	*
	* @param void
	*
	* @return string | full match text
	**/
	public function full()
	{
		return $this->fullMatch;
	}


	/**
	* Add a memory match
	*
	* @param string | memory match
	*
	* @throws Sjones6\Regex\InvalidMatchFormatException
	*
	* @return void
	*
	**/
	public function addMemoryMatch($match)
	{

		if (!is_string($match)) {
			throw new InvalidMatchFormatException($match);
		}

		$this->memoryMatches->push($match);

	}


	/**
	* Checks if there are any memory matchs
	*
	* @param void
	*
	* @throws boolean | have / don't
	*
	* @return void
	*
	**/
	public function haveMemoryMatches()
	{
		return $this->memoryMatches->isEmpty();
	}


	/**
	* Gets memory matches
	*
	* @param void
	*
	* @throws object | Sjones6\Regex\Results\MemoryMatchCollection
	*
	* @return void
	**/
	public function getMemoryMatches()
	{
		return $this->memoryMatches;
	}

	/**
	* Gets a match stored in memory parenthesis
	*
	* @param integer | number of memory match to retrieve
	*
	* @return string / null
	*
	* @author Spencer Jones
	**/
	public function memoryMatch($nth)
	{
		
		if (!is_integer($nth)) {
			throw new \Exception('Memory matches must be retrieved by integer');
		}

		return $this->memoryMatches->get($nth);
	
	}

	/**
	* Convenience wrapper for memoryMatch()
	*
	* @param integer | number of memory match to retrieve
	*
	* @return string / null
	*
	* @author Spencer Jones
	**/
	public function memory($nth)
	{
		
		return $this->memoryMatch($nth);
	
	}

	/**
	* Handle string type coercion
	*
	* @param void
	* 
	* @return string | full match text
	**/
	public function __toString()
	{
		return $this->fullMatch;
	}
		

}