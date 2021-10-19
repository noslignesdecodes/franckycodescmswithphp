<?php 
use franckycodes\database\LightDb;
class AppUserFile
{
	private $m_db;
	private $m_id;
	
	public function __construct($id)
	{
		$this->m_db=new LightDb();
		$this->m_id=(int)$id;
	}
	
	public function __destruct()
	{
		
	}
	public function getTotalProjects()
	{
		return $this->m_db->query('SELECT COUNT(id) qTotal FROM apppagesprojects WHERE page_id=:qId',
			true,
			['qId'=>$this->getAll('id')],true,true)['qTotal'];
	}
	public function getAll($col)
	{
		$result=$this->m_db->query('SELECT * FROM appuserfileupload WHERE 
		id=:qId',true,
		['qId'=> $this->m_id],true,true);
		
		return isset($result[$col])?$result[$col]: 0;
	}
	public function findStudent($userId)
	{
		$result=$this->m_db->query('SELECT * FROM appuserfileupload WHERE user_id=:qUser AND page_id=:qPage',true,
			['qPage'=>$this->getAll('id'),
			'qUser'=>(int)$userId],true,true);

		return isset($result['id']);
	}
	public function getTotalStudents()
	{
		return (int) $this->m_db->query('SELECT COUNT(id) qTotal FROM apppagessubscribers WHERE 
		 page_id=:qPage',true,
			['qPage'=>$this->getAll('id')
		], true, true)['qTotal'];
	}
	public function setAll($col,$val)
	{
		$this->m_db->query('UPDATE appuserfileupload SET '.$col.'=:qVal WHERE id=:qId',
			true,
			['qId'=>$this->getAll('id'),
			 'qVal'=>$val]); 
	}
}