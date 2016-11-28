<?php

// Autoload a function 're'
// for a helpful shorthand
if (!function_exists('re')) {

	function re($regex)
	{
		return new Sjones6\Regex\Regex($regex);
	}

}