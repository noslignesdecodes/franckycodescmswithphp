<?php 

function createDatabase($dbName='db_ecole_en_ligne')
{
	 
	try{ 
		//connect to default database
	 $pdo = new \PDO('mysql:host=localhost;dbname=mysql',
			'root', '', [PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION]);

	 $pdo->query('CREATE DATABASE '.$dbName.' CHARSET=UTF8');
	}catch(PDOException $e)
	{ 
		$error=$e->getMessage();
		//echo $error;
	}

//if(!preg_match('#Can\'t create database#', $error)){

//}
}
function getFileContent($filename = 'codes/config/config.inc.php')
{
	//view/admin/mg/showclassrooms/uploadform.php
    $handle = fopen($filename, 'r');

    $str=fgets($handle);

    fclose($handle);
    return $str;
}
$dbparams=getFileContent();
$dbparams=explode('/', $dbparams);
// echo count($dbparams);
if(count($dbparams)>=4)
{


// echo 'yes';


// echo '<pre>';
// var_dump($dbparams);
// echo '</pre>';
// echo $dbparams;
 
// die();
$dbname=str_replace('dbname:', '', $dbparams[0]);
$dbuser=str_replace('dbuser:', '', $dbparams[1]);
$dbpassword=str_replace('dbpassword:', '', $dbparams[2]);
$dbhost=str_replace('dbhost:', '', $dbparams[3]);
$dbhost=str_replace('_line_', '', $dbhost);

unset($_SESSION['dbname']);
unset($_SESSION['dbuser']);
unset($_SESSION['dbpassword']);
unset($_SESSION['dbhost']);


// 'madauto_local_db_test2'
// unset(DB_DSN);
// unset(DB_NAME);
// unset(DB_HOST);
// unset(DB_USER);
// unset(DB_USER_PWD);
// unset(APP_NAME);
createDatabase($dbname);
define('DB_DSN', 'mysql');
define('DB_NAME', $dbname);
 
define('DB_HOST', $dbhost);
define('DB_USER', $dbuser);
define('DB_USER_PWD',$dbpassword);
define('APP_NAME', 'Your great website');
} 
?>

