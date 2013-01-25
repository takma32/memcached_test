<?php
class DB
{
	private static $db = null;
	public static function getInstance(){
		if(is_null(self::$db)){
			self::$db = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
			if(self::$db){
				self::$db->set_charset('utf8');
			}else{
				throw new Exception('db connection error');
			}
		}
		return self::$db;
	}

}

