<?php
declare(strict_types=1);
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
$store = new SplObjectStorage();
$store['anon'] = function ($a, $b) { return $a + $b; };
$store['arrow'] = fn($a, $b) => $a + $b;
$store['anonclass'] = $anon;
$store['what'] = [$what, 'add'];
$store['add'] = 'add';

// testing the callbacks: should all return "333"
$keys = ['anon', 'arrow', 'anonclass'];
foreach ($keys as $label) {
	echo $store[$label](111, 222);
	echo "\n";
}
