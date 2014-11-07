<?php

class BM_DepartmentController extends MainController
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
        //获取机构状态配置
        $this->assign('deptStatus', json_encode(C('deptStatus')));

    }

    /**
     * 获取部门列表
     */
    public function actionGetList()
    {
        if (isset($_GET['do'])) {
            $list = BM_DepartmentProvider::getList();
            returnInfo::returnData($list);
        }
    }

    /**
     * 修改部门信息
     */
    public function actionPutRow()
    {
        if (isset($_GET['do'])) {
            $post = $_POST['row'];
            if (!empty($post['name']) && !empty($post['id'])) {

                //父部门不能是自己是子部门，也不能是自己
                if ($post['_parentId'] != '') {
                    $arr = array();
                    MainProvider::getSpecialDeptTree($post['id'], $arr);
                    if (in_array($post['_parentId'], $arr)) {
                        returnInfo::returnError();
                    }
                }

                $ret = BM_DepartmentProvider::putRow($post);
                if ($ret !== false) {
                    returnInfo::returnSuccess($ret);
                }
            }
        }
    }

    /**
     * 添加部门
     */
    public function actionAddRow()
    {
        if (isset($_GET['do'])) {
            $post = $_POST;
            if (!empty($post['name'])) {
                $ret = BM_DepartmentProvider::addRow($post);
                returnInfo::returnSuccess($ret);
            }
        }
    }

    /**
     * 删除部门
     */
    public function actionDelRow()
    {
        if (isset($_GET['do'])) {
            $post = $_POST;
            if (!empty($post['id'])) {
                $ret = BM_DepartmentProvider::delRow($post);
                if ($ret !== false) {
                    returnInfo::returnSuccess($ret);
                }

            }
        }
    }

}
