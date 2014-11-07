<?php
require_once (FRAMEWORK_PATH . "utils/MysqlDBHelper.php");
require_once (FRAMEWORK_PATH . "db/SQLUtil.php");
/**
 * database table PT_AccountInfoModifyLog description
 * 
 * [This file was auto-generated. PLEASE DONT EDIT]
 * 
 * @author LiangZhixian
 * 
 */
class TbPTAccountInfoModifyLog {
	
	public static $_db_name = "pf_passport";
	
	private /*string*/ $pt_AccInfoMDLogIndex; //PRIMARY KEY 
	private /*string*/ $pt_AccountKey;
	private /*int*/ $pt_ModifyType; //0,自己修改             1,后台修改
	private /*string*/ $pt_ModifyInfo;
	private /*string*/ $pt_Operator;
	private /*string*/ $pt_OperateTime;
	private /*string*/ $pt_OperateIP;

	
	private $is_this_table_dirty = false;
	private $is_pt_AccInfoMDLogIndex_dirty = false;
	private $is_pt_AccountKey_dirty = false;
	private $is_pt_ModifyType_dirty = false;
	private $is_pt_ModifyInfo_dirty = false;
	private $is_pt_Operator_dirty = false;
	private $is_pt_OperateTime_dirty = false;
	private $is_pt_OperateIP_dirty = false;


	/**
	 * @param array($condition)
	 * @return array(TbPTAccountInfoModifyLog)
	 */
	public static function /*array(TbPTAccountInfoModifyLog)*/ loadTable(/*array*/ $fields=NULL,/*array*/$condition=NULL)
	{
		$result = array();
		
		$f = "*";
		
		if(!empty($fields))
		{
			$f = SQLUtil::parseFields($fields);			
		}
		
		if (empty($condition))
		{
			$sql = "SELECT {$f} FROM `PT_AccountInfoModifyLog`";
		}
		else
		{			
			$sql = "SELECT {$f} FROM `PT_AccountInfoModifyLog` WHERE ".SQLUtil::parseCondition($condition);
		}			
		
		$ar = sql_fetch_rows_assoc(self::$_db_name,$sql);
		
		if (empty($ar) || count($ar) == 0)
		{
			return $result;
		}
		
		foreach($ar as $row)
		{
			$tb = new TbPTAccountInfoModifyLog();			
			if (isset($row['pt_AccInfoMDLogIndex'])) $tb->pt_AccInfoMDLogIndex = $row['pt_AccInfoMDLogIndex'];
			if (isset($row['pt_AccountKey'])) $tb->pt_AccountKey = $row['pt_AccountKey'];
			if (isset($row['pt_ModifyType'])) $tb->pt_ModifyType = intval($row['pt_ModifyType']);
			if (isset($row['pt_ModifyInfo'])) $tb->pt_ModifyInfo = $row['pt_ModifyInfo'];
			if (isset($row['pt_Operator'])) $tb->pt_Operator = $row['pt_Operator'];
			if (isset($row['pt_OperateTime'])) $tb->pt_OperateTime = $row['pt_OperateTime'];
			if (isset($row['pt_OperateIP'])) $tb->pt_OperateIP = $row['pt_OperateIP'];
		
			$result[] = $tb;
		}
		
		return $result;
	}	
	
	public static function insertSqlHeader(/*array*/ $fields=NULL)
	{
		$result = array();				
		if(!empty($fields)){
			$f = SQLUtil::parseFields($fields);			
			$result[0] = "INSERT INTO `PT_AccountInfoModifyLog` ({$f}) VALUES ";	
			$ar = array();
			foreach($fields as $key){
				$ar[$key]=1;
			}
			$result[1] = $ar;
		}else{
			$result[0]="INSERT INTO `PT_AccountInfoModifyLog` (`pt_AccInfoMDLogIndex`,`pt_AccountKey`,`pt_ModifyType`,`pt_ModifyInfo`,`pt_Operator`,`pt_OperateTime`,`pt_OperateIP`) VALUES ";
			$result[1] = array('pt_AccInfoMDLogIndex'=>1,'pt_AccountKey'=>1,'pt_ModifyType'=>1,'pt_ModifyInfo'=>1,'pt_Operator'=>1,'pt_OperateTime'=>1,'pt_OperateIP'=>1);
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
		$c = "`pt_AccInfoMDLogIndex`='{$this->pt_AccInfoMDLogIndex}'";
		
		if(!empty($fields))
		{
			$f = SQLUtil::parseFields($fields);			
		}
	    if (!empty($condition))
		{
			$c =SQLUtil::parseCondition($condition);
		}
		
		$sql = "SELECT {$f} FROM `PT_AccountInfoModifyLog` WHERE {$c} LIMIT 1";


		$ars = sql_fetch_rows_assoc(self::$_db_name,$sql);
		
		if (!$ars || count($ars)==0)
		{
			return false;
		}
		
		$ar = $ars[0];
		
		if (isset($ar['pt_AccInfoMDLogIndex'])) $this->pt_AccInfoMDLogIndex = $ar['pt_AccInfoMDLogIndex'];
		if (isset($ar['pt_AccountKey'])) $this->pt_AccountKey = $ar['pt_AccountKey'];
		if (isset($ar['pt_ModifyType'])) $this->pt_ModifyType = intval($ar['pt_ModifyType']);
		if (isset($ar['pt_ModifyInfo'])) $this->pt_ModifyInfo = $ar['pt_ModifyInfo'];
		if (isset($ar['pt_Operator'])) $this->pt_Operator = $ar['pt_Operator'];
		if (isset($ar['pt_OperateTime'])) $this->pt_OperateTime = $ar['pt_OperateTime'];
		if (isset($ar['pt_OperateIP'])) $this->pt_OperateIP = $ar['pt_OperateIP'];
		
		
		$this->clean();
		
		return true;
	}
	
	public function /*boolean*/ loadFromExistFields()
	{
		$emptyCondition = true;
    	$emptyFields = true;
    	
    	$fields = array();
    	$condition = array();
    	
    	if (!isset($this->pt_AccInfoMDLogIndex)){
    		$emptyFields = false;
    		$fields[] = 'pt_AccInfoMDLogIndex';
    	}else{
    		$emptyCondition = false; 
    		$condition['pt_AccInfoMDLogIndex']=$this->pt_AccInfoMDLogIndex;
    	}
    	if (!isset($this->pt_AccountKey)){
    		$emptyFields = false;
    		$fields[] = 'pt_AccountKey';
    	}else{
    		$emptyCondition = false; 
    		$condition['pt_AccountKey']=$this->pt_AccountKey;
    	}
    	if (!isset($this->pt_ModifyType)){
    		$emptyFields = false;
    		$fields[] = 'pt_ModifyType';
    	}else{
    		$emptyCondition = false; 
    		$condition['pt_ModifyType']=$this->pt_ModifyType;
    	}
    	if (!isset($this->pt_ModifyInfo)){
    		$emptyFields = false;
    		$fields[] = 'pt_ModifyInfo';
    	}else{
    		$emptyCondition = false; 
    		$condition['pt_ModifyInfo']=$this->pt_ModifyInfo;
    	}
    	if (!isset($this->pt_Operator)){
    		$emptyFields = false;
    		$fields[] = 'pt_Operator';
    	}else{
    		$emptyCondition = false; 
    		$condition['pt_Operator']=$this->pt_Operator;
    	}
    	if (!isset($this->pt_OperateTime)){
    		$emptyFields = false;
    		$fields[] = 'pt_OperateTime';
    	}else{
    		$emptyCondition = false; 
    		$condition['pt_OperateTime']=$this->pt_OperateTime;
    	}
    	if (!isset($this->pt_OperateIP)){
    		$emptyFields = false;
    		$fields[] = 'pt_OperateIP';
    	}else{
    		$emptyCondition = false; 
    		$condition['pt_OperateIP']=$this->pt_OperateIP;
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
				
		if (!isset($this->pt_AccInfoMDLogIndex)) $this->pt_AccInfoMDLogIndex = get_mysql_insert_id(self::$_db_name);

		
		$this->clean();
		
		return true;	
		
	}
	
	public function /*boolean*/ save(/*array*/$condition=NULL)
	{
		if (empty($condition))
		{
			$uc = "`pt_AccInfoMDLogIndex`='{$this->pt_AccInfoMDLogIndex}'";
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
		
		$sql = "DELETE FROM `PT_AccountInfoModifyLog` WHERE ".SQLUtil::parseCondition($condition);
		
		$qr = sql_query(self::$_db_name,$sql);
				
		return (boolean)$qr;
	}
	
	public function /*boolean*/ delete()
	{
		if (!$this->is_set_keys())
		{
			return false;
		}
		
		$sql = "DELETE FROM `PT_AccountInfoModifyLog` WHERE `pt_AccInfoMDLogIndex`='{$this->pt_AccInfoMDLogIndex}'";
		

		$qr = sql_query(self::$_db_name,$sql);
				
		return (boolean)$qr;
	}
	
	public function getInsertValue($fields)
	{
		$values = "(";		
		foreach($fields as $f => $k){
			if($f == 'pt_AccInfoMDLogIndex'){
 				$values .= "'{$this->pt_AccInfoMDLogIndex}',";
 			}else if($f == 'pt_AccountKey'){
 				$values .= "'{$this->pt_AccountKey}',";
 			}else if($f == 'pt_ModifyType'){
 				$values .= "'{$this->pt_ModifyType}',";
 			}else if($f == 'pt_ModifyInfo'){
 				$values .= "'{$this->pt_ModifyInfo}',";
 			}else if($f == 'pt_Operator'){
 				$values .= "'{$this->pt_Operator}',";
 			}else if($f == 'pt_OperateTime'){
 				$values .= "'{$this->pt_OperateTime}',";
 			}else if($f == 'pt_OperateIP'){
 				$values .= "'{$this->pt_OperateIP}',";
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

		if (isset($this->pt_AccInfoMDLogIndex))
		{
			$fields .= "`pt_AccInfoMDLogIndex`,";
			$values .= "'{$this->pt_AccInfoMDLogIndex}',";
		}
		if (isset($this->pt_AccountKey))
		{
			$fields .= "`pt_AccountKey`,";
			$values .= "'{$this->pt_AccountKey}',";
		}
		if (isset($this->pt_ModifyType))
		{
			$fields .= "`pt_ModifyType`,";
			$values .= "'{$this->pt_ModifyType}',";
		}
		if (isset($this->pt_ModifyInfo))
		{
			$fields .= "`pt_ModifyInfo`,";
			$values .= "'{$this->pt_ModifyInfo}',";
		}
		if (isset($this->pt_Operator))
		{
			$fields .= "`pt_Operator`,";
			$values .= "'{$this->pt_Operator}',";
		}
		if (isset($this->pt_OperateTime))
		{
			$fields .= "`pt_OperateTime`,";
			$values .= "'{$this->pt_OperateTime}',";
		}
		if (isset($this->pt_OperateIP))
		{
			$fields .= "`pt_OperateIP`,";
			$values .= "'{$this->pt_OperateIP}',";
		}

		
		$fields .= ")";
		$values .= ")";
		
		$sql = "INSERT INTO `PT_AccountInfoModifyLog` ".$fields.$values;
		
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
		if ($this->is_pt_ModifyType_dirty)
		{			
			if (!isset($this->pt_ModifyType))
			{
				$update .= ("`pt_ModifyType`=null,");
			}
			else
			{
				$update .= ("`pt_ModifyType`='{$this->pt_ModifyType}',");
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
		if ($this->is_pt_Operator_dirty)
		{			
			if (!isset($this->pt_Operator))
			{
				$update .= ("`pt_Operator`=null,");
			}
			else
			{
				$update .= ("`pt_Operator`='{$this->pt_Operator}',");
			}
		}
		if ($this->is_pt_OperateTime_dirty)
		{			
			if (!isset($this->pt_OperateTime))
			{
				$update .= ("`pt_OperateTime`=null,");
			}
			else
			{
				$update .= ("`pt_OperateTime`='{$this->pt_OperateTime}',");
			}
		}
		if ($this->is_pt_OperateIP_dirty)
		{			
			if (!isset($this->pt_OperateIP))
			{
				$update .= ("`pt_OperateIP`=null,");
			}
			else
			{
				$update .= ("`pt_OperateIP`='{$this->pt_OperateIP}',");
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
		
		$sql = "UPDATE `PT_AccountInfoModifyLog` SET {$update} WHERE {$condition}";
		
		return $sql;
	}
	
	public function /*boolean*/ add($fieldsValue,$condition=NULL)
	{				
		if (empty($condition))
		{
			$uc = "`pt_AccInfoMDLogIndex`='{$this->pt_AccInfoMDLogIndex}'";
		}
		else
		{			
			$uc = SQLUtil::parseCondition($condition);
		}
		
		$update = SQLUtil::parseASFieldValues($fieldsValue);
		
		$sql = "UPDATE `PT_AccountInfoModifyLog` SET {$update} WHERE {$uc}";
		
		$qr = sql_query(self::$_db_name,$sql);
				
		return (boolean)$qr;
	}	
	
	public function /*boolean*/ sub($fieldsValue,$condition=NULL)
	{
		if (empty($condition))
		{
			$uc = "`pt_AccInfoMDLogIndex`='{$this->pt_AccInfoMDLogIndex}'";
		}
		else
		{			
			$uc = SQLUtil::parseCondition($condition);
		}
		
		$update = SQLUtil::parseASFieldValues($fieldsValue,false);
		
		$sql = "UPDATE `PT_AccountInfoModifyLog` SET {$update} WHERE {$uc}";
		
		$qr = sql_query(self::$_db_name,$sql);
				
		return (boolean)$qr;
	}
	
	/**
	 * 是否已经设置主键的值
	 */
	public function is_set_keys()
	{
		
		return (isset($this->pt_AccInfoMDLogIndex));

	}
	
	private function /*void*/ clean() 
	{
		$this->is_this_table_dirty = false;
		$this->is_pt_AccInfoMDLogIndex_dirty = false;
		$this->is_pt_AccountKey_dirty = false;
		$this->is_pt_ModifyType_dirty = false;
		$this->is_pt_ModifyInfo_dirty = false;
		$this->is_pt_Operator_dirty = false;
		$this->is_pt_OperateTime_dirty = false;
		$this->is_pt_OperateIP_dirty = false;

	}
	
	public function /*string*/ getPtAccInfoMDLogIndex()
	{
		return $this->pt_AccInfoMDLogIndex;
	}
	
	public function /*void*/ setPtAccInfoMDLogIndex(/*string*/ $pt_AccInfoMDLogIndex)
	{
		$this->pt_AccInfoMDLogIndex = SQLUtil::toSafeSQLString($pt_AccInfoMDLogIndex);
		$this->is_pt_AccInfoMDLogIndex_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setPtAccInfoMDLogIndexNull()
	{
		$this->pt_AccInfoMDLogIndex = null;
		$this->is_pt_AccInfoMDLogIndex_dirty = true;		
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

	public function /*int*/ getPtModifyType()
	{
		return $this->pt_ModifyType;
	}
	
	public function /*void*/ setPtModifyType(/*int*/ $pt_ModifyType)
	{
		$this->pt_ModifyType = intval($pt_ModifyType);
		$this->is_pt_ModifyType_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setPtModifyTypeNull()
	{
		$this->pt_ModifyType = null;
		$this->is_pt_ModifyType_dirty = true;		
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

	public function /*string*/ getPtOperator()
	{
		return $this->pt_Operator;
	}
	
	public function /*void*/ setPtOperator(/*string*/ $pt_Operator)
	{
		$this->pt_Operator = SQLUtil::toSafeSQLString($pt_Operator);
		$this->is_pt_Operator_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setPtOperatorNull()
	{
		$this->pt_Operator = null;
		$this->is_pt_Operator_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*string*/ getPtOperateTime()
	{
		return $this->pt_OperateTime;
	}
	
	public function /*void*/ setPtOperateTime(/*string*/ $pt_OperateTime)
	{
		$this->pt_OperateTime = SQLUtil::toSafeSQLString($pt_OperateTime);
		$this->is_pt_OperateTime_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setPtOperateTimeNull()
	{
		$this->pt_OperateTime = null;
		$this->is_pt_OperateTime_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*string*/ getPtOperateIP()
	{
		return $this->pt_OperateIP;
	}
	
	public function /*void*/ setPtOperateIP(/*string*/ $pt_OperateIP)
	{
		$this->pt_OperateIP = SQLUtil::toSafeSQLString($pt_OperateIP);
		$this->is_pt_OperateIP_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setPtOperateIPNull()
	{
		$this->pt_OperateIP = null;
		$this->is_pt_OperateIP_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	
	public function /*string*/ toDebugString()
	{
		$dbg = "(";
		
		$dbg .= ("pt_AccInfoMDLogIndex={$this->pt_AccInfoMDLogIndex},");
		$dbg .= ("pt_AccountKey={$this->pt_AccountKey},");
		$dbg .= ("pt_ModifyType={$this->pt_ModifyType},");
		$dbg .= ("pt_ModifyInfo={$this->pt_ModifyInfo},");
		$dbg .= ("pt_Operator={$this->pt_Operator},");
		$dbg .= ("pt_OperateTime={$this->pt_OperateTime},");
		$dbg .= ("pt_OperateIP={$this->pt_OperateIP},");

		$dbg .= ")";
				
		return str_replace(",)",")",$dbg);
	}
	
	public function fromArray($arr)
	{
		if (isset($arr['pt_AccInfoMDLogIndex'])) $this->setPtAccInfoMDLogIndex($arr['pt_AccInfoMDLogIndex']);
		if (isset($arr['pt_AccountKey'])) $this->setPtAccountKey($arr['pt_AccountKey']);
		if (isset($arr['pt_ModifyType'])) $this->setPtModifyType($arr['pt_ModifyType']);
		if (isset($arr['pt_ModifyInfo'])) $this->setPtModifyInfo($arr['pt_ModifyInfo']);
		if (isset($arr['pt_Operator'])) $this->setPtOperator($arr['pt_Operator']);
		if (isset($arr['pt_OperateTime'])) $this->setPtOperateTime($arr['pt_OperateTime']);
		if (isset($arr['pt_OperateIP'])) $this->setPtOperateIP($arr['pt_OperateIP']);
		
	}
	
	public function toArray()
	{
		$ret = array();
		$ret['pt_AccInfoMDLogIndex'] = $this->pt_AccInfoMDLogIndex;
		$ret['pt_AccountKey'] = $this->pt_AccountKey;
		$ret['pt_ModifyType'] = $this->pt_ModifyType;
		$ret['pt_ModifyInfo'] = $this->pt_ModifyInfo;
		$ret['pt_Operator'] = $this->pt_Operator;
		$ret['pt_OperateTime'] = $this->pt_OperateTime;
		$ret['pt_OperateIP'] = $this->pt_OperateIP;

		return $ret;
	}
}

?>
