<?php
require_once (FRAMEWORK_PATH . "utils/MysqlDBHelper.php");
require_once (FRAMEWORK_PATH . "db/SQLUtil.php");
/**
 * database table GA_ServerLoginLog description
 * 
 * [This file was auto-generated. PLEASE DONT EDIT]
 * 
 * @author LiangZhixian
 * 
 */
class TbGAServerLoginLog {
	
	public static $_db_name = "pf_basemanage";
	
	private /*string*/ $ga_LogIndex; //PRIMARY KEY 
	private /*string*/ $ga_GameID;
	private /*int*/ $ga_AreaID; //分区ID
	private /*int*/ $ga_ServerID;
	private /*string*/ $pt_AccountKey;
	private /*string*/ $pt_OpenUID;
	private /*string*/ $ga_LoginTime;
	private /*string*/ $ga_LoginIP;

	
	private $is_this_table_dirty = false;
	private $is_ga_LogIndex_dirty = false;
	private $is_ga_GameID_dirty = false;
	private $is_ga_AreaID_dirty = false;
	private $is_ga_ServerID_dirty = false;
	private $is_pt_AccountKey_dirty = false;
	private $is_pt_OpenUID_dirty = false;
	private $is_ga_LoginTime_dirty = false;
	private $is_ga_LoginIP_dirty = false;


	/**
	 * @param array($condition)
	 * @return array(TbGAServerLoginLog)
	 */
	public static function /*array(TbGAServerLoginLog)*/ loadTable(/*array*/ $fields=NULL,/*array*/$condition=NULL)
	{
		$result = array();
		
		$f = "*";
		
		if(!empty($fields))
		{
			$f = SQLUtil::parseFields($fields);			
		}
		
		if (empty($condition))
		{
			$sql = "SELECT {$f} FROM `GA_ServerLoginLog`";
		}
		else
		{			
			$sql = "SELECT {$f} FROM `GA_ServerLoginLog` WHERE ".SQLUtil::parseCondition($condition);
		}			
		
		$ar = sql_fetch_rows_assoc(self::$_db_name,$sql);
		
		if (empty($ar) || count($ar) == 0)
		{
			return $result;
		}
		
		foreach($ar as $row)
		{
			$tb = new TbGAServerLoginLog();			
			if (isset($row['ga_LogIndex'])) $tb->ga_LogIndex = $row['ga_LogIndex'];
			if (isset($row['ga_GameID'])) $tb->ga_GameID = $row['ga_GameID'];
			if (isset($row['ga_AreaID'])) $tb->ga_AreaID = intval($row['ga_AreaID']);
			if (isset($row['ga_ServerID'])) $tb->ga_ServerID = intval($row['ga_ServerID']);
			if (isset($row['pt_AccountKey'])) $tb->pt_AccountKey = $row['pt_AccountKey'];
			if (isset($row['pt_OpenUID'])) $tb->pt_OpenUID = $row['pt_OpenUID'];
			if (isset($row['ga_LoginTime'])) $tb->ga_LoginTime = $row['ga_LoginTime'];
			if (isset($row['ga_LoginIP'])) $tb->ga_LoginIP = $row['ga_LoginIP'];
		
			$result[] = $tb;
		}
		
		return $result;
	}	
	
	public static function insertSqlHeader(/*array*/ $fields=NULL)
	{
		$result = array();				
		if(!empty($fields)){
			$f = SQLUtil::parseFields($fields);			
			$result[0] = "INSERT INTO `GA_ServerLoginLog` ({$f}) VALUES ";	
			$ar = array();
			foreach($fields as $key){
				$ar[$key]=1;
			}
			$result[1] = $ar;
		}else{
			$result[0]="INSERT INTO `GA_ServerLoginLog` (`ga_LogIndex`,`ga_GameID`,`ga_AreaID`,`ga_ServerID`,`pt_AccountKey`,`pt_OpenUID`,`ga_LoginTime`,`ga_LoginIP`) VALUES ";
			$result[1] = array('ga_LogIndex'=>1,'ga_GameID'=>1,'ga_AreaID'=>1,'ga_ServerID'=>1,'pt_AccountKey'=>1,'pt_OpenUID'=>1,'ga_LoginTime'=>1,'ga_LoginIP'=>1);
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
		
		$sql = "SELECT {$f} FROM `GA_ServerLoginLog` WHERE {$c} LIMIT 1";


		$ars = sql_fetch_rows_assoc(self::$_db_name,$sql);
		
		if (!$ars || count($ars)==0)
		{
			return false;
		}
		
		$ar = $ars[0];
		
		if (isset($ar['ga_LogIndex'])) $this->ga_LogIndex = $ar['ga_LogIndex'];
		if (isset($ar['ga_GameID'])) $this->ga_GameID = $ar['ga_GameID'];
		if (isset($ar['ga_AreaID'])) $this->ga_AreaID = intval($ar['ga_AreaID']);
		if (isset($ar['ga_ServerID'])) $this->ga_ServerID = intval($ar['ga_ServerID']);
		if (isset($ar['pt_AccountKey'])) $this->pt_AccountKey = $ar['pt_AccountKey'];
		if (isset($ar['pt_OpenUID'])) $this->pt_OpenUID = $ar['pt_OpenUID'];
		if (isset($ar['ga_LoginTime'])) $this->ga_LoginTime = $ar['ga_LoginTime'];
		if (isset($ar['ga_LoginIP'])) $this->ga_LoginIP = $ar['ga_LoginIP'];
		
		
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
    	if (!isset($this->ga_GameID)){
    		$emptyFields = false;
    		$fields[] = 'ga_GameID';
    	}else{
    		$emptyCondition = false; 
    		$condition['ga_GameID']=$this->ga_GameID;
    	}
    	if (!isset($this->ga_AreaID)){
    		$emptyFields = false;
    		$fields[] = 'ga_AreaID';
    	}else{
    		$emptyCondition = false; 
    		$condition['ga_AreaID']=$this->ga_AreaID;
    	}
    	if (!isset($this->ga_ServerID)){
    		$emptyFields = false;
    		$fields[] = 'ga_ServerID';
    	}else{
    		$emptyCondition = false; 
    		$condition['ga_ServerID']=$this->ga_ServerID;
    	}
    	if (!isset($this->pt_AccountKey)){
    		$emptyFields = false;
    		$fields[] = 'pt_AccountKey';
    	}else{
    		$emptyCondition = false; 
    		$condition['pt_AccountKey']=$this->pt_AccountKey;
    	}
    	if (!isset($this->pt_OpenUID)){
    		$emptyFields = false;
    		$fields[] = 'pt_OpenUID';
    	}else{
    		$emptyCondition = false; 
    		$condition['pt_OpenUID']=$this->pt_OpenUID;
    	}
    	if (!isset($this->ga_LoginTime)){
    		$emptyFields = false;
    		$fields[] = 'ga_LoginTime';
    	}else{
    		$emptyCondition = false; 
    		$condition['ga_LoginTime']=$this->ga_LoginTime;
    	}
    	if (!isset($this->ga_LoginIP)){
    		$emptyFields = false;
    		$fields[] = 'ga_LoginIP';
    	}else{
    		$emptyCondition = false; 
    		$condition['ga_LoginIP']=$this->ga_LoginIP;
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
		
		$sql = "DELETE FROM `GA_ServerLoginLog` WHERE ".SQLUtil::parseCondition($condition);
		
		$qr = sql_query(self::$_db_name,$sql);
				
		return (boolean)$qr;
	}
	
	public function /*boolean*/ delete()
	{
		if (!$this->is_set_keys())
		{
			return false;
		}
		
		$sql = "DELETE FROM `GA_ServerLoginLog` WHERE `ga_LogIndex`='{$this->ga_LogIndex}'";
		

		$qr = sql_query(self::$_db_name,$sql);
				
		return (boolean)$qr;
	}
	
	public function getInsertValue($fields)
	{
		$values = "(";		
		foreach($fields as $f => $k){
			if($f == 'ga_LogIndex'){
 				$values .= "'{$this->ga_LogIndex}',";
 			}else if($f == 'ga_GameID'){
 				$values .= "'{$this->ga_GameID}',";
 			}else if($f == 'ga_AreaID'){
 				$values .= "'{$this->ga_AreaID}',";
 			}else if($f == 'ga_ServerID'){
 				$values .= "'{$this->ga_ServerID}',";
 			}else if($f == 'pt_AccountKey'){
 				$values .= "'{$this->pt_AccountKey}',";
 			}else if($f == 'pt_OpenUID'){
 				$values .= "'{$this->pt_OpenUID}',";
 			}else if($f == 'ga_LoginTime'){
 				$values .= "'{$this->ga_LoginTime}',";
 			}else if($f == 'ga_LoginIP'){
 				$values .= "'{$this->ga_LoginIP}',";
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
		if (isset($this->ga_GameID))
		{
			$fields .= "`ga_GameID`,";
			$values .= "'{$this->ga_GameID}',";
		}
		if (isset($this->ga_AreaID))
		{
			$fields .= "`ga_AreaID`,";
			$values .= "'{$this->ga_AreaID}',";
		}
		if (isset($this->ga_ServerID))
		{
			$fields .= "`ga_ServerID`,";
			$values .= "'{$this->ga_ServerID}',";
		}
		if (isset($this->pt_AccountKey))
		{
			$fields .= "`pt_AccountKey`,";
			$values .= "'{$this->pt_AccountKey}',";
		}
		if (isset($this->pt_OpenUID))
		{
			$fields .= "`pt_OpenUID`,";
			$values .= "'{$this->pt_OpenUID}',";
		}
		if (isset($this->ga_LoginTime))
		{
			$fields .= "`ga_LoginTime`,";
			$values .= "'{$this->ga_LoginTime}',";
		}
		if (isset($this->ga_LoginIP))
		{
			$fields .= "`ga_LoginIP`,";
			$values .= "'{$this->ga_LoginIP}',";
		}

		
		$fields .= ")";
		$values .= ")";
		
		$sql = "INSERT INTO `GA_ServerLoginLog` ".$fields.$values;
		
		return str_replace(",)",")",$sql);
	}
	
	private function /*string*/ getUpdateFields()
	{
		$update = "";
		
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
		if ($this->is_pt_OpenUID_dirty)
		{			
			if (!isset($this->pt_OpenUID))
			{
				$update .= ("`pt_OpenUID`=null,");
			}
			else
			{
				$update .= ("`pt_OpenUID`='{$this->pt_OpenUID}',");
			}
		}
		if ($this->is_ga_LoginTime_dirty)
		{			
			if (!isset($this->ga_LoginTime))
			{
				$update .= ("`ga_LoginTime`=null,");
			}
			else
			{
				$update .= ("`ga_LoginTime`='{$this->ga_LoginTime}',");
			}
		}
		if ($this->is_ga_LoginIP_dirty)
		{			
			if (!isset($this->ga_LoginIP))
			{
				$update .= ("`ga_LoginIP`=null,");
			}
			else
			{
				$update .= ("`ga_LoginIP`='{$this->ga_LoginIP}',");
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
		
		$sql = "UPDATE `GA_ServerLoginLog` SET {$update} WHERE {$condition}";
		
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
		
		$sql = "UPDATE `GA_ServerLoginLog` SET {$update} WHERE {$uc}";
		
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
		
		$sql = "UPDATE `GA_ServerLoginLog` SET {$update} WHERE {$uc}";
		
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
		$this->is_ga_GameID_dirty = false;
		$this->is_ga_AreaID_dirty = false;
		$this->is_ga_ServerID_dirty = false;
		$this->is_pt_AccountKey_dirty = false;
		$this->is_pt_OpenUID_dirty = false;
		$this->is_ga_LoginTime_dirty = false;
		$this->is_ga_LoginIP_dirty = false;

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

	public function /*string*/ getGaGameID()
	{
		return $this->ga_GameID;
	}
	
	public function /*void*/ setGaGameID(/*string*/ $ga_GameID)
	{
		$this->ga_GameID = SQLUtil::toSafeSQLString($ga_GameID);
		$this->is_ga_GameID_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setGaGameIDNull()
	{
		$this->ga_GameID = null;
		$this->is_ga_GameID_dirty = true;		
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

	public function /*string*/ getPtOpenUID()
	{
		return $this->pt_OpenUID;
	}
	
	public function /*void*/ setPtOpenUID(/*string*/ $pt_OpenUID)
	{
		$this->pt_OpenUID = SQLUtil::toSafeSQLString($pt_OpenUID);
		$this->is_pt_OpenUID_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setPtOpenUIDNull()
	{
		$this->pt_OpenUID = null;
		$this->is_pt_OpenUID_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*string*/ getGaLoginTime()
	{
		return $this->ga_LoginTime;
	}
	
	public function /*void*/ setGaLoginTime(/*string*/ $ga_LoginTime)
	{
		$this->ga_LoginTime = SQLUtil::toSafeSQLString($ga_LoginTime);
		$this->is_ga_LoginTime_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setGaLoginTimeNull()
	{
		$this->ga_LoginTime = null;
		$this->is_ga_LoginTime_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*string*/ getGaLoginIP()
	{
		return $this->ga_LoginIP;
	}
	
	public function /*void*/ setGaLoginIP(/*string*/ $ga_LoginIP)
	{
		$this->ga_LoginIP = SQLUtil::toSafeSQLString($ga_LoginIP);
		$this->is_ga_LoginIP_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setGaLoginIPNull()
	{
		$this->ga_LoginIP = null;
		$this->is_ga_LoginIP_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	
	public function /*string*/ toDebugString()
	{
		$dbg = "(";
		
		$dbg .= ("ga_LogIndex={$this->ga_LogIndex},");
		$dbg .= ("ga_GameID={$this->ga_GameID},");
		$dbg .= ("ga_AreaID={$this->ga_AreaID},");
		$dbg .= ("ga_ServerID={$this->ga_ServerID},");
		$dbg .= ("pt_AccountKey={$this->pt_AccountKey},");
		$dbg .= ("pt_OpenUID={$this->pt_OpenUID},");
		$dbg .= ("ga_LoginTime={$this->ga_LoginTime},");
		$dbg .= ("ga_LoginIP={$this->ga_LoginIP},");

		$dbg .= ")";
				
		return str_replace(",)",")",$dbg);
	}
	
	public function fromArray($arr)
	{
		if (isset($arr['ga_LogIndex'])) $this->setGaLogIndex($arr['ga_LogIndex']);
		if (isset($arr['ga_GameID'])) $this->setGaGameID($arr['ga_GameID']);
		if (isset($arr['ga_AreaID'])) $this->setGaAreaID($arr['ga_AreaID']);
		if (isset($arr['ga_ServerID'])) $this->setGaServerID($arr['ga_ServerID']);
		if (isset($arr['pt_AccountKey'])) $this->setPtAccountKey($arr['pt_AccountKey']);
		if (isset($arr['pt_OpenUID'])) $this->setPtOpenUID($arr['pt_OpenUID']);
		if (isset($arr['ga_LoginTime'])) $this->setGaLoginTime($arr['ga_LoginTime']);
		if (isset($arr['ga_LoginIP'])) $this->setGaLoginIP($arr['ga_LoginIP']);
		
	}
	
	public function toArray()
	{
		$ret = array();
		$ret['ga_LogIndex'] = $this->ga_LogIndex;
		$ret['ga_GameID'] = $this->ga_GameID;
		$ret['ga_AreaID'] = $this->ga_AreaID;
		$ret['ga_ServerID'] = $this->ga_ServerID;
		$ret['pt_AccountKey'] = $this->pt_AccountKey;
		$ret['pt_OpenUID'] = $this->pt_OpenUID;
		$ret['ga_LoginTime'] = $this->ga_LoginTime;
		$ret['ga_LoginIP'] = $this->ga_LoginIP;

		return $ret;
	}
}

?>
