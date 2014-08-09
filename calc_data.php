<?php

/*
 * show statistic about data
 * data is separated by newlines
 * $argv[1] file path for data
 */

$file_path = $argv[1];

if (!$file_path) {
	echo "no file path \n";
	exit();
}

$file = file_get_contents($file_path);

if (empty($file)) {
	echo "no data \n";
}

$datas = explode("\n", $file);
$length = 0;

$calc_data = array();

foreach ($datas as $data) {
	if (empty($data)) {
		continue;
	}
	
	if (!is_numeric($data)) {
		echo "non numeric \n";
		exit();
	}
	$calc_data[] = $data;
}

// var_dump($calc_data);

$sum = array_sum($calc_data);
$count = count($calc_data);
$mean = $sum / $count;
$ss = 0;

foreach ($calc_data as $cal) {
	$ss += ($cal - $mean) * ($cal - $mean);
}

$var = $ss / $count;
$sd  = sqrt($var);
$u   = $ss / ($count - 1);

echo "Count:". $count     . "\n";
echo "Sum:"  . $sum       . "\n";
echo "SS:"   . $ss        . "\n";
echo "Mean:" . $mean      . "\n";
echo "Var:"  . $var       . "\n";
echo "sd:"   . $sd        . "\n";
echo "U:"    . $u  . "\n";


exit();
