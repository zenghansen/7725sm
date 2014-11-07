<?php
class Utils {
	 
	public static function getServerData($url,$params, $postParams = false) {
		$ret = -100;
		foreach ( $params as $key => $value ) {
			$url .= $key . "=" . $value . "&";
		}
		if ((! empty ( $postParams )) && is_array ( $postParams )) {
			$post_string = http_build_query ( $postParams );
			$context = array ('http' => array ('method' => 'POST', 'header' => 'Content-type: application/x-www-form-urlencoded' . "\r\n" . 'User-Agent : Jimmy' . "\r\n" . 'Content-length: ' . strlen ( $post_string ), 'content' => $post_string ) );
			$stream_context = stream_context_create ( $context );
			$ret = @file_get_contents ( $url, FALSE, $stream_context );
		} else {
			try
			{
				$ret = @file_get_contents ( $url );
			}
			catch(Exception $e){
				$ret = 100;
			}
		}
		return $ret;
			
	}

	//取得客户IP 
	public static function get_client_ip()
	{
		if(!empty($_SERVER["HTTP_CLIENT_IP"])){
			$cip = $_SERVER["HTTP_CLIENT_IP"];
		}
		elseif(!empty($_SERVER["HTTP_X_FORWARDED_FOR"])){
			$cip = $_SERVER["HTTP_X_FORWARDED_FOR"];
		}
		elseif(!empty($_SERVER["REMOTE_ADDR"])){
			$cip = $_SERVER["REMOTE_ADDR"];
		}
		else{
			$cip = "127.0.0.1";
		}
		return $cip;
	}

	//防sql注入字符串验证
	public static function check_input($value)
	{
		// 去除斜杠 
		if (get_magic_quotes_gpc())
		{
			$value = stripslashes($value);
		}
		// 假如不是数字则加引号 
		if (!is_numeric($value))
		{
			$value = "'" . mysql_escape_string($value) . "'";
		}
		return $value;
	}


}
?>