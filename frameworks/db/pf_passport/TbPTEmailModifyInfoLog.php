<?php
require_once (FRAMEWORK_PATH . "utils/MysqlDBHelper.php");
require_once (FRAMEWORK_PATH . "db/SQLUtil.php");
/**
 * database table PT_EmailModifyInfoLog description
 * 
 * [This file was auto-generated. PLEASE DONT EDIT]
 * 
 * @author LiangZhixian
 * 
 */
class TbPTEmailModifyInfoLog {
	
	public static $_db_name = "pf_passport";
	
	private /*string*/ $pt_ModifyID; //PRIMARY KEY 
	private /*string*/ $pt_AccountKey;
	private /*int*/ $pt_ModiftyType; //0,             1,密码             2,身份证             3,Email                          51,邮箱认证
	private /*string*/ $pt_ModifyInfo;
	private /*int*/ $pt_UpdateState; //0,默认             1,修改完成
	private /*string*/ $pt_OtherInfo;
	private /*string*/ $pt_CreateTime;
	private /*string*/ $pt_UpdateTime;

	
	private $is_this_table_dirty = false;
	private $is_pt_ModifyID_dirty = false;
	private $is_pt_AccountKey_dirty = false;
	private $is_pt_ModiftyType_dirty = false;
	private $is_pt_ModifyInfo_dirty = false;
	private $is_pt_UpdateState_dirty = false;
	private $is_pt_OtherInfo_dirty = false;
	private $is_pt_CreateTime_dirty = false;
	private $is_pt_UpdateTime_dirty = false;


	/**
	 * @param array($condition)
	 * @return array(TbPTEmailModifyInfoLog)
	 */
	public static function /*array(TbPTEmailModifyInfoLog)*/ loadTable(/*array*/ $fields=NULL,/*array*/$condition=NULL)
	{
		$result = array();
		
		$f = "*";
		
		if(!empty($fields))
		{
			$f = SQLUtil::parseFields($fields);			
		}
		
		if (empty($condition))
		{
			$sql = "SELECT {$f} FROM `PT_EmailModifyInfoLog`";
		}
		else
		{			
			$sql = "SELECT {$f} FROM `PT_EmailModifyInfoLog` WHERE ".SQLUtil::parseCondition($condition);
		}			
		
		$ar = sql_fetch_rows_assoc(self::$_db_name,$sql);
		
		if (empty($ar) || count($ar) == 0)
		{
			return $result;
		}
		
		foreach($ar as $row)
		{
			$tb = new TbPTEmailModifyInfoLog();			
			if (isset($row['pt_ModifyID'])) $tb->pt_ModifyID = $row['pt_ModifyID'];
			if (isset($row['pt_AccountKey'])) $tb->pt_AccountKey = $row['pt_AccountKey'];
			if (isset($row['pt_ModiftyType'])) $tb->pt_ModiftyType = intval($row['pt_ModiftyType']);
			if (isset($row['pt_ModifyInfo'])) $tb->pt_ModifyInfo = $row['pt_ModifyInfo'];
			if (isset($row['pt_UpdateState'])) $tb->pt_UpdateState = intval($row['pt_UpdateState']);
			if (isset($row['pt_OtherInfo'])) $tb->pt_OtherInfo = $row['pt_OtherInfo'];
			if (isset($row['pt_CreateTime'])) $tb->pt_CreateTime = $row['pt_CreateTime'];
			if (isset($row['pt_UpdateTime'])) $tb->pt_UpdateTime = $row['pt_UpdateTime'];
		
			$result[] = $tb;
		}
		
		return $result;
	}	
	
	public static function insertSqlHeader(/*array*/ $fields=NULL)
	{
		$result = array();				
		if(!empty($fields)){
			$f = SQLUtil::parseFields($fields);			
			$result[0] = "INSERT INTO `PT_EmailModifyInfoLog` ({$f}) VALUES ";	
			$ar = array();
			foreach($fields as $key){
				$ar[$key]=1;
			}
			$result[1] = $ar;
		}else{
			$result[0]="INSERT INTO `PT_EmailModifyInfoLog` (`pt_ModifyID`,`pt_AccountKey`,`pt_ModiftyType`,`pt_ModifyInfo`,`pt_UpdateState`,`pt_OtherInfo`,`pt_CreateTime`,`pt_UpdateTime`) VALUES ";
			$result[1] = array('pt_ModifyID'=>1,'pt_AccountKey'=>1,'pt_ModiftyType'=>1,'pt_ModifyInfo'=>1,'pt_UpdateState'=>1,'pt_OtherInfo'=>1,'pt_CreateTime'=>1,'pt_UpdateTime'=>1);
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
		$c = "`pt_ModifyID`='{$this->pt_ModifyID}'";
		
		if(!empty($fields))
		{
			$f = SQLUtil::parseFields($fields);			
		}
	    if (!empty($condition))
		{
			$c =SQLUtil::parseCondition($condition);
		}
		
		$sql = "SELECT {$f} FROM `PT_EmailModifyInfoLog` WHERE {$c} LIMIT 1";


		$ars = sql_fetch_rows_assoc(self::$_db_name,$sql);
		
		if (!$ars || count($ars)==0)
		{
			return false;
		}
		
		$ar = $ars[0];
		
		if (isset($ar['pt_ModifyID'])) $this->pt_ModifyID = $ar['pt_ModifyID'];
		if (isset($ar['pt_AccountKey'])) $this->pt_AccountKey = $ar['pt_AccountKey'];
		if (isset($ar['pt_ModiftyType'])) $this->pt_ModiftyType = intval($ar['pt_ModiftyType']);
		if (isset($ar['pt_ModifyInfo'])) $this->pt_ModifyInfo = $ar['pt_ModifyInfo'];
		if (isset($ar['pt_UpdateState'])) $this->pt_UpdateState = intval($ar['pt_UpdateState']);
		if (isset($ar['pt_OtherInfo'])) $this->pt_OtherInfo = $ar['pt_OtherInfo'];
		if (isset($ar['pt_CreateTime'])) $this->pt_CreateTime = $ar['pt_CreateTime'];
		if (isset($ar['pt_UpdateTime'])) $this->pt_UpdateTime = $ar['pt_UpdateTime'];
		
		
		$this->clean();
		
		return true;
	}
	
	public function /*boolean*/ loadFromExistFields()
	{
		$emptyCondition = true;
    	$emptyFields = true;
    	
    	$fields = array();
    	$condition = array();
    	
    	if (!isset($this->pt_ModifyID)){
    		$emptyFields = false;
    		$fields[] = 'pt_ModifyID';
    	}else{
    		$emptyCondition = false; 
    		$condition['pt_ModifyID']=$this->pt_ModifyID;
    	}
    	if (!isset($this->pt_AccountKey)){
    		$emptyFields = false;
    		$fields[] = 'pt_AccountKey';
    	}else{
    		$emptyCondition = false; 
    		$condition['pt_AccountKey']=$this->pt_AccountKey;
    	}
    	if (!isset($this->pt_ModiftyType)){
    		$emptyFields = false;
    		$fields[] = 'pt_ModiftyType';
    	}else{
    		$emptyCondition = false; 
    		$condition['pt_ModiftyType']=$this->pt_ModiftyType;
    	}
    	if (!isset($this->pt_ModifyInfo)){
    		$emptyFields = false;
    		$fields[] = 'pt_ModifyInfo';
    	}else{
    		$emptyCondition = false; 
    		$condition['pt_ModifyInfo']=$this->pt_ModifyInfo;
    	}
    	if (!isset($this->pt_UpdateState)){
    		$emptyFields = false;
    		$fields[] = 'pt_UpdateState';
    	}else{
    		$emptyCondition = false; 
    		$condition['pt_UpdateState']=$this->pt_UpdateState;
    	}
    	if (!isset($this->pt_OtherInfo)){
    		$emptyFields = false;
    		$fields[] = 'pt_OtherInfo';
    	}else{
    		$emptyCondition = false; 
    		$condition['pt_OtherInfo']=$this->pt_OtherInfo;
    	}
    	if (!isset($this->pt_CreateTime)){
    		$emptyFields = false;
    		$fields[] = 'pt_CreateTime';
    	}else{
    		$emptyCondition = false; 
    		$condition['pt_CreateTime']=$this->pt_CreateTime;
    	}
    	if (!isset($this->pt_UpdateTime)){
    		$emptyFields = false;
    		$fields[] = 'pt_UpdateTime';
    	}else{
    		$emptyCondition = false; 
    		$condition['pt_UpdateTime']=$this->pt_UpdateTime;
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
			$uc = "`pt_ModifyID`='{$this->pt_ModifyID}'";
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
		
		$sql = "DELETE FROM `PT_EmailModifyInfoLog` WHERE ".SQLUtil::parseCondition($condition);
		
		$qr = sql_query(self::$_db_name,$sql);
				
		return (boolean)$qr;
	}
	
	public function /*boolean*/ delete()
	{
		if (!$this->is_set_keys())
		{
			return false;
		}
		
		$sql = "DELETE FROM `PT_EmailModifyInfoLog` WHERE `pt_ModifyID`='{$this->pt_ModifyID}'";
		

		$qr = sql_query(self::$_db_name,$sql);
				
		return (boolean)$qr;
	}
	
	public function getInsertValue($fields)
	{
		$values = "(";		
		foreach($fields as $f => $k){
			if($f == 'pt_ModifyID'){
 				$values .= "'{$this->pt_ModifyID}',";
 			}else if($f == 'pt_AccountKey'){
 				$values .= "'{$this->pt_AccountKey}',";
 			}else if($f == 'pt_ModiftyType'){
 				$values .= "'{$this->pt_ModiftyType}',";
 			}else if($f == 'pt_ModifyInfo'){
 				$values .= "'{$this->pt_ModifyInfo}',";
 			}else if($f == 'pt_UpdateState'){
 				$values .= "'{$this->pt_UpdateState}',";
 			}else if($f == 'pt_OtherInfo'){
 				$values .= "'{$this->pt_OtherInfo}',";
 			}else if($f == 'pt_CreateTime'){
 				$values .= "'{$this->pt_CreateTime}',";
 			}else if($f == 'pt_UpdateTime'){
 				$values .= "'{$this->pt_UpdateTime}',";
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

		if (isset($this->pt_ModifyID))
		{
			$fields .= "`pt_ModifyID`,";
			$values .= "'{$this->pt_ModifyID}',";
		}
		if (isset($this->pt_AccountKey))
		{
			$fields .= "`pt_AccountKey`,";
			$values .= "'{$this->pt_AccountKey}',";
		}
		if (isset($this->pt_ModiftyType))
		{
			$fields .= "`pt_ModiftyType`,";
			$values .= "'{$this->pt_ModiftyType}',";
		}
		if (isset($this->pt_ModifyInfo))
		{
			$fields .= "`pt_ModifyInfo`,";
			$values .= "'{$this->pt_ModifyInfo}',";
		}
		if (isset($this->pt_UpdateState))
		{
			$fields .= "`pt_UpdateState`,";
			$values .= "'{$this->pt_UpdateState}',";
		}
		if (isset($this->pt_OtherInfo))
		{
			$fields .= "`pt_OtherInfo`,";
			$values .= "'{$this->pt_OtherInfo}',";
		}
		if (isset($this->pt_CreateTime))
		{
			$fields .= "`pt_CreateTime`,";
			$values .= "'{$this->pt_CreateTime}',";
		}
		if (isset($this->pt_UpdateTime))
		{
			$fields .= "`pt_UpdateTime`,";
			$values .= "'{$this->pt_UpdateTime}',";
		}

		
		$fields .= ")";
		$values .= ")";
		
		$sql = "INSERT INTO `PT_EmailModifyInfoLog` ".$fields.$values;
		
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
		if ($this->is_pt_ModiftyType_dirty)
		{			
			if (!isset($this->pt_ModiftyType))
			{
				$update .= ("`pt_ModiftyType`=null,");
			}
			else
			{
				$update .= ("`pt_ModiftyType`='{$this->pt_ModiftyType}',");
			}
		}
		if ($this->is_pt_ModifyInfo_dirty)
		{			
			if (!isset($this->pt_ModifyInfo))
			{
				$update .= ("`pt_ModifyInfo`=null,");
			}
			else
			{
				$update .= ("`pt_ModifyInfo`='{$this->pt_ModifyInfo}',");
			}
		}
		if ($this->is_pt_UpdateState_dirty)
		{			
			if (!isset($this->pt_UpdateState))
			{
				$update .= ("`pt_UpdateState`=null,");
			}
			else
			{
				$update .= ("`pt_UpdateState`='{$this->pt_UpdateState}',");
			}
		}
		if ($this->is_pt_OtherInfo_dirty)
		{			
			if (!isset($this->pt_OtherInfo))
			{
				$update .= ("`pt_OtherInfo`=null,");
			}
			else
			{
				$update .= ("`pt_OtherInfo`='{$this->pt_OtherInfo}',");
			}
		}
		if ($this->is_pt_CreateTime_dirty)
		{			
			if (!isset($this->pt_CreateTime))
			{
				$update .= ("`pt_CreateTime`=null,");
			}
			else
			{
				$update .= ("`pt_CreateTime`='{$this->pt_CreateTime}',");
			}
		}
		if ($this->is_pt_UpdateTime_dirty)
		{			
			if (!isset($this->pt_UpdateTime))
			{
				$update .= ("`pt_UpdateTime`=null,");
			}
			else
			{
				$update .= ("`pt_UpdateTime`='{$this->pt_UpdateTime}',");
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
		
		$sql = "UPDATE `PT_EmailModifyInfoLog` SET {$update} WHERE {$condition}";
		
		return $sql;
	}
	
	public function /*boolean*/ add($fieldsValue,$condition=NULL)
	{				
		if (empty($condition))
		{
			$uc = "`pt_ModifyID`='{$this->pt_ModifyID}'";
		}
		else
		{			
			$uc = SQLUtil::parseCondition($condition);
		}
		
		$update = SQLUtil::parseASFieldValues($fieldsValue);
		
		$sql = "UPDATE `PT_EmailModifyInfoLog` SET {$update} WHERE {$uc}";
		
		$qr = sql_query(self::$_db_name,$sql);
				
		return (boolean)$qr;
	}	
	
	public function /*boolean*/ sub($fieldsValue,$condition=NULL)
	{
		if (empty($condition))
		{
			$uc = "`pt_ModifyID`='{$this->pt_ModifyID}'";
		}
		else
		{			
			$uc = SQLUtil::parseCondition($condition);
		}
		
		$update = SQLUtil::parseASFieldValues($fieldsValue,false);
		
		$sql = "UPDATE `PT_EmailModifyInfoLog` SET {$update} WHERE {$uc}";
		
		$qr = sql_query(self::$_db_name,$sql);
				
		return (boolean)$qr;
	}
	
	/**
	 * 是否已经设置主键的值
	 */
	public function is_set_keys()
	{
		
		return (isset($this->pt_ModifyID));

	}
	
	private function /*void*/ clean() 
	{
		$this->is_this_table_dirty = false;
		$this->is_pt_ModifyID_dirty = false;
		$this->is_pt_AccountKey_dirty = false;
		$this->is_pt_ModiftyType_dirty = false;
		$this->is_pt_ModifyInfo_dirty = false;
		$this->is_pt_UpdateState_dirty = false;
		$this->is_pt_OtherInfo_dirty = false;
		$this->is_pt_CreateTime_dirty = false;
		$this->is_pt_UpdateTime_dirty = false;

	}
	
	public function /*string*/ getPtModifyID()
	{
		return $this->pt_ModifyID;
	}
	
	public function /*void*/ setPtModifyID(/*string*/ $pt_ModifyID)
	{
		$this->pt_ModifyID = SQLUtil::toSafeSQLString($pt_ModifyID);
		$this->is_pt_ModifyID_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setPtModifyIDNull()
	{
		$this->pt_ModifyID = null;
		$this->is_pt_ModifyID_dirty = true;		
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

	public function /*int*/ getPtModiftyType()
	{
		return $this->pt_ModiftyType;
	}
	
	public function /*void*/ setPtModiftyType(/*int*/ $pt_ModiftyType)
	{
		$this->pt_ModiftyType = intval($pt_ModiftyType);
		$this->is_pt_ModiftyType_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setPtModiftyTypeNull()
	{
		$this->pt_ModiftyType = null;
		$this->is_pt_ModiftyType_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*string*/ getPtModifyInfo()
	{
		return $this->pt_ModifyInfo;
	}
	
	public function /*void*/ setPtModifyInfo(/*string*/ $pt_ModifyInfo)
	{
		$this->pt_ModifyInfo = SQLUtil::toSafeSQLString($pt_ModifyInfo);
		$this->is_pt_ModifyInfo_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setPtModifyInfoNull()
	{
		$this->pt_ModifyInfo = null;
		$this->is_pt_ModifyInfo_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*int*/ getPtUpdateState()
	{
		return $this->pt_UpdateState;
	}
	
	public function /*void*/ setPtUpdateState(/*int*/ $pt_UpdateState)
	{
		$this->pt_UpdateState = intval($pt_UpdateState);
		$this->is_pt_UpdateState_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setPtUpdateStateNull()
	{
		$this->pt_UpdateState = null;
		$this->is_pt_UpdateState_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*string*/ getPtOtherInfo()
	{
		return $this->pt_OtherInfo;
	}
	
	public function /*void*/ setPtOtherInfo(/*string*/ $pt_OtherInfo)
	{
		$this->pt_OtherInfo = SQLUtil::toSafeSQLString($pt_OtherInfo);
		$this->is_pt_OtherInfo_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setPtOtherInfoNull()
	{
		$this->pt_OtherInfo = null;
		$this->is_pt_OtherInfo_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*string*/ getPtCreateTime()
	{
		return $this->pt_CreateTime;
	}
	
	public function /*void*/ setPtCreateTime(/*string*/ $pt_CreateTime)
	{
		$this->pt_CreateTime = SQLUtil::toSafeSQLString($pt_CreateTime);
		$this->is_pt_CreateTime_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setPtCreateTimeNull()
	{
		$this->pt_CreateTime = null;
		$this->is_pt_CreateTime_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*string*/ getPtUpdateTime()
	{
		return $this->pt_UpdateTime;
	}
	
	public function /*void*/ setPtUpdateTime(/*string*/ $pt_UpdateTime)
	{
		$this->pt_UpdateTime = SQLUtil::toSafeSQLString($pt_UpdateTime);
		$this->is_pt_UpdateTime_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setPtUpdateTimeNull()
	{
		$this->pt_UpdateTime = null;
		$this->is_pt_UpdateTime_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	
	public function /*string*/ toDebugString()
	{
		$dbg = "(";
		
		$dbg .= ("pt_ModifyID={$this->pt_ModifyID},");
		$dbg .= ("pt_AccountKey={$this->pt_AccountKey},");
		$dbg .= ("pt_ModiftyType={$this->pt_ModiftyType},");
		$dbg .= ("pt_ModifyInfo={$this->pt_ModifyInfo},");
		$dbg .= ("pt_UpdateState={$this->pt_UpdateState},");
		$dbg .= ("pt_OtherInfo={$this->pt_OtherInfo},");
		$dbg .= ("pt_CreateTime={$this->pt_CreateTime},");
		$dbg .= ("pt_UpdateTime={$this->pt_UpdateTime},");

		$dbg .= ")";
				
		return str_replace(",)",")",$dbg);
	}
	
	public function fromArray($arr)
	{
		if (isset($arr['pt_ModifyID'])) $this->setPtModifyID($arr['pt_ModifyID']);
		if (isset($arr['pt_AccountKey'])) $this->setPtAccountKey($arr['pt_AccountKey']);
		if (isset($arr['pt_ModiftyType'])) $this->setPtModiftyType($arr['pt_ModiftyType']);
		if (isset($arr['pt_ModifyInfo'])) $this->setPtModifyInfo($arr['pt_ModifyInfo']);
		if (isset($arr['pt_UpdateState'])) $this->setPtUpdateState($arr['pt_UpdateState']);
		if (isset($arr['pt_OtherInfo'])) $this->setPtOtherInfo($arr['pt_OtherInfo']);
		if (isset($arr['pt_CreateTime'])) $this->setPtCreateTime($arr['pt_CreateTime']);
		if (isset($arr['pt_UpdateTime'])) $this->setPtUpdateTime($arr['pt_UpdateTime']);
		
	}
	
	public function toArray()
	{
		$ret = array();
		$ret['pt_ModifyID'] = $this->pt_ModifyID;
		$ret['pt_AccountKey'] = $this->pt_AccountKey;
		$ret['pt_ModiftyType'] = $this->pt_ModiftyType;
		$ret['pt_ModifyInfo'] = $this->pt_ModifyInfo;
		$ret['pt_UpdateState'] = $this->pt_UpdateState;
		$ret['pt_OtherInfo'] = $this->pt_OtherInfo;
		$ret['pt_CreateTime'] = $this->pt_CreateTime;
		$ret['pt_UpdateTime'] = $this->pt_UpdateTime;

		return $ret;
	}
}

?>
