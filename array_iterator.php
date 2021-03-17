<?php
$iter = new ArrayIterator(['A' => 111,'B' => 222,'C' => 333]);
$iter->offsetSet('F', 666);
$iter->offsetSet('D', 444);
foreach ($iter as $key => $val)
	echo $key . ':' . $val . "\n";
