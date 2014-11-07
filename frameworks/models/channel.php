<?php

class channel {
	public static $names = array(
		'ff' => 'Forgame',
		'fb' => 'Facebook',
		'fg' => 'Google',
		'fh' => 'Gamer',
		'fe' => 'Gamebase',
		'fy' => 'Yahoo',
		'fyt' => 'Yahoo-tw',
//		'fu' => '2000fun',
		'fm' => 'Msn',
		'ft' => 'Twitter', 
//		'fp' => 'Pchome',
//		'gf' => 'Gamefish',
//		'nf' => 'Miniktw',
//		'ha' => 'Heha',
//		'sns' => 'Fungame',
//		'gc' => 'Gamecard',
//		'py' => 'Play168',
		'ig' => 'Igamer',
		'gfe' => 'Gafee'
	);
	
	public static $channeler = array(
		"2000fun",
		"7725",
		"dler",
		"facebook",
		"ff",
		"fungame",
		"gamebase",
		"gamecard",
		"gamefish",
		"gamer",
		"google",
		"heha",
		"miniktw",
		"msn",
		"pchome",
		"play168",
		"twitter",
		"yahoo",
		"yahoo-tw",
		"gafee"
	);
	
	/**
	 * @获取数组键名并切割 
	 * $str delimiter
	 * return array(key1,$key2,$key3)
	 */
	function get_name_key($str){
		return implode($str, array_keys(self::$names));
		
		foreach($arr as $key => $val){
			$keys[] = $key;
		}
		$data = implode($str, $keys);//return key
		
		return $data;
	}
	
	/**
	 * @获取取索引对应的名称,并截断
	 * $arr=>array();
	 * $str截断标志符
	 * $value被截断字符串
	 * return $str
	 */
	function sub_str($arr, $str, $value) {
		if($num = strpos($value, $str)){
			$len = - strlen($value);
			$result = substr($value,$len,$num);
			foreach($arr as $key=>$val) {
				if($key == $result) {
					return $val;
				}
			}
		}
		
		return 'Forgame';
	}
	
	/**
	 * @获取账户类型 
	 * $str delimiter
	 * return string
	 */
	function get_user_type($str){
		if (array_key_exists($str, self::$names)) {
			return self::$names[$str];	
		}
	    return 'Forgame';
	}
	
	/**
	 * @获取数组键名并切割 
	 * $str delimiter
	 * return array(key1,$key2,$key3)
	 */
	function get_notLike_sql($strL, $strR){
		$sql = '';
		$data = self::$names;
		unset($data['ff']);
		foreach($data as $key => $val){
			$sql .= $strL . $key . '\_' . $strR;
		}
		
		return $sql;
	}	
}