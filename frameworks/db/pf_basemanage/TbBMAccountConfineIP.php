<?php
require_once (FRAMEWORK_PATH . "utils/MysqlDBHelper.php");
require_once (FRAMEWORK_PATH . "db/SQLUtil.php");
/**
 * database table BM_AccountConfineIP description
 * 
 * [This file was auto-generated. PLEASE DONT EDIT]
 * 
 * @author LiangZhixian
 * 
 */
class TbBMAccountConfineIP {
	
	public static $_db_name = "pf_basemanage";
	
	private /*string*/ $bm_ConfineIP; //PRIMARY KEY 限制IP
	private /*string*/ $bm_AccountID; //PRIMARY KEY 后台帐号ID

	
	private $is_this_table_dirty = false;
	private $is_bm_ConfineIP_dirty = false;
	private $is_bm_AccountID_dirty = false;


	/**
	 * @param array($condition)
	 * @return array(TbBMAccountConfineIP)
	 */
	public static function /*array(TbBMAccountConfineIP)*/ loadTable(/*array*/ $fields=NULL,/*array*/$condition=NULL)
	{
		$result = array();
		
		$f = "*";
		
		if(!empty($fields))
		{
			$f = SQLUtil::parseFields($fields);			
		}
		
		if (empty($condition))
		{
			$sql = "SELECT {$f} FROM `BM_AccountConfineIP`";
		}
		else
		{			
			$sql = "SELECT {$f} FROM `BM_AccountConfineIP` WHERE ".SQLUtil::parseCondition($condition);
		}			
		
		$ar = sql_fetch_rows_assoc(self::$_db_name,$sql);
		
		if (empty($ar) || count($ar) == 0)
		{
			return $result;
		}
		
		foreach($ar as $row)
		{
			$tb = new TbBMAccountConfineIP();			
			if (isset($row['bm_ConfineIP'])) $tb->bm_ConfineIP = $row['bm_ConfineIP'];
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
			$result[0] = "INSERT INTO `BM_AccountConfineIP` ({$f}) VALUES ";	
			$ar = array();
			foreach($fields as $key){
				$ar[$key]=1;
			}
			$result[1] = $ar;
		}else{
			$result[0]="INSERT INTO `BM_AccountConfineIP` (`bm_ConfineIP`,`bm_AccountID`) VALUES ";
			$result[1] = array('bm_ConfineIP'=>1,'bm_AccountID'=>1);
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
		$c = "`bm_ConfineIP`='{$this->bm_ConfineIP}' AND `bm_AccountID`='{$this->bm_AccountID}'";
		
		if(!empty($fields))
		{
			$f = SQLUtil::parseFields($fields);			
		}
	    if (!empty($condition))
		{
			$c =SQLUtil::parseCondition($condition);
		}
		
		$sql = "SELECT {$f} FROM `BM_AccountConfineIP` WHERE {$c} LIMIT 1";


		$ars = sql_fetch_rows_assoc(self::$_db_name,$sql);
		
		if (!$ars || count($ars)==0)
		{
			return false;
		}
		
		$ar = $ars[0];
		
		if (isset($ar['bm_ConfineIP'])) $this->bm_ConfineIP = $ar['bm_ConfineIP'];
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
    	
    	if (!isset($this->bm_ConfineIP)){
    		$emptyFields = false;
    		$fields[] = 'bm_ConfineIP';
    	}else{
    		$emptyCondition = false; 
    		$condition['bm_ConfineIP']=$this->bm_ConfineIP;
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
			$uc = "`bm_ConfineIP`='{$this->bm_ConfineIP}' AND `bm_AccountID`='{$this->bm_AccountID}'";
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
		
		$sql = "DELETE FROM `BM_AccountConfineIP` WHERE ".SQLUtil::parseCondition($condition);
		
		$qr = sql_query(self::$_db_name,$sql);
				
		return (boolean)$qr;
	}
	
	public function /*boolean*/ delete()
	{
		if (!$this->is_set_keys())
		{
			return false;
		}
		
		$sql = "DELETE FROM `BM_AccountConfineIP` WHERE `bm_ConfineIP`='{$this->bm_ConfineIP}' AND `bm_AccountID`='{$this->bm_AccountID}'";
		

		$qr = sql_query(self::$_db_name,$sql);
				
		return (boolean)$qr;
	}
	
	public function getInsertValue($fields)
	{
		$values = "(";		
		foreach($fields as $f => $k){
			if($f == 'bm_ConfineIP'){
 				$values .= "'{$this->bm_ConfineIP}',";
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

		if (isset($this->bm_ConfineIP))
		{
			$fields .= "`bm_ConfineIP`,";
			$values .= "'{$this->bm_ConfineIP}',";
		}
		if (isset($this->bm_AccountID))
		{
			$fields .= "`bm_AccountID`,";
			$values .= "'{$this->bm_AccountID}',";
		}

		
		$fields .= ")";
		$values .= ")";
		
		$sql = "INSERT INTO `BM_AccountConfineIP` ".$fields.$values;
		
		return str_replace(",)",")",$sql);
	}
	
	private function /*string*/ getUpdateFields()
	{
		$update = "";
		

			
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
		
		$sql = "UPDATE `BM_AccountConfineIP` SET {$update} WHERE {$condition}";
		
		return $sql;
	}
	
	public function /*boolean*/ add($fieldsValue,$condition=NULL)
	{				
		if (empty($condition))
		{
			$uc = "`bm_ConfineIP`='{$this->bm_ConfineIP}' AND `bm_AccountID`='{$this->bm_AccountID}'";
		}
		else
		{			
			$uc = SQLUtil::parseCondition($condition);
		}
		
		$update = SQLUtil::parseASFieldValues($fieldsValue);
		
		$sql = "UPDATE `BM_AccountConfineIP` SET {$update} WHERE {$uc}";
		
		$qr = sql_query(self::$_db_name,$sql);
				
		return (boolean)$qr;
	}	
	
	public function /*boolean*/ sub($fieldsValue,$condition=NULL)
	{
		if (empty($condition))
		{
			$uc = "`bm_ConfineIP`='{$this->bm_ConfineIP}' AND `bm_AccountID`='{$this->bm_AccountID}'";
		}
		else
		{			
			$uc = SQLUtil::parseCondition($condition);
		}
		
		$update = SQLUtil::parseASFieldValues($fieldsValue,false);
		
		$sql = "UPDATE `BM_AccountConfineIP` SET {$update} WHERE {$uc}";
		
		$qr = sql_query(self::$_db_name,$sql);
				
		return (boolean)$qr;
	}
	
	/**
	 * 是否已经设置主键的值
	 */
	public function is_set_keys()
	{
		
		return (isset($this->bm_ConfineIP) && isset($this->bm_AccountID));

	}
	
	private function /*void*/ clean() 
	{
		$this->is_this_table_dirty = false;
		$this->is_bm_ConfineIP_dirty = false;
		$this->is_bm_AccountID_dirty = false;

	}
	
	public function /*string*/ getBmConfineIP()
	{
		return $this->bm_ConfineIP;
	}
	
	public function /*void*/ setBmConfineIP(/*string*/ $bm_ConfineIP)
	{
		$this->bm_ConfineIP = SQLUtil::toSafeSQLString($bm_ConfineIP);
		$this->is_bm_ConfineIP_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setBmConfineIPNull()
	{
		$this->bm_ConfineIP = null;
		$this->is_bm_ConfineIP_dirty = true;		
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
		
		$dbg .= ("bm_ConfineIP={$this->bm_ConfineIP},");
		$dbg .= ("bm_AccountID={$this->bm_AccountID},");

		$dbg .= ")";
				
		return str_replace(",)",")",$dbg);
	}
	
	public function fromArray($arr)
	{
		if (isset($arr['bm_ConfineIP'])) $this->setBmConfineIP($arr['bm_ConfineIP']);
		if (isset($arr['bm_AccountID'])) $this->setBmAccountID($arr['bm_AccountID']);
		
	}
	
	public function toArray()
	{
		$ret = array();
		$ret['bm_ConfineIP'] = $this->bm_ConfineIP;
		$ret['bm_AccountID'] = $this->bm_AccountID;

		return $ret;
	}
}

?>
