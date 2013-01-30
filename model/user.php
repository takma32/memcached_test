<?php
class User extends Model{

	public static function getUser($user_id){
		$db = DB_mem::conn();
//		$db->setMemKey('userdata');
		$query	= "SELECT * FROM user_t WHERE user_id = ? ";
		$_ret_val = new self($db->get($query, array($user_id), 'userdata:' . $user_id));
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
		$db = DB_mem::conn();
		$this->registdate = date('Y-m-d H:i:s');
		$db->query("INSERT INTO user_t (`user_name`, `registdate`) VALUES(?, ?) ", array(
			$this->user_name,
			$this->registdate,
		));
		$this->user_id = $db->lastInsertId();
	}
	public function update(){
		$db = DB_mem::conn();
		$this->registdate = date('Y-m-d H:i:s');
		$db->query("UPDATE user_t SET `user_name` = ? , `registdate` = ? WHERE user_id = ? ", array(
			$this->user_name,
			$this->registdate,
			$this->user_id,
		));
		$db->deleteCache('userdata:' . $this->user_id);
	}
}

