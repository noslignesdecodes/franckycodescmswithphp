<?php 
use franckycodes\database\LightDb;

class AppController{
	private $pages;
	public function __construct($pages)
	{
		$this->core($pages);
		$this->pages=$pages;
		//checking templates 
		$this->scantemplates();
	}
	public function updateCms()
	{
		//download from author website
	}
	public function checkTemplates()
	{
		// $templates= $db->query('SELECT * FROM app_templates ORDER BY id DESC',false,[],true);

		// foreach($templates as $result)
		// {
		// 	$template=new AppTemplate($result[$i]);

		// 	if(is_dir($f))
		// }
	}
	public function scantemplates()
	{
		//check all templates
		$templates=scandir('view/template/');
		$db=new LightDb();
		


		for($i=0,$c=count($templates);$i<$c;$i++)
		{
			if(is_dir('view/template/'.$templates[$i]) && $templates[$i]!='.' && $templates[$i]!='..')
			{
				$check=$db->query('SELECT * FROM app_templates 
			WHERE template_url=:qTemplate', true, 
			['qTemplate'=> $templates[$i]], true,true);
				//echo '<!--'.gettype($check).'-->';
				if(gettype($check)=='boolean')
				{
					//insert template
					$db->query('INSERT INTO app_templates(template_url, 
						template_title, 
						date_creation) 

						VALUES(:qTemplateUrl,:qTemplateTitle, NOW())',
						true, 
						['qTemplateUrl'=>$templates[$i],
						'qTemplateTitle'=>str_replace('_', ' ', $templates[$i])]);

				}
				//echo $templates[$i].'/<br>';
			}else{
				//echo 'unknown';
			}
		}

		//echo '<pre>';
		//var_dump($templates);
		//echo '</pre>';
	}
	public function createFile($str='',$filename = 'model/admin/templates/new.php')
	{
		 
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
	public function extractZip($filename, $dest='upload/')
	{
		// Get Project path
		// define('_PATH', dirname(__FILE__));

		// Zip file name
		 
		$zip = new ZipArchive();
		$res = $zip->open($filename);
		if ($res === TRUE) {

		  // Unzip path
		  // $path = _PATH."\\upload";

		  // echo $path;
		  // Extract file
		  $zip->extractTo($dest);
		  $zip->close();

		  echo 'Unzip!';
		  return true;
		} else {
		  echo 'failed!';
		  return false;
		}

	}
	public function getDirectory($mydir='.')
	{
		// $mydir='.';

		
		$str=$mydir;

		if(is_dir($mydir)){
			$files=scandir($mydir);

			$mainPath='';
			$str='';
			foreach($files as $result)
			{
				// echo '<pre>';
				// var_dump($result);
				//echo '/'.$mydir.'/'.$result.'/';
				if(is_dir($mydir.'/'.$result))
				{
					$temp=explode('/',$mydir);
					$newPath='';
					for($i=0,$c=count($temp);$i<$c;$i++)
					{
						$newPath.=$temp[$i].'_rov_';

						// $newPath=$temp[$i].'_rov_';
	 
					}
					//$mainPath=$newPath.'_rov_'.$result;
					if($result!='.')
					$str.='<a href="'.ADMINROOT.'/getdirectory/'.$newPath.'_rov_'.$result.'"><strong>'.$result.'/</strong></a><br>';
				}else{
					// $temp=explode('/',$mydir);
					// $newPath='';
					// for($i=0,$c=count($temp);$i<$c;$i++)
					// {
					// 	if($temp[$i]!='')
					// 	$newPath.=$temp[$i].'_rov_';
					// }
					//echo realpath($mydir.'/'.$result);
					// echo '<!-- '.basename(realpath($mydir.''.$result)).'-->';
					$filepath= realpath($mydir.'/'.$result);

					$path=explode('\\', $filepath);
					//to update in a real server
					unset($path[0]);
					unset($path[1]);
					unset($path[2]);
					unset($path[3]);
					$path=array_values($path);

					$filepath='';
					for($i=0,$c=count($path);$i<$c;$i++)
					{
						$filepath.=$path[$i].'_rov_';
					}
					// echo '<pre>';
					// var_dump($path);
					// echo '</pre>';
					$str.='<a href="'.ADMINROOT.'/webeditor/'.$filepath.'">'.$result.'</a><br>';

					// echo  '<a href="'.WEBROOT.''.$filepath.'">'.$result.'</a><br>';
				}
			}
		}
	 
		return $str;
	}
	public function showDirectory($pages)
	{
		$result=check($pages);

		// echo '<pre>';
		// var_dump($result);
		// die();
		$directory=isset($result[3])?$result[3]:'.';
		$directory=$directory==''?'.':$directory;
		$dirs=explode('_rov_', $directory);

		$dir='';
		for($i=0,$c=count($dirs);$i<$c;$i++)
		{
		 	$dir.=$dirs[$i].'/';
		}
		 	 
		//echo $dir;
		 	 
		$dir=$this->getDirectory($dir); //display it in a view
		return $dir;
	}

	protected function removeArticle($pages,$table='app_inbox', $redirect=ADMINROOT.'/inbox/')
	{
	 		$db=new LightDb();
	 		$result=check($pages);
		 	$articleId=(isset($result[3]))?$result[3]:0;

		 	$db->query('DELETE FROM '.$table.' WHERE id=:qId', true, ['qId'=>$articleId]);
		 	echo $articleId;

		 	$ajax=(isset($result[4]) && $result[4]=='ajax')?$result[4]:0;

		 	if($ajax)
		 	{
		 		echo 'removed';
		 		die();
		 	}else{
		 		header('Location: '.$redirect);
		 		die();
		 	}

	}
	public function core($pages)
	{
		$db=new LightDb();
		//some stats 
		$totalActus=$db->query('SELECT COUNT(id) qTotal FROM actus ', false,[],true,true)['qTotal'];

		if(isset($_SESSION['adminLogged']))
	 {
	 	//some admin stats 
	 	$totalFiles=$db->query('SELECT COUNT(id) qTotal FROM appupload',false,[],true,true)['qTotal'];
	 	$totalArticles=$db->query('SELECT COUNT(id) qTotal FROM actus',false,[],true,true)['qTotal'];

	 	define('TOTAL_MESSAGES', $db->query('SELECT COUNT(id) qTotal FROM app_inbox',false,[],true,true)['qTotal']);

	 	define('TOTAL_GALLERIES', $db->query('SELECT COUNT(id) qTotal FROM app_galleries',false,[],true,true)['qTotal']);

	 	$allPages=isset($pages[URL_COUNTER+1])?$pages[URL_COUNTER+1]:'home';

	 	$editorDir=$this->showDirectory($pages);
	 	
	 	switch($allPages)
		 {
		 	case 'removetemplate':
		 		$this->removeArticle($pages,'app_templates', ADMINROOT.'/templates/');

		 	break;
		 	case 'scantemplates':
		 	$this->scantemplates();
		 	break;
		 	case 'trash':
		 		require_once 'model/admin/trash/trash.php';
		 	break;
		 	case 'removeguestbook':

		 		$this->removeArticle($pages,'guest_book', ADMINROOT.'/guestbook/');
		 	break;
		 	case 'removenewsletter':
		 		$this->removeArticle($pages,'news_letter', ADMINROOT.'/newsletter/');

		 	break;
		 	case 'removemessage': 
		 		$this->removeArticle($pages,'app_inbox');
		 	break;
		 	case 'removearticle':
		 		$this->removeArticle($pages, 'actus', ADMINROOT.'/articles');
		 	break;
            case 'guestbook':
                require_once 'model/admin/guestbook/list.php';
            break;
            case 'newsletter':
                require_once 'model/admin/newsletter/list.php';
            break;
		 	case 'savewebeditor':
			 	$result=check($_POST);
			 	// echo '<pre>';
			 	// var_dump($result);
			 	// echo '</pre>';
			 	$ajax=isset($result['ajax'])?$result['ajax']: 0;
			 	$path=$result['editorpath'];
			 	$content=$_POST['editorcontent'];
			 	$content=str_replace('</textarea>', '</textarea>', $content);


			 	$redirect=str_replace('/', '_rov_', $path);
			 	createFile($content,$path);
			 	$redirect=str_replace(' ', '%20', $redirect); 
	 			if($ajax)
	 			{
	 				echo 'updated';
	 			}else{
		 			header('Location: '.ADMINROOT.'/webeditor/'.$redirect.'_rov_');
		 			die();
	 			}
		 	break;
		 	case 'webeditor':
		 		$result=check($pages);
		 		$filepath=isset($result[3])?$result[3]:'index.php';
 
		 		$path= str_replace('_rov_', '/', $filepath);

		 		$path=substr($path, 0, strlen($path)-1); 
		 		// echo $path;
		 		$path=str_replace('%20', ' ',$path);
		 		$content='';
		 		if(file_exists($path))
		 		{
		 			// echo 'file exists';
		 			$fileFound=true;
		 			$content=showFileContent($path);

		 			// echo '<br>'.$content.'<br>';
		 			// echo '<textarea>';
		 			// echo $content;
		 			// echo '</textarea>';

		 		}else{
		 			$fileFound=false;
		 			// echo 'file not found';
		 		}
		 		// echo '<pre>';
		 		// var_dump($paths);
		 		// echo '</pre>';


		 		// echo '<pre>';
		 		// var_dump($result);
		 		// die();
		 		require_once 'model/admin/webeditor/webeditor.php';
		 	break;
		 	case 'pages': 
		 	case 'getdirectory': 
		 		$result=check($pages);

		 		// echo '<pre>';
		 		// var_dump($result);
		 		// die();
		 		$directory=isset($result[3])?$result[3]:'.';
		 		$directory=$directory==''?'.':$directory;
		 		$dirs=explode('_rov_', $directory);

		 		$dir='';
		 		for($i=0,$c=count($dirs);$i<$c;$i++)
		 		{
		 			$dir.=$dirs[$i].'/';
		 		}
		 	 
		 		//echo $dir;
		 	 
		 		$dir=$this->getDirectory($dir); //display it in a view
		 		// echo $dir;
		 		require_once 'model/admin/pages/getdirectory.php';
		 	break;
		 	case 'setdefaulttemplate':

			 	$result=check($pages); 
			 	echo '<pre>';
			 	var_dump($result);
			 	echo '</pre>';
			 	$template=isset($result[3])?$result[3]: 0;

			 	$db->query('UPDATE app_templates SET set_default_site_template=true WHERE id=:qId', 
			 		true, 
			 		['qId'=>$template]);
			 	$db->query('UPDATE app_templates SET set_default_site_template=false WHERE id!=:qId', 
			 		true, 
			 		['qId'=>$template]);
			 	header('Location: '.ADMINROOT.'/templates/');
			 	die();
		 	break;
		 	case 'installtemplate':
		 		$result=check($pages);
		 		// echo '<pre>';
		 		// var_dump($result);
		 		$fileId=(int)(isset($result[3])?$result[3]:0);


		 		if($fileId)
		 		{
		 			$file=new AppFile($fileId);
		 			echo $file->getFullPath();

		 			if(file_exists($file->getFullPath()))
		 			{
		 				echo 'ok';
		 				$templateUrl=str_replace(' ', '_', $file->getAll('filetitle'));

		 				//creating template folder
		 				if(!file_exists('view/template/'.$templateUrl))
		 				{
		 					$this->createFile('Installing template, copyright cms franckycodes..', 'view/template/'.$templateUrl.'/readme.txt');
		 					//($str='',$filename = 'model/admin/templates/new.php'
		 				}else{
		 					echo 'error template already installed';
		 					die();
		 				}
		 				if($this->extractZip($file->getFullPath(), 'view/template/'.$templateUrl))
		 				{
		 					$query=insertQuery('app_templates'); 
		 					$db->query('INSERT INTO app_templates(file_id, template_url, date_creation) VALUES(:qFileId,:qTemplateUrl, NOW())',
		 						true, 
		 						['qFileId'=> $file->getAll('id'),
		 						 'qTemplateUrl'=> $templateUrl]);

		 					//you just installed a new template, congrats
		 					echo 'allrights';
		 					header('Location: '.ADMINROOT.'/templates/done/');
		 					die();
		 				}
		 			}else{
		 				echo 'error';
		 				header('Location: '.ADMINROOT.'/templates/error/');
		 				die();
		 			}

		 		}else{
		 			echo 'error';
		 		} 
		 	break;
		 	case 'templates':
		 		require_once 'model/admin/templates/all.php'; 
		 	break;
		 	case 'newtemplate': 
		 		require_once 'model/admin/templates/new.php'; 
		 	break; 
		 	/*
		 	case 'createpagefree':
		 		$result=check($_POST);

			 	 
			 	// exec('mkdir "model/test/"');
			 	// die();
			 	$file=$result['pagename'];
			 	if($file[0]=='/')
			 	{
			 		$file=substr($file, 1, strlen($file))
			 		//die();
			 	}
			 	echo $file.'<br><br>';

			 	if(file_exists($file))
			 	{ 
			 	}else{
			 		echo 'error';
			 		$this->createFile($result['content'], $file);
			 		

			 		echo 'file created';
			 	} 
			 	if(isset($result['ajax']))
			 	{
			 		echo 'ok';
			 	}else{
			 		header('Location: '.ADMINROOT.'/createpagesuccessfull/');
			 		die();
			 	}
		 	break;*/
		 	case 'createpage':
			 	$result=check($_POST);

			 	$defaultPath='model/admin/';
			 	// exec('mkdir "model/test/"');
			 	// die();
			 	$file=$defaultPath.$result['pagename'];
			 	$file2='view/admin/'.$result['pagename'];
			 	echo $file.'<br><br>';

			 	if(file_exists($file))
			 	{ 
			 	}else{
			 		echo 'error';
			 		$this->createFile($result['content'], $file);
			 		$this->createFile($result['content'], $file2);

			 		echo 'file created';
			 	} 
			 	if(isset($result['ajax']))
			 	{
			 		echo 'ok';
			 	}else{
			 		header('Location: '.ADMINROOT.'/createpagesuccessfull/');
			 		die();
			 	}
			 	// echo '<pre>';
			 	// var_dump($result);
			 	// echo '</pre>';
		 	break;
		 	case 'createpagesuccessfull':

		 	$pageCreated=true; 
		 	case 'newpage':
		 		//should exists from the start
		 		require_once 'model/app/createpage/createpage.php'; 
		 	break;
		 	
		 	case 'addgalleriestoarticle':
		 		echo '<pre>';
		 		var_dump($pages);
		 		echo '</pre>';
		 		$pages=check($pages);
		 		 
		 		$articleId=(int)(isset($pages[3])?$pages[3]:0);
		 		$gallerieId=(int)(isset($pages[4])?$pages[4]:0);

		 		$ajax=isset($pages[5])?$pages[5]:'';
		 		$ajax=$ajax=='ajax'?true:false;

		 		if($articleId && $gallerieId)
		 		{
		 			$check=$db->query('SELECT * FROM actu_galleries WHERE 
		 			article_id=:qId AND gallery_id=:qGalleryId', true,['qId'=> $articleId, 
		 			'qGalleryId'=>$gallerieId], true, true);

		 			if(gettype($check)!='boolean')
		 			{
		 				if($ajax){
							echo 'error, you already added this gallery to this article sorry, add a new gallery';
		 				}else{
		 					header('Location: '.ADMINROOT.'/articles');
		 					die();
		 				}
		 			}else{
			 			echo ('adding galleries to article');	
			 			$db->query('INSERT INTO actu_galleries (article_id, gallery_id, date_added) 
			 				VALUES(:articleId, :galleryId, NOW())',
			 				true, 
			 				['articleId'=>$articleId,
			 				'galleryId'=>$gallerieId]);

			 			if($ajax)
			 			{
			 				echo 'galleries added';
			 			}else{
			 				header('Location: '.ADMINROOT.'/articles/');
		 					die();
			 			}
		 			}
		 		}else{
		 			if($ajax)
			 		{ 
		 				echo 'error adding galleries to article';
		 			}else{
		 				header('Location: '.ADMINROOT.'/articles/');
		 				die();
		 			}
		 		}
		 	break;
		 	case 'getgalleries': 
			 	// echo '<pre>';
			 	// var_dump($pages);
			 	// echo '</pre>';
			 	// $ajax=isset($pages[4])
		 		$galleries=$db->query('SELECT * FROM app_galleries ORDER BY id DESC', false,[],true);
		 		echo '<div class="showGalleriesContainer">';
		 		foreach($galleries as $result)
		 		{

			 		echo '<div >';
			 		echo '<a id="galleryId_'.$result['id'].'" href="'.ADMINROOT.'/updategallery/'.$result['id'].'/">'.$result['gallery_title'].'</a>';
			 		echo '</div>';
		 		}
		 		echo '</div>';

		 	break;
		 	case 'inbox':

		 		require_once 'model/admin/inbox/inbox.php';
		 	break;
		 	case 'search':
		 		require_once 'model/admin/search/search.php';
		 	break;
		 	case 'articles':
		 		require_once 'model/admin/articles/articles.php';
		 	break;
		 	case 'files':

		 		require_once 'model/admin/files/files.php';
		 	break;
		 	case 'getimages':
		 	// echo '<pre>';
		 	// var_dump($pages);
		 	// echo '</pre>';
		 		if(isset($pages[3]) && $pages[3]=='ajax')
		 		{
		 			$images=$db->query('SELECT * FROM appupload WHERE filetype="image" ORDER BY id DESC', false,[],true);

		 			foreach($images as $result)
		 			{
		 				$imagePath=WEBROOT.'upload/datas/image/'.$result['filename'];

		 				echo '<img id="fileId'.$result['id'].'" src="'.$imagePath.'" alt="'.$result['filetitle'] .'">';
		 			}
		 			die();
		 		}else{
		 			//go home
		 			echo 'go home';
		 			die();
		 		}
		 	break;
		 	case 'saveupdatearticle':
		 		$query = insertQuery('actus');
        		echo $query;
		 		$result=check($_POST);
		 		// echo '<pre>';
		 		// var_dump($result);
		 		// echo '</pre>';
		 		$article=new AppArticle($result['actuId']);
		 		if(isset($result['title'])){
 
		 			$article->updateAll('titre_actu', $result['title']);
		 			$article->updateAll('description_actu', $result['description']);
		 			$article->updateAll('categorie', $result['category']);
		 			$article->updateAll('en_promo', ($result['promo']=='yes'?1:0));
		 			$article->updateAll('prix',(int) $result['price']);
		 			$article->updateAll('article_tags', $result['tags']);
		 			if(!isset($_POST['ajax'])){
				 		header('Location: '.ADMINROOT.'/articles');
				 		die();
			 		}else{
			 			echo 'ok';
			 			die();
			 		}
		 		}else{
			 		if(!isset($_POST['ajax'])){
				 		header('Location: '.ADMINROOT.'/newarticle/error/');
				 		die();
			 		}else{
			 			echo 'error updating article';
			 			die();
			 		}
		 		}
		 	break;
		 	case 'updatearticle':

		 		require_once 'model/admin/updatearticle/update.php';
		 	break;
		 	case 'saveactu':
		 	 	$query = insertQuery('actus');
        		echo $query;
		 		$result=check($_POST);
		 		// echo '<pre>';
		 		// var_dump($result);
		 		// echo '</pre>';

		 		if(isset($result['title'])){

		 			$db->query('INSERT INTO actus(titre_actu, description_actu, categorie, en_promo, prix, article_tags, date_publication) VALUES(:qTitre, :qDescription,:qCategorie, :qPromo, :qPrix,:qTags, NOW())', 
		 			true, 
		 			['qTitre'=>$result['title'],
		 			'qDescription'=>$result['description'],
		 			'qCategorie'=>$result['category'],
		 			'qPrix'=>(int) $result['price'],
		 			'qPromo'=>($result['promo']=='yes'?1:0),
		 			'qTags'=>$result['tags']
		 			]);
		 			if(!isset($_POST['ajax'])){
				 		header('Location: '.ADMINROOT.'/articles');
				 		die();
			 		}else{
			 			echo 'ok';
			 			die();
			 		}
		 		}else{
			 		if(!isset($_POST['ajax'])){
				 		header('Location: '.ADMINROOT.'/newarticle/error/');
				 		die();
			 		}else{
			 			echo 'error adding new article';
			 			die();
			 		}
		 		}

		 	break;
		 	case 'saveupload':
		 		$result=check($_POST);
		 		$result2=check($_FILES['file']);

		 		$isAjax=isset($result['ajax'])?true:false;
		 	 	// header('Content-Length: ' . $result2['size']);
		 	  
		 		echo '<pre>';
		 		var_dump($result);
		 		echo '</pre>';
		 		$result = check($_POST);
                $file   = check($_FILES['file']);

                echo '<pre>';
                var_dump($file);
                echo '</pre>';
                // $user      = new AppUser($_SESSION['userConnected']);
                $upload    = new AppUpload(0, $file, $result['filename'], $result['description'], 0);
                // $classroom = new AppPage($result['pageId']);

                // $user->setAll('has_upload_dir', 0);

                if(isset($result['app_template']))
                {
                	$_GET['template']=$result['app_template'];
                	echo 'app template : '.$_GET['template'];
                }

                    $upload->upload('upload/datas/');

                  
                // alertAdmin('user submited project', $result['pageId']);
                if($isAjax)
                {
                	echo 'ajax';
                }else{
	                // header('Location: ' . ADMINROOT . '/files/');
	                // die();
            	}
                
                // echo '<pre>';
                // var_dump($result);
                // echo '</pre>';
		 	break;
		 	case 'upload':
		 		require_once 'model/admin/upload/upload.php';
		 	break;
		 	case 'newarticle':
		 		require_once 'model/admin/ajoutactu/ajoutactu.php';
		 	break;
		 	case 'addfilegallery':
		 		$result=check($pages);

		 		// $query=insertQuery('app_galleries_files');

		 		// echo $query;
		 		// echo '<pre>';
		 		// var_dump($result);

		 		$fileId=(int)isset($result[4])?$result[4]:0;

		 		$galleryId=(int) isset($pages[3])?$pages[3]: 0;

		 		// echo $galleryId;

		 		$ajax=isset($result[5])?$result[5]:0;

		 		if($galleryId && $fileId)
		 		{

		 			$checkFile=$db->query('SELECT * FROM app_galleries_files WHERE file_id=:qId AND gallery_id=:qGallery',true, ['qId'=>$fileId,
		 			'qGallery'=> $galleryId],true,true);


		 			if(gettype($checkFile)=='boolean')
		 			{
		 				$db->query('INSERT INTO app_galleries_files(gallery_id,file_id,date_added) VALUES(:qGallery, :qFile, NOW())',true,['qGallery'=>$galleryId,
		 								'qFile'=>$fileId]);
			 			// echo 'adding image' . $fileId.' to gallery ';
			 			// echo $galleryId; 
			 			echo 'ok';
			 			die();
		 			}else{
		 				echo 'already added';
		 				die();
		 			}
		 			if(!$ajax)
		 			{
		 				header('Location: '.ADMINROOT.'/gallery/');
		 				die();
		 			}
		 		}
		 		if(!$ajax)
		 		{
		 			header('Location: '.ADMINROOT.'/gallery/');
		 			die();
		 		}

		 	break;
		 	case 'savenewgallery':
		 		$result=check($_POST);
		 		// echo '<pre>';
		 		// var_dump($result);
		 		// echo '</pre>';
		 		// $query=insertQuery('app_galleries');
		 		// echo $query;

		 		$db->query('INSERT INTO app_galleries(gallery_title, gallery_description, date_added) VALUES(:gTitle, :gDescription, NOW())',true,['gTitle'=> $result['title'], 
		 					 'gDescription'=>$result['description']]);

		 		if(isset($result['ajax']))
		 		{
		 			echo 'done';
		 		}else{
		 			// echo 'ok';
			 		header('Location: '.ADMINROOT.'/gallery');
			 		die();
		 		}
		 	break;
		 	case 'removefilefromgallery':
		 		$galleryId=isset($pages[3])?$pages[3]:0;
			 	$fileId=isset($pages[4])?$pages[4]:0;
			 	// echo $galleryId.'<br>'.$fileId.'<br>';
			 	// die();
			 	// echo $fileId;
		 		$ajax= isset($pages[5])?$pages[5]:0;
			 	$check=$db->query('SELECT * FROM app_galleries_files WHERE file_id=:qId AND gallery_id=:qGallery', true,
			 		['qId'=> (int)$fileId,
			 		'qGallery'=>(int)$galleryId]);


			 	if(gettype($check)!='boolean'){
			 		$db->query('DELETE FROM app_galleries_files WHERE file_id=:qId AND gallery_id=:qGallery',true,
			 	['qId'=>(int)$fileId,
			 	'qGallery'=>(int)$galleryId]);
			 		if($ajax=='ajax')
			 		{
			 			echo 'file removed from gallery';
			 		}else{
			 			header('Location: '.ADMINROOT.'/updategallery/'.$galleryId.'');
			 			die();
			 		}
			 	}else{
			 		if($ajax=='ajax')
			 		{
			 			echo 'error while removile file from gallery';
			 		}else{
			 			header('Location: '.ADMINROOT.'/updategallery/'.$galleryId.'');
			 			die();
			 		}
			 	}	
			 	// echo '<pre>';
			 	// var_dump($pages);
			 	die();
		 	break;
		 	case 'doc':
		 		require_once 'model/admin/doc/doc.php';
		 	break;
		 	case 'saveupdate':
		 		echo '<pre>';
		 		$result=check($_POST); 
		 		var_dump($result);
		 		echo '</pre>';
		 		
		 		$db->query('DELETE FROM app WHERE id>0'); //update
		 		 
		 		$db->query('INSERT INTO app (app_name,admin_key, date_created) VALUES(:qName, :qAdmin, NOW())', true, 
		 			['qName'=>$result['appName'],
		 			'qAdmin'=>$result['adminkey']]);
		 		 

		 		header('Location: '.ADMINROOT.'/update');
		 		die();
		 	break;
		 	case 'update':
		 		// require_once 'model/admin/updateapp/updateapp.php';
		 	    require_once 'model/admin/update/update.php';
		 	break;	
		 	case 'updategallery':

		 		require_once 'model/admin/updategallery/updategallery.php';
		 	break;
		 	case 'newgallery': 
		 		require_once 'model/admin/newgallery/newgallery.php'; 
		 	break; 
		 	case 'gallery':
		 		require_once 'model/admin/gallery/gallery.php';
		 	break;
		 	case 'logout':
		 		unset($_SESSION['adminLogged']); 
		 		unset($_SESSION['searchQuery']);
		 		unset($_SESSION['searchCategory']);
		 		
		 		header('Location: '.ADMINROOT.'/login/');
		 		die();
		 	break;
			default: 
				require_once 'model/admin/home/home.php';
			break;
		 }
	 }else {
	 	$page=isset($pages[URL_COUNTER+1])?$pages[URL_COUNTER+1]:'login';


		 switch($page)
		 {
		 	case 'newsession':
		 		$result=check($_POST);
		 		// echo '<pre>';
		 		// var_dump($result);
		 		// echo '</pre>'; 
		 		// exit();
		 		if($result['login']== ADMIN_LOGIN && $result['password']==ADMIN_PWD)
		 		{
		 			$_SESSION['adminLogged']=true;

		 			if(isset($result['ajax']))
		 			{
		 				echo 'ok';
		 				die();
		 			}else{
 
			 			header('Location: '.ADMINROOT.'/welcome/');
			 			die();
		 			}
		 		}else{ 
		 			if(isset($result['ajax']))
		 			{
		 				echo 'error';
		 			}else{
				 		header('Location: '.ADMINROOT.'/loginerror/');
				 		die();
			 		}
		 		} 
		 	break;
		 	case 'loginerror':

		 		$loginError=true;
		 	default:
				require_once 'model/admin/login/login.php';
		 	break;
		 }
	}
	}
}	