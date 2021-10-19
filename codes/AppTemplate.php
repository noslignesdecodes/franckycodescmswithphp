<?php 
use franckycodes\database\LightDb;
class AppTemplate
{
	private $m_db;
	private $m_id;
	
	public function __construct(int $id)
	{
		$this->m_db=new LightDb();
		$this->m_id=(int) $id;
		$this->check();
	}

	public function __destruct()
	{
		
	}
	public function check()
	{
		if($this->isMissing())
		{
			$this->remove();
		}
	}
	public function remove()
	{
		$this->m_db->query('DELETE FROM app_templates WHERE id=:qId',
			true,
			['qId'=>$this->getAll('id')]);
	}
   	public function isMissing()
   	{
   		if(is_dir('view/template/'.$this->getAll('template_url')))
   		{
   			return false;
   		}
   		return true;
   	}
	public function getAll($col)
	{
		$result=$this->m_db->query('SELECT * FROM app_templates WHERE 
		id=:qId',true,
		['qId'=> $this->m_id],true,true);
		
		return isset($result[$col])?$result[$col]: 0;
	}
	public function getFullPath()
	{
	 
		return 'view/template/'.$this->getAll('template_url').'/';
	}
	public function isDefault()
	{
		return $this->getAll('set_default_site_template');
	}
	public function setAll($col,$val)
	{
		$this->m_db->query('UPDATE app_templates SET '.$col.'=:qVal WHERE id=:qId',
			true,
			['qId'=>$this->getAll('id'),
			 'qVal'=>$val]); 
	}
	 
}