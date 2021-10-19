<?php 
use franckycodes\database\LightDb;

class EcommerceController extends UserController{

	private $db;
	public function __construct($pages)
	{
		$this->core($pages);

	}
	public function core($pages)
	{
		$db=new LightDb();
		$galleryId=6;
		$banners=$db->query('SELECT * FROM app_galleries_files WHERE gallery_id=:qId',
		 		true,
		 		['qId'=>$galleryId], true);
		$latestArticles=$db->query('SELECT * FROM actus WHERE (categorie="vehicules" OR categorie="motos") ORDER BY id DESC LIMIT 0,5', 
		false,[],true);
		$totalPromo=(int)$db->query('SELECT COUNT(id) qTotal FROM actus WHERE en_promo',false,[],true,true)['qTotal'];

		$promos=$db->query('SELECT * FROM actus WHERE en_promo ORDER BY id DESC ',false,[],true,true);

		if(gettype($promos)!='boolean'){ 
			$promoArticle=new AppArticle($promos['id']);
		}else{
			$promoArticle=new AppArticle(0);
		}
		//show some photos and videos from galleries 
		$photosGalleryId=8;
		$photos=$db->query('SELECT * FROM app_galleries_files WHERE gallery_id=:qId',
		 		true,
		 		['qId'=>$photosGalleryId], true);

		switch($pages[URL_COUNTER])
		{ 
		 	
		 	case 'cart':

		 		echo 'your cart';
		 	break;
		 	case 'sendnewstouser':
		        $result=check($_POST);
                        $ajax=isset($result['ajax'])?$result['ajax']: 0;
		        echo '<pre>';
		        var_dump($result);
		        echo '</pre>';

		        $to      = $result['newsLetter'];
		        $subject = 'nouveautés du site';
		        $message = 'hello, voici les news du site';
		        $headers = 'From: franckywebdesign@gmail.com'       . "\r\n" .
		                    'Reply-To: franckywebdesign@gmail.com' . "\r\n" .
		                    'X-Mailer: PHP/' . phpversion();

		        $test=mail($to, $subject, $message, $headers);
		        echo $test;
                        
                        $db->query('INSERT INTO news_letter(user_email, date_subscribe) 
                           VALUES (:qEmail, NOW())', true, ['qEmail'=> $result['newsLetter']]);

                        if($ajax)
                         {
                            echo 'news letter sent';
                         }else{
                         
		            header('Location: '.WEBROOT.'home/');
		            die();
                         } 
	        break;

		 	case 'savemessage':
		 		$result=check($_POST);


		 		// echo '<pre>';
		 		// var_dump($result);
		 		// echo '</pre>'; 

		 		// $query=insertQuery('app_inbox');
		 		// echo $query;

		 		$db->query('INSERT INTO app_inbox(user_message, user_email, user_name, user_phone, date_message) VALUES(:qMessage, :qEmail, :qName, :qPhone, NOW())',true, 
		 			['qMessage'=> $result['message'], 
		 			'qEmail'=> $result['email'],
		 			'qName'=>$result['username'], 
		 			'qPhone'=>$result['phone']]);

		 		if(isset($result['ajax']))
		 		{
		 			echo 'sent';
		 		}else{
		 			header('Location: '.WEBROOT.'messagesent/');
		 			die();
		 		}
		 	break;
		 	 
		 	case 'messagesent': 
		 	$messageSent=1;
			case 'contact':
				require_once 'model/users/contact/contact.php';
			break;
			 
			case 'aboutus':
				require_once 'model/users/about/about.php';
			break; 
			case 'search': 
				require_once 'users/model/search/search.php'; 
			break;
		 
		 
			default: 
			 
				require_once 'model/ecommerce/home/home.php';
			break;
		
		} 
	}
}	