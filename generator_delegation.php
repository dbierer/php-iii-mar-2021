<?php
class Test
{
	public function alpha()
	{
		return range('A','Z');
	}
	public function dirs()
	{
		return new DirectoryIterator(__DIR__);
	}
	public function generate()
	{
		for($x = 0; $x < 10; $x++) {
			yield $x;
		}
	}
}

function delegator($test)
{
	yield from $test->alpha();
	yield from $test->dirs();
	yield from $test->generate();
}

$test = new Test();
$delegate = delegator($test);
foreach ($delegate as $item) {
	echo $item . ' ';
}

// NOTE: Fatal error: Uncaught Exception: Cannot rewind a generator that was already run
// $delegate->rewind();
// var_dump(iterator_to_array($delegate));

// NOTE: cannot "re-use" an existing generator that's been exhausted
//       need to re-run it to get results againg
$again = delegator($test);
var_dump(iterator_to_array($again));

	
