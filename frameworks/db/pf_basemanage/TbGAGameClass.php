<?php
require_once (FRAMEWORK_PATH . "utils/MysqlDBHelper.php");
require_once (FRAMEWORK_PATH . "db/SQLUtil.php");
/**
 * database table GA_GameClass description
 * 
 * [This file was auto-generated. PLEASE DONT EDIT]
 * 
 * @author LiangZhixian
 * 
 */
class TbGAGameClass {
	
	public static $_db_name = "pf_basemanage";
	
	private /*string*/ $ga_GameID; //PRIMARY KEY 游戏种类ID
	private /*string*/ $ga_GameAlias; //游戏短名
	private /*string*/ $ga_GameName; //游戏种类名称
	private /*string*/ $ga_GamePicture; //图象
	private /*int*/ $ga_GameRank; //游戏种类性质
	private /*int*/ $ga_GameState; //数据状态             0=正常             1=删除
	private /*string*/ $ga_GameWebsite; //官网地址
	private /*string*/ $ga_GameRemark; //备注
	private /*int*/ $ga_GameScale; //缩放
	private /*string*/ $ga_GameMonetaryUnit; //游戏币单位
	private /*int*/ $ga_GameCloseSdkGashPayment; //是否关闭SDK充值

	
	private $is_this_table_dirty = false;
	private $is_ga_GameID_dirty = false;
	private $is_ga_GameAlias_dirty = false;
	private $is_ga_GameName_dirty = false;
	private $is_ga_GamePicture_dirty = false;
	private $is_ga_GameRank_dirty = false;
	private $is_ga_GameState_dirty = false;
	private $is_ga_GameWebsite_dirty = false;
	private $is_ga_GameRemark_dirty = false;
	private $is_ga_GameScale_dirty = false;
	private $is_ga_GameMonetaryUnit_dirty = false;
	private $is_ga_GameCloseSdkGashPayment_dirty = false;


	/**
	 * @param array($condition)
	 * @return array(TbGAGameClass)
	 */
	public static function /*array(TbGAGameClass)*/ loadTable(/*array*/ $fields=NULL,/*array*/$condition=NULL)
	{
		$result = array();
		
		$f = "*";
		
		if(!empty($fields))
		{
			$f = SQLUtil::parseFields($fields);			
		}
		
		if (empty($condition))
		{
			$sql = "SELECT {$f} FROM `GA_GameClass`";
		}
		else
		{			
			$sql = "SELECT {$f} FROM `GA_GameClass` WHERE ".SQLUtil::parseCondition($condition);
		}			
		
		$ar = sql_fetch_rows_assoc(self::$_db_name,$sql);
		
		if (empty($ar) || count($ar) == 0)
		{
			return $result;
		}
		
		foreach($ar as $row)
		{
			$tb = new TbGAGameClass();			
			if (isset($row['ga_GameID'])) $tb->ga_GameID = $row['ga_GameID'];
			if (isset($row['ga_GameAlias'])) $tb->ga_GameAlias = $row['ga_GameAlias'];
			if (isset($row['ga_GameName'])) $tb->ga_GameName = $row['ga_GameName'];
			if (isset($row['ga_GamePicture'])) $tb->ga_GamePicture = $row['ga_GamePicture'];
			if (isset($row['ga_GameRank'])) $tb->ga_GameRank = intval($row['ga_GameRank']);
			if (isset($row['ga_GameState'])) $tb->ga_GameState = intval($row['ga_GameState']);
			if (isset($row['ga_GameWebsite'])) $tb->ga_GameWebsite = $row['ga_GameWebsite'];
			if (isset($row['ga_GameRemark'])) $tb->ga_GameRemark = $row['ga_GameRemark'];
			if (isset($row['ga_GameScale'])) $tb->ga_GameScale = intval($row['ga_GameScale']);
			if (isset($row['ga_GameMonetaryUnit'])) $tb->ga_GameMonetaryUnit = $row['ga_GameMonetaryUnit'];
			if (isset($row['ga_GameCloseSdkGashPayment'])) $tb->ga_GameCloseSdkGashPayment = intval($row['ga_GameCloseSdkGashPayment']);
		
			$result[] = $tb;
		}
		
		return $result;
	}	
	
	public static function insertSqlHeader(/*array*/ $fields=NULL)
	{
		$result = array();				
		if(!empty($fields)){
			$f = SQLUtil::parseFields($fields);			
			$result[0] = "INSERT INTO `GA_GameClass` ({$f}) VALUES ";	
			$ar = array();
			foreach($fields as $key){
				$ar[$key]=1;
			}
			$result[1] = $ar;
		}else{
			$result[0]="INSERT INTO `GA_GameClass` (`ga_GameID`,`ga_GameAlias`,`ga_GameName`,`ga_GamePicture`,`ga_GameRank`,`ga_GameState`,`ga_GameWebsite`,`ga_GameRemark`,`ga_GameScale`,`ga_GameMonetaryUnit`,`ga_GameCloseSdkGashPayment`) VALUES ";
			$result[1] = array('ga_GameID'=>1,'ga_GameAlias'=>1,'ga_GameName'=>1,'ga_GamePicture'=>1,'ga_GameRank'=>1,'ga_GameState'=>1,'ga_GameWebsite'=>1,'ga_GameRemark'=>1,'ga_GameScale'=>1,'ga_GameMonetaryUnit'=>1,'ga_GameCloseSdkGashPayment'=>1);
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
		
		$sql = "SELECT {$f} FROM `GA_GameClass` WHERE {$c} LIMIT 1";


		$ars = sql_fetch_rows_assoc(self::$_db_name,$sql);
		
		if (!$ars || count($ars)==0)
		{
			return false;
		}
		
		$ar = $ars[0];
		
		if (isset($ar['ga_GameID'])) $this->ga_GameID = $ar['ga_GameID'];
		if (isset($ar['ga_GameAlias'])) $this->ga_GameAlias = $ar['ga_GameAlias'];
		if (isset($ar['ga_GameName'])) $this->ga_GameName = $ar['ga_GameName'];
		if (isset($ar['ga_GamePicture'])) $this->ga_GamePicture = $ar['ga_GamePicture'];
		if (isset($ar['ga_GameRank'])) $this->ga_GameRank = intval($ar['ga_GameRank']);
		if (isset($ar['ga_GameState'])) $this->ga_GameState = intval($ar['ga_GameState']);
		if (isset($ar['ga_GameWebsite'])) $this->ga_GameWebsite = $ar['ga_GameWebsite'];
		if (isset($ar['ga_GameRemark'])) $this->ga_GameRemark = $ar['ga_GameRemark'];
		if (isset($ar['ga_GameScale'])) $this->ga_GameScale = intval($ar['ga_GameScale']);
		if (isset($ar['ga_GameMonetaryUnit'])) $this->ga_GameMonetaryUnit = $ar['ga_GameMonetaryUnit'];
		if (isset($ar['ga_GameCloseSdkGashPayment'])) $this->ga_GameCloseSdkGashPayment = intval($ar['ga_GameCloseSdkGashPayment']);
		
		
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
    	if (!isset($this->ga_GameAlias)){
    		$emptyFields = false;
    		$fields[] = 'ga_GameAlias';
    	}else{
    		$emptyCondition = false; 
    		$condition['ga_GameAlias']=$this->ga_GameAlias;
    	}
    	if (!isset($this->ga_GameName)){
    		$emptyFields = false;
    		$fields[] = 'ga_GameName';
    	}else{
    		$emptyCondition = false; 
    		$condition['ga_GameName']=$this->ga_GameName;
    	}
    	if (!isset($this->ga_GamePicture)){
    		$emptyFields = false;
    		$fields[] = 'ga_GamePicture';
    	}else{
    		$emptyCondition = false; 
    		$condition['ga_GamePicture']=$this->ga_GamePicture;
    	}
    	if (!isset($this->ga_GameRank)){
    		$emptyFields = false;
    		$fields[] = 'ga_GameRank';
    	}else{
    		$emptyCondition = false; 
    		$condition['ga_GameRank']=$this->ga_GameRank;
    	}
    	if (!isset($this->ga_GameState)){
    		$emptyFields = false;
    		$fields[] = 'ga_GameState';
    	}else{
    		$emptyCondition = false; 
    		$condition['ga_GameState']=$this->ga_GameState;
    	}
    	if (!isset($this->ga_GameWebsite)){
    		$emptyFields = false;
    		$fields[] = 'ga_GameWebsite';
    	}else{
    		$emptyCondition = false; 
    		$condition['ga_GameWebsite']=$this->ga_GameWebsite;
    	}
    	if (!isset($this->ga_GameRemark)){
    		$emptyFields = false;
    		$fields[] = 'ga_GameRemark';
    	}else{
    		$emptyCondition = false; 
    		$condition['ga_GameRemark']=$this->ga_GameRemark;
    	}
    	if (!isset($this->ga_GameScale)){
    		$emptyFields = false;
    		$fields[] = 'ga_GameScale';
    	}else{
    		$emptyCondition = false; 
    		$condition['ga_GameScale']=$this->ga_GameScale;
    	}
    	if (!isset($this->ga_GameMonetaryUnit)){
    		$emptyFields = false;
    		$fields[] = 'ga_GameMonetaryUnit';
    	}else{
    		$emptyCondition = false; 
    		$condition['ga_GameMonetaryUnit']=$this->ga_GameMonetaryUnit;
    	}
    	if (!isset($this->ga_GameCloseSdkGashPayment)){
    		$emptyFields = false;
    		$fields[] = 'ga_GameCloseSdkGashPayment';
    	}else{
    		$emptyCondition = false; 
    		$condition['ga_GameCloseSdkGashPayment']=$this->ga_GameCloseSdkGashPayment;
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
		
		$sql = "DELETE FROM `GA_GameClass` WHERE ".SQLUtil::parseCondition($condition);
		
		$qr = sql_query(self::$_db_name,$sql);
				
		return (boolean)$qr;
	}
	
	public function /*boolean*/ delete()
	{
		if (!$this->is_set_keys())
		{
			return false;
		}
		
		$sql = "DELETE FROM `GA_GameClass` WHERE `ga_GameID`='{$this->ga_GameID}'";
		

		$qr = sql_query(self::$_db_name,$sql);
				
		return (boolean)$qr;
	}
	
	public function getInsertValue($fields)
	{
		$values = "(";		
		foreach($fields as $f => $k){
			if($f == 'ga_GameID'){
 				$values .= "'{$this->ga_GameID}',";
 			}else if($f == 'ga_GameAlias'){
 				$values .= "'{$this->ga_GameAlias}',";
 			}else if($f == 'ga_GameName'){
 				$values .= "'{$this->ga_GameName}',";
 			}else if($f == 'ga_GamePicture'){
 				$values .= "'{$this->ga_GamePicture}',";
 			}else if($f == 'ga_GameRank'){
 				$values .= "'{$this->ga_GameRank}',";
 			}else if($f == 'ga_GameState'){
 				$values .= "'{$this->ga_GameState}',";
 			}else if($f == 'ga_GameWebsite'){
 				$values .= "'{$this->ga_GameWebsite}',";
 			}else if($f == 'ga_GameRemark'){
 				$values .= "'{$this->ga_GameRemark}',";
 			}else if($f == 'ga_GameScale'){
 				$values .= "'{$this->ga_GameScale}',";
 			}else if($f == 'ga_GameMonetaryUnit'){
 				$values .= "'{$this->ga_GameMonetaryUnit}',";
 			}else if($f == 'ga_GameCloseSdkGashPayment'){
 				$values .= "'{$this->ga_GameCloseSdkGashPayment}',";
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
		if (isset($this->ga_GameAlias))
		{
			$fields .= "`ga_GameAlias`,";
			$values .= "'{$this->ga_GameAlias}',";
		}
		if (isset($this->ga_GameName))
		{
			$fields .= "`ga_GameName`,";
			$values .= "'{$this->ga_GameName}',";
		}
		if (isset($this->ga_GamePicture))
		{
			$fields .= "`ga_GamePicture`,";
			$values .= "'{$this->ga_GamePicture}',";
		}
		if (isset($this->ga_GameRank))
		{
			$fields .= "`ga_GameRank`,";
			$values .= "'{$this->ga_GameRank}',";
		}
		if (isset($this->ga_GameState))
		{
			$fields .= "`ga_GameState`,";
			$values .= "'{$this->ga_GameState}',";
		}
		if (isset($this->ga_GameWebsite))
		{
			$fields .= "`ga_GameWebsite`,";
			$values .= "'{$this->ga_GameWebsite}',";
		}
		if (isset($this->ga_GameRemark))
		{
			$fields .= "`ga_GameRemark`,";
			$values .= "'{$this->ga_GameRemark}',";
		}
		if (isset($this->ga_GameScale))
		{
			$fields .= "`ga_GameScale`,";
			$values .= "'{$this->ga_GameScale}',";
		}
		if (isset($this->ga_GameMonetaryUnit))
		{
			$fields .= "`ga_GameMonetaryUnit`,";
			$values .= "'{$this->ga_GameMonetaryUnit}',";
		}
		if (isset($this->ga_GameCloseSdkGashPayment))
		{
			$fields .= "`ga_GameCloseSdkGashPayment`,";
			$values .= "'{$this->ga_GameCloseSdkGashPayment}',";
		}

		
		$fields .= ")";
		$values .= ")";
		
		$sql = "INSERT INTO `GA_GameClass` ".$fields.$values;
		
		return str_replace(",)",")",$sql);
	}
	
	private function /*string*/ getUpdateFields()
	{
		$update = "";
		
		if ($this->is_ga_GameAlias_dirty)
		{			
			if (!isset($this->ga_GameAlias))
			{
				$update .= ("`ga_GameAlias`=null,");
			}
			else
			{
				$update .= ("`ga_GameAlias`='{$this->ga_GameAlias}',");
			}
		}
		if ($this->is_ga_GameName_dirty)
		{			
			if (!isset($this->ga_GameName))
			{
				$update .= ("`ga_GameName`=null,");
			}
			else
			{
				$update .= ("`ga_GameName`='{$this->ga_GameName}',");
			}
		}
		if ($this->is_ga_GamePicture_dirty)
		{			
			if (!isset($this->ga_GamePicture))
			{
				$update .= ("`ga_GamePicture`=null,");
			}
			else
			{
				$update .= ("`ga_GamePicture`='{$this->ga_GamePicture}',");
			}
		}
		if ($this->is_ga_GameRank_dirty)
		{			
			if (!isset($this->ga_GameRank))
			{
				$update .= ("`ga_GameRank`=null,");
			}
			else
			{
				$update .= ("`ga_GameRank`='{$this->ga_GameRank}',");
			}
		}
		if ($this->is_ga_GameState_dirty)
		{			
			if (!isset($this->ga_GameState))
			{
				$update .= ("`ga_GameState`=null,");
			}
			else
			{
				$update .= ("`ga_GameState`='{$this->ga_GameState}',");
			}
		}
		if ($this->is_ga_GameWebsite_dirty)
		{			
			if (!isset($this->ga_GameWebsite))
			{
				$update .= ("`ga_GameWebsite`=null,");
			}
			else
			{
				$update .= ("`ga_GameWebsite`='{$this->ga_GameWebsite}',");
			}
		}
		if ($this->is_ga_GameRemark_dirty)
		{			
			if (!isset($this->ga_GameRemark))
			{
				$update .= ("`ga_GameRemark`=null,");
			}
			else
			{
				$update .= ("`ga_GameRemark`='{$this->ga_GameRemark}',");
			}
		}
		if ($this->is_ga_GameScale_dirty)
		{			
			if (!isset($this->ga_GameScale))
			{
				$update .= ("`ga_GameScale`=null,");
			}
			else
			{
				$update .= ("`ga_GameScale`='{$this->ga_GameScale}',");
			}
		}
		if ($this->is_ga_GameMonetaryUnit_dirty)
		{			
			if (!isset($this->ga_GameMonetaryUnit))
			{
				$update .= ("`ga_GameMonetaryUnit`=null,");
			}
			else
			{
				$update .= ("`ga_GameMonetaryUnit`='{$this->ga_GameMonetaryUnit}',");
			}
		}
		if ($this->is_ga_GameCloseSdkGashPayment_dirty)
		{			
			if (!isset($this->ga_GameCloseSdkGashPayment))
			{
				$update .= ("`ga_GameCloseSdkGashPayment`=null,");
			}
			else
			{
				$update .= ("`ga_GameCloseSdkGashPayment`='{$this->ga_GameCloseSdkGashPayment}',");
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
		
		$sql = "UPDATE `GA_GameClass` SET {$update} WHERE {$condition}";
		
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
		
		$sql = "UPDATE `GA_GameClass` SET {$update} WHERE {$uc}";
		
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
		
		$sql = "UPDATE `GA_GameClass` SET {$update} WHERE {$uc}";
		
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
		$this->is_ga_GameAlias_dirty = false;
		$this->is_ga_GameName_dirty = false;
		$this->is_ga_GamePicture_dirty = false;
		$this->is_ga_GameRank_dirty = false;
		$this->is_ga_GameState_dirty = false;
		$this->is_ga_GameWebsite_dirty = false;
		$this->is_ga_GameRemark_dirty = false;
		$this->is_ga_GameScale_dirty = false;
		$this->is_ga_GameMonetaryUnit_dirty = false;
		$this->is_ga_GameCloseSdkGashPayment_dirty = false;

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

	public function /*string*/ getGaGameAlias()
	{
		return $this->ga_GameAlias;
	}
	
	public function /*void*/ setGaGameAlias(/*string*/ $ga_GameAlias)
	{
		$this->ga_GameAlias = SQLUtil::toSafeSQLString($ga_GameAlias);
		$this->is_ga_GameAlias_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setGaGameAliasNull()
	{
		$this->ga_GameAlias = null;
		$this->is_ga_GameAlias_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*string*/ getGaGameName()
	{
		return $this->ga_GameName;
	}
	
	public function /*void*/ setGaGameName(/*string*/ $ga_GameName)
	{
		$this->ga_GameName = SQLUtil::toSafeSQLString($ga_GameName);
		$this->is_ga_GameName_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setGaGameNameNull()
	{
		$this->ga_GameName = null;
		$this->is_ga_GameName_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*string*/ getGaGamePicture()
	{
		return $this->ga_GamePicture;
	}
	
	public function /*void*/ setGaGamePicture(/*string*/ $ga_GamePicture)
	{
		$this->ga_GamePicture = SQLUtil::toSafeSQLString($ga_GamePicture);
		$this->is_ga_GamePicture_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setGaGamePictureNull()
	{
		$this->ga_GamePicture = null;
		$this->is_ga_GamePicture_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*int*/ getGaGameRank()
	{
		return $this->ga_GameRank;
	}
	
	public function /*void*/ setGaGameRank(/*int*/ $ga_GameRank)
	{
		$this->ga_GameRank = intval($ga_GameRank);
		$this->is_ga_GameRank_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setGaGameRankNull()
	{
		$this->ga_GameRank = null;
		$this->is_ga_GameRank_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*int*/ getGaGameState()
	{
		return $this->ga_GameState;
	}
	
	public function /*void*/ setGaGameState(/*int*/ $ga_GameState)
	{
		$this->ga_GameState = intval($ga_GameState);
		$this->is_ga_GameState_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setGaGameStateNull()
	{
		$this->ga_GameState = null;
		$this->is_ga_GameState_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*string*/ getGaGameWebsite()
	{
		return $this->ga_GameWebsite;
	}
	
	public function /*void*/ setGaGameWebsite(/*string*/ $ga_GameWebsite)
	{
		$this->ga_GameWebsite = SQLUtil::toSafeSQLString($ga_GameWebsite);
		$this->is_ga_GameWebsite_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setGaGameWebsiteNull()
	{
		$this->ga_GameWebsite = null;
		$this->is_ga_GameWebsite_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*string*/ getGaGameRemark()
	{
		return $this->ga_GameRemark;
	}
	
	public function /*void*/ setGaGameRemark(/*string*/ $ga_GameRemark)
	{
		$this->ga_GameRemark = SQLUtil::toSafeSQLString($ga_GameRemark);
		$this->is_ga_GameRemark_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setGaGameRemarkNull()
	{
		$this->ga_GameRemark = null;
		$this->is_ga_GameRemark_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*int*/ getGaGameScale()
	{
		return $this->ga_GameScale;
	}
	
	public function /*void*/ setGaGameScale(/*int*/ $ga_GameScale)
	{
		$this->ga_GameScale = intval($ga_GameScale);
		$this->is_ga_GameScale_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setGaGameScaleNull()
	{
		$this->ga_GameScale = null;
		$this->is_ga_GameScale_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*string*/ getGaGameMonetaryUnit()
	{
		return $this->ga_GameMonetaryUnit;
	}
	
	public function /*void*/ setGaGameMonetaryUnit(/*string*/ $ga_GameMonetaryUnit)
	{
		$this->ga_GameMonetaryUnit = SQLUtil::toSafeSQLString($ga_GameMonetaryUnit);
		$this->is_ga_GameMonetaryUnit_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setGaGameMonetaryUnitNull()
	{
		$this->ga_GameMonetaryUnit = null;
		$this->is_ga_GameMonetaryUnit_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	public function /*int*/ getGaGameCloseSdkGashPayment()
	{
		return $this->ga_GameCloseSdkGashPayment;
	}
	
	public function /*void*/ setGaGameCloseSdkGashPayment(/*int*/ $ga_GameCloseSdkGashPayment)
	{
		$this->ga_GameCloseSdkGashPayment = intval($ga_GameCloseSdkGashPayment);
		$this->is_ga_GameCloseSdkGashPayment_dirty = true;		
		$this->is_this_table_dirty = true;		
	}

	public function /*void*/ setGaGameCloseSdkGashPaymentNull()
	{
		$this->ga_GameCloseSdkGashPayment = null;
		$this->is_ga_GameCloseSdkGashPayment_dirty = true;		
		$this->is_this_table_dirty = true;
	}

	
	public function /*string*/ toDebugString()
	{
		$dbg = "(";
		
		$dbg .= ("ga_GameID={$this->ga_GameID},");
		$dbg .= ("ga_GameAlias={$this->ga_GameAlias},");
		$dbg .= ("ga_GameName={$this->ga_GameName},");
		$dbg .= ("ga_GamePicture={$this->ga_GamePicture},");
		$dbg .= ("ga_GameRank={$this->ga_GameRank},");
		$dbg .= ("ga_GameState={$this->ga_GameState},");
		$dbg .= ("ga_GameWebsite={$this->ga_GameWebsite},");
		$dbg .= ("ga_GameRemark={$this->ga_GameRemark},");
		$dbg .= ("ga_GameScale={$this->ga_GameScale},");
		$dbg .= ("ga_GameMonetaryUnit={$this->ga_GameMonetaryUnit},");
		$dbg .= ("ga_GameCloseSdkGashPayment={$this->ga_GameCloseSdkGashPayment},");

		$dbg .= ")";
				
		return str_replace(",)",")",$dbg);
	}
	
	public function fromArray($arr)
	{
		if (isset($arr['ga_GameID'])) $this->setGaGameID($arr['ga_GameID']);
		if (isset($arr['ga_GameAlias'])) $this->setGaGameAlias($arr['ga_GameAlias']);
		if (isset($arr['ga_GameName'])) $this->setGaGameName($arr['ga_GameName']);
		if (isset($arr['ga_GamePicture'])) $this->setGaGamePicture($arr['ga_GamePicture']);
		if (isset($arr['ga_GameRank'])) $this->setGaGameRank($arr['ga_GameRank']);
		if (isset($arr['ga_GameState'])) $this->setGaGameState($arr['ga_GameState']);
		if (isset($arr['ga_GameWebsite'])) $this->setGaGameWebsite($arr['ga_GameWebsite']);
		if (isset($arr['ga_GameRemark'])) $this->setGaGameRemark($arr['ga_GameRemark']);
		if (isset($arr['ga_GameScale'])) $this->setGaGameScale($arr['ga_GameScale']);
		if (isset($arr['ga_GameMonetaryUnit'])) $this->setGaGameMonetaryUnit($arr['ga_GameMonetaryUnit']);
		if (isset($arr['ga_GameCloseSdkGashPayment'])) $this->setGaGameCloseSdkGashPayment($arr['ga_GameCloseSdkGashPayment']);
		
	}
	
	public function toArray()
	{
		$ret = array();
		$ret['ga_GameID'] = $this->ga_GameID;
		$ret['ga_GameAlias'] = $this->ga_GameAlias;
		$ret['ga_GameName'] = $this->ga_GameName;
		$ret['ga_GamePicture'] = $this->ga_GamePicture;
		$ret['ga_GameRank'] = $this->ga_GameRank;
		$ret['ga_GameState'] = $this->ga_GameState;
		$ret['ga_GameWebsite'] = $this->ga_GameWebsite;
		$ret['ga_GameRemark'] = $this->ga_GameRemark;
		$ret['ga_GameScale'] = $this->ga_GameScale;
		$ret['ga_GameMonetaryUnit'] = $this->ga_GameMonetaryUnit;
		$ret['ga_GameCloseSdkGashPayment'] = $this->ga_GameCloseSdkGashPayment;

		return $ret;
	}
}

?>
