<?php
require_once (FRAMEWORK_PATH . "utils/MysqlDBHelper.php");
require_once (FRAMEWORK_PATH . "db/SQLUtil.php");
/**
 * database table SD_GameInfo description
 * 
 * [This file was auto-generated. PLEASE DONT EDIT]
 * 
 * @author LiangZhixian
 * 
 */
class TbSDGameInfo {
	
	public static $_db_name = "pf_basemanage";
	
	private /*int*/ $ga_GameID; //PRIMARY KEY 游戏种类ID
	private /*string*/ $sd_GameName;
	private /*string*/ $sd_GameOtherName;
	private /*string*/ $sd_GameRank; //备用
	private /*string*/ $sd_GameWebsite;
	private /*string*/ $sd_GameIcon;
	private /*int*/ $sd_GameStars;
	private /*int*/ $sd_DownloadNum;
	private /*string*/ $sd_GameInfo;
	private /*string*/ $sd_GamePic;
	private /*string*/ $sd_GamePackage;
	private /*int*/ $sd_SupportIOS;
	private /*string*/ $sd_AppStoreURL;
	private /*int*/ $sd_SupportAndroid;
	private /*string*/ $sd_GooglePalyURL;
	private /*string*/ $sd_GameAPK;
	private /*string*/ $sd_GameAPKURL;
	private /*string*/ $sd_NewVersion;
	private /*string*/ $sd_GameAddTime;
	private /*int*/ $sd_GameState; //0=正常             1=删除
	private /*string*/ $sd_GameRemark;

	
	private $is_this_table_dirty = false;
	private $is_ga_GameID_dirty = false;
	private $is_sd_GameName_dirty = false;
	private $is_sd_GameOtherName_dirty = false;
	private $is_sd_GameRank_dirty = false;
	private $is_sd_GameWebsite_dirty = false;
	private $is_sd_GameIcon_dirty = false;
	private $is_sd_GameStars_dirty = false;
	private $is_sd_DownloadNum_dirty = false;
	private $is_sd_GameInfo_dirty = false;
	private $is_sd_GamePic_dirty = false;
	private $is_sd_GamePackage_dirty = false;
	private $is_sd_SupportIOS_dirty = false;
	private $is_sd_AppStoreURL_dirty = false;
	private $is_sd_SupportAndroid_dirty = false;
	private $is_sd_GooglePalyURL_dirty = false;
	private $is_sd_GameAPK_dirty = false;
	private $is_sd_GameAPKURL_dirty = false;
	private $is_sd_NewVersion_dirty = false;
	private $is_sd_GameAddTime_dirty = false;
	private $is_sd_GameState_dirty = false;
	private $is_sd_GameRemark_dirty = false;


	/**
	 * @param array($condition)
	 * @return array(TbSDGameInfo)
	 */
	public static function /*array(TbSDGameInfo)*/ loadTable(/*array*/ $fields=NULL,/*array*/$condition=NULL)
	{
		$result = array();
		
		$f = "*";
		
		if(!empty($fields))
		{
			$f = SQLUtil::parseFields($fields);			
		}
		
		if (empty($condition))
		{
			$sql = "SELECT {$f} FROM `SD_GameInfo`";
		}
		else
		{			
			$sql = "SELECT {$f} FROM `SD_GameInfo` WHERE ".SQLUtil::parseCondition($condition);
		}			
		
		$ar = sql_fetch_rows_assoc(self::$_db_name,$sql);
		
		if (empty($ar) || count($ar) == 0)
		{
			return $result;
		}
		
		foreach($ar as $row)
		{
			$tb = new TbSDGameInfo();			
			if (isset($row['ga_GameID'])) $tb->ga_GameID = intval($row['ga_GameID']);
			if (isset($row['sd_GameName'])) $tb->sd_GameName = $row['sd_GameName'];
			if (isset($row['sd_GameOtherName'])) $tb->sd_GameOtherName = $row['sd_GameOtherName'];
			if (isset($row['sd_GameRank'])) $tb->sd_GameRank = $row['sd_GameRank'];
			if (isset($row['sd_GameWebsite'])) $tb->sd_GameWebsite = $row['sd_GameWebsite'];
			if (isset($row['sd_GameIcon'])) $tb->sd_GameIcon = $row['sd_GameIcon'];
			if (isset($row['sd_GameStars'])) $tb->sd_GameStars = intval($row['sd_GameStars']);
			if (isset($row['sd_DownloadNum'])) $tb->sd_DownloadNum = intval($row['sd_DownloadNum']);
			if (isset($row['sd_GameInfo'])) $tb->sd_GameInfo = $row['sd_GameInfo'];
			if (isset($row['sd_GamePic'])) $tb->sd_GamePic = $row['sd_GamePic'];
			if (isset($row['sd_GamePackage'])) $tb->sd_GamePackage = $row['sd_GamePackage'];
			if (isset($row['sd_SupportIOS'])) $tb->sd_SupportIOS = intval($row['sd_SupportIOS']);
			if (isset($row['sd_AppStoreURL'])) $tb->sd_AppStoreURL = $row['sd_AppStoreURL'];
			if (isset($row['sd_SupportAndroid'])) $tb->sd_SupportAndroid = intval($row['sd_SupportAndroid']);
			if (isset($row['sd_GooglePalyURL'])) $tb->sd_GooglePalyURL = $row['sd_GooglePalyURL'];
			if (isset($row['sd_GameAPK'])) $tb->sd_GameAPK = $row['sd_GameAPK'];
			if (isset($row['sd_GameAPKURL'])) $tb->sd_GameAPKURL = $row['sd_GameAPKURL'];
			if (isset($row['sd_NewVersion'])) $tb->sd_NewVersion = $row['sd_NewVersion'];
			if (isset($row['sd_GameAddTime'])) $tb->sd_GameAddTime = $row['sd_GameAddTime'];
			if (isset($row['sd_GameState'])) $tb->sd_GameState = intval($row['sd_GameState']);
			if (isset($row['sd_GameRemark'])) $tb->sd_GameRemark = $row['sd_GameRemark'];
		
			$result[] = $tb;
		}
		
		return $result;
	}	
	
	public static function insertSqlHeader(/*array*/ $fields=NULL)
	{
		$result = array();				
		if(!empty($fields)){
			$f = SQLUtil::parseFields($fields);			
			$result[0] = "INSERT INTO `SD_GameInfo` ({$f}) VALUES ";	
			$ar = array();
			foreach($fields as $key){
				$ar[$key]=1;
			}
			$result[1] = $ar;
		}else{
			$result[0]="INSERT INTO `SD_GameInfo` (`ga_GameID`,`sd_GameName`,`sd_GameOtherName`,`sd_GameRank`,`sd_GameWebsite`,`sd_GameIcon`,`sd_GameStars`,`sd_DownloadNum`,`sd_GameInfo`,`sd_GamePic`,`sd_GamePackage`,`sd_SupportIOS`,`sd_AppStoreURL`,`sd_SupportAndroid`,`sd_GooglePalyURL`,`sd_GameAPK`,`sd_GameAPKURL`,`sd_NewVersion`,`sd_GameAddTime`,`sd_GameState`,`sd_GameRemark`) VALUES ";
			$result[1] = array('ga_GameID'=>1,'sd_GameName'=>1,'sd_GameOtherName'=>1,'sd_GameRank'=>1,'sd_GameWebsite'=>1,'sd_GameIcon'=>1,'sd_GameStars'=>1,'sd_DownloadNum'=>1,'sd_GameInfo'=>1,'sd_GamePic'=>1,'sd_GamePackage'=>1,'sd_SupportIOS'=>1,'sd_AppStoreURL'=>1,'sd_SupportAndroid'=>1,'sd_GooglePalyURL'=>1,'sd_GameAPK'=>1,'sd_GameAPKURL'=>1,'sd_NewVersion'=>1,'sd_GameAddTime'=>1,'sd_GameState'=>1,'sd_GameRemark'=>1);
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
		$c = "`ga_GameID`='{$this->ga_GameID}'";
		
		if(!empty($fields))
		{
			$f = SQLUtil::parseFields($fields);			
		}
	    if (!empty($condition))
		{
			$c =SQLUtil::parseCondition($condition);
		}
		
		$sql = "SELECT {$f} FROM `SD_GameInfo` WHERE {$c} LIMIT 1";


		$ars = sql_fetch_rows_assoc(self::$_db_name,$sql);
		
		if (!$ars || count($ars)==0)
		{
			return false;
		}
		
		$ar = $ars[0];
		
		if (isset($ar['ga_GameID'])) $this->ga_GameID = intval($ar['ga_GameID']);
		if (isset($ar['sd_GameName'])) $this->sd_GameName = $ar['sd_GameName'];
		if (isset($ar['sd_GameOtherName'])) $this->sd_GameOtherName = $ar['sd_GameOtherName'];
		if (isset($ar['sd_GameRank'])) $this->sd_GameRank = $ar['sd_GameRank'];
		if (isset($ar['sd_GameWebsite'])) $this->sd_GameWebsite = $ar['sd_GameWebsite'];
		if (isset($ar['sd_GameIcon'])) $this->sd_GameIcon = $ar['sd_GameIcon'];
		if (isset($ar['sd_GameStars'])) $this->sd_GameStars = intval($ar['sd_GameStars']);
		if (isset($ar['sd_DownloadNum'])) $this->sd_DownloadNum = intval($ar['sd_DownloadNum']);
		if (isset($ar['sd_GameInfo'])) $this->sd_GameInfo = $ar['sd_GameInfo'];
		if (isset($ar['sd_GamePic'])) $this->sd_GamePic = $ar['sd_GamePic'];
		if (isset($ar['sd_GamePackage'])) $this->sd_GamePackage = $ar['sd_GamePackage'];
		if (isset($ar['sd_SupportIOS'])) $this->sd_SupportIOS = intval($ar['sd_SupportIOS']);
		if (isset($ar['sd_AppStoreURL'])) $this->sd_AppStoreURL = $ar['sd_AppStoreURL'];
		if (isset($ar['sd_SupportAndroid'])) $this->sd_SupportAndroid = intval($ar['sd_SupportAndroid']);
		if (isset($ar['sd_GooglePalyURL'])) $this->sd_GooglePalyURL = $ar['sd_GooglePalyURL'];
		if (isset($ar['sd_GameAPK'])) $this->sd_GameAPK = $ar['sd_GameAPK'];
		if (isset($ar['sd_GameAPKURL'])) $this->sd_GameAPKURL = $ar['sd_GameAPKURL'];
		if (isset($ar['sd_NewVersion'])) $this->sd_NewVersion = $ar['sd_NewVersion'];
		if (isset($ar['sd_GameAddTime'])) $this->sd_GameAddTime = $ar['sd_GameAddTime'];
		if (isset($ar['sd_GameState'])) $this->sd_GameState = intval($ar['sd_GameState']);
		if (isset($ar['sd_GameRemark'])) $this->sd_GameRemark = $ar['sd_GameRemark'];
		
		
		$this->clean();
		
		return true;
	}
	
	public function /*boolean*/ loadFromExistFields()
	{
		$emptyCondition = true;
    	$emptyFields = true;
    	
    	$fields = array();
    	$condition = array();
    	
    	if (!isset($this->ga_GameID)){
    		$emptyFields = false;
    		$fields[] = 'ga_GameID';
    	}else{
    		$emptyCondition = false; 
    		$condition['ga_GameID']=$this->ga_GameID;
    	}
    	if (!isset($this->sd_GameName)){
    		$emptyFields = false;
    		$fields[] = 'sd_GameName';
    	}else{
    		$emptyCondition = false; 
    		$condition['sd_GameName']=$this->sd_GameName;
    	}
    	if (!isset($this->sd_GameOtherName)){
    		$emptyFields = false;
    		$fields[] = 'sd_GameOtherName';
    	}else{
    		$emptyCondition = false; 
    		$condition['sd_GameOtherName']=$this->sd_GameOtherName;
    	}
    	if (!isset($this->sd_GameRank)){
    		$emptyFields = false;
    		$fields[] = 'sd_GameRank';
    	}else{
    		$emptyCondition = false; 
    		$condition['sd_GameRank']=$this->sd_GameRank;
    	}
    	if (!isset($this->sd_GameWebsite)){
    		$emptyFields = false;
    		$fields[] = 'sd_GameWebsite';
    	}else{
    		$emptyCondition = false; 
    		$condition['sd_GameWebsite']=$this->sd_GameWebsite;
    	}
    	if (!isset($this->sd_GameIcon)){
    		$emptyFields = false;
    		$fields[] = 'sd_GameIcon';
    	}else{
    		$emptyCondition = false; 
    		$condition['sd_GameIcon']=$this->sd_GameIcon;
    	}
    	if (!isset($this->sd_GameStars)){
    		$emptyFields = false;
    		$fields[] = 'sd_GameStars';
    	}else{
    		$emptyCondition = false; 
    		$condition['sd_GameStars']=$this->sd_GameStars;
    	}
    	if (!isset($this->sd_DownloadNum)){
    		$emptyFields = false;
    		$fields[] = 'sd_DownloadNum';
    	}else{
    		$emptyCondition = false; 
    		$condition['sd_DownloadNum']=$this->sd_DownloadNum;
    	}
    	if (!isset($this->sd_GameInfo)){
    		$emptyFields = false;
    		$fields[] = 'sd_GameInfo';
    	}else{
    		$emptyCondition = false; 
    		$condition['sd_GameInfo']=$this->sd_GameInfo;
    	}
    	if (!isset($this->sd_GamePic)){
    		$emptyFields = false;
    		$fields[] = 'sd_GamePic';
    	}else{
    		$emptyCondition = false; 
    		$condition['sd_GamePic']=$this->sd_GamePic;
    	}
    	if (!isset($this->sd_GamePackage)){
    		$emptyFields = false;
    		$fields[] = 'sd_GamePackage';
    	}else{
    		$emptyCondition = false; 
    		$condition['sd_GamePackage']=$this->sd_GamePackage;
    	}
    	if (!isset($this->sd_SupportIOS)){
    		$emptyFields = false;
    		$fields[] = 'sd_SupportIOS';
    	}else{
    		$emptyCondition = false; 
    		$condition['sd_SupportIOS']=$this->sd_SupportIOS;
    	}
    	if (!isset($this->sd_AppStoreURL)){
    		$emptyFields = false;
    		$fields[] = 'sd_AppStoreURL';
    	}else{
    		$emptyCondition = false; 
    		$condition['sd_AppStoreURL']=$this->sd_AppStoreURL;
    	}
    	if (!isset($this->sd_SupportAndroid)){
    		$emptyFields = false;
    		$fields[] = 'sd_SupportAndroid';
    	}else{
    		$emptyCondition = false; 
    		$condition['sd_SupportAndroid']=$this->sd_SupportAndroid;
    	}
    	if (!isset($this->sd_GooglePalyURL)){
    		$emptyFields = false;
    		$fields[] = 'sd_GooglePalyURL';
    	}else{
    		$emptyCondition = false; 
    		$condition['sd_GooglePalyURL']=$this->sd_GooglePalyURL;
    	}
    	if (!isset($this->sd_GameAPK)){
    		$emptyFields = false;
    		$fields[] = 'sd_GameAPK';
    	}else{
    		$emptyCondition = false; 
    		$condition['sd_GameAPK']=$this->sd_GameAPK;
    	}
    	if (!isset($this->sd_GameAPKURL)){
    		$emptyFields = false;
    		$fields[] = 'sd_GameAPKURL';
    	}else{
    		$emptyCondition = false; 
    		$condition['sd_GameAPKURL']=$this->sd_GameAPKURL;
    	}
    	if (!isset($this->sd_NewVersion)){
    		$emptyFields = false;
    		$fields[] = 'sd_NewVersion';
    	}else{
    		$emptyCondition = false; 
    		$condition['sd_NewVersion']=$this->sd_NewVersion;
    	}
    	if (!isset($this->sd_GameAddTime)){
    		$emptyFields = false;
    		$fields[] = 'sd_GameAddTime';
    	}else{
    		$emptyCondition = false; 
    		$condition['sd_GameAddTime']=$this->sd_GameAddTime;
    	}
    	if (!isset($this->sd_GameState)){
    		$emptyFields = false;
    		$fields[] = 'sd_GameState';
    	}else{
    		$emptyCondition = false; 
    		$condition['sd_GameState']=$this->sd_GameState;
    	}
    	if (!isset($this->sd_GameRemark)){
    		$emptyFields = false;
    		$fields[] = 'sd_GameRemark';
    	}else{
    		$emptyCondition = false; 
    		$condition['sd_GameRemark']=$this->sd_GameRemark;
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
				
		if (!isset($this->ga_GameID)) $this->ga_GameID = get_mysql_insert_id(self::$_db_name);

		
		$this->clean();
		
		return true;	
		
	}
	
	public function /*boolean*/ save(/*array*/$condition=NULL)
	{
		if (empty($condition))
		{
			$uc = "`ga_GameID`='{$this->ga_GameID}'";
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
		
		$sql = "DELETE FROM `SD_GameInfo` WHERE ".SQLUtil::parseCondition($condition);
		
		$qr = sql_query(self::$_db_name,$sql);
				
		return (boolean)$qr;
	}
	
	public function /*boolean*/ delete()
	{
		if (!$this->is_set_keys())
		{
			return false;
		}
		
		$sql = "DELETE FROM `SD_GameInfo` WHERE `ga_GameID`='{$this->ga_GameID}'";
		

		$qr = sql_query(self::$_db_name,$sql);
				
		return (boolean)$qr;
	}
	
	public function getInsertValue($fields)
	{
		$values = "(";		
		foreach($fields as $f => $k){
			if($f == 'ga_GameID'){
 				$values .= "'{$this->ga_GameID}',";
 			}else if($f == 'sd_GameName'){
 				$values .= "'{$this->sd_GameName}',";
 			}else if($f == 'sd_GameOtherName'){
 				$values .= "'{$this->sd_GameOtherName}',";
 			}else if($f == 'sd_GameRank'){
 				$values .= "'{$this->sd_GameRank}',";
 			}else if($f == 'sd_GameWebsite'){
 				$values .= "'{$this->sd_GameWebsite}',";
 			}else if($f == 'sd_GameIcon'){
 				$values .= "'{$this->sd_GameIcon}',";
 			}else if($f == 'sd_GameStars'){
 				$values .= "'{$this->sd_GameStars}',";
 			}else if($f == 'sd_DownloadNum'){
 				$values .= "'{$this->sd_DownloadNum}',";
 			}else if($f == 'sd_GameInfo'){
 				$values .= "'{$this->sd_GameInfo}',";
 			}else if($f == 'sd_GamePic'){
 				$values .= "'{$this->sd_GamePic}',";
 			}else if($f == 'sd_GamePackage'){
 				$values .= "'{$this->sd_GamePackage}',";
 			}else if($f == 'sd_SupportIOS'){
 				$values .= "'{$this->sd_SupportIOS}',";
 			}else if($f == 'sd_AppStoreURL'){
 				$values .= "'{$this->sd_AppStoreURL}',";
 			}else if($f == 'sd_SupportAndroid'){
 				$values .= "'{$this->sd_SupportAndroid}',";
 			}else if($f == 'sd_GooglePalyURL'){
 				$values .= "'{$this->sd_GooglePalyURL}',";
 			}else if($f == 'sd_GameAPK'){
 				$values .= "'{$this->sd_GameAPK}',";
 			}else if($f == 'sd_GameAPKURL'){
 				$values .= "'{$this->sd_GameAPKURL}',";
 			}else if($f == 'sd_NewVersion'){
 				$values .= "'{$this->sd_NewVersion}',";
 			}else if($f == 'sd_GameAddTime'){
 				$values .= "'{$this->sd_GameAddTime}',";
 			}else if($f == 'sd_GameState'){
 				$values .= "'{$this->sd_GameState}',";
 			}else if($f == 'sd_GameRemark'){
 				$values .= "'{$this->sd_GameRemark}',";
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

		if (isset($this->ga_GameID))
		{
			$fields .= "`ga_GameID`,";
			$values .= "'{$this->ga_GameID}',";
		}
		if (isset($this->sd_GameName))
		{
			$fields .= "`sd_GameName`,";
			$values .= "'{$this->sd_GameName}',";
		}
		if (isset($this->sd_GameOtherName))
		{
			$fields .= "`sd_GameOtherName`,";
			$values .= "'{$this->sd_GameOtherName}',";
		}
		if (isset($this->sd_GameRank))
		{
			$fields .= "`sd_GameRank`,";
			$values .= "'{$this->sd_GameRank}',";
		}
		if (isset($this->sd_GameWebsite))
		{
			$fields .= "`sd_GameWebsite`,";
			$values .= "'{$this->sd_GameWebsite}',";
		}
		if (isset($this->sd_GameIcon))
		{
			$fields .= "`sd_GameIcon`,";
			$values .= "'{$this->sd_GameIcon}',";
		}
		if (isset($this->sd_GameStars))
		{
			$fields .= "`sd_GameStars`,";
			$values .= "'{$this->sd_GameStars}',";
		}
		if (isset($this->sd_DownloadNum))
		{
			$fields .= "`sd_DownloadNum`,";
			$values .= "'{$this->sd_DownloadNum}',";
		}
		if (isset($this->sd_GameInfo))
		{
			$fields .= "`sd_GameInfo`,";
			$values .= "'{$this->sd_GameInfo}',";
		}
		if (isset($this->sd_GamePic))
		{
			$fields .= "`sd_GamePic`,";
			$values .= "'{$this->sd_GamePic}',";
		}
		if (isset($this->sd_GamePackage))
		{
			$fields .= "`sd_GamePackage`,";
			$values .= "'{$this->sd_GamePackage}',";
		}
		if (isset($this->sd_SupportIOS))
		{
			$fields .= "`sd_SupportIOS`,";
			$values .= "'{$this->sd_SupportIOS}',";
		}
		if (isset($this->sd_AppStoreURL))
		{
			$fields .= "`sd_AppStoreURL`,";
			$values .= "'{$this->sd_AppStoreURL}',";
		}
		if (isset($this->sd_SupportAndroid))
		{
			$fields .= "`sd_SupportAndroid`,";
			$values .= "'{$this->sd_SupportAndroid}',";
		}
		if (isset($this->sd_GooglePalyURL))
		{
			$fields .= "`sd_GooglePalyURL`,";
			$values .= "'{$this->sd_GooglePalyURL}',";
		}
		if (isset($this->sd_GameAPK))
		{
			$fields .= "`sd_GameAPK`,";
			$values .= "'{$this->sd_GameAPK}',";
		}
		if (isset($this->sd_GameAPKURL))
		{
			$fields .= "`sd_GameAPKURL`,";
			$values .= "'{$this->sd_GameAPKURL}',";
		}
		if (isset($this->sd_NewVersion))
		{
			$fields .= "`sd_NewVersion`,";
			$values .= "'{$this->sd_NewVersion}',";
		}
		if (isset($this->sd_GameAddTime))
		{
			$fields .= "`sd_GameAddTime`,";
			$values .= "'{$this->sd_GameAddTime}',";
		}
		if (isset($this->sd_GameState))
		{
			$fields .= "`sd_GameState`,";
			$values .= "'{$this->sd_GameState}',";
		}
		if (isset($this->sd_GameRemark))
		{
			$fields .= "`sd_GameRemark`,";
			$values .= "'{$this->sd_GameRemark}',";
		}

		
		$fields .= ")";
		$values .= ")";
		
		$sql = "INSERT INTO `SD_GameInfo` ".$fields.$values;
		
		return str_replace(",)",")",$sql);
	}
	
	private function /*string*/ getUpdateFields()
	{
		$update = "";
		
		if ($this->is_sd_GameName_dirty)
		{			
			if (!isset($this->sd_GameName))
			{
				$update .= ("`sd_GameName`=null,");
			}
			else
			{
				$update .= ("`sd_GameName`='{$this->sd_GameName}',");
			}
		}
		if ($this->is_sd_GameOtherName_dirty)
		{			
			if (!isset($this->sd_GameOtherName))
			{
				$update .= ("`sd_GameOtherName`=null,");
			}
			else
			{
				$update .= ("`sd_GameOtherName`='{$this->sd_GameOtherName}',");
			}
		}
		if ($this->is_sd_GameRank_dirty)
		{			
			if (!isset($this->sd_GameRank))
			{
				$update .= ("`sd_GameRank`=null,");
			}
			else
			{
				$update .= ("`sd_GameRank`='{$this->sd_GameRank}',");
			}
		}
		if ($this->is_sd_GameWebsite_dirty)
		{			
			if (!isset($this->sd_GameWebsite))
			{
				$update .= ("`sd_GameWebsite`=null,");
			}
			else
			{
				$update .= ("`sd_GameWebsite`='{$this->sd_GameWebsite}',");
			}
		}
		if ($this->is_sd_GameIcon_dirty)
		{			
			if (!isset($this->sd_GameIcon))
			{
				$update .= ("`sd_GameIcon`=null,");
			}
			else
			{
				$update .= ("`sd_GameIcon`='{$this->sd_GameIcon}',");
			}
		}
		if ($this->is_sd_GameStars_dirty)
		{			
			if (!isset($this->sd_GameStars))
			{
				$update .= ("`sd_GameStars`=null,");
			}
			else
			{
				$update .= ("`sd_GameStars`='{$this->sd_GameStars}',");
			}
		}
		if ($this->is_sd_DownloadNum_dirty)
		{			
			if (!isset($this->sd_DownloadNum))
			{
				$update .= ("`sd_DownloadNum`=null,");
			}
			else
			{
				$update .= ("`sd_DownloadNum`='{$this->sd_DownloadNum}',");
			}
		}
		if ($this->is_sd_GameInfo_dirty)
		{			
			if (!isset($this->sd_GameInfo))
			{
				$update .= ("`sd_GameInfo`=null,");
			}
			else
			{
				$update .= ("`sd_GameInfo`='{$this->sd_GameInfo}',");
			}
		}
		if ($this->is_sd_GamePic_dirty)
		{			
			if (!isset($this->sd_GamePic))
			{
				$update .= ("`sd_GamePic`=null,");
			}
			else
			{
				$update .= ("`sd_GamePic`='{$this->sd_GamePic}',");
			}
		}
		if ($this->is_sd_GamePackage_dirty)
		{			
			if (!isset($this->sd_GamePackage))
			{
				$update .= ("`sd_GamePackage`=null,");
			}
			else
			{
				$update .= ("`sd_GamePackage`='{$this->sd_GamePackage}',");
			}
		}
		if ($this->is_sd_SupportIOS_dirty)
		{			
			if (!isset($this->sd_SupportIOS))
			{
				$update .= ("`sd_SupportIOS`=null,");
			}
			else
			{
				$update .= ("`sd_SupportIOS`='{$this->sd_SupportIOS}',");
			}
		}
		if ($this->is_sd_AppStoreURL_dirty)
		{			
			if (!isset($this->sd_AppStoreURL))
			{
				$update .= ("`sd_AppStoreURL`=null,");
			}
			else
			{
				$update .= ("`sd_AppStoreURL`='{$this->sd_AppStoreURL}',");
			}
		}
		if ($this->is_sd_SupportAndroid_dirty)
		{			
			if (!isset($this->sd_SupportAndroid))
			{
				$update .= ("`sd_SupportAndroid`=null,");
			}
			else
			{
				$update .= ("`sd_SupportAndroid`='{$this->sd_SupportAndroid}',");
			}
		}
		if ($this->is_sd_GooglePalyURL_dirty)
		{			
			if (!isset($this->sd_GooglePalyURL))
			{
				$update .= ("`sd_GooglePalyURL`=null,");
			}
			else
			{
				$update .= ("`sd_GooglePalyURL`='{$this->sd_GooglePalyURL}',");
			}
		}
		if ($this->is_sd_GameAPK_dirty)
		{			
			if (!isset($this->sd_GameAPK))
			{
				$update .= ("`sd_GameAPK`=null,");
			}
			else
			{
				$update .= ("`sd_GameAPK`='{$this->sd_GameAPK}',");
			}
		}
		if ($this->is_sd_GameAPKURL_dirty)
		{			
			if (!isset($this->sd_GameAPKURL))
			{
				$update .= ("`sd_GameAPKURL`=null,");
			}
			else
			{
				$update .= ("`sd_GameAPKURL`='{$this->sd_GameAPKURL}',");
			}
		}
		if ($this->is_sd_NewVersion_dirty)
		{			
			if (!isset($this->sd_NewVersion))
			{
				$update .= ("`sd_NewVersion`=null,");
			}
			else
			{
				$update .= ("`sd_NewVersion`='{$this->sd_NewVersion}',");
			}
		}
		if ($this->is_sd_GameAddTime_dirty)
		{			
			if (!isset($this->sd_GameAddTime))
			{
				$update .= ("`sd_GameAddTime`=null,");
			}
			else
			{
				$update .= ("`sd_GameAddTime`='{$this->sd_GameAddTime}',");
			}
		}
		if ($this->is_sd_GameState_dirty)
		{			
			if (!isset($this->sd_GameState))
			{
				$update .= ("`sd_GameState`=null,");
			}
			else
			{
				$update .= ("`sd_GameState`='{$this->sd_GameState}',");
			}
		}
		if ($this->is_sd_GameRemark_dirty)
		{			
			if (!isset($this->sd_GameRemark))
			{
				$update .= ("`sd_GameRemark`=null,");
			}
			else
			{
				$update .= ("`sd_GameRemark`='{$this->sd_GameRemark}',");
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
		
		$sql = "UPDATE `SD_GameInfo` SET {$update} WHERE {$condition}";
		
		return $sql;
	}
	
	public function /*boolean*/ add($fieldsValue,$condition=NULL)
	{				
		if (empty($condition))
		{
			$uc = "`ga_GameID`='{$this->ga_GameID}'";
		}
		else
		{			
			$uc = SQLUtil::parseCondition($condition);
		}
		
		$update = SQLUtil::parseASFieldValues($fieldsValue);
		
		$sql = "UPDATE `SD_GameInfo` SET {$update} WHERE {$uc}";
		
		$qr = sql_query(self::$_db_name,$sql);
				
		return (boolean)$qr;
	}	
	
	public function /*boolean*/ sub($fieldsValue,$condition=NULL)
	{
		if (empty($condition))
		{
			$uc = "`ga_GameID`='{$this->ga_GameID}'";
		}
		else
		{			
			$uc = SQLUtil::parseCondition($condition);
		}
		
		$update = SQLUtil::parseASFieldValues($fieldsValue,false);
		
		$sql = "UPDATE `SD_GameInfo` SET {$update} WHERE {$uc}";
		
		$qr = sql_query(self::$_db_name,$sql);
				
		return (boolean)$qr;
	}
	
	/**
	 * 是否已经设置主键的值
	 */
	public function is_set_keys()
	{
		
		return (isset($this->ga_GameID));

	}
	
	private function /*void*/ clean() 
	{
		$this->is_this_table_dirty = false;
		$this->is_ga_GameID_dirty = false;
		$this->is_sd_GameName_dirty = false;
		$this->is_sd_GameOtherName_dirty = false;
		$this->is_sd_GameRank_dirty = false;
		$this->is_sd_GameWebsite_dirty = false;
		$this->is_sd_GameIcon_dirty = false;
		$this->is_sd_GameStars_dirty = false;
		$this->is_sd_DownloadNum_dirty = false;
		$this->is_sd_GameInfo_dirty = false;
		$this->is_sd_GamePic_dirty = false;
		$this->is_sd_GamePackage_dirty = false;
		$this->is_sd_SupportIOS_dirty = false;
		$this->is_sd_AppStoreURL_dirty = false;
		$this->is_sd_SupportAndroid_dirty = false;
		$this->is_sd_GooglePalyURL_dirty = false;
		$this->is_sd_GameAPK_dirty = false;
		$this->is_sd_GameAPKURL_dirty = false;
		$this->is_sd_NewVersion_dirty = false;
		$this->is_sd_GameAddTime_dirty = false;
		$this->is_sd_GameState_dirty = false;
		$this->is_sd_GameRemark_dirty = false;

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

	public function /*string*/ getSdGameName()
	{
		return $this->sd_GameName;
	}
	
	public function /*void*/ setSdGameName(/*string*/ $sd_GameName)
	{
		$this->sd_GameName = SQLUtil::toSafeSQLString($sd_GameName);
		$this->is_sd_GameName_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setSdGameNameNull()
	{
		$this->sd_GameName = null;
		$this->is_sd_GameName_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*string*/ getSdGameOtherName()
	{
		return $this->sd_GameOtherName;
	}
	
	public function /*void*/ setSdGameOtherName(/*string*/ $sd_GameOtherName)
	{
		$this->sd_GameOtherName = SQLUtil::toSafeSQLString($sd_GameOtherName);
		$this->is_sd_GameOtherName_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setSdGameOtherNameNull()
	{
		$this->sd_GameOtherName = null;
		$this->is_sd_GameOtherName_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*string*/ getSdGameRank()
	{
		return $this->sd_GameRank;
	}
	
	public function /*void*/ setSdGameRank(/*string*/ $sd_GameRank)
	{
		$this->sd_GameRank = SQLUtil::toSafeSQLString($sd_GameRank);
		$this->is_sd_GameRank_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setSdGameRankNull()
	{
		$this->sd_GameRank = null;
		$this->is_sd_GameRank_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*string*/ getSdGameWebsite()
	{
		return $this->sd_GameWebsite;
	}
	
	public function /*void*/ setSdGameWebsite(/*string*/ $sd_GameWebsite)
	{
		$this->sd_GameWebsite = SQLUtil::toSafeSQLString($sd_GameWebsite);
		$this->is_sd_GameWebsite_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setSdGameWebsiteNull()
	{
		$this->sd_GameWebsite = null;
		$this->is_sd_GameWebsite_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*string*/ getSdGameIcon()
	{
		return $this->sd_GameIcon;
	}
	
	public function /*void*/ setSdGameIcon(/*string*/ $sd_GameIcon)
	{
		$this->sd_GameIcon = SQLUtil::toSafeSQLString($sd_GameIcon);
		$this->is_sd_GameIcon_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setSdGameIconNull()
	{
		$this->sd_GameIcon = null;
		$this->is_sd_GameIcon_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*int*/ getSdGameStars()
	{
		return $this->sd_GameStars;
	}
	
	public function /*void*/ setSdGameStars(/*int*/ $sd_GameStars)
	{
		$this->sd_GameStars = intval($sd_GameStars);
		$this->is_sd_GameStars_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setSdGameStarsNull()
	{
		$this->sd_GameStars = null;
		$this->is_sd_GameStars_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*int*/ getSdDownloadNum()
	{
		return $this->sd_DownloadNum;
	}
	
	public function /*void*/ setSdDownloadNum(/*int*/ $sd_DownloadNum)
	{
		$this->sd_DownloadNum = intval($sd_DownloadNum);
		$this->is_sd_DownloadNum_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setSdDownloadNumNull()
	{
		$this->sd_DownloadNum = null;
		$this->is_sd_DownloadNum_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*string*/ getSdGameInfo()
	{
		return $this->sd_GameInfo;
	}
	
	public function /*void*/ setSdGameInfo(/*string*/ $sd_GameInfo)
	{
		$this->sd_GameInfo = SQLUtil::toSafeSQLString($sd_GameInfo);
		$this->is_sd_GameInfo_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setSdGameInfoNull()
	{
		$this->sd_GameInfo = null;
		$this->is_sd_GameInfo_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*string*/ getSdGamePic()
	{
		return $this->sd_GamePic;
	}
	
	public function /*void*/ setSdGamePic(/*string*/ $sd_GamePic)
	{
		$this->sd_GamePic = SQLUtil::toSafeSQLString($sd_GamePic);
		$this->is_sd_GamePic_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setSdGamePicNull()
	{
		$this->sd_GamePic = null;
		$this->is_sd_GamePic_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*string*/ getSdGamePackage()
	{
		return $this->sd_GamePackage;
	}
	
	public function /*void*/ setSdGamePackage(/*string*/ $sd_GamePackage)
	{
		$this->sd_GamePackage = SQLUtil::toSafeSQLString($sd_GamePackage);
		$this->is_sd_GamePackage_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setSdGamePackageNull()
	{
		$this->sd_GamePackage = null;
		$this->is_sd_GamePackage_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*int*/ getSdSupportIOS()
	{
		return $this->sd_SupportIOS;
	}
	
	public function /*void*/ setSdSupportIOS(/*int*/ $sd_SupportIOS)
	{
		$this->sd_SupportIOS = intval($sd_SupportIOS);
		$this->is_sd_SupportIOS_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setSdSupportIOSNull()
	{
		$this->sd_SupportIOS = null;
		$this->is_sd_SupportIOS_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*string*/ getSdAppStoreURL()
	{
		return $this->sd_AppStoreURL;
	}
	
	public function /*void*/ setSdAppStoreURL(/*string*/ $sd_AppStoreURL)
	{
		$this->sd_AppStoreURL = SQLUtil::toSafeSQLString($sd_AppStoreURL);
		$this->is_sd_AppStoreURL_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setSdAppStoreURLNull()
	{
		$this->sd_AppStoreURL = null;
		$this->is_sd_AppStoreURL_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*int*/ getSdSupportAndroid()
	{
		return $this->sd_SupportAndroid;
	}
	
	public function /*void*/ setSdSupportAndroid(/*int*/ $sd_SupportAndroid)
	{
		$this->sd_SupportAndroid = intval($sd_SupportAndroid);
		$this->is_sd_SupportAndroid_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setSdSupportAndroidNull()
	{
		$this->sd_SupportAndroid = null;
		$this->is_sd_SupportAndroid_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*string*/ getSdGooglePalyURL()
	{
		return $this->sd_GooglePalyURL;
	}
	
	public function /*void*/ setSdGooglePalyURL(/*string*/ $sd_GooglePalyURL)
	{
		$this->sd_GooglePalyURL = SQLUtil::toSafeSQLString($sd_GooglePalyURL);
		$this->is_sd_GooglePalyURL_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setSdGooglePalyURLNull()
	{
		$this->sd_GooglePalyURL = null;
		$this->is_sd_GooglePalyURL_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*string*/ getSdGameAPK()
	{
		return $this->sd_GameAPK;
	}
	
	public function /*void*/ setSdGameAPK(/*string*/ $sd_GameAPK)
	{
		$this->sd_GameAPK = SQLUtil::toSafeSQLString($sd_GameAPK);
		$this->is_sd_GameAPK_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setSdGameAPKNull()
	{
		$this->sd_GameAPK = null;
		$this->is_sd_GameAPK_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*string*/ getSdGameAPKURL()
	{
		return $this->sd_GameAPKURL;
	}
	
	public function /*void*/ setSdGameAPKURL(/*string*/ $sd_GameAPKURL)
	{
		$this->sd_GameAPKURL = SQLUtil::toSafeSQLString($sd_GameAPKURL);
		$this->is_sd_GameAPKURL_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setSdGameAPKURLNull()
	{
		$this->sd_GameAPKURL = null;
		$this->is_sd_GameAPKURL_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*string*/ getSdNewVersion()
	{
		return $this->sd_NewVersion;
	}
	
	public function /*void*/ setSdNewVersion(/*string*/ $sd_NewVersion)
	{
		$this->sd_NewVersion = SQLUtil::toSafeSQLString($sd_NewVersion);
		$this->is_sd_NewVersion_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setSdNewVersionNull()
	{
		$this->sd_NewVersion = null;
		$this->is_sd_NewVersion_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*string*/ getSdGameAddTime()
	{
		return $this->sd_GameAddTime;
	}
	
	public function /*void*/ setSdGameAddTime(/*string*/ $sd_GameAddTime)
	{
		$this->sd_GameAddTime = SQLUtil::toSafeSQLString($sd_GameAddTime);
		$this->is_sd_GameAddTime_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setSdGameAddTimeNull()
	{
		$this->sd_GameAddTime = null;
		$this->is_sd_GameAddTime_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*int*/ getSdGameState()
	{
		return $this->sd_GameState;
	}
	
	public function /*void*/ setSdGameState(/*int*/ $sd_GameState)
	{
		$this->sd_GameState = intval($sd_GameState);
		$this->is_sd_GameState_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setSdGameStateNull()
	{
		$this->sd_GameState = null;
		$this->is_sd_GameState_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*string*/ getSdGameRemark()
	{
		return $this->sd_GameRemark;
	}
	
	public function /*void*/ setSdGameRemark(/*string*/ $sd_GameRemark)
	{
		$this->sd_GameRemark = SQLUtil::toSafeSQLString($sd_GameRemark);
		$this->is_sd_GameRemark_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setSdGameRemarkNull()
	{
		$this->sd_GameRemark = null;
		$this->is_sd_GameRemark_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	
	public function /*string*/ toDebugString()
	{
		$dbg = "(";
		
		$dbg .= ("ga_GameID={$this->ga_GameID},");
		$dbg .= ("sd_GameName={$this->sd_GameName},");
		$dbg .= ("sd_GameOtherName={$this->sd_GameOtherName},");
		$dbg .= ("sd_GameRank={$this->sd_GameRank},");
		$dbg .= ("sd_GameWebsite={$this->sd_GameWebsite},");
		$dbg .= ("sd_GameIcon={$this->sd_GameIcon},");
		$dbg .= ("sd_GameStars={$this->sd_GameStars},");
		$dbg .= ("sd_DownloadNum={$this->sd_DownloadNum},");
		$dbg .= ("sd_GameInfo={$this->sd_GameInfo},");
		$dbg .= ("sd_GamePic={$this->sd_GamePic},");
		$dbg .= ("sd_GamePackage={$this->sd_GamePackage},");
		$dbg .= ("sd_SupportIOS={$this->sd_SupportIOS},");
		$dbg .= ("sd_AppStoreURL={$this->sd_AppStoreURL},");
		$dbg .= ("sd_SupportAndroid={$this->sd_SupportAndroid},");
		$dbg .= ("sd_GooglePalyURL={$this->sd_GooglePalyURL},");
		$dbg .= ("sd_GameAPK={$this->sd_GameAPK},");
		$dbg .= ("sd_GameAPKURL={$this->sd_GameAPKURL},");
		$dbg .= ("sd_NewVersion={$this->sd_NewVersion},");
		$dbg .= ("sd_GameAddTime={$this->sd_GameAddTime},");
		$dbg .= ("sd_GameState={$this->sd_GameState},");
		$dbg .= ("sd_GameRemark={$this->sd_GameRemark},");

		$dbg .= ")";
				
		return str_replace(",)",")",$dbg);
	}
	
	public function fromArray($arr)
	{
		if (isset($arr['ga_GameID'])) $this->setGaGameID($arr['ga_GameID']);
		if (isset($arr['sd_GameName'])) $this->setSdGameName($arr['sd_GameName']);
		if (isset($arr['sd_GameOtherName'])) $this->setSdGameOtherName($arr['sd_GameOtherName']);
		if (isset($arr['sd_GameRank'])) $this->setSdGameRank($arr['sd_GameRank']);
		if (isset($arr['sd_GameWebsite'])) $this->setSdGameWebsite($arr['sd_GameWebsite']);
		if (isset($arr['sd_GameIcon'])) $this->setSdGameIcon($arr['sd_GameIcon']);
		if (isset($arr['sd_GameStars'])) $this->setSdGameStars($arr['sd_GameStars']);
		if (isset($arr['sd_DownloadNum'])) $this->setSdDownloadNum($arr['sd_DownloadNum']);
		if (isset($arr['sd_GameInfo'])) $this->setSdGameInfo($arr['sd_GameInfo']);
		if (isset($arr['sd_GamePic'])) $this->setSdGamePic($arr['sd_GamePic']);
		if (isset($arr['sd_GamePackage'])) $this->setSdGamePackage($arr['sd_GamePackage']);
		if (isset($arr['sd_SupportIOS'])) $this->setSdSupportIOS($arr['sd_SupportIOS']);
		if (isset($arr['sd_AppStoreURL'])) $this->setSdAppStoreURL($arr['sd_AppStoreURL']);
		if (isset($arr['sd_SupportAndroid'])) $this->setSdSupportAndroid($arr['sd_SupportAndroid']);
		if (isset($arr['sd_GooglePalyURL'])) $this->setSdGooglePalyURL($arr['sd_GooglePalyURL']);
		if (isset($arr['sd_GameAPK'])) $this->setSdGameAPK($arr['sd_GameAPK']);
		if (isset($arr['sd_GameAPKURL'])) $this->setSdGameAPKURL($arr['sd_GameAPKURL']);
		if (isset($arr['sd_NewVersion'])) $this->setSdNewVersion($arr['sd_NewVersion']);
		if (isset($arr['sd_GameAddTime'])) $this->setSdGameAddTime($arr['sd_GameAddTime']);
		if (isset($arr['sd_GameState'])) $this->setSdGameState($arr['sd_GameState']);
		if (isset($arr['sd_GameRemark'])) $this->setSdGameRemark($arr['sd_GameRemark']);
		
	}
	
	public function toArray()
	{
		$ret = array();
		$ret['ga_GameID'] = $this->ga_GameID;
		$ret['sd_GameName'] = $this->sd_GameName;
		$ret['sd_GameOtherName'] = $this->sd_GameOtherName;
		$ret['sd_GameRank'] = $this->sd_GameRank;
		$ret['sd_GameWebsite'] = $this->sd_GameWebsite;
		$ret['sd_GameIcon'] = $this->sd_GameIcon;
		$ret['sd_GameStars'] = $this->sd_GameStars;
		$ret['sd_DownloadNum'] = $this->sd_DownloadNum;
		$ret['sd_GameInfo'] = $this->sd_GameInfo;
		$ret['sd_GamePic'] = $this->sd_GamePic;
		$ret['sd_GamePackage'] = $this->sd_GamePackage;
		$ret['sd_SupportIOS'] = $this->sd_SupportIOS;
		$ret['sd_AppStoreURL'] = $this->sd_AppStoreURL;
		$ret['sd_SupportAndroid'] = $this->sd_SupportAndroid;
		$ret['sd_GooglePalyURL'] = $this->sd_GooglePalyURL;
		$ret['sd_GameAPK'] = $this->sd_GameAPK;
		$ret['sd_GameAPKURL'] = $this->sd_GameAPKURL;
		$ret['sd_NewVersion'] = $this->sd_NewVersion;
		$ret['sd_GameAddTime'] = $this->sd_GameAddTime;
		$ret['sd_GameState'] = $this->sd_GameState;
		$ret['sd_GameRemark'] = $this->sd_GameRemark;

		return $ret;
	}
}

?>
