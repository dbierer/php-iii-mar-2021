<?php
class Test implements Serializable {
    public $name = 'Doug';
    private $key = 12345;
    protected $status = ['A','B','C'];
    public $date = '';
    //public function __sleep()
    //{
	//	return ['name', 'status', 'date'];
	//}
	public function serialize()
	{
		$this->date = new DateTime();
		$this->date = serialize($this->date);
		return serialize($this);
	}
	public function unserialize(string $item)
	{
	}
}
$test = new Test();
var_dump($test);

$test->name = 'Fred';
$str = serialize($test);
echo $str . "\n";
$obj = unserialize($str);
var_dump($obj);
