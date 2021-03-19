<?php
declare(strict_types=1);
// for more information see: https://www.php.net/manual/en/language.types.callable.php

// This is a base class that tests callbacks
class Test
{
	// example of "union" types
	public function test(callable $callback, ...$params)
	{
		return $callback($params[0], $params[1]);
	}
}

// static class methods are considered callable
class Stat
{
	public static function add($a, $b)
	{
		return $a + $b;
	}
}

// public methods from a class instance can be made callable using this syntax:
// [$instance, 'method']
class Whatever
{
	public function add($a, $b)
	{
		return $a + $b;
	}
}
$what = new Whatever();	

// all PHP functions are callable
function add($a, $b) { return $a + $b; }

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
	3 => 'Stat::add',
	4 => [$what, 'add'],
	5 => 'add'
];
// testing the callbacks: should all return "333"
$test = new Test();
foreach ($callbacks as $cb) {
	echo $cb(111, 222);
	echo "\n";
}
