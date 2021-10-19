<?php 
namespace franckycodes\database; 
use PDO;
class Database
{
    static $i = 0;
	static $pdo = null;
	
    public static function connect()
	{
		Database::$i++;
		 
		if(Database::$pdo == null)
		{
			
			if(!defined('DB_DSN'))
			{
				//init db 
				$dns='mysql';
				$dbhost='localhost';
				$dbname='sdfsdfsdfsdlkfjsldkfjsd;fk';
				$dbuser='root';
				$dbpwd='sdfsdfsdfsdfsdf';
				Database::$pdo = new \PDO($dns.':host='.$dbhost.';dbname='.$dbname,
				$dbuser, $dbpwd, [PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION]);

			}else{
			    Database::$pdo = new \PDO(DB_DSN.':host='.DB_HOST.';dbname='.DB_NAME,
				DB_USER, DB_USER_PWD, [PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION]);
			}

			 
		} 
		return Database::$pdo;
	}

}
