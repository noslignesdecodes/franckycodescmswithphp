<?php 
use franckycodes\database\LightDb;

function check($forms)
{
// echo count($forms);
$result=[];
$i=0;
foreach($forms as $key=>$val)
{
	//$result[$i]=htmlspecialchars($forms[$i]);
	//echo $key.' => '.$val;
	if(!is_array($val))
	$result[$key]=htmlspecialchars($val);
}

return $result;
}
function checkInt($forms)
{

}

function createTable($tableName,$columns)
{


$cols='';
//(
//id int auto_increment primary key,
//)
for($i=0,$c=count($columns)-1;$i<$c;$i++)
{
	
 
    $cols.=$columns[$i].', ';
 
}
$cols.=$columns[count($columns)-1];
$query='CREATE TABLE '.$tableName.' ('.$cols.');';

return $query;  
}
//insert cols 
function insertQuery($tableName,$isPrepared=false)
{

$query='INSERT INTO '.$tableName.' ';
$cols=getTableCols($tableName);
$cols2=getTableCols($tableName,true);

$query.='('.$cols.') VALUES ('.$cols2.')';

return $query;
}
//return all columns title of a given table in database expect the id
function getTableCols($tableName,$isPrepared=false)
{
	$db=new LightDb();
	$describe=$db->query('DESCRIBE '.$tableName,false,[],true);
	$fields=[];
	$i=0;
	foreach($describe as $p)
	{
		//echo $p['Field'].'<br>';
		//if($i>0) //no need of id
		if($isPrepared)
		{
			$fields[$i]=':p'.$p['Field'];
		}else{
			$fields[$i]=$p['Field']; 
		}
		$i++;
	}
    $allFields='';

	for($i=1,$c=count($fields)-1;$i<$c;$i++)
	{
		$allFields.=$fields[$i].', ';
	}
	$allFields.=$fields[count($fields)-1];
	return $allFields;  //return all cols name of the given table
}
//update query
function updateQuery($tableName,$isPrepared=false)
{
	$db=new LightDb();
	$describe=$db->query('DESCRIBE '.$tableName,false,[],true);
	$fields=[];
	$i=0;
	$allFields='';
	foreach($describe as $p)
	{
		//echo $p['Field'].'<br>';
		//if($i>0) //no need of id
		// if($isPrepared)
		// {
		// 	$fields[$i]=':p'.$p['Field'];
		// }else{
		// 	$fields[$i]=$p['Field']; 
		// }
		$fields[$i]=$p['Field']; 
		//$allFields.=$p['Field'].'=:p'.$p['Field'].', ';
		$i++;
	}
    

	for($i=1,$c=count($fields)-1;$i<$c;$i++)
	{
		$allFields.=$fields[$i].'=:p'.$fields[$i].', ';
	}
	$allFields.=$fields[count($fields)-1].'=:p'.$fields[count($fields)-1];
	return $allFields;  //return all cols name of the given table
}
//return date 
function toDate($arr)
{
	return $arr[2].'-'.$arr[1].'-'.$arr[0];
}