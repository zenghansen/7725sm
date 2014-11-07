<?php
/**
 * 极光推送 V2(REST 版)
 */ 

class pushapiv2 {
	
	private $_masterSecret = '';
	
	private $_appkeys = '';
	
	/**
	 * 构造函数
	 * @param string $username
	 * @param string $password
	 * @param string $appkeys
	 */
	function __construct($masterSecret = '', $appkeys = '') {
		$this->_masterSecret = $masterSecret;
		$this->_appkeys = $appkeys;
	}
	
	/**
	 * 发送
	 * @param int $sendno 发送编号。由开发者自己维护，标识一次发送请求
	 * @param int $receiver_type 接收者类型。1：IMEI，此时必须指定 appKeys；2：tag；3：alias；4：所有用户推送消息
	 * @param string $receiver_value 发送范围值，与 receiver_type相对应。 1：IMEI；2：tag，多个则使用","间隔；3：alias，多个则使用","间隔；4：空值
	 * @param int $msg_type 发送消息的类型。1：通知；2：自定义消息
	 * @param string $msg_content 发送消息的内容；与 msg_type 相对应的值
	 * @param string $platform 终端平台类型，如： android, ios 多个请使用逗号分隔
	 */
	function send( $receiver_type = 1, $receiver_value = '', $msg_type = 1, $msg_content = '', $platform = 'android') {
		$url = 'http://api.jpush.cn:8800/v2/push';
		$data = json_decode($msg_content);
		if ($data->extras) {
			$sendno = $data->extras;
		}else {
			$sendno	= get_srand_sn();
		}
		
		$param = '';		
		$param .= '&sendno=' . $sendno;					//1、sendno：发送编号	
		$param .= '&app_key=' . $this->_appkeys;		//2、应用程序(appKey)
		$param .= '&receiver_type=' . $receiver_type;	//3、接收者类型
		$param .= '&receiver_value=' . $receiver_value;	//4、发送范围值，与 receiver_type 相对应。		
		$verification_code = md5($sendno . $receiver_type . $receiver_value . $this->_masterSecret);				
		$param .= '&verification_code=' . $verification_code;		//5、验证串，用于校验发送的合法性
		$param .= '&msg_type=' . $msg_type;			//6、发送消息的类型
		$param .= '&msg_content=' . $msg_content;	//7、发送消息的内容
		$param .= '&send_description=desc';			//8、描述此次发送调用，不会发到用户		
		$param .= '&platform=' . $platform;			//9、目标用户终端手机的平台类型，如： android, ios 多个请使用逗号分隔		
		$param .= '&time_to_live=864000';			//10、从消息推送时起，保存离线的时长。秒为单位。最多支持10天（864000秒）

		$res = httpRequest($url, $param); 		
		if ($res === false) {
			return false;
		}
		
		$res_arr = json_decode($res, true);	
	    $res_arr['errmsg'] = "没有错误信息";	    
		switch (intval($res_arr['errcode'])) {
			case 0:
			    $res_arr['errmsg'] = '发送成功';	    
				break;
			case 10:
			    $res_arr['errmsg'] = '系统内部错误';
				break;
			case 1001:
			    $res_arr['errmsg'] = '只支持 HTTP Post 方法，不支持 Get 方法';
				break;
			case 1002:
				$res_arr['errmsg'] = '缺少了必须的参数';
				break;
			case 1003:
				$res_arr['errmsg'] = '参数值不合法';
				break;
			case 1004:
				$res_arr['errmsg'] = '验证失败';
				break;
			case 1005:
				$res_arr['errmsg'] = '消息体太大';
				break;
			case 1007:
				$res_arr['errmsg'] = 'receiver_value 参数非法';
				break;
			case 1008:
				$res_arr['errmsg'] = 'appkey参数非法';
				break;
			case 1010:
				$res_arr['errmsg'] = 'msg_content 不合法';
				break;
			case 1011:
				$res_arr['errmsg'] = '没有满足条件的推送目标';
				break;
			case 1012:
				$res_arr['errmsg'] = 'iOS 不支持推送自定义消息。只有 Android 支持推送自定义消息';
				break;
			default:
				break;
		}		
		
		$res_arr['param'] = $param;
		return $res_arr;
	}	
}