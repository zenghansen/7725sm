<?php
require_once (FRAMEWORK_PATH . "utils/MysqlDBHelper.php");
require_once (FRAMEWORK_PATH . "db/SQLUtil.php");
/**
 * database table PT_OpenUIDAccount description
 * 
 * [This file was auto-generated. PLEASE DONT EDIT]
 * 
 * @author LiangZhixian
 * 
 */
class TbPTOpenUIDAccount {
	
	public static $_db_name = "pf_passport";
	
	private /*string*/ $pt_OpenUID; //PRIMARY KEY 
	private /*string*/ $pt_OpenAccount;
	private /*string*/ $pt_AccountSource; //目前只有facebook
	private /*string*/ $pt_AccountKey; //0,没绑定             >0,绑定
	private /*string*/ $pt_RegisteTime;
	private /*string*/ $pt_RegisteIP;
	private /*int*/ $pt_AccountState; //0，正常　             9，封停　             99，封停　             
	private /*string*/ $pt_LastLoginTime;
	private /*string*/ $pt_LastLoginIP;
	private /*string*/ $pt_OpenIdInfo; //OPENID登录后返回的用户公开信息，每个渠道返回的信息不同，参数的名字和个数都不同

	
	private $is_this_table_dirty = false;
	private $is_pt_OpenUID_dirty = false;
	private $is_pt_OpenAccount_dirty = false;
	private $is_pt_AccountSource_dirty = false;
	private $is_pt_AccountKey_dirty = false;
	private $is_pt_RegisteTime_dirty = false;
	private $is_pt_RegisteIP_dirty = false;
	private $is_pt_AccountState_dirty = false;
	private $is_pt_LastLoginTime_dirty = false;
	private $is_pt_LastLoginIP_dirty = false;
	private $is_pt_OpenIdInfo_dirty = false;


	/**
	 * @param array($condition)
	 * @return array(TbPTOpenUIDAccount)
	 */
	public static function /*array(TbPTOpenUIDAccount)*/ loadTable(/*array*/ $fields=NULL,/*array*/$condition=NULL)
	{
		$result = array();
		
		$f = "*";
		
		if(!empty($fields))
		{
			$f = SQLUtil::parseFields($fields);			
		}
		
		if (empty($condition))
		{
			$sql = "SELECT {$f} FROM `PT_OpenUIDAccount`";
		}
		else
		{			
			$sql = "SELECT {$f} FROM `PT_OpenUIDAccount` WHERE ".SQLUtil::parseCondition($condition);
		}			
		
		$ar = sql_fetch_rows_assoc(self::$_db_name,$sql);
		
		if (empty($ar) || count($ar) == 0)
		{
			return $result;
		}
		
		foreach($ar as $row)
		{
			$tb = new TbPTOpenUIDAccount();			
			if (isset($row['pt_OpenUID'])) $tb->pt_OpenUID = $row['pt_OpenUID'];
			if (isset($row['pt_OpenAccount'])) $tb->pt_OpenAccount = $row['pt_OpenAccount'];
			if (isset($row['pt_AccountSource'])) $tb->pt_AccountSource = $row['pt_AccountSource'];
			if (isset($row['pt_AccountKey'])) $tb->pt_AccountKey = $row['pt_AccountKey'];
			if (isset($row['pt_RegisteTime'])) $tb->pt_RegisteTime = $row['pt_RegisteTime'];
			if (isset($row['pt_RegisteIP'])) $tb->pt_RegisteIP = $row['pt_RegisteIP'];
			if (isset($row['pt_AccountState'])) $tb->pt_AccountState = intval($row['pt_AccountState']);
			if (isset($row['pt_LastLoginTime'])) $tb->pt_LastLoginTime = $row['pt_LastLoginTime'];
			if (isset($row['pt_LastLoginIP'])) $tb->pt_LastLoginIP = $row['pt_LastLoginIP'];
			if (isset($row['pt_OpenIdInfo'])) $tb->pt_OpenIdInfo = $row['pt_OpenIdInfo'];
		
			$result[] = $tb;
		}
		
		return $result;
	}	
	
	public static function insertSqlHeader(/*array*/ $fields=NULL)
	{
		$result = array();				
		if(!empty($fields)){
			$f = SQLUtil::parseFields($fields);			
			$result[0] = "INSERT INTO `PT_OpenUIDAccount` ({$f}) VALUES ";	
			$ar = array();
			foreach($fields as $key){
				$ar[$key]=1;
			}
			$result[1] = $ar;
		}else{
			$result[0]="INSERT INTO `PT_OpenUIDAccount` (`pt_OpenUID`,`pt_OpenAccount`,`pt_AccountSource`,`pt_AccountKey`,`pt_RegisteTime`,`pt_RegisteIP`,`pt_AccountState`,`pt_LastLoginTime`,`pt_LastLoginIP`,`pt_OpenIdInfo`) VALUES ";
			$result[1] = array('pt_OpenUID'=>1,'pt_OpenAccount'=>1,'pt_AccountSource'=>1,'pt_AccountKey'=>1,'pt_RegisteTime'=>1,'pt_RegisteIP'=>1,'pt_AccountState'=>1,'pt_LastLoginTime'=>1,'pt_LastLoginIP'=>1,'pt_OpenIdInfo'=>1);
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
		$c = "`pt_OpenUID`='{$this->pt_OpenUID}'";
		
		if(!empty($fields))
		{
			$f = SQLUtil::parseFields($fields);			
		}
	    if (!empty($condition))
		{
			$c =SQLUtil::parseCondition($condition);
		}
		
		$sql = "SELECT {$f} FROM `PT_OpenUIDAccount` WHERE {$c} LIMIT 1";


		$ars = sql_fetch_rows_assoc(self::$_db_name,$sql);
		
		if (!$ars || count($ars)==0)
		{
			return false;
		}
		
		$ar = $ars[0];
		
		if (isset($ar['pt_OpenUID'])) $this->pt_OpenUID = $ar['pt_OpenUID'];
		if (isset($ar['pt_OpenAccount'])) $this->pt_OpenAccount = $ar['pt_OpenAccount'];
		if (isset($ar['pt_AccountSource'])) $this->pt_AccountSource = $ar['pt_AccountSource'];
		if (isset($ar['pt_AccountKey'])) $this->pt_AccountKey = $ar['pt_AccountKey'];
		if (isset($ar['pt_RegisteTime'])) $this->pt_RegisteTime = $ar['pt_RegisteTime'];
		if (isset($ar['pt_RegisteIP'])) $this->pt_RegisteIP = $ar['pt_RegisteIP'];
		if (isset($ar['pt_AccountState'])) $this->pt_AccountState = intval($ar['pt_AccountState']);
		if (isset($ar['pt_LastLoginTime'])) $this->pt_LastLoginTime = $ar['pt_LastLoginTime'];
		if (isset($ar['pt_LastLoginIP'])) $this->pt_LastLoginIP = $ar['pt_LastLoginIP'];
		if (isset($ar['pt_OpenIdInfo'])) $this->pt_OpenIdInfo = $ar['pt_OpenIdInfo'];
		
		
		$this->clean();
		
		return true;
	}
	
	public function /*boolean*/ loadFromExistFields()
	{
		$emptyCondition = true;
    	$emptyFields = true;
    	
    	$fields = array();
    	$condition = array();
    	
    	if (!isset($this->pt_OpenUID)){
    		$emptyFields = false;
    		$fields[] = 'pt_OpenUID';
    	}else{
    		$emptyCondition = false; 
    		$condition['pt_OpenUID']=$this->pt_OpenUID;
    	}
    	if (!isset($this->pt_OpenAccount)){
    		$emptyFields = false;
    		$fields[] = 'pt_OpenAccount';
    	}else{
    		$emptyCondition = false; 
    		$condition['pt_OpenAccount']=$this->pt_OpenAccount;
    	}
    	if (!isset($this->pt_AccountSource)){
    		$emptyFields = false;
    		$fields[] = 'pt_AccountSource';
    	}else{
    		$emptyCondition = false; 
    		$condition['pt_AccountSource']=$this->pt_AccountSource;
    	}
    	if (!isset($this->pt_AccountKey)){
    		$emptyFields = false;
    		$fields[] = 'pt_AccountKey';
    	}else{
    		$emptyCondition = false; 
    		$condition['pt_AccountKey']=$this->pt_AccountKey;
    	}
    	if (!isset($this->pt_RegisteTime)){
    		$emptyFields = false;
    		$fields[] = 'pt_RegisteTime';
    	}else{
    		$emptyCondition = false; 
    		$condition['pt_RegisteTime']=$this->pt_RegisteTime;
    	}
    	if (!isset($this->pt_RegisteIP)){
    		$emptyFields = false;
    		$fields[] = 'pt_RegisteIP';
    	}else{
    		$emptyCondition = false; 
    		$condition['pt_RegisteIP']=$this->pt_RegisteIP;
    	}
    	if (!isset($this->pt_AccountState)){
    		$emptyFields = false;
    		$fields[] = 'pt_AccountState';
    	}else{
    		$emptyCondition = false; 
    		$condition['pt_AccountState']=$this->pt_AccountState;
    	}
    	if (!isset($this->pt_LastLoginTime)){
    		$emptyFields = false;
    		$fields[] = 'pt_LastLoginTime';
    	}else{
    		$emptyCondition = false; 
    		$condition['pt_LastLoginTime']=$this->pt_LastLoginTime;
    	}
    	if (!isset($this->pt_LastLoginIP)){
    		$emptyFields = false;
    		$fields[] = 'pt_LastLoginIP';
    	}else{
    		$emptyCondition = false; 
    		$condition['pt_LastLoginIP']=$this->pt_LastLoginIP;
    	}
    	if (!isset($this->pt_OpenIdInfo)){
    		$emptyFields = false;
    		$fields[] = 'pt_OpenIdInfo';
    	}else{
    		$emptyCondition = false; 
    		$condition['pt_OpenIdInfo']=$this->pt_OpenIdInfo;
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
				
		if (!isset($this->pt_OpenUID)) $this->pt_OpenUID = get_mysql_insert_id(self::$_db_name);

		
		$this->clean();
		
		return true;	
		
	}
	
	public function /*boolean*/ save(/*array*/$condition=NULL)
	{
		if (empty($condition))
		{
			$uc = "`pt_OpenUID`='{$this->pt_OpenUID}'";
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
		
		$sql = "DELETE FROM `PT_OpenUIDAccount` WHERE ".SQLUtil::parseCondition($condition);
		
		$qr = sql_query(self::$_db_name,$sql);
				
		return (boolean)$qr;
	}
	
	public function /*boolean*/ delete()
	{
		if (!$this->is_set_keys())
		{
			return false;
		}
		
		$sql = "DELETE FROM `PT_OpenUIDAccount` WHERE `pt_OpenUID`='{$this->pt_OpenUID}'";
		

		$qr = sql_query(self::$_db_name,$sql);
				
		return (boolean)$qr;
	}
	
	public function getInsertValue($fields)
	{
		$values = "(";		
		foreach($fields as $f => $k){
			if($f == 'pt_OpenUID'){
 				$values .= "'{$this->pt_OpenUID}',";
 			}else if($f == 'pt_OpenAccount'){
 				$values .= "'{$this->pt_OpenAccount}',";
 			}else if($f == 'pt_AccountSource'){
 				$values .= "'{$this->pt_AccountSource}',";
 			}else if($f == 'pt_AccountKey'){
 				$values .= "'{$this->pt_AccountKey}',";
 			}else if($f == 'pt_RegisteTime'){
 				$values .= "'{$this->pt_RegisteTime}',";
 			}else if($f == 'pt_RegisteIP'){
 				$values .= "'{$this->pt_RegisteIP}',";
 			}else if($f == 'pt_AccountState'){
 				$values .= "'{$this->pt_AccountState}',";
 			}else if($f == 'pt_LastLoginTime'){
 				$values .= "'{$this->pt_LastLoginTime}',";
 			}else if($f == 'pt_LastLoginIP'){
 				$values .= "'{$this->pt_LastLoginIP}',";
 			}else if($f == 'pt_OpenIdInfo'){
 				$values .= "'{$this->pt_OpenIdInfo}',";
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

		if (isset($this->pt_OpenUID))
		{
			$fields .= "`pt_OpenUID`,";
			$values .= "'{$this->pt_OpenUID}',";
		}
		if (isset($this->pt_OpenAccount))
		{
			$fields .= "`pt_OpenAccount`,";
			$values .= "'{$this->pt_OpenAccount}',";
		}
		if (isset($this->pt_AccountSource))
		{
			$fields .= "`pt_AccountSource`,";
			$values .= "'{$this->pt_AccountSource}',";
		}
		if (isset($this->pt_AccountKey))
		{
			$fields .= "`pt_AccountKey`,";
			$values .= "'{$this->pt_AccountKey}',";
		}
		if (isset($this->pt_RegisteTime))
		{
			$fields .= "`pt_RegisteTime`,";
			$values .= "'{$this->pt_RegisteTime}',";
		}
		if (isset($this->pt_RegisteIP))
		{
			$fields .= "`pt_RegisteIP`,";
			$values .= "'{$this->pt_RegisteIP}',";
		}
		if (isset($this->pt_AccountState))
		{
			$fields .= "`pt_AccountState`,";
			$values .= "'{$this->pt_AccountState}',";
		}
		if (isset($this->pt_LastLoginTime))
		{
			$fields .= "`pt_LastLoginTime`,";
			$values .= "'{$this->pt_LastLoginTime}',";
		}
		if (isset($this->pt_LastLoginIP))
		{
			$fields .= "`pt_LastLoginIP`,";
			$values .= "'{$this->pt_LastLoginIP}',";
		}
		if (isset($this->pt_OpenIdInfo))
		{
			$fields .= "`pt_OpenIdInfo`,";
			$values .= "'{$this->pt_OpenIdInfo}',";
		}

		
		$fields .= ")";
		$values .= ")";
		
		$sql = "INSERT INTO `PT_OpenUIDAccount` ".$fields.$values;
		
		return str_replace(",)",")",$sql);
	}
	
	private function /*string*/ getUpdateFields()
	{
		$update = "";
		
		if ($this->is_pt_OpenAccount_dirty)
		{			
			if (!isset($this->pt_OpenAccount))
			{
				$update .= ("`pt_OpenAccount`=null,");
			}
			else
			{
				$update .= ("`pt_OpenAccount`='{$this->pt_OpenAccount}',");
			}
		}
		if ($this->is_pt_AccountSource_dirty)
		{			
			if (!isset($this->pt_AccountSource))
			{
				$update .= ("`pt_AccountSource`=null,");
			}
			else
			{
				$update .= ("`pt_AccountSource`='{$this->pt_AccountSource}',");
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
		if ($this->is_pt_RegisteTime_dirty)
		{			
			if (!isset($this->pt_RegisteTime))
			{
				$update .= ("`pt_RegisteTime`=null,");
			}
			else
			{
				$update .= ("`pt_RegisteTime`='{$this->pt_RegisteTime}',");
			}
		}
		if ($this->is_pt_RegisteIP_dirty)
		{			
			if (!isset($this->pt_RegisteIP))
			{
				$update .= ("`pt_RegisteIP`=null,");
			}
			else
			{
				$update .= ("`pt_RegisteIP`='{$this->pt_RegisteIP}',");
			}
		}
		if ($this->is_pt_AccountState_dirty)
		{			
			if (!isset($this->pt_AccountState))
			{
				$update .= ("`pt_AccountState`=null,");
			}
			else
			{
				$update .= ("`pt_AccountState`='{$this->pt_AccountState}',");
			}
		}
		if ($this->is_pt_LastLoginTime_dirty)
		{			
			if (!isset($this->pt_LastLoginTime))
			{
				$update .= ("`pt_LastLoginTime`=null,");
			}
			else
			{
				$update .= ("`pt_LastLoginTime`='{$this->pt_LastLoginTime}',");
			}
		}
		if ($this->is_pt_LastLoginIP_dirty)
		{			
			if (!isset($this->pt_LastLoginIP))
			{
				$update .= ("`pt_LastLoginIP`=null,");
			}
			else
			{
				$update .= ("`pt_LastLoginIP`='{$this->pt_LastLoginIP}',");
			}
		}
		if ($this->is_pt_OpenIdInfo_dirty)
		{			
			if (!isset($this->pt_OpenIdInfo))
			{
				$update .= ("`pt_OpenIdInfo`=null,");
			}
			else
			{
				$update .= ("`pt_OpenIdInfo`='{$this->pt_OpenIdInfo}',");
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
		
		$sql = "UPDATE `PT_OpenUIDAccount` SET {$update} WHERE {$condition}";
		
		return $sql;
	}
	
	public function /*boolean*/ add($fieldsValue,$condition=NULL)
	{				
		if (empty($condition))
		{
			$uc = "`pt_OpenUID`='{$this->pt_OpenUID}'";
		}
		else
		{			
			$uc = SQLUtil::parseCondition($condition);
		}
		
		$update = SQLUtil::parseASFieldValues($fieldsValue);
		
		$sql = "UPDATE `PT_OpenUIDAccount` SET {$update} WHERE {$uc}";
		
		$qr = sql_query(self::$_db_name,$sql);
				
		return (boolean)$qr;
	}	
	
	public function /*boolean*/ sub($fieldsValue,$condition=NULL)
	{
		if (empty($condition))
		{
			$uc = "`pt_OpenUID`='{$this->pt_OpenUID}'";
		}
		else
		{			
			$uc = SQLUtil::parseCondition($condition);
		}
		
		$update = SQLUtil::parseASFieldValues($fieldsValue,false);
		
		$sql = "UPDATE `PT_OpenUIDAccount` SET {$update} WHERE {$uc}";
		
		$qr = sql_query(self::$_db_name,$sql);
				
		return (boolean)$qr;
	}
	
	/**
	 * 是否已经设置主键的值
	 */
	public function is_set_keys()
	{
		
		return (isset($this->pt_OpenUID));

	}
	
	private function /*void*/ clean() 
	{
		$this->is_this_table_dirty = false;
		$this->is_pt_OpenUID_dirty = false;
		$this->is_pt_OpenAccount_dirty = false;
		$this->is_pt_AccountSource_dirty = false;
		$this->is_pt_AccountKey_dirty = false;
		$this->is_pt_RegisteTime_dirty = false;
		$this->is_pt_RegisteIP_dirty = false;
		$this->is_pt_AccountState_dirty = false;
		$this->is_pt_LastLoginTime_dirty = false;
		$this->is_pt_LastLoginIP_dirty = false;
		$this->is_pt_OpenIdInfo_dirty = false;

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

	public function /*string*/ getPtOpenAccount()
	{
		return $this->pt_OpenAccount;
	}
	
	public function /*void*/ setPtOpenAccount(/*string*/ $pt_OpenAccount)
	{
		$this->pt_OpenAccount = SQLUtil::toSafeSQLString($pt_OpenAccount);
		$this->is_pt_OpenAccount_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setPtOpenAccountNull()
	{
		$this->pt_OpenAccount = null;
		$this->is_pt_OpenAccount_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*string*/ getPtAccountSource()
	{
		return $this->pt_AccountSource;
	}
	
	public function /*void*/ setPtAccountSource(/*string*/ $pt_AccountSource)
	{
		$this->pt_AccountSource = SQLUtil::toSafeSQLString($pt_AccountSource);
		$this->is_pt_AccountSource_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setPtAccountSourceNull()
	{
		$this->pt_AccountSource = null;
		$this->is_pt_AccountSource_dirty = true;		
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

	public function /*string*/ getPtRegisteTime()
	{
		return $this->pt_RegisteTime;
	}
	
	public function /*void*/ setPtRegisteTime(/*string*/ $pt_RegisteTime)
	{
		$this->pt_RegisteTime = SQLUtil::toSafeSQLString($pt_RegisteTime);
		$this->is_pt_RegisteTime_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setPtRegisteTimeNull()
	{
		$this->pt_RegisteTime = null;
		$this->is_pt_RegisteTime_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*string*/ getPtRegisteIP()
	{
		return $this->pt_RegisteIP;
	}
	
	public function /*void*/ setPtRegisteIP(/*string*/ $pt_RegisteIP)
	{
		$this->pt_RegisteIP = SQLUtil::toSafeSQLString($pt_RegisteIP);
		$this->is_pt_RegisteIP_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setPtRegisteIPNull()
	{
		$this->pt_RegisteIP = null;
		$this->is_pt_RegisteIP_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*int*/ getPtAccountState()
	{
		return $this->pt_AccountState;
	}
	
	public function /*void*/ setPtAccountState(/*int*/ $pt_AccountState)
	{
		$this->pt_AccountState = intval($pt_AccountState);
		$this->is_pt_AccountState_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setPtAccountStateNull()
	{
		$this->pt_AccountState = null;
		$this->is_pt_AccountState_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*string*/ getPtLastLoginTime()
	{
		return $this->pt_LastLoginTime;
	}
	
	public function /*void*/ setPtLastLoginTime(/*string*/ $pt_LastLoginTime)
	{
		$this->pt_LastLoginTime = SQLUtil::toSafeSQLString($pt_LastLoginTime);
		$this->is_pt_LastLoginTime_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setPtLastLoginTimeNull()
	{
		$this->pt_LastLoginTime = null;
		$this->is_pt_LastLoginTime_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*string*/ getPtLastLoginIP()
	{
		return $this->pt_LastLoginIP;
	}
	
	public function /*void*/ setPtLastLoginIP(/*string*/ $pt_LastLoginIP)
	{
		$this->pt_LastLoginIP = SQLUtil::toSafeSQLString($pt_LastLoginIP);
		$this->is_pt_LastLoginIP_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setPtLastLoginIPNull()
	{
		$this->pt_LastLoginIP = null;
		$this->is_pt_LastLoginIP_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*string*/ getPtOpenIdInfo()
	{
		return $this->pt_OpenIdInfo;
	}
	
	public function /*void*/ setPtOpenIdInfo(/*string*/ $pt_OpenIdInfo)
	{
		$this->pt_OpenIdInfo = SQLUtil::toSafeSQLString($pt_OpenIdInfo);
		$this->is_pt_OpenIdInfo_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setPtOpenIdInfoNull()
	{
		$this->pt_OpenIdInfo = null;
		$this->is_pt_OpenIdInfo_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	
	public function /*string*/ toDebugString()
	{
		$dbg = "(";
		
		$dbg .= ("pt_OpenUID={$this->pt_OpenUID},");
		$dbg .= ("pt_OpenAccount={$this->pt_OpenAccount},");
		$dbg .= ("pt_AccountSource={$this->pt_AccountSource},");
		$dbg .= ("pt_AccountKey={$this->pt_AccountKey},");
		$dbg .= ("pt_RegisteTime={$this->pt_RegisteTime},");
		$dbg .= ("pt_RegisteIP={$this->pt_RegisteIP},");
		$dbg .= ("pt_AccountState={$this->pt_AccountState},");
		$dbg .= ("pt_LastLoginTime={$this->pt_LastLoginTime},");
		$dbg .= ("pt_LastLoginIP={$this->pt_LastLoginIP},");
		$dbg .= ("pt_OpenIdInfo={$this->pt_OpenIdInfo},");

		$dbg .= ")";
				
		return str_replace(",)",")",$dbg);
	}
	
	public function fromArray($arr)
	{
		if (isset($arr['pt_OpenUID'])) $this->setPtOpenUID($arr['pt_OpenUID']);
		if (isset($arr['pt_OpenAccount'])) $this->setPtOpenAccount($arr['pt_OpenAccount']);
		if (isset($arr['pt_AccountSource'])) $this->setPtAccountSource($arr['pt_AccountSource']);
		if (isset($arr['pt_AccountKey'])) $this->setPtAccountKey($arr['pt_AccountKey']);
		if (isset($arr['pt_RegisteTime'])) $this->setPtRegisteTime($arr['pt_RegisteTime']);
		if (isset($arr['pt_RegisteIP'])) $this->setPtRegisteIP($arr['pt_RegisteIP']);
		if (isset($arr['pt_AccountState'])) $this->setPtAccountState($arr['pt_AccountState']);
		if (isset($arr['pt_LastLoginTime'])) $this->setPtLastLoginTime($arr['pt_LastLoginTime']);
		if (isset($arr['pt_LastLoginIP'])) $this->setPtLastLoginIP($arr['pt_LastLoginIP']);
		if (isset($arr['pt_OpenIdInfo'])) $this->setPtOpenIdInfo($arr['pt_OpenIdInfo']);
		
	}
	
	public function toArray()
	{
		$ret = array();
		$ret['pt_OpenUID'] = $this->pt_OpenUID;
		$ret['pt_OpenAccount'] = $this->pt_OpenAccount;
		$ret['pt_AccountSource'] = $this->pt_AccountSource;
		$ret['pt_AccountKey'] = $this->pt_AccountKey;
		$ret['pt_RegisteTime'] = $this->pt_RegisteTime;
		$ret['pt_RegisteIP'] = $this->pt_RegisteIP;
		$ret['pt_AccountState'] = $this->pt_AccountState;
		$ret['pt_LastLoginTime'] = $this->pt_LastLoginTime;
		$ret['pt_LastLoginIP'] = $this->pt_LastLoginIP;
		$ret['pt_OpenIdInfo'] = $this->pt_OpenIdInfo;

		return $ret;
	}
}

?>
