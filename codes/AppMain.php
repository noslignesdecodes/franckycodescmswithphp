<?php  
use franckycodes\database\LightDb;
class AppMain{
	private $app_language;
	public function __construct()
	{
		$this->app_language='fr';
	}
	public function run()
	{
	appLib();
	define('APP_TEMPLATE', 'view/template/app/welcome.php');

	//init webroot
	$uri=$_SERVER['REQUEST_URI'];
	$scriptName=$_SERVER['SCRIPT_NAME'];
	$language=$this->app_language;
	$scriptName=str_replace('index.php', '',$scriptName);

	define('ADMINKEY','admin');
	define('ADMINKEYCONNECTED','admin is connected');

	define('WEBROOT', $scriptName);
	 
	$pages=explode('/', $uri);
	// echo '<pre>';
	// var_dump($pages);
	// die();
	initapp ($pages);
 
	initPagination();
  
	if(!isset($_SESSION['searchQuery']))
	{
		$_SESSION['searchQuery']='';
	}
	 
	$db=new LightDb(); 
	$paths=parse_url($_SERVER['REQUEST_URI']);
	 
	$pages=explode('/',$paths['path']);

	 
	function isBlogPost($url)
	{

		//echo htmlspecialchars($url);
		 
		$db=new LightDb();
		$result=$db->query('SELECT * FROM apppages WHERE page_url=:q AND page_category="blogpost" ',true,
		['q'=>htmlspecialchars($url)], true,true);
		 
		if(isset($result['id']))
		{
		 
		$language=$_SESSION['user_language'];
		$totalCart=count($_SESSION['cart']);

		$classroom=new AppPage((int)$result['id']);
		 				require_once 'model/users/'.$language.'/blog/readblog.php';

			return true;
		}else{
			return false;
		}
	}
	 

		$this->someConstants();

		// echo md5(ADMINKEY);

		// if(!isset($_SESSION['gott_login']))
		try{
			if($pages[URL_COUNTER]==ADMIN_KEY)
			{ 
				//$app=new AppController($pages);
				$admin=new AdminSocialNetworkController($pages);

			 	//you can develop new features for admin and add it here, just comment the old feature

			}else {
				//here ou can load features you added
				//$app=new UserController($pages);

				$sns=new SocialNetworkController($pages);
				//$shop=new EcommerceController($pages);
			}
		}catch(Exception $e)
		{

		}
	}

	private function checkAdminKey()
	{
		$key=false;
		try{
			$db=new LightDb();
			$key=$db->query('SELECT * FROM app', false,[],true,true);

		}catch(PDOException $e)
		{

		}
		return gettype($key)!='boolean'?$key['admin_key']:'myadminpanel';
	}
	public function someConstants()
	{
		//admin
		define('URL_COUNTER', 1); //url start
		$db=new LightDb();

		$getDefaultTemplate=$db->query('SELECT * FROM app_templates WHERE set_default_site_template ORDER BY id DESC', false,[], true, true);

		if(gettype($getDefaultTemplate)!='boolean')
		{
			$siteTemplate=new AppTemplate($getDefaultTemplate['id']);
			define('MAIN_TEMPLATE', $siteTemplate->getFullPath().'index.php');
			define('TEMPLATEROOT', $siteTemplate->getFullPath().'/');
		}else{
			//default template that we created just for u cuz we luv u
			define('MAIN_TEMPLATE', 'view/template/my_cute_blog_template/index.php');
			 
		}

		//the following constants should be customised
		define('LOGIN_TEMPLATE', 'view/template/admin_panel_by_francky_bofrancky_v0/login.php');

		define('ADMIN_PANEL_TEMPLATE', 'view/template/admin_panel_by_francky_bofrancky_v0/index.php');
		
		//check admin key
		define('ADMIN_KEY', $this->checkAdminKey());

		define('ADMINROOT', WEBROOT.ADMIN_KEY);

		define('ADMIN_LOGIN', 'root');   //to change

		define('ADMIN_PWD', 'hello world'); //to update

	}
}