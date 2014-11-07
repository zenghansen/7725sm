<?php
require_once (FRAMEWORK_PATH . "utils/MysqlDBHelper.php");
require_once (FRAMEWORK_PATH . "db/SQLUtil.php");
/**
 * database table GA_ServerActiveLog description
 * 
 * [This file was auto-generated. PLEASE DONT EDIT]
 * 
 * @author LiangZhixian
 * 
 */
class TbGAServerActiveLog {
	
	public static $_db_name = "pf_basemanage";
	
	private /*string*/ $ga_ServerActiveLogIndex; //PRIMARY KEY 
	private /*string*/ $ga_GameID;
	private /*int*/ $ga_AreaID; //分区ID
	private /*int*/ $ga_ServerID;
	private /*string*/ $pt_AccountKey;
	private /*string*/ $pt_OpenUID;
	private /*string*/ $ga_ServerActiveInfo;
	private /*string*/ $ga_ActiveInfoUpdateTime;
	private /*string*/ $ga_ActiveCode;
	private /*string*/ $ga_LastLoginTime;
	private /*string*/ $ga_ActiveTime;
	private /*string*/ $ga_Activeip;
	private /*int*/ $ga_Activestate; //0,未激活             1,已激活             

	
	private $is_this_table_dirty = false;
	private $is_ga_ServerActiveLogIndex_dirty = false;
	private $is_ga_GameID_dirty = false;
	private $is_ga_AreaID_dirty = false;
	private $is_ga_ServerID_dirty = false;
	private $is_pt_AccountKey_dirty = false;
	private $is_pt_OpenUID_dirty = false;
	private $is_ga_ServerActiveInfo_dirty = false;
	private $is_ga_ActiveInfoUpdateTime_dirty = false;
	private $is_ga_ActiveCode_dirty = false;
	private $is_ga_LastLoginTime_dirty = false;
	private $is_ga_ActiveTime_dirty = false;
	private $is_ga_Activeip_dirty = false;
	private $is_ga_Activestate_dirty = false;


	/**
	 * @param array($condition)
	 * @return array(TbGAServerActiveLog)
	 */
	public static function /*array(TbGAServerActiveLog)*/ loadTable(/*array*/ $fields=NULL,/*array*/$condition=NULL)
	{
		$result = array();
		
		$f = "*";
		
		if(!empty($fields))
		{
			$f = SQLUtil::parseFields($fields);			
		}
		
		if (empty($condition))
		{
			$sql = "SELECT {$f} FROM `GA_ServerActiveLog`";
		}
		else
		{			
			$sql = "SELECT {$f} FROM `GA_ServerActiveLog` WHERE ".SQLUtil::parseCondition($condition);
		}			
		
		$ar = sql_fetch_rows_assoc(self::$_db_name,$sql);
		
		if (empty($ar) || count($ar) == 0)
		{
			return $result;
		}
		
		foreach($ar as $row)
		{
			$tb = new TbGAServerActiveLog();			
			if (isset($row['ga_ServerActiveLogIndex'])) $tb->ga_ServerActiveLogIndex = $row['ga_ServerActiveLogIndex'];
			if (isset($row['ga_GameID'])) $tb->ga_GameID = $row['ga_GameID'];
			if (isset($row['ga_AreaID'])) $tb->ga_AreaID = intval($row['ga_AreaID']);
			if (isset($row['ga_ServerID'])) $tb->ga_ServerID = intval($row['ga_ServerID']);
			if (isset($row['pt_AccountKey'])) $tb->pt_AccountKey = $row['pt_AccountKey'];
			if (isset($row['pt_OpenUID'])) $tb->pt_OpenUID = $row['pt_OpenUID'];
			if (isset($row['ga_ServerActiveInfo'])) $tb->ga_ServerActiveInfo = $row['ga_ServerActiveInfo'];
			if (isset($row['ga_ActiveInfoUpdateTime'])) $tb->ga_ActiveInfoUpdateTime = $row['ga_ActiveInfoUpdateTime'];
			if (isset($row['ga_ActiveCode'])) $tb->ga_ActiveCode = $row['ga_ActiveCode'];
			if (isset($row['ga_LastLoginTime'])) $tb->ga_LastLoginTime = $row['ga_LastLoginTime'];
			if (isset($row['ga_ActiveTime'])) $tb->ga_ActiveTime = $row['ga_ActiveTime'];
			if (isset($row['ga_Activeip'])) $tb->ga_Activeip = $row['ga_Activeip'];
			if (isset($row['ga_Activestate'])) $tb->ga_Activestate = intval($row['ga_Activestate']);
		
			$result[] = $tb;
		}
		
		return $result;
	}	
	
	public static function insertSqlHeader(/*array*/ $fields=NULL)
	{
		$result = array();				
		if(!empty($fields)){
			$f = SQLUtil::parseFields($fields);			
			$result[0] = "INSERT INTO `GA_ServerActiveLog` ({$f}) VALUES ";	
			$ar = array();
			foreach($fields as $key){
				$ar[$key]=1;
			}
			$result[1] = $ar;
		}else{
			$result[0]="INSERT INTO `GA_ServerActiveLog` (`ga_ServerActiveLogIndex`,`ga_GameID`,`ga_AreaID`,`ga_ServerID`,`pt_AccountKey`,`pt_OpenUID`,`ga_ServerActiveInfo`,`ga_ActiveInfoUpdateTime`,`ga_ActiveCode`,`ga_LastLoginTime`,`ga_ActiveTime`,`ga_Activeip`,`ga_Activestate`) VALUES ";
			$result[1] = array('ga_ServerActiveLogIndex'=>1,'ga_GameID'=>1,'ga_AreaID'=>1,'ga_ServerID'=>1,'pt_AccountKey'=>1,'pt_OpenUID'=>1,'ga_ServerActiveInfo'=>1,'ga_ActiveInfoUpdateTime'=>1,'ga_ActiveCode'=>1,'ga_LastLoginTime'=>1,'ga_ActiveTime'=>1,'ga_Activeip'=>1,'ga_Activestate'=>1);
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
		$c = "`ga_ServerActiveLogIndex`='{$this->ga_ServerActiveLogIndex}'";
		
		if(!empty($fields))
		{
			$f = SQLUtil::parseFields($fields);			
		}
	    if (!empty($condition))
		{
			$c =SQLUtil::parseCondition($condition);
		}
		
		$sql = "SELECT {$f} FROM `GA_ServerActiveLog` WHERE {$c} LIMIT 1";


		$ars = sql_fetch_rows_assoc(self::$_db_name,$sql);
		
		if (!$ars || count($ars)==0)
		{
			return false;
		}
		
		$ar = $ars[0];
		
		if (isset($ar['ga_ServerActiveLogIndex'])) $this->ga_ServerActiveLogIndex = $ar['ga_ServerActiveLogIndex'];
		if (isset($ar['ga_GameID'])) $this->ga_GameID = $ar['ga_GameID'];
		if (isset($ar['ga_AreaID'])) $this->ga_AreaID = intval($ar['ga_AreaID']);
		if (isset($ar['ga_ServerID'])) $this->ga_ServerID = intval($ar['ga_ServerID']);
		if (isset($ar['pt_AccountKey'])) $this->pt_AccountKey = $ar['pt_AccountKey'];
		if (isset($ar['pt_OpenUID'])) $this->pt_OpenUID = $ar['pt_OpenUID'];
		if (isset($ar['ga_ServerActiveInfo'])) $this->ga_ServerActiveInfo = $ar['ga_ServerActiveInfo'];
		if (isset($ar['ga_ActiveInfoUpdateTime'])) $this->ga_ActiveInfoUpdateTime = $ar['ga_ActiveInfoUpdateTime'];
		if (isset($ar['ga_ActiveCode'])) $this->ga_ActiveCode = $ar['ga_ActiveCode'];
		if (isset($ar['ga_LastLoginTime'])) $this->ga_LastLoginTime = $ar['ga_LastLoginTime'];
		if (isset($ar['ga_ActiveTime'])) $this->ga_ActiveTime = $ar['ga_ActiveTime'];
		if (isset($ar['ga_Activeip'])) $this->ga_Activeip = $ar['ga_Activeip'];
		if (isset($ar['ga_Activestate'])) $this->ga_Activestate = intval($ar['ga_Activestate']);
		
		
		$this->clean();
		
		return true;
	}
	
	public function /*boolean*/ loadFromExistFields()
	{
		$emptyCondition = true;
    	$emptyFields = true;
    	
    	$fields = array();
    	$condition = array();
    	
    	if (!isset($this->ga_ServerActiveLogIndex)){
    		$emptyFields = false;
    		$fields[] = 'ga_ServerActiveLogIndex';
    	}else{
    		$emptyCondition = false; 
    		$condition['ga_ServerActiveLogIndex']=$this->ga_ServerActiveLogIndex;
    	}
    	if (!isset($this->ga_GameID)){
    		$emptyFields = false;
    		$fields[] = 'ga_GameID';
    	}else{
    		$emptyCondition = false; 
    		$condition['ga_GameID']=$this->ga_GameID;
    	}
    	if (!isset($this->ga_AreaID)){
    		$emptyFields = false;
    		$fields[] = 'ga_AreaID';
    	}else{
    		$emptyCondition = false; 
    		$condition['ga_AreaID']=$this->ga_AreaID;
    	}
    	if (!isset($this->ga_ServerID)){
    		$emptyFields = false;
    		$fields[] = 'ga_ServerID';
    	}else{
    		$emptyCondition = false; 
    		$condition['ga_ServerID']=$this->ga_ServerID;
    	}
    	if (!isset($this->pt_AccountKey)){
    		$emptyFields = false;
    		$fields[] = 'pt_AccountKey';
    	}else{
    		$emptyCondition = false; 
    		$condition['pt_AccountKey']=$this->pt_AccountKey;
    	}
    	if (!isset($this->pt_OpenUID)){
    		$emptyFields = false;
    		$fields[] = 'pt_OpenUID';
    	}else{
    		$emptyCondition = false; 
    		$condition['pt_OpenUID']=$this->pt_OpenUID;
    	}
    	if (!isset($this->ga_ServerActiveInfo)){
    		$emptyFields = false;
    		$fields[] = 'ga_ServerActiveInfo';
    	}else{
    		$emptyCondition = false; 
    		$condition['ga_ServerActiveInfo']=$this->ga_ServerActiveInfo;
    	}
    	if (!isset($this->ga_ActiveInfoUpdateTime)){
    		$emptyFields = false;
    		$fields[] = 'ga_ActiveInfoUpdateTime';
    	}else{
    		$emptyCondition = false; 
    		$condition['ga_ActiveInfoUpdateTime']=$this->ga_ActiveInfoUpdateTime;
    	}
    	if (!isset($this->ga_ActiveCode)){
    		$emptyFields = false;
    		$fields[] = 'ga_ActiveCode';
    	}else{
    		$emptyCondition = false; 
    		$condition['ga_ActiveCode']=$this->ga_ActiveCode;
    	}
    	if (!isset($this->ga_LastLoginTime)){
    		$emptyFields = false;
    		$fields[] = 'ga_LastLoginTime';
    	}else{
    		$emptyCondition = false; 
    		$condition['ga_LastLoginTime']=$this->ga_LastLoginTime;
    	}
    	if (!isset($this->ga_ActiveTime)){
    		$emptyFields = false;
    		$fields[] = 'ga_ActiveTime';
    	}else{
    		$emptyCondition = false; 
    		$condition['ga_ActiveTime']=$this->ga_ActiveTime;
    	}
    	if (!isset($this->ga_Activeip)){
    		$emptyFields = false;
    		$fields[] = 'ga_Activeip';
    	}else{
    		$emptyCondition = false; 
    		$condition['ga_Activeip']=$this->ga_Activeip;
    	}
    	if (!isset($this->ga_Activestate)){
    		$emptyFields = false;
    		$fields[] = 'ga_Activestate';
    	}else{
    		$emptyCondition = false; 
    		$condition['ga_Activestate']=$this->ga_Activestate;
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
				
		if (!isset($this->ga_ServerActiveLogIndex)) $this->ga_ServerActiveLogIndex = get_mysql_insert_id(self::$_db_name);

		
		$this->clean();
		
		return true;	
		
	}
	
	public function /*boolean*/ save(/*array*/$condition=NULL)
	{
		if (empty($condition))
		{
			$uc = "`ga_ServerActiveLogIndex`='{$this->ga_ServerActiveLogIndex}'";
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
		
		$sql = "DELETE FROM `GA_ServerActiveLog` WHERE ".SQLUtil::parseCondition($condition);
		
		$qr = sql_query(self::$_db_name,$sql);
				
		return (boolean)$qr;
	}
	
	public function /*boolean*/ delete()
	{
		if (!$this->is_set_keys())
		{
			return false;
		}
		
		$sql = "DELETE FROM `GA_ServerActiveLog` WHERE `ga_ServerActiveLogIndex`='{$this->ga_ServerActiveLogIndex}'";
		

		$qr = sql_query(self::$_db_name,$sql);
				
		return (boolean)$qr;
	}
	
	public function getInsertValue($fields)
	{
		$values = "(";		
		foreach($fields as $f => $k){
			if($f == 'ga_ServerActiveLogIndex'){
 				$values .= "'{$this->ga_ServerActiveLogIndex}',";
 			}else if($f == 'ga_GameID'){
 				$values .= "'{$this->ga_GameID}',";
 			}else if($f == 'ga_AreaID'){
 				$values .= "'{$this->ga_AreaID}',";
 			}else if($f == 'ga_ServerID'){
 				$values .= "'{$this->ga_ServerID}',";
 			}else if($f == 'pt_AccountKey'){
 				$values .= "'{$this->pt_AccountKey}',";
 			}else if($f == 'pt_OpenUID'){
 				$values .= "'{$this->pt_OpenUID}',";
 			}else if($f == 'ga_ServerActiveInfo'){
 				$values .= "'{$this->ga_ServerActiveInfo}',";
 			}else if($f == 'ga_ActiveInfoUpdateTime'){
 				$values .= "'{$this->ga_ActiveInfoUpdateTime}',";
 			}else if($f == 'ga_ActiveCode'){
 				$values .= "'{$this->ga_ActiveCode}',";
 			}else if($f == 'ga_LastLoginTime'){
 				$values .= "'{$this->ga_LastLoginTime}',";
 			}else if($f == 'ga_ActiveTime'){
 				$values .= "'{$this->ga_ActiveTime}',";
 			}else if($f == 'ga_Activeip'){
 				$values .= "'{$this->ga_Activeip}',";
 			}else if($f == 'ga_Activestate'){
 				$values .= "'{$this->ga_Activestate}',";
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

		if (isset($this->ga_ServerActiveLogIndex))
		{
			$fields .= "`ga_ServerActiveLogIndex`,";
			$values .= "'{$this->ga_ServerActiveLogIndex}',";
		}
		if (isset($this->ga_GameID))
		{
			$fields .= "`ga_GameID`,";
			$values .= "'{$this->ga_GameID}',";
		}
		if (isset($this->ga_AreaID))
		{
			$fields .= "`ga_AreaID`,";
			$values .= "'{$this->ga_AreaID}',";
		}
		if (isset($this->ga_ServerID))
		{
			$fields .= "`ga_ServerID`,";
			$values .= "'{$this->ga_ServerID}',";
		}
		if (isset($this->pt_AccountKey))
		{
			$fields .= "`pt_AccountKey`,";
			$values .= "'{$this->pt_AccountKey}',";
		}
		if (isset($this->pt_OpenUID))
		{
			$fields .= "`pt_OpenUID`,";
			$values .= "'{$this->pt_OpenUID}',";
		}
		if (isset($this->ga_ServerActiveInfo))
		{
			$fields .= "`ga_ServerActiveInfo`,";
			$values .= "'{$this->ga_ServerActiveInfo}',";
		}
		if (isset($this->ga_ActiveInfoUpdateTime))
		{
			$fields .= "`ga_ActiveInfoUpdateTime`,";
			$values .= "'{$this->ga_ActiveInfoUpdateTime}',";
		}
		if (isset($this->ga_ActiveCode))
		{
			$fields .= "`ga_ActiveCode`,";
			$values .= "'{$this->ga_ActiveCode}',";
		}
		if (isset($this->ga_LastLoginTime))
		{
			$fields .= "`ga_LastLoginTime`,";
			$values .= "'{$this->ga_LastLoginTime}',";
		}
		if (isset($this->ga_ActiveTime))
		{
			$fields .= "`ga_ActiveTime`,";
			$values .= "'{$this->ga_ActiveTime}',";
		}
		if (isset($this->ga_Activeip))
		{
			$fields .= "`ga_Activeip`,";
			$values .= "'{$this->ga_Activeip}',";
		}
		if (isset($this->ga_Activestate))
		{
			$fields .= "`ga_Activestate`,";
			$values .= "'{$this->ga_Activestate}',";
		}

		
		$fields .= ")";
		$values .= ")";
		
		$sql = "INSERT INTO `GA_ServerActiveLog` ".$fields.$values;
		
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
		if ($this->is_ga_AreaID_dirty)
		{			
			if (!isset($this->ga_AreaID))
			{
				$update .= ("`ga_AreaID`=null,");
			}
			else
			{
				$update .= ("`ga_AreaID`='{$this->ga_AreaID}',");
			}
		}
		if ($this->is_ga_ServerID_dirty)
		{			
			if (!isset($this->ga_ServerID))
			{
				$update .= ("`ga_ServerID`=null,");
			}
			else
			{
				$update .= ("`ga_ServerID`='{$this->ga_ServerID}',");
			}
		}
		if ($this->is_pt_AccountKey_dirty)
		{			
			if (!isset($this->pt_AccountKey))
			{
				$update .= ("`pt_AccountKey`=null,");
			}
			else
			{
				$update .= ("`pt_AccountKey`='{$this->pt_AccountKey}',");
			}
		}
		if ($this->is_pt_OpenUID_dirty)
		{			
			if (!isset($this->pt_OpenUID))
			{
				$update .= ("`pt_OpenUID`=null,");
			}
			else
			{
				$update .= ("`pt_OpenUID`='{$this->pt_OpenUID}',");
			}
		}
		if ($this->is_ga_ServerActiveInfo_dirty)
		{			
			if (!isset($this->ga_ServerActiveInfo))
			{
				$update .= ("`ga_ServerActiveInfo`=null,");
			}
			else
			{
				$update .= ("`ga_ServerActiveInfo`='{$this->ga_ServerActiveInfo}',");
			}
		}
		if ($this->is_ga_ActiveInfoUpdateTime_dirty)
		{			
			if (!isset($this->ga_ActiveInfoUpdateTime))
			{
				$update .= ("`ga_ActiveInfoUpdateTime`=null,");
			}
			else
			{
				$update .= ("`ga_ActiveInfoUpdateTime`='{$this->ga_ActiveInfoUpdateTime}',");
			}
		}
		if ($this->is_ga_ActiveCode_dirty)
		{			
			if (!isset($this->ga_ActiveCode))
			{
				$update .= ("`ga_ActiveCode`=null,");
			}
			else
			{
				$update .= ("`ga_ActiveCode`='{$this->ga_ActiveCode}',");
			}
		}
		if ($this->is_ga_LastLoginTime_dirty)
		{			
			if (!isset($this->ga_LastLoginTime))
			{
				$update .= ("`ga_LastLoginTime`=null,");
			}
			else
			{
				$update .= ("`ga_LastLoginTime`='{$this->ga_LastLoginTime}',");
			}
		}
		if ($this->is_ga_ActiveTime_dirty)
		{			
			if (!isset($this->ga_ActiveTime))
			{
				$update .= ("`ga_ActiveTime`=null,");
			}
			else
			{
				$update .= ("`ga_ActiveTime`='{$this->ga_ActiveTime}',");
			}
		}
		if ($this->is_ga_Activeip_dirty)
		{			
			if (!isset($this->ga_Activeip))
			{
				$update .= ("`ga_Activeip`=null,");
			}
			else
			{
				$update .= ("`ga_Activeip`='{$this->ga_Activeip}',");
			}
		}
		if ($this->is_ga_Activestate_dirty)
		{			
			if (!isset($this->ga_Activestate))
			{
				$update .= ("`ga_Activestate`=null,");
			}
			else
			{
				$update .= ("`ga_Activestate`='{$this->ga_Activestate}',");
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
		
		$sql = "UPDATE `GA_ServerActiveLog` SET {$update} WHERE {$condition}";
		
		return $sql;
	}
	
	public function /*boolean*/ add($fieldsValue,$condition=NULL)
	{				
		if (empty($condition))
		{
			$uc = "`ga_ServerActiveLogIndex`='{$this->ga_ServerActiveLogIndex}'";
		}
		else
		{			
			$uc = SQLUtil::parseCondition($condition);
		}
		
		$update = SQLUtil::parseASFieldValues($fieldsValue);
		
		$sql = "UPDATE `GA_ServerActiveLog` SET {$update} WHERE {$uc}";
		
		$qr = sql_query(self::$_db_name,$sql);
				
		return (boolean)$qr;
	}	
	
	public function /*boolean*/ sub($fieldsValue,$condition=NULL)
	{
		if (empty($condition))
		{
			$uc = "`ga_ServerActiveLogIndex`='{$this->ga_ServerActiveLogIndex}'";
		}
		else
		{			
			$uc = SQLUtil::parseCondition($condition);
		}
		
		$update = SQLUtil::parseASFieldValues($fieldsValue,false);
		
		$sql = "UPDATE `GA_ServerActiveLog` SET {$update} WHERE {$uc}";
		
		$qr = sql_query(self::$_db_name,$sql);
				
		return (boolean)$qr;
	}
	
	/**
	 * 是否已经设置主键的值
	 */
	public function is_set_keys()
	{
		
		return (isset($this->ga_ServerActiveLogIndex));

	}
	
	private function /*void*/ clean() 
	{
		$this->is_this_table_dirty = false;
		$this->is_ga_ServerActiveLogIndex_dirty = false;
		$this->is_ga_GameID_dirty = false;
		$this->is_ga_AreaID_dirty = false;
		$this->is_ga_ServerID_dirty = false;
		$this->is_pt_AccountKey_dirty = false;
		$this->is_pt_OpenUID_dirty = false;
		$this->is_ga_ServerActiveInfo_dirty = false;
		$this->is_ga_ActiveInfoUpdateTime_dirty = false;
		$this->is_ga_ActiveCode_dirty = false;
		$this->is_ga_LastLoginTime_dirty = false;
		$this->is_ga_ActiveTime_dirty = false;
		$this->is_ga_Activeip_dirty = false;
		$this->is_ga_Activestate_dirty = false;

	}
	
	public function /*string*/ getGaServerActiveLogIndex()
	{
		return $this->ga_ServerActiveLogIndex;
	}
	
	public function /*void*/ setGaServerActiveLogIndex(/*string*/ $ga_ServerActiveLogIndex)
	{
		$this->ga_ServerActiveLogIndex = SQLUtil::toSafeSQLString($ga_ServerActiveLogIndex);
		$this->is_ga_ServerActiveLogIndex_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setGaServerActiveLogIndexNull()
	{
		$this->ga_ServerActiveLogIndex = null;
		$this->is_ga_ServerActiveLogIndex_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*string*/ getGaGameID()
	{
		return $this->ga_GameID;
	}
	
	public function /*void*/ setGaGameID(/*string*/ $ga_GameID)
	{
		$this->ga_GameID = SQLUtil::toSafeSQLString($ga_GameID);
		$this->is_ga_GameID_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setGaGameIDNull()
	{
		$this->ga_GameID = null;
		$this->is_ga_GameID_dirty = true;		
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

	public function /*int*/ getGaServerID()
	{
		return $this->ga_ServerID;
	}
	
	public function /*void*/ setGaServerID(/*int*/ $ga_ServerID)
	{
		$this->ga_ServerID = intval($ga_ServerID);
		$this->is_ga_ServerID_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setGaServerIDNull()
	{
		$this->ga_ServerID = null;
		$this->is_ga_ServerID_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*string*/ getPtAccountKey()
	{
		return $this->pt_AccountKey;
	}
	
	public function /*void*/ setPtAccountKey(/*string*/ $pt_AccountKey)
	{
		$this->pt_AccountKey = SQLUtil::toSafeSQLString($pt_AccountKey);
		$this->is_pt_AccountKey_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setPtAccountKeyNull()
	{
		$this->pt_AccountKey = null;
		$this->is_pt_AccountKey_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*string*/ getPtOpenUID()
	{
		return $this->pt_OpenUID;
	}
	
	public function /*void*/ setPtOpenUID(/*string*/ $pt_OpenUID)
	{
		$this->pt_OpenUID = SQLUtil::toSafeSQLString($pt_OpenUID);
		$this->is_pt_OpenUID_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setPtOpenUIDNull()
	{
		$this->pt_OpenUID = null;
		$this->is_pt_OpenUID_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*string*/ getGaServerActiveInfo()
	{
		return $this->ga_ServerActiveInfo;
	}
	
	public function /*void*/ setGaServerActiveInfo(/*string*/ $ga_ServerActiveInfo)
	{
		$this->ga_ServerActiveInfo = SQLUtil::toSafeSQLString($ga_ServerActiveInfo);
		$this->is_ga_ServerActiveInfo_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setGaServerActiveInfoNull()
	{
		$this->ga_ServerActiveInfo = null;
		$this->is_ga_ServerActiveInfo_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*string*/ getGaActiveInfoUpdateTime()
	{
		return $this->ga_ActiveInfoUpdateTime;
	}
	
	public function /*void*/ setGaActiveInfoUpdateTime(/*string*/ $ga_ActiveInfoUpdateTime)
	{
		$this->ga_ActiveInfoUpdateTime = SQLUtil::toSafeSQLString($ga_ActiveInfoUpdateTime);
		$this->is_ga_ActiveInfoUpdateTime_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setGaActiveInfoUpdateTimeNull()
	{
		$this->ga_ActiveInfoUpdateTime = null;
		$this->is_ga_ActiveInfoUpdateTime_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*string*/ getGaActiveCode()
	{
		return $this->ga_ActiveCode;
	}
	
	public function /*void*/ setGaActiveCode(/*string*/ $ga_ActiveCode)
	{
		$this->ga_ActiveCode = SQLUtil::toSafeSQLString($ga_ActiveCode);
		$this->is_ga_ActiveCode_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setGaActiveCodeNull()
	{
		$this->ga_ActiveCode = null;
		$this->is_ga_ActiveCode_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*string*/ getGaLastLoginTime()
	{
		return $this->ga_LastLoginTime;
	}
	
	public function /*void*/ setGaLastLoginTime(/*string*/ $ga_LastLoginTime)
	{
		$this->ga_LastLoginTime = SQLUtil::toSafeSQLString($ga_LastLoginTime);
		$this->is_ga_LastLoginTime_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setGaLastLoginTimeNull()
	{
		$this->ga_LastLoginTime = null;
		$this->is_ga_LastLoginTime_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*string*/ getGaActiveTime()
	{
		return $this->ga_ActiveTime;
	}
	
	public function /*void*/ setGaActiveTime(/*string*/ $ga_ActiveTime)
	{
		$this->ga_ActiveTime = SQLUtil::toSafeSQLString($ga_ActiveTime);
		$this->is_ga_ActiveTime_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setGaActiveTimeNull()
	{
		$this->ga_ActiveTime = null;
		$this->is_ga_ActiveTime_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*string*/ getGaActiveip()
	{
		return $this->ga_Activeip;
	}
	
	public function /*void*/ setGaActiveip(/*string*/ $ga_Activeip)
	{
		$this->ga_Activeip = SQLUtil::toSafeSQLString($ga_Activeip);
		$this->is_ga_Activeip_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setGaActiveipNull()
	{
		$this->ga_Activeip = null;
		$this->is_ga_Activeip_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*int*/ getGaActivestate()
	{
		return $this->ga_Activestate;
	}
	
	public function /*void*/ setGaActivestate(/*int*/ $ga_Activestate)
	{
		$this->ga_Activestate = intval($ga_Activestate);
		$this->is_ga_Activestate_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setGaActivestateNull()
	{
		$this->ga_Activestate = null;
		$this->is_ga_Activestate_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	
	public function /*string*/ toDebugString()
	{
		$dbg = "(";
		
		$dbg .= ("ga_ServerActiveLogIndex={$this->ga_ServerActiveLogIndex},");
		$dbg .= ("ga_GameID={$this->ga_GameID},");
		$dbg .= ("ga_AreaID={$this->ga_AreaID},");
		$dbg .= ("ga_ServerID={$this->ga_ServerID},");
		$dbg .= ("pt_AccountKey={$this->pt_AccountKey},");
		$dbg .= ("pt_OpenUID={$this->pt_OpenUID},");
		$dbg .= ("ga_ServerActiveInfo={$this->ga_ServerActiveInfo},");
		$dbg .= ("ga_ActiveInfoUpdateTime={$this->ga_ActiveInfoUpdateTime},");
		$dbg .= ("ga_ActiveCode={$this->ga_ActiveCode},");
		$dbg .= ("ga_LastLoginTime={$this->ga_LastLoginTime},");
		$dbg .= ("ga_ActiveTime={$this->ga_ActiveTime},");
		$dbg .= ("ga_Activeip={$this->ga_Activeip},");
		$dbg .= ("ga_Activestate={$this->ga_Activestate},");

		$dbg .= ")";
				
		return str_replace(",)",")",$dbg);
	}
	
	public function fromArray($arr)
	{
		if (isset($arr['ga_ServerActiveLogIndex'])) $this->setGaServerActiveLogIndex($arr['ga_ServerActiveLogIndex']);
		if (isset($arr['ga_GameID'])) $this->setGaGameID($arr['ga_GameID']);
		if (isset($arr['ga_AreaID'])) $this->setGaAreaID($arr['ga_AreaID']);
		if (isset($arr['ga_ServerID'])) $this->setGaServerID($arr['ga_ServerID']);
		if (isset($arr['pt_AccountKey'])) $this->setPtAccountKey($arr['pt_AccountKey']);
		if (isset($arr['pt_OpenUID'])) $this->setPtOpenUID($arr['pt_OpenUID']);
		if (isset($arr['ga_ServerActiveInfo'])) $this->setGaServerActiveInfo($arr['ga_ServerActiveInfo']);
		if (isset($arr['ga_ActiveInfoUpdateTime'])) $this->setGaActiveInfoUpdateTime($arr['ga_ActiveInfoUpdateTime']);
		if (isset($arr['ga_ActiveCode'])) $this->setGaActiveCode($arr['ga_ActiveCode']);
		if (isset($arr['ga_LastLoginTime'])) $this->setGaLastLoginTime($arr['ga_LastLoginTime']);
		if (isset($arr['ga_ActiveTime'])) $this->setGaActiveTime($arr['ga_ActiveTime']);
		if (isset($arr['ga_Activeip'])) $this->setGaActiveip($arr['ga_Activeip']);
		if (isset($arr['ga_Activestate'])) $this->setGaActivestate($arr['ga_Activestate']);
		
	}
	
	public function toArray()
	{
		$ret = array();
		$ret['ga_ServerActiveLogIndex'] = $this->ga_ServerActiveLogIndex;
		$ret['ga_GameID'] = $this->ga_GameID;
		$ret['ga_AreaID'] = $this->ga_AreaID;
		$ret['ga_ServerID'] = $this->ga_ServerID;
		$ret['pt_AccountKey'] = $this->pt_AccountKey;
		$ret['pt_OpenUID'] = $this->pt_OpenUID;
		$ret['ga_ServerActiveInfo'] = $this->ga_ServerActiveInfo;
		$ret['ga_ActiveInfoUpdateTime'] = $this->ga_ActiveInfoUpdateTime;
		$ret['ga_ActiveCode'] = $this->ga_ActiveCode;
		$ret['ga_LastLoginTime'] = $this->ga_LastLoginTime;
		$ret['ga_ActiveTime'] = $this->ga_ActiveTime;
		$ret['ga_Activeip'] = $this->ga_Activeip;
		$ret['ga_Activestate'] = $this->ga_Activestate;

		return $ret;
	}
}

?>
