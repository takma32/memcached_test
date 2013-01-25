<?php
class User extends Model{

	public static function getUser($user_id){
		$m = mem::get();
		$_ret_val = $m->get('userdata:' . $user_id);
		if($_ret_val===false){
			$db = DB::getInstance();
			$query	= vsprintf("SELECT SQL_NO_CACHE * FROM user_t WHERE user_id = '%s' ", array(
				$db->real_escape_string($user_id),
			));
			$result = $db->query($query);
			if($result->num_rows>0){
				$_ret_val = new self($result->fetch_assoc());
			}
			$m->set('userdata:' . $user_id, $_ret_val, time()+60);
		}
		return $_ret_val;
	}

	public function __construct($data){
		if(is_array($data)){
			foreach($data as $key => $val){
				$this->$key = $val;
			}
		}
	}

	private $_table = 'user_t';

	public function save($data){
		// TODO プロパティにセットされた値を保存するようにする
		if(is_array($data)){
			foreach($data as $key => $val){
				$_columns[] = '`' . $key . '`';
				$_values[] = "'" . $val . "'";
			}
			$query	= vsprintf("INSERT INTO %s (%s) VALUES (%s) ", array(
				$this->_table,
				implode(',', $_columns),
				implode(',', $_values),
			));
			var_dump($query);
			$db = DB::getInstance();
			$db->query($query);
			if($db->affected_rows>0){
				$this->user_id = $db->insert_id;
				return true;
			}else{
				return false;
			}
		}
	}
}

