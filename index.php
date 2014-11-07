<?php

//从请求中获取app名称
header('Content-type: text/html; charset=utf-8');

error_reporting(0);

$module = isset($_REQUEST['m']) ? $_REQUEST['m'] : 'index';
define('APP_NAME', $module);

//加载全局配置
include_once 'define.php';
include_once FRAMEWORK_PATH.'functions.php';

C(require 'global.inc.php');
C(require 'common.inc.php');

//加载异常处理类
include_once LIB_PATH.'p7725Exception.php';

p7725Exception::init(C('log'));

//进入管理台
include FRAMEWORK_PATH.'runtime.php';

P7725::run();