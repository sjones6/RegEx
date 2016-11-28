<?php

namespace Sjones6\Regex\Results;

// Packages
use Illuminate\Support\Collection;

// Regex
use Sjones6\Regex\Results\SingleMatchResult as Match;

// Contract
use Sjones6\Regex\Results\Contracts\MatchResultBagContract;

class MatchResultBag extends Collection implements MatchResultBagContract
{

	public function __construct($matches = [])
	{

		$matches = new Collection($matches);

		// The first array of arrays are the full matches
		// pull that off and create an array of matches
		$matchResults = (new Collection($matches->shift()))->map(function($match, $key){
			
			// $match is a single result return from preg_match_all
			// index 0 is the matched string
			// index 1 is the offset
			return new Match($match[0], $match[1]);
		});

		// If there are no memory matches to process
		// we simply grab the full matches and put them
		// into a match collection
		if ($matches->count() === 0) {
			return parent::__construct($matchResults->toArray());
		}

		// Remaing elements in $matches are memory matches
		// Each element is array of matches.
		$matches->map(function($memoryGroup, $key) use ($matchResults){

			(new Collection($memoryGroup))->map(function($memoryMatch, $key) use ($matchResults){
				// Get the SingleMatchResult instance and add a memory match to it
				$matchResults->get($key)->addMemoryMatch($memoryMatch[0]);
			});

		});


		// Construct the collection
		// and return
		return parent::__construct($matchResults->toArray());

	}

}