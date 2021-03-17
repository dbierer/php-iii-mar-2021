<?php
declare(strict_types=1);
class Test
{
	// example of "union" types
	public function test(callable $callback, ...$params)
	{
		return $callback($params[0], $params[1]);
	}
}
// can be made callable using this syntax:
// [$instance, 'method']
class Whatever
{
	public function add($a, $b)
	{
		return $a + $b;
	}
}
// all PHP functions are callable
function add($a, $b) { return $a + $b; }
$what = new Whatever();	
// any class that defines "__invoke()" are callable
$anon = new class() {
	public function __invoke($a, $b)
	{
		return $a + $b;
	}
};
// callback tree
$callbacks = [
	0 => function ($a, $b) { return $a + $b; },
	1 => fn($a, $b) => $a + $b,
	2 => $anon,
	3 => [$what, 'add'],
	4 => 'add'
];
// testing the callbacks: should all return "333"
$test = new Test();
foreach ($callbacks as $cb) {
	echo $cb(111, 222);
	echo "\n";
}
