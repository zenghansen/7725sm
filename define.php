<?php
date_default_timezone_set('Asia/Shanghai');
//系统时间
define('TIME', time());
//调用使用的时间
define('MICROTIME', microtime(true));

// 路径分隔符
define('DS', DIRECTORY_SEPARATOR);

//定义本项目根目录物理路径
define('ROOT_PATH', dirname(__FILE__).DS);
// 框架路径
define('FRAMEWORK_PATH', ROOT_PATH . 'frameworks' . DS);
// 框架主体路径
define('LIB_PATH', FRAMEWORK_PATH . 'libs' . DS);
// 功能模块路径
define('MODEL_PATH', FRAMEWORK_PATH . 'models' . DS);

//应用列表目录
define('APP_LIST_PATH', ROOT_PATH . 'protected' . DS);
//应用列表中的util目录
define('APP_UTIL_PATH', APP_LIST_PATH . 'util' . DS);
// 应用目录
define('APP_PATH', ROOT_PATH . 'protected' . DS . APP_NAME . DS);
// 应用私有模块
define('APP_PROVIDER_PATH', APP_PATH . 'providers' . DS);
// 应用控制器目录
define('APP_CONTROLLER_PATH', APP_PATH . 'controllers' . DS);
// 应用模板目录
define('APP_VIEW_PATH', APP_PATH . 'views' . DS);
// 应用预编译目录
define('APP_COMPILED_PATH', ROOT_PATH . 'compiled' . DS);
// 公共缓存路径
define('CACHE_PATH', ROOT_PATH . 'cache' . DS);
//公共临时目录，存放日志，session等文件
define('TMP_PATH', ROOT_PATH.'tmp'.DS);
//数据表类文件夹
define('DBPATH', FRAMEWORK_PATH . 'db' . DS);

?>