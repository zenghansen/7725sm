<?php

class MainProvider
{
    protected static $db = null;

    /**
     * 构造函数
     */
    private function __construct()
    {
        self::init(null); //给编译器看的
    }

    public static function  init($dbNode)
    {
        $dbs = $dbNode['db']['nodes'];
        $host = $dbs[0]['host'];
        $dbname = $dbs[0]['database'];
        $user = $dbs[0]['user'];
        $password = $dbs[0]['password'];
        self::$db = new db("mysql:host=$host;port=3306;dbname=$dbname", $user, $password);
    }

    /**
     * 检测是否登录
     * @return bool
     */
    public static function checkLogin()
    {
        $user = cookie::get('user');
        if (!$user) {
            echo '<script>alert(\'您还没有登录！\')</script>';
            header("refresh:0;url=index.php?c=login");
            die();
        }
        //延长登录状态
        cookie::set('user', $user, C('COOKIE_EXPIRE'), C('COOKIE_PATH'), C('COOKIE_DOMAIN'));
    }

    /**
     * 检测是否有该模块的权限
     * @return bool
     */
    public static function checkPermission()
    {
        // die('你没有权限查看该页面！');

    }

    /**
     * @param $userType 登陆的用户类型
     * @param $mids 分配的模块ids
     * @param $level 模块等级
     * @param $fid  模块父节点id
     */
    public static function getMenus($userType, $mids, $level, $fid)
    {
        try {
            $where = 'bm_ModuleLevel=? AND bm_FModuleID=?';
            $arr = array($level, $fid);
            if ($userType != 0) { //如果不是超级管理员,进行权限判断
                $place_holders = implode(',', array_fill(0, count($mids), '?'));
                $where .= ' AND bm_ModuleID in (' . $place_holders . ')';
                $arr = array_merge($arr, $mids);
            }
            return $menus = self::$db->select('BM_ModuleStructure', 'bm_ModuleID AS id,bm_ModuleName AS name,bm_ModuleUrl AS url', $where, $arr);
        } catch (Exception $e) {
            throw new Exception($e);
        }

    }

    /**
     * 获取菜单目录树
     * @param $id 要递归的id节点
     * @param $userType 登陆的用户类型
     * @param $mids 用户拥有的模块ids
     * @param array $arr 返回的多维数组
     */
    public static function getMenuTree($id, $userType, $mids, &$arr = array())
    {
        try {
            $where = 'bm_FModuleID=?';
            $tmpArr = array($id);
            if ($userType != 0) {
                $place_holders = implode(',', array_fill(0, count($mids), '?'));
                $where .= ' AND bm_ModuleID IN (' . $place_holders . ')';
                $tmpArr = array_merge($tmpArr, $mids);
            }
            $where .= ' ORDER BY bm_ModulePRI';
            $ret = self::$db->select('BM_ModuleStructure', 'bm_ModuleID AS id,bm_ModuleName AS text,bm_ModuleUrl AS url,bm_ModuleLevel AS level', $where, $tmpArr);
            if ($ret) {
                $arr['children'] = $ret;
                foreach ($arr['children'] as $key => $v) {
                    $arr['children'][$key]['iconCls'] = 'icon-null';
                    self::getMenuTree($v['id'], $userType, $mids, $arr['children'][$key]);
                }
                if (!isset($arr['id'])) { //第一层没有数据，只有children
                    $arr = $arr['children'];
                }
            }
        } catch (Exception $e) {
            throw new Exception($e);
        }
    }

    /**
     * 获取部门树机构
     * @param $id
     * @param array $arr
     */
    public static function getDeptTree($id = 0, &$arr = array())
    {
        try {
            $ret = self::$db->select('BM_Department', 'bm_DtptID AS id,bm_DtptName AS text', 'bm_FDtptID=? AND bm_DtptState=0 ORDER BY bm_DtptPRI', array($id));
            if (!$ret) {
                $arr['children'] = $ret;
                foreach ($arr['children'] as $key => $v) {
                    $arr['children'][$key]['iconCls'] = 'icon-null';
                    self::getDeptTree($v['id'], $arr['children'][$key]);
                }
                if (!isset($arr['id'])) { //第一层没有数据，只有children
                    $arr = $arr['children'];
                }
            }
        } catch (Exception $e) {
            throw new Exception($e);
        }
    }

    /**
     * 获取部门子部门id数组，包括自己
     * @param $id
     * @param array $arr
     */
    public static function getSpecialDeptTree($id, &$arr = array())
    {
        try {
            if ($arr == null) {
                array_push($arr, $id);
            }
            $ret = self::$db->select('BM_Department', 'bm_DtptID', 'bm_FDtptID=?', array($id));
            if ($ret) {
                foreach ($ret as $v) {
                    $arr[] = $v['id'];
                    self::getSpecialDeptTree($v['id'], $arr);
                }
            }
        } catch (Exception $e) {
            throw new Exception($e);
        }
    }

    /**根据url参数获取模块id
     * @param $parm
     * @return mixed
     */
    public static function getMidByUrl($parm)
    {
        try {
            $parm = '?m=' . $parm;
            $ret = self::$db->select('BM_ModuleStructure', 'bm_ModuleID AS id', 'bm_ModuleUrl=?', array($parm));
            if ($ret) {
                return $ret[0]['id'];
            }
        } catch (Exception $e) {
            throw new Exception($e);
        }
    }

    /**
     * 获取个人权限模块
     * @param $uid,$rid 用户id，级别id
     * @return array
     */
    public static function getRightArr($uid, $rid)
    {
        try {
            $rightArr = array();
            //用户本身分配的模块
            $ret = self::$db->select('BM_AccountModule', 'bm_ModuleID', 'bm_AccountID=?', array($uid));
            if ($ret) {
                $rightArr = array_merge($rightArr, $ret);
            }
            //分配级别的所得模块
            if (!empty($rid)) {
                $ret = self::$db->select('BM_RankRight', 'bm_ModuleID', 'bm_RankID=?', array($rid));
                if (!empty($ret)) {
                    $rightArr = array_merge($rightArr, $ret);
                }

            }

            //不需要权限显示的模块
            $ret = self::$db->select('BM_ModuleStructure', 'bm_ModuleID', 'bm_ModuleState=0');
            if (!empty($ret)) {
                $rightArr = array_merge($rightArr, $ret);
            }

            /*把父级模块也取出来，不然无法显示子模块*/
            $temArr = $rightArr;
            foreach ($temArr as $v) {
                $mid = $v['bm_ModuleID'];
                loo: //递归
                $re = self::$db->select('BM_ModuleStructure', 'bm_FModuleID AS bm_ModuleID', 'bm_ModuleID=?', array($mid));
                if ($re) {
                    $mid = $re[0]['bm_ModuleID'];
                    if ($mid != 0) {
                        $rightArr = array_merge($rightArr, $re);
                        goto loo;
                    }
                }
            }
            //整合
            $retArr = array();
            foreach ($rightArr as $v) {
                array_push($retArr, $v['bm_ModuleID']);
            }
            return $retArr;
        } catch (Exception $e) {
            throw new Exception($e);
        }

    }


}
