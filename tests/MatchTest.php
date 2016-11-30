<?php

use Sjones6\Regex\Results\SingleMatchResult;

class MatchTest extends TestCase
{

	public function test_match_test()
	{

		$this->assertTrue($this->re->test($this->getText()));

	}

	public function test_match_test_with_offset_param()
	{
		
		// Start 2000 bytes in
		$this->assertEquals($this->re->match($this->getText(), 2000)->count(), 2);

	}

	public function test_match_and_get_count()
	{

		$this->assertTrue($this->re->match($this->getText())->count() === 4);

	}

	public function test_match_and_get_nth_result()
	{

		$this->assertInstanceOf(SingleMatchResult::class, $this->re->match($this->getText())->nth(2));

	}

	public function test_match_and_get_nth_result_that_does_not_exist()
	{

		$this->assertNull($this->re->match($this->getText())->nth(10));

	}

	public function test_match_and_get_first_result()
	{

		// $matchResult = $this->re->match();

		// $matchResult->first();
		// $matchResult->second();
		// .. $matchResult->nth();
		// $matchResult->full();
		// $matchResult->memory(1);
		// $matchResult->all();

		$this->assertTrue(true);

	}

}