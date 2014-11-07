<?php
require_once (FRAMEWORK_PATH . "utils/MysqlDBHelper.php");
require_once (FRAMEWORK_PATH . "db/SQLUtil.php");
/**
 * database table CS_Question description
 * 
 * [This file was auto-generated. PLEASE DONT EDIT]
 * 
 * @author LiangZhixian
 * 
 */
class TbCSQuestion {
	
	public static $_db_name = "pf_basemanage";
	
	private /*string*/ $cs_QuestionID; //PRIMARY KEY 
	private /*int*/ $cs_QuestionTypeID;
	private /*int*/ $cs_QuestionSource; //1,web             2.ingame
	private /*int*/ $ga_GameID; //游戏种类ID
	private /*string*/ $ga_GameName; //游戏种类名称
	private /*int*/ $ga_AreaID; //分区ID
	private /*string*/ $ga_AreaName; //分区名称
	private /*int*/ $ga_ServerID;
	private /*string*/ $ga_ServerName;
	private /*string*/ $pt_AccountKey;
	private /*string*/ $pt_OpenUID;
	private /*string*/ $pt_AccountID;
	private /*string*/ $cs_RoleName;
	private /*string*/ $cs_QuestionTitle;
	private /*string*/ $cs_QuestionDesc;
	private /*string*/ $cs_QuestionModifyInfo;
	private /*string*/ $cs_AccessoryInfo;
	private /*int*/ $cs_QuestionTop; //0,全服公告                          50,公告                                                    100-500置顶                          1000,普通
	private /*int*/ $cs_ReplyNum;
	private /*int*/ $cs_ClickNum;
	private /*string*/ $cs_QuestionIP;
	private /*int*/ $cs_QuestionState; //0=默认/未解决             1=解决中             2=已解决             8=自己删除             9=管理员删除             
	private /*string*/ $cs_CreateTime;
	private /*int*/ $cs_ResponseTime;

	
	private $is_this_table_dirty = false;
	private $is_cs_QuestionID_dirty = false;
	private $is_cs_QuestionTypeID_dirty = false;
	private $is_cs_QuestionSource_dirty = false;
	private $is_ga_GameID_dirty = false;
	private $is_ga_GameName_dirty = false;
	private $is_ga_AreaID_dirty = false;
	private $is_ga_AreaName_dirty = false;
	private $is_ga_ServerID_dirty = false;
	private $is_ga_ServerName_dirty = false;
	private $is_pt_AccountKey_dirty = false;
	private $is_pt_OpenUID_dirty = false;
	private $is_pt_AccountID_dirty = false;
	private $is_cs_RoleName_dirty = false;
	private $is_cs_QuestionTitle_dirty = false;
	private $is_cs_QuestionDesc_dirty = false;
	private $is_cs_QuestionModifyInfo_dirty = false;
	private $is_cs_AccessoryInfo_dirty = false;
	private $is_cs_QuestionTop_dirty = false;
	private $is_cs_ReplyNum_dirty = false;
	private $is_cs_ClickNum_dirty = false;
	private $is_cs_QuestionIP_dirty = false;
	private $is_cs_QuestionState_dirty = false;
	private $is_cs_CreateTime_dirty = false;
	private $is_cs_ResponseTime_dirty = false;


	/**
	 * @param array($condition)
	 * @return array(TbCSQuestion)
	 */
	public static function /*array(TbCSQuestion)*/ loadTable(/*array*/ $fields=NULL,/*array*/$condition=NULL)
	{
		$result = array();
		
		$f = "*";
		
		if(!empty($fields))
		{
			$f = SQLUtil::parseFields($fields);			
		}
		
		if (empty($condition))
		{
			$sql = "SELECT {$f} FROM `CS_Question`";
		}
		else
		{			
			$sql = "SELECT {$f} FROM `CS_Question` WHERE ".SQLUtil::parseCondition($condition);
		}			
		
		$ar = sql_fetch_rows_assoc(self::$_db_name,$sql);
		
		if (empty($ar) || count($ar) == 0)
		{
			return $result;
		}
		
		foreach($ar as $row)
		{
			$tb = new TbCSQuestion();			
			if (isset($row['cs_QuestionID'])) $tb->cs_QuestionID = $row['cs_QuestionID'];
			if (isset($row['cs_QuestionTypeID'])) $tb->cs_QuestionTypeID = intval($row['cs_QuestionTypeID']);
			if (isset($row['cs_QuestionSource'])) $tb->cs_QuestionSource = intval($row['cs_QuestionSource']);
			if (isset($row['ga_GameID'])) $tb->ga_GameID = intval($row['ga_GameID']);
			if (isset($row['ga_GameName'])) $tb->ga_GameName = $row['ga_GameName'];
			if (isset($row['ga_AreaID'])) $tb->ga_AreaID = intval($row['ga_AreaID']);
			if (isset($row['ga_AreaName'])) $tb->ga_AreaName = $row['ga_AreaName'];
			if (isset($row['ga_ServerID'])) $tb->ga_ServerID = intval($row['ga_ServerID']);
			if (isset($row['ga_ServerName'])) $tb->ga_ServerName = $row['ga_ServerName'];
			if (isset($row['pt_AccountKey'])) $tb->pt_AccountKey = $row['pt_AccountKey'];
			if (isset($row['pt_OpenUID'])) $tb->pt_OpenUID = $row['pt_OpenUID'];
			if (isset($row['pt_AccountID'])) $tb->pt_AccountID = $row['pt_AccountID'];
			if (isset($row['cs_RoleName'])) $tb->cs_RoleName = $row['cs_RoleName'];
			if (isset($row['cs_QuestionTitle'])) $tb->cs_QuestionTitle = $row['cs_QuestionTitle'];
			if (isset($row['cs_QuestionDesc'])) $tb->cs_QuestionDesc = $row['cs_QuestionDesc'];
			if (isset($row['cs_QuestionModifyInfo'])) $tb->cs_QuestionModifyInfo = $row['cs_QuestionModifyInfo'];
			if (isset($row['cs_AccessoryInfo'])) $tb->cs_AccessoryInfo = $row['cs_AccessoryInfo'];
			if (isset($row['cs_QuestionTop'])) $tb->cs_QuestionTop = intval($row['cs_QuestionTop']);
			if (isset($row['cs_ReplyNum'])) $tb->cs_ReplyNum = intval($row['cs_ReplyNum']);
			if (isset($row['cs_ClickNum'])) $tb->cs_ClickNum = intval($row['cs_ClickNum']);
			if (isset($row['cs_QuestionIP'])) $tb->cs_QuestionIP = $row['cs_QuestionIP'];
			if (isset($row['cs_QuestionState'])) $tb->cs_QuestionState = intval($row['cs_QuestionState']);
			if (isset($row['cs_CreateTime'])) $tb->cs_CreateTime = $row['cs_CreateTime'];
			if (isset($row['cs_ResponseTime'])) $tb->cs_ResponseTime = intval($row['cs_ResponseTime']);
		
			$result[] = $tb;
		}
		
		return $result;
	}	
	
	public static function insertSqlHeader(/*array*/ $fields=NULL)
	{
		$result = array();				
		if(!empty($fields)){
			$f = SQLUtil::parseFields($fields);			
			$result[0] = "INSERT INTO `CS_Question` ({$f}) VALUES ";	
			$ar = array();
			foreach($fields as $key){
				$ar[$key]=1;
			}
			$result[1] = $ar;
		}else{
			$result[0]="INSERT INTO `CS_Question` (`cs_QuestionID`,`cs_QuestionTypeID`,`cs_QuestionSource`,`ga_GameID`,`ga_GameName`,`ga_AreaID`,`ga_AreaName`,`ga_ServerID`,`ga_ServerName`,`pt_AccountKey`,`pt_OpenUID`,`pt_AccountID`,`cs_RoleName`,`cs_QuestionTitle`,`cs_QuestionDesc`,`cs_QuestionModifyInfo`,`cs_AccessoryInfo`,`cs_QuestionTop`,`cs_ReplyNum`,`cs_ClickNum`,`cs_QuestionIP`,`cs_QuestionState`,`cs_CreateTime`,`cs_ResponseTime`) VALUES ";
			$result[1] = array('cs_QuestionID'=>1,'cs_QuestionTypeID'=>1,'cs_QuestionSource'=>1,'ga_GameID'=>1,'ga_GameName'=>1,'ga_AreaID'=>1,'ga_AreaName'=>1,'ga_ServerID'=>1,'ga_ServerName'=>1,'pt_AccountKey'=>1,'pt_OpenUID'=>1,'pt_AccountID'=>1,'cs_RoleName'=>1,'cs_QuestionTitle'=>1,'cs_QuestionDesc'=>1,'cs_QuestionModifyInfo'=>1,'cs_AccessoryInfo'=>1,'cs_QuestionTop'=>1,'cs_ReplyNum'=>1,'cs_ClickNum'=>1,'cs_QuestionIP'=>1,'cs_QuestionState'=>1,'cs_CreateTime'=>1,'cs_ResponseTime'=>1);
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
		$c = "`cs_QuestionID`='{$this->cs_QuestionID}'";
		
		if(!empty($fields))
		{
			$f = SQLUtil::parseFields($fields);			
		}
	    if (!empty($condition))
		{
			$c =SQLUtil::parseCondition($condition);
		}
		
		$sql = "SELECT {$f} FROM `CS_Question` WHERE {$c} LIMIT 1";


		$ars = sql_fetch_rows_assoc(self::$_db_name,$sql);
		
		if (!$ars || count($ars)==0)
		{
			return false;
		}
		
		$ar = $ars[0];
		
		if (isset($ar['cs_QuestionID'])) $this->cs_QuestionID = $ar['cs_QuestionID'];
		if (isset($ar['cs_QuestionTypeID'])) $this->cs_QuestionTypeID = intval($ar['cs_QuestionTypeID']);
		if (isset($ar['cs_QuestionSource'])) $this->cs_QuestionSource = intval($ar['cs_QuestionSource']);
		if (isset($ar['ga_GameID'])) $this->ga_GameID = intval($ar['ga_GameID']);
		if (isset($ar['ga_GameName'])) $this->ga_GameName = $ar['ga_GameName'];
		if (isset($ar['ga_AreaID'])) $this->ga_AreaID = intval($ar['ga_AreaID']);
		if (isset($ar['ga_AreaName'])) $this->ga_AreaName = $ar['ga_AreaName'];
		if (isset($ar['ga_ServerID'])) $this->ga_ServerID = intval($ar['ga_ServerID']);
		if (isset($ar['ga_ServerName'])) $this->ga_ServerName = $ar['ga_ServerName'];
		if (isset($ar['pt_AccountKey'])) $this->pt_AccountKey = $ar['pt_AccountKey'];
		if (isset($ar['pt_OpenUID'])) $this->pt_OpenUID = $ar['pt_OpenUID'];
		if (isset($ar['pt_AccountID'])) $this->pt_AccountID = $ar['pt_AccountID'];
		if (isset($ar['cs_RoleName'])) $this->cs_RoleName = $ar['cs_RoleName'];
		if (isset($ar['cs_QuestionTitle'])) $this->cs_QuestionTitle = $ar['cs_QuestionTitle'];
		if (isset($ar['cs_QuestionDesc'])) $this->cs_QuestionDesc = $ar['cs_QuestionDesc'];
		if (isset($ar['cs_QuestionModifyInfo'])) $this->cs_QuestionModifyInfo = $ar['cs_QuestionModifyInfo'];
		if (isset($ar['cs_AccessoryInfo'])) $this->cs_AccessoryInfo = $ar['cs_AccessoryInfo'];
		if (isset($ar['cs_QuestionTop'])) $this->cs_QuestionTop = intval($ar['cs_QuestionTop']);
		if (isset($ar['cs_ReplyNum'])) $this->cs_ReplyNum = intval($ar['cs_ReplyNum']);
		if (isset($ar['cs_ClickNum'])) $this->cs_ClickNum = intval($ar['cs_ClickNum']);
		if (isset($ar['cs_QuestionIP'])) $this->cs_QuestionIP = $ar['cs_QuestionIP'];
		if (isset($ar['cs_QuestionState'])) $this->cs_QuestionState = intval($ar['cs_QuestionState']);
		if (isset($ar['cs_CreateTime'])) $this->cs_CreateTime = $ar['cs_CreateTime'];
		if (isset($ar['cs_ResponseTime'])) $this->cs_ResponseTime = intval($ar['cs_ResponseTime']);
		
		
		$this->clean();
		
		return true;
	}
	
	public function /*boolean*/ loadFromExistFields()
	{
		$emptyCondition = true;
    	$emptyFields = true;
    	
    	$fields = array();
    	$condition = array();
    	
    	if (!isset($this->cs_QuestionID)){
    		$emptyFields = false;
    		$fields[] = 'cs_QuestionID';
    	}else{
    		$emptyCondition = false; 
    		$condition['cs_QuestionID']=$this->cs_QuestionID;
    	}
    	if (!isset($this->cs_QuestionTypeID)){
    		$emptyFields = false;
    		$fields[] = 'cs_QuestionTypeID';
    	}else{
    		$emptyCondition = false; 
    		$condition['cs_QuestionTypeID']=$this->cs_QuestionTypeID;
    	}
    	if (!isset($this->cs_QuestionSource)){
    		$emptyFields = false;
    		$fields[] = 'cs_QuestionSource';
    	}else{
    		$emptyCondition = false; 
    		$condition['cs_QuestionSource']=$this->cs_QuestionSource;
    	}
    	if (!isset($this->ga_GameID)){
    		$emptyFields = false;
    		$fields[] = 'ga_GameID';
    	}else{
    		$emptyCondition = false; 
    		$condition['ga_GameID']=$this->ga_GameID;
    	}
    	if (!isset($this->ga_GameName)){
    		$emptyFields = false;
    		$fields[] = 'ga_GameName';
    	}else{
    		$emptyCondition = false; 
    		$condition['ga_GameName']=$this->ga_GameName;
    	}
    	if (!isset($this->ga_AreaID)){
    		$emptyFields = false;
    		$fields[] = 'ga_AreaID';
    	}else{
    		$emptyCondition = false; 
    		$condition['ga_AreaID']=$this->ga_AreaID;
    	}
    	if (!isset($this->ga_AreaName)){
    		$emptyFields = false;
    		$fields[] = 'ga_AreaName';
    	}else{
    		$emptyCondition = false; 
    		$condition['ga_AreaName']=$this->ga_AreaName;
    	}
    	if (!isset($this->ga_ServerID)){
    		$emptyFields = false;
    		$fields[] = 'ga_ServerID';
    	}else{
    		$emptyCondition = false; 
    		$condition['ga_ServerID']=$this->ga_ServerID;
    	}
    	if (!isset($this->ga_ServerName)){
    		$emptyFields = false;
    		$fields[] = 'ga_ServerName';
    	}else{
    		$emptyCondition = false; 
    		$condition['ga_ServerName']=$this->ga_ServerName;
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
    	if (!isset($this->pt_AccountID)){
    		$emptyFields = false;
    		$fields[] = 'pt_AccountID';
    	}else{
    		$emptyCondition = false; 
    		$condition['pt_AccountID']=$this->pt_AccountID;
    	}
    	if (!isset($this->cs_RoleName)){
    		$emptyFields = false;
    		$fields[] = 'cs_RoleName';
    	}else{
    		$emptyCondition = false; 
    		$condition['cs_RoleName']=$this->cs_RoleName;
    	}
    	if (!isset($this->cs_QuestionTitle)){
    		$emptyFields = false;
    		$fields[] = 'cs_QuestionTitle';
    	}else{
    		$emptyCondition = false; 
    		$condition['cs_QuestionTitle']=$this->cs_QuestionTitle;
    	}
    	if (!isset($this->cs_QuestionDesc)){
    		$emptyFields = false;
    		$fields[] = 'cs_QuestionDesc';
    	}else{
    		$emptyCondition = false; 
    		$condition['cs_QuestionDesc']=$this->cs_QuestionDesc;
    	}
    	if (!isset($this->cs_QuestionModifyInfo)){
    		$emptyFields = false;
    		$fields[] = 'cs_QuestionModifyInfo';
    	}else{
    		$emptyCondition = false; 
    		$condition['cs_QuestionModifyInfo']=$this->cs_QuestionModifyInfo;
    	}
    	if (!isset($this->cs_AccessoryInfo)){
    		$emptyFields = false;
    		$fields[] = 'cs_AccessoryInfo';
    	}else{
    		$emptyCondition = false; 
    		$condition['cs_AccessoryInfo']=$this->cs_AccessoryInfo;
    	}
    	if (!isset($this->cs_QuestionTop)){
    		$emptyFields = false;
    		$fields[] = 'cs_QuestionTop';
    	}else{
    		$emptyCondition = false; 
    		$condition['cs_QuestionTop']=$this->cs_QuestionTop;
    	}
    	if (!isset($this->cs_ReplyNum)){
    		$emptyFields = false;
    		$fields[] = 'cs_ReplyNum';
    	}else{
    		$emptyCondition = false; 
    		$condition['cs_ReplyNum']=$this->cs_ReplyNum;
    	}
    	if (!isset($this->cs_ClickNum)){
    		$emptyFields = false;
    		$fields[] = 'cs_ClickNum';
    	}else{
    		$emptyCondition = false; 
    		$condition['cs_ClickNum']=$this->cs_ClickNum;
    	}
    	if (!isset($this->cs_QuestionIP)){
    		$emptyFields = false;
    		$fields[] = 'cs_QuestionIP';
    	}else{
    		$emptyCondition = false; 
    		$condition['cs_QuestionIP']=$this->cs_QuestionIP;
    	}
    	if (!isset($this->cs_QuestionState)){
    		$emptyFields = false;
    		$fields[] = 'cs_QuestionState';
    	}else{
    		$emptyCondition = false; 
    		$condition['cs_QuestionState']=$this->cs_QuestionState;
    	}
    	if (!isset($this->cs_CreateTime)){
    		$emptyFields = false;
    		$fields[] = 'cs_CreateTime';
    	}else{
    		$emptyCondition = false; 
    		$condition['cs_CreateTime']=$this->cs_CreateTime;
    	}
    	if (!isset($this->cs_ResponseTime)){
    		$emptyFields = false;
    		$fields[] = 'cs_ResponseTime';
    	}else{
    		$emptyCondition = false; 
    		$condition['cs_ResponseTime']=$this->cs_ResponseTime;
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
				
		if (!isset($this->cs_QuestionID)) $this->cs_QuestionID = get_mysql_insert_id(self::$_db_name);

		
		$this->clean();
		
		return true;	
		
	}
	
	public function /*boolean*/ save(/*array*/$condition=NULL)
	{
		if (empty($condition))
		{
			$uc = "`cs_QuestionID`='{$this->cs_QuestionID}'";
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
		
		$sql = "DELETE FROM `CS_Question` WHERE ".SQLUtil::parseCondition($condition);
		
		$qr = sql_query(self::$_db_name,$sql);
				
		return (boolean)$qr;
	}
	
	public function /*boolean*/ delete()
	{
		if (!$this->is_set_keys())
		{
			return false;
		}
		
		$sql = "DELETE FROM `CS_Question` WHERE `cs_QuestionID`='{$this->cs_QuestionID}'";
		

		$qr = sql_query(self::$_db_name,$sql);
				
		return (boolean)$qr;
	}
	
	public function getInsertValue($fields)
	{
		$values = "(";		
		foreach($fields as $f => $k){
			if($f == 'cs_QuestionID'){
 				$values .= "'{$this->cs_QuestionID}',";
 			}else if($f == 'cs_QuestionTypeID'){
 				$values .= "'{$this->cs_QuestionTypeID}',";
 			}else if($f == 'cs_QuestionSource'){
 				$values .= "'{$this->cs_QuestionSource}',";
 			}else if($f == 'ga_GameID'){
 				$values .= "'{$this->ga_GameID}',";
 			}else if($f == 'ga_GameName'){
 				$values .= "'{$this->ga_GameName}',";
 			}else if($f == 'ga_AreaID'){
 				$values .= "'{$this->ga_AreaID}',";
 			}else if($f == 'ga_AreaName'){
 				$values .= "'{$this->ga_AreaName}',";
 			}else if($f == 'ga_ServerID'){
 				$values .= "'{$this->ga_ServerID}',";
 			}else if($f == 'ga_ServerName'){
 				$values .= "'{$this->ga_ServerName}',";
 			}else if($f == 'pt_AccountKey'){
 				$values .= "'{$this->pt_AccountKey}',";
 			}else if($f == 'pt_OpenUID'){
 				$values .= "'{$this->pt_OpenUID}',";
 			}else if($f == 'pt_AccountID'){
 				$values .= "'{$this->pt_AccountID}',";
 			}else if($f == 'cs_RoleName'){
 				$values .= "'{$this->cs_RoleName}',";
 			}else if($f == 'cs_QuestionTitle'){
 				$values .= "'{$this->cs_QuestionTitle}',";
 			}else if($f == 'cs_QuestionDesc'){
 				$values .= "'{$this->cs_QuestionDesc}',";
 			}else if($f == 'cs_QuestionModifyInfo'){
 				$values .= "'{$this->cs_QuestionModifyInfo}',";
 			}else if($f == 'cs_AccessoryInfo'){
 				$values .= "'{$this->cs_AccessoryInfo}',";
 			}else if($f == 'cs_QuestionTop'){
 				$values .= "'{$this->cs_QuestionTop}',";
 			}else if($f == 'cs_ReplyNum'){
 				$values .= "'{$this->cs_ReplyNum}',";
 			}else if($f == 'cs_ClickNum'){
 				$values .= "'{$this->cs_ClickNum}',";
 			}else if($f == 'cs_QuestionIP'){
 				$values .= "'{$this->cs_QuestionIP}',";
 			}else if($f == 'cs_QuestionState'){
 				$values .= "'{$this->cs_QuestionState}',";
 			}else if($f == 'cs_CreateTime'){
 				$values .= "'{$this->cs_CreateTime}',";
 			}else if($f == 'cs_ResponseTime'){
 				$values .= "'{$this->cs_ResponseTime}',";
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

		if (isset($this->cs_QuestionID))
		{
			$fields .= "`cs_QuestionID`,";
			$values .= "'{$this->cs_QuestionID}',";
		}
		if (isset($this->cs_QuestionTypeID))
		{
			$fields .= "`cs_QuestionTypeID`,";
			$values .= "'{$this->cs_QuestionTypeID}',";
		}
		if (isset($this->cs_QuestionSource))
		{
			$fields .= "`cs_QuestionSource`,";
			$values .= "'{$this->cs_QuestionSource}',";
		}
		if (isset($this->ga_GameID))
		{
			$fields .= "`ga_GameID`,";
			$values .= "'{$this->ga_GameID}',";
		}
		if (isset($this->ga_GameName))
		{
			$fields .= "`ga_GameName`,";
			$values .= "'{$this->ga_GameName}',";
		}
		if (isset($this->ga_AreaID))
		{
			$fields .= "`ga_AreaID`,";
			$values .= "'{$this->ga_AreaID}',";
		}
		if (isset($this->ga_AreaName))
		{
			$fields .= "`ga_AreaName`,";
			$values .= "'{$this->ga_AreaName}',";
		}
		if (isset($this->ga_ServerID))
		{
			$fields .= "`ga_ServerID`,";
			$values .= "'{$this->ga_ServerID}',";
		}
		if (isset($this->ga_ServerName))
		{
			$fields .= "`ga_ServerName`,";
			$values .= "'{$this->ga_ServerName}',";
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
		if (isset($this->pt_AccountID))
		{
			$fields .= "`pt_AccountID`,";
			$values .= "'{$this->pt_AccountID}',";
		}
		if (isset($this->cs_RoleName))
		{
			$fields .= "`cs_RoleName`,";
			$values .= "'{$this->cs_RoleName}',";
		}
		if (isset($this->cs_QuestionTitle))
		{
			$fields .= "`cs_QuestionTitle`,";
			$values .= "'{$this->cs_QuestionTitle}',";
		}
		if (isset($this->cs_QuestionDesc))
		{
			$fields .= "`cs_QuestionDesc`,";
			$values .= "'{$this->cs_QuestionDesc}',";
		}
		if (isset($this->cs_QuestionModifyInfo))
		{
			$fields .= "`cs_QuestionModifyInfo`,";
			$values .= "'{$this->cs_QuestionModifyInfo}',";
		}
		if (isset($this->cs_AccessoryInfo))
		{
			$fields .= "`cs_AccessoryInfo`,";
			$values .= "'{$this->cs_AccessoryInfo}',";
		}
		if (isset($this->cs_QuestionTop))
		{
			$fields .= "`cs_QuestionTop`,";
			$values .= "'{$this->cs_QuestionTop}',";
		}
		if (isset($this->cs_ReplyNum))
		{
			$fields .= "`cs_ReplyNum`,";
			$values .= "'{$this->cs_ReplyNum}',";
		}
		if (isset($this->cs_ClickNum))
		{
			$fields .= "`cs_ClickNum`,";
			$values .= "'{$this->cs_ClickNum}',";
		}
		if (isset($this->cs_QuestionIP))
		{
			$fields .= "`cs_QuestionIP`,";
			$values .= "'{$this->cs_QuestionIP}',";
		}
		if (isset($this->cs_QuestionState))
		{
			$fields .= "`cs_QuestionState`,";
			$values .= "'{$this->cs_QuestionState}',";
		}
		if (isset($this->cs_CreateTime))
		{
			$fields .= "`cs_CreateTime`,";
			$values .= "'{$this->cs_CreateTime}',";
		}
		if (isset($this->cs_ResponseTime))
		{
			$fields .= "`cs_ResponseTime`,";
			$values .= "'{$this->cs_ResponseTime}',";
		}

		
		$fields .= ")";
		$values .= ")";
		
		$sql = "INSERT INTO `CS_Question` ".$fields.$values;
		
		return str_replace(",)",")",$sql);
	}
	
	private function /*string*/ getUpdateFields()
	{
		$update = "";
		
		if ($this->is_cs_QuestionTypeID_dirty)
		{			
			if (!isset($this->cs_QuestionTypeID))
			{
				$update .= ("`cs_QuestionTypeID`=null,");
			}
			else
			{
				$update .= ("`cs_QuestionTypeID`='{$this->cs_QuestionTypeID}',");
			}
		}
		if ($this->is_cs_QuestionSource_dirty)
		{			
			if (!isset($this->cs_QuestionSource))
			{
				$update .= ("`cs_QuestionSource`=null,");
			}
			else
			{
				$update .= ("`cs_QuestionSource`='{$this->cs_QuestionSource}',");
			}
		}
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
		if ($this->is_ga_GameName_dirty)
		{			
			if (!isset($this->ga_GameName))
			{
				$update .= ("`ga_GameName`=null,");
			}
			else
			{
				$update .= ("`ga_GameName`='{$this->ga_GameName}',");
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
		if ($this->is_ga_AreaName_dirty)
		{			
			if (!isset($this->ga_AreaName))
			{
				$update .= ("`ga_AreaName`=null,");
			}
			else
			{
				$update .= ("`ga_AreaName`='{$this->ga_AreaName}',");
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
		if ($this->is_ga_ServerName_dirty)
		{			
			if (!isset($this->ga_ServerName))
			{
				$update .= ("`ga_ServerName`=null,");
			}
			else
			{
				$update .= ("`ga_ServerName`='{$this->ga_ServerName}',");
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
		if ($this->is_pt_AccountID_dirty)
		{			
			if (!isset($this->pt_AccountID))
			{
				$update .= ("`pt_AccountID`=null,");
			}
			else
			{
				$update .= ("`pt_AccountID`='{$this->pt_AccountID}',");
			}
		}
		if ($this->is_cs_RoleName_dirty)
		{			
			if (!isset($this->cs_RoleName))
			{
				$update .= ("`cs_RoleName`=null,");
			}
			else
			{
				$update .= ("`cs_RoleName`='{$this->cs_RoleName}',");
			}
		}
		if ($this->is_cs_QuestionTitle_dirty)
		{			
			if (!isset($this->cs_QuestionTitle))
			{
				$update .= ("`cs_QuestionTitle`=null,");
			}
			else
			{
				$update .= ("`cs_QuestionTitle`='{$this->cs_QuestionTitle}',");
			}
		}
		if ($this->is_cs_QuestionDesc_dirty)
		{			
			if (!isset($this->cs_QuestionDesc))
			{
				$update .= ("`cs_QuestionDesc`=null,");
			}
			else
			{
				$update .= ("`cs_QuestionDesc`='{$this->cs_QuestionDesc}',");
			}
		}
		if ($this->is_cs_QuestionModifyInfo_dirty)
		{			
			if (!isset($this->cs_QuestionModifyInfo))
			{
				$update .= ("`cs_QuestionModifyInfo`=null,");
			}
			else
			{
				$update .= ("`cs_QuestionModifyInfo`='{$this->cs_QuestionModifyInfo}',");
			}
		}
		if ($this->is_cs_AccessoryInfo_dirty)
		{			
			if (!isset($this->cs_AccessoryInfo))
			{
				$update .= ("`cs_AccessoryInfo`=null,");
			}
			else
			{
				$update .= ("`cs_AccessoryInfo`='{$this->cs_AccessoryInfo}',");
			}
		}
		if ($this->is_cs_QuestionTop_dirty)
		{			
			if (!isset($this->cs_QuestionTop))
			{
				$update .= ("`cs_QuestionTop`=null,");
			}
			else
			{
				$update .= ("`cs_QuestionTop`='{$this->cs_QuestionTop}',");
			}
		}
		if ($this->is_cs_ReplyNum_dirty)
		{			
			if (!isset($this->cs_ReplyNum))
			{
				$update .= ("`cs_ReplyNum`=null,");
			}
			else
			{
				$update .= ("`cs_ReplyNum`='{$this->cs_ReplyNum}',");
			}
		}
		if ($this->is_cs_ClickNum_dirty)
		{			
			if (!isset($this->cs_ClickNum))
			{
				$update .= ("`cs_ClickNum`=null,");
			}
			else
			{
				$update .= ("`cs_ClickNum`='{$this->cs_ClickNum}',");
			}
		}
		if ($this->is_cs_QuestionIP_dirty)
		{			
			if (!isset($this->cs_QuestionIP))
			{
				$update .= ("`cs_QuestionIP`=null,");
			}
			else
			{
				$update .= ("`cs_QuestionIP`='{$this->cs_QuestionIP}',");
			}
		}
		if ($this->is_cs_QuestionState_dirty)
		{			
			if (!isset($this->cs_QuestionState))
			{
				$update .= ("`cs_QuestionState`=null,");
			}
			else
			{
				$update .= ("`cs_QuestionState`='{$this->cs_QuestionState}',");
			}
		}
		if ($this->is_cs_CreateTime_dirty)
		{			
			if (!isset($this->cs_CreateTime))
			{
				$update .= ("`cs_CreateTime`=null,");
			}
			else
			{
				$update .= ("`cs_CreateTime`='{$this->cs_CreateTime}',");
			}
		}
		if ($this->is_cs_ResponseTime_dirty)
		{			
			if (!isset($this->cs_ResponseTime))
			{
				$update .= ("`cs_ResponseTime`=null,");
			}
			else
			{
				$update .= ("`cs_ResponseTime`='{$this->cs_ResponseTime}',");
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
		
		$sql = "UPDATE `CS_Question` SET {$update} WHERE {$condition}";
		
		return $sql;
	}
	
	public function /*boolean*/ add($fieldsValue,$condition=NULL)
	{				
		if (empty($condition))
		{
			$uc = "`cs_QuestionID`='{$this->cs_QuestionID}'";
		}
		else
		{			
			$uc = SQLUtil::parseCondition($condition);
		}
		
		$update = SQLUtil::parseASFieldValues($fieldsValue);
		
		$sql = "UPDATE `CS_Question` SET {$update} WHERE {$uc}";
		
		$qr = sql_query(self::$_db_name,$sql);
				
		return (boolean)$qr;
	}	
	
	public function /*boolean*/ sub($fieldsValue,$condition=NULL)
	{
		if (empty($condition))
		{
			$uc = "`cs_QuestionID`='{$this->cs_QuestionID}'";
		}
		else
		{			
			$uc = SQLUtil::parseCondition($condition);
		}
		
		$update = SQLUtil::parseASFieldValues($fieldsValue,false);
		
		$sql = "UPDATE `CS_Question` SET {$update} WHERE {$uc}";
		
		$qr = sql_query(self::$_db_name,$sql);
				
		return (boolean)$qr;
	}
	
	/**
	 * 是否已经设置主键的值
	 */
	public function is_set_keys()
	{
		
		return (isset($this->cs_QuestionID));

	}
	
	private function /*void*/ clean() 
	{
		$this->is_this_table_dirty = false;
		$this->is_cs_QuestionID_dirty = false;
		$this->is_cs_QuestionTypeID_dirty = false;
		$this->is_cs_QuestionSource_dirty = false;
		$this->is_ga_GameID_dirty = false;
		$this->is_ga_GameName_dirty = false;
		$this->is_ga_AreaID_dirty = false;
		$this->is_ga_AreaName_dirty = false;
		$this->is_ga_ServerID_dirty = false;
		$this->is_ga_ServerName_dirty = false;
		$this->is_pt_AccountKey_dirty = false;
		$this->is_pt_OpenUID_dirty = false;
		$this->is_pt_AccountID_dirty = false;
		$this->is_cs_RoleName_dirty = false;
		$this->is_cs_QuestionTitle_dirty = false;
		$this->is_cs_QuestionDesc_dirty = false;
		$this->is_cs_QuestionModifyInfo_dirty = false;
		$this->is_cs_AccessoryInfo_dirty = false;
		$this->is_cs_QuestionTop_dirty = false;
		$this->is_cs_ReplyNum_dirty = false;
		$this->is_cs_ClickNum_dirty = false;
		$this->is_cs_QuestionIP_dirty = false;
		$this->is_cs_QuestionState_dirty = false;
		$this->is_cs_CreateTime_dirty = false;
		$this->is_cs_ResponseTime_dirty = false;

	}
	
	public function /*string*/ getCsQuestionID()
	{
		return $this->cs_QuestionID;
	}
	
	public function /*void*/ setCsQuestionID(/*string*/ $cs_QuestionID)
	{
		$this->cs_QuestionID = SQLUtil::toSafeSQLString($cs_QuestionID);
		$this->is_cs_QuestionID_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setCsQuestionIDNull()
	{
		$this->cs_QuestionID = null;
		$this->is_cs_QuestionID_dirty = true;		
		$this->is_this_table_dirty = true;
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

	public function /*int*/ getCsQuestionSource()
	{
		return $this->cs_QuestionSource;
	}
	
	public function /*void*/ setCsQuestionSource(/*int*/ $cs_QuestionSource)
	{
		$this->cs_QuestionSource = intval($cs_QuestionSource);
		$this->is_cs_QuestionSource_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setCsQuestionSourceNull()
	{
		$this->cs_QuestionSource = null;
		$this->is_cs_QuestionSource_dirty = true;		
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

	public function /*string*/ getGaGameName()
	{
		return $this->ga_GameName;
	}
	
	public function /*void*/ setGaGameName(/*string*/ $ga_GameName)
	{
		$this->ga_GameName = SQLUtil::toSafeSQLString($ga_GameName);
		$this->is_ga_GameName_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setGaGameNameNull()
	{
		$this->ga_GameName = null;
		$this->is_ga_GameName_dirty = true;		
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

	public function /*string*/ getGaAreaName()
	{
		return $this->ga_AreaName;
	}
	
	public function /*void*/ setGaAreaName(/*string*/ $ga_AreaName)
	{
		$this->ga_AreaName = SQLUtil::toSafeSQLString($ga_AreaName);
		$this->is_ga_AreaName_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setGaAreaNameNull()
	{
		$this->ga_AreaName = null;
		$this->is_ga_AreaName_dirty = true;		
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

	public function /*string*/ getGaServerName()
	{
		return $this->ga_ServerName;
	}
	
	public function /*void*/ setGaServerName(/*string*/ $ga_ServerName)
	{
		$this->ga_ServerName = SQLUtil::toSafeSQLString($ga_ServerName);
		$this->is_ga_ServerName_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setGaServerNameNull()
	{
		$this->ga_ServerName = null;
		$this->is_ga_ServerName_dirty = true;		
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

	public function /*string*/ getPtAccountID()
	{
		return $this->pt_AccountID;
	}
	
	public function /*void*/ setPtAccountID(/*string*/ $pt_AccountID)
	{
		$this->pt_AccountID = SQLUtil::toSafeSQLString($pt_AccountID);
		$this->is_pt_AccountID_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setPtAccountIDNull()
	{
		$this->pt_AccountID = null;
		$this->is_pt_AccountID_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*string*/ getCsRoleName()
	{
		return $this->cs_RoleName;
	}
	
	public function /*void*/ setCsRoleName(/*string*/ $cs_RoleName)
	{
		$this->cs_RoleName = SQLUtil::toSafeSQLString($cs_RoleName);
		$this->is_cs_RoleName_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setCsRoleNameNull()
	{
		$this->cs_RoleName = null;
		$this->is_cs_RoleName_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*string*/ getCsQuestionTitle()
	{
		return $this->cs_QuestionTitle;
	}
	
	public function /*void*/ setCsQuestionTitle(/*string*/ $cs_QuestionTitle)
	{
		$this->cs_QuestionTitle = SQLUtil::toSafeSQLString($cs_QuestionTitle);
		$this->is_cs_QuestionTitle_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setCsQuestionTitleNull()
	{
		$this->cs_QuestionTitle = null;
		$this->is_cs_QuestionTitle_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*string*/ getCsQuestionDesc()
	{
		return $this->cs_QuestionDesc;
	}
	
	public function /*void*/ setCsQuestionDesc(/*string*/ $cs_QuestionDesc)
	{
		$this->cs_QuestionDesc = SQLUtil::toSafeSQLString($cs_QuestionDesc);
		$this->is_cs_QuestionDesc_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setCsQuestionDescNull()
	{
		$this->cs_QuestionDesc = null;
		$this->is_cs_QuestionDesc_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*string*/ getCsQuestionModifyInfo()
	{
		return $this->cs_QuestionModifyInfo;
	}
	
	public function /*void*/ setCsQuestionModifyInfo(/*string*/ $cs_QuestionModifyInfo)
	{
		$this->cs_QuestionModifyInfo = SQLUtil::toSafeSQLString($cs_QuestionModifyInfo);
		$this->is_cs_QuestionModifyInfo_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setCsQuestionModifyInfoNull()
	{
		$this->cs_QuestionModifyInfo = null;
		$this->is_cs_QuestionModifyInfo_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*string*/ getCsAccessoryInfo()
	{
		return $this->cs_AccessoryInfo;
	}
	
	public function /*void*/ setCsAccessoryInfo(/*string*/ $cs_AccessoryInfo)
	{
		$this->cs_AccessoryInfo = SQLUtil::toSafeSQLString($cs_AccessoryInfo);
		$this->is_cs_AccessoryInfo_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setCsAccessoryInfoNull()
	{
		$this->cs_AccessoryInfo = null;
		$this->is_cs_AccessoryInfo_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*int*/ getCsQuestionTop()
	{
		return $this->cs_QuestionTop;
	}
	
	public function /*void*/ setCsQuestionTop(/*int*/ $cs_QuestionTop)
	{
		$this->cs_QuestionTop = intval($cs_QuestionTop);
		$this->is_cs_QuestionTop_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setCsQuestionTopNull()
	{
		$this->cs_QuestionTop = null;
		$this->is_cs_QuestionTop_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*int*/ getCsReplyNum()
	{
		return $this->cs_ReplyNum;
	}
	
	public function /*void*/ setCsReplyNum(/*int*/ $cs_ReplyNum)
	{
		$this->cs_ReplyNum = intval($cs_ReplyNum);
		$this->is_cs_ReplyNum_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setCsReplyNumNull()
	{
		$this->cs_ReplyNum = null;
		$this->is_cs_ReplyNum_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*int*/ getCsClickNum()
	{
		return $this->cs_ClickNum;
	}
	
	public function /*void*/ setCsClickNum(/*int*/ $cs_ClickNum)
	{
		$this->cs_ClickNum = intval($cs_ClickNum);
		$this->is_cs_ClickNum_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setCsClickNumNull()
	{
		$this->cs_ClickNum = null;
		$this->is_cs_ClickNum_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*string*/ getCsQuestionIP()
	{
		return $this->cs_QuestionIP;
	}
	
	public function /*void*/ setCsQuestionIP(/*string*/ $cs_QuestionIP)
	{
		$this->cs_QuestionIP = SQLUtil::toSafeSQLString($cs_QuestionIP);
		$this->is_cs_QuestionIP_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setCsQuestionIPNull()
	{
		$this->cs_QuestionIP = null;
		$this->is_cs_QuestionIP_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*int*/ getCsQuestionState()
	{
		return $this->cs_QuestionState;
	}
	
	public function /*void*/ setCsQuestionState(/*int*/ $cs_QuestionState)
	{
		$this->cs_QuestionState = intval($cs_QuestionState);
		$this->is_cs_QuestionState_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setCsQuestionStateNull()
	{
		$this->cs_QuestionState = null;
		$this->is_cs_QuestionState_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*string*/ getCsCreateTime()
	{
		return $this->cs_CreateTime;
	}
	
	public function /*void*/ setCsCreateTime(/*string*/ $cs_CreateTime)
	{
		$this->cs_CreateTime = SQLUtil::toSafeSQLString($cs_CreateTime);
		$this->is_cs_CreateTime_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setCsCreateTimeNull()
	{
		$this->cs_CreateTime = null;
		$this->is_cs_CreateTime_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*int*/ getCsResponseTime()
	{
		return $this->cs_ResponseTime;
	}
	
	public function /*void*/ setCsResponseTime(/*int*/ $cs_ResponseTime)
	{
		$this->cs_ResponseTime = intval($cs_ResponseTime);
		$this->is_cs_ResponseTime_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setCsResponseTimeNull()
	{
		$this->cs_ResponseTime = null;
		$this->is_cs_ResponseTime_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	
	public function /*string*/ toDebugString()
	{
		$dbg = "(";
		
		$dbg .= ("cs_QuestionID={$this->cs_QuestionID},");
		$dbg .= ("cs_QuestionTypeID={$this->cs_QuestionTypeID},");
		$dbg .= ("cs_QuestionSource={$this->cs_QuestionSource},");
		$dbg .= ("ga_GameID={$this->ga_GameID},");
		$dbg .= ("ga_GameName={$this->ga_GameName},");
		$dbg .= ("ga_AreaID={$this->ga_AreaID},");
		$dbg .= ("ga_AreaName={$this->ga_AreaName},");
		$dbg .= ("ga_ServerID={$this->ga_ServerID},");
		$dbg .= ("ga_ServerName={$this->ga_ServerName},");
		$dbg .= ("pt_AccountKey={$this->pt_AccountKey},");
		$dbg .= ("pt_OpenUID={$this->pt_OpenUID},");
		$dbg .= ("pt_AccountID={$this->pt_AccountID},");
		$dbg .= ("cs_RoleName={$this->cs_RoleName},");
		$dbg .= ("cs_QuestionTitle={$this->cs_QuestionTitle},");
		$dbg .= ("cs_QuestionDesc={$this->cs_QuestionDesc},");
		$dbg .= ("cs_QuestionModifyInfo={$this->cs_QuestionModifyInfo},");
		$dbg .= ("cs_AccessoryInfo={$this->cs_AccessoryInfo},");
		$dbg .= ("cs_QuestionTop={$this->cs_QuestionTop},");
		$dbg .= ("cs_ReplyNum={$this->cs_ReplyNum},");
		$dbg .= ("cs_ClickNum={$this->cs_ClickNum},");
		$dbg .= ("cs_QuestionIP={$this->cs_QuestionIP},");
		$dbg .= ("cs_QuestionState={$this->cs_QuestionState},");
		$dbg .= ("cs_CreateTime={$this->cs_CreateTime},");
		$dbg .= ("cs_ResponseTime={$this->cs_ResponseTime},");

		$dbg .= ")";
				
		return str_replace(",)",")",$dbg);
	}
	
	public function fromArray($arr)
	{
		if (isset($arr['cs_QuestionID'])) $this->setCsQuestionID($arr['cs_QuestionID']);
		if (isset($arr['cs_QuestionTypeID'])) $this->setCsQuestionTypeID($arr['cs_QuestionTypeID']);
		if (isset($arr['cs_QuestionSource'])) $this->setCsQuestionSource($arr['cs_QuestionSource']);
		if (isset($arr['ga_GameID'])) $this->setGaGameID($arr['ga_GameID']);
		if (isset($arr['ga_GameName'])) $this->setGaGameName($arr['ga_GameName']);
		if (isset($arr['ga_AreaID'])) $this->setGaAreaID($arr['ga_AreaID']);
		if (isset($arr['ga_AreaName'])) $this->setGaAreaName($arr['ga_AreaName']);
		if (isset($arr['ga_ServerID'])) $this->setGaServerID($arr['ga_ServerID']);
		if (isset($arr['ga_ServerName'])) $this->setGaServerName($arr['ga_ServerName']);
		if (isset($arr['pt_AccountKey'])) $this->setPtAccountKey($arr['pt_AccountKey']);
		if (isset($arr['pt_OpenUID'])) $this->setPtOpenUID($arr['pt_OpenUID']);
		if (isset($arr['pt_AccountID'])) $this->setPtAccountID($arr['pt_AccountID']);
		if (isset($arr['cs_RoleName'])) $this->setCsRoleName($arr['cs_RoleName']);
		if (isset($arr['cs_QuestionTitle'])) $this->setCsQuestionTitle($arr['cs_QuestionTitle']);
		if (isset($arr['cs_QuestionDesc'])) $this->setCsQuestionDesc($arr['cs_QuestionDesc']);
		if (isset($arr['cs_QuestionModifyInfo'])) $this->setCsQuestionModifyInfo($arr['cs_QuestionModifyInfo']);
		if (isset($arr['cs_AccessoryInfo'])) $this->setCsAccessoryInfo($arr['cs_AccessoryInfo']);
		if (isset($arr['cs_QuestionTop'])) $this->setCsQuestionTop($arr['cs_QuestionTop']);
		if (isset($arr['cs_ReplyNum'])) $this->setCsReplyNum($arr['cs_ReplyNum']);
		if (isset($arr['cs_ClickNum'])) $this->setCsClickNum($arr['cs_ClickNum']);
		if (isset($arr['cs_QuestionIP'])) $this->setCsQuestionIP($arr['cs_QuestionIP']);
		if (isset($arr['cs_QuestionState'])) $this->setCsQuestionState($arr['cs_QuestionState']);
		if (isset($arr['cs_CreateTime'])) $this->setCsCreateTime($arr['cs_CreateTime']);
		if (isset($arr['cs_ResponseTime'])) $this->setCsResponseTime($arr['cs_ResponseTime']);
		
	}
	
	public function toArray()
	{
		$ret = array();
		$ret['cs_QuestionID'] = $this->cs_QuestionID;
		$ret['cs_QuestionTypeID'] = $this->cs_QuestionTypeID;
		$ret['cs_QuestionSource'] = $this->cs_QuestionSource;
		$ret['ga_GameID'] = $this->ga_GameID;
		$ret['ga_GameName'] = $this->ga_GameName;
		$ret['ga_AreaID'] = $this->ga_AreaID;
		$ret['ga_AreaName'] = $this->ga_AreaName;
		$ret['ga_ServerID'] = $this->ga_ServerID;
		$ret['ga_ServerName'] = $this->ga_ServerName;
		$ret['pt_AccountKey'] = $this->pt_AccountKey;
		$ret['pt_OpenUID'] = $this->pt_OpenUID;
		$ret['pt_AccountID'] = $this->pt_AccountID;
		$ret['cs_RoleName'] = $this->cs_RoleName;
		$ret['cs_QuestionTitle'] = $this->cs_QuestionTitle;
		$ret['cs_QuestionDesc'] = $this->cs_QuestionDesc;
		$ret['cs_QuestionModifyInfo'] = $this->cs_QuestionModifyInfo;
		$ret['cs_AccessoryInfo'] = $this->cs_AccessoryInfo;
		$ret['cs_QuestionTop'] = $this->cs_QuestionTop;
		$ret['cs_ReplyNum'] = $this->cs_ReplyNum;
		$ret['cs_ClickNum'] = $this->cs_ClickNum;
		$ret['cs_QuestionIP'] = $this->cs_QuestionIP;
		$ret['cs_QuestionState'] = $this->cs_QuestionState;
		$ret['cs_CreateTime'] = $this->cs_CreateTime;
		$ret['cs_ResponseTime'] = $this->cs_ResponseTime;

		return $ret;
	}
}

?>
