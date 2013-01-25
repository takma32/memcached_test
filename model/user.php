<?php
class User extends Model{

	public function getUser($user_id){
		$m = mem::get();
		$_ret_val = $m->get('userdata:' . $user_id);
		if($_ret_val===false){
			$db = DB::getInstance();
			$query	= vsprintf("SELECT SQL_NO_CACHE * FROM user_t WHERE user_id = '%s' ", array(
				$db->real_escape_string($user_id),
			));
			$result = $db->query($query);
			if($result->num_rows>0){
				for($i=0; $i<$result->num_rows; $i++){
					$_ret_val[] = $result->fetch_assoc();
				}
			}
			$m->set('userdata:' . $user_id, $_ret_val, time()+60);
		}
		return $_ret_val;
	}
}

