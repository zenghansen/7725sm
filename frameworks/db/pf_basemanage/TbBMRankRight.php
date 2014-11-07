<?php
require_once (FRAMEWORK_PATH . "utils/MysqlDBHelper.php");
require_once (FRAMEWORK_PATH . "db/SQLUtil.php");
/**
 * database table BM_RankRight description
 * 
 * [This file was auto-generated. PLEASE DONT EDIT]
 * 
 * @author LiangZhixian
 * 
 */
class TbBMRankRight {
	
	public static $_db_name = "pf_basemanage";
	
	private /*int*/ $bm_ModuleID; //PRIMARY KEY 模块ID
	private /*int*/ $bm_RankID; //PRIMARY KEY 级别ID

	
	private $is_this_table_dirty = false;
	private $is_bm_ModuleID_dirty = false;
	private $is_bm_RankID_dirty = false;


	/**
	 * @param array($condition)
	 * @return array(TbBMRankRight)
	 */
	public static function /*array(TbBMRankRight)*/ loadTable(/*array*/ $fields=NULL,/*array*/$condition=NULL)
	{
		$result = array();
		
		$f = "*";
		
		if(!empty($fields))
		{
			$f = SQLUtil::parseFields($fields);			
		}
		
		if (empty($condition))
		{
			$sql = "SELECT {$f} FROM `BM_RankRight`";
		}
		else
		{			
			$sql = "SELECT {$f} FROM `BM_RankRight` WHERE ".SQLUtil::parseCondition($condition);
		}			
		
		$ar = sql_fetch_rows_assoc(self::$_db_name,$sql);
		
		if (empty($ar) || count($ar) == 0)
		{
			return $result;
		}
		
		foreach($ar as $row)
		{
			$tb = new TbBMRankRight();			
			if (isset($row['bm_ModuleID'])) $tb->bm_ModuleID = intval($row['bm_ModuleID']);
			if (isset($row['bm_RankID'])) $tb->bm_RankID = intval($row['bm_RankID']);
		
			$result[] = $tb;
		}
		
		return $result;
	}	
	
	public static function insertSqlHeader(/*array*/ $fields=NULL)
	{
		$result = array();				
		if(!empty($fields)){
			$f = SQLUtil::parseFields($fields);			
			$result[0] = "INSERT INTO `BM_RankRight` ({$f}) VALUES ";	
			$ar = array();
			foreach($fields as $key){
				$ar[$key]=1;
			}
			$result[1] = $ar;
		}else{
			$result[0]="INSERT INTO `BM_RankRight` (`bm_ModuleID`,`bm_RankID`) VALUES ";
			$result[1] = array('bm_ModuleID'=>1,'bm_RankID'=>1);
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
		$c = "`bm_ModuleID`='{$this->bm_ModuleID}' AND `bm_RankID`='{$this->bm_RankID}'";
		
		if(!empty($fields))
		{
			$f = SQLUtil::parseFields($fields);			
		}
	    if (!empty($condition))
		{
			$c =SQLUtil::parseCondition($condition);
		}
		
		$sql = "SELECT {$f} FROM `BM_RankRight` WHERE {$c} LIMIT 1";


		$ars = sql_fetch_rows_assoc(self::$_db_name,$sql);
		
		if (!$ars || count($ars)==0)
		{
			return false;
		}
		
		$ar = $ars[0];
		
		if (isset($ar['bm_ModuleID'])) $this->bm_ModuleID = intval($ar['bm_ModuleID']);
		if (isset($ar['bm_RankID'])) $this->bm_RankID = intval($ar['bm_RankID']);
		
		
		$this->clean();
		
		return true;
	}
	
	public function /*boolean*/ loadFromExistFields()
	{
		$emptyCondition = true;
    	$emptyFields = true;
    	
    	$fields = array();
    	$condition = array();
    	
    	if (!isset($this->bm_ModuleID)){
    		$emptyFields = false;
    		$fields[] = 'bm_ModuleID';
    	}else{
    		$emptyCondition = false; 
    		$condition['bm_ModuleID']=$this->bm_ModuleID;
    	}
    	if (!isset($this->bm_RankID)){
    		$emptyFields = false;
    		$fields[] = 'bm_RankID';
    	}else{
    		$emptyCondition = false; 
    		$condition['bm_RankID']=$this->bm_RankID;
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
			$uc = "`bm_ModuleID`='{$this->bm_ModuleID}' AND `bm_RankID`='{$this->bm_RankID}'";
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
		
		$sql = "DELETE FROM `BM_RankRight` WHERE ".SQLUtil::parseCondition($condition);
		
		$qr = sql_query(self::$_db_name,$sql);
				
		return (boolean)$qr;
	}
	
	public function /*boolean*/ delete()
	{
		if (!$this->is_set_keys())
		{
			return false;
		}
		
		$sql = "DELETE FROM `BM_RankRight` WHERE `bm_ModuleID`='{$this->bm_ModuleID}' AND `bm_RankID`='{$this->bm_RankID}'";
		

		$qr = sql_query(self::$_db_name,$sql);
				
		return (boolean)$qr;
	}
	
	public function getInsertValue($fields)
	{
		$values = "(";		
		foreach($fields as $f => $k){
			if($f == 'bm_ModuleID'){
 				$values .= "'{$this->bm_ModuleID}',";
 			}else if($f == 'bm_RankID'){
 				$values .= "'{$this->bm_RankID}',";
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

		if (isset($this->bm_ModuleID))
		{
			$fields .= "`bm_ModuleID`,";
			$values .= "'{$this->bm_ModuleID}',";
		}
		if (isset($this->bm_RankID))
		{
			$fields .= "`bm_RankID`,";
			$values .= "'{$this->bm_RankID}',";
		}

		
		$fields .= ")";
		$values .= ")";
		
		$sql = "INSERT INTO `BM_RankRight` ".$fields.$values;
		
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
		
		$sql = "UPDATE `BM_RankRight` SET {$update} WHERE {$condition}";
		
		return $sql;
	}
	
	public function /*boolean*/ add($fieldsValue,$condition=NULL)
	{				
		if (empty($condition))
		{
			$uc = "`bm_ModuleID`='{$this->bm_ModuleID}' AND `bm_RankID`='{$this->bm_RankID}'";
		}
		else
		{			
			$uc = SQLUtil::parseCondition($condition);
		}
		
		$update = SQLUtil::parseASFieldValues($fieldsValue);
		
		$sql = "UPDATE `BM_RankRight` SET {$update} WHERE {$uc}";
		
		$qr = sql_query(self::$_db_name,$sql);
				
		return (boolean)$qr;
	}	
	
	public function /*boolean*/ sub($fieldsValue,$condition=NULL)
	{
		if (empty($condition))
		{
			$uc = "`bm_ModuleID`='{$this->bm_ModuleID}' AND `bm_RankID`='{$this->bm_RankID}'";
		}
		else
		{			
			$uc = SQLUtil::parseCondition($condition);
		}
		
		$update = SQLUtil::parseASFieldValues($fieldsValue,false);
		
		$sql = "UPDATE `BM_RankRight` SET {$update} WHERE {$uc}";
		
		$qr = sql_query(self::$_db_name,$sql);
				
		return (boolean)$qr;
	}
	
	/**
	 * 是否已经设置主键的值
	 */
	public function is_set_keys()
	{
		
		return (isset($this->bm_ModuleID) && isset($this->bm_RankID));

	}
	
	private function /*void*/ clean() 
	{
		$this->is_this_table_dirty = false;
		$this->is_bm_ModuleID_dirty = false;
		$this->is_bm_RankID_dirty = false;

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

	public function /*int*/ getBmRankID()
	{
		return $this->bm_RankID;
	}
	
	public function /*void*/ setBmRankID(/*int*/ $bm_RankID)
	{
		$this->bm_RankID = intval($bm_RankID);
		$this->is_bm_RankID_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setBmRankIDNull()
	{
		$this->bm_RankID = null;
		$this->is_bm_RankID_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	
	public function /*string*/ toDebugString()
	{
		$dbg = "(";
		
		$dbg .= ("bm_ModuleID={$this->bm_ModuleID},");
		$dbg .= ("bm_RankID={$this->bm_RankID},");

		$dbg .= ")";
				
		return str_replace(",)",")",$dbg);
	}
	
	public function fromArray($arr)
	{
		if (isset($arr['bm_ModuleID'])) $this->setBmModuleID($arr['bm_ModuleID']);
		if (isset($arr['bm_RankID'])) $this->setBmRankID($arr['bm_RankID']);
		
	}
	
	public function toArray()
	{
		$ret = array();
		$ret['bm_ModuleID'] = $this->bm_ModuleID;
		$ret['bm_RankID'] = $this->bm_RankID;

		return $ret;
	}
}

?>
