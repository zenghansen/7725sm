<?php
require_once (FRAMEWORK_PATH . "utils/MysqlDBHelper.php");
require_once (FRAMEWORK_PATH . "db/SQLUtil.php");
/**
 * database table SD_AdvertisementInfo description
 * 
 * [This file was auto-generated. PLEASE DONT EDIT]
 * 
 * @author LiangZhixian
 * 
 */
class TbSDAdvertisementInfo {
	
	public static $_db_name = "pf_basemanage";
	
	private /*string*/ $sd_AdvertisementID; //PRIMARY KEY 
	private /*int*/ $ga_GameID; //游戏种类ID
	private /*int*/ $sd_AdvertisementTypeID;
	private /*string*/ $sd_Advertisement;
	private /*string*/ $sd_AdvertisementURL;
	private /*int*/ $sd_AdvertisementState; //0,默认/关闭             1,开启             9,删除

	
	private $is_this_table_dirty = false;
	private $is_sd_AdvertisementID_dirty = false;
	private $is_ga_GameID_dirty = false;
	private $is_sd_AdvertisementTypeID_dirty = false;
	private $is_sd_Advertisement_dirty = false;
	private $is_sd_AdvertisementURL_dirty = false;
	private $is_sd_AdvertisementState_dirty = false;


	/**
	 * @param array($condition)
	 * @return array(TbSDAdvertisementInfo)
	 */
	public static function /*array(TbSDAdvertisementInfo)*/ loadTable(/*array*/ $fields=NULL,/*array*/$condition=NULL)
	{
		$result = array();
		
		$f = "*";
		
		if(!empty($fields))
		{
			$f = SQLUtil::parseFields($fields);			
		}
		
		if (empty($condition))
		{
			$sql = "SELECT {$f} FROM `SD_AdvertisementInfo`";
		}
		else
		{			
			$sql = "SELECT {$f} FROM `SD_AdvertisementInfo` WHERE ".SQLUtil::parseCondition($condition);
		}			
		
		$ar = sql_fetch_rows_assoc(self::$_db_name,$sql);
		
		if (empty($ar) || count($ar) == 0)
		{
			return $result;
		}
		
		foreach($ar as $row)
		{
			$tb = new TbSDAdvertisementInfo();			
			if (isset($row['sd_AdvertisementID'])) $tb->sd_AdvertisementID = $row['sd_AdvertisementID'];
			if (isset($row['ga_GameID'])) $tb->ga_GameID = intval($row['ga_GameID']);
			if (isset($row['sd_AdvertisementTypeID'])) $tb->sd_AdvertisementTypeID = intval($row['sd_AdvertisementTypeID']);
			if (isset($row['sd_Advertisement'])) $tb->sd_Advertisement = $row['sd_Advertisement'];
			if (isset($row['sd_AdvertisementURL'])) $tb->sd_AdvertisementURL = $row['sd_AdvertisementURL'];
			if (isset($row['sd_AdvertisementState'])) $tb->sd_AdvertisementState = intval($row['sd_AdvertisementState']);
		
			$result[] = $tb;
		}
		
		return $result;
	}	
	
	public static function insertSqlHeader(/*array*/ $fields=NULL)
	{
		$result = array();				
		if(!empty($fields)){
			$f = SQLUtil::parseFields($fields);			
			$result[0] = "INSERT INTO `SD_AdvertisementInfo` ({$f}) VALUES ";	
			$ar = array();
			foreach($fields as $key){
				$ar[$key]=1;
			}
			$result[1] = $ar;
		}else{
			$result[0]="INSERT INTO `SD_AdvertisementInfo` (`sd_AdvertisementID`,`ga_GameID`,`sd_AdvertisementTypeID`,`sd_Advertisement`,`sd_AdvertisementURL`,`sd_AdvertisementState`) VALUES ";
			$result[1] = array('sd_AdvertisementID'=>1,'ga_GameID'=>1,'sd_AdvertisementTypeID'=>1,'sd_Advertisement'=>1,'sd_AdvertisementURL'=>1,'sd_AdvertisementState'=>1);
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
		$c = "`sd_AdvertisementID`='{$this->sd_AdvertisementID}'";
		
		if(!empty($fields))
		{
			$f = SQLUtil::parseFields($fields);			
		}
	    if (!empty($condition))
		{
			$c =SQLUtil::parseCondition($condition);
		}
		
		$sql = "SELECT {$f} FROM `SD_AdvertisementInfo` WHERE {$c} LIMIT 1";


		$ars = sql_fetch_rows_assoc(self::$_db_name,$sql);
		
		if (!$ars || count($ars)==0)
		{
			return false;
		}
		
		$ar = $ars[0];
		
		if (isset($ar['sd_AdvertisementID'])) $this->sd_AdvertisementID = $ar['sd_AdvertisementID'];
		if (isset($ar['ga_GameID'])) $this->ga_GameID = intval($ar['ga_GameID']);
		if (isset($ar['sd_AdvertisementTypeID'])) $this->sd_AdvertisementTypeID = intval($ar['sd_AdvertisementTypeID']);
		if (isset($ar['sd_Advertisement'])) $this->sd_Advertisement = $ar['sd_Advertisement'];
		if (isset($ar['sd_AdvertisementURL'])) $this->sd_AdvertisementURL = $ar['sd_AdvertisementURL'];
		if (isset($ar['sd_AdvertisementState'])) $this->sd_AdvertisementState = intval($ar['sd_AdvertisementState']);
		
		
		$this->clean();
		
		return true;
	}
	
	public function /*boolean*/ loadFromExistFields()
	{
		$emptyCondition = true;
    	$emptyFields = true;
    	
    	$fields = array();
    	$condition = array();
    	
    	if (!isset($this->sd_AdvertisementID)){
    		$emptyFields = false;
    		$fields[] = 'sd_AdvertisementID';
    	}else{
    		$emptyCondition = false; 
    		$condition['sd_AdvertisementID']=$this->sd_AdvertisementID;
    	}
    	if (!isset($this->ga_GameID)){
    		$emptyFields = false;
    		$fields[] = 'ga_GameID';
    	}else{
    		$emptyCondition = false; 
    		$condition['ga_GameID']=$this->ga_GameID;
    	}
    	if (!isset($this->sd_AdvertisementTypeID)){
    		$emptyFields = false;
    		$fields[] = 'sd_AdvertisementTypeID';
    	}else{
    		$emptyCondition = false; 
    		$condition['sd_AdvertisementTypeID']=$this->sd_AdvertisementTypeID;
    	}
    	if (!isset($this->sd_Advertisement)){
    		$emptyFields = false;
    		$fields[] = 'sd_Advertisement';
    	}else{
    		$emptyCondition = false; 
    		$condition['sd_Advertisement']=$this->sd_Advertisement;
    	}
    	if (!isset($this->sd_AdvertisementURL)){
    		$emptyFields = false;
    		$fields[] = 'sd_AdvertisementURL';
    	}else{
    		$emptyCondition = false; 
    		$condition['sd_AdvertisementURL']=$this->sd_AdvertisementURL;
    	}
    	if (!isset($this->sd_AdvertisementState)){
    		$emptyFields = false;
    		$fields[] = 'sd_AdvertisementState';
    	}else{
    		$emptyCondition = false; 
    		$condition['sd_AdvertisementState']=$this->sd_AdvertisementState;
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
				
		if (!isset($this->sd_AdvertisementID)) $this->sd_AdvertisementID = get_mysql_insert_id(self::$_db_name);

		
		$this->clean();
		
		return true;	
		
	}
	
	public function /*boolean*/ save(/*array*/$condition=NULL)
	{
		if (empty($condition))
		{
			$uc = "`sd_AdvertisementID`='{$this->sd_AdvertisementID}'";
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
		
		$sql = "DELETE FROM `SD_AdvertisementInfo` WHERE ".SQLUtil::parseCondition($condition);
		
		$qr = sql_query(self::$_db_name,$sql);
				
		return (boolean)$qr;
	}
	
	public function /*boolean*/ delete()
	{
		if (!$this->is_set_keys())
		{
			return false;
		}
		
		$sql = "DELETE FROM `SD_AdvertisementInfo` WHERE `sd_AdvertisementID`='{$this->sd_AdvertisementID}'";
		

		$qr = sql_query(self::$_db_name,$sql);
				
		return (boolean)$qr;
	}
	
	public function getInsertValue($fields)
	{
		$values = "(";		
		foreach($fields as $f => $k){
			if($f == 'sd_AdvertisementID'){
 				$values .= "'{$this->sd_AdvertisementID}',";
 			}else if($f == 'ga_GameID'){
 				$values .= "'{$this->ga_GameID}',";
 			}else if($f == 'sd_AdvertisementTypeID'){
 				$values .= "'{$this->sd_AdvertisementTypeID}',";
 			}else if($f == 'sd_Advertisement'){
 				$values .= "'{$this->sd_Advertisement}',";
 			}else if($f == 'sd_AdvertisementURL'){
 				$values .= "'{$this->sd_AdvertisementURL}',";
 			}else if($f == 'sd_AdvertisementState'){
 				$values .= "'{$this->sd_AdvertisementState}',";
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

		if (isset($this->sd_AdvertisementID))
		{
			$fields .= "`sd_AdvertisementID`,";
			$values .= "'{$this->sd_AdvertisementID}',";
		}
		if (isset($this->ga_GameID))
		{
			$fields .= "`ga_GameID`,";
			$values .= "'{$this->ga_GameID}',";
		}
		if (isset($this->sd_AdvertisementTypeID))
		{
			$fields .= "`sd_AdvertisementTypeID`,";
			$values .= "'{$this->sd_AdvertisementTypeID}',";
		}
		if (isset($this->sd_Advertisement))
		{
			$fields .= "`sd_Advertisement`,";
			$values .= "'{$this->sd_Advertisement}',";
		}
		if (isset($this->sd_AdvertisementURL))
		{
			$fields .= "`sd_AdvertisementURL`,";
			$values .= "'{$this->sd_AdvertisementURL}',";
		}
		if (isset($this->sd_AdvertisementState))
		{
			$fields .= "`sd_AdvertisementState`,";
			$values .= "'{$this->sd_AdvertisementState}',";
		}

		
		$fields .= ")";
		$values .= ")";
		
		$sql = "INSERT INTO `SD_AdvertisementInfo` ".$fields.$values;
		
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
		if ($this->is_sd_AdvertisementTypeID_dirty)
		{			
			if (!isset($this->sd_AdvertisementTypeID))
			{
				$update .= ("`sd_AdvertisementTypeID`=null,");
			}
			else
			{
				$update .= ("`sd_AdvertisementTypeID`='{$this->sd_AdvertisementTypeID}',");
			}
		}
		if ($this->is_sd_Advertisement_dirty)
		{			
			if (!isset($this->sd_Advertisement))
			{
				$update .= ("`sd_Advertisement`=null,");
			}
			else
			{
				$update .= ("`sd_Advertisement`='{$this->sd_Advertisement}',");
			}
		}
		if ($this->is_sd_AdvertisementURL_dirty)
		{			
			if (!isset($this->sd_AdvertisementURL))
			{
				$update .= ("`sd_AdvertisementURL`=null,");
			}
			else
			{
				$update .= ("`sd_AdvertisementURL`='{$this->sd_AdvertisementURL}',");
			}
		}
		if ($this->is_sd_AdvertisementState_dirty)
		{			
			if (!isset($this->sd_AdvertisementState))
			{
				$update .= ("`sd_AdvertisementState`=null,");
			}
			else
			{
				$update .= ("`sd_AdvertisementState`='{$this->sd_AdvertisementState}',");
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
		
		$sql = "UPDATE `SD_AdvertisementInfo` SET {$update} WHERE {$condition}";
		
		return $sql;
	}
	
	public function /*boolean*/ add($fieldsValue,$condition=NULL)
	{				
		if (empty($condition))
		{
			$uc = "`sd_AdvertisementID`='{$this->sd_AdvertisementID}'";
		}
		else
		{			
			$uc = SQLUtil::parseCondition($condition);
		}
		
		$update = SQLUtil::parseASFieldValues($fieldsValue);
		
		$sql = "UPDATE `SD_AdvertisementInfo` SET {$update} WHERE {$uc}";
		
		$qr = sql_query(self::$_db_name,$sql);
				
		return (boolean)$qr;
	}	
	
	public function /*boolean*/ sub($fieldsValue,$condition=NULL)
	{
		if (empty($condition))
		{
			$uc = "`sd_AdvertisementID`='{$this->sd_AdvertisementID}'";
		}
		else
		{			
			$uc = SQLUtil::parseCondition($condition);
		}
		
		$update = SQLUtil::parseASFieldValues($fieldsValue,false);
		
		$sql = "UPDATE `SD_AdvertisementInfo` SET {$update} WHERE {$uc}";
		
		$qr = sql_query(self::$_db_name,$sql);
				
		return (boolean)$qr;
	}
	
	/**
	 * 是否已经设置主键的值
	 */
	public function is_set_keys()
	{
		
		return (isset($this->sd_AdvertisementID));

	}
	
	private function /*void*/ clean() 
	{
		$this->is_this_table_dirty = false;
		$this->is_sd_AdvertisementID_dirty = false;
		$this->is_ga_GameID_dirty = false;
		$this->is_sd_AdvertisementTypeID_dirty = false;
		$this->is_sd_Advertisement_dirty = false;
		$this->is_sd_AdvertisementURL_dirty = false;
		$this->is_sd_AdvertisementState_dirty = false;

	}
	
	public function /*string*/ getSdAdvertisementID()
	{
		return $this->sd_AdvertisementID;
	}
	
	public function /*void*/ setSdAdvertisementID(/*string*/ $sd_AdvertisementID)
	{
		$this->sd_AdvertisementID = SQLUtil::toSafeSQLString($sd_AdvertisementID);
		$this->is_sd_AdvertisementID_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setSdAdvertisementIDNull()
	{
		$this->sd_AdvertisementID = null;
		$this->is_sd_AdvertisementID_dirty = true;		
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

	public function /*int*/ getSdAdvertisementTypeID()
	{
		return $this->sd_AdvertisementTypeID;
	}
	
	public function /*void*/ setSdAdvertisementTypeID(/*int*/ $sd_AdvertisementTypeID)
	{
		$this->sd_AdvertisementTypeID = intval($sd_AdvertisementTypeID);
		$this->is_sd_AdvertisementTypeID_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setSdAdvertisementTypeIDNull()
	{
		$this->sd_AdvertisementTypeID = null;
		$this->is_sd_AdvertisementTypeID_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*string*/ getSdAdvertisement()
	{
		return $this->sd_Advertisement;
	}
	
	public function /*void*/ setSdAdvertisement(/*string*/ $sd_Advertisement)
	{
		$this->sd_Advertisement = SQLUtil::toSafeSQLString($sd_Advertisement);
		$this->is_sd_Advertisement_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setSdAdvertisementNull()
	{
		$this->sd_Advertisement = null;
		$this->is_sd_Advertisement_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*string*/ getSdAdvertisementURL()
	{
		return $this->sd_AdvertisementURL;
	}
	
	public function /*void*/ setSdAdvertisementURL(/*string*/ $sd_AdvertisementURL)
	{
		$this->sd_AdvertisementURL = SQLUtil::toSafeSQLString($sd_AdvertisementURL);
		$this->is_sd_AdvertisementURL_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setSdAdvertisementURLNull()
	{
		$this->sd_AdvertisementURL = null;
		$this->is_sd_AdvertisementURL_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*int*/ getSdAdvertisementState()
	{
		return $this->sd_AdvertisementState;
	}
	
	public function /*void*/ setSdAdvertisementState(/*int*/ $sd_AdvertisementState)
	{
		$this->sd_AdvertisementState = intval($sd_AdvertisementState);
		$this->is_sd_AdvertisementState_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setSdAdvertisementStateNull()
	{
		$this->sd_AdvertisementState = null;
		$this->is_sd_AdvertisementState_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	
	public function /*string*/ toDebugString()
	{
		$dbg = "(";
		
		$dbg .= ("sd_AdvertisementID={$this->sd_AdvertisementID},");
		$dbg .= ("ga_GameID={$this->ga_GameID},");
		$dbg .= ("sd_AdvertisementTypeID={$this->sd_AdvertisementTypeID},");
		$dbg .= ("sd_Advertisement={$this->sd_Advertisement},");
		$dbg .= ("sd_AdvertisementURL={$this->sd_AdvertisementURL},");
		$dbg .= ("sd_AdvertisementState={$this->sd_AdvertisementState},");

		$dbg .= ")";
				
		return str_replace(",)",")",$dbg);
	}
	
	public function fromArray($arr)
	{
		if (isset($arr['sd_AdvertisementID'])) $this->setSdAdvertisementID($arr['sd_AdvertisementID']);
		if (isset($arr['ga_GameID'])) $this->setGaGameID($arr['ga_GameID']);
		if (isset($arr['sd_AdvertisementTypeID'])) $this->setSdAdvertisementTypeID($arr['sd_AdvertisementTypeID']);
		if (isset($arr['sd_Advertisement'])) $this->setSdAdvertisement($arr['sd_Advertisement']);
		if (isset($arr['sd_AdvertisementURL'])) $this->setSdAdvertisementURL($arr['sd_AdvertisementURL']);
		if (isset($arr['sd_AdvertisementState'])) $this->setSdAdvertisementState($arr['sd_AdvertisementState']);
		
	}
	
	public function toArray()
	{
		$ret = array();
		$ret['sd_AdvertisementID'] = $this->sd_AdvertisementID;
		$ret['ga_GameID'] = $this->ga_GameID;
		$ret['sd_AdvertisementTypeID'] = $this->sd_AdvertisementTypeID;
		$ret['sd_Advertisement'] = $this->sd_Advertisement;
		$ret['sd_AdvertisementURL'] = $this->sd_AdvertisementURL;
		$ret['sd_AdvertisementState'] = $this->sd_AdvertisementState;

		return $ret;
	}
}

?>
