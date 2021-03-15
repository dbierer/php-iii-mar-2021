<?php
class Test 
{
    public $name = 'Doug';
    private $key = 12345;
    protected $status = ['A','B','C'];
    public $date = '';
    public function __construct()
    {
		$this->date = new DateTime('now');
	}
    //public function __sleep()
    //{
	//	return ['name', 'status', 'date'];
	//}
	public function __serialize()
	{
		$this->date = (new DateTime())->format('Y-m-d H:i:s');
		return get_object_vars($this);
	}
	public function __unserialize(array $data)
	{
		foreach ($data as $key => $value) {
			if ($key === 'date') {
				$this->date = new DateTime($value);
			} else {
				$this->$key = $value;
			}
		}
	}
}
$test = new Test();
var_dump($test);

$test->name = 'Fred';
$str = serialize($test);
echo $str . "\n";
$obj = unserialize($str);
var_dump($obj);
