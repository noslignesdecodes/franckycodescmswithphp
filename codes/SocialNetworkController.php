<?php 
use franckycodes\database\LightDb;

class SocialNetworkController extends UserController{

	private $db;
	public function __construct($pages)
	{
		$this->core($pages);

	}
	public function core($pages)
	{
		$db=new LightDb();
 
		switch($pages[URL_COUNTER])
		{ 
		 	case 'subscribe':
		 		require_once 'model/socialnetwork/subscribe/subscribe.php';
		 	break;
		 	case 'login':

		 		require_once 'model/socialnetwork/login/login.php';
		 	break;
		 	case 'sendnewstouser':
		       $this->sendNewsLetter();
	        break;

		 	case 'savemessage':
		 		$this->sendMessage();
		 	break;
		  
		 	 
		 	case 'aboutus':
				require_once 'model/socialnetwork/about/about.php';
			break;
		 	case 'messagesent': 
		 	$messageSent=1;
			case 'contact':
				require_once 'model/socialnetwork/contact/contact.php';
			break;
		  
			case 'search': 
				 require_once 'model/socialnetwork/search/search.php';
			break;
		 
			case 'home':
			default: 
			 
				require_once 'model/socialnetwork/home/home.php';
			break;
		
		} 
	}
}	