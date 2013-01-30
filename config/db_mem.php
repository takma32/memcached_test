<?php
/**
 * DB操作、キャッシュ対応
 */
// TODO キャッシュプログラムをDI出来るようにして Memcached TokyoTyrantなど差し替えできるようにする
class DB_mem extends DB
{
	protected $primary_key = '';

	public function deleteCache($unique_key){
		$m = mem::get();
		$m->delete($unique_key);
	}
	public function updateCache($unique_key, $value){
		$m = mem::get();
		$m->set($unique_key, $value, time()+60);
	}

	public function get($query, $params, $unique_key){
		$m = mem::get();
		$_ret_val = $m->get($unique_key);

		// memcachedに乗っかっていなかったら、DBから取得
		if($_ret_val===false){
			$_ret_val = $this->row($query, $params);
			$m->set($unique_key, $_ret_val, time()+60);
		}
		return $_ret_val;
	}
}

