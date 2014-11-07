<?php
require_once (FRAMEWORK_PATH . "utils/MysqlDBHelper.php");
require_once (FRAMEWORK_PATH . "db/SQLUtil.php");
/**
 * database table PT_PassportLockLog description
 * 
 * [This file was auto-generated. PLEASE DONT EDIT]
 * 
 * @author LiangZhixian
 * 
 */
class TbPTPassportLockLog {
	
	public static $_db_name = "pf_passport";
	
	private /*string*/ $pt_LockLogIndex; //PRIMARY KEY 
	private /*string*/ $pt_AccountKey;
	private /*string*/ $pt_LockBeginTime;
	private /*string*/ $pt_LockEndTime; //永久封停=1900-1-1 00:00:00
	private /*string*/ $pt_LockInfo;
	private /*string*/ $pt_LockPerson;
	private /*int*/ $pt_LockType;

	
	private $is_this_table_dirty = false;
	private $is_pt_LockLogIndex_dirty = false;
	private $is_pt_AccountKey_dirty = false;
	private $is_pt_LockBeginTime_dirty = false;
	private $is_pt_LockEndTime_dirty = false;
	private $is_pt_LockInfo_dirty = false;
	private $is_pt_LockPerson_dirty = false;
	private $is_pt_LockType_dirty = false;


	/**
	 * @param array($condition)
	 * @return array(TbPTPassportLockLog)
	 */
	public static function /*array(TbPTPassportLockLog)*/ loadTable(/*array*/ $fields=NULL,/*array*/$condition=NULL)
	{
		$result = array();
		
		$f = "*";
		
		if(!empty($fields))
		{
			$f = SQLUtil::parseFields($fields);			
		}
		
		if (empty($condition))
		{
			$sql = "SELECT {$f} FROM `PT_PassportLockLog`";
		}
		else
		{			
			$sql = "SELECT {$f} FROM `PT_PassportLockLog` WHERE ".SQLUtil::parseCondition($condition);
		}			
		
		$ar = sql_fetch_rows_assoc(self::$_db_name,$sql);
		
		if (empty($ar) || count($ar) == 0)
		{
			return $result;
		}
		
		foreach($ar as $row)
		{
			$tb = new TbPTPassportLockLog();			
			if (isset($row['pt_LockLogIndex'])) $tb->pt_LockLogIndex = $row['pt_LockLogIndex'];
			if (isset($row['pt_AccountKey'])) $tb->pt_AccountKey = $row['pt_AccountKey'];
			if (isset($row['pt_LockBeginTime'])) $tb->pt_LockBeginTime = $row['pt_LockBeginTime'];
			if (isset($row['pt_LockEndTime'])) $tb->pt_LockEndTime = $row['pt_LockEndTime'];
			if (isset($row['pt_LockInfo'])) $tb->pt_LockInfo = $row['pt_LockInfo'];
			if (isset($row['pt_LockPerson'])) $tb->pt_LockPerson = $row['pt_LockPerson'];
			if (isset($row['pt_LockType'])) $tb->pt_LockType = intval($row['pt_LockType']);
		
			$result[] = $tb;
		}
		
		return $result;
	}	
	
	public static function insertSqlHeader(/*array*/ $fields=NULL)
	{
		$result = array();				
		if(!empty($fields)){
			$f = SQLUtil::parseFields($fields);			
			$result[0] = "INSERT INTO `PT_PassportLockLog` ({$f}) VALUES ";	
			$ar = array();
			foreach($fields as $key){
				$ar[$key]=1;
			}
			$result[1] = $ar;
		}else{
			$result[0]="INSERT INTO `PT_PassportLockLog` (`pt_LockLogIndex`,`pt_AccountKey`,`pt_LockBeginTime`,`pt_LockEndTime`,`pt_LockInfo`,`pt_LockPerson`,`pt_LockType`) VALUES ";
			$result[1] = array('pt_LockLogIndex'=>1,'pt_AccountKey'=>1,'pt_LockBeginTime'=>1,'pt_LockEndTime'=>1,'pt_LockInfo'=>1,'pt_LockPerson'=>1,'pt_LockType'=>1);
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
		$c = "`pt_LockLogIndex`='{$this->pt_LockLogIndex}'";
		
		if(!empty($fields))
		{
			$f = SQLUtil::parseFields($fields);			
		}
	    if (!empty($condition))
		{
			$c =SQLUtil::parseCondition($condition);
		}
		
		$sql = "SELECT {$f} FROM `PT_PassportLockLog` WHERE {$c} LIMIT 1";


		$ars = sql_fetch_rows_assoc(self::$_db_name,$sql);
		
		if (!$ars || count($ars)==0)
		{
			return false;
		}
		
		$ar = $ars[0];
		
		if (isset($ar['pt_LockLogIndex'])) $this->pt_LockLogIndex = $ar['pt_LockLogIndex'];
		if (isset($ar['pt_AccountKey'])) $this->pt_AccountKey = $ar['pt_AccountKey'];
		if (isset($ar['pt_LockBeginTime'])) $this->pt_LockBeginTime = $ar['pt_LockBeginTime'];
		if (isset($ar['pt_LockEndTime'])) $this->pt_LockEndTime = $ar['pt_LockEndTime'];
		if (isset($ar['pt_LockInfo'])) $this->pt_LockInfo = $ar['pt_LockInfo'];
		if (isset($ar['pt_LockPerson'])) $this->pt_LockPerson = $ar['pt_LockPerson'];
		if (isset($ar['pt_LockType'])) $this->pt_LockType = intval($ar['pt_LockType']);
		
		
		$this->clean();
		
		return true;
	}
	
	public function /*boolean*/ loadFromExistFields()
	{
		$emptyCondition = true;
    	$emptyFields = true;
    	
    	$fields = array();
    	$condition = array();
    	
    	if (!isset($this->pt_LockLogIndex)){
    		$emptyFields = false;
    		$fields[] = 'pt_LockLogIndex';
    	}else{
    		$emptyCondition = false; 
    		$condition['pt_LockLogIndex']=$this->pt_LockLogIndex;
    	}
    	if (!isset($this->pt_AccountKey)){
    		$emptyFields = false;
    		$fields[] = 'pt_AccountKey';
    	}else{
    		$emptyCondition = false; 
    		$condition['pt_AccountKey']=$this->pt_AccountKey;
    	}
    	if (!isset($this->pt_LockBeginTime)){
    		$emptyFields = false;
    		$fields[] = 'pt_LockBeginTime';
    	}else{
    		$emptyCondition = false; 
    		$condition['pt_LockBeginTime']=$this->pt_LockBeginTime;
    	}
    	if (!isset($this->pt_LockEndTime)){
    		$emptyFields = false;
    		$fields[] = 'pt_LockEndTime';
    	}else{
    		$emptyCondition = false; 
    		$condition['pt_LockEndTime']=$this->pt_LockEndTime;
    	}
    	if (!isset($this->pt_LockInfo)){
    		$emptyFields = false;
    		$fields[] = 'pt_LockInfo';
    	}else{
    		$emptyCondition = false; 
    		$condition['pt_LockInfo']=$this->pt_LockInfo;
    	}
    	if (!isset($this->pt_LockPerson)){
    		$emptyFields = false;
    		$fields[] = 'pt_LockPerson';
    	}else{
    		$emptyCondition = false; 
    		$condition['pt_LockPerson']=$this->pt_LockPerson;
    	}
    	if (!isset($this->pt_LockType)){
    		$emptyFields = false;
    		$fields[] = 'pt_LockType';
    	}else{
    		$emptyCondition = false; 
    		$condition['pt_LockType']=$this->pt_LockType;
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
				
		if (!isset($this->pt_LockLogIndex)) $this->pt_LockLogIndex = get_mysql_insert_id(self::$_db_name);

		
		$this->clean();
		
		return true;	
		
	}
	
	public function /*boolean*/ save(/*array*/$condition=NULL)
	{
		if (empty($condition))
		{
			$uc = "`pt_LockLogIndex`='{$this->pt_LockLogIndex}'";
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
		
		$sql = "DELETE FROM `PT_PassportLockLog` WHERE ".SQLUtil::parseCondition($condition);
		
		$qr = sql_query(self::$_db_name,$sql);
				
		return (boolean)$qr;
	}
	
	public function /*boolean*/ delete()
	{
		if (!$this->is_set_keys())
		{
			return false;
		}
		
		$sql = "DELETE FROM `PT_PassportLockLog` WHERE `pt_LockLogIndex`='{$this->pt_LockLogIndex}'";
		

		$qr = sql_query(self::$_db_name,$sql);
				
		return (boolean)$qr;
	}
	
	public function getInsertValue($fields)
	{
		$values = "(";		
		foreach($fields as $f => $k){
			if($f == 'pt_LockLogIndex'){
 				$values .= "'{$this->pt_LockLogIndex}',";
 			}else if($f == 'pt_AccountKey'){
 				$values .= "'{$this->pt_AccountKey}',";
 			}else if($f == 'pt_LockBeginTime'){
 				$values .= "'{$this->pt_LockBeginTime}',";
 			}else if($f == 'pt_LockEndTime'){
 				$values .= "'{$this->pt_LockEndTime}',";
 			}else if($f == 'pt_LockInfo'){
 				$values .= "'{$this->pt_LockInfo}',";
 			}else if($f == 'pt_LockPerson'){
 				$values .= "'{$this->pt_LockPerson}',";
 			}else if($f == 'pt_LockType'){
 				$values .= "'{$this->pt_LockType}',";
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

		if (isset($this->pt_LockLogIndex))
		{
			$fields .= "`pt_LockLogIndex`,";
			$values .= "'{$this->pt_LockLogIndex}',";
		}
		if (isset($this->pt_AccountKey))
		{
			$fields .= "`pt_AccountKey`,";
			$values .= "'{$this->pt_AccountKey}',";
		}
		if (isset($this->pt_LockBeginTime))
		{
			$fields .= "`pt_LockBeginTime`,";
			$values .= "'{$this->pt_LockBeginTime}',";
		}
		if (isset($this->pt_LockEndTime))
		{
			$fields .= "`pt_LockEndTime`,";
			$values .= "'{$this->pt_LockEndTime}',";
		}
		if (isset($this->pt_LockInfo))
		{
			$fields .= "`pt_LockInfo`,";
			$values .= "'{$this->pt_LockInfo}',";
		}
		if (isset($this->pt_LockPerson))
		{
			$fields .= "`pt_LockPerson`,";
			$values .= "'{$this->pt_LockPerson}',";
		}
		if (isset($this->pt_LockType))
		{
			$fields .= "`pt_LockType`,";
			$values .= "'{$this->pt_LockType}',";
		}

		
		$fields .= ")";
		$values .= ")";
		
		$sql = "INSERT INTO `PT_PassportLockLog` ".$fields.$values;
		
		return str_replace(",)",")",$sql);
	}
	
	private function /*string*/ getUpdateFields()
	{
		$update = "";
		
		if ($this->is_pt_AccountKey_dirty)
		{			
			if (!isset($this->pt_AccountKey))
			{
				$update .= ("`pt_AccountKey`=null,");
			}
			else
			{
				$update .= ("`pt_AccountKey`='{$this->pt_AccountKey}',");
			}
		}
		if ($this->is_pt_LockBeginTime_dirty)
		{			
			if (!isset($this->pt_LockBeginTime))
			{
				$update .= ("`pt_LockBeginTime`=null,");
			}
			else
			{
				$update .= ("`pt_LockBeginTime`='{$this->pt_LockBeginTime}',");
			}
		}
		if ($this->is_pt_LockEndTime_dirty)
		{			
			if (!isset($this->pt_LockEndTime))
			{
				$update .= ("`pt_LockEndTime`=null,");
			}
			else
			{
				$update .= ("`pt_LockEndTime`='{$this->pt_LockEndTime}',");
			}
		}
		if ($this->is_pt_LockInfo_dirty)
		{			
			if (!isset($this->pt_LockInfo))
			{
				$update .= ("`pt_LockInfo`=null,");
			}
			else
			{
				$update .= ("`pt_LockInfo`='{$this->pt_LockInfo}',");
			}
		}
		if ($this->is_pt_LockPerson_dirty)
		{			
			if (!isset($this->pt_LockPerson))
			{
				$update .= ("`pt_LockPerson`=null,");
			}
			else
			{
				$update .= ("`pt_LockPerson`='{$this->pt_LockPerson}',");
			}
		}
		if ($this->is_pt_LockType_dirty)
		{			
			if (!isset($this->pt_LockType))
			{
				$update .= ("`pt_LockType`=null,");
			}
			else
			{
				$update .= ("`pt_LockType`='{$this->pt_LockType}',");
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
		
		$sql = "UPDATE `PT_PassportLockLog` SET {$update} WHERE {$condition}";
		
		return $sql;
	}
	
	public function /*boolean*/ add($fieldsValue,$condition=NULL)
	{				
		if (empty($condition))
		{
			$uc = "`pt_LockLogIndex`='{$this->pt_LockLogIndex}'";
		}
		else
		{			
			$uc = SQLUtil::parseCondition($condition);
		}
		
		$update = SQLUtil::parseASFieldValues($fieldsValue);
		
		$sql = "UPDATE `PT_PassportLockLog` SET {$update} WHERE {$uc}";
		
		$qr = sql_query(self::$_db_name,$sql);
				
		return (boolean)$qr;
	}	
	
	public function /*boolean*/ sub($fieldsValue,$condition=NULL)
	{
		if (empty($condition))
		{
			$uc = "`pt_LockLogIndex`='{$this->pt_LockLogIndex}'";
		}
		else
		{			
			$uc = SQLUtil::parseCondition($condition);
		}
		
		$update = SQLUtil::parseASFieldValues($fieldsValue,false);
		
		$sql = "UPDATE `PT_PassportLockLog` SET {$update} WHERE {$uc}";
		
		$qr = sql_query(self::$_db_name,$sql);
				
		return (boolean)$qr;
	}
	
	/**
	 * 是否已经设置主键的值
	 */
	public function is_set_keys()
	{
		
		return (isset($this->pt_LockLogIndex));

	}
	
	private function /*void*/ clean() 
	{
		$this->is_this_table_dirty = false;
		$this->is_pt_LockLogIndex_dirty = false;
		$this->is_pt_AccountKey_dirty = false;
		$this->is_pt_LockBeginTime_dirty = false;
		$this->is_pt_LockEndTime_dirty = false;
		$this->is_pt_LockInfo_dirty = false;
		$this->is_pt_LockPerson_dirty = false;
		$this->is_pt_LockType_dirty = false;

	}
	
	public function /*string*/ getPtLockLogIndex()
	{
		return $this->pt_LockLogIndex;
	}
	
	public function /*void*/ setPtLockLogIndex(/*string*/ $pt_LockLogIndex)
	{
		$this->pt_LockLogIndex = SQLUtil::toSafeSQLString($pt_LockLogIndex);
		$this->is_pt_LockLogIndex_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setPtLockLogIndexNull()
	{
		$this->pt_LockLogIndex = null;
		$this->is_pt_LockLogIndex_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*string*/ getPtAccountKey()
	{
		return $this->pt_AccountKey;
	}
	
	public function /*void*/ setPtAccountKey(/*string*/ $pt_AccountKey)
	{
		$this->pt_AccountKey = SQLUtil::toSafeSQLString($pt_AccountKey);
		$this->is_pt_AccountKey_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setPtAccountKeyNull()
	{
		$this->pt_AccountKey = null;
		$this->is_pt_AccountKey_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*string*/ getPtLockBeginTime()
	{
		return $this->pt_LockBeginTime;
	}
	
	public function /*void*/ setPtLockBeginTime(/*string*/ $pt_LockBeginTime)
	{
		$this->pt_LockBeginTime = SQLUtil::toSafeSQLString($pt_LockBeginTime);
		$this->is_pt_LockBeginTime_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setPtLockBeginTimeNull()
	{
		$this->pt_LockBeginTime = null;
		$this->is_pt_LockBeginTime_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*string*/ getPtLockEndTime()
	{
		return $this->pt_LockEndTime;
	}
	
	public function /*void*/ setPtLockEndTime(/*string*/ $pt_LockEndTime)
	{
		$this->pt_LockEndTime = SQLUtil::toSafeSQLString($pt_LockEndTime);
		$this->is_pt_LockEndTime_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setPtLockEndTimeNull()
	{
		$this->pt_LockEndTime = null;
		$this->is_pt_LockEndTime_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*string*/ getPtLockInfo()
	{
		return $this->pt_LockInfo;
	}
	
	public function /*void*/ setPtLockInfo(/*string*/ $pt_LockInfo)
	{
		$this->pt_LockInfo = SQLUtil::toSafeSQLString($pt_LockInfo);
		$this->is_pt_LockInfo_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setPtLockInfoNull()
	{
		$this->pt_LockInfo = null;
		$this->is_pt_LockInfo_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*string*/ getPtLockPerson()
	{
		return $this->pt_LockPerson;
	}
	
	public function /*void*/ setPtLockPerson(/*string*/ $pt_LockPerson)
	{
		$this->pt_LockPerson = SQLUtil::toSafeSQLString($pt_LockPerson);
		$this->is_pt_LockPerson_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setPtLockPersonNull()
	{
		$this->pt_LockPerson = null;
		$this->is_pt_LockPerson_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*int*/ getPtLockType()
	{
		return $this->pt_LockType;
	}
	
	public function /*void*/ setPtLockType(/*int*/ $pt_LockType)
	{
		$this->pt_LockType = intval($pt_LockType);
		$this->is_pt_LockType_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setPtLockTypeNull()
	{
		$this->pt_LockType = null;
		$this->is_pt_LockType_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	
	public function /*string*/ toDebugString()
	{
		$dbg = "(";
		
		$dbg .= ("pt_LockLogIndex={$this->pt_LockLogIndex},");
		$dbg .= ("pt_AccountKey={$this->pt_AccountKey},");
		$dbg .= ("pt_LockBeginTime={$this->pt_LockBeginTime},");
		$dbg .= ("pt_LockEndTime={$this->pt_LockEndTime},");
		$dbg .= ("pt_LockInfo={$this->pt_LockInfo},");
		$dbg .= ("pt_LockPerson={$this->pt_LockPerson},");
		$dbg .= ("pt_LockType={$this->pt_LockType},");

		$dbg .= ")";
				
		return str_replace(",)",")",$dbg);
	}
	
	public function fromArray($arr)
	{
		if (isset($arr['pt_LockLogIndex'])) $this->setPtLockLogIndex($arr['pt_LockLogIndex']);
		if (isset($arr['pt_AccountKey'])) $this->setPtAccountKey($arr['pt_AccountKey']);
		if (isset($arr['pt_LockBeginTime'])) $this->setPtLockBeginTime($arr['pt_LockBeginTime']);
		if (isset($arr['pt_LockEndTime'])) $this->setPtLockEndTime($arr['pt_LockEndTime']);
		if (isset($arr['pt_LockInfo'])) $this->setPtLockInfo($arr['pt_LockInfo']);
		if (isset($arr['pt_LockPerson'])) $this->setPtLockPerson($arr['pt_LockPerson']);
		if (isset($arr['pt_LockType'])) $this->setPtLockType($arr['pt_LockType']);
		
	}
	
	public function toArray()
	{
		$ret = array();
		$ret['pt_LockLogIndex'] = $this->pt_LockLogIndex;
		$ret['pt_AccountKey'] = $this->pt_AccountKey;
		$ret['pt_LockBeginTime'] = $this->pt_LockBeginTime;
		$ret['pt_LockEndTime'] = $this->pt_LockEndTime;
		$ret['pt_LockInfo'] = $this->pt_LockInfo;
		$ret['pt_LockPerson'] = $this->pt_LockPerson;
		$ret['pt_LockType'] = $this->pt_LockType;

		return $ret;
	}
}

?>
