<?php
require_once (FRAMEWORK_PATH . "utils/MysqlDBHelper.php");
require_once (FRAMEWORK_PATH . "db/SQLUtil.php");
/**
 * database table BM_Department description
 * 
 * [This file was auto-generated. PLEASE DONT EDIT]
 * 
 * @author LiangZhixian
 * 
 */
class TbBMDepartment {
	
	public static $_db_name = "pf_basemanage";
	
	private /*int*/ $bm_DtptID; //PRIMARY KEY 部门ID
	private /*string*/ $bm_DtptName; //部门名称
	private /*int*/ $bm_DtptPRI; //部门优先级
	private /*int*/ $bm_FDtptID; //父部门ID
	private /*int*/ $bm_DtptKind; //部门种类              0,部门              1,级别              2,班级? 备用
	private /*int*/ $bm_DtptState; //0,普通              2,隐藏              99,删除
	private /*string*/ $bm_DtptRemark; //部门描述

	
	private $is_this_table_dirty = false;
	private $is_bm_DtptID_dirty = false;
	private $is_bm_DtptName_dirty = false;
	private $is_bm_DtptPRI_dirty = false;
	private $is_bm_FDtptID_dirty = false;
	private $is_bm_DtptKind_dirty = false;
	private $is_bm_DtptState_dirty = false;
	private $is_bm_DtptRemark_dirty = false;


	/**
	 * @param array($condition)
	 * @return array(TbBMDepartment)
	 */
	public static function /*array(TbBMDepartment)*/ loadTable(/*array*/ $fields=NULL,/*array*/$condition=NULL)
	{
		$result = array();
		
		$f = "*";
		
		if(!empty($fields))
		{
			$f = SQLUtil::parseFields($fields);			
		}
		
		if (empty($condition))
		{
			$sql = "SELECT {$f} FROM `BM_Department`";
		}
		else
		{			
			$sql = "SELECT {$f} FROM `BM_Department` WHERE ".SQLUtil::parseCondition($condition);
		}			
		
		$ar = sql_fetch_rows_assoc(self::$_db_name,$sql);
		
		if (empty($ar) || count($ar) == 0)
		{
			return $result;
		}
		
		foreach($ar as $row)
		{
			$tb = new TbBMDepartment();			
			if (isset($row['bm_DtptID'])) $tb->bm_DtptID = intval($row['bm_DtptID']);
			if (isset($row['bm_DtptName'])) $tb->bm_DtptName = $row['bm_DtptName'];
			if (isset($row['bm_DtptPRI'])) $tb->bm_DtptPRI = intval($row['bm_DtptPRI']);
			if (isset($row['bm_FDtptID'])) $tb->bm_FDtptID = intval($row['bm_FDtptID']);
			if (isset($row['bm_DtptKind'])) $tb->bm_DtptKind = intval($row['bm_DtptKind']);
			if (isset($row['bm_DtptState'])) $tb->bm_DtptState = intval($row['bm_DtptState']);
			if (isset($row['bm_DtptRemark'])) $tb->bm_DtptRemark = $row['bm_DtptRemark'];
		
			$result[] = $tb;
		}
		
		return $result;
	}	
	
	public static function insertSqlHeader(/*array*/ $fields=NULL)
	{
		$result = array();				
		if(!empty($fields)){
			$f = SQLUtil::parseFields($fields);			
			$result[0] = "INSERT INTO `BM_Department` ({$f}) VALUES ";	
			$ar = array();
			foreach($fields as $key){
				$ar[$key]=1;
			}
			$result[1] = $ar;
		}else{
			$result[0]="INSERT INTO `BM_Department` (`bm_DtptID`,`bm_DtptName`,`bm_DtptPRI`,`bm_FDtptID`,`bm_DtptKind`,`bm_DtptState`,`bm_DtptRemark`) VALUES ";
			$result[1] = array('bm_DtptID'=>1,'bm_DtptName'=>1,'bm_DtptPRI'=>1,'bm_FDtptID'=>1,'bm_DtptKind'=>1,'bm_DtptState'=>1,'bm_DtptRemark'=>1);
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
		$c = "`bm_DtptID`='{$this->bm_DtptID}'";
		
		if(!empty($fields))
		{
			$f = SQLUtil::parseFields($fields);			
		}
	    if (!empty($condition))
		{
			$c =SQLUtil::parseCondition($condition);
		}
		
		$sql = "SELECT {$f} FROM `BM_Department` WHERE {$c} LIMIT 1";


		$ars = sql_fetch_rows_assoc(self::$_db_name,$sql);
		
		if (!$ars || count($ars)==0)
		{
			return false;
		}
		
		$ar = $ars[0];
		
		if (isset($ar['bm_DtptID'])) $this->bm_DtptID = intval($ar['bm_DtptID']);
		if (isset($ar['bm_DtptName'])) $this->bm_DtptName = $ar['bm_DtptName'];
		if (isset($ar['bm_DtptPRI'])) $this->bm_DtptPRI = intval($ar['bm_DtptPRI']);
		if (isset($ar['bm_FDtptID'])) $this->bm_FDtptID = intval($ar['bm_FDtptID']);
		if (isset($ar['bm_DtptKind'])) $this->bm_DtptKind = intval($ar['bm_DtptKind']);
		if (isset($ar['bm_DtptState'])) $this->bm_DtptState = intval($ar['bm_DtptState']);
		if (isset($ar['bm_DtptRemark'])) $this->bm_DtptRemark = $ar['bm_DtptRemark'];
		
		
		$this->clean();
		
		return true;
	}
	
	public function /*boolean*/ loadFromExistFields()
	{
		$emptyCondition = true;
    	$emptyFields = true;
    	
    	$fields = array();
    	$condition = array();
    	
    	if (!isset($this->bm_DtptID)){
    		$emptyFields = false;
    		$fields[] = 'bm_DtptID';
    	}else{
    		$emptyCondition = false; 
    		$condition['bm_DtptID']=$this->bm_DtptID;
    	}
    	if (!isset($this->bm_DtptName)){
    		$emptyFields = false;
    		$fields[] = 'bm_DtptName';
    	}else{
    		$emptyCondition = false; 
    		$condition['bm_DtptName']=$this->bm_DtptName;
    	}
    	if (!isset($this->bm_DtptPRI)){
    		$emptyFields = false;
    		$fields[] = 'bm_DtptPRI';
    	}else{
    		$emptyCondition = false; 
    		$condition['bm_DtptPRI']=$this->bm_DtptPRI;
    	}
    	if (!isset($this->bm_FDtptID)){
    		$emptyFields = false;
    		$fields[] = 'bm_FDtptID';
    	}else{
    		$emptyCondition = false; 
    		$condition['bm_FDtptID']=$this->bm_FDtptID;
    	}
    	if (!isset($this->bm_DtptKind)){
    		$emptyFields = false;
    		$fields[] = 'bm_DtptKind';
    	}else{
    		$emptyCondition = false; 
    		$condition['bm_DtptKind']=$this->bm_DtptKind;
    	}
    	if (!isset($this->bm_DtptState)){
    		$emptyFields = false;
    		$fields[] = 'bm_DtptState';
    	}else{
    		$emptyCondition = false; 
    		$condition['bm_DtptState']=$this->bm_DtptState;
    	}
    	if (!isset($this->bm_DtptRemark)){
    		$emptyFields = false;
    		$fields[] = 'bm_DtptRemark';
    	}else{
    		$emptyCondition = false; 
    		$condition['bm_DtptRemark']=$this->bm_DtptRemark;
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
				
		if (!isset($this->bm_DtptID)) $this->bm_DtptID = get_mysql_insert_id(self::$_db_name);

		
		$this->clean();
		
		return true;	
		
	}
	
	public function /*boolean*/ save(/*array*/$condition=NULL)
	{
		if (empty($condition))
		{
			$uc = "`bm_DtptID`='{$this->bm_DtptID}'";
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
		
		$sql = "DELETE FROM `BM_Department` WHERE ".SQLUtil::parseCondition($condition);
		
		$qr = sql_query(self::$_db_name,$sql);
				
		return (boolean)$qr;
	}
	
	public function /*boolean*/ delete()
	{
		if (!$this->is_set_keys())
		{
			return false;
		}
		
		$sql = "DELETE FROM `BM_Department` WHERE `bm_DtptID`='{$this->bm_DtptID}'";
		

		$qr = sql_query(self::$_db_name,$sql);
				
		return (boolean)$qr;
	}
	
	public function getInsertValue($fields)
	{
		$values = "(";		
		foreach($fields as $f => $k){
			if($f == 'bm_DtptID'){
 				$values .= "'{$this->bm_DtptID}',";
 			}else if($f == 'bm_DtptName'){
 				$values .= "'{$this->bm_DtptName}',";
 			}else if($f == 'bm_DtptPRI'){
 				$values .= "'{$this->bm_DtptPRI}',";
 			}else if($f == 'bm_FDtptID'){
 				$values .= "'{$this->bm_FDtptID}',";
 			}else if($f == 'bm_DtptKind'){
 				$values .= "'{$this->bm_DtptKind}',";
 			}else if($f == 'bm_DtptState'){
 				$values .= "'{$this->bm_DtptState}',";
 			}else if($f == 'bm_DtptRemark'){
 				$values .= "'{$this->bm_DtptRemark}',";
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

		if (isset($this->bm_DtptID))
		{
			$fields .= "`bm_DtptID`,";
			$values .= "'{$this->bm_DtptID}',";
		}
		if (isset($this->bm_DtptName))
		{
			$fields .= "`bm_DtptName`,";
			$values .= "'{$this->bm_DtptName}',";
		}
		if (isset($this->bm_DtptPRI))
		{
			$fields .= "`bm_DtptPRI`,";
			$values .= "'{$this->bm_DtptPRI}',";
		}
		if (isset($this->bm_FDtptID))
		{
			$fields .= "`bm_FDtptID`,";
			$values .= "'{$this->bm_FDtptID}',";
		}
		if (isset($this->bm_DtptKind))
		{
			$fields .= "`bm_DtptKind`,";
			$values .= "'{$this->bm_DtptKind}',";
		}
		if (isset($this->bm_DtptState))
		{
			$fields .= "`bm_DtptState`,";
			$values .= "'{$this->bm_DtptState}',";
		}
		if (isset($this->bm_DtptRemark))
		{
			$fields .= "`bm_DtptRemark`,";
			$values .= "'{$this->bm_DtptRemark}',";
		}

		
		$fields .= ")";
		$values .= ")";
		
		$sql = "INSERT INTO `BM_Department` ".$fields.$values;
		
		return str_replace(",)",")",$sql);
	}
	
	private function /*string*/ getUpdateFields()
	{
		$update = "";
		
		if ($this->is_bm_DtptName_dirty)
		{			
			if (!isset($this->bm_DtptName))
			{
				$update .= ("`bm_DtptName`=null,");
			}
			else
			{
				$update .= ("`bm_DtptName`='{$this->bm_DtptName}',");
			}
		}
		if ($this->is_bm_DtptPRI_dirty)
		{			
			if (!isset($this->bm_DtptPRI))
			{
				$update .= ("`bm_DtptPRI`=null,");
			}
			else
			{
				$update .= ("`bm_DtptPRI`='{$this->bm_DtptPRI}',");
			}
		}
		if ($this->is_bm_FDtptID_dirty)
		{			
			if (!isset($this->bm_FDtptID))
			{
				$update .= ("`bm_FDtptID`=null,");
			}
			else
			{
				$update .= ("`bm_FDtptID`='{$this->bm_FDtptID}',");
			}
		}
		if ($this->is_bm_DtptKind_dirty)
		{			
			if (!isset($this->bm_DtptKind))
			{
				$update .= ("`bm_DtptKind`=null,");
			}
			else
			{
				$update .= ("`bm_DtptKind`='{$this->bm_DtptKind}',");
			}
		}
		if ($this->is_bm_DtptState_dirty)
		{			
			if (!isset($this->bm_DtptState))
			{
				$update .= ("`bm_DtptState`=null,");
			}
			else
			{
				$update .= ("`bm_DtptState`='{$this->bm_DtptState}',");
			}
		}
		if ($this->is_bm_DtptRemark_dirty)
		{			
			if (!isset($this->bm_DtptRemark))
			{
				$update .= ("`bm_DtptRemark`=null,");
			}
			else
			{
				$update .= ("`bm_DtptRemark`='{$this->bm_DtptRemark}',");
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
		
		$sql = "UPDATE `BM_Department` SET {$update} WHERE {$condition}";
		
		return $sql;
	}
	
	public function /*boolean*/ add($fieldsValue,$condition=NULL)
	{				
		if (empty($condition))
		{
			$uc = "`bm_DtptID`='{$this->bm_DtptID}'";
		}
		else
		{			
			$uc = SQLUtil::parseCondition($condition);
		}
		
		$update = SQLUtil::parseASFieldValues($fieldsValue);
		
		$sql = "UPDATE `BM_Department` SET {$update} WHERE {$uc}";
		
		$qr = sql_query(self::$_db_name,$sql);
				
		return (boolean)$qr;
	}	
	
	public function /*boolean*/ sub($fieldsValue,$condition=NULL)
	{
		if (empty($condition))
		{
			$uc = "`bm_DtptID`='{$this->bm_DtptID}'";
		}
		else
		{			
			$uc = SQLUtil::parseCondition($condition);
		}
		
		$update = SQLUtil::parseASFieldValues($fieldsValue,false);
		
		$sql = "UPDATE `BM_Department` SET {$update} WHERE {$uc}";
		
		$qr = sql_query(self::$_db_name,$sql);
				
		return (boolean)$qr;
	}
	
	/**
	 * 是否已经设置主键的值
	 */
	public function is_set_keys()
	{
		
		return (isset($this->bm_DtptID));

	}
	
	private function /*void*/ clean() 
	{
		$this->is_this_table_dirty = false;
		$this->is_bm_DtptID_dirty = false;
		$this->is_bm_DtptName_dirty = false;
		$this->is_bm_DtptPRI_dirty = false;
		$this->is_bm_FDtptID_dirty = false;
		$this->is_bm_DtptKind_dirty = false;
		$this->is_bm_DtptState_dirty = false;
		$this->is_bm_DtptRemark_dirty = false;

	}
	
	public function /*int*/ getBmDtptID()
	{
		return $this->bm_DtptID;
	}
	
	public function /*void*/ setBmDtptID(/*int*/ $bm_DtptID)
	{
		$this->bm_DtptID = intval($bm_DtptID);
		$this->is_bm_DtptID_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setBmDtptIDNull()
	{
		$this->bm_DtptID = null;
		$this->is_bm_DtptID_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*string*/ getBmDtptName()
	{
		return $this->bm_DtptName;
	}
	
	public function /*void*/ setBmDtptName(/*string*/ $bm_DtptName)
	{
		$this->bm_DtptName = SQLUtil::toSafeSQLString($bm_DtptName);
		$this->is_bm_DtptName_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setBmDtptNameNull()
	{
		$this->bm_DtptName = null;
		$this->is_bm_DtptName_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*int*/ getBmDtptPRI()
	{
		return $this->bm_DtptPRI;
	}
	
	public function /*void*/ setBmDtptPRI(/*int*/ $bm_DtptPRI)
	{
		$this->bm_DtptPRI = intval($bm_DtptPRI);
		$this->is_bm_DtptPRI_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setBmDtptPRINull()
	{
		$this->bm_DtptPRI = null;
		$this->is_bm_DtptPRI_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*int*/ getBmFDtptID()
	{
		return $this->bm_FDtptID;
	}
	
	public function /*void*/ setBmFDtptID(/*int*/ $bm_FDtptID)
	{
		$this->bm_FDtptID = intval($bm_FDtptID);
		$this->is_bm_FDtptID_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setBmFDtptIDNull()
	{
		$this->bm_FDtptID = null;
		$this->is_bm_FDtptID_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*int*/ getBmDtptKind()
	{
		return $this->bm_DtptKind;
	}
	
	public function /*void*/ setBmDtptKind(/*int*/ $bm_DtptKind)
	{
		$this->bm_DtptKind = intval($bm_DtptKind);
		$this->is_bm_DtptKind_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setBmDtptKindNull()
	{
		$this->bm_DtptKind = null;
		$this->is_bm_DtptKind_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*int*/ getBmDtptState()
	{
		return $this->bm_DtptState;
	}
	
	public function /*void*/ setBmDtptState(/*int*/ $bm_DtptState)
	{
		$this->bm_DtptState = intval($bm_DtptState);
		$this->is_bm_DtptState_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setBmDtptStateNull()
	{
		$this->bm_DtptState = null;
		$this->is_bm_DtptState_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*string*/ getBmDtptRemark()
	{
		return $this->bm_DtptRemark;
	}
	
	public function /*void*/ setBmDtptRemark(/*string*/ $bm_DtptRemark)
	{
		$this->bm_DtptRemark = SQLUtil::toSafeSQLString($bm_DtptRemark);
		$this->is_bm_DtptRemark_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setBmDtptRemarkNull()
	{
		$this->bm_DtptRemark = null;
		$this->is_bm_DtptRemark_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	
	public function /*string*/ toDebugString()
	{
		$dbg = "(";
		
		$dbg .= ("bm_DtptID={$this->bm_DtptID},");
		$dbg .= ("bm_DtptName={$this->bm_DtptName},");
		$dbg .= ("bm_DtptPRI={$this->bm_DtptPRI},");
		$dbg .= ("bm_FDtptID={$this->bm_FDtptID},");
		$dbg .= ("bm_DtptKind={$this->bm_DtptKind},");
		$dbg .= ("bm_DtptState={$this->bm_DtptState},");
		$dbg .= ("bm_DtptRemark={$this->bm_DtptRemark},");

		$dbg .= ")";
				
		return str_replace(",)",")",$dbg);
	}
	
	public function fromArray($arr)
	{
		if (isset($arr['bm_DtptID'])) $this->setBmDtptID($arr['bm_DtptID']);
		if (isset($arr['bm_DtptName'])) $this->setBmDtptName($arr['bm_DtptName']);
		if (isset($arr['bm_DtptPRI'])) $this->setBmDtptPRI($arr['bm_DtptPRI']);
		if (isset($arr['bm_FDtptID'])) $this->setBmFDtptID($arr['bm_FDtptID']);
		if (isset($arr['bm_DtptKind'])) $this->setBmDtptKind($arr['bm_DtptKind']);
		if (isset($arr['bm_DtptState'])) $this->setBmDtptState($arr['bm_DtptState']);
		if (isset($arr['bm_DtptRemark'])) $this->setBmDtptRemark($arr['bm_DtptRemark']);
		
	}
	
	public function toArray()
	{
		$ret = array();
		$ret['bm_DtptID'] = $this->bm_DtptID;
		$ret['bm_DtptName'] = $this->bm_DtptName;
		$ret['bm_DtptPRI'] = $this->bm_DtptPRI;
		$ret['bm_FDtptID'] = $this->bm_FDtptID;
		$ret['bm_DtptKind'] = $this->bm_DtptKind;
		$ret['bm_DtptState'] = $this->bm_DtptState;
		$ret['bm_DtptRemark'] = $this->bm_DtptRemark;

		return $ret;
	}
}

?>
