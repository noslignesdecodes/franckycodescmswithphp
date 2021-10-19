<?php 
use franckycodes\database\LightDb;
class AppUser
{
	private $m_db;
	private $m_id;
	
	public function AppUser(int $id)
	{
		$this->m_db=new LightDb();
		$this->m_id=(int) $id;
	}

	public function __destruct()
	{
		
	}
	public function getTotalMoneyAdded()
	{
		$totalMoneyAdded=(int)$this->m_db->query('SELECT SUM(money_amount) qMoney FROM appusermoneyoperation WHERE user_id=:qId AND money_type="added"',
			    true,
			    ['qId'=> $this->getAll('id')],true,true)['qMoney'] ;
		return $totalMoneyAdded;
	}
	public function getMoney()
	{
		$totalMoneyAdded=(int)$this->m_db->query('SELECT SUM(money_amount) qMoney FROM appusermoneyoperation WHERE user_id=:qId AND money_type="added"',
	    true,
	    ['qId'=> $this->getAll('id')],true,true)['qMoney'] ;
	    $totalMoneyUsed=(int)$this->m_db->query('SELECT SUM(money_amount) qMoney FROM appusermoneyoperation WHERE user_id=:qId AND money_type="used"',
	    true,
	    ['qId'=> $this->getAll('id')],true,true)['qMoney'] ;

	   $result= (int)($totalMoneyAdded-$totalMoneyUsed); 

	   $result=$result<=0?0:$result;
	   return $result;
	}
	public function subtractMoney($toSubtract)
	{
		//subtract money
		$this->m_db->query('INSERT INTO appusermoneyoperation(user_id,money_amount,
		 				money_type,
		 				date_requested) 
		 				VALUES(:pUser,:pAmount,
		 				:pType, NOW())',
		 				true,
		 				['pUser'=>$this->getAll('id'),
		 				'pAmount'=>$toSubtract,
		 				'pType'=>'used']);
	}
	//get total points
	public function getTotalPoints($classroom=0)
	{
		return (int)$this->m_db->query('SELECT total_points FROM apppagessubscribers WHERE user_id=:qUser AND page_id=:qPage',
			true,
			['qPage'=>$classroom,
			'qUser'=>$this->getAll('id')
			],true,true)['total_points'];
	}
	//where user subscribed
	public function getTotalClassrooms()
	{
		return (int) $this->m_db->query('SELECT COUNT(id) qTotal FROM apppagessubscribers WHERE 
			user_id=:qId', true,
			['qId'=>$this->getAll('id')],true,true)['qTotal'];
	}
	public function getName()
	{
		return $this->getAll('user_lastname').' '.$this->getAll('user_firstname');
	}
	public function getAll($col)
	{
		$result=$this->m_db->query('SELECT * FROM appuser WHERE 
		id=:qId',true,
		['qId'=> $this->m_id],true,true);
		
		return isset($result[$col])?$result[$col]: 0;
	}
	public function getTotalNotifications()
	{
		return (int) $this->m_db->query('SELECT COUNT(id) qTotal FROM appusernotifications 
			WHERE user_id=:qId',true,
			['qId'=>$this->getAll('id')],true,true)['qTotal'];
	}
	public function setAll($col,$val)
	{
		$this->m_db->query('UPDATE appuser SET '.$col.'=:qVal WHERE id=:qId',
			true,
			['qId'=>$this->getAll('id'),
			 'qVal'=>$val]); 
	}
	//total submited projects
	public function getTotalSubmitedProjects($projectId=0)
	{
		return (int)$this->m_db->query('SELECT COUNT(f.id) qTotal FROM appuserfileupload f INNER JOIN 
		apppagesprojects p
		 WHERE
		 (f.user_id=:qUser AND f.projectid=p.id)  AND p.page_id=:qPage ',
			true,
			['qUser'=>$this->getAll('id'),
			'qPage'=>$projectId],true,true)['qTotal'];
	}
	public function submitedAnswer($projectId)
	{
		$result=$this->m_db->query('SELECT * FROM appuserfileupload WHERE projectid=:qProject AND user_id=:qUser',
			true,
			['qUser'=>$this->getAll('id'),
			'qProject'=>(int)$projectId],true,true);
		return isset($result['id'])?$result['id']:0;
	}
}