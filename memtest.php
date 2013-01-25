<?php
$time_start = microtime(true);

require './core/bootstrap.php';

try{
	$u = new User();
}catch(Exception $e){
	echo $e->getMessage();
}

for($i=0; $i<10; $i++){
	$user_array = $u->getUser($i);
	var_dump(
		$user_array,
		$user_array[0]['user_name']
	);
}

$time_end = microtime(true);
$time = $time_end - $time_start;

echo "Did nothing in $time seconds\n";
