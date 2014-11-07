<?php
require_once (FRAMEWORK_PATH . "utils/MysqlDBHelper.php");
require_once (FRAMEWORK_PATH . "db/SQLUtil.php");
/**
 * database table GA_GameServer description
 * 
 * [This file was auto-generated. PLEASE DONT EDIT]
 * 
 * @author LiangZhixian
 * 
 */
class TbGAGameServer {
	
	public static $_db_name = "pf_gamearea";
	
	private /*int*/ $ga_GameID;
	private /*int*/ $ga_AreaID;
	private /*int*/ $ga_ServerID; //PRIMARY KEY 
	private /*int*/ $ga_ServerIndex;
	private /*string*/ $ga_ServerName;
	private /*int*/ $ga_ServerPRI;
	private /*string*/ $ga_ServerAdress;
	private /*int*/ $ga_ChargeRestrict; //0,允许充值             1,不允许
	private /*int*/ $ga_OnlineListRestrict; //0,允许显示             1,不允许
	private /*string*/ $ga_ServerCreateTime;
	private /*string*/ $ga_ServerOpenTime;
	private /*string*/ $ga_ServerCloseTime;
	private /*int*/ $ga_ServerRank; //0,服务器正常开启             50,服务器按时间开启                          70,维护                          99,关闭
	private /*int*/ $ga_ServerPop; //0,不推荐                          50,开始越小排得越前
	private /*int*/ $ga_ServerState; //0,准备             1,上限             99,删除             
	private /*string*/ $ga_ServerUpdateTime;
	private /*string*/ $ga_ServerRemark;

	
	private $is_this_table_dirty = false;
	private $is_ga_GameID_dirty = false;
	private $is_ga_AreaID_dirty = false;
	private $is_ga_ServerID_dirty = false;
	private $is_ga_ServerIndex_dirty = false;
	private $is_ga_ServerName_dirty = false;
	private $is_ga_ServerPRI_dirty = false;
	private $is_ga_ServerAdress_dirty = false;
	private $is_ga_ChargeRestrict_dirty = false;
	private $is_ga_OnlineListRestrict_dirty = false;
	private $is_ga_ServerCreateTime_dirty = false;
	private $is_ga_ServerOpenTime_dirty = false;
	private $is_ga_ServerCloseTime_dirty = false;
	private $is_ga_ServerRank_dirty = false;
	private $is_ga_ServerPop_dirty = false;
	private $is_ga_ServerState_dirty = false;
	private $is_ga_ServerUpdateTime_dirty = false;
	private $is_ga_ServerRemark_dirty = false;


	/**
	 * @param array($condition)
	 * @return array(TbGAGameServer)
	 */
	public static function /*array(TbGAGameServer)*/ loadTable(/*array*/ $fields=NULL,/*array*/$condition=NULL)
	{
		$result = array();
		
		$f = "*";
		
		if(!empty($fields))
		{
			$f = SQLUtil::parseFields($fields);			
		}
		
		if (empty($condition))
		{
			$sql = "SELECT {$f} FROM `GA_GameServer`";
		}
		else
		{			
			$sql = "SELECT {$f} FROM `GA_GameServer` WHERE ".SQLUtil::parseCondition($condition);
		}			
		
		$ar = sql_fetch_rows_assoc(self::$_db_name,$sql);
		
		if (empty($ar) || count($ar) == 0)
		{
			return $result;
		}
		
		foreach($ar as $row)
		{
			$tb = new TbGAGameServer();			
			if (isset($row['ga_GameID'])) $tb->ga_GameID = intval($row['ga_GameID']);
			if (isset($row['ga_AreaID'])) $tb->ga_AreaID = intval($row['ga_AreaID']);
			if (isset($row['ga_ServerID'])) $tb->ga_ServerID = intval($row['ga_ServerID']);
			if (isset($row['ga_ServerIndex'])) $tb->ga_ServerIndex = intval($row['ga_ServerIndex']);
			if (isset($row['ga_ServerName'])) $tb->ga_ServerName = $row['ga_ServerName'];
			if (isset($row['ga_ServerPRI'])) $tb->ga_ServerPRI = intval($row['ga_ServerPRI']);
			if (isset($row['ga_ServerAdress'])) $tb->ga_ServerAdress = $row['ga_ServerAdress'];
			if (isset($row['ga_ChargeRestrict'])) $tb->ga_ChargeRestrict = intval($row['ga_ChargeRestrict']);
			if (isset($row['ga_OnlineListRestrict'])) $tb->ga_OnlineListRestrict = intval($row['ga_OnlineListRestrict']);
			if (isset($row['ga_ServerCreateTime'])) $tb->ga_ServerCreateTime = $row['ga_ServerCreateTime'];
			if (isset($row['ga_ServerOpenTime'])) $tb->ga_ServerOpenTime = $row['ga_ServerOpenTime'];
			if (isset($row['ga_ServerCloseTime'])) $tb->ga_ServerCloseTime = $row['ga_ServerCloseTime'];
			if (isset($row['ga_ServerRank'])) $tb->ga_ServerRank = intval($row['ga_ServerRank']);
			if (isset($row['ga_ServerPop'])) $tb->ga_ServerPop = intval($row['ga_ServerPop']);
			if (isset($row['ga_ServerState'])) $tb->ga_ServerState = intval($row['ga_ServerState']);
			if (isset($row['ga_ServerUpdateTime'])) $tb->ga_ServerUpdateTime = $row['ga_ServerUpdateTime'];
			if (isset($row['ga_ServerRemark'])) $tb->ga_ServerRemark = $row['ga_ServerRemark'];
		
			$result[] = $tb;
		}
		
		return $result;
	}	
	
	public static function insertSqlHeader(/*array*/ $fields=NULL)
	{
		$result = array();				
		if(!empty($fields)){
			$f = SQLUtil::parseFields($fields);			
			$result[0] = "INSERT INTO `GA_GameServer` ({$f}) VALUES ";	
			$ar = array();
			foreach($fields as $key){
				$ar[$key]=1;
			}
			$result[1] = $ar;
		}else{
			$result[0]="INSERT INTO `GA_GameServer` (`ga_GameID`,`ga_AreaID`,`ga_ServerID`,`ga_ServerIndex`,`ga_ServerName`,`ga_ServerPRI`,`ga_ServerAdress`,`ga_ChargeRestrict`,`ga_OnlineListRestrict`,`ga_ServerCreateTime`,`ga_ServerOpenTime`,`ga_ServerCloseTime`,`ga_ServerRank`,`ga_ServerPop`,`ga_ServerState`,`ga_ServerUpdateTime`,`ga_ServerRemark`) VALUES ";
			$result[1] = array('ga_GameID'=>1,'ga_AreaID'=>1,'ga_ServerID'=>1,'ga_ServerIndex'=>1,'ga_ServerName'=>1,'ga_ServerPRI'=>1,'ga_ServerAdress'=>1,'ga_ChargeRestrict'=>1,'ga_OnlineListRestrict'=>1,'ga_ServerCreateTime'=>1,'ga_ServerOpenTime'=>1,'ga_ServerCloseTime'=>1,'ga_ServerRank'=>1,'ga_ServerPop'=>1,'ga_ServerState'=>1,'ga_ServerUpdateTime'=>1,'ga_ServerRemark'=>1);
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
		$c = "`ga_ServerID`='{$this->ga_ServerID}'";
		
		if(!empty($fields))
		{
			$f = SQLUtil::parseFields($fields);			
		}
	    if (!empty($condition))
		{
			$c =SQLUtil::parseCondition($condition);
		}
		
		$sql = "SELECT {$f} FROM `GA_GameServer` WHERE {$c} LIMIT 1";


		$ars = sql_fetch_rows_assoc(self::$_db_name,$sql);
		
		if (!$ars || count($ars)==0)
		{
			return false;
		}
		
		$ar = $ars[0];
		
		if (isset($ar['ga_GameID'])) $this->ga_GameID = intval($ar['ga_GameID']);
		if (isset($ar['ga_AreaID'])) $this->ga_AreaID = intval($ar['ga_AreaID']);
		if (isset($ar['ga_ServerID'])) $this->ga_ServerID = intval($ar['ga_ServerID']);
		if (isset($ar['ga_ServerIndex'])) $this->ga_ServerIndex = intval($ar['ga_ServerIndex']);
		if (isset($ar['ga_ServerName'])) $this->ga_ServerName = $ar['ga_ServerName'];
		if (isset($ar['ga_ServerPRI'])) $this->ga_ServerPRI = intval($ar['ga_ServerPRI']);
		if (isset($ar['ga_ServerAdress'])) $this->ga_ServerAdress = $ar['ga_ServerAdress'];
		if (isset($ar['ga_ChargeRestrict'])) $this->ga_ChargeRestrict = intval($ar['ga_ChargeRestrict']);
		if (isset($ar['ga_OnlineListRestrict'])) $this->ga_OnlineListRestrict = intval($ar['ga_OnlineListRestrict']);
		if (isset($ar['ga_ServerCreateTime'])) $this->ga_ServerCreateTime = $ar['ga_ServerCreateTime'];
		if (isset($ar['ga_ServerOpenTime'])) $this->ga_ServerOpenTime = $ar['ga_ServerOpenTime'];
		if (isset($ar['ga_ServerCloseTime'])) $this->ga_ServerCloseTime = $ar['ga_ServerCloseTime'];
		if (isset($ar['ga_ServerRank'])) $this->ga_ServerRank = intval($ar['ga_ServerRank']);
		if (isset($ar['ga_ServerPop'])) $this->ga_ServerPop = intval($ar['ga_ServerPop']);
		if (isset($ar['ga_ServerState'])) $this->ga_ServerState = intval($ar['ga_ServerState']);
		if (isset($ar['ga_ServerUpdateTime'])) $this->ga_ServerUpdateTime = $ar['ga_ServerUpdateTime'];
		if (isset($ar['ga_ServerRemark'])) $this->ga_ServerRemark = $ar['ga_ServerRemark'];
		
		
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
    	if (!isset($this->ga_ServerIndex)){
    		$emptyFields = false;
    		$fields[] = 'ga_ServerIndex';
    	}else{
    		$emptyCondition = false; 
    		$condition['ga_ServerIndex']=$this->ga_ServerIndex;
    	}
    	if (!isset($this->ga_ServerName)){
    		$emptyFields = false;
    		$fields[] = 'ga_ServerName';
    	}else{
    		$emptyCondition = false; 
    		$condition['ga_ServerName']=$this->ga_ServerName;
    	}
    	if (!isset($this->ga_ServerPRI)){
    		$emptyFields = false;
    		$fields[] = 'ga_ServerPRI';
    	}else{
    		$emptyCondition = false; 
    		$condition['ga_ServerPRI']=$this->ga_ServerPRI;
    	}
    	if (!isset($this->ga_ServerAdress)){
    		$emptyFields = false;
    		$fields[] = 'ga_ServerAdress';
    	}else{
    		$emptyCondition = false; 
    		$condition['ga_ServerAdress']=$this->ga_ServerAdress;
    	}
    	if (!isset($this->ga_ChargeRestrict)){
    		$emptyFields = false;
    		$fields[] = 'ga_ChargeRestrict';
    	}else{
    		$emptyCondition = false; 
    		$condition['ga_ChargeRestrict']=$this->ga_ChargeRestrict;
    	}
    	if (!isset($this->ga_OnlineListRestrict)){
    		$emptyFields = false;
    		$fields[] = 'ga_OnlineListRestrict';
    	}else{
    		$emptyCondition = false; 
    		$condition['ga_OnlineListRestrict']=$this->ga_OnlineListRestrict;
    	}
    	if (!isset($this->ga_ServerCreateTime)){
    		$emptyFields = false;
    		$fields[] = 'ga_ServerCreateTime';
    	}else{
    		$emptyCondition = false; 
    		$condition['ga_ServerCreateTime']=$this->ga_ServerCreateTime;
    	}
    	if (!isset($this->ga_ServerOpenTime)){
    		$emptyFields = false;
    		$fields[] = 'ga_ServerOpenTime';
    	}else{
    		$emptyCondition = false; 
    		$condition['ga_ServerOpenTime']=$this->ga_ServerOpenTime;
    	}
    	if (!isset($this->ga_ServerCloseTime)){
    		$emptyFields = false;
    		$fields[] = 'ga_ServerCloseTime';
    	}else{
    		$emptyCondition = false; 
    		$condition['ga_ServerCloseTime']=$this->ga_ServerCloseTime;
    	}
    	if (!isset($this->ga_ServerRank)){
    		$emptyFields = false;
    		$fields[] = 'ga_ServerRank';
    	}else{
    		$emptyCondition = false; 
    		$condition['ga_ServerRank']=$this->ga_ServerRank;
    	}
    	if (!isset($this->ga_ServerPop)){
    		$emptyFields = false;
    		$fields[] = 'ga_ServerPop';
    	}else{
    		$emptyCondition = false; 
    		$condition['ga_ServerPop']=$this->ga_ServerPop;
    	}
    	if (!isset($this->ga_ServerState)){
    		$emptyFields = false;
    		$fields[] = 'ga_ServerState';
    	}else{
    		$emptyCondition = false; 
    		$condition['ga_ServerState']=$this->ga_ServerState;
    	}
    	if (!isset($this->ga_ServerUpdateTime)){
    		$emptyFields = false;
    		$fields[] = 'ga_ServerUpdateTime';
    	}else{
    		$emptyCondition = false; 
    		$condition['ga_ServerUpdateTime']=$this->ga_ServerUpdateTime;
    	}
    	if (!isset($this->ga_ServerRemark)){
    		$emptyFields = false;
    		$fields[] = 'ga_ServerRemark';
    	}else{
    		$emptyCondition = false; 
    		$condition['ga_ServerRemark']=$this->ga_ServerRemark;
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
				

		
		$this->clean();
		
		return true;	
		
	}
	
	public function /*boolean*/ save(/*array*/$condition=NULL)
	{
		if (empty($condition))
		{
			$uc = "`ga_ServerID`='{$this->ga_ServerID}'";
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
		
		$sql = "DELETE FROM `GA_GameServer` WHERE ".SQLUtil::parseCondition($condition);
		
		$qr = sql_query(self::$_db_name,$sql);
				
		return (boolean)$qr;
	}
	
	public function /*boolean*/ delete()
	{
		if (!$this->is_set_keys())
		{
			return false;
		}
		
		$sql = "DELETE FROM `GA_GameServer` WHERE `ga_ServerID`='{$this->ga_ServerID}'";
		

		$qr = sql_query(self::$_db_name,$sql);
				
		return (boolean)$qr;
	}
	
	public function getInsertValue($fields)
	{
		$values = "(";		
		foreach($fields as $f => $k){
			if($f == 'ga_GameID'){
 				$values .= "'{$this->ga_GameID}',";
 			}else if($f == 'ga_AreaID'){
 				$values .= "'{$this->ga_AreaID}',";
 			}else if($f == 'ga_ServerID'){
 				$values .= "'{$this->ga_ServerID}',";
 			}else if($f == 'ga_ServerIndex'){
 				$values .= "'{$this->ga_ServerIndex}',";
 			}else if($f == 'ga_ServerName'){
 				$values .= "'{$this->ga_ServerName}',";
 			}else if($f == 'ga_ServerPRI'){
 				$values .= "'{$this->ga_ServerPRI}',";
 			}else if($f == 'ga_ServerAdress'){
 				$values .= "'{$this->ga_ServerAdress}',";
 			}else if($f == 'ga_ChargeRestrict'){
 				$values .= "'{$this->ga_ChargeRestrict}',";
 			}else if($f == 'ga_OnlineListRestrict'){
 				$values .= "'{$this->ga_OnlineListRestrict}',";
 			}else if($f == 'ga_ServerCreateTime'){
 				$values .= "'{$this->ga_ServerCreateTime}',";
 			}else if($f == 'ga_ServerOpenTime'){
 				$values .= "'{$this->ga_ServerOpenTime}',";
 			}else if($f == 'ga_ServerCloseTime'){
 				$values .= "'{$this->ga_ServerCloseTime}',";
 			}else if($f == 'ga_ServerRank'){
 				$values .= "'{$this->ga_ServerRank}',";
 			}else if($f == 'ga_ServerPop'){
 				$values .= "'{$this->ga_ServerPop}',";
 			}else if($f == 'ga_ServerState'){
 				$values .= "'{$this->ga_ServerState}',";
 			}else if($f == 'ga_ServerUpdateTime'){
 				$values .= "'{$this->ga_ServerUpdateTime}',";
 			}else if($f == 'ga_ServerRemark'){
 				$values .= "'{$this->ga_ServerRemark}',";
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
		if (isset($this->ga_ServerIndex))
		{
			$fields .= "`ga_ServerIndex`,";
			$values .= "'{$this->ga_ServerIndex}',";
		}
		if (isset($this->ga_ServerName))
		{
			$fields .= "`ga_ServerName`,";
			$values .= "'{$this->ga_ServerName}',";
		}
		if (isset($this->ga_ServerPRI))
		{
			$fields .= "`ga_ServerPRI`,";
			$values .= "'{$this->ga_ServerPRI}',";
		}
		if (isset($this->ga_ServerAdress))
		{
			$fields .= "`ga_ServerAdress`,";
			$values .= "'{$this->ga_ServerAdress}',";
		}
		if (isset($this->ga_ChargeRestrict))
		{
			$fields .= "`ga_ChargeRestrict`,";
			$values .= "'{$this->ga_ChargeRestrict}',";
		}
		if (isset($this->ga_OnlineListRestrict))
		{
			$fields .= "`ga_OnlineListRestrict`,";
			$values .= "'{$this->ga_OnlineListRestrict}',";
		}
		if (isset($this->ga_ServerCreateTime))
		{
			$fields .= "`ga_ServerCreateTime`,";
			$values .= "'{$this->ga_ServerCreateTime}',";
		}
		if (isset($this->ga_ServerOpenTime))
		{
			$fields .= "`ga_ServerOpenTime`,";
			$values .= "'{$this->ga_ServerOpenTime}',";
		}
		if (isset($this->ga_ServerCloseTime))
		{
			$fields .= "`ga_ServerCloseTime`,";
			$values .= "'{$this->ga_ServerCloseTime}',";
		}
		if (isset($this->ga_ServerRank))
		{
			$fields .= "`ga_ServerRank`,";
			$values .= "'{$this->ga_ServerRank}',";
		}
		if (isset($this->ga_ServerPop))
		{
			$fields .= "`ga_ServerPop`,";
			$values .= "'{$this->ga_ServerPop}',";
		}
		if (isset($this->ga_ServerState))
		{
			$fields .= "`ga_ServerState`,";
			$values .= "'{$this->ga_ServerState}',";
		}
		if (isset($this->ga_ServerUpdateTime))
		{
			$fields .= "`ga_ServerUpdateTime`,";
			$values .= "'{$this->ga_ServerUpdateTime}',";
		}
		if (isset($this->ga_ServerRemark))
		{
			$fields .= "`ga_ServerRemark`,";
			$values .= "'{$this->ga_ServerRemark}',";
		}

		
		$fields .= ")";
		$values .= ")";
		
		$sql = "INSERT INTO `GA_GameServer` ".$fields.$values;
		
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
		if ($this->is_ga_ServerIndex_dirty)
		{			
			if (!isset($this->ga_ServerIndex))
			{
				$update .= ("`ga_ServerIndex`=null,");
			}
			else
			{
				$update .= ("`ga_ServerIndex`='{$this->ga_ServerIndex}',");
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
		if ($this->is_ga_ServerPRI_dirty)
		{			
			if (!isset($this->ga_ServerPRI))
			{
				$update .= ("`ga_ServerPRI`=null,");
			}
			else
			{
				$update .= ("`ga_ServerPRI`='{$this->ga_ServerPRI}',");
			}
		}
		if ($this->is_ga_ServerAdress_dirty)
		{			
			if (!isset($this->ga_ServerAdress))
			{
				$update .= ("`ga_ServerAdress`=null,");
			}
			else
			{
				$update .= ("`ga_ServerAdress`='{$this->ga_ServerAdress}',");
			}
		}
		if ($this->is_ga_ChargeRestrict_dirty)
		{			
			if (!isset($this->ga_ChargeRestrict))
			{
				$update .= ("`ga_ChargeRestrict`=null,");
			}
			else
			{
				$update .= ("`ga_ChargeRestrict`='{$this->ga_ChargeRestrict}',");
			}
		}
		if ($this->is_ga_OnlineListRestrict_dirty)
		{			
			if (!isset($this->ga_OnlineListRestrict))
			{
				$update .= ("`ga_OnlineListRestrict`=null,");
			}
			else
			{
				$update .= ("`ga_OnlineListRestrict`='{$this->ga_OnlineListRestrict}',");
			}
		}
		if ($this->is_ga_ServerCreateTime_dirty)
		{			
			if (!isset($this->ga_ServerCreateTime))
			{
				$update .= ("`ga_ServerCreateTime`=null,");
			}
			else
			{
				$update .= ("`ga_ServerCreateTime`='{$this->ga_ServerCreateTime}',");
			}
		}
		if ($this->is_ga_ServerOpenTime_dirty)
		{			
			if (!isset($this->ga_ServerOpenTime))
			{
				$update .= ("`ga_ServerOpenTime`=null,");
			}
			else
			{
				$update .= ("`ga_ServerOpenTime`='{$this->ga_ServerOpenTime}',");
			}
		}
		if ($this->is_ga_ServerCloseTime_dirty)
		{			
			if (!isset($this->ga_ServerCloseTime))
			{
				$update .= ("`ga_ServerCloseTime`=null,");
			}
			else
			{
				$update .= ("`ga_ServerCloseTime`='{$this->ga_ServerCloseTime}',");
			}
		}
		if ($this->is_ga_ServerRank_dirty)
		{			
			if (!isset($this->ga_ServerRank))
			{
				$update .= ("`ga_ServerRank`=null,");
			}
			else
			{
				$update .= ("`ga_ServerRank`='{$this->ga_ServerRank}',");
			}
		}
		if ($this->is_ga_ServerPop_dirty)
		{			
			if (!isset($this->ga_ServerPop))
			{
				$update .= ("`ga_ServerPop`=null,");
			}
			else
			{
				$update .= ("`ga_ServerPop`='{$this->ga_ServerPop}',");
			}
		}
		if ($this->is_ga_ServerState_dirty)
		{			
			if (!isset($this->ga_ServerState))
			{
				$update .= ("`ga_ServerState`=null,");
			}
			else
			{
				$update .= ("`ga_ServerState`='{$this->ga_ServerState}',");
			}
		}
		if ($this->is_ga_ServerUpdateTime_dirty)
		{			
			if (!isset($this->ga_ServerUpdateTime))
			{
				$update .= ("`ga_ServerUpdateTime`=null,");
			}
			else
			{
				$update .= ("`ga_ServerUpdateTime`='{$this->ga_ServerUpdateTime}',");
			}
		}
		if ($this->is_ga_ServerRemark_dirty)
		{			
			if (!isset($this->ga_ServerRemark))
			{
				$update .= ("`ga_ServerRemark`=null,");
			}
			else
			{
				$update .= ("`ga_ServerRemark`='{$this->ga_ServerRemark}',");
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
		
		$sql = "UPDATE `GA_GameServer` SET {$update} WHERE {$condition}";
		
		return $sql;
	}
	
	public function /*boolean*/ add($fieldsValue,$condition=NULL)
	{				
		if (empty($condition))
		{
			$uc = "`ga_ServerID`='{$this->ga_ServerID}'";
		}
		else
		{			
			$uc = SQLUtil::parseCondition($condition);
		}
		
		$update = SQLUtil::parseASFieldValues($fieldsValue);
		
		$sql = "UPDATE `GA_GameServer` SET {$update} WHERE {$uc}";
		
		$qr = sql_query(self::$_db_name,$sql);
				
		return (boolean)$qr;
	}	
	
	public function /*boolean*/ sub($fieldsValue,$condition=NULL)
	{
		if (empty($condition))
		{
			$uc = "`ga_ServerID`='{$this->ga_ServerID}'";
		}
		else
		{			
			$uc = SQLUtil::parseCondition($condition);
		}
		
		$update = SQLUtil::parseASFieldValues($fieldsValue,false);
		
		$sql = "UPDATE `GA_GameServer` SET {$update} WHERE {$uc}";
		
		$qr = sql_query(self::$_db_name,$sql);
				
		return (boolean)$qr;
	}
	
	/**
	 * 是否已经设置主键的值
	 */
	public function is_set_keys()
	{
		
		return (isset($this->ga_ServerID));

	}
	
	private function /*void*/ clean() 
	{
		$this->is_this_table_dirty = false;
		$this->is_ga_GameID_dirty = false;
		$this->is_ga_AreaID_dirty = false;
		$this->is_ga_ServerID_dirty = false;
		$this->is_ga_ServerIndex_dirty = false;
		$this->is_ga_ServerName_dirty = false;
		$this->is_ga_ServerPRI_dirty = false;
		$this->is_ga_ServerAdress_dirty = false;
		$this->is_ga_ChargeRestrict_dirty = false;
		$this->is_ga_OnlineListRestrict_dirty = false;
		$this->is_ga_ServerCreateTime_dirty = false;
		$this->is_ga_ServerOpenTime_dirty = false;
		$this->is_ga_ServerCloseTime_dirty = false;
		$this->is_ga_ServerRank_dirty = false;
		$this->is_ga_ServerPop_dirty = false;
		$this->is_ga_ServerState_dirty = false;
		$this->is_ga_ServerUpdateTime_dirty = false;
		$this->is_ga_ServerRemark_dirty = false;

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

	public function /*int*/ getGaServerIndex()
	{
		return $this->ga_ServerIndex;
	}
	
	public function /*void*/ setGaServerIndex(/*int*/ $ga_ServerIndex)
	{
		$this->ga_ServerIndex = intval($ga_ServerIndex);
		$this->is_ga_ServerIndex_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setGaServerIndexNull()
	{
		$this->ga_ServerIndex = null;
		$this->is_ga_ServerIndex_dirty = true;		
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

	public function /*int*/ getGaServerPRI()
	{
		return $this->ga_ServerPRI;
	}
	
	public function /*void*/ setGaServerPRI(/*int*/ $ga_ServerPRI)
	{
		$this->ga_ServerPRI = intval($ga_ServerPRI);
		$this->is_ga_ServerPRI_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setGaServerPRINull()
	{
		$this->ga_ServerPRI = null;
		$this->is_ga_ServerPRI_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*string*/ getGaServerAdress()
	{
		return $this->ga_ServerAdress;
	}
	
	public function /*void*/ setGaServerAdress(/*string*/ $ga_ServerAdress)
	{
		$this->ga_ServerAdress = SQLUtil::toSafeSQLString($ga_ServerAdress);
		$this->is_ga_ServerAdress_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setGaServerAdressNull()
	{
		$this->ga_ServerAdress = null;
		$this->is_ga_ServerAdress_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*int*/ getGaChargeRestrict()
	{
		return $this->ga_ChargeRestrict;
	}
	
	public function /*void*/ setGaChargeRestrict(/*int*/ $ga_ChargeRestrict)
	{
		$this->ga_ChargeRestrict = intval($ga_ChargeRestrict);
		$this->is_ga_ChargeRestrict_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setGaChargeRestrictNull()
	{
		$this->ga_ChargeRestrict = null;
		$this->is_ga_ChargeRestrict_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*int*/ getGaOnlineListRestrict()
	{
		return $this->ga_OnlineListRestrict;
	}
	
	public function /*void*/ setGaOnlineListRestrict(/*int*/ $ga_OnlineListRestrict)
	{
		$this->ga_OnlineListRestrict = intval($ga_OnlineListRestrict);
		$this->is_ga_OnlineListRestrict_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setGaOnlineListRestrictNull()
	{
		$this->ga_OnlineListRestrict = null;
		$this->is_ga_OnlineListRestrict_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*string*/ getGaServerCreateTime()
	{
		return $this->ga_ServerCreateTime;
	}
	
	public function /*void*/ setGaServerCreateTime(/*string*/ $ga_ServerCreateTime)
	{
		$this->ga_ServerCreateTime = SQLUtil::toSafeSQLString($ga_ServerCreateTime);
		$this->is_ga_ServerCreateTime_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setGaServerCreateTimeNull()
	{
		$this->ga_ServerCreateTime = null;
		$this->is_ga_ServerCreateTime_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*string*/ getGaServerOpenTime()
	{
		return $this->ga_ServerOpenTime;
	}
	
	public function /*void*/ setGaServerOpenTime(/*string*/ $ga_ServerOpenTime)
	{
		$this->ga_ServerOpenTime = SQLUtil::toSafeSQLString($ga_ServerOpenTime);
		$this->is_ga_ServerOpenTime_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setGaServerOpenTimeNull()
	{
		$this->ga_ServerOpenTime = null;
		$this->is_ga_ServerOpenTime_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*string*/ getGaServerCloseTime()
	{
		return $this->ga_ServerCloseTime;
	}
	
	public function /*void*/ setGaServerCloseTime(/*string*/ $ga_ServerCloseTime)
	{
		$this->ga_ServerCloseTime = SQLUtil::toSafeSQLString($ga_ServerCloseTime);
		$this->is_ga_ServerCloseTime_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setGaServerCloseTimeNull()
	{
		$this->ga_ServerCloseTime = null;
		$this->is_ga_ServerCloseTime_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*int*/ getGaServerRank()
	{
		return $this->ga_ServerRank;
	}
	
	public function /*void*/ setGaServerRank(/*int*/ $ga_ServerRank)
	{
		$this->ga_ServerRank = intval($ga_ServerRank);
		$this->is_ga_ServerRank_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setGaServerRankNull()
	{
		$this->ga_ServerRank = null;
		$this->is_ga_ServerRank_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*int*/ getGaServerPop()
	{
		return $this->ga_ServerPop;
	}
	
	public function /*void*/ setGaServerPop(/*int*/ $ga_ServerPop)
	{
		$this->ga_ServerPop = intval($ga_ServerPop);
		$this->is_ga_ServerPop_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setGaServerPopNull()
	{
		$this->ga_ServerPop = null;
		$this->is_ga_ServerPop_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*int*/ getGaServerState()
	{
		return $this->ga_ServerState;
	}
	
	public function /*void*/ setGaServerState(/*int*/ $ga_ServerState)
	{
		$this->ga_ServerState = intval($ga_ServerState);
		$this->is_ga_ServerState_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setGaServerStateNull()
	{
		$this->ga_ServerState = null;
		$this->is_ga_ServerState_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*string*/ getGaServerUpdateTime()
	{
		return $this->ga_ServerUpdateTime;
	}
	
	public function /*void*/ setGaServerUpdateTime(/*string*/ $ga_ServerUpdateTime)
	{
		$this->ga_ServerUpdateTime = SQLUtil::toSafeSQLString($ga_ServerUpdateTime);
		$this->is_ga_ServerUpdateTime_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setGaServerUpdateTimeNull()
	{
		$this->ga_ServerUpdateTime = null;
		$this->is_ga_ServerUpdateTime_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*string*/ getGaServerRemark()
	{
		return $this->ga_ServerRemark;
	}
	
	public function /*void*/ setGaServerRemark(/*string*/ $ga_ServerRemark)
	{
		$this->ga_ServerRemark = SQLUtil::toSafeSQLString($ga_ServerRemark);
		$this->is_ga_ServerRemark_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setGaServerRemarkNull()
	{
		$this->ga_ServerRemark = null;
		$this->is_ga_ServerRemark_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	
	public function /*string*/ toDebugString()
	{
		$dbg = "(";
		
		$dbg .= ("ga_GameID={$this->ga_GameID},");
		$dbg .= ("ga_AreaID={$this->ga_AreaID},");
		$dbg .= ("ga_ServerID={$this->ga_ServerID},");
		$dbg .= ("ga_ServerIndex={$this->ga_ServerIndex},");
		$dbg .= ("ga_ServerName={$this->ga_ServerName},");
		$dbg .= ("ga_ServerPRI={$this->ga_ServerPRI},");
		$dbg .= ("ga_ServerAdress={$this->ga_ServerAdress},");
		$dbg .= ("ga_ChargeRestrict={$this->ga_ChargeRestrict},");
		$dbg .= ("ga_OnlineListRestrict={$this->ga_OnlineListRestrict},");
		$dbg .= ("ga_ServerCreateTime={$this->ga_ServerCreateTime},");
		$dbg .= ("ga_ServerOpenTime={$this->ga_ServerOpenTime},");
		$dbg .= ("ga_ServerCloseTime={$this->ga_ServerCloseTime},");
		$dbg .= ("ga_ServerRank={$this->ga_ServerRank},");
		$dbg .= ("ga_ServerPop={$this->ga_ServerPop},");
		$dbg .= ("ga_ServerState={$this->ga_ServerState},");
		$dbg .= ("ga_ServerUpdateTime={$this->ga_ServerUpdateTime},");
		$dbg .= ("ga_ServerRemark={$this->ga_ServerRemark},");

		$dbg .= ")";
				
		return str_replace(",)",")",$dbg);
	}
	
	public function fromArray($arr)
	{
		if (isset($arr['ga_GameID'])) $this->setGaGameID($arr['ga_GameID']);
		if (isset($arr['ga_AreaID'])) $this->setGaAreaID($arr['ga_AreaID']);
		if (isset($arr['ga_ServerID'])) $this->setGaServerID($arr['ga_ServerID']);
		if (isset($arr['ga_ServerIndex'])) $this->setGaServerIndex($arr['ga_ServerIndex']);
		if (isset($arr['ga_ServerName'])) $this->setGaServerName($arr['ga_ServerName']);
		if (isset($arr['ga_ServerPRI'])) $this->setGaServerPRI($arr['ga_ServerPRI']);
		if (isset($arr['ga_ServerAdress'])) $this->setGaServerAdress($arr['ga_ServerAdress']);
		if (isset($arr['ga_ChargeRestrict'])) $this->setGaChargeRestrict($arr['ga_ChargeRestrict']);
		if (isset($arr['ga_OnlineListRestrict'])) $this->setGaOnlineListRestrict($arr['ga_OnlineListRestrict']);
		if (isset($arr['ga_ServerCreateTime'])) $this->setGaServerCreateTime($arr['ga_ServerCreateTime']);
		if (isset($arr['ga_ServerOpenTime'])) $this->setGaServerOpenTime($arr['ga_ServerOpenTime']);
		if (isset($arr['ga_ServerCloseTime'])) $this->setGaServerCloseTime($arr['ga_ServerCloseTime']);
		if (isset($arr['ga_ServerRank'])) $this->setGaServerRank($arr['ga_ServerRank']);
		if (isset($arr['ga_ServerPop'])) $this->setGaServerPop($arr['ga_ServerPop']);
		if (isset($arr['ga_ServerState'])) $this->setGaServerState($arr['ga_ServerState']);
		if (isset($arr['ga_ServerUpdateTime'])) $this->setGaServerUpdateTime($arr['ga_ServerUpdateTime']);
		if (isset($arr['ga_ServerRemark'])) $this->setGaServerRemark($arr['ga_ServerRemark']);
		
	}
	
	public function toArray()
	{
		$ret = array();
		$ret['ga_GameID'] = $this->ga_GameID;
		$ret['ga_AreaID'] = $this->ga_AreaID;
		$ret['ga_ServerID'] = $this->ga_ServerID;
		$ret['ga_ServerIndex'] = $this->ga_ServerIndex;
		$ret['ga_ServerName'] = $this->ga_ServerName;
		$ret['ga_ServerPRI'] = $this->ga_ServerPRI;
		$ret['ga_ServerAdress'] = $this->ga_ServerAdress;
		$ret['ga_ChargeRestrict'] = $this->ga_ChargeRestrict;
		$ret['ga_OnlineListRestrict'] = $this->ga_OnlineListRestrict;
		$ret['ga_ServerCreateTime'] = $this->ga_ServerCreateTime;
		$ret['ga_ServerOpenTime'] = $this->ga_ServerOpenTime;
		$ret['ga_ServerCloseTime'] = $this->ga_ServerCloseTime;
		$ret['ga_ServerRank'] = $this->ga_ServerRank;
		$ret['ga_ServerPop'] = $this->ga_ServerPop;
		$ret['ga_ServerState'] = $this->ga_ServerState;
		$ret['ga_ServerUpdateTime'] = $this->ga_ServerUpdateTime;
		$ret['ga_ServerRemark'] = $this->ga_ServerRemark;

		return $ret;
	}
}

?>
