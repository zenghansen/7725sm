<?php
require_once (FRAMEWORK_PATH . "utils/MysqlDBHelper.php");
require_once (FRAMEWORK_PATH . "db/SQLUtil.php");
/**
 * database table SD_GameVersion description
 * 
 * [This file was auto-generated. PLEASE DONT EDIT]
 * 
 * @author LiangZhixian
 * 
 */
class TbSDGameVersion {
	
	public static $_db_name = "pf_basemanage";
	
	private /*int*/ $sd_GameVersionID; //PRIMARY KEY 
	private /*int*/ $ga_GameID; //游戏种类ID
	private /*string*/ $sd_GameVersion;
	private /*string*/ $sd_GameUpdateTime;

	
	private $is_this_table_dirty = false;
	private $is_sd_GameVersionID_dirty = false;
	private $is_ga_GameID_dirty = false;
	private $is_sd_GameVersion_dirty = false;
	private $is_sd_GameUpdateTime_dirty = false;


	/**
	 * @param array($condition)
	 * @return array(TbSDGameVersion)
	 */
	public static function /*array(TbSDGameVersion)*/ loadTable(/*array*/ $fields=NULL,/*array*/$condition=NULL)
	{
		$result = array();
		
		$f = "*";
		
		if(!empty($fields))
		{
			$f = SQLUtil::parseFields($fields);			
		}
		
		if (empty($condition))
		{
			$sql = "SELECT {$f} FROM `SD_GameVersion`";
		}
		else
		{			
			$sql = "SELECT {$f} FROM `SD_GameVersion` WHERE ".SQLUtil::parseCondition($condition);
		}			
		
		$ar = sql_fetch_rows_assoc(self::$_db_name,$sql);
		
		if (empty($ar) || count($ar) == 0)
		{
			return $result;
		}
		
		foreach($ar as $row)
		{
			$tb = new TbSDGameVersion();			
			if (isset($row['sd_GameVersionID'])) $tb->sd_GameVersionID = intval($row['sd_GameVersionID']);
			if (isset($row['ga_GameID'])) $tb->ga_GameID = intval($row['ga_GameID']);
			if (isset($row['sd_GameVersion'])) $tb->sd_GameVersion = $row['sd_GameVersion'];
			if (isset($row['sd_GameUpdateTime'])) $tb->sd_GameUpdateTime = $row['sd_GameUpdateTime'];
		
			$result[] = $tb;
		}
		
		return $result;
	}	
	
	public static function insertSqlHeader(/*array*/ $fields=NULL)
	{
		$result = array();				
		if(!empty($fields)){
			$f = SQLUtil::parseFields($fields);			
			$result[0] = "INSERT INTO `SD_GameVersion` ({$f}) VALUES ";	
			$ar = array();
			foreach($fields as $key){
				$ar[$key]=1;
			}
			$result[1] = $ar;
		}else{
			$result[0]="INSERT INTO `SD_GameVersion` (`sd_GameVersionID`,`ga_GameID`,`sd_GameVersion`,`sd_GameUpdateTime`) VALUES ";
			$result[1] = array('sd_GameVersionID'=>1,'ga_GameID'=>1,'sd_GameVersion'=>1,'sd_GameUpdateTime'=>1);
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
		$c = "`sd_GameVersionID`='{$this->sd_GameVersionID}'";
		
		if(!empty($fields))
		{
			$f = SQLUtil::parseFields($fields);			
		}
	    if (!empty($condition))
		{
			$c =SQLUtil::parseCondition($condition);
		}
		
		$sql = "SELECT {$f} FROM `SD_GameVersion` WHERE {$c} LIMIT 1";


		$ars = sql_fetch_rows_assoc(self::$_db_name,$sql);
		
		if (!$ars || count($ars)==0)
		{
			return false;
		}
		
		$ar = $ars[0];
		
		if (isset($ar['sd_GameVersionID'])) $this->sd_GameVersionID = intval($ar['sd_GameVersionID']);
		if (isset($ar['ga_GameID'])) $this->ga_GameID = intval($ar['ga_GameID']);
		if (isset($ar['sd_GameVersion'])) $this->sd_GameVersion = $ar['sd_GameVersion'];
		if (isset($ar['sd_GameUpdateTime'])) $this->sd_GameUpdateTime = $ar['sd_GameUpdateTime'];
		
		
		$this->clean();
		
		return true;
	}
	
	public function /*boolean*/ loadFromExistFields()
	{
		$emptyCondition = true;
    	$emptyFields = true;
    	
    	$fields = array();
    	$condition = array();
    	
    	if (!isset($this->sd_GameVersionID)){
    		$emptyFields = false;
    		$fields[] = 'sd_GameVersionID';
    	}else{
    		$emptyCondition = false; 
    		$condition['sd_GameVersionID']=$this->sd_GameVersionID;
    	}
    	if (!isset($this->ga_GameID)){
    		$emptyFields = false;
    		$fields[] = 'ga_GameID';
    	}else{
    		$emptyCondition = false; 
    		$condition['ga_GameID']=$this->ga_GameID;
    	}
    	if (!isset($this->sd_GameVersion)){
    		$emptyFields = false;
    		$fields[] = 'sd_GameVersion';
    	}else{
    		$emptyCondition = false; 
    		$condition['sd_GameVersion']=$this->sd_GameVersion;
    	}
    	if (!isset($this->sd_GameUpdateTime)){
    		$emptyFields = false;
    		$fields[] = 'sd_GameUpdateTime';
    	}else{
    		$emptyCondition = false; 
    		$condition['sd_GameUpdateTime']=$this->sd_GameUpdateTime;
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
			$uc = "`sd_GameVersionID`='{$this->sd_GameVersionID}'";
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
		
		$sql = "DELETE FROM `SD_GameVersion` WHERE ".SQLUtil::parseCondition($condition);
		
		$qr = sql_query(self::$_db_name,$sql);
				
		return (boolean)$qr;
	}
	
	public function /*boolean*/ delete()
	{
		if (!$this->is_set_keys())
		{
			return false;
		}
		
		$sql = "DELETE FROM `SD_GameVersion` WHERE `sd_GameVersionID`='{$this->sd_GameVersionID}'";
		

		$qr = sql_query(self::$_db_name,$sql);
				
		return (boolean)$qr;
	}
	
	public function getInsertValue($fields)
	{
		$values = "(";		
		foreach($fields as $f => $k){
			if($f == 'sd_GameVersionID'){
 				$values .= "'{$this->sd_GameVersionID}',";
 			}else if($f == 'ga_GameID'){
 				$values .= "'{$this->ga_GameID}',";
 			}else if($f == 'sd_GameVersion'){
 				$values .= "'{$this->sd_GameVersion}',";
 			}else if($f == 'sd_GameUpdateTime'){
 				$values .= "'{$this->sd_GameUpdateTime}',";
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

		if (isset($this->sd_GameVersionID))
		{
			$fields .= "`sd_GameVersionID`,";
			$values .= "'{$this->sd_GameVersionID}',";
		}
		if (isset($this->ga_GameID))
		{
			$fields .= "`ga_GameID`,";
			$values .= "'{$this->ga_GameID}',";
		}
		if (isset($this->sd_GameVersion))
		{
			$fields .= "`sd_GameVersion`,";
			$values .= "'{$this->sd_GameVersion}',";
		}
		if (isset($this->sd_GameUpdateTime))
		{
			$fields .= "`sd_GameUpdateTime`,";
			$values .= "'{$this->sd_GameUpdateTime}',";
		}

		
		$fields .= ")";
		$values .= ")";
		
		$sql = "INSERT INTO `SD_GameVersion` ".$fields.$values;
		
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
		if ($this->is_sd_GameVersion_dirty)
		{			
			if (!isset($this->sd_GameVersion))
			{
				$update .= ("`sd_GameVersion`=null,");
			}
			else
			{
				$update .= ("`sd_GameVersion`='{$this->sd_GameVersion}',");
			}
		}
		if ($this->is_sd_GameUpdateTime_dirty)
		{			
			if (!isset($this->sd_GameUpdateTime))
			{
				$update .= ("`sd_GameUpdateTime`=null,");
			}
			else
			{
				$update .= ("`sd_GameUpdateTime`='{$this->sd_GameUpdateTime}',");
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
		
		$sql = "UPDATE `SD_GameVersion` SET {$update} WHERE {$condition}";
		
		return $sql;
	}
	
	public function /*boolean*/ add($fieldsValue,$condition=NULL)
	{				
		if (empty($condition))
		{
			$uc = "`sd_GameVersionID`='{$this->sd_GameVersionID}'";
		}
		else
		{			
			$uc = SQLUtil::parseCondition($condition);
		}
		
		$update = SQLUtil::parseASFieldValues($fieldsValue);
		
		$sql = "UPDATE `SD_GameVersion` SET {$update} WHERE {$uc}";
		
		$qr = sql_query(self::$_db_name,$sql);
				
		return (boolean)$qr;
	}	
	
	public function /*boolean*/ sub($fieldsValue,$condition=NULL)
	{
		if (empty($condition))
		{
			$uc = "`sd_GameVersionID`='{$this->sd_GameVersionID}'";
		}
		else
		{			
			$uc = SQLUtil::parseCondition($condition);
		}
		
		$update = SQLUtil::parseASFieldValues($fieldsValue,false);
		
		$sql = "UPDATE `SD_GameVersion` SET {$update} WHERE {$uc}";
		
		$qr = sql_query(self::$_db_name,$sql);
				
		return (boolean)$qr;
	}
	
	/**
	 * 是否已经设置主键的值
	 */
	public function is_set_keys()
	{
		
		return (isset($this->sd_GameVersionID));

	}
	
	private function /*void*/ clean() 
	{
		$this->is_this_table_dirty = false;
		$this->is_sd_GameVersionID_dirty = false;
		$this->is_ga_GameID_dirty = false;
		$this->is_sd_GameVersion_dirty = false;
		$this->is_sd_GameUpdateTime_dirty = false;

	}
	
	public function /*int*/ getSdGameVersionID()
	{
		return $this->sd_GameVersionID;
	}
	
	public function /*void*/ setSdGameVersionID(/*int*/ $sd_GameVersionID)
	{
		$this->sd_GameVersionID = intval($sd_GameVersionID);
		$this->is_sd_GameVersionID_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setSdGameVersionIDNull()
	{
		$this->sd_GameVersionID = null;
		$this->is_sd_GameVersionID_dirty = true;		
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

	public function /*string*/ getSdGameVersion()
	{
		return $this->sd_GameVersion;
	}
	
	public function /*void*/ setSdGameVersion(/*string*/ $sd_GameVersion)
	{
		$this->sd_GameVersion = SQLUtil::toSafeSQLString($sd_GameVersion);
		$this->is_sd_GameVersion_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setSdGameVersionNull()
	{
		$this->sd_GameVersion = null;
		$this->is_sd_GameVersion_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*string*/ getSdGameUpdateTime()
	{
		return $this->sd_GameUpdateTime;
	}
	
	public function /*void*/ setSdGameUpdateTime(/*string*/ $sd_GameUpdateTime)
	{
		$this->sd_GameUpdateTime = SQLUtil::toSafeSQLString($sd_GameUpdateTime);
		$this->is_sd_GameUpdateTime_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setSdGameUpdateTimeNull()
	{
		$this->sd_GameUpdateTime = null;
		$this->is_sd_GameUpdateTime_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	
	public function /*string*/ toDebugString()
	{
		$dbg = "(";
		
		$dbg .= ("sd_GameVersionID={$this->sd_GameVersionID},");
		$dbg .= ("ga_GameID={$this->ga_GameID},");
		$dbg .= ("sd_GameVersion={$this->sd_GameVersion},");
		$dbg .= ("sd_GameUpdateTime={$this->sd_GameUpdateTime},");

		$dbg .= ")";
				
		return str_replace(",)",")",$dbg);
	}
	
	public function fromArray($arr)
	{
		if (isset($arr['sd_GameVersionID'])) $this->setSdGameVersionID($arr['sd_GameVersionID']);
		if (isset($arr['ga_GameID'])) $this->setGaGameID($arr['ga_GameID']);
		if (isset($arr['sd_GameVersion'])) $this->setSdGameVersion($arr['sd_GameVersion']);
		if (isset($arr['sd_GameUpdateTime'])) $this->setSdGameUpdateTime($arr['sd_GameUpdateTime']);
		
	}
	
	public function toArray()
	{
		$ret = array();
		$ret['sd_GameVersionID'] = $this->sd_GameVersionID;
		$ret['ga_GameID'] = $this->ga_GameID;
		$ret['sd_GameVersion'] = $this->sd_GameVersion;
		$ret['sd_GameUpdateTime'] = $this->sd_GameUpdateTime;

		return $ret;
	}
}

?>
