<?php
/**
 * ユーザー情報読み込みテスト
 */
$time_start = microtime(true);

require './config/bootstrap.php';

for($i=0; $i<100; $i++){
	$user = User::getUser($i);
	if(isset($user->user_name)){
		var_dump(
			$user->user_name
		);
	}
}

$time_end = microtime(true);
$time = $time_end - $time_start;

echo "Did nothing in $time seconds\n";
