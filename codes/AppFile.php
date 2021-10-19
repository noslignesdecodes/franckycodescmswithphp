<?php 
use franckycodes\database\LightDb;
class AppFile
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
		$result=$this->m_db->query('SELECT * FROM appupload WHERE 
		id=:qId',true,
		['qId'=> $this->m_id],true,true);
		
		return isset($result[$col])?$result[$col]: 0;
	}
	public function getFullPath()
	{
	
		switch($this->getAll('filetype'))
		{

			case 'image':
				$folder='image';
			break;
			case 'video':

				$folder='video';
			break;
			case 'audio':
				$folder='audio';
			break;
			default:
				$folder='source';
			break;
		}
		return 'upload/datas/'.$folder.'/'.$this->getAll('filename'); 
	}

	public function setAll($col,$val)
	{
		$this->m_db->query('UPDATE appupload SET '.$col.'=:qVal WHERE id=:qId',
			true,
			['qId'=>$this->getAll('id'),
			 'qVal'=>$val]); 
	}
	 
}