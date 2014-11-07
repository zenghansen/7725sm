<?php

class BM_AccountController extends MainController
{

    /**
     * 构造函数
     */
    public function __construct()
    {
        parent::__construct();

    }

    /**
     * 初始化数据，显示页面
     */
    public function actionIndex()
    {
        //获取账号状态配置
        $this->assign('userStatus', json_encode(C('userStatus')));
        $modTree = array();
        $ridArr = MainProvider::getRightArr(cookie::get('user'), cookie::get('userInfo')['bm_RankID']);
        MainProvider::getMenuTree(0, cookie::get('userInfo')['bm_AccountType'], $ridArr, $modTree);
        $this->assign('modTree', json_encode($modTree));

    }

    /**
     * 获取用户列表
     */
    public function actionGetList()
    {
        if (isset($_GET['do'])) {
            $get = $_GET;
            $list = BM_AccountProvider::getList($get['start'], $get['limit']);
            returnInfo::returnData($list);
        }
    }

    /**
     * 修改用户信息
     */
    public function actionPutRow()
    {
        if (isset($_GET['do'])) {
            $post = $_POST['row'];
            if (!empty($post['name']) && !empty($post['id'])) {
                $ret = BM_AccountProvider::putRow($post);
                if ($ret !== false) {
                    returnInfo::returnSuccess($ret);
                }else{
                    returnInfo::returnError();
                }
            }
        }
    }

    /**
     * 添加用户
     */
    public function actionAddRow()
    {
        if (isset($_GET['do'])) {
            $post = $_POST;
            if (!empty($post['id']) && !empty($post['name'])) {
                $ret = BM_AccountProvider::addRow($post);
                returnInfo::returnSuccess($ret);
            }
        }
    }

    /**
     * 删除用户
     */
    public function actionDelRow()
    {
        if (isset($_GET['do'])) {
            $post = $_POST;
            if (!empty($post['id'])) {
                $ret = BM_AccountProvider::delRow($post);
                if ($ret !== false) {
                    returnInfo::returnSuccess($ret);
                }else{
                    returnInfo::returnError();
                }
            }
        }
    }

    /**
     * 获取部门拥有的级别
     */
    public function actionGetDeptRand()
    {
        if (isset($_GET['do'])) {
            $get = $_GET;
            $list = BM_AccountProvider::getDeptRand($get['deptId']);
            returnInfo::returnSuccess($list);
        }
    }


}
