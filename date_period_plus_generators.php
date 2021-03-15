<?php
// Generate a range of dates using a period: http://php.net/manual/en/class.dateperiod.php
// Also demonstrates the use of Generators
function dates30()
{
    $now = new DateTime('now');
    $int = new DateInterval('P30D');
    $period = new DatePeriod($now, $int, 12);

    foreach ($period as $date) {
        yield $date->format('Y-m-d') . PHP_EOL;
    }
}

// Generate a range of dates using a period
function datesString()
{
    $now = new DateTime('now');
    // see: http://php.net/manual/en/datetime.formats.relative.php
    $int = DateInterval::createFromDateString('first tuesday of next month');
    $now->add($int);
    $period = new DatePeriod($now, $int, 12);
	$count = 0;
    foreach ($period as $date) {
		$count++;
        yield $date->format('Y-m-d') . PHP_EOL;
    }
    return $count;
}

$output  = '<!DOCTYPE html>' . PHP_EOL;
$output .= '<html>' . PHP_EOL;
$output .= '<head><title>' . __FILE__ . '</title></head>' . PHP_EOL;
$output .= '<body>' . PHP_EOL;
$output .= '<div style="float:left;width:40%;">' . PHP_EOL;
$output .= '<b>30 Day Intervals</b><hr>';
$output .= '<ul>' . PHP_EOL;
$dates30 = dates30(); 
foreach ($dates30 as $item) $output .= '<li>' . $item . '</li>' . PHP_EOL;
$output .= '</ul>' . PHP_EOL;
$output .= '</div>' . PHP_EOL;
$output .= '<div style="float:left;width:40%;">' . PHP_EOL;
$output .= '<b>First Tuesday Intervals</b><hr>';
$output .= '<ul>' . PHP_EOL;
$dateStr = datesString(); 
foreach ($dateStr as $item) $output .= '<li>' . $item . '</li>' . PHP_EOL;
$output .= '</ul>' . PHP_EOL;
$output .= 'Total: ' . $dateStr->getReturn();
$output .= '</div>' . PHP_EOL;
$output .= '<div style="float:left;width:100%;">' . PHP_EOL;
$output .= '<hr><pre>';
$reflect = new ReflectionObject($dates30);
$output .= $reflect;
$output .= '</pre>';
$output .= '</div>' . PHP_EOL;
$output .= '</body>' . PHP_EOL;
$output .= '</html>' . PHP_EOL;
echo $output;
