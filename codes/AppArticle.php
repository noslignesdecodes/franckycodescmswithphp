<?php 
use franckycodes\database\LightDb;
class AppArticle
{
	private $m_db;
	private $m_id;
	
	public function __construct(int $id)
	{
		$this->m_db=new LightDb();
		$this->m_id=(int) $id;
		$this->checkUrl();
	}

	public function __destruct()
	{
		
	}
	 
    public function checkUrl()
    {

		
    	$url=str_replace(' ', '_', strtolower($this->getAll('titre_actu')));

    	$check=$this->m_db->query('SELECT * FROM actus WHERE article_url=:qUrl AND id!=:qId',true, ['qId'=>$this->getAll('id'),
    						 'qUrl'=>$url],true,true);

    	if(gettype($check)=='boolean'){
    		//empty url
    		$this->setAll('article_url',$url);	
    	}else{
    		//update
    		$this->setAll('article_url',$url.'_'.date('Y'));
    	}

    	 
    }
	public function getAll($col)
	{
		$result=$this->m_db->query('SELECT * FROM actus WHERE 
		id=:qId',true,
		['qId'=> $this->m_id],true,true);
		
		return isset($result[$col])?$result[$col]: 0;
	}
	 
	public function setAll($col,$val)
	{
		$this->m_db->query('UPDATE actus SET '.$col.'=:qVal WHERE id=:qId',
			true,
			['qId'=>$this->getAll('id'),
			 'qVal'=>$val]); 
	}

	public function updateAll($col,$val)
	{
		$this->m_db->query('UPDATE actus SET '.$col.'=:qVal WHERE id=:qId',
			true,
			['qId'=>$this->getAll('id'),
			 'qVal'=>$val]); 
	}
	public function hasGallery()
	{
		$check=$this->m_db->query('SELECT * FROM actu_galleries WHERE article_id=:qId',true,['qId'=>$this->getAll('id')],true,true);

		return gettype($check)!='boolean'?$check['id']:0;
	}
	public function getTotalGallery()
	{
		return $this->m_db->query('SELECT COUNT(id) qTotal FROM actu_galleries WHERE article_id=:qId ORDER BY id DESC ', true, 
		['qId'=>$this->getAll('id')],true,true)['qTotal']; 
	}
	public function getGalleries()
	{
		$galleries=$this->m_db->query('SELECT * FROM actu_galleries WHERE article_id=:qId ORDER BY id DESC ', true, 
		['qId'=>$this->getAll('id')],true ); 
		return $galleries;
	} 
	//displaying article, useful on homepage
	public function showArticle()
	{
		if($this->getTotalGallery())
		{
			$this->viewLastGallery();
		}else{
			echo '<div class="">';
                   
            echo htmlspecialchars_decode($this->getAll('description_actu'));
                
            echo '</div>';
		}
	}
	public function viewLastGallery()
	{
		$galleries=$this->getGalleries();
	 
		foreach($galleries as $result)
		{
			$gallery=new AppGallery($result['gallery_id']);
			$files=$gallery->getFiles()[0];
			$file=new AppFile($files['file_id']);

			echo '<img src="'.WEBROOT.$file->getFullPath().'">';
			//$gallery->showFiles();
			// echo '<div>';
			// var_dump($files);
			// echo '</div>';
			break;
			// echo 'gallery'
		}
	}
	//admin like
	public function showGalleries()
	{
		$galleries=$this->getGalleries();
		foreach($galleries as $result)
		{
			$gallery=new AppGallery($result['gallery_id']);
			
			$gallery->showFiles();
			// echo 'gallery'
		}
	}
}