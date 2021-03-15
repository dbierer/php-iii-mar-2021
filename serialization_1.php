<?php
class Test  {
    public $name = 'Doug';
    private $key = 12345;
    protected $status = ['A','B','C'];
    public function __sleep()
    {
		return ['name', 'status'];
	}
}
$test = new Test();
var_dump($test);

$test->name = 'Fred';
$str = serialize($test);
echo $str . "\n";
$obj = unserialize($str);
var_dump($obj);
