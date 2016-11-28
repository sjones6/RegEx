<?php

namespace Sjones6\Regex;

// Regex
use Sjones6\Regex\Results\MatchResults;

// Contract
use Sjones6\Regex\Contracts\RegexContract;

class Regex implements RegexContract
{

	/**
	* @var string | regular expression
	**/
	protected $re;

	/**
	* @var object | Sjones6\Regex\Results\MatchResults
	**/
	protected $matchResult;


	public function __construct($re)
	{

		$this->re = $re;

	}

	/**
	* Checks whether or not a string
	* matches with the regex
	* 
	* @param string | text ot check
	*
	* @return bool | matches / doesnt
	**/
	public function test($text = '')
	{

		// Run the regular expression
		return preg_match($this->re, $text) === 1; 

	}



	/**
	* Matches a string again re
	* 
	* @param string | text ot check
	*
	* @return object | Sjones6\Regex\Results\MatchResults
	**/
	public function match($text = '')
	{

		// Run the regular expression
		preg_match_all($this->re, $text, $matches, PREG_OFFSET_CAPTURE);

		// Set matches
		$this->setMatches($matches);

		// Get MatchResult object
		return $this->getMatches();
	}

	/**
	* Gets matched result
	* 
	* @param void
	*
	* @return object | Sjones6\Regex\Results\MatchResults
	**/
	public function getMatches()
	{

		return $this->matchResults;

	}

	/**
	* Sets matched result
	* 
	* @param array | matches (result of preg_match)
	*
	* @return void
	**/
	protected function setMatches($matches = [])
	{

		$this->matchResults = new MatchResults($matches);

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