<?php
$label = "------------\n";

// example of a callback tree using classic anonymous functions
$math = [
	'add' => function ($a, $b)  use ($label) { return $label . ($a + $b); },
	'sub' => function ($a, $b)  use ($label) { return $label . ($a - $b); },
	'mul' => function ($a, $b)  use ($label) { return $label . ($a * $b); },
	'div' => function ($a, $b)  use ($label) { return $label . ($a / $b); },
];
$a = 11;
$b = 22;
foreach ($math as $key => $callback) {
	echo "\n" . $key . ':' . $callback($a, $b);
}
var_dump($math['add']);

// example of a callback tree using arrow functions
$arrow = [
	'add' => fn($a, $b) => $label . ($a + $b),
	'sub' => fn($a, $b) => $label . ($a - $b),
	'mul' => fn($a, $b) => $label . ($a * $b),
	'div' => fn($a, $b) => $label . ($a / $b),
];
foreach ($arrow as $key => $callback) {
	echo "\n" . $key . ':' . $callback($a, $b);
}
var_dump($arrow['add']);

// what happens if you modify a variable that's used?
$request = new ArrayObject(['A','B','C']);
$status  = 404;
$test = function ($request) use (&$status) { 
	$status = 200;
	return json_encode($request->getArrayCopy(), JSON_PRETTY_PRINT); 
};
 
echo 'Status: ' . $status . ':' . $test($request);
