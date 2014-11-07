<?php
require_once (FRAMEWORK_PATH . "utils/MysqlDBHelper.php");
require_once (FRAMEWORK_PATH . "db/SQLUtil.php");
/**
 * database table PT_Account description
 * 
 * [This file was auto-generated. PLEASE DONT EDIT]
 * 
 * @author LiangZhixian
 * 
 */
class TbPTAccount {
	
	public static $_db_name = "pf_passport";
	
	private /*string*/ $pt_AccountKey; //PRIMARY KEY 
	private /*string*/ $pt_AccountID; //帐号长度6至10位字符
	private /*string*/ $pt_Email;
	private /*string*/ $pt_HashID;
	private /*string*/ $pt_Password;
	private /*int*/ $pt_PasswordLevel;
	private /*string*/ $pt_Name;
	private /*string*/ $pt_NickName;
	private /*int*/ $pt_Sex; //0,未选择             1,男             2,女
	private /*string*/ $pt_Birthday;
	private /*int*/ $pt_EmailState; //0,未激活             1,已激活
	private /*int*/ $pt_LeCion;
	private /*string*/ $pt_PhoneNumber;
	private /*string*/ $pt_PhoneModel;
	private /*string*/ $pt_PhoneSys;
	private /*string*/ $pt_PhoneIMEI;
	private /*string*/ $pt_IDCard;
	private /*int*/ $pt_IDCardType; //0,身份证             1,其他
	private /*string*/ $pt_RegisteTime;
	private /*string*/ $pt_RegisteIP;
	private /*int*/ $pt_AccountState; //0，正常　             9，封停　             99，封停　             
	private /*string*/ $pt_LastLoginTime;
	private /*string*/ $pt_LastLoginIP;
	private /*string*/ $pt_MerchantCode;
	private /*string*/ $pt_RegisteSource;
	private /*int*/ $pt_AccountOtherState;
	private /*string*/ $pt_Province;
	private /*string*/ $pt_City;
	private /*string*/ $pt_Address;
	private /*string*/ $pt_Postalcode;
	private /*string*/ $pt_LockBeginTime;
	private /*string*/ $pt_LockEndTime; //永久封停=1900-1-1 00:00:00
	private /*int*/ $pt_Rank;
	private /*int*/ $pt_Score;
	private /*string*/ $pt_Game;
	private /*int*/ $pt_BindType; //0 或 空值，不允许绑定；1, 已经绑定；2，可绑定，请提供绑定界面

	
	private $is_this_table_dirty = false;
	private $is_pt_AccountKey_dirty = false;
	private $is_pt_AccountID_dirty = false;
	private $is_pt_Email_dirty = false;
	private $is_pt_HashID_dirty = false;
	private $is_pt_Password_dirty = false;
	private $is_pt_PasswordLevel_dirty = false;
	private $is_pt_Name_dirty = false;
	private $is_pt_NickName_dirty = false;
	private $is_pt_Sex_dirty = false;
	private $is_pt_Birthday_dirty = false;
	private $is_pt_EmailState_dirty = false;
	private $is_pt_LeCion_dirty = false;
	private $is_pt_PhoneNumber_dirty = false;
	private $is_pt_PhoneModel_dirty = false;
	private $is_pt_PhoneSys_dirty = false;
	private $is_pt_PhoneIMEI_dirty = false;
	private $is_pt_IDCard_dirty = false;
	private $is_pt_IDCardType_dirty = false;
	private $is_pt_RegisteTime_dirty = false;
	private $is_pt_RegisteIP_dirty = false;
	private $is_pt_AccountState_dirty = false;
	private $is_pt_LastLoginTime_dirty = false;
	private $is_pt_LastLoginIP_dirty = false;
	private $is_pt_MerchantCode_dirty = false;
	private $is_pt_RegisteSource_dirty = false;
	private $is_pt_AccountOtherState_dirty = false;
	private $is_pt_Province_dirty = false;
	private $is_pt_City_dirty = false;
	private $is_pt_Address_dirty = false;
	private $is_pt_Postalcode_dirty = false;
	private $is_pt_LockBeginTime_dirty = false;
	private $is_pt_LockEndTime_dirty = false;
	private $is_pt_Rank_dirty = false;
	private $is_pt_Score_dirty = false;
	private $is_pt_Game_dirty = false;
	private $is_pt_BindType_dirty = false;


	/**
	 * @param array($condition)
	 * @return array(TbPTAccount)
	 */
	public static function /*array(TbPTAccount)*/ loadTable(/*array*/ $fields=NULL,/*array*/$condition=NULL)
	{
		$result = array();
		
		$f = "*";
		
		if(!empty($fields))
		{
			$f = SQLUtil::parseFields($fields);			
		}
		
		if (empty($condition))
		{
			$sql = "SELECT {$f} FROM `PT_Account`";
		}
		else
		{			
			$sql = "SELECT {$f} FROM `PT_Account` WHERE ".SQLUtil::parseCondition($condition);
		}			
		
		$ar = sql_fetch_rows_assoc(self::$_db_name,$sql);
		
		if (empty($ar) || count($ar) == 0)
		{
			return $result;
		}
		
		foreach($ar as $row)
		{
			$tb = new TbPTAccount();			
			if (isset($row['pt_AccountKey'])) $tb->pt_AccountKey = $row['pt_AccountKey'];
			if (isset($row['pt_AccountID'])) $tb->pt_AccountID = $row['pt_AccountID'];
			if (isset($row['pt_Email'])) $tb->pt_Email = $row['pt_Email'];
			if (isset($row['pt_HashID'])) $tb->pt_HashID = $row['pt_HashID'];
			if (isset($row['pt_Password'])) $tb->pt_Password = $row['pt_Password'];
			if (isset($row['pt_PasswordLevel'])) $tb->pt_PasswordLevel = intval($row['pt_PasswordLevel']);
			if (isset($row['pt_Name'])) $tb->pt_Name = $row['pt_Name'];
			if (isset($row['pt_NickName'])) $tb->pt_NickName = $row['pt_NickName'];
			if (isset($row['pt_Sex'])) $tb->pt_Sex = intval($row['pt_Sex']);
			if (isset($row['pt_Birthday'])) $tb->pt_Birthday = $row['pt_Birthday'];
			if (isset($row['pt_EmailState'])) $tb->pt_EmailState = intval($row['pt_EmailState']);
			if (isset($row['pt_LeCion'])) $tb->pt_LeCion = intval($row['pt_LeCion']);
			if (isset($row['pt_PhoneNumber'])) $tb->pt_PhoneNumber = $row['pt_PhoneNumber'];
			if (isset($row['pt_PhoneModel'])) $tb->pt_PhoneModel = $row['pt_PhoneModel'];
			if (isset($row['pt_PhoneSys'])) $tb->pt_PhoneSys = $row['pt_PhoneSys'];
			if (isset($row['pt_PhoneIMEI'])) $tb->pt_PhoneIMEI = $row['pt_PhoneIMEI'];
			if (isset($row['pt_IDCard'])) $tb->pt_IDCard = $row['pt_IDCard'];
			if (isset($row['pt_IDCardType'])) $tb->pt_IDCardType = intval($row['pt_IDCardType']);
			if (isset($row['pt_RegisteTime'])) $tb->pt_RegisteTime = $row['pt_RegisteTime'];
			if (isset($row['pt_RegisteIP'])) $tb->pt_RegisteIP = $row['pt_RegisteIP'];
			if (isset($row['pt_AccountState'])) $tb->pt_AccountState = intval($row['pt_AccountState']);
			if (isset($row['pt_LastLoginTime'])) $tb->pt_LastLoginTime = $row['pt_LastLoginTime'];
			if (isset($row['pt_LastLoginIP'])) $tb->pt_LastLoginIP = $row['pt_LastLoginIP'];
			if (isset($row['pt_MerchantCode'])) $tb->pt_MerchantCode = $row['pt_MerchantCode'];
			if (isset($row['pt_RegisteSource'])) $tb->pt_RegisteSource = $row['pt_RegisteSource'];
			if (isset($row['pt_AccountOtherState'])) $tb->pt_AccountOtherState = intval($row['pt_AccountOtherState']);
			if (isset($row['pt_Province'])) $tb->pt_Province = $row['pt_Province'];
			if (isset($row['pt_City'])) $tb->pt_City = $row['pt_City'];
			if (isset($row['pt_Address'])) $tb->pt_Address = $row['pt_Address'];
			if (isset($row['pt_Postalcode'])) $tb->pt_Postalcode = $row['pt_Postalcode'];
			if (isset($row['pt_LockBeginTime'])) $tb->pt_LockBeginTime = $row['pt_LockBeginTime'];
			if (isset($row['pt_LockEndTime'])) $tb->pt_LockEndTime = $row['pt_LockEndTime'];
			if (isset($row['pt_Rank'])) $tb->pt_Rank = intval($row['pt_Rank']);
			if (isset($row['pt_Score'])) $tb->pt_Score = intval($row['pt_Score']);
			if (isset($row['pt_Game'])) $tb->pt_Game = $row['pt_Game'];
			if (isset($row['pt_BindType'])) $tb->pt_BindType = intval($row['pt_BindType']);
		
			$result[] = $tb;
		}
		
		return $result;
	}	
	
	public static function insertSqlHeader(/*array*/ $fields=NULL)
	{
		$result = array();				
		if(!empty($fields)){
			$f = SQLUtil::parseFields($fields);			
			$result[0] = "INSERT INTO `PT_Account` ({$f}) VALUES ";	
			$ar = array();
			foreach($fields as $key){
				$ar[$key]=1;
			}
			$result[1] = $ar;
		}else{
			$result[0]="INSERT INTO `PT_Account` (`pt_AccountKey`,`pt_AccountID`,`pt_Email`,`pt_HashID`,`pt_Password`,`pt_PasswordLevel`,`pt_Name`,`pt_NickName`,`pt_Sex`,`pt_Birthday`,`pt_EmailState`,`pt_LeCion`,`pt_PhoneNumber`,`pt_PhoneModel`,`pt_PhoneSys`,`pt_PhoneIMEI`,`pt_IDCard`,`pt_IDCardType`,`pt_RegisteTime`,`pt_RegisteIP`,`pt_AccountState`,`pt_LastLoginTime`,`pt_LastLoginIP`,`pt_MerchantCode`,`pt_RegisteSource`,`pt_AccountOtherState`,`pt_Province`,`pt_City`,`pt_Address`,`pt_Postalcode`,`pt_LockBeginTime`,`pt_LockEndTime`,`pt_Rank`,`pt_Score`,`pt_Game`,`pt_BindType`) VALUES ";
			$result[1] = array('pt_AccountKey'=>1,'pt_AccountID'=>1,'pt_Email'=>1,'pt_HashID'=>1,'pt_Password'=>1,'pt_PasswordLevel'=>1,'pt_Name'=>1,'pt_NickName'=>1,'pt_Sex'=>1,'pt_Birthday'=>1,'pt_EmailState'=>1,'pt_LeCion'=>1,'pt_PhoneNumber'=>1,'pt_PhoneModel'=>1,'pt_PhoneSys'=>1,'pt_PhoneIMEI'=>1,'pt_IDCard'=>1,'pt_IDCardType'=>1,'pt_RegisteTime'=>1,'pt_RegisteIP'=>1,'pt_AccountState'=>1,'pt_LastLoginTime'=>1,'pt_LastLoginIP'=>1,'pt_MerchantCode'=>1,'pt_RegisteSource'=>1,'pt_AccountOtherState'=>1,'pt_Province'=>1,'pt_City'=>1,'pt_Address'=>1,'pt_Postalcode'=>1,'pt_LockBeginTime'=>1,'pt_LockEndTime'=>1,'pt_Rank'=>1,'pt_Score'=>1,'pt_Game'=>1,'pt_BindType'=>1);
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
		$c = "`pt_AccountKey`='{$this->pt_AccountKey}'";
		
		if(!empty($fields))
		{
			$f = SQLUtil::parseFields($fields);			
		}
	    if (!empty($condition))
		{
			$c =SQLUtil::parseCondition($condition);
		}
		
		$sql = "SELECT {$f} FROM `PT_Account` WHERE {$c} LIMIT 1";


		$ars = sql_fetch_rows_assoc(self::$_db_name,$sql);
		
		if (!$ars || count($ars)==0)
		{
			return false;
		}
		
		$ar = $ars[0];
		
		if (isset($ar['pt_AccountKey'])) $this->pt_AccountKey = $ar['pt_AccountKey'];
		if (isset($ar['pt_AccountID'])) $this->pt_AccountID = $ar['pt_AccountID'];
		if (isset($ar['pt_Email'])) $this->pt_Email = $ar['pt_Email'];
		if (isset($ar['pt_HashID'])) $this->pt_HashID = $ar['pt_HashID'];
		if (isset($ar['pt_Password'])) $this->pt_Password = $ar['pt_Password'];
		if (isset($ar['pt_PasswordLevel'])) $this->pt_PasswordLevel = intval($ar['pt_PasswordLevel']);
		if (isset($ar['pt_Name'])) $this->pt_Name = $ar['pt_Name'];
		if (isset($ar['pt_NickName'])) $this->pt_NickName = $ar['pt_NickName'];
		if (isset($ar['pt_Sex'])) $this->pt_Sex = intval($ar['pt_Sex']);
		if (isset($ar['pt_Birthday'])) $this->pt_Birthday = $ar['pt_Birthday'];
		if (isset($ar['pt_EmailState'])) $this->pt_EmailState = intval($ar['pt_EmailState']);
		if (isset($ar['pt_LeCion'])) $this->pt_LeCion = intval($ar['pt_LeCion']);
		if (isset($ar['pt_PhoneNumber'])) $this->pt_PhoneNumber = $ar['pt_PhoneNumber'];
		if (isset($ar['pt_PhoneModel'])) $this->pt_PhoneModel = $ar['pt_PhoneModel'];
		if (isset($ar['pt_PhoneSys'])) $this->pt_PhoneSys = $ar['pt_PhoneSys'];
		if (isset($ar['pt_PhoneIMEI'])) $this->pt_PhoneIMEI = $ar['pt_PhoneIMEI'];
		if (isset($ar['pt_IDCard'])) $this->pt_IDCard = $ar['pt_IDCard'];
		if (isset($ar['pt_IDCardType'])) $this->pt_IDCardType = intval($ar['pt_IDCardType']);
		if (isset($ar['pt_RegisteTime'])) $this->pt_RegisteTime = $ar['pt_RegisteTime'];
		if (isset($ar['pt_RegisteIP'])) $this->pt_RegisteIP = $ar['pt_RegisteIP'];
		if (isset($ar['pt_AccountState'])) $this->pt_AccountState = intval($ar['pt_AccountState']);
		if (isset($ar['pt_LastLoginTime'])) $this->pt_LastLoginTime = $ar['pt_LastLoginTime'];
		if (isset($ar['pt_LastLoginIP'])) $this->pt_LastLoginIP = $ar['pt_LastLoginIP'];
		if (isset($ar['pt_MerchantCode'])) $this->pt_MerchantCode = $ar['pt_MerchantCode'];
		if (isset($ar['pt_RegisteSource'])) $this->pt_RegisteSource = $ar['pt_RegisteSource'];
		if (isset($ar['pt_AccountOtherState'])) $this->pt_AccountOtherState = intval($ar['pt_AccountOtherState']);
		if (isset($ar['pt_Province'])) $this->pt_Province = $ar['pt_Province'];
		if (isset($ar['pt_City'])) $this->pt_City = $ar['pt_City'];
		if (isset($ar['pt_Address'])) $this->pt_Address = $ar['pt_Address'];
		if (isset($ar['pt_Postalcode'])) $this->pt_Postalcode = $ar['pt_Postalcode'];
		if (isset($ar['pt_LockBeginTime'])) $this->pt_LockBeginTime = $ar['pt_LockBeginTime'];
		if (isset($ar['pt_LockEndTime'])) $this->pt_LockEndTime = $ar['pt_LockEndTime'];
		if (isset($ar['pt_Rank'])) $this->pt_Rank = intval($ar['pt_Rank']);
		if (isset($ar['pt_Score'])) $this->pt_Score = intval($ar['pt_Score']);
		if (isset($ar['pt_Game'])) $this->pt_Game = $ar['pt_Game'];
		if (isset($ar['pt_BindType'])) $this->pt_BindType = intval($ar['pt_BindType']);
		
		
		$this->clean();
		
		return true;
	}
	
	public function /*boolean*/ loadFromExistFields()
	{
		$emptyCondition = true;
    	$emptyFields = true;
    	
    	$fields = array();
    	$condition = array();
    	
    	if (!isset($this->pt_AccountKey)){
    		$emptyFields = false;
    		$fields[] = 'pt_AccountKey';
    	}else{
    		$emptyCondition = false; 
    		$condition['pt_AccountKey']=$this->pt_AccountKey;
    	}
    	if (!isset($this->pt_AccountID)){
    		$emptyFields = false;
    		$fields[] = 'pt_AccountID';
    	}else{
    		$emptyCondition = false; 
    		$condition['pt_AccountID']=$this->pt_AccountID;
    	}
    	if (!isset($this->pt_Email)){
    		$emptyFields = false;
    		$fields[] = 'pt_Email';
    	}else{
    		$emptyCondition = false; 
    		$condition['pt_Email']=$this->pt_Email;
    	}
    	if (!isset($this->pt_HashID)){
    		$emptyFields = false;
    		$fields[] = 'pt_HashID';
    	}else{
    		$emptyCondition = false; 
    		$condition['pt_HashID']=$this->pt_HashID;
    	}
    	if (!isset($this->pt_Password)){
    		$emptyFields = false;
    		$fields[] = 'pt_Password';
    	}else{
    		$emptyCondition = false; 
    		$condition['pt_Password']=$this->pt_Password;
    	}
    	if (!isset($this->pt_PasswordLevel)){
    		$emptyFields = false;
    		$fields[] = 'pt_PasswordLevel';
    	}else{
    		$emptyCondition = false; 
    		$condition['pt_PasswordLevel']=$this->pt_PasswordLevel;
    	}
    	if (!isset($this->pt_Name)){
    		$emptyFields = false;
    		$fields[] = 'pt_Name';
    	}else{
    		$emptyCondition = false; 
    		$condition['pt_Name']=$this->pt_Name;
    	}
    	if (!isset($this->pt_NickName)){
    		$emptyFields = false;
    		$fields[] = 'pt_NickName';
    	}else{
    		$emptyCondition = false; 
    		$condition['pt_NickName']=$this->pt_NickName;
    	}
    	if (!isset($this->pt_Sex)){
    		$emptyFields = false;
    		$fields[] = 'pt_Sex';
    	}else{
    		$emptyCondition = false; 
    		$condition['pt_Sex']=$this->pt_Sex;
    	}
    	if (!isset($this->pt_Birthday)){
    		$emptyFields = false;
    		$fields[] = 'pt_Birthday';
    	}else{
    		$emptyCondition = false; 
    		$condition['pt_Birthday']=$this->pt_Birthday;
    	}
    	if (!isset($this->pt_EmailState)){
    		$emptyFields = false;
    		$fields[] = 'pt_EmailState';
    	}else{
    		$emptyCondition = false; 
    		$condition['pt_EmailState']=$this->pt_EmailState;
    	}
    	if (!isset($this->pt_LeCion)){
    		$emptyFields = false;
    		$fields[] = 'pt_LeCion';
    	}else{
    		$emptyCondition = false; 
    		$condition['pt_LeCion']=$this->pt_LeCion;
    	}
    	if (!isset($this->pt_PhoneNumber)){
    		$emptyFields = false;
    		$fields[] = 'pt_PhoneNumber';
    	}else{
    		$emptyCondition = false; 
    		$condition['pt_PhoneNumber']=$this->pt_PhoneNumber;
    	}
    	if (!isset($this->pt_PhoneModel)){
    		$emptyFields = false;
    		$fields[] = 'pt_PhoneModel';
    	}else{
    		$emptyCondition = false; 
    		$condition['pt_PhoneModel']=$this->pt_PhoneModel;
    	}
    	if (!isset($this->pt_PhoneSys)){
    		$emptyFields = false;
    		$fields[] = 'pt_PhoneSys';
    	}else{
    		$emptyCondition = false; 
    		$condition['pt_PhoneSys']=$this->pt_PhoneSys;
    	}
    	if (!isset($this->pt_PhoneIMEI)){
    		$emptyFields = false;
    		$fields[] = 'pt_PhoneIMEI';
    	}else{
    		$emptyCondition = false; 
    		$condition['pt_PhoneIMEI']=$this->pt_PhoneIMEI;
    	}
    	if (!isset($this->pt_IDCard)){
    		$emptyFields = false;
    		$fields[] = 'pt_IDCard';
    	}else{
    		$emptyCondition = false; 
    		$condition['pt_IDCard']=$this->pt_IDCard;
    	}
    	if (!isset($this->pt_IDCardType)){
    		$emptyFields = false;
    		$fields[] = 'pt_IDCardType';
    	}else{
    		$emptyCondition = false; 
    		$condition['pt_IDCardType']=$this->pt_IDCardType;
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
    	if (!isset($this->pt_MerchantCode)){
    		$emptyFields = false;
    		$fields[] = 'pt_MerchantCode';
    	}else{
    		$emptyCondition = false; 
    		$condition['pt_MerchantCode']=$this->pt_MerchantCode;
    	}
    	if (!isset($this->pt_RegisteSource)){
    		$emptyFields = false;
    		$fields[] = 'pt_RegisteSource';
    	}else{
    		$emptyCondition = false; 
    		$condition['pt_RegisteSource']=$this->pt_RegisteSource;
    	}
    	if (!isset($this->pt_AccountOtherState)){
    		$emptyFields = false;
    		$fields[] = 'pt_AccountOtherState';
    	}else{
    		$emptyCondition = false; 
    		$condition['pt_AccountOtherState']=$this->pt_AccountOtherState;
    	}
    	if (!isset($this->pt_Province)){
    		$emptyFields = false;
    		$fields[] = 'pt_Province';
    	}else{
    		$emptyCondition = false; 
    		$condition['pt_Province']=$this->pt_Province;
    	}
    	if (!isset($this->pt_City)){
    		$emptyFields = false;
    		$fields[] = 'pt_City';
    	}else{
    		$emptyCondition = false; 
    		$condition['pt_City']=$this->pt_City;
    	}
    	if (!isset($this->pt_Address)){
    		$emptyFields = false;
    		$fields[] = 'pt_Address';
    	}else{
    		$emptyCondition = false; 
    		$condition['pt_Address']=$this->pt_Address;
    	}
    	if (!isset($this->pt_Postalcode)){
    		$emptyFields = false;
    		$fields[] = 'pt_Postalcode';
    	}else{
    		$emptyCondition = false; 
    		$condition['pt_Postalcode']=$this->pt_Postalcode;
    	}
    	if (!isset($this->pt_LockBeginTime)){
    		$emptyFields = false;
    		$fields[] = 'pt_LockBeginTime';
    	}else{
    		$emptyCondition = false; 
    		$condition['pt_LockBeginTime']=$this->pt_LockBeginTime;
    	}
    	if (!isset($this->pt_LockEndTime)){
    		$emptyFields = false;
    		$fields[] = 'pt_LockEndTime';
    	}else{
    		$emptyCondition = false; 
    		$condition['pt_LockEndTime']=$this->pt_LockEndTime;
    	}
    	if (!isset($this->pt_Rank)){
    		$emptyFields = false;
    		$fields[] = 'pt_Rank';
    	}else{
    		$emptyCondition = false; 
    		$condition['pt_Rank']=$this->pt_Rank;
    	}
    	if (!isset($this->pt_Score)){
    		$emptyFields = false;
    		$fields[] = 'pt_Score';
    	}else{
    		$emptyCondition = false; 
    		$condition['pt_Score']=$this->pt_Score;
    	}
    	if (!isset($this->pt_Game)){
    		$emptyFields = false;
    		$fields[] = 'pt_Game';
    	}else{
    		$emptyCondition = false; 
    		$condition['pt_Game']=$this->pt_Game;
    	}
    	if (!isset($this->pt_BindType)){
    		$emptyFields = false;
    		$fields[] = 'pt_BindType';
    	}else{
    		$emptyCondition = false; 
    		$condition['pt_BindType']=$this->pt_BindType;
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
				
		if (!isset($this->pt_AccountKey)) $this->pt_AccountKey = get_mysql_insert_id(self::$_db_name);

		
		$this->clean();
		
		return true;	
		
	}
	
	public function /*boolean*/ save(/*array*/$condition=NULL)
	{
		if (empty($condition))
		{
			$uc = "`pt_AccountKey`='{$this->pt_AccountKey}'";
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
		
		$sql = "DELETE FROM `PT_Account` WHERE ".SQLUtil::parseCondition($condition);
		
		$qr = sql_query(self::$_db_name,$sql);
				
		return (boolean)$qr;
	}
	
	public function /*boolean*/ delete()
	{
		if (!$this->is_set_keys())
		{
			return false;
		}
		
		$sql = "DELETE FROM `PT_Account` WHERE `pt_AccountKey`='{$this->pt_AccountKey}'";
		

		$qr = sql_query(self::$_db_name,$sql);
				
		return (boolean)$qr;
	}
	
	public function getInsertValue($fields)
	{
		$values = "(";		
		foreach($fields as $f => $k){
			if($f == 'pt_AccountKey'){
 				$values .= "'{$this->pt_AccountKey}',";
 			}else if($f == 'pt_AccountID'){
 				$values .= "'{$this->pt_AccountID}',";
 			}else if($f == 'pt_Email'){
 				$values .= "'{$this->pt_Email}',";
 			}else if($f == 'pt_HashID'){
 				$values .= "'{$this->pt_HashID}',";
 			}else if($f == 'pt_Password'){
 				$values .= "'{$this->pt_Password}',";
 			}else if($f == 'pt_PasswordLevel'){
 				$values .= "'{$this->pt_PasswordLevel}',";
 			}else if($f == 'pt_Name'){
 				$values .= "'{$this->pt_Name}',";
 			}else if($f == 'pt_NickName'){
 				$values .= "'{$this->pt_NickName}',";
 			}else if($f == 'pt_Sex'){
 				$values .= "'{$this->pt_Sex}',";
 			}else if($f == 'pt_Birthday'){
 				$values .= "'{$this->pt_Birthday}',";
 			}else if($f == 'pt_EmailState'){
 				$values .= "'{$this->pt_EmailState}',";
 			}else if($f == 'pt_LeCion'){
 				$values .= "'{$this->pt_LeCion}',";
 			}else if($f == 'pt_PhoneNumber'){
 				$values .= "'{$this->pt_PhoneNumber}',";
 			}else if($f == 'pt_PhoneModel'){
 				$values .= "'{$this->pt_PhoneModel}',";
 			}else if($f == 'pt_PhoneSys'){
 				$values .= "'{$this->pt_PhoneSys}',";
 			}else if($f == 'pt_PhoneIMEI'){
 				$values .= "'{$this->pt_PhoneIMEI}',";
 			}else if($f == 'pt_IDCard'){
 				$values .= "'{$this->pt_IDCard}',";
 			}else if($f == 'pt_IDCardType'){
 				$values .= "'{$this->pt_IDCardType}',";
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
 			}else if($f == 'pt_MerchantCode'){
 				$values .= "'{$this->pt_MerchantCode}',";
 			}else if($f == 'pt_RegisteSource'){
 				$values .= "'{$this->pt_RegisteSource}',";
 			}else if($f == 'pt_AccountOtherState'){
 				$values .= "'{$this->pt_AccountOtherState}',";
 			}else if($f == 'pt_Province'){
 				$values .= "'{$this->pt_Province}',";
 			}else if($f == 'pt_City'){
 				$values .= "'{$this->pt_City}',";
 			}else if($f == 'pt_Address'){
 				$values .= "'{$this->pt_Address}',";
 			}else if($f == 'pt_Postalcode'){
 				$values .= "'{$this->pt_Postalcode}',";
 			}else if($f == 'pt_LockBeginTime'){
 				$values .= "'{$this->pt_LockBeginTime}',";
 			}else if($f == 'pt_LockEndTime'){
 				$values .= "'{$this->pt_LockEndTime}',";
 			}else if($f == 'pt_Rank'){
 				$values .= "'{$this->pt_Rank}',";
 			}else if($f == 'pt_Score'){
 				$values .= "'{$this->pt_Score}',";
 			}else if($f == 'pt_Game'){
 				$values .= "'{$this->pt_Game}',";
 			}else if($f == 'pt_BindType'){
 				$values .= "'{$this->pt_BindType}',";
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

		if (isset($this->pt_AccountKey))
		{
			$fields .= "`pt_AccountKey`,";
			$values .= "'{$this->pt_AccountKey}',";
		}
		if (isset($this->pt_AccountID))
		{
			$fields .= "`pt_AccountID`,";
			$values .= "'{$this->pt_AccountID}',";
		}
		if (isset($this->pt_Email))
		{
			$fields .= "`pt_Email`,";
			$values .= "'{$this->pt_Email}',";
		}
		if (isset($this->pt_HashID))
		{
			$fields .= "`pt_HashID`,";
			$values .= "'{$this->pt_HashID}',";
		}
		if (isset($this->pt_Password))
		{
			$fields .= "`pt_Password`,";
			$values .= "'{$this->pt_Password}',";
		}
		if (isset($this->pt_PasswordLevel))
		{
			$fields .= "`pt_PasswordLevel`,";
			$values .= "'{$this->pt_PasswordLevel}',";
		}
		if (isset($this->pt_Name))
		{
			$fields .= "`pt_Name`,";
			$values .= "'{$this->pt_Name}',";
		}
		if (isset($this->pt_NickName))
		{
			$fields .= "`pt_NickName`,";
			$values .= "'{$this->pt_NickName}',";
		}
		if (isset($this->pt_Sex))
		{
			$fields .= "`pt_Sex`,";
			$values .= "'{$this->pt_Sex}',";
		}
		if (isset($this->pt_Birthday))
		{
			$fields .= "`pt_Birthday`,";
			$values .= "'{$this->pt_Birthday}',";
		}
		if (isset($this->pt_EmailState))
		{
			$fields .= "`pt_EmailState`,";
			$values .= "'{$this->pt_EmailState}',";
		}
		if (isset($this->pt_LeCion))
		{
			$fields .= "`pt_LeCion`,";
			$values .= "'{$this->pt_LeCion}',";
		}
		if (isset($this->pt_PhoneNumber))
		{
			$fields .= "`pt_PhoneNumber`,";
			$values .= "'{$this->pt_PhoneNumber}',";
		}
		if (isset($this->pt_PhoneModel))
		{
			$fields .= "`pt_PhoneModel`,";
			$values .= "'{$this->pt_PhoneModel}',";
		}
		if (isset($this->pt_PhoneSys))
		{
			$fields .= "`pt_PhoneSys`,";
			$values .= "'{$this->pt_PhoneSys}',";
		}
		if (isset($this->pt_PhoneIMEI))
		{
			$fields .= "`pt_PhoneIMEI`,";
			$values .= "'{$this->pt_PhoneIMEI}',";
		}
		if (isset($this->pt_IDCard))
		{
			$fields .= "`pt_IDCard`,";
			$values .= "'{$this->pt_IDCard}',";
		}
		if (isset($this->pt_IDCardType))
		{
			$fields .= "`pt_IDCardType`,";
			$values .= "'{$this->pt_IDCardType}',";
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
		if (isset($this->pt_MerchantCode))
		{
			$fields .= "`pt_MerchantCode`,";
			$values .= "'{$this->pt_MerchantCode}',";
		}
		if (isset($this->pt_RegisteSource))
		{
			$fields .= "`pt_RegisteSource`,";
			$values .= "'{$this->pt_RegisteSource}',";
		}
		if (isset($this->pt_AccountOtherState))
		{
			$fields .= "`pt_AccountOtherState`,";
			$values .= "'{$this->pt_AccountOtherState}',";
		}
		if (isset($this->pt_Province))
		{
			$fields .= "`pt_Province`,";
			$values .= "'{$this->pt_Province}',";
		}
		if (isset($this->pt_City))
		{
			$fields .= "`pt_City`,";
			$values .= "'{$this->pt_City}',";
		}
		if (isset($this->pt_Address))
		{
			$fields .= "`pt_Address`,";
			$values .= "'{$this->pt_Address}',";
		}
		if (isset($this->pt_Postalcode))
		{
			$fields .= "`pt_Postalcode`,";
			$values .= "'{$this->pt_Postalcode}',";
		}
		if (isset($this->pt_LockBeginTime))
		{
			$fields .= "`pt_LockBeginTime`,";
			$values .= "'{$this->pt_LockBeginTime}',";
		}
		if (isset($this->pt_LockEndTime))
		{
			$fields .= "`pt_LockEndTime`,";
			$values .= "'{$this->pt_LockEndTime}',";
		}
		if (isset($this->pt_Rank))
		{
			$fields .= "`pt_Rank`,";
			$values .= "'{$this->pt_Rank}',";
		}
		if (isset($this->pt_Score))
		{
			$fields .= "`pt_Score`,";
			$values .= "'{$this->pt_Score}',";
		}
		if (isset($this->pt_Game))
		{
			$fields .= "`pt_Game`,";
			$values .= "'{$this->pt_Game}',";
		}
		if (isset($this->pt_BindType))
		{
			$fields .= "`pt_BindType`,";
			$values .= "'{$this->pt_BindType}',";
		}

		
		$fields .= ")";
		$values .= ")";
		
		$sql = "INSERT INTO `PT_Account` ".$fields.$values;
		
		return str_replace(",)",")",$sql);
	}
	
	private function /*string*/ getUpdateFields()
	{
		$update = "";
		
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
		if ($this->is_pt_Email_dirty)
		{			
			if (!isset($this->pt_Email))
			{
				$update .= ("`pt_Email`=null,");
			}
			else
			{
				$update .= ("`pt_Email`='{$this->pt_Email}',");
			}
		}
		if ($this->is_pt_HashID_dirty)
		{			
			if (!isset($this->pt_HashID))
			{
				$update .= ("`pt_HashID`=null,");
			}
			else
			{
				$update .= ("`pt_HashID`='{$this->pt_HashID}',");
			}
		}
		if ($this->is_pt_Password_dirty)
		{			
			if (!isset($this->pt_Password))
			{
				$update .= ("`pt_Password`=null,");
			}
			else
			{
				$update .= ("`pt_Password`='{$this->pt_Password}',");
			}
		}
		if ($this->is_pt_PasswordLevel_dirty)
		{			
			if (!isset($this->pt_PasswordLevel))
			{
				$update .= ("`pt_PasswordLevel`=null,");
			}
			else
			{
				$update .= ("`pt_PasswordLevel`='{$this->pt_PasswordLevel}',");
			}
		}
		if ($this->is_pt_Name_dirty)
		{			
			if (!isset($this->pt_Name))
			{
				$update .= ("`pt_Name`=null,");
			}
			else
			{
				$update .= ("`pt_Name`='{$this->pt_Name}',");
			}
		}
		if ($this->is_pt_NickName_dirty)
		{			
			if (!isset($this->pt_NickName))
			{
				$update .= ("`pt_NickName`=null,");
			}
			else
			{
				$update .= ("`pt_NickName`='{$this->pt_NickName}',");
			}
		}
		if ($this->is_pt_Sex_dirty)
		{			
			if (!isset($this->pt_Sex))
			{
				$update .= ("`pt_Sex`=null,");
			}
			else
			{
				$update .= ("`pt_Sex`='{$this->pt_Sex}',");
			}
		}
		if ($this->is_pt_Birthday_dirty)
		{			
			if (!isset($this->pt_Birthday))
			{
				$update .= ("`pt_Birthday`=null,");
			}
			else
			{
				$update .= ("`pt_Birthday`='{$this->pt_Birthday}',");
			}
		}
		if ($this->is_pt_EmailState_dirty)
		{			
			if (!isset($this->pt_EmailState))
			{
				$update .= ("`pt_EmailState`=null,");
			}
			else
			{
				$update .= ("`pt_EmailState`='{$this->pt_EmailState}',");
			}
		}
		if ($this->is_pt_LeCion_dirty)
		{			
			if (!isset($this->pt_LeCion))
			{
				$update .= ("`pt_LeCion`=null,");
			}
			else
			{
				$update .= ("`pt_LeCion`='{$this->pt_LeCion}',");
			}
		}
		if ($this->is_pt_PhoneNumber_dirty)
		{			
			if (!isset($this->pt_PhoneNumber))
			{
				$update .= ("`pt_PhoneNumber`=null,");
			}
			else
			{
				$update .= ("`pt_PhoneNumber`='{$this->pt_PhoneNumber}',");
			}
		}
		if ($this->is_pt_PhoneModel_dirty)
		{			
			if (!isset($this->pt_PhoneModel))
			{
				$update .= ("`pt_PhoneModel`=null,");
			}
			else
			{
				$update .= ("`pt_PhoneModel`='{$this->pt_PhoneModel}',");
			}
		}
		if ($this->is_pt_PhoneSys_dirty)
		{			
			if (!isset($this->pt_PhoneSys))
			{
				$update .= ("`pt_PhoneSys`=null,");
			}
			else
			{
				$update .= ("`pt_PhoneSys`='{$this->pt_PhoneSys}',");
			}
		}
		if ($this->is_pt_PhoneIMEI_dirty)
		{			
			if (!isset($this->pt_PhoneIMEI))
			{
				$update .= ("`pt_PhoneIMEI`=null,");
			}
			else
			{
				$update .= ("`pt_PhoneIMEI`='{$this->pt_PhoneIMEI}',");
			}
		}
		if ($this->is_pt_IDCard_dirty)
		{			
			if (!isset($this->pt_IDCard))
			{
				$update .= ("`pt_IDCard`=null,");
			}
			else
			{
				$update .= ("`pt_IDCard`='{$this->pt_IDCard}',");
			}
		}
		if ($this->is_pt_IDCardType_dirty)
		{			
			if (!isset($this->pt_IDCardType))
			{
				$update .= ("`pt_IDCardType`=null,");
			}
			else
			{
				$update .= ("`pt_IDCardType`='{$this->pt_IDCardType}',");
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
		if ($this->is_pt_MerchantCode_dirty)
		{			
			if (!isset($this->pt_MerchantCode))
			{
				$update .= ("`pt_MerchantCode`=null,");
			}
			else
			{
				$update .= ("`pt_MerchantCode`='{$this->pt_MerchantCode}',");
			}
		}
		if ($this->is_pt_RegisteSource_dirty)
		{			
			if (!isset($this->pt_RegisteSource))
			{
				$update .= ("`pt_RegisteSource`=null,");
			}
			else
			{
				$update .= ("`pt_RegisteSource`='{$this->pt_RegisteSource}',");
			}
		}
		if ($this->is_pt_AccountOtherState_dirty)
		{			
			if (!isset($this->pt_AccountOtherState))
			{
				$update .= ("`pt_AccountOtherState`=null,");
			}
			else
			{
				$update .= ("`pt_AccountOtherState`='{$this->pt_AccountOtherState}',");
			}
		}
		if ($this->is_pt_Province_dirty)
		{			
			if (!isset($this->pt_Province))
			{
				$update .= ("`pt_Province`=null,");
			}
			else
			{
				$update .= ("`pt_Province`='{$this->pt_Province}',");
			}
		}
		if ($this->is_pt_City_dirty)
		{			
			if (!isset($this->pt_City))
			{
				$update .= ("`pt_City`=null,");
			}
			else
			{
				$update .= ("`pt_City`='{$this->pt_City}',");
			}
		}
		if ($this->is_pt_Address_dirty)
		{			
			if (!isset($this->pt_Address))
			{
				$update .= ("`pt_Address`=null,");
			}
			else
			{
				$update .= ("`pt_Address`='{$this->pt_Address}',");
			}
		}
		if ($this->is_pt_Postalcode_dirty)
		{			
			if (!isset($this->pt_Postalcode))
			{
				$update .= ("`pt_Postalcode`=null,");
			}
			else
			{
				$update .= ("`pt_Postalcode`='{$this->pt_Postalcode}',");
			}
		}
		if ($this->is_pt_LockBeginTime_dirty)
		{			
			if (!isset($this->pt_LockBeginTime))
			{
				$update .= ("`pt_LockBeginTime`=null,");
			}
			else
			{
				$update .= ("`pt_LockBeginTime`='{$this->pt_LockBeginTime}',");
			}
		}
		if ($this->is_pt_LockEndTime_dirty)
		{			
			if (!isset($this->pt_LockEndTime))
			{
				$update .= ("`pt_LockEndTime`=null,");
			}
			else
			{
				$update .= ("`pt_LockEndTime`='{$this->pt_LockEndTime}',");
			}
		}
		if ($this->is_pt_Rank_dirty)
		{			
			if (!isset($this->pt_Rank))
			{
				$update .= ("`pt_Rank`=null,");
			}
			else
			{
				$update .= ("`pt_Rank`='{$this->pt_Rank}',");
			}
		}
		if ($this->is_pt_Score_dirty)
		{			
			if (!isset($this->pt_Score))
			{
				$update .= ("`pt_Score`=null,");
			}
			else
			{
				$update .= ("`pt_Score`='{$this->pt_Score}',");
			}
		}
		if ($this->is_pt_Game_dirty)
		{			
			if (!isset($this->pt_Game))
			{
				$update .= ("`pt_Game`=null,");
			}
			else
			{
				$update .= ("`pt_Game`='{$this->pt_Game}',");
			}
		}
		if ($this->is_pt_BindType_dirty)
		{			
			if (!isset($this->pt_BindType))
			{
				$update .= ("`pt_BindType`=null,");
			}
			else
			{
				$update .= ("`pt_BindType`='{$this->pt_BindType}',");
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
		
		$sql = "UPDATE `PT_Account` SET {$update} WHERE {$condition}";
		
		return $sql;
	}
	
	public function /*boolean*/ add($fieldsValue,$condition=NULL)
	{				
		if (empty($condition))
		{
			$uc = "`pt_AccountKey`='{$this->pt_AccountKey}'";
		}
		else
		{			
			$uc = SQLUtil::parseCondition($condition);
		}
		
		$update = SQLUtil::parseASFieldValues($fieldsValue);
		
		$sql = "UPDATE `PT_Account` SET {$update} WHERE {$uc}";
		
		$qr = sql_query(self::$_db_name,$sql);
				
		return (boolean)$qr;
	}	
	
	public function /*boolean*/ sub($fieldsValue,$condition=NULL)
	{
		if (empty($condition))
		{
			$uc = "`pt_AccountKey`='{$this->pt_AccountKey}'";
		}
		else
		{			
			$uc = SQLUtil::parseCondition($condition);
		}
		
		$update = SQLUtil::parseASFieldValues($fieldsValue,false);
		
		$sql = "UPDATE `PT_Account` SET {$update} WHERE {$uc}";
		
		$qr = sql_query(self::$_db_name,$sql);
				
		return (boolean)$qr;
	}
	
	/**
	 * 是否已经设置主键的值
	 */
	public function is_set_keys()
	{
		
		return (isset($this->pt_AccountKey));

	}
	
	private function /*void*/ clean() 
	{
		$this->is_this_table_dirty = false;
		$this->is_pt_AccountKey_dirty = false;
		$this->is_pt_AccountID_dirty = false;
		$this->is_pt_Email_dirty = false;
		$this->is_pt_HashID_dirty = false;
		$this->is_pt_Password_dirty = false;
		$this->is_pt_PasswordLevel_dirty = false;
		$this->is_pt_Name_dirty = false;
		$this->is_pt_NickName_dirty = false;
		$this->is_pt_Sex_dirty = false;
		$this->is_pt_Birthday_dirty = false;
		$this->is_pt_EmailState_dirty = false;
		$this->is_pt_LeCion_dirty = false;
		$this->is_pt_PhoneNumber_dirty = false;
		$this->is_pt_PhoneModel_dirty = false;
		$this->is_pt_PhoneSys_dirty = false;
		$this->is_pt_PhoneIMEI_dirty = false;
		$this->is_pt_IDCard_dirty = false;
		$this->is_pt_IDCardType_dirty = false;
		$this->is_pt_RegisteTime_dirty = false;
		$this->is_pt_RegisteIP_dirty = false;
		$this->is_pt_AccountState_dirty = false;
		$this->is_pt_LastLoginTime_dirty = false;
		$this->is_pt_LastLoginIP_dirty = false;
		$this->is_pt_MerchantCode_dirty = false;
		$this->is_pt_RegisteSource_dirty = false;
		$this->is_pt_AccountOtherState_dirty = false;
		$this->is_pt_Province_dirty = false;
		$this->is_pt_City_dirty = false;
		$this->is_pt_Address_dirty = false;
		$this->is_pt_Postalcode_dirty = false;
		$this->is_pt_LockBeginTime_dirty = false;
		$this->is_pt_LockEndTime_dirty = false;
		$this->is_pt_Rank_dirty = false;
		$this->is_pt_Score_dirty = false;
		$this->is_pt_Game_dirty = false;
		$this->is_pt_BindType_dirty = false;

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

	public function /*string*/ getPtEmail()
	{
		return $this->pt_Email;
	}
	
	public function /*void*/ setPtEmail(/*string*/ $pt_Email)
	{
		$this->pt_Email = SQLUtil::toSafeSQLString($pt_Email);
		$this->is_pt_Email_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setPtEmailNull()
	{
		$this->pt_Email = null;
		$this->is_pt_Email_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*string*/ getPtHashID()
	{
		return $this->pt_HashID;
	}
	
	public function /*void*/ setPtHashID(/*string*/ $pt_HashID)
	{
		$this->pt_HashID = SQLUtil::toSafeSQLString($pt_HashID);
		$this->is_pt_HashID_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setPtHashIDNull()
	{
		$this->pt_HashID = null;
		$this->is_pt_HashID_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*string*/ getPtPassword()
	{
		return $this->pt_Password;
	}
	
	public function /*void*/ setPtPassword(/*string*/ $pt_Password)
	{
		$this->pt_Password = SQLUtil::toSafeSQLString($pt_Password);
		$this->is_pt_Password_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setPtPasswordNull()
	{
		$this->pt_Password = null;
		$this->is_pt_Password_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*int*/ getPtPasswordLevel()
	{
		return $this->pt_PasswordLevel;
	}
	
	public function /*void*/ setPtPasswordLevel(/*int*/ $pt_PasswordLevel)
	{
		$this->pt_PasswordLevel = intval($pt_PasswordLevel);
		$this->is_pt_PasswordLevel_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setPtPasswordLevelNull()
	{
		$this->pt_PasswordLevel = null;
		$this->is_pt_PasswordLevel_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*string*/ getPtName()
	{
		return $this->pt_Name;
	}
	
	public function /*void*/ setPtName(/*string*/ $pt_Name)
	{
		$this->pt_Name = SQLUtil::toSafeSQLString($pt_Name);
		$this->is_pt_Name_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setPtNameNull()
	{
		$this->pt_Name = null;
		$this->is_pt_Name_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*string*/ getPtNickName()
	{
		return $this->pt_NickName;
	}
	
	public function /*void*/ setPtNickName(/*string*/ $pt_NickName)
	{
		$this->pt_NickName = SQLUtil::toSafeSQLString($pt_NickName);
		$this->is_pt_NickName_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setPtNickNameNull()
	{
		$this->pt_NickName = null;
		$this->is_pt_NickName_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*int*/ getPtSex()
	{
		return $this->pt_Sex;
	}
	
	public function /*void*/ setPtSex(/*int*/ $pt_Sex)
	{
		$this->pt_Sex = intval($pt_Sex);
		$this->is_pt_Sex_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setPtSexNull()
	{
		$this->pt_Sex = null;
		$this->is_pt_Sex_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*string*/ getPtBirthday()
	{
		return $this->pt_Birthday;
	}
	
	public function /*void*/ setPtBirthday(/*string*/ $pt_Birthday)
	{
		$this->pt_Birthday = SQLUtil::toSafeSQLString($pt_Birthday);
		$this->is_pt_Birthday_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setPtBirthdayNull()
	{
		$this->pt_Birthday = null;
		$this->is_pt_Birthday_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*int*/ getPtEmailState()
	{
		return $this->pt_EmailState;
	}
	
	public function /*void*/ setPtEmailState(/*int*/ $pt_EmailState)
	{
		$this->pt_EmailState = intval($pt_EmailState);
		$this->is_pt_EmailState_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setPtEmailStateNull()
	{
		$this->pt_EmailState = null;
		$this->is_pt_EmailState_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*int*/ getPtLeCion()
	{
		return $this->pt_LeCion;
	}
	
	public function /*void*/ setPtLeCion(/*int*/ $pt_LeCion)
	{
		$this->pt_LeCion = intval($pt_LeCion);
		$this->is_pt_LeCion_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setPtLeCionNull()
	{
		$this->pt_LeCion = null;
		$this->is_pt_LeCion_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*string*/ getPtPhoneNumber()
	{
		return $this->pt_PhoneNumber;
	}
	
	public function /*void*/ setPtPhoneNumber(/*string*/ $pt_PhoneNumber)
	{
		$this->pt_PhoneNumber = SQLUtil::toSafeSQLString($pt_PhoneNumber);
		$this->is_pt_PhoneNumber_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setPtPhoneNumberNull()
	{
		$this->pt_PhoneNumber = null;
		$this->is_pt_PhoneNumber_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*string*/ getPtPhoneModel()
	{
		return $this->pt_PhoneModel;
	}
	
	public function /*void*/ setPtPhoneModel(/*string*/ $pt_PhoneModel)
	{
		$this->pt_PhoneModel = SQLUtil::toSafeSQLString($pt_PhoneModel);
		$this->is_pt_PhoneModel_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setPtPhoneModelNull()
	{
		$this->pt_PhoneModel = null;
		$this->is_pt_PhoneModel_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*string*/ getPtPhoneSys()
	{
		return $this->pt_PhoneSys;
	}
	
	public function /*void*/ setPtPhoneSys(/*string*/ $pt_PhoneSys)
	{
		$this->pt_PhoneSys = SQLUtil::toSafeSQLString($pt_PhoneSys);
		$this->is_pt_PhoneSys_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setPtPhoneSysNull()
	{
		$this->pt_PhoneSys = null;
		$this->is_pt_PhoneSys_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*string*/ getPtPhoneIMEI()
	{
		return $this->pt_PhoneIMEI;
	}
	
	public function /*void*/ setPtPhoneIMEI(/*string*/ $pt_PhoneIMEI)
	{
		$this->pt_PhoneIMEI = SQLUtil::toSafeSQLString($pt_PhoneIMEI);
		$this->is_pt_PhoneIMEI_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setPtPhoneIMEINull()
	{
		$this->pt_PhoneIMEI = null;
		$this->is_pt_PhoneIMEI_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*string*/ getPtIDCard()
	{
		return $this->pt_IDCard;
	}
	
	public function /*void*/ setPtIDCard(/*string*/ $pt_IDCard)
	{
		$this->pt_IDCard = SQLUtil::toSafeSQLString($pt_IDCard);
		$this->is_pt_IDCard_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setPtIDCardNull()
	{
		$this->pt_IDCard = null;
		$this->is_pt_IDCard_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*int*/ getPtIDCardType()
	{
		return $this->pt_IDCardType;
	}
	
	public function /*void*/ setPtIDCardType(/*int*/ $pt_IDCardType)
	{
		$this->pt_IDCardType = intval($pt_IDCardType);
		$this->is_pt_IDCardType_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setPtIDCardTypeNull()
	{
		$this->pt_IDCardType = null;
		$this->is_pt_IDCardType_dirty = true;		
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

	public function /*string*/ getPtMerchantCode()
	{
		return $this->pt_MerchantCode;
	}
	
	public function /*void*/ setPtMerchantCode(/*string*/ $pt_MerchantCode)
	{
		$this->pt_MerchantCode = SQLUtil::toSafeSQLString($pt_MerchantCode);
		$this->is_pt_MerchantCode_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setPtMerchantCodeNull()
	{
		$this->pt_MerchantCode = null;
		$this->is_pt_MerchantCode_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*string*/ getPtRegisteSource()
	{
		return $this->pt_RegisteSource;
	}
	
	public function /*void*/ setPtRegisteSource(/*string*/ $pt_RegisteSource)
	{
		$this->pt_RegisteSource = SQLUtil::toSafeSQLString($pt_RegisteSource);
		$this->is_pt_RegisteSource_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setPtRegisteSourceNull()
	{
		$this->pt_RegisteSource = null;
		$this->is_pt_RegisteSource_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*int*/ getPtAccountOtherState()
	{
		return $this->pt_AccountOtherState;
	}
	
	public function /*void*/ setPtAccountOtherState(/*int*/ $pt_AccountOtherState)
	{
		$this->pt_AccountOtherState = intval($pt_AccountOtherState);
		$this->is_pt_AccountOtherState_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setPtAccountOtherStateNull()
	{
		$this->pt_AccountOtherState = null;
		$this->is_pt_AccountOtherState_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*string*/ getPtProvince()
	{
		return $this->pt_Province;
	}
	
	public function /*void*/ setPtProvince(/*string*/ $pt_Province)
	{
		$this->pt_Province = SQLUtil::toSafeSQLString($pt_Province);
		$this->is_pt_Province_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setPtProvinceNull()
	{
		$this->pt_Province = null;
		$this->is_pt_Province_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*string*/ getPtCity()
	{
		return $this->pt_City;
	}
	
	public function /*void*/ setPtCity(/*string*/ $pt_City)
	{
		$this->pt_City = SQLUtil::toSafeSQLString($pt_City);
		$this->is_pt_City_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setPtCityNull()
	{
		$this->pt_City = null;
		$this->is_pt_City_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*string*/ getPtAddress()
	{
		return $this->pt_Address;
	}
	
	public function /*void*/ setPtAddress(/*string*/ $pt_Address)
	{
		$this->pt_Address = SQLUtil::toSafeSQLString($pt_Address);
		$this->is_pt_Address_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setPtAddressNull()
	{
		$this->pt_Address = null;
		$this->is_pt_Address_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*string*/ getPtPostalcode()
	{
		return $this->pt_Postalcode;
	}
	
	public function /*void*/ setPtPostalcode(/*string*/ $pt_Postalcode)
	{
		$this->pt_Postalcode = SQLUtil::toSafeSQLString($pt_Postalcode);
		$this->is_pt_Postalcode_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setPtPostalcodeNull()
	{
		$this->pt_Postalcode = null;
		$this->is_pt_Postalcode_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*string*/ getPtLockBeginTime()
	{
		return $this->pt_LockBeginTime;
	}
	
	public function /*void*/ setPtLockBeginTime(/*string*/ $pt_LockBeginTime)
	{
		$this->pt_LockBeginTime = SQLUtil::toSafeSQLString($pt_LockBeginTime);
		$this->is_pt_LockBeginTime_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setPtLockBeginTimeNull()
	{
		$this->pt_LockBeginTime = null;
		$this->is_pt_LockBeginTime_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*string*/ getPtLockEndTime()
	{
		return $this->pt_LockEndTime;
	}
	
	public function /*void*/ setPtLockEndTime(/*string*/ $pt_LockEndTime)
	{
		$this->pt_LockEndTime = SQLUtil::toSafeSQLString($pt_LockEndTime);
		$this->is_pt_LockEndTime_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setPtLockEndTimeNull()
	{
		$this->pt_LockEndTime = null;
		$this->is_pt_LockEndTime_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*int*/ getPtRank()
	{
		return $this->pt_Rank;
	}
	
	public function /*void*/ setPtRank(/*int*/ $pt_Rank)
	{
		$this->pt_Rank = intval($pt_Rank);
		$this->is_pt_Rank_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setPtRankNull()
	{
		$this->pt_Rank = null;
		$this->is_pt_Rank_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*int*/ getPtScore()
	{
		return $this->pt_Score;
	}
	
	public function /*void*/ setPtScore(/*int*/ $pt_Score)
	{
		$this->pt_Score = intval($pt_Score);
		$this->is_pt_Score_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setPtScoreNull()
	{
		$this->pt_Score = null;
		$this->is_pt_Score_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*string*/ getPtGame()
	{
		return $this->pt_Game;
	}
	
	public function /*void*/ setPtGame(/*string*/ $pt_Game)
	{
		$this->pt_Game = SQLUtil::toSafeSQLString($pt_Game);
		$this->is_pt_Game_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setPtGameNull()
	{
		$this->pt_Game = null;
		$this->is_pt_Game_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*int*/ getPtBindType()
	{
		return $this->pt_BindType;
	}
	
	public function /*void*/ setPtBindType(/*int*/ $pt_BindType)
	{
		$this->pt_BindType = intval($pt_BindType);
		$this->is_pt_BindType_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setPtBindTypeNull()
	{
		$this->pt_BindType = null;
		$this->is_pt_BindType_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	
	public function /*string*/ toDebugString()
	{
		$dbg = "(";
		
		$dbg .= ("pt_AccountKey={$this->pt_AccountKey},");
		$dbg .= ("pt_AccountID={$this->pt_AccountID},");
		$dbg .= ("pt_Email={$this->pt_Email},");
		$dbg .= ("pt_HashID={$this->pt_HashID},");
		$dbg .= ("pt_Password={$this->pt_Password},");
		$dbg .= ("pt_PasswordLevel={$this->pt_PasswordLevel},");
		$dbg .= ("pt_Name={$this->pt_Name},");
		$dbg .= ("pt_NickName={$this->pt_NickName},");
		$dbg .= ("pt_Sex={$this->pt_Sex},");
		$dbg .= ("pt_Birthday={$this->pt_Birthday},");
		$dbg .= ("pt_EmailState={$this->pt_EmailState},");
		$dbg .= ("pt_LeCion={$this->pt_LeCion},");
		$dbg .= ("pt_PhoneNumber={$this->pt_PhoneNumber},");
		$dbg .= ("pt_PhoneModel={$this->pt_PhoneModel},");
		$dbg .= ("pt_PhoneSys={$this->pt_PhoneSys},");
		$dbg .= ("pt_PhoneIMEI={$this->pt_PhoneIMEI},");
		$dbg .= ("pt_IDCard={$this->pt_IDCard},");
		$dbg .= ("pt_IDCardType={$this->pt_IDCardType},");
		$dbg .= ("pt_RegisteTime={$this->pt_RegisteTime},");
		$dbg .= ("pt_RegisteIP={$this->pt_RegisteIP},");
		$dbg .= ("pt_AccountState={$this->pt_AccountState},");
		$dbg .= ("pt_LastLoginTime={$this->pt_LastLoginTime},");
		$dbg .= ("pt_LastLoginIP={$this->pt_LastLoginIP},");
		$dbg .= ("pt_MerchantCode={$this->pt_MerchantCode},");
		$dbg .= ("pt_RegisteSource={$this->pt_RegisteSource},");
		$dbg .= ("pt_AccountOtherState={$this->pt_AccountOtherState},");
		$dbg .= ("pt_Province={$this->pt_Province},");
		$dbg .= ("pt_City={$this->pt_City},");
		$dbg .= ("pt_Address={$this->pt_Address},");
		$dbg .= ("pt_Postalcode={$this->pt_Postalcode},");
		$dbg .= ("pt_LockBeginTime={$this->pt_LockBeginTime},");
		$dbg .= ("pt_LockEndTime={$this->pt_LockEndTime},");
		$dbg .= ("pt_Rank={$this->pt_Rank},");
		$dbg .= ("pt_Score={$this->pt_Score},");
		$dbg .= ("pt_Game={$this->pt_Game},");
		$dbg .= ("pt_BindType={$this->pt_BindType},");

		$dbg .= ")";
				
		return str_replace(",)",")",$dbg);
	}
	
	public function fromArray($arr)
	{
		if (isset($arr['pt_AccountKey'])) $this->setPtAccountKey($arr['pt_AccountKey']);
		if (isset($arr['pt_AccountID'])) $this->setPtAccountID($arr['pt_AccountID']);
		if (isset($arr['pt_Email'])) $this->setPtEmail($arr['pt_Email']);
		if (isset($arr['pt_HashID'])) $this->setPtHashID($arr['pt_HashID']);
		if (isset($arr['pt_Password'])) $this->setPtPassword($arr['pt_Password']);
		if (isset($arr['pt_PasswordLevel'])) $this->setPtPasswordLevel($arr['pt_PasswordLevel']);
		if (isset($arr['pt_Name'])) $this->setPtName($arr['pt_Name']);
		if (isset($arr['pt_NickName'])) $this->setPtNickName($arr['pt_NickName']);
		if (isset($arr['pt_Sex'])) $this->setPtSex($arr['pt_Sex']);
		if (isset($arr['pt_Birthday'])) $this->setPtBirthday($arr['pt_Birthday']);
		if (isset($arr['pt_EmailState'])) $this->setPtEmailState($arr['pt_EmailState']);
		if (isset($arr['pt_LeCion'])) $this->setPtLeCion($arr['pt_LeCion']);
		if (isset($arr['pt_PhoneNumber'])) $this->setPtPhoneNumber($arr['pt_PhoneNumber']);
		if (isset($arr['pt_PhoneModel'])) $this->setPtPhoneModel($arr['pt_PhoneModel']);
		if (isset($arr['pt_PhoneSys'])) $this->setPtPhoneSys($arr['pt_PhoneSys']);
		if (isset($arr['pt_PhoneIMEI'])) $this->setPtPhoneIMEI($arr['pt_PhoneIMEI']);
		if (isset($arr['pt_IDCard'])) $this->setPtIDCard($arr['pt_IDCard']);
		if (isset($arr['pt_IDCardType'])) $this->setPtIDCardType($arr['pt_IDCardType']);
		if (isset($arr['pt_RegisteTime'])) $this->setPtRegisteTime($arr['pt_RegisteTime']);
		if (isset($arr['pt_RegisteIP'])) $this->setPtRegisteIP($arr['pt_RegisteIP']);
		if (isset($arr['pt_AccountState'])) $this->setPtAccountState($arr['pt_AccountState']);
		if (isset($arr['pt_LastLoginTime'])) $this->setPtLastLoginTime($arr['pt_LastLoginTime']);
		if (isset($arr['pt_LastLoginIP'])) $this->setPtLastLoginIP($arr['pt_LastLoginIP']);
		if (isset($arr['pt_MerchantCode'])) $this->setPtMerchantCode($arr['pt_MerchantCode']);
		if (isset($arr['pt_RegisteSource'])) $this->setPtRegisteSource($arr['pt_RegisteSource']);
		if (isset($arr['pt_AccountOtherState'])) $this->setPtAccountOtherState($arr['pt_AccountOtherState']);
		if (isset($arr['pt_Province'])) $this->setPtProvince($arr['pt_Province']);
		if (isset($arr['pt_City'])) $this->setPtCity($arr['pt_City']);
		if (isset($arr['pt_Address'])) $this->setPtAddress($arr['pt_Address']);
		if (isset($arr['pt_Postalcode'])) $this->setPtPostalcode($arr['pt_Postalcode']);
		if (isset($arr['pt_LockBeginTime'])) $this->setPtLockBeginTime($arr['pt_LockBeginTime']);
		if (isset($arr['pt_LockEndTime'])) $this->setPtLockEndTime($arr['pt_LockEndTime']);
		if (isset($arr['pt_Rank'])) $this->setPtRank($arr['pt_Rank']);
		if (isset($arr['pt_Score'])) $this->setPtScore($arr['pt_Score']);
		if (isset($arr['pt_Game'])) $this->setPtGame($arr['pt_Game']);
		if (isset($arr['pt_BindType'])) $this->setPtBindType($arr['pt_BindType']);
		
	}
	
	public function toArray()
	{
		$ret = array();
		$ret['pt_AccountKey'] = $this->pt_AccountKey;
		$ret['pt_AccountID'] = $this->pt_AccountID;
		$ret['pt_Email'] = $this->pt_Email;
		$ret['pt_HashID'] = $this->pt_HashID;
		$ret['pt_Password'] = $this->pt_Password;
		$ret['pt_PasswordLevel'] = $this->pt_PasswordLevel;
		$ret['pt_Name'] = $this->pt_Name;
		$ret['pt_NickName'] = $this->pt_NickName;
		$ret['pt_Sex'] = $this->pt_Sex;
		$ret['pt_Birthday'] = $this->pt_Birthday;
		$ret['pt_EmailState'] = $this->pt_EmailState;
		$ret['pt_LeCion'] = $this->pt_LeCion;
		$ret['pt_PhoneNumber'] = $this->pt_PhoneNumber;
		$ret['pt_PhoneModel'] = $this->pt_PhoneModel;
		$ret['pt_PhoneSys'] = $this->pt_PhoneSys;
		$ret['pt_PhoneIMEI'] = $this->pt_PhoneIMEI;
		$ret['pt_IDCard'] = $this->pt_IDCard;
		$ret['pt_IDCardType'] = $this->pt_IDCardType;
		$ret['pt_RegisteTime'] = $this->pt_RegisteTime;
		$ret['pt_RegisteIP'] = $this->pt_RegisteIP;
		$ret['pt_AccountState'] = $this->pt_AccountState;
		$ret['pt_LastLoginTime'] = $this->pt_LastLoginTime;
		$ret['pt_LastLoginIP'] = $this->pt_LastLoginIP;
		$ret['pt_MerchantCode'] = $this->pt_MerchantCode;
		$ret['pt_RegisteSource'] = $this->pt_RegisteSource;
		$ret['pt_AccountOtherState'] = $this->pt_AccountOtherState;
		$ret['pt_Province'] = $this->pt_Province;
		$ret['pt_City'] = $this->pt_City;
		$ret['pt_Address'] = $this->pt_Address;
		$ret['pt_Postalcode'] = $this->pt_Postalcode;
		$ret['pt_LockBeginTime'] = $this->pt_LockBeginTime;
		$ret['pt_LockEndTime'] = $this->pt_LockEndTime;
		$ret['pt_Rank'] = $this->pt_Rank;
		$ret['pt_Score'] = $this->pt_Score;
		$ret['pt_Game'] = $this->pt_Game;
		$ret['pt_BindType'] = $this->pt_BindType;

		return $ret;
	}
}

?>
