<?php
class User extends Model{

	public static function getUser($user_id){
		$m = mem::get();
		$_ret_val = $m->get('userdata:' . $user_id);
		if($_ret_val===false){
			$db = DB::conn();
			$row = $db->row("SELECT SQL_NO_CACHE * FROM user_t WHERE user_id = ? ", array(
				$user_id,
			));
			$_ret_val = new self($row);
			$m->set('userdata:' . $user_id, $_ret_val, time()+60);
		}
		return $_ret_val;
	}

	public function __construct($data=''){
		if(is_array($data)){
			foreach($data as $key => $val){
				$this->$key = $val;
			}
		}
	}

	private $_table = 'user_t';

	public function save(){
		$db = DB::conn();
		$db->query("INSERT INTO user_t (`user_name`, `registdate`) VALUES(?, ?) ", array(
			$this->user_name,
			date('Y-m-d H:i:s'),
		));
		$this->user_id = $db->lastInsertId();
	}
	public function update(){
		$db = DB::conn();
		$db->query("UPDATE user_t SET `user_name` = ? , `registdate` = ? WHERE user_id = ? ", array(
			$this->user_name,
			date('Y-m-d H:i:s'),
			$this->user_id,
		));

	}
}

