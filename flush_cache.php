<?php
/**
 * キャッシュクリア
 */
$time_start = microtime(true);

require './config/bootstrap.php';

$m = mem::get();
$m->flush();

$time_end = microtime(true);
$time = $time_end - $time_start;

echo "Did nothing in $time seconds\n";
