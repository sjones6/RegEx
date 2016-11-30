<?php

require(__DIR__ . '/../vendor/autoload.php');


// Packages
use PHPUnit\Framework\TestCase as PHPUnit;

// Regex
use Sjones6\Regex\Regex;

abstract class TestCase extends PHPUnit
{

	/**
	* @var object | Sjones6\Regex
	**/
	protected $re;

	/**
	* @var string | raw regext
	**/
	public $rawRe = '/(metus)\s+(\w+)/';

	/**
	* @var object | Sjones6\Regex\Results\MatchResults
	**/
	protected $matches;

	/**
	* @var string | Text to test against
	**/
	public $text = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In fermentum mi quam, a congue arcu tristique sit amet. Donec aliquet justo sit amet congue consequat. Etiam accumsan mollis erat nec cursus. Aenean ornare diam at sodales aliquet. Aenean eleifend nulla at sapien ultrices vestibulum. Nulla ut velit et mi mollis faucibus non sed odio. Phasellus sed arcu vel libero varius dignissim sed sit amet metus. Nunc enim purus, pellentesque quis pharetra non, laoreet vitae arcu. Quisque semper lobortis scelerisque. In molestie vestibulum congue. In non scelerisque mi, non feugiat augue. Maecenas sagittis convallis viverra. Proin egestas auctor augue vel tincidunt. Aliquam dapibus ultricies est eget aliquet.

Ut vitae lectus ligula. Nullam posuere enim tortor, eu scelerisque est pulvinar et. Vivamus augue augue, pharetra ac vulputate vitae, pretium ac nibh. Curabitur molestie nisl vitae urna faucibus, nec pretium quam porta. Fusce malesuada tellus a nibh facilisis, et commodo ligula ornare. Ut id pulvinar nisi. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Sed faucibus eros eget neque condimentum, in aliquet leo dictum.

Nam quis metus velit. Pellentesque venenatis sem non luctus blandit. In pulvinar eget orci vel sodales. Nunc dapibus nisl vel arcu pretium vulputate. Curabitur pellentesque leo magna. Morbi massa urna, eleifend vel suscipit eu, imperdiet sit amet turpis. Morbi id vulputate tellus. Nunc placerat mi sed rhoncus dapibus. Phasellus non dui rutrum, consequat leo vitae, posuere augue.

Fusce ac sem ac lorem cursus hendrerit. Pellentesque vitae eros leo. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Sed in arcu lectus. Suspendisse ex nibh, posuere sed mollis at, posuere at ante. Nam fermentum viverra risus, sit amet finibus ipsum efficitur quis. Vestibulum interdum metus diam, sed placerat lacus feugiat vel. Morbi pellentesque augue at nibh ultricies, a tincidunt quam gravida. Mauris eu elit scelerisque, auctor odio id, convallis felis. Praesent sodales, enim et rutrum dignissim, eros augue mattis dolor, ut porttitor metus enim et odio. Nullam malesuada, purus in congue blandit, metus nisl aliquet mauris, vitae sodales libero mi eu augue. Praesent pulvinar placerat ligula, eu cursus lectus efficitur a. Cras vestibulum nisl interdum, gravida enim sit amet, ornare orci. In semper dolor non arcu faucibus tristique. Praesent quis blandit odio, et gravida risus. Maecenas ut orci risus.

Mauris vitae orci feugiat, gravida eros sit amet, placerat justo. Mauris sit amet condimentum sem, sed fringilla justo. Sed tempus blandit velit, in molestie nunc blandit egestas. Donec nec blandit quam. Curabitur volutpat in sapien quis pharetra. Nullam sit amet consequat lorem. Vivamus eu risus sem.
	';


	public function setUp()
	{
		
		$this->re = re($this->rawRe);

		$this->matches = $this->re->match($this->getText());

	}

	public function getText()
	{
		return $this->text;
	}
	
}