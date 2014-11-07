<?php
require_once (FRAMEWORK_PATH . "utils/MysqlDBHelper.php");
require_once (FRAMEWORK_PATH . "db/SQLUtil.php");
/**
 * database table GA_GameUserOnlineReport description
 * 
 * [This file was auto-generated. PLEASE DONT EDIT]
 * 
 * @author LiangZhixian
 * 
 */
class TbGAGameUserOnlineReport {
	
	public static $_db_name = "pf_gamearea";
	
	private /*int*/ $ga_ReportID; //PRIMARY KEY 
	private /*string*/ $ga_OnlineID;
	private /*string*/ $ga_AccountID;
	private /*string*/ $ga_Game;
	private /*int*/ $ga_ServerID;
	private /*string*/ $ga_RoleName;
	private /*int*/ $ga_RoleID;
	private /*string*/ $ga_PhoneSys;
	private /*string*/ $ga_PhoneResolution;
	private /*string*/ $ga_PhoneVersion;
	private /*string*/ $ga_PhoneBrand;
	private /*string*/ $ga_PhoneID;
	private /*int*/ $ga_OnlineTime;
	private /*string*/ $ga_Status; //login             alive             logout
	private /*int*/ $ga_NormalLogOut;
	private /*string*/ $ga_StartTime;

	
	private $is_this_table_dirty = false;
	private $is_ga_ReportID_dirty = false;
	private $is_ga_OnlineID_dirty = false;
	private $is_ga_AccountID_dirty = false;
	private $is_ga_Game_dirty = false;
	private $is_ga_ServerID_dirty = false;
	private $is_ga_RoleName_dirty = false;
	private $is_ga_RoleID_dirty = false;
	private $is_ga_PhoneSys_dirty = false;
	private $is_ga_PhoneResolution_dirty = false;
	private $is_ga_PhoneVersion_dirty = false;
	private $is_ga_PhoneBrand_dirty = false;
	private $is_ga_PhoneID_dirty = false;
	private $is_ga_OnlineTime_dirty = false;
	private $is_ga_Status_dirty = false;
	private $is_ga_NormalLogOut_dirty = false;
	private $is_ga_StartTime_dirty = false;


	/**
	 * @param array($condition)
	 * @return array(TbGAGameUserOnlineReport)
	 */
	public static function /*array(TbGAGameUserOnlineReport)*/ loadTable(/*array*/ $fields=NULL,/*array*/$condition=NULL)
	{
		$result = array();
		
		$f = "*";
		
		if(!empty($fields))
		{
			$f = SQLUtil::parseFields($fields);			
		}
		
		if (empty($condition))
		{
			$sql = "SELECT {$f} FROM `GA_GameUserOnlineReport`";
		}
		else
		{			
			$sql = "SELECT {$f} FROM `GA_GameUserOnlineReport` WHERE ".SQLUtil::parseCondition($condition);
		}			
		
		$ar = sql_fetch_rows_assoc(self::$_db_name,$sql);
		
		if (empty($ar) || count($ar) == 0)
		{
			return $result;
		}
		
		foreach($ar as $row)
		{
			$tb = new TbGAGameUserOnlineReport();			
			if (isset($row['ga_ReportID'])) $tb->ga_ReportID = intval($row['ga_ReportID']);
			if (isset($row['ga_OnlineID'])) $tb->ga_OnlineID = $row['ga_OnlineID'];
			if (isset($row['ga_AccountID'])) $tb->ga_AccountID = $row['ga_AccountID'];
			if (isset($row['ga_Game'])) $tb->ga_Game = $row['ga_Game'];
			if (isset($row['ga_ServerID'])) $tb->ga_ServerID = intval($row['ga_ServerID']);
			if (isset($row['ga_RoleName'])) $tb->ga_RoleName = $row['ga_RoleName'];
			if (isset($row['ga_RoleID'])) $tb->ga_RoleID = intval($row['ga_RoleID']);
			if (isset($row['ga_PhoneSys'])) $tb->ga_PhoneSys = $row['ga_PhoneSys'];
			if (isset($row['ga_PhoneResolution'])) $tb->ga_PhoneResolution = $row['ga_PhoneResolution'];
			if (isset($row['ga_PhoneVersion'])) $tb->ga_PhoneVersion = $row['ga_PhoneVersion'];
			if (isset($row['ga_PhoneBrand'])) $tb->ga_PhoneBrand = $row['ga_PhoneBrand'];
			if (isset($row['ga_PhoneID'])) $tb->ga_PhoneID = $row['ga_PhoneID'];
			if (isset($row['ga_OnlineTime'])) $tb->ga_OnlineTime = intval($row['ga_OnlineTime']);
			if (isset($row['ga_Status'])) $tb->ga_Status = $row['ga_Status'];
			if (isset($row['ga_NormalLogOut'])) $tb->ga_NormalLogOut = intval($row['ga_NormalLogOut']);
			if (isset($row['ga_StartTime'])) $tb->ga_StartTime = $row['ga_StartTime'];
		
			$result[] = $tb;
		}
		
		return $result;
	}	
	
	public static function insertSqlHeader(/*array*/ $fields=NULL)
	{
		$result = array();				
		if(!empty($fields)){
			$f = SQLUtil::parseFields($fields);			
			$result[0] = "INSERT INTO `GA_GameUserOnlineReport` ({$f}) VALUES ";	
			$ar = array();
			foreach($fields as $key){
				$ar[$key]=1;
			}
			$result[1] = $ar;
		}else{
			$result[0]="INSERT INTO `GA_GameUserOnlineReport` (`ga_ReportID`,`ga_OnlineID`,`ga_AccountID`,`ga_Game`,`ga_ServerID`,`ga_RoleName`,`ga_RoleID`,`ga_PhoneSys`,`ga_PhoneResolution`,`ga_PhoneVersion`,`ga_PhoneBrand`,`ga_PhoneID`,`ga_OnlineTime`,`ga_Status`,`ga_NormalLogOut`,`ga_StartTime`) VALUES ";
			$result[1] = array('ga_ReportID'=>1,'ga_OnlineID'=>1,'ga_AccountID'=>1,'ga_Game'=>1,'ga_ServerID'=>1,'ga_RoleName'=>1,'ga_RoleID'=>1,'ga_PhoneSys'=>1,'ga_PhoneResolution'=>1,'ga_PhoneVersion'=>1,'ga_PhoneBrand'=>1,'ga_PhoneID'=>1,'ga_OnlineTime'=>1,'ga_Status'=>1,'ga_NormalLogOut'=>1,'ga_StartTime'=>1);
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
		$c = "`ga_ReportID`='{$this->ga_ReportID}'";
		
		if(!empty($fields))
		{
			$f = SQLUtil::parseFields($fields);			
		}
	    if (!empty($condition))
		{
			$c =SQLUtil::parseCondition($condition);
		}
		
		$sql = "SELECT {$f} FROM `GA_GameUserOnlineReport` WHERE {$c} LIMIT 1";


		$ars = sql_fetch_rows_assoc(self::$_db_name,$sql);
		
		if (!$ars || count($ars)==0)
		{
			return false;
		}
		
		$ar = $ars[0];
		
		if (isset($ar['ga_ReportID'])) $this->ga_ReportID = intval($ar['ga_ReportID']);
		if (isset($ar['ga_OnlineID'])) $this->ga_OnlineID = $ar['ga_OnlineID'];
		if (isset($ar['ga_AccountID'])) $this->ga_AccountID = $ar['ga_AccountID'];
		if (isset($ar['ga_Game'])) $this->ga_Game = $ar['ga_Game'];
		if (isset($ar['ga_ServerID'])) $this->ga_ServerID = intval($ar['ga_ServerID']);
		if (isset($ar['ga_RoleName'])) $this->ga_RoleName = $ar['ga_RoleName'];
		if (isset($ar['ga_RoleID'])) $this->ga_RoleID = intval($ar['ga_RoleID']);
		if (isset($ar['ga_PhoneSys'])) $this->ga_PhoneSys = $ar['ga_PhoneSys'];
		if (isset($ar['ga_PhoneResolution'])) $this->ga_PhoneResolution = $ar['ga_PhoneResolution'];
		if (isset($ar['ga_PhoneVersion'])) $this->ga_PhoneVersion = $ar['ga_PhoneVersion'];
		if (isset($ar['ga_PhoneBrand'])) $this->ga_PhoneBrand = $ar['ga_PhoneBrand'];
		if (isset($ar['ga_PhoneID'])) $this->ga_PhoneID = $ar['ga_PhoneID'];
		if (isset($ar['ga_OnlineTime'])) $this->ga_OnlineTime = intval($ar['ga_OnlineTime']);
		if (isset($ar['ga_Status'])) $this->ga_Status = $ar['ga_Status'];
		if (isset($ar['ga_NormalLogOut'])) $this->ga_NormalLogOut = intval($ar['ga_NormalLogOut']);
		if (isset($ar['ga_StartTime'])) $this->ga_StartTime = $ar['ga_StartTime'];
		
		
		$this->clean();
		
		return true;
	}
	
	public function /*boolean*/ loadFromExistFields()
	{
		$emptyCondition = true;
    	$emptyFields = true;
    	
    	$fields = array();
    	$condition = array();
    	
    	if (!isset($this->ga_ReportID)){
    		$emptyFields = false;
    		$fields[] = 'ga_ReportID';
    	}else{
    		$emptyCondition = false; 
    		$condition['ga_ReportID']=$this->ga_ReportID;
    	}
    	if (!isset($this->ga_OnlineID)){
    		$emptyFields = false;
    		$fields[] = 'ga_OnlineID';
    	}else{
    		$emptyCondition = false; 
    		$condition['ga_OnlineID']=$this->ga_OnlineID;
    	}
    	if (!isset($this->ga_AccountID)){
    		$emptyFields = false;
    		$fields[] = 'ga_AccountID';
    	}else{
    		$emptyCondition = false; 
    		$condition['ga_AccountID']=$this->ga_AccountID;
    	}
    	if (!isset($this->ga_Game)){
    		$emptyFields = false;
    		$fields[] = 'ga_Game';
    	}else{
    		$emptyCondition = false; 
    		$condition['ga_Game']=$this->ga_Game;
    	}
    	if (!isset($this->ga_ServerID)){
    		$emptyFields = false;
    		$fields[] = 'ga_ServerID';
    	}else{
    		$emptyCondition = false; 
    		$condition['ga_ServerID']=$this->ga_ServerID;
    	}
    	if (!isset($this->ga_RoleName)){
    		$emptyFields = false;
    		$fields[] = 'ga_RoleName';
    	}else{
    		$emptyCondition = false; 
    		$condition['ga_RoleName']=$this->ga_RoleName;
    	}
    	if (!isset($this->ga_RoleID)){
    		$emptyFields = false;
    		$fields[] = 'ga_RoleID';
    	}else{
    		$emptyCondition = false; 
    		$condition['ga_RoleID']=$this->ga_RoleID;
    	}
    	if (!isset($this->ga_PhoneSys)){
    		$emptyFields = false;
    		$fields[] = 'ga_PhoneSys';
    	}else{
    		$emptyCondition = false; 
    		$condition['ga_PhoneSys']=$this->ga_PhoneSys;
    	}
    	if (!isset($this->ga_PhoneResolution)){
    		$emptyFields = false;
    		$fields[] = 'ga_PhoneResolution';
    	}else{
    		$emptyCondition = false; 
    		$condition['ga_PhoneResolution']=$this->ga_PhoneResolution;
    	}
    	if (!isset($this->ga_PhoneVersion)){
    		$emptyFields = false;
    		$fields[] = 'ga_PhoneVersion';
    	}else{
    		$emptyCondition = false; 
    		$condition['ga_PhoneVersion']=$this->ga_PhoneVersion;
    	}
    	if (!isset($this->ga_PhoneBrand)){
    		$emptyFields = false;
    		$fields[] = 'ga_PhoneBrand';
    	}else{
    		$emptyCondition = false; 
    		$condition['ga_PhoneBrand']=$this->ga_PhoneBrand;
    	}
    	if (!isset($this->ga_PhoneID)){
    		$emptyFields = false;
    		$fields[] = 'ga_PhoneID';
    	}else{
    		$emptyCondition = false; 
    		$condition['ga_PhoneID']=$this->ga_PhoneID;
    	}
    	if (!isset($this->ga_OnlineTime)){
    		$emptyFields = false;
    		$fields[] = 'ga_OnlineTime';
    	}else{
    		$emptyCondition = false; 
    		$condition['ga_OnlineTime']=$this->ga_OnlineTime;
    	}
    	if (!isset($this->ga_Status)){
    		$emptyFields = false;
    		$fields[] = 'ga_Status';
    	}else{
    		$emptyCondition = false; 
    		$condition['ga_Status']=$this->ga_Status;
    	}
    	if (!isset($this->ga_NormalLogOut)){
    		$emptyFields = false;
    		$fields[] = 'ga_NormalLogOut';
    	}else{
    		$emptyCondition = false; 
    		$condition['ga_NormalLogOut']=$this->ga_NormalLogOut;
    	}
    	if (!isset($this->ga_StartTime)){
    		$emptyFields = false;
    		$fields[] = 'ga_StartTime';
    	}else{
    		$emptyCondition = false; 
    		$condition['ga_StartTime']=$this->ga_StartTime;
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
				
		if (!isset($this->ga_ReportID)) $this->ga_ReportID = get_mysql_insert_id(self::$_db_name);

		
		$this->clean();
		
		return true;	
		
	}
	
	public function /*boolean*/ save(/*array*/$condition=NULL)
	{
		if (empty($condition))
		{
			$uc = "`ga_ReportID`='{$this->ga_ReportID}'";
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
		
		$sql = "DELETE FROM `GA_GameUserOnlineReport` WHERE ".SQLUtil::parseCondition($condition);
		
		$qr = sql_query(self::$_db_name,$sql);
				
		return (boolean)$qr;
	}
	
	public function /*boolean*/ delete()
	{
		if (!$this->is_set_keys())
		{
			return false;
		}
		
		$sql = "DELETE FROM `GA_GameUserOnlineReport` WHERE `ga_ReportID`='{$this->ga_ReportID}'";
		

		$qr = sql_query(self::$_db_name,$sql);
				
		return (boolean)$qr;
	}
	
	public function getInsertValue($fields)
	{
		$values = "(";		
		foreach($fields as $f => $k){
			if($f == 'ga_ReportID'){
 				$values .= "'{$this->ga_ReportID}',";
 			}else if($f == 'ga_OnlineID'){
 				$values .= "'{$this->ga_OnlineID}',";
 			}else if($f == 'ga_AccountID'){
 				$values .= "'{$this->ga_AccountID}',";
 			}else if($f == 'ga_Game'){
 				$values .= "'{$this->ga_Game}',";
 			}else if($f == 'ga_ServerID'){
 				$values .= "'{$this->ga_ServerID}',";
 			}else if($f == 'ga_RoleName'){
 				$values .= "'{$this->ga_RoleName}',";
 			}else if($f == 'ga_RoleID'){
 				$values .= "'{$this->ga_RoleID}',";
 			}else if($f == 'ga_PhoneSys'){
 				$values .= "'{$this->ga_PhoneSys}',";
 			}else if($f == 'ga_PhoneResolution'){
 				$values .= "'{$this->ga_PhoneResolution}',";
 			}else if($f == 'ga_PhoneVersion'){
 				$values .= "'{$this->ga_PhoneVersion}',";
 			}else if($f == 'ga_PhoneBrand'){
 				$values .= "'{$this->ga_PhoneBrand}',";
 			}else if($f == 'ga_PhoneID'){
 				$values .= "'{$this->ga_PhoneID}',";
 			}else if($f == 'ga_OnlineTime'){
 				$values .= "'{$this->ga_OnlineTime}',";
 			}else if($f == 'ga_Status'){
 				$values .= "'{$this->ga_Status}',";
 			}else if($f == 'ga_NormalLogOut'){
 				$values .= "'{$this->ga_NormalLogOut}',";
 			}else if($f == 'ga_StartTime'){
 				$values .= "'{$this->ga_StartTime}',";
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

		if (isset($this->ga_ReportID))
		{
			$fields .= "`ga_ReportID`,";
			$values .= "'{$this->ga_ReportID}',";
		}
		if (isset($this->ga_OnlineID))
		{
			$fields .= "`ga_OnlineID`,";
			$values .= "'{$this->ga_OnlineID}',";
		}
		if (isset($this->ga_AccountID))
		{
			$fields .= "`ga_AccountID`,";
			$values .= "'{$this->ga_AccountID}',";
		}
		if (isset($this->ga_Game))
		{
			$fields .= "`ga_Game`,";
			$values .= "'{$this->ga_Game}',";
		}
		if (isset($this->ga_ServerID))
		{
			$fields .= "`ga_ServerID`,";
			$values .= "'{$this->ga_ServerID}',";
		}
		if (isset($this->ga_RoleName))
		{
			$fields .= "`ga_RoleName`,";
			$values .= "'{$this->ga_RoleName}',";
		}
		if (isset($this->ga_RoleID))
		{
			$fields .= "`ga_RoleID`,";
			$values .= "'{$this->ga_RoleID}',";
		}
		if (isset($this->ga_PhoneSys))
		{
			$fields .= "`ga_PhoneSys`,";
			$values .= "'{$this->ga_PhoneSys}',";
		}
		if (isset($this->ga_PhoneResolution))
		{
			$fields .= "`ga_PhoneResolution`,";
			$values .= "'{$this->ga_PhoneResolution}',";
		}
		if (isset($this->ga_PhoneVersion))
		{
			$fields .= "`ga_PhoneVersion`,";
			$values .= "'{$this->ga_PhoneVersion}',";
		}
		if (isset($this->ga_PhoneBrand))
		{
			$fields .= "`ga_PhoneBrand`,";
			$values .= "'{$this->ga_PhoneBrand}',";
		}
		if (isset($this->ga_PhoneID))
		{
			$fields .= "`ga_PhoneID`,";
			$values .= "'{$this->ga_PhoneID}',";
		}
		if (isset($this->ga_OnlineTime))
		{
			$fields .= "`ga_OnlineTime`,";
			$values .= "'{$this->ga_OnlineTime}',";
		}
		if (isset($this->ga_Status))
		{
			$fields .= "`ga_Status`,";
			$values .= "'{$this->ga_Status}',";
		}
		if (isset($this->ga_NormalLogOut))
		{
			$fields .= "`ga_NormalLogOut`,";
			$values .= "'{$this->ga_NormalLogOut}',";
		}
		if (isset($this->ga_StartTime))
		{
			$fields .= "`ga_StartTime`,";
			$values .= "'{$this->ga_StartTime}',";
		}

		
		$fields .= ")";
		$values .= ")";
		
		$sql = "INSERT INTO `GA_GameUserOnlineReport` ".$fields.$values;
		
		return str_replace(",)",")",$sql);
	}
	
	private function /*string*/ getUpdateFields()
	{
		$update = "";
		
		if ($this->is_ga_OnlineID_dirty)
		{			
			if (!isset($this->ga_OnlineID))
			{
				$update .= ("`ga_OnlineID`=null,");
			}
			else
			{
				$update .= ("`ga_OnlineID`='{$this->ga_OnlineID}',");
			}
		}
		if ($this->is_ga_AccountID_dirty)
		{			
			if (!isset($this->ga_AccountID))
			{
				$update .= ("`ga_AccountID`=null,");
			}
			else
			{
				$update .= ("`ga_AccountID`='{$this->ga_AccountID}',");
			}
		}
		if ($this->is_ga_Game_dirty)
		{			
			if (!isset($this->ga_Game))
			{
				$update .= ("`ga_Game`=null,");
			}
			else
			{
				$update .= ("`ga_Game`='{$this->ga_Game}',");
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
		if ($this->is_ga_RoleName_dirty)
		{			
			if (!isset($this->ga_RoleName))
			{
				$update .= ("`ga_RoleName`=null,");
			}
			else
			{
				$update .= ("`ga_RoleName`='{$this->ga_RoleName}',");
			}
		}
		if ($this->is_ga_RoleID_dirty)
		{			
			if (!isset($this->ga_RoleID))
			{
				$update .= ("`ga_RoleID`=null,");
			}
			else
			{
				$update .= ("`ga_RoleID`='{$this->ga_RoleID}',");
			}
		}
		if ($this->is_ga_PhoneSys_dirty)
		{			
			if (!isset($this->ga_PhoneSys))
			{
				$update .= ("`ga_PhoneSys`=null,");
			}
			else
			{
				$update .= ("`ga_PhoneSys`='{$this->ga_PhoneSys}',");
			}
		}
		if ($this->is_ga_PhoneResolution_dirty)
		{			
			if (!isset($this->ga_PhoneResolution))
			{
				$update .= ("`ga_PhoneResolution`=null,");
			}
			else
			{
				$update .= ("`ga_PhoneResolution`='{$this->ga_PhoneResolution}',");
			}
		}
		if ($this->is_ga_PhoneVersion_dirty)
		{			
			if (!isset($this->ga_PhoneVersion))
			{
				$update .= ("`ga_PhoneVersion`=null,");
			}
			else
			{
				$update .= ("`ga_PhoneVersion`='{$this->ga_PhoneVersion}',");
			}
		}
		if ($this->is_ga_PhoneBrand_dirty)
		{			
			if (!isset($this->ga_PhoneBrand))
			{
				$update .= ("`ga_PhoneBrand`=null,");
			}
			else
			{
				$update .= ("`ga_PhoneBrand`='{$this->ga_PhoneBrand}',");
			}
		}
		if ($this->is_ga_PhoneID_dirty)
		{			
			if (!isset($this->ga_PhoneID))
			{
				$update .= ("`ga_PhoneID`=null,");
			}
			else
			{
				$update .= ("`ga_PhoneID`='{$this->ga_PhoneID}',");
			}
		}
		if ($this->is_ga_OnlineTime_dirty)
		{			
			if (!isset($this->ga_OnlineTime))
			{
				$update .= ("`ga_OnlineTime`=null,");
			}
			else
			{
				$update .= ("`ga_OnlineTime`='{$this->ga_OnlineTime}',");
			}
		}
		if ($this->is_ga_Status_dirty)
		{			
			if (!isset($this->ga_Status))
			{
				$update .= ("`ga_Status`=null,");
			}
			else
			{
				$update .= ("`ga_Status`='{$this->ga_Status}',");
			}
		}
		if ($this->is_ga_NormalLogOut_dirty)
		{			
			if (!isset($this->ga_NormalLogOut))
			{
				$update .= ("`ga_NormalLogOut`=null,");
			}
			else
			{
				$update .= ("`ga_NormalLogOut`='{$this->ga_NormalLogOut}',");
			}
		}
		if ($this->is_ga_StartTime_dirty)
		{			
			if (!isset($this->ga_StartTime))
			{
				$update .= ("`ga_StartTime`=null,");
			}
			else
			{
				$update .= ("`ga_StartTime`='{$this->ga_StartTime}',");
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
		
		$sql = "UPDATE `GA_GameUserOnlineReport` SET {$update} WHERE {$condition}";
		
		return $sql;
	}
	
	public function /*boolean*/ add($fieldsValue,$condition=NULL)
	{				
		if (empty($condition))
		{
			$uc = "`ga_ReportID`='{$this->ga_ReportID}'";
		}
		else
		{			
			$uc = SQLUtil::parseCondition($condition);
		}
		
		$update = SQLUtil::parseASFieldValues($fieldsValue);
		
		$sql = "UPDATE `GA_GameUserOnlineReport` SET {$update} WHERE {$uc}";
		
		$qr = sql_query(self::$_db_name,$sql);
				
		return (boolean)$qr;
	}	
	
	public function /*boolean*/ sub($fieldsValue,$condition=NULL)
	{
		if (empty($condition))
		{
			$uc = "`ga_ReportID`='{$this->ga_ReportID}'";
		}
		else
		{			
			$uc = SQLUtil::parseCondition($condition);
		}
		
		$update = SQLUtil::parseASFieldValues($fieldsValue,false);
		
		$sql = "UPDATE `GA_GameUserOnlineReport` SET {$update} WHERE {$uc}";
		
		$qr = sql_query(self::$_db_name,$sql);
				
		return (boolean)$qr;
	}
	
	/**
	 * 是否已经设置主键的值
	 */
	public function is_set_keys()
	{
		
		return (isset($this->ga_ReportID));

	}
	
	private function /*void*/ clean() 
	{
		$this->is_this_table_dirty = false;
		$this->is_ga_ReportID_dirty = false;
		$this->is_ga_OnlineID_dirty = false;
		$this->is_ga_AccountID_dirty = false;
		$this->is_ga_Game_dirty = false;
		$this->is_ga_ServerID_dirty = false;
		$this->is_ga_RoleName_dirty = false;
		$this->is_ga_RoleID_dirty = false;
		$this->is_ga_PhoneSys_dirty = false;
		$this->is_ga_PhoneResolution_dirty = false;
		$this->is_ga_PhoneVersion_dirty = false;
		$this->is_ga_PhoneBrand_dirty = false;
		$this->is_ga_PhoneID_dirty = false;
		$this->is_ga_OnlineTime_dirty = false;
		$this->is_ga_Status_dirty = false;
		$this->is_ga_NormalLogOut_dirty = false;
		$this->is_ga_StartTime_dirty = false;

	}
	
	public function /*int*/ getGaReportID()
	{
		return $this->ga_ReportID;
	}
	
	public function /*void*/ setGaReportID(/*int*/ $ga_ReportID)
	{
		$this->ga_ReportID = intval($ga_ReportID);
		$this->is_ga_ReportID_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setGaReportIDNull()
	{
		$this->ga_ReportID = null;
		$this->is_ga_ReportID_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*string*/ getGaOnlineID()
	{
		return $this->ga_OnlineID;
	}
	
	public function /*void*/ setGaOnlineID(/*string*/ $ga_OnlineID)
	{
		$this->ga_OnlineID = SQLUtil::toSafeSQLString($ga_OnlineID);
		$this->is_ga_OnlineID_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setGaOnlineIDNull()
	{
		$this->ga_OnlineID = null;
		$this->is_ga_OnlineID_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*string*/ getGaAccountID()
	{
		return $this->ga_AccountID;
	}
	
	public function /*void*/ setGaAccountID(/*string*/ $ga_AccountID)
	{
		$this->ga_AccountID = SQLUtil::toSafeSQLString($ga_AccountID);
		$this->is_ga_AccountID_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setGaAccountIDNull()
	{
		$this->ga_AccountID = null;
		$this->is_ga_AccountID_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*string*/ getGaGame()
	{
		return $this->ga_Game;
	}
	
	public function /*void*/ setGaGame(/*string*/ $ga_Game)
	{
		$this->ga_Game = SQLUtil::toSafeSQLString($ga_Game);
		$this->is_ga_Game_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setGaGameNull()
	{
		$this->ga_Game = null;
		$this->is_ga_Game_dirty = true;		
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

	public function /*string*/ getGaRoleName()
	{
		return $this->ga_RoleName;
	}
	
	public function /*void*/ setGaRoleName(/*string*/ $ga_RoleName)
	{
		$this->ga_RoleName = SQLUtil::toSafeSQLString($ga_RoleName);
		$this->is_ga_RoleName_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setGaRoleNameNull()
	{
		$this->ga_RoleName = null;
		$this->is_ga_RoleName_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*int*/ getGaRoleID()
	{
		return $this->ga_RoleID;
	}
	
	public function /*void*/ setGaRoleID(/*int*/ $ga_RoleID)
	{
		$this->ga_RoleID = intval($ga_RoleID);
		$this->is_ga_RoleID_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setGaRoleIDNull()
	{
		$this->ga_RoleID = null;
		$this->is_ga_RoleID_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*string*/ getGaPhoneSys()
	{
		return $this->ga_PhoneSys;
	}
	
	public function /*void*/ setGaPhoneSys(/*string*/ $ga_PhoneSys)
	{
		$this->ga_PhoneSys = SQLUtil::toSafeSQLString($ga_PhoneSys);
		$this->is_ga_PhoneSys_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setGaPhoneSysNull()
	{
		$this->ga_PhoneSys = null;
		$this->is_ga_PhoneSys_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*string*/ getGaPhoneResolution()
	{
		return $this->ga_PhoneResolution;
	}
	
	public function /*void*/ setGaPhoneResolution(/*string*/ $ga_PhoneResolution)
	{
		$this->ga_PhoneResolution = SQLUtil::toSafeSQLString($ga_PhoneResolution);
		$this->is_ga_PhoneResolution_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setGaPhoneResolutionNull()
	{
		$this->ga_PhoneResolution = null;
		$this->is_ga_PhoneResolution_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*string*/ getGaPhoneVersion()
	{
		return $this->ga_PhoneVersion;
	}
	
	public function /*void*/ setGaPhoneVersion(/*string*/ $ga_PhoneVersion)
	{
		$this->ga_PhoneVersion = SQLUtil::toSafeSQLString($ga_PhoneVersion);
		$this->is_ga_PhoneVersion_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setGaPhoneVersionNull()
	{
		$this->ga_PhoneVersion = null;
		$this->is_ga_PhoneVersion_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*string*/ getGaPhoneBrand()
	{
		return $this->ga_PhoneBrand;
	}
	
	public function /*void*/ setGaPhoneBrand(/*string*/ $ga_PhoneBrand)
	{
		$this->ga_PhoneBrand = SQLUtil::toSafeSQLString($ga_PhoneBrand);
		$this->is_ga_PhoneBrand_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setGaPhoneBrandNull()
	{
		$this->ga_PhoneBrand = null;
		$this->is_ga_PhoneBrand_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*string*/ getGaPhoneID()
	{
		return $this->ga_PhoneID;
	}
	
	public function /*void*/ setGaPhoneID(/*string*/ $ga_PhoneID)
	{
		$this->ga_PhoneID = SQLUtil::toSafeSQLString($ga_PhoneID);
		$this->is_ga_PhoneID_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setGaPhoneIDNull()
	{
		$this->ga_PhoneID = null;
		$this->is_ga_PhoneID_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*int*/ getGaOnlineTime()
	{
		return $this->ga_OnlineTime;
	}
	
	public function /*void*/ setGaOnlineTime(/*int*/ $ga_OnlineTime)
	{
		$this->ga_OnlineTime = intval($ga_OnlineTime);
		$this->is_ga_OnlineTime_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setGaOnlineTimeNull()
	{
		$this->ga_OnlineTime = null;
		$this->is_ga_OnlineTime_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*string*/ getGaStatus()
	{
		return $this->ga_Status;
	}
	
	public function /*void*/ setGaStatus(/*string*/ $ga_Status)
	{
		$this->ga_Status = SQLUtil::toSafeSQLString($ga_Status);
		$this->is_ga_Status_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setGaStatusNull()
	{
		$this->ga_Status = null;
		$this->is_ga_Status_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*int*/ getGaNormalLogOut()
	{
		return $this->ga_NormalLogOut;
	}
	
	public function /*void*/ setGaNormalLogOut(/*int*/ $ga_NormalLogOut)
	{
		$this->ga_NormalLogOut = intval($ga_NormalLogOut);
		$this->is_ga_NormalLogOut_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setGaNormalLogOutNull()
	{
		$this->ga_NormalLogOut = null;
		$this->is_ga_NormalLogOut_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*string*/ getGaStartTime()
	{
		return $this->ga_StartTime;
	}
	
	public function /*void*/ setGaStartTime(/*string*/ $ga_StartTime)
	{
		$this->ga_StartTime = SQLUtil::toSafeSQLString($ga_StartTime);
		$this->is_ga_StartTime_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setGaStartTimeNull()
	{
		$this->ga_StartTime = null;
		$this->is_ga_StartTime_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	
	public function /*string*/ toDebugString()
	{
		$dbg = "(";
		
		$dbg .= ("ga_ReportID={$this->ga_ReportID},");
		$dbg .= ("ga_OnlineID={$this->ga_OnlineID},");
		$dbg .= ("ga_AccountID={$this->ga_AccountID},");
		$dbg .= ("ga_Game={$this->ga_Game},");
		$dbg .= ("ga_ServerID={$this->ga_ServerID},");
		$dbg .= ("ga_RoleName={$this->ga_RoleName},");
		$dbg .= ("ga_RoleID={$this->ga_RoleID},");
		$dbg .= ("ga_PhoneSys={$this->ga_PhoneSys},");
		$dbg .= ("ga_PhoneResolution={$this->ga_PhoneResolution},");
		$dbg .= ("ga_PhoneVersion={$this->ga_PhoneVersion},");
		$dbg .= ("ga_PhoneBrand={$this->ga_PhoneBrand},");
		$dbg .= ("ga_PhoneID={$this->ga_PhoneID},");
		$dbg .= ("ga_OnlineTime={$this->ga_OnlineTime},");
		$dbg .= ("ga_Status={$this->ga_Status},");
		$dbg .= ("ga_NormalLogOut={$this->ga_NormalLogOut},");
		$dbg .= ("ga_StartTime={$this->ga_StartTime},");

		$dbg .= ")";
				
		return str_replace(",)",")",$dbg);
	}
	
	public function fromArray($arr)
	{
		if (isset($arr['ga_ReportID'])) $this->setGaReportID($arr['ga_ReportID']);
		if (isset($arr['ga_OnlineID'])) $this->setGaOnlineID($arr['ga_OnlineID']);
		if (isset($arr['ga_AccountID'])) $this->setGaAccountID($arr['ga_AccountID']);
		if (isset($arr['ga_Game'])) $this->setGaGame($arr['ga_Game']);
		if (isset($arr['ga_ServerID'])) $this->setGaServerID($arr['ga_ServerID']);
		if (isset($arr['ga_RoleName'])) $this->setGaRoleName($arr['ga_RoleName']);
		if (isset($arr['ga_RoleID'])) $this->setGaRoleID($arr['ga_RoleID']);
		if (isset($arr['ga_PhoneSys'])) $this->setGaPhoneSys($arr['ga_PhoneSys']);
		if (isset($arr['ga_PhoneResolution'])) $this->setGaPhoneResolution($arr['ga_PhoneResolution']);
		if (isset($arr['ga_PhoneVersion'])) $this->setGaPhoneVersion($arr['ga_PhoneVersion']);
		if (isset($arr['ga_PhoneBrand'])) $this->setGaPhoneBrand($arr['ga_PhoneBrand']);
		if (isset($arr['ga_PhoneID'])) $this->setGaPhoneID($arr['ga_PhoneID']);
		if (isset($arr['ga_OnlineTime'])) $this->setGaOnlineTime($arr['ga_OnlineTime']);
		if (isset($arr['ga_Status'])) $this->setGaStatus($arr['ga_Status']);
		if (isset($arr['ga_NormalLogOut'])) $this->setGaNormalLogOut($arr['ga_NormalLogOut']);
		if (isset($arr['ga_StartTime'])) $this->setGaStartTime($arr['ga_StartTime']);
		
	}
	
	public function toArray()
	{
		$ret = array();
		$ret['ga_ReportID'] = $this->ga_ReportID;
		$ret['ga_OnlineID'] = $this->ga_OnlineID;
		$ret['ga_AccountID'] = $this->ga_AccountID;
		$ret['ga_Game'] = $this->ga_Game;
		$ret['ga_ServerID'] = $this->ga_ServerID;
		$ret['ga_RoleName'] = $this->ga_RoleName;
		$ret['ga_RoleID'] = $this->ga_RoleID;
		$ret['ga_PhoneSys'] = $this->ga_PhoneSys;
		$ret['ga_PhoneResolution'] = $this->ga_PhoneResolution;
		$ret['ga_PhoneVersion'] = $this->ga_PhoneVersion;
		$ret['ga_PhoneBrand'] = $this->ga_PhoneBrand;
		$ret['ga_PhoneID'] = $this->ga_PhoneID;
		$ret['ga_OnlineTime'] = $this->ga_OnlineTime;
		$ret['ga_Status'] = $this->ga_Status;
		$ret['ga_NormalLogOut'] = $this->ga_NormalLogOut;
		$ret['ga_StartTime'] = $this->ga_StartTime;

		return $ret;
	}
}

?>
