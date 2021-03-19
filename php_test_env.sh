#!/usr/bin/env php	
<?php
$hello = 'Hello';
$world = 'World';
echo $hello . ' ' . $world . PHP_EOL;
$value = readline("Do you want to continue (y/N)?");
echo $value . PHP_EOL;
$message = 'No Params';	
var_dump($argv ?? $_SERVER['argv'] ?? $message);
