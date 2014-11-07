<?php
require_once (FRAMEWORK_PATH . "utils/MysqlDBHelper.php");
require_once (FRAMEWORK_PATH . "db/SQLUtil.php");
/**
 * database table GA_ServerLoginAchivement description
 * 
 * [This file was auto-generated. PLEASE DONT EDIT]
 * 
 * @author LiangZhixian
 * 
 */
class TbGAServerLoginAchivement {
	
	public static $_db_name = "pf_gamearea";
	
	private /*string*/ $ga_CheckTime; //PRIMARY KEY 
	private /*int*/ $ga_ServerID; //PRIMARY KEY 
	private /*int*/ $ga_AreaID;
	private /*int*/ $ga_GameID;
	private /*int*/ $ga_LoginSum;
	private /*int*/ $ga_LoginAccountSum;

	
	private $is_this_table_dirty = false;
	private $is_ga_CheckTime_dirty = false;
	private $is_ga_ServerID_dirty = false;
	private $is_ga_AreaID_dirty = false;
	private $is_ga_GameID_dirty = false;
	private $is_ga_LoginSum_dirty = false;
	private $is_ga_LoginAccountSum_dirty = false;


	/**
	 * @param array($condition)
	 * @return array(TbGAServerLoginAchivement)
	 */
	public static function /*array(TbGAServerLoginAchivement)*/ loadTable(/*array*/ $fields=NULL,/*array*/$condition=NULL)
	{
		$result = array();
		
		$f = "*";
		
		if(!empty($fields))
		{
			$f = SQLUtil::parseFields($fields);			
		}
		
		if (empty($condition))
		{
			$sql = "SELECT {$f} FROM `GA_ServerLoginAchivement`";
		}
		else
		{			
			$sql = "SELECT {$f} FROM `GA_ServerLoginAchivement` WHERE ".SQLUtil::parseCondition($condition);
		}			
		
		$ar = sql_fetch_rows_assoc(self::$_db_name,$sql);
		
		if (empty($ar) || count($ar) == 0)
		{
			return $result;
		}
		
		foreach($ar as $row)
		{
			$tb = new TbGAServerLoginAchivement();			
			if (isset($row['ga_CheckTime'])) $tb->ga_CheckTime = $row['ga_CheckTime'];
			if (isset($row['ga_ServerID'])) $tb->ga_ServerID = intval($row['ga_ServerID']);
			if (isset($row['ga_AreaID'])) $tb->ga_AreaID = intval($row['ga_AreaID']);
			if (isset($row['ga_GameID'])) $tb->ga_GameID = intval($row['ga_GameID']);
			if (isset($row['ga_LoginSum'])) $tb->ga_LoginSum = intval($row['ga_LoginSum']);
			if (isset($row['ga_LoginAccountSum'])) $tb->ga_LoginAccountSum = intval($row['ga_LoginAccountSum']);
		
			$result[] = $tb;
		}
		
		return $result;
	}	
	
	public static function insertSqlHeader(/*array*/ $fields=NULL)
	{
		$result = array();				
		if(!empty($fields)){
			$f = SQLUtil::parseFields($fields);			
			$result[0] = "INSERT INTO `GA_ServerLoginAchivement` ({$f}) VALUES ";	
			$ar = array();
			foreach($fields as $key){
				$ar[$key]=1;
			}
			$result[1] = $ar;
		}else{
			$result[0]="INSERT INTO `GA_ServerLoginAchivement` (`ga_CheckTime`,`ga_ServerID`,`ga_AreaID`,`ga_GameID`,`ga_LoginSum`,`ga_LoginAccountSum`) VALUES ";
			$result[1] = array('ga_CheckTime'=>1,'ga_ServerID'=>1,'ga_AreaID'=>1,'ga_GameID'=>1,'ga_LoginSum'=>1,'ga_LoginAccountSum'=>1);
		}				
		return $result;
	}
		
	public function /*boolean*/ load(/*array*/ $fields=NULL,/*array*/$condition=NULL)
	{
		//ERROR:no condition
		if (empty($condition) && !$this->is_set_keys())
		{
			return false;
		}
		
		$f = "*";
		$c = "`ga_CheckTime`='{$this->ga_CheckTime}' AND `ga_ServerID`='{$this->ga_ServerID}'";
		
		if(!empty($fields))
		{
			$f = SQLUtil::parseFields($fields);			
		}
	    if (!empty($condition))
		{
			$c =SQLUtil::parseCondition($condition);
		}
		
		$sql = "SELECT {$f} FROM `GA_ServerLoginAchivement` WHERE {$c} LIMIT 1";


		$ars = sql_fetch_rows_assoc(self::$_db_name,$sql);
		
		if (!$ars || count($ars)==0)
		{
			return false;
		}
		
		$ar = $ars[0];
		
		if (isset($ar['ga_CheckTime'])) $this->ga_CheckTime = $ar['ga_CheckTime'];
		if (isset($ar['ga_ServerID'])) $this->ga_ServerID = intval($ar['ga_ServerID']);
		if (isset($ar['ga_AreaID'])) $this->ga_AreaID = intval($ar['ga_AreaID']);
		if (isset($ar['ga_GameID'])) $this->ga_GameID = intval($ar['ga_GameID']);
		if (isset($ar['ga_LoginSum'])) $this->ga_LoginSum = intval($ar['ga_LoginSum']);
		if (isset($ar['ga_LoginAccountSum'])) $this->ga_LoginAccountSum = intval($ar['ga_LoginAccountSum']);
		
		
		$this->clean();
		
		return true;
	}
	
	public function /*boolean*/ loadFromExistFields()
	{
		$emptyCondition = true;
    	$emptyFields = true;
    	
    	$fields = array();
    	$condition = array();
    	
    	if (!isset($this->ga_CheckTime)){
    		$emptyFields = false;
    		$fields[] = 'ga_CheckTime';
    	}else{
    		$emptyCondition = false; 
    		$condition['ga_CheckTime']=$this->ga_CheckTime;
    	}
    	if (!isset($this->ga_ServerID)){
    		$emptyFields = false;
    		$fields[] = 'ga_ServerID';
    	}else{
    		$emptyCondition = false; 
    		$condition['ga_ServerID']=$this->ga_ServerID;
    	}
    	if (!isset($this->ga_AreaID)){
    		$emptyFields = false;
    		$fields[] = 'ga_AreaID';
    	}else{
    		$emptyCondition = false; 
    		$condition['ga_AreaID']=$this->ga_AreaID;
    	}
    	if (!isset($this->ga_GameID)){
    		$emptyFields = false;
    		$fields[] = 'ga_GameID';
    	}else{
    		$emptyCondition = false; 
    		$condition['ga_GameID']=$this->ga_GameID;
    	}
    	if (!isset($this->ga_LoginSum)){
    		$emptyFields = false;
    		$fields[] = 'ga_LoginSum';
    	}else{
    		$emptyCondition = false; 
    		$condition['ga_LoginSum']=$this->ga_LoginSum;
    	}
    	if (!isset($this->ga_LoginAccountSum)){
    		$emptyFields = false;
    		$fields[] = 'ga_LoginAccountSum';
    	}else{
    		$emptyCondition = false; 
    		$condition['ga_LoginAccountSum']=$this->ga_LoginAccountSum;
    	}

    	
		if ($emptyFields)
    	{
    		unset($fields);
    	}
    	
    	if ($emptyCondition)
    	{
    		unset($condition); 
    	}
    	
    	return $this->load($fields,$condition);    	
	}
	
	public function /*boolean*/ insertOrUpdate()
	{
		$sql = $this->getInsertSQL();
		if (empty($sql))
		{
			return false;
		}		
		$sql .= " ON DUPLICATE KEY UPDATE ";		
		$sql .= $this->getUpdateFields();		
		

		$qr = sql_query(self::$_db_name,$sql);
		if (!$qr)
		{
			return false;
		}
				

		
		$this->clean();
		
		return true;	
		
	}
	
	public function /*boolean*/ save(/*array*/$condition=NULL)
	{
		if (empty($condition))
		{
			$uc = "`ga_CheckTime`='{$this->ga_CheckTime}' AND `ga_ServerID`='{$this->ga_ServerID}'";
		}
		else
		{			
			$uc = SQLUtil::parseCondition($condition);
		}
		$sql = $this->getUpdateSQL($uc);
		
		if(empty($sql)){
			return true;
		}
		

		$qr = sql_query(self::$_db_name,$sql);
		
		$this->clean();
				
		return (boolean)$qr;
	}
	
	public static function s_delete(/*array*/$condition=NULL)
	{
		if (empty($condition))
		{
			return false;
		}
		
		$sql = "DELETE FROM `GA_ServerLoginAchivement` WHERE ".SQLUtil::parseCondition($condition);
		
		$qr = sql_query(self::$_db_name,$sql);
				
		return (boolean)$qr;
	}
	
	public function /*boolean*/ delete()
	{
		if (!$this->is_set_keys())
		{
			return false;
		}
		
		$sql = "DELETE FROM `GA_ServerLoginAchivement` WHERE `ga_CheckTime`='{$this->ga_CheckTime}' AND `ga_ServerID`='{$this->ga_ServerID}'";
		

		$qr = sql_query(self::$_db_name,$sql);
				
		return (boolean)$qr;
	}
	
	public function getInsertValue($fields)
	{
		$values = "(";		
		foreach($fields as $f => $k){
			if($f == 'ga_CheckTime'){
 				$values .= "'{$this->ga_CheckTime}',";
 			}else if($f == 'ga_ServerID'){
 				$values .= "'{$this->ga_ServerID}',";
 			}else if($f == 'ga_AreaID'){
 				$values .= "'{$this->ga_AreaID}',";
 			}else if($f == 'ga_GameID'){
 				$values .= "'{$this->ga_GameID}',";
 			}else if($f == 'ga_LoginSum'){
 				$values .= "'{$this->ga_LoginSum}',";
 			}else if($f == 'ga_LoginAccountSum'){
 				$values .= "'{$this->ga_LoginAccountSum}',";
 			}		
		}
		$values .= ")";
		
		return str_replace(",)",")",$values);		
	}
	
	private function /*string*/ getInsertSQL()
	{
		if (!$this->is_this_table_dirty)
		{
			return;
		}		
		
		$fields = "(";
		$values = " VALUES(";

		if (isset($this->ga_CheckTime))
		{
			$fields .= "`ga_CheckTime`,";
			$values .= "'{$this->ga_CheckTime}',";
		}
		if (isset($this->ga_ServerID))
		{
			$fields .= "`ga_ServerID`,";
			$values .= "'{$this->ga_ServerID}',";
		}
		if (isset($this->ga_AreaID))
		{
			$fields .= "`ga_AreaID`,";
			$values .= "'{$this->ga_AreaID}',";
		}
		if (isset($this->ga_GameID))
		{
			$fields .= "`ga_GameID`,";
			$values .= "'{$this->ga_GameID}',";
		}
		if (isset($this->ga_LoginSum))
		{
			$fields .= "`ga_LoginSum`,";
			$values .= "'{$this->ga_LoginSum}',";
		}
		if (isset($this->ga_LoginAccountSum))
		{
			$fields .= "`ga_LoginAccountSum`,";
			$values .= "'{$this->ga_LoginAccountSum}',";
		}

		
		$fields .= ")";
		$values .= ")";
		
		$sql = "INSERT INTO `GA_ServerLoginAchivement` ".$fields.$values;
		
		return str_replace(",)",")",$sql);
	}
	
	private function /*string*/ getUpdateFields()
	{
		$update = "";
		
		if ($this->is_ga_AreaID_dirty)
		{			
			if (!isset($this->ga_AreaID))
			{
				$update .= ("`ga_AreaID`=null,");
			}
			else
			{
				$update .= ("`ga_AreaID`='{$this->ga_AreaID}',");
			}
		}
		if ($this->is_ga_GameID_dirty)
		{			
			if (!isset($this->ga_GameID))
			{
				$update .= ("`ga_GameID`=null,");
			}
			else
			{
				$update .= ("`ga_GameID`='{$this->ga_GameID}',");
			}
		}
		if ($this->is_ga_LoginSum_dirty)
		{			
			if (!isset($this->ga_LoginSum))
			{
				$update .= ("`ga_LoginSum`=null,");
			}
			else
			{
				$update .= ("`ga_LoginSum`='{$this->ga_LoginSum}',");
			}
		}
		if ($this->is_ga_LoginAccountSum_dirty)
		{			
			if (!isset($this->ga_LoginAccountSum))
			{
				$update .= ("`ga_LoginAccountSum`=null,");
			}
			else
			{
				$update .= ("`ga_LoginAccountSum`='{$this->ga_LoginAccountSum}',");
			}
		}

			
		if (empty($update) || strlen($update) < 1)
		{
			return;
		}
		
		$i = strrpos($update,",");
		if (!is_bool($i))
		{
			$update = substr($update,0,$i);
		}		
		
		return $update;
	}
	
	private function /*string*/ getUpdateSQL($condition)
	{
		if (!$this->is_this_table_dirty)
		{
			return null;
		}
		
		$update = $this->getUpdateFields();
		
		if (empty($update))
		{
			return;
		}
		
		$sql = "UPDATE `GA_ServerLoginAchivement` SET {$update} WHERE {$condition}";
		
		return $sql;
	}
	
	public function /*boolean*/ add($fieldsValue,$condition=NULL)
	{				
		if (empty($condition))
		{
			$uc = "`ga_CheckTime`='{$this->ga_CheckTime}' AND `ga_ServerID`='{$this->ga_ServerID}'";
		}
		else
		{			
			$uc = SQLUtil::parseCondition($condition);
		}
		
		$update = SQLUtil::parseASFieldValues($fieldsValue);
		
		$sql = "UPDATE `GA_ServerLoginAchivement` SET {$update} WHERE {$uc}";
		
		$qr = sql_query(self::$_db_name,$sql);
				
		return (boolean)$qr;
	}	
	
	public function /*boolean*/ sub($fieldsValue,$condition=NULL)
	{
		if (empty($condition))
		{
			$uc = "`ga_CheckTime`='{$this->ga_CheckTime}' AND `ga_ServerID`='{$this->ga_ServerID}'";
		}
		else
		{			
			$uc = SQLUtil::parseCondition($condition);
		}
		
		$update = SQLUtil::parseASFieldValues($fieldsValue,false);
		
		$sql = "UPDATE `GA_ServerLoginAchivement` SET {$update} WHERE {$uc}";
		
		$qr = sql_query(self::$_db_name,$sql);
				
		return (boolean)$qr;
	}
	
	/**
	 * 是否已经设置主键的值
	 */
	public function is_set_keys()
	{
		
		return (isset($this->ga_CheckTime) && isset($this->ga_ServerID));

	}
	
	private function /*void*/ clean() 
	{
		$this->is_this_table_dirty = false;
		$this->is_ga_CheckTime_dirty = false;
		$this->is_ga_ServerID_dirty = false;
		$this->is_ga_AreaID_dirty = false;
		$this->is_ga_GameID_dirty = false;
		$this->is_ga_LoginSum_dirty = false;
		$this->is_ga_LoginAccountSum_dirty = false;

	}
	
	public function /*string*/ getGaCheckTime()
	{
		return $this->ga_CheckTime;
	}
	
	public function /*void*/ setGaCheckTime(/*string*/ $ga_CheckTime)
	{
		$this->ga_CheckTime = SQLUtil::toSafeSQLString($ga_CheckTime);
		$this->is_ga_CheckTime_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setGaCheckTimeNull()
	{
		$this->ga_CheckTime = null;
		$this->is_ga_CheckTime_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*int*/ getGaServerID()
	{
		return $this->ga_ServerID;
	}
	
	public function /*void*/ setGaServerID(/*int*/ $ga_ServerID)
	{
		$this->ga_ServerID = intval($ga_ServerID);
		$this->is_ga_ServerID_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setGaServerIDNull()
	{
		$this->ga_ServerID = null;
		$this->is_ga_ServerID_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*int*/ getGaAreaID()
	{
		return $this->ga_AreaID;
	}
	
	public function /*void*/ setGaAreaID(/*int*/ $ga_AreaID)
	{
		$this->ga_AreaID = intval($ga_AreaID);
		$this->is_ga_AreaID_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setGaAreaIDNull()
	{
		$this->ga_AreaID = null;
		$this->is_ga_AreaID_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*int*/ getGaGameID()
	{
		return $this->ga_GameID;
	}
	
	public function /*void*/ setGaGameID(/*int*/ $ga_GameID)
	{
		$this->ga_GameID = intval($ga_GameID);
		$this->is_ga_GameID_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setGaGameIDNull()
	{
		$this->ga_GameID = null;
		$this->is_ga_GameID_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*int*/ getGaLoginSum()
	{
		return $this->ga_LoginSum;
	}
	
	public function /*void*/ setGaLoginSum(/*int*/ $ga_LoginSum)
	{
		$this->ga_LoginSum = intval($ga_LoginSum);
		$this->is_ga_LoginSum_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setGaLoginSumNull()
	{
		$this->ga_LoginSum = null;
		$this->is_ga_LoginSum_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*int*/ getGaLoginAccountSum()
	{
		return $this->ga_LoginAccountSum;
	}
	
	public function /*void*/ setGaLoginAccountSum(/*int*/ $ga_LoginAccountSum)
	{
		$this->ga_LoginAccountSum = intval($ga_LoginAccountSum);
		$this->is_ga_LoginAccountSum_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setGaLoginAccountSumNull()
	{
		$this->ga_LoginAccountSum = null;
		$this->is_ga_LoginAccountSum_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	
	public function /*string*/ toDebugString()
	{
		$dbg = "(";
		
		$dbg .= ("ga_CheckTime={$this->ga_CheckTime},");
		$dbg .= ("ga_ServerID={$this->ga_ServerID},");
		$dbg .= ("ga_AreaID={$this->ga_AreaID},");
		$dbg .= ("ga_GameID={$this->ga_GameID},");
		$dbg .= ("ga_LoginSum={$this->ga_LoginSum},");
		$dbg .= ("ga_LoginAccountSum={$this->ga_LoginAccountSum},");

		$dbg .= ")";
				
		return str_replace(",)",")",$dbg);
	}
	
	public function fromArray($arr)
	{
		if (isset($arr['ga_CheckTime'])) $this->setGaCheckTime($arr['ga_CheckTime']);
		if (isset($arr['ga_ServerID'])) $this->setGaServerID($arr['ga_ServerID']);
		if (isset($arr['ga_AreaID'])) $this->setGaAreaID($arr['ga_AreaID']);
		if (isset($arr['ga_GameID'])) $this->setGaGameID($arr['ga_GameID']);
		if (isset($arr['ga_LoginSum'])) $this->setGaLoginSum($arr['ga_LoginSum']);
		if (isset($arr['ga_LoginAccountSum'])) $this->setGaLoginAccountSum($arr['ga_LoginAccountSum']);
		
	}
	
	public function toArray()
	{
		$ret = array();
		$ret['ga_CheckTime'] = $this->ga_CheckTime;
		$ret['ga_ServerID'] = $this->ga_ServerID;
		$ret['ga_AreaID'] = $this->ga_AreaID;
		$ret['ga_GameID'] = $this->ga_GameID;
		$ret['ga_LoginSum'] = $this->ga_LoginSum;
		$ret['ga_LoginAccountSum'] = $this->ga_LoginAccountSum;

		return $ret;
	}
}

?>
