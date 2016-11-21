<?php

require(__DIR__ . '/../vendor/autoload.php');


// Regex
use RegEx\RegEx;

class ReplaceTest extends TestCase
{


	/**
	* @var object | Regex\Regex
	**/
	protected $re;

	public function setUp()
	{
		$this->re = new Regex('/find\sthis\sstring/');
	}


	public function test_replace_without_callback()
	{

		$this->assertTrue($this->re->test());

	}

}