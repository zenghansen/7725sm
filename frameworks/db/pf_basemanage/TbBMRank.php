<?php
require_once (FRAMEWORK_PATH . "utils/MysqlDBHelper.php");
require_once (FRAMEWORK_PATH . "db/SQLUtil.php");
/**
 * database table BM_Rank description
 * 
 * [This file was auto-generated. PLEASE DONT EDIT]
 * 
 * @author LiangZhixian
 * 
 */
class TbBMRank {
	
	public static $_db_name = "pf_basemanage";
	
	private /*int*/ $bm_RankID; //PRIMARY KEY 级别ID
	private /*int*/ $bm_DtptID; //部门ID
	private /*string*/ $bm_RankName; //级别名称
	private /*int*/ $bm_RankPRI; //级别优先级
	private /*int*/ $bm_FRankID; //父级别ID
	private /*int*/ $bm_RankKind; //级别种类              0,主管              1,普通
	private /*int*/ $bm_RankState; //级别状态              0,普通              2,隐藏              99,删除
	private /*string*/ $bm_RankRemark; //级别描述

	
	private $is_this_table_dirty = false;
	private $is_bm_RankID_dirty = false;
	private $is_bm_DtptID_dirty = false;
	private $is_bm_RankName_dirty = false;
	private $is_bm_RankPRI_dirty = false;
	private $is_bm_FRankID_dirty = false;
	private $is_bm_RankKind_dirty = false;
	private $is_bm_RankState_dirty = false;
	private $is_bm_RankRemark_dirty = false;


	/**
	 * @param array($condition)
	 * @return array(TbBMRank)
	 */
	public static function /*array(TbBMRank)*/ loadTable(/*array*/ $fields=NULL,/*array*/$condition=NULL)
	{
		$result = array();
		
		$f = "*";
		
		if(!empty($fields))
		{
			$f = SQLUtil::parseFields($fields);			
		}
		
		if (empty($condition))
		{
			$sql = "SELECT {$f} FROM `BM_Rank`";
		}
		else
		{			
			$sql = "SELECT {$f} FROM `BM_Rank` WHERE ".SQLUtil::parseCondition($condition);
		}			
		
		$ar = sql_fetch_rows_assoc(self::$_db_name,$sql);
		
		if (empty($ar) || count($ar) == 0)
		{
			return $result;
		}
		
		foreach($ar as $row)
		{
			$tb = new TbBMRank();			
			if (isset($row['bm_RankID'])) $tb->bm_RankID = intval($row['bm_RankID']);
			if (isset($row['bm_DtptID'])) $tb->bm_DtptID = intval($row['bm_DtptID']);
			if (isset($row['bm_RankName'])) $tb->bm_RankName = $row['bm_RankName'];
			if (isset($row['bm_RankPRI'])) $tb->bm_RankPRI = intval($row['bm_RankPRI']);
			if (isset($row['bm_FRankID'])) $tb->bm_FRankID = intval($row['bm_FRankID']);
			if (isset($row['bm_RankKind'])) $tb->bm_RankKind = intval($row['bm_RankKind']);
			if (isset($row['bm_RankState'])) $tb->bm_RankState = intval($row['bm_RankState']);
			if (isset($row['bm_RankRemark'])) $tb->bm_RankRemark = $row['bm_RankRemark'];
		
			$result[] = $tb;
		}
		
		return $result;
	}	
	
	public static function insertSqlHeader(/*array*/ $fields=NULL)
	{
		$result = array();				
		if(!empty($fields)){
			$f = SQLUtil::parseFields($fields);			
			$result[0] = "INSERT INTO `BM_Rank` ({$f}) VALUES ";	
			$ar = array();
			foreach($fields as $key){
				$ar[$key]=1;
			}
			$result[1] = $ar;
		}else{
			$result[0]="INSERT INTO `BM_Rank` (`bm_RankID`,`bm_DtptID`,`bm_RankName`,`bm_RankPRI`,`bm_FRankID`,`bm_RankKind`,`bm_RankState`,`bm_RankRemark`) VALUES ";
			$result[1] = array('bm_RankID'=>1,'bm_DtptID'=>1,'bm_RankName'=>1,'bm_RankPRI'=>1,'bm_FRankID'=>1,'bm_RankKind'=>1,'bm_RankState'=>1,'bm_RankRemark'=>1);
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
		$c = "`bm_RankID`='{$this->bm_RankID}'";
		
		if(!empty($fields))
		{
			$f = SQLUtil::parseFields($fields);			
		}
	    if (!empty($condition))
		{
			$c =SQLUtil::parseCondition($condition);
		}
		
		$sql = "SELECT {$f} FROM `BM_Rank` WHERE {$c} LIMIT 1";


		$ars = sql_fetch_rows_assoc(self::$_db_name,$sql);
		
		if (!$ars || count($ars)==0)
		{
			return false;
		}
		
		$ar = $ars[0];
		
		if (isset($ar['bm_RankID'])) $this->bm_RankID = intval($ar['bm_RankID']);
		if (isset($ar['bm_DtptID'])) $this->bm_DtptID = intval($ar['bm_DtptID']);
		if (isset($ar['bm_RankName'])) $this->bm_RankName = $ar['bm_RankName'];
		if (isset($ar['bm_RankPRI'])) $this->bm_RankPRI = intval($ar['bm_RankPRI']);
		if (isset($ar['bm_FRankID'])) $this->bm_FRankID = intval($ar['bm_FRankID']);
		if (isset($ar['bm_RankKind'])) $this->bm_RankKind = intval($ar['bm_RankKind']);
		if (isset($ar['bm_RankState'])) $this->bm_RankState = intval($ar['bm_RankState']);
		if (isset($ar['bm_RankRemark'])) $this->bm_RankRemark = $ar['bm_RankRemark'];
		
		
		$this->clean();
		
		return true;
	}
	
	public function /*boolean*/ loadFromExistFields()
	{
		$emptyCondition = true;
    	$emptyFields = true;
    	
    	$fields = array();
    	$condition = array();
    	
    	if (!isset($this->bm_RankID)){
    		$emptyFields = false;
    		$fields[] = 'bm_RankID';
    	}else{
    		$emptyCondition = false; 
    		$condition['bm_RankID']=$this->bm_RankID;
    	}
    	if (!isset($this->bm_DtptID)){
    		$emptyFields = false;
    		$fields[] = 'bm_DtptID';
    	}else{
    		$emptyCondition = false; 
    		$condition['bm_DtptID']=$this->bm_DtptID;
    	}
    	if (!isset($this->bm_RankName)){
    		$emptyFields = false;
    		$fields[] = 'bm_RankName';
    	}else{
    		$emptyCondition = false; 
    		$condition['bm_RankName']=$this->bm_RankName;
    	}
    	if (!isset($this->bm_RankPRI)){
    		$emptyFields = false;
    		$fields[] = 'bm_RankPRI';
    	}else{
    		$emptyCondition = false; 
    		$condition['bm_RankPRI']=$this->bm_RankPRI;
    	}
    	if (!isset($this->bm_FRankID)){
    		$emptyFields = false;
    		$fields[] = 'bm_FRankID';
    	}else{
    		$emptyCondition = false; 
    		$condition['bm_FRankID']=$this->bm_FRankID;
    	}
    	if (!isset($this->bm_RankKind)){
    		$emptyFields = false;
    		$fields[] = 'bm_RankKind';
    	}else{
    		$emptyCondition = false; 
    		$condition['bm_RankKind']=$this->bm_RankKind;
    	}
    	if (!isset($this->bm_RankState)){
    		$emptyFields = false;
    		$fields[] = 'bm_RankState';
    	}else{
    		$emptyCondition = false; 
    		$condition['bm_RankState']=$this->bm_RankState;
    	}
    	if (!isset($this->bm_RankRemark)){
    		$emptyFields = false;
    		$fields[] = 'bm_RankRemark';
    	}else{
    		$emptyCondition = false; 
    		$condition['bm_RankRemark']=$this->bm_RankRemark;
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
				
		if (!isset($this->bm_RankID)) $this->bm_RankID = get_mysql_insert_id(self::$_db_name);

		
		$this->clean();
		
		return true;	
		
	}
	
	public function /*boolean*/ save(/*array*/$condition=NULL)
	{
		if (empty($condition))
		{
			$uc = "`bm_RankID`='{$this->bm_RankID}'";
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
		
		$sql = "DELETE FROM `BM_Rank` WHERE ".SQLUtil::parseCondition($condition);
		
		$qr = sql_query(self::$_db_name,$sql);
				
		return (boolean)$qr;
	}
	
	public function /*boolean*/ delete()
	{
		if (!$this->is_set_keys())
		{
			return false;
		}
		
		$sql = "DELETE FROM `BM_Rank` WHERE `bm_RankID`='{$this->bm_RankID}'";
		

		$qr = sql_query(self::$_db_name,$sql);
				
		return (boolean)$qr;
	}
	
	public function getInsertValue($fields)
	{
		$values = "(";		
		foreach($fields as $f => $k){
			if($f == 'bm_RankID'){
 				$values .= "'{$this->bm_RankID}',";
 			}else if($f == 'bm_DtptID'){
 				$values .= "'{$this->bm_DtptID}',";
 			}else if($f == 'bm_RankName'){
 				$values .= "'{$this->bm_RankName}',";
 			}else if($f == 'bm_RankPRI'){
 				$values .= "'{$this->bm_RankPRI}',";
 			}else if($f == 'bm_FRankID'){
 				$values .= "'{$this->bm_FRankID}',";
 			}else if($f == 'bm_RankKind'){
 				$values .= "'{$this->bm_RankKind}',";
 			}else if($f == 'bm_RankState'){
 				$values .= "'{$this->bm_RankState}',";
 			}else if($f == 'bm_RankRemark'){
 				$values .= "'{$this->bm_RankRemark}',";
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

		if (isset($this->bm_RankID))
		{
			$fields .= "`bm_RankID`,";
			$values .= "'{$this->bm_RankID}',";
		}
		if (isset($this->bm_DtptID))
		{
			$fields .= "`bm_DtptID`,";
			$values .= "'{$this->bm_DtptID}',";
		}
		if (isset($this->bm_RankName))
		{
			$fields .= "`bm_RankName`,";
			$values .= "'{$this->bm_RankName}',";
		}
		if (isset($this->bm_RankPRI))
		{
			$fields .= "`bm_RankPRI`,";
			$values .= "'{$this->bm_RankPRI}',";
		}
		if (isset($this->bm_FRankID))
		{
			$fields .= "`bm_FRankID`,";
			$values .= "'{$this->bm_FRankID}',";
		}
		if (isset($this->bm_RankKind))
		{
			$fields .= "`bm_RankKind`,";
			$values .= "'{$this->bm_RankKind}',";
		}
		if (isset($this->bm_RankState))
		{
			$fields .= "`bm_RankState`,";
			$values .= "'{$this->bm_RankState}',";
		}
		if (isset($this->bm_RankRemark))
		{
			$fields .= "`bm_RankRemark`,";
			$values .= "'{$this->bm_RankRemark}',";
		}

		
		$fields .= ")";
		$values .= ")";
		
		$sql = "INSERT INTO `BM_Rank` ".$fields.$values;
		
		return str_replace(",)",")",$sql);
	}
	
	private function /*string*/ getUpdateFields()
	{
		$update = "";
		
		if ($this->is_bm_DtptID_dirty)
		{			
			if (!isset($this->bm_DtptID))
			{
				$update .= ("`bm_DtptID`=null,");
			}
			else
			{
				$update .= ("`bm_DtptID`='{$this->bm_DtptID}',");
			}
		}
		if ($this->is_bm_RankName_dirty)
		{			
			if (!isset($this->bm_RankName))
			{
				$update .= ("`bm_RankName`=null,");
			}
			else
			{
				$update .= ("`bm_RankName`='{$this->bm_RankName}',");
			}
		}
		if ($this->is_bm_RankPRI_dirty)
		{			
			if (!isset($this->bm_RankPRI))
			{
				$update .= ("`bm_RankPRI`=null,");
			}
			else
			{
				$update .= ("`bm_RankPRI`='{$this->bm_RankPRI}',");
			}
		}
		if ($this->is_bm_FRankID_dirty)
		{			
			if (!isset($this->bm_FRankID))
			{
				$update .= ("`bm_FRankID`=null,");
			}
			else
			{
				$update .= ("`bm_FRankID`='{$this->bm_FRankID}',");
			}
		}
		if ($this->is_bm_RankKind_dirty)
		{			
			if (!isset($this->bm_RankKind))
			{
				$update .= ("`bm_RankKind`=null,");
			}
			else
			{
				$update .= ("`bm_RankKind`='{$this->bm_RankKind}',");
			}
		}
		if ($this->is_bm_RankState_dirty)
		{			
			if (!isset($this->bm_RankState))
			{
				$update .= ("`bm_RankState`=null,");
			}
			else
			{
				$update .= ("`bm_RankState`='{$this->bm_RankState}',");
			}
		}
		if ($this->is_bm_RankRemark_dirty)
		{			
			if (!isset($this->bm_RankRemark))
			{
				$update .= ("`bm_RankRemark`=null,");
			}
			else
			{
				$update .= ("`bm_RankRemark`='{$this->bm_RankRemark}',");
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
		
		$sql = "UPDATE `BM_Rank` SET {$update} WHERE {$condition}";
		
		return $sql;
	}
	
	public function /*boolean*/ add($fieldsValue,$condition=NULL)
	{				
		if (empty($condition))
		{
			$uc = "`bm_RankID`='{$this->bm_RankID}'";
		}
		else
		{			
			$uc = SQLUtil::parseCondition($condition);
		}
		
		$update = SQLUtil::parseASFieldValues($fieldsValue);
		
		$sql = "UPDATE `BM_Rank` SET {$update} WHERE {$uc}";
		
		$qr = sql_query(self::$_db_name,$sql);
				
		return (boolean)$qr;
	}	
	
	public function /*boolean*/ sub($fieldsValue,$condition=NULL)
	{
		if (empty($condition))
		{
			$uc = "`bm_RankID`='{$this->bm_RankID}'";
		}
		else
		{			
			$uc = SQLUtil::parseCondition($condition);
		}
		
		$update = SQLUtil::parseASFieldValues($fieldsValue,false);
		
		$sql = "UPDATE `BM_Rank` SET {$update} WHERE {$uc}";
		
		$qr = sql_query(self::$_db_name,$sql);
				
		return (boolean)$qr;
	}
	
	/**
	 * 是否已经设置主键的值
	 */
	public function is_set_keys()
	{
		
		return (isset($this->bm_RankID));

	}
	
	private function /*void*/ clean() 
	{
		$this->is_this_table_dirty = false;
		$this->is_bm_RankID_dirty = false;
		$this->is_bm_DtptID_dirty = false;
		$this->is_bm_RankName_dirty = false;
		$this->is_bm_RankPRI_dirty = false;
		$this->is_bm_FRankID_dirty = false;
		$this->is_bm_RankKind_dirty = false;
		$this->is_bm_RankState_dirty = false;
		$this->is_bm_RankRemark_dirty = false;

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

	public function /*string*/ getBmRankName()
	{
		return $this->bm_RankName;
	}
	
	public function /*void*/ setBmRankName(/*string*/ $bm_RankName)
	{
		$this->bm_RankName = SQLUtil::toSafeSQLString($bm_RankName);
		$this->is_bm_RankName_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setBmRankNameNull()
	{
		$this->bm_RankName = null;
		$this->is_bm_RankName_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*int*/ getBmRankPRI()
	{
		return $this->bm_RankPRI;
	}
	
	public function /*void*/ setBmRankPRI(/*int*/ $bm_RankPRI)
	{
		$this->bm_RankPRI = intval($bm_RankPRI);
		$this->is_bm_RankPRI_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setBmRankPRINull()
	{
		$this->bm_RankPRI = null;
		$this->is_bm_RankPRI_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*int*/ getBmFRankID()
	{
		return $this->bm_FRankID;
	}
	
	public function /*void*/ setBmFRankID(/*int*/ $bm_FRankID)
	{
		$this->bm_FRankID = intval($bm_FRankID);
		$this->is_bm_FRankID_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setBmFRankIDNull()
	{
		$this->bm_FRankID = null;
		$this->is_bm_FRankID_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*int*/ getBmRankKind()
	{
		return $this->bm_RankKind;
	}
	
	public function /*void*/ setBmRankKind(/*int*/ $bm_RankKind)
	{
		$this->bm_RankKind = intval($bm_RankKind);
		$this->is_bm_RankKind_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setBmRankKindNull()
	{
		$this->bm_RankKind = null;
		$this->is_bm_RankKind_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*int*/ getBmRankState()
	{
		return $this->bm_RankState;
	}
	
	public function /*void*/ setBmRankState(/*int*/ $bm_RankState)
	{
		$this->bm_RankState = intval($bm_RankState);
		$this->is_bm_RankState_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setBmRankStateNull()
	{
		$this->bm_RankState = null;
		$this->is_bm_RankState_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*string*/ getBmRankRemark()
	{
		return $this->bm_RankRemark;
	}
	
	public function /*void*/ setBmRankRemark(/*string*/ $bm_RankRemark)
	{
		$this->bm_RankRemark = SQLUtil::toSafeSQLString($bm_RankRemark);
		$this->is_bm_RankRemark_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setBmRankRemarkNull()
	{
		$this->bm_RankRemark = null;
		$this->is_bm_RankRemark_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	
	public function /*string*/ toDebugString()
	{
		$dbg = "(";
		
		$dbg .= ("bm_RankID={$this->bm_RankID},");
		$dbg .= ("bm_DtptID={$this->bm_DtptID},");
		$dbg .= ("bm_RankName={$this->bm_RankName},");
		$dbg .= ("bm_RankPRI={$this->bm_RankPRI},");
		$dbg .= ("bm_FRankID={$this->bm_FRankID},");
		$dbg .= ("bm_RankKind={$this->bm_RankKind},");
		$dbg .= ("bm_RankState={$this->bm_RankState},");
		$dbg .= ("bm_RankRemark={$this->bm_RankRemark},");

		$dbg .= ")";
				
		return str_replace(",)",")",$dbg);
	}
	
	public function fromArray($arr)
	{
		if (isset($arr['bm_RankID'])) $this->setBmRankID($arr['bm_RankID']);
		if (isset($arr['bm_DtptID'])) $this->setBmDtptID($arr['bm_DtptID']);
		if (isset($arr['bm_RankName'])) $this->setBmRankName($arr['bm_RankName']);
		if (isset($arr['bm_RankPRI'])) $this->setBmRankPRI($arr['bm_RankPRI']);
		if (isset($arr['bm_FRankID'])) $this->setBmFRankID($arr['bm_FRankID']);
		if (isset($arr['bm_RankKind'])) $this->setBmRankKind($arr['bm_RankKind']);
		if (isset($arr['bm_RankState'])) $this->setBmRankState($arr['bm_RankState']);
		if (isset($arr['bm_RankRemark'])) $this->setBmRankRemark($arr['bm_RankRemark']);
		
	}
	
	public function toArray()
	{
		$ret = array();
		$ret['bm_RankID'] = $this->bm_RankID;
		$ret['bm_DtptID'] = $this->bm_DtptID;
		$ret['bm_RankName'] = $this->bm_RankName;
		$ret['bm_RankPRI'] = $this->bm_RankPRI;
		$ret['bm_FRankID'] = $this->bm_FRankID;
		$ret['bm_RankKind'] = $this->bm_RankKind;
		$ret['bm_RankState'] = $this->bm_RankState;
		$ret['bm_RankRemark'] = $this->bm_RankRemark;

		return $ret;
	}
}

?>
