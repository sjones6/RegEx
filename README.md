# RegEx

An object-oriented Regular Expression library in PHP.

Requires PHP 5.6+.

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
```

##### Working with match results

Grab a single match:

```php
$matches->nth(4); // Get the fourth match (null if it doesn't exist) 
```

You can iterate through the matches with a callback or a `foreach` loop.

```php
// with a callback
$matches->each(function(Sjones6\Regex\Results\SingleMatchResult $match, $key){
	
	$match->full(); // Full text of match

	$match->getOffset(); // Offset of match
	$match->offset(); // ibid.

	$match->haveMemoryMatches(); // bool, whether or not memory matches were saved

	$match->getMemoryMatches(); // Collection of memory matches

	// Return false to stop iterating through matches

});

// Or with a loop
foreach ($matches as $match) {
	
	echo($match); // prints full text of match

	echo($match->offset()); // prints offset

}
```

##### Working with Memory Parenthesis

`SingleMatchResult` objects include both the full string of the match as well as a collection of any results captured in memory parenthesis. You can access these with `memoryMatch($nth)` or, for convenience, `memory($nth)`:

```php

// Include memory matches
$abcRe = re('/(a)(b)(c)/');

$matches = $abcRe->match('abcdefgabcdefg');

$firstMatch = $matches->nth(1);
	
$memory2 = $firstMatch->memoryMatch(1); // a

$memory3 = $firstMatch->memory(3); // c

$memory4 = $firstMatch->memory(4); // empty string
```

### Replacing

In development...


### Contributing, Issues, Testing, etc.

PRs welcome. Include documentation and tests with all PRs.

Issues accepted on Github.

Tests use PHPUnit and can be run with `composer test` or `./vendor/bin/phpunit ./tests` (both from project root).