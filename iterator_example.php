<?php
$path = __DIR__ . '/../classic_php_examples';
$dir  = new RecursiveDirectoryIterator($path);
$recurse = new RecursiveIteratorIterator($dir);
foreach ($recurse as $name => $obj) {
	// $obj is an SplFileInfo instance
	echo $name . "\n";
}
