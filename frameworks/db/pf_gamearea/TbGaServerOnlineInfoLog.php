<?php
require_once (FRAMEWORK_PATH . "utils/MysqlDBHelper.php");
require_once (FRAMEWORK_PATH . "db/SQLUtil.php");
/**
 * database table Ga_ServerOnlineInfoLog description
 * 
 * [This file was auto-generated. PLEASE DONT EDIT]
 * 
 * @author LiangZhixian
 * 
 */
class TbGaServerOnlineInfoLog {
	
	public static $_db_name = "pf_gamearea";
	
	private /*string*/ $ga_LogIndex; //PRIMARY KEY 
	private /*int*/ $ga_ServerID;
	private /*int*/ $ga_OnlineNum;
	private /*string*/ $ga_OnlineRefreshTime;

	
	private $is_this_table_dirty = false;
	private $is_ga_LogIndex_dirty = false;
	private $is_ga_ServerID_dirty = false;
	private $is_ga_OnlineNum_dirty = false;
	private $is_ga_OnlineRefreshTime_dirty = false;


	/**
	 * @param array($condition)
	 * @return array(TbGaServerOnlineInfoLog)
	 */
	public static function /*array(TbGaServerOnlineInfoLog)*/ loadTable(/*array*/ $fields=NULL,/*array*/$condition=NULL)
	{
		$result = array();
		
		$f = "*";
		
		if(!empty($fields))
		{
			$f = SQLUtil::parseFields($fields);			
		}
		
		if (empty($condition))
		{
			$sql = "SELECT {$f} FROM `Ga_ServerOnlineInfoLog`";
		}
		else
		{			
			$sql = "SELECT {$f} FROM `Ga_ServerOnlineInfoLog` WHERE ".SQLUtil::parseCondition($condition);
		}			
		
		$ar = sql_fetch_rows_assoc(self::$_db_name,$sql);
		
		if (empty($ar) || count($ar) == 0)
		{
			return $result;
		}
		
		foreach($ar as $row)
		{
			$tb = new TbGaServerOnlineInfoLog();			
			if (isset($row['ga_LogIndex'])) $tb->ga_LogIndex = $row['ga_LogIndex'];
			if (isset($row['ga_ServerID'])) $tb->ga_ServerID = intval($row['ga_ServerID']);
			if (isset($row['ga_OnlineNum'])) $tb->ga_OnlineNum = intval($row['ga_OnlineNum']);
			if (isset($row['ga_OnlineRefreshTime'])) $tb->ga_OnlineRefreshTime = $row['ga_OnlineRefreshTime'];
		
			$result[] = $tb;
		}
		
		return $result;
	}	
	
	public static function insertSqlHeader(/*array*/ $fields=NULL)
	{
		$result = array();				
		if(!empty($fields)){
			$f = SQLUtil::parseFields($fields);			
			$result[0] = "INSERT INTO `Ga_ServerOnlineInfoLog` ({$f}) VALUES ";	
			$ar = array();
			foreach($fields as $key){
				$ar[$key]=1;
			}
			$result[1] = $ar;
		}else{
			$result[0]="INSERT INTO `Ga_ServerOnlineInfoLog` (`ga_LogIndex`,`ga_ServerID`,`ga_OnlineNum`,`ga_OnlineRefreshTime`) VALUES ";
			$result[1] = array('ga_LogIndex'=>1,'ga_ServerID'=>1,'ga_OnlineNum'=>1,'ga_OnlineRefreshTime'=>1);
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
		$c = "`ga_LogIndex`='{$this->ga_LogIndex}'";
		
		if(!empty($fields))
		{
			$f = SQLUtil::parseFields($fields);			
		}
	    if (!empty($condition))
		{
			$c =SQLUtil::parseCondition($condition);
		}
		
		$sql = "SELECT {$f} FROM `Ga_ServerOnlineInfoLog` WHERE {$c} LIMIT 1";


		$ars = sql_fetch_rows_assoc(self::$_db_name,$sql);
		
		if (!$ars || count($ars)==0)
		{
			return false;
		}
		
		$ar = $ars[0];
		
		if (isset($ar['ga_LogIndex'])) $this->ga_LogIndex = $ar['ga_LogIndex'];
		if (isset($ar['ga_ServerID'])) $this->ga_ServerID = intval($ar['ga_ServerID']);
		if (isset($ar['ga_OnlineNum'])) $this->ga_OnlineNum = intval($ar['ga_OnlineNum']);
		if (isset($ar['ga_OnlineRefreshTime'])) $this->ga_OnlineRefreshTime = $ar['ga_OnlineRefreshTime'];
		
		
		$this->clean();
		
		return true;
	}
	
	public function /*boolean*/ loadFromExistFields()
	{
		$emptyCondition = true;
    	$emptyFields = true;
    	
    	$fields = array();
    	$condition = array();
    	
    	if (!isset($this->ga_LogIndex)){
    		$emptyFields = false;
    		$fields[] = 'ga_LogIndex';
    	}else{
    		$emptyCondition = false; 
    		$condition['ga_LogIndex']=$this->ga_LogIndex;
    	}
    	if (!isset($this->ga_ServerID)){
    		$emptyFields = false;
    		$fields[] = 'ga_ServerID';
    	}else{
    		$emptyCondition = false; 
    		$condition['ga_ServerID']=$this->ga_ServerID;
    	}
    	if (!isset($this->ga_OnlineNum)){
    		$emptyFields = false;
    		$fields[] = 'ga_OnlineNum';
    	}else{
    		$emptyCondition = false; 
    		$condition['ga_OnlineNum']=$this->ga_OnlineNum;
    	}
    	if (!isset($this->ga_OnlineRefreshTime)){
    		$emptyFields = false;
    		$fields[] = 'ga_OnlineRefreshTime';
    	}else{
    		$emptyCondition = false; 
    		$condition['ga_OnlineRefreshTime']=$this->ga_OnlineRefreshTime;
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
				
		if (!isset($this->ga_LogIndex)) $this->ga_LogIndex = get_mysql_insert_id(self::$_db_name);

		
		$this->clean();
		
		return true;	
		
	}
	
	public function /*boolean*/ save(/*array*/$condition=NULL)
	{
		if (empty($condition))
		{
			$uc = "`ga_LogIndex`='{$this->ga_LogIndex}'";
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
		
		$sql = "DELETE FROM `Ga_ServerOnlineInfoLog` WHERE ".SQLUtil::parseCondition($condition);
		
		$qr = sql_query(self::$_db_name,$sql);
				
		return (boolean)$qr;
	}
	
	public function /*boolean*/ delete()
	{
		if (!$this->is_set_keys())
		{
			return false;
		}
		
		$sql = "DELETE FROM `Ga_ServerOnlineInfoLog` WHERE `ga_LogIndex`='{$this->ga_LogIndex}'";
		

		$qr = sql_query(self::$_db_name,$sql);
				
		return (boolean)$qr;
	}
	
	public function getInsertValue($fields)
	{
		$values = "(";		
		foreach($fields as $f => $k){
			if($f == 'ga_LogIndex'){
 				$values .= "'{$this->ga_LogIndex}',";
 			}else if($f == 'ga_ServerID'){
 				$values .= "'{$this->ga_ServerID}',";
 			}else if($f == 'ga_OnlineNum'){
 				$values .= "'{$this->ga_OnlineNum}',";
 			}else if($f == 'ga_OnlineRefreshTime'){
 				$values .= "'{$this->ga_OnlineRefreshTime}',";
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

		if (isset($this->ga_LogIndex))
		{
			$fields .= "`ga_LogIndex`,";
			$values .= "'{$this->ga_LogIndex}',";
		}
		if (isset($this->ga_ServerID))
		{
			$fields .= "`ga_ServerID`,";
			$values .= "'{$this->ga_ServerID}',";
		}
		if (isset($this->ga_OnlineNum))
		{
			$fields .= "`ga_OnlineNum`,";
			$values .= "'{$this->ga_OnlineNum}',";
		}
		if (isset($this->ga_OnlineRefreshTime))
		{
			$fields .= "`ga_OnlineRefreshTime`,";
			$values .= "'{$this->ga_OnlineRefreshTime}',";
		}

		
		$fields .= ")";
		$values .= ")";
		
		$sql = "INSERT INTO `Ga_ServerOnlineInfoLog` ".$fields.$values;
		
		return str_replace(",)",")",$sql);
	}
	
	private function /*string*/ getUpdateFields()
	{
		$update = "";
		
		if ($this->is_ga_ServerID_dirty)
		{			
			if (!isset($this->ga_ServerID))
			{
				$update .= ("`ga_ServerID`=null,");
			}
			else
			{
				$update .= ("`ga_ServerID`='{$this->ga_ServerID}',");
			}
		}
		if ($this->is_ga_OnlineNum_dirty)
		{			
			if (!isset($this->ga_OnlineNum))
			{
				$update .= ("`ga_OnlineNum`=null,");
			}
			else
			{
				$update .= ("`ga_OnlineNum`='{$this->ga_OnlineNum}',");
			}
		}
		if ($this->is_ga_OnlineRefreshTime_dirty)
		{			
			if (!isset($this->ga_OnlineRefreshTime))
			{
				$update .= ("`ga_OnlineRefreshTime`=null,");
			}
			else
			{
				$update .= ("`ga_OnlineRefreshTime`='{$this->ga_OnlineRefreshTime}',");
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
		
		$sql = "UPDATE `Ga_ServerOnlineInfoLog` SET {$update} WHERE {$condition}";
		
		return $sql;
	}
	
	public function /*boolean*/ add($fieldsValue,$condition=NULL)
	{				
		if (empty($condition))
		{
			$uc = "`ga_LogIndex`='{$this->ga_LogIndex}'";
		}
		else
		{			
			$uc = SQLUtil::parseCondition($condition);
		}
		
		$update = SQLUtil::parseASFieldValues($fieldsValue);
		
		$sql = "UPDATE `Ga_ServerOnlineInfoLog` SET {$update} WHERE {$uc}";
		
		$qr = sql_query(self::$_db_name,$sql);
				
		return (boolean)$qr;
	}	
	
	public function /*boolean*/ sub($fieldsValue,$condition=NULL)
	{
		if (empty($condition))
		{
			$uc = "`ga_LogIndex`='{$this->ga_LogIndex}'";
		}
		else
		{			
			$uc = SQLUtil::parseCondition($condition);
		}
		
		$update = SQLUtil::parseASFieldValues($fieldsValue,false);
		
		$sql = "UPDATE `Ga_ServerOnlineInfoLog` SET {$update} WHERE {$uc}";
		
		$qr = sql_query(self::$_db_name,$sql);
				
		return (boolean)$qr;
	}
	
	/**
	 * 是否已经设置主键的值
	 */
	public function is_set_keys()
	{
		
		return (isset($this->ga_LogIndex));

	}
	
	private function /*void*/ clean() 
	{
		$this->is_this_table_dirty = false;
		$this->is_ga_LogIndex_dirty = false;
		$this->is_ga_ServerID_dirty = false;
		$this->is_ga_OnlineNum_dirty = false;
		$this->is_ga_OnlineRefreshTime_dirty = false;

	}
	
	public function /*string*/ getGaLogIndex()
	{
		return $this->ga_LogIndex;
	}
	
	public function /*void*/ setGaLogIndex(/*string*/ $ga_LogIndex)
	{
		$this->ga_LogIndex = SQLUtil::toSafeSQLString($ga_LogIndex);
		$this->is_ga_LogIndex_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setGaLogIndexNull()
	{
		$this->ga_LogIndex = null;
		$this->is_ga_LogIndex_dirty = true;		
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

	public function /*int*/ getGaOnlineNum()
	{
		return $this->ga_OnlineNum;
	}
	
	public function /*void*/ setGaOnlineNum(/*int*/ $ga_OnlineNum)
	{
		$this->ga_OnlineNum = intval($ga_OnlineNum);
		$this->is_ga_OnlineNum_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setGaOnlineNumNull()
	{
		$this->ga_OnlineNum = null;
		$this->is_ga_OnlineNum_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*string*/ getGaOnlineRefreshTime()
	{
		return $this->ga_OnlineRefreshTime;
	}
	
	public function /*void*/ setGaOnlineRefreshTime(/*string*/ $ga_OnlineRefreshTime)
	{
		$this->ga_OnlineRefreshTime = SQLUtil::toSafeSQLString($ga_OnlineRefreshTime);
		$this->is_ga_OnlineRefreshTime_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setGaOnlineRefreshTimeNull()
	{
		$this->ga_OnlineRefreshTime = null;
		$this->is_ga_OnlineRefreshTime_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	
	public function /*string*/ toDebugString()
	{
		$dbg = "(";
		
		$dbg .= ("ga_LogIndex={$this->ga_LogIndex},");
		$dbg .= ("ga_ServerID={$this->ga_ServerID},");
		$dbg .= ("ga_OnlineNum={$this->ga_OnlineNum},");
		$dbg .= ("ga_OnlineRefreshTime={$this->ga_OnlineRefreshTime},");

		$dbg .= ")";
				
		return str_replace(",)",")",$dbg);
	}
	
	public function fromArray($arr)
	{
		if (isset($arr['ga_LogIndex'])) $this->setGaLogIndex($arr['ga_LogIndex']);
		if (isset($arr['ga_ServerID'])) $this->setGaServerID($arr['ga_ServerID']);
		if (isset($arr['ga_OnlineNum'])) $this->setGaOnlineNum($arr['ga_OnlineNum']);
		if (isset($arr['ga_OnlineRefreshTime'])) $this->setGaOnlineRefreshTime($arr['ga_OnlineRefreshTime']);
		
	}
	
	public function toArray()
	{
		$ret = array();
		$ret['ga_LogIndex'] = $this->ga_LogIndex;
		$ret['ga_ServerID'] = $this->ga_ServerID;
		$ret['ga_OnlineNum'] = $this->ga_OnlineNum;
		$ret['ga_OnlineRefreshTime'] = $this->ga_OnlineRefreshTime;

		return $ret;
	}
}

?>
