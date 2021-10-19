<?php 
use franckycodes\database\LightDb;
class User
{
	private $m_db;
	private $m_id;
	
	public function __construct($id)
	{
		$this->m_db=new LightDb();
		$this->m_id=(int) $id;
		//echo 'debug';
	}

	public function __destruct()
	{
		
	}
  
	 
	public function getName()
	{
		return $this->getAll('nom').' '.$this->getAll('prenoms');
	}

	//getting user information
	public function getAll($col)
	{
		$result=$this->m_db->query('SELECT * FROM utilisateurs WHERE 
		id=:qId',true,
		['qId'=> $this->m_id],true,true);
		
		return isset($result[$col])?$result[$col]: 0;
	}

	//user notifications
	public function getTotalNotifications()
	{
		return (int) $this->m_db->query('SELECT COUNT(id) qTotal FROM appusernotifications 
			WHERE user_id=:qId',true,
			['qId'=>$this->getAll('id')],true,true)['qTotal'];
	}

	//update user
	public function setAll($col,$val)
	{
		$this->m_db->query('UPDATE utilisateurs SET '.$col.'=:qVal WHERE id=:qId',
			true,
			['qId'=>$this->getAll('id'),
			 'qVal'=>$val]); 
	}
	 
}