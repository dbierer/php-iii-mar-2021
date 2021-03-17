<?php
declare(strict_types=1);
class Test
{
	// example of "union" types
	public function add(float|null $a, int|float|null|string $b)
	{
		return $a + $b;
	}
	// 1st arg: nullable type
	public function sub(?float $a, int|float|null|string $b)
	{
		return $a - $b;
	}
}
$test = new Test();
echo $test->add(2, 22/7);
echo "\n";
echo $test->add(NULL, 22/7);
echo "\n";
echo $test->add(2, '3.14');
echo "\n";
echo $test->sub(222, 111);
echo "\n";
echo $test->sub(NULL, 111);
echo "\n";
