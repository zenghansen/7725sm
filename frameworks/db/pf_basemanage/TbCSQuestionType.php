<?php
require_once (FRAMEWORK_PATH . "utils/MysqlDBHelper.php");
require_once (FRAMEWORK_PATH . "db/SQLUtil.php");
/**
 * database table CS_QuestionType description
 * 
 * [This file was auto-generated. PLEASE DONT EDIT]
 * 
 * @author LiangZhixian
 * 
 */
class TbCSQuestionType {
	
	public static $_db_name = "pf_basemanage";
	
	private /*int*/ $cs_QuestionTypeID; //PRIMARY KEY 
	private /*string*/ $cs_QuestionType;
	private /*int*/ $cs_QuestionTypeState; //9=删除

	
	private $is_this_table_dirty = false;
	private $is_cs_QuestionTypeID_dirty = false;
	private $is_cs_QuestionType_dirty = false;
	private $is_cs_QuestionTypeState_dirty = false;


	/**
	 * @param array($condition)
	 * @return array(TbCSQuestionType)
	 */
	public static function /*array(TbCSQuestionType)*/ loadTable(/*array*/ $fields=NULL,/*array*/$condition=NULL)
	{
		$result = array();
		
		$f = "*";
		
		if(!empty($fields))
		{
			$f = SQLUtil::parseFields($fields);			
		}
		
		if (empty($condition))
		{
			$sql = "SELECT {$f} FROM `CS_QuestionType`";
		}
		else
		{			
			$sql = "SELECT {$f} FROM `CS_QuestionType` WHERE ".SQLUtil::parseCondition($condition);
		}			
		
		$ar = sql_fetch_rows_assoc(self::$_db_name,$sql);
		
		if (empty($ar) || count($ar) == 0)
		{
			return $result;
		}
		
		foreach($ar as $row)
		{
			$tb = new TbCSQuestionType();			
			if (isset($row['cs_QuestionTypeID'])) $tb->cs_QuestionTypeID = intval($row['cs_QuestionTypeID']);
			if (isset($row['cs_QuestionType'])) $tb->cs_QuestionType = $row['cs_QuestionType'];
			if (isset($row['cs_QuestionTypeState'])) $tb->cs_QuestionTypeState = intval($row['cs_QuestionTypeState']);
		
			$result[] = $tb;
		}
		
		return $result;
	}	
	
	public static function insertSqlHeader(/*array*/ $fields=NULL)
	{
		$result = array();				
		if(!empty($fields)){
			$f = SQLUtil::parseFields($fields);			
			$result[0] = "INSERT INTO `CS_QuestionType` ({$f}) VALUES ";	
			$ar = array();
			foreach($fields as $key){
				$ar[$key]=1;
			}
			$result[1] = $ar;
		}else{
			$result[0]="INSERT INTO `CS_QuestionType` (`cs_QuestionTypeID`,`cs_QuestionType`,`cs_QuestionTypeState`) VALUES ";
			$result[1] = array('cs_QuestionTypeID'=>1,'cs_QuestionType'=>1,'cs_QuestionTypeState'=>1);
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
		$c = "`cs_QuestionTypeID`='{$this->cs_QuestionTypeID}'";
		
		if(!empty($fields))
		{
			$f = SQLUtil::parseFields($fields);			
		}
	    if (!empty($condition))
		{
			$c =SQLUtil::parseCondition($condition);
		}
		
		$sql = "SELECT {$f} FROM `CS_QuestionType` WHERE {$c} LIMIT 1";


		$ars = sql_fetch_rows_assoc(self::$_db_name,$sql);
		
		if (!$ars || count($ars)==0)
		{
			return false;
		}
		
		$ar = $ars[0];
		
		if (isset($ar['cs_QuestionTypeID'])) $this->cs_QuestionTypeID = intval($ar['cs_QuestionTypeID']);
		if (isset($ar['cs_QuestionType'])) $this->cs_QuestionType = $ar['cs_QuestionType'];
		if (isset($ar['cs_QuestionTypeState'])) $this->cs_QuestionTypeState = intval($ar['cs_QuestionTypeState']);
		
		
		$this->clean();
		
		return true;
	}
	
	public function /*boolean*/ loadFromExistFields()
	{
		$emptyCondition = true;
    	$emptyFields = true;
    	
    	$fields = array();
    	$condition = array();
    	
    	if (!isset($this->cs_QuestionTypeID)){
    		$emptyFields = false;
    		$fields[] = 'cs_QuestionTypeID';
    	}else{
    		$emptyCondition = false; 
    		$condition['cs_QuestionTypeID']=$this->cs_QuestionTypeID;
    	}
    	if (!isset($this->cs_QuestionType)){
    		$emptyFields = false;
    		$fields[] = 'cs_QuestionType';
    	}else{
    		$emptyCondition = false; 
    		$condition['cs_QuestionType']=$this->cs_QuestionType;
    	}
    	if (!isset($this->cs_QuestionTypeState)){
    		$emptyFields = false;
    		$fields[] = 'cs_QuestionTypeState';
    	}else{
    		$emptyCondition = false; 
    		$condition['cs_QuestionTypeState']=$this->cs_QuestionTypeState;
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
				
		if (!isset($this->cs_QuestionTypeID)) $this->cs_QuestionTypeID = get_mysql_insert_id(self::$_db_name);

		
		$this->clean();
		
		return true;	
		
	}
	
	public function /*boolean*/ save(/*array*/$condition=NULL)
	{
		if (empty($condition))
		{
			$uc = "`cs_QuestionTypeID`='{$this->cs_QuestionTypeID}'";
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
		
		$sql = "DELETE FROM `CS_QuestionType` WHERE ".SQLUtil::parseCondition($condition);
		
		$qr = sql_query(self::$_db_name,$sql);
				
		return (boolean)$qr;
	}
	
	public function /*boolean*/ delete()
	{
		if (!$this->is_set_keys())
		{
			return false;
		}
		
		$sql = "DELETE FROM `CS_QuestionType` WHERE `cs_QuestionTypeID`='{$this->cs_QuestionTypeID}'";
		

		$qr = sql_query(self::$_db_name,$sql);
				
		return (boolean)$qr;
	}
	
	public function getInsertValue($fields)
	{
		$values = "(";		
		foreach($fields as $f => $k){
			if($f == 'cs_QuestionTypeID'){
 				$values .= "'{$this->cs_QuestionTypeID}',";
 			}else if($f == 'cs_QuestionType'){
 				$values .= "'{$this->cs_QuestionType}',";
 			}else if($f == 'cs_QuestionTypeState'){
 				$values .= "'{$this->cs_QuestionTypeState}',";
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

		if (isset($this->cs_QuestionTypeID))
		{
			$fields .= "`cs_QuestionTypeID`,";
			$values .= "'{$this->cs_QuestionTypeID}',";
		}
		if (isset($this->cs_QuestionType))
		{
			$fields .= "`cs_QuestionType`,";
			$values .= "'{$this->cs_QuestionType}',";
		}
		if (isset($this->cs_QuestionTypeState))
		{
			$fields .= "`cs_QuestionTypeState`,";
			$values .= "'{$this->cs_QuestionTypeState}',";
		}

		
		$fields .= ")";
		$values .= ")";
		
		$sql = "INSERT INTO `CS_QuestionType` ".$fields.$values;
		
		return str_replace(",)",")",$sql);
	}
	
	private function /*string*/ getUpdateFields()
	{
		$update = "";
		
		if ($this->is_cs_QuestionType_dirty)
		{			
			if (!isset($this->cs_QuestionType))
			{
				$update .= ("`cs_QuestionType`=null,");
			}
			else
			{
				$update .= ("`cs_QuestionType`='{$this->cs_QuestionType}',");
			}
		}
		if ($this->is_cs_QuestionTypeState_dirty)
		{			
			if (!isset($this->cs_QuestionTypeState))
			{
				$update .= ("`cs_QuestionTypeState`=null,");
			}
			else
			{
				$update .= ("`cs_QuestionTypeState`='{$this->cs_QuestionTypeState}',");
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
		
		$sql = "UPDATE `CS_QuestionType` SET {$update} WHERE {$condition}";
		
		return $sql;
	}
	
	public function /*boolean*/ add($fieldsValue,$condition=NULL)
	{				
		if (empty($condition))
		{
			$uc = "`cs_QuestionTypeID`='{$this->cs_QuestionTypeID}'";
		}
		else
		{			
			$uc = SQLUtil::parseCondition($condition);
		}
		
		$update = SQLUtil::parseASFieldValues($fieldsValue);
		
		$sql = "UPDATE `CS_QuestionType` SET {$update} WHERE {$uc}";
		
		$qr = sql_query(self::$_db_name,$sql);
				
		return (boolean)$qr;
	}	
	
	public function /*boolean*/ sub($fieldsValue,$condition=NULL)
	{
		if (empty($condition))
		{
			$uc = "`cs_QuestionTypeID`='{$this->cs_QuestionTypeID}'";
		}
		else
		{			
			$uc = SQLUtil::parseCondition($condition);
		}
		
		$update = SQLUtil::parseASFieldValues($fieldsValue,false);
		
		$sql = "UPDATE `CS_QuestionType` SET {$update} WHERE {$uc}";
		
		$qr = sql_query(self::$_db_name,$sql);
				
		return (boolean)$qr;
	}
	
	/**
	 * 是否已经设置主键的值
	 */
	public function is_set_keys()
	{
		
		return (isset($this->cs_QuestionTypeID));

	}
	
	private function /*void*/ clean() 
	{
		$this->is_this_table_dirty = false;
		$this->is_cs_QuestionTypeID_dirty = false;
		$this->is_cs_QuestionType_dirty = false;
		$this->is_cs_QuestionTypeState_dirty = false;

	}
	
	public function /*int*/ getCsQuestionTypeID()
	{
		return $this->cs_QuestionTypeID;
	}
	
	public function /*void*/ setCsQuestionTypeID(/*int*/ $cs_QuestionTypeID)
	{
		$this->cs_QuestionTypeID = intval($cs_QuestionTypeID);
		$this->is_cs_QuestionTypeID_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setCsQuestionTypeIDNull()
	{
		$this->cs_QuestionTypeID = null;
		$this->is_cs_QuestionTypeID_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*string*/ getCsQuestionType()
	{
		return $this->cs_QuestionType;
	}
	
	public function /*void*/ setCsQuestionType(/*string*/ $cs_QuestionType)
	{
		$this->cs_QuestionType = SQLUtil::toSafeSQLString($cs_QuestionType);
		$this->is_cs_QuestionType_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setCsQuestionTypeNull()
	{
		$this->cs_QuestionType = null;
		$this->is_cs_QuestionType_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*int*/ getCsQuestionTypeState()
	{
		return $this->cs_QuestionTypeState;
	}
	
	public function /*void*/ setCsQuestionTypeState(/*int*/ $cs_QuestionTypeState)
	{
		$this->cs_QuestionTypeState = intval($cs_QuestionTypeState);
		$this->is_cs_QuestionTypeState_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setCsQuestionTypeStateNull()
	{
		$this->cs_QuestionTypeState = null;
		$this->is_cs_QuestionTypeState_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	
	public function /*string*/ toDebugString()
	{
		$dbg = "(";
		
		$dbg .= ("cs_QuestionTypeID={$this->cs_QuestionTypeID},");
		$dbg .= ("cs_QuestionType={$this->cs_QuestionType},");
		$dbg .= ("cs_QuestionTypeState={$this->cs_QuestionTypeState},");

		$dbg .= ")";
				
		return str_replace(",)",")",$dbg);
	}
	
	public function fromArray($arr)
	{
		if (isset($arr['cs_QuestionTypeID'])) $this->setCsQuestionTypeID($arr['cs_QuestionTypeID']);
		if (isset($arr['cs_QuestionType'])) $this->setCsQuestionType($arr['cs_QuestionType']);
		if (isset($arr['cs_QuestionTypeState'])) $this->setCsQuestionTypeState($arr['cs_QuestionTypeState']);
		
	}
	
	public function toArray()
	{
		$ret = array();
		$ret['cs_QuestionTypeID'] = $this->cs_QuestionTypeID;
		$ret['cs_QuestionType'] = $this->cs_QuestionType;
		$ret['cs_QuestionTypeState'] = $this->cs_QuestionTypeState;

		return $ret;
	}
}

?>
