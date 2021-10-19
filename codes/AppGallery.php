<?php 
use franckycodes\database\LightDb;
class AppGallery
{
	private $m_db;
	private $m_id;
	
	public function __construct(int $id)
	{
		$this->m_db=new LightDb();
		$this->m_id=(int) $id;
	}

	public function __destruct()
	{
		
	}
	 
   
	public function getAll($col)
	{
		$result=$this->m_db->query('SELECT * FROM app_galleries WHERE 
		id=:qId',true,
		['qId'=> $this->m_id],true,true);
		
		return isset($result[$col])?$result[$col]: 0;
	}
	 
	public function setAll($col,$val)
	{
		$this->m_db->query('UPDATE app_galleries SET '.$col.'=:qVal WHERE id=:qId',
			true,
			['qId'=>$this->getAll('id'),
			 'qVal'=>$val]); 
	}
	public function showFiles()
	{
		$files=$this->getFiles();
		$gallery=new AppGallery($this->getAll('id'));
		
		include ('view/admin/gallery/viewgallery.php');

	}
	public function getFiles()
	{
		$db=new LightDb();
		return $db->query('SELECT * FROM app_galleries_files WHERE gallery_id=:qId ORDER BY id DESC', true,['qId'=>$this->getAll('id')],true);
	}
	 
}