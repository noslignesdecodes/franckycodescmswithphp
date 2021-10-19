<?php 
use franckycodes\database\LightDb;

class UserController{

	private $db;
	public function __construct($pages)
	{
		$this->core($pages);

	}
	//guest book form template
	public function guestBookFormTemplate()
	{

	}
	public function createFile($str='',$filename = 'model/admin/templates/new.php')
	{
		
		if(!file_exists($filename)){


		    $paths=explode('/', $filename);

		    $path='';
		 
		    for($i=0,$c=count($paths)-1;$i<$c;$i++)
		    {
		    	$path.=$i<=0?$paths[$i].'/': $paths[$i].'/';
	 
		    	if(!file_exists($path))
			    { 
			    	// echo $path.'<br>';
			    	// mkdir($path.$paths[$i], 0777, true);
			    	exec('mkdir "'.$path.'"');
			    }
		    }
		    // die();
		    $handle = fopen($filename, 'w+'); 

		    if(gettype($handle)!='boolean')
		    {
				fputs($handle, $str); 
				fclose($handle);
		    }
		}
		// else{
			// echo $filename.'<br>';
			// echo 'file_exists';
		// }
	}
	//news letter form template
	public function newsLetterFormTemplate()
	{
		return '<form class="newsLetterForm" method="POST" action="">
                    <input type="text" id="userEmail" name="newsLetter" placeholder="votre email" value=""><br>
                    <label for="submitNewsLetter" class="blueBt">recevoir les nouveautés</label>
                    <input type="submit" class="hide" id="submitNewsLetter" value="soumettre">
                </form>'; 
	}
	//contact form template
	public function contactFormTemplate()
	{
		return ' <form class="contactForm" method="POST" action="">
           <label>Nom</label><input type="text" placeholder="Nom*" name="username"><br>
            <label>Email</label>    <input type="text" placeholder="Email*" name="email"><br>
            <label>Téléphone</label><input type="text" placeholder="Phone*" name="phone"><br>
           		  
	           
	        <label>Message</label><textarea name="message" class="messageEditor">Message*</textarea>
	          
	    
	            <label for="submitContactBt" class="mainBt fullWidth blueBt sendBt">envoyer</label>
	            <input type="submit" id="submitContactBt" class="hide">
</form>';
	}
	//comments form template
	public function commentFormTemplate()
	{
		return '<form method="POST" action="">
	<label for="">Nom</label>
	<input type="text" name="userName"><br>
	<label for="">Email</label>
	<input type="text" name="userEmail"><br>

	<label for="">Votre commentaire</label>
	<textarea name="userComment"></textarea>

	<input type="hidden" name="articleId" value="">
	<label for="saveCommentSubmit" class="mainBt">publier</label>
	<input type="submit" class="hide" id="saveCommentSubmit">
</form>';
	}

	//module comments
	public function commentsArticleModule()
	{
		$articlesComments=createTable('articles_comments', ['id int auto_increment primary key',
			'article_id int',
			'visitor_name VARCHAR(255)',
			'visitor_email VARCHAR(255)']);

		execDbQuery($articlesComments);
		alterTable('articles_comments', 'date_published datetime, date_update datetime');
		alterTable('articles_comments', 'main_comment TEXT');

	}
	public function saveComment()
	{
		$result=check($_POST);
		echo '<pre>';
		var_dump($_POST);
		echo '</pre>';
		$db=new LightDb();
		$db->query('INSERT INTO articles_comments(article_id, visitor_name, visitor_email, main_comment, date_published) VALUES(:qId, :qName, :qEmail, :qMain, NOW())',
		true,
		['qId'=>$result['articleId'],
		'qName'=>$result['userName'],
		'qEmail'=>$result['userEmail'],
		'qMain'=>$result['userComment']]);

		$article=new AppArticle($result['articleId']);

		
		header('Location: '.WEBROOT.$article->getAll('article_url'));
		die();

	}
	protected function sendNewsLetter()
	{
		$db=new LightDb();
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
	}
	protected function sendMessage()
	{
		$db=new LightDb();
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

	}
	public function core($pages)
	{
		$db=new LightDb();
		// $galleryId=6;
		// $banners=$db->query('SELECT * FROM app_galleries_files WHERE gallery_id=:qId',
		//  		true,
		//  		['qId'=>$galleryId], true);
		// $latestArticles=$db->query('SELECT * FROM actus WHERE (categorie="vehicules" OR categorie="motos") ORDER BY id DESC LIMIT 0,5', 
		// false,[],true);
		// $totalPromo=(int)$db->query('SELECT COUNT(id) qTotal FROM actus WHERE en_promo',false,[],true,true)['qTotal'];

		// $promos=$db->query('SELECT * FROM actus WHERE en_promo ORDER BY id DESC ',false,[],true,true);

		// if(gettype($promos)!='boolean'){ 
		// 	$promoArticle=new AppArticle($promos['id']);
		// }else{
		// 	$promoArticle=new AppArticle(0);
		// }
		// //show some photos and videos from galleries 
		// $photosGalleryId=8;
		// $photos=$db->query('SELECT * FROM app_galleries_files WHERE gallery_id=:qId',
		//  		true,
		//  		['qId'=>$photosGalleryId], true);

		switch($pages[URL_COUNTER])
		{  	
		 	case 'sendnewstouser':
		        $this->sendNewsLetter();
	        break;
		 	case 'savemessage':
		 		$this->sendMessage();
		 	break;
		 	case 'readarticle': 
		 		require_once 'model/users/readarticle/readarticle.php';
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
		 
			case 'home':
			default: 
			 
				require_once 'model/basicblog/home/home.php';
			break;
		
		} 
	}
}	