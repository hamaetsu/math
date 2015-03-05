<?php
/**
 * 確率統計演習
 * 問題2.42
 * コインを投げ続けて初めて3連続で表がでるまでに投げた回数をNとする。
 * q_k = P(N>k) とする。このとき次を示せ。
 * q_k = 1/2 q_(k-1) + 1/4 q_(k-2) + 1/8 q_(k-3) 
 */

const TRIALS_COUNT = 1000000;

$count_array = array();
$count_array[0] = 0;
$count_array[1] = 0;
$count_array[2] = 0;

$memory_array = array();

for ($trial_count = 0; $trial_count < TRIALS_COUNT; $trial_count++) {
	$i = 1;
	$memory_array = array();
	while (true) {
		$memory_array[$i] = rand(0,1);
		if (count($memory_array) > 2) {
			if ($memory_array[$i]==0 && $memory_array[$i-1]==0 && $memory_array[$i-2]==0) {
				$count_array[$i]++;
				break;
			}
		}
		
		$i++;
	}
}
ksort($count_array);
// 結果出力
foreach ($count_array as $count => $result) {
 	echo $count."回目:". $result;
 	echo PHP_EOL;
}
echo "試行回数:".array_sum($count_array);
echo PHP_EOL;

/*
P()125606
62529
62461
62338
*/
exit(); 