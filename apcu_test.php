<?php
if (apcu_exists('test')) {
	$test = apcu_fetch('test');
} else {
	$test = date('Y-m-d H:i:s');
	apcu_store('test', $test);
}
echo date('Y-m-d H:i:s');
echo "\n";
echo $test . "\n";
