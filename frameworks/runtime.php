<?php
// 任何使用框架的都必须先指定一个应用名字, 并且该名字在apps目录存在
defined('APP_NAME') || die('未授权的应用！');

/**
 * 基础运行类
 */
class P7725
{

    /**
     * 路由实例
     * @var Route
     */
    private static $_route = null;

    /**
     * 是否使用路由
     *
     * 注：是否使用路由不是由当前默认参数决定的，是由self::_initRoute计算的
     * @var boolean
     */
    private static $_use_route = false;

    /**
     * 控制器实例
     * @var string
     */
    private static $_control;

    /**
     * 控制器名字
     * @var string
     */
    private static $_control_name;

    /**
     * 方法名字
     * @var string
     */
    private static $_action_name;

    /**
     * 模板文件
     * @var string
     */
    private static $_template;

    /**
     * 单例静态类
     */
    private function __construct()
    {
    }

    /**
     * 加载基础运行库
     */
    private static function _loadBasicLibrary()
    {
        // 加载主体框架
        load('view');
        load('cookie');
        load('db');
        // 决定采用REST还是MVC模式
        if (defined('REST')) {
            load('restController');
        } else {
            load('controller');
        }
        // 载入路由器
        load('route');
    }

    /**
     * 初始化路由
     */
    private static function _initRoute()
    {
        self::$_route = new Route(include 'route.inc.php', loadC('route.inc.php'));
        //PATHINFO或者GET参数为空时，就使用路由解析
        $pathinfo = self::$_route->getPathInfo();
        $use_get = (isset($_GET['c']) || isset($_GET['a']));
        self::$_use_route = !$use_get;
    }

    /**
     * 初始化控制器
     */
    private static function _initControl()
    {
        $control = null;

        $file = APP_LIST_PATH . 'main' . DS . 'controllers' . DS . 'MainController.php';
        require_once $file;

        if (self::$_use_route) {
            if (self::$_route->parse()) {
                self::$_control_name = self::$_route->getContorller();
                self::$_action_name = self::$_route->getMethod();
                $control = self::_getControlInstance();
            }
            // 实例化控制器
            if (!$control) {
                self::$_route->to404Error();
                self::$_control_name = self::$_route->getContorller();
                self::$_action_name = self::$_route->getMethod();
                $control = self::_getControlInstance();
            }
        } //兼容GET的方式
        else {
            self::$_control_name = isset($_GET['c']) ? $_GET['c'] . 'Controller' : 'IndexController';
            self::$_action_name = isset($_GET['a']) ? 'action' . $_GET['a'] : 'actionIndex';
            self::$_template = (isset($_GET['c']) ? $_GET['c'] : 'index') . DS . (isset($_GET['a']) ? $_GET['a'] : 'index') . C('tpl_suffix');

            $control = self::_getControlInstance();
            if (!$control) {
                show404();
            }
        }
        self::$_control = $control;
    }

    /**
     * 获取一个控制器实例
     * 这个实例对象包含一个属性：
     * object 实现控制器逻辑的类
     */
    private static function _getControlInstance()
    {
        // 加载控制器
        $file = APP_CONTROLLER_PATH . self::$_control_name . '.php';

        require_once $file;
        $control = new stdClass();
        $class = self::$_control_name;
        if (!method_exists($class, self::$_action_name)) {
            return false;
        }
        $control->object = new $class();
        return $control;
    }

    /**
     * 程序执行
     */
    public static function run()
    {
        try {
            self::_loadBasicLibrary();
            //self::_initRoute();
            self::_initControl();
            // 设置模板路径和解析文件保存路径
            self::$_control->object->setTemplateDir(APP_VIEW_PATH)->setCompileDir(APP_COMPILED_PATH);
            self::$_control->object->assign('cookie_domain', C('COOKIE_DOMAIN'));
            // 调用控制器的方法
            if (self::$_use_route) {
                call_user_func_array(
                    array(self::$_control->object, self::$_action_name),
                    self::$_route->getParams()
                );
            } else {
                self::$_control->object->{self::$_action_name}(); // 执行请求
            }

            // 记载模板页面
            self::$_control->object->display(self::$_template);
        } catch (Exception$e) {
            throw new Exception($e);
        }
    }
}

