<?php
/**
 * 系统日志管理
 * 
 * 当使用开发者模式时，你需要使用GET参数提供一个令牌来开启日志开关
 * 例 http://7725.com/gc/?DEBUG_TOKEN=xxxx
 * 只要你提供一次，系统将会且只会跟踪和记录你的日志信息，这在服务器线上调试是非常方便的
 */
class log {
	
	//保存类实例的静态成员变量
	private static $_instance;
    
    //日志模式
    //禁用日志
    const MODE_DISABLE = 0;
    //开发者调试模式
    const MODE_DEVELOPER_DEBUG = 1;
    //全开模式
    const MODE_ALL = 2;
    
    /**
     * 日志模式
     * @var int
     */
    private $_mode;
    
    /**
     * 要记录的日志类型
     * @var array
     */
    private $_log_type;
    
    /**
     * 令牌
     * @var string
     */
    private $_debug_token;
    
    /**
     * 是否写入系统日志
     * @var boolean
     */
    private $_writable = true;
    
    /**
     * 
     * 日志保存目录
     * @var string
     */
    public $log_dir = '';
    
    /**
     * 
     * 日志文件名称
     * @var string
     */
    public $log_file = '';
    
    
    private function __construct($log_conf) {
    	
    	$this->_mode = $log_conf['LOG_MODE'];
        if($this->_mode == 1) {
            $this->_log_type = explode(',', $log_conf['DEVELOPER_LOG_TYPE']);
            $this->_debug_token = $log_conf['DEVELOPER_LOG_TOKEN'];
        } else {
            $type = $log_conf['ALL_LOG_TYPE'];
            $this->_debug_token = '';
        }
	        
        $this->_checkWritable();
        //开发者模式日志调试
        if($this->_mode == self::MODE_DEVELOPER_DEBUG) {
            $this->_traceDeveloper();
        }
    }
    
    /**
     * 
     * 单例方法,用于访问实例的公共的静态方法
     * @param int $mode 日志模式 0：关闭 1：开发者 2：总是开放
     * @param string $log_type 要记录的日志类型
     * @param string $debug_token [optional] 调试令牌，当$mode为1时需要此值来验证身份
     * @return type
     */
    public static function getInstance($log_conf) {
    	if (!(self::$_instance instanceof log)){
        
    		self::$_instance = new self($log_conf);
    	}
        return self::$_instance;
    }
    
    /**
     * 记录系统日志
     * 
     * @param string $type 类型
     * @param string $message 描述
     * @param string $null_line [optional] 新起一个空行
     */
    public function write($type, $message, $null_line=false) {
        if($this->_writable && in_array($type, $this->_log_type)) {
        	$log_conf = C('log');
            $file = $log_conf['LOG_PATH'] . 'runtime-' . date('Y-m-d') . '.txt';
            $message = $type . ' - ' . date('H:i:s') . ' -> ' . $message . "\n";
            if($null_line) {
                $message =  "\n" . $message;
            }
            $handle = fopen($file, 'a');
            fwrite($handle, $message);
            fclose($handle);
        }
    }
    
    /**
     * 判断是否写入日志
     * @return boolean
     */
    public function _checkWritable() {
        if(empty($this->_log_type)) {
            $this->_writable = false;
            return;
        }
        switch($this->_mode) {
            case self::MODE_DEVELOPER_DEBUG:
                $this->_writable = $this->_isDeveloper();
                break;
            case self::MODE_ALL:
                $this->_writable = true;
                break;
            case self::MODE_DISABLE:
                $this->_writable = false;
            default:
                break;
        }
    }
    
    /**
     * 判断是否是开发者
     * 
     * @return boolean
     */
    private function _isDeveloper() {
        $this->_sessionStart();
        if(!empty($this->_debug_token) && isset($_SESSION['DEBUG_TOKEN']) &&
                $this->_debug_token == $_SESSION['DEBUG_TOKEN']) {
            return true;
        }
        return false;
    }
    
    /**
     * 给当前用户带上开发者的标记，用于跟踪日志
     */
    private function _traceDeveloper() {
        if(isset($_REQUEST['DEBUG_TOKEN']) && $_REQUEST['DEBUG_TOKEN'] == $this->_debug_token) {
            $this->_sessionStart();
            $_SESSION['DEBUG_TOKEN'] = $this->_debug_token;
        }
    }
    
    /**
     * 开启session
     */
    private function _sessionStart() {
        if(!isset($_SESSION)) {
            session_start();
        }
    }
}