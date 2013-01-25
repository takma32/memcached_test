<?php
/**
 * ダミーデータの作成
 */
$time_start = microtime(true);

require './config/bootstrap.php';

$user = new User();
for($i=1; $i<=100; $i++){
	$user->user_name  = 'test' . $i;
	$user->user_id  = $i;
	$user->update();
	var_dump($user);
}
$m = mem::get();

$time_end = microtime(true);
$time = $time_end - $time_start;

echo "Did nothing in $time seconds\n";
