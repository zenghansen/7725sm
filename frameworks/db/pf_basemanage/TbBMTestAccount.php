<?php
require_once (FRAMEWORK_PATH . "utils/MysqlDBHelper.php");
require_once (FRAMEWORK_PATH . "db/SQLUtil.php");
/**
 * database table BM_TestAccount description
 * 
 * [This file was auto-generated. PLEASE DONT EDIT]
 * 
 * @author LiangZhixian
 * 
 */
class TbBMTestAccount {
	
	public static $_db_name = "pf_basemanage";
	
	private /*string*/ $pt_AccountID; //PRIMARY KEY 平台帐号
	private /*int*/ $bm_AddTime; //添加时间
	private /*string*/ $bm_AccountID; //添加人

	
	private $is_this_table_dirty = false;
	private $is_pt_AccountID_dirty = false;
	private $is_bm_AddTime_dirty = false;
	private $is_bm_AccountID_dirty = false;


	/**
	 * @param array($condition)
	 * @return array(TbBMTestAccount)
	 */
	public static function /*array(TbBMTestAccount)*/ loadTable(/*array*/ $fields=NULL,/*array*/$condition=NULL)
	{
		$result = array();
		
		$f = "*";
		
		if(!empty($fields))
		{
			$f = SQLUtil::parseFields($fields);			
		}
		
		if (empty($condition))
		{
			$sql = "SELECT {$f} FROM `BM_TestAccount`";
		}
		else
		{			
			$sql = "SELECT {$f} FROM `BM_TestAccount` WHERE ".SQLUtil::parseCondition($condition);
		}			
		
		$ar = sql_fetch_rows_assoc(self::$_db_name,$sql);
		
		if (empty($ar) || count($ar) == 0)
		{
			return $result;
		}
		
		foreach($ar as $row)
		{
			$tb = new TbBMTestAccount();			
			if (isset($row['pt_AccountID'])) $tb->pt_AccountID = $row['pt_AccountID'];
			if (isset($row['bm_AddTime'])) $tb->bm_AddTime = intval($row['bm_AddTime']);
			if (isset($row['bm_AccountID'])) $tb->bm_AccountID = $row['bm_AccountID'];
		
			$result[] = $tb;
		}
		
		return $result;
	}	
	
	public static function insertSqlHeader(/*array*/ $fields=NULL)
	{
		$result = array();				
		if(!empty($fields)){
			$f = SQLUtil::parseFields($fields);			
			$result[0] = "INSERT INTO `BM_TestAccount` ({$f}) VALUES ";	
			$ar = array();
			foreach($fields as $key){
				$ar[$key]=1;
			}
			$result[1] = $ar;
		}else{
			$result[0]="INSERT INTO `BM_TestAccount` (`pt_AccountID`,`bm_AddTime`,`bm_AccountID`) VALUES ";
			$result[1] = array('pt_AccountID'=>1,'bm_AddTime'=>1,'bm_AccountID'=>1);
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
		$c = "`pt_AccountID`='{$this->pt_AccountID}'";
		
		if(!empty($fields))
		{
			$f = SQLUtil::parseFields($fields);			
		}
	    if (!empty($condition))
		{
			$c =SQLUtil::parseCondition($condition);
		}
		
		$sql = "SELECT {$f} FROM `BM_TestAccount` WHERE {$c} LIMIT 1";


		$ars = sql_fetch_rows_assoc(self::$_db_name,$sql);
		
		if (!$ars || count($ars)==0)
		{
			return false;
		}
		
		$ar = $ars[0];
		
		if (isset($ar['pt_AccountID'])) $this->pt_AccountID = $ar['pt_AccountID'];
		if (isset($ar['bm_AddTime'])) $this->bm_AddTime = intval($ar['bm_AddTime']);
		if (isset($ar['bm_AccountID'])) $this->bm_AccountID = $ar['bm_AccountID'];
		
		
		$this->clean();
		
		return true;
	}
	
	public function /*boolean*/ loadFromExistFields()
	{
		$emptyCondition = true;
    	$emptyFields = true;
    	
    	$fields = array();
    	$condition = array();
    	
    	if (!isset($this->pt_AccountID)){
    		$emptyFields = false;
    		$fields[] = 'pt_AccountID';
    	}else{
    		$emptyCondition = false; 
    		$condition['pt_AccountID']=$this->pt_AccountID;
    	}
    	if (!isset($this->bm_AddTime)){
    		$emptyFields = false;
    		$fields[] = 'bm_AddTime';
    	}else{
    		$emptyCondition = false; 
    		$condition['bm_AddTime']=$this->bm_AddTime;
    	}
    	if (!isset($this->bm_AccountID)){
    		$emptyFields = false;
    		$fields[] = 'bm_AccountID';
    	}else{
    		$emptyCondition = false; 
    		$condition['bm_AccountID']=$this->bm_AccountID;
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
			$uc = "`pt_AccountID`='{$this->pt_AccountID}'";
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
		
		$sql = "DELETE FROM `BM_TestAccount` WHERE ".SQLUtil::parseCondition($condition);
		
		$qr = sql_query(self::$_db_name,$sql);
				
		return (boolean)$qr;
	}
	
	public function /*boolean*/ delete()
	{
		if (!$this->is_set_keys())
		{
			return false;
		}
		
		$sql = "DELETE FROM `BM_TestAccount` WHERE `pt_AccountID`='{$this->pt_AccountID}'";
		

		$qr = sql_query(self::$_db_name,$sql);
				
		return (boolean)$qr;
	}
	
	public function getInsertValue($fields)
	{
		$values = "(";		
		foreach($fields as $f => $k){
			if($f == 'pt_AccountID'){
 				$values .= "'{$this->pt_AccountID}',";
 			}else if($f == 'bm_AddTime'){
 				$values .= "'{$this->bm_AddTime}',";
 			}else if($f == 'bm_AccountID'){
 				$values .= "'{$this->bm_AccountID}',";
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

		if (isset($this->pt_AccountID))
		{
			$fields .= "`pt_AccountID`,";
			$values .= "'{$this->pt_AccountID}',";
		}
		if (isset($this->bm_AddTime))
		{
			$fields .= "`bm_AddTime`,";
			$values .= "'{$this->bm_AddTime}',";
		}
		if (isset($this->bm_AccountID))
		{
			$fields .= "`bm_AccountID`,";
			$values .= "'{$this->bm_AccountID}',";
		}

		
		$fields .= ")";
		$values .= ")";
		
		$sql = "INSERT INTO `BM_TestAccount` ".$fields.$values;
		
		return str_replace(",)",")",$sql);
	}
	
	private function /*string*/ getUpdateFields()
	{
		$update = "";
		
		if ($this->is_bm_AddTime_dirty)
		{			
			if (!isset($this->bm_AddTime))
			{
				$update .= ("`bm_AddTime`=null,");
			}
			else
			{
				$update .= ("`bm_AddTime`='{$this->bm_AddTime}',");
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
		
		$sql = "UPDATE `BM_TestAccount` SET {$update} WHERE {$condition}";
		
		return $sql;
	}
	
	public function /*boolean*/ add($fieldsValue,$condition=NULL)
	{				
		if (empty($condition))
		{
			$uc = "`pt_AccountID`='{$this->pt_AccountID}'";
		}
		else
		{			
			$uc = SQLUtil::parseCondition($condition);
		}
		
		$update = SQLUtil::parseASFieldValues($fieldsValue);
		
		$sql = "UPDATE `BM_TestAccount` SET {$update} WHERE {$uc}";
		
		$qr = sql_query(self::$_db_name,$sql);
				
		return (boolean)$qr;
	}	
	
	public function /*boolean*/ sub($fieldsValue,$condition=NULL)
	{
		if (empty($condition))
		{
			$uc = "`pt_AccountID`='{$this->pt_AccountID}'";
		}
		else
		{			
			$uc = SQLUtil::parseCondition($condition);
		}
		
		$update = SQLUtil::parseASFieldValues($fieldsValue,false);
		
		$sql = "UPDATE `BM_TestAccount` SET {$update} WHERE {$uc}";
		
		$qr = sql_query(self::$_db_name,$sql);
				
		return (boolean)$qr;
	}
	
	/**
	 * 是否已经设置主键的值
	 */
	public function is_set_keys()
	{
		
		return (isset($this->pt_AccountID));

	}
	
	private function /*void*/ clean() 
	{
		$this->is_this_table_dirty = false;
		$this->is_pt_AccountID_dirty = false;
		$this->is_bm_AddTime_dirty = false;
		$this->is_bm_AccountID_dirty = false;

	}
	
	public function /*string*/ getPtAccountID()
	{
		return $this->pt_AccountID;
	}
	
	public function /*void*/ setPtAccountID(/*string*/ $pt_AccountID)
	{
		$this->pt_AccountID = SQLUtil::toSafeSQLString($pt_AccountID);
		$this->is_pt_AccountID_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setPtAccountIDNull()
	{
		$this->pt_AccountID = null;
		$this->is_pt_AccountID_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*int*/ getBmAddTime()
	{
		return $this->bm_AddTime;
	}
	
	public function /*void*/ setBmAddTime(/*int*/ $bm_AddTime)
	{
		$this->bm_AddTime = intval($bm_AddTime);
		$this->is_bm_AddTime_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setBmAddTimeNull()
	{
		$this->bm_AddTime = null;
		$this->is_bm_AddTime_dirty = true;		
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

	
	public function /*string*/ toDebugString()
	{
		$dbg = "(";
		
		$dbg .= ("pt_AccountID={$this->pt_AccountID},");
		$dbg .= ("bm_AddTime={$this->bm_AddTime},");
		$dbg .= ("bm_AccountID={$this->bm_AccountID},");

		$dbg .= ")";
				
		return str_replace(",)",")",$dbg);
	}
	
	public function fromArray($arr)
	{
		if (isset($arr['pt_AccountID'])) $this->setPtAccountID($arr['pt_AccountID']);
		if (isset($arr['bm_AddTime'])) $this->setBmAddTime($arr['bm_AddTime']);
		if (isset($arr['bm_AccountID'])) $this->setBmAccountID($arr['bm_AccountID']);
		
	}
	
	public function toArray()
	{
		$ret = array();
		$ret['pt_AccountID'] = $this->pt_AccountID;
		$ret['bm_AddTime'] = $this->bm_AddTime;
		$ret['bm_AccountID'] = $this->bm_AccountID;

		return $ret;
	}
}

?>
