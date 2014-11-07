<?php

class MainController extends controller
{

    /**
     * 构造函数
     */
    private static $ridArr = null; // String 用户拥有的模块ids

    public function __construct($noCheck = false)
    {
        parent::__construct();

        $this->loadProvider();
        load('returnInfo'); //加载接口返回格式类

        MainProvider::init(C('dbengines')); //链接数据库

        if (!$noCheck) {
            MainProvider::checkLogin();
            MainProvider::checkPermission();
        }
        //如果不是接口，或者登陆页面，加载页面全局公用数据
        if (!isset($_GET['do'])) {
            if (!empty($_GET['c'])) {
                if (strtolower($_GET['c']) == 'login') {
                    return;
                }
            }

            $this->init();
        }
    }

    /**
     * 加载相对应controller对应的provider文件。
     */
    public static function  loadProvider()
    {
        //加载主provider
        $mainModelFile = APP_LIST_PATH . 'main' . DS . 'providers' . DS . 'MainProvider.php';
        require_once $mainModelFile;
        //加载app控制器provider
        if (!empty($_GET['c'])) {
            $modelFile = APP_PROVIDER_PATH . ucfirst($_GET['c']) . 'Provider.php';
        } else {
            $modelFile = APP_PROVIDER_PATH . 'IndexProvider.php';
        }
        if (file_exists($modelFile))
            require_once $modelFile;
    }

    /**
     * 加载全局公用数据
     */
    private function init()
    {
        $userInfo = cookie::get('userInfo');
        //获取用户拥有的模块ids
        self::$ridArr = MainProvider::getRightArr(cookie::get('user'), $userInfo['bm_RankID']);
        //加载该模块二级菜单
        if (!empty($_GET['m'])) {
            $secondMenus = array();
            $mid = MainProvider::getMidByUrl($_GET['m']);
            MainProvider::getMenuTree($mid, $userInfo['bm_AccountType'], self::$ridArr, $secondMenus);
            if ($secondMenus) {
                //默认跳转到第一个优先级二级模块
                if (!isset($_GET['c'])) {
                    $url = $secondMenus[0]['url'];
                    header('location:' . $url);
                    die();
                } else if (!isset($_GET['a'])) {
                    if (isset($secondMenus[0]['children'])) {
                        //默认跳转到第一个优先级二级模块的第一个子模块
                        $url = $secondMenus[0]['children'][0]['url'];
                        header('location:' . $url);
                        die();
                    }
                }
                $this->assign('secondMenus', json_encode($secondMenus));

                //模块url,前端接口调用
                if (isset($_GET['a'])) {
                    $this->assign('modUrl', '?m=' . $_GET['m'] . '&c=' . $_GET['c'] . '&a=' . $_GET['a']);
                } else {
                    $this->assign('modUrl', '?m=' . $_GET['m'] . '&c=' . $_GET['c']);
                }
            }
        }

        $this->assign('uid', cookie::get('user'));
        //加载主菜单
        $topMenus = MainProvider::getMenus($userInfo['bm_AccountType'], self::$ridArr, 0, 0);
        /*如果只有一个主菜单且不是主页，则跳到该菜单*/
        if (empty($_GET['m']) && $topMenus && count($topMenus) == 1 && $topMenus[0]['url'] != '/') {
            header('location:' . $topMenus[0]['url']);
            die();
        }

        $this->assign('topMenus', $topMenus);

        //获取机构树
        $deptTree = array();
        MainProvider::getDeptTree(0, $deptTree);
        $this->assign('deptTree', json_encode($deptTree));

    }

}
