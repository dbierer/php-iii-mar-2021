<?php
$fh = fopen('php://stdin', 'r');
while(!feof($fh)) {
	$line = fgets($fh);
	echo $line;
}
