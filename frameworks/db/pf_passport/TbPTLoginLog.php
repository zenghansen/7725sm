<?php
require_once (FRAMEWORK_PATH . "utils/MysqlDBHelper.php");
require_once (FRAMEWORK_PATH . "db/SQLUtil.php");
/**
 * database table PT_LoginLog description
 * 
 * [This file was auto-generated. PLEASE DONT EDIT]
 * 
 * @author LiangZhixian
 * 
 */
class TbPTLoginLog {
	
	public static $_db_name = "pf_passport";
	
	private /*string*/ $pt_LoginlogIndex; //PRIMARY KEY 
	private /*string*/ $pt_AccountKey;
	private /*string*/ $pt_LoginIp;
	private /*string*/ $pt_LoginTime;
	private /*string*/ $pt_LoginSystem;

	
	private $is_this_table_dirty = false;
	private $is_pt_LoginlogIndex_dirty = false;
	private $is_pt_AccountKey_dirty = false;
	private $is_pt_LoginIp_dirty = false;
	private $is_pt_LoginTime_dirty = false;
	private $is_pt_LoginSystem_dirty = false;


	/**
	 * @param array($condition)
	 * @return array(TbPTLoginLog)
	 */
	public static function /*array(TbPTLoginLog)*/ loadTable(/*array*/ $fields=NULL,/*array*/$condition=NULL)
	{
		$result = array();
		
		$f = "*";
		
		if(!empty($fields))
		{
			$f = SQLUtil::parseFields($fields);			
		}
		
		if (empty($condition))
		{
			$sql = "SELECT {$f} FROM `PT_LoginLog`";
		}
		else
		{			
			$sql = "SELECT {$f} FROM `PT_LoginLog` WHERE ".SQLUtil::parseCondition($condition);
		}			
		
		$ar = sql_fetch_rows_assoc(self::$_db_name,$sql);
		
		if (empty($ar) || count($ar) == 0)
		{
			return $result;
		}
		
		foreach($ar as $row)
		{
			$tb = new TbPTLoginLog();			
			if (isset($row['pt_LoginlogIndex'])) $tb->pt_LoginlogIndex = $row['pt_LoginlogIndex'];
			if (isset($row['pt_AccountKey'])) $tb->pt_AccountKey = $row['pt_AccountKey'];
			if (isset($row['pt_LoginIp'])) $tb->pt_LoginIp = $row['pt_LoginIp'];
			if (isset($row['pt_LoginTime'])) $tb->pt_LoginTime = $row['pt_LoginTime'];
			if (isset($row['pt_LoginSystem'])) $tb->pt_LoginSystem = $row['pt_LoginSystem'];
		
			$result[] = $tb;
		}
		
		return $result;
	}	
	
	public static function insertSqlHeader(/*array*/ $fields=NULL)
	{
		$result = array();				
		if(!empty($fields)){
			$f = SQLUtil::parseFields($fields);			
			$result[0] = "INSERT INTO `PT_LoginLog` ({$f}) VALUES ";	
			$ar = array();
			foreach($fields as $key){
				$ar[$key]=1;
			}
			$result[1] = $ar;
		}else{
			$result[0]="INSERT INTO `PT_LoginLog` (`pt_LoginlogIndex`,`pt_AccountKey`,`pt_LoginIp`,`pt_LoginTime`,`pt_LoginSystem`) VALUES ";
			$result[1] = array('pt_LoginlogIndex'=>1,'pt_AccountKey'=>1,'pt_LoginIp'=>1,'pt_LoginTime'=>1,'pt_LoginSystem'=>1);
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
		$c = "`pt_LoginlogIndex`='{$this->pt_LoginlogIndex}'";
		
		if(!empty($fields))
		{
			$f = SQLUtil::parseFields($fields);			
		}
	    if (!empty($condition))
		{
			$c =SQLUtil::parseCondition($condition);
		}
		
		$sql = "SELECT {$f} FROM `PT_LoginLog` WHERE {$c} LIMIT 1";


		$ars = sql_fetch_rows_assoc(self::$_db_name,$sql);
		
		if (!$ars || count($ars)==0)
		{
			return false;
		}
		
		$ar = $ars[0];
		
		if (isset($ar['pt_LoginlogIndex'])) $this->pt_LoginlogIndex = $ar['pt_LoginlogIndex'];
		if (isset($ar['pt_AccountKey'])) $this->pt_AccountKey = $ar['pt_AccountKey'];
		if (isset($ar['pt_LoginIp'])) $this->pt_LoginIp = $ar['pt_LoginIp'];
		if (isset($ar['pt_LoginTime'])) $this->pt_LoginTime = $ar['pt_LoginTime'];
		if (isset($ar['pt_LoginSystem'])) $this->pt_LoginSystem = $ar['pt_LoginSystem'];
		
		
		$this->clean();
		
		return true;
	}
	
	public function /*boolean*/ loadFromExistFields()
	{
		$emptyCondition = true;
    	$emptyFields = true;
    	
    	$fields = array();
    	$condition = array();
    	
    	if (!isset($this->pt_LoginlogIndex)){
    		$emptyFields = false;
    		$fields[] = 'pt_LoginlogIndex';
    	}else{
    		$emptyCondition = false; 
    		$condition['pt_LoginlogIndex']=$this->pt_LoginlogIndex;
    	}
    	if (!isset($this->pt_AccountKey)){
    		$emptyFields = false;
    		$fields[] = 'pt_AccountKey';
    	}else{
    		$emptyCondition = false; 
    		$condition['pt_AccountKey']=$this->pt_AccountKey;
    	}
    	if (!isset($this->pt_LoginIp)){
    		$emptyFields = false;
    		$fields[] = 'pt_LoginIp';
    	}else{
    		$emptyCondition = false; 
    		$condition['pt_LoginIp']=$this->pt_LoginIp;
    	}
    	if (!isset($this->pt_LoginTime)){
    		$emptyFields = false;
    		$fields[] = 'pt_LoginTime';
    	}else{
    		$emptyCondition = false; 
    		$condition['pt_LoginTime']=$this->pt_LoginTime;
    	}
    	if (!isset($this->pt_LoginSystem)){
    		$emptyFields = false;
    		$fields[] = 'pt_LoginSystem';
    	}else{
    		$emptyCondition = false; 
    		$condition['pt_LoginSystem']=$this->pt_LoginSystem;
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
				
		if (!isset($this->pt_LoginlogIndex)) $this->pt_LoginlogIndex = get_mysql_insert_id(self::$_db_name);

		
		$this->clean();
		
		return true;	
		
	}
	
	public function /*boolean*/ save(/*array*/$condition=NULL)
	{
		if (empty($condition))
		{
			$uc = "`pt_LoginlogIndex`='{$this->pt_LoginlogIndex}'";
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
		
		$sql = "DELETE FROM `PT_LoginLog` WHERE ".SQLUtil::parseCondition($condition);
		
		$qr = sql_query(self::$_db_name,$sql);
				
		return (boolean)$qr;
	}
	
	public function /*boolean*/ delete()
	{
		if (!$this->is_set_keys())
		{
			return false;
		}
		
		$sql = "DELETE FROM `PT_LoginLog` WHERE `pt_LoginlogIndex`='{$this->pt_LoginlogIndex}'";
		

		$qr = sql_query(self::$_db_name,$sql);
				
		return (boolean)$qr;
	}
	
	public function getInsertValue($fields)
	{
		$values = "(";		
		foreach($fields as $f => $k){
			if($f == 'pt_LoginlogIndex'){
 				$values .= "'{$this->pt_LoginlogIndex}',";
 			}else if($f == 'pt_AccountKey'){
 				$values .= "'{$this->pt_AccountKey}',";
 			}else if($f == 'pt_LoginIp'){
 				$values .= "'{$this->pt_LoginIp}',";
 			}else if($f == 'pt_LoginTime'){
 				$values .= "'{$this->pt_LoginTime}',";
 			}else if($f == 'pt_LoginSystem'){
 				$values .= "'{$this->pt_LoginSystem}',";
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

		if (isset($this->pt_LoginlogIndex))
		{
			$fields .= "`pt_LoginlogIndex`,";
			$values .= "'{$this->pt_LoginlogIndex}',";
		}
		if (isset($this->pt_AccountKey))
		{
			$fields .= "`pt_AccountKey`,";
			$values .= "'{$this->pt_AccountKey}',";
		}
		if (isset($this->pt_LoginIp))
		{
			$fields .= "`pt_LoginIp`,";
			$values .= "'{$this->pt_LoginIp}',";
		}
		if (isset($this->pt_LoginTime))
		{
			$fields .= "`pt_LoginTime`,";
			$values .= "'{$this->pt_LoginTime}',";
		}
		if (isset($this->pt_LoginSystem))
		{
			$fields .= "`pt_LoginSystem`,";
			$values .= "'{$this->pt_LoginSystem}',";
		}

		
		$fields .= ")";
		$values .= ")";
		
		$sql = "INSERT INTO `PT_LoginLog` ".$fields.$values;
		
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
		if ($this->is_pt_LoginIp_dirty)
		{			
			if (!isset($this->pt_LoginIp))
			{
				$update .= ("`pt_LoginIp`=null,");
			}
			else
			{
				$update .= ("`pt_LoginIp`='{$this->pt_LoginIp}',");
			}
		}
		if ($this->is_pt_LoginTime_dirty)
		{			
			if (!isset($this->pt_LoginTime))
			{
				$update .= ("`pt_LoginTime`=null,");
			}
			else
			{
				$update .= ("`pt_LoginTime`='{$this->pt_LoginTime}',");
			}
		}
		if ($this->is_pt_LoginSystem_dirty)
		{			
			if (!isset($this->pt_LoginSystem))
			{
				$update .= ("`pt_LoginSystem`=null,");
			}
			else
			{
				$update .= ("`pt_LoginSystem`='{$this->pt_LoginSystem}',");
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
		
		$sql = "UPDATE `PT_LoginLog` SET {$update} WHERE {$condition}";
		
		return $sql;
	}
	
	public function /*boolean*/ add($fieldsValue,$condition=NULL)
	{				
		if (empty($condition))
		{
			$uc = "`pt_LoginlogIndex`='{$this->pt_LoginlogIndex}'";
		}
		else
		{			
			$uc = SQLUtil::parseCondition($condition);
		}
		
		$update = SQLUtil::parseASFieldValues($fieldsValue);
		
		$sql = "UPDATE `PT_LoginLog` SET {$update} WHERE {$uc}";
		
		$qr = sql_query(self::$_db_name,$sql);
				
		return (boolean)$qr;
	}	
	
	public function /*boolean*/ sub($fieldsValue,$condition=NULL)
	{
		if (empty($condition))
		{
			$uc = "`pt_LoginlogIndex`='{$this->pt_LoginlogIndex}'";
		}
		else
		{			
			$uc = SQLUtil::parseCondition($condition);
		}
		
		$update = SQLUtil::parseASFieldValues($fieldsValue,false);
		
		$sql = "UPDATE `PT_LoginLog` SET {$update} WHERE {$uc}";
		
		$qr = sql_query(self::$_db_name,$sql);
				
		return (boolean)$qr;
	}
	
	/**
	 * 是否已经设置主键的值
	 */
	public function is_set_keys()
	{
		
		return (isset($this->pt_LoginlogIndex));

	}
	
	private function /*void*/ clean() 
	{
		$this->is_this_table_dirty = false;
		$this->is_pt_LoginlogIndex_dirty = false;
		$this->is_pt_AccountKey_dirty = false;
		$this->is_pt_LoginIp_dirty = false;
		$this->is_pt_LoginTime_dirty = false;
		$this->is_pt_LoginSystem_dirty = false;

	}
	
	public function /*string*/ getPtLoginlogIndex()
	{
		return $this->pt_LoginlogIndex;
	}
	
	public function /*void*/ setPtLoginlogIndex(/*string*/ $pt_LoginlogIndex)
	{
		$this->pt_LoginlogIndex = SQLUtil::toSafeSQLString($pt_LoginlogIndex);
		$this->is_pt_LoginlogIndex_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setPtLoginlogIndexNull()
	{
		$this->pt_LoginlogIndex = null;
		$this->is_pt_LoginlogIndex_dirty = true;		
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

	public function /*string*/ getPtLoginIp()
	{
		return $this->pt_LoginIp;
	}
	
	public function /*void*/ setPtLoginIp(/*string*/ $pt_LoginIp)
	{
		$this->pt_LoginIp = SQLUtil::toSafeSQLString($pt_LoginIp);
		$this->is_pt_LoginIp_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setPtLoginIpNull()
	{
		$this->pt_LoginIp = null;
		$this->is_pt_LoginIp_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*string*/ getPtLoginTime()
	{
		return $this->pt_LoginTime;
	}
	
	public function /*void*/ setPtLoginTime(/*string*/ $pt_LoginTime)
	{
		$this->pt_LoginTime = SQLUtil::toSafeSQLString($pt_LoginTime);
		$this->is_pt_LoginTime_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setPtLoginTimeNull()
	{
		$this->pt_LoginTime = null;
		$this->is_pt_LoginTime_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*string*/ getPtLoginSystem()
	{
		return $this->pt_LoginSystem;
	}
	
	public function /*void*/ setPtLoginSystem(/*string*/ $pt_LoginSystem)
	{
		$this->pt_LoginSystem = SQLUtil::toSafeSQLString($pt_LoginSystem);
		$this->is_pt_LoginSystem_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setPtLoginSystemNull()
	{
		$this->pt_LoginSystem = null;
		$this->is_pt_LoginSystem_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	
	public function /*string*/ toDebugString()
	{
		$dbg = "(";
		
		$dbg .= ("pt_LoginlogIndex={$this->pt_LoginlogIndex},");
		$dbg .= ("pt_AccountKey={$this->pt_AccountKey},");
		$dbg .= ("pt_LoginIp={$this->pt_LoginIp},");
		$dbg .= ("pt_LoginTime={$this->pt_LoginTime},");
		$dbg .= ("pt_LoginSystem={$this->pt_LoginSystem},");

		$dbg .= ")";
				
		return str_replace(",)",")",$dbg);
	}
	
	public function fromArray($arr)
	{
		if (isset($arr['pt_LoginlogIndex'])) $this->setPtLoginlogIndex($arr['pt_LoginlogIndex']);
		if (isset($arr['pt_AccountKey'])) $this->setPtAccountKey($arr['pt_AccountKey']);
		if (isset($arr['pt_LoginIp'])) $this->setPtLoginIp($arr['pt_LoginIp']);
		if (isset($arr['pt_LoginTime'])) $this->setPtLoginTime($arr['pt_LoginTime']);
		if (isset($arr['pt_LoginSystem'])) $this->setPtLoginSystem($arr['pt_LoginSystem']);
		
	}
	
	public function toArray()
	{
		$ret = array();
		$ret['pt_LoginlogIndex'] = $this->pt_LoginlogIndex;
		$ret['pt_AccountKey'] = $this->pt_AccountKey;
		$ret['pt_LoginIp'] = $this->pt_LoginIp;
		$ret['pt_LoginTime'] = $this->pt_LoginTime;
		$ret['pt_LoginSystem'] = $this->pt_LoginSystem;

		return $ret;
	}
}

?>
