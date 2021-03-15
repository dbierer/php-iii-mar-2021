<?php
$iter = new ArrayIterator(range(0,99));
$filt = new class ($iter) extends FilterIterator
{
	public function accept() : bool
	{
		return ($this->current() % 2 !== 0);
	}
};
foreach ($filt as $item) echo $item . ' ';
echo "\n";
$reflect = new ReflectionObject($filt);
echo $reflect . "\n";

