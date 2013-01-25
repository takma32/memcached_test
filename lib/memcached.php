<?php
/**
 * Memcached 取得
 */

class mem
{
	private static $m = NULL;

	public function get(){
		if(is_null(self::$m)){
			self::$m = new Memcached();
			self::$m->addServer('localhost', 11211);
		}
		return self::$m;
	}
}

