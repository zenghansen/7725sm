<?php
require_once (FRAMEWORK_PATH . "utils/MysqlDBHelper.php");
require_once (FRAMEWORK_PATH . "db/SQLUtil.php");
/**
 * database table BM_AccountGameInfoRight description
 * 
 * [This file was auto-generated. PLEASE DONT EDIT]
 * 
 * @author LiangZhixian
 * 
 */
class TbBMAccountGameInfoRight {
	
	public static $_db_name = "pf_basemanage";
	
	private /*string*/ $bm_AccountID; //PRIMARY KEY 后台帐号ID
	private /*int*/ $ga_AreaID; //PRIMARY KEY 分区ID
	private /*int*/ $ga_GameID; //PRIMARY KEY 游戏种类ID

	
	private $is_this_table_dirty = false;
	private $is_bm_AccountID_dirty = false;
	private $is_ga_AreaID_dirty = false;
	private $is_ga_GameID_dirty = false;


	/**
	 * @param array($condition)
	 * @return array(TbBMAccountGameInfoRight)
	 */
	public static function /*array(TbBMAccountGameInfoRight)*/ loadTable(/*array*/ $fields=NULL,/*array*/$condition=NULL)
	{
		$result = array();
		
		$f = "*";
		
		if(!empty($fields))
		{
			$f = SQLUtil::parseFields($fields);			
		}
		
		if (empty($condition))
		{
			$sql = "SELECT {$f} FROM `BM_AccountGameInfoRight`";
		}
		else
		{			
			$sql = "SELECT {$f} FROM `BM_AccountGameInfoRight` WHERE ".SQLUtil::parseCondition($condition);
		}			
		
		$ar = sql_fetch_rows_assoc(self::$_db_name,$sql);
		
		if (empty($ar) || count($ar) == 0)
		{
			return $result;
		}
		
		foreach($ar as $row)
		{
			$tb = new TbBMAccountGameInfoRight();			
			if (isset($row['bm_AccountID'])) $tb->bm_AccountID = $row['bm_AccountID'];
			if (isset($row['ga_AreaID'])) $tb->ga_AreaID = intval($row['ga_AreaID']);
			if (isset($row['ga_GameID'])) $tb->ga_GameID = intval($row['ga_GameID']);
		
			$result[] = $tb;
		}
		
		return $result;
	}	
	
	public static function insertSqlHeader(/*array*/ $fields=NULL)
	{
		$result = array();				
		if(!empty($fields)){
			$f = SQLUtil::parseFields($fields);			
			$result[0] = "INSERT INTO `BM_AccountGameInfoRight` ({$f}) VALUES ";	
			$ar = array();
			foreach($fields as $key){
				$ar[$key]=1;
			}
			$result[1] = $ar;
		}else{
			$result[0]="INSERT INTO `BM_AccountGameInfoRight` (`bm_AccountID`,`ga_AreaID`,`ga_GameID`) VALUES ";
			$result[1] = array('bm_AccountID'=>1,'ga_AreaID'=>1,'ga_GameID'=>1);
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
		$c = "`bm_AccountID`='{$this->bm_AccountID}' AND `ga_AreaID`='{$this->ga_AreaID}' AND `ga_GameID`='{$this->ga_GameID}'";
		
		if(!empty($fields))
		{
			$f = SQLUtil::parseFields($fields);			
		}
	    if (!empty($condition))
		{
			$c =SQLUtil::parseCondition($condition);
		}
		
		$sql = "SELECT {$f} FROM `BM_AccountGameInfoRight` WHERE {$c} LIMIT 1";


		$ars = sql_fetch_rows_assoc(self::$_db_name,$sql);
		
		if (!$ars || count($ars)==0)
		{
			return false;
		}
		
		$ar = $ars[0];
		
		if (isset($ar['bm_AccountID'])) $this->bm_AccountID = $ar['bm_AccountID'];
		if (isset($ar['ga_AreaID'])) $this->ga_AreaID = intval($ar['ga_AreaID']);
		if (isset($ar['ga_GameID'])) $this->ga_GameID = intval($ar['ga_GameID']);
		
		
		$this->clean();
		
		return true;
	}
	
	public function /*boolean*/ loadFromExistFields()
	{
		$emptyCondition = true;
    	$emptyFields = true;
    	
    	$fields = array();
    	$condition = array();
    	
    	if (!isset($this->bm_AccountID)){
    		$emptyFields = false;
    		$fields[] = 'bm_AccountID';
    	}else{
    		$emptyCondition = false; 
    		$condition['bm_AccountID']=$this->bm_AccountID;
    	}
    	if (!isset($this->ga_AreaID)){
    		$emptyFields = false;
    		$fields[] = 'ga_AreaID';
    	}else{
    		$emptyCondition = false; 
    		$condition['ga_AreaID']=$this->ga_AreaID;
    	}
    	if (!isset($this->ga_GameID)){
    		$emptyFields = false;
    		$fields[] = 'ga_GameID';
    	}else{
    		$emptyCondition = false; 
    		$condition['ga_GameID']=$this->ga_GameID;
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
			$uc = "`bm_AccountID`='{$this->bm_AccountID}' AND `ga_AreaID`='{$this->ga_AreaID}' AND `ga_GameID`='{$this->ga_GameID}'";
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
		
		$sql = "DELETE FROM `BM_AccountGameInfoRight` WHERE ".SQLUtil::parseCondition($condition);
		
		$qr = sql_query(self::$_db_name,$sql);
				
		return (boolean)$qr;
	}
	
	public function /*boolean*/ delete()
	{
		if (!$this->is_set_keys())
		{
			return false;
		}
		
		$sql = "DELETE FROM `BM_AccountGameInfoRight` WHERE `bm_AccountID`='{$this->bm_AccountID}' AND `ga_AreaID`='{$this->ga_AreaID}' AND `ga_GameID`='{$this->ga_GameID}'";
		

		$qr = sql_query(self::$_db_name,$sql);
				
		return (boolean)$qr;
	}
	
	public function getInsertValue($fields)
	{
		$values = "(";		
		foreach($fields as $f => $k){
			if($f == 'bm_AccountID'){
 				$values .= "'{$this->bm_AccountID}',";
 			}else if($f == 'ga_AreaID'){
 				$values .= "'{$this->ga_AreaID}',";
 			}else if($f == 'ga_GameID'){
 				$values .= "'{$this->ga_GameID}',";
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

		if (isset($this->bm_AccountID))
		{
			$fields .= "`bm_AccountID`,";
			$values .= "'{$this->bm_AccountID}',";
		}
		if (isset($this->ga_AreaID))
		{
			$fields .= "`ga_AreaID`,";
			$values .= "'{$this->ga_AreaID}',";
		}
		if (isset($this->ga_GameID))
		{
			$fields .= "`ga_GameID`,";
			$values .= "'{$this->ga_GameID}',";
		}

		
		$fields .= ")";
		$values .= ")";
		
		$sql = "INSERT INTO `BM_AccountGameInfoRight` ".$fields.$values;
		
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
		
		$sql = "UPDATE `BM_AccountGameInfoRight` SET {$update} WHERE {$condition}";
		
		return $sql;
	}
	
	public function /*boolean*/ add($fieldsValue,$condition=NULL)
	{				
		if (empty($condition))
		{
			$uc = "`bm_AccountID`='{$this->bm_AccountID}' AND `ga_AreaID`='{$this->ga_AreaID}' AND `ga_GameID`='{$this->ga_GameID}'";
		}
		else
		{			
			$uc = SQLUtil::parseCondition($condition);
		}
		
		$update = SQLUtil::parseASFieldValues($fieldsValue);
		
		$sql = "UPDATE `BM_AccountGameInfoRight` SET {$update} WHERE {$uc}";
		
		$qr = sql_query(self::$_db_name,$sql);
				
		return (boolean)$qr;
	}	
	
	public function /*boolean*/ sub($fieldsValue,$condition=NULL)
	{
		if (empty($condition))
		{
			$uc = "`bm_AccountID`='{$this->bm_AccountID}' AND `ga_AreaID`='{$this->ga_AreaID}' AND `ga_GameID`='{$this->ga_GameID}'";
		}
		else
		{			
			$uc = SQLUtil::parseCondition($condition);
		}
		
		$update = SQLUtil::parseASFieldValues($fieldsValue,false);
		
		$sql = "UPDATE `BM_AccountGameInfoRight` SET {$update} WHERE {$uc}";
		
		$qr = sql_query(self::$_db_name,$sql);
				
		return (boolean)$qr;
	}
	
	/**
	 * 是否已经设置主键的值
	 */
	public function is_set_keys()
	{
		
		return (isset($this->bm_AccountID) && isset($this->ga_AreaID) && isset($this->ga_GameID));

	}
	
	private function /*void*/ clean() 
	{
		$this->is_this_table_dirty = false;
		$this->is_bm_AccountID_dirty = false;
		$this->is_ga_AreaID_dirty = false;
		$this->is_ga_GameID_dirty = false;

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

	public function /*int*/ getGaGameID()
	{
		return $this->ga_GameID;
	}
	
	public function /*void*/ setGaGameID(/*int*/ $ga_GameID)
	{
		$this->ga_GameID = intval($ga_GameID);
		$this->is_ga_GameID_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setGaGameIDNull()
	{
		$this->ga_GameID = null;
		$this->is_ga_GameID_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	
	public function /*string*/ toDebugString()
	{
		$dbg = "(";
		
		$dbg .= ("bm_AccountID={$this->bm_AccountID},");
		$dbg .= ("ga_AreaID={$this->ga_AreaID},");
		$dbg .= ("ga_GameID={$this->ga_GameID},");

		$dbg .= ")";
				
		return str_replace(",)",")",$dbg);
	}
	
	public function fromArray($arr)
	{
		if (isset($arr['bm_AccountID'])) $this->setBmAccountID($arr['bm_AccountID']);
		if (isset($arr['ga_AreaID'])) $this->setGaAreaID($arr['ga_AreaID']);
		if (isset($arr['ga_GameID'])) $this->setGaGameID($arr['ga_GameID']);
		
	}
	
	public function toArray()
	{
		$ret = array();
		$ret['bm_AccountID'] = $this->bm_AccountID;
		$ret['ga_AreaID'] = $this->ga_AreaID;
		$ret['ga_GameID'] = $this->ga_GameID;

		return $ret;
	}
}

?>
