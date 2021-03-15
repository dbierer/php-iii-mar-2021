<?php
$obj = new ArrayObject(range('A','F'));
$obj->offsetSet(99, 'ZZZZ');
$iter = $obj->getIterator();
foreach ($iter as $item) echo $item . ' ';
echo "\n";

