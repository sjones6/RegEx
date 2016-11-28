<?php

namespace Sjones6\Regex\Results\Contracts;


interface MatchResultsContract
{

	public function __construct($matches = []);

	public function count();

}