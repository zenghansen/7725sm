<?php
require_once (FRAMEWORK_PATH . "utils/MysqlDBHelper.php");
require_once (FRAMEWORK_PATH . "db/SQLUtil.php");
/**
 * database table SD_AdvertisementType description
 * 
 * [This file was auto-generated. PLEASE DONT EDIT]
 * 
 * @author LiangZhixian
 * 
 */
class TbSDAdvertisementType {
	
	public static $_db_name = "pf_basemanage";
	
	private /*int*/ $sd_AdvertisementTypeID; //PRIMARY KEY 
	private /*int*/ $sd_AdvertisementType; //PRIMARY KEY 
	private /*int*/ $sd_AdvertisementTypeState;
	private /*string*/ $sd_AdvertisementTypeRemark;

	
	private $is_this_table_dirty = false;
	private $is_sd_AdvertisementTypeID_dirty = false;
	private $is_sd_AdvertisementType_dirty = false;
	private $is_sd_AdvertisementTypeState_dirty = false;
	private $is_sd_AdvertisementTypeRemark_dirty = false;


	/**
	 * @param array($condition)
	 * @return array(TbSDAdvertisementType)
	 */
	public static function /*array(TbSDAdvertisementType)*/ loadTable(/*array*/ $fields=NULL,/*array*/$condition=NULL)
	{
		$result = array();
		
		$f = "*";
		
		if(!empty($fields))
		{
			$f = SQLUtil::parseFields($fields);			
		}
		
		if (empty($condition))
		{
			$sql = "SELECT {$f} FROM `SD_AdvertisementType`";
		}
		else
		{			
			$sql = "SELECT {$f} FROM `SD_AdvertisementType` WHERE ".SQLUtil::parseCondition($condition);
		}			
		
		$ar = sql_fetch_rows_assoc(self::$_db_name,$sql);
		
		if (empty($ar) || count($ar) == 0)
		{
			return $result;
		}
		
		foreach($ar as $row)
		{
			$tb = new TbSDAdvertisementType();			
			if (isset($row['sd_AdvertisementTypeID'])) $tb->sd_AdvertisementTypeID = intval($row['sd_AdvertisementTypeID']);
			if (isset($row['sd_AdvertisementType'])) $tb->sd_AdvertisementType = intval($row['sd_AdvertisementType']);
			if (isset($row['sd_AdvertisementTypeState'])) $tb->sd_AdvertisementTypeState = intval($row['sd_AdvertisementTypeState']);
			if (isset($row['sd_AdvertisementTypeRemark'])) $tb->sd_AdvertisementTypeRemark = $row['sd_AdvertisementTypeRemark'];
		
			$result[] = $tb;
		}
		
		return $result;
	}	
	
	public static function insertSqlHeader(/*array*/ $fields=NULL)
	{
		$result = array();				
		if(!empty($fields)){
			$f = SQLUtil::parseFields($fields);			
			$result[0] = "INSERT INTO `SD_AdvertisementType` ({$f}) VALUES ";	
			$ar = array();
			foreach($fields as $key){
				$ar[$key]=1;
			}
			$result[1] = $ar;
		}else{
			$result[0]="INSERT INTO `SD_AdvertisementType` (`sd_AdvertisementTypeID`,`sd_AdvertisementType`,`sd_AdvertisementTypeState`,`sd_AdvertisementTypeRemark`) VALUES ";
			$result[1] = array('sd_AdvertisementTypeID'=>1,'sd_AdvertisementType'=>1,'sd_AdvertisementTypeState'=>1,'sd_AdvertisementTypeRemark'=>1);
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
		$c = "`sd_AdvertisementTypeID`='{$this->sd_AdvertisementTypeID}' AND `sd_AdvertisementType`='{$this->sd_AdvertisementType}'";
		
		if(!empty($fields))
		{
			$f = SQLUtil::parseFields($fields);			
		}
	    if (!empty($condition))
		{
			$c =SQLUtil::parseCondition($condition);
		}
		
		$sql = "SELECT {$f} FROM `SD_AdvertisementType` WHERE {$c} LIMIT 1";


		$ars = sql_fetch_rows_assoc(self::$_db_name,$sql);
		
		if (!$ars || count($ars)==0)
		{
			return false;
		}
		
		$ar = $ars[0];
		
		if (isset($ar['sd_AdvertisementTypeID'])) $this->sd_AdvertisementTypeID = intval($ar['sd_AdvertisementTypeID']);
		if (isset($ar['sd_AdvertisementType'])) $this->sd_AdvertisementType = intval($ar['sd_AdvertisementType']);
		if (isset($ar['sd_AdvertisementTypeState'])) $this->sd_AdvertisementTypeState = intval($ar['sd_AdvertisementTypeState']);
		if (isset($ar['sd_AdvertisementTypeRemark'])) $this->sd_AdvertisementTypeRemark = $ar['sd_AdvertisementTypeRemark'];
		
		
		$this->clean();
		
		return true;
	}
	
	public function /*boolean*/ loadFromExistFields()
	{
		$emptyCondition = true;
    	$emptyFields = true;
    	
    	$fields = array();
    	$condition = array();
    	
    	if (!isset($this->sd_AdvertisementTypeID)){
    		$emptyFields = false;
    		$fields[] = 'sd_AdvertisementTypeID';
    	}else{
    		$emptyCondition = false; 
    		$condition['sd_AdvertisementTypeID']=$this->sd_AdvertisementTypeID;
    	}
    	if (!isset($this->sd_AdvertisementType)){
    		$emptyFields = false;
    		$fields[] = 'sd_AdvertisementType';
    	}else{
    		$emptyCondition = false; 
    		$condition['sd_AdvertisementType']=$this->sd_AdvertisementType;
    	}
    	if (!isset($this->sd_AdvertisementTypeState)){
    		$emptyFields = false;
    		$fields[] = 'sd_AdvertisementTypeState';
    	}else{
    		$emptyCondition = false; 
    		$condition['sd_AdvertisementTypeState']=$this->sd_AdvertisementTypeState;
    	}
    	if (!isset($this->sd_AdvertisementTypeRemark)){
    		$emptyFields = false;
    		$fields[] = 'sd_AdvertisementTypeRemark';
    	}else{
    		$emptyCondition = false; 
    		$condition['sd_AdvertisementTypeRemark']=$this->sd_AdvertisementTypeRemark;
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
				
		if (!isset($this->sd_AdvertisementTypeID)) $this->sd_AdvertisementTypeID = get_mysql_insert_id(self::$_db_name);

		
		$this->clean();
		
		return true;	
		
	}
	
	public function /*boolean*/ save(/*array*/$condition=NULL)
	{
		if (empty($condition))
		{
			$uc = "`sd_AdvertisementTypeID`='{$this->sd_AdvertisementTypeID}' AND `sd_AdvertisementType`='{$this->sd_AdvertisementType}'";
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
		
		$sql = "DELETE FROM `SD_AdvertisementType` WHERE ".SQLUtil::parseCondition($condition);
		
		$qr = sql_query(self::$_db_name,$sql);
				
		return (boolean)$qr;
	}
	
	public function /*boolean*/ delete()
	{
		if (!$this->is_set_keys())
		{
			return false;
		}
		
		$sql = "DELETE FROM `SD_AdvertisementType` WHERE `sd_AdvertisementTypeID`='{$this->sd_AdvertisementTypeID}' AND `sd_AdvertisementType`='{$this->sd_AdvertisementType}'";
		

		$qr = sql_query(self::$_db_name,$sql);
				
		return (boolean)$qr;
	}
	
	public function getInsertValue($fields)
	{
		$values = "(";		
		foreach($fields as $f => $k){
			if($f == 'sd_AdvertisementTypeID'){
 				$values .= "'{$this->sd_AdvertisementTypeID}',";
 			}else if($f == 'sd_AdvertisementType'){
 				$values .= "'{$this->sd_AdvertisementType}',";
 			}else if($f == 'sd_AdvertisementTypeState'){
 				$values .= "'{$this->sd_AdvertisementTypeState}',";
 			}else if($f == 'sd_AdvertisementTypeRemark'){
 				$values .= "'{$this->sd_AdvertisementTypeRemark}',";
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

		if (isset($this->sd_AdvertisementTypeID))
		{
			$fields .= "`sd_AdvertisementTypeID`,";
			$values .= "'{$this->sd_AdvertisementTypeID}',";
		}
		if (isset($this->sd_AdvertisementType))
		{
			$fields .= "`sd_AdvertisementType`,";
			$values .= "'{$this->sd_AdvertisementType}',";
		}
		if (isset($this->sd_AdvertisementTypeState))
		{
			$fields .= "`sd_AdvertisementTypeState`,";
			$values .= "'{$this->sd_AdvertisementTypeState}',";
		}
		if (isset($this->sd_AdvertisementTypeRemark))
		{
			$fields .= "`sd_AdvertisementTypeRemark`,";
			$values .= "'{$this->sd_AdvertisementTypeRemark}',";
		}

		
		$fields .= ")";
		$values .= ")";
		
		$sql = "INSERT INTO `SD_AdvertisementType` ".$fields.$values;
		
		return str_replace(",)",")",$sql);
	}
	
	private function /*string*/ getUpdateFields()
	{
		$update = "";
		
		if ($this->is_sd_AdvertisementTypeState_dirty)
		{			
			if (!isset($this->sd_AdvertisementTypeState))
			{
				$update .= ("`sd_AdvertisementTypeState`=null,");
			}
			else
			{
				$update .= ("`sd_AdvertisementTypeState`='{$this->sd_AdvertisementTypeState}',");
			}
		}
		if ($this->is_sd_AdvertisementTypeRemark_dirty)
		{			
			if (!isset($this->sd_AdvertisementTypeRemark))
			{
				$update .= ("`sd_AdvertisementTypeRemark`=null,");
			}
			else
			{
				$update .= ("`sd_AdvertisementTypeRemark`='{$this->sd_AdvertisementTypeRemark}',");
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
		
		$sql = "UPDATE `SD_AdvertisementType` SET {$update} WHERE {$condition}";
		
		return $sql;
	}
	
	public function /*boolean*/ add($fieldsValue,$condition=NULL)
	{				
		if (empty($condition))
		{
			$uc = "`sd_AdvertisementTypeID`='{$this->sd_AdvertisementTypeID}' AND `sd_AdvertisementType`='{$this->sd_AdvertisementType}'";
		}
		else
		{			
			$uc = SQLUtil::parseCondition($condition);
		}
		
		$update = SQLUtil::parseASFieldValues($fieldsValue);
		
		$sql = "UPDATE `SD_AdvertisementType` SET {$update} WHERE {$uc}";
		
		$qr = sql_query(self::$_db_name,$sql);
				
		return (boolean)$qr;
	}	
	
	public function /*boolean*/ sub($fieldsValue,$condition=NULL)
	{
		if (empty($condition))
		{
			$uc = "`sd_AdvertisementTypeID`='{$this->sd_AdvertisementTypeID}' AND `sd_AdvertisementType`='{$this->sd_AdvertisementType}'";
		}
		else
		{			
			$uc = SQLUtil::parseCondition($condition);
		}
		
		$update = SQLUtil::parseASFieldValues($fieldsValue,false);
		
		$sql = "UPDATE `SD_AdvertisementType` SET {$update} WHERE {$uc}";
		
		$qr = sql_query(self::$_db_name,$sql);
				
		return (boolean)$qr;
	}
	
	/**
	 * 是否已经设置主键的值
	 */
	public function is_set_keys()
	{
		
		return (isset($this->sd_AdvertisementTypeID) && isset($this->sd_AdvertisementType));

	}
	
	private function /*void*/ clean() 
	{
		$this->is_this_table_dirty = false;
		$this->is_sd_AdvertisementTypeID_dirty = false;
		$this->is_sd_AdvertisementType_dirty = false;
		$this->is_sd_AdvertisementTypeState_dirty = false;
		$this->is_sd_AdvertisementTypeRemark_dirty = false;

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

	public function /*int*/ getSdAdvertisementType()
	{
		return $this->sd_AdvertisementType;
	}
	
	public function /*void*/ setSdAdvertisementType(/*int*/ $sd_AdvertisementType)
	{
		$this->sd_AdvertisementType = intval($sd_AdvertisementType);
		$this->is_sd_AdvertisementType_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setSdAdvertisementTypeNull()
	{
		$this->sd_AdvertisementType = null;
		$this->is_sd_AdvertisementType_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*int*/ getSdAdvertisementTypeState()
	{
		return $this->sd_AdvertisementTypeState;
	}
	
	public function /*void*/ setSdAdvertisementTypeState(/*int*/ $sd_AdvertisementTypeState)
	{
		$this->sd_AdvertisementTypeState = intval($sd_AdvertisementTypeState);
		$this->is_sd_AdvertisementTypeState_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setSdAdvertisementTypeStateNull()
	{
		$this->sd_AdvertisementTypeState = null;
		$this->is_sd_AdvertisementTypeState_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*string*/ getSdAdvertisementTypeRemark()
	{
		return $this->sd_AdvertisementTypeRemark;
	}
	
	public function /*void*/ setSdAdvertisementTypeRemark(/*string*/ $sd_AdvertisementTypeRemark)
	{
		$this->sd_AdvertisementTypeRemark = SQLUtil::toSafeSQLString($sd_AdvertisementTypeRemark);
		$this->is_sd_AdvertisementTypeRemark_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setSdAdvertisementTypeRemarkNull()
	{
		$this->sd_AdvertisementTypeRemark = null;
		$this->is_sd_AdvertisementTypeRemark_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	
	public function /*string*/ toDebugString()
	{
		$dbg = "(";
		
		$dbg .= ("sd_AdvertisementTypeID={$this->sd_AdvertisementTypeID},");
		$dbg .= ("sd_AdvertisementType={$this->sd_AdvertisementType},");
		$dbg .= ("sd_AdvertisementTypeState={$this->sd_AdvertisementTypeState},");
		$dbg .= ("sd_AdvertisementTypeRemark={$this->sd_AdvertisementTypeRemark},");

		$dbg .= ")";
				
		return str_replace(",)",")",$dbg);
	}
	
	public function fromArray($arr)
	{
		if (isset($arr['sd_AdvertisementTypeID'])) $this->setSdAdvertisementTypeID($arr['sd_AdvertisementTypeID']);
		if (isset($arr['sd_AdvertisementType'])) $this->setSdAdvertisementType($arr['sd_AdvertisementType']);
		if (isset($arr['sd_AdvertisementTypeState'])) $this->setSdAdvertisementTypeState($arr['sd_AdvertisementTypeState']);
		if (isset($arr['sd_AdvertisementTypeRemark'])) $this->setSdAdvertisementTypeRemark($arr['sd_AdvertisementTypeRemark']);
		
	}
	
	public function toArray()
	{
		$ret = array();
		$ret['sd_AdvertisementTypeID'] = $this->sd_AdvertisementTypeID;
		$ret['sd_AdvertisementType'] = $this->sd_AdvertisementType;
		$ret['sd_AdvertisementTypeState'] = $this->sd_AdvertisementTypeState;
		$ret['sd_AdvertisementTypeRemark'] = $this->sd_AdvertisementTypeRemark;

		return $ret;
	}
}

?>
