<?php 
session_start(); 
use franckycodes\database\LightDb;

require_once 'codes/db.inc.php';
require_once 'codes/app.php';
require_once 'codes/AppMain.php';

$app=new AppMain();
$app->run();
 

			