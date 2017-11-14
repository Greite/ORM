<?php
/**
* 
*/
namespace connection;

use PDO;

class ConnectionFactory {

	static $db;
	
	public static function makeConnection(array $conf){
		$host = $conf['host'];
		$username = $conf['username'];
		$password = $conf['password'];
		$database = $conf['dbname'];

		try{
			// On se connecte à MySQL
			self::$db = new \PDO("mysql:host=$host;dbname=$database;charset=utf8", $username, $password, array(PDO::ATTR_PERSISTENT=>true, PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION
, PDO::ATTR_EMULATE_PREPARES=>false, PDO::ATTR_STRINGIFY_FETCHES=>false));
			return self::$db;
		}
		catch(Exception $e){
			// En cas d'erreur, on affiche un message et on arrête tout
			die('Erreur : '.$e->getMessage());
		}
	}

	public static function getConnection(){
		if (isset(self::$db)) {
			return self::$db;
		}else{
			throw new Exception("Database not set", 1);
		}
	}
}