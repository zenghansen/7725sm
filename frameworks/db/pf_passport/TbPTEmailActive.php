<?php
require_once (FRAMEWORK_PATH . "utils/MysqlDBHelper.php");
require_once (FRAMEWORK_PATH . "db/SQLUtil.php");
/**
 * database table PT_EmailActive description
 * 
 * [This file was auto-generated. PLEASE DONT EDIT]
 * 
 * @author LiangZhixian
 * 
 */
class TbPTEmailActive {
	
	public static $_db_name = "pf_passport";
	
	private /*string*/ $pt_EmailActiveid; //PRIMARY KEY 
	private /*string*/ $pt_AccountKey;
	private /*int*/ $pt_EmailActiveState;
	private /*int*/ $pt_OperateKind; //0激活原邮箱             1激活新邮箱（修改新的邮箱并修改邮箱状态为激活）
	private /*string*/ $pt_ActiveEmail;
	private /*string*/ $pt_CreateTime;
	private /*string*/ $pt_ActiveTime;

	
	private $is_this_table_dirty = false;
	private $is_pt_EmailActiveid_dirty = false;
	private $is_pt_AccountKey_dirty = false;
	private $is_pt_EmailActiveState_dirty = false;
	private $is_pt_OperateKind_dirty = false;
	private $is_pt_ActiveEmail_dirty = false;
	private $is_pt_CreateTime_dirty = false;
	private $is_pt_ActiveTime_dirty = false;


	/**
	 * @param array($condition)
	 * @return array(TbPTEmailActive)
	 */
	public static function /*array(TbPTEmailActive)*/ loadTable(/*array*/ $fields=NULL,/*array*/$condition=NULL)
	{
		$result = array();
		
		$f = "*";
		
		if(!empty($fields))
		{
			$f = SQLUtil::parseFields($fields);			
		}
		
		if (empty($condition))
		{
			$sql = "SELECT {$f} FROM `PT_EmailActive`";
		}
		else
		{			
			$sql = "SELECT {$f} FROM `PT_EmailActive` WHERE ".SQLUtil::parseCondition($condition);
		}			
		
		$ar = sql_fetch_rows_assoc(self::$_db_name,$sql);
		
		if (empty($ar) || count($ar) == 0)
		{
			return $result;
		}
		
		foreach($ar as $row)
		{
			$tb = new TbPTEmailActive();			
			if (isset($row['pt_EmailActiveid'])) $tb->pt_EmailActiveid = $row['pt_EmailActiveid'];
			if (isset($row['pt_AccountKey'])) $tb->pt_AccountKey = $row['pt_AccountKey'];
			if (isset($row['pt_EmailActiveState'])) $tb->pt_EmailActiveState = intval($row['pt_EmailActiveState']);
			if (isset($row['pt_OperateKind'])) $tb->pt_OperateKind = intval($row['pt_OperateKind']);
			if (isset($row['pt_ActiveEmail'])) $tb->pt_ActiveEmail = $row['pt_ActiveEmail'];
			if (isset($row['pt_CreateTime'])) $tb->pt_CreateTime = $row['pt_CreateTime'];
			if (isset($row['pt_ActiveTime'])) $tb->pt_ActiveTime = $row['pt_ActiveTime'];
		
			$result[] = $tb;
		}
		
		return $result;
	}	
	
	public static function insertSqlHeader(/*array*/ $fields=NULL)
	{
		$result = array();				
		if(!empty($fields)){
			$f = SQLUtil::parseFields($fields);			
			$result[0] = "INSERT INTO `PT_EmailActive` ({$f}) VALUES ";	
			$ar = array();
			foreach($fields as $key){
				$ar[$key]=1;
			}
			$result[1] = $ar;
		}else{
			$result[0]="INSERT INTO `PT_EmailActive` (`pt_EmailActiveid`,`pt_AccountKey`,`pt_EmailActiveState`,`pt_OperateKind`,`pt_ActiveEmail`,`pt_CreateTime`,`pt_ActiveTime`) VALUES ";
			$result[1] = array('pt_EmailActiveid'=>1,'pt_AccountKey'=>1,'pt_EmailActiveState'=>1,'pt_OperateKind'=>1,'pt_ActiveEmail'=>1,'pt_CreateTime'=>1,'pt_ActiveTime'=>1);
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
		$c = "`pt_EmailActiveid`='{$this->pt_EmailActiveid}'";
		
		if(!empty($fields))
		{
			$f = SQLUtil::parseFields($fields);			
		}
	    if (!empty($condition))
		{
			$c =SQLUtil::parseCondition($condition);
		}
		
		$sql = "SELECT {$f} FROM `PT_EmailActive` WHERE {$c} LIMIT 1";


		$ars = sql_fetch_rows_assoc(self::$_db_name,$sql);
		
		if (!$ars || count($ars)==0)
		{
			return false;
		}
		
		$ar = $ars[0];
		
		if (isset($ar['pt_EmailActiveid'])) $this->pt_EmailActiveid = $ar['pt_EmailActiveid'];
		if (isset($ar['pt_AccountKey'])) $this->pt_AccountKey = $ar['pt_AccountKey'];
		if (isset($ar['pt_EmailActiveState'])) $this->pt_EmailActiveState = intval($ar['pt_EmailActiveState']);
		if (isset($ar['pt_OperateKind'])) $this->pt_OperateKind = intval($ar['pt_OperateKind']);
		if (isset($ar['pt_ActiveEmail'])) $this->pt_ActiveEmail = $ar['pt_ActiveEmail'];
		if (isset($ar['pt_CreateTime'])) $this->pt_CreateTime = $ar['pt_CreateTime'];
		if (isset($ar['pt_ActiveTime'])) $this->pt_ActiveTime = $ar['pt_ActiveTime'];
		
		
		$this->clean();
		
		return true;
	}
	
	public function /*boolean*/ loadFromExistFields()
	{
		$emptyCondition = true;
    	$emptyFields = true;
    	
    	$fields = array();
    	$condition = array();
    	
    	if (!isset($this->pt_EmailActiveid)){
    		$emptyFields = false;
    		$fields[] = 'pt_EmailActiveid';
    	}else{
    		$emptyCondition = false; 
    		$condition['pt_EmailActiveid']=$this->pt_EmailActiveid;
    	}
    	if (!isset($this->pt_AccountKey)){
    		$emptyFields = false;
    		$fields[] = 'pt_AccountKey';
    	}else{
    		$emptyCondition = false; 
    		$condition['pt_AccountKey']=$this->pt_AccountKey;
    	}
    	if (!isset($this->pt_EmailActiveState)){
    		$emptyFields = false;
    		$fields[] = 'pt_EmailActiveState';
    	}else{
    		$emptyCondition = false; 
    		$condition['pt_EmailActiveState']=$this->pt_EmailActiveState;
    	}
    	if (!isset($this->pt_OperateKind)){
    		$emptyFields = false;
    		$fields[] = 'pt_OperateKind';
    	}else{
    		$emptyCondition = false; 
    		$condition['pt_OperateKind']=$this->pt_OperateKind;
    	}
    	if (!isset($this->pt_ActiveEmail)){
    		$emptyFields = false;
    		$fields[] = 'pt_ActiveEmail';
    	}else{
    		$emptyCondition = false; 
    		$condition['pt_ActiveEmail']=$this->pt_ActiveEmail;
    	}
    	if (!isset($this->pt_CreateTime)){
    		$emptyFields = false;
    		$fields[] = 'pt_CreateTime';
    	}else{
    		$emptyCondition = false; 
    		$condition['pt_CreateTime']=$this->pt_CreateTime;
    	}
    	if (!isset($this->pt_ActiveTime)){
    		$emptyFields = false;
    		$fields[] = 'pt_ActiveTime';
    	}else{
    		$emptyCondition = false; 
    		$condition['pt_ActiveTime']=$this->pt_ActiveTime;
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
			$uc = "`pt_EmailActiveid`='{$this->pt_EmailActiveid}'";
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
		
		$sql = "DELETE FROM `PT_EmailActive` WHERE ".SQLUtil::parseCondition($condition);
		
		$qr = sql_query(self::$_db_name,$sql);
				
		return (boolean)$qr;
	}
	
	public function /*boolean*/ delete()
	{
		if (!$this->is_set_keys())
		{
			return false;
		}
		
		$sql = "DELETE FROM `PT_EmailActive` WHERE `pt_EmailActiveid`='{$this->pt_EmailActiveid}'";
		

		$qr = sql_query(self::$_db_name,$sql);
				
		return (boolean)$qr;
	}
	
	public function getInsertValue($fields)
	{
		$values = "(";		
		foreach($fields as $f => $k){
			if($f == 'pt_EmailActiveid'){
 				$values .= "'{$this->pt_EmailActiveid}',";
 			}else if($f == 'pt_AccountKey'){
 				$values .= "'{$this->pt_AccountKey}',";
 			}else if($f == 'pt_EmailActiveState'){
 				$values .= "'{$this->pt_EmailActiveState}',";
 			}else if($f == 'pt_OperateKind'){
 				$values .= "'{$this->pt_OperateKind}',";
 			}else if($f == 'pt_ActiveEmail'){
 				$values .= "'{$this->pt_ActiveEmail}',";
 			}else if($f == 'pt_CreateTime'){
 				$values .= "'{$this->pt_CreateTime}',";
 			}else if($f == 'pt_ActiveTime'){
 				$values .= "'{$this->pt_ActiveTime}',";
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

		if (isset($this->pt_EmailActiveid))
		{
			$fields .= "`pt_EmailActiveid`,";
			$values .= "'{$this->pt_EmailActiveid}',";
		}
		if (isset($this->pt_AccountKey))
		{
			$fields .= "`pt_AccountKey`,";
			$values .= "'{$this->pt_AccountKey}',";
		}
		if (isset($this->pt_EmailActiveState))
		{
			$fields .= "`pt_EmailActiveState`,";
			$values .= "'{$this->pt_EmailActiveState}',";
		}
		if (isset($this->pt_OperateKind))
		{
			$fields .= "`pt_OperateKind`,";
			$values .= "'{$this->pt_OperateKind}',";
		}
		if (isset($this->pt_ActiveEmail))
		{
			$fields .= "`pt_ActiveEmail`,";
			$values .= "'{$this->pt_ActiveEmail}',";
		}
		if (isset($this->pt_CreateTime))
		{
			$fields .= "`pt_CreateTime`,";
			$values .= "'{$this->pt_CreateTime}',";
		}
		if (isset($this->pt_ActiveTime))
		{
			$fields .= "`pt_ActiveTime`,";
			$values .= "'{$this->pt_ActiveTime}',";
		}

		
		$fields .= ")";
		$values .= ")";
		
		$sql = "INSERT INTO `PT_EmailActive` ".$fields.$values;
		
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
		if ($this->is_pt_EmailActiveState_dirty)
		{			
			if (!isset($this->pt_EmailActiveState))
			{
				$update .= ("`pt_EmailActiveState`=null,");
			}
			else
			{
				$update .= ("`pt_EmailActiveState`='{$this->pt_EmailActiveState}',");
			}
		}
		if ($this->is_pt_OperateKind_dirty)
		{			
			if (!isset($this->pt_OperateKind))
			{
				$update .= ("`pt_OperateKind`=null,");
			}
			else
			{
				$update .= ("`pt_OperateKind`='{$this->pt_OperateKind}',");
			}
		}
		if ($this->is_pt_ActiveEmail_dirty)
		{			
			if (!isset($this->pt_ActiveEmail))
			{
				$update .= ("`pt_ActiveEmail`=null,");
			}
			else
			{
				$update .= ("`pt_ActiveEmail`='{$this->pt_ActiveEmail}',");
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
		if ($this->is_pt_ActiveTime_dirty)
		{			
			if (!isset($this->pt_ActiveTime))
			{
				$update .= ("`pt_ActiveTime`=null,");
			}
			else
			{
				$update .= ("`pt_ActiveTime`='{$this->pt_ActiveTime}',");
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
		
		$sql = "UPDATE `PT_EmailActive` SET {$update} WHERE {$condition}";
		
		return $sql;
	}
	
	public function /*boolean*/ add($fieldsValue,$condition=NULL)
	{				
		if (empty($condition))
		{
			$uc = "`pt_EmailActiveid`='{$this->pt_EmailActiveid}'";
		}
		else
		{			
			$uc = SQLUtil::parseCondition($condition);
		}
		
		$update = SQLUtil::parseASFieldValues($fieldsValue);
		
		$sql = "UPDATE `PT_EmailActive` SET {$update} WHERE {$uc}";
		
		$qr = sql_query(self::$_db_name,$sql);
				
		return (boolean)$qr;
	}	
	
	public function /*boolean*/ sub($fieldsValue,$condition=NULL)
	{
		if (empty($condition))
		{
			$uc = "`pt_EmailActiveid`='{$this->pt_EmailActiveid}'";
		}
		else
		{			
			$uc = SQLUtil::parseCondition($condition);
		}
		
		$update = SQLUtil::parseASFieldValues($fieldsValue,false);
		
		$sql = "UPDATE `PT_EmailActive` SET {$update} WHERE {$uc}";
		
		$qr = sql_query(self::$_db_name,$sql);
				
		return (boolean)$qr;
	}
	
	/**
	 * 是否已经设置主键的值
	 */
	public function is_set_keys()
	{
		
		return (isset($this->pt_EmailActiveid));

	}
	
	private function /*void*/ clean() 
	{
		$this->is_this_table_dirty = false;
		$this->is_pt_EmailActiveid_dirty = false;
		$this->is_pt_AccountKey_dirty = false;
		$this->is_pt_EmailActiveState_dirty = false;
		$this->is_pt_OperateKind_dirty = false;
		$this->is_pt_ActiveEmail_dirty = false;
		$this->is_pt_CreateTime_dirty = false;
		$this->is_pt_ActiveTime_dirty = false;

	}
	
	public function /*string*/ getPtEmailActiveid()
	{
		return $this->pt_EmailActiveid;
	}
	
	public function /*void*/ setPtEmailActiveid(/*string*/ $pt_EmailActiveid)
	{
		$this->pt_EmailActiveid = SQLUtil::toSafeSQLString($pt_EmailActiveid);
		$this->is_pt_EmailActiveid_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setPtEmailActiveidNull()
	{
		$this->pt_EmailActiveid = null;
		$this->is_pt_EmailActiveid_dirty = true;		
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

	public function /*int*/ getPtEmailActiveState()
	{
		return $this->pt_EmailActiveState;
	}
	
	public function /*void*/ setPtEmailActiveState(/*int*/ $pt_EmailActiveState)
	{
		$this->pt_EmailActiveState = intval($pt_EmailActiveState);
		$this->is_pt_EmailActiveState_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setPtEmailActiveStateNull()
	{
		$this->pt_EmailActiveState = null;
		$this->is_pt_EmailActiveState_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*int*/ getPtOperateKind()
	{
		return $this->pt_OperateKind;
	}
	
	public function /*void*/ setPtOperateKind(/*int*/ $pt_OperateKind)
	{
		$this->pt_OperateKind = intval($pt_OperateKind);
		$this->is_pt_OperateKind_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setPtOperateKindNull()
	{
		$this->pt_OperateKind = null;
		$this->is_pt_OperateKind_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*string*/ getPtActiveEmail()
	{
		return $this->pt_ActiveEmail;
	}
	
	public function /*void*/ setPtActiveEmail(/*string*/ $pt_ActiveEmail)
	{
		$this->pt_ActiveEmail = SQLUtil::toSafeSQLString($pt_ActiveEmail);
		$this->is_pt_ActiveEmail_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setPtActiveEmailNull()
	{
		$this->pt_ActiveEmail = null;
		$this->is_pt_ActiveEmail_dirty = true;		
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

	public function /*string*/ getPtActiveTime()
	{
		return $this->pt_ActiveTime;
	}
	
	public function /*void*/ setPtActiveTime(/*string*/ $pt_ActiveTime)
	{
		$this->pt_ActiveTime = SQLUtil::toSafeSQLString($pt_ActiveTime);
		$this->is_pt_ActiveTime_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setPtActiveTimeNull()
	{
		$this->pt_ActiveTime = null;
		$this->is_pt_ActiveTime_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	
	public function /*string*/ toDebugString()
	{
		$dbg = "(";
		
		$dbg .= ("pt_EmailActiveid={$this->pt_EmailActiveid},");
		$dbg .= ("pt_AccountKey={$this->pt_AccountKey},");
		$dbg .= ("pt_EmailActiveState={$this->pt_EmailActiveState},");
		$dbg .= ("pt_OperateKind={$this->pt_OperateKind},");
		$dbg .= ("pt_ActiveEmail={$this->pt_ActiveEmail},");
		$dbg .= ("pt_CreateTime={$this->pt_CreateTime},");
		$dbg .= ("pt_ActiveTime={$this->pt_ActiveTime},");

		$dbg .= ")";
				
		return str_replace(",)",")",$dbg);
	}
	
	public function fromArray($arr)
	{
		if (isset($arr['pt_EmailActiveid'])) $this->setPtEmailActiveid($arr['pt_EmailActiveid']);
		if (isset($arr['pt_AccountKey'])) $this->setPtAccountKey($arr['pt_AccountKey']);
		if (isset($arr['pt_EmailActiveState'])) $this->setPtEmailActiveState($arr['pt_EmailActiveState']);
		if (isset($arr['pt_OperateKind'])) $this->setPtOperateKind($arr['pt_OperateKind']);
		if (isset($arr['pt_ActiveEmail'])) $this->setPtActiveEmail($arr['pt_ActiveEmail']);
		if (isset($arr['pt_CreateTime'])) $this->setPtCreateTime($arr['pt_CreateTime']);
		if (isset($arr['pt_ActiveTime'])) $this->setPtActiveTime($arr['pt_ActiveTime']);
		
	}
	
	public function toArray()
	{
		$ret = array();
		$ret['pt_EmailActiveid'] = $this->pt_EmailActiveid;
		$ret['pt_AccountKey'] = $this->pt_AccountKey;
		$ret['pt_EmailActiveState'] = $this->pt_EmailActiveState;
		$ret['pt_OperateKind'] = $this->pt_OperateKind;
		$ret['pt_ActiveEmail'] = $this->pt_ActiveEmail;
		$ret['pt_CreateTime'] = $this->pt_CreateTime;
		$ret['pt_ActiveTime'] = $this->pt_ActiveTime;

		return $ret;
	}
}

?>
