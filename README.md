# RegEx

An object-oriented Regular Expression library in PHP.

Requires 5.6+.

### Installation

Eventually, this will be available via Composer. Until then, add the following to your composer.json file

```json
	"repositories": [
        {
            "type": "vcs",
            "url": "https://github.com/sjones6/RegEx.git"
        }
    ],
	"require": {
		"sjones6/regex": "*"
	}
```

### Usage

```php
use Sjones6\Regex\Regex;


$abcRe = new Regex('/abc/');

$abcRe->test('abcdefg'); // true
```

There's some object creation sugar (if you don't have a function called `re`):

```php

// No need for a "use statement"
// Create a new Sjones6\Regex\Regex
// with a simple function call
$abcRe = re('/abc/'); 

// Or something like this:

if ( re('/abc/')->test('abc') ) {
	
	// Do something

}
```


### Matching

```php
use Sjones6\Regex\Regex;

$abcRe = new Regex('/abc/');


$abcRe->test('abcdefg'); // true
$abcRe->test('some random string'); // false

$matches = $abcRe->match('abcdefg'); // MatchResult object

$matches->count(); // Number of matches

$matches->nth(4); // Get the fourth match (null if it doesn't exist) 

$matches->each(function(Sjones6\Regex\Results\SingleMatchResult $match, $key){
	
	$match->full(); // Full text of match

	$match->getOffset(); // Offset of match
	$match->offset(); // ibid.


	$match->haveMemoryMatches(); // bool, whether or not memory matches were saved

	$match->getMemoryMatches(); // Collection of memory matches

	// Return false to stop iterating through matches

});
```

### Replacing

In development...


### Contributing, Issues, Testing, etc.

PRs welcome. Include documentation and tests with all PRs.

Issues accepted on Github.

Tests use PHPUnit and can be run with `composer test` or `./vendor/bin/phpunit ./tests` (both from project root).