<?php
require_once (FRAMEWORK_PATH . "utils/MysqlDBHelper.php");
require_once (FRAMEWORK_PATH . "db/SQLUtil.php");
/**
 * database table SD_AdvertisementClickRecord description
 * 
 * [This file was auto-generated. PLEASE DONT EDIT]
 * 
 * @author LiangZhixian
 * 
 */
class TbSDAdvertisementClickRecord {
	
	public static $_db_name = "pf_basemanage";
	
	private /*string*/ $sd_AdvertisementID; //PRIMARY KEY 
	private /*string*/ $sd_PhoneIMEI;
	private /*string*/ $sd_ClickIP;
	private /*string*/ $sd_ClickTime;

	
	private $is_this_table_dirty = false;
	private $is_sd_AdvertisementID_dirty = false;
	private $is_sd_PhoneIMEI_dirty = false;
	private $is_sd_ClickIP_dirty = false;
	private $is_sd_ClickTime_dirty = false;


	/**
	 * @param array($condition)
	 * @return array(TbSDAdvertisementClickRecord)
	 */
	public static function /*array(TbSDAdvertisementClickRecord)*/ loadTable(/*array*/ $fields=NULL,/*array*/$condition=NULL)
	{
		$result = array();
		
		$f = "*";
		
		if(!empty($fields))
		{
			$f = SQLUtil::parseFields($fields);			
		}
		
		if (empty($condition))
		{
			$sql = "SELECT {$f} FROM `SD_AdvertisementClickRecord`";
		}
		else
		{			
			$sql = "SELECT {$f} FROM `SD_AdvertisementClickRecord` WHERE ".SQLUtil::parseCondition($condition);
		}			
		
		$ar = sql_fetch_rows_assoc(self::$_db_name,$sql);
		
		if (empty($ar) || count($ar) == 0)
		{
			return $result;
		}
		
		foreach($ar as $row)
		{
			$tb = new TbSDAdvertisementClickRecord();			
			if (isset($row['sd_AdvertisementID'])) $tb->sd_AdvertisementID = $row['sd_AdvertisementID'];
			if (isset($row['sd_PhoneIMEI'])) $tb->sd_PhoneIMEI = $row['sd_PhoneIMEI'];
			if (isset($row['sd_ClickIP'])) $tb->sd_ClickIP = $row['sd_ClickIP'];
			if (isset($row['sd_ClickTime'])) $tb->sd_ClickTime = $row['sd_ClickTime'];
		
			$result[] = $tb;
		}
		
		return $result;
	}	
	
	public static function insertSqlHeader(/*array*/ $fields=NULL)
	{
		$result = array();				
		if(!empty($fields)){
			$f = SQLUtil::parseFields($fields);			
			$result[0] = "INSERT INTO `SD_AdvertisementClickRecord` ({$f}) VALUES ";	
			$ar = array();
			foreach($fields as $key){
				$ar[$key]=1;
			}
			$result[1] = $ar;
		}else{
			$result[0]="INSERT INTO `SD_AdvertisementClickRecord` (`sd_AdvertisementID`,`sd_PhoneIMEI`,`sd_ClickIP`,`sd_ClickTime`) VALUES ";
			$result[1] = array('sd_AdvertisementID'=>1,'sd_PhoneIMEI'=>1,'sd_ClickIP'=>1,'sd_ClickTime'=>1);
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
		
		$sql = "SELECT {$f} FROM `SD_AdvertisementClickRecord` WHERE {$c} LIMIT 1";


		$ars = sql_fetch_rows_assoc(self::$_db_name,$sql);
		
		if (!$ars || count($ars)==0)
		{
			return false;
		}
		
		$ar = $ars[0];
		
		if (isset($ar['sd_AdvertisementID'])) $this->sd_AdvertisementID = $ar['sd_AdvertisementID'];
		if (isset($ar['sd_PhoneIMEI'])) $this->sd_PhoneIMEI = $ar['sd_PhoneIMEI'];
		if (isset($ar['sd_ClickIP'])) $this->sd_ClickIP = $ar['sd_ClickIP'];
		if (isset($ar['sd_ClickTime'])) $this->sd_ClickTime = $ar['sd_ClickTime'];
		
		
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
    	if (!isset($this->sd_PhoneIMEI)){
    		$emptyFields = false;
    		$fields[] = 'sd_PhoneIMEI';
    	}else{
    		$emptyCondition = false; 
    		$condition['sd_PhoneIMEI']=$this->sd_PhoneIMEI;
    	}
    	if (!isset($this->sd_ClickIP)){
    		$emptyFields = false;
    		$fields[] = 'sd_ClickIP';
    	}else{
    		$emptyCondition = false; 
    		$condition['sd_ClickIP']=$this->sd_ClickIP;
    	}
    	if (!isset($this->sd_ClickTime)){
    		$emptyFields = false;
    		$fields[] = 'sd_ClickTime';
    	}else{
    		$emptyCondition = false; 
    		$condition['sd_ClickTime']=$this->sd_ClickTime;
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
		
		$sql = "DELETE FROM `SD_AdvertisementClickRecord` WHERE ".SQLUtil::parseCondition($condition);
		
		$qr = sql_query(self::$_db_name,$sql);
				
		return (boolean)$qr;
	}
	
	public function /*boolean*/ delete()
	{
		if (!$this->is_set_keys())
		{
			return false;
		}
		
		$sql = "DELETE FROM `SD_AdvertisementClickRecord` WHERE `sd_AdvertisementID`='{$this->sd_AdvertisementID}'";
		

		$qr = sql_query(self::$_db_name,$sql);
				
		return (boolean)$qr;
	}
	
	public function getInsertValue($fields)
	{
		$values = "(";		
		foreach($fields as $f => $k){
			if($f == 'sd_AdvertisementID'){
 				$values .= "'{$this->sd_AdvertisementID}',";
 			}else if($f == 'sd_PhoneIMEI'){
 				$values .= "'{$this->sd_PhoneIMEI}',";
 			}else if($f == 'sd_ClickIP'){
 				$values .= "'{$this->sd_ClickIP}',";
 			}else if($f == 'sd_ClickTime'){
 				$values .= "'{$this->sd_ClickTime}',";
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
		if (isset($this->sd_PhoneIMEI))
		{
			$fields .= "`sd_PhoneIMEI`,";
			$values .= "'{$this->sd_PhoneIMEI}',";
		}
		if (isset($this->sd_ClickIP))
		{
			$fields .= "`sd_ClickIP`,";
			$values .= "'{$this->sd_ClickIP}',";
		}
		if (isset($this->sd_ClickTime))
		{
			$fields .= "`sd_ClickTime`,";
			$values .= "'{$this->sd_ClickTime}',";
		}

		
		$fields .= ")";
		$values .= ")";
		
		$sql = "INSERT INTO `SD_AdvertisementClickRecord` ".$fields.$values;
		
		return str_replace(",)",")",$sql);
	}
	
	private function /*string*/ getUpdateFields()
	{
		$update = "";
		
		if ($this->is_sd_PhoneIMEI_dirty)
		{			
			if (!isset($this->sd_PhoneIMEI))
			{
				$update .= ("`sd_PhoneIMEI`=null,");
			}
			else
			{
				$update .= ("`sd_PhoneIMEI`='{$this->sd_PhoneIMEI}',");
			}
		}
		if ($this->is_sd_ClickIP_dirty)
		{			
			if (!isset($this->sd_ClickIP))
			{
				$update .= ("`sd_ClickIP`=null,");
			}
			else
			{
				$update .= ("`sd_ClickIP`='{$this->sd_ClickIP}',");
			}
		}
		if ($this->is_sd_ClickTime_dirty)
		{			
			if (!isset($this->sd_ClickTime))
			{
				$update .= ("`sd_ClickTime`=null,");
			}
			else
			{
				$update .= ("`sd_ClickTime`='{$this->sd_ClickTime}',");
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
		
		$sql = "UPDATE `SD_AdvertisementClickRecord` SET {$update} WHERE {$condition}";
		
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
		
		$sql = "UPDATE `SD_AdvertisementClickRecord` SET {$update} WHERE {$uc}";
		
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
		
		$sql = "UPDATE `SD_AdvertisementClickRecord` SET {$update} WHERE {$uc}";
		
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
		$this->is_sd_PhoneIMEI_dirty = false;
		$this->is_sd_ClickIP_dirty = false;
		$this->is_sd_ClickTime_dirty = false;

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

	public function /*string*/ getSdPhoneIMEI()
	{
		return $this->sd_PhoneIMEI;
	}
	
	public function /*void*/ setSdPhoneIMEI(/*string*/ $sd_PhoneIMEI)
	{
		$this->sd_PhoneIMEI = SQLUtil::toSafeSQLString($sd_PhoneIMEI);
		$this->is_sd_PhoneIMEI_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setSdPhoneIMEINull()
	{
		$this->sd_PhoneIMEI = null;
		$this->is_sd_PhoneIMEI_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*string*/ getSdClickIP()
	{
		return $this->sd_ClickIP;
	}
	
	public function /*void*/ setSdClickIP(/*string*/ $sd_ClickIP)
	{
		$this->sd_ClickIP = SQLUtil::toSafeSQLString($sd_ClickIP);
		$this->is_sd_ClickIP_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setSdClickIPNull()
	{
		$this->sd_ClickIP = null;
		$this->is_sd_ClickIP_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*string*/ getSdClickTime()
	{
		return $this->sd_ClickTime;
	}
	
	public function /*void*/ setSdClickTime(/*string*/ $sd_ClickTime)
	{
		$this->sd_ClickTime = SQLUtil::toSafeSQLString($sd_ClickTime);
		$this->is_sd_ClickTime_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setSdClickTimeNull()
	{
		$this->sd_ClickTime = null;
		$this->is_sd_ClickTime_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	
	public function /*string*/ toDebugString()
	{
		$dbg = "(";
		
		$dbg .= ("sd_AdvertisementID={$this->sd_AdvertisementID},");
		$dbg .= ("sd_PhoneIMEI={$this->sd_PhoneIMEI},");
		$dbg .= ("sd_ClickIP={$this->sd_ClickIP},");
		$dbg .= ("sd_ClickTime={$this->sd_ClickTime},");

		$dbg .= ")";
				
		return str_replace(",)",")",$dbg);
	}
	
	public function fromArray($arr)
	{
		if (isset($arr['sd_AdvertisementID'])) $this->setSdAdvertisementID($arr['sd_AdvertisementID']);
		if (isset($arr['sd_PhoneIMEI'])) $this->setSdPhoneIMEI($arr['sd_PhoneIMEI']);
		if (isset($arr['sd_ClickIP'])) $this->setSdClickIP($arr['sd_ClickIP']);
		if (isset($arr['sd_ClickTime'])) $this->setSdClickTime($arr['sd_ClickTime']);
		
	}
	
	public function toArray()
	{
		$ret = array();
		$ret['sd_AdvertisementID'] = $this->sd_AdvertisementID;
		$ret['sd_PhoneIMEI'] = $this->sd_PhoneIMEI;
		$ret['sd_ClickIP'] = $this->sd_ClickIP;
		$ret['sd_ClickTime'] = $this->sd_ClickTime;

		return $ret;
	}
}

?>
