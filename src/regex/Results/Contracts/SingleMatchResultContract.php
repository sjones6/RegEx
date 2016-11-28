<?php

namespace Sjones6\Regex\Results\Contracts;


interface SingleMatchResultContract
{

	public function __construct($fullMatch, $offset = '');

	public function full();

	public function setOffset($offset);

	public function addMemoryMatch($match);

	public function haveMemoryMatches();

	public function getMemoryMatches();

	public function memoryMatch($nth);

	public function memory($nth);
}