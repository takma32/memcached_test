<?php
/**
 * ダミーデータの作成
 */
$time_start = microtime(true);

require './core/bootstrap.php';

$user = new User();
for($i=1; $i<=100; $i++){
	$user->update(array(
		'user_name' => 'test' . $i,
		'registdate' => date('Y-m-d H:i:s'),
	), array(
		'user_id' => $i,
	));
	var_dump($user);
}
$m = mem::get();

$time_end = microtime(true);
$time = $time_end - $time_start;

echo "Did nothing in $time seconds\n";
