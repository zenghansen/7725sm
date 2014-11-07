<?php
require_once (FRAMEWORK_PATH . "utils/MysqlDBHelper.php");
require_once (FRAMEWORK_PATH . "db/SQLUtil.php");
/**
 * database table BM_ModuleStructure description
 * 
 * [This file was auto-generated. PLEASE DONT EDIT]
 * 
 * @author LiangZhixian
 * 
 */
class TbBMModuleStructure {
	
	public static $_db_name = "pf_basemanage";
	
	private /*int*/ $bm_ModuleID; //PRIMARY KEY 模块ID
	private /*string*/ $bm_ModuleName; //模块名称
	private /*int*/ $bm_FModuleID; //父模块ID
	private /*int*/ $bm_ModuleLevel; //模块等级              0,总模块              1,后面依次排下去
	private /*string*/ $bm_ModuleUrl; //链接地址
	private /*string*/ $bm_FModuleUrl; //子链接地址              用|分割
	private /*int*/ $bm_ModulePRI; //模块优先级
	private /*int*/ $bm_ModuleState; //模块状态              0,普通显示              1,权限显示              2,隐藏              99,删除
	private /*string*/ $bm_ModuleRemark; //备注

	
	private $is_this_table_dirty = false;
	private $is_bm_ModuleID_dirty = false;
	private $is_bm_ModuleName_dirty = false;
	private $is_bm_FModuleID_dirty = false;
	private $is_bm_ModuleLevel_dirty = false;
	private $is_bm_ModuleUrl_dirty = false;
	private $is_bm_FModuleUrl_dirty = false;
	private $is_bm_ModulePRI_dirty = false;
	private $is_bm_ModuleState_dirty = false;
	private $is_bm_ModuleRemark_dirty = false;


	/**
	 * @param array($condition)
	 * @return array(TbBMModuleStructure)
	 */
	public static function /*array(TbBMModuleStructure)*/ loadTable(/*array*/ $fields=NULL,/*array*/$condition=NULL)
	{
		$result = array();
		
		$f = "*";
		
		if(!empty($fields))
		{
			$f = SQLUtil::parseFields($fields);			
		}
		
		if (empty($condition))
		{
			$sql = "SELECT {$f} FROM `BM_ModuleStructure`";
		}
		else
		{			
			$sql = "SELECT {$f} FROM `BM_ModuleStructure` WHERE ".SQLUtil::parseCondition($condition);
		}			
		
		$ar = sql_fetch_rows_assoc(self::$_db_name,$sql);
		
		if (empty($ar) || count($ar) == 0)
		{
			return $result;
		}
		
		foreach($ar as $row)
		{
			$tb = new TbBMModuleStructure();			
			if (isset($row['bm_ModuleID'])) $tb->bm_ModuleID = intval($row['bm_ModuleID']);
			if (isset($row['bm_ModuleName'])) $tb->bm_ModuleName = $row['bm_ModuleName'];
			if (isset($row['bm_FModuleID'])) $tb->bm_FModuleID = intval($row['bm_FModuleID']);
			if (isset($row['bm_ModuleLevel'])) $tb->bm_ModuleLevel = intval($row['bm_ModuleLevel']);
			if (isset($row['bm_ModuleUrl'])) $tb->bm_ModuleUrl = $row['bm_ModuleUrl'];
			if (isset($row['bm_FModuleUrl'])) $tb->bm_FModuleUrl = $row['bm_FModuleUrl'];
			if (isset($row['bm_ModulePRI'])) $tb->bm_ModulePRI = intval($row['bm_ModulePRI']);
			if (isset($row['bm_ModuleState'])) $tb->bm_ModuleState = intval($row['bm_ModuleState']);
			if (isset($row['bm_ModuleRemark'])) $tb->bm_ModuleRemark = $row['bm_ModuleRemark'];
		
			$result[] = $tb;
		}
		
		return $result;
	}	
	
	public static function insertSqlHeader(/*array*/ $fields=NULL)
	{
		$result = array();				
		if(!empty($fields)){
			$f = SQLUtil::parseFields($fields);			
			$result[0] = "INSERT INTO `BM_ModuleStructure` ({$f}) VALUES ";	
			$ar = array();
			foreach($fields as $key){
				$ar[$key]=1;
			}
			$result[1] = $ar;
		}else{
			$result[0]="INSERT INTO `BM_ModuleStructure` (`bm_ModuleID`,`bm_ModuleName`,`bm_FModuleID`,`bm_ModuleLevel`,`bm_ModuleUrl`,`bm_FModuleUrl`,`bm_ModulePRI`,`bm_ModuleState`,`bm_ModuleRemark`) VALUES ";
			$result[1] = array('bm_ModuleID'=>1,'bm_ModuleName'=>1,'bm_FModuleID'=>1,'bm_ModuleLevel'=>1,'bm_ModuleUrl'=>1,'bm_FModuleUrl'=>1,'bm_ModulePRI'=>1,'bm_ModuleState'=>1,'bm_ModuleRemark'=>1);
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
		$c = "`bm_ModuleID`='{$this->bm_ModuleID}'";
		
		if(!empty($fields))
		{
			$f = SQLUtil::parseFields($fields);			
		}
	    if (!empty($condition))
		{
			$c =SQLUtil::parseCondition($condition);
		}
		
		$sql = "SELECT {$f} FROM `BM_ModuleStructure` WHERE {$c} LIMIT 1";


		$ars = sql_fetch_rows_assoc(self::$_db_name,$sql);
		
		if (!$ars || count($ars)==0)
		{
			return false;
		}
		
		$ar = $ars[0];
		
		if (isset($ar['bm_ModuleID'])) $this->bm_ModuleID = intval($ar['bm_ModuleID']);
		if (isset($ar['bm_ModuleName'])) $this->bm_ModuleName = $ar['bm_ModuleName'];
		if (isset($ar['bm_FModuleID'])) $this->bm_FModuleID = intval($ar['bm_FModuleID']);
		if (isset($ar['bm_ModuleLevel'])) $this->bm_ModuleLevel = intval($ar['bm_ModuleLevel']);
		if (isset($ar['bm_ModuleUrl'])) $this->bm_ModuleUrl = $ar['bm_ModuleUrl'];
		if (isset($ar['bm_FModuleUrl'])) $this->bm_FModuleUrl = $ar['bm_FModuleUrl'];
		if (isset($ar['bm_ModulePRI'])) $this->bm_ModulePRI = intval($ar['bm_ModulePRI']);
		if (isset($ar['bm_ModuleState'])) $this->bm_ModuleState = intval($ar['bm_ModuleState']);
		if (isset($ar['bm_ModuleRemark'])) $this->bm_ModuleRemark = $ar['bm_ModuleRemark'];
		
		
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
    	if (!isset($this->bm_ModuleName)){
    		$emptyFields = false;
    		$fields[] = 'bm_ModuleName';
    	}else{
    		$emptyCondition = false; 
    		$condition['bm_ModuleName']=$this->bm_ModuleName;
    	}
    	if (!isset($this->bm_FModuleID)){
    		$emptyFields = false;
    		$fields[] = 'bm_FModuleID';
    	}else{
    		$emptyCondition = false; 
    		$condition['bm_FModuleID']=$this->bm_FModuleID;
    	}
    	if (!isset($this->bm_ModuleLevel)){
    		$emptyFields = false;
    		$fields[] = 'bm_ModuleLevel';
    	}else{
    		$emptyCondition = false; 
    		$condition['bm_ModuleLevel']=$this->bm_ModuleLevel;
    	}
    	if (!isset($this->bm_ModuleUrl)){
    		$emptyFields = false;
    		$fields[] = 'bm_ModuleUrl';
    	}else{
    		$emptyCondition = false; 
    		$condition['bm_ModuleUrl']=$this->bm_ModuleUrl;
    	}
    	if (!isset($this->bm_FModuleUrl)){
    		$emptyFields = false;
    		$fields[] = 'bm_FModuleUrl';
    	}else{
    		$emptyCondition = false; 
    		$condition['bm_FModuleUrl']=$this->bm_FModuleUrl;
    	}
    	if (!isset($this->bm_ModulePRI)){
    		$emptyFields = false;
    		$fields[] = 'bm_ModulePRI';
    	}else{
    		$emptyCondition = false; 
    		$condition['bm_ModulePRI']=$this->bm_ModulePRI;
    	}
    	if (!isset($this->bm_ModuleState)){
    		$emptyFields = false;
    		$fields[] = 'bm_ModuleState';
    	}else{
    		$emptyCondition = false; 
    		$condition['bm_ModuleState']=$this->bm_ModuleState;
    	}
    	if (!isset($this->bm_ModuleRemark)){
    		$emptyFields = false;
    		$fields[] = 'bm_ModuleRemark';
    	}else{
    		$emptyCondition = false; 
    		$condition['bm_ModuleRemark']=$this->bm_ModuleRemark;
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
				
		if (!isset($this->bm_ModuleID)) $this->bm_ModuleID = get_mysql_insert_id(self::$_db_name);

		
		$this->clean();
		
		return true;	
		
	}
	
	public function /*boolean*/ save(/*array*/$condition=NULL)
	{
		if (empty($condition))
		{
			$uc = "`bm_ModuleID`='{$this->bm_ModuleID}'";
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
		
		$sql = "DELETE FROM `BM_ModuleStructure` WHERE ".SQLUtil::parseCondition($condition);
		
		$qr = sql_query(self::$_db_name,$sql);
				
		return (boolean)$qr;
	}
	
	public function /*boolean*/ delete()
	{
		if (!$this->is_set_keys())
		{
			return false;
		}
		
		$sql = "DELETE FROM `BM_ModuleStructure` WHERE `bm_ModuleID`='{$this->bm_ModuleID}'";
		

		$qr = sql_query(self::$_db_name,$sql);
				
		return (boolean)$qr;
	}
	
	public function getInsertValue($fields)
	{
		$values = "(";		
		foreach($fields as $f => $k){
			if($f == 'bm_ModuleID'){
 				$values .= "'{$this->bm_ModuleID}',";
 			}else if($f == 'bm_ModuleName'){
 				$values .= "'{$this->bm_ModuleName}',";
 			}else if($f == 'bm_FModuleID'){
 				$values .= "'{$this->bm_FModuleID}',";
 			}else if($f == 'bm_ModuleLevel'){
 				$values .= "'{$this->bm_ModuleLevel}',";
 			}else if($f == 'bm_ModuleUrl'){
 				$values .= "'{$this->bm_ModuleUrl}',";
 			}else if($f == 'bm_FModuleUrl'){
 				$values .= "'{$this->bm_FModuleUrl}',";
 			}else if($f == 'bm_ModulePRI'){
 				$values .= "'{$this->bm_ModulePRI}',";
 			}else if($f == 'bm_ModuleState'){
 				$values .= "'{$this->bm_ModuleState}',";
 			}else if($f == 'bm_ModuleRemark'){
 				$values .= "'{$this->bm_ModuleRemark}',";
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
		if (isset($this->bm_ModuleName))
		{
			$fields .= "`bm_ModuleName`,";
			$values .= "'{$this->bm_ModuleName}',";
		}
		if (isset($this->bm_FModuleID))
		{
			$fields .= "`bm_FModuleID`,";
			$values .= "'{$this->bm_FModuleID}',";
		}
		if (isset($this->bm_ModuleLevel))
		{
			$fields .= "`bm_ModuleLevel`,";
			$values .= "'{$this->bm_ModuleLevel}',";
		}
		if (isset($this->bm_ModuleUrl))
		{
			$fields .= "`bm_ModuleUrl`,";
			$values .= "'{$this->bm_ModuleUrl}',";
		}
		if (isset($this->bm_FModuleUrl))
		{
			$fields .= "`bm_FModuleUrl`,";
			$values .= "'{$this->bm_FModuleUrl}',";
		}
		if (isset($this->bm_ModulePRI))
		{
			$fields .= "`bm_ModulePRI`,";
			$values .= "'{$this->bm_ModulePRI}',";
		}
		if (isset($this->bm_ModuleState))
		{
			$fields .= "`bm_ModuleState`,";
			$values .= "'{$this->bm_ModuleState}',";
		}
		if (isset($this->bm_ModuleRemark))
		{
			$fields .= "`bm_ModuleRemark`,";
			$values .= "'{$this->bm_ModuleRemark}',";
		}

		
		$fields .= ")";
		$values .= ")";
		
		$sql = "INSERT INTO `BM_ModuleStructure` ".$fields.$values;
		
		return str_replace(",)",")",$sql);
	}
	
	private function /*string*/ getUpdateFields()
	{
		$update = "";
		
		if ($this->is_bm_ModuleName_dirty)
		{			
			if (!isset($this->bm_ModuleName))
			{
				$update .= ("`bm_ModuleName`=null,");
			}
			else
			{
				$update .= ("`bm_ModuleName`='{$this->bm_ModuleName}',");
			}
		}
		if ($this->is_bm_FModuleID_dirty)
		{			
			if (!isset($this->bm_FModuleID))
			{
				$update .= ("`bm_FModuleID`=null,");
			}
			else
			{
				$update .= ("`bm_FModuleID`='{$this->bm_FModuleID}',");
			}
		}
		if ($this->is_bm_ModuleLevel_dirty)
		{			
			if (!isset($this->bm_ModuleLevel))
			{
				$update .= ("`bm_ModuleLevel`=null,");
			}
			else
			{
				$update .= ("`bm_ModuleLevel`='{$this->bm_ModuleLevel}',");
			}
		}
		if ($this->is_bm_ModuleUrl_dirty)
		{			
			if (!isset($this->bm_ModuleUrl))
			{
				$update .= ("`bm_ModuleUrl`=null,");
			}
			else
			{
				$update .= ("`bm_ModuleUrl`='{$this->bm_ModuleUrl}',");
			}
		}
		if ($this->is_bm_FModuleUrl_dirty)
		{			
			if (!isset($this->bm_FModuleUrl))
			{
				$update .= ("`bm_FModuleUrl`=null,");
			}
			else
			{
				$update .= ("`bm_FModuleUrl`='{$this->bm_FModuleUrl}',");
			}
		}
		if ($this->is_bm_ModulePRI_dirty)
		{			
			if (!isset($this->bm_ModulePRI))
			{
				$update .= ("`bm_ModulePRI`=null,");
			}
			else
			{
				$update .= ("`bm_ModulePRI`='{$this->bm_ModulePRI}',");
			}
		}
		if ($this->is_bm_ModuleState_dirty)
		{			
			if (!isset($this->bm_ModuleState))
			{
				$update .= ("`bm_ModuleState`=null,");
			}
			else
			{
				$update .= ("`bm_ModuleState`='{$this->bm_ModuleState}',");
			}
		}
		if ($this->is_bm_ModuleRemark_dirty)
		{			
			if (!isset($this->bm_ModuleRemark))
			{
				$update .= ("`bm_ModuleRemark`=null,");
			}
			else
			{
				$update .= ("`bm_ModuleRemark`='{$this->bm_ModuleRemark}',");
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
		
		$sql = "UPDATE `BM_ModuleStructure` SET {$update} WHERE {$condition}";
		
		return $sql;
	}
	
	public function /*boolean*/ add($fieldsValue,$condition=NULL)
	{				
		if (empty($condition))
		{
			$uc = "`bm_ModuleID`='{$this->bm_ModuleID}'";
		}
		else
		{			
			$uc = SQLUtil::parseCondition($condition);
		}
		
		$update = SQLUtil::parseASFieldValues($fieldsValue);
		
		$sql = "UPDATE `BM_ModuleStructure` SET {$update} WHERE {$uc}";
		
		$qr = sql_query(self::$_db_name,$sql);
				
		return (boolean)$qr;
	}	
	
	public function /*boolean*/ sub($fieldsValue,$condition=NULL)
	{
		if (empty($condition))
		{
			$uc = "`bm_ModuleID`='{$this->bm_ModuleID}'";
		}
		else
		{			
			$uc = SQLUtil::parseCondition($condition);
		}
		
		$update = SQLUtil::parseASFieldValues($fieldsValue,false);
		
		$sql = "UPDATE `BM_ModuleStructure` SET {$update} WHERE {$uc}";
		
		$qr = sql_query(self::$_db_name,$sql);
				
		return (boolean)$qr;
	}
	
	/**
	 * 是否已经设置主键的值
	 */
	public function is_set_keys()
	{
		
		return (isset($this->bm_ModuleID));

	}
	
	private function /*void*/ clean() 
	{
		$this->is_this_table_dirty = false;
		$this->is_bm_ModuleID_dirty = false;
		$this->is_bm_ModuleName_dirty = false;
		$this->is_bm_FModuleID_dirty = false;
		$this->is_bm_ModuleLevel_dirty = false;
		$this->is_bm_ModuleUrl_dirty = false;
		$this->is_bm_FModuleUrl_dirty = false;
		$this->is_bm_ModulePRI_dirty = false;
		$this->is_bm_ModuleState_dirty = false;
		$this->is_bm_ModuleRemark_dirty = false;

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

	public function /*string*/ getBmModuleName()
	{
		return $this->bm_ModuleName;
	}
	
	public function /*void*/ setBmModuleName(/*string*/ $bm_ModuleName)
	{
		$this->bm_ModuleName = SQLUtil::toSafeSQLString($bm_ModuleName);
		$this->is_bm_ModuleName_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setBmModuleNameNull()
	{
		$this->bm_ModuleName = null;
		$this->is_bm_ModuleName_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*int*/ getBmFModuleID()
	{
		return $this->bm_FModuleID;
	}
	
	public function /*void*/ setBmFModuleID(/*int*/ $bm_FModuleID)
	{
		$this->bm_FModuleID = intval($bm_FModuleID);
		$this->is_bm_FModuleID_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setBmFModuleIDNull()
	{
		$this->bm_FModuleID = null;
		$this->is_bm_FModuleID_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*int*/ getBmModuleLevel()
	{
		return $this->bm_ModuleLevel;
	}
	
	public function /*void*/ setBmModuleLevel(/*int*/ $bm_ModuleLevel)
	{
		$this->bm_ModuleLevel = intval($bm_ModuleLevel);
		$this->is_bm_ModuleLevel_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setBmModuleLevelNull()
	{
		$this->bm_ModuleLevel = null;
		$this->is_bm_ModuleLevel_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*string*/ getBmModuleUrl()
	{
		return $this->bm_ModuleUrl;
	}
	
	public function /*void*/ setBmModuleUrl(/*string*/ $bm_ModuleUrl)
	{
		$this->bm_ModuleUrl = SQLUtil::toSafeSQLString($bm_ModuleUrl);
		$this->is_bm_ModuleUrl_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setBmModuleUrlNull()
	{
		$this->bm_ModuleUrl = null;
		$this->is_bm_ModuleUrl_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*string*/ getBmFModuleUrl()
	{
		return $this->bm_FModuleUrl;
	}
	
	public function /*void*/ setBmFModuleUrl(/*string*/ $bm_FModuleUrl)
	{
		$this->bm_FModuleUrl = SQLUtil::toSafeSQLString($bm_FModuleUrl);
		$this->is_bm_FModuleUrl_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setBmFModuleUrlNull()
	{
		$this->bm_FModuleUrl = null;
		$this->is_bm_FModuleUrl_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*int*/ getBmModulePRI()
	{
		return $this->bm_ModulePRI;
	}
	
	public function /*void*/ setBmModulePRI(/*int*/ $bm_ModulePRI)
	{
		$this->bm_ModulePRI = intval($bm_ModulePRI);
		$this->is_bm_ModulePRI_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setBmModulePRINull()
	{
		$this->bm_ModulePRI = null;
		$this->is_bm_ModulePRI_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*int*/ getBmModuleState()
	{
		return $this->bm_ModuleState;
	}
	
	public function /*void*/ setBmModuleState(/*int*/ $bm_ModuleState)
	{
		$this->bm_ModuleState = intval($bm_ModuleState);
		$this->is_bm_ModuleState_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setBmModuleStateNull()
	{
		$this->bm_ModuleState = null;
		$this->is_bm_ModuleState_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*string*/ getBmModuleRemark()
	{
		return $this->bm_ModuleRemark;
	}
	
	public function /*void*/ setBmModuleRemark(/*string*/ $bm_ModuleRemark)
	{
		$this->bm_ModuleRemark = SQLUtil::toSafeSQLString($bm_ModuleRemark);
		$this->is_bm_ModuleRemark_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setBmModuleRemarkNull()
	{
		$this->bm_ModuleRemark = null;
		$this->is_bm_ModuleRemark_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	
	public function /*string*/ toDebugString()
	{
		$dbg = "(";
		
		$dbg .= ("bm_ModuleID={$this->bm_ModuleID},");
		$dbg .= ("bm_ModuleName={$this->bm_ModuleName},");
		$dbg .= ("bm_FModuleID={$this->bm_FModuleID},");
		$dbg .= ("bm_ModuleLevel={$this->bm_ModuleLevel},");
		$dbg .= ("bm_ModuleUrl={$this->bm_ModuleUrl},");
		$dbg .= ("bm_FModuleUrl={$this->bm_FModuleUrl},");
		$dbg .= ("bm_ModulePRI={$this->bm_ModulePRI},");
		$dbg .= ("bm_ModuleState={$this->bm_ModuleState},");
		$dbg .= ("bm_ModuleRemark={$this->bm_ModuleRemark},");

		$dbg .= ")";
				
		return str_replace(",)",")",$dbg);
	}
	
	public function fromArray($arr)
	{
		if (isset($arr['bm_ModuleID'])) $this->setBmModuleID($arr['bm_ModuleID']);
		if (isset($arr['bm_ModuleName'])) $this->setBmModuleName($arr['bm_ModuleName']);
		if (isset($arr['bm_FModuleID'])) $this->setBmFModuleID($arr['bm_FModuleID']);
		if (isset($arr['bm_ModuleLevel'])) $this->setBmModuleLevel($arr['bm_ModuleLevel']);
		if (isset($arr['bm_ModuleUrl'])) $this->setBmModuleUrl($arr['bm_ModuleUrl']);
		if (isset($arr['bm_FModuleUrl'])) $this->setBmFModuleUrl($arr['bm_FModuleUrl']);
		if (isset($arr['bm_ModulePRI'])) $this->setBmModulePRI($arr['bm_ModulePRI']);
		if (isset($arr['bm_ModuleState'])) $this->setBmModuleState($arr['bm_ModuleState']);
		if (isset($arr['bm_ModuleRemark'])) $this->setBmModuleRemark($arr['bm_ModuleRemark']);
		
	}
	
	public function toArray()
	{
		$ret = array();
		$ret['bm_ModuleID'] = $this->bm_ModuleID;
		$ret['bm_ModuleName'] = $this->bm_ModuleName;
		$ret['bm_FModuleID'] = $this->bm_FModuleID;
		$ret['bm_ModuleLevel'] = $this->bm_ModuleLevel;
		$ret['bm_ModuleUrl'] = $this->bm_ModuleUrl;
		$ret['bm_FModuleUrl'] = $this->bm_FModuleUrl;
		$ret['bm_ModulePRI'] = $this->bm_ModulePRI;
		$ret['bm_ModuleState'] = $this->bm_ModuleState;
		$ret['bm_ModuleRemark'] = $this->bm_ModuleRemark;

		return $ret;
	}
}

?>
