<?php

/**
 * 框架异常处理类
 */
require_once 'p7725Log.php';

class p7725Exception
{

    private static $log = null;

    private static $logMode = 0; //日志模式，0：关闭 1：E_ERROR | E_PARSE ;2：E_ERROR | E_PARSE| E_WARNINGE 3:E_ALL

    private static $displayErr = false;

    private function __construct()
    {

    }

    /*初始化*/
    public static function init($logInfo)
    {
        /*获取日志助手*/
        try {

            self::$logMode = $logInfo['LOG_MODE'];

            self::$displayErr = $logInfo['DISPLAY_ERROR'];


            set_error_handler(array('p7725Exception', 'errorHander'));
            register_shutdown_function(array('p7725Exception', 'shutdownHander'));
            set_exception_handler(array('p7725Exception', 'exceptionHander'));

            self::$log = p7725Log::getInstance($logInfo['LOG_PATH'], $logInfo['LOG_SIZE']);

        } catch (Exception $e) {
            echo "框架异常处理类初始化失败!";
        }
    }

    /*一般非致命异常类*/
    public static function errorHander($errNo, $errStr, $errFile, $errLine)
    {
        if (self::$logMode == 0 || self::$logMode == 1) return;

        if (self::$logMode == 2 && $errNo == E_NOTICE) return;

        self::write($errNo, $errStr, $errFile, $errLine);

    }

    /*致命异常类*/
    public static function shutdownHander()
    {
        if (self::$logMode == 0) return;

        $err = error_get_last();
        if ($err !== null) {
            $errNo = $err['type'];
            $errFile = $err['file'];
            $errLine = $err['line'];
            $errStr = $err['message'];

            self::write($errNo, $errStr, $errFile, $errLine);
        }

    }

    /*自抛致命异常类*/
    public static function exceptionHander($exception)
    {
        if (self::$logMode == 0) return;

        $errNo = 0;
        $errFile = $exception->getFile();
        $errLine = $exception->getLine();
        $errStr = $exception->getMessage();
        //$errStr = explode("\n",$errStr);
        //$errStr = $errStr[0];

        self::write($errNo, $errStr, $errFile, $errLine);

    }

    private static function write($errNo, $errStr, $errFile, $errLine)
    {
        $errMessage = '日志信息:' . $errStr . '(' . $errFile . '[' . $errLine . ']行)';
        if (!self::$log->write($errMessage, $errNo)) {
            echo 'exceptionHander日志写入失败';
        }

        if (self::$displayErr) {
            echo $errMessage;
        }
    }

}