<?php
require_once (FRAMEWORK_PATH . "utils/MysqlDBHelper.php");
require_once (FRAMEWORK_PATH . "db/SQLUtil.php");
/**
 * database table CS_GMPerformance description
 * 
 * [This file was auto-generated. PLEASE DONT EDIT]
 * 
 * @author LiangZhixian
 * 
 */
class TbCSGMPerformance {
	
	public static $_db_name = "pf_basemanage";
	
	private /*string*/ $bm_AccountID; //PRIMARY KEY 后台帐号ID
	private /*string*/ $bm_AccountName; //姓名
	private /*string*/ $cs_PerformanceTime;
	private /*int*/ $cs_QuestionTypeID;
	private /*int*/ $cs_QuestionState; //0=默认/未解决             1=解决中             2=已解决             8=自己删除             9=管理员删除             
	private /*int*/ $cs_ResponseTimeSum;
	private /*int*/ $cs_AccountNum;
	private /*int*/ $cs_QuestionNum;

	
	private $is_this_table_dirty = false;
	private $is_bm_AccountID_dirty = false;
	private $is_bm_AccountName_dirty = false;
	private $is_cs_PerformanceTime_dirty = false;
	private $is_cs_QuestionTypeID_dirty = false;
	private $is_cs_QuestionState_dirty = false;
	private $is_cs_ResponseTimeSum_dirty = false;
	private $is_cs_AccountNum_dirty = false;
	private $is_cs_QuestionNum_dirty = false;


	/**
	 * @param array($condition)
	 * @return array(TbCSGMPerformance)
	 */
	public static function /*array(TbCSGMPerformance)*/ loadTable(/*array*/ $fields=NULL,/*array*/$condition=NULL)
	{
		$result = array();
		
		$f = "*";
		
		if(!empty($fields))
		{
			$f = SQLUtil::parseFields($fields);			
		}
		
		if (empty($condition))
		{
			$sql = "SELECT {$f} FROM `CS_GMPerformance`";
		}
		else
		{			
			$sql = "SELECT {$f} FROM `CS_GMPerformance` WHERE ".SQLUtil::parseCondition($condition);
		}			
		
		$ar = sql_fetch_rows_assoc(self::$_db_name,$sql);
		
		if (empty($ar) || count($ar) == 0)
		{
			return $result;
		}
		
		foreach($ar as $row)
		{
			$tb = new TbCSGMPerformance();			
			if (isset($row['bm_AccountID'])) $tb->bm_AccountID = $row['bm_AccountID'];
			if (isset($row['bm_AccountName'])) $tb->bm_AccountName = $row['bm_AccountName'];
			if (isset($row['cs_PerformanceTime'])) $tb->cs_PerformanceTime = $row['cs_PerformanceTime'];
			if (isset($row['cs_QuestionTypeID'])) $tb->cs_QuestionTypeID = intval($row['cs_QuestionTypeID']);
			if (isset($row['cs_QuestionState'])) $tb->cs_QuestionState = intval($row['cs_QuestionState']);
			if (isset($row['cs_ResponseTimeSum'])) $tb->cs_ResponseTimeSum = intval($row['cs_ResponseTimeSum']);
			if (isset($row['cs_AccountNum'])) $tb->cs_AccountNum = intval($row['cs_AccountNum']);
			if (isset($row['cs_QuestionNum'])) $tb->cs_QuestionNum = intval($row['cs_QuestionNum']);
		
			$result[] = $tb;
		}
		
		return $result;
	}	
	
	public static function insertSqlHeader(/*array*/ $fields=NULL)
	{
		$result = array();				
		if(!empty($fields)){
			$f = SQLUtil::parseFields($fields);			
			$result[0] = "INSERT INTO `CS_GMPerformance` ({$f}) VALUES ";	
			$ar = array();
			foreach($fields as $key){
				$ar[$key]=1;
			}
			$result[1] = $ar;
		}else{
			$result[0]="INSERT INTO `CS_GMPerformance` (`bm_AccountID`,`bm_AccountName`,`cs_PerformanceTime`,`cs_QuestionTypeID`,`cs_QuestionState`,`cs_ResponseTimeSum`,`cs_AccountNum`,`cs_QuestionNum`) VALUES ";
			$result[1] = array('bm_AccountID'=>1,'bm_AccountName'=>1,'cs_PerformanceTime'=>1,'cs_QuestionTypeID'=>1,'cs_QuestionState'=>1,'cs_ResponseTimeSum'=>1,'cs_AccountNum'=>1,'cs_QuestionNum'=>1);
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
		
		$sql = "SELECT {$f} FROM `CS_GMPerformance` WHERE {$c} LIMIT 1";


		$ars = sql_fetch_rows_assoc(self::$_db_name,$sql);
		
		if (!$ars || count($ars)==0)
		{
			return false;
		}
		
		$ar = $ars[0];
		
		if (isset($ar['bm_AccountID'])) $this->bm_AccountID = $ar['bm_AccountID'];
		if (isset($ar['bm_AccountName'])) $this->bm_AccountName = $ar['bm_AccountName'];
		if (isset($ar['cs_PerformanceTime'])) $this->cs_PerformanceTime = $ar['cs_PerformanceTime'];
		if (isset($ar['cs_QuestionTypeID'])) $this->cs_QuestionTypeID = intval($ar['cs_QuestionTypeID']);
		if (isset($ar['cs_QuestionState'])) $this->cs_QuestionState = intval($ar['cs_QuestionState']);
		if (isset($ar['cs_ResponseTimeSum'])) $this->cs_ResponseTimeSum = intval($ar['cs_ResponseTimeSum']);
		if (isset($ar['cs_AccountNum'])) $this->cs_AccountNum = intval($ar['cs_AccountNum']);
		if (isset($ar['cs_QuestionNum'])) $this->cs_QuestionNum = intval($ar['cs_QuestionNum']);
		
		
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
    	if (!isset($this->bm_AccountName)){
    		$emptyFields = false;
    		$fields[] = 'bm_AccountName';
    	}else{
    		$emptyCondition = false; 
    		$condition['bm_AccountName']=$this->bm_AccountName;
    	}
    	if (!isset($this->cs_PerformanceTime)){
    		$emptyFields = false;
    		$fields[] = 'cs_PerformanceTime';
    	}else{
    		$emptyCondition = false; 
    		$condition['cs_PerformanceTime']=$this->cs_PerformanceTime;
    	}
    	if (!isset($this->cs_QuestionTypeID)){
    		$emptyFields = false;
    		$fields[] = 'cs_QuestionTypeID';
    	}else{
    		$emptyCondition = false; 
    		$condition['cs_QuestionTypeID']=$this->cs_QuestionTypeID;
    	}
    	if (!isset($this->cs_QuestionState)){
    		$emptyFields = false;
    		$fields[] = 'cs_QuestionState';
    	}else{
    		$emptyCondition = false; 
    		$condition['cs_QuestionState']=$this->cs_QuestionState;
    	}
    	if (!isset($this->cs_ResponseTimeSum)){
    		$emptyFields = false;
    		$fields[] = 'cs_ResponseTimeSum';
    	}else{
    		$emptyCondition = false; 
    		$condition['cs_ResponseTimeSum']=$this->cs_ResponseTimeSum;
    	}
    	if (!isset($this->cs_AccountNum)){
    		$emptyFields = false;
    		$fields[] = 'cs_AccountNum';
    	}else{
    		$emptyCondition = false; 
    		$condition['cs_AccountNum']=$this->cs_AccountNum;
    	}
    	if (!isset($this->cs_QuestionNum)){
    		$emptyFields = false;
    		$fields[] = 'cs_QuestionNum';
    	}else{
    		$emptyCondition = false; 
    		$condition['cs_QuestionNum']=$this->cs_QuestionNum;
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
		
		$sql = "DELETE FROM `CS_GMPerformance` WHERE ".SQLUtil::parseCondition($condition);
		
		$qr = sql_query(self::$_db_name,$sql);
				
		return (boolean)$qr;
	}
	
	public function /*boolean*/ delete()
	{
		if (!$this->is_set_keys())
		{
			return false;
		}
		
		$sql = "DELETE FROM `CS_GMPerformance` WHERE `bm_AccountID`='{$this->bm_AccountID}'";
		

		$qr = sql_query(self::$_db_name,$sql);
				
		return (boolean)$qr;
	}
	
	public function getInsertValue($fields)
	{
		$values = "(";		
		foreach($fields as $f => $k){
			if($f == 'bm_AccountID'){
 				$values .= "'{$this->bm_AccountID}',";
 			}else if($f == 'bm_AccountName'){
 				$values .= "'{$this->bm_AccountName}',";
 			}else if($f == 'cs_PerformanceTime'){
 				$values .= "'{$this->cs_PerformanceTime}',";
 			}else if($f == 'cs_QuestionTypeID'){
 				$values .= "'{$this->cs_QuestionTypeID}',";
 			}else if($f == 'cs_QuestionState'){
 				$values .= "'{$this->cs_QuestionState}',";
 			}else if($f == 'cs_ResponseTimeSum'){
 				$values .= "'{$this->cs_ResponseTimeSum}',";
 			}else if($f == 'cs_AccountNum'){
 				$values .= "'{$this->cs_AccountNum}',";
 			}else if($f == 'cs_QuestionNum'){
 				$values .= "'{$this->cs_QuestionNum}',";
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
		if (isset($this->bm_AccountName))
		{
			$fields .= "`bm_AccountName`,";
			$values .= "'{$this->bm_AccountName}',";
		}
		if (isset($this->cs_PerformanceTime))
		{
			$fields .= "`cs_PerformanceTime`,";
			$values .= "'{$this->cs_PerformanceTime}',";
		}
		if (isset($this->cs_QuestionTypeID))
		{
			$fields .= "`cs_QuestionTypeID`,";
			$values .= "'{$this->cs_QuestionTypeID}',";
		}
		if (isset($this->cs_QuestionState))
		{
			$fields .= "`cs_QuestionState`,";
			$values .= "'{$this->cs_QuestionState}',";
		}
		if (isset($this->cs_ResponseTimeSum))
		{
			$fields .= "`cs_ResponseTimeSum`,";
			$values .= "'{$this->cs_ResponseTimeSum}',";
		}
		if (isset($this->cs_AccountNum))
		{
			$fields .= "`cs_AccountNum`,";
			$values .= "'{$this->cs_AccountNum}',";
		}
		if (isset($this->cs_QuestionNum))
		{
			$fields .= "`cs_QuestionNum`,";
			$values .= "'{$this->cs_QuestionNum}',";
		}

		
		$fields .= ")";
		$values .= ")";
		
		$sql = "INSERT INTO `CS_GMPerformance` ".$fields.$values;
		
		return str_replace(",)",")",$sql);
	}
	
	private function /*string*/ getUpdateFields()
	{
		$update = "";
		
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
		if ($this->is_cs_PerformanceTime_dirty)
		{			
			if (!isset($this->cs_PerformanceTime))
			{
				$update .= ("`cs_PerformanceTime`=null,");
			}
			else
			{
				$update .= ("`cs_PerformanceTime`='{$this->cs_PerformanceTime}',");
			}
		}
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
		if ($this->is_cs_ResponseTimeSum_dirty)
		{			
			if (!isset($this->cs_ResponseTimeSum))
			{
				$update .= ("`cs_ResponseTimeSum`=null,");
			}
			else
			{
				$update .= ("`cs_ResponseTimeSum`='{$this->cs_ResponseTimeSum}',");
			}
		}
		if ($this->is_cs_AccountNum_dirty)
		{			
			if (!isset($this->cs_AccountNum))
			{
				$update .= ("`cs_AccountNum`=null,");
			}
			else
			{
				$update .= ("`cs_AccountNum`='{$this->cs_AccountNum}',");
			}
		}
		if ($this->is_cs_QuestionNum_dirty)
		{			
			if (!isset($this->cs_QuestionNum))
			{
				$update .= ("`cs_QuestionNum`=null,");
			}
			else
			{
				$update .= ("`cs_QuestionNum`='{$this->cs_QuestionNum}',");
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
		
		$sql = "UPDATE `CS_GMPerformance` SET {$update} WHERE {$condition}";
		
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
		
		$sql = "UPDATE `CS_GMPerformance` SET {$update} WHERE {$uc}";
		
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
		
		$sql = "UPDATE `CS_GMPerformance` SET {$update} WHERE {$uc}";
		
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
		$this->is_bm_AccountName_dirty = false;
		$this->is_cs_PerformanceTime_dirty = false;
		$this->is_cs_QuestionTypeID_dirty = false;
		$this->is_cs_QuestionState_dirty = false;
		$this->is_cs_ResponseTimeSum_dirty = false;
		$this->is_cs_AccountNum_dirty = false;
		$this->is_cs_QuestionNum_dirty = false;

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

	public function /*string*/ getCsPerformanceTime()
	{
		return $this->cs_PerformanceTime;
	}
	
	public function /*void*/ setCsPerformanceTime(/*string*/ $cs_PerformanceTime)
	{
		$this->cs_PerformanceTime = SQLUtil::toSafeSQLString($cs_PerformanceTime);
		$this->is_cs_PerformanceTime_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setCsPerformanceTimeNull()
	{
		$this->cs_PerformanceTime = null;
		$this->is_cs_PerformanceTime_dirty = true;		
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

	public function /*int*/ getCsResponseTimeSum()
	{
		return $this->cs_ResponseTimeSum;
	}
	
	public function /*void*/ setCsResponseTimeSum(/*int*/ $cs_ResponseTimeSum)
	{
		$this->cs_ResponseTimeSum = intval($cs_ResponseTimeSum);
		$this->is_cs_ResponseTimeSum_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setCsResponseTimeSumNull()
	{
		$this->cs_ResponseTimeSum = null;
		$this->is_cs_ResponseTimeSum_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*int*/ getCsAccountNum()
	{
		return $this->cs_AccountNum;
	}
	
	public function /*void*/ setCsAccountNum(/*int*/ $cs_AccountNum)
	{
		$this->cs_AccountNum = intval($cs_AccountNum);
		$this->is_cs_AccountNum_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setCsAccountNumNull()
	{
		$this->cs_AccountNum = null;
		$this->is_cs_AccountNum_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*int*/ getCsQuestionNum()
	{
		return $this->cs_QuestionNum;
	}
	
	public function /*void*/ setCsQuestionNum(/*int*/ $cs_QuestionNum)
	{
		$this->cs_QuestionNum = intval($cs_QuestionNum);
		$this->is_cs_QuestionNum_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setCsQuestionNumNull()
	{
		$this->cs_QuestionNum = null;
		$this->is_cs_QuestionNum_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	
	public function /*string*/ toDebugString()
	{
		$dbg = "(";
		
		$dbg .= ("bm_AccountID={$this->bm_AccountID},");
		$dbg .= ("bm_AccountName={$this->bm_AccountName},");
		$dbg .= ("cs_PerformanceTime={$this->cs_PerformanceTime},");
		$dbg .= ("cs_QuestionTypeID={$this->cs_QuestionTypeID},");
		$dbg .= ("cs_QuestionState={$this->cs_QuestionState},");
		$dbg .= ("cs_ResponseTimeSum={$this->cs_ResponseTimeSum},");
		$dbg .= ("cs_AccountNum={$this->cs_AccountNum},");
		$dbg .= ("cs_QuestionNum={$this->cs_QuestionNum},");

		$dbg .= ")";
				
		return str_replace(",)",")",$dbg);
	}
	
	public function fromArray($arr)
	{
		if (isset($arr['bm_AccountID'])) $this->setBmAccountID($arr['bm_AccountID']);
		if (isset($arr['bm_AccountName'])) $this->setBmAccountName($arr['bm_AccountName']);
		if (isset($arr['cs_PerformanceTime'])) $this->setCsPerformanceTime($arr['cs_PerformanceTime']);
		if (isset($arr['cs_QuestionTypeID'])) $this->setCsQuestionTypeID($arr['cs_QuestionTypeID']);
		if (isset($arr['cs_QuestionState'])) $this->setCsQuestionState($arr['cs_QuestionState']);
		if (isset($arr['cs_ResponseTimeSum'])) $this->setCsResponseTimeSum($arr['cs_ResponseTimeSum']);
		if (isset($arr['cs_AccountNum'])) $this->setCsAccountNum($arr['cs_AccountNum']);
		if (isset($arr['cs_QuestionNum'])) $this->setCsQuestionNum($arr['cs_QuestionNum']);
		
	}
	
	public function toArray()
	{
		$ret = array();
		$ret['bm_AccountID'] = $this->bm_AccountID;
		$ret['bm_AccountName'] = $this->bm_AccountName;
		$ret['cs_PerformanceTime'] = $this->cs_PerformanceTime;
		$ret['cs_QuestionTypeID'] = $this->cs_QuestionTypeID;
		$ret['cs_QuestionState'] = $this->cs_QuestionState;
		$ret['cs_ResponseTimeSum'] = $this->cs_ResponseTimeSum;
		$ret['cs_AccountNum'] = $this->cs_AccountNum;
		$ret['cs_QuestionNum'] = $this->cs_QuestionNum;

		return $ret;
	}
}

?>
