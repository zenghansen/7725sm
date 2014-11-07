<?php

/**
 * 日志类
 */
class Log
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
    public static function getInstant()
    {


        //if(!isset(self::$instance)){
            self::$instance = new Log();
       // }

        return self::$instance;
    }

}