<?php
/**
 * @todo xl 2014-08-29
 *为了公共配置集中定义，因此将原来各个app下共同的数据定义提出来
 *需要做到程序的兼容，所以对部分相同数据的不同变量名不做统一
 */
return array(
    'tpl_suffix' => '.tpl', // 模板后缀

    'COOKIE_EXPIRE' => '3600', // cookie 的有效期
    'COOKIE_NAMESPACE' => 'sm', // cookie 命名空间
    'COOKIE_PATH' => '/', // cookie服务器路径
    'COOKIE_DOMAIN' => '.7725sm.cc', // cookie的域名
//	'COOKIE_ENCODE'			=> 'BxKRv5971R',			// cookie加密字符串
//	
//	'STATIC_SOURCE_SITE'	=> 'http://static.7725.cc/',	// 静态资源域名
//	'PC_HOME'				=> 'http://www.7725.cc/',		// PC平台
//	'UEditor_upload_path'   => 'E:/LAMP/www/test/mis.otopgame.cc', //ueditor圖片上傳路徑
//	'MOBILE_HOME'			=> 'http://m.topgame.com/',		// 手机平台
//	'DEDE_ROOT_PATH'		=> 'E:/php-workspace/p7725svr/www/',				//DEDE根目录
//	'DEDE_TEMPLATE_PATH'	=> 'E:/php-workspace/p7725svr/www/templets/blue',	//DEDE模板目录
//	'DEDE_INCLUDE_PATH'		=> 'E:/php-workspace/p7725svr/www/include',			//DEDE函数和类库目录
//	'DEDE_DATA_PATH'		=> 'E:/php-workspace/p7725svr/data/',				//DEDE数据目录
//	'UC_CONFIG_PATH'		=> 'E:/php-workspace/p7725svr/frameworks/agent/uc.config.php',	//uc配置文件路徑
//
//	'DEDEDATA'              => 'E:\php-workspace\p7725svr/data/',
//	'DEDEROOT'              => 'E:\php-workspace\p7725svr/www/',
//	'PAY_APP_PATH'          => 'E:\php-workspace\p7725svr/frameworks/apps/pay/',
//	'AGENT_APP_PATH'        => 'E:\php-workspace\p7725svr/frameworks/apps/agent/',
//	'INCLUDE_PATH' 			=> 'E:/p7725/p7725sdk_svr/branches/p7725_app_svr_1.0/p7725svr/www/templets/blue',// 模板后缀	
//	'SERUPLOADPATH' 		=> 'E:/p7725/p7725sdk_svr/branches/p7725_app_svr_1.0/p7725svr/www/service/uploads',// 模板后缀
//
//	'VAR_PAGE' => 'p',
//	'AJAX_FUNCTION' => 'goNext'	,
//	'ADV_ID_HREF' =>'http://www.7725.com',
//	'KEFU_UPLOAD_PATH'   =>'http://www.7725.com/uploads/service/',
//	'KEFU_UPLOAD_DIR'   =>'E:/php-workspace/p7725svr/www/uploads/service/',
//	'MOBILE_PATH' => 'E:/php-workspace/p7725svr/static.otopgame.com/mobileweb/images/sdk/adv/',
//	'ORDER_FILE_PATH' => 'E:/php-workspace/p7725svr/mis.otopgame.com/static/orderfile',
//	'SDK_PATH' => 'E:/php-workspace/p7725svr/static.otopgame.com/mobileweb/images/sdk',
//	'SDK_DIR' => 'http://static.7725.com/mobileweb/images/sdk',
//	'UEditor_upload_path'   => 'E:/php-workspace/p7725svr/static.7725.com/', //ueditor圖片上傳路徑


    'dbengines' => array(
        'db' => array(
            'engine' => 'mysql',
            'charset' => 'utf8',
            'nodes' => array(
                //array('host'=>'localhost', 'user'=>'root', 'password'=>'123456', 'database'=>'test', 'type'=>'slave'),
                array('host' => 'localhost', 'user' => 'root', 'password' => '123456', 'database' => 'pf_basemanage', 'type' => 'master'),
            ),
        )
    ),

    'memcache' => array(),

    'log' => array(
        'DISPLAY_ERROR' => false, //是否开启错误显示
        'LOG_MODE' => 3, //日志模式，0：关闭 1：E_ERROR | E_PARSE ;2：E_ERROR | E_PARSE| E_WARNINGE 3:E_ALL
        'LOG_PATH' => TMP_PATH . 'logs' . DS,  //日志保存路径
        'LOG_SIZE' => 5242880,        //日志文件大小
        'DEVELOPER_LOG_TOKEN' => 'xunle' //日志令牌
    ),
);
