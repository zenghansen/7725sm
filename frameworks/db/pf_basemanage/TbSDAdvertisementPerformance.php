<?php
require_once (FRAMEWORK_PATH . "utils/MysqlDBHelper.php");
require_once (FRAMEWORK_PATH . "db/SQLUtil.php");
/**
 * database table SD_AdvertisementPerformance description
 * 
 * [This file was auto-generated. PLEASE DONT EDIT]
 * 
 * @author LiangZhixian
 * 
 */
class TbSDAdvertisementPerformance {
	
	public static $_db_name = "pf_basemanage";
	
	private /*string*/ $sd_AdvertisementID; //PRIMARY KEY 
	private /*string*/ $sd_CountTime;
	private /*int*/ $sd_ClickNum;
	private /*int*/ $sd_InstallNum;
	private /*int*/ $sd_RegNum;
	private /*int*/ $sd_CRoleNum;
	private /*int*/ $sd_NewPayerNum;
	private /*int*/ $sd_DayPayAmount;
	private /*int*/ $sd_DayPayTime;

	
	private $is_this_table_dirty = false;
	private $is_sd_AdvertisementID_dirty = false;
	private $is_sd_CountTime_dirty = false;
	private $is_sd_ClickNum_dirty = false;
	private $is_sd_InstallNum_dirty = false;
	private $is_sd_RegNum_dirty = false;
	private $is_sd_CRoleNum_dirty = false;
	private $is_sd_NewPayerNum_dirty = false;
	private $is_sd_DayPayAmount_dirty = false;
	private $is_sd_DayPayTime_dirty = false;


	/**
	 * @param array($condition)
	 * @return array(TbSDAdvertisementPerformance)
	 */
	public static function /*array(TbSDAdvertisementPerformance)*/ loadTable(/*array*/ $fields=NULL,/*array*/$condition=NULL)
	{
		$result = array();
		
		$f = "*";
		
		if(!empty($fields))
		{
			$f = SQLUtil::parseFields($fields);			
		}
		
		if (empty($condition))
		{
			$sql = "SELECT {$f} FROM `SD_AdvertisementPerformance`";
		}
		else
		{			
			$sql = "SELECT {$f} FROM `SD_AdvertisementPerformance` WHERE ".SQLUtil::parseCondition($condition);
		}			
		
		$ar = sql_fetch_rows_assoc(self::$_db_name,$sql);
		
		if (empty($ar) || count($ar) == 0)
		{
			return $result;
		}
		
		foreach($ar as $row)
		{
			$tb = new TbSDAdvertisementPerformance();			
			if (isset($row['sd_AdvertisementID'])) $tb->sd_AdvertisementID = $row['sd_AdvertisementID'];
			if (isset($row['sd_CountTime'])) $tb->sd_CountTime = $row['sd_CountTime'];
			if (isset($row['sd_ClickNum'])) $tb->sd_ClickNum = intval($row['sd_ClickNum']);
			if (isset($row['sd_InstallNum'])) $tb->sd_InstallNum = intval($row['sd_InstallNum']);
			if (isset($row['sd_RegNum'])) $tb->sd_RegNum = intval($row['sd_RegNum']);
			if (isset($row['sd_CRoleNum'])) $tb->sd_CRoleNum = intval($row['sd_CRoleNum']);
			if (isset($row['sd_NewPayerNum'])) $tb->sd_NewPayerNum = intval($row['sd_NewPayerNum']);
			if (isset($row['sd_DayPayAmount'])) $tb->sd_DayPayAmount = intval($row['sd_DayPayAmount']);
			if (isset($row['sd_DayPayTime'])) $tb->sd_DayPayTime = intval($row['sd_DayPayTime']);
		
			$result[] = $tb;
		}
		
		return $result;
	}	
	
	public static function insertSqlHeader(/*array*/ $fields=NULL)
	{
		$result = array();				
		if(!empty($fields)){
			$f = SQLUtil::parseFields($fields);			
			$result[0] = "INSERT INTO `SD_AdvertisementPerformance` ({$f}) VALUES ";	
			$ar = array();
			foreach($fields as $key){
				$ar[$key]=1;
			}
			$result[1] = $ar;
		}else{
			$result[0]="INSERT INTO `SD_AdvertisementPerformance` (`sd_AdvertisementID`,`sd_CountTime`,`sd_ClickNum`,`sd_InstallNum`,`sd_RegNum`,`sd_CRoleNum`,`sd_NewPayerNum`,`sd_DayPayAmount`,`sd_DayPayTime`) VALUES ";
			$result[1] = array('sd_AdvertisementID'=>1,'sd_CountTime'=>1,'sd_ClickNum'=>1,'sd_InstallNum'=>1,'sd_RegNum'=>1,'sd_CRoleNum'=>1,'sd_NewPayerNum'=>1,'sd_DayPayAmount'=>1,'sd_DayPayTime'=>1);
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
		$c = "`sd_AdvertisementID`='{$this->sd_AdvertisementID}'";
		
		if(!empty($fields))
		{
			$f = SQLUtil::parseFields($fields);			
		}
	    if (!empty($condition))
		{
			$c =SQLUtil::parseCondition($condition);
		}
		
		$sql = "SELECT {$f} FROM `SD_AdvertisementPerformance` WHERE {$c} LIMIT 1";


		$ars = sql_fetch_rows_assoc(self::$_db_name,$sql);
		
		if (!$ars || count($ars)==0)
		{
			return false;
		}
		
		$ar = $ars[0];
		
		if (isset($ar['sd_AdvertisementID'])) $this->sd_AdvertisementID = $ar['sd_AdvertisementID'];
		if (isset($ar['sd_CountTime'])) $this->sd_CountTime = $ar['sd_CountTime'];
		if (isset($ar['sd_ClickNum'])) $this->sd_ClickNum = intval($ar['sd_ClickNum']);
		if (isset($ar['sd_InstallNum'])) $this->sd_InstallNum = intval($ar['sd_InstallNum']);
		if (isset($ar['sd_RegNum'])) $this->sd_RegNum = intval($ar['sd_RegNum']);
		if (isset($ar['sd_CRoleNum'])) $this->sd_CRoleNum = intval($ar['sd_CRoleNum']);
		if (isset($ar['sd_NewPayerNum'])) $this->sd_NewPayerNum = intval($ar['sd_NewPayerNum']);
		if (isset($ar['sd_DayPayAmount'])) $this->sd_DayPayAmount = intval($ar['sd_DayPayAmount']);
		if (isset($ar['sd_DayPayTime'])) $this->sd_DayPayTime = intval($ar['sd_DayPayTime']);
		
		
		$this->clean();
		
		return true;
	}
	
	public function /*boolean*/ loadFromExistFields()
	{
		$emptyCondition = true;
    	$emptyFields = true;
    	
    	$fields = array();
    	$condition = array();
    	
    	if (!isset($this->sd_AdvertisementID)){
    		$emptyFields = false;
    		$fields[] = 'sd_AdvertisementID';
    	}else{
    		$emptyCondition = false; 
    		$condition['sd_AdvertisementID']=$this->sd_AdvertisementID;
    	}
    	if (!isset($this->sd_CountTime)){
    		$emptyFields = false;
    		$fields[] = 'sd_CountTime';
    	}else{
    		$emptyCondition = false; 
    		$condition['sd_CountTime']=$this->sd_CountTime;
    	}
    	if (!isset($this->sd_ClickNum)){
    		$emptyFields = false;
    		$fields[] = 'sd_ClickNum';
    	}else{
    		$emptyCondition = false; 
    		$condition['sd_ClickNum']=$this->sd_ClickNum;
    	}
    	if (!isset($this->sd_InstallNum)){
    		$emptyFields = false;
    		$fields[] = 'sd_InstallNum';
    	}else{
    		$emptyCondition = false; 
    		$condition['sd_InstallNum']=$this->sd_InstallNum;
    	}
    	if (!isset($this->sd_RegNum)){
    		$emptyFields = false;
    		$fields[] = 'sd_RegNum';
    	}else{
    		$emptyCondition = false; 
    		$condition['sd_RegNum']=$this->sd_RegNum;
    	}
    	if (!isset($this->sd_CRoleNum)){
    		$emptyFields = false;
    		$fields[] = 'sd_CRoleNum';
    	}else{
    		$emptyCondition = false; 
    		$condition['sd_CRoleNum']=$this->sd_CRoleNum;
    	}
    	if (!isset($this->sd_NewPayerNum)){
    		$emptyFields = false;
    		$fields[] = 'sd_NewPayerNum';
    	}else{
    		$emptyCondition = false; 
    		$condition['sd_NewPayerNum']=$this->sd_NewPayerNum;
    	}
    	if (!isset($this->sd_DayPayAmount)){
    		$emptyFields = false;
    		$fields[] = 'sd_DayPayAmount';
    	}else{
    		$emptyCondition = false; 
    		$condition['sd_DayPayAmount']=$this->sd_DayPayAmount;
    	}
    	if (!isset($this->sd_DayPayTime)){
    		$emptyFields = false;
    		$fields[] = 'sd_DayPayTime';
    	}else{
    		$emptyCondition = false; 
    		$condition['sd_DayPayTime']=$this->sd_DayPayTime;
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
			$uc = "`sd_AdvertisementID`='{$this->sd_AdvertisementID}'";
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
		
		$sql = "DELETE FROM `SD_AdvertisementPerformance` WHERE ".SQLUtil::parseCondition($condition);
		
		$qr = sql_query(self::$_db_name,$sql);
				
		return (boolean)$qr;
	}
	
	public function /*boolean*/ delete()
	{
		if (!$this->is_set_keys())
		{
			return false;
		}
		
		$sql = "DELETE FROM `SD_AdvertisementPerformance` WHERE `sd_AdvertisementID`='{$this->sd_AdvertisementID}'";
		

		$qr = sql_query(self::$_db_name,$sql);
				
		return (boolean)$qr;
	}
	
	public function getInsertValue($fields)
	{
		$values = "(";		
		foreach($fields as $f => $k){
			if($f == 'sd_AdvertisementID'){
 				$values .= "'{$this->sd_AdvertisementID}',";
 			}else if($f == 'sd_CountTime'){
 				$values .= "'{$this->sd_CountTime}',";
 			}else if($f == 'sd_ClickNum'){
 				$values .= "'{$this->sd_ClickNum}',";
 			}else if($f == 'sd_InstallNum'){
 				$values .= "'{$this->sd_InstallNum}',";
 			}else if($f == 'sd_RegNum'){
 				$values .= "'{$this->sd_RegNum}',";
 			}else if($f == 'sd_CRoleNum'){
 				$values .= "'{$this->sd_CRoleNum}',";
 			}else if($f == 'sd_NewPayerNum'){
 				$values .= "'{$this->sd_NewPayerNum}',";
 			}else if($f == 'sd_DayPayAmount'){
 				$values .= "'{$this->sd_DayPayAmount}',";
 			}else if($f == 'sd_DayPayTime'){
 				$values .= "'{$this->sd_DayPayTime}',";
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

		if (isset($this->sd_AdvertisementID))
		{
			$fields .= "`sd_AdvertisementID`,";
			$values .= "'{$this->sd_AdvertisementID}',";
		}
		if (isset($this->sd_CountTime))
		{
			$fields .= "`sd_CountTime`,";
			$values .= "'{$this->sd_CountTime}',";
		}
		if (isset($this->sd_ClickNum))
		{
			$fields .= "`sd_ClickNum`,";
			$values .= "'{$this->sd_ClickNum}',";
		}
		if (isset($this->sd_InstallNum))
		{
			$fields .= "`sd_InstallNum`,";
			$values .= "'{$this->sd_InstallNum}',";
		}
		if (isset($this->sd_RegNum))
		{
			$fields .= "`sd_RegNum`,";
			$values .= "'{$this->sd_RegNum}',";
		}
		if (isset($this->sd_CRoleNum))
		{
			$fields .= "`sd_CRoleNum`,";
			$values .= "'{$this->sd_CRoleNum}',";
		}
		if (isset($this->sd_NewPayerNum))
		{
			$fields .= "`sd_NewPayerNum`,";
			$values .= "'{$this->sd_NewPayerNum}',";
		}
		if (isset($this->sd_DayPayAmount))
		{
			$fields .= "`sd_DayPayAmount`,";
			$values .= "'{$this->sd_DayPayAmount}',";
		}
		if (isset($this->sd_DayPayTime))
		{
			$fields .= "`sd_DayPayTime`,";
			$values .= "'{$this->sd_DayPayTime}',";
		}

		
		$fields .= ")";
		$values .= ")";
		
		$sql = "INSERT INTO `SD_AdvertisementPerformance` ".$fields.$values;
		
		return str_replace(",)",")",$sql);
	}
	
	private function /*string*/ getUpdateFields()
	{
		$update = "";
		
		if ($this->is_sd_CountTime_dirty)
		{			
			if (!isset($this->sd_CountTime))
			{
				$update .= ("`sd_CountTime`=null,");
			}
			else
			{
				$update .= ("`sd_CountTime`='{$this->sd_CountTime}',");
			}
		}
		if ($this->is_sd_ClickNum_dirty)
		{			
			if (!isset($this->sd_ClickNum))
			{
				$update .= ("`sd_ClickNum`=null,");
			}
			else
			{
				$update .= ("`sd_ClickNum`='{$this->sd_ClickNum}',");
			}
		}
		if ($this->is_sd_InstallNum_dirty)
		{			
			if (!isset($this->sd_InstallNum))
			{
				$update .= ("`sd_InstallNum`=null,");
			}
			else
			{
				$update .= ("`sd_InstallNum`='{$this->sd_InstallNum}',");
			}
		}
		if ($this->is_sd_RegNum_dirty)
		{			
			if (!isset($this->sd_RegNum))
			{
				$update .= ("`sd_RegNum`=null,");
			}
			else
			{
				$update .= ("`sd_RegNum`='{$this->sd_RegNum}',");
			}
		}
		if ($this->is_sd_CRoleNum_dirty)
		{			
			if (!isset($this->sd_CRoleNum))
			{
				$update .= ("`sd_CRoleNum`=null,");
			}
			else
			{
				$update .= ("`sd_CRoleNum`='{$this->sd_CRoleNum}',");
			}
		}
		if ($this->is_sd_NewPayerNum_dirty)
		{			
			if (!isset($this->sd_NewPayerNum))
			{
				$update .= ("`sd_NewPayerNum`=null,");
			}
			else
			{
				$update .= ("`sd_NewPayerNum`='{$this->sd_NewPayerNum}',");
			}
		}
		if ($this->is_sd_DayPayAmount_dirty)
		{			
			if (!isset($this->sd_DayPayAmount))
			{
				$update .= ("`sd_DayPayAmount`=null,");
			}
			else
			{
				$update .= ("`sd_DayPayAmount`='{$this->sd_DayPayAmount}',");
			}
		}
		if ($this->is_sd_DayPayTime_dirty)
		{			
			if (!isset($this->sd_DayPayTime))
			{
				$update .= ("`sd_DayPayTime`=null,");
			}
			else
			{
				$update .= ("`sd_DayPayTime`='{$this->sd_DayPayTime}',");
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
		
		$sql = "UPDATE `SD_AdvertisementPerformance` SET {$update} WHERE {$condition}";
		
		return $sql;
	}
	
	public function /*boolean*/ add($fieldsValue,$condition=NULL)
	{				
		if (empty($condition))
		{
			$uc = "`sd_AdvertisementID`='{$this->sd_AdvertisementID}'";
		}
		else
		{			
			$uc = SQLUtil::parseCondition($condition);
		}
		
		$update = SQLUtil::parseASFieldValues($fieldsValue);
		
		$sql = "UPDATE `SD_AdvertisementPerformance` SET {$update} WHERE {$uc}";
		
		$qr = sql_query(self::$_db_name,$sql);
				
		return (boolean)$qr;
	}	
	
	public function /*boolean*/ sub($fieldsValue,$condition=NULL)
	{
		if (empty($condition))
		{
			$uc = "`sd_AdvertisementID`='{$this->sd_AdvertisementID}'";
		}
		else
		{			
			$uc = SQLUtil::parseCondition($condition);
		}
		
		$update = SQLUtil::parseASFieldValues($fieldsValue,false);
		
		$sql = "UPDATE `SD_AdvertisementPerformance` SET {$update} WHERE {$uc}";
		
		$qr = sql_query(self::$_db_name,$sql);
				
		return (boolean)$qr;
	}
	
	/**
	 * 是否已经设置主键的值
	 */
	public function is_set_keys()
	{
		
		return (isset($this->sd_AdvertisementID));

	}
	
	private function /*void*/ clean() 
	{
		$this->is_this_table_dirty = false;
		$this->is_sd_AdvertisementID_dirty = false;
		$this->is_sd_CountTime_dirty = false;
		$this->is_sd_ClickNum_dirty = false;
		$this->is_sd_InstallNum_dirty = false;
		$this->is_sd_RegNum_dirty = false;
		$this->is_sd_CRoleNum_dirty = false;
		$this->is_sd_NewPayerNum_dirty = false;
		$this->is_sd_DayPayAmount_dirty = false;
		$this->is_sd_DayPayTime_dirty = false;

	}
	
	public function /*string*/ getSdAdvertisementID()
	{
		return $this->sd_AdvertisementID;
	}
	
	public function /*void*/ setSdAdvertisementID(/*string*/ $sd_AdvertisementID)
	{
		$this->sd_AdvertisementID = SQLUtil::toSafeSQLString($sd_AdvertisementID);
		$this->is_sd_AdvertisementID_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setSdAdvertisementIDNull()
	{
		$this->sd_AdvertisementID = null;
		$this->is_sd_AdvertisementID_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*string*/ getSdCountTime()
	{
		return $this->sd_CountTime;
	}
	
	public function /*void*/ setSdCountTime(/*string*/ $sd_CountTime)
	{
		$this->sd_CountTime = SQLUtil::toSafeSQLString($sd_CountTime);
		$this->is_sd_CountTime_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setSdCountTimeNull()
	{
		$this->sd_CountTime = null;
		$this->is_sd_CountTime_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*int*/ getSdClickNum()
	{
		return $this->sd_ClickNum;
	}
	
	public function /*void*/ setSdClickNum(/*int*/ $sd_ClickNum)
	{
		$this->sd_ClickNum = intval($sd_ClickNum);
		$this->is_sd_ClickNum_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setSdClickNumNull()
	{
		$this->sd_ClickNum = null;
		$this->is_sd_ClickNum_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*int*/ getSdInstallNum()
	{
		return $this->sd_InstallNum;
	}
	
	public function /*void*/ setSdInstallNum(/*int*/ $sd_InstallNum)
	{
		$this->sd_InstallNum = intval($sd_InstallNum);
		$this->is_sd_InstallNum_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setSdInstallNumNull()
	{
		$this->sd_InstallNum = null;
		$this->is_sd_InstallNum_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*int*/ getSdRegNum()
	{
		return $this->sd_RegNum;
	}
	
	public function /*void*/ setSdRegNum(/*int*/ $sd_RegNum)
	{
		$this->sd_RegNum = intval($sd_RegNum);
		$this->is_sd_RegNum_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setSdRegNumNull()
	{
		$this->sd_RegNum = null;
		$this->is_sd_RegNum_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*int*/ getSdCRoleNum()
	{
		return $this->sd_CRoleNum;
	}
	
	public function /*void*/ setSdCRoleNum(/*int*/ $sd_CRoleNum)
	{
		$this->sd_CRoleNum = intval($sd_CRoleNum);
		$this->is_sd_CRoleNum_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setSdCRoleNumNull()
	{
		$this->sd_CRoleNum = null;
		$this->is_sd_CRoleNum_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*int*/ getSdNewPayerNum()
	{
		return $this->sd_NewPayerNum;
	}
	
	public function /*void*/ setSdNewPayerNum(/*int*/ $sd_NewPayerNum)
	{
		$this->sd_NewPayerNum = intval($sd_NewPayerNum);
		$this->is_sd_NewPayerNum_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setSdNewPayerNumNull()
	{
		$this->sd_NewPayerNum = null;
		$this->is_sd_NewPayerNum_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*int*/ getSdDayPayAmount()
	{
		return $this->sd_DayPayAmount;
	}
	
	public function /*void*/ setSdDayPayAmount(/*int*/ $sd_DayPayAmount)
	{
		$this->sd_DayPayAmount = intval($sd_DayPayAmount);
		$this->is_sd_DayPayAmount_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setSdDayPayAmountNull()
	{
		$this->sd_DayPayAmount = null;
		$this->is_sd_DayPayAmount_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*int*/ getSdDayPayTime()
	{
		return $this->sd_DayPayTime;
	}
	
	public function /*void*/ setSdDayPayTime(/*int*/ $sd_DayPayTime)
	{
		$this->sd_DayPayTime = intval($sd_DayPayTime);
		$this->is_sd_DayPayTime_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setSdDayPayTimeNull()
	{
		$this->sd_DayPayTime = null;
		$this->is_sd_DayPayTime_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	
	public function /*string*/ toDebugString()
	{
		$dbg = "(";
		
		$dbg .= ("sd_AdvertisementID={$this->sd_AdvertisementID},");
		$dbg .= ("sd_CountTime={$this->sd_CountTime},");
		$dbg .= ("sd_ClickNum={$this->sd_ClickNum},");
		$dbg .= ("sd_InstallNum={$this->sd_InstallNum},");
		$dbg .= ("sd_RegNum={$this->sd_RegNum},");
		$dbg .= ("sd_CRoleNum={$this->sd_CRoleNum},");
		$dbg .= ("sd_NewPayerNum={$this->sd_NewPayerNum},");
		$dbg .= ("sd_DayPayAmount={$this->sd_DayPayAmount},");
		$dbg .= ("sd_DayPayTime={$this->sd_DayPayTime},");

		$dbg .= ")";
				
		return str_replace(",)",")",$dbg);
	}
	
	public function fromArray($arr)
	{
		if (isset($arr['sd_AdvertisementID'])) $this->setSdAdvertisementID($arr['sd_AdvertisementID']);
		if (isset($arr['sd_CountTime'])) $this->setSdCountTime($arr['sd_CountTime']);
		if (isset($arr['sd_ClickNum'])) $this->setSdClickNum($arr['sd_ClickNum']);
		if (isset($arr['sd_InstallNum'])) $this->setSdInstallNum($arr['sd_InstallNum']);
		if (isset($arr['sd_RegNum'])) $this->setSdRegNum($arr['sd_RegNum']);
		if (isset($arr['sd_CRoleNum'])) $this->setSdCRoleNum($arr['sd_CRoleNum']);
		if (isset($arr['sd_NewPayerNum'])) $this->setSdNewPayerNum($arr['sd_NewPayerNum']);
		if (isset($arr['sd_DayPayAmount'])) $this->setSdDayPayAmount($arr['sd_DayPayAmount']);
		if (isset($arr['sd_DayPayTime'])) $this->setSdDayPayTime($arr['sd_DayPayTime']);
		
	}
	
	public function toArray()
	{
		$ret = array();
		$ret['sd_AdvertisementID'] = $this->sd_AdvertisementID;
		$ret['sd_CountTime'] = $this->sd_CountTime;
		$ret['sd_ClickNum'] = $this->sd_ClickNum;
		$ret['sd_InstallNum'] = $this->sd_InstallNum;
		$ret['sd_RegNum'] = $this->sd_RegNum;
		$ret['sd_CRoleNum'] = $this->sd_CRoleNum;
		$ret['sd_NewPayerNum'] = $this->sd_NewPayerNum;
		$ret['sd_DayPayAmount'] = $this->sd_DayPayAmount;
		$ret['sd_DayPayTime'] = $this->sd_DayPayTime;

		return $ret;
	}
}

?>
