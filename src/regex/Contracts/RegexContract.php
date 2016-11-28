<?php

namespace Sjones6\Regex\Contracts;


interface RegexContract
{

	public function __construct($re);

	public function test();

	public function getMatches();

	public function __toString();

}