<?php

/**
 * 日志类
 */
class p7725Log
{

    private static $instance = null;

    /*日志文件大小*/
    private static $logSize = 5242880; //5MB
    /*日志存储路径*/
    private static $logPath = '7725log';

    private function __construct()
    {
    }
    private  function __clone(){}
    public static function getInstance($logPath = null, $logSize = null)
    {

        if ($logSize !== null && is_numeric($logSize)) {
            self::$logSize = $logSize;
        }
        if ($logPath !== null) {
            self::$logPath = $logPath;
        }
        if(!isset(self::$instance)){
            self::$instance = new p7725Log();
        }

        return self::$instance;
    }

    /**
     * 写日志
     * @param string $logMessage 日志信息
     * @param string $logType    日志类型
     */
    public function write($logMessage, $logType = 'log')
    {
        try {

            // 检查日志目录是否可写
            $logPath = self::$logPath;
            if (!file_exists($logPath)) {
                mkdir($logPath);
                chmod($logPath, 0777);
            }
            if (!is_writable($logPath)) {
                chmod($logPath, 0777);
            }
            $time = date('[Y-m-d H:i:s]');
            $date = date('Y_m_d');

            // 根据类型设置日志目标位置
            switch ($logType) {
                case 0:
                    $logPath .= 'ThrowError_' . $date . '.log';
                    break;
                case E_ERROR:
                    $logPath .= 'Error_' . $date . '.log';
                    break;
                case E_WARNING:
                    $logPath .= 'Warning_' . $date . '.log';
                    break;
                case E_PARSE:
                    $logPath .= 'Parse_' . $date . '.log';
                    break;
                case E_NOTICE:
                    $logPath .= 'Notice_' . $date . '.log';
                    break;
                default:
                    /*一般日志*/
                    $logPath .= 'Log_' . $date . '.log';
                    break;
            }
            //检测日志文件大小, 超过配置大小则重命名
            if (file_exists($logPath) && self::$logSize <= filesize($logPath)) {
                $fileName = substr(basename($logPath), 0, strrpos(basename($logPath), '.log')) . '_' . time() . '.log';
                rename($logPath, dirname($logPath) . DIRECTORY_SEPARATOR . $fileName);
            }
            clearstatcache();
            // 写日志, 返回成功与否
            return error_log("$time $logMessage\n", 3, $logPath);
        } catch (Exception $e) {
            return false;
        }
    }
}