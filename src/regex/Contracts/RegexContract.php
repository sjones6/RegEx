<?php

namespace Sjones6\Regex\Contracts;


interface RegexContract
{

	public function __construct($re);

	public function test($text = '', $offset = 0);

	public function match($text = '', $offset = 0);

	public function getMatches();

	public function __toString();

}