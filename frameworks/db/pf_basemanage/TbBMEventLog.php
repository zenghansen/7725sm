<?php
require_once (FRAMEWORK_PATH . "utils/MysqlDBHelper.php");
require_once (FRAMEWORK_PATH . "db/SQLUtil.php");
/**
 * database table BM_EventLog description
 * 
 * [This file was auto-generated. PLEASE DONT EDIT]
 * 
 * @author LiangZhixian
 * 
 */
class TbBMEventLog {
	
	public static $_db_name = "pf_basemanage";
	
	private /*string*/ $bm_EventLogID; //PRIMARY KEY 日志序号
	private /*int*/ $bm_EventType; //日志类别              0,错误日志              1,操作日志
	private /*int*/ $bm_ModuleID; //模块ID
	private /*string*/ $bm_AccountID; //帐号ID
	private /*string*/ $bm_OperateIP; //操作IP
	private /*string*/ $bm_EventDesc; //操作描述
	private /*string*/ $bm_CreateTime; //操作时间
	private /*string*/ $bm_ImpactAccount; //受影响帐号

	
	private $is_this_table_dirty = false;
	private $is_bm_EventLogID_dirty = false;
	private $is_bm_EventType_dirty = false;
	private $is_bm_ModuleID_dirty = false;
	private $is_bm_AccountID_dirty = false;
	private $is_bm_OperateIP_dirty = false;
	private $is_bm_EventDesc_dirty = false;
	private $is_bm_CreateTime_dirty = false;
	private $is_bm_ImpactAccount_dirty = false;


	/**
	 * @param array($condition)
	 * @return array(TbBMEventLog)
	 */
	public static function /*array(TbBMEventLog)*/ loadTable(/*array*/ $fields=NULL,/*array*/$condition=NULL)
	{
		$result = array();
		
		$f = "*";
		
		if(!empty($fields))
		{
			$f = SQLUtil::parseFields($fields);			
		}
		
		if (empty($condition))
		{
			$sql = "SELECT {$f} FROM `BM_EventLog`";
		}
		else
		{			
			$sql = "SELECT {$f} FROM `BM_EventLog` WHERE ".SQLUtil::parseCondition($condition);
		}			
		
		$ar = sql_fetch_rows_assoc(self::$_db_name,$sql);
		
		if (empty($ar) || count($ar) == 0)
		{
			return $result;
		}
		
		foreach($ar as $row)
		{
			$tb = new TbBMEventLog();			
			if (isset($row['bm_EventLogID'])) $tb->bm_EventLogID = $row['bm_EventLogID'];
			if (isset($row['bm_EventType'])) $tb->bm_EventType = intval($row['bm_EventType']);
			if (isset($row['bm_ModuleID'])) $tb->bm_ModuleID = intval($row['bm_ModuleID']);
			if (isset($row['bm_AccountID'])) $tb->bm_AccountID = $row['bm_AccountID'];
			if (isset($row['bm_OperateIP'])) $tb->bm_OperateIP = $row['bm_OperateIP'];
			if (isset($row['bm_EventDesc'])) $tb->bm_EventDesc = $row['bm_EventDesc'];
			if (isset($row['bm_CreateTime'])) $tb->bm_CreateTime = $row['bm_CreateTime'];
			if (isset($row['bm_ImpactAccount'])) $tb->bm_ImpactAccount = $row['bm_ImpactAccount'];
		
			$result[] = $tb;
		}
		
		return $result;
	}	
	
	public static function insertSqlHeader(/*array*/ $fields=NULL)
	{
		$result = array();				
		if(!empty($fields)){
			$f = SQLUtil::parseFields($fields);			
			$result[0] = "INSERT INTO `BM_EventLog` ({$f}) VALUES ";	
			$ar = array();
			foreach($fields as $key){
				$ar[$key]=1;
			}
			$result[1] = $ar;
		}else{
			$result[0]="INSERT INTO `BM_EventLog` (`bm_EventLogID`,`bm_EventType`,`bm_ModuleID`,`bm_AccountID`,`bm_OperateIP`,`bm_EventDesc`,`bm_CreateTime`,`bm_ImpactAccount`) VALUES ";
			$result[1] = array('bm_EventLogID'=>1,'bm_EventType'=>1,'bm_ModuleID'=>1,'bm_AccountID'=>1,'bm_OperateIP'=>1,'bm_EventDesc'=>1,'bm_CreateTime'=>1,'bm_ImpactAccount'=>1);
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
		$c = "`bm_EventLogID`='{$this->bm_EventLogID}'";
		
		if(!empty($fields))
		{
			$f = SQLUtil::parseFields($fields);			
		}
	    if (!empty($condition))
		{
			$c =SQLUtil::parseCondition($condition);
		}
		
		$sql = "SELECT {$f} FROM `BM_EventLog` WHERE {$c} LIMIT 1";


		$ars = sql_fetch_rows_assoc(self::$_db_name,$sql);
		
		if (!$ars || count($ars)==0)
		{
			return false;
		}
		
		$ar = $ars[0];
		
		if (isset($ar['bm_EventLogID'])) $this->bm_EventLogID = $ar['bm_EventLogID'];
		if (isset($ar['bm_EventType'])) $this->bm_EventType = intval($ar['bm_EventType']);
		if (isset($ar['bm_ModuleID'])) $this->bm_ModuleID = intval($ar['bm_ModuleID']);
		if (isset($ar['bm_AccountID'])) $this->bm_AccountID = $ar['bm_AccountID'];
		if (isset($ar['bm_OperateIP'])) $this->bm_OperateIP = $ar['bm_OperateIP'];
		if (isset($ar['bm_EventDesc'])) $this->bm_EventDesc = $ar['bm_EventDesc'];
		if (isset($ar['bm_CreateTime'])) $this->bm_CreateTime = $ar['bm_CreateTime'];
		if (isset($ar['bm_ImpactAccount'])) $this->bm_ImpactAccount = $ar['bm_ImpactAccount'];
		
		
		$this->clean();
		
		return true;
	}
	
	public function /*boolean*/ loadFromExistFields()
	{
		$emptyCondition = true;
    	$emptyFields = true;
    	
    	$fields = array();
    	$condition = array();
    	
    	if (!isset($this->bm_EventLogID)){
    		$emptyFields = false;
    		$fields[] = 'bm_EventLogID';
    	}else{
    		$emptyCondition = false; 
    		$condition['bm_EventLogID']=$this->bm_EventLogID;
    	}
    	if (!isset($this->bm_EventType)){
    		$emptyFields = false;
    		$fields[] = 'bm_EventType';
    	}else{
    		$emptyCondition = false; 
    		$condition['bm_EventType']=$this->bm_EventType;
    	}
    	if (!isset($this->bm_ModuleID)){
    		$emptyFields = false;
    		$fields[] = 'bm_ModuleID';
    	}else{
    		$emptyCondition = false; 
    		$condition['bm_ModuleID']=$this->bm_ModuleID;
    	}
    	if (!isset($this->bm_AccountID)){
    		$emptyFields = false;
    		$fields[] = 'bm_AccountID';
    	}else{
    		$emptyCondition = false; 
    		$condition['bm_AccountID']=$this->bm_AccountID;
    	}
    	if (!isset($this->bm_OperateIP)){
    		$emptyFields = false;
    		$fields[] = 'bm_OperateIP';
    	}else{
    		$emptyCondition = false; 
    		$condition['bm_OperateIP']=$this->bm_OperateIP;
    	}
    	if (!isset($this->bm_EventDesc)){
    		$emptyFields = false;
    		$fields[] = 'bm_EventDesc';
    	}else{
    		$emptyCondition = false; 
    		$condition['bm_EventDesc']=$this->bm_EventDesc;
    	}
    	if (!isset($this->bm_CreateTime)){
    		$emptyFields = false;
    		$fields[] = 'bm_CreateTime';
    	}else{
    		$emptyCondition = false; 
    		$condition['bm_CreateTime']=$this->bm_CreateTime;
    	}
    	if (!isset($this->bm_ImpactAccount)){
    		$emptyFields = false;
    		$fields[] = 'bm_ImpactAccount';
    	}else{
    		$emptyCondition = false; 
    		$condition['bm_ImpactAccount']=$this->bm_ImpactAccount;
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
				
		if (!isset($this->bm_EventLogID)) $this->bm_EventLogID = get_mysql_insert_id(self::$_db_name);

		
		$this->clean();
		
		return true;	
		
	}
	
	public function /*boolean*/ save(/*array*/$condition=NULL)
	{
		if (empty($condition))
		{
			$uc = "`bm_EventLogID`='{$this->bm_EventLogID}'";
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
		
		$sql = "DELETE FROM `BM_EventLog` WHERE ".SQLUtil::parseCondition($condition);
		
		$qr = sql_query(self::$_db_name,$sql);
				
		return (boolean)$qr;
	}
	
	public function /*boolean*/ delete()
	{
		if (!$this->is_set_keys())
		{
			return false;
		}
		
		$sql = "DELETE FROM `BM_EventLog` WHERE `bm_EventLogID`='{$this->bm_EventLogID}'";
		

		$qr = sql_query(self::$_db_name,$sql);
				
		return (boolean)$qr;
	}
	
	public function getInsertValue($fields)
	{
		$values = "(";		
		foreach($fields as $f => $k){
			if($f == 'bm_EventLogID'){
 				$values .= "'{$this->bm_EventLogID}',";
 			}else if($f == 'bm_EventType'){
 				$values .= "'{$this->bm_EventType}',";
 			}else if($f == 'bm_ModuleID'){
 				$values .= "'{$this->bm_ModuleID}',";
 			}else if($f == 'bm_AccountID'){
 				$values .= "'{$this->bm_AccountID}',";
 			}else if($f == 'bm_OperateIP'){
 				$values .= "'{$this->bm_OperateIP}',";
 			}else if($f == 'bm_EventDesc'){
 				$values .= "'{$this->bm_EventDesc}',";
 			}else if($f == 'bm_CreateTime'){
 				$values .= "'{$this->bm_CreateTime}',";
 			}else if($f == 'bm_ImpactAccount'){
 				$values .= "'{$this->bm_ImpactAccount}',";
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

		if (isset($this->bm_EventLogID))
		{
			$fields .= "`bm_EventLogID`,";
			$values .= "'{$this->bm_EventLogID}',";
		}
		if (isset($this->bm_EventType))
		{
			$fields .= "`bm_EventType`,";
			$values .= "'{$this->bm_EventType}',";
		}
		if (isset($this->bm_ModuleID))
		{
			$fields .= "`bm_ModuleID`,";
			$values .= "'{$this->bm_ModuleID}',";
		}
		if (isset($this->bm_AccountID))
		{
			$fields .= "`bm_AccountID`,";
			$values .= "'{$this->bm_AccountID}',";
		}
		if (isset($this->bm_OperateIP))
		{
			$fields .= "`bm_OperateIP`,";
			$values .= "'{$this->bm_OperateIP}',";
		}
		if (isset($this->bm_EventDesc))
		{
			$fields .= "`bm_EventDesc`,";
			$values .= "'{$this->bm_EventDesc}',";
		}
		if (isset($this->bm_CreateTime))
		{
			$fields .= "`bm_CreateTime`,";
			$values .= "'{$this->bm_CreateTime}',";
		}
		if (isset($this->bm_ImpactAccount))
		{
			$fields .= "`bm_ImpactAccount`,";
			$values .= "'{$this->bm_ImpactAccount}',";
		}

		
		$fields .= ")";
		$values .= ")";
		
		$sql = "INSERT INTO `BM_EventLog` ".$fields.$values;
		
		return str_replace(",)",")",$sql);
	}
	
	private function /*string*/ getUpdateFields()
	{
		$update = "";
		
		if ($this->is_bm_EventType_dirty)
		{			
			if (!isset($this->bm_EventType))
			{
				$update .= ("`bm_EventType`=null,");
			}
			else
			{
				$update .= ("`bm_EventType`='{$this->bm_EventType}',");
			}
		}
		if ($this->is_bm_ModuleID_dirty)
		{			
			if (!isset($this->bm_ModuleID))
			{
				$update .= ("`bm_ModuleID`=null,");
			}
			else
			{
				$update .= ("`bm_ModuleID`='{$this->bm_ModuleID}',");
			}
		}
		if ($this->is_bm_AccountID_dirty)
		{			
			if (!isset($this->bm_AccountID))
			{
				$update .= ("`bm_AccountID`=null,");
			}
			else
			{
				$update .= ("`bm_AccountID`='{$this->bm_AccountID}',");
			}
		}
		if ($this->is_bm_OperateIP_dirty)
		{			
			if (!isset($this->bm_OperateIP))
			{
				$update .= ("`bm_OperateIP`=null,");
			}
			else
			{
				$update .= ("`bm_OperateIP`='{$this->bm_OperateIP}',");
			}
		}
		if ($this->is_bm_EventDesc_dirty)
		{			
			if (!isset($this->bm_EventDesc))
			{
				$update .= ("`bm_EventDesc`=null,");
			}
			else
			{
				$update .= ("`bm_EventDesc`='{$this->bm_EventDesc}',");
			}
		}
		if ($this->is_bm_CreateTime_dirty)
		{			
			if (!isset($this->bm_CreateTime))
			{
				$update .= ("`bm_CreateTime`=null,");
			}
			else
			{
				$update .= ("`bm_CreateTime`='{$this->bm_CreateTime}',");
			}
		}
		if ($this->is_bm_ImpactAccount_dirty)
		{			
			if (!isset($this->bm_ImpactAccount))
			{
				$update .= ("`bm_ImpactAccount`=null,");
			}
			else
			{
				$update .= ("`bm_ImpactAccount`='{$this->bm_ImpactAccount}',");
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
		
		$sql = "UPDATE `BM_EventLog` SET {$update} WHERE {$condition}";
		
		return $sql;
	}
	
	public function /*boolean*/ add($fieldsValue,$condition=NULL)
	{				
		if (empty($condition))
		{
			$uc = "`bm_EventLogID`='{$this->bm_EventLogID}'";
		}
		else
		{			
			$uc = SQLUtil::parseCondition($condition);
		}
		
		$update = SQLUtil::parseASFieldValues($fieldsValue);
		
		$sql = "UPDATE `BM_EventLog` SET {$update} WHERE {$uc}";
		
		$qr = sql_query(self::$_db_name,$sql);
				
		return (boolean)$qr;
	}	
	
	public function /*boolean*/ sub($fieldsValue,$condition=NULL)
	{
		if (empty($condition))
		{
			$uc = "`bm_EventLogID`='{$this->bm_EventLogID}'";
		}
		else
		{			
			$uc = SQLUtil::parseCondition($condition);
		}
		
		$update = SQLUtil::parseASFieldValues($fieldsValue,false);
		
		$sql = "UPDATE `BM_EventLog` SET {$update} WHERE {$uc}";
		
		$qr = sql_query(self::$_db_name,$sql);
				
		return (boolean)$qr;
	}
	
	/**
	 * 是否已经设置主键的值
	 */
	public function is_set_keys()
	{
		
		return (isset($this->bm_EventLogID));

	}
	
	private function /*void*/ clean() 
	{
		$this->is_this_table_dirty = false;
		$this->is_bm_EventLogID_dirty = false;
		$this->is_bm_EventType_dirty = false;
		$this->is_bm_ModuleID_dirty = false;
		$this->is_bm_AccountID_dirty = false;
		$this->is_bm_OperateIP_dirty = false;
		$this->is_bm_EventDesc_dirty = false;
		$this->is_bm_CreateTime_dirty = false;
		$this->is_bm_ImpactAccount_dirty = false;

	}
	
	public function /*string*/ getBmEventLogID()
	{
		return $this->bm_EventLogID;
	}
	
	public function /*void*/ setBmEventLogID(/*string*/ $bm_EventLogID)
	{
		$this->bm_EventLogID = SQLUtil::toSafeSQLString($bm_EventLogID);
		$this->is_bm_EventLogID_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setBmEventLogIDNull()
	{
		$this->bm_EventLogID = null;
		$this->is_bm_EventLogID_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*int*/ getBmEventType()
	{
		return $this->bm_EventType;
	}
	
	public function /*void*/ setBmEventType(/*int*/ $bm_EventType)
	{
		$this->bm_EventType = intval($bm_EventType);
		$this->is_bm_EventType_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setBmEventTypeNull()
	{
		$this->bm_EventType = null;
		$this->is_bm_EventType_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*int*/ getBmModuleID()
	{
		return $this->bm_ModuleID;
	}
	
	public function /*void*/ setBmModuleID(/*int*/ $bm_ModuleID)
	{
		$this->bm_ModuleID = intval($bm_ModuleID);
		$this->is_bm_ModuleID_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setBmModuleIDNull()
	{
		$this->bm_ModuleID = null;
		$this->is_bm_ModuleID_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*string*/ getBmAccountID()
	{
		return $this->bm_AccountID;
	}
	
	public function /*void*/ setBmAccountID(/*string*/ $bm_AccountID)
	{
		$this->bm_AccountID = SQLUtil::toSafeSQLString($bm_AccountID);
		$this->is_bm_AccountID_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setBmAccountIDNull()
	{
		$this->bm_AccountID = null;
		$this->is_bm_AccountID_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*string*/ getBmOperateIP()
	{
		return $this->bm_OperateIP;
	}
	
	public function /*void*/ setBmOperateIP(/*string*/ $bm_OperateIP)
	{
		$this->bm_OperateIP = SQLUtil::toSafeSQLString($bm_OperateIP);
		$this->is_bm_OperateIP_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setBmOperateIPNull()
	{
		$this->bm_OperateIP = null;
		$this->is_bm_OperateIP_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*string*/ getBmEventDesc()
	{
		return $this->bm_EventDesc;
	}
	
	public function /*void*/ setBmEventDesc(/*string*/ $bm_EventDesc)
	{
		$this->bm_EventDesc = SQLUtil::toSafeSQLString($bm_EventDesc);
		$this->is_bm_EventDesc_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setBmEventDescNull()
	{
		$this->bm_EventDesc = null;
		$this->is_bm_EventDesc_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*string*/ getBmCreateTime()
	{
		return $this->bm_CreateTime;
	}
	
	public function /*void*/ setBmCreateTime(/*string*/ $bm_CreateTime)
	{
		$this->bm_CreateTime = SQLUtil::toSafeSQLString($bm_CreateTime);
		$this->is_bm_CreateTime_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setBmCreateTimeNull()
	{
		$this->bm_CreateTime = null;
		$this->is_bm_CreateTime_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*string*/ getBmImpactAccount()
	{
		return $this->bm_ImpactAccount;
	}
	
	public function /*void*/ setBmImpactAccount(/*string*/ $bm_ImpactAccount)
	{
		$this->bm_ImpactAccount = SQLUtil::toSafeSQLString($bm_ImpactAccount);
		$this->is_bm_ImpactAccount_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setBmImpactAccountNull()
	{
		$this->bm_ImpactAccount = null;
		$this->is_bm_ImpactAccount_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	
	public function /*string*/ toDebugString()
	{
		$dbg = "(";
		
		$dbg .= ("bm_EventLogID={$this->bm_EventLogID},");
		$dbg .= ("bm_EventType={$this->bm_EventType},");
		$dbg .= ("bm_ModuleID={$this->bm_ModuleID},");
		$dbg .= ("bm_AccountID={$this->bm_AccountID},");
		$dbg .= ("bm_OperateIP={$this->bm_OperateIP},");
		$dbg .= ("bm_EventDesc={$this->bm_EventDesc},");
		$dbg .= ("bm_CreateTime={$this->bm_CreateTime},");
		$dbg .= ("bm_ImpactAccount={$this->bm_ImpactAccount},");

		$dbg .= ")";
				
		return str_replace(",)",")",$dbg);
	}
	
	public function fromArray($arr)
	{
		if (isset($arr['bm_EventLogID'])) $this->setBmEventLogID($arr['bm_EventLogID']);
		if (isset($arr['bm_EventType'])) $this->setBmEventType($arr['bm_EventType']);
		if (isset($arr['bm_ModuleID'])) $this->setBmModuleID($arr['bm_ModuleID']);
		if (isset($arr['bm_AccountID'])) $this->setBmAccountID($arr['bm_AccountID']);
		if (isset($arr['bm_OperateIP'])) $this->setBmOperateIP($arr['bm_OperateIP']);
		if (isset($arr['bm_EventDesc'])) $this->setBmEventDesc($arr['bm_EventDesc']);
		if (isset($arr['bm_CreateTime'])) $this->setBmCreateTime($arr['bm_CreateTime']);
		if (isset($arr['bm_ImpactAccount'])) $this->setBmImpactAccount($arr['bm_ImpactAccount']);
		
	}
	
	public function toArray()
	{
		$ret = array();
		$ret['bm_EventLogID'] = $this->bm_EventLogID;
		$ret['bm_EventType'] = $this->bm_EventType;
		$ret['bm_ModuleID'] = $this->bm_ModuleID;
		$ret['bm_AccountID'] = $this->bm_AccountID;
		$ret['bm_OperateIP'] = $this->bm_OperateIP;
		$ret['bm_EventDesc'] = $this->bm_EventDesc;
		$ret['bm_CreateTime'] = $this->bm_CreateTime;
		$ret['bm_ImpactAccount'] = $this->bm_ImpactAccount;

		return $ret;
	}
}

?>
