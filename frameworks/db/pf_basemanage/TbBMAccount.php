<?php
require_once (FRAMEWORK_PATH . "utils/MysqlDBHelper.php");
require_once (FRAMEWORK_PATH . "db/SQLUtil.php");
/**
 * database table BM_Account description
 * 
 * [This file was auto-generated. PLEASE DONT EDIT]
 * 
 * @author LiangZhixian
 * 
 */
class TbBMAccount {
	
	public static $_db_name = "pf_basemanage";
	
	private /*string*/ $bm_AccountID; //PRIMARY KEY 后台帐号ID
	private /*string*/ $bm_Password; //密码
	private /*string*/ $bm_AccountName; //姓名
	private /*int*/ $bm_AccountType; //帐号类别              0,超级管理员              
	private /*int*/ $bm_AccountRight; //帐号权限              0,只读              1,写入              2,读写
	private /*int*/ $bm_AccountIPRight; //帐号IP限制              0,不限制              1,限制
	private /*int*/ $bm_AccountState; //帐号状态 0正常,99,删除
	private /*int*/ $bm_DtptID; //部门ID
	private /*int*/ $bm_RankID; //级别ID
	private /*string*/ $bm_ARemark; //备注

	
	private $is_this_table_dirty = false;
	private $is_bm_AccountID_dirty = false;
	private $is_bm_Password_dirty = false;
	private $is_bm_AccountName_dirty = false;
	private $is_bm_AccountType_dirty = false;
	private $is_bm_AccountRight_dirty = false;
	private $is_bm_AccountIPRight_dirty = false;
	private $is_bm_AccountState_dirty = false;
	private $is_bm_DtptID_dirty = false;
	private $is_bm_RankID_dirty = false;
	private $is_bm_ARemark_dirty = false;


	/**
	 * @param array($condition)
	 * @return array(TbBMAccount)
	 */
	public static function /*array(TbBMAccount)*/ loadTable(/*array*/ $fields=NULL,/*array*/$condition=NULL)
	{
		$result = array();
		
		$f = "*";
		
		if(!empty($fields))
		{
			$f = SQLUtil::parseFields($fields);			
		}
		
		if (empty($condition))
		{
			$sql = "SELECT {$f} FROM `BM_Account`";
		}
		else
		{			
			$sql = "SELECT {$f} FROM `BM_Account` WHERE ".SQLUtil::parseCondition($condition);
		}			
		
		$ar = sql_fetch_rows_assoc(self::$_db_name,$sql);
		
		if (empty($ar) || count($ar) == 0)
		{
			return $result;
		}
		
		foreach($ar as $row)
		{
			$tb = new TbBMAccount();			
			if (isset($row['bm_AccountID'])) $tb->bm_AccountID = $row['bm_AccountID'];
			if (isset($row['bm_Password'])) $tb->bm_Password = $row['bm_Password'];
			if (isset($row['bm_AccountName'])) $tb->bm_AccountName = $row['bm_AccountName'];
			if (isset($row['bm_AccountType'])) $tb->bm_AccountType = intval($row['bm_AccountType']);
			if (isset($row['bm_AccountRight'])) $tb->bm_AccountRight = intval($row['bm_AccountRight']);
			if (isset($row['bm_AccountIPRight'])) $tb->bm_AccountIPRight = intval($row['bm_AccountIPRight']);
			if (isset($row['bm_AccountState'])) $tb->bm_AccountState = intval($row['bm_AccountState']);
			if (isset($row['bm_DtptID'])) $tb->bm_DtptID = intval($row['bm_DtptID']);
			if (isset($row['bm_RankID'])) $tb->bm_RankID = intval($row['bm_RankID']);
			if (isset($row['bm_ARemark'])) $tb->bm_ARemark = $row['bm_ARemark'];
		
			$result[] = $tb;
		}
		
		return $result;
	}	
	
	public static function insertSqlHeader(/*array*/ $fields=NULL)
	{
		$result = array();				
		if(!empty($fields)){
			$f = SQLUtil::parseFields($fields);			
			$result[0] = "INSERT INTO `BM_Account` ({$f}) VALUES ";	
			$ar = array();
			foreach($fields as $key){
				$ar[$key]=1;
			}
			$result[1] = $ar;
		}else{
			$result[0]="INSERT INTO `BM_Account` (`bm_AccountID`,`bm_Password`,`bm_AccountName`,`bm_AccountType`,`bm_AccountRight`,`bm_AccountIPRight`,`bm_AccountState`,`bm_DtptID`,`bm_RankID`,`bm_ARemark`) VALUES ";
			$result[1] = array('bm_AccountID'=>1,'bm_Password'=>1,'bm_AccountName'=>1,'bm_AccountType'=>1,'bm_AccountRight'=>1,'bm_AccountIPRight'=>1,'bm_AccountState'=>1,'bm_DtptID'=>1,'bm_RankID'=>1,'bm_ARemark'=>1);
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
		$c = "`bm_AccountID`='{$this->bm_AccountID}'";
		
		if(!empty($fields))
		{
			$f = SQLUtil::parseFields($fields);			
		}
	    if (!empty($condition))
		{
			$c =SQLUtil::parseCondition($condition);
		}
		
		$sql = "SELECT {$f} FROM `BM_Account` WHERE {$c} LIMIT 1";


		$ars = sql_fetch_rows_assoc(self::$_db_name,$sql);
		
		if (!$ars || count($ars)==0)
		{
			return false;
		}
		
		$ar = $ars[0];
		
		if (isset($ar['bm_AccountID'])) $this->bm_AccountID = $ar['bm_AccountID'];
		if (isset($ar['bm_Password'])) $this->bm_Password = $ar['bm_Password'];
		if (isset($ar['bm_AccountName'])) $this->bm_AccountName = $ar['bm_AccountName'];
		if (isset($ar['bm_AccountType'])) $this->bm_AccountType = intval($ar['bm_AccountType']);
		if (isset($ar['bm_AccountRight'])) $this->bm_AccountRight = intval($ar['bm_AccountRight']);
		if (isset($ar['bm_AccountIPRight'])) $this->bm_AccountIPRight = intval($ar['bm_AccountIPRight']);
		if (isset($ar['bm_AccountState'])) $this->bm_AccountState = intval($ar['bm_AccountState']);
		if (isset($ar['bm_DtptID'])) $this->bm_DtptID = intval($ar['bm_DtptID']);
		if (isset($ar['bm_RankID'])) $this->bm_RankID = intval($ar['bm_RankID']);
		if (isset($ar['bm_ARemark'])) $this->bm_ARemark = $ar['bm_ARemark'];
		
		
		$this->clean();
		
		return true;
	}
	
	public function /*boolean*/ loadFromExistFields()
	{
		$emptyCondition = true;
    	$emptyFields = true;
    	
    	$fields = array();
    	$condition = array();
    	
    	if (!isset($this->bm_AccountID)){
    		$emptyFields = false;
    		$fields[] = 'bm_AccountID';
    	}else{
    		$emptyCondition = false; 
    		$condition['bm_AccountID']=$this->bm_AccountID;
    	}
    	if (!isset($this->bm_Password)){
    		$emptyFields = false;
    		$fields[] = 'bm_Password';
    	}else{
    		$emptyCondition = false; 
    		$condition['bm_Password']=$this->bm_Password;
    	}
    	if (!isset($this->bm_AccountName)){
    		$emptyFields = false;
    		$fields[] = 'bm_AccountName';
    	}else{
    		$emptyCondition = false; 
    		$condition['bm_AccountName']=$this->bm_AccountName;
    	}
    	if (!isset($this->bm_AccountType)){
    		$emptyFields = false;
    		$fields[] = 'bm_AccountType';
    	}else{
    		$emptyCondition = false; 
    		$condition['bm_AccountType']=$this->bm_AccountType;
    	}
    	if (!isset($this->bm_AccountRight)){
    		$emptyFields = false;
    		$fields[] = 'bm_AccountRight';
    	}else{
    		$emptyCondition = false; 
    		$condition['bm_AccountRight']=$this->bm_AccountRight;
    	}
    	if (!isset($this->bm_AccountIPRight)){
    		$emptyFields = false;
    		$fields[] = 'bm_AccountIPRight';
    	}else{
    		$emptyCondition = false; 
    		$condition['bm_AccountIPRight']=$this->bm_AccountIPRight;
    	}
    	if (!isset($this->bm_AccountState)){
    		$emptyFields = false;
    		$fields[] = 'bm_AccountState';
    	}else{
    		$emptyCondition = false; 
    		$condition['bm_AccountState']=$this->bm_AccountState;
    	}
    	if (!isset($this->bm_DtptID)){
    		$emptyFields = false;
    		$fields[] = 'bm_DtptID';
    	}else{
    		$emptyCondition = false; 
    		$condition['bm_DtptID']=$this->bm_DtptID;
    	}
    	if (!isset($this->bm_RankID)){
    		$emptyFields = false;
    		$fields[] = 'bm_RankID';
    	}else{
    		$emptyCondition = false; 
    		$condition['bm_RankID']=$this->bm_RankID;
    	}
    	if (!isset($this->bm_ARemark)){
    		$emptyFields = false;
    		$fields[] = 'bm_ARemark';
    	}else{
    		$emptyCondition = false; 
    		$condition['bm_ARemark']=$this->bm_ARemark;
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
			$uc = "`bm_AccountID`='{$this->bm_AccountID}'";
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
		
		$sql = "DELETE FROM `BM_Account` WHERE ".SQLUtil::parseCondition($condition);
		
		$qr = sql_query(self::$_db_name,$sql);
				
		return (boolean)$qr;
	}
	
	public function /*boolean*/ delete()
	{
		if (!$this->is_set_keys())
		{
			return false;
		}
		
		$sql = "DELETE FROM `BM_Account` WHERE `bm_AccountID`='{$this->bm_AccountID}'";
		

		$qr = sql_query(self::$_db_name,$sql);
				
		return (boolean)$qr;
	}
	
	public function getInsertValue($fields)
	{
		$values = "(";		
		foreach($fields as $f => $k){
			if($f == 'bm_AccountID'){
 				$values .= "'{$this->bm_AccountID}',";
 			}else if($f == 'bm_Password'){
 				$values .= "'{$this->bm_Password}',";
 			}else if($f == 'bm_AccountName'){
 				$values .= "'{$this->bm_AccountName}',";
 			}else if($f == 'bm_AccountType'){
 				$values .= "'{$this->bm_AccountType}',";
 			}else if($f == 'bm_AccountRight'){
 				$values .= "'{$this->bm_AccountRight}',";
 			}else if($f == 'bm_AccountIPRight'){
 				$values .= "'{$this->bm_AccountIPRight}',";
 			}else if($f == 'bm_AccountState'){
 				$values .= "'{$this->bm_AccountState}',";
 			}else if($f == 'bm_DtptID'){
 				$values .= "'{$this->bm_DtptID}',";
 			}else if($f == 'bm_RankID'){
 				$values .= "'{$this->bm_RankID}',";
 			}else if($f == 'bm_ARemark'){
 				$values .= "'{$this->bm_ARemark}',";
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

		if (isset($this->bm_AccountID))
		{
			$fields .= "`bm_AccountID`,";
			$values .= "'{$this->bm_AccountID}',";
		}
		if (isset($this->bm_Password))
		{
			$fields .= "`bm_Password`,";
			$values .= "'{$this->bm_Password}',";
		}
		if (isset($this->bm_AccountName))
		{
			$fields .= "`bm_AccountName`,";
			$values .= "'{$this->bm_AccountName}',";
		}
		if (isset($this->bm_AccountType))
		{
			$fields .= "`bm_AccountType`,";
			$values .= "'{$this->bm_AccountType}',";
		}
		if (isset($this->bm_AccountRight))
		{
			$fields .= "`bm_AccountRight`,";
			$values .= "'{$this->bm_AccountRight}',";
		}
		if (isset($this->bm_AccountIPRight))
		{
			$fields .= "`bm_AccountIPRight`,";
			$values .= "'{$this->bm_AccountIPRight}',";
		}
		if (isset($this->bm_AccountState))
		{
			$fields .= "`bm_AccountState`,";
			$values .= "'{$this->bm_AccountState}',";
		}
		if (isset($this->bm_DtptID))
		{
			$fields .= "`bm_DtptID`,";
			$values .= "'{$this->bm_DtptID}',";
		}
		if (isset($this->bm_RankID))
		{
			$fields .= "`bm_RankID`,";
			$values .= "'{$this->bm_RankID}',";
		}
		if (isset($this->bm_ARemark))
		{
			$fields .= "`bm_ARemark`,";
			$values .= "'{$this->bm_ARemark}',";
		}

		
		$fields .= ")";
		$values .= ")";
		
		$sql = "INSERT INTO `BM_Account` ".$fields.$values;
		
		return str_replace(",)",")",$sql);
	}
	
	private function /*string*/ getUpdateFields()
	{
		$update = "";
		
		if ($this->is_bm_Password_dirty)
		{			
			if (!isset($this->bm_Password))
			{
				$update .= ("`bm_Password`=null,");
			}
			else
			{
				$update .= ("`bm_Password`='{$this->bm_Password}',");
			}
		}
		if ($this->is_bm_AccountName_dirty)
		{			
			if (!isset($this->bm_AccountName))
			{
				$update .= ("`bm_AccountName`=null,");
			}
			else
			{
				$update .= ("`bm_AccountName`='{$this->bm_AccountName}',");
			}
		}
		if ($this->is_bm_AccountType_dirty)
		{			
			if (!isset($this->bm_AccountType))
			{
				$update .= ("`bm_AccountType`=null,");
			}
			else
			{
				$update .= ("`bm_AccountType`='{$this->bm_AccountType}',");
			}
		}
		if ($this->is_bm_AccountRight_dirty)
		{			
			if (!isset($this->bm_AccountRight))
			{
				$update .= ("`bm_AccountRight`=null,");
			}
			else
			{
				$update .= ("`bm_AccountRight`='{$this->bm_AccountRight}',");
			}
		}
		if ($this->is_bm_AccountIPRight_dirty)
		{			
			if (!isset($this->bm_AccountIPRight))
			{
				$update .= ("`bm_AccountIPRight`=null,");
			}
			else
			{
				$update .= ("`bm_AccountIPRight`='{$this->bm_AccountIPRight}',");
			}
		}
		if ($this->is_bm_AccountState_dirty)
		{			
			if (!isset($this->bm_AccountState))
			{
				$update .= ("`bm_AccountState`=null,");
			}
			else
			{
				$update .= ("`bm_AccountState`='{$this->bm_AccountState}',");
			}
		}
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
		if ($this->is_bm_RankID_dirty)
		{			
			if (!isset($this->bm_RankID))
			{
				$update .= ("`bm_RankID`=null,");
			}
			else
			{
				$update .= ("`bm_RankID`='{$this->bm_RankID}',");
			}
		}
		if ($this->is_bm_ARemark_dirty)
		{			
			if (!isset($this->bm_ARemark))
			{
				$update .= ("`bm_ARemark`=null,");
			}
			else
			{
				$update .= ("`bm_ARemark`='{$this->bm_ARemark}',");
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
		
		$sql = "UPDATE `BM_Account` SET {$update} WHERE {$condition}";
		
		return $sql;
	}
	
	public function /*boolean*/ add($fieldsValue,$condition=NULL)
	{				
		if (empty($condition))
		{
			$uc = "`bm_AccountID`='{$this->bm_AccountID}'";
		}
		else
		{			
			$uc = SQLUtil::parseCondition($condition);
		}
		
		$update = SQLUtil::parseASFieldValues($fieldsValue);
		
		$sql = "UPDATE `BM_Account` SET {$update} WHERE {$uc}";
		
		$qr = sql_query(self::$_db_name,$sql);
				
		return (boolean)$qr;
	}	
	
	public function /*boolean*/ sub($fieldsValue,$condition=NULL)
	{
		if (empty($condition))
		{
			$uc = "`bm_AccountID`='{$this->bm_AccountID}'";
		}
		else
		{			
			$uc = SQLUtil::parseCondition($condition);
		}
		
		$update = SQLUtil::parseASFieldValues($fieldsValue,false);
		
		$sql = "UPDATE `BM_Account` SET {$update} WHERE {$uc}";
		
		$qr = sql_query(self::$_db_name,$sql);
				
		return (boolean)$qr;
	}
	
	/**
	 * 是否已经设置主键的值
	 */
	public function is_set_keys()
	{
		
		return (isset($this->bm_AccountID));

	}
	
	private function /*void*/ clean() 
	{
		$this->is_this_table_dirty = false;
		$this->is_bm_AccountID_dirty = false;
		$this->is_bm_Password_dirty = false;
		$this->is_bm_AccountName_dirty = false;
		$this->is_bm_AccountType_dirty = false;
		$this->is_bm_AccountRight_dirty = false;
		$this->is_bm_AccountIPRight_dirty = false;
		$this->is_bm_AccountState_dirty = false;
		$this->is_bm_DtptID_dirty = false;
		$this->is_bm_RankID_dirty = false;
		$this->is_bm_ARemark_dirty = false;

	}
	
	public function /*string*/ getBmAccountID()
	{
		return $this->bm_AccountID;
	}
	
	public function /*void*/ setBmAccountID(/*string*/ $bm_AccountID)
	{
		$this->bm_AccountID = SQLUtil::toSafeSQLString($bm_AccountID);
		$this->is_bm_AccountID_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setBmAccountIDNull()
	{
		$this->bm_AccountID = null;
		$this->is_bm_AccountID_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*string*/ getBmPassword()
	{
		return $this->bm_Password;
	}
	
	public function /*void*/ setBmPassword(/*string*/ $bm_Password)
	{
		$this->bm_Password = SQLUtil::toSafeSQLString($bm_Password);
		$this->is_bm_Password_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setBmPasswordNull()
	{
		$this->bm_Password = null;
		$this->is_bm_Password_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*string*/ getBmAccountName()
	{
		return $this->bm_AccountName;
	}
	
	public function /*void*/ setBmAccountName(/*string*/ $bm_AccountName)
	{
		$this->bm_AccountName = SQLUtil::toSafeSQLString($bm_AccountName);
		$this->is_bm_AccountName_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setBmAccountNameNull()
	{
		$this->bm_AccountName = null;
		$this->is_bm_AccountName_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*int*/ getBmAccountType()
	{
		return $this->bm_AccountType;
	}
	
	public function /*void*/ setBmAccountType(/*int*/ $bm_AccountType)
	{
		$this->bm_AccountType = intval($bm_AccountType);
		$this->is_bm_AccountType_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setBmAccountTypeNull()
	{
		$this->bm_AccountType = null;
		$this->is_bm_AccountType_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*int*/ getBmAccountRight()
	{
		return $this->bm_AccountRight;
	}
	
	public function /*void*/ setBmAccountRight(/*int*/ $bm_AccountRight)
	{
		$this->bm_AccountRight = intval($bm_AccountRight);
		$this->is_bm_AccountRight_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setBmAccountRightNull()
	{
		$this->bm_AccountRight = null;
		$this->is_bm_AccountRight_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*int*/ getBmAccountIPRight()
	{
		return $this->bm_AccountIPRight;
	}
	
	public function /*void*/ setBmAccountIPRight(/*int*/ $bm_AccountIPRight)
	{
		$this->bm_AccountIPRight = intval($bm_AccountIPRight);
		$this->is_bm_AccountIPRight_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setBmAccountIPRightNull()
	{
		$this->bm_AccountIPRight = null;
		$this->is_bm_AccountIPRight_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*int*/ getBmAccountState()
	{
		return $this->bm_AccountState;
	}
	
	public function /*void*/ setBmAccountState(/*int*/ $bm_AccountState)
	{
		$this->bm_AccountState = intval($bm_AccountState);
		$this->is_bm_AccountState_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setBmAccountStateNull()
	{
		$this->bm_AccountState = null;
		$this->is_bm_AccountState_dirty = true;		
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

	public function /*string*/ getBmARemark()
	{
		return $this->bm_ARemark;
	}
	
	public function /*void*/ setBmARemark(/*string*/ $bm_ARemark)
	{
		$this->bm_ARemark = SQLUtil::toSafeSQLString($bm_ARemark);
		$this->is_bm_ARemark_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setBmARemarkNull()
	{
		$this->bm_ARemark = null;
		$this->is_bm_ARemark_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	
	public function /*string*/ toDebugString()
	{
		$dbg = "(";
		
		$dbg .= ("bm_AccountID={$this->bm_AccountID},");
		$dbg .= ("bm_Password={$this->bm_Password},");
		$dbg .= ("bm_AccountName={$this->bm_AccountName},");
		$dbg .= ("bm_AccountType={$this->bm_AccountType},");
		$dbg .= ("bm_AccountRight={$this->bm_AccountRight},");
		$dbg .= ("bm_AccountIPRight={$this->bm_AccountIPRight},");
		$dbg .= ("bm_AccountState={$this->bm_AccountState},");
		$dbg .= ("bm_DtptID={$this->bm_DtptID},");
		$dbg .= ("bm_RankID={$this->bm_RankID},");
		$dbg .= ("bm_ARemark={$this->bm_ARemark},");

		$dbg .= ")";
				
		return str_replace(",)",")",$dbg);
	}
	
	public function fromArray($arr)
	{
		if (isset($arr['bm_AccountID'])) $this->setBmAccountID($arr['bm_AccountID']);
		if (isset($arr['bm_Password'])) $this->setBmPassword($arr['bm_Password']);
		if (isset($arr['bm_AccountName'])) $this->setBmAccountName($arr['bm_AccountName']);
		if (isset($arr['bm_AccountType'])) $this->setBmAccountType($arr['bm_AccountType']);
		if (isset($arr['bm_AccountRight'])) $this->setBmAccountRight($arr['bm_AccountRight']);
		if (isset($arr['bm_AccountIPRight'])) $this->setBmAccountIPRight($arr['bm_AccountIPRight']);
		if (isset($arr['bm_AccountState'])) $this->setBmAccountState($arr['bm_AccountState']);
		if (isset($arr['bm_DtptID'])) $this->setBmDtptID($arr['bm_DtptID']);
		if (isset($arr['bm_RankID'])) $this->setBmRankID($arr['bm_RankID']);
		if (isset($arr['bm_ARemark'])) $this->setBmARemark($arr['bm_ARemark']);
		
	}
	
	public function toArray()
	{
		$ret = array();
		$ret['bm_AccountID'] = $this->bm_AccountID;
		$ret['bm_Password'] = $this->bm_Password;
		$ret['bm_AccountName'] = $this->bm_AccountName;
		$ret['bm_AccountType'] = $this->bm_AccountType;
		$ret['bm_AccountRight'] = $this->bm_AccountRight;
		$ret['bm_AccountIPRight'] = $this->bm_AccountIPRight;
		$ret['bm_AccountState'] = $this->bm_AccountState;
		$ret['bm_DtptID'] = $this->bm_DtptID;
		$ret['bm_RankID'] = $this->bm_RankID;
		$ret['bm_ARemark'] = $this->bm_ARemark;

		return $ret;
	}
}

?>
