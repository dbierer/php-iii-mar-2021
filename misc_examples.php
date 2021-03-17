<?php
session_start();
// null coalesce operator: takes the 1st non-null value
$id = $_GET['id'] ?? $_SESSION['id'] ?? $_COOKIE['id'] ?? 0;

//  setcookie ( string $name , string $value = "" , int $expires = 0 , string $path = "" , string $domain = "" , bool $secure = false , bool $httponly = false ) : bool
// traditional approach if you only want $name, $value and $httponly:
setcookie('test1', time(), 0, '', '', false, true);

// named arguments example
// only works in PHP 8
setcookie('test1', time(), httponly:true);

// return Closure
class Test
{
	public function getCallback($method)
	{
		return Closure::fromCallable([$this, $method]);
	}
	public function add($a, $b)
	{
		return $a + $b;
	}
	public function sub($a, $b)
	{
		return $a - $b;
	}
}
$test = new Test();
$add = $test->getCallback('add');
var_dump($add);
$sub = $test->getCallback('sub');
echo $sub(333, 222);
