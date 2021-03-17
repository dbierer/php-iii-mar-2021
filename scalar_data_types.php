<?php
declare(strict_types=1);
class Test
{
	public function add (int $a, int $b) : int
	{
		return $a + $b;
	}
	public function div (float $a, float $b) : float
	{
		return $a / $b;
	}
}
$test = new Test();
// this throws TypeError
try {
	echo $test->add('2', 2);

} catch (Throwable $t) {
	echo $t;
}
// this illustrates the principle of "widening"
// where an "int" can "widen" into "float"
echo $test->div(22, 11);
