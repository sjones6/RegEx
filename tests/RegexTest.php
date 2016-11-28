<?php

// Regex
use Sjones6\Regex\Regex;

class RegexTest extends TestCase
{

	public function test_get_raw_regex() 
	{
		$this->assertEquals((string)$this->re, $this->rawRe);
	}


	public function test_replace_without_callback()
	{

		$this->assertTrue($this->re->test($this->getText()));

	}

}