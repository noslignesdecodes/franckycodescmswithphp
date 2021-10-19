<?php 
use franckycodes\database\LightDb;
 
//create file 
function createFile($str='',$filename = 'codes/config/config.inc.php')
{
	//view/admin/mg/showclassrooms/uploadform.php
    $handle = fopen($filename, 'w');

    fputs($handle, $str);

    fclose($handle);
}
//return all lines in a file
function showFileContent($filename = 'codes/config/config.inc.php')
{
	//view/admin/mg/showclassrooms/uploadform.php
    $handle = fopen($filename, 'r');

    $lines='';
    while($line=fgets($handle))
    {
    	$lines.=$line;
    }

    fclose($handle);
    return $lines;
}
// function getFileContent($filename = 'codes/config/config.php')
// {
// 	//view/admin/mg/showclassrooms/uploadform.php
//     $handle = fopen($filename, 'r');

//     $str=fgets($handle);

//     fclose($handle);
//     return $str;
// }

//add to timeline
function addToTimeline($type='envoi tt', $id=0)
{
$db=new LightDb();
$db->query('INSERT INTO historiques(h_categorie,
id_concerne, date_added) VALUES(:qType,
:qId, NOW())',true,
['qType'=>$type,
'qId'=>(int)$id
]);

}
function initapp($pages)
{
	$result=false;
	// session_destroy();

	try{
		//create app tables 

		defaultTables();
		$db=new LightDb();  
		$check=$db->query('SELECT * FROM actus ORDER BY id DESC ',false,[],true,true);
		//unset all db config 

	}catch(Exception $e)
	{ 
		$defaultPage=isset($pages[1])?$pages[1]:'welcome';

		switch($pages[1])
		{
			case 'initapp':
 				echo '<pre>';
				var_dump($pages);
				echo '</pre>';
				$check=check($_POST);
				echo '<pre>';
				var_dump($check);
				echo '</pre>';
				if(isset($check['dbname'], $check['dbuser'], $check['dbpassword'], $check['dbhost']))
				{
					$_SESSION['dbname']=$check['dbname'];
					$_SESSION['dbuser']=$check['dbuser'];
					$_SESSION['dbpassword']=$check['dbpassword'];
					$_SESSION['dbhost']=$check['dbhost'];

					createFile('dbname:'.$check['dbname'].'/dbuser:'.$check['dbuser'].'/dbpassword:'.$check['dbpassword'].'/dbhost:'.$check['dbhost'].'_line_');
					//go to admin panel
					header('Location: '.WEBROOT.'myadminpanel/');
					die();
				}
			break;
			default:
				require_once 'model/app/initapp/initapp.php';	
			break;
		}
		
		die();
		 
	} 
}
//function set default site templates 
function setDefaultSiteTemplates($defaultTemplate='my cute blog template')
{
	$db=new LightDb();
 
	$templateUrl= str_replace(' ', '_', $defaultTemplate);

	$check=$db->query('SELECT COUNT(id) qTotal FROM app_templates', true, 
	['qUrl'=>$templateUrl],true,true);

	if(gettype($check)=='boolean')
	{
		$db->query('INSERT INTO app_templates(template_url, set_default_site_template,date_creation ) VALUES(:qUrl, 1, NOW())', true, 
			['qUrl'=>$templateUrl]);
	}
	
}
//set default admin panel templates
function setDefaultAdminPanelTemplates($defaultTemplate='admin panel by francky bofrancky v0')
{
 
	$db=new LightDb();  
	
	$templateUrl= str_replace(' ', '_', $defaultTemplate);

	$check=$db->query('SELECT COUNT(id) qTotal FROM app_templates', true, 
	['qUrl'=>$templateUrl],true,true);
	// echo $check;
	// die();
	if(gettype($check)=='boolean')
	{
		$db->query('INSERT INTO app_templates(template_url, is_adminpanel_template,date_creation) VALUES(:qUrl, 1, NOW())', true, 
			['qUrl'=>$templateUrl]);
	}
}
//alter table
function alterTable($table='users', $attributes='user_lang VARCHAR, user_hp int')
{
	try{

	$db=new LightDb();
 		$db->query('ALTER TABLE '.$table.' ADD('.$attributes.')');
	}catch(PDOException $e)
	{

	}
}
//function drop column
function dropColumn($tableName,$col)
{
	try{
		$db=new LightDb();
		$db->query('ALTER TABLE '.$tableName.' DROP COLUMN '.$col);
	}catch(PDOException $e)
	{

	}
}
//execute query
function execDbQuery($query)
{
	try{
		$db=new LightDb();
		$db->query($query);
	}catch(PDOException $e)
	{
		
	}
}
//default tables test 
function defaultTables()
{
	$db=new LightDb();

	//features table 
	/*
	$features=createTable('userfeatures', ['id int auto_increment primary key',
    'features_name VARCHAR(255)',
    'features_description TEXT',
	'date_created DATETIME']);

	execDbQuery($features);
	try{
		//add features
		$db->query('INSERT INTO userfeatures(features_name, features_description, date_created) VALUES(:qName, :qDescription, NOW())', true, 
		['qName'=>, 
		 'qDescription'=>,]);


	}catch(PDOException $e)
	{

	}
	*/
	//multi users system
	$users=createTable('app_users', 
	['id int auto_increment primary key',
	'user_name VARCHAR(255)',
	'user_email VARCHAR(255)',
	'user_password VARCHAR(255)',
	'date_created DATETIME']);
 
	try{
		$db->query($users);
	}catch(PDOException $e)
	{ 
	}
	alterTable('app_users', 'user_lang VARCHAR(25)');
	alterTable('app_users', 'user_address VARCHAR(255)');
	 
	//user posts 
	$userposts=createTable('app_users_posts', ['id int auto_increment primary key',
		'post_title VARCHAR(255)',
		'post_description TEXT',
		'post_tags VARCHAR(255)',
		'post_url VARCHAR(255)',
		'date_post datetime']);

	execDbQuery($userposts);
	alterTable('app_users_posts', 'date_update datetime');
	alterTable('app_users_posts', 'user_id int');
	//alterTable('app_users', 'user_hp int, user_mp int');
	//ecommerce modules

	$app=createTable('app', ['id int auto_increment primary key', 
'app_name VARCHAR(255)',
'admin_key VARCHAR(255)',
'date_created DATETIME']);
	try{
		$db->query($app);
	}catch(PDOException $e)
	{
		
	}
	$actu=createTable('actus', ['id int auto_increment primary key',
'titre_actu VARCHAR(255)',
'description_actu TEXT',
'date_publication DATETIME',
'en_promo BOOLEAN DEFAULT FALSE',
'prix int',
'categorie VARCHAR(255)']);

	try{
    	$db->query($actu);

	}catch(PDOException $e)
	{

	}


	alterTable('actus', 'article_url VARCHAR(255), article_tags VARCHAR(255)');
 	 
	// try{
	// 	$db->query('ALTER TABLE actus ADD(article_url VARCHAR(255))');
	// }catch(PDOException $e)
	// {

	// }
	// try{
	// 	$db->query('ALTER TABLE actus ADD(article_tags VARCHAR(255))');
	// }catch(PDOException $e)
	// {

	// }

	//news letter 
	$newsLetter=createTable('news_letter', ['id int auto_increment primary key',
'user_email VARCHAR(255)',
'date_subscribe DATETIME']);

	try{
		$db->query($newsLetter);
	}catch(PDOException $e)
	{

	}
	$guestBook=createTable('guest_book', ['id int auto_increment primary key',
'user_email VARCHAR(255)',
'user_note int',
'guest_comment TEXT',
'date_subscribe DATETIME']);

	try{
		$db->query($guestBook);
	}catch(PDOException $e)
	{

	}

	//templates
	$templates=createTable('app_templates', ['id int auto_increment primary key',
'template_title VARCHAR(255)',
'template_description TEXT',
'template_url VARCHAR(255)',
'date_creation datetime']);

	try{
	    $db->query($templates);
	}catch(PDOException $e)
	{ 
	}
	try { 
		$db->query('ALTER TABLE app_templates ADD (file_id int)');
	} catch (PDOException $e) {
		
	}
	try { 
		$db->query('ALTER TABLE app_templates ADD (set_default_site_template BOOLEAN DEFAULT FALSE)');
	} catch (PDOException $e) {
		
	} 
	try { 
		$db->query('ALTER TABLE app_templates ADD (is_adminpanel_template BOOLEAN DEFAULT FALSE)');
	} catch (PDOException $e) {
		
	} 

	//set default site templates and admin panel templates
	try{
		setDefaultAdminPanelTemplates();
		setDefaultSiteTemplates();
	}catch(PDOException $e)
	{

	}
	try {
		
		$db->query('ALTER TABLE appupload ADD (is_template BOOLEAN DEFAULT FALSE)');
	} catch (PDOException $e) {
		
	}
	//actu galleries table 
	$actuGalleries=createTable('actu_galleries', ['id int auto_increment primary key',
	'article_id int',
	'gallery_id int',
	'date_added datetime']);

	try{
		$db->query($actuGalleries);
	}catch(PDOException $e)
	{

	}

	$admin=createTable('admin', ['id int auto_increment primary key',
'pseudo TEXT', 
'email VARCHAR(255)',
'password VARCHAR(255)',
'date_creation datetime',
'is_online BOOLEAN DEFAULT FALSE']);

	try{
    	$db->query($admin);

	}catch(PDOException $e)
	{

	}

	//file upload 
	//appuser upload 
$userupload=createTable('appupload',['id int auto_increment primary key',
'user_id int',
'filename VARCHAR(255)',
'fileextension VARCHAR(20)',
'filesize int',
'filetype VARCHAR(50)',
'filetitle VARCHAR(255)',
'filedescription TEXT',
'dateupload datetime',
'projectid int',
'dateupdate datetime',
'is_deleted BOOLEAN DEFAULT FALSE']);

try{
	$db->query($userupload);
}catch(PDOException $e)
{

}
//validate user file project
try{
	$db->query('ALTER TABLE appuserfileupload ADD is_valid BOOLEAN DEFAULT FALSE');
}catch(PDOException $e)
{
// echo $e->getMessage();
}

//inbox 
$inboxes=createTable('app_inbox', ['id int auto_increment primary key',
'user_message TEXT',
'user_email VARCHAR(255)',
'user_name VARCHAR(255)',
'user_phone VARCHAR(255)',
'date_message datetime',
'is_deleted boolean default false']);

try{
	$db->query($inboxes);
}catch(PDOException $e)
{

}


$galleries=createTable('app_galleries', ['id int auto_increment primary key',
'gallery_title VARCHAR(255)',
'gallery_description TEXT', 
'date_added datetime']);


try{
	$db->query($galleries);
}catch(PDOException $e)
{

}

$galleries=createTable('app_galleries_files', ['id int auto_increment primary key',
'gallery_id int', 
'file_id int',
'date_added datetime']);

try{
	$db->query($galleries);
}catch(PDOException $e)
{

}

}
//creating all tables
function createAllTables()
{
	$db=new LightDb();


//visitors
$visitors=createTable('appvisitors',
['id int auto_increment primary key',
'user_name varchar(100)',
'user_email varchar(255)',
'date_creation datetime'
]);

try{
    $db->query($visitors);

}catch(PDOException $e)
{

}

//comments
$blogComments=createTable('blogcomments', ['id int auto_increment primary key',
'post_id int',
'comments_content text',
'datecomment datetime',
'is_deleted boolean default false'
]);

try{
    $db->query('ALTER TABLE blogcomments 
ADD (user_id int, user_type VARCHAR(100))');
//example, 4=> just visitor
//example, 4=>subscribed user
}catch(PDOException $e)
{

}
 
try{
    $db->query($blogComments);

}catch(PDOException $e)
{

}


//orders
$orders=createTable('apporders',['id int auto_increment primary key',
'user_id int', 
'user_type varchar(100)',
'is_delivered boolean default false',
'date_order datetime'
]);

try{
$db->query($orders);
}catch(PDOException $e)
{

}

//app orders cart
$ordersCart=createTable('apporderscart',['id int auto_increment primary key',
'product_id int',  
'order_id int',
'date_ordered datetime'
]);

try{
$db->query($ordersCart);
}catch(PDOException $e)
{

}

	//table utilisateur
	$query1=createTable('appuser', ['id int auto_increment primary key',
'user_email VARCHAR(255)',
'user_lastname VARCHAR(100)',
'user_firstname VARCHAR(100)',
'user_pseudo VARCHAR(100)',
'user_pwd VARCHAR(255)',
'date_creation datetime',
'date_update datetime',
'profile_url VARCHAR(255)',
'user_address VARCHAR(255)',
'user_country VARCHAR(255)',
'user_phone_number VARCHAR(100)',
'user_national_id VARCHAR(100)',
'is_deleted BOOLEAN DEFAULT FALSE']);
try{
	$db->query($query1);
}catch(PDOException $e)
{

}
//user gender
try{
$db->query('ALTER TABLE appuser ADD user_gender VARCHAR(50)');

}catch(PDOException $e)
{

}

//user locations

try{
$db->query('ALTER TABLE appuser ADD(user_x int,
user_y int,
cam_x int,
cam_y int');

}catch(PDOException $e)
{

}
//user mana and hp

try{
$db->query('ALTER TABLE appuser ADD(user_hp int,
user_mp int,
user_level int,
user_nextlevelxp int',
'user_xp int');

}catch(PDOException $e)
{

}


//appuser upload 
$userupload=createTable('appuserfileupload',['id int auto_increment primary key',
'user_id int',
'filename VARCHAR(255)',
'fileextension VARCHAR(20)',
'filesize int',
'filetype VARCHAR(50)',
'filetitle VARCHAR(255)',
'filedescription TEXT',
'dateupload datetime',
'projectid int',
'dateupdate datetime',
'is_deleted BOOLEAN DEFAULT FALSE']);

try{
	$db->query($userupload);
}catch(PDOException $e)
{

}
//validate user file project
try{
	$db->query('ALTER TABLE appuserfileupload ADD is_valid BOOLEAN DEFAULT FALSE');
}catch(PDOException $e)
{
// echo $e->getMessage();
}
//user money
try{
	$db->query('ALTER TABLE appuser ADD user_money int');
}catch(PDOException $e)
{

}
//user upload dir
try{
	$db->query('ALTER TABLE appuser ADD has_upload_dir BOOLEAN DEFAULT FALSE');
}catch(PDOException $e)
{

}
//is online
try{
	$db->query('ALTER TABLE appuser ADD is_online int');
}catch(PDOException $e)
{

}
//usernotifications
$userNotifications=createTable('appusernotifications', ['id int auto_increment primary key',
'user_id int',
'notification_category VARCHAR(255)',
'object1_id int',
'object2_id int',
'object3_id int',
'object4_id int',
'date_notification datetime',
'is_deleted BOOLEAN DEFAULT FALSE',
'usersender_id int']);
try{
	$db->query($userNotifications);
}catch(PDOException $e)
{

}

//user money requested  
$moneyrequested=createTable('appusermoneyoperation', ['id int auto_increment primary key',
'user_id int',
'money_amount int',
'is_received_by_admin boolean default false',
'money_type VARCHAR(50)', 
'date_requested datetime'
]);

try{
	$db->query($moneyrequested);
}catch(PDOException $e)
{

}
//adding phone used column
	try{
		$db->query('ALTER TABLE appusermoneyoperation ADD (phone_used VARCHAR(10)) '); //eg: 0326510180
	}catch(PDOException $e)
	{

	}

//user money used  
// $moneyused=createTable('appusermoneyused', ['id int auto_increment primary key',
// 'user_id int',
// 'money_amount int',
 
// 'date_used datetime'
// ]);

// try{
// 	$db->query($moneyused);
// }catch(PDOException $e)
// {

// }


//user pages
//pages
	$userpages=createTable('appuserpages',['id int auto_increment primary key',
'user_id int',
		'page_name VARCHAR(255)',
		'page_url VARCHAR(255)',
		'page_description TEXT',
		'date_creation datetime',
		'date_update datetime',
		'page_category VARCHAR(100)',
		'is_deleted boolean default false',
		'subscribe_price int',
                'total_visits int'
]);
try{
	$db->query($userpages);
}catch(PDOException $e)
{

}
//app pages file upload 
$pagesupload=createTable('apppagesfileupload',['id int auto_increment primary key',
'user_id int',
'filename VARCHAR(255)',
'fileextension VARCHAR(20)',
'filesize int',
'filetype VARCHAR(50)',
'filetitle VARCHAR(255)',
'filedescription TEXT',
'dateupload datetime',
'projectid int',
'dateupdate datetime',
'is_deleted BOOLEAN DEFAULT FALSE']);

try{
	$db->query($pagesupload);
}catch(PDOException $e)
{

}


//cover and profile pictures
try
{
    $db->query('ALTER TABLE apppagesfileupload ADD (is_cover boolean default false,
is_profile boolean default false)');
}catch(PDOException $e)
{

}
//pages notes
$pagesNotes=createTable('apppagesnotes',['id int auto_increment primary key',
'page_id int',
'note_title VARCHAR(255)',
'note_content TEXT',
'note_category VARCHAR(100)',
'date_note datetime',
'date_update datetime',
'is_published BOOLEAN DEFAULT FALSE',
'is_deleted BOOLEAN DEFAULT FALSE']);
try{
$db->query($pagesNotes);
}catch(PDOException $e)
{

}

   //pages
	$query2=createTable('apppages',['id int auto_increment primary key',

		'page_name VARCHAR(255)',
		'page_url VARCHAR(255)',
		'page_description TEXT',
		'date_creation datetime',
		'date_update datetime',
		'page_category VARCHAR(100)',
		'is_deleted boolean default false' ,
'adminid int'
]);
	//adding total points required to pass col
	try{
		$db->query('ALTER TABLE apppages ADD (totalpointsrequired int) ');
	}catch(PDOException $e)
	{

	}
        //adding total projects points 
        try{
		$db->query('ALTER TABLE apppages ADD (totalprojectspoints int) ');
	}catch(PDOException $e)
	{

	}
        //adding page language 
        try{
		$db->query('ALTER TABLE apppages ADD (page_language VARCHAR(100)) ');
	}catch(PDOException $e)
	{

	}

	//adding subscribe price col
	try{
		$db->query('ALTER TABLE apppages ADD (subscribe_price int) ');
	}catch(PDOException $e)
	{

	}
	//upload dir  
try
{
    $db->query('ALTER TABLE apppages ADD has_upload_dir boolean default false');
}catch(PDOException $e)
{

}

//is published
try
{
    $db->query('ALTER TABLE apppages ADD is_published boolean default false');
}catch(PDOException $e)
{

}

	//adding total visit col
	// try{
	// 	$db->query('ALTER TABLE apppages ADD (total_visits int) ');
	// }catch(PDOException $e)
	// {

	// }
try{
	$db->query($query2);
}catch(PDOException $e)
{

}
//apppages projects
$pagesprojects=createTable('apppagesprojects',['id int auto_increment primary key',
		'page_id int',
		'project_name VARCHAR(255)',
		'project_description TEXT',
		'project_points int',
		'project_url VARCHAR(255)',
		'total_submited int',
		'date_creation datetime',
		'date_update datetime',
		'is_deleted boolean default false',
		'total_views int'
]);
try{
	$db->query($pagesprojects);
}catch(PDOException $e)
{

}
//apppages challenges 

//apppages posts
	$appPagesPosts=createTable('apppagesposts',['id int auto_increment primary key',
		'page_id int',
		'post_title VARCHAR(255)',
		'post_description TEXT',
		'date_post datetime',
		'date_update datetime',
		'is_deleted boolean default false',
		'total_views int'
]);
try{
	$db->query($appPagesPosts);
}catch(PDOException $e)
{

}
//adding categories to app pages posts
try
{
$db->query('ALTER TABLE apppagesposts ADD post_category VARCHAR(255)');
}
catch(PDOException $e)
{

}
//app page subscribers
$appPageSubscribers=createTable('apppagessubscribers',['id int auto_increment primary key',
		'user_id int',
		'page_id int', 
		'is_activated boolean default false',
		'date_subscribe datetime',
		'date_leave datetime',
		'date_graduated datetime',
		'total_points int',
		'is_deleted BOOLEAN DEFAULT FALSE'
]);
try{
	$db->query($appPageSubscribers);
}catch(PDOException $e)
{

}
//add check column to apppagessubscribers
try{
	$db->query('ALTER TABLE apppagessubscribers ADD is_verified BOOLEAN DEFAULT FALSE');
}catch(PDOException $e)
{

}
//adding column has_graduated
try{
	$db->query('ALTER TABLE apppagessubscribers ADD has_graduated BOOLEAN DEFAULT FALSE');
}catch(PDOException $e)
{

}

//admin
	$query3=createTable('appadmin',
['id int auto_increment primary key',
'admin_email VARCHAR(255)',
'admin_password VARCHAR(255)',
'admin_pseudo VARCHAR(100)',
'date_creation datetime',
'date_update datetime',
'is_deleted BOOLEAN DEFAULT FALSE'
 ]);

try{
	$db->query($query3);

	//creating default admin
	$admincheck=$db->query('SELECT * FROM appadmin WHERE admin_email=:pEmail',
true,
['pEmail'=>'franckywebdesign@gmail.com'],true,true);
	if(!$admincheck['id']){
		$db->query('INSERT INTO appadmin(admin_email,admin_password,admin_pseudo,
	date_creation) VALUES(:pEmail, :pPwd, :pPseudo, NOW())',
	true,
	['pEmail'=> 'franckywebdesign@gmail.com',
	'pPwd'=>password_hash('hello world', PASSWORD_DEFAULT),
	'pPseudo'=>'francky']);
	}
}catch(PDOException $e)
{

}
//admin location
try
{
$db->query('ALTER TABLE appadmin ADD(user_x int, user_y int, cam_x int,cam_y int');
}
catch(PDOException $e)
{

}

//admin notifications
	$query4=createTable('adminnotifications',
['id int auto_increment primary key',
'sender_id int',
'notification_category VARCHAR(100)',
'about_id int',
'about_id2 int',
'about_id3 int',
'about_id4 int',
'date_notification datetime',
'date_update datetime',
'is_deleted BOOLEAN DEFAULT FALSE'
 ]);

try{
	$db->query($query4);
}catch(PDOException $e)
{

}

//admin contact messages 
$adminmessages=createTable('admincontactmessages',
['id int auto_increment primary key',
'visitor_name VARCHAR(255)',
'visitor_email VARCHAR(255)',
'visitor_message TEXT',
'date_message datetime',
'date_update datetime',
'is_deleted BOOLEAN DEFAULT FALSE'
 ]);
try{
	$db->query($adminmessages);
}catch(PDOException $e)
{

}
 
}
function initPagination( ) {

        //get current page
 
	$query=parse_url($_SERVER['REQUEST_URI']);
	// echo '<pre>';
	// var_dump($query);
	// echo '</pre>';
	$_GET['page']=0; //useful for pagination class
	if(isset($query['query'])){
		$query=$query['query'];
		$query=str_replace('?', '',$query);
		$query=explode('/',$query);
		 
		// echo '<pre>';
		// var_dump($query);
		// echo '</pre>';
		for($i=0,$c=count($query);$i<$c;$i++)
		{
			if(isset($query[$i]) && preg_match('#page=#',$query[$i]))
			{
				$temp=$query[$i];
				$temp=str_replace('page=','',$temp); 
				$_GET['page']=(int)$temp;
				//echo 'page==> '.$_GET['page'];
				break;
			}
		}
	}
		 
}

function getDateNow()
{
	$db=new LightDb();
	return $db->query('SELECT NOW()',false,[],true,true)[0];
}

function appLib()
{
	require_once 'codes/Database.php';
	require_once 'codes/LightDb.php';
	require_once 'codes/check.php';
	require_once 'codes/AppPagination.php';
 	require_once 'codes/User.php';
 	require_once 'codes/Material.php';
	require_once 'codes/AppUpload.php';

	require_once 'codes/AppFile.php';
	require_once 'codes/AppGallery.php';
	require_once 'codes/AppArticle.php';
	require_once 'codes/UserController.php';

	require_once 'codes/AppController.php';
	require_once 'codes/AppTemplate.php';
	require_once 'codes/SocialNetworkController.php';
	require_once 'codes/EcommerceController.php';
	/*you need to include each features you add, like Client1WebsiteController.php*/
	require_once 'codes/AdminSocialNetworkController.php';
	
}

//ar to $
function toDollar($ariary)
{
	return ceil((int)$ariary/15000);
}
//ar to euro
function toEuro($ariary)
{
	return ceil((int) $ariary/20000);
}
//alert admin
function alertAdmin($category='new user account created', $id=0)
{
	//alert admin
	$db=new LightDb();
	$db->query('INSERT INTO adminnotifications 
		(sender_id,notification_category,date_notification) 
		VALUES(:pUserId,:pCategory, NOW()) ',
	true,
	['pUserId'=>$id,
	'pCategory'=>$category]);

}
//alert user
function alertUser($userId,$category='login',$object1=0)
{
	 
	$db=new LightDb();
	$db->query('INSERT INTO appusernotifications 
		(user_id,notification_category,date_notification,object1_id) 
		VALUES(:pUserId,:pCategory, NOW(),:pObject1) ',
	true,
	['pUserId'=>$userId,
	'pCategory'=>$category,
	'pObject1'=>(int)$object1]); 
}
//checking user connected 
function checkUserConnected()
{
	$db=new LightDb();
	$checked=false;

	if(isset($_SESSION['userKey'],$_SESSION['userEmail']))
	{
		$safeDatas=check($_SESSION);
		$result=$db->query('SELECT * FROM appuser WHERE user_email=:qEmail',true,['qEmail'=>
			$safeDatas['userEmail']],true,true);

		$checked=isset($result['user_email'], $result['user_pwd']) && $result['user_pwd']==$_SESSION['userKey'];

	}
	return $checked;
}
function testCurrentPage($current='', $page='home')
{
	echo isCurrentPage($current, $page)? ' class="currentPage" ': '';
}
//test current page 
function isCurrentPage($current='',$page='home')
{

	if($current==$page)
	{

		return true;
	}
	return false;
}
//add current page class 
function currentPageClass($current,$page)
{
	if(isCurrentPage($current,$page))
	{
		echo 'currentPage';
	}
}
//is online
function isUserOnline()
{
	return isset($_SESSION['isConnected'],
		 		$_SESSION['userConnected'],
		 		$_SESSION['userKey'],
		 		$_SESSION['userEmail']) && checkUserConnected();
}
//go home
function goHome()
{
	header('Location: '.WEBROOT.'home/');
	die();
}