<?php
require_once (FRAMEWORK_PATH . "utils/MysqlDBHelper.php");
require_once (FRAMEWORK_PATH . "db/SQLUtil.php");
/**
 * database table CS_QuestionReply description
 * 
 * [This file was auto-generated. PLEASE DONT EDIT]
 * 
 * @author LiangZhixian
 * 
 */
class TbCSQuestionReply {
	
	public static $_db_name = "pf_basemanage";
	
	private /*string*/ $cs_QuestionReplyID; //PRIMARY KEY 
	private /*string*/ $cs_QuestionID;
	private /*int*/ $cs_QuestionReplyType; //1,7725玩家回复             2.外部玩家回复             3.客服回复
	private /*string*/ $pt_AccountKey;
	private /*string*/ $pt_OpenUID;
	private /*string*/ $pt_AccountID;
	private /*string*/ $bm_AccountID; //后台帐号ID
	private /*string*/ $bm_AccountName; //姓名
	private /*string*/ $cs_QuestionReplyDesc;
	private /*string*/ $cs_QuestionReplyModifyInfo;
	private /*string*/ $cs_AccessoryInfo;
	private /*string*/ $cs_ReplyIP;
	private /*string*/ $cs_ReplyTime;
	private /*int*/ $cs_QuestionReplyState; //0=默认             1=已回复             8=自己删除             9=管理员删除             

	
	private $is_this_table_dirty = false;
	private $is_cs_QuestionReplyID_dirty = false;
	private $is_cs_QuestionID_dirty = false;
	private $is_cs_QuestionReplyType_dirty = false;
	private $is_pt_AccountKey_dirty = false;
	private $is_pt_OpenUID_dirty = false;
	private $is_pt_AccountID_dirty = false;
	private $is_bm_AccountID_dirty = false;
	private $is_bm_AccountName_dirty = false;
	private $is_cs_QuestionReplyDesc_dirty = false;
	private $is_cs_QuestionReplyModifyInfo_dirty = false;
	private $is_cs_AccessoryInfo_dirty = false;
	private $is_cs_ReplyIP_dirty = false;
	private $is_cs_ReplyTime_dirty = false;
	private $is_cs_QuestionReplyState_dirty = false;


	/**
	 * @param array($condition)
	 * @return array(TbCSQuestionReply)
	 */
	public static function /*array(TbCSQuestionReply)*/ loadTable(/*array*/ $fields=NULL,/*array*/$condition=NULL)
	{
		$result = array();
		
		$f = "*";
		
		if(!empty($fields))
		{
			$f = SQLUtil::parseFields($fields);			
		}
		
		if (empty($condition))
		{
			$sql = "SELECT {$f} FROM `CS_QuestionReply`";
		}
		else
		{			
			$sql = "SELECT {$f} FROM `CS_QuestionReply` WHERE ".SQLUtil::parseCondition($condition);
		}			
		
		$ar = sql_fetch_rows_assoc(self::$_db_name,$sql);
		
		if (empty($ar) || count($ar) == 0)
		{
			return $result;
		}
		
		foreach($ar as $row)
		{
			$tb = new TbCSQuestionReply();			
			if (isset($row['cs_QuestionReplyID'])) $tb->cs_QuestionReplyID = $row['cs_QuestionReplyID'];
			if (isset($row['cs_QuestionID'])) $tb->cs_QuestionID = $row['cs_QuestionID'];
			if (isset($row['cs_QuestionReplyType'])) $tb->cs_QuestionReplyType = intval($row['cs_QuestionReplyType']);
			if (isset($row['pt_AccountKey'])) $tb->pt_AccountKey = $row['pt_AccountKey'];
			if (isset($row['pt_OpenUID'])) $tb->pt_OpenUID = $row['pt_OpenUID'];
			if (isset($row['pt_AccountID'])) $tb->pt_AccountID = $row['pt_AccountID'];
			if (isset($row['bm_AccountID'])) $tb->bm_AccountID = $row['bm_AccountID'];
			if (isset($row['bm_AccountName'])) $tb->bm_AccountName = $row['bm_AccountName'];
			if (isset($row['cs_QuestionReplyDesc'])) $tb->cs_QuestionReplyDesc = $row['cs_QuestionReplyDesc'];
			if (isset($row['cs_QuestionReplyModifyInfo'])) $tb->cs_QuestionReplyModifyInfo = $row['cs_QuestionReplyModifyInfo'];
			if (isset($row['cs_AccessoryInfo'])) $tb->cs_AccessoryInfo = $row['cs_AccessoryInfo'];
			if (isset($row['cs_ReplyIP'])) $tb->cs_ReplyIP = $row['cs_ReplyIP'];
			if (isset($row['cs_ReplyTime'])) $tb->cs_ReplyTime = $row['cs_ReplyTime'];
			if (isset($row['cs_QuestionReplyState'])) $tb->cs_QuestionReplyState = intval($row['cs_QuestionReplyState']);
		
			$result[] = $tb;
		}
		
		return $result;
	}	
	
	public static function insertSqlHeader(/*array*/ $fields=NULL)
	{
		$result = array();				
		if(!empty($fields)){
			$f = SQLUtil::parseFields($fields);			
			$result[0] = "INSERT INTO `CS_QuestionReply` ({$f}) VALUES ";	
			$ar = array();
			foreach($fields as $key){
				$ar[$key]=1;
			}
			$result[1] = $ar;
		}else{
			$result[0]="INSERT INTO `CS_QuestionReply` (`cs_QuestionReplyID`,`cs_QuestionID`,`cs_QuestionReplyType`,`pt_AccountKey`,`pt_OpenUID`,`pt_AccountID`,`bm_AccountID`,`bm_AccountName`,`cs_QuestionReplyDesc`,`cs_QuestionReplyModifyInfo`,`cs_AccessoryInfo`,`cs_ReplyIP`,`cs_ReplyTime`,`cs_QuestionReplyState`) VALUES ";
			$result[1] = array('cs_QuestionReplyID'=>1,'cs_QuestionID'=>1,'cs_QuestionReplyType'=>1,'pt_AccountKey'=>1,'pt_OpenUID'=>1,'pt_AccountID'=>1,'bm_AccountID'=>1,'bm_AccountName'=>1,'cs_QuestionReplyDesc'=>1,'cs_QuestionReplyModifyInfo'=>1,'cs_AccessoryInfo'=>1,'cs_ReplyIP'=>1,'cs_ReplyTime'=>1,'cs_QuestionReplyState'=>1);
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
		$c = "`cs_QuestionReplyID`='{$this->cs_QuestionReplyID}'";
		
		if(!empty($fields))
		{
			$f = SQLUtil::parseFields($fields);			
		}
	    if (!empty($condition))
		{
			$c =SQLUtil::parseCondition($condition);
		}
		
		$sql = "SELECT {$f} FROM `CS_QuestionReply` WHERE {$c} LIMIT 1";


		$ars = sql_fetch_rows_assoc(self::$_db_name,$sql);
		
		if (!$ars || count($ars)==0)
		{
			return false;
		}
		
		$ar = $ars[0];
		
		if (isset($ar['cs_QuestionReplyID'])) $this->cs_QuestionReplyID = $ar['cs_QuestionReplyID'];
		if (isset($ar['cs_QuestionID'])) $this->cs_QuestionID = $ar['cs_QuestionID'];
		if (isset($ar['cs_QuestionReplyType'])) $this->cs_QuestionReplyType = intval($ar['cs_QuestionReplyType']);
		if (isset($ar['pt_AccountKey'])) $this->pt_AccountKey = $ar['pt_AccountKey'];
		if (isset($ar['pt_OpenUID'])) $this->pt_OpenUID = $ar['pt_OpenUID'];
		if (isset($ar['pt_AccountID'])) $this->pt_AccountID = $ar['pt_AccountID'];
		if (isset($ar['bm_AccountID'])) $this->bm_AccountID = $ar['bm_AccountID'];
		if (isset($ar['bm_AccountName'])) $this->bm_AccountName = $ar['bm_AccountName'];
		if (isset($ar['cs_QuestionReplyDesc'])) $this->cs_QuestionReplyDesc = $ar['cs_QuestionReplyDesc'];
		if (isset($ar['cs_QuestionReplyModifyInfo'])) $this->cs_QuestionReplyModifyInfo = $ar['cs_QuestionReplyModifyInfo'];
		if (isset($ar['cs_AccessoryInfo'])) $this->cs_AccessoryInfo = $ar['cs_AccessoryInfo'];
		if (isset($ar['cs_ReplyIP'])) $this->cs_ReplyIP = $ar['cs_ReplyIP'];
		if (isset($ar['cs_ReplyTime'])) $this->cs_ReplyTime = $ar['cs_ReplyTime'];
		if (isset($ar['cs_QuestionReplyState'])) $this->cs_QuestionReplyState = intval($ar['cs_QuestionReplyState']);
		
		
		$this->clean();
		
		return true;
	}
	
	public function /*boolean*/ loadFromExistFields()
	{
		$emptyCondition = true;
    	$emptyFields = true;
    	
    	$fields = array();
    	$condition = array();
    	
    	if (!isset($this->cs_QuestionReplyID)){
    		$emptyFields = false;
    		$fields[] = 'cs_QuestionReplyID';
    	}else{
    		$emptyCondition = false; 
    		$condition['cs_QuestionReplyID']=$this->cs_QuestionReplyID;
    	}
    	if (!isset($this->cs_QuestionID)){
    		$emptyFields = false;
    		$fields[] = 'cs_QuestionID';
    	}else{
    		$emptyCondition = false; 
    		$condition['cs_QuestionID']=$this->cs_QuestionID;
    	}
    	if (!isset($this->cs_QuestionReplyType)){
    		$emptyFields = false;
    		$fields[] = 'cs_QuestionReplyType';
    	}else{
    		$emptyCondition = false; 
    		$condition['cs_QuestionReplyType']=$this->cs_QuestionReplyType;
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
    	if (!isset($this->bm_AccountID)){
    		$emptyFields = false;
    		$fields[] = 'bm_AccountID';
    	}else{
    		$emptyCondition = false; 
    		$condition['bm_AccountID']=$this->bm_AccountID;
    	}
    	if (!isset($this->bm_AccountName)){
    		$emptyFields = false;
    		$fields[] = 'bm_AccountName';
    	}else{
    		$emptyCondition = false; 
    		$condition['bm_AccountName']=$this->bm_AccountName;
    	}
    	if (!isset($this->cs_QuestionReplyDesc)){
    		$emptyFields = false;
    		$fields[] = 'cs_QuestionReplyDesc';
    	}else{
    		$emptyCondition = false; 
    		$condition['cs_QuestionReplyDesc']=$this->cs_QuestionReplyDesc;
    	}
    	if (!isset($this->cs_QuestionReplyModifyInfo)){
    		$emptyFields = false;
    		$fields[] = 'cs_QuestionReplyModifyInfo';
    	}else{
    		$emptyCondition = false; 
    		$condition['cs_QuestionReplyModifyInfo']=$this->cs_QuestionReplyModifyInfo;
    	}
    	if (!isset($this->cs_AccessoryInfo)){
    		$emptyFields = false;
    		$fields[] = 'cs_AccessoryInfo';
    	}else{
    		$emptyCondition = false; 
    		$condition['cs_AccessoryInfo']=$this->cs_AccessoryInfo;
    	}
    	if (!isset($this->cs_ReplyIP)){
    		$emptyFields = false;
    		$fields[] = 'cs_ReplyIP';
    	}else{
    		$emptyCondition = false; 
    		$condition['cs_ReplyIP']=$this->cs_ReplyIP;
    	}
    	if (!isset($this->cs_ReplyTime)){
    		$emptyFields = false;
    		$fields[] = 'cs_ReplyTime';
    	}else{
    		$emptyCondition = false; 
    		$condition['cs_ReplyTime']=$this->cs_ReplyTime;
    	}
    	if (!isset($this->cs_QuestionReplyState)){
    		$emptyFields = false;
    		$fields[] = 'cs_QuestionReplyState';
    	}else{
    		$emptyCondition = false; 
    		$condition['cs_QuestionReplyState']=$this->cs_QuestionReplyState;
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
				
		if (!isset($this->cs_QuestionReplyID)) $this->cs_QuestionReplyID = get_mysql_insert_id(self::$_db_name);

		
		$this->clean();
		
		return true;	
		
	}
	
	public function /*boolean*/ save(/*array*/$condition=NULL)
	{
		if (empty($condition))
		{
			$uc = "`cs_QuestionReplyID`='{$this->cs_QuestionReplyID}'";
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
		
		$sql = "DELETE FROM `CS_QuestionReply` WHERE ".SQLUtil::parseCondition($condition);
		
		$qr = sql_query(self::$_db_name,$sql);
				
		return (boolean)$qr;
	}
	
	public function /*boolean*/ delete()
	{
		if (!$this->is_set_keys())
		{
			return false;
		}
		
		$sql = "DELETE FROM `CS_QuestionReply` WHERE `cs_QuestionReplyID`='{$this->cs_QuestionReplyID}'";
		

		$qr = sql_query(self::$_db_name,$sql);
				
		return (boolean)$qr;
	}
	
	public function getInsertValue($fields)
	{
		$values = "(";		
		foreach($fields as $f => $k){
			if($f == 'cs_QuestionReplyID'){
 				$values .= "'{$this->cs_QuestionReplyID}',";
 			}else if($f == 'cs_QuestionID'){
 				$values .= "'{$this->cs_QuestionID}',";
 			}else if($f == 'cs_QuestionReplyType'){
 				$values .= "'{$this->cs_QuestionReplyType}',";
 			}else if($f == 'pt_AccountKey'){
 				$values .= "'{$this->pt_AccountKey}',";
 			}else if($f == 'pt_OpenUID'){
 				$values .= "'{$this->pt_OpenUID}',";
 			}else if($f == 'pt_AccountID'){
 				$values .= "'{$this->pt_AccountID}',";
 			}else if($f == 'bm_AccountID'){
 				$values .= "'{$this->bm_AccountID}',";
 			}else if($f == 'bm_AccountName'){
 				$values .= "'{$this->bm_AccountName}',";
 			}else if($f == 'cs_QuestionReplyDesc'){
 				$values .= "'{$this->cs_QuestionReplyDesc}',";
 			}else if($f == 'cs_QuestionReplyModifyInfo'){
 				$values .= "'{$this->cs_QuestionReplyModifyInfo}',";
 			}else if($f == 'cs_AccessoryInfo'){
 				$values .= "'{$this->cs_AccessoryInfo}',";
 			}else if($f == 'cs_ReplyIP'){
 				$values .= "'{$this->cs_ReplyIP}',";
 			}else if($f == 'cs_ReplyTime'){
 				$values .= "'{$this->cs_ReplyTime}',";
 			}else if($f == 'cs_QuestionReplyState'){
 				$values .= "'{$this->cs_QuestionReplyState}',";
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

		if (isset($this->cs_QuestionReplyID))
		{
			$fields .= "`cs_QuestionReplyID`,";
			$values .= "'{$this->cs_QuestionReplyID}',";
		}
		if (isset($this->cs_QuestionID))
		{
			$fields .= "`cs_QuestionID`,";
			$values .= "'{$this->cs_QuestionID}',";
		}
		if (isset($this->cs_QuestionReplyType))
		{
			$fields .= "`cs_QuestionReplyType`,";
			$values .= "'{$this->cs_QuestionReplyType}',";
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
		if (isset($this->bm_AccountID))
		{
			$fields .= "`bm_AccountID`,";
			$values .= "'{$this->bm_AccountID}',";
		}
		if (isset($this->bm_AccountName))
		{
			$fields .= "`bm_AccountName`,";
			$values .= "'{$this->bm_AccountName}',";
		}
		if (isset($this->cs_QuestionReplyDesc))
		{
			$fields .= "`cs_QuestionReplyDesc`,";
			$values .= "'{$this->cs_QuestionReplyDesc}',";
		}
		if (isset($this->cs_QuestionReplyModifyInfo))
		{
			$fields .= "`cs_QuestionReplyModifyInfo`,";
			$values .= "'{$this->cs_QuestionReplyModifyInfo}',";
		}
		if (isset($this->cs_AccessoryInfo))
		{
			$fields .= "`cs_AccessoryInfo`,";
			$values .= "'{$this->cs_AccessoryInfo}',";
		}
		if (isset($this->cs_ReplyIP))
		{
			$fields .= "`cs_ReplyIP`,";
			$values .= "'{$this->cs_ReplyIP}',";
		}
		if (isset($this->cs_ReplyTime))
		{
			$fields .= "`cs_ReplyTime`,";
			$values .= "'{$this->cs_ReplyTime}',";
		}
		if (isset($this->cs_QuestionReplyState))
		{
			$fields .= "`cs_QuestionReplyState`,";
			$values .= "'{$this->cs_QuestionReplyState}',";
		}

		
		$fields .= ")";
		$values .= ")";
		
		$sql = "INSERT INTO `CS_QuestionReply` ".$fields.$values;
		
		return str_replace(",)",")",$sql);
	}
	
	private function /*string*/ getUpdateFields()
	{
		$update = "";
		
		if ($this->is_cs_QuestionID_dirty)
		{			
			if (!isset($this->cs_QuestionID))
			{
				$update .= ("`cs_QuestionID`=null,");
			}
			else
			{
				$update .= ("`cs_QuestionID`='{$this->cs_QuestionID}',");
			}
		}
		if ($this->is_cs_QuestionReplyType_dirty)
		{			
			if (!isset($this->cs_QuestionReplyType))
			{
				$update .= ("`cs_QuestionReplyType`=null,");
			}
			else
			{
				$update .= ("`cs_QuestionReplyType`='{$this->cs_QuestionReplyType}',");
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
		if ($this->is_bm_AccountID_dirty)
		{			
			if (!isset($this->bm_AccountID))
			{
				$update .= ("`bm_AccountID`=null,");
			}
			else
			{
				$update .= ("`bm_AccountID`='{$this->bm_AccountID}',");
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
		if ($this->is_cs_QuestionReplyDesc_dirty)
		{			
			if (!isset($this->cs_QuestionReplyDesc))
			{
				$update .= ("`cs_QuestionReplyDesc`=null,");
			}
			else
			{
				$update .= ("`cs_QuestionReplyDesc`='{$this->cs_QuestionReplyDesc}',");
			}
		}
		if ($this->is_cs_QuestionReplyModifyInfo_dirty)
		{			
			if (!isset($this->cs_QuestionReplyModifyInfo))
			{
				$update .= ("`cs_QuestionReplyModifyInfo`=null,");
			}
			else
			{
				$update .= ("`cs_QuestionReplyModifyInfo`='{$this->cs_QuestionReplyModifyInfo}',");
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
		if ($this->is_cs_ReplyIP_dirty)
		{			
			if (!isset($this->cs_ReplyIP))
			{
				$update .= ("`cs_ReplyIP`=null,");
			}
			else
			{
				$update .= ("`cs_ReplyIP`='{$this->cs_ReplyIP}',");
			}
		}
		if ($this->is_cs_ReplyTime_dirty)
		{			
			if (!isset($this->cs_ReplyTime))
			{
				$update .= ("`cs_ReplyTime`=null,");
			}
			else
			{
				$update .= ("`cs_ReplyTime`='{$this->cs_ReplyTime}',");
			}
		}
		if ($this->is_cs_QuestionReplyState_dirty)
		{			
			if (!isset($this->cs_QuestionReplyState))
			{
				$update .= ("`cs_QuestionReplyState`=null,");
			}
			else
			{
				$update .= ("`cs_QuestionReplyState`='{$this->cs_QuestionReplyState}',");
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
		
		$sql = "UPDATE `CS_QuestionReply` SET {$update} WHERE {$condition}";
		
		return $sql;
	}
	
	public function /*boolean*/ add($fieldsValue,$condition=NULL)
	{				
		if (empty($condition))
		{
			$uc = "`cs_QuestionReplyID`='{$this->cs_QuestionReplyID}'";
		}
		else
		{			
			$uc = SQLUtil::parseCondition($condition);
		}
		
		$update = SQLUtil::parseASFieldValues($fieldsValue);
		
		$sql = "UPDATE `CS_QuestionReply` SET {$update} WHERE {$uc}";
		
		$qr = sql_query(self::$_db_name,$sql);
				
		return (boolean)$qr;
	}	
	
	public function /*boolean*/ sub($fieldsValue,$condition=NULL)
	{
		if (empty($condition))
		{
			$uc = "`cs_QuestionReplyID`='{$this->cs_QuestionReplyID}'";
		}
		else
		{			
			$uc = SQLUtil::parseCondition($condition);
		}
		
		$update = SQLUtil::parseASFieldValues($fieldsValue,false);
		
		$sql = "UPDATE `CS_QuestionReply` SET {$update} WHERE {$uc}";
		
		$qr = sql_query(self::$_db_name,$sql);
				
		return (boolean)$qr;
	}
	
	/**
	 * 是否已经设置主键的值
	 */
	public function is_set_keys()
	{
		
		return (isset($this->cs_QuestionReplyID));

	}
	
	private function /*void*/ clean() 
	{
		$this->is_this_table_dirty = false;
		$this->is_cs_QuestionReplyID_dirty = false;
		$this->is_cs_QuestionID_dirty = false;
		$this->is_cs_QuestionReplyType_dirty = false;
		$this->is_pt_AccountKey_dirty = false;
		$this->is_pt_OpenUID_dirty = false;
		$this->is_pt_AccountID_dirty = false;
		$this->is_bm_AccountID_dirty = false;
		$this->is_bm_AccountName_dirty = false;
		$this->is_cs_QuestionReplyDesc_dirty = false;
		$this->is_cs_QuestionReplyModifyInfo_dirty = false;
		$this->is_cs_AccessoryInfo_dirty = false;
		$this->is_cs_ReplyIP_dirty = false;
		$this->is_cs_ReplyTime_dirty = false;
		$this->is_cs_QuestionReplyState_dirty = false;

	}
	
	public function /*string*/ getCsQuestionReplyID()
	{
		return $this->cs_QuestionReplyID;
	}
	
	public function /*void*/ setCsQuestionReplyID(/*string*/ $cs_QuestionReplyID)
	{
		$this->cs_QuestionReplyID = SQLUtil::toSafeSQLString($cs_QuestionReplyID);
		$this->is_cs_QuestionReplyID_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setCsQuestionReplyIDNull()
	{
		$this->cs_QuestionReplyID = null;
		$this->is_cs_QuestionReplyID_dirty = true;		
		$this->is_this_table_dirty = true;
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

	public function /*int*/ getCsQuestionReplyType()
	{
		return $this->cs_QuestionReplyType;
	}
	
	public function /*void*/ setCsQuestionReplyType(/*int*/ $cs_QuestionReplyType)
	{
		$this->cs_QuestionReplyType = intval($cs_QuestionReplyType);
		$this->is_cs_QuestionReplyType_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setCsQuestionReplyTypeNull()
	{
		$this->cs_QuestionReplyType = null;
		$this->is_cs_QuestionReplyType_dirty = true;		
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

	public function /*string*/ getCsQuestionReplyDesc()
	{
		return $this->cs_QuestionReplyDesc;
	}
	
	public function /*void*/ setCsQuestionReplyDesc(/*string*/ $cs_QuestionReplyDesc)
	{
		$this->cs_QuestionReplyDesc = SQLUtil::toSafeSQLString($cs_QuestionReplyDesc);
		$this->is_cs_QuestionReplyDesc_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setCsQuestionReplyDescNull()
	{
		$this->cs_QuestionReplyDesc = null;
		$this->is_cs_QuestionReplyDesc_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*string*/ getCsQuestionReplyModifyInfo()
	{
		return $this->cs_QuestionReplyModifyInfo;
	}
	
	public function /*void*/ setCsQuestionReplyModifyInfo(/*string*/ $cs_QuestionReplyModifyInfo)
	{
		$this->cs_QuestionReplyModifyInfo = SQLUtil::toSafeSQLString($cs_QuestionReplyModifyInfo);
		$this->is_cs_QuestionReplyModifyInfo_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setCsQuestionReplyModifyInfoNull()
	{
		$this->cs_QuestionReplyModifyInfo = null;
		$this->is_cs_QuestionReplyModifyInfo_dirty = true;		
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

	public function /*string*/ getCsReplyIP()
	{
		return $this->cs_ReplyIP;
	}
	
	public function /*void*/ setCsReplyIP(/*string*/ $cs_ReplyIP)
	{
		$this->cs_ReplyIP = SQLUtil::toSafeSQLString($cs_ReplyIP);
		$this->is_cs_ReplyIP_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setCsReplyIPNull()
	{
		$this->cs_ReplyIP = null;
		$this->is_cs_ReplyIP_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*string*/ getCsReplyTime()
	{
		return $this->cs_ReplyTime;
	}
	
	public function /*void*/ setCsReplyTime(/*string*/ $cs_ReplyTime)
	{
		$this->cs_ReplyTime = SQLUtil::toSafeSQLString($cs_ReplyTime);
		$this->is_cs_ReplyTime_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setCsReplyTimeNull()
	{
		$this->cs_ReplyTime = null;
		$this->is_cs_ReplyTime_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*int*/ getCsQuestionReplyState()
	{
		return $this->cs_QuestionReplyState;
	}
	
	public function /*void*/ setCsQuestionReplyState(/*int*/ $cs_QuestionReplyState)
	{
		$this->cs_QuestionReplyState = intval($cs_QuestionReplyState);
		$this->is_cs_QuestionReplyState_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setCsQuestionReplyStateNull()
	{
		$this->cs_QuestionReplyState = null;
		$this->is_cs_QuestionReplyState_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	
	public function /*string*/ toDebugString()
	{
		$dbg = "(";
		
		$dbg .= ("cs_QuestionReplyID={$this->cs_QuestionReplyID},");
		$dbg .= ("cs_QuestionID={$this->cs_QuestionID},");
		$dbg .= ("cs_QuestionReplyType={$this->cs_QuestionReplyType},");
		$dbg .= ("pt_AccountKey={$this->pt_AccountKey},");
		$dbg .= ("pt_OpenUID={$this->pt_OpenUID},");
		$dbg .= ("pt_AccountID={$this->pt_AccountID},");
		$dbg .= ("bm_AccountID={$this->bm_AccountID},");
		$dbg .= ("bm_AccountName={$this->bm_AccountName},");
		$dbg .= ("cs_QuestionReplyDesc={$this->cs_QuestionReplyDesc},");
		$dbg .= ("cs_QuestionReplyModifyInfo={$this->cs_QuestionReplyModifyInfo},");
		$dbg .= ("cs_AccessoryInfo={$this->cs_AccessoryInfo},");
		$dbg .= ("cs_ReplyIP={$this->cs_ReplyIP},");
		$dbg .= ("cs_ReplyTime={$this->cs_ReplyTime},");
		$dbg .= ("cs_QuestionReplyState={$this->cs_QuestionReplyState},");

		$dbg .= ")";
				
		return str_replace(",)",")",$dbg);
	}
	
	public function fromArray($arr)
	{
		if (isset($arr['cs_QuestionReplyID'])) $this->setCsQuestionReplyID($arr['cs_QuestionReplyID']);
		if (isset($arr['cs_QuestionID'])) $this->setCsQuestionID($arr['cs_QuestionID']);
		if (isset($arr['cs_QuestionReplyType'])) $this->setCsQuestionReplyType($arr['cs_QuestionReplyType']);
		if (isset($arr['pt_AccountKey'])) $this->setPtAccountKey($arr['pt_AccountKey']);
		if (isset($arr['pt_OpenUID'])) $this->setPtOpenUID($arr['pt_OpenUID']);
		if (isset($arr['pt_AccountID'])) $this->setPtAccountID($arr['pt_AccountID']);
		if (isset($arr['bm_AccountID'])) $this->setBmAccountID($arr['bm_AccountID']);
		if (isset($arr['bm_AccountName'])) $this->setBmAccountName($arr['bm_AccountName']);
		if (isset($arr['cs_QuestionReplyDesc'])) $this->setCsQuestionReplyDesc($arr['cs_QuestionReplyDesc']);
		if (isset($arr['cs_QuestionReplyModifyInfo'])) $this->setCsQuestionReplyModifyInfo($arr['cs_QuestionReplyModifyInfo']);
		if (isset($arr['cs_AccessoryInfo'])) $this->setCsAccessoryInfo($arr['cs_AccessoryInfo']);
		if (isset($arr['cs_ReplyIP'])) $this->setCsReplyIP($arr['cs_ReplyIP']);
		if (isset($arr['cs_ReplyTime'])) $this->setCsReplyTime($arr['cs_ReplyTime']);
		if (isset($arr['cs_QuestionReplyState'])) $this->setCsQuestionReplyState($arr['cs_QuestionReplyState']);
		
	}
	
	public function toArray()
	{
		$ret = array();
		$ret['cs_QuestionReplyID'] = $this->cs_QuestionReplyID;
		$ret['cs_QuestionID'] = $this->cs_QuestionID;
		$ret['cs_QuestionReplyType'] = $this->cs_QuestionReplyType;
		$ret['pt_AccountKey'] = $this->pt_AccountKey;
		$ret['pt_OpenUID'] = $this->pt_OpenUID;
		$ret['pt_AccountID'] = $this->pt_AccountID;
		$ret['bm_AccountID'] = $this->bm_AccountID;
		$ret['bm_AccountName'] = $this->bm_AccountName;
		$ret['cs_QuestionReplyDesc'] = $this->cs_QuestionReplyDesc;
		$ret['cs_QuestionReplyModifyInfo'] = $this->cs_QuestionReplyModifyInfo;
		$ret['cs_AccessoryInfo'] = $this->cs_AccessoryInfo;
		$ret['cs_ReplyIP'] = $this->cs_ReplyIP;
		$ret['cs_ReplyTime'] = $this->cs_ReplyTime;
		$ret['cs_QuestionReplyState'] = $this->cs_QuestionReplyState;

		return $ret;
	}
}

?>
