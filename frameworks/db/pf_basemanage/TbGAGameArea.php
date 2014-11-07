<?php
require_once (FRAMEWORK_PATH . "utils/MysqlDBHelper.php");
require_once (FRAMEWORK_PATH . "db/SQLUtil.php");
/**
 * database table GA_GameArea description
 * 
 * [This file was auto-generated. PLEASE DONT EDIT]
 * 
 * @author LiangZhixian
 * 
 */
class TbGAGameArea {
	
	public static $_db_name = "pf_basemanage";
	
	private /*string*/ $ga_GameID; //游戏种类ID
	private /*int*/ $ga_AreaID; //分区ID
	private /*int*/ $ga_AreaIndex; //PRIMARY KEY 分区序号
	private /*string*/ $ga_AreaName; //分区名称
	private /*int*/ $ga_AreaPRI; //分区优先级号
	private /*string*/ $ga_AreaDesc; //分区简介
	private /*string*/ $ga_AreaPicture; //图象名称
	private /*int*/ $ga_AreaRank; //分区性质             0,分区正常开启             50,分区按时间开启             99,关闭
	private /*int*/ $ga_AreaState; //分区状态             0-正常显示             90,开启时间限定             99,删除             
	private /*string*/ $ga_AreaRemark; //备注

	
	private $is_this_table_dirty = false;
	private $is_ga_GameID_dirty = false;
	private $is_ga_AreaID_dirty = false;
	private $is_ga_AreaIndex_dirty = false;
	private $is_ga_AreaName_dirty = false;
	private $is_ga_AreaPRI_dirty = false;
	private $is_ga_AreaDesc_dirty = false;
	private $is_ga_AreaPicture_dirty = false;
	private $is_ga_AreaRank_dirty = false;
	private $is_ga_AreaState_dirty = false;
	private $is_ga_AreaRemark_dirty = false;


	/**
	 * @param array($condition)
	 * @return array(TbGAGameArea)
	 */
	public static function /*array(TbGAGameArea)*/ loadTable(/*array*/ $fields=NULL,/*array*/$condition=NULL)
	{
		$result = array();
		
		$f = "*";
		
		if(!empty($fields))
		{
			$f = SQLUtil::parseFields($fields);			
		}
		
		if (empty($condition))
		{
			$sql = "SELECT {$f} FROM `GA_GameArea`";
		}
		else
		{			
			$sql = "SELECT {$f} FROM `GA_GameArea` WHERE ".SQLUtil::parseCondition($condition);
		}			
		
		$ar = sql_fetch_rows_assoc(self::$_db_name,$sql);
		
		if (empty($ar) || count($ar) == 0)
		{
			return $result;
		}
		
		foreach($ar as $row)
		{
			$tb = new TbGAGameArea();			
			if (isset($row['ga_GameID'])) $tb->ga_GameID = $row['ga_GameID'];
			if (isset($row['ga_AreaID'])) $tb->ga_AreaID = intval($row['ga_AreaID']);
			if (isset($row['ga_AreaIndex'])) $tb->ga_AreaIndex = intval($row['ga_AreaIndex']);
			if (isset($row['ga_AreaName'])) $tb->ga_AreaName = $row['ga_AreaName'];
			if (isset($row['ga_AreaPRI'])) $tb->ga_AreaPRI = intval($row['ga_AreaPRI']);
			if (isset($row['ga_AreaDesc'])) $tb->ga_AreaDesc = $row['ga_AreaDesc'];
			if (isset($row['ga_AreaPicture'])) $tb->ga_AreaPicture = $row['ga_AreaPicture'];
			if (isset($row['ga_AreaRank'])) $tb->ga_AreaRank = intval($row['ga_AreaRank']);
			if (isset($row['ga_AreaState'])) $tb->ga_AreaState = intval($row['ga_AreaState']);
			if (isset($row['ga_AreaRemark'])) $tb->ga_AreaRemark = $row['ga_AreaRemark'];
		
			$result[] = $tb;
		}
		
		return $result;
	}	
	
	public static function insertSqlHeader(/*array*/ $fields=NULL)
	{
		$result = array();				
		if(!empty($fields)){
			$f = SQLUtil::parseFields($fields);			
			$result[0] = "INSERT INTO `GA_GameArea` ({$f}) VALUES ";	
			$ar = array();
			foreach($fields as $key){
				$ar[$key]=1;
			}
			$result[1] = $ar;
		}else{
			$result[0]="INSERT INTO `GA_GameArea` (`ga_GameID`,`ga_AreaID`,`ga_AreaIndex`,`ga_AreaName`,`ga_AreaPRI`,`ga_AreaDesc`,`ga_AreaPicture`,`ga_AreaRank`,`ga_AreaState`,`ga_AreaRemark`) VALUES ";
			$result[1] = array('ga_GameID'=>1,'ga_AreaID'=>1,'ga_AreaIndex'=>1,'ga_AreaName'=>1,'ga_AreaPRI'=>1,'ga_AreaDesc'=>1,'ga_AreaPicture'=>1,'ga_AreaRank'=>1,'ga_AreaState'=>1,'ga_AreaRemark'=>1);
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
		$c = "`ga_AreaIndex`='{$this->ga_AreaIndex}'";
		
		if(!empty($fields))
		{
			$f = SQLUtil::parseFields($fields);			
		}
	    if (!empty($condition))
		{
			$c =SQLUtil::parseCondition($condition);
		}
		
		$sql = "SELECT {$f} FROM `GA_GameArea` WHERE {$c} LIMIT 1";


		$ars = sql_fetch_rows_assoc(self::$_db_name,$sql);
		
		if (!$ars || count($ars)==0)
		{
			return false;
		}
		
		$ar = $ars[0];
		
		if (isset($ar['ga_GameID'])) $this->ga_GameID = $ar['ga_GameID'];
		if (isset($ar['ga_AreaID'])) $this->ga_AreaID = intval($ar['ga_AreaID']);
		if (isset($ar['ga_AreaIndex'])) $this->ga_AreaIndex = intval($ar['ga_AreaIndex']);
		if (isset($ar['ga_AreaName'])) $this->ga_AreaName = $ar['ga_AreaName'];
		if (isset($ar['ga_AreaPRI'])) $this->ga_AreaPRI = intval($ar['ga_AreaPRI']);
		if (isset($ar['ga_AreaDesc'])) $this->ga_AreaDesc = $ar['ga_AreaDesc'];
		if (isset($ar['ga_AreaPicture'])) $this->ga_AreaPicture = $ar['ga_AreaPicture'];
		if (isset($ar['ga_AreaRank'])) $this->ga_AreaRank = intval($ar['ga_AreaRank']);
		if (isset($ar['ga_AreaState'])) $this->ga_AreaState = intval($ar['ga_AreaState']);
		if (isset($ar['ga_AreaRemark'])) $this->ga_AreaRemark = $ar['ga_AreaRemark'];
		
		
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
    	if (!isset($this->ga_AreaIndex)){
    		$emptyFields = false;
    		$fields[] = 'ga_AreaIndex';
    	}else{
    		$emptyCondition = false; 
    		$condition['ga_AreaIndex']=$this->ga_AreaIndex;
    	}
    	if (!isset($this->ga_AreaName)){
    		$emptyFields = false;
    		$fields[] = 'ga_AreaName';
    	}else{
    		$emptyCondition = false; 
    		$condition['ga_AreaName']=$this->ga_AreaName;
    	}
    	if (!isset($this->ga_AreaPRI)){
    		$emptyFields = false;
    		$fields[] = 'ga_AreaPRI';
    	}else{
    		$emptyCondition = false; 
    		$condition['ga_AreaPRI']=$this->ga_AreaPRI;
    	}
    	if (!isset($this->ga_AreaDesc)){
    		$emptyFields = false;
    		$fields[] = 'ga_AreaDesc';
    	}else{
    		$emptyCondition = false; 
    		$condition['ga_AreaDesc']=$this->ga_AreaDesc;
    	}
    	if (!isset($this->ga_AreaPicture)){
    		$emptyFields = false;
    		$fields[] = 'ga_AreaPicture';
    	}else{
    		$emptyCondition = false; 
    		$condition['ga_AreaPicture']=$this->ga_AreaPicture;
    	}
    	if (!isset($this->ga_AreaRank)){
    		$emptyFields = false;
    		$fields[] = 'ga_AreaRank';
    	}else{
    		$emptyCondition = false; 
    		$condition['ga_AreaRank']=$this->ga_AreaRank;
    	}
    	if (!isset($this->ga_AreaState)){
    		$emptyFields = false;
    		$fields[] = 'ga_AreaState';
    	}else{
    		$emptyCondition = false; 
    		$condition['ga_AreaState']=$this->ga_AreaState;
    	}
    	if (!isset($this->ga_AreaRemark)){
    		$emptyFields = false;
    		$fields[] = 'ga_AreaRemark';
    	}else{
    		$emptyCondition = false; 
    		$condition['ga_AreaRemark']=$this->ga_AreaRemark;
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
				
		if (!isset($this->ga_AreaIndex)) $this->ga_AreaIndex = get_mysql_insert_id(self::$_db_name);

		
		$this->clean();
		
		return true;	
		
	}
	
	public function /*boolean*/ save(/*array*/$condition=NULL)
	{
		if (empty($condition))
		{
			$uc = "`ga_AreaIndex`='{$this->ga_AreaIndex}'";
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
		
		$sql = "DELETE FROM `GA_GameArea` WHERE ".SQLUtil::parseCondition($condition);
		
		$qr = sql_query(self::$_db_name,$sql);
				
		return (boolean)$qr;
	}
	
	public function /*boolean*/ delete()
	{
		if (!$this->is_set_keys())
		{
			return false;
		}
		
		$sql = "DELETE FROM `GA_GameArea` WHERE `ga_AreaIndex`='{$this->ga_AreaIndex}'";
		

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
 			}else if($f == 'ga_AreaIndex'){
 				$values .= "'{$this->ga_AreaIndex}',";
 			}else if($f == 'ga_AreaName'){
 				$values .= "'{$this->ga_AreaName}',";
 			}else if($f == 'ga_AreaPRI'){
 				$values .= "'{$this->ga_AreaPRI}',";
 			}else if($f == 'ga_AreaDesc'){
 				$values .= "'{$this->ga_AreaDesc}',";
 			}else if($f == 'ga_AreaPicture'){
 				$values .= "'{$this->ga_AreaPicture}',";
 			}else if($f == 'ga_AreaRank'){
 				$values .= "'{$this->ga_AreaRank}',";
 			}else if($f == 'ga_AreaState'){
 				$values .= "'{$this->ga_AreaState}',";
 			}else if($f == 'ga_AreaRemark'){
 				$values .= "'{$this->ga_AreaRemark}',";
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
		if (isset($this->ga_AreaIndex))
		{
			$fields .= "`ga_AreaIndex`,";
			$values .= "'{$this->ga_AreaIndex}',";
		}
		if (isset($this->ga_AreaName))
		{
			$fields .= "`ga_AreaName`,";
			$values .= "'{$this->ga_AreaName}',";
		}
		if (isset($this->ga_AreaPRI))
		{
			$fields .= "`ga_AreaPRI`,";
			$values .= "'{$this->ga_AreaPRI}',";
		}
		if (isset($this->ga_AreaDesc))
		{
			$fields .= "`ga_AreaDesc`,";
			$values .= "'{$this->ga_AreaDesc}',";
		}
		if (isset($this->ga_AreaPicture))
		{
			$fields .= "`ga_AreaPicture`,";
			$values .= "'{$this->ga_AreaPicture}',";
		}
		if (isset($this->ga_AreaRank))
		{
			$fields .= "`ga_AreaRank`,";
			$values .= "'{$this->ga_AreaRank}',";
		}
		if (isset($this->ga_AreaState))
		{
			$fields .= "`ga_AreaState`,";
			$values .= "'{$this->ga_AreaState}',";
		}
		if (isset($this->ga_AreaRemark))
		{
			$fields .= "`ga_AreaRemark`,";
			$values .= "'{$this->ga_AreaRemark}',";
		}

		
		$fields .= ")";
		$values .= ")";
		
		$sql = "INSERT INTO `GA_GameArea` ".$fields.$values;
		
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
		if ($this->is_ga_AreaPRI_dirty)
		{			
			if (!isset($this->ga_AreaPRI))
			{
				$update .= ("`ga_AreaPRI`=null,");
			}
			else
			{
				$update .= ("`ga_AreaPRI`='{$this->ga_AreaPRI}',");
			}
		}
		if ($this->is_ga_AreaDesc_dirty)
		{			
			if (!isset($this->ga_AreaDesc))
			{
				$update .= ("`ga_AreaDesc`=null,");
			}
			else
			{
				$update .= ("`ga_AreaDesc`='{$this->ga_AreaDesc}',");
			}
		}
		if ($this->is_ga_AreaPicture_dirty)
		{			
			if (!isset($this->ga_AreaPicture))
			{
				$update .= ("`ga_AreaPicture`=null,");
			}
			else
			{
				$update .= ("`ga_AreaPicture`='{$this->ga_AreaPicture}',");
			}
		}
		if ($this->is_ga_AreaRank_dirty)
		{			
			if (!isset($this->ga_AreaRank))
			{
				$update .= ("`ga_AreaRank`=null,");
			}
			else
			{
				$update .= ("`ga_AreaRank`='{$this->ga_AreaRank}',");
			}
		}
		if ($this->is_ga_AreaState_dirty)
		{			
			if (!isset($this->ga_AreaState))
			{
				$update .= ("`ga_AreaState`=null,");
			}
			else
			{
				$update .= ("`ga_AreaState`='{$this->ga_AreaState}',");
			}
		}
		if ($this->is_ga_AreaRemark_dirty)
		{			
			if (!isset($this->ga_AreaRemark))
			{
				$update .= ("`ga_AreaRemark`=null,");
			}
			else
			{
				$update .= ("`ga_AreaRemark`='{$this->ga_AreaRemark}',");
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
		
		$sql = "UPDATE `GA_GameArea` SET {$update} WHERE {$condition}";
		
		return $sql;
	}
	
	public function /*boolean*/ add($fieldsValue,$condition=NULL)
	{				
		if (empty($condition))
		{
			$uc = "`ga_AreaIndex`='{$this->ga_AreaIndex}'";
		}
		else
		{			
			$uc = SQLUtil::parseCondition($condition);
		}
		
		$update = SQLUtil::parseASFieldValues($fieldsValue);
		
		$sql = "UPDATE `GA_GameArea` SET {$update} WHERE {$uc}";
		
		$qr = sql_query(self::$_db_name,$sql);
				
		return (boolean)$qr;
	}	
	
	public function /*boolean*/ sub($fieldsValue,$condition=NULL)
	{
		if (empty($condition))
		{
			$uc = "`ga_AreaIndex`='{$this->ga_AreaIndex}'";
		}
		else
		{			
			$uc = SQLUtil::parseCondition($condition);
		}
		
		$update = SQLUtil::parseASFieldValues($fieldsValue,false);
		
		$sql = "UPDATE `GA_GameArea` SET {$update} WHERE {$uc}";
		
		$qr = sql_query(self::$_db_name,$sql);
				
		return (boolean)$qr;
	}
	
	/**
	 * 是否已经设置主键的值
	 */
	public function is_set_keys()
	{
		
		return (isset($this->ga_AreaIndex));

	}
	
	private function /*void*/ clean() 
	{
		$this->is_this_table_dirty = false;
		$this->is_ga_GameID_dirty = false;
		$this->is_ga_AreaID_dirty = false;
		$this->is_ga_AreaIndex_dirty = false;
		$this->is_ga_AreaName_dirty = false;
		$this->is_ga_AreaPRI_dirty = false;
		$this->is_ga_AreaDesc_dirty = false;
		$this->is_ga_AreaPicture_dirty = false;
		$this->is_ga_AreaRank_dirty = false;
		$this->is_ga_AreaState_dirty = false;
		$this->is_ga_AreaRemark_dirty = false;

	}
	
	public function /*string*/ getGaGameID()
	{
		return $this->ga_GameID;
	}
	
	public function /*void*/ setGaGameID(/*string*/ $ga_GameID)
	{
		$this->ga_GameID = SQLUtil::toSafeSQLString($ga_GameID);
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

	public function /*int*/ getGaAreaIndex()
	{
		return $this->ga_AreaIndex;
	}
	
	public function /*void*/ setGaAreaIndex(/*int*/ $ga_AreaIndex)
	{
		$this->ga_AreaIndex = intval($ga_AreaIndex);
		$this->is_ga_AreaIndex_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setGaAreaIndexNull()
	{
		$this->ga_AreaIndex = null;
		$this->is_ga_AreaIndex_dirty = true;		
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

	public function /*int*/ getGaAreaPRI()
	{
		return $this->ga_AreaPRI;
	}
	
	public function /*void*/ setGaAreaPRI(/*int*/ $ga_AreaPRI)
	{
		$this->ga_AreaPRI = intval($ga_AreaPRI);
		$this->is_ga_AreaPRI_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setGaAreaPRINull()
	{
		$this->ga_AreaPRI = null;
		$this->is_ga_AreaPRI_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*string*/ getGaAreaDesc()
	{
		return $this->ga_AreaDesc;
	}
	
	public function /*void*/ setGaAreaDesc(/*string*/ $ga_AreaDesc)
	{
		$this->ga_AreaDesc = SQLUtil::toSafeSQLString($ga_AreaDesc);
		$this->is_ga_AreaDesc_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setGaAreaDescNull()
	{
		$this->ga_AreaDesc = null;
		$this->is_ga_AreaDesc_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*string*/ getGaAreaPicture()
	{
		return $this->ga_AreaPicture;
	}
	
	public function /*void*/ setGaAreaPicture(/*string*/ $ga_AreaPicture)
	{
		$this->ga_AreaPicture = SQLUtil::toSafeSQLString($ga_AreaPicture);
		$this->is_ga_AreaPicture_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setGaAreaPictureNull()
	{
		$this->ga_AreaPicture = null;
		$this->is_ga_AreaPicture_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*int*/ getGaAreaRank()
	{
		return $this->ga_AreaRank;
	}
	
	public function /*void*/ setGaAreaRank(/*int*/ $ga_AreaRank)
	{
		$this->ga_AreaRank = intval($ga_AreaRank);
		$this->is_ga_AreaRank_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setGaAreaRankNull()
	{
		$this->ga_AreaRank = null;
		$this->is_ga_AreaRank_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*int*/ getGaAreaState()
	{
		return $this->ga_AreaState;
	}
	
	public function /*void*/ setGaAreaState(/*int*/ $ga_AreaState)
	{
		$this->ga_AreaState = intval($ga_AreaState);
		$this->is_ga_AreaState_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setGaAreaStateNull()
	{
		$this->ga_AreaState = null;
		$this->is_ga_AreaState_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*string*/ getGaAreaRemark()
	{
		return $this->ga_AreaRemark;
	}
	
	public function /*void*/ setGaAreaRemark(/*string*/ $ga_AreaRemark)
	{
		$this->ga_AreaRemark = SQLUtil::toSafeSQLString($ga_AreaRemark);
		$this->is_ga_AreaRemark_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setGaAreaRemarkNull()
	{
		$this->ga_AreaRemark = null;
		$this->is_ga_AreaRemark_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	
	public function /*string*/ toDebugString()
	{
		$dbg = "(";
		
		$dbg .= ("ga_GameID={$this->ga_GameID},");
		$dbg .= ("ga_AreaID={$this->ga_AreaID},");
		$dbg .= ("ga_AreaIndex={$this->ga_AreaIndex},");
		$dbg .= ("ga_AreaName={$this->ga_AreaName},");
		$dbg .= ("ga_AreaPRI={$this->ga_AreaPRI},");
		$dbg .= ("ga_AreaDesc={$this->ga_AreaDesc},");
		$dbg .= ("ga_AreaPicture={$this->ga_AreaPicture},");
		$dbg .= ("ga_AreaRank={$this->ga_AreaRank},");
		$dbg .= ("ga_AreaState={$this->ga_AreaState},");
		$dbg .= ("ga_AreaRemark={$this->ga_AreaRemark},");

		$dbg .= ")";
				
		return str_replace(",)",")",$dbg);
	}
	
	public function fromArray($arr)
	{
		if (isset($arr['ga_GameID'])) $this->setGaGameID($arr['ga_GameID']);
		if (isset($arr['ga_AreaID'])) $this->setGaAreaID($arr['ga_AreaID']);
		if (isset($arr['ga_AreaIndex'])) $this->setGaAreaIndex($arr['ga_AreaIndex']);
		if (isset($arr['ga_AreaName'])) $this->setGaAreaName($arr['ga_AreaName']);
		if (isset($arr['ga_AreaPRI'])) $this->setGaAreaPRI($arr['ga_AreaPRI']);
		if (isset($arr['ga_AreaDesc'])) $this->setGaAreaDesc($arr['ga_AreaDesc']);
		if (isset($arr['ga_AreaPicture'])) $this->setGaAreaPicture($arr['ga_AreaPicture']);
		if (isset($arr['ga_AreaRank'])) $this->setGaAreaRank($arr['ga_AreaRank']);
		if (isset($arr['ga_AreaState'])) $this->setGaAreaState($arr['ga_AreaState']);
		if (isset($arr['ga_AreaRemark'])) $this->setGaAreaRemark($arr['ga_AreaRemark']);
		
	}
	
	public function toArray()
	{
		$ret = array();
		$ret['ga_GameID'] = $this->ga_GameID;
		$ret['ga_AreaID'] = $this->ga_AreaID;
		$ret['ga_AreaIndex'] = $this->ga_AreaIndex;
		$ret['ga_AreaName'] = $this->ga_AreaName;
		$ret['ga_AreaPRI'] = $this->ga_AreaPRI;
		$ret['ga_AreaDesc'] = $this->ga_AreaDesc;
		$ret['ga_AreaPicture'] = $this->ga_AreaPicture;
		$ret['ga_AreaRank'] = $this->ga_AreaRank;
		$ret['ga_AreaState'] = $this->ga_AreaState;
		$ret['ga_AreaRemark'] = $this->ga_AreaRemark;

		return $ret;
	}
}

?>
